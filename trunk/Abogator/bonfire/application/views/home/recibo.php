<html>
    <head>
        <?php
        Assets::clear_cache();
        Assets::add_js('recibo.js');
        echo Assets::js();
        ?>
    </head>
    <body>
        <div class="capsula">
            <table id="esc_rec">
                <caption>Recibo de sueldo</caption>
                <thead>
                    <tr>
                        <th colspan="3">
                            <select id="esc_jor">
                                <option value="0">Jornada completa</option>
                                <option value="1">Media jornada</option>
                            </select>
                            <br>
                            Mes <select id="esc_mes"><option value="35">2013 Mayo</option><option value="34">2013 Abril</option><option value="33">2013 Marzo</option><option value="32">2013 Febrero</option><option value="31">2013 Enero</option><option value="30">2012 Diciembre</option><option value="29">2012 Noviembre</option><option value="28">2012 Octubre</option><option value="27">2012 Septiembre</option><option value="26">2012 Agosto</option><option value="25">2012 Julio</option><option value="24">2012 Junio</option><option value="23">2012 Mayo</option><option value="22">2012 Abril</option><option value="21">2012 Marzo</option><option value="20">2012 Febrero</option><option value="19">2012 Enero</option><option value="18">2011 Diciembre</option><option value="17">2011 Noviembre</option><option value="16">2011 Octubre</option><option value="15">2011 Septiembre</option><option value="14">2011 Agosto</option><option value="13">2011 Julio</option><option value="12">2011 Junio</option><option value="11">2011 Mayo</option><option value="10">2011 Abril</option><option value="9">2011 Marzo</option><option value="8">2011 Febrero</option><option value="7">2011 Enero</option><option value="6">2010 Diciembre</option><option value="5">2010 Noviembre</option><option value="4">2010 Octubre</option><option value="3">2010 Septiembre</option><option value="2">2010 Agosto</option><option value="1">2010 Julio</option><option value="0">2010 Junio</option></select><br>
                            Categoría <select id="esc_cat"><option value="0">Maestranza y Servicios: A</option><option value="1">Maestranza y Servicios: B</option><option value="2">Maestranza y Servicios: C</option><option value="3">Administrativo: A</option><option value="4">Administrativo: B</option><option value="5">Administrativo: C</option><option value="6">Administrativo: D</option><option value="7">Administrativo: E</option><option value="8">Administrativo: F</option><option value="9">Cajeros: A</option><option value="10">Cajeros: B</option><option value="11">Cajeros: C</option><option value="12">Personal Auxiliar: A</option><option value="13">Personal Auxiliar: B</option><option value="14">Personal Auxiliar: C</option><option value="15">Auxiliar Especializado: A</option><option value="16">Auxiliar Especializado: B</option><option value="17">Ventas: A</option><option value="18">Ventas: B</option><option value="19">Ventas: C</option><option value="20">Ventas: D</option></select>
                        </th>
                        <th colspan="2">
                            Presentismo <select id="esc_pre"> <option selected="selected" value="1">Sí</option> <option value="0">No</option> </select><br>
                            Antigüedad <select id="esc_ant">
                                <script type="text/javascript">                 
                                    for(var i=0;i<=35;i++){
                                        document.write('<option value="'+i+'">'+i+' años</option>');};                         
                                </script><option value="0">0 años</option><option value="1">1 años</option><option value="2">2 años</option><option value="3">3 años</option><option value="4">4 años</option><option value="5">5 años</option><option value="6">6 años</option><option value="7">7 años</option><option value="8">8 años</option><option value="9">9 años</option><option value="10">10 años</option><option value="11">11 años</option><option value="12">12 años</option><option value="13">13 años</option><option value="14">14 años</option><option value="15">15 años</option><option value="16">16 años</option><option value="17">17 años</option><option value="18">18 años</option><option value="19">19 años</option><option value="20">20 años</option><option value="21">21 años</option><option value="22">22 años</option><option value="23">23 años</option><option value="24">24 años</option><option value="25">25 años</option><option value="26">26 años</option><option value="27">27 años</option><option value="28">28 años</option><option value="29">29 años</option><option value="30">30 años</option><option value="31">31 años</option><option value="32">32 años</option><option value="33">33 años</option><option value="34">34 años</option><option value="35">35 años</option> </select><br>
                            <span id="esc_retro_v" style="display: none; ">Retroactivo mayo <select id="esc_retro"> <option value="0" selected="selected">No</option><option value="1">Sí</option></select></span>

                        </th>
                    </tr>
                    <tr><th colspan="2"></th><th>Remunerativo</th><th>No Remunerativo</th><th>Descuentos</th></tr>
                </thead>
                <tbody><tr><td>Sueldo básico</td><td></td><td class="moneda"><b>$</b>4.058,78</td><td></td><td></td></tr><tr><td>Presentismo</td><td>8,33 %</td><td class="moneda"><b>$</b>338,23</td><td></td><td></td></tr><tr><td>Acuerdo mayo 2012</td><td></td><td></td><td class="moneda"><b>$</b>608,82</td><td></td></tr><tr><td>Presentismo</td><td>8,33 %</td><td></td><td class="moneda"><b>$</b>50,73</td><td></td></tr><tr><td>Jubilación</td><td>11,00 %</td><td></td><td></td><td class="moneda"><b>$</b>483,67</td></tr><tr><td>Ley 19032</td><td>3,00 %</td><td></td><td></td><td class="moneda"><b>$</b>131,91</td></tr><tr><td>Obra social</td><td>3,00 %</td><td></td><td></td><td class="moneda"><b>$</b>151,70</td></tr><tr><td>Faecys</td><td>0,50 %</td><td></td><td></td><td class="moneda"><b>$</b>25,28</td></tr><tr><td>Sindicato</td><td>2,00 %</td><td></td><td></td><td class="moneda"><b>$</b>101,13</td></tr></tbody><tbody style="display: none; "></tbody><tbody><tr class="rec_total"><td>Totales</td><td></td><td class="moneda"><b>$</b>4.397,01</td><td class="moneda"><b>$</b>659,55</td><td class="moneda"><b>$</b>893,69</td></tr><tr class="rec_total_neto"><td>Sueldo neto a cobrar</td><td></td><td class="moneda"><b>$</b></td><td class="moneda"><b>$</b></td><td class="moneda"><b>$</b>4.162,87</td></tr></tbody></table>
        </div>
    </body>
</html>