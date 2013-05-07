<?php
include_once("db2.php");
class cursomateria extends db{
	var $tabla="cursomateria";
	function insertarMateria($data){
		$this->insertRow($data,1);
	}
	function mostrarMaterias($CodCurso){
		$this->campos=array("*");
		return $this->getRecords("CodCurso=".$CodCurso." and Activo=1","CodCursoMateria");
	}
	function cambiarNombre($Numero,$where){
		$this->updateRow(array("Alterno"=>$Numero),$where);
	}
	function actualizar($where){
		$this->updateRow(array("Activo"=>0),$where);
	}
}
?>