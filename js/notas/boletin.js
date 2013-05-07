var file="boletin.php";
var fileP="../../";
function respuesta(data){
	$("#respuesta").html(data);
	mostrar()
	$("#registrarimpresion").click(function(e) {
		
		$.post("guardarimpresion.php",{'CodAlumno':CodAlumno},function(){mostrar();});
		e.preventDefault();
    });
	function mostrar(){
		$.post("mostrarimpresiones.php",{'CodAlumno':CodAlumno},function(data){$("#respuestaimpresiones").html(data)
		
			$(".eliminar").click(function(e) {
				e.preventDefault();
				var Cod=$(this).attr("rel");
				$.post("eliminarimpresion.php",{'Cod':Cod},function(){mostrar();});
			});
		});
		
	}
}