<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>

<div class="row">
	<div class="col-md-9 col-sm-6">
		<h3><span class='nombre_sistema'>Clasificación de Productos</span> <small>Menú Principal</small></h3>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-6">
			<a href="#" class="btn btn-primary btn-lg btn-block btn-huge" data-toggle="modal" data-target="#dlgClasificacion" data-whatever="@mdo" id=" btn_clasificacion">Impresora</a>
		</div>
	<div class="col-md-2 col-sm-3 col-xs-6"><br />
		<div class="form-group">
			<button id="btn_crear_clasificacion" class="btn btn-success btn-lg btn-block btn-huge">Terminé</button>
		</div>
	</div>
</div><br />
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<h3 class = "panel-title">
					Clasificación
				</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="txt_nombre_clasificacion">Nombre</label>
							<input type="text" class="form-control" id="txt_nombre_clasificacion" placeholder="Nombre de Clasificación de Productos">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label for="upload_imagen_clasificacion">Imgen de clasificacion (opconal)</label>
						<form class="dropzone" id="upload_imagen_clasificacion" enctype="multipart/form-data" method="post">
							<div class="fallback">
								<input name="file" type="file">
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="col-md-3"></div>
</div>



<div class="modal fade" id="dlgClasificacion" tabindex="-1" role="dialog" aria-labelledby="dlgProveedorLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Seleccionar Impresora</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="txt_id_empresa">Clasificación:</label>
							<select class="form-control" id="txt_clasificacion">
								<option value="">Seleccione una clasificacion...</option>
							</select>
			
							<label for="txt_id_empresa">Impresora:</label>
							<select class="form-control" id="txt_impresora">
								<option value="">Seleccione una impresora...</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btn_cerrar" data-dismiss="modal">Salir</button>
				<button type="button" class="btn btn-primary" id="btn_relacionar">Relacionar</button>
			</div>
		</div>
	</div>
</div>

<script src="../js/dropzone.js"></script>
<script src="../js/crear_clasificacion.js"></script>