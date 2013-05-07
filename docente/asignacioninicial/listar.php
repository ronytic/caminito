<?php
include_once("../../login/check.php");
if(isset($_POST)){
	include_once("../../class/curso.php");
	include_once("../../class/alumno.php");
	include_once("../../class/notasinicial.php");
	$notasinicial=new notasinicial;
	$curso=new curso;
	$alumno=new alumno;
	$CodCurso=$_POST['CodCurso'];
	$al=$alumno->mostrarAlumnos($CodCurso);
	$al=array_shift($al);
	$ni=$notasinicial->mostrarNotaRegistrado($al['CodAlumno']);
	$ni=array_shift($ni);
	$c=$curso->mostrarCurso($CodCurso);
	$c=array_shift($c);
	if($ni['cantidad']>0){
		echo "Curso YA GENERADO para ".$c['Nombre'];	
	}else{
		echo "Curso NO GENERADO para ".$c['Nombre'];
	}
}
?>