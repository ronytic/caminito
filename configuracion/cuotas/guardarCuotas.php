<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
if(!empty($_POST)){
	$conf=new configuracion;
	$MontoKinder=$_POST['MontoKinder'];
	$MontoGeneral=$_POST['MontoGeneral'];
	$FechaCuota1=$_POST['FechaCuota1'];
	$FechaCuota2=$_POST['FechaCuota2'];
	$FechaCuota3=$_POST['FechaCuota3'];
	$FechaCuota4=$_POST['FechaCuota4'];
	$FechaCuota5=$_POST['FechaCuota5'];
	$FechaCuota6=$_POST['FechaCuota6'];
	$FechaCuota7=$_POST['FechaCuota7'];
	$FechaCuota8=$_POST['FechaCuota8'];
	$FechaCuota9=$_POST['FechaCuota9'];
	$FechaCuota10=$_POST['FechaCuota10'];
	
	$configuracionCampos=array("MontoKinder","MontoGeneral","FechaCuota1","FechaCuota2","FechaCuota3","FechaCuota4",						"FechaCuota5","FechaCuota6","FechaCuota7","FechaCuota8","FechaCuota9","FechaCuota10");
	$configuracionValues=array($MontoKinder,$MontoGeneral,$FechaCuota1,$FechaCuota2,$FechaCuota3,$FechaCuota4,$FechaCuota5,$FechaCuota6,$FechaCuota7,$FechaCuota8,$FechaCuota9,$FechaCuota10);
	$conf->actualizarCuotas($configuracionCampos,$configuracionValues);
	header("Location:../../");
}
?>