<?php
	include_once($folder."login/check.php");
	include_once($folder."config.php");
	include_once($folder."class/alumno.php");
	include_once($folder."class/curso.php");
	$al=new alumno;
	$curso=new curso;
	global $horizontal;
	if( $horizontal!=2){$horizontal=1;}
	?>
	<?php include_once($folder."cabecerahtml.php");?>
	<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/listar/curso.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/<?php echo $jsFile;?>"></script>
    <script language="javascript" type="text/javascript">
		$(document).ready(function(e) {
            $().datepicker();
        });
    	<?php
		if($datoInicial==1){
			?>
			$(document).ready(function(e) {
	            $.post('<?php echo $archivoInicial;?>',{'CodCurso':CodCurso},respuesta1);	    
            });
			<?php
		}
		?>
    </script>
	<?php include_once($folder."cabecera.php");?>
	<div class="container_12" id="cuerpo">
		<div class="grid_2">
			<div class="Curso">
				<div class="titulo corner-tl corner-tr ">Cursos</div>
				<div class="cuerpo">
				<ul>
				<?php
					foreach($curso->mostrar() as $cur){
						?>
						<li><input type="radio" name="Curso" value="<?php echo $cur['CodCurso'];?>" id="curso<?php echo $cur['CodCurso'];?>" class="radio"/><label class="lradio capital" for="curso<?php echo $cur['CodCurso'];?>"><?php echo $cur['Nombre'];?></label></li>
						<?php	
					}
				?>
				</ul>
				</div>
			</div>
		</div>
        <?php if($horizontal==1){?>
		<div class="grid_3">
			<div class="Alumnos">
				<div class="titulo corner-tl corner-tr "><?php echo $subtitulo1;?></div>
				<div class="cuerpo" id="contenido1">
				</div>
			</div>
		</div>
		<div class="grid_7">
			<div class="Alumnos">
				<div class="titulo corner-tl corner-tr "><?php echo $subtitulo2;?></div>
				<div class="cuerpo" id="contenido2">
				</div>
			</div>
		</div>
        <?php }else{
		?>
        <div class="grid_10">
			<div class="Alumnos">
				<div class="titulo corner-tl corner-tr "><?php echo $subtitulo1;?></div>
				<div class="cuerpo" id="contenido1">
				</div>
			</div>
		</div>
		<div class="grid_10">
			<div class="Alumnos">
				<div class="titulo corner-tl corner-tr "><?php echo $subtitulo2;?></div>
				<div class="cuerpo" id="contenido2">
				</div>
			</div>
		</div>
        <?php		
		}?>
		<div class="clear"></div>
	</div>
	<?php include_once($folder."footer.php");?>