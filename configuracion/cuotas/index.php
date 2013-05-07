<?php
session_start();
include_once("../../login/check.php");
include_once("../../config.php");

//header("Location:venta/rapida.php");
$titulo="Configuración Cuotas";
$folder="../../";
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript">
$(document).ready(function(e) {
    $(".fecha").datepicker({numberOfMonths: 3});
});
</script>
</head>
<body>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<form action="guardarCuotas.php" method="post">
	<div class="prefix_2 grid_4">
    	<div class="cuerpo">
        	<table>
            	<tr><td>Monto de Cuota Kinder</td><td>::</td><td><input type="text" name="MontoKinder" value="0" size="10"/>Bs.</td></tr>
                <tr><td>Monto de Cuota General</td><td>::</td><td><input type="text" name="MontoGeneral" value="0" size="10"/> Bs.</td></tr>
            </table>
        </div>
	</div>
    <div class="grid_4 suffix_2">
    	<table>
        	<tr><td>Fecha Limite de la 1º Cuota</td><td>::</td><td><input type="text" name="FechaCuota1" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 2º Cuota</td><td>::</td><td><input type="text" name="FechaCuota2" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 3º Cuota</td><td>::</td><td><input type="text" name="FechaCuota3" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 4º Cuota</td><td>::</td><td><input type="text" name="FechaCuota4" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 5º Cuota</td><td>::</td><td><input type="text" name="FechaCuota5" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 6º Cuota</td><td>::</td><td><input type="text" name="FechaCuota6" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 7º Cuota</td><td>::</td><td><input type="text" name="FechaCuota7" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 8º Cuota</td><td>::</td><td><input type="text" name="FechaCuota8" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 9º Cuota</td><td>::</td><td><input type="text" name="FechaCuota9" class="fecha" size="10"/></td></tr>
            <tr><td>Fecha Limite de la 10º Cuota</td><td>::</td><td><input type="text" name="FechaCuota10" class="fecha" size="10"/></td></tr>
        </table>
        	<input type="submit" value="Guardar Configuración" class="corner-all"/>
    </div>
    </form>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>