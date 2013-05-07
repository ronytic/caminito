<?php
include_once("../../login/check.php");
include_once("../../class/docente.php");
include_once("../../class/logusuarios.php");
$titulo="Frecuencia de Acceso de Docentes";
$folder="../../";
$docente=new docente;
$logusuarios=new logusuarios;
$CodDocente=$_GET['Cod'];
$doc=array_shift($docente->mostrarDocente($CodDocente));
?>
<?php include_once("../../cabecerahtml.php"); ?>

<?php include_once("../../cabecera.php"); ?>
<div class="container_12" id="cuerpo">
	<div class="prefix_2 grid_8 suffix_2">
    <div class="titulo corner-top">Frecuencia de Acceso del Docente</div>
    <div class="cuerpo">
    	Nombre Docente:<span class="resaltar"><?php echo ucfirst($doc['Paterno'])?> <?php echo ucfirst($doc['Materno'])?> <?php echo ucfirst($doc['Nombres'])?></span>
    	<table class="tabla">
        	<tr class="cabecera"><td>Nº</td><td>Dia</td><td>Fecha Acceso</td><td>Hora Acceso</td></tr>
            <?php
			$i=0;

				foreach($logusuarios->mostrarUsoDocente($CodDocente) as $lu){$i++;
		
				
				if($restodeFecha!=0){
					$dia=$restodeFecha/60/60/24;
				}else{
					$dia=0;	
				}

			?>
            	<tr class="contenido"><td class="der"><?php echo $i;?></td><td><?php echo utf8_encode(strftime("%A",strtotime( $lu['FechaLog'])));?></td><td><?php echo date("d-m-Y",strtotime($lu['FechaLog']));?></td><td class="der"><?php echo $lu['HoraLog'];?></td></tr>
            <?php	
				}
			?>
        </table>
    </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../footer.php"); ?>