<?php
require('fpdf.php');
include_once("../config.php");
include_once("../db.php");
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
    $this->SetY(-10);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
	$this->MultiCell(120,0,'',1);
	$this->Ln(1);
	$this->Cell(60,5,utf8_decode('Reporte Generado: '.date("Y-m-d H:i:s")),0,0,'C');
    $this->Cell(30,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'C');
	$this->Cell(29,5,utf8_decode('Sys - DesarrolloTic'),0,0,'C');
}
}
if(empty($_GET) && $_GET['u']=="")exit();
$unificador=$_GET['u'];
$pdf=new PDF("L","mm",array(211, 139));
$pdf->AliasNbPages();
$pdf->SetRightMargin(100);
$pdf->AddPage();
$bordeC=0;
//Consulta SQL
$l=connect();
$sqlRapido="SELECT * from Ventas WHERE Unificador=$unificador";
$res=mysql_query($sqlRapido);
$reg=mysql_fetch_array($res);
$res2=mysql_query($sqlRapido);
//Fin de Consulta SQL
$pdf->SetTitle("Ventas de Productos",1);
//$pdf=new PDF("L","mm",array(211, 162));
$pdf->SetFont('Arial','UB',12);
$pdf->Cell(120,5,utf8_decode('VENTA RAPIDA'),$bordeC,0,"C");
$pdf->Ln(7);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5,utf8_decode('Fecha de Venta:'),$bordeC);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,utf8_decode($reg['Fecha']),$bordeC);
$pdf->Ln(7);
//cabecera de la tabla
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(10,5,utf8_decode('Nº'),$bordeC,0,"C");
$pdf->Cell(15,5,utf8_decode(' Cant '),$bordeC,0,"C");
$pdf->Cell(25,5,utf8_decode('  Producto    '),$bordeC,0,"C");
$pdf->Cell(20,5,utf8_decode('Calibre'),$bordeC,0,"C");
$pdf->Cell(25,5,utf8_decode('      Precio      '),$bordeC,0,"C");
$pdf->Cell(25,5,utf8_decode('       Total      '),$bordeC,0,"C");
$pdf->Ln();
///////////////Segun la base de datos
$pdf->SetFont('Arial','',9);
$totaltodo=0;
while($reg=mysql_fetch_array($res2)){
	$i++;
	$precio=redondear_dos_decimal($reg['Precio']);
	$cantidad=$reg['Cantidad'];
	$total=$precio*$cantidad;
	$totaltodo+=$total;
	$pdf->Cell(10,5,utf8_decode($i),$bordeC,0,"C");
	$pdf->Cell(15,5,utf8_decode($cantidad),$bordeC,0,"R");
	$pdf->Cell(25,5,utf8_decode($reg['Nombre']),$bordeC,0,"C");
	$pdf->Cell(20,5,utf8_decode($reg['Calibre']),$bordeC,0,"C");
	$pdf->Cell(25,5,utf8_decode($precio." ".$monedaAbreviado),$bordeC,0,"R");
	$pdf->Cell(25,5,utf8_decode($total." ".$monedaAbreviado),$bordeC,0,"R");
	$pdf->Ln();
}
	$pdf->Cell(120,0,utf8_decode(""),1,0,"C");
	$pdf->Ln();
	$pdf->SetFont('Arial','UB',10);
	$pdf->Cell(95,5,utf8_decode("Total:"),0,0,"R");
	$pdf->Cell(25,5,utf8_decode($totaltodo." ".$monedaAbreviado),0,0,"R");
	
	
$pdf->Output();
function redondear_dos_decimal($valor) { 
   $float_redondeado=round($valor * 100) / 100; 
   return $float_redondeado; 
}
?>