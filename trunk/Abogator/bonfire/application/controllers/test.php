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
 * Test controller
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
class Test extends Front_Controller {

    /**
     * Displays the homepage of the Bonfire app
     *
     * @return void
     */
    public function index() {
//        Template::render();

        $data = $this->calcularLiquidacion();
        $this->load->view('test/index', $data);
    }

    public function prueba() {
//        Template::render();

        $data = $this->calcularLiquidacion();
        $this->load->view('test/prueba', $data);
    }
    
    public function testpdf() {
        $this->load->view('test/testpdf');
    }
    
    public function slider() {
        $this->load->view('test/slider');
    }
    
    public function slider2() {
        $this->load->view('test/slider2');
    }

    public function recibo() {
        Assets::add_js('recibo.js');
        $this->load->view('test/recibo');
    }
    
    public function liquidacion() {
        Assets::add_js('liquidacion.js');
        $this->load->view('test/liquidacion');
    }

//end index()

    public function calcularLiquidacion() {
        $sueldo_real = 2000;
        $sueldo_falsa = 1000;
        $fecha_ingreso_real = "2010-01-01";
        $fecha_ingreso_false = "2011-01-01";
        $fecha_egreso = "2012-01-13";
        $fecha_presentacion_demanda = "2013-01-13";
        $hora_min = 8;
        $hora_max = 18;
        $hora_finde_min = 10;
        $hora_finde_max = 16;

        $data['antiguedad'] = $this->calculoAntiguedad($sueldo_real, $fecha_ingreso_real, $fecha_egreso);
        $data['preaviso'] = $this->calculoPreaviso($sueldo_real, $fecha_ingreso_real, $fecha_egreso);
        $data['integracion'] = $this->calculoIntegracion($sueldo_real, $fecha_egreso);
        $data['sac1'] = $this->calculoSACMasIntegracionMasPreavisoMasIntegracion($data);
        $data['dias_trabajados'] = $this->calculoDiasTrabajados($sueldo_real, $fecha_egreso);
        $data['vacaciones_completas'] = $this->calculoVacacionesCompletas($sueldo_real, $fecha_ingreso_real, $fecha_egreso);
        $data['vacaciones_proporcionales'] = $this->calculoVacacionesProporcionales($sueldo_real, $fecha_ingreso_real, $fecha_egreso);
        $data['sac_sobre_vacaciones_completas'] = $this->calculoSACSobreVacacionesCompletas($data);
        $data['sac_sobre_vacaciones_proporcionales'] = $this->calculoSACSobreVacacionesProporcionales($data);
        $data['sac'] = $this->calculoSAC($sueldo_real);
        $data['sac_proporcional'] = $this->calculoSACProporcional($sueldo_real, $fecha_egreso);
        $data['ley_25323_1'] = $this->calculoLey25324Art1($data);
        $data['ley_25323_2'] = $this->calculoLey25324Art2($data);
        $data['ley_24013_8'] = $this->calculoLey24013Art8($sueldo_real, $fecha_ingreso_real, $fecha_egreso);
        $data['ley_24013_9'] = $this->calculoLey24013Art9($sueldo_real, $fecha_ingreso_real, $fecha_ingreso_false);
        $data['ley_24013_10'] = $this->calculoLey24013Art10($sueldo_real, $sueldo_falsa, $fecha_ingreso_false, $fecha_egreso);
        $data['ley_24013_15'] = $this->calculoLey24013Art15($data);
        $data['ley_20744_80'] = $this->calculoLey20744Art80($sueldo_real);
        $data['ley_20744_132_bis'] = $this->calculoLey20744Art132Bis($sueldo_real, $fecha_egreso, $fecha_presentacion_demanda);
        $data['ley_20744_182'] = $this->calculoLey20744Art182($sueldo_real);
        $data['horas_extraordinarias_al_50'] = $this->calculoHorasExtraordinariasAl50porciento($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso);
        $data['horas_extraordinarias_al_100'] = $this->calculoHorasExtraordinariasAl100porciento($sueldo_real, $hora_finde_min, $hora_finde_max, $fecha_ingreso_real, $fecha_egreso);
        $data['horas_nocturnas'] = $this->calculoHorasNocturnas($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso);
        $data['diferencias_salariales_por_categoria'] = $this->calculoDiferenciasSalarialesPorCategoria($sueldo_real, $sueldo_falsa, $fecha_ingreso_real, $fecha_egreso);

        $data['test'] = $this->countDaysBetweenDates($fecha_ingreso_real, $fecha_egreso);

        return $data;
    }

    public function countDaysBetweenDates($date1, $date2) {
        $day1 = date("d", strtotime($date1));
        $day2 = date("d", strtotime($date2));

        $d1 = strtotime($date1);
        $d2 = strtotime($date2);
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);
        $i = 0;

        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $i++;
        }

        $days = ($i - 1) * 30 + (30 - $day1 + 1) + $day2;

        return $days; // 8
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

        $days_in_month = 30; //date("t", strtotime($fecha_egreso));
        $day = date("d", strtotime($fecha_egreso));
        $resto = $days_in_month - ($day + 1);
        if ($resto > 0) {
            return $resto * $valor_dia;
        } else {
            return 0;
        }
    }

    public function calculoSACMasIntegracionMasPreavisoMasIntegracion($data) {
        return ($data['antiguedad'] + $data['preaviso'] + $data['integracion']) / 12;
    }

    public function calculoDiasTrabajados($sueldo, $fecha_egreso) {
        $valor_dia = $sueldo / 30;

//        $d1 = strtotime(strtok($fecha_egreso, '-') . "-01-01");
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24)) + 1;

        $count_days = $this->countDaysBetweenDates(strtok($fecha_egreso, '-') . "-01-01", $fecha_egreso);
        return $count_days * $valor_dia;
    }

    public function calculoVacacionesCompletas($sueldo, $fecha_ingreso, $fecha_egreso) {
        $valor_dia = $sueldo / 25;

//        $d1 = strtotime($fecha_ingreso);
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24));

        $count_days = $this->countDaysBetweenDates($fecha_ingreso, $fecha_egreso);

        if ($count_days >= 180 && $count_days < 360 * 5) {
            if ($count_days < 360) {
                $year1 = date("Y", strtotime($date1));
                $year2 = date("Y", strtotime($date2));
                if ($year1 <> $year2) {
                    //se calcula proporcional
                    return $this->calculoVacacionesProporcionales($sueld, $fecha_ingreso, strtok($fecha_egreso, '-') . "-12-30");
                }
            }
            return $valor_dia * 14;
        } else if ($count_days >= 360 * 5 && $count_days < 360 * 10) {
            return $valor_dia * 21;
        } else if ($count_days >= 360 * 10 && $count_days < 360 * 20) {
            return $valor_dia * 28;
        } else if ($count_days >= 360 * 20) {
            return $valor_dia * 35;
        } else {
            return 0;
        }
    }

    public function calculoVacacionesProporcionales($sueldo, $fecha_ingreso, $fecha_egreso) {
        $valor_dia = $sueldo / 25;

//        $d1 = strtotime(strtok($fecha_egreso, '-') . "-01-01");
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_days2 = floor($datediff / (60 * 60 * 24)) + 1;
        $count_days2 = $this->countDaysBetweenDates(strtok($fecha_egreso, '-') . "-01-01", $fecha_egreso);

//        $d1 = strtotime($fecha_ingreso);
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24));
        $count_days = $this->countDaysBetweenDates($fecha_ingreso, $fecha_egreso);

        if ($count_days >= 180 && $count_days < 360 * 5) {
            return $valor_dia * ((14 * $count_days2) / 360);
        } else if ($count_days >= 360 * 5 && $count_days < 360 * 10) {
            return $valor_dia * ((21 * $count_days2) / 360);
        } else if ($count_days >= 360 * 10 && $count_days < 360 * 20) {
            return $valor_dia * ((28 * $count_days2) / 360);
        } else if ($count_days >= 360 * 20) {
            return $valor_dia * ((35 * $count_days2) / 360);
        } else {
            return 0;
        }
    }

    public function calculoSACSobreVacacionesCompletas($data) {
        return $data['vacaciones_completas'] / 12;
    }

    public function calculoSACSobreVacacionesProporcionales($data) {
        return $data['vacaciones_proporcionales'] / 12;
    }

    public function calculoSAC($sueldo) {
        return $sueldo / 2;
    }

    public function calculoSACProporcional($sueldo, $fecha_egreso) {
        $valor_dia = $sueldo / 30;

//        $d1 = strtotime(strtok($fecha_egreso, '-') . "-01-01");
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24)) + 1;
        $count_days = $this->countDaysBetweenDates(strtok($fecha_egreso, '-') . "-01-01", $fecha_egreso);

        return ($valor_dia * $count_days ) / 360;
    }

    public function calculoLey25324Art1($data) {
        return $data['antiguedad'];
    }

    public function calculoLey25324Art2($data) {
        return ($data['antiguedad'] + $data['preaviso'] + $data['integracion']) / 2;
    }

    public function calculoLey24013Art8($sueldo, $fecha_ingreso, $fecha_egreso) {
//        $d1 = strtotime($fecha_ingreso);
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24));
        $count_days = $this->countDaysBetweenDates($fecha_ingreso, $fecha_egreso);
        return ($sueldo / 30 * $count_days) / 4;
    }

    public function calculoLey24013Art9($sueldo, $fecha_ingreso_real, $fecha_ingreso_false) {
//        $d1 = strtotime($fecha_ingreso_real);
//        $d2 = strtotime($fecha_ingreso_false);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24));
        $count_days = $this->countDaysBetweenDates($fecha_ingreso_real, $fecha_ingreso_false);

        $valor_dia = $sueldo / 30;

        return ($count_days * $valor_dia) / 4;
    }

    public function calculoLey24013Art10($sueldo_real, $sueldo_falsa, $fecha_ingreso, $fecha_egreso) {
        $dif = ($sueldo_real - $sueldo_falsa) / 30;

//        $d1 = strtotime($fecha_ingreso);
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24));
        $count_days = $this->countDaysBetweenDates($fecha_ingreso, $fecha_egreso);

        return ($count_days * $dif) / 4;
    }

    public function calculoLey24013Art15($data) {
        return $data['antiguedad'] + $data['preaviso'] + $data['integracion'];
    }

    public function calculoLey20744Art80($sueldo) {
        return $sueldo * 3;
    }

    public function calculoLey20744Art132bis($sueldo, $fecha_egreso, $fecha_presentacion_demanda) {
        $valor_dia = $sueldo / 30;

//        $d1 = strtotime($fecha_egreso);
//        $d2 = strtotime($fecha_presentacion_demanda);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24));
        $count_days = $this->countDaysBetweenDates($fecha_egreso, $fecha_presentacion_demanda);

        return $count_days * $valor_dia;
    }

    public function calculoLey20744Art182($sueldo_real) {
        return $sueldo_real * 12;
    }

    public function calculoHorasExtraordinariasAl50porciento($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso) {
        $valor_hora = (($sueldo_real / 30) / 8) * 1.5;
        $cant_horas_extras = ($hora_max - $hora_min) - 8;

//        $d1 = strtotime($fecha_ingreso_real);
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_months = floor($datediff / (60 * 60 * 24 * 30));

        $d1 = strtotime($fecha_ingreso_real);
        $d2 = strtotime($fecha_egreso);
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);
        $count_months = 0;

        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $count_months++;
        }

        return $count_months * 4 * 5 * $cant_horas_extras * $valor_hora;
    }

    public function calculoHorasExtraordinariasAl100porciento($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso) {
        $valor_hora = (($sueldo_real / 30) / 8) * 2;
        if ($hora_min <= 13) {
            $cant_horas_extras = ($hora_max - 13);
        } else {
            $cant_horas_extras = ($hora_max - $hora_min);
        }


//        $d1 = strtotime($fecha_ingreso_real);
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_months = floor($datediff / (60 * 60 * 24 * 30));

        $d1 = strtotime($fecha_ingreso_real);
        $d2 = strtotime($fecha_egreso);
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);
        $count_months = 0;

        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $count_months++;
        }

        return $count_months * 4 * $cant_horas_extras * $valor_hora;
    }

    public function calculoHorasNocturnas($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso) {
        $valor_minuto = (($sueldo_real / 30) / 8) / 60;

        if (($hora_min >= 0 && $hora_min < 6) || ($hora_max >= 21 && $hora_max <= 24)) {
//            $d1 = strtotime($fecha_ingreso_real);
//            $d2 = strtotime($fecha_egreso);
//            $datediff = $d2 - $d1;
//            $count_months = floor($datediff / (60 * 60 * 24 * 30));
            $d1 = strtotime($fecha_ingreso_real);
            $d2 = strtotime($fecha_egreso);
            $min_date = min($d1, $d2);
            $max_date = max($d1, $d2);
            $count_months = 0;

            while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
                $count_months++;
            }

            if ($hora_min >= 0 && $hora_min < 6) {
                return (6 - $hora_min) * 8 * $valor_minuto * $count_months;
            } else if ($hora_max >= 21 && $hora_max <= 24) {
                return (24 - $hora_max) * 8 * $valor_minuto * $count_months;
            }
        }

        return 0;
    }

    public function calculoDiferenciasSalarialesPorCategoria($sueldo_real, $sueldo_falsa, $fecha_ingreso_real, $fecha_egreso) {
        $dif = ($sueldo_real - $sueldo_falsa) / 30;

//        $d1 = strtotime($fecha_ingreso_real);
//        $d2 = strtotime($fecha_egreso);
//        $datediff = $d2 - $d1;
//        $count_days = floor($datediff / (60 * 60 * 24));
        $count_days = $this->countDaysBetweenDates($fecha_ingreso_real, $fecha_egreso);

        return $count_days * $dif;
    }

    //--------------------------------------------------------------------
}

//end class