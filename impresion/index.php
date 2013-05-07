<?php
require('fpdf.php');
include_once("../config.php");
class PDF extends FPDF
{
//Cabecera de página
function Header()
{ 
    //Salto de línea
    $this->Ln(1);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'C');
}
}
$pdf=new PDF("L","mm",array(211, 139));
$pdf->AliasNbPages();
$pdf->SetRightMargin(100);
$pdf->AddPage();
$bordeC=0;
$pdf->SetTitle("Ventas de Productos",1);
//$pdf=new PDF("L","mm",array(211, 162));
$pdf->SetFont('Arial','UB',12);
$pdf->Cell(140,5,utf8_decode('VENTA RAPIDA'),0,0,"C");
$pdf->Ln(7);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5,utf8_decode('Fecha de Venta:'),$bordeC);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,utf8_decode('20-12-1990'),$bordeC);
$pdf->Ln(7);
//cabecera de la tabla
$pdf->SetFont('Arial','BU',11);
$pdf->Cell(10,5,utf8_decode('Nº'),0,0,"C");
$pdf->Cell(20,5,utf8_decode(' Cantidad  '),0,0,"C");
$pdf->Cell(30,5,utf8_decode('   Producto    '),0,0,"C");
$pdf->Cell(30,5,utf8_decode('Calibre'),0,0,"C");
$pdf->Cell(25,5,utf8_decode('      Precio      '),0,0,"C");
$pdf->Cell(25,5,utf8_decode('       Total      '),0,0,"C");
$pdf->Ln();
///////////////Segun la base de datos
$pdf->SetFont('Arial','',10);
$totaltodo=0;
for($i=1;$i<=200;$i++){
	$precio=redondear_dos_decimal(1000/rand(1,10));
	$cantidad=rand(1,30);
	$total=$precio*$cantidad;
	$totaltodo+=$total;
	$pdf->Cell(10,5,utf8_decode($i),0,0,"C");
	$pdf->Cell(20,5,utf8_decode($cantidad),0,0,"R");
	$pdf->Cell(30,5,utf8_decode('Producto'),0,0,"C");
	$pdf->Cell(30,5,utf8_decode('Calibre'),0,0,"C");
	$pdf->Cell(25,5,utf8_decode($precio." ".$monedaAbreviado),0,0,"R");
	$pdf->Cell(25,5,utf8_decode($total." ".$monedaAbreviado),0,0,"R");
	$pdf->Ln();
}
	$pdf->Cell(142,0,utf8_decode(""),1,0,"C");
	$pdf->Ln();
	$pdf->Cell(10,5,utf8_decode(""),0,0,"C");
	$pdf->Cell(20,5,utf8_decode(""),0,0,"R");
	$pdf->Cell(30,5,utf8_decode(""),0,0,"C");
	$pdf->Cell(30,5,utf8_decode(""),0,0,"C");
	$pdf->SetFont('Arial','UB',10);
	$pdf->Cell(25,5,utf8_decode("Total:"),0,0,"L");
	$pdf->Cell(25,5,utf8_decode($totaltodo." ".$monedaAbreviado),0,0,"R");
	
	
$pdf->Output();
function redondear_dos_decimal($valor) { 
   $float_redondeado=round($valor * 100) / 100; 
   return $float_redondeado; 
}
?>