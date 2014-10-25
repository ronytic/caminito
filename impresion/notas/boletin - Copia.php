<?php
include_once("../../login/check.php");
if(!empty($_GET) && isset($_GET['mf']) && $_GET['mf']==md5("lock")){
	$CodCurso=$_GET['CodCurso'];
	$CodAlumno=$_GET['CodAlumno'];	
	$Bimestre=$_GET['Bimestre'];
	include_once("../../class/config.php");
	include_once("../../class/alumno.php");
	include_once("../../class/curso.php");
	include_once("../../class/casilleros.php");
	include_once("../../class/cursomateria.php");
	include_once("../../class/materias.php");
	include_once("../../class/notascualitativa.php");
	include_once("../../class/notasinicial.php");
	include_once("../../class/docentemateriacurso.php");
	include_once("../../class/registronotas.php");
	include_once("../fpdf.php");
	$alumno=new alumno;
	$curso=new curso;
	$cursomateria=new cursomateria;
	$materias=new materias;
	$casilleros=new casilleros;
	$docentemateriacurso=new docentemateriacurso;
	$notascualitativa=new notascualitativa;
	
	$registronotas=new registronotas;
	$config=new configuracion;
	$notasinicial=new notasinicial;
	
	$pdf=new FPDF("L","mm","letter");//612,792
	$pdf->SetAutoPageBreak(true,10);
	$pdf->SetMargins(0,0,0);
	$pdf->AddPage();
	$pdf->SetFont("Arial","",11);
	$pdf->Image("../../images/reportes/fondo2.jpg",10,10,260,196);
	$al=array_shift($alumno->mostrarDatos($CodAlumno));
	$cur=array_shift($curso->mostrarCurso($CodCurso));
	$cnf=array_shift($config->mostrarConfig("TrimestreActual"));
	$trimestre=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("Anio"));
	$anio=$cnf['Valor'];
	//Sacar el Codigo del del trimestre desde ahi
	//Boletin
	$cnf=array_shift($config->mostrarConfig("Titulo"));
	$Titulo=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion1X"));
	$boletin1x=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion1Y"));
	$boletin1y=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion2X"));
	$boletin2x=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion2Y"));
	$boletin2y=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion3X"));
	$boletin3x=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion3Y"));
	$boletin3y=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion4X"));
	$boletin4x=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("BoletinPosicion4Y"));
	$boletin4y=$cnf['Valor'];
	
	
	$ni=$notasinicial->mostrarAlumno($CodAlumno);
	$ni=array_shift($ni);
	$pdf->SetXY(70,5);
	$pdf->SetFont("arial","BU",12);
	$pdf->Cell(50,8,utf8_decode("Boletín de Notas - ".$Titulo));
	
	$pdf->SetFont("arial","");
	$bordeC=0;
	$pdf->SetXY(15,15);
	$pdf->Cell(120,5,"Nombre : ".mb_strtoupper(utf8_decode($al['Paterno']." ".$al['Materno']." ".$al['Nombres'])),$bordeC);
	$pdf->SetXY(15,20);
	$pdf->Cell(120,5,"Curso : ".utf8_decode($cur['Nombre']),$bordeC);
	
	$pdf->SetXY(145,15);
	$pdf->Cell(30,5,utf8_decode("Gestión : ".$anio),$bordeC);
	$pdf->SetXY(145,20);
	$pdf->Cell(10,5,utf8_decode("Fecha : ".strftime("%d de %B de %Y")),$bordeC);
	
	$pdf->SetXY(10,25);
	$pdf->Cell(260,0,"",1);
	$pdf->SetXY(15,30);
	$pdf->SetFontSize(12);
	$pdf->Cell(10,5,utf8_decode("Evaluación Diagnostica: "),$bordeC);
	$pdf->SetFontSize(7);
	$pdf->SetX(65);
	$pdf->MultiCell(200,3,utf8_decode(mb_strtoupper($ni['ValorInicial'],"utf8")),0);
	$pdf->Ln();
	$pdf->SetX(10);
	$pdf->Cell(260,0,"",1);
	
	
	$pdf->Ln();
	$pdf->SetX(10);
	$pdf->SetFont("arial","B",11);
	$pdf->Cell(50,8,utf8_decode("Materias".$Bimestre),1,0,"C");
	$pdf->Cell(70,8,utf8_decode("1º Bimestre"),1,0,"C");
	$pdf->Cell(70,8,utf8_decode("2º Bimestre"),1,0,"C");
	$pdf->Cell(70,8,utf8_decode("3º Bimestre"),1,0,"C");
	$pdf->SetFont("arial","");
	// -
	$pdf->Line(10,70,270,70);
	$pdf->Line(10,95,270,95);
	$pdf->Line(10,120,270,120);
	$pdf->Line(10,145,270,145);
	$pdf->Line(10,170,270,170);
	// ||
	$pdf->Line(10,40,10,170);
	$pdf->Line(60,40,60,170);
	$pdf->Line(130,40,130,170);
	$pdf->Line(200,40,200,170);
	$pdf->Line(270,40,270,170);
	$pdf->SetFontSize(9);
	$i=0;
	foreach($cursomateria->mostrarMaterias($CodCurso) as $matbol){
		$mat=$materias->mostrarMateria($matbol['CodMateria']);
		$mat=array_shift($mat);
		$pdf->SetXY(10,48+$i);
		$pdf->SetFontSize(12);
		if($matbol['Alterno']==1)
			$pdf->MultiCell(50,4,utf8_decode($mat['Nombre'].""),0,"L");
		if($matbol['Alterno']==2)
			$pdf->MultiCell(50,4,utf8_decode($mat['NombreAlterno1']),0,"L");
		if($matbol['Alterno']==3)
			$pdf->MultiCell(50,4,utf8_decode($mat['NombreAlterno2']),0,"L");
		
		$sumanotas=0;
		
		
		
		$docmat=array_shift($docentemateriacurso->mostrarMateriaCursoTrimestreSexo($mat['CodMateria'],$CodCurso,$al['Sexo'],1));
		//print_r($docmat);
		$regNotas=$notascualitativa->mostrarCodDocMatAlumnoTrimestre($docmat['CodDocenteMateriaCurso'],$CodAlumno,1);
		$regNotas=array_shift($regNotas);
		
		$pdf->SetFontSize(8);
		
		///Primer Trimestre
		if($trimestre>=1){
			$pdf->SetXY($boletin4x+63,$boletin4y+48+$i);
			$pdf->MultiCell(65,4,$regNotas['Valor'],0,"L",0);//Nota
		}
			
		//echo $trimestre.".";
		$docmat=array_shift($docentemateriacurso->mostrarMateriaCursoTrimestreSexo($mat['CodMateria'],$CodCurso,$al['Sexo'],2));
		$regNotas=$notascualitativa->mostrarCodDocMatAlumnoTrimestre($docmat['CodDocenteMateriaCurso'],$CodAlumno,2);
		$regNotas=array_shift($regNotas);
		
		
		//Segundo Trimestre
		if($trimestre>=2){
			$pdf->SetXY($boletin4x+133,$boletin4y+48+$i);
			$pdf->MultiCell(65,4,utf8_decode(mb_strtoupper($regNotas['Valor'],"utf8")),0,"L",0);//Nota
		}
		
		$docmat=array_shift($docentemateriacurso->mostrarMateriaCursoTrimestreSexo($mat['CodMateria'],$CodCurso,$al['Sexo'],3));
		$regNotas=$notascualitativa->mostrarCodDocMatAlumnoTrimestre($docmat['CodDocenteMateriaCurso'],$CodAlumno,3);
		$regNotas=array_shift($regNotas);
		
		///Tercer Trimestre
		if($trimestre>=3){
			$pdf->SetXY($boletin4x+203,$boletin4y+48+$i);
			$pdf->MultiCell(65,4,utf8_decode(mb_strtoupper($regNotas['Valor'],"utf8")),0,"L",0);//Nota
		}
		
		
		$i+=24.5;//Salto para abajo
	}
	$pdf->SetFontSize(12);
	$pdf->SetXY(10,172);
	$pdf->Cell(60,5,utf8_decode("Informe Final de Aprendizaje: "),$bordeC);
	$pdf->SetFontSize(7);
	$pdf->MultiCell(200,3,utf8_decode($ni['ValorFinal'].""),0);
	$pdf->Line(120,200,170,200);
	$pdf->SetXY(120,200);
	$pdf->Cell(50,5,"Sello y Firma",0,0,"C");
	$pdf->Output();
}
?>