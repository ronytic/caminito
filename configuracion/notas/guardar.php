<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
if(!empty($_POST)){
	$conf=new configuracion;
	$RegistroNotaHabilitado=$_POST['RegistroNotaHabilitado'];
	$TrimestreActual=$_POST['TrimestreActual'];
	$TrimestreNotaHabilitado=$_POST['TrimestreNotaHabilitado'];
	
	$configuracionCampos=array("RegistroNotaHabilitado"=>$RegistroNotaHabilitado,"TrimestreActual"=>$TrimestreActual,"TrimestreNotaHabilitado"=>$TrimestreNotaHabilitado);
	$conf->actualizarConfig($configuracionCampos);
	header("Location:../../");
}
?>