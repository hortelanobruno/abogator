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
                    <input type="text"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Email
                </div>
                <div class="element">
                    <input type="text"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Remuneracion (real)
                </div>
                <div class="element">
                    <input type="text"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Fecha ingreso (real)
                </div>
                <div class="element">
                    <input id="fecha-ingreso" type="text"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Fecha egreso
                </div>
                <div class="element">
                    <input id="fecha-egreso" type="text"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Remuneracion (falsa)
                </div>
                <div class="element">
                    <input type="text"/>
                </div>
            </div>
            <div class="dato">
                <div class="label">
                    Fecha ingreso (falsa)
                </div>
                <div class="element">
                    <input id="fecha-ingreso-falsa" type="text"/>
                </div>
            </div>
            <div class="dato2">
                <div class="label">
                    Horarios de trabajo
                </div>
                <div class="element">
                    <div class="day">
                        <div class="check">
                            <input type="checkbox"/>Lunes
                        </div>
                        <div class="select">
                            <select id="mon1"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="mon2"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input type="checkbox"/>Martes
                        </div>
                        <div class="select">
                            <select id="tue1"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="tue2"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input type="checkbox"/>Miercoles
                        </div>
                        <div class="select">
                            <select id="wed1"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="wed2"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input type="checkbox"/>Jueves
                        </div>
                        <div class="select">
                            <select id="thu1"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="thu2"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input type="checkbox"/>Viernes
                        </div>
                        <div class="select">
                            <select id="fri1"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="fri2"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input type="checkbox"/>Sabado
                        </div>
                        <div class="select">
                            <select id="sat1"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="sat2"></select>
                        </div>
                    </div>
                    <div class="day">
                        <div class="check">
                            <input type="checkbox"/>Domingo
                        </div>
                        <div class="select">
                            <select id="sun1"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="sun2"></select>
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
                    <input id="fecha-presentacion-demanda" type="text"/>
                </div>
            </div>
            <script>
                $(function() {
                    $("#fecha-ingreso").datepicker();
                    $("#fecha-egreso").datepicker();
                    $("#fecha-ingreso-falsa").datepicker();
                    $("#fecha-presentacion-demanda").datepicker();
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
            <div class="result">
                <div class="label">Antiguedad</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Preaviso</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Integracion</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">SAC S/ANT + PRE + INT</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Total</div>
                <div class="value">$2000</div>
            </div>
            <div class="seccion">
                Liquidacion final
            </div>
            <div class="result">
                <div class="label">Dias trabajados</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Vacaciones completas</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Vacaciones proporcionales</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">SAC S/Vacaciones completas</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">SAC S/Vacaciones proporcionales</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">SAC</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">SAC Proporcional</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Total</div>
                <div class="value">$2000</div>
            </div>
            <div class="seccion">
                Diferencias salariales
            </div>
            <div class="result">
                <div class="label">Hoas extraordinarias al 50%</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Horas extraordinarias al 100%</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Horas nocturnas</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Diferencias salariales</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">Total</div>
                <div class="value">$2000</div>
            </div>
            <div class="seccion">
                Multas
            </div>
            <div class="result">
                <div class="label">MULTA LEY 25.323 ART 1</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">MULTA LEY 25.323 ART 2</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">MULTA LEY 24.013 ART 8</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">MULTA LEY 24.013 ART 9</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">MULTA LEY 24.013 ART 10</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">MULTA LEY 24.013 ART 15</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">MULTA LEY 20.744 ART 80</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">MULTA LEY 20.744 ART 132 BIS</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
                <div class="label">MULTA LEY 20.744 ART 182</div>
                <div class="value">$2000</div>
            </div>
            <div class="result">
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