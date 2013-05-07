$(document).ready(function(e) {
    $("#generar").click(function(e) {
		var tablas= $("#tablas").val();
		$.post("generarinternet.php",{'Tablas':tablas},respuestaI);
		$("#subir").addClass("oculto").attr("src","");
    });
	var Url=UrlInternet+Directory+"/seguridad/actualizar/get.php";
	
	$("form[name=fsubir]").attr("action",Url);
	function respuestaI(data){
		$("#data").text(data);
		if(data=="No selecciono ninguna tabla"){
			$("#mensaje").html(data);
			$("#subirb").addClass("oculto");
			$("#subir").addClass("oculto");
		}else{
			var tablas= $("#tablas").val();
			$("#subir").attr("src",Url);
			$("#subirb").removeClass("oculto");
			$("#subir").removeClass("oculto");
			$("#mensaje").html("Listo Para subir a Internet los datos de la(s) tabla(s): "+tablas);
		}
	}
});