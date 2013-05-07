var file="boletin.php";
var fileP="../../";
function respuesta(data){
	$("#respuesta").html(data);
	$("#guardar").click(function(e) {
        var evaluacion=$("#evaluaciondiagnostica").val();
		var informefinal=$("#informefinal").val();
		var cod=$("#cod").val();
		$.post("guardar.php",{"evaluacion":evaluacion,"informefinal":informefinal,"cod":cod});
    });
}