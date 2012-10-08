(function(){
    var mes_nombre=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    var basico_junio=[/*Mayores de 18*/     [1293.65, 1300.56, 1324.74, 1319.56, 1329.92, 1340.28, 1371.37, 1397.28, 1435.28, 1328.19, 1340.28, 1355.83, 1328.19, 1345.46, 1402.46, 1348.92, 1380.01, 1328.19, 1380.01, 1397.28, 1435.28],
                    /*8 horas: 16 años*/    [1260.83, 1262.56, 1264, 1260.83, 1262.56, 1264.29, 1266.01, 1262.56, 1264.29, 1264.29, 1266.01],
                    /*8 horas: 17 años*/    [1266.01, 1267.74, 1269.14, 1266.01, 1267.74, 1269.47, 1271.2, 1267.74, 1269.47, 1273.05, 1274.63],
                    /*6 horas: 14,15,16,17*/[1229.74, 1234.93, 1240.11, 1250.47],
                    /*Adicional*/           [52.85, 162.7, 643.33, 0.11, 0.13, 0.13, 0.16]];
    
    var adcnr=[/*Adicional Acuerdos anteriores*/[29.72, 93.79, 368.67, 0.06, 0.08, 0.08, 0.09],
               /*Adicional Acuerdo 2010*/ [[15.69, 49.04, 193.2, 0.03, 0.04, 0.04, 0.05],
                                        [22.57, 70.43, 277.56, 0.05, 0.06, 0.06, 0.07],
                                        [27.83, 86.77, 342.04, 0.06, 0.07, 0.07, 0.08]]];
    
    function getMensajeProvisorio(colspan){
    	return '<tr><tr><th colspan="'+colspan+'" style="text-align:center;background-color:rgb(240,240,240);font-size:13pt;"><a href="http://jorgevega.com.ar/laboral/455-aumento-salarial-comercio-2012.html" target="_blank">Lo que sigue se basa en acuerdo verbal (NO FIRMADO). Ver detalles... (clic aquí)</a></th></tr>';
    }
    var mes_base=new Date(2010,5,1);
    var tope_mes=36;
    var gr_up=(1-0.055)/(1-0.195);//Grossing up
    //Grupo, Mes, Categoría, [Remunerativo, ANR ant, ANR 2010, ANR 2011, ANR 2012]: bas[0-3][0-24][0-n][0-4]=$ XXX;
    var bas=[];
    
    for(var g=0;g<=4;g++){
        bas[g]=[];
        //Mes base
        bas[g][0]=(function(){
                        var res=[];
                        for(var c=0;c<basico_junio[g].length;c++){
                            res[c]=[];
                            res[c][0]=basico_junio[g][c];
                            res[c][1]=g==4?adcnr[0][c]:res[c][0]*0.2+500;
                            res[c][2]=g==4?adcnr[1][0][c]:(res[c][0]+res[c][1]+75)*0.15+75;
                            res[c][3]=0;
                            res[c][4]=0;
                        }
                        return res;
                    })();
        //Meses posteriores al mes base
        for(var m=1;m<tope_mes;m++){
            bas[g][m]=[];
            //Recorro categorías
            for(var c=0;c<bas[g][0].length;c++){
                bas[g][m][c]=[];
                bas[g][m][c][3]=0;
                bas[g][m][c][4]=0;
                //Acuerdos anteriores [1]
                if(m>11){
                    bas[g][m][c][1]=0;
                }else{
                    bas[g][m][c][1]=(bas[g][0][c][1])/12*(12-m);
                }
                //Acuerdo 2010 [2]
                switch(m){
                    case 3:
                        bas[g][m][c][2]=g==4?adcnr[1][1][c]:(bas[g][0][c][0]+bas[g][0][c][1]+75)*(1.15*1.07-1)+75;
                    break;
                    case 6:
                        bas[g][m][c][2]=g==4?adcnr[1][2][c]:(bas[g][0][c][0]+bas[g][0][c][1]+75)*(1.15*1.07*1.05-1)+75;
                    break;
                    case 17:
                        bas[g][m][c][2]=0;
                    break;
                    default:
                        if((m>12&&m<17)){
                            bas[g][m][c][2]=(bas[g][12][c][2])/5*(17-m);
                        }else{
                            bas[g][m][c][2]=bas[g][m-1][c][2];
                        }
                        
                    break;
                }
                                
                //Remunerativo [0]
                if(m<=12){
                    bas[g][m][c][0]=bas[g][m-1][c][0]+(bas[g][0][c][1])/12*gr_up;
                }else if(m<=17){
                    bas[g][m][c][0]=bas[g][m-1][c][0]+(bas[g][12][c][2])/5*gr_up;
                }else{
                    bas[g][m][c][0]=bas[g][m-1][c][0];
                }
            }
            
        }
        
    }
    //Acuerdo 2011 [3]
    for(var g=0;g<=4;g++){
        
        //Meses posteriores a abril de 2011
        for(var m=11;m<tope_mes;m++){
            
            //Recorro categorías
            for(var c=0;c<bas[g][0].length;c++){
                switch(m){
                    case 11://Mayo 2011
                        bas[g][m][c][3]=bas[g][17][c][0]*0.15;
                    break;
                    case 15://Septiembre 2011
                        bas[g][m][c][3]=bas[g][17][c][0]*0.23;
                    break;
                    case 18://Diciembre 2011
                        bas[g][m][c][3]=bas[g][17][c][0]*0.30;;
                    break;
                    case 22://Abril 2012
                        bas[g][m][c][3]=0;
                    break;
                    default://Otro mes
                        bas[g][m][c][3]=bas[g][m-1][c][3];
                    break;
                }
                //Remunerativo [0] desde abril 2012
                if(m>21){
                    bas[g][m][c][0]=bas[g][21][c][0]+(bas[g][21][c][3])*gr_up;
                }
            }
        }
    }
    //Acuerdo 2012 [4] estimado
    function acuerdop2012(){
        var aump=/*aump_2012||*/[0.15,0.09];
        for(var g=0;g<=4;g++){
            //Meses posteriores a abril de 2012
            for(var m=23;m<tope_mes;m++){
                
                //Recorro categorías
                for(var c=0;c<bas[g][0].length;c++){
                    switch(m){
                        case 23://Mayo 2012
                            bas[g][m][c][4]=bas[g][22][c][0]*aump[0];
                        break;
                        case 29://Noviembre 2012
                            bas[g][m][c][4]=bas[g][22][c][0]*aump[1];
                        break;
                        case 35://Mayo 2013
                            bas[g][m][c][4]=0;
                        break;
                        default://Otro mes
                            bas[g][m][c][4]=bas[g][m-1][c][4];
                        break;
                    }
                    if(m>34){			//Remunerativo [0] desde mayo 2013	(2º cuota)
                        bas[g][m][c][0]=bas[g][34][c][0]+(bas[g][34][c][4])*gr_up;
                    }else if(m>28){		//Remunerativo [0] desde noviembre de 2012 (1º cuota)
                    	bas[g][m][c][0]=bas[g][28][c][0]+(bas[g][23][c][4])*gr_up;
                    }
                }
            }
        } 
    };  
    acuerdop2012();
    
    //Nombre campos
    var meses=(function(){
        var res={},
        	mes=mes_base.getMonth(),
        	ano=mes_base.getFullYear(),
        	n=0;
        for(var j=0;j<tope_mes;j++,n++){
            if(!res[ano]){
                res[ano]=[];
                n=0;
            }
            res[ano][n]=mes_nombre[mes];
            
            ano=mes==11?ano+1:ano;
            mes=mes==11?0:mes+1;
        }
        return res;
    })();
    var cat=[];
    cat[0]={
        "Maestranza y Servicios":["A","B","C"],
        "Administrativo":["A","B","C","D","E","F"],
        "Cajeros":["A","B","C"],
        "Personal Auxiliar":["A","B","C"],
        "Auxiliar Especializado":["A","B"],
        "Ventas":["A","B","C","D"]
    }
    cat[1]={
        "Maestranza y Servicios":["A","B","C"],
        "Administrativo":["A","B","C","D"],
        "Personal Auxiliar":["A","B"],
        "Auxiliar Especializado":["A","B"]
    }
    cat[2]=cat[1];
    cat[3]={"NC1":["14 años","15 años", "16 años", "17 años"]};
    cat[4]={
        "NC1":["Armado de vidrieras (Art. 23)"],
        "Cajeros (Art. 30)":["A y C","B"],
        "Ayudante de Chofer (Art. 36)":["Primeros 100 kms.", "Más de 100 kms."],
        "Chofer (Art. 36)":["Primeros 100 kms.", "Más de 100 kms."]
    };
    var catd=[];
    catd[0]=[[["Se considera personal de maestranza y servicios al que realiza tareas atinentes al aseo del establecimiento, al que se desempeña en funciones de orden primario y a los que realicen tareas varias sin afectación determinada."],["personal de limpieza y encerado; cuidadores de toilettes y/o vestuarios y/o guardarropas y/o mercaderías; ayudantes de reparto; cafeteros; caballerizos; ordenanzas; porteros; sere-nos sin marcación de reloj que no realicen otras tareas; repartidores domiciliarios de mercaderías sin conducción de vehículo automotor; carga y descarga; ascensoristas; personal de vigilancia; ensobradores y franqueadores de correspondencia;"],["serenos con marcación de reloj o sin marcación de reloj que realicen otra tarea; acomodadores de mercaderías; separadores de boletas y remitos en expedición; empaquetadores en expedición; playeros sin cartera (estaciones de servicio); ayudantes de trabajador especializado; ayudantes de capilleros y/o furgoneros; personal de envasado y/o fraccionamiento de productos alimenticios; fotocopistas; cuidadoras infantiles (BabySister)."],["Marcadores de mercaderías; etiquetadores; personal de depósitos de supermercados y/o autoservicios; ayudantes de liquidación (editorial); conductores de vehículos de tracción a sangre; porteros de servicios fúnebres; personal de envasado y/o fraccionamiento de productos químicos; limpieza y ventilación de cereales; personal de embolse, pesaje, costura, sellado y rotulado (semillería); personal de estiba; playeros con cartera (estación de servicio); cuidadora enfermera de guardería (Baby Sister)."]],
                     [["Se considera personal administrativo al que desempeña tareas referidas a la administración de la empresa."],["ayudante: telefonistas de hasta 5 líneas; archivistas; recibidores de mercaderías; estoquistas; repositores y ficheristas; revisores de facturas; informantes; visitadores; cobradores; depositores; dactilógrafos; debitadores; planilleros; controladores de precios; empaquetadores; empleados o auxiliares de tareas generales de oficina; mensajeros; ayudantes de trámites internos; recepcionistas; portadores de valores; preparadores de clearing y depósitos de entidades financieras calificadas por la ley de entidades financieras (en cajas de crédito cooperativa);"],["oficial de segunda: pagadores; telefonistas con más de 5 líneas; clasificadores de reparto; separadores y/o preparadores de pedidos; balanceros; controladores de documentación; verificadores de bienes prendados; tenedores de libros; liquidadores y/o controladores de operaciones regidas por normas; atención de público para captación de ahorro y colocación de créditos y valores; controles, órdenes y entregas de documentos; secretarios/ as; atención de cuentas a plazo determinado y ahorro (en cajas de crédito cooperativa); control de firmas de extracciones (en cajas de crédito cooperativa); "],["oficial de primera: recaudadores-facturistas; calculistas; responsables de cartera de turno (estaciones de servicio); secretarios/as de jefatura (no de dirección); corresponsales con redacción propia; liquidadores y/o controladores de operaciones no regidas por tablas; tenedores de libros principales; cuenta-correntistas; liquidadores de sueldos y jornales; ayudantes de cajera en entidades financieras; operadores de máquinas de contabilidad de registro directo; preparadores del estado del redescuento que tienen las Cajas de Crédito Cooperativas ante el Banco Central;"],["especializado: liquidacionistas (confecciona liquidaciones para su remisión y entrega a clientes de semillerías); compradores; ayudantes de contador; especialistas en leyes sociales y/o en asuntos aduaneros y/o en asuntos impositivos; liquidadores de derechos de autos; presupuestistas; compradores de bienes muebles para locaciones; auxiliares principales a cargo de asuntos legales; analistas de imputaciones contables según normas; controles y análisis de legajos de clientes; controles de garantías y valores negociados; taquidactilógrafos; operadores de máquinas de contabilidad de registro directo con salida de cinta; personal administrativo de las empresas y/o instituciones, afines a servicios fúnebres (cementerios privados, remiserías, velatorios);"],["encargado de segunda;"],["segundo jefe o encargado de primera."]],
                     [["Asimismo se considera Personal Administrativo a los cajeros afectados a la cobranza en el establecimiento, de las operaciones de contado y crédito, mediante la recepción de dinero en efectivo y/o valores y conversión de valores."],["cajeros/as que cumplan únicamente operaciones de contado y/o crédito;"],["cajeros/as que cumplan la tarea de cobrar operaciones de contado y crédito y además desempeñen tareas administrativas afines a la caja o de empaque;"],["cajeros/as de entidades financieras."]],
                     [["Se considera Personal Auxiliar a los trabajadores que con oficio o práctica realicen tareas de reparación, ejecución, mantenimiento, transformación, servicie de toda índole, de bienes que hacen al giro de la empresa y/o su transporte con utilización de medios mecánicos."],["retocadores de muebles, embaladores; torcionadores; cargadores de grúa móvil y/o montacarga; personal de fraccionamiento y curado de granos; reparación, armado y/o transformación de enseres, maquinarias, mercaderías y muebles; ayudantes de las especificaciones del punto b) de este artículo; personal afectado a salas de velatorios; ayudantes de choferes de corta distancia de vehículos automotores de cualquier tipo afectados al reparto, transporte y/o tareas propias del establecimiento;"],["herreros; carpinteros; lustradores de muebles; cerrajeros; guincheros; albañi-les; herradores; soldadores; capilleros y furgoneros de servicios fúnebres; talabarteros; plomeros; instaladores de antena de T.V.; service de artefactos del hogar en general; gasistas; tostadores de cereales; fundidores de maniquíes; foguistas de laboratorios fo-tográficos; personal de mantenimiento de supermercados, autoservicios y/o empresas; tractoristas; sastres y tapiceros de servicio fúnebres; pintores; mecánicos; engrasadores; lavadores; gomeros; ayudantes de laboratorios (semillerías); ayudantes de clasificador de granos; ayudantes de secador de granos; choferes de corta distancia de vehículos automotores de cualquier tipo afectados al reparto, transporte y/o tareas propias del establecimiento;"],["capataces; capataces de cuadrilla o de florada."]],
                     [["Se considera personal auxiliar especializado a los trabajadores con conocimientos o habilidades especiales en técnicas o artes que hacen al giro de los negocios de la empresa de la cual dependen."],["dibujantes y/o letristas; decoradores; kinesiólogos; enfermeros; peluqueros; pedicuros; manicuras; expertos en belleza; fotógrafos; balanceadores; demostradores; cocineros; panaderos; dibujantes detallistas; seleccionadores de material gráfico; tapistas; personal de formación en capacitación (permanente); recepcionistas de producción y/o coordinadores; laboratoristas de semillerías, fraccionadores de productos químicos; clasificadores de granos; secadores de granos; dietistas y/o ecónomos (centros materno-infantiles); nurses; ayudantes de vidrieristas o de las restantes especialidades de la categoría b) de este artículo; ayudantes de choferes de larga distancia de vehículos automotores de cualquier tipo afectados al reparto, transporte y/o tareas propias del establecimiento;"],["vidrieristas; liquidadores de cereales; especializados en seguros; traductores; intérpretes; ópticos técnicos; mecánicos de automotores; teletipistas; instrumentistas; conductores de obras; joyeros; relojeros; técnicos de impresión; técnicos gráficos; correctores de estilo; secretarios de colección; maestras jardineras y/o asistentes sociales (centros materno-infantiles); operadores de télex y radio-operadores; personal que se desempeña en funciones para las cuales se le requiera el uso de idiomas extranjeros en forma específica; choferes de larga distancia de vehículos automotores de cualquier tipo afectados a reparto, transporte y/o tareas propias del establecimiento."]],
                     [["Se considera personal de ventas a los trabajadores que se desempeñen en tareas y/u operaciones de venta cualquiera sea su tipificación."],["degustadores;"],["vendedores; promotores;"],["encargados de segunda;"],["jefes de segunda o encargados de primera."]]
                ];
    catd[1]=[catd[0][0],catd[0][1],catd[0][3],catd[0][4]];
    catd[2]=catd[1];
    
    var conceptos={
        "Conceptos remunerativos":["Básico","Ant.","Pres"],
        "Conceptos no remunerativos":["Adicional",['Acuerdos',['previos','2010', '2011', '2012']], "Pres"]
    }
    var concd=[
        ["","","Antigüedad: mayo 2010 hasta noviembre 2010: 0,75%. Desde diciembre de 2010: 1%","Presentismo. Las cifras remunerativas y no remunerativas deberán ser incrementadas en una doceava parte. (Asignación artículo 40 CC 130/75.)"],
        ["","Adicional no remunerativo",["",["En junio de 2010 representa el 20% sobre el básico + $500($100 + $300 + $100). Desde julio hasta junio de 2011 se incorpora al sueldo básico en partes iguales (12 cuotas). Cada cuota se debe acrecentar en la proporción necesaria hasta absorber los aportes a cargo del trabajador, de tal forma que su salario de bolsillo siga siendo el mismo.","Representa un incremento del 27%. Este se abonará en forma acumulativa en los siguientes meses: a) mayo 2010: 15%; b) septiembre 2010: 7%; c) diciembre 2010: 5%. Desde julio de 2011 hasta noviembre de 2011 se incorpora al básico en partes iguales (5 cuotas). Base de cálculo= básico + no remunerativo acuerdo anterior + acuerdo suma fija ($75). Esta base se multiplica por el porcentaje de incremento y se suma $75. Cada cuota se debe acrecentar en la proporción necesaria hasta absorber los aportes a cargo del trabajador, de tal forma que su salario de bolsillo siga siendo el mismo.","",""]],""]
    ];
    var concv=[[1,1,1],[1,0,0,0,0]];    
    concd[1][3]=concd[0][3];
    var col=[];
    col[0]="4";
    col[1]="1,4";
    col[2]=col[1];
    col[3]=col[1];
    col[4]="1";
    function get_fila(grupo, mes, categoria, antiguedad, total, filtro,presentismo){
        grupo*=1;mes*=1;categoria*=1;antiguedad*=1;
		var res=[],
        	n=0,
        	t2=0,
        	t1=d3=r=b=a=sac=pre=[0,0],
        	mes_ano=(mes+5)%12,
        	val=bas[grupo][mes][categoria];
        //Remunerativo
        b=res[n++]=[0,(grupo==4&&(categoria==1||categoria==2))?0:val[0]];
        if(!filtro&&(grupo==0)){
            a=res[n++]=[0,(mes>5?0.01:0.0075)*antiguedad*res[0][1]];    
        }
        pre=res[n++]=[0,presentismo?(b[1]+a[1])/12:0];
        if(grupo!=4&&(mes_ano==5||mes_ano==11)){//SAC
            sac=res[n++]=[0,(b[1]+a[1]+pre[1])*0.5];
        }
        if(total){
            t1=res[n++]=[1,b[1]+a[1]+pre[1]+sac[1]];
        }
        
        //no remunerativo
        if(!filtro&&grupo==4){
            r=res[n++]=[0,(categoria==1||categoria==2)?val[0]:0];
            t2+=r[1];        
        }
        if(mes<12){
            r=res[n++]=[0,val[1]];
            t2+=r[1];
        }
        if(mes<17){
            r=res[n++]=[0,val[2]];
            t2+=r[1];
        }
        if(mes>10&&mes<22){
            r=res[n++]=[0,val[3]];
            t2+=r[1];    
        }
        if(mes>22&&mes<35){//Acuerdo 2012: Mayo 2012 - Abril 2013
            r=res[n++]=[0,val[4]];
            t2+=r[1];    
        }
        pre=[0,0];
        if(t2||grupo==4){
            pre=res[n++]=[0,presentismo?(t2)/12:0];
            t2+=pre[1];    
        }
        sac=[0,0];
        if(grupo!=4&&(mes_ano==5||mes_ano==11)){//SAC
            switch(true){
            	case mes==12||mes==24://Junio 2011 y 2012
	            	r=sac=res[n++]=[0,(t2-r[1]-pre[1])*0.5+(r[1])/12*2];
	                r[1]+=presentismo?(r[1])/12:0;
            	break;
            	default:
            		r=sac=res[n++]=[0,t2*0.5];
            	break;
            }
			t2+=r[1];
        }
        //totales
        if(total){
            if(t2||grupo==4){
            res[n++]=[1,t2];
            }
            res[n++]=[2,t1[1]+t2];
            if(grupo==0){
                d3=res[n++]=[0,t1[1]*0.195+t2*0.055];
                if(mes==0||mes==12||mes==13){//Aporte OSECAC junio 2010, junio y julio 2011
                    d3[1]+=50;
                }else if(mes==23){//Aportes OSECAC mayo 2012
                	d3[1]+=100;
                }
                res[n++]=[2,t1[1]+t2-d3[1]];
            }
        }
        return res;
    }
    function get_fila1(grupo, mes, categoria, antiguedad, total, filtro,presentismo){
    	grupo*=1;mes*=1;categoria*=1;antiguedad*=1;
        var res=[],
        	n=0,
        	t1=t2=d3=0,
        	val=bas[grupo][mes][categoria];
        
        res[n++]=[0,(grupo==4&&(categoria==1||categoria==2))?0:val[0]];
        if(!filtro&&(grupo==0)){
            res[n++]=[0,(mes>5?0.01:0.0075)*antiguedad*res[0][1]];    
        }
        res[n++]=[0,presentismo?(res[n-2][1]+((!filtro&&grupo==0)?res[n-3][1]:0))/12:0];
        if(total){
            t1=res[n++]=[1,res[n-2][1]+res[n-3][1]+((!filtro&&grupo==0)?res[n-4][1]:0)];
        }
        
        if(!filtro&&grupo==4){
            res[n++]=[0,(categoria==1||categoria==2)?val[0]:0];        
        }

        res[n++]=[0,val[1]];
        res[n++]=[0,val[2]];
        res[n++]=[0,val[3]];
        res[n++]=[0,val[4]];
        res[n++]=[0,presentismo?(res[n-2][1]+res[n-3][1]+res[n-4][1]+((!filtro&&grupo==4)?res[n-5][1]:0))/12:0];
        if(total){
            t2=res[n++]=[1,res[n-2][1]+res[n-3][1]+res[n-4][1]+res[n-5][1]+res[n-6][1]+((!filtro&&grupo==4)?res[n-7][1]:0)];
            res[n++]=[2,t1[1]+t2[1]];
            if(grupo==0){
                d3=res[n++]=[0,t1[1]*0.195+t2[1]*0.055];
                if(mes==0||mes==12||mes==13){//Aporte OSECAC junio 2010, junio y julio 2011
                    d3[1]+=50;
                }else if(mes==23){//Aportes OSECAC mayo 2012
                	d3[1]+=100;
                }
                res[n++]=[2,t1[1]+t2[1]-d3[1]];
            }
        }
        return res;
    }
    function get_head(grupo,mes,total,filtro){//Categoria
    	grupo*=1;mes*=1;
        var html="<thead>",
        	tr1=tr2=tr3="<tr>",
        	mes_ano=(mes+5)%12,
        	col=cola=0;
        tr1+='<th rowspan="3"></th>';
        //Remunerativo
        tr2+='<th rowspan="2">Básico</th>';col++;
        if(!grupo){
            tr2+='<th title="Antigüedad" rowspan="2">Ant.</th>';col++;
        }
        
        tr2+='<th rowspan="2" title="Presentismo">Pres</th>';col++;
        if(grupo!=4&&(mes_ano==5||mes_ano==11)){//SAC
        tr2+='<th rowspan="2" title="Aguinaldo">SAC</th>';col++;
        }
        tr2+='<th rowspan="2">Total</th>';col++;
        tr1+='<th colspan="'+col+'">Conceptos remunerativos</th>';
        //No remunerativo
        col=0;
        if(grupo==4){
            tr2+='<th rowspan="2">Adicional</th>';col++;
        }
        
        if(mes<12){
        tr3+='<th>previos</th>';col++;cola++;
        }
        if(mes<17){
        tr3+='<th>2010</th>';col++;cola++;    
        }
        if(mes>10&&mes<22){
        tr3+='<th>2011</th>';col++;cola++;
        }
        if(mes>22&&mes<35){
        tr3+='<th>2012</th>';col++;cola++;
        }
        if(cola)
        tr2+='<th'+(cola>1?' colspan="'+cola+'"':'')+'>Acuerdos</th>';
        
        if(grupo==4||(mes<35&&mes!=22)){
        tr2+='<th rowspan="2" title="Presentismo">Pres</th>';col++;    
        }
        if(grupo!=4&&(mes_ano==5||mes_ano==11)){//SAC
        tr2+='<th rowspan="2" title="Aguinaldo">SAC</th>';col++;
        }
        if(col){
        tr2+='<th rowspan="2">Total</th>';col++;
        tr1+='<th colspan="'+col+'">Conceptos no remunerativos</th>';    
        }
        //Fin
        tr1+='<th rowspan="3">Total<br />bruto</th>';
        if(!grupo){
        tr1+='<th rowspan="3">Aportes</th>';
        tr1+='<th rowspan="3">Total<br />neto</th>';    
        }
        
        
        tr1+="</tr>";
        tr2+="</tr>";
        tr3+="</tr>";
        html+=tr1+tr2+tr3+"</thead>";
        return html;
    }
    
    function get_head1(grupo,total,filtro){//Mes
    	grupo*=1;
        var html="<thead>",
        	tr1='<tr><th rowspan="3"></th>',
        	tr2=tr3="<tr>",
        	j=0,
        	nk=0,
			desc='',
			colspan=0;
        
        for(var key in conceptos){
            var t=n=conceptos[key].length;
            
            for(var i=0;i<t;i++){
                
                if((grupo==0&j==1)|(grupo==4&j==3)|(j!=1&j!=3)){
                	if(conceptos[key][i] instanceof Array){
                		tr2+='<th colspan="'+conceptos[key][i][1].length+'">'+conceptos[key][i][0]+'</th>';
                		n+=conceptos[key][i][1].length-1;
                		for(var x=0;x<conceptos[key][i][1].length;x++){
                			desc=concd[nk][i+1][1][x]!=""?' title="'+concd[nk][i+1][1][x]+'"':'';
                			tr3+='<th'+desc+'>'+conceptos[key][i][1][x]+'</th>';
                		}
                	}else{
                		desc=concd[nk][i+1]!=""?' title="'+concd[nk][i+1]+'"':'';
                		tr2+='<th rowspan="2"'+desc+'>'+conceptos[key][i]+'</th>';
                	}
                }else{
                    n--;
                }
                j++;
            }
            if(total){
                tr2+='<th rowspan="2">Total</th>';
                n++;
            }
            colspan=n>1?' colspan="'+n+'"':'';
            desc=concd[nk][0]!=""?' title="'+concd[nk][i+1]+'"':'';
                
            tr1+='<th'+colspan+desc+'>'+key+'</th>';
            nk++;
        }
        if(total){
                tr1+='<th rowspan="3">Total<br/>Bruto</th>';
                if(grupo==0){
                    tr1+='<th rowspan="3">Aportes</th>';
                    tr1+='<th rowspan="3">Total<br/>Neto</th>';    
                }
                
                n++;
        }
        tr1+="</tr>";
        tr2+="</tr>";
        tr3+="</tr>";
        html+=tr1+tr2+tr3;
        html+="</thead>";
        return html;
    }
    //Funciones uso general
    function numberToString(number, ndec, blanco){  
        var num=number.toFixed(ndec)+"";
        var a=num.split(/\./);
        
        if(a.length==1){
            a[1]="";
            for(var j=0;j<=ndec;j++)
            a[1]+="0";
        }else{
            if(a[1].length<ndec){
                for(var j=a[1].length;j<=ndec;j++)
                a[1]+="0";
            }
        }
        
            var n=a[0].length;
            var res=","+a[1].substr(0,ndec);
            while(n>3){
                n=n-3;
                res ="."+a[0].substr(n,3)+res;
            }
        num= a[0].substr(0,n)+res;    
        if(blanco&&(/^[0.,]+$/.test(num))){
            num="";
        }
        return num;
    };
    function $(id){
        return document.getElementById(id);
    }
    function copia_obj(obj){
        var objn={};
        for(var k in obj){
            if(typeof obj[k]=="object"){
                objn[k]=copia_obj(obj[k]);
            }else{
                objn[k]=obj[k];
            }
        }
        return objn;
    }
    String.prototype.leftPad=function(size, letra){
        var texto=this;
        if(this.length<size){
            var tam=size-this.length;
            for(;tam;tam--){
                texto=letra+texto;
            }
        }
        return texto;
    };
    function get_tabla_categoria(grupo,mes,antiguedad,presentismo){
    	grupo*=1;mes*=1;antiguedad*=1;
        var base=bas[grupo],
        	html="",
        	class_name='',
        	tit_colspan=0,
        	c=0,
        	fila,
        	ndec=1,
        	cat_d="",
        	tot=0,
			cuerpos='';
        	
        html+='<table>';
        html+=get_head(grupo,mes,true,false);
        
        for(var k in cat[grupo]){
            cuerpos+='<tbody>';
            var cuerpo='';
            for(var j=0;j<cat[grupo][k].length;j++){
                fila=get_fila(grupo,mes,c,antiguedad,true,false,presentismo);
                ndec=(grupo==4&&c>=3)?4:1;
                if(catd[grupo]){
                    cat_d=' title="'+catd[grupo][tot][j+1]+'"';
                }else{
                    cat_d="";
                }
                cuerpo+='<tr class="conv_v"'+cat_d+'>';  
                cuerpo+='<td>'+cat[grupo][k][j]+'</td>';  
                for(var z=0;z<fila.length;z++){
                    class_name=fila[z][0]==1?' class="total"':(fila[z][0]==2?' class="total_g"':"");
                    cuerpo+='<td'+class_name+'>'+numberToString(fila[z][1],ndec,true)+'</td>';
                }
                cuerpo+='</tr>';   
                c++; 
            }
            if(!/^NC\d+$/.test(k)){
                if(catd[grupo]){
                    cat_d=' title="'+catd[grupo][tot][0]+'"';
                }else{
                    cat_d="";
                }
                cuerpos+='<tr'+cat_d+'><th colspan="'+(fila.length+1)+'">'+k+'</th></tr>';
            }
            cuerpos+=cuerpo;
            cuerpos+='</tbody>';
            tot++;
        }
        //if(mes>22)html+='<tbody>'+getMensajeProvisorio(fila.length+1)+'</tbody>';
        html+=cuerpos;
        html+='</table>'; 
        return html;   
    }
    function get_tabla_mes(grupo,categoria,antiguedad,presentismo){
    	grupo*=1;categoria*=1;antiguedad*=1;
        var base=bas[grupo],
        	html="",
        	class_name='',
        	tit_colspan=0,
        	c=0,
        	fila,
        	ndec=1,
        	m=0;
       	       	
        html+='<table>';
        html+=get_head1(grupo,true,false);
        for(var ano in meses){
            var cuerpo='';
            for(var mes=0;mes<meses[ano].length;mes++,m++){
            	fila=get_fila1(grupo,m,categoria,antiguedad,true,false,presentismo);
                /*if(m==23){//desde mayo de 2012 - hasta que se firme advierto
            		cuerpo+=getMensajeProvisorio(fila.length+1);    		
            	}
            	if(m>22){//provisorio
            		cuerpo+='<tr class="conv_v" style="background-color:rgb(255,240,240);">';
            	}else{}*/
           		
	   			cuerpo+='<tr class="conv_v">';
            	
				ndec=(grupo==4&&categoria>=3)?4:1;    
                    cuerpo+='<td>'+meses[ano][mes]+'</td>';  
                for(var z=0;z<fila.length;z++){
                    class_name=fila[z][0]==1?' class="total"':(fila[z][0]==2?' class="total_g"':"");
                    cuerpo+='<td'+class_name+'>'+numberToString(fila[z][1],ndec,true)+'</td>';
                }
                
                cuerpo+='</tr>';
                
            }
            if(ano>2011){
            	html+='<tbody><tr><th colspan="'+(fila.length+1)+'"><b class="pan_bot display" onmousedown="mostrar(this,'+ano+');">▬</b>'+ano+'</th></tr></tbody>';
            	html+='<tbody id="s_'+ano+'">'+cuerpo+'</tbody>';
            	/*html+='<tbody><tr><th colspan="'+(fila.length+1)+'">'+ano+'</th></tr></tbody>';
            	html+='<tbody>'+cuerpo+'</tbody>';*/
            }else{
            	html+='<tbody><tr><th colspan="'+(fila.length+1)+'"><b class="pan_bot" onmousedown="mostrar(this,'+ano+');">►</b>'+ano+'</th></tr></tbody>';
            	html+='<tbody id="s_'+ano+'" style="display:none;">'+cuerpo+'</tbody>';
            }
        }
        html+='</table>'; 
        return html;   
    }
    var mes_sel=(function(){
        var sel=0;
        if(typeof mes_select!="undefined"){
            var fec=mes_select.split(/-/g);
            var a=fec[0]*1;
            var m=fec[1]*1;
            if(a==2010){
                sel=m-6;
            }else if(a>=2011){
                sel=(a-2011)*12+m+6;
            }
        }else{
            var d=new Date();
            
            var a=d.getFullYear();
            if(a==2010){
                sel=d.getMonth()+1-6;
            }else if(a>=2011){
                sel=(a-2011)*12+d.getMonth()+1+6;
            }
            if(sel&&d.getDate()<10){
                sel--;
            }
        }
        return sel;   
    })();
    var cat_sel=[0,0,0,0,0];
    var bot_sel=0;
    function get_categorias(id, grupo){
        document.getElementById(id).innerHTML='';
        var n=0;
        for(var k in cat[grupo]){
            var prev='';
            if(!/^NC\d+$/.test(k)){
                prev=k+': ';
            }
            for(var c=0;c<cat[grupo][k].length;c++,n++){
                var opt=document.createElement("option");
                opt.value=''+n;
                if(n==cat_sel[bot_sel]){
                    opt.selected="selected";
                }
                opt.appendChild(document.createTextNode(prev+cat[grupo][k][c]));
                document.getElementById(id).appendChild(opt);
            }
        }
        
    }
    function get_meses(id){
        document.getElementById(id).innerHTML='';
        var values=[];
        var m=0;
        for(var ano in meses)
        for(var mes=0;mes<meses[ano].length;mes++,m++)
  		values.push([m,ano+' '+meses[ano][mes]]);
        
        values.sort(function(a,b){return b[0]-a[0]});
        for(var i=0;i<values.length;i++){
            var opt=document.createElement("option");
            opt.value=''+values[i][0];
            if(values[i][0]==mes_sel){
                opt.selected="selected";
            }
            opt.appendChild(document.createTextNode(values[i][1]));
            document.getElementById(id).appendChild(opt);    
        }
	}
    
    function actualizar_vista(act){
        var edad=document.getElementById("sel_edad_6h").value;
        var grupo=bot_sel==1?(edad==16?1:2):bot_sel*1;
        var resumen=document.getElementById("sel_resumen").value;
        if(act){
            if(resumen==1){
                 get_meses("sel_resumen_r");      
            }else{
                 get_categorias("sel_resumen_r",grupo);   
            }    
        }
        var resumen_r=document.getElementById("sel_resumen_r").value;
        var pres=document.getElementById("sel_presentismo").value*1;
        var ant=document.getElementById("sel_antiguedad").value;        
        
        if(resumen==1){
            html=get_tabla_categoria(grupo,resumen_r,ant,pres);
        }else{
            html=get_tabla_mes(grupo,resumen_r,ant,pres);   
        }
        
        document.getElementById("besc_1").style.backgroundColor=grupo==0?"red":"black";
        document.getElementById("besc_2").style.backgroundColor=(grupo==1||grupo==2)?"red":"black";
        document.getElementById("besc_3").style.backgroundColor=grupo==3?"red":"black";
        document.getElementById("besc_4").style.backgroundColor=grupo==4?"red":"black";
        
        document.getElementById("block_antiguedad").style.display=(grupo==0)?"inline":"none";
        document.getElementById("block_edad_6h").style.display=(grupo==1||grupo==2)?"inline":"none";
        return html;
    }
    function cargar_eventos(){
        document.getElementById("besc_1").onclick=function(){bot_sel=0;document.getElementById("tabla_res").innerHTML=actualizar_vista(true)};
        document.getElementById("besc_2").onclick=function(){bot_sel=1;document.getElementById("tabla_res").innerHTML=actualizar_vista(true)};
        document.getElementById("besc_3").onclick=function(){bot_sel=3;document.getElementById("tabla_res").innerHTML=actualizar_vista(true)};
        document.getElementById("besc_4").onclick=function(){bot_sel=4;document.getElementById("tabla_res").innerHTML=actualizar_vista(true)};
        
        document.getElementById("sel_resumen").onchange=function(){document.getElementById("tabla_res").innerHTML=actualizar_vista(true)};
        document.getElementById("sel_edad_6h").onchange=function(){document.getElementById("tabla_res").innerHTML=actualizar_vista(false)};
        document.getElementById("sel_resumen_r").onchange=function(){
            if(document.getElementById("sel_resumen").value==1){
                mes_sel=document.getElementById("sel_resumen_r").value;
            }else{
                cat_sel[bot_sel]=document.getElementById("sel_resumen_r").value;
            }
            document.getElementById("tabla_res").innerHTML=actualizar_vista(false)
        };
        document.getElementById("sel_presentismo").onchange=function(){document.getElementById("tabla_res").innerHTML=actualizar_vista(false)};
        document.getElementById("sel_antiguedad").onchange=function(){document.getElementById("tabla_res").innerHTML=actualizar_vista(false)};
    }
    
    if(document.getElementById('esc_com_v1')){
        var tabla_res=document.createElement('div');
        var com_esc=document.getElementById('esc_com_v1');
        tabla_res.id='tabla_res';
        tabla_res.innerHTML=actualizar_vista(true);
        com_esc.appendChild(tabla_res);
        cargar_eventos();
    }
    if(document.getElementById('esc_rec')){
        mostrar_escala_recibo();
    }
    function mostrar_escala_recibo(){
    	var esc_rec=document.getElementById("esc_rec");
        var opc={
            mes:document.getElementById("esc_mes"),
            cat:document.getElementById("esc_cat"),
            pre:document.getElementById("esc_pre"),
            ant:document.getElementById("esc_ant"),
            jor:document.getElementById("esc_jor"),
            retro:document.getElementById("esc_retro")
        }; 
        var retrov=document.getElementById("esc_retro_v");
        
        var sueldo={
            rem:[
                ["Sueldo básico",false,0],
                ["Antigüedad",0,0],
                ["Presentismo",1/12,0]
            ],
            nrem:[
                ["Adicional no remunerativo 2008-2009",false,0],
                ["Adicional no remunerativo 2010",false,0],
                ["Adicional no remunerativo 2011",false,0],
                ["Acuerdo mayo 2012", false, 0],
                /*["Pago anticipo a cuenta del acuerdo colectivo mayo 2012", false, 0],*/
                ["Retroactivo Acuerdo mayo-2011",false,0],
                ["Retroactivo Acuerdo mayo-2012",false,0],
                ["Presentismo",1/12,0]
            ],
            desc:[
                ["Jubilación",0.11,0],
                ["Ley 19032",0.03,0],
                ["Obra social",0.03,0],
                ["Faecys",0.005,0],
                ["Sindicato",0.02,0],
                ["Aporte solidario Obra social","",0],
                ["Aporte solidario Obra social (mayo)","",0]
            ],
            title:"Sueldo"
        }
        var sac={
            rem:[
                ["SAC",false,0]
            ],
            nrem:[
                ["SAC Adicional no remunerativo 2008-2009",false,0],
                ["SAC Adicional no remunerativo 2010",false,0],
                ["SAC Adicional no remunerativo 2011",false,0],
                ["SAC Adicional no remunerativo 2012",false,0]
            ],
            desc:[
                ["Jubilación",0.11,0],
                ["Ley 19032",0.03,0],
                ["Obra social",0.03,0],
                ["Faecys",0.005,0],
                ["Sindicato",0.02,0]
            ],
            title:"Sueldo anual complementario"
        }
        var tot={};    
        function actualizar_vista(){
            var data=get_data(),
                mes=opc.mes.value*1,
                ant=opc.ant.value*1,
                retro=opc.retro.value*1,
                suma=[0,0,0];
            //esc_rec.className=mes>22?'green':'';
            sueldo.rem[1][1]=(mes>5?0.01:0.0075)*ant;
            sueldo.desc[5][1]=(function(){
                if(mes==0)return "1/1";
                if(mes==12)return "1/2";
                if(mes==13)return "2/2";
                return false;
            })();
            del_rows(sueldo.obj);
            del_rows(sac.obj);
            del_rows(tot);
            
            retrov.style.display=mes==12||mes==24?"":"none";
            for(var i=0;i<data.length;i++){
                if(data[i]){
                    var n=1;
                    for(var det in data[i]){
                        if(!/obj|title/.test(det)){
                            for(var j=0;j<data[i][det].length;j++){
                                var valor=data[i][det][j];
                                if(valor[2])
                                data[i].obj.appendChild(get_row([
                                    valor[0],
                                    (function(){
                                        if(valor[1]){
                                            if(typeof valor[1]=="number"){
                                                return numberToString(valor[1]*100,2,true)+" %";
                                            }
                                            return valor[1];
                                        }
                                        return "";
                                    })(),
                                    n==1?valor[2]:"",
                                    n==2?valor[2]:"",
                                    n==3?valor[2]:""
                                ]));    
                            }
                        }
                        n++;
                    }
                    var total=get_row([
                        "Subtotal",
                        "",
                        data[i].rem.total,
                        data[i].nrem.total,
                        data[i].desc.total
                    ]);
                    suma[0]+=data[i].rem.total;
                    suma[1]+=data[i].nrem.total;
                    suma[2]+=data[i].desc.total;
                    if(data[1]){
                        total.className="rec_subtotal";
                        data[i].obj.appendChild(total);    
                    }
                    
                }
            }
            var total=get_row([
                        "Totales",
                        "",
                        suma[0],
                        suma[1],
                        suma[2]
                    ]);
            total.className="rec_total";
            tot.appendChild(total); 
              
            var total=get_row([
                        "Sueldo neto a cobrar",
                        "",
                        0,
                        0,
                        suma[0]+suma[1]-suma[2]
                    ]);
            total.className="rec_total_neto";
            tot.appendChild(total);
            
            if(data[1]){
                sac.obj.style.display="";
            }else{
                sac.obj.style.display="none";
            }
            function get_row(valor){
                var fila=document.createElement('tr');
                for(var i=0;i<valor.length;i++){
                    var celda=document.createElement('td');
                    if(typeof valor[i]=="number"){
                        var mon=document.createElement('b');
                        mon.appendChild(document.createTextNode('$'));
                        celda.appendChild(mon);
                        celda.className="moneda";
                        valor[i]=numberToString(valor[i],2,true);
                    }
                    celda.appendChild(document.createTextNode(valor[i]));
                    fila.appendChild(celda);
                }
                return fila;
            }
            function del_rows(obj){
                var rows=obj.rows;
                var n=rows.length;
                while(n--){
                    obj.removeChild(rows[n]);
                }
            }
        }
        function cargar_eventos(){
            for(var esc in opc){
                opc[esc].onchange=actualizar_vista;
            }
        }
        function get_data(){
            var val=bas[0][opc.mes.value][opc.cat.value],
                mes=opc.mes.value*1,
                cat=opc.cat.value*1,
                ant=opc.ant.value*1,
                pre=opc.pre.value*1,
                jor=opc.jor.value*1,
                retro=opc.retro.value*1,
                ret=[sueldo,false],
                mes_ano=(mes+5)%12;
            
            sueldo.rem[0][2]=val[0];
            sueldo.rem[1][2]=val[0]*(mes>5?0.01:0.0075)*ant;
            sueldo.rem[2][2]=pre?(sueldo.rem[0][2]+sueldo.rem[1][2])/12:0;
            sueldo.rem.total=total(sueldo.rem);
            
            sueldo.nrem[0][2]=val[1];
            sueldo.nrem[1][2]=val[2];
            sueldo.nrem[2][2]=val[3];
            sueldo.nrem[3][2]=val[4];
            sueldo.nrem[4][2]=(mes==12)&&retro?val[3]:0;
            sueldo.nrem[5][2]=(mes==24)&&retro?val[4]:0;
            sueldo.nrem[6][2]=pre?(val[1]+val[2]+val[3]+val[4]+sueldo.nrem[4][2]+sueldo.nrem[5][2])/12:0;
            sueldo.nrem.total=total(sueldo.nrem);
            
            sueldo.desc[0][2]=sueldo.desc[0][1]*sueldo.rem.total;
            sueldo.desc[1][2]=sueldo.desc[1][1]*sueldo.rem.total;
            sueldo.desc[2][2]=sueldo.desc[2][1]*(sueldo.rem.total+sueldo.nrem.total);
            sueldo.desc[3][2]=sueldo.desc[3][1]*(sueldo.rem.total+sueldo.nrem.total);
            sueldo.desc[4][2]=sueldo.desc[4][1]*(sueldo.rem.total+sueldo.nrem.total);
            sueldo.desc[5][2]=(mes==0||mes==12||mes==13)?50:(mes==23?100:0);
            sueldo.desc[6][2]=mes==24&&retro?100:0;
            sueldo.desc.total=total(sueldo.desc);
            
            if(mes_ano==5||mes_ano==11){
                ret[1]=sac;
                
                sac.rem[0][2]=sueldo.rem.total*0.5;
                sac.rem.total=total(sac.rem);
                
                sac.nrem[0][2]=val[1]*(1+(pre?1/12:0))*0.5;
                sac.nrem[1][2]=val[2]*(1+(pre?1/12:0))*0.5;
                sac.nrem[2][2]=val[3]*(1+(pre?1/12:0))*(mes==12?2/12:0.5);
                sac.nrem[3][2]=val[4]*(1+(pre?1/12:0))*(mes==24?2/12:0.5);
                sac.nrem.total=total(sac.nrem);
                
                sac.desc[0][2]=sac.desc[0][1]*sac.rem.total;
                sac.desc[1][2]=sac.desc[1][1]*sac.rem.total;
                sac.desc[2][2]=sac.desc[2][1]*(sac.rem.total+sac.nrem.total);
                sac.desc[3][2]=sac.desc[3][1]*(sac.rem.total+sac.nrem.total);
                sac.desc[4][2]=sac.desc[4][1]*(sac.rem.total+sac.nrem.total);
                sac.desc.total=total(sac.desc); 
            }
            jornada(sueldo);
            if(ret[1])jornada(sac); 
            function total(obj){
                var ret=0;
                for(var i=0;i<obj.length;i++){
                    ret+=obj[i][2];
                }
                return ret;
            }
            function jornada(obj){
                try{
                    if(jor){
                        for(var k in obj){
                            if(/rem|nrem|desc/.test(k)){
                                for(var i=0;i<obj[k].length;i++){
                                    if(!(k=="desc"&&(i==2||i==5))){
                                        obj[k][i][2]*=0.5;
                                    }
                                }
                                obj[k].total=0;
                                obj[k].total+=total(obj[k]);
                            }
                        }
                    }    
                }catch(e){
                    alert(e.message);
                }
                
            }
            return ret;
        }
        
        sueldo.obj=document.createElement('tbody');
        sac.obj=document.createElement('tbody');
        tot=document.createElement('tbody');
        
        document.getElementById('esc_rec').appendChild(sueldo.obj);
        document.getElementById('esc_rec').appendChild(sac.obj);
        document.getElementById('esc_rec').appendChild(tot);
        
        get_meses('esc_mes');
        get_categorias('esc_cat',0);
        cargar_eventos();
        actualizar_vista();
        
        window.actRec=function(){
            acuerdop2012();  
            actualizar_vista();
        };
    }
})();