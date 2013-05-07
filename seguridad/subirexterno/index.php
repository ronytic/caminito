<?php
include_once("../../login/check.php");
include_once("../../class/config.php");
include_once("../../class/db2.php");
$titulo="Actualizar Base de Datos INTERNET";
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
<script language="javascript" type="text/javascript" src="../../js/seguridad/externo.js"></script>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="grid_3">
    	<div class="titulo corner-top">Tablas a Actualizar</div>
        <div class="cuerpo">
            <a href="#" class="boton corner-all" id="subir">Subir Datos a Internet</a>
        </div>
    </div>
    <div class="grid_9">
    	<div class="titulo corner-top">Internet</div>
        <div class="cuerpo" id="respuesta">
        	<div id="imagencargador" class="oculto">
            	<img src="../../images/ajax-loader.gif" />
                <h1>Cargando..., tenga paciencia</h1>
            </div>
            <div id="resultadosubida">
            
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>