file="formulario.php";
fileP="../../";
$(document).ready(function(e) {
    $("#respuesta").on("click","#guardar",function(e){
		var montoreserva=$("#montoreserva").val();
		e.preventDefault();
		$.post("guardar.php",{"MontoReserva":montoreserva,"CodAlumno":CodAlumno},function(){mostrar();});
	});
	
});
function mostrar(){
		$.post("mostrar.php",{"CodAlumno":CodAlumno},function(data){$("#listado").html(data)})	
		$("#listado").on("click",".botonSec",function(e){
			var CodReserva=$(this).attr("rel");
			$.post("eliminar.php",{"CodReserva":CodReserva},function(data){mostrar();});
			e.preventDefault();
		});
	}
function respuesta(data){
	$("#respuesta").html(data);
	mostrar();
}