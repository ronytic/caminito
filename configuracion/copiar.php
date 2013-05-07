<?php
include_once("../class/rude.php");
include_once("../class/alumno.php");
$rude=new rude;
$alumno=new alumno;
for($i=1;$i<=13;$i++)
{

	foreach($rude->mostrarDatosAlumnos($i) as $al){
		
		$valuesAl=array(//'CodAlumno'=>"{$al['CodAlumno']}",
				'Paterno'=>"LOWER('{$al['Paterno']}')",
				'Materno'=>"LOWER('{$al['Materno']}')",
				'Nombres'=>"LOWER('{$al['Nombres']}')",
				'LugarNac'=>"LOWER('{$al['DepartamentoN']}')",
				//'Sexo'=>$al['Sexo'],
				'FechaNac'=>"'{$al['FechaNac']}'",
				'Ci'=>"'{$al['NumeroDoc']}'",
				'Zona'=>"LOWER('{$al['ZonaE']}')",
				'Calle'=>"LOWER('{$al['AvenidaE']}')",
				'Numero'=>"LOWER('{$al['NumeroE']}')",
				'TelefonoCasa'=>"'{$al['TelefonoE']}'",
				'Rude'=>"'{$al['CodigoRude']}'",
				'ApellidosPadre'=>"LOWER('{$al['ApellidosP']}')",
				'NombrePadre'=>"LOWER('{$al['NombresP']}')",
				'CiPadre'=>"'{$al['CedulaPadre']}'",
				'OcupPadre'=>"LOWER('{$al['OcupacionP']}')",
				'CelularP'=>"'{$al['TelfP']}'",
				'ApellidosMadre'=>"LOWER('{$al['ApellidosM']}')",
				'NombreMadre'=>"LOWER('{$al['NombresM']}')",
				'CiMadre'=>"'{$al['CedulaMadre']}'",
				'OcupMadre'=>"LOWER('{$al['OcupacionM']}')",
				'CelularM'=>"'{$al['TelfM']}'",
				'CodCurso'=>$al['NivelEstudiante'],
			);
			print_r($valuesAl);echo"<br>";
			$alumno->actualizarAlumno($valuesAl,$al['CodAlumno']);
	}
}
?>