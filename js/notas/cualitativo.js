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
	$.post("listacasilleros.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	$().datepicker();
	$('input[name=Curso]').change(function(e){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			$.post("listacasilleros.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
	$('input[name=Materia]').change(function(e){
			materia.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			materia=$(this);
			CodMateria=$(this).val();
			$.post("listacasilleros.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
	$('input[name=Trimestre]').change(function(e){
			trimestre.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			trimestre=$(this);
			CodTrimestre=$(this).val();
			$.post("listacasilleros.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},alumnos);
	});
});
function alumnos(data){
	$("#casilleros").html(data);
	cortar();
	function cortar(){
		$(".mayusculas").each(function(index, element) {
           var maximo=parseInt($(this).attr("rel"));
		   var contenido=$(this).val();
		   $(this).val(contenido.substr(0,maximo));
			var longitud=parseInt($(this).val().length);
			var nombre=$(this).attr("name");
			var resto=maximo-longitud;
			$("#cantidad"+nombre).html(resto); 
        });
	}
	
	$(".mayusculas").on("keyup paste keypress",function(e) {
		var contenido=$(this).val();
        var longitud=parseInt($(this).val().length);
		var nombre=$(this).attr("name");
		var maximo=parseInt($(this).attr("rel"));
		var resto=maximo-longitud;
		if(resto<=0){
			$(this).attr("maxlength", maximo);
		}
		$(this).val(contenido.substr(0,maximo));
		$("#cantidad"+nombre).html(resto);
    });
	$("#guardarNotas").click(function(e) {
        var CodNotasCualitativa=$("#CodNotasCualitativa").val();
		var rango1=$("#rango1").val();
		var rango2=$("#rango2").val();
		var rango3=$("#rango3").val();
		var rango4=$("#rango4").val();
		$.post("guardarnota.php",{'CodNotasCualitativa':CodNotasCualitativa,Rango1:rango1,Rango2:rango2,Rango3:rango3,Rango4:rango4},function(data){alert(data);});
    });
}