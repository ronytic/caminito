<?php
session_start();
if(!empty($_GET) && $_SESSION['CodDocente'] && md5("notas")==$_GET['f']){
include_once("../../login/check.php");
include_once("../../class/curso.php");
include_once("../../class/docente.php");
include_once("../../class/casilleros.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/materias.php");
include_once("../../class/config.php");
$titulo="Registro de Notas";
$folder="../../";	
$docente=new docente;
$curso=new curso;
$casilleros=new casilleros;
$docentemateriacurso=new docentemateriacurso;
$materias=new materias;
$config=new configuracion;
$CodDocente=$_SESSION['CodDocente'];
$cnf=array_shift($config->mostrarConfig("TotalTrimestre"));
$totalTrimestre=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("TrimestreActual"));
$TrimestreActual=$cnf['Valor'];
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/notas/notas.js"></script>
<script language="javascript">
	$(document).ready(function(e) {
		
	});
</script>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="grid_2">
		<div class="titulo corner-tl corner-tr">Curso</div>    
        <div class="cuerpo"><?php
                foreach($docentemateriacurso->mostrarDocenteCurso($CodDocente) as $cur){
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
            foreach($docentemateriacurso->mostrarDocenteMateria($CodDocente) as $docMat){
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
				<li><input type="radio" name="Trimestre" value="<?php echo $i;?>" id="trimestre<?php echo $i;?>" class="radio" <?php echo $i==$TrimestreActual?'checked="checked"':'';?>/><label class="lradio capital" for="trimestre<?php echo $i;?>"><?php echo $i;?></label></li>
				<?php
			}
		?>
        	<li><input type="radio" name="Trimestre" value="4" id="trimestre4" class="radio" <?php echo $i==$TrimestreActual?'checked="checked"':'';?>/><label class="lradio capital" for="trimestre4">Periodo Adicional</label></li>
        </div>
    </div>
    <div class="clear"></div>
    <div class="grid_12">
    	<div class="titulo corner-tl corner-tr">Alumnos</div>
        <div class="cuerpo" id="alumnos">
        	
        </div>
    </div>
    
    <div class="clear"></div>
</div>
<?php /*
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31441392-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
*/?>
<?php include_once($folder."footer.php");?>
<?php
}
?>