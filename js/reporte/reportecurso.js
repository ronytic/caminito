function lanzadorC(CodCurso){
	$.post('formulario.php',{"CodCurso":CodCurso},respuesta1);
}
function respuesta1(data){
	var Sexo;
	$("#contenido1").html(data);
	$("#formulario").submit(function(e) {
        e.preventDefault();
		Sexo=$("select[name=sexo]").val();
		url="../../impresion/reporte/reporteCurso.php?CodCurso="+CodCurso+"&Sexo="+Sexo;
		$("#contenido2").html('<a  class="boton corner-all" href="'+url+'">Abrir en otra Ventana"</a><hr/><iframe src="'+url+'" width="530" height="700"></iframe>');
    });	
}