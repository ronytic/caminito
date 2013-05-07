<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
include_once("../../class/documento.php");
include_once("../../class/config.php");
if(!empty($_GET)){
	$CodAlumno=$_GET['CodAlumno'];
	
	
	
	//mysql_query("UPDATE `csb2012`.`alumno` SET `CiPadre` = (SELECT CedulaPadre FROM Rude WHERE CodAlumno=$CodAlumno),Zona = (SELECT ZonaE FROM Rude WHERE CodAlumno=$CodAlumno),Calle = (SELECT AvenidaE FROM Rude WHERE CodAlumno=$CodAlumno),Numero = (SELECT NumeroE FROM Rude WHERE CodAlumno=$CodAlumno) WHERE `alumno`.`CodAlumno` = $CodAlumno LIMIT 1;");
	//
	$alumno=new alumno;
	$curso=new curso;
	$conf=new configuracion;
	$documento=new documento;
	$al=$alumno->mostrarDatos($CodAlumno);
	$al=array_shift($al);
	$cur=$curso->mostrarCurso($al['CodCurso']);
	$cur=array_shift($cur);
	$c=$conf->mostrarConfig("Titulo");
	$Titulo=array_shift($c);
	$doc=$documento->mostrarDocumento($CodAlumno);
	$doc=array_shift($doc);
	
	include_once("../fpdf.php");
	function escribir($w=210,$h=10,$t="",$s=12,$tipo="",$align="",$u=1){
		global $pdf;	
		$pdf->SetFont("Arial",$tipo,$s);
		if($u)
			$pdf->Cell($w,$h,ucwords(utf8_decode($t)),0,0,$align);
		else
			$pdf->Cell($w,$h,utf8_decode($t),0,0,$align);
	}
	class PDF extends FPDF{
		function Footer(){
			$this->SetY(-10);
			escribir(50,5,"",7,"B","");escribir(30,5,"Reporte Generado: ".date("d - m - Y    H:i:s"),7,"","");	
		}	
	}
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->Image("../../images/reportes/fondo1.jpg",10,10,196,260);
$pdf->SetAutoPageBreak(true,0);
$pdf->Cell(196,260,"",1);
$pdf->SetXY(10,10);
$h=10;
escribir(190,10,utf8_decode(mb_strtoupper($Titulo['Valor'],"utf8")),12,"UB","C");
$pdf->Ln();
escribir(190,10,"Datos del Alumno",12,"UB","L");
$pdf->ln();
escribir(50,$h,"Apellido Paterno:",12,"B","");escribir(30,$h,$al['Paterno'],12,"","");
$pdf->ln();
escribir(50,$h,"Apellido Materno:",12,"B","");escribir(30,$h,$al['Materno'],12,"","");
$pdf->ln();
escribir(50,$h,"Nombres:",12,"B","");escribir(30,$h,$al['Nombres'],12,"","");
$pdf->ln();

escribir(50,$h,"C.I.:",12,"B","");escribir(30,$h,$al['Ci']." ",12,"","");
$pdf->ln();
escribir(50,$h,"Fecha de Nacimiento:",12,"B","");escribir(30,$h,date("d - m - Y",strtotime($al['FechaNac'])),12,"","");
$pdf->ln();
escribir(50,$h,"Curso:",12,"B","");escribir(30,$h,$cur['Nombre'],12,"","");
$pdf->ln();
escribir(50,$h,"Dirección:",12,"B","");escribir(30,$h,$al['Zona'].", ".$al['Calle']." Nº ".$al['Numero'],12,"","");
$pdf->ln();

escribir(50,$h,"Teléfono Casa:",12,"B","");escribir(30,$h,$al['TelefonoCasa'],12,"","");
$pdf->ln();
escribir(50,$h,"Celular:",12,"B","");escribir(30,$h,$al['Celular'],12,"","");
$pdf->ln();

$pdf->cell(196,0,"",1);
$pdf->ln();

escribir(50,$h,"Nombre Padre:",12,"B","");escribir(30,$h,$al['ApellidosPadre']." ".$al['NombrePadre'],12,"","");
$pdf->ln();
escribir(50,$h,"CI Padre:",12,"B","");escribir(30,$h,$al['CiPadre'],12,"","");
$pdf->ln();
escribir(50,$h,"Celular Padre:",12,"B","");escribir(30,$h,$al['CelularP'],12,"","");
$pdf->ln();

$pdf->cell(196,0,"",1);
$pdf->ln();

escribir(50,$h,"Nombre Madre:",12,"B","");escribir(30,$h,$al['ApellidosMadre']." ".$al['NombreMadre'],12,"","");
$pdf->ln();
escribir(50,$h,"CI Madre:",12,"B","");escribir(30,$h,$al['CiMadre'],12,"","");
$pdf->ln();
escribir(50,$h,"Celular Madre:",12,"B","");escribir(30,$h,$al['CelularM'],12,"","");
$pdf->ln();

$pdf->cell(196,0,"",1);
$pdf->ln();

escribir(50,$h,"Persona a Cargo:",12,"B","");escribir(30,$h,$al['PersonaACargo'],12,"","");
$pdf->ln();

$pdf->cell(196,0,"",1);
$pdf->Ln();
$i=0;
escribir(190,10,"Documentos Pendientes",12,"UB","L");
$pdf->Ln();
$h=8;
if($doc['CertificadoNac']==0){
	escribir(50,$h,"Certificado de Nacimiento",10,"B","",0);escribir(30,$h,"Pendiente",10,"","");
	$pdf->Ln();	$i++;
}
if($doc['LibretaEsc']==0){
	escribir(50,$h,"Libreta Escolar",10,"B","",0);escribir(30,$h,"Pendiente",10,"","");
	$pdf->Ln();	$i++;
}
if($doc['LibretaVac']==0){
	escribir(50,$h,"Libreta de Vacunas",10,"B","",0);escribir(30,$h,"Pendiente",10,"","");
	$pdf->Ln();	$i++;
}
if($doc['CedulaId']==0){
	escribir(50,$h,"Fotocopia CI Alumno",10,"B","",0);escribir(30,$h,"Pendiente",10,"","");
	$pdf->Ln();	$i++;
}
if($doc['CedulaIdP']==0){
	escribir(50,$h,"Fotocopia de CI Padre",10,"B","",0);escribir(30,$h,"Pendiente",10,"","");
	$pdf->Ln();	$i++;
}
if($doc['CedulaIdM']==0){
	escribir(50,$h,"Fotocopia de CI Madre:",10,"B","",0);escribir(30,$h,"Pendiente",10,"","",0);
	$pdf->Ln();	$i++;
}
if($doc['Croquis']==0){
	escribir(50,$h,"Croquis de Domicilio:",10,"B","",0);escribir(30,$h,"Pendiente",10,"","");
	$pdf->Ln();	$i++;
}
if($doc['Fotografia']==0){
	escribir(50,$h,"Fotografías:",10,"B","",0);escribir(30,$h,"Pendiente",10,"","");
	$pdf->Ln();	$i++;
}

if(70-($i*10)==70){
	$pdf->Ln(60);
}else{
	$pdf->Ln(70-($i*10));	
}

$pdf->Ln();

$pdf->Output("Datos del Alumno.pdf","I");
}
?>