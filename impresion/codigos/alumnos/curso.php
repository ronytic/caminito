<?php
include_once("../../../login/check.php");
include_once("../../../class/alumno.php");
include_once("../../../class/curso.php");
include_once("../../fpdf/code128.php");
include_once("../../../config.php");
class PDF extends PDF_Code128{
function Header()
{
	global $title;
	global $gestion;
	global $c;
    $this->Image("../../../images/logocsb.jpg",10,10,20,20);

	
    //$this->SetFont('Arial','B',15);
	$this->SetFont("Arial","",10);
	$this->SetXY(34,12);
	$this->Cell(55,4,utf8_decode($title));
	$this->SetFont("Arial","",8);
	$this->SetXY(34,16);
	$this->Cell(55,4,utf8_decode($gestion),0,0,"C");
	$this->ln(10);
	$this->SetFont("Arial","B",18);
	$this->Cell(190,4,"Codigos de Barra ".utf8_decode($c['Nombre']),0,1,"C");
	$this->ln(5);
	$this->Cell(195,0,"",1,1);
		$this->ln(5);
}

// Pie de página
function Footer()
{
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(195,0,"",1,1);
	$anio=date("Y");
	$this->Cell(195,4,utf8_decode("\"Superación y Estudio\""),0,1,"C");
    $this->Cell(195,4,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}	
}
if(!empty($_GET)){
	$CodCurso=$_GET['CodCurso'];
	$pdf=new PDF("P","mm","letter");
	$pdf->AliasNbPages();
	$alumno=new alumno;
	$curso=new curso;
	$c=$curso->mostrarCurso($CodCurso);
	$c=array_shift($c);
	$pdf->AddPage();

	$i=1;
	$pdf->SetFont("Arial","",12);$pdf->ln();
	foreach($alumno->mostrarDatosWhere(" CodCurso=$CodCurso") as $al){
		$pdf->Cell(45,30,"",1);

		$pdf->Code128(13,42,"asd",40,20);
		
		if($i==4){
			$pdf->ln(35);	
			$i=0;
		}
		$i++;
	}
	$pdf->Output();
}
?>