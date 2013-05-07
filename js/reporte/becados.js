function lanzadorC(CodCurso){
	//$.post("resumen.php",{'CodCurso':CodCurso,"Rand":Math.random()},respuesta1);
}
function respuesta1(data){
	$("#contenido1").html(data);
	$("#reporte").click(function(e) {
		$.post("resumen.php",{'CodCurso':CodCurso,"Rand":Math.random()},respuesta2);
    });
}
function respuesta2(data){
	$("#contenido2").html(data);
}
