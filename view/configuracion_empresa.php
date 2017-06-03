<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>

<div class="row">
		<div class="col-md-8 col-sm-6">
			<h3><span class='nombreSistema'>Configuración de Empresa</span> <small>Menú Principal</small></h3>
		</div>
		<div class="col-md-2 col-sm-3 col-xs-6"></div>
</div><br />

<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Tabla de Configuracion
					</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<label for="txt_nombre">Nombre:</label>	
							<input type="text" class="form-control" id="txt_nombre" placeholder="Nombre de la empresa">
						</div>
						<div class="col-md-6 col-sm-3 col-xs-6">
							<button class="btn btn-success btn-lg btn-block btn-huge" id="btncambiar">Cambiar</button>
						</div>
					</div>
					<div class="row"></br>
						<div class="col-md-6">
								<label for="txt_config_usuario">Configuracion de interface por usuario:</label>	
						</div>
					</div>
					<div class="row"></br>
						<div class="col-md-6">
							<tr for="txt_config_movil">Configuracion de inferface para moviles:</tr>	
						</div>
						<div class="col-md-2">
							<div class="make-switch">
								<input type="checkbox" class="validacionCongreso txt_validacion" data-id="2" id="txt_validacion_2" data-on-text="SI" data-off-text="NO" onchange="mandar_formulario(2);"/>
							</div>
						</div>
						<div class="col-md-4">
							<small>(Cambia el tema del movil)</small>
						</div>
					</div>
					<div class="row"></br>
						<div class="col-md-6">
							<tr for="txt_config_escritorio">Configuracion de interface para escritorio:</tr>	
						</div>
						<div class="col-md-2">
							<div class="make-switch">
								<input type="checkbox" class="validacionCongreso txt_validacion" data-id="3" id="txt_validacion_3" data-on-text="SI" data-off-text="NO" onchange="mandar_formulario(3);" />
							</div>
						</div>
						<div class="col-md-4">
							<small>(Cambia el tema del escritorio)</small>
						</div>
					</div>
					<div class="row"></br>
						<div class="col-md-6">
							<label for="txt_ventas_cero">Ventas bajo cero:</label>	
						</div>
						<div class="col-md-2">
							<div class="make-switch">
								<input type="checkbox" class="validacionCongreso txt_validacion" data-id="4" id="txt_validacion_4" data-on-text="SI" data-off-text="NO" onchange="mandar_formulario(4);" />
							</div>
						</div>
						<div class="col-md-4">
							<small>Permitir manejar numeros negativos en el inventario(como una especie de deuda)</small>
						</div>
					</div>
					<div class="row"></br>
						<div class="col-md-6">
							<label for="txt_busqueda_product">Busqueda del producto:</label>	
						</div>
						<div class="col-md-2">
							<div class="make-switch">
								<input type="checkbox" class="validacionCongreso txt_validacion" data-id="5" id="txt_validacion_5" data-on-text="SI" data-off-text="NO" onchange="mandar_formulario(5);" />
							</div>
						</div>
						<div class="col-md-4">
							<small>(Al presionar una letra, aparecera una lista de productos que el inicio de su nombre coincida con la letra presionada)</small>
						</div>
					</div>
					<div class="row"></br>
						<div class="col-md-6">
							<label for="txt_logotipo">Logotipo de imagen:</label>	
						</div>
						<div class="col-md-3">
							<form class="dropzone" id="upload_logotipo_empresa" enctype="multipart/form-data" method="post">
								<div class="fallback">
									<input name="file" type="file"/>
								  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../js/dropzone.js"></script>
<script src="../js/editar_configuracion_empresa.js"></script>
