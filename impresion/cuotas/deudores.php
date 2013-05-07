<?php 
include_once("../../login/check.php");
if(!empty($_GET) && $_GET['lock']==md5('lock')){
	$titulo="ALUMNOS CON MORA";
	include_once("../pdf.php");
	class PDF extends PPDF{
		function Cabecera(){
			global $DesdeT,$Desde,$CursoTexto,$Or;
			$this->CuadroCabecera(30,"Curso:",30,$CursoTexto['Nombre']);
			$this->CuadroCabecera(35,"Limite de Cuota:",40,$Or." ".$DesdeT);			
			$this->Pagina();
			$this->ln();
			$this->TituloCabecera(15,"Nº");
			$this->TituloCabecera(50,"Nombre Completo");
			if($Or=="<=")$des=0;else$des=1;
			for($i=1;$i<=$Desde-$des;$i++)
				$this->TituloCabecera(10,$i."º C");
			$this->TituloCabecera(10,"Total");
		}
	}
	
	include_once("../../class/cuota.php");
	include_once("../../class/alumno.php");
	include_once("../../class/curso.php");
	$cuota=new cuota;
	$alumno=new alumno;
	$curso=new curso;

	$Desde=$_GET['Cuota'];
	$CodCurso=$_GET['CodCurso'];
	$Or=$_GET['Orden'];
	switch($Desde){
		case 1:{$DesdeT="Primera";}break;
		case 2:{$DesdeT="Segunda";}break;
		case 3:{$DesdeT="Tercera";}break;
		case 4:{$DesdeT="Cuarta";}break;
		case 5:{$DesdeT="Quinta";}break;
		case 6:{$DesdeT="Sexta";}break;
		case 7:{$DesdeT="Septima";}break;
		case 8:{$DesdeT="Octava";}break;
		case 9:{$DesdeT="Novena";}break;
		case 10:{$DesdeT="Decima";}break;
	}
	
	$CursoTexto=array_shift($curso->mostrarCurso($CodCurso));
	
	$pdf=new PDF("P","mm","letter");//612,792
	$pdf->AddPage();
	$i=0;
	$MontoTotal=0;
	
	$alumnos=$alumno->mostrarAlumnos($CodCurso);
	foreach($alumnos as $al){
		$i++;
		$cuotas=$cuota->mostrarCuotasWhere("","*","CodAlumno=".$al['CodAlumno']." and Numero$Or$Desde","Numero");

		if(count($cuotas)<=$Desde){
			if($i%2==0){
				$relleno=1;
			}else{
				$relleno=0;
			}
				$pdf->CuadroCuerpo(15,$i,$relleno,"L");
				$pdf->CuadroNombre(50,$al['Paterno'],$al['Materno'],$al['Nombres'],0,$relleno);
				$cantidad=0;
				foreach($cuotas as $cuo){
					if($cuo['Cancelado']){
						$cantidad++;	
						$pdf->CuadroCuerpo(10,"Sí",$relleno,"C");
					}else{
						$pdf->CuadroCuerpo(10,"",$relleno,"C");
					}
				}
				$pdf->CuadroCuerpo(10,$cantidad,$relleno,"R");
			$pdf->ln();
		}
	}
	$pdf->Output();
}
?>