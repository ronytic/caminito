$(document).ready(function(){
	var curso=$('input[name=Curso]:first');
	var CodCurso=curso.val();
	curso.click().next().addClass("seleccionado");
	var materia=$('input[name=Materia]:first');
	var CodMateria=materia.val();
	$('input[name=Curso]').change(function(){
			curso.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			curso=$(this);
			CodCurso=$(this).val();
			mostrar();
	});
	
	materia.click().next().addClass("seleccionado");
	$('input[name=Materia]').change(function(){
			materia.next().removeClass("seleccionado");
			$(this).next().addClass("seleccionado");
			materia=$(this);
			CodMateria=$(this).val();
			mostrar();
	});
	$("#fechaTarea").datepicker({dateFormat: 'dd-mm-yy'});
	$("#guardar").click(function(e) {
        var NombreTarea=$("#nombretarea").val();
		var DescTarea=$("#descripciontarea").val();
		var FechaTarea=$("#fechaTarea").val();
		if(NombreTarea!=""){
			if(DescTarea!=""){
				if(FechaTarea!=""){
					$.post("guardarTarea.php",{'CodCurso':CodCurso,'CodMateria':CodMateria,'Nombre':NombreTarea,'Descripcion':DescTarea,'FechaTarea':FechaTarea},function(){$.post("mostrarTarea.php",{'CodCurso':CodCurso,'CodMateria':CodMateria},tarea);});
				}
				else{alert("Complete la FECHA DE PRESENTACIÓN");$("#fechaTarea").focus()}
			}
		}else{alert("Complete el NOMBRE DE LA TAREA");$("#nombretarea").focus()}
		
    });
	mostrar();
	function mostrar(){
		$.post("mostrarTarea.php",{'CodCurso':CodCurso,'CodMateria':CodMateria},tarea);
	}
	function tarea(data){
		$("#tareaGuardada").html(data);
		$(".eliminar").click(function(e) {
            if(confirm("¿Desea Eliminar esta Tarea?")){
				var CodTarea=$(this).attr("rel");
				$.post("eliminarTarea.php",{'CodTarea':CodTarea,'rand':Math.random()});
				mostrar();
			}
        });
	}
});

