<?php
include_once("db2.php");
class curso extends db{
	var $tabla="curso";	
	function listar($ini=1,$fin=13){
		$this->campos=array('CodCurso','Nombre');
		return $this->getRecords("CodCurso BETWEEN $ini and $fin");
	}
	function mostrar(){
		$this->campos=array('*');
		return $this->getRecords("Activo=1","Orden");	
	}
	function mostrarCurso($CodCurso){
		$this->campos=array('*');
		return $this->getRecords("CodCurso=$CodCurso");
	}
}
?>