<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/reserva.php");
	$reserva=new reserva;
	$CodReserva=$_POST['CodReserva'];
	$reserva->actualizarDato(array("Activo"=>0),$CodReserva);
}
?>