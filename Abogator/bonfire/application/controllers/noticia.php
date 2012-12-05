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
class Noticia extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('noticias_model');
    }

    /**
     * Displays the homepage of the Bonfire app
     *
     * @return void
     */
    public function index($idnoticia) {
        $result = $this->noticias_model->get_noticia($idnoticia);
        $data['noticia'] = $result[0];
        $this->load->view('home/template/top');
        $this->load->view('noticia/index', $data);
        $this->load->view('home/template/bottom');
    }


//end index()
    //--------------------------------------------------------------------
}

//end class