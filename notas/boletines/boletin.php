<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodAlumno= $_POST['CodAlumno'];
	$CodCurso=$_POST['CodCurso'];
	?>
   
    <a href="../../impresion/notas/boletin.php?CodAlumno=<?php echo $CodAlumno;?>&CodCurso=<?php echo $CodCurso;?>&mf=<?php echo md5("lock")?>" class="boton corner-all">Boletin en grande</a> <a href="#" class="botonSec" id="registrarimpresion">Registrar Impresión</a>
    <hr />
    <iframe width="450" height="600" src="../../impresion/notas/boletin.php?CodAlumno=<?php echo $CodAlumno;?>&CodCurso=<?php echo $CodCurso;?>&mf=<?php echo md5("lock")?>"></iframe>
    <div id="respuestaimpresiones"></div>
    <?php
}
?>