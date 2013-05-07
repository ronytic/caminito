<?php
session_start();
include_once("../../login/check.php");
if(!empty($_GET) && isset($_GET['CodDocente']) && md5("lock")==$_GET['lock']){
	$_SESSION['CodDocente']=$_GET['CodDocente'];
	header("Location:../administrativonotas/?f=".md5("notas"));
}
?>