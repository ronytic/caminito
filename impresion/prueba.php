<?php
include_once("fpdf.php");
$pdf=new FPDF("P","mm","letter");
$pdf->SetMargins(30,25,25);
$pdf->AddPage();

$pdf->SetFont("Arial","",12);
$pdf->Cell(1,1,"HOLA");
$pdf->Output();
?>