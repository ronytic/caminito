<?php
include_once("../../login/check.php");
$titulo="Nuevo Docente";
$folder="../../";
include_once("../../class/docente.php");
$docente=new docente;
$d=$docente->estadoTabla();
include_once("../../cabecerahtml.php");
include_once("../../cabecera.php");
?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Datos Docente</div>
        <div class="cuerpo">
        <form action="guardar.php" method="post">
        <table>
        	<tr><td>Matricula:</td><td><input type="text"  name="matricula" value="<?php echo $d['Auto_increment']?>" readonly="readonly"/></td></tr>
        	<tr><td>Nombres:</td><td><input type="text"  name="nombres" autofocus="autofocus" required="required" title="Nombre"/></td></tr>
            <tr><td>Paterno:</td><td><input type="text"  name="paterno" required="required"/></td></tr>
            <tr><td>Materno:</td><td><input type="text"  name="materno" required="required"/></td></tr>
        	<tr><td>Sexo:</td><td><select name="sexo" required="required"><option value="">Seleccione...</option>
            	<option value="1">Masculino</option><option value="0">Femenino</option>
            </select></td></tr>
            <tr><td>Teléfono:</td><td><input type="text"  name="celular"/></td></tr>
            <tr><td>Contraseña:</td><td><input type="text"  name="contrasena"/></td></tr>
            <tr><td></td><td><input type="submit" value="Guardar" class="corner-all"/></td></tr>
        </table>
        </form>
        </div>
    </div>
</div>
<?php include_once("../../footer.php");?>
