<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodAlumno= $_POST['CodAlumno'];
	$CodCurso=$_POST['CodCurso'];
	
	$archivo="verboletin.php?CodAlumno=".$CodAlumno."&CodCurso=".$CodCurso."&mf=".md5("lock")."&Bimestre=1";
	?>
   	<a href="<?php echo $archivo?>&Bimestre=1" class="botonSec" target="flotante">1º de Bimestre</a>
    <a href="<?php echo $archivo?>&Bimestre=2" class="botonSec" target="flotante">2º de Bimestre</a>
    <a href="<?php echo $archivo?>&Bimestre=3" class="botonSec" target="flotante">3º de Bimestre</a>
    <hr>
    <!--<a href="">4º de Bimestre</a>-->

    <iframe width="450" height="600" src="<?php echo $archivo?>" name="flotante"></iframe>
    <div id="respuestaimpresiones"></div>
    <?php
}
?>