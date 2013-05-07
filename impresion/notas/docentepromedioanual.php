<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/docentemateriacurso.php");
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
	$titulo="NOTAS PROMEDIO ANUAL TRIMESTRE";
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
			
			$this->TituloCabecera(15,"1 TRIM");
			$this->TituloCabecera(15,"2 TRIM");
			$this->TituloCabecera(15,"3 TRIM");
			$this->TituloCabecera(20,"PROMEDIO");
		}
	}

	$alumnos=new alumno;
	$docentemateriacurso=new docentemateriacurso;
	$registroNotas=new registronotas;
	$fn=new funciones;
	$cur=new curso;
	$materia=new materias;
	$casilleros=new casilleros;

	$curso=array_shift($cur->mostrarCurso($CodCurso));
	$mat=array_shift($materia->mostrarMateria($CodMateria));
	$docmateriacurso=array_shift($docentemateriacurso->mostrarDocenteMateriaCurso($CodDocente,$CodMateria,$CodCurso));
	

	$Sexo=$docmateriacurso['SexoAlumno'];
	$cnf=array_shift($config->mostrarConfig("NotaReprobacion"));
	$notaReprobado=$cnf['Valor'];

	$pdf=new PDF("P","mm","letter");//612,792
	$pdf->AddPage();
	$relleno=0;

	foreach($alumnos->mostrarAlumnosCurso($CodCurso,$Sexo) as $al){
		$cas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($CodMateria,$CodCurso,$Sexo,1));
		$CodCasilleros=$cas['CodCasilleros'];
		$regNota1=array_shift($registroNotas->mostrarRegistroNotas($CodCasilleros,$al['CodAlumno'],1));
		
		$cas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($CodMateria,$CodCurso,$Sexo,2));
		$CodCasilleros=$cas['CodCasilleros'];
		$regNota2=array_shift($registroNotas->mostrarRegistroNotas($CodCasilleros,$al['CodAlumno'],2));
		
		$cas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($CodMateria,$CodCurso,$Sexo,3));
		$CodCasilleros=$cas['CodCasilleros'];
		$regNota3=array_shift($registroNotas->mostrarRegistroNotas($CodCasilleros,$al['CodAlumno'],3));
		
		$regNotaFinal=$regNota1['NotaFinal']+$regNota2['NotaFinal']+$regNota3['NotaFinal'];
		$regNotaFinal=round($regNotaFinal/3);
		$na++;
		if($na%2==0)
			$relleno=1;
		else
			$relleno=0;
		$pdf->CuadroCuerpo(5,$na,$relleno,"C");
		$pdf->CuadroNombreSeparado(24,$al['Paterno'],24,$al['Materno'],35,$al['Nombres'],1,$relleno);
		
		$pdf->CuadroCuerpo(15,$regNota1['NotaFinal'],$relleno,"C");
		$pdf->CuadroCuerpo(15,$regNota2['NotaFinal'],$relleno,"C");
		$pdf->CuadroCuerpo(15,$regNota3['NotaFinal'],$relleno,"C");

		
		if($regNotaFinal<$notaReprobado){
			$pdf->SetFillColor(179,179,179);
			$pdf->CuadroCuerpoResaltar(20,$regNotaFinal,1,"C",1);
		}else{
			$pdf->CuadroCuerpo(20,$regNotaFinal,$relleno,"C",1);
		}
		

		$pdf->Ln(5);
	}
	@$pdf->Output();
}
?>