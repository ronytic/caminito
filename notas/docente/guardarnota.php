<?php
include_once("../../login/check.php");
include_once("../../class/notascualitativa.php");

if(!empty($_POST)){
	$notascualitativas=new notascualitativa;

	
	$CodNota=$_POST['CodNota'];
	$Nota=$_POST['Nota'];

	

	$Values=array("Valor"=>"'$Nota'");
	$Where="CodNotasCualitativa=$CodNota";
	$notascualitativas->actualizarNota($Values,$Where);
	//hasta aqui actualizamos nota
	//sacamos todos los campos

}
?>