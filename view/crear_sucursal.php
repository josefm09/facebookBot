<div class="row">
	<div class="col-md-8 col-sm-6">
		<h3><span class='nombreSistema'>Registrar Nueva Sucursal</span></h3>
	</div>
	<div class="col-md-2 col-sm-3 col-xs-6">
		<div class="form-group">
			<button id="btn_termine" class="btn btn-success btn-lg btn-block btn-huge">Terminé [F1]</button>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<h3 class = "panel-title">
					Nueva Sucursal
				</h3>
			</div>
			<div class = "panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="txt_id_empresa">Empresa:</label>
							<select class="form-control" id="txt_id_empresa">
								<option value="">Seleccione una empresa...</option>
							</select>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label for="#txt_nombre">Nombre:</label>
							<input type="text" class="form-control" id="txt_nombre" placeholder="Nombre de la Sucursal">
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row datos_sucursal">
					<div class="col-md-5">
						<div  class="form-group">
							<label for="#txt_calle">Calle:</label>
							<input type="tel" class="form-control" id="txt_calle" placeholder="Calle de la surcusal" />
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="#txt_numero_exterior"># Ext:</label>
							<input type="text" class="form-control" id="txt_numero_exterior" placeholder="# Exterior">
						</div>
					</div>
					<div class="col-md-3">
						<div  class="form-group">
							<label for="#txt_cp">Código Postal:</label>
							<input type="text" class="form-control" id="txt_cp" maxlength="5" placeholder="Código Postal" />
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="#txt_numero_interior"># Int:</label>
							<input type="text" class="form-control" id="txt_numero_interior" placeholder="# Interior">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="#txt_colonia">Colonia:</label>
							<input type="text" class="form-control id="txt_colonia" placeholder="Colonia" value="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="#txt_ciudad">Ciudad:</label>
							<input type="text" class="form-control" id="txt_ciudad" placeholder="Ciudad" value="" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="#txt_estado">Estado:</label>
							<select class="form-control" id="txt_estado">
								<option value="">Seleccione un estado...</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="txt_pais">País</label>
							<input type="text" class="form-control" id="txt_pais" placeholder="País" value="México" readonly>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="#txt_matriz">Tipo de Sucursal:</label>
							<select class="form-control" id="txt_matriz">
								<option value="1">Matriz</option>
								<option value="0" selected>Normal</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
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
<div class="modal fade" id="dlgUsuario" tabindex="-1" role="dialog" aria-labelledby="dlgUsuarioLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Consultar Taller</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="search-box" class="form-control-label">Nombre:</label>
							<span id="autocomplete">
								<input type="text" class="form-control" name="search-box" id="search-box" placeholder="Nombre de Taller" autocomplete="off"/>
								<ul class="list-group" id="search_suggestion_holder"></ul>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btnCerrar" data-dismiss="modal">Salir</button>
				<button type="button" class="btn btn-primary" id="btn_seleccionar_empresa">Actualizar</button>
			</div>
		</div>
	</div>
</div>
<script src="../js/crear_sucursal.js"></script>