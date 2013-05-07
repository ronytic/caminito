<?php 
include_once("db2.php");
class docentemateriacurso extends db{
	var $tabla="docentemateriacurso";
	function estadodetabla(){
		return $this->statusTable();	
	}
	function mostrarTodo($where=''){
		$this->campos=array('*');
		return $this->getRecords($where);
	}
	function mostrarCursoSexo($CodCurso,$SexoAlumno){
		$this->campos=array('*');
		return $this->getRecords("CodCurso=$CodCurso and (SexoAlumno=$SexoAlumno or SexoAlumno=2) and Activo=1");
	}
	function mostrarCurso($CodCurso){
		$this->campos=array('*');
		return $this->getRecords("CodCurso=$CodCurso");
	}
	function mostrarDocenteCurso($CodDocente){
		$this->campos=array('*');
		return $this->getRecords("CodDocente=$CodDocente",0,"CodCurso");
	}
	function mostrarDocenteGrupo($CodDocente,$Grupo=""){
		$this->campos=array('*');
		return $this->getRecords("CodDocente=$CodDocente",0,"$Grupo");
	}
	function mostrarDocenteMateria($CodDocente){
		$this->campos=array("*");
		return $this->getRecords(" CodDocente=$CodDocente",0,"CodMateria");
	}
	function mostrarMateriaCurso($CodMateria,$CodCurso){
		$this->campos=array('*');
		return $this->getRecords("CodCurso=$CodCurso and CodMateria=$CodMateria");
	}
	function mostrarDocenteMateriaCurso($CodDocente,$CodMateria,$CodCurso){
		$this->campos=array('*');
		return $this->getRecords("CodDocente=$CodDocente and CodMateria=$CodMateria and CodCurso=$CodCurso");
	}
	function mostrarDocenteMateriaCursoSexo($CodDocente,$CodMateria,$CodCurso,$Sexo){
		$this->campos=array('*');
		return $this->getRecords("CodDocente=$CodDocente and CodMateria=$CodMateria and CodCurso=$CodCurso and SexoAlumno=$Sexo");
	}
	function mostrarMateriaCursoSexo($CodMateria,$CodCurso,$Sexo){
		$this->campos=array('*');
		return $this->getRecords("CodCurso=$CodCurso and CodMateria=$CodMateria and (SexoAlumno=$Sexo or SexoAlumno=2)");
	}
	function mostrarMateriaCursoTrimestreSexo($CodMateria,$CodCurso,$Sexo,$Trimestre){
		$this->campos=array('*');
		return $this->getRecords("CodCurso=$CodCurso and CodMateria=$CodMateria and Trimestre=$Trimestre and (SexoAlumno=$Sexo or SexoAlumno=2)");
	}
	function insertarDocenteRegistro($Values){
		$this->insertRow($Values,1);
	}
	function eliminar($cod){
		$this->updateRow(array("Activo"=>0),"CodDocenteMateriaCurso=$cod");	
	}
}
 ?>