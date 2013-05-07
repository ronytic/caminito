function lanzadorC(){
	
};
function respuesta1(data){
	$("#contenido1").html(data);
	var CodTrimestre;
	var trimestre=$('input[name=Trimestre]:checked');
	CodTrimestre=trimestre.val();
	trimestre.next().addClass("seleccionado");
	$('input[name=Trimestre]').change(function(){
			trimestre.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			trimestre=$(this);
			CodTrimestre=$(this).val();
	});
	
	$("#generar").click(function(e) {
		var Trimestre=$("select[name=Trimestre]").val();
		$.post("generar.php",{'CodCurso':CodCurso,'Trimestre':CodTrimestre},generar)
    });
	function generar(data){
		$("#contenido2").html(data);
	}
}