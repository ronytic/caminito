<?php
session_start();
include_once("../../login/check.php");
include_once("../../config.php");

include_once("../../class/config.php");
$conf=new configuracion;

$cnf=array_shift($conf->mostrarConfig("TrimestreActual"));
$TrimestreActual=$cnf['Valor'];
$cnf=array_shift($conf->mostrarConfig("RegistroNotaHabilitado"));
$RegistroNotaHabilitado=$cnf['Valor'];
$cnf=array_shift($conf->mostrarConfig("TrimestreNotaHabilitado"));
$TrimestreNotaHabilitado=$cnf['Valor'];
$titulo="Configuración Cuotas";
$folder="../../";
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript">
$(document).ready(function(e) {
    });
</script>
</head>
<body>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<form action="guardar.php" method="post">
	<div class="prefix_4 grid_4">
    	<div class="titulo corner-top">Trimestre</div>
    	<div class="cuerpo">
        	<table>
            	<tr><td>Registro de Nota Habilitado</td><td>::</td><td>
                	<select name="RegistroNotaHabilitado">
                    	<option value="1" <?php echo $RegistroNotaHabilitado=="1"?'selected="selected"':'';?>>Si</option>
                        <option value="0" <?php echo $RegistroNotaHabilitado=="0"?'selected="selected"':'';?>>No</option>
                    </select>
                </td></tr>
            	<tr><td>Trimestre Actual</td><td>::</td><td>
                	<select name="TrimestreActual">
                    	<option value="1" <?php echo $TrimestreActual=="1"?'selected="selected"':'';?>>1º Trimestre</option>
                        <option value="2" <?php echo $TrimestreActual=="2"?'selected="selected"':'';?>>2º Trimestre</option>
                        <option value="3" <?php echo $TrimestreActual=="3"?'selected="selected"':'';?>>3º Trimestre</option>
                    </select>
                </td></tr>
                <tr><td>Trimestre de Registro Nota Habilitado</td><td>::</td><td>
                	<select name="TrimestreNotaHabilitado">
                    	<option value="1" <?php echo $TrimestreNotaHabilitado=="1"?'selected="selected"':'';?>>1º Trimestre</option>
                        <option value="2" <?php echo $TrimestreNotaHabilitado=="2"?'selected="selected"':'';?>>2º Trimestre</option>
                        <option value="3" <?php echo $TrimestreNotaHabilitado=="3"?'selected="selected"':'';?>>3º Trimestre</option>
                    </select>
                </td></tr>
                <tr>
                	<td></td><td></td><td><input type="submit" value="Guardar" class="corner-all"></td>
                </tr>
            </table>
        </div>
	</div>
    </form>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>