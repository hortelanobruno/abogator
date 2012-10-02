<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class pruebamoduledos extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('pruebamoduledos_model', null, true);
		$this->lang->load('pruebamoduledos');
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		$records = $this->pruebamoduledos_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------




}