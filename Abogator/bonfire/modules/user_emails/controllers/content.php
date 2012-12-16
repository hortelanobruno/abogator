<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('User_Emails.Content.View');
		$this->load->model('user_emails_model', null, true);
		$this->lang->load('user_emails');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css('jquery-ui-timepicker.css');
			Assets::add_js('jquery-ui-timepicker-addon.js');
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
					$result = $this->user_emails_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('user_emails_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('user_emails_delete_failure') . $this->user_emails_model->error, 'error');
				}
			}
		}

		$records = $this->user_emails_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage User Emails');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a User Emails object.
	*/
	public function create()
	{
		$this->auth->restrict('User_Emails.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_user_emails())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('user_emails_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'user_emails');

				Template::set_message(lang('user_emails_create_success'), 'success');
				redirect(SITE_AREA .'/content/user_emails');
			}
			else
			{
				Template::set_message(lang('user_emails_create_failure') . $this->user_emails_model->error, 'error');
			}
		}
		Assets::add_module_js('user_emails', 'user_emails.js');

		Template::set('toolbar_title', lang('user_emails_create') . ' User Emails');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of User Emails data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('user_emails_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/user_emails');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('User_Emails.Content.Edit');

			if ($this->save_user_emails('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('user_emails_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'user_emails');

				Template::set_message(lang('user_emails_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('user_emails_edit_failure') . $this->user_emails_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('User_Emails.Content.Delete');

			if ($this->user_emails_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('user_emails_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'user_emails');

				Template::set_message(lang('user_emails_delete_success'), 'success');

				redirect(SITE_AREA .'/content/user_emails');
			} else
			{
				Template::set_message(lang('user_emails_delete_failure') . $this->user_emails_model->error, 'error');
			}
		}
		Template::set('user_emails', $this->user_emails_model->find($id));
		Assets::add_module_js('user_emails', 'user_emails.js');

		Template::set('toolbar_title', lang('user_emails_edit') . ' User Emails');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_user_emails()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_user_emails($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('user_emails_email','email','required|max_length[200]');
		$this->form_validation->set_rules('user_emails_fecha','fecha','required');
		$this->form_validation->set_rules('user_emails_sistema','sistema','required|max_length[200]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['user_emails_email']        = $this->input->post('user_emails_email');
		$data['user_emails_fecha']        = $this->input->post('user_emails_fecha') ? $this->input->post('user_emails_fecha') : '0000-00-00 00:00:00';
		$data['user_emails_sistema']        = $this->input->post('user_emails_sistema');

		if ($type == 'insert')
		{
			$id = $this->user_emails_model->insert($data);

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
			$return = $this->user_emails_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}