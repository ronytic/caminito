var CodDocente;
$(document).ready(function(){
	var doc=$('input[name=Docente]:first');
	CodDocente=doc.val();
	doc.click().next().addClass("seleccionado");
	$('input[name=Docente]').change(function(){
			doc.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			doc=$(this);
			CodDocente=$(this).val();
			lanzadorC(CodDocente);
			
	});
	lanzadorC(CodDocente);
});