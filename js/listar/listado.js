var CodCurso;
var CodAlumno;
$(document).ready(function(){
	
	var curso=$('input[name=Curso]:first');
	CodCurso=curso.val();
	curso.next().addClass("seleccionado");
	$.post(fileP+"listar/alumnos.php",{'CodCurso':CodCurso},alumnos);
	$('input[name=Curso]').change(function(){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			$.post(fileP+"listar/alumnos.php",{'CodCurso':CodCurso},alumnos);
			
	});
});
function alumnos(data){
	$('#alumnos').html(data);
	
	
	var alumno=$('input[name=Alumno]:first');
	CodAlumno=$(alumno).val();
	alumno.next().addClass("seleccionado");
	//alumno.click().next().addClass("seleccionado");
	
	if(file!="#"){
		$.post(file,{'CodAlumno':CodAlumno,'CodCurso':CodCurso},respuesta);
	}
	$('input[name=Alumno]').change(function(){
			alumno.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			alumno=$(this);
			CodAlumno=$(this).val();
			if(file!="#"){
			$.post(file,{'CodAlumno':CodAlumno,'CodCurso':CodCurso},respuesta);
			}else{lanzador(CodAlumno)}
	});
}