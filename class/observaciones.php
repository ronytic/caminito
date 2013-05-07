<?php
include_once("db2.php");
class observaciones extends db{
	var $tabla="observaciones";
	function mostrarObservacionDoc(){
		$this->campos=array("*");	
		return $this->getRecords("Docente=1");
	}
	function mostrarObservaciones(){
		$this->campos=array("*");	
		return $this->getRecords("","Posicion");
	}
	function CodObservaciones($Nivel){
		$this->campos=array("CodObservacion");
		return $this->getRecords("Nivel=$Nivel");
	}
	function mostrarObser($CodObser){
			$this->campos=array("*");
			return $this->getRecords(" CodObservacion=$CodObser");
	}
}
?>