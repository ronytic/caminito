<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/documento.php");
include_once("../../config.php");
$titulo="Modificar datos del Alumno";
$folder="../../";
include_once("../../class/curso.php");
include_once("../../class/config.php");
$curso=new curso;
$conf=new configuracion;
$alumno=new alumno;
$documento=new documento;
if(!empty($_GET) && $_GET['CodAlumno']!=""){
$CodAlumno=$_GET['CodAlumno'];
$al=$alumno->mostrarDatos($CodAlumno);
$al=array_shift($al);
$doc=$documento->mostrarDocumento($CodAlumno);
$doc=array_shift($doc);
$c=$curso->mostrarCurso($al['CodCurso']);
$c=array_shift($c);

?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript" type="application/javascript" src="../../js/alumno/inscripcion.js"></script>

<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo"><form action="../actualizarAlumno.php" method="post" onSubmit="if(this.Curso.value==0){alert('Selecciona el Curso');return false;}">
	<div class="prefix_1 grid_5">
		<div class="titulo corner-tl corner-tr">Datos del Alumno</div>
        <div class="cuerpo">
        	
        	<table>
            	<tr><td class="der">Matricula</td><td>::</td><td><input name="Matricula" type="text" id="matricula" value="<?php echo $al['CodAlumno']?>" size="30" readonly/></td></tr>
                <tr><td class="der">Curso</td><td>::</td><td><select name="Curso" id="curso" autofocus><option value="0">Selecciona el Curso</option><?php foreach($curso->listar() as $cur){
														?><option value="<?php echo $cur['CodCurso']?>" <?php if($cur['CodCurso']==$al['CodCurso'])echo 'selected="selected"'?>><?php echo $cur['Nombre']?></option><?php	
													}?></select></td></tr>
                <tr><td class="der">Apellido Paterno</td><td>::</td><td><input name="Paterno" type="text" size="30" required value="<?php echo $al['Paterno'];?>"/></td></tr>
                <tr><td class="der">Apellido Materno</td><td>::</td><td><input name="Materno" type="text" size="30" required value="<?php echo $al['Materno'];?>"/></td></tr>
                <tr><td class="der">Nombres</td><td>::</td><td><input name="Nombres" type="text" size="30" required  value="<?php echo $al['Nombres'];?>"/></td></tr>
                <tr><td class="der">Sexo</td><td>::</td><td><input type="radio" name="Sexo" id="h" value="1" required <?php echo $al['Sexo']?'checked="checked"':'';?>/><label for="h">Hombre</label> <input type="radio" name="Sexo" id="m" value="0" required <?php echo !$al['Sexo']?'checked="checked"':'';?>/><label for="m">Mujer</label></td></tr>
                <tr><td class="der">Lugar de Nacimiento</td><td>::</td><td><input type="text" name="LugarNac" placeholder="La Paz" value="<?php echo $al['LugarNac'];?>"/></td></tr>
                <tr><td class="der">Fecha de Nacimiento</td><td>::</td><td><input type="text" name="FechaNac" id="FechaNac" size="10"  value="<?php echo date("d-m-Y",strtotime($al['FechaNac']));?>" autocomplete="off"/>(Ej:23-07-1990)</td></tr>
                <tr><td class="der">Cedula de Identidad</td><td>::</td><td><input name="Ci" type="text" id="Ci"  value="<?php echo $al['Ci'];?>" /><select name="CiExt">
                	<option value="LP" <?php if($al['CiExt']=="LP")echo'selected="selected"';?>>LP</option>
                    <option value="CH" <?php if($al['CiExt']=="CH")echo'selected="selected"';?>>CH</option>
                    <option value="SC" <?php if($al['CiExt']=="SC")echo'selected="selected"';?>>SC</option>
                    <option value="PA" <?php if($al['CiExt']=="PA")echo'selected="selected"';?>>PA</option>
                    <option value="BN" <?php if($al['CiExt']=="BN")echo'selected="selected"';?>>BN</option>
                    <option value="OR" <?php if($al['CiExt']=="OR")echo'selected="selected"';?>>OR</option>
                    <option value="PT" <?php if($al['CiExt']=="PT")echo'selected="selected"';?>>PT</option>
                    <option value="CQ" <?php if($al['CiExt']=="CQ")echo'selected="selected"';?>>CQ</option>
                    <option value="TR" <?php if($al['CiExt']=="TR")echo'selected="selected"';?>>TR</option></select></td></tr>
                <tr><td class="der">Zona</td><td>::</td><td><input name="Zona" type="text"  id="Zona" size="30" value="<?php echo $al['Zona'];?>"/></td></tr>
                <tr><td class="der">Calle</td><td>::</td><td><input name="Calle" type="text"  id="Zona" size="30" value="<?php echo $al['Calle'];?>"/></td></tr>
                <tr><td class="der">Número</td><td>::</td><td><input name="Numero" type="text"  id="Zona" size="30" value="<?php echo $al['Numero'];?>"/></td></tr>
                <tr><td class="der">Teléfono Casa</td><td>::</td><td><input name="TelefonoCasa" type="text" id="FechaNac" size="30" value="<?php echo $al['TelefonoCasa'];?>"/></td></tr>
                <tr><td class="der">Celular</td><td>::</td><td><input name="Celular" type="text" size="30" value="<?php echo $al['Celular'];?>"/></td></tr>
            </table>
        </div>
        <div class="cuerpo">
        	<table>
            	<tr><td class="der">Procedencia</td><td>::</td><td><input type="text" name="Procedencia" size="30" value="<?php echo $al['Procedencia'];?>"/></td></tr>
                <tr><td class="der">Repitente</td><td>::</td><td><input type="radio" name="Repitente" value="0" id="rn" <?php echo !$al['Repitente']? 'checked="checked"':''; ?>/><label for="rn">No</label><input type="radio" name="Repitente" value="1" id="rs" <?php echo $al['Repitente']? 'checked="checked"':''; ?>/><label for="rs">Si</label></td></tr>
                <tr><td class="der">Traspaso</td><td>::</td><td><input type="radio" name="Traspaso" value="0" id="tn" <?php echo !$al['Traspaso']? 'checked="checked"':''; ?>/><label for="tn">No</label><input type="radio" name="Traspaso" value="1" id="ts" <?php echo $al['Repitente']? 'checked="checked"':''; ?>/><label for="ts">Si</label></td></tr>
                <tr><td class="der">Becado</td><td>::</td><td><input type="radio" name="Becado" value="0" id="bn" <?php echo !$al['Becado']? 'checked="checked"':''; ?>/><label for="bn">No</label><input type="radio" name="Becado" value="1" id="bs"<?php echo $al['Becado']? 'checked="checked"':''; ?>/><label for="bs">Si</label></td></tr>
                <tr><td class="der">Monto de Beca</td><td>::</td><td><input type="text" name="MontoBeca" id="MontoBeca" size="7" maxlength="7" value="<?php echo $al['MontoBeca'];?>" />Bs - <input type="text" name="PorcentajeBeca" id="PorcentajeBeca" value="0" size="6" maxlength="6" />%</td></tr>
                <tr><td class="der">Monto a Pagar</td><td>::</td><td><input name="MontoPagar" id="MontoPagar" readonly type="text" value="<?php echo $c['MontoCuota']?>"/> Bs</td></tr>
                <tr><td class="der">Retirado</td><td>::</td><td><input type="radio" name="Retirado" value="0" id="n" checked="checked"/><label for="n">No</label><input type="radio" name="Retirado" value="1" id="s"/><label for="s">Si</label></td></tr>
                 <tr><td class="der">Fecha de Retiro</td><td>::</td><td><input type="text" name="FechaRetiro" id="FechaRetiro" size="10" value="<?php echo date("d-m-Y",strtotime($al['FechaRetiro']))=='31-12-1969'?'00-00-0000':date("d-m-Y",strtotime($al['FechaRetiro']));?>"/>(Ej:23-07-1990)</td></tr>
                 <tr><td class="der">Rude</td><td>::</td><td><input type="text" name="Rude" value="<?php echo $al['Rude'];?>"/></td></tr>
                 <!--<tr><td class="der">Foto</td><td>::</td><td><input type="file" name="Foto" disabled="disabled"/></td></tr>-->
                 <tr><td class="der">Observaciones</td><td>::</td><td><textarea name="Observaciones" cols="30" rows="5"><?php echo $al['Observaciones'];?></textarea></td></tr>
             </table>
        </div>
    </div>
    <div class="grid_6">
    	<div class="titulo corner-tl corner-tr">Datos del Padre de Familia</div>
        <div class="cuerpo">
        	<table>
            	<tr><td class="der">Apellidos del Padre</td><td>::</td><td><input type="text" name="ApellidosPadre" size="50" value="<?php echo $al['ApellidosPadre'];?>" /></td></tr>
            	<tr><td class="der">Nombre del Padre</td><td>::</td><td><input type="text" name="NombrePadre" size="50" value="<?php echo $al['NombrePadre'];?>"/></td></tr>
                <tr><td class="der">C.I. Padre</td><td>::</td><td><input type="text" name="CiPadre" id="CiPadre"  value="<?php echo $al['CiPadre'];?>"/><select name="CiExtP">
                	<option value="LP" <?php if($al['CiExtP']=="LP")echo'selected="selected"';?>>LP</option>
                    <option value="CH" <?php if($al['CiExtP']=="CH")echo'selected="selected"';?>>CH</option>
                    <option value="SC" <?php if($al['CiExtP']=="SC")echo'selected="selected"';?>>SC</option>
                    <option value="PA" <?php if($al['CiExtP']=="PA")echo'selected="selected"';?>>PA</option>
                    <option value="BN" <?php if($al['CiExtP']=="BN")echo'selected="selected"';?>>BN</option>
                    <option value="OR" <?php if($al['CiExtP']=="OR")echo'selected="selected"';?>>OR</option>
                    <option value="PT" <?php if($al['CiExtP']=="PT")echo'selected="selected"';?>>PT</option>
                    <option value="CQ" <?php if($al['CiExtP']=="CQ")echo'selected="selected"';?>>CQ</option>
                    <option value="TR" <?php if($al['CiExtP']=="TR")echo'selected="selected"';?>>TR</option></select></td></tr>
                <tr><td class="der">Ocupación del Padre</td><td>::</td><td><input type="text" name="OcupPadre" size="30"  value="<?php echo $al['OcupPadre'];?>"/></td></tr>
                <tr><td class="der">Celular Padre</td><td>::</td><td><input type="text" name="CelularP" size="30" value="<?php echo $al['CelularP'];?>"/></td></tr>
                <tr><td class="der">Apellidos de la Madre</td><td>::</td><td><input type="text" name="ApellidosMadre" size="50" value="<?php echo $al['ApellidosMadre'];?>" /></td></tr>
               	<tr><td class="der">Nombre de la Madre</td><td>::</td><td><input type="text" name="NombreMadre" size="50"  value="<?php echo $al['NombreMadre'];?>"/></td></tr>
                <tr><td class="der">C.I.Madre</td><td>::</td><td><input type="text" name="CiMadre" id="CiMadre"   value="<?php echo $al['CiMadre'];?>"/><select name="CiExtM">
                	<option value="LP" <?php if($al['CiExtM']=="LP")echo'selected="selected"';?>>LP</option>
                    <option value="CH" <?php if($al['CiExtM']=="CH")echo'selected="selected"';?>>CH</option>
                    <option value="SC" <?php if($al['CiExtM']=="SC")echo'selected="selected"';?>>SC</option>
                    <option value="PA" <?php if($al['CiExtM']=="PA")echo'selected="selected"';?>>PA</option>
                    <option value="BN" <?php if($al['CiExtM']=="BN")echo'selected="selected"';?>>BN</option>
                    <option value="OR" <?php if($al['CiExtM']=="OR")echo'selected="selected"';?>>OR</option>
                    <option value="PT" <?php if($al['CiExtM']=="PT")echo'selected="selected"';?>>PT</option>
                    <option value="CQ" <?php if($al['CiExtM']=="CQ")echo'selected="selected"';?>>CQ</option>
                    <option value="TR" <?php if($al['CiExtM']=="TR")echo'selected="selected"';?>>TR</option></select></td></tr>
                 <tr><td class="der">Ocupación de la Madre</td><td>::</td><td><input type="text" name="OcupMadre" size="30" value="<?php echo $al['OcupMadre'];?>"/></td></tr>
                 <tr><td class="der">Celular Madre</td><td>::</td><td><input name="CelularM" type="text" id="CelularM" size="30" value="<?php echo $al['CelularM'];?>"/></td></tr>
                 <tr><td class="der">Email</td><td>::</td><td><input type="text" name="Email" size="30" value="<?php echo $al['Email'];?>"/></td></tr>
                 <tr><td class="der">Persona Encargada para Recoger</td><td>::</td><td><input type="text" name="PersonaACargo" size="30" value="<?php echo $al['PersonaACargo']?>"/></td></tr>
            </table>
        </div>
        <div class="cuerpo">
        	<table>
            	<tr><td class="der">NIT</td><td>::</td><td><input name="Nit" type="text" id="Nit" size="30" required value="<?php echo $al['Nit'];?>" /></td></tr>
                <tr><td class="der">Nombre a Facturar</td><td>::</td><td><input name="FacturaA" type="text" size="30" required value="<?php echo $al['FacturaA'];?>"/></td></tr>
          		
            </table>
            <hr />
            <table>
            	<tr><td class="der"><label for="cn">Certificado de Nacimiento</label></td><td>::</td><td><input type="checkbox" name="CertificadoNac" id="cn" <?php echo $doc['CertificadoNac']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="le">Libreta Escolar</label></td><td>::</td><td><input type="checkbox" name="LibretaEsc" id="le" <?php echo $doc['LibretaEsc']?'checked="checked"':'';?>/></td></tr>
                 <tr><td class="der"><label for="lv">Libreta de Vacunas</label></td><td>::</td><td><input type="checkbox" name="LibretaVac" id="lv" <?php echo $doc['LibretaVac']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="CedulaId">C.I. del Alumno</label></td><td>::</td><td><input type="checkbox" name="CedulaId" id="CedulaId" <?php echo $doc['CedulaId']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="CedulaIdP">C.I. del Padre</label></td><td>::</td><td><input type="checkbox" name="CedulaIdP" id="CedulaIdP" <?php echo $doc['CedulaIdP']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="CedulaIdM">C.I. de la Madre</label></td><td>::</td><td><input type="checkbox" name="CedulaIdM" id="CedulaIdM" <?php echo $doc['CedulaIdM']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="Croquis">Croquis de Domicilio</label></td><td>::</td><td><input type="checkbox" name="Croquis" id="Croquis" <?php echo $doc['Croquis']?'checked="checked"':'';?>/></td></tr>
                  <tr><td class="der"><label for="Fotografia">Fotografías</label></td><td>::</td><td><input type="checkbox" name="Fotografia" id="Fotografia" <?php echo $doc['Fotografia']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der">Observaciones Documentos</td><td>::</td><td><textarea name="ObservacionesDoc" rows="5" cols="30"><?php echo $doc['Observaciones'];?></textarea></td></tr>
                <tr><td></td><td></td><td><input type="submit" value="Registrar Alumno" class="corner-all"/><input type="reset" class="corner-all" value="Vaciar"></td></tr>
            </table>
            
        </div>
    </div>
    </form>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>
<?php
}
?>