function respuesta1(data){
	$("#contenido1").html(data);	
	$("#contenido1").on("click","#generar",function(){
		var cabeceralista=$("#cabeceralista").val();
		var separador=$("#separador").val();
		var separadorfila=$("#separadorfila").val();
		var numeracion=$("#numeracion").val();
		var separadormateria=$("#separadormateria").val();
		var separadorestadisticas=$("#separadorestadisticas").val();
		
		var trimestre=$("#trimestre").val();
		 $.get("generar.php",{'Cabecera':cabeceralista,'CodCurso':CodCurso,'Separador':separador,"SeparadorFila":separadorfila,"Numeracion":numeracion,"Trimestre":trimestre,'SeparadorMateria':separadormateria,'SeparadorEstadisticas':separadorestadisticas},function(data){
			 var contenido="<a href='generar.php?"+'Cabecera='+cabeceralista+'&CodCurso='+CodCurso+'&Separador='+separador+"&SeparadorFila="+separadorfila+"&Numeracion="+numeracion+"&Trimestre="+trimestre+'&SeparadorMateria='+encodeURIComponent(separadormateria)+'&SeparadorEstadisticas='+encodeURIComponent(separadorestadisticas)+"' class='botonSec'>Descargar Archivo</a><hr>"+data;
			$("#contenido2").html(contenido)	 
			
		});
	})
	
}
function lanzadorC(){
	//$.post("materias.php",{"CodCurso":CodCurso},function(data){
		//$("#materias").html(data);	
//	});
//	$("#generar").click(generar);
}
