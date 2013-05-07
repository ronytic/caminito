<?php
include_once("../../login/check.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/docente.php");
include_once("../../class/materias.php");
include_once("../../class/curso.php");
$docentemateriacurso=new docentemateriacurso;
$docente=new docente;
$curso=new curso;
$materias=new materias;
?>
<table class="tabla">
<tr class="cabecera"><td>Docente</td><td>Materia</td><td>Curso</td>
	<td>Trim.</td>
    </tr>
<?php
foreach($docentemateriacurso->mostrarTodo("Activo=1 ") as $dmc){
	$m=$materias->mostrarMateria($dmc['CodMateria']);
	$m=array_shift($m);
	$d=$docente->mostrarDocente($dmc['CodDocente']);
	$d=array_shift($d);
	$c=$curso->mostrarCurso($dmc['CodCurso']);
	$c=array_shift($c);
	?>
    <tr class="contenido">
    	<td><?php echo ucwords($d['Nombres']." ".$d['Paterno']." ".$d['Materno']);?></td>
        <td><?php echo $m['Nombre']?></td>
        <td><?php echo $c['Nombre']?></td>
        <td><?php echo $dmc['Trimestre']?></td>
        <td><a class="botonSec eliminar" rel="<?php echo $dmc['CodDocenteMateriaCurso']?>">X</a></td>
    </tr>
    <?php
}
?>
</table>