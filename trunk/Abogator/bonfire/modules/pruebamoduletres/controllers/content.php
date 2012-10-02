<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('PruebaModuleTres.Content.View');
		$this->load->model('pruebamoduletres_model', null, true);
		$this->lang->load('pruebamoduletres');
		
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
					$result = $this->pruebamoduletres_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('pruebamoduletres_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('pruebamoduletres_delete_failure') . $this->pruebamoduletres_model->error, 'error');
				}
			}
		}

		$records = $this->pruebamoduletres_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage PruebaModuleTres');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a PruebaModuleTres object.
	*/
	public function create()
	{
		$this->auth->restrict('PruebaModuleTres.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_pruebamoduletres())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamoduletres_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'pruebamoduletres');

				Template::set_message(lang('pruebamoduletres_create_success'), 'success');
				redirect(SITE_AREA .'/content/pruebamoduletres');
			}
			else
			{
				Template::set_message(lang('pruebamoduletres_create_failure') . $this->pruebamoduletres_model->error, 'error');
			}
		}
		Assets::add_module_js('pruebamoduletres', 'pruebamoduletres.js');

		Template::set('toolbar_title', lang('pruebamoduletres_create') . ' PruebaModuleTres');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of PruebaModuleTres data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('pruebamoduletres_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/pruebamoduletres');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('PruebaModuleTres.Content.Edit');

			if ($this->save_pruebamoduletres('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamoduletres_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pruebamoduletres');

				Template::set_message(lang('pruebamoduletres_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('pruebamoduletres_edit_failure') . $this->pruebamoduletres_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('PruebaModuleTres.Content.Delete');

			if ($this->pruebamoduletres_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamoduletres_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pruebamoduletres');

				Template::set_message(lang('pruebamoduletres_delete_success'), 'success');

				redirect(SITE_AREA .'/content/pruebamoduletres');
			} else
			{
				Template::set_message(lang('pruebamoduletres_delete_failure') . $this->pruebamoduletres_model->error, 'error');
			}
		}
		Template::set('pruebamoduletres', $this->pruebamoduletres_model->find($id));
		Assets::add_module_js('pruebamoduletres', 'pruebamoduletres.js');

		Template::set('toolbar_title', lang('pruebamoduletres_edit') . ' PruebaModuleTres');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_pruebamoduletres()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_pruebamoduletres($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('pruebamoduletres_coluno','coluno','required|max_length[1000]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['pruebamoduletres_coluno']        = $this->input->post('pruebamoduletres_coluno');

		if ($type == 'insert')
		{
			$id = $this->pruebamoduletres_model->insert($data);

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
			$return = $this->pruebamoduletres_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}