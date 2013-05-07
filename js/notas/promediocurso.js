function lanzadorC(CodCurso){
}
function respuesta1(data){
	$("#contenido1").html(data)
	
	$("#revisar").click(function(e) {
		var trimestre=$("select[name=trimestre]").val();
		var orden=$("select[name=orden]").val();
        $.post("documento.php",{'CodCurso':CodCurso,'Trimestre':trimestre,'Orden':orden,"lock":"dce7c4174ce9323904a934a486c41288"},respuesta2);
    });
	function respuesta2(data){
		$("#contenido2").html(data);
	}
}