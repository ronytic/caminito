<?php
include_once("../../login/check.php");
include_once("../../class/rude.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
if(!empty($_POST['CodAlumno'])){
	$CodAlumno=$_POST['CodAlumno'];
	$rude=new rude;
	$alumno=new alumno;
	$cur=new curso;
	$alu=$rude->mostrarDatos($CodAlumno);
	$al=$alumno->mostrarDatos($CodAlumno);
	$alu=array_shift($alu);
	$al=array_shift($al);
if(count($alu)<=0){
		echo "Este Rude no esta Registrado, Registrelo antes de poder editarlo";
		exit();
	}

	?>	
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <form action="actualizarRude.php" method="post" onsubmit="javascript:return false;if(confirm('¿Esta seguro de Guardar los Datos?'))">
		<input type="hidden" name="CodAlumno" value="<?php echo $CodAlumno;?>" />
        Todos los datos en Mayusculas
    	<div class="titulo">Datos del Estudiante</div>
        <div class="cuerpo">
	    	<table class="tablaSB">
            	<tr><td>Apellido Paterno</td><td>::</td><td><input type="text" name="paterno" value="<?php echo mb_strtoupper($al['Paterno'],"utf8");?>" /></td></tr>
                <tr><td>Apellido Materno</td><td>::</td><td><input type="text" name="materno" value="<?php echo mb_strtoupper($al['Materno'],"utf8");?>" /></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombres" value="<?php echo mb_strtoupper($al['Nombres'],"utf8");?>" /></td></tr>
                <tr><td>RUDE</td><td>::</td><td><input type="text" name="rude" value="<?php echo mb_strtoupper($al['Rude'],"utf8");?>" /></td></tr>
                <tr><td>Cedula de Identidad</td><td>::</td><td><input name="numeroDoc" type="text" id="numeroDoc" value="<?php echo mb_strtoupper($al['Ci'],"utf8");?>" /></td></tr>
                <tr><td>Fecha de Nacimiento</td><td>::</td><td><input name="fechaNac" type="text" id="fechaNac" value="<?php echo mb_strtoupper($al['FechaNac'],"utf8");?>" /></td></tr>
                <tr><td>SEXO</td><td>::</td><td><select name="sexo"><option value="0" <?php echo !$al['Sexo']?'selected="selected"':'';?>>Femenino</option><option value="1"<?php echo $al['Sexo']?'selected="selected"':'';?>>Masculino</option></select></td></tr>
                <tr><td>Certificado de Nacimiento</td><td></td><td></td></tr>
    	    	<tr><td>Pais</td><td>::</td><td><input type="text" name="paisNacA" value="<?php echo mb_strtoupper($alu['PaisN'],"utf8");?>" /></td></tr>
                <tr><td>Departamento</td><td>::</td><td><input type="text" name="departamentoNacA" value="<?php echo mb_strtoupper($al['LugarNac'],"utf8");?>" /></td></tr>
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
								<?php foreach($cur->listar() as $curso){?><option value="<?php echo $curso['CodCurso'];?>" <?php if($al['CodCurso']==$curso['CodCurso']){echo 'selected="selected"';}?></option><?php echo mb_strtoupper($curso['Nombre'],"utf8");?></option><?php }?></select></td></tr>
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
                <tr><td>Zona</td><td>::</td><td><input type="text" name="zonaA" value="<?php echo mb_strtoupper($al['Zona'],"utf8");?>"/></td></tr>
                <tr><td>Calle</td><td>::</td><td><input type="text" name="calleA" value="<?php echo mb_strtoupper($al['Calle'],"utf8");?>"/></td></tr>
                <tr><td>Numero</td><td>::</td><td><input type="text" name="numeroViviendaA" value="<?php echo mb_strtoupper($al['Numero'],"utf8");?>"/></td></tr>
                <tr><td>Teléfono</td><td>::</td><td><input type="text" name="telefonoA" value="<?php echo mb_strtoupper($al['TelefonoCasa'],"utf8");?>"/></td></tr>
                <tr><td>Celular</td><td>::</td><td><input type="text" name="celularA" value="<?php echo mb_strtoupper($al['Celular'],"utf8");?>"/></td></tr>
        	</table>
        </div>
        <div class="titulo">Aspectos Sociales</div>
        <div class="cuerpo">
	    	<table class="tablaSB">
    	    	<tr><td colspan="3">Idiomas</td></tr>
                <tr><td>Lengua Materna</td><td>::</td><td><input type="text" name="lenguaMaterna" value="<?php echo $alu['LenguaMater']?>" /></td></tr>
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
                <tr><td>¿El estudiante tiene acceso a Internet?</td><td>::</td><td>
                    	<select name="internet" id="internet">
                    	<option value="4" <?php echo $alu['InternetCasa']=='4'?'selected="selected"':'';?>>No Accede a Internet</option>
                        <option value="1" <?php echo $alu['InternetCasa']=='1'?'selected="selected"':'';?>>Su Domicilio</option>
                        <option value="2" <?php echo $alu['InternetCasa']=='2'?'selected="selected"':'';?>>En la Unidad Educativa</option>
                        <option value="3" <?php echo $alu['InternetCasa']=='3'?'selected="selected"':'';?>>Lugares Públicos</option> 
                        </select>
                    </td></tr>
                <tr><td>¿El estudiante se traslada en?</td><td>::</td><td><select name="traslado"><option value="APIE" <?php echo $alu['Transporte']=="APIE"?'selected="selected"':'';?>>A PIE</option><option value="MINIBUS" <?php echo $alu['Transporte']=="MINIBUS"?'selected="selected"':'';?>>MINIBUS</option></select></td></tr>
                <tr><td>Tiempo que tarda el Estudiante</td><td>::</td><td><input type="text" name="tiempo" value="Menos de media Hora" readonly="readonly"/></td></tr>
        	</table>
        </div>
        <div class="titulo">Datos del Padre o Tutor</div>
        <div class="cuerpo">
        	<table class="tablaSB">
           	 	<tr><td>Cedula de Identidad</td><td>::</td><td><input type="text" name="CedulaPadre" value="<?php echo mb_strtoupper($al['CiPadre'],"utf8");?>"/></td></tr>
            	<tr><td>Apellidos</td><td>::</td><td><input type="text" name="ApellidosP" value="<?php echo mb_strtoupper($al['ApellidosPadre'],"utf8");?>"/></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombresP" value="<?php echo mb_strtoupper($al['NombrePadre'],"utf8");?>"/></td></tr>
                <tr><td>Ocupación Laboral</td><td>::</td><td><input type="text" name="ocupacionP" value="<?php echo mb_strtoupper($al['OcupPadre'],"utf8");?>"/></td></tr>
                <tr><td>Mayor Grado de Instrucción </td><td>::</td><td><select name="instruccionP">
                	<option value="NINGUNA" <?php echo $alu['InstruccionP']=="NINGUNA"?'selected="selected"':'';?>>NINGUNA</option>
                    <option value="PRIMARIA" <?php echo $alu['InstruccionP']=="PRIMARIA"?'selected="selected"':'';?>>PRIMARIA</option>
                    <option value="SECUNDARIA" <?php echo $alu['InstruccionP']=="SECUNDARIA"?'selected="selected"':'';?>>SECUNDARIA</option>
                    <option value="TECNICO MEDIO" <?php echo $alu['InstruccionP']=="TECNICO MEDIO"?'selected="selected"':'';?>>TECNICO MEDIO</option>
                    <option value="TECNICO SUPERIOR" <?php echo $alu['InstruccionP']=="TECNICO SUPERIOR"?'selected="selected"':'';?>>TECNICO SUPERIOR</option>
                    <option value="NORMALISTA" <?php echo $alu['InstruccionP']=="NORMALISTA"?'selected="selected"':'';?>>NORMALISTA</option>
                    <option value="LICENCIATURA" <?php echo $alu['InstruccionP']=="LICENCIATURA"?'selected="selected"':'';?>>LICENCIATURA</option>
                    <option value="CARRERA MILITAR" <?php echo $alu['InstruccionP']=="CARRERA MILITAR"?'selected="selected"':'';?>>CARRERA MILITAR</option>
                    <option value="POSTGRADO" <?php echo $alu['InstruccionP']=="POSTGRADO"?'selected="selected"':'';?>>POSTGRADO</option>
                    <option value="BACHILLER" <?php echo $alu['InstruccionP']=="BACHILLER"?'selected="selected"':'';?>>BACHILLER</option>
                    <option value="UNIVERSITARIO" <?php echo $alu['InstruccionP']=="UNIVERSITARIO"?'selected="selected"':'';?>>UNIVERSITARIO</option>
                    <option value="NO SABE/NO RESPONDE" <?php echo $alu['InstruccionP']=="NO SABE/NO RESPONDE"?'selected="selected"':'';?>>NO SABE/ NO RESPONDE</option>
                    </select></td></tr>
                <tr><td>Idioma que habla con frecuencia</td><td>::</td><td><input type="text" name="idiomaP" value="<?php echo mb_strtoupper($alu['IdiomaP'],"utf8");?>"/></td></tr>
                <tr><td>Telefono del Padre</td><td>::</td><td><input type="text" name="telefonoP" value="<?php echo mb_strtoupper($al['CelularP'],"utf8");?>"/></td></tr>
                <tr><td>Grado de Parentesco </td><td>::</td><td><select name="parentescoP">
                	<option value="---" <?php echo $alu['ParentescoP']=="---"?'selected="selected"':'';?>>---</option>
                    <option value="PADRE" <?php echo $alu['ParentescoP']=="PADRE"?'selected="selected"':'';?>>PADRE</option>
                    <option value="ABUELO" <?php echo $alu['ParentescoP']=="ABUELO"?'selected="selected"':'';?>>ABUELO</option>
                    <option value="ABUELA" <?php echo $alu['ParentescoP']=="ABUELA"?'selected="selected"':'';?>>ABUELA</option>
                    <option value="TIO" <?php echo $alu['ParentescoP']=="TIO"?'selected="selected"':'';?>>TIO</option>
                    <option value="TIA" <?php echo $alu['ParentescoP']=="TIA"?'selected="selected"':'';?>>TIA</option>
                    <option value="HERMANO" <?php echo $alu['ParentescoP']=="HERMANO"?'selected="selected"':'';?>>HERMANO</option>
                    <option value="TUTOR" <?php echo $alu['ParentescoP']=="TUTOR"?'selected="selected"':'';?>>TUTOR</option>
                    </select></td></tr>
            </table>
        </div>
        <div class="titulo">Datos del Madre</div>
        <div class="cuerpo">
        	<table class="tablaSB">
            	<tr><td>Cedula de Identidad</td><td>::</td><td><input name="CedulaMadre" type="text" id="CedulaMadre" value="<?php echo mb_strtoupper($al['CiMadre'],"utf8");?>"/></td></tr>
            	<tr><td>Apellidos</td><td>::</td><td><input type="text" name="paternoM" value="<?php echo mb_strtoupper($al['ApellidosMadre'],"utf8");?>"/></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombresM" value="<?php echo mb_strtoupper($al['NombreMadre'],"utf8");?>"/></td></tr>
                <tr><td>Ocupación Laboral</td><td>::</td><td><input type="text" name="ocupacionM" value="<?php echo mb_strtoupper($al['OcupMadre'],"utf8");?>"/></td></tr>
                <tr><td>Mayor Grado de Instrucción </td><td>::</td><td><select name="instruccionM">
                	<option value="NINGUNA" <?php echo $alu['InstruccionM']=="NINGUNA"?'selected="selected"':'';?>>NINGUNA</option>
                    <option value="PRIMARIA" <?php echo $alu['InstruccionM']=="PRIMARIA"?'selected="selected"':'';?>>PRIMARIA</option>
                    <option value="SECUNDARIA" <?php echo $alu['InstruccionM']=="SECUNDARIA"?'selected="selected"':'';?>>SECUNDARIA</option>
                    <option value="TECNICO MEDIO" <?php echo $alu['InstruccionM']=="TECNICO MEDIO"?'selected="selected"':'';?>>TECNICO MEDIO</option>
                    <option value="TECNICO SUPERIOR" <?php echo $alu['InstruccionM']=="TECNICO SUPERIOR"?'selected="selected"':'';?>>TECNICO SUPERIOR</option>
                    <option value="NORMALISTA" <?php echo $alu['InstruccionM']=="NORMALISTA"?'selected="selected"':'';?>>NORMALISTA</option>
                    <option value="LICENCIATURA" <?php echo $alu['InstruccionM']=="LICENCIATURA"?'selected="selected"':'';?>>LICENCIATURA</option>
                    <option value="CARRERA MILITAR" <?php echo $alu['InstruccionM']=="CARRERA MILITAR"?'selected="selected"':'';?>>CARRERA MILITAR</option>
                    <option value="POSTGRADO" <?php echo $alu['InstruccionM']=="POSTGRADO"?'selected="selected"':'';?>>POSTGRADO</option>
                    <option value="BACHILLER" <?php echo $alu['InstruccionM']=="BACHILLER"?'selected="selected"':'';?>>BACHILLER</option>
                    <option value="UNIVERSITARIO" <?php echo $alu['InstruccionM']=="UNIVERSITARIO"?'selected="selected"':'';?>>UNIVERSITARIO</option>
                    <option value="NO SABE/NO RESPONDE" <?php echo $alu['InstruccionM']=="NO SABE/NO RESPONDE"?'selected="selected"':'';?>>NO SABE/ NO RESPONDE</option>
                    </select></td></tr>
                <tr><td>Idioma que habla con frecuencia</td><td>::</td><td><input type="text" name="idiomaM" value="<?php echo mb_strtoupper($alu['IdiomaM'],"utf8");?>"/></td></tr>
                <tr><td>Telefono del Madre</td><td>::</td><td><input type="text" name="telefonoM" value="<?php echo mb_strtoupper($al['CelularM'],"utf8");?>"/></td></tr>
                <tr><td><input type="submit" value="Actualizar Datos Rude" class="corner-all"/></td><td></td><td></td></tr>
            </table>
            
        </div>
    </form>
    <?php
}

?>