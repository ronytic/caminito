<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/docentemateriacurso.php");
	include_once("../../class/alumno.php");
	include_once("../../class/notascualitativa.php");
	$docentemateriacurso=new docentemateriacurso;
	$alumno=new alumno;
	$notascualitativa=new notascualitativa;
	$CodDocente=$_POST['CodDocente'];
	$CodMateria=$_POST['CodMateria'];
	$CodCurso=$_POST['CodCurso'];
	for($i=1;$i<=3;$i++){
	$datos=$docentemateriacurso->estadodetabla();
	$Codigo=$datos['Auto_increment'];
	$valores=array(
				'CodDocenteMateriaCurso'=>$Codigo,
				'CodDocente'=>$CodDocente,
				'CodMateria'=>$CodMateria,
				'CodCurso'=>$CodCurso,
				'Trimestre'=>$i,
				'Activo'=>1,
				'SexoAlumno'=>2
				);
		$docentemateriacurso->insertar($valores);
		foreach($alumno->mostrarDatosAlumnos($CodCurso) as $al){
			$valorescuali=array(
							'CodDocenteMateriaCurso'=>$Codigo,
							'Trimestre'=>$i,
							'CodAlumno'=>$al['CodAlumno'],
							//'Valor'=>''
						);
						print_r($valorescuali);
			$notascualitativa->insertar($valorescuali);	
		}
	
	}
}
?>