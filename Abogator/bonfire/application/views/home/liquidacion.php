<script type="text/javascript" src="/assets/js/liquidacion.js"></script>
<script type="text/javascript" src="/assets/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/assets/js/jquery-ui-1.9.1.custom.min.js"></script>
<link rel="stylesheet" href="/assets/css/smoothness/jquery-ui-1.9.1.custom.min.css" />
<style type="text/css">
    .ui-datepicker{
        font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
        font-size: 62.5%;
    }
</style>
<div class="middle-liquidacion">
    <div class="title">
        <div class="icon"></div>
        <div class="text">Liquidacion final</div>
    </div>
    <div class="middle-content">
        <div class="col-datos">
            <div class="header">
                Completa los campos con tus datos
            </div>
            <div class="dato">
                <div class="label">
                    Nombre
                </div>
                <div class="element">
                    <input type="text" value="Bruno"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Email
                </div>
                <div class="element">
                    <input type="text" value="email@email.com"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Remuneracion (real)
                </div>
                <div class="element">
                    <input id="sueldo_real" type="text" value="2000" onchange="calculateLiquidacion()"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Fecha ingreso (real)
                </div>
                <div class="element">
                    <input id="fecha_ingreso_real" type="text" value="01/01/2010" onchange="calculateLiquidacion()" />
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Fecha egreso
                </div>
                <div class="element">
                    <input id="fecha_egreso" type="text" value="01/13/2012" onchange="calculateLiquidacion()"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Remuneracion (falsa)
                </div>
                <div class="element">
                    <input id="sueldo_falsa" type="text" value="1000" onchange="calculateLiquidacion()"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Fecha ingreso (falsa)
                </div>
                <div class="element">
                    <input id="fecha_ingerso_falsa" type="text" value="01/01/2011" onchange="calculateLiquidacion()"/>
                </div>
            </div>
            <div class="dato2">
                <div class="label">
                    Horarios de trabajo
                </div>
                <div class="element">
                    <div class="day">
                        <div class="check">
                            <input id="day1-check" type="checkbox" onchange="calculateLiquidacion()"/>Lunes
                        </div>
                        <div class="select">
                            <select id="mon1" onchange="calculateLiquidacion()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="mon2" onchange="calculateLiquidacion()"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input id="day2-check" type="checkbox" onchange="calculateLiquidacion()"/>Martes
                        </div>
                        <div class="select">
                            <select id="tue1" onchange="calculateLiquidacion()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="tue2" onchange="calculateLiquidacion()"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input id="day3-check" type="checkbox" onchange="calculateLiquidacion()"/>Miercoles
                        </div>
                        <div class="select">
                            <select id="wed1" onchange="calculateLiquidacion()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="wed2" onchange="calculateLiquidacion()"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input id="day4-check" type="checkbox" onchange="calculateLiquidacion()"/>Jueves
                        </div>
                        <div class="select">
                            <select id="thu1" onchange="calculateLiquidacion()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="thu2" onchange="calculateLiquidacion()"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input id="day5-check" type="checkbox" onchange="calculateLiquidacion()"/>Viernes
                        </div>
                        <div class="select">
                            <select id="fri1" onchange="calculateLiquidacion()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="fri2" onchange="calculateLiquidacion()"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input id="day6-check" type="checkbox" onchange="calculateLiquidacion()"/>Sabado
                        </div>
                        <div class="select">
                            <select id="sat1" onchange="calculateLiquidacion()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="sat2" onchange="calculateLiquidacion()"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input id="day7-check" type="checkbox" onchange="calculateLiquidacion()"/>Domingo
                        </div>
                        <div class="select">
                            <select id="sun1" onchange="calculateLiquidacion()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="sun2" onchange="calculateLiquidacion()"></select>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">                 
                    loadSelectDays();             
                </script>
            </div>
            <div class="dato">
                <div class="label">
                    Presentacion demanda
                </div>
                <div class="element">
                    <input id="fecha_presentacion_demanda" type="text" value="01/13/2013" onchange="calculateLiquidacion()"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Sueldo CCT
                </div>
                <div class="element">
                    <input id="sueldo_cct" type="text" value="3000" onchange="calculateLiquidacion()" />
                </div>
            </div>
            <script>
                $(function() {
                    $("#fecha_ingreso_real").datepicker();
                    $("#fecha_egreso").datepicker();
                    $("#fecha_ingerso_falsa").datepicker();
                    $("#fecha_presentacion_demanda").datepicker();
                });
            </script>
        </div>
        <div class="col-resultados">
            <div class="header">
                Resultado
            </div>
            <div class="seccion">
                Indemninazion por despido
            </div>
            <div class="result" id="result-antiguedad">
                <div class="label">Antiguedad</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-preaviso">
                <div class="label">Preaviso</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-integracion">
                <div class="label">Integracion</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-sac_pres_int">
                <div class="label">SAC S/ANT + PRE + INT</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-total1">
                <div class="label">Total</div>
                <div class="value">$2000</div>
            </div>
            <div class="seccion">
                Liquidacion final
            </div>
            <div class="result" id="result-dias_trabajados">
                <div class="label">Dias trabajados</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-vacaciones_completas">
                <div class="label">Vacaciones completas</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-vacaciones_proporcionales">
                <div class="label">Vacaciones proporcionales</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-sac_sobre_vacaciones_completas">
                <div class="label">SAC S/Vacaciones completas</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-sac_sobre_vacaciones_proporcionales">
                <div class="label">SAC S/Vacaciones proporcionales</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-sac">
                <div class="label">SAC</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-sac_proporcional">
                <div class="label">SAC Proporcional</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-total2">
                <div class="label">Total</div>
                <div class="value">$2000</div>
            </div>
            <div class="seccion">
                Diferencias salariales
            </div>
            <div class="result" id="result-horas_extraordinarias_al_50">
                <div class="label">Hoas extraordinarias al 50%</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-horas_extraordinarias_al_100">
                <div class="label">Horas extraordinarias al 100%</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-horas_nocturnas">
                <div class="label">Horas nocturnas</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-diferencias_salariales">
                <div class="label">Diferencias salariales</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-total3">
                <div class="label">Total</div>
                <div class="value">$2000</div>
            </div>
            <div class="seccion">
                Multas
            </div>
            <div class="result" id="result-multa_ley_25323_art_1">
                <div class="label">MULTA LEY 25.323 ART 1</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-multa_ley_25323_art_2">
                <div class="label">MULTA LEY 25.323 ART 2</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-multa_ley_24013_art_8">
                <div class="label">MULTA LEY 24.013 ART 8</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-multa_ley_24013_art_9">
                <div class="label">MULTA LEY 24.013 ART 9</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-multa_ley_24013_art_10">
                <div class="label">MULTA LEY 24.013 ART 10</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-multa_ley_24013_art_15">
                <div class="label">MULTA LEY 24.013 ART 15</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-multa_ley_20744_art_80">
                <div class="label">MULTA LEY 20.744 ART 80</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-multa_ley_20744_art_132_bis">
                <div class="label">MULTA LEY 20.744 ART 132 BIS</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-multa_ley_20744_art_182">
                <div class="label">MULTA LEY 20.744 ART 182</div>
                <div class="value">$2000</div>
            </div>
            <div class="result" id="result-total4">
                <div class="label">Total</div>
                <div class="value">$2000</div>
            </div>
        </div>
    </div>
    <div class="generar">
        <div class="button-generar">
            Generar
        </div>
    </div>
</div>
<script type="text/javascript">                 
    calculateLiquidacion();             
</script>