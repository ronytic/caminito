<?php
session_start();
include_once("../../login/check.php");
include_once("../../class/config.php");
include_once("../../class/alumno.php");
include_once("../../class/casilleros.php");
include_once("../../class/curso.php");
include_once("../fn.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$CodMateria=$_POST['CodMateria'];
	$CodDocente=$_SESSION['CodDocente'];
	$CodTrimestre=$_POST['Trimestre'];
	$casilleros=new casilleros;
	$config=new configuracion;
	$curso=new curso;
	$cur=array_shift($curso->mostrarCurso($CodCurso));
	$casillas=array_shift($casilleros->mostrarDocenteMateriaCursoTrimestre($CodDocente,$CodMateria,$CodCurso,$CodTrimestre));
	$CodCasilleros=$casillas['CodCasilleros'];
	$numcasilleros=$casillas['Casilleros'];
	?>
    <!--<div style="display:inline-block;">-->
    <div class="cuerpo">Curso: <span class="resaltar"><?php echo $cur['Nombre']?> </span> | Trimestre: <span class="resaltar"><?php echo $CodTrimestre?></span>
    </div>
    	<span class="resaltar">Ejemplo:</span> Trabajo Práctico, Carpeta, Laboratorio, Examén Final
        <hr />
        <input type="hidden" value="<?php echo $CodCasilleros?>" name="CodCasilleros" />
	<table class="tabla" style="display:inline-block;overflow-x:visible; margin-bottom:36px;vertical-align:top">
		<tr class="cabecera"><td>Nº</td><td>Nombres</td></tr>
       
        	<?php for($i=1;$i<=$numcasilleros;$i++){$na++;?>
            <tr>
            <td><?php echo $na;?></td>
     		<td><input type="text" value="<?php echo $casillas['NombreCasilla'.$i];?>" name="NombreCasilla<?php echo $i?>" class="nombre"/></td>
            </tr>
     		<?php }?>
	<?php
	
	

	?> 
    </table>
    <input type="submit" value="Cambiar Nombres" class="corner-all" id="guardarNombre"/>
    
    <hr />
	
	<?php
}
?>