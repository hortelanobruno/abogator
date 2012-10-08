/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function prueba(){
    alert('prueba');
}


var mes_nombre=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
var mes_base=new Date(2010,5,1);
var tope_mes=36;
var cat=["Maestranza y Servicios: A", "Maestranza y Servicios: B", "Maestranza y Servicios: C"];
    
var bas=[];
var a1 = 0;

for(var i=0;i<=cat.length;i++){
    bas[i]=[];
    for(var j=0;j<=tope_mes;j++){
        bas[i][j]=[];
        for(var k=0;k<=4;k++){
            bas[i][j][k] = a1++;
        }
    }
}
alert(bas);