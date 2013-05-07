<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/notasinicial.php");
	$notasinicial=new notasinicial;
	
	$CodAlumno= $_POST['CodAlumno'];
	
	$CodCurso=$_POST['CodCurso'];
	$ni=$notasinicial->mostrarAlumno($CodAlumno);
	$ni=array_shift($ni);
	if(count($ni)){
	?>
    <input type="hidden" name="cod" id="cod" value="<?php echo $ni['CodNotasInicial']?>"/>
   <label for="evaluaciondiagnostica">Evaluación Diagnostica</label><br />
   <textarea id="evaluaciondiagnostica" cols="50" rows="3"><?php echo $ni['ValorInicial']?></textarea>
   <hr />
   <label for="informefinal">Informe Final de Aprendizaje</label><br />
   <textarea id="informefinal" cols="50" rows="3"><?php echo $ni['ValorFinal']?></textarea>
   <hr />
   <a class="boton" id="guardar">Guardar Evaluación</a>
   <?php
	}else{
		echo "No esta Registrado la Evaluación";	
	}
}
?>