<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../basedatos.php");
	$salida=$_POST['salida'];
	$nombre="BaseDeDatos".date("d-m-Y").".txt";
	header("Content-disposition: attachment; filename=$nombre");
//header("Content-Type: application/force-download");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".strlen($dump));
	header("Pragma: no-cache");
	header("Expires: 0");
//	print($dump);
	echo $salida;

}
?>