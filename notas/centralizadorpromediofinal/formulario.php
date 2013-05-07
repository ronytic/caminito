<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
if(!empty($_POST))
{
	/// esto hay que cambiar con la tabla de configuracion
	$config=new configuracion;
	$cnf=array_shift($config->mostrarConfig("TotalTrimestre"));
	$totalTrimestre=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("TrimestreActual"));
	$trimestreActual=$cnf['Valor'];
	$cnf=array_shift($config->mostrarConfig("PeriodoAdicional"));
	$totalPeriodoAdicional=$cnf['Valor'];
	?>
	<div class="grid_2 cuerpo">
	Trimestre:
	
	<?php
		for($i=1;$i<=$totalTrimestre;$i++){
			?>
			<li><input type="radio" name="Trimestre" <?php echo $i==$trimestreActual?'checked="checked"':'';?> value="<?php echo $i;?>" id="trimestre<?php echo $i;?>" style="width:100px;float:left" class="radio"/><label class="lradio capital" for="trimestre<?php echo $i;?>"><?php echo $i;?></label></li>
			<?php
		}
	?>
	</div>
	<div class="grid_2 cuerpo">
	Periodos Adicionales:
	
	<?php /*
		for($i=1;$i<=$totalPeriodoAdicional;$i++){
			?>
			<li><input type="radio" name="Periodo" value="<?php echo $i;?>" id="periodo<?php echo $i;?>" style="width:100px;float:left" class="radio"/><label class="lradio capital" for="periodo<?php echo $i;?>"><?php echo $i;?></label></li>
			<?php
		}*/
	?>
	</div>
	<div class="clear"></div>
	<input type="submit" id="generar" value="Generar" class="corner-all"/>
<?php	
}
?>