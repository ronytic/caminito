<?php
session_start();
include_once("../../login/check.php");
include_once("../../config.php");
include_once("../../class/tmp_alumno.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$alumnos=new tmp_alumno;
	?><ul><?php
	foreach($alumnos->mostrarAlumnos($CodCurso) as $al){
		?>
        <li class="alumnos"><a href="inscribir.php?CodAlumno=<?php echo $al['CodAlumno'];?>"><label class="lradio capitalizar"><?php echo $al['Paterno'];?> <?php echo $al['Materno'];?> <?php echo $al['Nombres'];?></label></a></li>
        <?php
	}
	?></ul><?php
}
?>