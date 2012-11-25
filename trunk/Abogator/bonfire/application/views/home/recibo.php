<script type="text/javascript" src="/assets/js/recibo.js"></script>
<div class="middle-recibo">
    <div class="title">
        <div class="icon"></div>
        <div class="text">Recibo de sueldo</div>
    </div>
    <div class="steps">
        <div class="step1">
            <div class="step-title">
                Paso 1
            </div>
            <div class="step-content">
                <div class="label">Elegir convenio CCT</div>
                <div class="elements"><select id="esc_conv" onchange="cambiarCategorias()">
                        <script type="text/javascript">                 
                            for(var i=0;i<convenios.length;i++){
                                document.write('<option value="'+i+'">'+convenios[i]+'</option>');};                         
                        </script>
                    </select></div>
            </div>
        </div>
        <div class="step1">
            <div class="step-title">
                Paso 2
            </div>
            <div class="step-content">
                <div class="label">Elegir categoria</div>
                <div class="elements"><select id="esc_cat" onchange="calculateRecibo()">
                        <script type="text/javascript">                 
                            for(var i=0;i<categorias.length;i++){
                                document.write('<option value="'+i+'">'+categorias[i]+'</option>');};                         
                        </script>
                    </select></div>
            </div>
        </div>
        <div class="step2">
            <div class="step-title">
                Paso 3
            </div>
            <div class="step-content">
                <div class="label">Elegir horarios de trabajo</div>
                <div class="elements">
                    <div class="col1">
                        <div class="day">
                            <div class="check">
                                <input id="day1-check" type="checkbox" onchange="calculateRecibo()"/>Lunes
                            </div>
                            <div class="select">
                                <select id="mon1" onchange="calculateRecibo()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="mon2" onchange="calculateRecibo()"></select>
                            </div>
                        </div>
                        <div class="day">
                            <div class="check">
                                <input id="day2-check" type="checkbox" onchange="calculateRecibo()"/>Martes
                            </div>
                            <div class="select">
                                <select id="tue1" onchange="calculateRecibo()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="tue2" onchange="calculateRecibo()"></select>
                            </div>
                        </div>
                        <div class="day">
                            <div class="check">
                                <input id="day3-check" type="checkbox" onchange="calculateRecibo()"/>Miercoles
                            </div>
                            <div class="select">
                                <select id="wed1" onchange="calculateRecibo()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="wed2" onchange="calculateRecibo()"></select>
                            </div>
                        </div>
                        <div class="day">
                            <div class="check">
                                <input id="day4-check" type="checkbox" onchange="calculateRecibo()"/>Jueves
                            </div>
                            <div class="select">
                                <select id="thu1" onchange="calculateRecibo()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="thu2" onchange="calculateRecibo()"></select>
                            </div>
                        </div>
                        <div class="day">
                            <div class="check">
                                <input id="day5-check" type="checkbox" onchange="calculateRecibo()"/>Viernes
                            </div>
                            <div class="select">
                                <select id="fri1" onchange="calculateRecibo()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="fri2" onchange="calculateRecibo()"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col2">
                        <div class="day">
                            <div class="check">
                                <input id="day6-check" type="checkbox" onchange="calculateRecibo()"/>Sabado
                            </div>
                            <div class="select">
                                <select id="sat1" onchange="calculateRecibo()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="sat2" onchange="calculateRecibo()"></select>
                            </div>
                        </div>
                        <div class="day">
                            <div class="check">
                                <input id="day7-check" type="checkbox" onchange="calculateRecibo()"/>Domingo
                            </div>
                            <div class="select">
                                <select id="sun1" onchange="calculateRecibo()"></select>&nbsp;&nbsp;a&nbsp;&nbsp;<select id="sun2" onchange="calculateRecibo()"></select>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">                 
                        loadSelectDays();             
                    </script>
                </div>
            </div>
        </div>    
        <div class="step2">
            <div class="step-title">
                Paso 4
            </div>
            <div class="step-content">
                <div class="elements2">
                    <div class="col3">
                        <div class="col-title">Antiguedad</div>
                        <div class="col-element"><select id="esc_ant" onchange="calculateRecibo()">
                                <script type="text/javascript">                 
                                    for(var i=0;i<=35;i++){
                                        document.write('<option value="'+i+'">'+i+' años</option>');};                         
                                </script>
                            </select></div>
                    </div>
                    <div class="col3">
                        <div class="col-title">Presentismo</div>
                        <div class="col-element"><select id="esc_pre" onchange="calculateRecibo()">
                                <option value="1">Sí</option> <option selected="selected" value="0">No</option>
                            </select></div>
                    </div>
                    <div class="col3">
                        <div class="col-title">Mes</div>
                        <div class="col-element"><select id="esc_mes" onchange="calculateRecibo()">
                                <script type="text/javascript">                 
                                    for(var i=0;i<meses.length;i++){
                                        document.write('<option value="'+i+'">'+meses[i]+'</option>');};                         
                                </script>
                            </select></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="step2" id="maestranza-art">
            <div class="step-title">
                Paso 5
            </div>
            <div class="step-content">
                <div class="elements2">
                    <div class="col3">
                        <div class="col-title">Art. 13</div>
                        <div class="col-element"><input id="maestranza-art-13" type="checkbox" onchange="calculateRecibo()"/></div>
                    </div>
                    <div class="col3">
                        <div class="col-title">Art. 28</div>
                        <div class="col-element"><input id="maestranza-art-28" type="checkbox" onchange="calculateRecibo()"/></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="result">
        <table id="esc_rec">
            <thead class="top-table">
                <tr ><th class="top-table-item" colspan="2"></th class="top-table-item"><th class="top-table-item">Remunerativo</th class="top-table-item"><th class="top-table-item">No Remunerativo</th><th class="top-table-item">Descuentos</th></tr>
            </thead>
            <tbody class="middle-table" id="bodyRecibo"></tbody>
        </table>
    </div>
    <script type="text/javascript">  
        calculateRecibo();
    </script>
</div>