<?php
include_once("login/check.php");
include_once("class/menu.php");
include_once("class/submenu.php");
include_once("class/mensajes.php");
$titulo="Inicio";
$menu=new menu;
$submenu=new submenu;
$mensajes=new mensajes;
$Nivel=$_SESSION['Nivel'];
if($Nivel==6  || $Nivel==7){
	//header("Location:internet/alumno/");
}
$folder="./";
include_once("cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="js/portada.js"></script>
<?php
include_once($folder."cabecera.php");
?>
<div class="container_12" id="cuerpo">
	<div class="prefix_2 grid_8 suffix_2">
    	<?php
			$mensajes1=$mensajes->listarmensajes($Nivel,1);
			if(count($mensajes1)>0){
				?>
                <div class="rojoC" title="Alerta de mucho Riesgo">
        			<ul>
                <?php
				foreach( $mensajes1 as $msg){
					?><li><?php echo $msg['Mensaje'];?></li><?php
				}
				?>
                	</ul>
        		</div>
                <?php
			}
			$mensajes2=$mensajes->listarmensajes($Nivel,2);
			if(count($mensajes2)>0){
				?>
                <div class="naranjaC" title="Alerta leve">
        			<ul>
                <?php
				foreach( $mensajes2 as $msg){
					?><li><?php echo $msg['Mensaje'];?></li><?php
				}
				?>
                	</ul>
        		</div>
                <?php
			}
			$mensajes3=$mensajes->listarmensajes($Nivel,3);
			if(count($mensajes3)>0){
				?>
                <div class="verdeC" title="">
        			<ul>
                <?php
				foreach( $mensajes3 as $msg){
					?><li><?php echo $msg['Mensaje'];?></li><?php
				}
				?>
                	</ul>
        		</div>
                <?php
			}
		?>
<!--    	<div class="verdeC">
        	<ul>
            	<li>Opción Adicionado a Caja</li>
            </ul>
        </div>
-->    </div>
    <div class="clear"></div>
    <div class="prefix_9 grid_3">
    	<?php
        	if($Nivel==6  || $Nivel==7){
			?>
            <a href="internet/alumno/" class="boton corner-all" id="simple">Versión Simple</a><?php
			}
        ?>
    </div>
    <div class="clear"></div>
	<div class="grid_12">
    	<div class="cuerpo corner-all">
        	<ul class="botones">
            	<?php 
					foreach($menu->mostrar($Nivel) as $r ){
					?>
                	<li>
                    	<a href="<?php echo ($r['SubMenu']? "#" : $r['Url']);?>" class="menu" rel="<?php echo $r['CodMenu'];?>">
                            <div ><img src="images/iconos/<?php echo $r['Imagen'];?>" /></div>
                            <div class="cuerpo tituloAzul corner-all"><?php echo $r['Nombre'];?></div>
                        </a>
                    </li>    
                    <?php		
					}
				?>
            </ul>
            <div class="clear"></div>
        </div>
        
    </div><hr />
    <div class="clear"></div>
    <?php foreach($menu->mostrar($Nivel) as $r ){?>
    <div class="grid_12 oculto submenu" id="submenu<?php echo $r['CodMenu'];?>">
    	<div class="cuerpo corner-all">
        	<ul class="botones">
            	<?php 
					foreach($submenu->mostrar($_SESSION['Nivel'],$r['CodMenu']) as $reg ){
					?>
                	<li>
                    	<a href="<?php echo $r['Url'].$reg['Url'];?>" class="menu" rel="">
                            <div ><img src="images/iconos/<?php echo $reg['Imagen'];?>" /></div>
                            <div class="cuerpo tituloAzul corner-all"><?php echo $reg	['Nombre'];?></div>
                        </a>
                    </li>       
                    <?php		
					}
				?>
            </ul>
            <div class="clear"></div>
        </div>
    </div><div class="clear"></div>
    <?php
	}
	?>
    <div class="clear"></div>
</div>
<?php
include_once($folder."footer.php");
?>