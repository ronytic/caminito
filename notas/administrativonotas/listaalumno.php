<?php
session_start();
include_once("../../login/check.php");
include_once("../../class/curso.php");
include_once("../../class/alumno.php");
include_once("../../class/casilleros.php");
include_once("../../class/registronotas.php");
include_once("../fn.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$CodMateria=$_POST['CodMateria'];
	$CodDocente=$_SESSION['CodDocente'];
	$CodTrimestre=$_POST['Trimestre'];
	$alumnos=new alumno;

	$casilleros=new casilleros;
	$registroNotas=new registronotas;
	$fn=new funciones;
	$curso=new curso;
	$cur=array_shift($curso->mostrarCurso($CodCurso));
	$casillas=array_shift($casilleros->mostrarDocenteMateriaCursoTrimestre($CodDocente,$CodMateria,$CodCurso,$CodTrimestre));
	$CodCasilleros=$casillas['CodCasilleros'];
	$Sexo=$casillas['SexoAlumno'];
	$numCasilleros=$casillas['Casilleros'];
	$Dps=$casillas['Dps'];
	$FormulaCalificaciones=$casillas['FormulaCalificaciones'];
	for($i=1;$i<=15;$i++){
		$Etiquetas[$i]=$docMat['NombreCasilla'.$i];
	}
	?>
    <div class="cuerpo">Curso: <span class="resaltar"><?php echo $cur['Nombre']?> </span> | Trimestre: <span class="resaltar"><?php echo $CodTrimestre?></span>
    </div>
    <!--<div style="display:inline-block;">-->
	<table class="tabla" style="display:inline-block;overflow-x:visible; margin-bottom:36px;vertical-align:top">
		<tr class="cabecera"><td>Nº</td><td>Paterno</td><td>Materno</td><td>Nombres</td>
        	<?php for($i=1;$i<=$numCasilleros;$i++){?>
     		<td style="width:10px"><span title="<?php echo $casillas['NombreCasilla'.$i];?>"  rel="<?php echo $casillas['LimiteCasilla'.$i];?>" id="t<?php echo $i;?>"><?php echo $fn->sacarIniciales($casillas['NombreCasilla'.$i])?></span></td>
     <?php }?>
        	<td>Resultado</td><?php if($Dps){?><td>Dps</td><?php }?><td>Final</td>
	    </tr> 

	<?php
	$na=0;
	$restringir='';
	
	foreach($alumnos->mostrarAlumnosCurso($CodCurso,$Sexo) as $al){
		if($CodTrimestre==4){
			$cas1=array_shift($casilleros->mostrarMateriaCursoTrimestre($CodMateria,$CodCurso,1));
			$regNota1=array_shift($registroNotas->mostrarRegistroNotas($cas1['CodCasilleros'],$al['CodAlumno'],1));
			
			$cas2=array_shift($casilleros->mostrarMateriaCursoTrimestre($CodMateria,$CodCurso,2));
			$regNota2=array_shift($registroNotas->mostrarRegistroNotas($cas2['CodCasilleros'],$al['CodAlumno'],2));
			
			$cas3=array_shift($casilleros->mostrarMateriaCursoTrimestre($CodMateria,$CodCurso,3));
			$regNota3=array_shift($registroNotas->mostrarRegistroNotas($cas3['CodCasilleros'],$al['CodAlumno'],3));
			
			$promedio=number_format(($regNota1['NotaFinal']+$regNota2['NotaFinal']+$regNota3['NotaFinal'])/3,0);
			$Where="CodCasilleros=$CodCasilleros and CodAlumno=".$al['CodAlumno']." and Trimestre=4";
			$valuesNotaDps=array("Nota1"=>$promedio);
			$registroNotas->actualizarNota($valuesNotaDps,$Where);
		}
		
		$na++;
		$regNota=$registroNotas->mostrarRegistroNotas($CodCasilleros,$al['CodAlumno'],$CodTrimestre);
		$regNota=array_shift($regNota);
		?>
       
        <tr class="contenido" style="height:35px;"  rel="<?php echo $al['CodAlumno']?>">
        	<td><?php echo $na;?></td>
            <td><?php echo  ucwords($al['Paterno']);?></td>
            <td><?php echo ucwords($al['Materno']);?></td>
            <td><?php echo ucwords($al['Nombres']);?></td>
            <?php for($i=1;$i<=$numCasilleros;$i++){
				if($CodTrimestre==4 && $i==1){
					?>
                 	<td style="text-align:center">
                	<input type="text" size="1" maxlength="2" class="nota <?php echo($i==$Casilleros)?'final':'';?>" value="<?php echo $regNota['Nota'.$i]?>" id="al[<?php echo $na;?>][n<?php echo $i;?>]" rel="<?php echo $al['CodAlumno']?>" data-col="<?php echo $i;?>" data-row="<?php echo $al['CodAlumno'];?>" data-cod="<?php echo $CodCasilleros;?>" readonly="readonly"/>
                </td>
                    <?php
				}else{
				?>
            
				<td style="text-align:center">
                	<input type="text" size="1" maxlength="2" class="nota <?php echo($i==$Casilleros)?'final':'';?>" value="<?php echo $regNota['Nota'.$i]?>" id="al[<?php echo $na;?>][n<?php echo $i;?>]" rel="<?php echo $al['CodAlumno']?>" data-col="<?php echo $i;?>" data-row="<?php echo $al['CodAlumno'];?>" data-cod="<?php echo $CodCasilleros;?>" <?php echo $restringir?>/>
                </td>
            <?php
				}
			}
			?>
            
            
            <td style="text-align:center" class="amarillo"><input type="text" size="1" maxlength="2" readonly="readonly" class="nota" value="<?php echo $regNota['Resultado']?>" id="resultado<?php echo $al['CodAlumno']?>"/></td>
            <?php
				if($Dps){
			?>
            <td style="text-align:center" class="amarillo"><input type="text" size="1" maxlength="2" readonly="readonly" class="nota" value="<?php echo $regNota['Dps']?>" id="dps<?php echo $al['CodAlumno']?>"/></td>
            <?php
				}
			?>
            <td style="text-align:center" class="verde"><input type="text" size="1" maxlength="2" readonly="readonly" class="nota <?php echo $regNota['NotaFinal']<36?"rojo":"";?>" value="<?php echo $regNota['NotaFinal']?>" id="notaf<?php echo $al['CodAlumno']?>"/></td>
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