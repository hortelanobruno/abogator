<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Noticias.Settings.View');
		$this->load->model('noticias_model', null, true);
		$this->lang->load('noticias');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css(Template::theme_url('js/editors/markitup/skins/markitup/style.css'));
			Assets::add_css(Template::theme_url('js/editors/markitup/sets/default/style.css'));

			Assets::add_js(Template::theme_url('js/editors/markitup/jquery.markitup.js'));
			Assets::add_js(Template::theme_url('js/editors/markitup/sets/default/set.js'));
		Template::set_block('sub_nav', 'settings/_sub_nav');
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
					$result = $this->noticias_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('noticias_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('noticias_delete_failure') . $this->noticias_model->error, 'error');
				}
			}
		}

		$records = $this->noticias_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Noticias');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Noticias object.
	*/
	public function create()
	{
		$this->auth->restrict('Noticias.Settings.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_noticias())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('noticias_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'noticias');

				Template::set_message(lang('noticias_create_success'), 'success');
				redirect(SITE_AREA .'/settings/noticias');
			}
			else
			{
				Template::set_message(lang('noticias_create_failure') . $this->noticias_model->error, 'error');
			}
		}
		Assets::add_module_js('noticias', 'noticias.js');

		Template::set('toolbar_title', lang('noticias_create') . ' Noticias');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Noticias data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('noticias_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/noticias');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Noticias.Settings.Edit');

			if ($this->save_noticias('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('noticias_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'noticias');

				Template::set_message(lang('noticias_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('noticias_edit_failure') . $this->noticias_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Noticias.Settings.Delete');

			if ($this->noticias_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('noticias_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'noticias');

				Template::set_message(lang('noticias_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/noticias');
			} else
			{
				Template::set_message(lang('noticias_delete_failure') . $this->noticias_model->error, 'error');
			}
		}
		Template::set('noticias', $this->noticias_model->find($id));
		Assets::add_module_js('noticias', 'noticias.js');

		Template::set('toolbar_title', lang('noticias_edit') . ' Noticias');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_noticias()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_noticias($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('noticias_titulo','titulo','required|max_length[1000]');
		$this->form_validation->set_rules('noticias_fecha','fecha','required');
		$this->form_validation->set_rules('noticias_texto','texto','required');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['noticias_titulo']        = $this->input->post('noticias_titulo');
		$data['noticias_fecha']        = $this->input->post('noticias_fecha') ? $this->input->post('noticias_fecha') : '0000-00-00';
		$data['noticias_texto']        = $this->input->post('noticias_texto');

		if ($type == 'insert')
		{
			$id = $this->noticias_model->insert($data);

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
			$return = $this->noticias_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}