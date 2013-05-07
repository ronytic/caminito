<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/cursomateriaexportar.php");
	include_once("../../class/curso.php");
	include_once("../../class/materias.php");
	$cursomateriaexportar=new cursomateriaexportar;
	$cur=new curso;
	$materias=new materias;
	$CodCurso=$_POST['CodCurso'];
	$Curso=$cur->mostrarCurso($CodCurso);
	$Curso=array_shift($Curso);
	?>
    Curso:<span class="resaltar"><?php echo $Curso['Nombre']?>.</span> Este el orden que aparecerá en los boletines. <br />
    Seleccione el Nombre Adecuado que saldrá en el boletín
    <table class="tabla"><tr class="cabecera"><td>Nº</td><td>Materias</td><td>Nombre Alterno 1</td><td>Nombre Alterno 2</td><td width="50">Acciones</td></tr>
	<?php
	$i=0;
	foreach($cursomateriaexportar->mostrarMaterias($CodCurso) as $matbol){
		$CodMatBol=$matbol['CodCursoMateriaExportar'];
		$materia=$materias->mostrarMateria($matbol['CodMateria']);
		$materia=array_shift($materia);
		$i++;
		?>
		<tr class="contenido">
        	<td><?php echo $i;?></td>
        	<td>
            	<?php
                if($matbol['CodMateria']==200)
				{
					echo "Materia Combinada";
				}else{
				?>
            	<!--<input type="radio" name="nombre<?php echo $CodMatBol;?>" value="1" class="opcion" rel="<?php echo $CodMatBol;?>" <?php echo $matbol['Alterno']==1?$ch:'';?> id="n<?php echo $CodMatBol;?>1"/>-->
                <label for="n<?php echo $CodMatBol;?>1"><?php echo $materia['Nombre'];?></label>
                <?php
				}
				?>
            </td>
            <td><a href="#" class="botonSec eliminar" rel="<?php echo $CodMatBol;?>">Eliminar</a></td></tr>
		<?php	
	}
	?></table><?php
}
?>