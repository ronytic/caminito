<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
include_once("../../class/db2.php");
$titulo="Actualización Base de Datos";
$folder="../../";
$config=new configuracion;
$db=new db;
$tablas=$db->getTables();
$cnf=array_shift($config->mostrarConfig("UrlInternet"));
$urlInternet=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("DirectorioInternet"));
$directorioInternet=$cnf['Valor'];
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/seguridad/actualizar.js"></script>
<script language="javascript">var UrlInternet="<?php echo $urlInternet;?>";var Directory="<?php echo $directorioInternet;?>"; </script>

<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="grid_3">
    	<div class="titulo corner-top">Tablas a Actualizar</div>
        <div class="cuerpo">
			<select class="corner-all" multiple="multiple" size="<?php echo count($tablas)?>" id="tablas"><?php $i=0;
        	foreach($tablas as $t){$i++;
				$t=array_shift($t);
				?>
                	<option value="<?php echo $t;?>"><?php echo $i;?>.- <?php echo $t;?></option>
                <?php
			}
			?></select>
        </div>
        <div class="titulo corner-top">Configuración</div>
        <div class="cuerpo">
        	<table>
            	<tr><td>Eliminar</td><td><select name="eliminar" class="corner-all">
            											<option value="0" selected="selected">No</option>
                                                        <option value="1">Si</option>
                								</select></td></tr>
            	<tr><td>Estructura</td><td><select name="estructura" class="corner-all">
            											<option value="0" selected="selected">No</option>
                                                        <option value="1">Si</option>
                								</select></td></tr>
                <tr><td>Vaciar</td><td><select name="vaciar" class="corner-all">
            											<option value="0" selected="selected">No</option>
                                                        <option value="1">Si</option>
                								</select></td></tr>
				<tr><td></td><td><input type="submit" value="Generar" class="corner-all" id="generar"/></td></tr>
			</table>
        </div>
    </div>
    <div class="grid_7">
    	<form action="exportar.php" target="archivo" method="post">
    		<div class="titulo corner-top">Sql de Exportación</div>
        	<div class="cuerpo">
            	<textarea id="salida" name="salida" class="corner-all" style="max-width:98%;width:98%;height:450px;min-height:450px;" ></textarea>
            </div>
        	<div class="cuerpo">
            	<input type="submit" value="Generar Archivo" class="corner-all" id="archivo"/>
            </div>
        </form>
        <iframe class="clear" id="exportararchivo" name="archivo"></iframe>
        <iframe name="subir" id="subir" width="500" height="500" src=""></iframe>
    </div>
    <div class="grid_2">
    	<div class="titulo corner-top">Internet</div>
        <div class="cuerpo">
        	<form action="" method="post" target="subir" name="fsubir">
            	<input type="hidden" name="f4" value="b431d1485aa37ae09fa4bfa7883356" />
                <input type="hidden" name="f" value="lock" />
                <textarea name="data" cols="10" id="data" rows="10"></textarea>
                
            	<input type="submit" value="Tablas->Internet" class="corner-all"/>
            </form>
        	
        </div>
        
    </div>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>