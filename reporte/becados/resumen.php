<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	?>
    	<iframe src="../../impresion/reporte/becados.php?CodCurso=<?php echo $CodCurso?>&lock=<?php echo md5("lock")?>" width="100%" height="600"></iframe>
    <?php
}
?>