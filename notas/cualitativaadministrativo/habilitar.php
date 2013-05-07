<?php
include_once '../../login/check.php';
$titulo="Registro de Notas Cualitativas";
$folder="../../";
include_once '../../cabecerahtml.php';
?>
<script type="text/javascript" src="../../js/notas/habilitarcualitativo.js"></script>
<?php
include_once '../../cabecera.php';
?>
<div class="container_12" id="cuerpo">
	<div>
		<div class="prefix_4 grid_4 suffix_4">
			<div class="titulo corner-top">Formulario de Notas Caulitativas</div>
			<div class="cuerpo">
				<span class="resaltar">Al momento de habilitar las notas cualitativas se eliminarán las notas actuales ya registradas.</span>
				<hr>
				<a href="habilitarregistro.php?f=<?php echo md5("lock") ?>" id="habilitar" class="boton corner-all">Habilitar Registro</a>
			</div>
		</div>
	</div>
</div>
<?php
include_once '../../footer.php';
?>