<?php
include_once("db2.php");
class alumno extends db{
	var $tabla="alumno";

	function estadoTabla(){
		return $this->statusTable();
	}
	function mostrarAlumnos($CodCurso){
		$this->campos=array('CodAlumno,LOWER(Paterno) as Paterno,LOWER(Materno) as Materno,LOWER(Nombres) as Nombres, Sexo');
		return $this->getRecords(" CodCurso=$CodCurso and Retirado=0","Paterno,Materno,Nombres");
	}
	function mostrarDatosAlumnos($CodCurso){
		$this->campos=array('CodAlumno,LOWER(Paterno) as Paterno,LOWER(Materno) as Materno,LOWER(Nombres) as Nombres,Sexo');
		return $this->getRecords(" CodCurso=$CodCurso and Retirado=0","Paterno,Materno,Nombres");
	}
	function mostrarAlumnosCurso($CodCurso,$sexo){
		$this->campos=array('CodAlumno,LOWER(Paterno) as Paterno,LOWER(Materno) as Materno,LOWER(Nombres) as Nombres,TelefonoCasa,Ci,FechaNac,Rude,CelularP,CelularM');
		if($sexo=="2"){
			return $this->getRecords(" CodCurso=$CodCurso and (Sexo=0 OR Sexo=1) and Retirado=0","Paterno,Materno,Nombres");
		}else{
			return $this->getRecords(" CodCurso=$CodCurso AND Sexo=$sexo and Retirado=0","Paterno,Materno,Nombres");
		}
	}
	function cantidadAlumno($where){
		$this->campos=array(' Count(*) as Cantidad');
		return $this->getRecords($where);
	}
	function mostrarDatos($CodAlumno){
		$this->campos=array('*');
		return $this->getRecords(" CodAlumno=$CodAlumno and Retirado=0");
	}
	function mostrarDatosCuota($CodAlumno){
		$this->campos=array('*');
		return $this->getRecords(" CodAlumno=$CodAlumno");
	}
	function mostrarDatosWhere($Where){
		$this->campos=array('*');
		return $this->getRecords($Where." and Retirado=0","Paterno,Materno,Nombres");
	}
	function mostrarDatosCursoTotalBecado(){
		$this->campos=array('*');
		return $this->getRecords("MontoBeca!=0 and Retirado=0","CodCurso,Paterno,Materno,Nombres");
	}
	function mostrarDatosCodBarra($Where){
		$this->campos=array('*');
		return $this->getRecords($Where);
	}
	function contarInscritosCurso($CodAlumno){
		$this->campos=array('count(*) as CantidadTotal');
		return $this->getRecords("Retirado=0 and CodCurso=(SELECT CodCurso FROM alumno WHERE CodAlumno=$CodAlumno)");
	}
	function contarInscritosTotal(){
		$this->campos=array('count(*) as CantidadTotal');
		return $this->getRecords("Retirado=0");
	}
	function contarInscritoFechas(){
		$this->campos=array('count(*) as CantidadFecha,FechaIns');
		return $this->getRecords(" Retirado=0",false,"FechaIns");
	}
	function contarInscritoCurso(){
		$this->campos=array('count(*) as CantidadCurso,CodCurso');
		return $this->getRecords(" Retirado=0",false,"CodCurso");
	}
	function mostrarDatosPersonales($CodAlumno,$tipo=false){
		$this->tabla="alumno a, curso c";
		if(!$tipo){
			$this->campos=array("LOWER(a.Paterno) as Paterno, LOWER(a.Materno) as Materno, LOWER(a.Nombres) as Nombres, LOWER(c.Nombre) as Nombre");
		}else{
			$this->campos=array("UPPER(a.Paterno) as Paterno, UPPER(a.Materno) as Materno, UPPER(a.Nombres) as Nombres, UPPER(c.Nombre) as Nombre");
		}
		return $this->getRecords(" a.CodAlumno=$CodAlumno and a.CodCurso=c.CodCurso");
	}
	function loginPadre($Usuario,$Password){
		$this->campos=array("count(*) as Can,CodAlumno as CodUsuario");	
		return $this->getRecords("UsuarioPadre='$Usuario' and PasswordP='$Password'");
	}
	function loginAlumno($Usuario,$Password){
		$this->campos=array("count(*) as Can,CodAlumno as CodUsuario");	
		return $this->getRecords("UsuarioAlumno='$Usuario' and Password='$Password'");
	}
	function insertarAlumno($Values){
		$this->insertRow($Values,1);
	}
	function actualizarAlumno($values,$CodAlumno){
		$this->updateRow($values,"CodAlumno=$CodAlumno");	
	}
}
?>