<?php
include_once("../../login/check.php");
if(!empty($_GET)){
	$CodAlumno= $_GET['CodAlumno'];
	$CodCurso=$_GET['CodCurso'];
	$Bimestre=$_GET['Bimestre'];
	
	$archivo="../../impresion/notas/boletin.php?CodAlumno=".$CodAlumno."&CodCurso=".$CodCurso."&mf=".md5("lock")."&Bimestre=".$_GET['Bimestre'];
	?>
	<style type="text/css">
    .botonsec{
		border: #999999 1px solid;
background-color: #e9e8e8;
padding: 1px 2px 1px 2px;
margin: 3px 1px 3px 1px;
color: #000000;
text-decoration: none;
box-shadow: #999 1px 1px 5px;
cursor: pointer !important;
display: inline-block;
	}
    </style>
    <br>
    <a href="<?php echo $archivo?>" class="botonSec corner-all" target="_blank">Boletin en grande</a> 
    <!--<a href="#" class="botonSec" id="registrarimpresion">Registrar Impresión</a>-->
    <hr />
    <iframe width="430" height="400" src="<?php echo $archivo?>"></iframe>
    <div id="respuestaimpresiones"></div>
    <?php
}
?>