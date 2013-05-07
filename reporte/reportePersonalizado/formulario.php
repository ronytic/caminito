<?php
if(!empty($_POST)){
	?>
    Configuración del alumno
    <form action="" id="formulario">
    <table class="tabla">
    	<tr class="cabecera"><td>Campos</td><td>Opción</td></tr>
        <!--<tr><td>Sexo</td><td><select name="sexo">
        						<option value="2">Ambos Sexos</option>
                                <option value="1">Hombres</option>
                                <option value="0">Mujeres</option>
                            </select></td></tr>-->
        <tr><td>Campo 1</td><td><select name="campo1">
        						<option value="">Ninguno</option>
        						<option value="FechaNac">Fecha de Nac.</option>
                                <option value="Ci">CI</option>
                                <option value="TelefonoCasa">Telefono Casa</option>
                                <option value="Rude">Rude</option>
                                <option value="CelularP">Cel Padre</option>
								<option value="CelularM">Cel Madre</option>
								</select></td></tr>
         <tr><td>Campo 2</td><td><select name="campo2">
        						<option value="">Ninguno</option>
        						<option value="FechaNac">Fecha de Nac.</option>
                                <option value="Ci">CI</option>
                                <option value="TelefonoCasa">Telefono Casa</option>
                                <option value="Rude">Rude</option>
                                <option value="CelularP">Cel Padre</option>
								<option value="CelularM">Cel Madre</option>
								</select></td></tr>
          <tr><td>Dibujar Borde:</td><td><input type="checkbox" name="borde"/></td></tr>
          <tr><td>Dibujar Sombreado:</td><td><input type="checkbox" name="sombreado" checked="checked"/></td></tr>
          <tr><td>Solo Casillas en Blanco:</td><td><input type="checkbox" name="blanco"/>
          					<select name="cantidad">
        						<option value="1">1</option>
        						<option value="2">2</option>
                                <option value="3">3</option>
								</select></td></tr>     
          
        <tr><td></td><td><input type="submit" value="Ver Reporte" class="corner-all"/> </td></tr>
    </table>
    </form>
    <?php
}
?>