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
        $data['sac_proporcional'] = $this->calculoSACProporcional($sueldo_real);
        $data['ley_25323_1'] = $this->calculoLey25324Art1($data);
        $data['ley_25323_2'] = $this->calculoLey25324Art2($data);
        $data['ley_24013_8'] = $this->calculoLey24013Art8($sueldo_real, $fecha_ingreso_real, $fecha_egreso);
        $data['ley_24013_9'] = $this->calculoLey24013Art9($sueldo_real, $fecha_ingreso_real, $fecha_ingreso_false);
        $data['ley_24013_10'] = $this->calculoLey24013Art10($sueldo_real, $sueldo_falsa, $fecha_ingreso_real, $fecha_egreso);
        $data['ley_24013_15'] = $this->calculoLey24013Art15($data);
        $data['ley_20744_80'] = $this->calculoLey20744Art80($sueldo_real);
        $data['ley_20744_132_bis'] = $this->calculoLey20744Art132Bis($sueldo_real, $fecha_egreso, $fecha_presentacion_demanda);
        $data['ley_20744_182'] = $this->calculoLey20744Art182($sueldo_real);
        $data['horas_extraordinarias_al_50'] = $this->calculoHorasExtraordinariasAl50porciento($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso);
        $data['horas_extraordinarias_al_100'] = $this->calculoHorasExtraordinariasAl100porciento($sueldo_real, $hora_finde_min, $hora_finde_max, $fecha_ingreso_real, $fecha_egreso);
        $data['horas_nocturnas'] = $this->calculoHorasNocturnas($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso);
        $data['diferencias_salariales_por_categoria'] = $this->calculoDiferenciasSalarialesPorCategoria($sueldo_real, $sueldo_falsa, $fecha_ingreso_real,$fecha_egreso);
        






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

        $d1 = strtotime(strtok($fecha_egreso, '-') . "-01-01");
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24)) + 1;
        return $count_days * $valor_dia;
    }

    public function calculoVacacionesCompletas($sueldo, $fecha_ingreso, $fecha_egreso) {
        $valor_dia = $sueldo / 25;

        $d1 = strtotime($fecha_ingreso);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));

        if ($count_days >= 180 && $count_days < 360 * 5) {
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

        $d1 = strtotime(strtok($fecha_egreso, '-') . "-01-01");
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days2 = floor($datediff / (60 * 60 * 24)) + 1;

        $d1 = strtotime($fecha_ingreso);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));

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

    public function calculoSACProporcional($sueldo) {
        return -1;
    }

    public function calculoLey25324Art1($data) {
        return $data['antiguedad'];
    }

    public function calculoLey25324Art2($data) {
        return ($data['antiguedad'] + $data['preaviso'] + $data['integracion']) / 2;
    }

    public function calculoLey24013Art8($sueldo, $fecha_ingreso, $fecha_egreso) {
        $d1 = strtotime($fecha_ingreso);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));
        return ($sueldo / 30 * $count_days) / 4;
    }

    public function calculoLey24013Art9($sueldo, $fecha_ingreso_real, $fecha_ingreso_false) {
        $d1 = strtotime($fecha_ingreso_real);
        $d2 = strtotime($fecha_ingreso_false);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));

        $valor_dia = $sueldo / 30;

        return (373 * $valor_dia) / 4;
    }

    public function calculoLey24013Art10($sueldo_real, $sueldo_falsa, $fecha_ingreso, $fecha_egreso) {
        $dif = ($sueldo_real - $sueldo_falsa) / 30;

        $d1 = strtotime($fecha_ingreso);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));

        if ($count_days >= 180 && $count_days < 360 * 5) {
            return ($dif * 14) / 4;
        } else if ($count_days >= 360 * 5 && $count_days < 360 * 10) {
            return ($dif * 21) / 4;
        } else if ($count_days >= 360 * 10 && $count_days < 360 * 20) {
            return ($dif * 28) / 4;
        } else if ($count_days >= 360 * 20) {
            return ($dif * 35) / 4;
        } else {
            return 0;
        }
    }

    public function calculoLey24013Art15($data) {
        return $data['antiguedad'] + $data['preaviso'] + $data['integracion'];
    }

    public function calculoLey20744Art80($sueldo) {
        return $sueldo * 3;
    }

    public function calculoLey20744Art132bis($sueldo, $fecha_egreso, $fecha_presentacion_demanda) {
        $valor_dia = $sueldo / 30;

        $d1 = strtotime($fecha_egreso);
        $d2 = strtotime($fecha_presentacion_demanda);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));

        return $count_days * $valor_dia;
    }

    public function calculoLey20744Art182($sueldo_real) {
        return $sueldo_real * 12;
    }

    public function calculoHorasExtraordinariasAl50porciento($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso) {
        $valor_hora = (($sueldo_real / 30) / 8) * 1.5;
        $cant_horas_extras = ($hora_max - $hora_min) - 8;

        $d1 = strtotime($fecha_ingreso_real);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_months = floor($datediff / (60 * 60 * 24 * 30));

        return $count_months * 4 * 5 * $cant_horas_extras * $valor_hora;
    }

    public function calculoHorasExtraordinariasAl100porciento($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso) {
        $valor_hora = (($sueldo_real / 30) / 8) * 2;
        if ($hora_min <= 13) {
            $cant_horas_extras = ($hora_max - 13);
        } else {
            $cant_horas_extras = ($hora_max - $hora_min);
        }


        $d1 = strtotime($fecha_ingreso_real);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_months = floor($datediff / (60 * 60 * 24 * 30));

        return $count_months * 4 * $cant_horas_extras * $valor_hora;
    }

    public function calculoHorasNocturnas($sueldo_real, $hora_min, $hora_max, $fecha_ingreso_real, $fecha_egreso) {
        $valor_minuto = (($sueldo_real / 30) / 8) / 60;

        if (($hora_min >= 0 && $hora_min < 6) || ($hora_max >= 21 && $hora_max <= 24)) {
            $d1 = strtotime($fecha_ingreso_real);
            $d2 = strtotime($fecha_egreso);
            $datediff = $d2 - $d1;
            $count_months = floor($datediff / (60 * 60 * 24 * 30));

            if ($hora_min >= 0 && $hora_min < 6) {
                return (6 - $hora_min) * 8 * $valor_minuto * $count_months;
            } else if ($hora_max >= 21 && $hora_max <= 24) {
                return (24 - $hora_max) * 8 * $valor_minuto * $count_months;
            }
        }

        return 0;
    }
    
    public function calculoDiferenciasSalarialesPorCategoria($sueldo_real, $sueldo_falsa, $fecha_ingreso_real,$fecha_egreso){
        $dif = ($sueldo_real - $sueldo_falsa)/30;
        
        $d1 = strtotime($fecha_ingreso_real);
        $d2 = strtotime($fecha_egreso);
        $datediff = $d2 - $d1;
        $count_days = floor($datediff / (60 * 60 * 24));
        
        return $count_days * $dif;
    }

    //--------------------------------------------------------------------
}

//end class