function lanzadorC(CodDocente){
	$.post('formulario.php',{'CodDocente':CodDocente},respuesta1);
}
function respuesta1(data){
	$('#contenido1').html(data);
	listar();
	$(".guardar").click(function(e) {
		var CodMateria=$("select[name=materia]").val();
		var CodCurso=$("select[name=curso]").val();
		$.post('guardar.php',{'CodDocente':CodDocente,'CodMateria':CodMateria,'CodCurso':CodCurso},listar);
    });
}
function listar(){
	$.post('listar.php',respuesta2);
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
