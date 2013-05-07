<?php
include_once("db2.php");
class docente extends db{
	var $tabla="docente";

	function estadoTabla(){
		return $this->statusTable();
	}
	function listar($activo=1){
		$this->campos=array('*');
		if($activo==2)
			return $this->getRecords("Activo=1 or Activo=0","Paterno, Materno, Nombres");
		else
			return $this->getRecords("Activo=$activo","Paterno, Materno, Nombres");
	}
	function mostrarDocente($CodDocente){
		$this->campos=array('CodDocente,LOWER(Paterno) as Paterno,LOWER(Materno) as Materno,LOWER(Nombres) as Nombres');
		return $this->getRecords(" CodDocente=$CodDocente","Paterno,Materno,Nombres");
	}
	function mostrarDocenteUsuario($CodUsuario){
			$this->campos=array("*");
			return $this->getRecords(" CodUsuario=$CodUsuario");
	}
	function loginDocente($Usuario,$Password){
		$this->campos=array("count(*) as Can,CodDocente as CodUsuario");	
		return $this->getRecords("Usuario='$Usuario' and Password='$Password'");
	}
	function actualizarDocente($values,$where){
		$this->updateRow($values,$where);	
	}
}
?>