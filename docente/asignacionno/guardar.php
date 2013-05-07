<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/config.php");
	include_once("../../class/alumno.php");
	include_once("../../class/casilleros.php");
	include_once("../../class/docentemateriacurso.php");
	include_once("../../class/registronotas.php");
	$alumno=new alumno;
	$casilleros=new casilleros;
	$config=new configuracion;
	$docentemateriacurso=new docentemateriacurso;
	$cnf=array_shift($config->mostrarConfig("TrimestreActual"));
	$trimestre=$cnf['Valor'];
	$casillas=$casilleros->estadoTabla();
	//$docM=array_shift($docM);
	$registroNotas=new registronotas;
	$CodDocente=$_POST['CodDocente'];
	$CodMateria=$_POST['CodMateria'];
	$CodCurso=$_POST['CodCurso'];
	$SexoAlumno=$_POST['SexoAlumno'];
	$Casillas=$_POST['Casillas'];
	$Formula=$_POST['Formula'];
	$Dps=$_POST['Dps'];
	$Tope=$_POST['Tope'];
	//print_r($docM);
	$docmateriacurso=array_shift($docentemateriacurso->mostrarDocenteMateriaCursoSexo($CodDocente,$CodMateria,$CodCurso,$SexoAlumno));
	$CodCasilleros=$casillas['Auto_increment'];
	//echo "<br>$CodDocenteMateria<br>";
	$valDM=array('CodCasilleros'=>$CodCasilleros,
				'CodDocenteMateriaCurso'=>$docmateriacurso['CodDocenteMateriaCurso'],
				'Casilleros'=>$Casillas,
				'Trimestre'=>$trimestre,
				'FormulaCalificaciones'=>"'$Formula'",
				'Dps'=>$Dps
				);
	for($i=1;$i<=15;$i++){
		if($i<=$Casillas){
			$valDM['NombreCasilla'.$i]="'Casilla $i'";
			$valDM['LimiteCasilla'.$i]=$Tope;
		}else{
			$valDM['NombreCasilla'.$i]="'Casilla $i'";
			$valDM['LimiteCasilla'.$i]=0;
		}
	}
	$casilleros->insertar($valDM);
	//print_r($valDM);
	//print_r($valDM);
	foreach($alumno->mostrarAlumnosCurso($CodCurso,$SexoAlumno) as $al){
		$valRN=array('CodRegistroNotas'=>'NULL',
					'CodCasilleros'=>$CodCasilleros,
					'CodAlumno'=>$al['CodAlumno'],
					'Trimestre'=>$trimestre,
					);
		for($i=1;$i<=15;$i++){
			$valRN['Nota'.$i]=0;	
		}
//		print_r($valRN);
		$valRN['Resultado']=0;
		$valRN['Dps']=0;
		$valRN['NotaFinal']=0;
		$registroNotas->insertar($valRN);
	}
	//print_r($_POST);
	echo "Los Casilleros se han registrado Correctamente";
}
?>