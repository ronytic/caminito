<?php
include_once("../../login/check.php");
include_once("../../class/rude.php");
include_once("../../class/curso.php");
if(!empty($_GET)){
	$CodAlumno=$_GET['CodAlumno'];
	$rude=new rude;
	$cur=new curso;
	$alu=$rude->mostrarDatos($CodAlumno);
	$alu=array_shift($alu);
	?>	
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::<?php echo $titulo;?> | <?php echo $title?>::.</title>
<link href="../../css/960/960.css" type="text/css" rel="stylesheet" media="all"/>
<link href="../../css/core.css" type="text/css" rel="stylesheet" media="all"/>
<link rel="stylesheet" type="text/css" href="../../css/ui/jquery.ui.all.css"/>
<script language="javascript" type="application/javascript" src="../../js/jquery.js"></script>
</head>
<body>
<?php
include_once("../../cabecera.php");
?>
	<div class="container_12" id="cuerpo">
    <div class="grid_12">
    <form action="guardarRude.php" method="post" onsubmit="javascript:return false;if(confirm('¿Esta seguro de Guardar los Datos?'))">
		<input type="hidden" name="CodAlumno" value="<?php echo $CodAlumno;?>" />
        Todos los datos en Mayusculas
    	<div class="titulo">Datos del Estudiante</div>
        <div class="cuerpo">
	    	<table class="tablaSB">
            	<tr><td>Apellido Paterno</td><td>::</td><td><input type="text" name="paterno" value="<?php echo mb_strtoupper($alu['Paterno'],"utf8");?>" /></td></tr>
                <tr><td>Apellido Materno</td><td>::</td><td><input type="text" name="materno" value="<?php echo mb_strtoupper($alu['Materno'],"utf8");?>" /></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombres" value="<?php echo mb_strtoupper($alu['Nombres'],"utf8");?>" /></td></tr>
                <tr><td>RUDE</td><td>::</td><td><input type="text" name="rude" value="<?php echo mb_strtoupper($alu['CodigoRude'],"utf8");?>" /></td></tr>
                <tr><td>Cedula de Identidad</td><td>::</td><td><input name="numeroDoc" type="text" id="numeroDoc" value="<?php echo mb_strtoupper($alu['NumeroDoc'],"utf8");?>" /></td></tr>
                <tr><td>Fecha de Nacimiento</td><td>::</td><td><input name="fechaNac" type="text" id="fechaNac" value="<?php echo mb_strtoupper($alu['FechaNac'],"utf8");?>" /></td></tr>
                <tr><td>SEXO</td><td>::</td><td><select name="sexo"><option value="0" <?php echo !$alu['Sexo']?'selected="selected"':'';?>>Femenino</option><option value="1"<?php echo $alu['Sexo']?'selected="selected"':'';?>>Masculino</option></select></td></tr>
                <tr><td>Certificado de Nacimiento</td><td></td><td></td></tr>
    	    	<tr><td>Pais</td><td>::</td><td><input type="text" name="paisNacA" value="<?php echo mb_strtoupper($alu['PaisN'],"utf8");?>" /></td></tr>
                <tr><td>Departamento</td><td>::</td><td><input type="text" name="departamentoNacA" value="<?php echo mb_strtoupper($alu['DepartamentoN'],"utf8");?>" /></td></tr>
                <tr><td>Provincia</td><td>::</td><td><input type="text" name="provinciaNacA" value="<?php echo mb_strtoupper($alu['ProvinciaN'],"utf8");?>" /></td></tr>
                <tr><td>Localidad</td><td>::</td><td><input type="text" name="localidadNacA" value="<?php echo mb_strtoupper($alu['LocalidadN'],"utf8");?>" /></td></tr>
                <tr><td>Oficialia Nº</td><td>::</td><td><input type="text" name="oficialiaA" value="<?php echo mb_strtoupper($alu['CertOfi'],"utf8");?>"/></td></tr>
                <tr><td>Libro Nº</td><td>::</td><td><input type="text" name="libroA" value="<?php echo mb_strtoupper($alu['CertLibro'],"utf8");?>"/></td></tr>
                <tr><td>Partida Nº</td><td>::</td><td><input type="text" name="partidaA" value="<?php echo mb_strtoupper($alu['CertPartida'],"utf8");?>"/></td></tr>
                <tr><td>Folio Nº</td><td>::</td><td><input type="text" name="folioA" value="<?php echo mb_strtoupper($alu['CertFolio'],"utf8");?>"/></td></tr>
        	</table>
        </div>
        <div class="titulo">Datos Inscripción Actual</div>
        <div class="cuerpo">
	    	<table class="tablaSB">
            	<tr><td>Curso</td><td>::</td><td><select name="curso">
								<?php foreach($cur->listar() as $curso){?><option value="<?php echo $curso['CodCurso'];?>" <?php if($alu['NivelEstudiante']==$curso['CodCurso']){echo 'selected="selected"';}?></option><?php echo mb_strtoupper($curso['Nombre'],"utf8");?></option><?php }?></select></td></tr>
    	    	<tr><td>Codigo SIE, Colegio Anterior</td><td>::</td><td><input type="text" name="codigoSIEA" value="<?php echo mb_strtoupper($alu['CodigoSie'],"utf8");?>" /></td></tr>
                <tr><td>Nombre Colegio Anterior</td><td>::</td><td><input type="text" name="unidadEducativaA" value="<?php echo mb_strtoupper($alu['NombreUnidad'],"utf8");?>" /></td></tr>
        	</table>
        </div>
        <div class="titulo">Dirección Actual del Estudiante</div>
        <div class="cuerpo">
	    	<table class="tablaSB">
    	    	<tr><td>Provincia</td><td>::</td><td><input type="text" name="provinciaA" value="<?php echo mb_strtoupper($alu['ProvinciaE'],"utf8");?>" /></td></tr>
                <tr><td>Sección</td><td>::</td><td><input type="text" name="seccionA" value="<?php echo mb_strtoupper($alu['MunicipioE'],"utf8");?>"/></td></tr>
                <tr><td>Localidad</td><td>::</td><td><input type="text" name="localidadA" value="<?php echo mb_strtoupper($alu['ComunidadE'],"utf8");?>"/></td></tr>
                <tr><td>Zona</td><td>::</td><td><input type="text" name="zonaA" value="<?php echo mb_strtoupper($alu['ZonaE'],"utf8");?>"/></td></tr>
                <tr><td>Calle</td><td>::</td><td><input type="text" name="calleA" value="<?php echo mb_strtoupper($alu['AvenidaE'],"utf8");?>"/></td></tr>
                <tr><td>Numero</td><td>::</td><td><input type="text" name="numeroViviendaA" value="<?php echo mb_strtoupper($alu['NumeroE'],"utf8");?>"/></td></tr>
                <tr><td>Teléfono</td><td>::</td><td><input type="text" name="telefonoA" value="<?php echo mb_strtoupper($alu['TelefonoE'],"utf8");?>"/></td></tr>
        	</table>
        </div>
        <div class="titulo">Aspectos Sociales</div>
        <div class="cuerpo">
	    	<table class="tablaSB">
    	    	<tr><td colspan="3">Idiomas</td></tr>
                <tr><td>Lengua Materna</td><td>::</td><td><select name="lenguaMaterna"><option value="CASTELLANO" selected="selected">CASTELLANO</option><option value="AYMARA">AYMARA</option><option value="INGLES">INGLES</option></select></td></tr>
                <tr class="contenido"><td>Lenguas del Estudiantes</td><td>::</td><td>
                	Castellano<select name="lenguaCastellano"><option value="1" selected="selected">SI</option><option value="0">NO</option></select> 
                	Ingles<select name="lenguaIngles"><option value="1">SI</option><option value="0" selected="selected">NO</option></select><br />
                    Aymara<select name="lenguaAymara"><option value="1">SI</option><option value="0" selected="selected">NO</option></select>
                    </td></tr>
                <tr><td>Se Identifica</td><td>::</td><td><select name="identificaA"><option value="MESTIZO" selected="selected">MESTIZO</option><option value="AYMARA">AYMARA</option><option value="QUECHUA">QUECHUA</option></select></td></tr>
                <tr><td colspan="3">Salud</td></tr>
                <tr><td>¿Tiene un Centro de Salud a su Alrededor?</td><td>::</td><td><select name="centroSalud"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
                <tr><td>¿Cuantas veces acudió el año pasado?</td><td>::</td><td><select name="vecesSalud"><option value="1a2">1 a 2 veces</option><option value="3a5">3 a 5 veces</option><option value="6a+">6 o más veces</option><option value="ninguna">Ninguna</option></select></td></tr>
                <tr><td>Discapacidad o Deficiencia Mental</td><td>::</td><td><select name="deficiencia"><option value="1">SI</option><option value="0" selected="selected">NO</option></select></td></tr>
                <tr><td colspan="3">Acceso de Servicios Basicos</td></tr>
                <tr><td>Agua Potable a Domicilio</td><td>::</td><td><select name="aguaPotable"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
                <tr><td>Electricidad Red Publica</td><td>::</td><td><select name="electricidad"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
                <tr><td>Alcantarillado</td><td>::</td><td><select name="alcantarillado"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
                <tr><td>¿El estudiante trabaja?</td><td>::</td><td><select name="trabaja" ><option value="NOTRABAJA" selected="selected">NO TRABAJA</option><option value="EMPLEADO">EMPLEADO</option><option value="INDEPENDIENTE" >INDEPENDIENTE</option><option value="DOMESTICOCASA" >TRABAJO DOMESTICO EN CASA</option></select></td></tr>
                <tr><td>¿El estudiante tiene acceso a?</td><td>::</td><td>
                    ¿Internet en casa?<select name="internet" id="internet"><option value="1">SI</option><option value="0">NO</option></select>
                    </td></tr>
                <tr><td>¿El estudiante se traslada en?</td><td>::</td><td><select name="traslado"><option value="APIE" selected="selected">A PIE</option><option value="MINIBUS">MINIBUS</option></select></td></tr>
                <tr><td>Tiempo que tarda el Estudiante</td><td>::</td><td><input type="text" name="tiempo" value="Menos de media Hora" readonly="readonly"/></td></tr>
        	</table>
        </div>
        <div class="titulo">Datos del Padre o Tutor</div>
        <div class="cuerpo">
        	<table class="tablaSB">
           	 	<tr><td>Cedula de Identidad</td><td>::</td><td><input type="text" name="CedulaPadre" value="<?php echo mb_strtoupper($alu['CedulaPadre'],"utf8");?>"/></td></tr>
            	<tr><td>Apellidos</td><td>::</td><td><input type="text" name="ApellidosP" value="<?php echo mb_strtoupper($alu['ApellidosP'],"utf8");?>"/></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombresP" value="<?php echo mb_strtoupper($alu['NombresP'],"utf8");?>"/></td></tr>
                <tr><td>Ocupación Laboral</td><td>::</td><td><input type="text" name="ocupacionP" value="<?php echo mb_strtoupper($alu['OcupacionP'],"utf8");?>"/></td></tr>
                <tr><td>Mayor Grado de Instrucción </td><td>::</td><td><select name="instruccionP">
                	<option value="NINGUNA">NINGUNA</option>
                    <option value="PRIMARIA">PRIMARIA</option>
                    <option value="SECUNDARIA">SECUNDARIA</option>
                    <option value="TECNICO MEDIO">TECNICO MEDIO</option>
                    <option value="TECNICO SUPERIOR">TECNICO SUPERIOR</option>
                    <option value="NORMALISTA">NORMALISTA</option>
                    <option value="LICENCIATURA">LICENCIATURA</option>
                    <option value="CARRERA MILITAR">CARRERA MILITAR</option>
                    <option value="POSTGRADO">POSTGRADO</option>
                    <option value="BACHILLER">BACHILLER</option>
                    <option value="UNIVERSITARIO">UNIVERSITARIO</option>
                    <option value="NO SABE/NO RESPONDE">NO SABE/ NO RESPONDE</option>
                    </select></td></tr>
                <tr><td>Idioma que habla con frecuencia</td><td>::</td><td><input type="text" name="idiomaP" value="CASTELLANO"/></td></tr>
                <tr><td>Telefono del Padre</td><td>::</td><td><input type="text" name="telefonoP" value="<?php echo mb_strtoupper($alu['TelfP'],"utf8");?>"/></td></tr>
                <tr><td>Grado de Parentesco </td><td>::</td><td><select name="parentescoP">
                	<option value="---">---</option>
                    <option value="PADRE">PADRE</option>
                    <option value="ABUELO">ABUELO</option>
                    <option value="ABUELA">ABUELA</option>
                    <option value="TIO">TIO</option>
                    <option value="TIA">TIA</option>
                    <option value="HERMANO">HERMANO</option>
                    <option value="TUTOR">TUTOR</option>
                    </select></td></tr>
            </table>
        </div>
        <div class="titulo">Datos del Madre</div>
        <div class="cuerpo">
        	<table class="tablaSB">
            	<tr><td>Cedula de Identidad</td><td>::</td><td><input name="CedulaMadre" type="text" id="CedulaMadre" value="<?php echo mb_strtoupper($alu['CedulaMadre']." ".$alu['CiExtM'],"utf8");?>"/></td></tr>
            	<tr><td>Apellidos de la Madres</td><td>::</td><td><input type="text" name="paternoM" value="<?php echo mb_strtoupper($alu['ApellidosM'],"utf8");?>"/></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombresM" value="<?php echo mb_strtoupper($alu['NombresM'],"utf8");?>"/></td></tr>
                <tr><td>Ocupación Laboral</td><td>::</td><td><input type="text" name="ocupacionM" value="<?php echo mb_strtoupper($alu['OcupacionM'],"utf8");?>"/></td></tr>
                <tr><td>Mayor Grado de Instrucción </td><td>::</td><td><select name="instruccionM">
                	<option value="NINGUNA">NINGUNA</option>
                    <option value="PRIMARIA">PRIMARIA</option>
                    <option value="SECUNDARIA">SECUNDARIA</option>
                    <option value="TECNICO MEDIO">TECNICO MEDIO</option>
                    <option value="TECNICO SUPERIOR">TECNICO SUPERIOR</option>
                    <option value="NORMALISTA">NORMALISTA</option>
                    <option value="LICENCIATURA">LICENCIATURA</option>
                    <option value="CARRERA MILITAR">CARRERA MILITAR</option>
                    <option value="POSTGRADO">POSTGRADO</option>
                    <option value="BACHILLER">BACHILLER</option>
                    <option value="UNIVERSITARIO">UNIVERSITARIO</option>
                    <option value="NO SABE/NO RESPONDE">NO SABE/ NO RESPONDE</option>
                    </select></td></tr>
                <tr><td>Idioma que habla con frecuencia</td><td>::</td><td><input type="text" name="idiomaM" value="CASTELLANO"/></td></tr>
                <tr><td>Telefono del Madre</td><td>::</td><td><input type="text" name="telefonoM" value="<?php echo mb_strtoupper($alu['TelfM'],"utf8");?>"/></td></tr>
                <tr><td><input type="submit" value="Guardar Datos Rude" class="corner-all"/></td><td></td><td></td></tr>
            </table>
            
        </div>
    </form>
    </div>
    <div class="clear"></div>
    </div>
    </body>
    </html>
    <?php
}

?>