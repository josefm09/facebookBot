
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><span class='nombreSistema'>DBM Restaurant</span> <small>Proveedores</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-sm-4 col-xs-12">
			<a href="#" class="btn btn-success btn-lg btn-block btn-huge" data-toggle="modal" data-target="#dlgGuardar" data-whatever="@mdo" id="btn_guardar">Terminé [F1]</a>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6">
			<a href="#" class="btn btn-primary btn-lg btn-block btn-huge" data-toggle="modal" data-target="#dlgProveedor" data-whatever="@mdo" id="btnProveedor">Consulta [F2]</a>
		</div>
		<div class="col-md-6">
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6">
			<a href="#" class="btn btn-danger btn-lg btn-block btn-huge" id="btnSalir">Salir [FIN]</a>
		</div>
	</div>
	<div class="row"><br/>
		<div class="col-md-6">
			<div class="col-md-12">
				<div class = "panel panel-default">
					<div class = "panel-heading">
						<h3 class = "panel-title">
							Nuevo Proveedor
						</h3>
				   </div>
				   <div class = "panel-body">
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="txt_nombre_proveedor">Nombre</label>
									<input type="text" class="form-control" id="txt_nombre_proveedor" placeholder="Nombre de Proveedor">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class = "panel panel-default">
								   <div class = "panel-body">
										<div class="row">
											<div class="col-md-5">
												<div  class="form-group">
													<label for="txt_lada_tlefono_1_proveedor">Lada</label>
													<input type="tel" class="form-control" id="txt_lada_tlefono_1_proveedor" placeholder="052">
												</div>
											</div>
											<div class="col-md-7">
												<div  class="form-group">
													<label for="txt_telefono_1_proveedor">Teléfono 1</label>
													<input type="tel" class="form-control" id="txt_telefono_1_proveedor" placeholder="Teléfono">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="#txt_tipo_telefono_1_proveedor">Tipo Telefono:</label>
													<select class="form-control" id="txt_tipo_telefono_1_proveedor">
														<option value="">Seleccione un tipo...</option>
														<option value="0">Oficina</option>
														<option value="1">Celular</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class = "panel panel-default">
								   <div class = "panel-body">
										<div class="row">
											<div class="col-md-5">
												<div  class="form-group">
													<label for="txt_lada_tlefono_2_proveedor">Lada</label>
													<input type="tel" class="form-control" id="txt_lada_tlefono_2_proveedor" placeholder="052">
												</div>
											</div>
											<div class="col-md-7">
												<div  class="form-group">
													<label for="txt_telefono_2_proveedor">Teléfono 2</label>
													<input type="tel" class="form-control" id="txt_telefono_2_proveedor" placeholder="(Opcional)">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="#txt_tipo_telefono_2_proveedor">Tipo Telefono:</label>
													<select class="form-control" id="txt_tipo_telefono_2_proveedor">
														<option value="">Seleccione un tipo...</option>
														<option value="0">Oficina</option>
														<option value="1">Celular</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="txt_correo_proveedor">Correo</label>
									<input type="text" class="form-control" id="txt_correo_proveedor" placeholder="Correo">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_calle_proveedor">Calle</label>
									<input type="text" class="form-control" id="txt_calle_proveedor" placeholder="Calle">
								</div>
								
							</div>
							<div class="col-md-3">
								<div  class="form-group">
										<label for="txt_numero_proveedor">Número</label>
										<input type="email" class="form-control" id="txt_numero_proveedor" placeholder="#">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="txt_colonia_proveedor">Colonia</label>
									<input type="text" class="form-control" id="txt_colonia_proveedor" placeholder="Colonia">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="#txt_estado_proveedor">Estado:</label>
									<select class="form-control" id="txt_id_estado_proveedor">
										<option value="">Seleccione un estado...</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="#txt_estado_proveedor">Municipio:</label>
									<select class="form-control" id="txt_id_municipio_proveedor">
										<option value="">Seleccione un municipio...</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_ciudad_proveedor">Ciudad</label>
									<input type="text" class="form-control" id="txt_ciudad_proveedor" placeholder="Ciudad | Población | Municipio" value="Culiacán">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
				<div class = "panel panel-default">
					<div class = "panel-heading">
						<h3 class = "panel-title">
							Datos Fiscales
						</h3>
				   </div>
				   <div class = "panel-body">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="txt_razon_social">Razón social</label>
									<input type="text" class="form-control" id="txt_razon_social" placeholder="Empresa de ejemplo SA de CV">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_rfc">RFC</label>
									<input type="text" class="form-control" id="txt_rfc" placeholder="XXXX000000X0X">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="txt_direccion_fiscal">Calle y Número</label>
									<input type="text" class="form-control" id="txt_direccion_fiscal" placeholder="Calle y Número de Local">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_colonia_fiscal">Colonia</label>
									<input type="text" class="form-control" id="txt_colonia_fiscal" placeholder="Colonia">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="#txt_estado_fiscal">Estado:</label>
									<select class="form-control" id="txt_id_estado_fiscal">
										<option value="">Seleccione un estado...</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="#txt_estado_proveedor">Municipio:</label>
									<select class="form-control" id="txt_id_municipio_fiscal">
										<option value="">Seleccione un municipio...</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="txt_ciudad_fiscal">Ciudad</label>
									<input type="text" class="form-control" id="txt_ciudad_fiscal" placeholder="Ciudad | Población | Municipio" value="Culiacán">
								</div>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_codigo_postal">CP</label>
									<input type="text" class="form-control" id="txt_codigo_postal" placeholder="Código Postal">
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
<div class="modal fade" id="dlgProveedor" tabindex="-1" role="dialog" aria-labelledby="dlgProveedorLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Consultar Proveedor</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="search-box1" class="form-control-label">Nombre:</label>
							<span id="autocomplete">
								<input type="text" class="form-control" name="search-box" id="search-box" placeholder="Nombre de Proveedor" autocomplete="off"/>
								<ul class="list-group" id="search_suggestion_holder"></ul>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btn_cerrar" data-dismiss="modal">Salir</button>
				<button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../js/proveedor.js"></script>
