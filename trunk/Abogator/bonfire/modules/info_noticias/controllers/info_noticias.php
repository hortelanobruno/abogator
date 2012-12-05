<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class info_noticias extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('info_noticias_model', null, true);
		$this->lang->load('info_noticias');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css(Template::theme_url('js/editors/markitup/skins/markitup/style.css'));
			Assets::add_css(Template::theme_url('js/editors/markitup/sets/default/style.css'));

			Assets::add_js(Template::theme_url('js/editors/markitup/jquery.markitup.js'));
			Assets::add_js(Template::theme_url('js/editors/markitup/sets/default/set.js'));
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		$records = $this->info_noticias_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------




}