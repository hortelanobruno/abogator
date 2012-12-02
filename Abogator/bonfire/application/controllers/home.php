<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2012, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * Home controller
 *
 * The base controller which displays the homepage of the Bonfire site.
 *
 * @package    Bonfire
 * @subpackage Controllers
 * @category   Controllers
 * @author     Bonfire Dev Team
 * @link       http://guides.cibonfire.com/helpers/file_helpers.html
 *
 */
class Home extends Front_Controller {

    /**
     * Displays the homepage of the Bonfire app
     *
     * @return void
     */
    public function index() {
        $this->load->view('home/template/top');
        $this->load->view('home/index');
        $this->load->view('home/template/bottom');
    }
    
    public function recibo() {
        $this->load->view('home/template/top');
        $this->load->view('home/recibo');
        $this->load->view('home/template/bottom');
    }
    
    public function liquidacion() {
        $this->load->view('home/template/top');
        $this->load->view('home/liquidacion');
        $this->load->view('home/template/bottom');
    }
    
    public function escritos() {
        $this->load->view('home/template/top');
        $this->load->view('home/escritos');
        $this->load->view('home/template/bottom');
    }
    
    public function estudio() {
        $this->load->view('home/template/top');
        $this->load->view('home/estudio');
        $this->load->view('home/template/bottom');
    }
    
    public function contacto() {
        $this->load->view('home/template/top');
        $this->load->view('home/contacto');
        $this->load->view('home/template/bottom');
    }
    
    public function generarliquidacion() {
        
        foreach($this->input->post() as $name=>$value){
            $data[$name] = $value;
        }
        $this->load->view('home/liquidacion-reporte',$data);
    }

 
    //--------------------------------------------------------------------
}

//end class