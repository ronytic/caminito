function lanzadorC(CodCurso){
	$.post("materias.php",{"CodCurso":CodCurso},function(data){$("select[name=CodMateria]").html(data)});
};
function respuesta1(data){
	$("#contenido1").html(data);
	var CodTrimestre;
	var trimestre=$("input[name=Trimestre]:checked");
	CodTrimestre=trimestre.val();
	trimestre.next().addClass("seleccionado");
	$('input[name=Trimestre]').change(function(e){
			trimestre.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			trimestre=$(this);
			CodTrimestre=$(this).val();
	});
	$("#ver").click(function(e) {
		var CodMateria=$("select[name=CodMateria]").val();

		

    	$.post("listaalumnos.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Trimestre':CodTrimestre},respuesta2);    
    });
	
}
function respuesta2(data){
	$("#contenido2").html(data);
//$("#generar").click(function(e) {
//		var Trimestre=$("select[name=Trimestre]").val();
//		$.post("generar.php",{'CodCurso':CodCurso,'Trimestre':Trimestre},generar)
//    });
//	function generar(data){
//		$("#contenido2").html(data);
//	}
}