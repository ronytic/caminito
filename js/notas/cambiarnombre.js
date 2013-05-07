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
	$.post("listanombres.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
//	alert(CodCurso);
//	alert(CodMateria);
	$().datepicker();
	$('input[name=Curso]').change(function(e){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			$.post("listanombres.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
	$('input[name=Materia]').change(function(e){
			materia.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			materia=$(this);
			CodMateria=$(this).val();
			$.post("listanombres.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
	$('input[name=Trimestre]').change(function(e){
			trimestre.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			trimestre=$(this);
			CodTrimestre=$(this).val();
			$.post("listanombres.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
});
function alumnos(data){
	$("#alumnos").html(data)
	$(".nombre").change(function(e) {
        var valor=$(this).val();
		var nombre=$(this).attr("name");
		var CodCasilleros=$("input[name=CodCasilleros]").val();
		$.post("guardarnombre.php",{'CodCasilleros':CodCasilleros,'Nombre':nombre,'Valor':valor})
    });
	$("#guardarNombre").click(function(e) {
       alert("Sus Nombres sean guardado Correctamente"); 
    });
}