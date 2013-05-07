<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/reserva.php");
	$reserva=new reserva;
	$CodAlumno=$_POST['CodAlumno'];
	?>
	<table class="tabla">
    <tr class="cabecera"><td>Nº</td><td>Monto Reserva</td><td>Fecha Reserva</td></tr>
	<?php
	foreach($reserva->mostrarTodo("CodAlumno=$CodAlumno") as $r){$i++;
		?>
		    <tr class="contenido"><td><?php echo $i;?></td><td><?php echo $r['MontoReserva'];?></td><td><?php echo $r['FechaRegistro'];?></td><td><a href="#" class="botonSec corner-all" rel="<?php echo $r['CodReserva']?>">X</a></td></tr>
		<?php
	}
	?>
	</table>
	<?php
}
?>