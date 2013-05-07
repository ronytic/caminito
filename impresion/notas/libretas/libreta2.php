<?php
include_once("../../../login/check.php");
include_once("../../fpdf/fpdf.php");
include_once("../../../class/config.php");
include_once("../../../class/alumno.php");
include_once("../../../class/curso.php");
include_once("fn.php");
$CodAlumno=$_GET['CodAlumno'];
$alumno=new alumno;
$config=new configuracion;
$fn=new fn;
$curso=new curso;
$al=array_shift($alumno->mostrarDatos($CodAlumno));
$cur=array_shift($curso->mostrarCurso($al['CodCurso']));
$cnf=array_shift($config->mostrarConfig("Sie"));
$Sie=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("NombreLibreta"));
$NombreLibreta=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("NucleoRed"));
$NucleoRed=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("Localidad"));
$Localidad=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("DistritoEscolar"));
$DistritoEscolar=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("Departamento"));
$Departamento=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("Gestion"));
$Gestion=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("DiaLibreta"));
$DiaLibreta=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("MesLibreta"));
$MesLibreta=$cnf['Valor'];
$pdf=new FPDF("L","mm","legal");
$pdf->SetTitle("Libreta Escolar",true);
$pdf->SetAuthor("Ronald Franz Nina Layme",1);
$pdf->SetCreator("Sistema académico administración de colegio particulares",1);
$pdf->SetSubject("Libreta escolar",true);
$pdf->SetDisplayMode("fullwidth","two");
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak(1,0);
//TAPA PRINCIPAL LIBRETA
$pdf->AddPage();
$fn->cuadro(135,33,75,5,$al['Paterno']." ".$al['Materno']);
$fn->cuadro(130,42,50,5,$al['Nombres']);
$fn->cuadro(193,42,4,5,"X");//SI aprobo
$fn->cuadro(209,42,4,5,"X");//NO aprobo
$fn->cuadro(137,53,40,5,$cur['Nombre']);
$fn->cuadro(190,53,22,5,$Gestion);
$fn->cuadro(125,74,85,5,$NombreLibreta);
$fn->cuadro(142,87,10,5,$DiaLibreta,"C",10);
$fn->cuadro(160,87,20,5,$MesLibreta,"C",10);

//Tapa 2
$fn->cuadro(255,98,60,5,$al['Rude']);
$fn->cuadro(245,108,75,5,$al['Paterno']." ".$al['Materno']);
$fn->cuadro(235,121,50,5,$al['Nombres']);
$fn->cuadro(305,121,4,5,"X");//F
$fn->cuadro(318,121,4,5,"X");//M
$fn->cuadro(270,133,50,5,$Gestion,"L");
$fn->cuadro(250,143,70,5,$NombreLibreta,"C");
$fn->cuadro(285,155,50,5,$Sie,"L");
$fn->cuadro(270,165,50,5,$NucleoRed,"L");
$fn->cuadro(270,176,50,5,$Localidad,"L");
$fn->cuadro(270,186,50,5,$DistritoEscolar,"L");
$fn->cuadro(270,197,50,5,$Departamento,"L");
//TAPA DE LAS NOTAS 
$pdf->AddPage();
$pdf->SetXY(0,0);
$pdf->SetFont("Arial","",12);
$pdf->Cell(30,5,"Hola",1);


$pdf->Output("Libreta Escolar.pdf","I");
?>