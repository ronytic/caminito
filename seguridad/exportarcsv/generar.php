<?php
include_once("../../login/check.php");
if(!empty($_GET)){
	extract($_GET);
	include_once("../../csv/csv.php");
	include_once("../../class/alumno.php");
	include_once("../../class/registronotas.php");
	include_once("../../class/casilleros.php");
	
	$alumno=new alumno;
	$casilleros=new casilleros;
	$registronotas=new registronotas;
	$fila=array();
	if($Numeracion=="si"){
		if($Cabecera=="si")
		$fila[]="N";	
	}
	if($Cabecera=="si")
		$fila[]="Apellidos y Nombres";
	
	if($Trimestre=="todo"){
		$cas1=array_shift($casilleros->mostrarMateriaCursoTrimestre($Materias,$CodCurso,1));
		$cas2=array_shift($casilleros->mostrarMateriaCursoTrimestre($Materias,$CodCurso,2));
		$cas3=array_shift($casilleros->mostrarMateriaCursoTrimestre($Materias,$CodCurso,3));
		if($Cabecera=="si"){
		$fila[]="Dps1";
		$fila[]="N1";
		$fila[]="Dps2";
		$fila[]="N2";
		$fila[]="Dps3";
		$fila[]="N3";
		$fila[]="Nota Final";}
	}else{
		$cas=array_shift($casilleros->mostrarMateriaCursoTrimestre($Materias,$CodCurso,$Trimestre));
		if($Cabecera=="si"){
		$fila[]="N".$Trimestre;
		$fila[]="Dps".$Trimestre;}
	}
	$datos=array();
	if($Cabecera=="si"){
		array_push($datos,$fila);
	}
	$i=0;
		foreach($alumno->mostrarAlumnos($CodCurso) as $al){$i++;
		$fila=array();
			if($Numeracion=="si"){
				$fila[]=$i;	
			}
			
			$fila[]=ucwords($al['Paterno'])." ".ucwords($al['Materno'])." ".ucwords($al['Nombres']);
			if($Trimestre=="todo"){
				$r1=array_shift($registronotas->mostrarRegistroNotas($cas1['CodCasilleros'],$al['CodAlumno'],1));
				$r2=array_shift($registronotas->mostrarRegistroNotas($cas2['CodCasilleros'],$al['CodAlumno'],2));
				$r3=array_shift($registronotas->mostrarRegistroNotas($cas3['CodCasilleros'],$al['CodAlumno'],3));
				$promedioAnual=number_format(($r1['NotaFinal']+$r2['NotaFinal']+$r3['NotaFinal'])/3,0);
				$fila[]=$r1['Dps'];
				$fila[]=$r1['NotaFinal'];
				$fila[]=$r2['Dps'];
				$fila[]=$r2['NotaFinal'];
				$fila[]=$r3['Dps'];
				$fila[]=$r3['NotaFinal'];
				$fila[]=$promedioAnual;
			}else{
				$r=array_shift($registronotas->mostrarRegistroNotas($cas['CodCasilleros'],$al['CodAlumno'],$Trimestre));
				$fila[]=$r['Dps'];
				$fila[]=$r['NotaFinal'];
			}
			
			array_push($datos,$fila);
		}
	
	
	archivocsv("reporte.csv",$datos,$Separador,stripslashes( $SeparadorFila));
}
?>