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
        return sueldo_real/2;
    }
}

function calculoIntegracion(sueldo_real, fecha_ingreso_real, fecha_egreso){
    months = countDays(fecha_ingreso_real,fecha_egreso)/30;
    if (months >= 3) {
        valor_dia = sueldo_real / 30;
        days_in_month = 30;
        day = fecha_egreso.getDate();
        resto = days_in_month - (day + 1);
        if (resto > 0) {
            return resto * valor_dia;
        } else {
            return 0;
        }
    }else{
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

function calculoHorasExtraordinariasAl50porciento(sueldo_real, dias, fecha_ingreso_real, fecha_egreso){
    valor_hora = ((sueldo_real / 30) / 8) * 1.5;
    var cant_horas_extras = 0;
    var aux;
    if(dias.lunes[2]){
        aux = parseInt(calcularCantHoras(parseInt(dias.lunes[0]),parseInt(dias.lunes[1])));
        if((aux-9)>0){
            cant_horas_extras += (aux-9);
        }
    }
    if(dias.martes[2]){
        aux = parseInt(calcularCantHoras(parseInt(dias.martes[0]),parseInt(dias.martes[1])));
        if((aux-9)>0){
            cant_horas_extras += (aux-9);
        }
    }
    if(dias.miercoles[2]){
        aux = parseInt(calcularCantHoras(parseInt(dias.miercoles[0]),parseInt(dias.miercoles[1])));
        if((aux-9)>0){
            cant_horas_extras += (aux-9);
        }
    }
    if(dias.jueves[2]){
        aux = parseInt(calcularCantHoras(parseInt(dias.jueves[0]),parseInt(dias.jueves[1])));
        if((aux-9)>0){
            cant_horas_extras += (aux-9);
        }
    }
    if(dias.viernes[2]){
        aux = parseInt(calcularCantHoras(parseInt(dias.viernes[0]),parseInt(dias.viernes[1])));
        if((aux-9)>0){
            cant_horas_extras += (aux-9);
        }
    }
    if(cant_horas_extras>0){
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

function calculoHorasExtraordinariasAl100porciento(sueldo_real, dias, fecha_ingreso_real, fecha_egreso){
    
    var horas_semanales = calcularCantHorasSemanales(dias);
                
    if(horas_semanales>48){
        valor_hora = ((sueldo_real / 30) / 8) * 2;
        cant_horas_extras = (horas_semanales)-48;

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

function calculoHorasNocturnas(sueldo_real, dias, fecha_ingreso_real, fecha_egreso, finde){
    valor_minuto = ((sueldo_real / 30) / 8) / 60;

    
    var cant_horas = 0;
    if(finde){
        cant_horas = calcularCantHorasNocturnasFinde(dias);
    }else{
        cant_horas = calcularCantHorasNocturnasEntreSemana(dias);
    }
    

    if (cant_horas>0){
                    
        var count_months = 0;
        var min_date1 = new Date(fecha_ingreso_real);
        while((min_date1.setMonth(min_date1.getMonth()+1)) <= fecha_egreso){
            count_months++;
        }
                    
        if(count_months>24){
            count_months=24;
        }

        if(finde){
            return cant_horas * 4 * 8  * valor_minuto * count_months;
        }else{
            return cant_horas * 4 * 8 * valor_minuto * count_months;
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
			
function validData(sueldo_real,sueldo_falsa,fecha_ingreso_real,fecha_ingreso_falsa,fecha_egreso,fecha_presentacion_demanda,dias){
    var date_real = new Date(fecha_ingreso_real);
    var date_egreso = new Date(fecha_egreso);
    if(isNaN(parseInt(sueldo_real))||isNaN(date_real)||isNaN(date_egreso)){
        return false;
    }else{
        if(date_real>date_egreso){
            return false;
        }
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
	
        
function calcularCantHorasSemanales(data){
    var aux = 0;
    
    if(data.lunes[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.lunes[0]),parseInt(data.lunes[1])));
    }
    if(data.martes[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.martes[0]),parseInt(data.martes[1])));
    }
    if(data.miercoles[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.miercoles[0]),parseInt(data.miercoles[1])));
    }
    if(data.jueves[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.jueves[0]),parseInt(data.jueves[1])));
    }
    if(data.viernes[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.viernes[0]),parseInt(data.viernes[1])));
    }
    if(data.sabado[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.sabado[0]),parseInt(data.sabado[1])));
    }
    if(data.domingo[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.domingo[0]),parseInt(data.domingo[1])));
    }
    
    return aux;
}

function calcularCantHorasEntreSemana(data){
    var aux = 0;
    
    if(data.lunes[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.lunes[0]),parseInt(data.lunes[1])));
    }
    if(data.martes[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.martes[0]),parseInt(data.martes[1])));
    }
    if(data.miercoles[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.miercoles[0]),parseInt(data.miercoles[1])));
    }
    if(data.jueves[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.jueves[0]),parseInt(data.jueves[1])));
    }
    if(data.viernes[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.viernes[0]),parseInt(data.viernes[1])));
    }
    
    return aux;
}

function calcularCantHorasFinde(data){
    var aux = 0;
    
    if(data.sabado[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.sabado[0]),parseInt(data.sabado[1])));
    }
    if(data.domingo[2]){
        aux += parseInt(calcularCantHoras(parseInt(data.domingo[0]),parseInt(data.domingo[1])));
    }
    
    return aux;
}

function calcularCantHoras(hora_min,hora_max){
    if(hora_min<=hora_max){
        return hora_max - hora_min;
    }else{
        return (24 - hora_min) + hora_max;
    }
}

function calcularCantHorasNocturnasEntreSemana(data){
    var aux = 0;
    
    if(data.lunes[2]){
        aux += parseInt(calcularCantNocturnasHoras(parseInt(data.lunes[0]),parseInt(data.lunes[1])));
    }
    if(data.martes[2]){
        aux += parseInt(calcularCantNocturnasHoras(parseInt(data.martes[0]),parseInt(data.martes[1])));
    }
    if(data.miercoles[2]){
        aux += parseInt(calcularCantNocturnasHoras(parseInt(data.miercoles[0]),parseInt(data.miercoles[1])));
    }
    if(data.jueves[2]){
        aux += parseInt(calcularCantNocturnasHoras(parseInt(data.jueves[0]),parseInt(data.jueves[1])));
    }
    if(data.viernes[2]){
        aux += parseInt(calcularCantNocturnasHoras(parseInt(data.viernes[0]),parseInt(data.viernes[1])));
    }
    
    return aux;
}

function calcularCantHorasNocturnasFinde(data){
    var aux = 0;
    
    if(data.sabado[2]){
        aux += parseInt(calcularCantNocturnasHoras(parseInt(data.sabado[0]),parseInt(data.sabado[1])));
    }
    if(data.domingo[2]){
        aux += parseInt(calcularCantNocturnasHoras(parseInt(data.domingo[0]),parseInt(data.domingo[1])));
    }
    
    return aux;
}

function calcularCantNocturnasHoras(hora_min,hora_max){
    var count_days = 0;
    
    if(hora_min>hora_max){
        if(hora_min<21){
            hora_min=21;
        }
    }


    if ((((hora_min >= 0 && hora_min <= 6) || (hora_min >= 21 && hora_min <= 24)))&&
        (((hora_max >= 0 && hora_max <= 6) || (hora_max >= 21 && hora_max <= 24)))){

        var count_days = 0;
        if(hora_max<hora_min){
            //21-6
            count_days = hora_max + (24-hora_min);
        }else if(hora_max>hora_min){
            //0-6
            count_days = hora_max - hora_min -1;
        }
    }
    return count_days;
}

function selectedSemanaCompleta(dias){
    var semana = false;
    var finde = false;
    if(dias.lunes[2]){
        semana = true;
    }
    if(dias.martes[2]){
        semana = true;
    }
    if(dias.miercoles[2]){
        semana = true;
    }
    if(dias.jueves[2]){
        semana = true;
    }
    if(dias.viernes[2]){
        semana = true;
    }
    if(dias.sabado[2]){
        finde = true;
    }
    if(dias.domingo[2]){
        finde = true;
    }
    if(semana&&finde){
        return true;
    }else{
        return false;
    }
}

function selectedEntreSemana(dias){
    var semana = false;
    if(dias.lunes[2]){
        semana = true;
    }
    if(dias.martes[2]){
        semana = true;
    }
    if(dias.miercoles[2]){
        semana = true;
    }
    if(dias.jueves[2]){
        semana = true;
    }
    if(dias.viernes[2]){
        semana = true;
    }
    if(semana){
        return true;
    }else{
        return false;
    }
}
	
function selectedFinde(dias){
    var finde = false;
    if(dias.sabado[2]){
        finde = true;
    }
    if(dias.domingo[2]){
        finde = true;
    }
    return finde;
}
        
function calculateLiquidacion(){
    var email = document.getElementById('email').value;
    
    var sueldo_real = parseInt(document.getElementById('sueldo_real').value);
    var sueldo_falsa = parseInt(document.getElementById('sueldo_falsa').value);
    var fecha_ingreso_real = document.getElementById('fecha_ingreso_real').value;
    var fecha_ingreso_falsa = document.getElementById('fecha_ingreso_falsa').value;
    var fecha_egreso = document.getElementById('fecha_egreso').value;
    var fecha_presentacion_demanda = document.getElementById('fecha_presentacion_demanda').value;
    var dias={
        lunes:[9,18,true],
        martes:[9,18,true],
        miercoles:[9,18,true],
        jueves:[9,18,true],
        viernes:[9,18,true],
        sabado:[9,12,false],
        domingo:[9,12,false]
    }
    dias.lunes[2] = document.getElementById('day1-check').checked;
    dias.lunes[0] = document.getElementById('mon1').value;
    dias.lunes[1] = document.getElementById('mon2').value;
    dias.martes[2] = document.getElementById('day2-check').checked;
    dias.martes[0] = document.getElementById('tue1').value;
    dias.martes[1] = document.getElementById('tue2').value;
    dias.miercoles[2] = document.getElementById('day3-check').checked;
    dias.miercoles[0] = document.getElementById('wed1').value;
    dias.miercoles[1] = document.getElementById('wed2').value;
    dias.jueves[2] = document.getElementById('day4-check').checked;
    dias.jueves[0] = document.getElementById('thu1').value;
    dias.jueves[1] = document.getElementById('thu2').value;
    dias.viernes[2] = document.getElementById('day5-check').checked;
    dias.viernes[0] = document.getElementById('fri1').value;
    dias.viernes[1] = document.getElementById('fri2').value;
    dias.sabado[2] = document.getElementById('day6-check').checked;
    dias.sabado[0] = document.getElementById('sat1').value;
    dias.sabado[1] = document.getElementById('sat2').value;
    dias.domingo[2] = document.getElementById('day7-check').checked;
    dias.domingo[0] = document.getElementById('sun1').value;
    dias.domingo[1] = document.getElementById('sun2').value;
    
    var date_fecha_ingreso_real = new Date(fecha_ingreso_real.split("/")[1]+"/"+fecha_ingreso_real.split("/")[0]+"/"+fecha_ingreso_real.split("/")[2]);
    var date_fecha_ingreso_falsa = new Date(fecha_ingreso_falsa.split("/")[1]+"/"+fecha_ingreso_falsa.split("/")[0]+"/"+fecha_ingreso_falsa.split("/")[2]);
    var date_fecha_egreso = new Date(fecha_egreso.split("/")[1]+"/"+fecha_egreso.split("/")[0]+"/"+fecha_egreso.split("/")[2]);
    var date_fecha_presentacion_demanda = new Date(fecha_presentacion_demanda.split("/")[1]+"/"+fecha_presentacion_demanda.split("/")[0]+"/"+fecha_presentacion_demanda.split("/")[2]);
    
    var sueldo_cct = document.getElementById('sueldo_cct').value;
    if(validateEmail(email)&&validData(sueldo_real,sueldo_falsa,date_fecha_ingreso_real,date_fecha_ingreso_falsa,date_fecha_egreso,date_fecha_presentacion_demanda,dias)){
					

        var antiguedad = calculoAntiguedad(sueldo_real,date_fecha_ingreso_real,date_fecha_egreso);
        document.getElementById("result-antiguedad").childNodes[3].innerHTML = "$ " + antiguedad.toFixed(2);
        document.getElementsByName("resultantiguedad")[0].value = "$ " + antiguedad.toFixed(2);
        var preaviso = calculoPreaviso(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
        document.getElementById("result-preaviso").childNodes[3].innerHTML = "$ " + preaviso.toFixed(2);
        document.getElementsByName("resultpreaviso")[0].value = "$ " + preaviso.toFixed(2);
        var integracion = calculoIntegracion(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
        document.getElementById("result-integracion").childNodes[3].innerHTML = "$ " + integracion.toFixed(2);
        document.getElementsByName("resultintegracion")[0].value = "$ " + integracion.toFixed(2);
        var sacMasIntegracionMasPreavisoMasIntegracion = calculoSACMasIntegracionMasPreavisoMasIntegracion(antiguedad,preaviso,integracion);
        document.getElementById("result-sac_pres_int").childNodes[3].innerHTML = "$ " + sacMasIntegracionMasPreavisoMasIntegracion.toFixed(2);
        document.getElementsByName("resultsacpresint")[0].value = "$ " + sacMasIntegracionMasPreavisoMasIntegracion.toFixed(2);
        
        var total1 = antiguedad+preaviso+integracion+sacMasIntegracionMasPreavisoMasIntegracion;
        document.getElementById("result-total1").childNodes[3].innerHTML = "$ " + (total1).toFixed(2);
        document.getElementsByName("resulttotal1")[0].value = document.getElementById("result-total1").childNodes[3].innerHTML;
        
        
        var haberesadeudados = 0;
        if(document.getElementById('checkhaberes').checked){
            haberesadeudados = parseInt(document.getElementById('cant-haberes').value)*sueldo_real;
        }
        document.getElementById("result-haberes").childNodes[3].innerHTML = "$ " + haberesadeudados.toFixed(2);
        document.getElementsByName("resulthaberes")[0].value = document.getElementById("result-haberes").childNodes[3].innerHTML;
        
        var diasTrabajados = calculoDiasTrabajados(sueldo_real, date_fecha_egreso);
        document.getElementById("result-dias_trabajados").childNodes[3].innerHTML = "$ " + diasTrabajados.toFixed(2);
        document.getElementsByName("resultdiastrabajados")[0].value = document.getElementById("result-dias_trabajados").childNodes[3].innerHTML;
        var vacacionesCompletas = 0;
        if(document.getElementById('checkvacacionescompletas').checked){
            vacacionesCompletas = calculoVacacionesCompletas(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
        }
        document.getElementById("result-vacaciones_completas").childNodes[3].innerHTML = "$ " + vacacionesCompletas.toFixed(2);
        document.getElementsByName("resultvacacionescompletas")[0].value = document.getElementById("result-vacaciones_completas").childNodes[3].innerHTML;
        var vacacionesProporcionales = calculoVacacionesProporcionales(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
        document.getElementById("result-vacaciones_proporcionales").childNodes[3].innerHTML = "$ " + vacacionesProporcionales.toFixed(2);
        document.getElementsByName("resultvacacionesproporcionales")[0].value = document.getElementById("result-vacaciones_proporcionales").childNodes[3].innerHTML;
        
        
        
        var sacSobreVacacionesCompletas = calculoSACSobreVacacionesCompletas(vacacionesCompletas);
        document.getElementById("result-sac_sobre_vacaciones_completas").childNodes[3].innerHTML = "$ " + sacSobreVacacionesCompletas.toFixed(2);
        document.getElementsByName("resultsacsobrevacacionescompletas")[0].value = document.getElementById("result-sac_sobre_vacaciones_completas").childNodes[3].innerHTML;
        var sacSobreVacacionesProporcionales = calculoSACSobreVacacionesProporcionales(vacacionesProporcionales);
        document.getElementById("result-sac_sobre_vacaciones_proporcionales").childNodes[3].innerHTML = "$ " + sacSobreVacacionesProporcionales.toFixed(2);
        document.getElementsByName("resultsacsobrevacacionesproporcionales")[0].value = document.getElementById("result-sac_sobre_vacaciones_proporcionales").childNodes[3].innerHTML;
        
        var sac = 0;
        if(document.getElementById('checksac').checked){
            sac = calculoSAC(sueldo_real);
        }
        document.getElementById("result-sac").childNodes[3].innerHTML = "$ " + sac.toFixed(2);
        document.getElementsByName("resultsac")[0].value = document.getElementById("result-sac").childNodes[3].innerHTML;
        
        var sacProporcional = calculoSACProporcional(sueldo_real, date_fecha_egreso);
        document.getElementById("result-sac_proporcional").childNodes[3].innerHTML = "$ " + sacProporcional.toFixed(2);
        document.getElementsByName("resultsacproporcional")[0].value = document.getElementById("result-sac_proporcional").childNodes[3].innerHTML;
        
        var total2 = diasTrabajados+vacacionesCompletas+vacacionesProporcionales+sacSobreVacacionesCompletas+sacSobreVacacionesProporcionales+haberesadeudados;
        document.getElementById("result-total2").childNodes[3].innerHTML = "$ " + (total2).toFixed(2);
        document.getElementsByName("resulttotal2")[0].value = document.getElementById("result-total2").childNodes[3].innerHTML;
    
        var horasExtraordinariasAl50porciento = calculoHorasExtraordinariasAl50porciento(sueldo_real, dias, date_fecha_ingreso_real, date_fecha_egreso);
        document.getElementById("result-horas_extraordinarias_al_50").childNodes[3].innerHTML = "$ " + horasExtraordinariasAl50porciento.toFixed(2);
        document.getElementsByName("resulthorasextraordinariasal50")[0].value = document.getElementById("result-horas_extraordinarias_al_50").childNodes[3].innerHTML;
        var horasExtraordinariasAl100porciento = 0;
        if(selectedSemanaCompleta(dias)){
            horasExtraordinariasAl100porciento = calculoHorasExtraordinariasAl100porciento(sueldo_real, dias, date_fecha_ingreso_real, date_fecha_egreso);
        }
        document.getElementById("result-horas_extraordinarias_al_100").childNodes[3].innerHTML = "$ " + horasExtraordinariasAl100porciento.toFixed(2);
        document.getElementsByName("resulthorasextraordinariasal100")[0].value = document.getElementById("result-horas_extraordinarias_al_100").childNodes[3].innerHTML;
        var horasNocturnas = 0
        if(selectedEntreSemana(dias)){
            horasNocturnas += calculoHorasNocturnas(sueldo_real, dias, date_fecha_ingreso_real, date_fecha_egreso,false);
        }
        if(selectedFinde(dias)){
            horasNocturnas += calculoHorasNocturnas(sueldo_real, dias, date_fecha_ingreso_real, date_fecha_egreso,true);
        }
        document.getElementById("result-horas_nocturnas").childNodes[3].innerHTML = "$ " + horasNocturnas.toFixed(2);
        document.getElementsByName("resulthorasnocturnas")[0].value = document.getElementById("result-horas_nocturnas").childNodes[3].innerHTML;
        var diferenciasSalarialesPorCategoria = 0;
        if(sueldo_cct.length>0&&!isNaN(sueldo_cct)&&sueldo_real<sueldo_cct){
            diferenciasSalarialesPorCategoria = calculoDiferenciasSalarialesPorCategoria(sueldo_cct,sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
        }
        document.getElementById("result-diferencias_salariales").childNodes[3].innerHTML = "$ " + diferenciasSalarialesPorCategoria.toFixed(2);
        document.getElementsByName("resultdiferenciassalariales")[0].value = document.getElementById("result-diferencias_salariales").childNodes[3].innerHTML;

        var total3 = horasExtraordinariasAl50porciento+horasExtraordinariasAl100porciento+horasNocturnas+diferenciasSalarialesPorCategoria;
        document.getElementById("result-total3").childNodes[3].innerHTML = "$ " + (total3).toFixed(2);
        document.getElementsByName("resulttotal3")[0].value = document.getElementById("result-total3").childNodes[3].innerHTML;
        
        var ley25324Art1 = 0;
        var ley24013Art8 = 0;
        var ley24013Art9 = 0;
        var ley24013Art10 = 0;
        var ley25324Art2 = 0;
        var ley24013Art15 = 0;
        var ley20744Art80 = 0;
        var ley20744Art132bis = 0;
        var ley20744Art182 = 0;
        if(document.getElementById('check-multa_ley_25323_art_1').checked){
            ley25324Art1 = calculoLey25324Art1(antiguedad);
            document.getElementById("result-multa_ley_25323_art_1").childNodes[3].innerHTML = "$ " + ley25324Art1.toFixed(2);
        }else{
            document.getElementById("result-multa_ley_25323_art_1").childNodes[3].innerHTML = "$ 0";
        }
        document.getElementsByName("resultmultaley25323art1")[0].value = document.getElementById("result-multa_ley_25323_art_1").childNodes[3].innerHTML;

        if(document.getElementById('check-multa_ley_24013_art_8').checked){
            ley24013Art8 = calculoLey24013Art8(sueldo_real, date_fecha_ingreso_real, date_fecha_egreso);
            document.getElementById("result-multa_ley_24013_art_8").childNodes[3].innerHTML = "$ " + ley24013Art8.toFixed(2);
        }else{
            document.getElementById("result-multa_ley_24013_art_8").childNodes[3].innerHTML = "$ 0";
        }
        document.getElementsByName("resultmultaley24013art8")[0].value = document.getElementById("result-multa_ley_24013_art_8").childNodes[3].innerHTML;

        if(document.getElementById('check-multa_ley_24013_art_9').checked || document.getElementById('check-multa_ley_24013_art_10').checked){
            if(!isNaN(date_fecha_ingreso_falsa)){
                ley24013Art9 = calculoLey24013Art9(sueldo_real, date_fecha_ingreso_real, date_fecha_ingreso_falsa);
                if(!isNaN(sueldo_falsa)){
                    ley24013Art10 = calculoLey24013Art10(sueldo_real, sueldo_falsa, date_fecha_ingreso_falsa, date_fecha_egreso);
                }
            }else{
                if(!isNaN(sueldo_falsa)){
                    ley24013Art10 = calculoLey24013Art10(sueldo_real, sueldo_falsa, date_fecha_ingreso_real, date_fecha_egreso);
                }
            }
            if(document.getElementById('check-multa_ley_24013_art_9').checked){
                document.getElementById("result-multa_ley_24013_art_9").childNodes[3].innerHTML = "$ " + ley24013Art9.toFixed(2);
            }else{
                document.getElementById("result-multa_ley_24013_art_9").childNodes[3].innerHTML = "$ 0";
                ley24013Art9 = 0;
            }
            if(document.getElementById('check-multa_ley_24013_art_10').checked){
                document.getElementById("result-multa_ley_24013_art_10").childNodes[3].innerHTML = "$ " + ley24013Art10.toFixed(2);
            }else{
                document.getElementById("result-multa_ley_24013_art_10").childNodes[3].innerHTML = "$ 0";
                ley24013Art10 = 0;
            }
        }else{
            document.getElementById("result-multa_ley_24013_art_9").childNodes[3].innerHTML = "$ 0";
            document.getElementById("result-multa_ley_24013_art_10").childNodes[3].innerHTML = "$ 0";
        }
        document.getElementsByName("resultmultaley24013art9")[0].value = document.getElementById("result-multa_ley_24013_art_9").childNodes[3].innerHTML;
        document.getElementsByName("resultmultaley24013art10")[0].value = document.getElementById("result-multa_ley_24013_art_10").childNodes[3].innerHTML;
        
        
        if(document.getElementById('check-multa_ley_25323_art_2').checked){
            ley25324Art2 = calculoLey25324Art2(antiguedad,preaviso,integracion);
            document.getElementById("result-multa_ley_25323_art_2").childNodes[3].innerHTML = "$ " + ley25324Art2.toFixed(2);
        }else{
            document.getElementById("result-multa_ley_25323_art_2").childNodes[3].innerHTML = "$ 0";
        }
        document.getElementsByName("resultmultaley25323art2")[0].value = document.getElementById("result-multa_ley_25323_art_2").childNodes[3].innerHTML;
        if(document.getElementById('check-multa_ley_24013_art_15').checked){
            ley24013Art15 = calculoLey24013Art15(antiguedad, preaviso, integracion);
            document.getElementById("result-multa_ley_24013_art_15").childNodes[3].innerHTML = "$ " + ley24013Art15.toFixed(2);
        }else{
            document.getElementById("result-multa_ley_24013_art_15").childNodes[3].innerHTML = "$ 0";
        }
        document.getElementsByName("resultmultaley24013art15")[0].value = document.getElementById("result-multa_ley_24013_art_15").childNodes[3].innerHTML;
        if(document.getElementById('check-multa_ley_20744_art_80').checked){
            ley20744Art80 = calculoLey20744Art80(sueldo_real);
            document.getElementById("result-multa_ley_20744_art_80").childNodes[3].innerHTML = "$ " + ley20744Art80.toFixed(2);
        }else{
            document.getElementById("result-multa_ley_20744_art_80").childNodes[3].innerHTML = "$ 0";
        }
        document.getElementsByName("resultmultaley20744art80")[0].value = document.getElementById("result-multa_ley_20744_art_80").childNodes[3].innerHTML;
        if(document.getElementById('check-multa_ley_20744_art_132_bis').checked){
            if(!isNaN(date_fecha_presentacion_demanda)){
                ley20744Art132bis = calculoLey20744Art132Bis(sueldo_real, date_fecha_egreso, date_fecha_presentacion_demanda);
            }
            document.getElementById("result-multa_ley_20744_art_132_bis").childNodes[3].innerHTML = "$ " + ley20744Art132bis.toFixed(2);
        }else{
            document.getElementById("result-multa_ley_20744_art_132_bis").childNodes[3].innerHTML = "$ 0";
        } 
        document.getElementsByName("resultmultaley20744art132bis")[0].value = document.getElementById("result-multa_ley_20744_art_132_bis").childNodes[3].innerHTML;
        if(document.getElementById('check-multa_ley_20744_art_182').checked){
            ley20744Art182 = calculoLey20744Art182(sueldo_real);
            document.getElementById("result-multa_ley_20744_art_182").childNodes[3].innerHTML = "$ " + ley20744Art182.toFixed(2);
        }else{
            document.getElementById("result-multa_ley_20744_art_182").childNodes[3].innerHTML = "$ 0";
        }
        document.getElementsByName("resultmultaley20744art182")[0].value = document.getElementById("result-multa_ley_20744_art_182").childNodes[3].innerHTML;
        
        var total4 = ley25324Art1+ley25324Art2+ley24013Art8+ley24013Art9+ley24013Art10+ley24013Art15+ley20744Art80+ley20744Art132bis+ley20744Art182;
        document.getElementById("result-total4").childNodes[3].innerHTML = "$ " + (total4).toFixed(2);
        document.getElementsByName("resulttotal4")[0].value = document.getElementById("result-total4").childNodes[3].innerHTML;

        var total5 = total1 + total2 + total3 + total4;
        document.getElementsByName("resulttotal5")[0].value = "$ "+total5.toFixed(2);

    }else{
        alert('Datos invalidos');
        document.getElementById("result-antiguedad").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultantiguedad")[0].value = "$ 0";
        document.getElementById("result-preaviso").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultpreaviso")[0].value = "$ 0";
        document.getElementById("result-integracion").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultintegracion")[0].value = "$ 0";
        document.getElementById("result-sac_pres_int").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultsacpresint")[0].value = "$ 0";
        document.getElementById("result-total1").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resulttotal1")[0].value = "$ 0";
        document.getElementById("result-haberes").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resulthaberes")[0].value = document.getElementById("result-haberes").childNodes[3].innerHTML;
        document.getElementById("result-dias_trabajados").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultdiastrabajados")[0].value = "$ 0";
        document.getElementById("result-vacaciones_completas").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultvacacionescompletas")[0].value = "$ 0";
        document.getElementById("result-vacaciones_proporcionales").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultvacacionesproporcionales")[0].value = "$ 0";
        document.getElementById("result-sac_sobre_vacaciones_completas").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultsacsobrevacacionescompletas")[0].value = "$ 0";
        document.getElementById("result-sac_sobre_vacaciones_proporcionales").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultsacsobrevacacionesproporcionales")[0].value = "$ 0";
        document.getElementById("result-sac").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultsac")[0].value = document.getElementById("result-sac").childNodes[3].innerHTML;
        document.getElementById("result-sac_proporcional").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultsacproporcional")[0].value = document.getElementById("result-sac_proporcional").childNodes[3].innerHTML;
        document.getElementById("result-total2").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resulttotal2")[0].value = document.getElementById("result-total2").childNodes[3].innerHTML;
        document.getElementById("result-horas_extraordinarias_al_50").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resulthorasextraordinariasal50")[0].value = document.getElementById("result-horas_extraordinarias_al_50").childNodes[3].innerHTML;
        document.getElementById("result-horas_extraordinarias_al_100").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resulthorasextraordinariasal100")[0].value = document.getElementById("result-horas_extraordinarias_al_100").childNodes[3].innerHTML;
        document.getElementById("result-horas_nocturnas").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resulthorasnocturnas")[0].value = document.getElementById("result-horas_nocturnas").childNodes[3].innerHTML;
        document.getElementById("result-diferencias_salariales").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultdiferenciassalariales")[0].value = document.getElementById("result-diferencias_salariales").childNodes[3].innerHTML;
        document.getElementById("result-total3").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resulttotal3")[0].value = document.getElementById("result-total3").childNodes[3].innerHTML;
        document.getElementById("result-multa_ley_25323_art_1").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultmultaley25323art1")[0].value = document.getElementById("result-multa_ley_25323_art_1").childNodes[3].innerHTML;
        document.getElementById("result-multa_ley_24013_art_8").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultmultaley24013art8")[0].value = document.getElementById("result-multa_ley_24013_art_8").childNodes[3].innerHTML;
        document.getElementById("result-multa_ley_24013_art_9").childNodes[3].innerHTML = "$ 0";
        document.getElementById("result-multa_ley_24013_art_10").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultmultaley24013art9")[0].value = document.getElementById("result-multa_ley_24013_art_9").childNodes[3].innerHTML;
        document.getElementsByName("resultmultaley24013art10")[0].value = document.getElementById("result-multa_ley_24013_art_10").childNodes[3].innerHTML;
        document.getElementById("result-multa_ley_25323_art_2").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultmultaley25323art2")[0].value = document.getElementById("result-multa_ley_25323_art_2").childNodes[3].innerHTML;
        document.getElementById("result-multa_ley_24013_art_15").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultmultaley24013art15")[0].value = document.getElementById("result-multa_ley_24013_art_15").childNodes[3].innerHTML;
        document.getElementById("result-multa_ley_20744_art_80").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultmultaley20744art80")[0].value = document.getElementById("result-multa_ley_20744_art_80").childNodes[3].innerHTML;
        document.getElementById("result-multa_ley_20744_art_132_bis").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultmultaley20744art132bis")[0].value = document.getElementById("result-multa_ley_20744_art_132_bis").childNodes[3].innerHTML;
        document.getElementById("result-multa_ley_20744_art_182").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resultmultaley20744art182")[0].value = document.getElementById("result-multa_ley_20744_art_182").childNodes[3].innerHTML;
        document.getElementById("result-total4").childNodes[3].innerHTML = "$ 0";
        document.getElementsByName("resulttotal4")[0].value = document.getElementById("result-total4").childNodes[3].innerHTML;
        document.getElementsByName("resulttotal5")[0].value = "$ 0";
    }
				
}

function loadSelectDays(){
    checkDay('day1-check');
    checkDay('day2-check');
    checkDay('day3-check');
    checkDay('day4-check');
    checkDay('day5-check');
    loadSelectDay('mon1',9);
    loadSelectDay('mon2',18);
    loadSelectDay('tue1',9);
    loadSelectDay('tue2',18);
    loadSelectDay('wed1',9);
    loadSelectDay('wed2',18);
    loadSelectDay('thu1',9);
    loadSelectDay('thu2',18);
    loadSelectDay('fri1',9);
    loadSelectDay('fri2',18);
    loadSelectDay('sat1',0);
    loadSelectDay('sat2',0);
    loadSelectDay('sun1',0);
    loadSelectDay('sun2',0);
}

function checkDay(day){
    var select = document.getElementById(day);
    select.checked = true;
}

function loadSelectDay(selectId,selectedDay){
    var select = document.getElementById(selectId);
    for(var i=0;i<=23;i++){
        var option = document.createElement('option');
        if(selectedDay==i){
            option.setAttribute('selected', 'selected');
        }
        option.innerHTML = i+' hs';
        select.appendChild(option);
    }
}

function calculateMultas(element){
    
    if(element.id == 'check-multa_ley_25323_art_1' && element.checked){
        document.getElementById('check-multa_ley_24013_art_8').checked = false;
        document.getElementById('check-multa_ley_24013_art_9').checked = false;
        document.getElementById('check-multa_ley_24013_art_10').checked = false;
        document.getElementById('check-multa_ley_24013_art_15').checked = false;
    }
    
    if(element.id == 'check-multa_ley_24013_art_8' && element.checked){
        document.getElementById('check-multa_ley_24013_art_9').checked = false;
        document.getElementById('check-multa_ley_24013_art_10').checked = false;
        document.getElementById('check-multa_ley_25323_art_1').checked = false;
    }
    
    if((element.id == 'check-multa_ley_24013_art_9' || element.id == 'check-multa_ley_24013_art_10') && element.checked){
        document.getElementById('check-multa_ley_24013_art_8').checked = false;
        document.getElementById('check-multa_ley_25323_art_1').checked = false;
    }
    
    calculateLiquidacion();
}

function generarReporte(){
    var nombre = document.getElementById('nombre').value;
    var re = document.getElementsByName("resulttotal5")[0].value;
    if(nombre.length > 0){
        if(re.length>0 && re != '$ 0' && re != '$ 0.00'){
            document.forms["formLiquidacion"].submit();
        }else{
            alert('Completar datos');
        }
    }else{
        alert('Tenes que completar el nombre');
    }
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 