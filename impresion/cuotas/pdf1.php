<?php
include_once("../fpdf.php");
	include_once("../../class/config.php");
	$config=new configuracion;
	$cnf=array_shift($config->mostrarConfig("Titulo"));
	$title=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("Gestion"));
	$gestion=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("Lema"));
	$lema=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("Logo"));
	$logo=$cnf['Valor'];
	class PPDF extends FPDF{
		
		function Header(){
			
			$this->SetLeftMargin(18);
			
			global $title,$gestion,$titulo,$logo;
			$fecha=date("d-m-Y");
			
			$this->Image("../../images/logos/".$logo,10,10,20,20);
			$this->Fuente("",$tam);
			$this->SetXY(34,12);
			$this->Cell(55,4,utf8_decode($title));
			$this->Fuente("B",8);
			$this->SetXY(34,16);
			$this->Cell(55,4,utf8_decode($gestion),0,0,"C");
			$this->ln(10);
			
			$this->Fuente("B",18);
			$this->Cell(190,4,utf8_decode($titulo),0,5,"C");
			$this->ln(5);
			$this->CuadroCabecera(30,"Fecha Actual: ",20,$fecha);
			$this->ln(5);
			if(in_array("Cabecera",get_class_methods($this))){
				$this->Cabecera();	
			}
			
			$this->ln();
			$this->Cell(176,0,"",1,1);
			
			
		}
		function Pagina(){
			$this->AliasNbPages();
			$this->CuadroCabecera(15,"Página:",20,$this->PageNo()." de {nb}");
		}
		function Fuente($tipo="B",$tam=10){
			$this->SetFillColor(234,234,234);
			$this->SetFont("Arial",$tipo,$tam);	
		}
		function CuadroCabecera($txt1Ancho,$txt1,$txt2Ancho,$txt2){
			$this->Fuente("B");
			$this->Cell($txt1Ancho,4,utf8_decode($txt1),0,0,"L");
			$this->Fuente("");
			$this->Cell($txt2Ancho,4,utf8_decode($txt2),0,0,"L");
		}
		function TituloCabecera($txtAncho,$txt,$tam=10,$borde=1,$align="C"){
			$this->Fuente("B",$tam);
			$this->Cell($txtAncho,4,utf8_decode($txt),$borde,0,$align);	
		}
		function CuadroCuerpo($txtAncho,$txt,$relleno=0,$align="L",$borde=0){
			$this->Fuente("");
			$this->Cell($txtAncho,5,utf8_decode($txt),$borde,0,$align,$relleno);	
		}
		function CuadroNombre($txtAncho,$Paterno,$Materno,$Nombres,$Full=0,$relleno){
			if($Full){
				$this->CuadroCuerpo($txtAncho,ucwords($Paterno." ".$Materno." ".$Nombres),$relleno);
			}else{
				$Nombre=array_shift(explode(" ",$Nombres));
				$this->CuadroCuerpo($txtAncho,ucwords($Paterno." ".$Materno." ".$Nombre),$relleno);
			}		
		}
		function Footer()
		{	global $lema;
			$this->SetAutoPageBreak(true,15);
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			// Arial italic 8
			$this->Fuente("I",8);
			// Número de página
			$this->Cell(176,0,"",1,1);
			$anio=date("Y");
			$this->Cell(176,4,utf8_decode($lema),0,1,"C");
			
			if(in_array("Pie",get_class_methods($this))){
				$this->Pie();	
			}
		}
	}
?>