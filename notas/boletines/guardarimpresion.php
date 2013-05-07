<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/documentosimpresos.php");
	$CodAlumno=$_POST['CodAlumno'];
	$CodUsuario=$_SESSION['CodUsuarioLog'];
	$Nivel=$_SESSION['Nivel'];
	$Fecha=date("Y-m-d");
	$Hora=date("H:i:s");
	
	$documentosimpresos=new documentosimpresos;
	$valuesDoc=array("TipoDocumento"=>"'Boletin'",
					"CodAlumno"=>$CodAlumno,
					"CodUsuario"=>$CodUsuario,
					"NivelUsuario"=>$Nivel,
					"FechaRegistro"=>"'$Fecha'",
					"HoraRegistro"=>"'$Hora'",
					"Activo"=>1
					);
	$documentosimpresos->insertarDocumentoImpreso($valuesDoc);
}
?>