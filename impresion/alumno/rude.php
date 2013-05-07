<?php
include_once("../fpdf.php");
class pdf extends FPDF{
}
	/*include_once("../../class/alumno.php");
	$al=new alumno;
	$CodAlumno=$_GET['CodAlumno'];
	$alumno=$al->mostrarDatosPersonales($CodAlumno);
	$alumno=$alumno[0];*/
function escribe($x,$y,$t,$tam=12){
	global $pdf;
	$pdf->SetFont('Times','',$tam);
	$pdf->SetXY($x,$y);
	$pdf->Cell(5,4,utf8_decode($t),0,0,"C");

}
	$pdf=new PDF("P","mm",array(216, 330));
	$pdf->SetAutoPageBreak(true,0);
	$pdf->SetCreator("Ronald Nina");
	$pdf->SetTitle("Tarjeta de Cuotas",1);
	$pdf->SetSubject("Sujeto");
	$pdf->SetFont('Times','B',13);
	$pdf->AddPage();
	$pdf->SetDrawColor(150,150,150);
	$pdf->SetTextColor(150,150,150);
	$pdf->Image("RUDE.jpg",0,0,216, 330);
	
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(true,0);  
/*	//Numero
	$pdf->SetXY(199,20);
	$pdf->Cell(5,4,"530");
	//Codigo Sie
	$pdf->SetXY(172,28);
	$pdf->Cell(5,4,"4");
	$pdf->SetXY(176,28);
	$pdf->Cell(5,4,"0");
	$pdf->SetXY(181,28);
	$pdf->Cell(5,4,"7");
	$pdf->SetXY(185,28);
	$pdf->Cell(5,4,"3");
	$pdf->SetXY(190,28);
	$pdf->Cell(5,4,"0");
	$pdf->SetXY(194,28);
	$pdf->Cell(5,4,"2");
	$pdf->SetXY(199,28);
	$pdf->Cell(5,4,"9");
	$pdf->SetXY(203,28);
	$pdf->Cell(5,4,"2");
	//dependencia
	$pdf->SetFont('Times','',10);
	$pdf->SetXY(77.2,38.5);
	$pdf->Cell(5,4,"x");
	
	
	//Unidad Educativiva
	escribe(110,38,"SANTA BÁRBARA");
	escribe(60,44,"2084");
	escribe(110,44,"EL ALTO 1");
	escribe(26.5,57.5,"F");
	escribe(31.5,57.5,"E");
	escribe(36,57.5,"R");
	escribe(40.5,57.5,"D");
	escribe(45,57.5,"I");
	escribe(49.5,57.5,"N");
	escribe(54,57.5,"A");
	escribe(59,57.5,"N");
	escribe(63.5,57.5,"D");
	escribe(68,57.5,"O");
	escribe(73,57.5,"M");
	escribe(77.5,57.5,"M");
	escribe(82,57.5,"M");
	escribe(87,57.5,"M");
	escribe(91.5,57.5,"M");
	escribe(96,57.5,"M");
	escribe(101,57.5,"M");
	escribe(105.5,57.5,"M");
	escribe(110,57.5,"M");
	escribe(114.5,57.5,"M");
	escribe(119.5,57.5,"M");
	//////////////////
	escribe(26.5,63,"F");
	escribe(31.5,63,"E");
	escribe(36,63,"R");
	escribe(40.5,63,"D");
	escribe(45,63,"I");
	escribe(49.5,63,"N");
	escribe(54,63,"A");
	escribe(59,63,"N");
	escribe(63.5,63,"D");
	escribe(68,63,"O");
	escribe(73,63,"M");
	escribe(77.5,63,"M");
	escribe(82,63,"M");
	escribe(87,63,"M");
	escribe(91.5,63,"M");
	escribe(96,63,"M");
	escribe(101,63,"M");
	escribe(105.5,63,"M");
	escribe(110,63,"M");
	escribe(114.5,63,"M");
	escribe(119.5,63,"M");
	///
	//////////////////
	escribe(26.5,69,"F");
	escribe(31.5,69,"E");
	escribe(36,69,"R");
	escribe(40.5,69,"D");
	escribe(45,69,"I");
	escribe(49.5,69,"N");
	escribe(54,69,"A");
	escribe(59,69,"N");
	escribe(63.5,69,"D");
	escribe(68,69,"O");
	escribe(73,69,"M");
	escribe(77.5,69,"M");
	escribe(82,69,"M");
	escribe(87,69,"M");
	escribe(91.5,69,"M");
	escribe(96,69,"M");
	escribe(101,69,"M");
	escribe(105.5,69,"M");
	escribe(110,69,"M");
	escribe(114.5,69,"M");
	escribe(119.5,69,"M");
	///
	
	escribe(72,77,"BOLIVIA");
	escribe(72,83,"LA PAZ");
	escribe(72,88.5,"MURILLO");
	escribe(72,94,"NUESTRA SEÑORA DE LA PAZ");
	
	escribe(150,56.5,"123123123123");
	
	escribe(180.7,60.7,"x",10);
	
	escribe(200,60.7,"x",10);
	
	escribe(185,66,"12132132455",10);
	
	escribe(130,76,"0");
	escribe(135,76,"0");
	escribe(142,76,"0");
	escribe(147,76,"0");
	escribe(153,76,"0");
	escribe(157.5,76,"0");
	escribe(162,76,"0");
	escribe(166.5,76,"0");
	
	escribe(198.7,75.2,"x",10);
	escribe(198.7,79.2,"x",10);
	
	escribe(133,93,"0000");
	escribe(158,93,"7-97");
	escribe(181,93,"000");
	escribe(197,93,"0000");
	
	
	escribe(11.5,110,"x",10);//kinder
	escribe(19,110,"x",10);//primero
	escribe(23.7,110,"x",10);//segundo
	escribe(28,110,"x",10);//tercero
	escribe(32.7,110,"x",10);//cuarto
	escribe(37.3,110,"x",10);//5
	escribe(41.7,110,"x",10);//6
	escribe(46,110,"x",10);//7
	escribe(50.5,110,"x",10);//8
	escribe(58.8,110,"x",10);//1-
	escribe(63.2,110,"x",10);//2-
	escribe(67.5,110,"x",10);//3-
	escribe(72,110,"x",10);//4-
	
	escribe(81,111.3,"x",10);//paralelo A
	
	escribe(139.3,110.2,"x");//Turno
	
	escribe(174.5,110.2,"x",10);//Nuevo
	escribe(201,110.2,"x",10);//Reinscripcion
	
	escribe(31,122,"0");//SIE
	escribe(35.2,122,"0");//SIE
	escribe(40,122,"0");//SIE
	escribe(44.3,122,"0");//SIE
	escribe(49,122,"0");//SIE
	escribe(53.5,122,"0");//SIE
	escribe(58,122,"0");//SIE
	escribe(62.3,122,"0");//SIE
	
	escribe(150,122.5,"SANTA BÁRBARA");//Unidad Educativa
	escribe(118,128,"X");//CN
	escribe(143,128,"X");//Libreta Escolar
	escribe(180,128,"FOTOCOPIA DE CARNET",10);//Otro
	
	escribe(60,138.5,"LA PAZ");//Departamento
	escribe(60,143.5,"LA PAZ");//Provision
	escribe(60,148.5,"LA PAZ");//Seccion
	escribe(60,153.5,"LA PAZ");//Canton
	
	escribe(170,138.5,"LA PAZ");//Localidad
	escribe(170,143.5,"LA PAZ");//Zona
	escribe(170,148.5,"LA PAZ");//Avenida
	escribe(140,153.5,"00000");//Numero de vivienda
	escribe(188,153.5,"00000000");//Numero de vivienda
	
	escribe(20.4,175.3,"x",10);//Quechua
	escribe(20.4,180.73,"x",10);//Aymara
	escribe(20.4,186.1,"x",10);//Guarani
	escribe(40,175.3,"x",10);//Moxeño
	escribe(40,181,"x",10);//Castellano
	escribe(40,187.1,"x",10);//Chiquitano
	escribe(25,195,"OTRO IDIOMA");//Chiquitano
	
	
	escribe(62.5,175.3,"x",10);//Castellano
	escribe(62.5,179.3,"x",10);//Quechua
	escribe(62.5,183.8,"x",10);//Guarani
	escribe(62.5,187.5,"x",10);//Aymara
	escribe(82.5,175.3,"x",10);//Moxeño
	escribe(82.5,179.3,"x",10);//Chiquitano
	escribe(82.5,183.8,"x",10);//Ingles
	escribe(82.5,187.5,"x",10);//Portuguez
	escribe(67,195,"OTRO IDIOMA");//Chiquitano
	
	
	escribe(103.5,175.5,"x",10);//Quechua
	escribe(103.5,181,"x",10);//Guarano
	escribe(103.5,186.8,"x",10);//Aymara
	escribe(124.7,175.7,"x",10);//Moxeño
	escribe(124.7,181.5,"x",10);//Chiquitano
	escribe(124.7,186.7,"x",10);//Mestizo
	escribe(109,195,"OTRO IDENTIFICA");//Chiquitano
	
	
	escribe(190,166,"x",10);//Seguro Si
	escribe(201.3,166,"x",10);//Seguro No
	escribe(170,174,"OTRO SEGURO");//Seguro
	escribe(193,179.2,"000000");//Sangre
	
	escribe(170,189,"NINGUNA");//Discapacidad
	escribe(151.5,195.5,"x",10);//Nacimiento
	escribe(175,195.5,"x",10);//Adquirida
	escribe(200,195.5,"x",10);//Hereditario
	
	escribe(40,210.2,"x",10);//Agua Potable
	escribe(40,223.5,"x",10);//Luz
	escribe(40,234.2,"x",10);//Gas
	escribe(40,238.2,"x",10);//Alcantarillado
	escribe(27,248.5,"OTRO SERVICIO");//Alcantarillado
	
	escribe(85.8,209.6,"x",10);//No trabaja
	
	escribe(119,211,"x",10);//Radio
	escribe(119,215.3,"x",10);//Televisor
	escribe(119,220,"x",10);//Telefono
	escribe(119,225,"x",10);//Celular
	escribe(119,229.7,"x",10);//Computadora
	escribe(119,234,"x",10);//Internet
	escribe(111,245,"OTRO ACCESO",10);//Otro acceso
	
	
	escribe(149.5,214,"x",10);//A pie
	escribe(149.5,222,"x",10);//Minibus
	escribe(182,226.8,"AUTO PROPIO");//Auto Propio
	
	escribe(153.5,237,"0");//Km1
	escribe(158,237,"0");//Km2
	escribe(163.5,237,"0");//Km3
	
	escribe(185,237,"0");//m1
	escribe(190,237,"0");//m2
	escribe(194.5,237,"0");//m3
	
	escribe(156.5,247,"0");//h1
	escribe(161,247,"0");//h2
	escribe(191.5,247,"0");//min1
	escribe(196,247,"0");//min2
	
	escribe(55,263,"0000000000LP");//CiP
	escribe(70,268,"APELLIDOPATERNO");//PaternoP
	escribe(70,273,"APELLIDOMATERNO");//MaternoP
	escribe(70,278,"NOMBRES");//NombresP
	escribe(70,283.5,"OCUPACIÖN");//OcupacionP
	escribe(70,288.5,"GRADO DE INSTRUCCIÓN");//gradoP
	escribe(54,293.5,"CASTELLANO");//idiomaP
	escribe(92,293.5,"000000000");//telefonoP
	escribe(75,298.8,"000000000");//parentescoP
	
	escribe(158,263.5,"0000000000LP");//CiP
	escribe(175,269,"APELLIDOPATERNO");//PaternoP
	escribe(175,275,"APELLIDOMATERNO");//MaternoP
	escribe(175,281,"NOMBRES");//NombresP
	escribe(175,287,"OCUPACIÖN");//OcupacionP
	escribe(175,292.3,"GRADO DE INSTRUCCIÓN");//gradoP
	escribe(157,298,"CASTELLANO");//idiomaP
	escribe(195,298,"000000000");//telefonoP
	escribe(75,298.8,"000000000");//parentescoP
	
	//Not tocar 
	
	escribe(45.5,306.7,"E");//E
	escribe(49.5,306.7,"L");//E
	escribe(54.5,306.7," ");//E
	escribe(58.5,306.7,"A");//E
	escribe(63,306.7,"L");//E
	escribe(67.5,306.7,"T");//E
	escribe(72.5,306.7,"O");//E
	
	
	escribe(110,306.4,"0");//E
	escribe(115,306.4,"0");//E
	
	escribe(125.5,306.4,"0");//E
	escribe(130,306.4,"0");//E
	
	escribe(142,306.4,"0");//E
	escribe(146.5,306.4,"0");//E
	escribe(151,306.4,"0");//E
	escribe(155,306.4,"0");//E*/
	/*$pdf->SetFontSize(8);
	for($j=0;$j<=32;$j++){
		$pdf->SetXY(1,($j*10)+1);
		for($i=1;$i<=21;$i++)
		$pdf->Cell(10,10,($i*10).",".($j+1)*10,1,"","R");
	}*/
	$pdf->Output();
?>