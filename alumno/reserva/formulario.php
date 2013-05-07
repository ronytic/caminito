<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	
	?>
    <label for="reserva">Reserva, Monto:</label>
    <input type="text" name="cantidad" value="0" id="montoreserva" class="der">
    <input type="submit" class="corner-all" value="guardar" id="guardar">
    <div id="listado"></div>
    <?php
}
?>