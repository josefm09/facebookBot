<?PHP
	
	require "../includes/header.html";
	require "../includes/librerias.php";
	
?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 propuesta">
			<div class="col-md-12">
				<h2 class="titulo"></h2>
			</div>
			<div class="col-md-12">
				<h3>Problemática</h3>
				<p class="problematica"></p>
			</div>
			<div class="col-md-12">
				<h3>Solución</h3>
				<p class="solucion"></p>
			</div>
			<div class="col-md-12">
				<h3>Imagen</h3>
				<div class="col-md-6" id="imagen"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 decide">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="txt_comentario">Agrega tu comentario</label>
					<textarea class="form-control" id="txt_comentario" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label for="switch_castrosos">Decide lo mejor para ti!</label>
					<div class="make-switch">
						<input type="checkbox" class="validacionCongreso txt_validacion" id="txt_validacion_4" data-on-text="SI" data-off-text="NO" checked />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group"><br /><br /><br />
					<button class="btn btn-success btn-large btn-block btn-huge" id="btn_enviar">Enviar</button>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
<script src="../js/propuesta.js"></script>
<?PHP
	require "../includes/footer.html";
?>