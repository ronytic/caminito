<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
if(!empty($_POST)){
	$conf=new configuracion;
	$boletin1x=$_POST['boletin1x'];
	$boletin1y=$_POST['boletin1y'];
	$boletin2x=$_POST['boletin2x'];
	$boletin2y=$_POST['boletin2y'];
	$boletin3x=$_POST['boletin3x'];
	$boletin3y=$_POST['boletin3y'];
	$boletin4x=$_POST['boletin4x'];
	$boletin4y=$_POST['boletin4y'];
	
	$configuracionCampos=array(	"BoletinPosicion1X"=>"$boletin1x",
								"BoletinPosicion1Y"=>"$boletin1y",
								"BoletinPosicion2X"=>"$boletin2x",
								"BoletinPosicion2Y"=>"$boletin2y",
								"BoletinPosicion3X"=>"$boletin3x",
								"BoletinPosicion3Y"=>"$boletin3y",
								"BoletinPosicion4X"=>"$boletin4x",
								"BoletinPosicion4Y"=>"$boletin4y"
						);
	$conf->actualizarConfig($configuracionCampos);
	header("Location:./#boletin");
}
?>