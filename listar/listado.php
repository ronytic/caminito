<?php
	include_once($folder."login/check.php");
	include_once($folder."config.php");
	include_once($folder."class/alumno.php");
	include_once($folder."class/curso.php");
	include_once($folder."class/docentemateriacurso.php");
	$al=new alumno;
	$curso=new curso;
	$docMateriaCurso=new docentemateriacurso;
	
	if($SoloDocente==1){
		$i=0;
		foreach($docMateriaCurso->mostrarDocenteCurso($CodDocente) as $cur){$i++;
					$CodCurso=$cur['CodCurso'];

                    $c=$curso->mostrarCurso($cur['CodCurso']);
                    $c=$c=array_shift($c);

                    $curs[$i]['CodCurso']=$CodCurso;
                    $curs[$i]['Nombre']=$c['Nombre'];
        }
        
	}else{
		$curs=$curso->mostrar();
	}
	?>
	<?php include_once($folder."cabecerahtml.php");?>
	<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/listar/listado.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/<?php echo $jsFile;?>"></script>
    <script language="javascript">
    $(document).ready(function() { 
		$().datepicker();
	});
    </script>
	<?php include_once($folder."cabecera.php");?>
	<div class="container_12" id="cuerpo">
		<div class="grid_2">
			<div class="Curso">
				<div class="titulo corner-tl corner-tr ">Cursos</div>
				<div class="cuerpo">
				<ul>
				<?php
					foreach($curs as $cur){
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
		<div class="grid_6">
			<div class="Alumnos">
				<div class="titulo corner-tl corner-tr "><?php echo $subtitulo;?></div>
				<div class="cuerpo" id="respuesta">
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php include_once($folder."footer.php");?>