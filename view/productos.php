<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>
<link href="../css/typeahead.css" type="text/css" rel="stylesheet"/>

<div class="row">
	<div class="col-md-12">
		<h3><span class='nombre_sistema'>DBM Restaurant</span> <small>Productos</small></h3>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<button class="btn btn-success btn-lg btn-block btn-huge" id="btn_guardar">Terminé [F1]</button>
	</div>
	<div class="col-md-2">
		<button class="btn btn-primary btn-lg btn-block btn-huge" id="btn_producto">Consulta [F2]</button>
	</div>
	<div class="col-md-6">
	</div>
	<div class="col-md-2">
		<button class="btn btn-danger btn-lg btn-block btn-huge" id="btn_salir">Salir [FIN]</button>
	</div>
</div>
<div class="row"><br/>
	<div class="col-md-6" id="div_producto">
		<div class="col-md-12">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title lbl_nombre">
						<span class="lbl_nombre">Nuevo Producto Final</span>
					</h3>
			   </div>
				<div class = "panel-body">
					<div class="row solo_actualizar">
						<div class="col-md-2">
							<div class="form-group">
								<label for="txt_Id_producto">ID</label>
								<input type="text" class="form-control" id="txt_Id_producto" readonly placeholder="ID">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="txt_estatus">Estatus</label>
								<select class="form-control" id="txt_estatus">
									<option value="0">Activo</option>
									<option value="1">Inactivo</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label for="txt_nombre">Nombre</label>
								<input type="text" class="form-control" id="txt_nombre" placeholder="Nombre de Producto">
							</div>
						</div>
						<div class="col-md-5">
							<label for="slt_tipo">Tipo:</label>
							<select class="form-control" id="slt_tipo">
								<option value="1">Final</option>
								<option value="2">Elaborado</option>
								<option value="4">Pre Elaborado</option>
								<option value="3">Ingrediente</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div  class="form-group">
								<label for="slt_categoria">Clasificación</label>
								<select class="form-control" id="slt_categoria">
									<option value='NULL'>Categoria</option>
								</select>
							</div>
							<div class="form-group">
								<label for="txt_codigo_barra">Código de Barras</label>
								<input type="text" class="form-control" id="txt_codigo_barra" placeholder="Cógido de Barras">
							</div>
						</div>
						<div class="col-md-5">
							<span class="row uploadImage">
								<div class="form-group">
									<form class="dropzone" id="imagen_producto" enctype="multipart/form-data" method="post">
										<div class="fallback">
											<input name="file" type="file"/>
										 </div>
									</form>
								</div>
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="message-text" class="form-control-label">Cantidad Consumible</label>
								<input type="number" class="form-control" id="txt_cantidad_consumible" placeholder="Cantidad Consumible">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="message-text" class="form-control-label">Permitir Agrupamiento</label>
								<div class="make-switch">
									<input type="checkbox" class="producto_tipo_fraccion" id="txt_producto_agrupamiento" data-on-text="SI" data-off-text="NO" />
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="message-text" class="form-control-label">Permitir Acumulable</label>
								<div class="make-switch">
									<input type="checkbox" class="producto_tipo_fraccion" id="txt_producto_acumulable" data-on-text="SI" data-off-text="NO" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6" id="div_almacenar">
		<div class="col-md-12">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title">
						Unidad de Medida
					</h3>
			   </div>
				<div class = "panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select class="form-control" id="slt_unidad_original">
									<option value='NULL'>Unidad</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<input type="number" class="form-control" id="txt_cantidad_conversion" placeholder="Equivalencia">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<select class="form-control" id="slt_unidad_conversion">
									<option value='NULL'>Unidad</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div  class="form-group">
								<input type="button" class="btn btn-default" id="btn_enviar_medida" data-id="4" value="Enviar">
							</div>
						</div>
					</div>
					<div class="row">
						<table class="table table-striped" id="tbl_medida">
							<thead>
								<tr>
									<th>Unidad Original</th>
									<th>Cantidad</th>
									<th>Conversión</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6" id="div_impuesto">
		<div class="col-md-12">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title">
						Impuestos
					</h3>
				</div>
				<div class = "panel-body">
					<div class="row" id="mandar">
						<div class="col-md-6">
							<div  class="form-group">
								<label for="txt_iva">IVA</label><br />
								<select class="form-control" id="txt_iva" name="txt_iva" data-id = "1">
									<option value="0">0%</option>
									<option value="16">16%</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div  class="form-group">
								<label for="txt_ieps">IEPS</label><br />
								<input type="number" class="form-control" id="txt_ieps" name="txt_ieps" placeholder="%" data-id = "2"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6" id="div_ingrediente">
		<div class="col-md-12">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title">
						Ingredientes
					</h3>
				</div>
				<div class = "panel-body">
					<div class="row" id="mandar">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div  class="form-group">
										<input type="text" class="typeahead form-control" name="search-box3" id="search-box3" placeholder="Ingrediente" />
									</div>
								</div>
								<div class="col-md-3">
									<div  class="form-group">
										<input type="text" class="form-control" name="txt_cantidad_ingrediente" id="txt_cantidad_ingrediente" placeholder="Cant." value="1" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-3">
									<div  class="form-group">
										<input type="button" class="btn btn-default" id="btn_enviar_ingrediente" data-id="4" value="Enviar">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" id="tabla_ingrediente">
							<table id="tbl_ingrediente" class="table table-striped table-hover less">
								<thead>
									<tr>
										<th class="col-md-4">Ingrediente</th>
										<th class="col-md-4">Cantidad</th>
										<th class="col-md-4">Acción</th>
									</tr>
								</thead>
								<tbody>
									<tr></tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--<div class="col-md-6" id="div_fraccion">
		<div class="col-md-12">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title">
						Venta de producto por fracción
					</h3>
				</div>
				<div class = "panel-body">
					<div class="row" id="fraccion">
						<div class="col-md-4">
							<div class="form-group">
								<select class="form-control" id="slt_fraccion">
									<option value="NULL">Seleccionar</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="txt_precio_venta_fraccion">Precio</label>
								<input type="number" class="form-control" id="txt_precio_venta_fraccion" placeholder="Precio MXN">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="btn_agregar_fraccion">Acción</label>
								<button class="btn btn-success btn-block" id="btn_enviar_fraccion">Agregar</button>
							</div>
						</div>
					</div>
					<div class="row">
						<table class="table table-striped" id="tbl_fraccion">
							<thead>
								<tr>
									<th>Fracción</th>
									<th>Precio</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>-->
</div>
<div class="modal fade" id="dlgAlmacenar" tabindex="-1" role="dialog" aria-labelledby="dlgAlmacenarLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h5 id="tituloProcesaCobro">¡Finalizamos!</h5>
		</div>
		<div class="modal-body">
			<h4 id="mensajeProcesaCobro">Tarea Procesada</h4>
		</div>
	</div>
</div>
</div>
<div id="eliminarProducto" class="modal fade hidden-print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h3 id="myModalLabel">Eliminar</h3>
		</div>
		<div class="modal-body">
			<p></p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary" id="btnYes">Eliminar</button>
		</div>
	</div>
</div>
</div>
<div class="modal fade" id="dlgProducto" tabindex="-1" role="dialog" aria-labelledby="dlgProductoLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="exampleModalLabel">Consultar Producto</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="search-box1" class="form-control-label">Nombre:</label>
						<span id="autocomplete">
							<input type="text" class="form-control producto_autocomplete" name="search-box1" id="search-box1" placeholder="ID | Nombre de Producto" autocomplete="off"/>
							<ul class="list-group" id="search_suggestion_holder1"></ul>
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="txtExistencia" class="form-control-label">Existencia</label>
						<input type="number" class="form-control" id="txtExistencia" readonly/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="txtPrecio" class="form-control-label">Precio Venta</label>
						<input type="number" class="form-control" id="txtPrecio" readonly/>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" id="btnCerrar" data-dismiss="modal">Salir</button>
			<button type="button" class="btn btn-primary" id="btnActualizar">Actualizar</button>
		</div>
	</div>
</div>

<script src="../js/dropzone.js"></script>
<script src="../js/typeahead.bundle.js"></script>
<script src="../js/productos.js"></script>
