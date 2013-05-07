	var CodAlumno
	var CodCurso
	var CodMateria
$(document).ready(function(){
	var curso=$('input[name=Curso]:first');
	CodCurso=curso.val();
	var materia=$('input[name=Materia]:first');
	CodMateria=materia.val();
	$("#fecha").datepicker({dateFormat: 'dd-mm-yy',maxDate:"0 D"});
	curso.next().addClass("seleccionado");
	$.post("listaalumno.php",{'CodCurso':CodCurso},alumnos);
	$('input[name=Curso]').change(function(){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			$.post("listaalumno.php",{'CodCurso':CodCurso},alumnos);
			$.post("mostrarAgenda.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'rand':Math.random()},reporteAgenda);
	});
	$.post("mostrarAgenda.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'rand':Math.random()},reporteAgenda);
	
	
	materia.next().addClass("seleccionado");
	//$.post("listaalumno.php",{'CodCurso':CodCurso},alumnos);
	$('input[name=Materia]').change(function(){
			materia.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			materia=$(this);
			CodMateria=$(this).val();
			$.post("mostrarAgenda.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'rand':Math.random()},reporteAgenda);
	});
	var obs=$('input[name=Observacion]:first');
	var CodObs=obs.val();
	obs.next().addClass("seleccionado");
	//$.post("listaalumno.php",{'CodCurso':CodCurso},alumnos);
	$('input[name=Observacion]').change(function(){
			obs.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			obs=$(this);
			CodObs=$(this).val();
	});
	
	
	$("#registrar").click(function(e) {
		Fecha=$("#fecha").val();
		Detalle=$("#detalle").val();
		Citacion=$("#urgente").attr("checked");
		Citacion=Citacion?"1":"0";
		$.post("registrarAgenda.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'CodAlumno':CodAlumno,'CodObs':CodObs,'Fecha':Fecha,'Detalle':Detalle,'Citacion':Citacion,'rand':Math.random()},function (data){
			$.post("mostrarAgenda.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'rand':Math.random()},reporteAgenda);	
		});
		
    });
		
});
function alumnos(data){
		$("#alumnos").html(data);
		var alumno=$('input[name=Alumno]:first');
		CodAlumno=alumno.val();
		alumno.next().addClass("seleccionado");
		//$.post("listaalumno.php",{'CodCurso':CodCurso},alumnos);
		$('input[name=Alumno]').change(function(){
				alumno.next().removeClass("seleccionado");
				$(this).next().addClass("seleccionado");
				alumno=$(this);
				CodAlumno=$(this).val();
				//$.post("mostrarAgenda.php",{'CodCurso':CodCurso,'CodMateria':CodMateria},reporteAgenda);
			
		});
		
}

function reporteAgenda(data){
	//alert(data);
//	alert(data);
		$("#Agenda").html(data)
}