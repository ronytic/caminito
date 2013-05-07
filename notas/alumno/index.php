<?php
include_once("../../login/check.php");
include_once("../../config.php");
$titulo="Notas del Alumno";
$folder="../../";
include_once("../../class/alumno.php");
include_once("../../class/materias.php");
include_once("../../class/curso.php");
include_once("../../class/cursomateria.php");
include_once("../../class/registronotas.php");
include_once("../../class/casilleros.php");
$cursomateria=new cursomateria;
$alumno=new alumno;
$curso=new curso;
$materia=new materias;
$registronotas=new registronotas;
$casilleros=new casilleros;
$CodAlumno=$_SESSION['CodUsuarioLog'];
$al=array_shift($alumno->mostrarDatos($CodAlumno));
$cur=array_shift($curso->mostrarCurso($al['CodCurso']));

?>
<?php include_once($folder."cabecerahtml.php");?>

<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_1 grid_10 suffix_1">
		<div class="cuerpo">
        	<h2>Notas</h2>
            <table class="tabla">
            	<tr class="cabecera"><td width="150">Materias</td><td colspan="3">1<sup>er</sup> Trimestre</td><td colspan="3">2<sup>do</sup> Trimestre</td><td colspan="3">3<sup>er</sup> Trimestre</td><td width="90">Promedio Anual</td><td>Reforzamiento</td><td>Prom. Final</td></tr>
                <tr><td></td><td>PC</td><td>DPS</td><td>PT</td><td>PC</td><td>DPS</td><td>PT</td><td>PC</td><td>DPS</td><td>PT</td><td></td><td></td><td></td></tr>
                <?php
				if(strtotime($Fecha)>strtotime($FechaCuota1)){
					
				}
				
				foreach($cursomateria->mostrarMaterias($al['CodCurso']) as $cm){
					$ma=array_shift($materia->mostrarMateria($cm['CodMateria']));
					$casillas=array_shift($casilleros->mostrarMateriaCursoTrimestre($cm['CodMateria'],$al['CodCurso'],1));
					$rn1=array_shift($registronotas->mostrarRegistroNotas($casillas['CodCasilleros'],$al['CodAlumno'],1));
					$casillas=array_shift($casilleros->mostrarMateriaCursoTrimestre($cm['CodMateria'],$al['CodCurso'],2));
					$rn2=array_shift($registronotas->mostrarRegistroNotas($casillas['CodCasilleros'],$al['CodAlumno'],2));
					$casillas=array_shift($casilleros->mostrarMateriaCursoTrimestre($cm['CodMateria'],$al['CodCurso'],3));
					$rn3=array_shift($registronotas->mostrarRegistroNotas($casillas['CodCasilleros'],$al['CodAlumno'],3));
					?>
                    <tr class="contenido"><td class="div"><?php echo $ma['Nombre'];?></td><td class="div der"><?php echo $rn1['Resultado'];?></td><td class="div der verde"><?php echo $rn1['Dps'];?></td><td class="div der amarillo"><?php echo $rn1['NotaFinal'];?></td><td class="div der"><?php echo $rn2['Resultado1'];?></td><td class="div der verde"><?php echo $rn2['Dps1'];?></td><td class="div der amarillo"><?php echo $rn2['NotaFinal1'];?></td><td class="div der"><?php echo $rn3['Resultado'];?></td><td class="div der verde"><?php echo $rn3['Dps'];?></td><td class="div der amarillo"><?php echo $rn3['NotaFinal'];?></td><td class="div der">0</td><td class="div der">0</td><td class="der">0</td></tr>
                    <?php
				}
				?>
            </table>
        </div>
    </div>
</div>
<?php include_once($folder."footer.php");?>