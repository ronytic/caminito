<?php 
include_once '../../login/check.php';
if(!empty($_GET)){
	include_once '../../class/docentemateriacurso.php';
	include_once '../../class/notascualitativa.php';
	include_once '../../class/config.php';
	$docentemateriacurso=new docentemateriacurso;
	$notascualitativa=new notascualitativa;
	$config=new configuracion;
	$cnf=array_shift($config->mostrarConfig("TotalTrimestre"));
	$TotalTrimestre=$cnf['Valor'];
	$notascualitativa->vaciar();
	foreach ($docentemateriacurso->mostrarTodo("Activo=1") as $docmateriacurso) {
		for ($i=1; $i<=$TotalTrimestre ; $i++) { 
			$valores=array("Trimestre"=>$i,
							"CodDocenteMateriaCurso"=>$docmateriacurso['CodDocenteMateriaCurso']
							);
			$notascualitativa->insertar($valores);
		}
	}
	header("Location:../../");
}
 ?>