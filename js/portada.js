$(document).ready(function(e) {
		$(".menu").click(function(e) {
			var id=$(this).attr("rel");
			var href=$(this).attr("href");
			if(href=="#"){ e.preventDefault(); }
			$(".submenu").addClass('oculto');
			$("#submenu"+id).removeClass('oculto') //show();
		});
});