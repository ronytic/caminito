<?php
session_start();
include_once("../login/check.php");
include_once("../config.php");
include_once("../class/menu.php");
include_once("../class/submenu.php");
$titulo="Inscripción";
$menu=new menu;
$submenu=new submenu;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Inicio | <?php echo $title?>::.</title>
<link href="css/960/960.css" type="text/css" rel="stylesheet" media="all"/>
<link href="css/core.css" type="text/css" rel="stylesheet" media="all"/>
<script language="javascript" type="application/javascript" src="js/jquery.js"></script>
<script language="javascript" type="application/javascript" src="js/portada.js"></script>
</head>
<body>
<?php
include_once("../cabecera.php");
?>
<div class="container_12" id="cuerpo">
	<div class="grid_12">
		
    </div>
    <div class="clear"></div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>