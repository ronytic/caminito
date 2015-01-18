<?php
session_start();
include_once("../../login/check.php");
include_once("../../config.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
$titulo="ReInscripción de alumno";
$folder="../../";
$al=new alumno;
$ma=$al->estadoTabla();
$curso=new curso;
?>
<?php include_once($folder."cabecerahtml.php"); ?>
<script language="javascript" type="text/javascript" src="../../js/alumno/reinscripcion.js"></script>
<?php include_once($folder."cabecera.php"); ?>
<div class="container_12" id="cuerpo">
	<div class="grid_2">
    	<div class="Curso">
            <div class="titulo corner-tl corner-tr ">Curso</div>
            <div class="cuerpo">
            <ul>
			<?php
            	foreach($curso->listar() as $cur){
					?>
                    <li><input type="radio" name="Curso" value="<?php echo $cur['CodCurso'];?>" id="curso<?php echo $cur['CodCurso'];?>" class="radio"/><label class="lradio capital" for="curso<?php echo $cur['CodCurso'];?>"><?php echo $cur['Nombre'];?></label></li>
                    <?php	
				}
			?>
            </ul>
            </div>
        </div>
    </div>
    <div class="grid_4">
    	<div class="Alumnos">
            <div class="titulo corner-tl corner-tr ">Alumnos</div>
            <div class="cuerpo" id="alumnos">
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php
include_once("../../footer.php");
?>