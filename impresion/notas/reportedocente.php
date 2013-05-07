<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/casilleros.php");
include_once("../../class/registronotas.php");
include_once("../../class/curso.php");
include_once("../../class/materias.php");
include_once("../../notas/fn.php");
include_once("../../class/config.php");
if(!empty($_GET) && md5("lock")==$_GET['lock']){
	$CodCurso=$_GET['CodCurso'];
	$CodMateria=$_GET['CodMateria'];
	$CodDocente=$_GET['CodDocente'];
	$CodTrimestre=$_GET['Trimestre'];
	$titulo="REPORTE DE NOTAS";
	include_once("../pdf.php");
	
	class PDF extends PPDF{
		
		function Cabecera(){
			global $curso;
			global $mat,$CodTrimestre;
			global $Etiquetas;
			$this->CuadroCabecera(13,"Curso",35,$curso['Nombre']);
			$this->CuadroCabecera(15,"Materia:",35,$mat['Nombre']);
			$this->CuadroCabecera(10,"Trim:",5,$CodTrimestre);
			$this->Pagina();
			$this->ln();
			$this->TituloCabecera(5,"Nº");
			$this->TituloCabecera(24,"Paterno");
			$this->TituloCabecera(24,"Materno");
			$this->TituloCabecera(35,"Nombres");
			if(count($Etiquetas)>0){
				foreach($Etiquetas as $et){
					$this->TituloCabecera(5,$et,9);
				}
			}
			$this->TituloCabecera(8,"PRO");
			$this->TituloCabecera(8,"DPS");
			$this->TituloCabecera(8,"N.F.");
		}
	}
	
	
	$alumnos=new alumno;
	$casilleros=new casilleros;
	$registroNotas=new registronotas;
	$fn=new funciones;
	$cur=new curso;
	$materia=new materias;
	
	$curso=array_shift($cur->mostrarCurso($CodCurso));
	$mat=array_shift($materia->mostrarMateria($CodMateria));

	$casillas=array_shift($casilleros->mostrarDocenteMateriaCursoTrimestre($CodDocente,$CodMateria,$CodCurso,$CodTrimestre));
	$CodCasilleros=$casillas['CodCasilleros'];
	$Sexo=$casillas['SexoAlumno'];
	$numcasilleros=$casillas['Casilleros'];
	$Dps=$casillas['Dps'];
	$FormulaCalificaciones=$casillas['FormulaCalificaciones'];
	$cnf=array_shift($config->mostrarConfig("NotaReprobacion"));
	$notaReprobado=$cnf['Valor'];
	for($i=1;$i<=$numcasilleros;$i++){
		$Etiquetas[$i]=$fn->sacarIniciales($casillas['NombreCasilla'.$i]);
	}
	$pdf=new PDF("P","mm","letter");//612,792
	$pdf->AddPage();
	$relleno=0;
	foreach($alumnos->mostrarAlumnosCurso($CodCurso,$Sexo) as $al){
		$regNota=array_shift($registroNotas->mostrarRegistroNotas($CodCasilleros,$al['CodAlumno'],$CodTrimestre));
		$na++;
		if($na%2==0)
			$relleno=1;
		else
			$relleno=0;
		$pdf->CuadroCuerpo(5,$na,$relleno,"C");
		$pdf->CuadroNombreSeparado(24,$al['Paterno'],24,$al['Materno'],35,$al['Nombres'],1,$relleno);
		
		for($i=1;$i<=$numcasilleros;$i++){
			$pdf->CuadroCuerpo(5,$regNota['Nota'.$i],$relleno,"C");
		}
		$pdf->CuadroCuerpo(8,$regNota['Resultado'],$relleno,"C");
		$pdf->CuadroCuerpo(8,$regNota['Dps'],$relleno,"C");
		if($regNota['NotaFinal']<$notaReprobado){
			$pdf->SetFillColor(179,179,179);
			$pdf->CuadroCuerpoResaltar(8,$regNota['NotaFinal'],1,"C",1);
		}else{
			$pdf->CuadroCuerpo(8,$regNota['NotaFinal'],$relleno,"C",1);
		}
		

		$pdf->Ln(5);
	}
	@$pdf->Output();
}
?>