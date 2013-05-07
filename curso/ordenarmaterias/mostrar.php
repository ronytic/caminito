<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/cursomateria.php");
	include_once("../../class/curso.php");
	include_once("../../class/materias.php");
	$cursomateria=new cursomateria;
	$cur=new curso;
	$materias=new materias;
	$CodCurso=$_POST['CodCurso'];
	$Curso=$cur->mostrarCurso($CodCurso);
	$Curso=array_shift($Curso);
	?>
    Curso:<span class="resaltar"><?php echo $Curso['Nombre']?>.</span> Este el orden que aparecerá en los boletines y Exportación de Archivo<br />
    Seleccione el Nombre Adecuado que saldrá en el boletín
    <table class="tabla"><tr class="cabecera"><td>Nº</td><td>Materias</td><td>Nombre Alterno 1</td><td>Nombre Alterno 2</td><td width="50">Acciones</td></tr>
	<?php
	$i=0;
	foreach($cursomateria->mostrarMaterias($CodCurso) as $matbol){
		$CodMatBol=$matbol['CodCursoMateria'];
		$materia=array_shift($materias->mostrarMateria($matbol['CodMateria']));
		switch($matbol["Alterno"]){
			case 1:{$nombremateria=$materia['Nombre'];}break;
			case 2:{$nombremateria=$materia['NombreAlterno1'];}break;
			case 3:{$nombremateria=$materia['NombreAlterno2'];}break;
		}
		
		$i++;
		$ch='checked="checked"';
		?>
		<tr class="contenido">
        	<td><?php echo $i;?></td>
        	<td><?php echo $nombremateria?></td>
            <td><input type="text" value="<?php echo $matbol['Orden']?>" size="2" class="der cuadroorden" rel="<?php echo $CodMatBol?>"/></td>
            <td><input type="checkbox"  id="e<?php echo $CodMatBol?>"/><label for="e<?php echo $CodMatBol?>">Exportar</label></td>
		</tr>
		<?php	
	}
	?></table><?php
}
?>