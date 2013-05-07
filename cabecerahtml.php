<?php
if(!defined("Config")){
	include_once("class/config.php");
}
if(!isset($config)){
	$config=new configuracion;
}
$cnf=array_shift($config->mostrarConfig("Titulo"));
$title=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("Sigla"));
$sigla=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("Icono"));
$icono=$cnf['Valor'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta http-equiv="Pragma" content="no-cache">--> 
<title>.::<?php echo $titulo?> | <?php echo $title?>::.</title>
<link href="<?php echo $folder?>css/960/960.css" type="text/css" rel="stylesheet" media="all"/>
<link href="<?php echo $folder?>css/core.css" type="text/css" rel="stylesheet" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $folder?>css/ui/jquery.ui.all.css"/>
<link rel="shortcut icon" href="<?php echo $folder?>images/<?php echo $icono?>" />
<script language="javascript" type="text/javascript" src="<?php echo $folder?>js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.nicescroll.min	.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder?>js/ui/jquery.ui.core.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder?>js/ui/jquery.ui.datepicker.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder?>js/cargadortotal.js"></script>