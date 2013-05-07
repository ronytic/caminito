<?php
if(empty($titulo)){$titulo=""; }
include_once("class/usuarios.php");
$usuarios= new usuarios;

$CodUsuario=$_SESSION['CodUsuarioLog'];
$Nivel=$_SESSION['Nivel'];
switch($Nivel){
	case 1:{$datosUsuario=$usuarios->mostrarDatos($CodUsuario);
			$datosUsuario=array_shift($datosUsuario);
			$Apodo=$datosUsuario['Nick'];	
	}break;
	case 2:{$datosUsuario=$usuarios->mostrarDatos($CodUsuario);
			$datosUsuario=array_shift($datosUsuario);
			$Apodo=$datosUsuario['Nick'];	
	}break;
	case 3:{$datosUsuario=$usuarios->mostrarDatos($CodUsuario);
			$datosUsuario=array_shift($datosUsuario);
			$Apodo="Docente";	
	}break;
	case 4:{$datosUsuario=$usuarios->mostrarDatos($CodUsuario);
			$datosUsuario=array_shift($datosUsuario);
			$Apodo=$datosUsuario['Nick'];
	}break;
	case 5:{$datosUsuario=$usuarios->mostrarDatos($CodUsuario);
			$datosUsuario=array_shift($datosUsuario);
			$Apodo=$datosUsuario['Nick'];
	}break;
}
$Paterno=$datosUsuario['Paterno'];
$Materno=$datosUsuario['Materno'];
$Nombres=$datosUsuario['Nombres'];

?>
</head>
<body>
<div class="container_12 corner-tl corner-tr" id="cabecera">
	<div class="grid_6"><?php echo $title;?> | <?php echo $titulo;?></div>
    <div class="grid_2"><div class="cargando corner-all" id="cargando"></div></div>
    <div class="grid_3 der"><span title="<?php echo $Paterno;?> <?php echo $Materno;?> <?php echo $Nombres;?>"><?php echo $Apodo;?></span></div>
    <div class="grid_3 der">
    	<ul class="menu">
        	<li><a href="<?php echo $url.$directory;?>">Inicio</a></li>
        	<?php /*
            <li><a href="#">Venta</a>
        	<ul>
        		<li><a href="<?php echo $url.$directory;?>/venta/rapida.php">Rapida</a></li>
                <li><a href="<?php echo $url.$directory;?>/venta/normal.php">Normal</a></li>
                <li><a href="<?php echo $url.$directory;?>/venta/listaVenta.php">Lista de Ventas</a></li>
            </ul>
            </li>
            <li><a href="#">Inventario</a>
        	<ul>
        		<li><a href="<?php echo $url.$directory;?>/inventario/nuevo.php">Nuevo</a></li>
                <li><a href="<?php echo $url.$directory;?>/inventario/listarProductos.php">Modificar</a></li>
                <li><a href="<?php echo $url.$directory;?>/inventario/listarProductos.php">Recargar</a></li>
            </ul>
            </li>
             <li><a href="#">Credito</a>
        	<ul>
        		<li><a href="<?php echo $url.$directory;?>/credito/nuevo.php">Nuevo</a></li>
                <li><a href="<?php echo $url.$directory;?>/credito/listar.php">Ver</a></li>
                <li><a href="<?php echo $url.$directory;?>/credito/listar.php">Pagar</a></li>
            </ul>
            </li>-->
			*/?>
            <li><a href="<?php echo $url.$directory;?>login/logout.php">Salir</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>