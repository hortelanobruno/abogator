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
//        Template::render();

        $data = $this->calcularLiquidacion();
        $this->load->view('home/index', $data);
    }

//end index()

    public function calcularLiquidacion() {
        $sueldo = 5000;
        $fecha_ingreso = "2008-12-26";
        $fecha_egreso = "2011-12-26";

        $data['antiguedad'] = $this->calculoAntiguedad($sueldo, $fecha_ingreso, $fecha_egreso);
        $data['preaviso'] = $this->calculoPreaviso($sueldo, $fecha_ingreso, $fecha_egreso);
        $data['integracion'] = $this->calculoIntegracion($sueldo, $fecha_egreso);
        $data['sac1'] = $this->calculoSACMasIntegracionMasPreavisoMasIntegracion($data);
        $data['dias_trabajados'] = $this->calculoDiasTrabajados();
        $data['vacaciones_completas'] = $this->calculoVacacionesCompletas($sueldo, $fecha_ingreso, $fecha_egreso);
        $data['vacaciones_proporcionales'] = $this->calculoVacacionesProporcionales($sueldo, $fecha_ingreso, $fecha_egreso);
        
        
        return $data;
    }

    public function calculoAntiguedad($sueldo, $fecha_ingreso, $fecha_egreso) {
        $d1 = strtotime($fecha_ingreso);
        $d2 = strtotime($fecha_egreso);
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);
        $count_month = 0;
        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $count_month++;
        }
        if ($count_month >= 3) {
            $result = $count_month / 12;
            $resto = $count_month % 12;
            if ($resto >= 3) {
                $result = result + 1;
            }
            return $result * $sueldo;
        } else {
            return 0;
        }
    }

    public function calculoPreaviso($sueldo, $fecha_ingreso, $fecha_egreso) {
        $d1 = strtotime($fecha_ingreso);
        $d2 = strtotime($fecha_egreso);
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);
        $count_month = 0;
        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $count_month++;
        }
        if ($count_month >= 3) {
            if ($count_month >= 5 * 12) {
                return $sueldo * 2;
            } else {
                return $sueldo;
            }
        } else {
            return 0;
        }
    }

    public function calculoIntegracion($sueldo, $fecha_egreso) {
        $valor_dia = $sueldo / 30;

        $days_in_month = date("t", strtotime($fecha_egreso));
        $day = date("d", strtotime($fecha_egreso));
        $resto = $days_in_month - $day;
        if ($resto > 0) {
            return $resto * $valor_dia;
        } else {
            return 0;
        }
    }

    public function calculoSACMasIntegracionMasPreavisoMasIntegracion($data) {
        return ($data['antiguedad'] + $data['preaviso'] + $data['integracion']) / 12;
    }

    public function calculoDiasTrabajados() {
        return -1;
    }

    public function calculoVacacionesCompletas($sueldo, $fecha_ingreso, $fecha_egreso) {
        $valor_dia = $sueldo / 25;

        $d1 = strtotime($fecha_ingreso);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));
        
        if($count_days>=180 && $count_days < 360*5){
            return $valor_dia * 14;
        } else if($count_days >= 360*5 && $count_days < 360*10){
            return $valor_dia * 21;
        } else if($count_days >= 360*10 && $count_days < 360*20){
            return $valor_dia * 28;
        } else if($count_days >= 360*20){
            return $valor_dia * 35;
        }else{
            return 0;
        }
        
    }

    public function calculoVacacionesProporcionales($sueldo, $fecha_ingreso, $fecha_egreso) {
        $valor_dia = $sueldo / 25;

        $d1 = strtotime($fecha_ingreso);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));
        
        if($count_days<180){
            return -1;
        }else{
            return 0;
        }
    }
    //--------------------------------------------------------------------
}

//end class