<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
if($_SESSION['CodUsuarioLog']){
	$titulo="Datos del alumno";
	$folder="../../";
	$CodAlumno=$_SESSION['CodUsuarioLog'];
	$alumno=new alumno;
	$curso=new curso;
	$al=$alumno->mostrarDatos($CodAlumno);
	$al=array_shift($al);
	$cur=$curso->mostrarCurso($al['CodCurso']);
	$cur=array_shift($cur);
	?>
   <?php include_once($folder."cabecerahtml.php");?>
</head>
<body>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_1 grid_5">
		<div class="titulo corner-tl corner-tr">Datos del Alumno</div>
        <div class="cuerpo">
        	
        	<table>
                <tr><td class="der">Curso</td><td>::</td><td><?php echo $cur['Nombre']?></td></tr>
                <tr><td class="der">Apellido Paterno</td><td>::</td><td><input type="text" size="30" readonly="readonly" value="<?php echo $al['Paterno'];?>"/></td></tr>
                <tr><td class="der">Apellido Materno</td><td>::</td><td><input type="text" size="30"  readonly="readonly" value="<?php echo $al['Materno'];?>"/></td></tr>
                <tr><td class="der">Nombres</td><td>::</td><td><input type="text" size="30" readonly="readonly" value="<?php echo $al['Nombres'];?>" /></td></tr>
                <tr><td class="der">Sexo</td><td>::</td><td><input type="text" readonly="readonly" value="<?php echo $al['Sexo']?'Hombre':'Mujer';?>" /></td></tr>
                <tr><td class="der">Fecha de Nacimiento</td><td>::</td><td><input type="text" size="10" readonly="readonly" value="<?php echo $al['FechaNac'];?>"/>(aaaa-mm-dd)</td></tr>
                <tr><td class="der">Cedula de Identidad</td><td>::</td><td><input type="text" readonly="readonly" value="<?php echo $al['Ci'];?>"/></td></tr>
                <tr><td class="der">Zona</td><td>::</td><td><input type="text"  id="Zona" size="30" readonly="readonly" value="<?php echo $al['Zona'];?>"/></td></tr>
                <tr><td class="der">Calle</td><td>::</td><td><input type="text"  id="Zona" size="30" readonly="readonly" value="<?php echo $al['Calle'];?>"/></td></tr>
                <tr><td class="der">Número</td><td>::</td><td><input type="text"  id="Zona" size="30" readonly="readonly" value="<?php echo $al['Numero'];?>"/></td></tr>
                <tr><td class="der">Teléfono Casa</td><td>::</td><td><input type="text" size="30" readonly="readonly" value="<?php echo $al['TelefonoCasa'];?>"/></td></tr>
            </table>
        </div>
        <div class="cuerpo">
        	<table>
                 <tr><td class="der">Rude</td><td>::</td><td><input type="text" name="Rude" readonly="readonly" value="<?php echo $al['Rude'];?>"/></td></tr>
             </table>
        </div>
    </div>
    <div class="grid_6">
    	<div class="titulo corner-tl corner-tr">Datos del Padre de Familia</div>
        <div class="cuerpo">
        	<table>
            	<tr><td class="der">Nombres del Padre</td><td>::</td><td><input type="text" size="50" value="<?php echo $al['ApellidosPadre'];?> <?php echo $al['NombrePadre'];?>" readonly="readonly"/></td></tr>

                <tr><td class="der">C.I. Padre</td><td>::</td><td><input type="text" readonly="readonly" value="<?php echo $al['CiPadre'];?>"/></td></tr>
                <tr><td class="der">Nombres de la Madre</td><td>::</td><td><input type="text" size="50" value="<?php echo $al['ApellidosMadre'];?> <?php echo $al['NombreMadre'];?>" readonly="readonly"/></td></tr>
               	
                <tr><td class="der">C.I.Madre</td><td>::</td><td><input type="text" name="CiMadre" id="CiMadre" readonly="readonly" value="<?php echo $al['CiMadre'];?>"/></td></tr>
           </table>
        </div>
        <div class="cuerpo">
        	<table>
            	<tr><td class="der">NIT</td><td>::</td><td><input type="text" size="30" readonly="readonly" value="<?php echo $al['Nit'];?>"/></td></tr>
                <tr><td class="der">Nombre a Facturar</td><td>::</td><td><input type="text" size="30" readonly="readonly" value="<?php echo $al['FacturaA'];?>"/></td></tr>
          		
            </table>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>
<?php
}
?>