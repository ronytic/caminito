<?php
include_once("../../login/check.php");
include_once("../../class/docente.php");
include_once("../../class/logusuarios.php");
$titulo="Frecuencia de Acceso de Docentes";
$folder="../../";
$docente=new docente;
$logusuarios=new logusuarios;
?>
<?php include_once("../../cabecerahtml.php"); ?>

<?php include_once("../../cabecera.php"); ?>
<div class="container_12" id="cuerpo">
	<div class="prefix_2 grid_8 suffix_2">
    <div class="titulo corner-top">Frecuencia de Acceso del Docente</div>
    <div class="cuerpo">
    	<table class="tabla">
        	<tr class="cabecera"><td>Nº</td><td>Docente</td><td>Cantidad de Acceso Uso</td><td>Fecha de Ultimo Acceso</td></tr>
            <?php
			$i=0;
            foreach($docente->listar() as $doc){
				$i++;
				$lu=$logusuarios->mostrarUsoDocente($doc['CodDocente']);
				$Cantidad=count($lu);
				$lu=array_shift($lu);
				$restodeFecha=strtotime(date("Y-m-d"))-strtotime($lu['FechaLog']);
				if($restodeFecha!=0){
					$dia=$restodeFecha/60/60/24;
				}else{
					$dia=0;	
				}

			?>
            	<tr class="contenido <?php if($dia>5)echo "rojo";elseif($dia>2) echo "naranja";else echo "verde"?>"><td><?php echo $i;?></td><td><?php echo $doc['Paterno']?> <?php echo $doc['Materno']?> <?php echo $doc['Nombres']?></td><td class="der"><?php echo $Cantidad;?></td><td class="der"><?php echo $lu['FechaLog'];?></td><td><a class="botonSec" href="fechas.php?Cod=<?php echo $doc['CodDocente']?>">Ver Fechas</a></td></tr>
            <?php	
			}
			?>
        </table>
    </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../footer.php"); ?>