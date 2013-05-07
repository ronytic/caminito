<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
if(!empty($_POST)){
	$config=new configuracion;
	$cnf=array_shift($config->mostrarConfig("TotalTrimestre"));
	$TotalTrimestre=$cnf['Valor'];
	?>
    <label for="cabeceralista">Cabecera</label><select id="cabeceralista" name="cabeceralista"><option value="no" selected="selected">No</option><option value="si">Si</option></select>
    <label for="separador">Separador de columna</label><input type="text" name="separador" id="separador" value="," size="2" autofocus="autofocus"/>
    <label for="separadorfila">Separador de fila</label><input type="text" name="separadorfila" id="separadorfila" value="AUTO" class="nocap"/>"AUTO" Salto de linea
    <hr />
    <label for="numeracion">Numeración</label>
    <select name="numeracion" id="numeracion">
    	<option value="si">Si</option>
        <option value="no">No</option>
    </select>
    <!--<label for="materias">Materias</label>
    <select name="materias" id="materias"></select>-->
    <label for="separadormateria">Separador de Materia</label>
    <input name="separadormateria" id="separadormateria" size="3" type="text"/>
    
    <label for="separadorestadisticas">Separador de Estadisticas</label>
    <input name="separadorestadisticas" id="separadorestadisticas" size="3" type="text"/>
    
    <label for="trimestre">Trimestre:</label>
    <select name="Trimestre" id="trimestre">
    	<?php
		for($i=1;$i<=$TotalTrimestre;$i++){
			?><option value="<?php echo $i;?>"><?php echo $i;?></option><?php
		}
		?>
        <option value="todo" selected>Todos los Trimestres</option>
    </select>
    <input type="submit" class="corner-all" value="Generar" id="generar">
    <?php
}
?>