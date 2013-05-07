<?php
session_start();
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/casilleros.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/registronotas.php");
include_once("../../class/curso.php");
include_once("../../class/materias.php");
if(!empty($_GET) && md5("lock")==$_GET['lock']){
	$CodCurso=$_GET['CodCurso'];
	$CodTrimestre=$_GET['Trimestre'];
	$Orden=$_GET['Orden'];
	$titulo="REPORTE DE PROMEDIO DE NOTA";
	include_once("../pdf.php");

	class PDF extends PPDF{
		
		function Cabecera(){
			global $curso;
			global $mat,$CodTrimestre;

						
			$this->CuadroCabecera(13,"Curso",35,$curso['Nombre']);
			$this->CuadroCabecera(20,"Trimestre:",35,$CodTrimestre);
			$this->Pagina();
			$this->ln();
			$this->TituloCabecera(5,"Nº");
			$this->TituloCabecera(24,"Paterno");
			$this->TituloCabecera(24,"Materno");
			$this->TituloCabecera(35,"Nombres");
			$this->TituloCabecera(30,"PROMEDIO");
		}
	}
	$alumnos=new alumno;
	$docenteMateriaCurso=new docentemateriacurso;
	$registroNotas=new registronotas;
	$cur=new curso;
	$materia=new materias;
	$casilleros=new casilleros;
	$curso=$cur->mostrarCurso($CodCurso);
	$curso=array_shift($curso);
	$codigosmateria=array();
	foreach($docenteMateriaCurso->mostrarCurso($CodCurso) as $docMateriaCurso){
		foreach($casilleros->mostrarTrimestre($docMateriaCurso['CodDocenteMateriaCurso'],$CodTrimestre) as $casillas){
			array_push($codigosmateria,$casillas['CodCasilleros']);
		}
	}
	$codmateria=implode(",",$codigosmateria);
	//echo $codmateria;
	$Sexo=$docMat['SexoAlumno'];
	
	
	$pdf=new PDF("P","mm","letter");//612,792
	$pdf->AddPage();
	$relleno=0;
	$na=0;
	$Orden=$Orden=="1"?$Orden="DESC":$Orden="ASC";
	foreach($registroNotas->mostrarPromedioCurso($codmateria,$Orden) as $regNota){
		$al=array_shift($alumnos->mostrarDatos($regNota['CodAlumno']));
		if(count($al)!=0){
			$na++;
			if($na%2==0)
				$relleno=1;
			else
				$relleno=0;
				$pdf->CuadroCuerpo(5,$na,$relleno);
				$pdf->CuadroNombreSeparado(24,$al['Paterno'],24,$al['Materno'],35,$al['Nombres'],1,$relleno);
				$pdf->CuadroCuerpo(30,number_format(round($regNota['Promedio'],2),2),$relleno,"C");
				$pdf->Ln(5);
		}
	}
	@$pdf->Output();
}
?>