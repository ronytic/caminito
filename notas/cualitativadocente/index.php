<?php
session_start();
include_once("../../login/check.php");
include_once("../../class/config.php");
include_once("../../class/curso.php");
include_once("../../class/docente.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/materias.php");
$titulo="Registro de Notas";
$folder="../../";
$docente=new docente;
$curso=new curso;
$docMateriaCurso=new docentemateriacurso;
$materias=new materias;
$config=new configuracion;
$CodDocente=$_SESSION['CodUsuarioLog'];
$_SESSION['CodDocente']=$CodDocente;
$cnf=array_shift($config->mostrarConfig("TotalTrimestre"));
$totalTrimestre=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("TrimestreActual"));
$trimestreActual=$cnf['Valor']
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/notas/cualitativo.js"></script>
<script language="javascript">
$(document).ready(function(e) {

});
</script>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="grid_2">
		<div class="titulo corner-tl corner-tr">Curso</div>    
        <div class="cuerpo"><?php
                
                foreach($docMateriaCurso->mostrarDocenteCurso($CodDocente) as $cur){
                    $c=$curso->mostrarCurso($cur['CodCurso']);
                    $c=$c=array_shift($c);
                    ?>
                    <li><input type="radio" name="Curso" value="<?php echo $c['CodCurso'];?>" id="curso<?php echo $c['CodCurso'];?>" class="radio"/><label class="lradio capital" for="curso<?php echo $c['CodCurso'];?>"><?php echo $c['Nombre'];?></label></li>
                    <?php
                }
            ?>
        </div>
	</div>
    <div class="grid_2">
        <div class="titulo corner-tl corner-tr">Materia</div>    
        <div class="cuerpo">
		<?php
            
            foreach($docMateriaCurso->mostrarDocenteMateria($CodDocente) as $docMat){
                $m=$materias->mostrarMateria($docMat['CodMateria']);
                $m=array_shift($m);
                ?>
                <li><input type="radio" name="Materia" value="<?php echo $m['CodMateria'];?>" id="materia<?php echo $m['CodMateria'];?>" class="radio"/><label class="lradio capital" for="materia<?php echo $m['CodMateria'];?>"><?php echo $m['Nombre'];?></label></li>
                <?php
            }
        ?>
		</div>
	</div>
    <div class="grid_2">
	    <div class="titulo corner-tl corner-tr">Trimestre</div>    
        <div class="cuerpo">
			<?php
			for($i=1;$i<=$totalTrimestre;$i++){
				?>
				<li><input type="radio" name="Trimestre" <?php echo $i==$trimestreActual?'checked="checked"':'';?> value="<?php echo $i;?>" id="trimestre<?php echo $i;?>" class="radio"/><label class="lradio capital" for="trimestre<?php echo $i;?>"><?php echo $i;?></label></li>
				<?php
			}
		?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="grid_12">
    	<div class="titulo corner-tl corner-tr">Alumnos</div>
        <div class="cuerpo" id="casilleros">
        	
        </div>
    </div>
    
    <div class="clear"></div>
</div>
<?php
	$cnf=array_shift($config->mostrarConfig("CodigoSeguimientoNotasDocente"));
	echo $cnf['Valor'];
?>
<?php include_once($folder."footer.php");?>