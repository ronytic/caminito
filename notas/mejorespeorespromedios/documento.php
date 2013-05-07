<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	?>
    <iframe src="../../impresion/notas/mejorespeorespromedios.php?Cantidad=<?php echo $_POST['Cantidad']?>&Trimestre=<?php echo  $_POST['Trimestre']?>&Orden=<?php echo $_POST['Orden']?>&lock=dce7c4174ce9323904a934a486c41288
" width="690" height="750"></iframe>
    <?php	
}
?>