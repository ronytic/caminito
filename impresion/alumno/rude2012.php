<?php
include_once("../fpdf/fpdf.php");
include_once("../../class/rude.php");
include_once("../../class/alumno.php");
include_once("../../class/config.php");
$rude=new rude;
$alumno=new alumno;
$config=new configuracion;
$al=$rude->mostrarDatos($_GET['CodAlumno']);
$a=$alumno->mostrarDatos($_GET['CodAlumno']);
$al=array_shift($al);
$a=array_shift($a);
$c=$config->mostrarConfig("NombreLibreta");
$NombreLibreta=array_shift($c);
$c=$config->mostrarConfig("Sie");
$Sie=array_shift($c);
function escribe($x,$y,$t,$tam=12){
	global $pdf;
	$pdf->SetFont('Arial','',$tam);
	$pdf->SetXY($x,$y);
	$pdf->Cell(5,4,utf8_decode(mb_strtoupper($t,"utf8")),0,0,"C");
}

	$pdf=new FPDF("P","mm",array(216, 330));
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(true,0);
	
	$pdf->SetFont('Arial','B',12);
	$pdf->AddPage();
	$pdf->Image("RUDE.jpg",0,0,216, 330);
	//Codigo Sie
	$SieSeparado=($Sie['Valor']);
	$can=strlen($SieSeparado);
	
	$l=$can-8;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
	escribe(169,28,$t);
	$l=$can-7;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
	escribe(173.5,28,$t);
	$l=$can-6;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
	escribe(178,28,$t);
	$l=$can-5;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
	escribe(182.5,28,$t);
	$l=$can-4;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
	escribe(187,28,$t);
	$l=$can-3;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
	escribe(192,28,$t);
	$l=$can-2;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
	escribe(196.5,28,$t);
	$l=$can-1;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
	escribe(200.5,28,$t);
	
	escribe(75.2,38.1,"x",10);
	escribe(140,38,mb_strtoupper($NombreLibreta['Valor'],"utf8"));
	escribe(56,43.3,"2084");
	escribe(110,43.5,"EL ALTO 1");
	escribe(70,58,mb_strtoupper($a['Paterno'],"utf8"));
	escribe(70,64,mb_strtoupper($a['Materno'],"utf8"));
	escribe(70,70,mb_strtoupper($a['Nombres'],"utf8"));
	
	escribe(72,79,mb_strtoupper($al['PaisN'],"utf8"));
	escribe(72,84.5,mb_strtoupper($a['LugarNac'],"utf8"));
	escribe(72,90.5,mb_strtoupper($al['ProvinciaN'],"utf8"));
	escribe(72,96,mb_strtoupper($al['LocalidadN'],"utf8"));
	
	escribe(150,59,$a['Rude']);
	if($al['Documento']!=""){
	escribe(180.4,63.3,"x",8);}
	escribe(185,68,$a['Ci'],10);
	
	escribe(130,78,date('d',strtotime($a['FechaNac'])));
	escribe(142,78,date('m',strtotime($a['FechaNac'])));
	escribe(158,78,date('Y',strtotime($a['FechaNac'])));
	
	if(!$a['Sexo'])escribe(197.5,77.2,"x",8);
	if($a['Sexo'])escribe(197.5,81.5,"x",8);
	
	escribe(131,95.5,$al['CertOfi'],10);
	escribe(155,95.5,$al['CertLibro'],10);
	escribe(179.5,95.5,$al['CertPartida']);
	escribe(196,95.5,$al['CertFolio']);
	
	escribe(50,104,$al['CodigoSie']);//SIE
	escribe(155,104.5,$al['NombreUnidad'],10);
	if($a['CodCurso']==2)escribe(8.5,119.5,"x",7);//pre kinder
	if($a['CodCurso']==3)escribe(14,119.5,"x",7);//kinder
	//if($a['CodCurso']==3)escribe(23.5,119.5,"x",7);//1
	//if($a['CodCurso']==3)escribe(28.5,119.5,"x",7);//2
	/*if($a['CodCurso']==4)escribe(33,119.5,"x",7);//3
	if($a['CodCurso']==5)escribe(38,119.5,"x",7);//4
	if($a['CodCurso']==6)escribe(43,119.5,"x",7);//5
	if($a['CodCurso']==7)escribe(47.8,119.5,"x",7);//6
	if($a['CodCurso']==8)escribe(56.3,119.5,"x",7);//1
	if($a['CodCurso']==9)escribe(61,119.5,"x",7);//2
	if($a['CodCurso']==10)escribe(66,119.5,"x",7);//3
	if($a['CodCurso']==11)escribe(70.6,119.5,"x",7);//4
	if($a['CodCurso']==12)escribe(75.5,119.5,"x",7);//5
	if($a['CodCurso']==13)escribe(80.5,119.5,"x",7);//6*/
	
	escribe(123.8,121.5,"x",8);//paralelo
	
	escribe(186.2,120,"x",10);//turno
	
	escribe(60,134,$al['ProvinciaE']);
	escribe(60,140,$al['MunicipioE']);
	escribe(60,145.5,$al['ComunidadE']);
	
	escribe(160,134.5,$a['Zona']);
	escribe(160,140.5,$a['Calle']);
	escribe(195,146,$a['Numero']);
	escribe(132,146,$a['TelefonoCasa']);
	
	
	escribe(23,169,$al['LenguaMater'],10);
	
	if($al['CastellanoI'])escribe(23,180,"CASTELLANO",10);
	if($al['InglesI'])escribe(23,184,"INGLES",10);
	if($al['AymaraI'])escribe(23,188.5,"AYMARA",10);
	switch($al['PerteneceA']){
		case "MESTIZO":{
			escribe(61,166,"x",7);
			//escribe(61,170,"x",10);
			escribe(120,189.3,$al['PerteneceA'],8);
		}break;
		case "AYMARA":{
			escribe(61,174,"x",7);
		}break;
		case "QUECHUA":{
			escribe(108,184.5,"x",7);
		}break;
	}
	
	escribe(191,163.5,"x",8);//centro salud

	if($al['VecesCentro']=="1a2")escribe(147.3,170,"x",8);
	if($al['VecesCentro']=="3a5")escribe(164.5,170,"x",8);
	if($al['VecesCentro']=="6a+")escribe(185,170,"x",8);
	if($al['VecesCentro']=="niguna")escribe(198,170,"x",8);
	
	escribe(170,179.5,"x",8);//no
	escribe(170,182.5,"x",8);//no
	escribe(170,185,"x",8);//no
	
	escribe(42.5,200,"x",8);
	
	escribe(35.5,224.5,"x",8);
	
	escribe(34.5,233.5,"x",8);
	
	escribe(112.5,227.5,"x",8);
	
	escribe(88,237.5,"NO TRABAJO",10);
	escribe(89.5,245.5,"x",8);
	
	if($al['InternetCasa']==1)escribe(149,204,"x",8);
	if($al['InternetCasa']==2)escribe(149,207,"x",8);
	if($al['InternetCasa']==3)escribe(149,210,"x",8);
	if($al['InternetCasa']==4)escribe(149,214,"x",8);
	
	escribe(145,233.5,"x",8);
	
	if($al['Transporte']=="APIE")escribe(196.5,204,"x",8);
	if($al['Transporte']=="MINIBUS")escribe(196.5,207,"x",8);
	
	escribe(192.5,234,"x",10);
	
	escribe(54,259.8,$a['CiPadre'],10);
	escribe(72,264,$a['ApellidosPadre'],10);
	escribe(72,268.3,$a['NombrePadre'],10);
	escribe(72,272.5,$al['IdiomaP'],10);
	escribe(72,277,$a['OcupPadre'],10);
	escribe(72,281,$al['InstruccionP'],10);
	escribe(72,285,$al['ParentescoP'],10);
	
	escribe(161,260.5,$a['CiMadre'],10);
	escribe(175,265,$a['ApellidosMadre'],10);
	escribe(175,269.7,$a['NombreMadre'],10);
	escribe(175,274.2,$al['IdiomaM'],10);
	escribe(175,278.5,$a['OcupMadre'],10);
	escribe(175,282.7,$al['InstruccionM'],10);
	
	escribe(54-28,290.5,"E",10);//E
	escribe(58-28,290.5,"L",10);//E
	escribe(67.5-28,290.5,"A",10);//E
	escribe(72-28,290.5,"L",10);//E
	escribe(76.5-28,290.5,"T",10);//E
	escribe(81-28,290.5,"O",10);//E
	
	$dia=date("d",strtotime($a['FechaIns']));
	$mes=date("m",strtotime($a['FechaIns']));
	$anio=date("Y",strtotime($a['FechaIns']));
	escribe(81+38.5,290.5,$dia[0],10);//E
	escribe(81+43,290.5,$dia[1],10);//E
	
	escribe(81+60,290.5,$mes[0],10);//E
	escribe(81+64,290.5,$mes[1],10);//E
	
	escribe(81+80,290.5,$anio[0],10);//E
	escribe(81+84.5,290.5,$anio[1],10);//E
	escribe(81+89.5,290.5,$anio[2],10);//E
	escribe(81+94,290.5,$anio[3],10);//E
	
	$pdf->Output();

?>