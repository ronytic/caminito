<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
$titulo="Configuración de Sistema";
$folder="../../";
$config=new configuracion;
//Cuotas
$cnf=array_shift($config->mostrarConfig("MontoKinder"));
$MontoKinder=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("MontoGeneral"));
$MontoGeneral=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("NumeroCuotas"));
$NumeroCuotas=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota1"));
$FechaCuota1=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota2"));
$FechaCuota2=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota3"));
$FechaCuota3=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota4"));
$FechaCuota4=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota5"));
$FechaCuota5=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota6"));
$FechaCuota6=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota7"));
$FechaCuota7=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota8"));
$FechaCuota8=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota9"));
$FechaCuota9=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota10"));
$FechaCuota10=$cnf['Valor'];
//Boletin
$cnf=array_shift($config->mostrarConfig("BoletinPosicion1X"));
$boletin1x=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("BoletinPosicion1Y"));
$boletin1y=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("BoletinPosicion2X"));
$boletin2x=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("BoletinPosicion2Y"));
$boletin2y=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("BoletinPosicion3X"));
$boletin3x=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("BoletinPosicion3Y"));
$boletin3y=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("BoletinPosicion4X"));
$boletin4x=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("BoletinPosicion4Y"));
$boletin4y=$cnf['Valor'];
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript">
$(document).ready(function(e) {
    $(".fecha").datepicker({numberOfMonths: 3});
});
</script>
<?php include_once($folder."cabecera.php");?>

<div class="container_12" id="cuerpo">
	
	<div class="grid_4">
    	<div class="titulo corner-top">Configurar Cuotas</div>
    	<div class="cuerpo">
        <form action="guardarcuotas.php" method="post">
        	<table>
            	<tr><td>Monto de Cuota Kinder</td><td><input type="text" name="MontoKinder" size="7" class="der" value="<?php echo $MontoKinder?>"/>Bs.</td></tr>
                <tr><td>Monto de Cuota General</td><td><input type="text" name="MontoGeneral" value="<?php echo $MontoGeneral?>" size="7" class="der"/>Bs.</td></tr>
                <tr><td>Fecha Limite de la 1º Cuota</td><td><input type="text" name="FechaCuota1" class="fecha der" size="10" value="<?php echo $FechaCuota1;?>"/></td></tr>
                <tr><td>Fecha Limite de la 2º Cuota</td><td><input type="text" name="FechaCuota2" class="fecha der" size="10" value="<?php echo $FechaCuota2;?>"/></td></tr>
                <tr><td>Fecha Limite de la 3º Cuota</td><td><input type="text" name="FechaCuota3" class="fecha der" size="10" value="<?php echo $FechaCuota3;?>"/></td></tr>
                <tr><td>Fecha Limite de la 4º Cuota</td><td><input type="text" name="FechaCuota4" class="fecha der" size="10" value="<?php echo $FechaCuota4;?>"/></td></tr>
                <tr><td>Fecha Limite de la 5º Cuota</td><td><input type="text" name="FechaCuota5" class="fecha der" size="10" value="<?php echo $FechaCuota5;?>"/></td></tr>
                <tr><td>Fecha Limite de la 6º Cuota</td><td><input type="text" name="FechaCuota6" class="fecha der" size="10" value="<?php echo $FechaCuota6;?>"/></td></tr>
                <tr><td>Fecha Limite de la 7º Cuota</td><td><input type="text" name="FechaCuota7" class="fecha der" size="10" value="<?php echo $FechaCuota7;?>"/></td></tr>
                <tr><td>Fecha Limite de la 8º Cuota</td><td><input type="text" name="FechaCuota8" class="fecha der" size="10" value="<?php echo $FechaCuota8;?>"/></td></tr>
                <tr><td>Fecha Limite de la 9º Cuota</td><td><input type="text" name="FechaCuota9" class="fecha der" size="10" value="<?php echo $FechaCuota9;?>"/></td></tr>
                <tr><td>Fecha Limite de la 10º Cuota</td><td><input type="text" name="FechaCuota10" class="fecha der" size="10" value="<?php echo $FechaCuota10;?>"/></td></tr>
                <tr><td></td><td><!--<input type="submit" value="Guardar Cuotas" class="corner-all" disabled="disabled" />--></td></tr>
            </table>
            </form>
        </div>
        <div class="titulo corner-top">Configurar Posicion Boletín<a name"boletin" id="boletin"></a></div>
    	<div class="cuerpo">

        <div class="centrar">
            <img src="../../images/configuracion/posicionboletin.jpg" alt="Posiciones del Boletín">
            <hr />
            <span class="">Los valores para la posición por defecto es de 0.</span>
            </div>
        <form action="guardarposicion.php" method="post">
        	<table class="tabla">
            	<tr><td>Posición 1</td><td>X:<input type="text" name="boletin1x" size="5" class="der" value="<?php echo $boletin1x?>"/>→ Y:<input type="text" name="boletin1y" size="5" class="der" value="<?php echo $boletin1y?>"/>↓</td></tr>
                <tr><td>Posición 2</td><td>X:<input type="text" name="boletin2x" size="5" class="der" value="<?php echo $boletin2x?>"/>→ Y:<input type="text" name="boletin2y" size="5" class="der" value="<?php echo $boletin2y?>"/>↓</td></tr>
               	<tr><td>Posición 3</td><td>X:<input type="text" name="boletin3x" size="5" class="der" value="<?php echo $boletin3x?>"/>→ Y:<input type="text" name="boletin3y" size="5" class="der" value="<?php echo $boletin3y?>"/>↓</td></tr>
                <tr><td>Posición 4</td><td>X:<input type="text" name="boletin4x" size="5" class="der" value="<?php echo $boletin4x?>"/>→ Y:<input name="boletin4y" type="text" class="der" value="<?php echo $boletin4y?>" size="5"/>↓</td></tr>
                <tr><td></td><td><input type="submit" value="Guardar Posición" class="corner-all"/></td></tr>
            </table>
            </form>
        </div>
	</div>
    <div class="grid_4 suffix_2">
    	<table>
        	
        </table>
        	
    </div>
    
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>