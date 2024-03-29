<html>
    <head>
        <script type="text/javascript">
		
            function calculoAntiguedad(sueldo_real, fecha_ingreso_real, fecha_egreso){
                months = countDays(fecha_ingreso_real,fecha_egreso)/30;
                if (months >= 3) {
                    result = parseInt(months / 12);
                    resto = months % 12;
                    if (resto >= 3) {
                        result = result + 1;
                    }
                    return result * sueldo_real;
                } else {
                    return 0;
                }
            }

            function calculoPreaviso(sueldo_real, fecha_ingreso_real, fecha_egreso){
                months = countDays(fecha_ingreso_real,fecha_egreso)/30;
                if (months >= 3) {
                    if (months >= 5 * 12) {
                        return sueldo_real * 2;
                    } else {
                        return sueldo_real;
                    }
                } else {
                    return 0;
                }
            }

            function calculoIntegracion(sueldo_real, fecha_egreso){
                valor_dia = sueldo_real / 30;

                days_in_month = 30;
                day = fecha_egreso.getDate();
                resto = days_in_month - (day + 1);
                if (resto > 0) {
                    return resto * valor_dia;
                } else {
                    return 0;
                }
            }

            function calculoSACMasIntegracionMasPreavisoMasIntegracion(antiguedad,preaviso,integracion){
                return (antiguedad + preaviso + integracion) / 12;
            }

            function calculoDiasTrabajados(sueldo_real, fecha_egreso){
                valor_dia = sueldo_real / 30;

                count_days = countDays(new Date(fecha_egreso.getFullYear(),01,01), fecha_egreso);
                return count_days * valor_dia;
            }

            function calculoVacacionesCompletas(sueldo_real, fecha_ingreso_real, fecha_egreso){
                valor_dia = sueldo_real / 25;

                count_days = countDays(fecha_ingreso_real, fecha_egreso);

                if (count_days >= 180 && count_days < 365 * 5) {
                    if (count_days < 365) {
                        year1 = fecha_ingreso_real.getFullYear();
                        year2 = fecha_egreso.getFullYear();
                        if (year1 != year2) {
                            //se calcula proporcional
                            return calculoVacacionesProporcionales(sueldo_real, fecha_ingreso_real, new Date(fecha_egreso.getFullYear(),12,30));
                        }
                    }
                    return valor_dia * 14;
                } else if (count_days >= 365 * 5 && count_days < 365 * 10) {
                    return valor_dia * 21;
                } else if (count_days >= 365 * 10 && count_days < 365 * 20) {
                    return valor_dia * 28;
                } else if (count_days >= 365 * 20) {
                    return valor_dia * 35;
                } else {
                    return 0;
                }
            }

            function calculoVacacionesProporcionales(sueldo_real, fecha_ingreso_real, fecha_egreso){
                valor_dia = sueldo_real / 25;

                count_days2 = countDays(new Date(fecha_egreso.getFullYear(),01,01), fecha_egreso);

                count_days = countDays(fecha_ingreso_real, fecha_egreso);

                if (count_days >= 180 && count_days < 365 * 5) {
                    return valor_dia * ((14 * count_days2) / 365);
                } else if (count_days >= 365 * 5 && count_days < 365 * 10) {
                    return valor_dia * ((21 * count_days2) / 365);
                } else if (count_days >= 365 * 10 && count_days < 365 * 20) {
                    return valor_dia * ((28 * count_days2) / 365);
                } else if (count_days >= 365 * 20) {
                    return valor_dia * ((35 * count_days2) / 365);
                } else {
                    return 0;
                }
            }

            function calculoSACSobreVacacionesCompletas(vacaciones_completas){
                return vacaciones_completas / 12;
            }

            function calculoSACSobreVacacionesProporcionales(vacaciones_proporcionales){
                return vacaciones_proporcionales / 12;
            }

            function calculoSAC(sueldo_real){
                return sueldo_real / 2;
            }

            function calculoSACProporcional(sueldo_real, fecha_egreso){
                valor_dia = sueldo_real;
                count_days = countDays(new Date(fecha_egreso.getFullYear(),01,01), fecha_egreso);
                return (valor_dia * count_days ) / 365;
            }

            function calculoLey25324Art1(antiguedad){
                return antiguedad;
            }

            function calculoLey25324Art2(antiguedad,preaviso,integracion){
                return (antiguedad + preaviso + integracion) / 2;
            }

            function calculoLey24013Art8(sueldo_real, fecha_ingreso_real, fecha_egreso){
                count_days = countDays(fecha_ingreso_real, fecha_egreso);
                return (sueldo_real / 30 * count_days) / 4;	
            }

            function calculoLey24013Art9(sueldo_real, fecha_ingreso_real, fecha_ingreso_false){
                count_days = countDays(fecha_ingreso_real, fecha_ingreso_false);
                valor_dia = sueldo_real / 30;
                return (count_days * valor_dia) / 4;
            }

            function calculoLey24013Art10(sueldo_real, sueldo_falsa, fecha_ingreso_false, fecha_egreso){
                dif = (sueldo_real - sueldo_falsa) / 30;
                count_days = countDays(fecha_ingreso_false, fecha_egreso);
                return (count_days * dif) / 4;
            }

            function calculoLey24013Art15(antiguedad, preaviso, integracion){
                return antiguedad + preaviso + integracion;
            }

            function calculoLey20744Art80(sueldo_real){
                return sueldo_real * 3;
            }

            function calculoLey20744Art132Bis(sueldo_real, fecha_egreso, fecha_presentacion_demanda){
                valor_dia = sueldo_real / 30;
                count_days = countDays(fecha_egreso, fecha_presentacion_demanda);
                return count_days * valor_dia;
            }

            function calculoLey20744Art182(sueldo_real){
                return sueldo_real * 12;
            }

            function calculoHorasExtraordinariasAl50porciento(sueldo_real, hora_min, hora_max, fecha_ingreso_real, fecha_egreso){
                valor_hora = ((sueldo_real / 30) / 8) * 1.5;
                cant_horas_extras = (hora_max - hora_min) - 9;
                if(cant_horas_extras>0){
                    var count_months = 0;
                    var min_date1 = new Date(fecha_ingreso_real);
                    while((min_date1.setMonth(min_date1.getMonth()+1)) <= fecha_egreso){
                        count_months++;
                    }
                    
                    if(count_months>24){
                        count_months=24;
                    }
                    
                    return count_months * 4 * 5 * cant_horas_extras * valor_hora;
                }else{
                    return 0;
                }
            }

            function calculoHorasExtraordinariasAl100porciento(sueldo_real, hora_min, hora_max, hora_finde_min, hora_finde_max, fecha_ingreso_real, fecha_egreso){
                if(hora_max<hora_min){
                    dif_sem = ((24-hora_min) + hora_max)*5;
                }else if(hora_max>hora_min){
                    dif_sem = (hora_max - hora_min)*5;
                }
                if(hora_finde_max<hora_finde_min){
                    dif_finde = ((24-hora_finde_min) + hora_finde_max)*2;
                }else if(hora_finde_max>hora_finde_min){
                    dif_finde = (hora_finde_max - hora_finde_min)*2;
                }
                
                if((dif_sem+dif_finde)>=48){
                    valor_hora = ((sueldo_real / 30) / 8) * 2;
                    cant_horas_extras = (dif_sem+dif_finde)-48;

                    var count_months = 0;
                    var min_date1 = new Date(fecha_ingreso_real);
                    while((min_date1.setMonth(min_date1.getMonth()+1)) <= fecha_egreso){
                        count_months++;
                    }
                    
                    if(count_months>24){
                        count_months=24;
                    }

                    return count_months * 4 * cant_horas_extras * valor_hora;
                }else{
                    return 0;
                }
            }

            function calculoHorasNocturnas(sueldo_real, hora_min, hora_max, fecha_ingreso_real, fecha_egreso, finde){
                valor_minuto = ((sueldo_real / 30) / 8) / 60;

                if(hora_min>hora_max){
                    if(hora_min<21){
                        hora_min=21;
                    }
                }


                if ((((hora_min >= 0 && hora_min <= 6) || (hora_min >= 21 && hora_min <= 24)))&&
                    (((hora_max >= 0 && hora_max <= 6) || (hora_max >= 21 && hora_max <= 24)))){
                    
                    var count_months = 0;
                    var min_date1 = new Date(fecha_ingreso_real);
                    while((min_date1.setMonth(min_date1.getMonth()+1)) <= fecha_egreso){
                        count_months++;
                    }
                    
                    if(count_months>24){
                        count_months=24;
                    }

                    var count_days = 0;
                    if(hora_max<hora_min){
                        //21-6
                        count_days = hora_max + (24-hora_min);
                    }else if(hora_max>hora_min){
                        //0-6
                        count_days = hora_max - hora_min -1;
                    }else{
                    }
                    if(finde){
                        return count_days * 4 * 8 * 2 * valor_minuto * count_months;
                    }else{
                        return count_days * 4 * 8 * 5 * valor_minuto * count_months;
                    }
                }

                return 0;
            }

            function calculoDiferenciasSalarialesPorCategoria(sueldo_cct, sueldo_real, fecha_ingreso_real, fecha_egreso){
                dif = (sueldo_cct - sueldo_real) / 30;
                count_days = countDays(fecha_ingreso_real, fecha_egreso);
                if(count_days>730){
                    count_days=730;
                }
                return count_days * dif;
            }
			
            function validData(sueldo_real,sueldo_falsa,fecha_ingreso_real,fecha_ingerso_falsa,fecha_egreso,fecha_presentacion_demanda,hora1min,hora1max,hora2min,hora2max){
                if(isNaN(parseInt(sueldo_real))||isNaN(new Date(fecha_ingreso_real))||isNaN(new Date(fecha_egreso))){
                    return false;
                }
                //                if(hora1max<hora1min||hora2max<hora2min){
                //                    return false;
                //                }			
                return true;
            }
			
            function countDays(date1, date2) {
                //                day1 = date1.getDate();
                //                day2 = date2.getDate();
                //                var i = 0;
                //                var min_date1 = new Date(date1.getTime());
                //                while((min_date1.setMonth(min_date1.getMonth()+1)) <= date2){
                //                    i++;
                //                }
                //                return (i-1)*30 + (30 - day1 + 1) + day2;

                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                var firstDate = date1;
                var secondDate = date2;

                return Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
            }
			
			
            function calcularLiquidacionFinal(){
                var sueldo_real = parseInt(document.getElementById('sueldo_real').value);
                var sueldo_falsa = parseInt(document.getElementById('sueldo_falsa').value);
                var fecha_ingreso_real = document.getElementById('fecha_ingreso_real').value;
                var fecha_ingerso_falsa = document.getElementById('fecha_ingerso_falsa').value;
                var fecha_egreso = document.getElementById('fecha_egreso').value;
                var fecha_presentacion_demanda = document.getElementById('fecha_presentacion_demanda').value;
                var hora1min = parseInt(document.getElementById('hora1min').value);
                var hora1max = parseInt(document.getElementById('hora1max').value);
                var hora2min = parseInt(document.getElementById('hora2min').value);
                var hora2max = parseInt(document.getElementById('hora2max').value);
                var date_fecha_ingreso_real = new Date(fecha_ingreso_real);
                var date_fecha_ingerso_falsa = new Date(fecha_ingerso_falsa);
                var date_fecha_egreso = new Date(fecha_egreso);
                var date_fecha_presentacion_demanda = new Date(fecha_presentacion_demanda);
                var sueldo_cct = document.getElementById('sueldo_cct').value;
                if(validData(sueldo_real,sueldo_falsa,date_fecha_ingreso_real,date_fecha_ingerso_falsa,date_fecha_egreso,date_fecha_presentacion_demanda,hora1min,hora1max,hora2min,hora2max)){
					
                    var result = document.getElementById('result');
                    result.innerHTML = "";
					
                    var antiguedad = calculoAntiguedad(sueldo_real,date_fecha_ingreso_real,date_fecha_egreso);
                    var newdiv = document.createElement('p');
                    newdiv.innerHTML = 'Antiguedad: '+antiguedad;
                    result.appendChild(newdiv);
                    var preaviso = calculoPreaviso(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'Preaviso: '+preaviso;
                    result.appendChild(newdiv);
                    var integracion = calculoIntegracion(sueldo_real, date_fecha_egreso);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'Integracion: '+integracion;
                    result.appendChild(newdiv);
                    var sacMasIntegracionMasPreavisoMasIntegracion = calculoSACMasIntegracionMasPreavisoMasIntegracion(antiguedad,preaviso,integracion);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'SAC mas antiguedad mas preaviso mas integracion: '+sacMasIntegracionMasPreavisoMasIntegracion;
                    result.appendChild(newdiv);
                    var diasTrabajados = calculoDiasTrabajados(sueldo_real, date_fecha_egreso);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'Dias trabajados: '+diasTrabajados;
                    result.appendChild(newdiv);
                    var vacacionesCompletas = calculoVacacionesCompletas(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'Vacaciones completas: '+vacacionesCompletas;
                    result.appendChild(newdiv);
                    var vacacionesProporcionales = calculoVacacionesProporcionales(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'Vacaciones proporcionales: '+vacacionesProporcionales;
                    result.appendChild(newdiv);
                    var sacSobreVacacionesCompletas = calculoSACSobreVacacionesCompletas(vacacionesCompletas);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'SAC Vacaciones completas: '+sacSobreVacacionesCompletas;
                    result.appendChild(newdiv);
                    var sacSobreVacacionesProporcionales = calculoSACSobreVacacionesProporcionales(vacacionesProporcionales);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'SAC Vacaciones proporcionales: '+sacSobreVacacionesProporcionales;
                    result.appendChild(newdiv);
                    var sac = calculoSAC(sueldo_real);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'SAC: '+sac;
                    result.appendChild(newdiv);
                    var sacProporcional = calculoSACProporcional(sueldo_real, date_fecha_egreso);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'SAC proporcional: '+sacProporcional;
                    result.appendChild(newdiv);
                    var ley25324Art1 = calculoLey25324Art1(antiguedad);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'ley25324Art1: '+ley25324Art1;
                    result.appendChild(newdiv);
                    var ley25324Art2 = calculoLey25324Art2(antiguedad,preaviso,integracion);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'ley25324Art2: '+ley25324Art2;
                    result.appendChild(newdiv);
                    var ley24013Art8 = calculoLey24013Art8(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'ley24013Art8: '+ley24013Art8;
                    result.appendChild(newdiv);
                    if(!isNaN(date_fecha_ingerso_falsa)){
                        var ley24013Art9 = calculoLey24013Art9(sueldo_real, date_fecha_ingreso_real, date_fecha_ingerso_falsa);
                        newdiv = document.createElement('p');
                        newdiv.innerHTML = 'ley24013Art9: '+ley24013Art9;
                        result.appendChild(newdiv);
                        if(!isNaN(sueldo_falsa)){
                            var ley24013Art10 = calculoLey24013Art10(sueldo_real, sueldo_falsa, date_fecha_ingerso_falsa, date_fecha_egreso);
                            newdiv = document.createElement('p');
                            newdiv.innerHTML = 'ley24013Art10: '+ley24013Art10;
                            result.appendChild(newdiv);
                        }
                    }
                    var ley24013Art15 = calculoLey24013Art15(antiguedad, preaviso, integracion);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'ley24013Art15: '+ley24013Art15;
                    result.appendChild(newdiv);
                    var ley20744Art80 = calculoLey20744Art80(sueldo_real);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'ley20744Art80: '+ley20744Art80;
                    result.appendChild(newdiv);
                    if(!isNaN(date_fecha_presentacion_demanda)){
                        var ley20744Art132bis = calculoLey20744Art132Bis(sueldo_real, date_fecha_egreso, date_fecha_presentacion_demanda);
                        newdiv = document.createElement('p');
                        newdiv.innerHTML = 'ley20744Art132bis: '+ley20744Art132bis;
                        result.appendChild(newdiv);
                    }
                    var ley20744Art182 = calculoLey20744Art182(sueldo_real);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'ley20744Art182: '+ley20744Art182;
                    result.appendChild(newdiv);
                    var horasExtraordinariasAl50porciento = calculoHorasExtraordinariasAl50porciento(sueldo_real, hora1min, hora1max, date_fecha_ingreso_real, date_fecha_egreso);
                    newdiv = document.createElement('p');
                    newdiv.innerHTML = 'horasExtraordinariasAl50porciento: '+horasExtraordinariasAl50porciento;
                    result.appendChild(newdiv);
                    if(hora2min!=-1&&hora2max!=-1&&hora1min!=-1&&hora1max!=-1){
                        var horasExtraordinariasAl100porciento = calculoHorasExtraordinariasAl100porciento(sueldo_real, hora1min, hora1max, hora2min, hora2max, date_fecha_ingreso_real, date_fecha_egreso);
                        newdiv = document.createElement('p');
                        newdiv.innerHTML = 'horasExtraordinariasAl100porciento: '+horasExtraordinariasAl100porciento;
                        result.appendChild(newdiv);
                    }
                    if(hora2min!=-1&&hora2max!=-1){
                        var horasNocturnas = calculoHorasNocturnas(sueldo_real, hora1min, hora1max, date_fecha_ingreso_real, date_fecha_egreso,false);
                        newdiv = document.createElement('p');
                        newdiv.innerHTML = 'horasNocturnas: '+horasNocturnas;
                        result.appendChild(newdiv);
                    }
                    if(hora2min!=-1&&hora2max!=-1){
                        var horasNocturnas = calculoHorasNocturnas(sueldo_real, hora2min, hora2max, date_fecha_ingreso_real, date_fecha_egreso,true);
                        newdiv = document.createElement('p');
                        newdiv.innerHTML = 'horasNocturnas finde: '+horasNocturnas;
                        result.appendChild(newdiv);
                    }
                    if(!isNaN(sueldo_falsa)){
                        var diferenciasSalarialesPorCategoria = calculoDiferenciasSalarialesPorCategoria(sueldo_cct,sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
                        newdiv = document.createElement('p');
                        newdiv.innerHTML = 'diferenciasSalarialesPorCategoria: '+diferenciasSalarialesPorCategoria;
                        result.appendChild(newdiv);
                    }
					

                }else{
                    alert('Datos invalidos');
                }
				
            }
        </script>
    </head>
    <body>
        <table>
            <tr><td>Sueldo real:</td><td><input type="text" id="sueldo_real" name="sueldo_real" value="2000" /></td></tr>
            <tr><td>Sueldo falso:</td><td><input type="text" id="sueldo_falsa" name="sueldo_falsa" value="1000" /></td></tr>
            <tr><td>Fecha ingreso real:</td><td><input type="text" id="fecha_ingreso_real" name="fecha_ingreso_real" value="01/01/2010" /></td></tr>
            <tr><td>Fecha ingreso falsa:</td><td><input type="text" id="fecha_ingerso_falsa" name="fecha_ingreso_falsa" value="01/01/2011" /></td></tr>
            <tr><td>Fecha egreso:</td><td><input type="text" id="fecha_egreso" name="fecha_egreso" value="01/13/2012" /></td></tr>
            <tr><td>Fecha presentacion demanda:</td><td><input type="text" id="fecha_presentacion_demanda" name="fecha_presentacion_demanda" value="01/13/2013" /></td></tr>
            <tr><td>Horario Lun a Vier:</td><td>
                    <select id="hora1min">
                        <option value="-1">--</option>
                        <option value="0">00</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option selected value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                    a
                    <select id="hora1max">
                        <option value="-1">--</option>
                        <option value="0">00</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option selected value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                </td></tr>
            <tr><td>Horario Sab y Dom:</td><td>
                    <select id="hora2min">
                        <option value="-1">--</option>
                        <option value="0">00</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option selected value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                    a
                    <select id="hora2max">
                        <option value="-1">--</option>
                        <option value="0">00</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option selected value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                </td></tr>
            <tr><td>Sueldo CCT:</td><td><input type="text" id="sueldo_cct" name="sueldo_cct" value="3000" /></td></tr>
        </table>
        <input type="button" value="Calcular" onclick="calcularLiquidacionFinal()" />
        <div id="result">
        </div>
    </body>
</html>