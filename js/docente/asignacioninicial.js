function lanzadorC(CodCurso){
	listar();
	//$.post('formulario.php',{'CodDocente':CodDocente},respuesta1);
}
function respuesta1(data){
	$('#contenido1').html(data);
	listar();
	$("#generar").click(function(e) {
		$.post('guardar.php',{'CodCurso':CodCurso},listar);
    });
}
function listar(){
	$.post('listar.php',{'CodCurso':CodCurso},respuesta2);
}
function respuesta2(data){
	$('#contenido2').html(data);
	
}
$(document).ready(function(e) {
	$('#contenido2').on("click",".eliminar",function(){
		var cod=$(this).attr("rel");
		$.post("eliminar.php",{"Cod":cod},function(){
			listar();	
		})
	})    
});
