<?php
include_once("../../login/check.php");
$titulo="Arqueo de Caja";
$folder="../../";
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/cuotas/arqueo.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function(e) {
    
});
</script>
</head>
<body>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
<div class="grid_3">
	<div class="titulo corner-top">Configuración</div>
    <div class="cuerpo">
    	<table>
        	<tr class="contenido"><td>Por::</td><td><select name="Tipo"><option value="Fecha">Fecha</option><option value="Factura">Factura</option></select></td></tr>
        	<tr class="fecha"><td>Desde::</td><td><input type="text" size="15" name="DesdeFecha" id="DesdeFecha" class="der" value="<?php echo date("d-m-Y")?>"/></td></tr>
            <tr class="fecha"><td>Hasta::</td><td><input type="text" size="15" name="HastaFecha" id="HastaFecha" value="<?php echo date("d-m-Y")?>" class="der"/></td></tr>
            <tr class="factura oculto"><td>Desde::</td><td><input type="text" size="15" name="DesdeFactura" id="DesdeFactura" class="der"/></td></tr>
            <tr class="factura oculto"><td>Hasta::</td><td><input type="text" size="15" name="HastaFactura" id="HastaFactura" value="" class="der"/></td></tr>
            <tr><td></td><td><input type="submit" value="Revisar" class="corner-all" id="guardar"/></td></tr>
        </table>
    </div>
</div>
<div class="grid_9">
	<div class="titulo corner-top">Reporte</div>
    <div id="resultado" class="cuerpo"></div>
</div>
<div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>