<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	
	extract($_POST);
	include_once("../../class/docente.php");
	$docente=new docente;
	$usuario= normaliza($matricula.$paterno);
	$valores=array("Paterno"=>"'$paterno'",
					"Materno"=>"'$materno'",
					"Nombres"=>"'$nombres'",
					"Sexo"=>"'$sexo'",
					"Celular"=>"'$celular'",
					"Usuario"=>"'$usuario'",
					"Password"=>"'$contrasena'"
				);	
	
	
	//print_r($valores);
	$docente->insertar($valores);
	header("Location:../editar/");
}
function normaliza($cadena){
		$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
	ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
		$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
	bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
		$cadena = utf8_decode($cadena);
		$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
		$cadena = strtolower($cadena);
		return utf8_encode($cadena);
	}
?>