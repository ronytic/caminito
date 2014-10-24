<?php
include_once("../../login/check.php");
$titulo="Boletín de Notas";
$folder="../../";
$jsFile="notas/notainicial.js";
$subtitulo="Boletín";
$SoloDocente=1;
$CodDocente=$_SESSION['CodDocente'];
include_once("../../listar/listado.php");
?>