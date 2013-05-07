<?php
session_start();
include_once("../../login/check.php");
include_once("../../class/config.php");
include_once("../../class/alumno.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/notascualitativa.php");
include_once("../../class/curso.php");
include_once("../fn.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$CodMateria=$_POST['CodMateria'];
	$CodDocente=$_SESSION['CodDocente'];
	$CodTrimestre=$_POST['Trimestre'];
	$alumnos=new alumno;
	$docentemateriacurso=new docentemateriacurso;
	$notascualitativa=new notascualitativa;
	$fn=new funciones;
	$config=new configuracion;
	$curso=new curso;
	$cur=array_shift($curso->mostrarCurso($CodCurso));
	$notas=array_shift($notascualitativa->mostrarDocenteMateriaCursoTrimestre($CodDocente,$CodMateria,$CodCurso,$CodTrimestre));
	
	$CodDocenteMateriaCurso=$notas['CodDocenteMateriaCurso'];
	$Sexo=$notas['SexoAlumno'];
	$cnf=array_shift($config->mostrarConfig("RegistroNotaHabilitado"));
	$registronotashabilitado=$cnf["Valor"];
	$cnf=array_shift($config->mostrarConfig("TrimestreNotaHabilitado"));
	$trimestrenotahabilitado=$cnf["Valor"];
	
	if($registronotashabilitado==1){
		if($CodTrimestre!=$trimestrenotahabilitado)
		{$restringir='readonly="readonly" disabled="disabled"';}
		else{$restringir='';}
	}else{
		$restringir='readonly="readonly" disabled="disabled"';	
	}
	
	?>
    <!--<div style="display:inline-block;">-->
    <div class="cuerpo">Curso: <span class="resaltar"><?php echo $cur['Nombre']?> </span> | Trimestre: <span class="resaltar"><?php echo $CodTrimestre?></span>
    </div>
	<table class="tabla" style="display:inline-block;overflow-x:visible; margin-bottom:36px;vertical-align:top">
		<tr class="cabecera"><td>Nº</td><td>Paterno</td><td>Materno</td><td>Nombres</td>
        	<?php for($i=1;$i<=$numcasilleros;$i++){?>
     		<td style="width:10px"><span title="<?php echo $casillas['NombreCasilla'.$i];?>"  rel="<?php echo $casillas['LimiteCasilla'.$i];?>" id="t<?php echo $i;?>"><?php echo $fn->sacarIniciales($casillas['NombreCasilla'.$i])?></span></td>
     <?php }?>
        	<td>Nota Cualitativa</td>
	    </tr> 

	<?php
	$na=0;
	
	foreach($alumnos->mostrarAlumnosCurso($CodCurso,$Sexo) as $al){
		$na++;
		//echo $na;
		$regNota=$notascualitativa->mostrarCodDocMatAlumnoTrimestre($CodDocenteMateriaCurso,$al['CodAlumno'],$CodTrimestre);
		$regNota=array_shift($regNota);
		//print_r($regNota);
		?>
       
        <tr class="contenido" style="height:35px;"  rel="<?php echo $al['CodAlumno']?>">
        	<td><?php echo $na;?></td>
            <td><?php echo  ucwords($al['Paterno']);?></td>
            <td><?php echo ucwords($al['Materno']);?></td>
            <td><?php echo ucwords($al['Nombres']);?></td>
            
            <td style="text-align:center" class="amarillo"><textarea class="nota" id="resultado<?php echo $al['CodAlumno']?>" rel="<?php echo $regNota['CodNotasCualitativa']?>" cols="20" rows="5" <?php echo $restringir?>><?php echo $regNota['Valor']?></textarea></td>
            
            <?php
			?>
        </tr>
	<?php
	}
	?> 
    </table>
    <hr />
	<input type="submit" value="Guardar Nota" class="corner-all" id="guardarNotas"/>
	<?php
}
?>