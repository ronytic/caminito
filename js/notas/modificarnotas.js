function lanzadorC(CodDocente){
	
}
$(document).ready(function(e) {
	$("#contenido1").html('<input type="submit" class="corner-all" value="Modificar Notas" id="ver">');
	$("#ver").click(function(e) {
    	location.href="docente.php?CodDocente="+CodDocente+"&lock=dce7c4174ce9323904a934a486c41288";        
    });
	
});

