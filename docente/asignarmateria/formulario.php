<?php
if(!empty($_POST['CodDocente'])){
	include_once("../../class/materias.php");
	include_once("../../class/curso.php");
	include_once("../../class/docentemateriacurso.php");
    include_once("../../class/config.php");
	$CodDocente=$_POST['CodDocente'];
    $config=new configuracion;
    $cnf=array_shift($config->mostrarConfig("TrimestreActual"));
    $trimestre=$cnf['Valor'];
	$materias=new materias;
	$curso=new curso;
	$docentemateriacurso=new docentemateriacurso;
	$docmateriaCurso=array_shift($docentemateriacurso->mostrarDocenteGrupo($CodDocente,"SexoAlumno"));
	?>
    <table class="tabla">
    	<tr><td>Curso</td></tr>
        <tr class="contenido">
        	<td><select name="curso">
			<?php
                foreach($curso->mostrar() as $c){
                    ?>
                    <option value="<?php echo $c['CodCurso']?>"><?php echo $c['Nombre']?></option>
                    <?php
                }
            ?></select>
            </td>
        </tr>
        <tr><td>Materias</td></tr>
        <tr class="contenido">
        	<td>
        	<select name="materia">
			<?php
                foreach($materias->mostrarMaterias() as $m){
                    ?>
                    <option value="<?php echo $m['CodMateria']?>"><?php echo $m['Nombre']?></option>
                    <?php
                }
            ?></select>
        	</td>
        </tr>
        <tr><td><input type="submit" value="Guardar" class="corner-all guardar"></td></tr>
    </table>
    <?php
}
?>