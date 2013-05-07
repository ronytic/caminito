<?php
include_once("../../login/check.php");
if(!empty($_POST) && $_POST['lock']==md5("lock")){
	?>
    <a href="../../impresion/notas/promediocurso.php?CodCurso=<?php echo $_POST['CodCurso']?>&Trimestre=<?php echo  $_POST['Trimestre']?>&Orden=<?php echo $_POST['Orden']?>&lock=dce7c4174ce9323904a934a486c41288" class="boton">Abrir Reporte en Grande</a>
    <hr />
    <iframe src="../../impresion/notas/promediocurso.php?CodCurso=<?php echo $_POST['CodCurso']?>&Trimestre=<?php echo  $_POST['Trimestre']?>&Orden=<?php echo $_POST['Orden']?>&lock=dce7c4174ce9323904a934a486c41288
" width="750" height="750"></iframe>
<?php
}
?>