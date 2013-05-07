<?php
include_once("../../login/check.php");
include_once("../../class/docentemateriacurso.php");
$docentemateriacurso=new docentemateriacurso;
$cod=$_POST['Cod'];
$docentemateriacurso->eliminar($cod);
?>