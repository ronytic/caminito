var CodCurso;
$(document).ready(function(){
	var curso=$('input[name=Curso]:first');
	CodCurso=curso.val();
	
	curso.next().addClass("seleccionado");
	$('input[name=Curso]').change(function(){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			lanzadorC(CodCurso);
	});
	lanzadorC(CodCurso);
});