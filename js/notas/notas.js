var CodCurso;
var CodMateria;
var CodTrimestre;
$(document).ready(function(){
	var curso=$('input[name=Curso]:first');
	var materia=$('input[name=Materia]:first');
	var trimestre=$('input[name=Trimestre]:checked');
	CodCurso=curso.val();
	CodMateria=materia.val();
	CodTrimestre=trimestre.val();
	curso.next().addClass("seleccionado");
	materia.next().addClass("seleccionado");
	trimestre.next().addClass("seleccionado");
	$.post("listaalumno.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
//	alert(CodCurso);
//	alert(CodMateria);
	$().datepicker();
	$('input[name=Curso]').change(function(e){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			$.post("listaalumno.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
	$('input[name=Materia]').change(function(e){
			materia.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			materia=$(this);
			CodMateria=$(this).val();
			$.post("listaalumno.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
	$('input[name=Trimestre]').change(function(e){
			trimestre.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			trimestre=$(this);
			CodTrimestre=$(this).val();
			$.post("listaalumno.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
});
function alumnos(data){
	$("#alumnos").html(data)
	$("tr.contenido").hover(function(e){
			var id=$(this).attr("rel");
			$("tr[rel="+id+"]").css("background-color",'#EBEBEB');
		},function(){
			var id=$(this).attr("rel");
			$("tr[rel="+id+"]").css("background-color",'#FFF');
		});
	$(".nota").mousedown(function(e) {
      	//$(this).select();  
    }).mouseup(function(e) {
        e.preventDefault();
    });
	$(".nota").change(function(e) {
		//alert("asd");
		var Nota=$(this).val();
		var CodNota=$(this).attr('rel');
		$.post('guardarnota.php',{'CodNota':CodNota,'Nota':Nota,'Rand':Math.random()});
    });
	$("#guardarNotas").click(function(e) {
        alert("Notas Guardadas Correctamente");
    });
}