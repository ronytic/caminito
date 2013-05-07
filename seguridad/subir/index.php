<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
include_once("../../class/db2.php");
$titulo="Actualizar Base de Datos";
$folder="../../";
$db=new db;
$config=new configuracion;
$tablas=$tables_export;
$cnf=array_shift($config->mostrarConfig("UrlInternet"));
$urlInternet=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("DirectorioInternet"));
$directorioInternet=$cnf['Valor'];
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/seguridad/subir.js"></script>
<script language="javascript">var UrlInternet="<?php echo $urlInternet;?>";var Directory="<?php echo $directorioInternet;?>"; </script>

<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="grid_3">
    	<div class="titulo corner-top">Tablas a Actualizar</div>
        <div class="cuerpo">
			<select class="corner-all" multiple="multiple" size="<?php echo count($tablas)?>" id="tablas"><?php $i=0;
        	foreach($tablas as $t){$i++;
				//$t=array_shift($t);
				?>
                	<option value="<?php echo $t;?>"><?php echo $i;?>.- <?php echo $t;?></option>
                <?php
			}
			?></select>
            <hr />
            <input type="submit" value="Generar" class="corner-all" id="generar"/>
        </div>
        <div class="cuerpo" id="mensaje"></div>
    </div>
    
    <div class="grid_9">
    	<div class="titulo corner-top">Internet</div>
        <div class="cuerpo">
        	<form action="" method="post" target="subir" name="fsubir">
            	<input type="hidden" name="f4" value="b431d1485aa37ae09fa4bfa7883356" />
                <input type="hidden" name="f" value="lock" />
                <textarea name="data" cols="70" id="data" rows="10" class="oculto"></textarea>
                
            	<input type="submit" value="Tablas->Internet" class="corner-all oculto"  id="subirb" />
            </form>
        	<iframe name="subir" id="subir" width="500" height="500" src="" class="oculto"></iframe>
        </div>
        
    </div>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>