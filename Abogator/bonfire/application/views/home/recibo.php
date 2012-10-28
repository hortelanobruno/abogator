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
                <div class="elements"><select>
                        <script type="text/javascript">                 
                            for(var i=0;i<=convenios.length;i++){
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
                            for(var i=0;i<=categorias.length;i++){
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
                    </div>
                    <div class="col2">
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
                                    for(var i=0;i<=meses.length;i++){
                                        document.write('<option value="'+i+'">'+meses[i]+'</option>');};                         
                                </script>
                            </select></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="result">
        <table id="esc_rec">
            <thead>
                <tr><th colspan="2"></th><th>Remunerativo</th><th>No Remunerativo</th><th>Descuentos</th></tr>
            </thead>
            <tbody id="bodyRecibo"></tbody>
        </table>
    </div>
    <script type="text/javascript">  
        calculateRecibo();
    </script>
</div>