<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('PruebaModuleDos.Content.View');
		$this->load->model('pruebamoduledos_model', null, true);
		$this->lang->load('pruebamoduledos');
		
		Template::set_block('sub_nav', 'content/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->pruebamoduledos_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('pruebamoduledos_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('pruebamoduledos_delete_failure') . $this->pruebamoduledos_model->error, 'error');
				}
			}
		}

		$records = $this->pruebamoduledos_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage PruebaModuleDos');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a PruebaModuleDos object.
	*/
	public function create()
	{
		$this->auth->restrict('PruebaModuleDos.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_pruebamoduledos())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamoduledos_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'pruebamoduledos');

				Template::set_message(lang('pruebamoduledos_create_success'), 'success');
				redirect(SITE_AREA .'/content/pruebamoduledos');
			}
			else
			{
				Template::set_message(lang('pruebamoduledos_create_failure') . $this->pruebamoduledos_model->error, 'error');
			}
		}
		Assets::add_module_js('pruebamoduledos', 'pruebamoduledos.js');

		Template::set('toolbar_title', lang('pruebamoduledos_create') . ' PruebaModuleDos');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of PruebaModuleDos data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('pruebamoduledos_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/pruebamoduledos');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('PruebaModuleDos.Content.Edit');

			if ($this->save_pruebamoduledos('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamoduledos_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pruebamoduledos');

				Template::set_message(lang('pruebamoduledos_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('pruebamoduledos_edit_failure') . $this->pruebamoduledos_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('PruebaModuleDos.Content.Delete');

			if ($this->pruebamoduledos_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamoduledos_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pruebamoduledos');

				Template::set_message(lang('pruebamoduledos_delete_success'), 'success');

				redirect(SITE_AREA .'/content/pruebamoduledos');
			} else
			{
				Template::set_message(lang('pruebamoduledos_delete_failure') . $this->pruebamoduledos_model->error, 'error');
			}
		}
		Template::set('pruebamoduledos', $this->pruebamoduledos_model->find($id));
		Assets::add_module_js('pruebamoduledos', 'pruebamoduledos.js');

		Template::set('toolbar_title', lang('pruebamoduledos_edit') . ' PruebaModuleDos');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_pruebamoduledos()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_pruebamoduledos($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('pruebamoduledos_coluno','coluno','required|max_length[1000]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['pruebamoduledos_coluno']        = $this->input->post('pruebamoduledos_coluno');

		if ($type == 'insert')
		{
			$id = $this->pruebamoduledos_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->pruebamoduledos_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}