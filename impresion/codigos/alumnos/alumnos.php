<?php
include_once("../../../login/check.php");
include_once("../../fpdf/code128.php");
include_once("../../../class/alumno.php");
	
if(!empty($_GET)){
	$pdf=new PDF_Code128("P","mm","letter");
	$alumno=new alumno;
	$CodAlumno=$_GET['CodAlumno'];
	$al=$alumno->mostrarDatos($CodAlumno);
	$al=array_shift($al);
	$CodBarra=$al['CodBarra'];
	$CodBarra=str_replace("ñ","n",$CodBarra);
	$CodBarra=str_replace("Ñ","N",$CodBarra);

	$pdf->AddPage();
	$pdf->SetFont('Arial','U',14);
	$pdf->SetXY(1,10);
	$pdf->Cell(215,5,"Codigo de Barra",0,0,"C");
	$pdf->ln(15);
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(195,5,ucwords(utf8_decode($al['Paterno']." ".$al['Materno']." ".$al['Nombres'])),0,0,"C");
	$pdf->Code128(80,40,$CodBarra,40,20);
	$pdf->Text(80,65,$CodBarra);
	$pdf->Output();
}
?>