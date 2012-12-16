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

    public function __construct() {
        parent::__construct();
        $this->load->model('noticias_model');
        $this->load->model('email_model');
        $this->load->library('emailer/emailer');
    }

    /**
     * Displays the homepage of the Bonfire app
     *
     * @return void
     */
    public function index() {
        $data['noticias'] = $this->noticias_model->get_all_noticias();
        $this->load->view('home/template/top');
        $this->load->view('home/index', $data);
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
    
    public function savemail(){
        foreach ($this->input->post() as $name => $value) {
            $data[$name] = $value;
        }
        $this->email_model->save_email($data['email'],'recibo');
        $data['enviado'] = 'Enviado!';
        $this->load->view('home/template/top');
        $this->load->view('home/recibo',$data);
        $this->load->view('home/template/bottom');
    }

    public function generarliquidacion() {
        foreach ($this->input->post() as $name => $value) {
            $data[$name] = $value;
        }
        $this->email_model->save_email($data['email'],'liquidacion');
        $this->load->view('home/liquidacion-reporte', $data);
    }

    public function noticia() {
        $this->load->view('home/template/top');
        $this->load->view('home/noticia');
        $this->load->view('home/template/bottom');
    }

    public function sendmail() {
        foreach ($this->input->post() as $name => $value) {
            $data[$name] = $value;
        }
        $data = array(
            'to' => 'contacto@abogadodelrey.com.ar', // either string or array
            'subject' => 'Mensaje de ' . $data['nombre'], // string
            'message' => '<div>Nombre: ' . $data['nombre'] . '</div><br/><div>Email: ' . $data['email'] . '</div><br/><div>Telefono: ' . $data['telefono'] . '</div><br/><div>Consulta: ' . $data['consulta'].'</div><br/><br/>', // string
            'alt_message' => ''       // optional (text alt to html email)
        );
        $this->emailer->send($data);
        $data['enviado'] = 'Enviado!';
        $this->load->view('home/template/top');
        $this->load->view('home/contacto',$data);
        $this->load->view('home/template/bottom');
    }

    //--------------------------------------------------------------------
}

//end class