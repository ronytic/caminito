<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodAlumno=$_POST['CodAlumno'];
	include_once("../../class/documentosimpresos.php");
	$documentosimpresos=new documentosimpresos;
	?><table class="tabla">
        	<tr class="cabecera"><td>Impresión</td><td>Fecha</td><td>Hora</td><td></td></tr>
    <?php
	foreach($documentosimpresos->mostrarDocumentosImpresos("Boletin",$CodAlumno) as $docimpreso){
	?>
    	<tr><td><?php echo $docimpreso['TipoDocumento']?></td><td><?php echo date("d-m-Y",strtotime($docimpreso['FechaRegistro']))?></td><td><?php echo $docimpreso['HoraRegistro']?></td><td><a href="#" class="botonSec eliminar" rel="<?php echo $docimpreso['CodDocumentosImpresos']?>">Eliminar</a></td></tr>
    <?php	
	}
	?>
    </table>
    <?php
}
?>