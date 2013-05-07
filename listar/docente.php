<?php
	include_once($folder."login/check.php");
	include_once($folder."config.php");
	include_once($folder."class/docente.php");
	$docente=new docente;
	?>
	<?php include_once($folder."cabecerahtml.php");?>
	<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/listar/docente.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/<?php echo $jsFile;?>"></script>
    <script language="javascript" type="text/javascript">
		$(document).ready(function(e) {
            $().datepicker();
        });
    	<?php
		if($datoInicial==1){
			?>
			$(document).ready(function(e) {
	            $.post('<?php echo $archivoInicial;?>',{'CodDocente':CodDocente},respuesta1);	    
            });
			<?php
		}
		?>
    </script>
	<?php include_once($folder."cabecera.php");?>
	<div class="container_12" id="cuerpo">
		<div class="grid_3">
			<div class="Curso">
				<div class="titulo corner-tl corner-tr ">Docente</div>
				<div class="cuerpo">
				<ul>
				<?php
					if(!isset($tipodocente)){
						$tipodocente=1;	
					}
					foreach($docente->listar($tipodocente) as $doc){
						?>
						<li><input type="radio" name="Docente" value="<?php echo $doc['CodDocente'];?>" id="docente<?php echo $doc['CodDocente'];?>" class="radio"/><label class="lradio capital" for="docente<?php echo $doc['CodDocente'];?>"><?php echo $doc['Paterno'];?> <?php echo $doc['Materno'];?> <?php echo $doc['Nombres'];?></label></li>
						<?php	
					}
				?>
				</ul>
				</div>
			</div>
		</div>
		<?php if (isset($uno) &&$uno===1): ?>
		<div class="grid_9">
			<div class="Alumnos">
				<div class="titulo corner-tl corner-tr "><?php echo $subtitulo1;?></div>
				<div class="cuerpo" id="contenido1">
				</div>
			</div>
		</div>
		<?php else: ?>
		<div class="grid_4">
			<div class="Alumnos">
				<div class="titulo corner-tl corner-tr "><?php echo $subtitulo1;?></div>
				<div class="cuerpo" id="contenido1">
				</div>
			</div>
		</div>
		<div class="grid_5">
			<div class="Alumnos">
				<div class="titulo corner-tl corner-tr "><?php echo $subtitulo2;?></div>
				<div class="cuerpo" id="contenido2">
				</div>
			</div>
		</div>
		<?php endif ?>
		
		<div class="clear"></div>
	</div>
	<?php include_once($folder."footer.php");?>