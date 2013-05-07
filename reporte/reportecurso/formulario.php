<?php
if(!empty($_POST)){
	?>
    Configuración del alumno
    <form action="" id="formulario">
    <table class="tabla">
    	<tr class="cabecera"><td>Campos</td><td>Opción</td></tr>
        <tr><td>Sexo</td><td><select name="sexo">
        						<option value="2">Ambos Sexos</option>
                                <option value="1">Hombres</option>
                                <option value="0">Mujeres</option>
                            </select></td></tr>
        <tr><td></td><td><input type="submit" value="Ver Reporte" class="corner-all"/> </td></tr>
    </table>
    </form>
    <?php
}
?>