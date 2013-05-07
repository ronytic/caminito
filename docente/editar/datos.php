<?php 
include_once '../../login/check.php';
include_once '../../class/docente.php';
$folder="../../";
$CodDocente=$_POST['CodDocente'];
$titulo="Ver Datos del docente";
$docente=new docente;
$doc=$docente->mostrar($CodDocente);
$doc=array_shift($doc);
include_once '../../cabecerahtml.php';
 ?>
 <?php include_once '../../cabecera.php'; ?>
 <div class="container_12" id="cuerpo">
 	<div class="grid_6">
 		<div class="titulo corner-top">Datos del Docente</div>
 		<div class="cuerpo">
 			<form action="guardar.php" method="post">
        <table class="tablareg">
        	<tr><td>Matricula:</td><td><input type="text"  name="matricula" value="<?php echo $doc['CodDocente']?>" readonly="readonly"/></td></tr>
        	<tr><td>Nombres:</td><td><input type="text"  name="nombres" autofocus="autofocus" required="required" title="Nombre" value="<?php echo $doc['Nombres']?>"/></td></tr>
            <tr><td>Paterno:</td><td><input type="text"  name="paterno" required="required" value="<?php echo $doc['Paterno']?>"/></td></tr>
            <tr><td>Materno:</td><td><input type="text"  name="materno" required="required" value="<?php echo $doc['Materno']?>"/></td></tr>
        	<tr><td>Sexo:</td><td><select name="sexo" required="required"><option value="">Seleccione...</option>
            	<option value="1" <?php echo $doc['Sexo']?'selected="selected"':'';?>>Masculino</option><option value="0" <?php echo !$doc['Sexo']?'selected="selected"':'';?>>Femenino</option>
            </select></td></tr>
            <tr><td>Teléfono:</td><td><input type="text"  name="celular" value="<?php echo $doc['Celular']?>"/></td></tr>
            <tr><td>Usuario:</td><td><?php echo $doc['Usuario']?></td></tr>
            <tr><td>Contraseña:</td><td><input type="text"  name="contrasena" value="<?php echo $doc['Password']?>"/></td></tr>
            <tr><td>Activo:</td><td><select name="activo" required="required"><option value="">Seleccione...</option>
            	<option value="1" <?php echo $doc['Activo']?'selected="selected"':'';?>>Activo</option><option value="0" <?php echo !$doc['Activo']?'selected="selected"':'';?>>Desactivado</option>
            </select></td></tr>
            <tr><td></td><td><input type="submit" value="Actualizar" class="corner-all"/></td></tr>
        </table>
        </form>
 		</div>
 		
 	</div>
 	<div class="clear"></div>
 </div>
 <?php include_once '../../footer.php'; ?>