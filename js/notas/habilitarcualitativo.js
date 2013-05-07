$(document).ready(function() {
	$("#habilitar").click(function(event) {
		if(!confirm("¿Esta seguro que desea habilitar el registro de notas?")){
			event.preventDefault();
			event.stopPropagation();
			return false;
		}
	});
});
