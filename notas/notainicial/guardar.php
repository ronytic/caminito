<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/notasinicial.php");
	$Cod=$_POST['cod'];
	$ValorInicial=$_POST['evaluacion'];
	$ValorFinal=$_POST['informefinal'];
	
	
	$CodUsuario=$_SESSION['CodUsuarioLog'];
	$Nivel=$_SESSION['Nivel'];
	$Fecha=date("Y-m-d");
	$Hora=date("H:i:s");
	
	$notasinicial=new notasinicial;
	$valuesDoc=array("ValorInicial"=>"'$ValorInicial'",
					"ValorFinal"=>"'$ValorFinal'",
					"CodUsuario"=>$CodUsuario,
					"Nivel"=>$Nivel,
					"FechaRegistro"=>"'$Fecha'",
					"HoraRegistro"=>"'$Hora'",
					);
	$notasinicial->actualizarDato($valuesDoc,$Cod);
}
?>