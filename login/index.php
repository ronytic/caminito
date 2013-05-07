<?php
include_once("../class/config.php");
$config=new configuracion;
$cnf=array_shift($config->mostrarConfig("Titulo"));
$title=$cnf["Valor"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Acceso al Sistema | <?php echo $title;?>::.</title>
<link href="../css/960/960.css" type="text/css" rel="stylesheet" media="all" />
<link href="../css/core.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<link rel="shortcut icon" href="../images/csb.ico" />
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/login.js"></script>
</head>
<body>
<div class="container_12">
    <div class="prefix_4 grid_4 suffix_4">
		<div id="formLogin" class="corner-all">

        	<div class="titulo">Acceso al sistema</div>
            <div></div>
            <div class="cuerpo">
            	<?php
				if(!empty($_GET['incompleto'])){
				?>
            	<div class="rojoC">Por favor introdusca TODOS los DATOS</div>
                <?php
				}
				if(!empty($_GET['error'])){
				?>
            	<div class="naranjaC">El USUARIO o la CONTRASEÑA con incorrectos, verifique e intente nuevamente</div>
                <?php
				}
				?>
            	<form action="login.php" method="post" id="login">
               		<input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="campos"/><br />
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass"  class="campos"/><br />
                    <input type="submit" value="Ingresar" class="corner-all" />
                </form>
            </div>
        </div>    
    </div>
    <div class="clear"></div>
</div>
</body>
</html>