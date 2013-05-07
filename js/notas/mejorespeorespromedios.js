$(document).ready(function(e) {
	$("#revisar").click(function(e) {
        var Cantidad=$("input[name=Cantidad]").val();
		var Trimestre=$("select[name=Trimestre]").val();
		var Orden=$("select[name=Orden]").val();
		$.post("documento.php",{'Cantidad':Cantidad,'Trimestre':Trimestre,'Orden':Orden},respuesta);
		function respuesta(data){
			$("#contenido").html(data);
		}
    });
	
});