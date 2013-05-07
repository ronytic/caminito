<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
include_once("../../class/cuota.php");
if(!empty($_POST['CodAlumno'])){
	$CodAlumno=$_POST['CodAlumno'];
	$CodCurso=$_POST['CodCurso'];
	$al=new alumno;
	$curso=new curso;
	$cuo=new cuota;
	$alumnos=$al->mostrarDatos($CodAlumno);
	$alumnos=$alumnos[0];
	$c=$curso->mostrarCurso($CodCurso);
	$c=array_shift($c);
	?>
	<table class="tablaA">
    	<tr><td>Nombre del Alumno</td><td>::</td><td colspan="4" class="resaltar capitalizar"><?php echo $alumnos['Paterno'];?> <?php echo $alumnos['Materno'];?> <?php echo $alumnos['Nombres'];?></td></tr>
        <tr><td>Monto a Pagar</td><td>::</td><td class="resaltar"><?php echo $c['MontoCuota'];?> Bs</td><td>Descuento</td><td>::</td><td class="resaltar"><?php echo $alumnos['MontoBeca'];?> Bs</td></tr>
        <tr><td>NIT</td><td>::</td><td class="resaltar"><?php echo $alumnos['Nit'];?></td><td>Facturar A</td><td>::</td><td class="resaltar capitalizar"><?php echo $alumnos['FacturaA'];?></td></tr>
        
    </table>
    <table class="tabla">
    	<tr class="cabecera"><td>Nº</td><td>A Pagar</td><td>Factura</td><td>Estado</td><td>Observaciones</td><td>Fecha</td></tr>
        <?php foreach($cuo->mostrarCuotas($CodAlumno) as $cuotas){
			?>
            <tr id="tr<?php echo $cuotas['CodCuota']?>" class="contenido <?php echo $cuotas['Cancelado']?'verde':'';?>">
            	<td><?php echo $cuotas['Numero']?></td>
                <td><?php echo $cuotas['MontoPagar']?> Bs</td>
                <td><input type="text" value="<?php echo $cuotas['Factura']?>" size="4" id="f<?php echo $cuotas['CodCuota'];?>" class="ku" rel="<?php echo $cuotas['CodCuota'];?>"/></td>
                <td>
                	<input type="checkbox" id="c<?php echo $cuotas['CodCuota']?>" <?php echo $cuotas['Cancelado']?'checked="checked"':'';?> rel="<?php echo $cuotas['CodCuota']?>" class="cuotas"/>
                    <label class="msg" for="c<?php echo $cuotas['CodCuota']?>"><?php echo $cuotas['Cancelado']?"Cancelado":"Pendiente";?></label></td>
                <td><input type="text" value="<?php echo $cuotas['Observaciones']?>" size="10" id="o<?php echo $cuotas['CodCuota'];?>"/ class="ku" rel="<?php echo $cuotas['CodCuota'];?>"></td>
				<td><input type="text" value="<?php if($cuotas['Cancelado'])echo date("d-m-Y",strtotime($cuotas['Fecha']));else echo date("d-m-Y");?>" size="6" id="fe<?php echo $cuotas['CodCuota'];?>"/ class="ku fechass" rel="<?php echo $cuotas['CodCuota'];?>"></td>
            </tr>
            <?php	
		}?>
    </table>
	<?php
}else{
	?>
    No existen Alumnos Inscritos en este Curso
    <?php	
}
?>