<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
if(!empty($_POST)){
	$al=new alumno;
	
	$cur=new curso;
	$CodAlumno=$_POST['CodAlumno'];	
	$CantidadTotal=$al->contarInscritosTotal();
	$CantidadTotal=$CantidadTotal[0];
	?>
    <table class="tabla">
    	<tr class="cabecera"><td>Cantidad Total de Inscritos</td></tr>
        <tr class="contenido"><td><?php echo $CantidadTotal['CantidadTotal'];?> Alumnos</td></tr>
    </table>
    <table class="tabla">
    	<tr class="cabecera"><td>Fechas</td><td>Cantidad Total</td></tr>
        <?php foreach($al->contarInscritoFechas() as $CantidadFechas){?>
        <tr class="contenido"><td><?php echo utf8_encode(strftime("%A, %d de %B del %Y",strtotime($CantidadFechas['FechaIns'])));?></td><td><?php echo $CantidadFechas['CantidadFecha'];?> Alumnos</td></tr>
        <?php
        }
		?>
    </table>
    <table class="tabla">
    	<tr class="cabecera"><td>Cursos</td><td>Cantidad Total</td><td>Varones</td><td>Mujeres</td></tr>
        <?php foreach($al->contarInscritoCurso() as $CantidadCurso){
				$var=$al->cantidadAlumno("Sexo=1 and CodCurso={$CantidadCurso['CodCurso']} and Retirado=0");
				$varones=array_shift($var);
				$muj=$al->cantidadAlumno("Sexo=0 and CodCurso={$CantidadCurso['CodCurso']} and Retirado=0");
				$mujeres=array_shift($muj);
				?>
        <tr class="contenido">
        	<td><?php  $cursos=array_shift($cur->mostrarCurso($CantidadCurso['CodCurso']));echo $cursos['Nombre'];?></td>
            <td><?php echo $CantidadCurso['CantidadCurso'];?> Alumnos</td>
			<td><?php echo $varones['Cantidad'];?> Alumnos</td>
            <td><?php echo $mujeres['Cantidad']?> Alumnas</td>
        </tr>
        <?php
        }
		?>
    </table>
    <div class="clear"></div>
    <?php
	
}

?>