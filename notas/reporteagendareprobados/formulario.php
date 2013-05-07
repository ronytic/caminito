<?php
include_once("../../class/config.php");
$config=new configuracion;
$cnf=array_shift($config->mostrarConfig("TotalTrimestre"));
$totalTrimestre=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("TrimestreActual"));
$trimestreActual=$cnf['Valor']
?>
<div class="grid_2">
<div class="cuerpo">Trimestre<hr />
<?php
			for($i=1;$i<=$totalTrimestre;$i++){
				?>
				<li><input type="radio" name="Trimestre" <?php echo $i==$trimestreActual?'checked="checked"':'';?> value="<?php echo $i;?>" id="trimestre<?php echo $i;?>" class="radio"/><label class="lradio capital" for="trimestre<?php echo $i;?>"><?php echo $i;?></label></li>
				<?php
			}
		?>
        </div>
</div>
<div class="grid_3">
<div class="cuerpo">Materias<hr />
<select name="CodMateria">

</select>
</div>
</div>
<div class="grid_2">
	<div class="cuerpo">
		<input type="submit" value="Ver Agenda" class="corner-all" id="ver">    
    </div>
</div>
<div class="clear"></div>
