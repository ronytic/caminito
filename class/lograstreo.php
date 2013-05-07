<?php
include_once("db2.php");
class lograstreo extends db{
	public $tabla="lograstreo";

	public function mostrar($CodLogRastreo,$Activo=1){
		$this->campos=array('*');
		return $this->getRecords(" CodLogRastreo=$CodLogRastreo","",0,0,0,1);
	}
	
}
?>