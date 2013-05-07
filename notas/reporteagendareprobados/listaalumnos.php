<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$CodMateria=$_POST['CodMateria'];
	$Trimestre=$_POST['Trimestre'];	///cambiar
	include_once("../../class/alumno.php");
	include_once("../../class/curso.php");
	include_once("../../class/config.php");
	include_once("../../class/materias.php");
	include_once("../../class/casilleros.php");
	include_once("../../class/registronotas.php");
	include_once("../../class/agenda.php");
	include_once("../../class/observaciones.php");
	$alumno=new alumno;
	$curso=new curso;
	$agenda=new agenda;
	$materias=new materias;
	$casilleros=new casilleros;
	$registronotas=new registronotas;
	$observaciones=new observaciones;
	$config=new configuracion;
	$cur=$curso->mostrarCurso($CodCurso);
	$cur=array_shift($cur);
	$cnf=array_shift($config->mostrarConfig("NotaReprobacion"));
	$notareprobacion=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("InicioTrimestre".$Trimestre));
	$trimestreInicio=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("FinTrimestre".$Trimestre));
	$trimestreFin=$cnf['Valor'];
	?>
    <table class="tabla">
    <tr class="cabecera"><td>Nº</td><td>Paterno</td><td>Materno</td><td>Nombres</td><td>Prom</td><td>Dps</td><td>N. F.</td><td>Anotaciones</td>
    </tr>
    <?php
		$i=0;
		?>
        
        <?php
			foreach($casilleros->mostrarMateriaCursoTrimestre($CodMateria,$CodCurso,$Trimestre) as $casillas){
				?>
                <?php
				foreach($registronotas->notasCentralizadorAgenda($casillas['CodCasilleros'],$Trimestre,$notareprobacion) as $registroN)
				{
					$i++;
					
					$al=$alumno->mostrarDatos($registroN['CodAlumno']);
					$al=array_shift($al);
						if($al['CodAlumno']!=""){
							$ag=$agenda->mostrarCodMateriaCodAlumnoRango($CodMateria,$al['CodAlumno'],$trimestreInicio,$trimestreFin);
							
							?>
							<tr class="contenido"><td><?php echo $i;?></td><td><?php echo ucfirst($al['Paterno'])?></td><td><?php echo ucfirst($al['Materno'])?></td><td><?php echo ucwords($al['Nombres'])?></td><td class="der amarillo"><?php echo $registroN['Resultado']?></td><td class="der amarillo"><?php echo $registroN['Dps']?></td><td class="der verde"><?php echo $registroN['NotaFinal']?></td><td class="der"><?php echo count($ag)?></td><td><a href="../../agenda/total/agenda.php?CodAl=<?php echo $al['CodAlumno']?>" class="botonSec">Ver agenda</a></td></tr>
                            <?php
							foreach($ag as $a){
								$o=$observaciones->mostrarObser($a['CodObservacion']);
								$o=array_shift($o);
							?>
                            <tr class="contenido"><td colspan="7"></td><td><?php echo $o['Nombre']?></td><td width="180"><?php echo $a['Detalle'];?></td><td width="70"><?php echo date("d-m-Y",strtotime($a['Fecha']));?></td></tr>
                            
							<?php	
							}
						}			
				}
			}
		?>
               
        </tr>
		<?php
	//}
	?>
    </table>
    <?php
}
?>