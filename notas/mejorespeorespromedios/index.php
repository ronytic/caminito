<?php
include_once("../../login/check.php");
$titulo="Mejores y Peores Promedios";
$folder="../../";
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="application/javascript" src="../../js/notas/mejorespeorespromedios.js"></script>
<?php
include_once("../../cabecera.php");
?>
<div class="container_12" id="cuerpo">
	<div class="grid_3">
		<div class="titulo corner-top">Configuración</div>    
        <div class="cuerpo">
      		<table>
            	<tr><td>Tipo Reporte:</td><td><select name="Orden">
                								<option value="1">Cuadro de Honor</option>
                                                <option value="0">Promedios Bajos</option>
                                              </select></td></tr>
                <tr><td>Notas de:</td><td><select name="Trimestre">
                								<option value="1">1º Trimestre</option>
                                                <option value="2">2º Trimestre</option>
                                                <option value="3">3º Trimestre</option>
                                                <!--<option value="1">1º Trimestre</option>-->
                							</select></td></tr>
                <tr><td>Alumnos por Curso:</td><td><input type="text" value="3" name="Cantidad" size="2"/></td></tr>
                <tr><td></td><td><input type="submit" value="Revisar" class="corner-all" id="revisar"/></td></tr>
            </table>
        </div>
	</div>
    <div class="grid_9">
    
        <div class="titulo corner-top">Reporte</div>    
        <div class="cuerpo" id="contenido">
		
		</div>
	</div>
    <div class="clear"></div>
</div>
<?php
include_once("../../footer.php");
?>

</body>
</html>