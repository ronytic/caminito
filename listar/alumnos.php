<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../class/alumno.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$alumnos=new alumno;
	?><ul><?php
	foreach($alumnos->mostrarAlumnos($CodCurso) as $al){
		?>
        <li class="alumnos"><input type="radio" name="Alumno" value="<?php echo $al['CodAlumno'];?>" id="alumno<?php echo $al['CodAlumno'];?>" class="radio"/><label class="lradio capitalizar" for="alumno<?php echo $al['CodAlumno'];?>"><?php echo $al['Paterno'];?> <?php echo $al['Materno'];?> <?php echo $al['Nombres'];?></label></li>
        <?php
	}
	?></ul><?php
}
?>