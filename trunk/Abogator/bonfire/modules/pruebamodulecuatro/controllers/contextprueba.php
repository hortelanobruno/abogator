<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class contextprueba extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('PruebaModuleCuatro.Contextprueba.View');
		$this->load->model('pruebamodulecuatro_model', null, true);
		$this->lang->load('pruebamodulecuatro');
		
			Assets::add_js(Template::theme_url('js/editors/ckeditor/ckeditor.js'));
		Template::set_block('sub_nav', 'contextprueba/_sub_nav');
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
					$result = $this->pruebamodulecuatro_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('pruebamodulecuatro_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('pruebamodulecuatro_delete_failure') . $this->pruebamodulecuatro_model->error, 'error');
				}
			}
		}

		$records = $this->pruebamodulecuatro_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage PruebaModuleCuatro');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a PruebaModuleCuatro object.
	*/
	public function create()
	{
		$this->auth->restrict('PruebaModuleCuatro.Contextprueba.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_pruebamodulecuatro())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamodulecuatro_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'pruebamodulecuatro');

				Template::set_message(lang('pruebamodulecuatro_create_success'), 'success');
				redirect(SITE_AREA .'/contextprueba/pruebamodulecuatro');
			}
			else
			{
				Template::set_message(lang('pruebamodulecuatro_create_failure') . $this->pruebamodulecuatro_model->error, 'error');
			}
		}
		Assets::add_module_js('pruebamodulecuatro', 'pruebamodulecuatro.js');

		Template::set('toolbar_title', lang('pruebamodulecuatro_create') . ' PruebaModuleCuatro');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of PruebaModuleCuatro data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('pruebamodulecuatro_invalid_id'), 'error');
			redirect(SITE_AREA .'/contextprueba/pruebamodulecuatro');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('PruebaModuleCuatro.Contextprueba.Edit');

			if ($this->save_pruebamodulecuatro('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamodulecuatro_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pruebamodulecuatro');

				Template::set_message(lang('pruebamodulecuatro_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('pruebamodulecuatro_edit_failure') . $this->pruebamodulecuatro_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('PruebaModuleCuatro.Contextprueba.Delete');

			if ($this->pruebamodulecuatro_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('pruebamodulecuatro_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pruebamodulecuatro');

				Template::set_message(lang('pruebamodulecuatro_delete_success'), 'success');

				redirect(SITE_AREA .'/contextprueba/pruebamodulecuatro');
			} else
			{
				Template::set_message(lang('pruebamodulecuatro_delete_failure') . $this->pruebamodulecuatro_model->error, 'error');
			}
		}
		Template::set('pruebamodulecuatro', $this->pruebamodulecuatro_model->find($id));
		Assets::add_module_js('pruebamodulecuatro', 'pruebamodulecuatro.js');

		Template::set('toolbar_title', lang('pruebamodulecuatro_edit') . ' PruebaModuleCuatro');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_pruebamodulecuatro()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_pruebamodulecuatro($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('pruebamodulecuatro_coluno','coluno','required');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['pruebamodulecuatro_coluno']        = $this->input->post('pruebamodulecuatro_coluno');

		if ($type == 'insert')
		{
			$id = $this->pruebamodulecuatro_model->insert($data);

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
			$return = $this->pruebamodulecuatro_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}