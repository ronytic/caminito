<?php 
include_once 'db2.php';
class notasinicial extends db{
	var $tabla="notasInicial";
	function mostrarDocenteMateriaCursoTrimestre($CodDocente,$CodMateria,$CodCurso,$Trimestre){
		$this->tabla="docentemateriacurso dmc, notascualitativa nc";
		$this->campos=array('dmc.CodDocente,dmc.CodMateria,dmc.CodCurso,dmc.SexoAlumno,dmc.CodDocenteMateriaCurso,nc.*');
		return $this->getRecords("dmc.CodDocente=$CodDocente and dmc.CodMateria=$CodMateria and dmc.CodCurso=$CodCurso and nc.Trimestre=$Trimestre and dmc.CodDocenteMateriaCurso=nc.CodDocenteMateriaCurso");
	}
	function mostrarNota($CodDocenteMateriaCurso,$Trimestre){
		$this->campos=array("*");	
		return $this->getRecords("CodDocenteMateriaCurso=$CodDocenteMateriaCurso and Trimestre=$Trimestre");
	}
	function mostrarNotaRegistrado($CodAlumno){
		$this->campos=array("count(*) as cantidad");	
		return $this->getRecords("CodAlumno=$CodAlumno");
	}
	function mostrarAlumno($CodAlumno){
		$this->campos=array("*");	
		return $this->getRecords("CodAlumno=$CodAlumno");
	}
	function eliminar($CodAlumno){
		return $this->deleteRecord("CodAlumno=$CodAlumno");	
	}
}
 ?>