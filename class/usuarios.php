<?php
include_once("db2.php");
class usuarios extends db{
	var $tabla="usuarios";
	function mostrarDatos($CodUsuario){
		$this->campos=array("*");
		return $this->getRecords("CodUsuario=$CodUsuario");
	}
	function loginUsuarios($Usuario,$Password){
		$this->campos=array("count(*) as Can,CodUsuario,Nivel");	
		return $this->getRecords("Usuario='$Usuario' and Pass='$Password' and Activo=1");
	}
}
?>