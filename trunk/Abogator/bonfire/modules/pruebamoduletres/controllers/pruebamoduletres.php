<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class pruebamoduletres extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('pruebamoduletres_model', null, true);
		$this->lang->load('pruebamoduletres');
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		$records = $this->pruebamoduletres_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------




}