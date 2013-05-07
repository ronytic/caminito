<?php
include_once("../login/check.php");
include_once("../class/docente.php");
$docente=new docente;
foreach($docente->listar() as $doc){
	$find    = array( "á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ" );
	$replace = array( "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n" );
	$pat=str_replace($find,$replace,$doc['Paterno']);
	$usuario=$doc['CodDocente'].$pat;
	$usuario=strtolower($usuario);
	$pass=password();
	$pass=strtolower($pass);
	$val=array('Usuario'=>"'$usuario'",'Password'=>"'$pass'");
	//$docente->actualizarDocente($val,"CodDocente='{$doc[CodDocente]}'");
}
function password(){
$strC = "BCDFGHJKLMNPRSTVYZ";
$strV = "AEIOU";
$cad = "";
for($i=0;$i<3;$i++) {
$cad .= substr($strC,rand(0,strlen($strC)-1),1).substr($strV,rand(0,strlen($strV)-1),1);
}
return $cad;	
}
?>