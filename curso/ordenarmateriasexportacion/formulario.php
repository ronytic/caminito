<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/materias.php");
	$materias=new materias;
	$materiasAll=$materias->mostrarMaterias("noall")
	?><select name="materias" size="<?php echo count($materiasAll)+1;?>"><?php 	
		foreach($materiasAll as $ma){
		?>
        	<option value="<?php echo $ma['CodMateria']?>"><?php echo $ma['Nombre']?></option>
			
		<?php	
	}
	
	?>
    	<option value="200">Materia Combinada</option>
    </select><hr />
		<input type="submit" id="guardar" class="corner-all" value="Añadir >>"/>
	<?php 
}
?>