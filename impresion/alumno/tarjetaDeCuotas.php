<?php
include_once("../fpdf.php");
class pdf extends FPDF{
	
}
if(!empty($_GET)){
	include_once("../../class/alumno.php");
	$al=new alumno;
	$CodAlumno=$_GET['CodAlumno'];
	if(!empty($_GET['NombresAdicional']) && $_GET['NombresAdicional']!=""){
		$NombresExtra=$_GET['NombresAdicional'];
		$CursoExtra=$_GET['CursosAdicional'];
	}
	$alumno=$al->mostrarDatosPersonales($CodAlumno);
	$alumno=$alumno[0];

	if($NombresExtra!=""){
		$n=explode(" ",$alumno['Nombres']);	
		$nombre=$n[0];
		$tam=(int)(strlen($NombresExtra)/2);
		$x=107-$tam;
		$nombre=ucwords(utf8_decode($nombre))."/".ucwords(utf8_decode($NombresExtra));
	}else{
		$x=107;
		$nombre=ucwords(utf8_decode($alumno['Nombres']));
	}
	
	if($CursoExtra!=""){
		$curs=explode("/",$CursoExtra);
		//$x=107-$tam;
		$Curso=ucwords(utf8_decode($alumno['Nombre']))."/".ucwords(utf8_decode($curs[0]));
	}else{
		$x=107;
		$Curso=ucwords(utf8_decode($alumno['Nombre']));
	}
	$pdf=new PDF("L","mm",array(101, 158));
	$pdf->SetAutoPageBreak(true,0);  
	$pdf->SetCreator("Ronald Nina");
	$pdf->SetTitle("Tarjeta de Cuotas",1);
	$pdf->SetSubject("Sujeto");
	$pdf->AddPage();
	$pdf->SetFont('Times','B',13);
	$pdf->SetXY(113,44);
	$pdf->Cell(0,0,ucwords(utf8_decode($alumno['Paterno']." ".$alumno['Materno'])));
	$pdf->SetXY($x,50.5);
	$pdf->Cell(0,0,ucwords(utf8_decode($nombre)));
	
	$pdf->SetXY(103,58);
	$pdf->Cell(0,0,ucwords(utf8_decode($Curso)));
	if($curs[2]!=""){
		$curso2=$curs[1]."/";
	}else{
		$curso2=$curs[1];
	}
	if($curs[3]!=""){
		$curso2.=$curs[2]."/";
	}else{
		$curso2.=$curs[2];
	}
	$pdf->SetXY(103,64);
	$pdf->Cell(0,0,ucwords(utf8_decode($curso2)));
	
	$pdf->SetXY(122,85.5);
	$pdf->Cell(0,0,"12");
	
	$pdf->Output();
}
?>