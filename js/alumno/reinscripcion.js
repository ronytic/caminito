$(document).ready(function(){
	var curso=$('input[name=Curso]:first');
	var CodCurso=curso.val();
	curso.click().next().click().addClass("seleccionado");
	$.post("alumnos.php",{'CodCurso':CodCurso},alumnos);
	$('input[name=Curso]').change(function(){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			$.post("alumnos.php",{'CodCurso':CodCurso},alumnos);
	});
});
function alumnos(data){
	$('#alumnos').html(data);
}