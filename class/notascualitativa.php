<?php 
include_once 'db2.php';
class notascualitativa extends db{
	var $tabla="notasCualitativa";
	function mostrarDocenteMateriaCursoTrimestre($CodDocente,$CodMateria,$CodCurso,$Trimestre){
		$this->tabla="docentemateriacurso dmc, notascualitativa nc";
		$this->campos=array('dmc.CodDocente,dmc.CodMateria,dmc.CodCurso,dmc.SexoAlumno,dmc.CodDocenteMateriaCurso,nc.*');
		return $this->getRecords("dmc.CodDocente=$CodDocente and dmc.CodMateria=$CodMateria and dmc.CodCurso=$CodCurso and nc.Trimestre=$Trimestre and dmc.CodDocenteMateriaCurso=nc.CodDocenteMateriaCurso");
	}
	function mostrarCodDocMatAlumnoTrimestre($CodDocenteMateriaCurso,$CodAlumno,$Trimestre){
		$this->tabla="notasCualitativa";
		$this->campos=array("*");	
		return $this->getRecords("CodDocenteMateriaCurso=$CodDocenteMateriaCurso and CodAlumno=$CodAlumno and Trimestre=$Trimestre");
	}
	function mostrarNota($CodDocenteMateriaCurso,$Trimestre){
		$this->campos=array("*");	
		return $this->getRecords("CodDocenteMateriaCurso=$CodDocenteMateriaCurso and Trimestre=$Trimestre");
	}
	function actualizarNota($values,$where){
		$this->updateRow($values,$where);		
	}
}
 ?>