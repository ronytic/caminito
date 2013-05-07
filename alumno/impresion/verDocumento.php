<?php
session_start();
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodAlumno=$_POST['CodAlumno'];
	?>
    	<span class="resaltar">La separación de varios datos se lo realiza con el "/" (shif+7)(Símbolo Dividido)</span>
    	<form action="../../impresion/alumno/tarjetaDeCuotas.php" method="get" target="pdf">
        	<input type="hidden" name="CodAlumno" value="<?php echo $CodAlumno;?>"/>
        	<table>
            	<tr><td>Nombres Adicionales:</td><td><input type="text" name="NombresAdicional"/></td></tr>
                <tr><td>Cursos Adicionales:</td><td><input type="text" name="CursosAdicional"/></td><td><input type="submit" value="Adicionar" class="corner-all"/></td></tr>
            </table>
            
            
        </form>
    	
    	<iframe src="../../impresion/alumno/tarjetaDeCuotas.php?CodAlumno=<?php echo $CodAlumno;?>" height="300" width="450" name="pdf"></iframe>
	<?php	
}
?>