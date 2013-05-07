<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$Trimestre=$_POST['Trimestre'];
	?>
    <a href="../../impresion/notas/centralizadortrimestral.php?CodCurso=<?php echo $CodCurso;?>&Trimestre=<?php echo $Trimestre;?>&mf=<?php echo md5("lock")?>" class="boton corner-all">Centralizador Trimestral en Grande</a>
    <hr />
    <iframe width="750" height="600" src="../../impresion/notas/centralizadortrimestral.php?CodCurso=<?php echo $CodCurso;?>&Trimestre=<?php echo $Trimestre;?>&mf=<?php echo md5("lock")?>"></iframe>
    <?php
}
?>