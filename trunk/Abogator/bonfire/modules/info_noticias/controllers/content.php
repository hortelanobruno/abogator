<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Info_Noticias.Content.View');
		$this->load->model('info_noticias_model', null, true);
		$this->lang->load('info_noticias');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
                        Assets::add_js(Template::theme_url('js/editors/ckeditor/ckeditor.js'));
//			Assets::add_css(Template::theme_url('js/editors/markitup/skins/markitup/style.css'));
//			Assets::add_css(Template::theme_url('js/editors/markitup/sets/default/style.css'));
//
//			Assets::add_js(Template::theme_url('js/editors/markitup/jquery.markitup.js'));
//			Assets::add_js(Template::theme_url('js/editors/markitup/sets/default/set.js'));
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
					$result = $this->info_noticias_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('info_noticias_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('info_noticias_delete_failure') . $this->info_noticias_model->error, 'error');
				}
			}
		}

		$records = $this->info_noticias_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Info Noticias');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Info Noticias object.
	*/
	public function create()
	{
		$this->auth->restrict('Info_Noticias.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_info_noticias())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('info_noticias_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'info_noticias');

				Template::set_message(lang('info_noticias_create_success'), 'success');
				redirect(SITE_AREA .'/content/info_noticias');
			}
			else
			{
				Template::set_message(lang('info_noticias_create_failure') . $this->info_noticias_model->error, 'error');
			}
		}
		Assets::add_module_js('info_noticias', 'info_noticias.js');

		Template::set('toolbar_title', lang('info_noticias_create') . ' Info Noticias');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Info Noticias data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('info_noticias_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/info_noticias');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Info_Noticias.Content.Edit');

			if ($this->save_info_noticias('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('info_noticias_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'info_noticias');

				Template::set_message(lang('info_noticias_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('info_noticias_edit_failure') . $this->info_noticias_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Info_Noticias.Content.Delete');

			if ($this->info_noticias_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('info_noticias_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'info_noticias');

				Template::set_message(lang('info_noticias_delete_success'), 'success');

				redirect(SITE_AREA .'/content/info_noticias');
			} else
			{
				Template::set_message(lang('info_noticias_delete_failure') . $this->info_noticias_model->error, 'error');
			}
		}
		Template::set('info_noticias', $this->info_noticias_model->find($id));
		Assets::add_module_js('info_noticias', 'info_noticias.js');

		Template::set('toolbar_title', lang('info_noticias_edit') . ' Info Noticias');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_info_noticias()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_info_noticias($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('info_noticias_titulo','titulo','required|max_length[1000]');
		$this->form_validation->set_rules('info_noticias_fecha','fecha','required');
		$this->form_validation->set_rules('info_noticias_descripcion','descripcion','required|max_length[2000]');
		$this->form_validation->set_rules('info_noticias_contenido','contenido','required');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['titulo']        = $this->input->post('info_noticias_titulo');
		$data['fecha']        = $this->input->post('info_noticias_fecha') ? $this->input->post('info_noticias_fecha') : '0000-00-00';
		$data['descripcion']        = $this->input->post('info_noticias_descripcion');
		$data['contenido']        = $this->input->post('info_noticias_contenido');

		if ($type == 'insert')
		{
			$id = $this->info_noticias_model->insert($data);

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
			$return = $this->info_noticias_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}