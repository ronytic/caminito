<?php
include_once("../../login/check.php");
if(isset($_POST)){
	include_once("../../class/alumno.php");
	include_once("../../class/notasinicial.php");
	$alumno=new alumno;
	$notasinicial=new notasinicial;
	$CodCurso=$_POST['CodCurso'];
	
	foreach($alumno->mostrarDatosAlumnos($CodCurso) as $al){
		$notasinicial->eliminar($al['CodAlumno']);
		$valorescuali=array(
						'CodAlumno'=>$al['CodAlumno']
					);
					print_r($valorescuali);
		$notasinicial->insertar($valorescuali);	
	}
}
?>