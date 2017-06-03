<link href="../css/typeahead.css" type="text/css" rel="stylesheet"/>

	
		<div class="col-md-6 col-sm-6">
			<h3><span class="nombre_sistema">Clientes </span><small>Altas y Consultas</small></h3>
		</div>
		
		<div class="col-md-6 col-sm-3 col-xs-6">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<div class="form-group">
					<button id="btn_consultar_cliente" class="btn btn-primary btn-lg btn-block btn-huge">Consultar [F1]</button>
				</div>
			</div>

			<div class="col-md-5">
				<div class="form-group">
					<button id="btn_crear_cliente" class="btn btn-success btn-lg btn-block btn-huge">Terminé [F1]</button>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<!--<div class="col-md-1"></div>-->

		<div class="row"><br/>
			<div class="col-md-6">
				<div class="col-md-12">
					<div class = "panel panel-default">
						<div class = "panel-heading">
							<h3 class = "panel-title">
								Nuevo Cliente
							</h3>
					   </div>
						<div class = "panel-body">
							<div class="row">

								<div class="form-group col-md-4">
									<label for="txt_nombre">Nombre</label>
									<input type="text" class="form-control" id="txt_nombre" placeholder="Nombre(s)" autofocus="">
								</div>

								<div class="form-group col-md-4">
									<label for="txt_paterno">Apellido paterno</label>
									<input type="text" class="form-control" id="txt_paterno" placeholder="Apellido paterno">
								</div>

								<div class="form-group col-md-4">
									<label for="txt_materno">Apellido materno</label>
									<input type="text" class="form-control" id="txt_materno" placeholder="Apellido materno">
								</div>

								<div class="col-md-4">
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label for="txt_lada1">Lada:</label>
										<input type="text" class="form-control" id="txt_lada1" placeholder="667">
									</div>
								</div>
								<div class="col-md-6">
									<div  class="form-group">
										<label for="txt_telefono1">Teléfono 1</label>
										<input type="tel" class="form-control" id="txt_telefono1" placeholder="Teléfono">
									
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="txt_tipo_telefono1">Tipo Telefono:</label>
										<select class="form-control" id="txt_tipo_telefono1">
											<option value="1">Celular</option>
											<option value="0">Casa</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label for="txt_lada2">Lada:</label>
										<input type="text" class="form-control" id="txt_lada2" placeholder="667">
									</div>
								</div>
								<div class="col-md-6">
									<div  class="form-group">
										<label for="txt_telefono2">Teléfono 2</label>
										<input type="tel" class="form-control" id="txt_telefono2" placeholder="Otro Teléfono">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="txt_tipo_telefono2">Tipo Telefono:</label>
										<select class="form-control" id="txt_tipo_telefono2">
											<option value="1">Celular</option>
											<option value="0">Casa</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div  class="form-group">
										<label for="txt_correo1">Correo 1</label>
										<input type="tel" class="form-control" id="txt_correo1" placeholder="Correo">
									</div>
								</div>
								<div class="col-md-6">
									<div  class="form-group">
										<label for="txt_correo2">Correo 2</label>
										<input type="tel" class="form-control" id="txt_correo2" placeholder="Otro Correo">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-10">
									<label>Roles</label>
									<table class="table table-hover">
										<thead>
										  <tr>
											<th>ROL</th>
											<th></th>
										  </tr>
										</thead>
										<tbody id="table_roles">
											
										</tbody>
									  </table>
								</div>
								<div class="col-md-1"></div>
							</div>
						</div>
					</div>
				</div>		
			</div>
			<div class="col-md-5">
				<div class="col-md-12">
					<div class = "panel panel-default">
						<div class = "panel-heading">
							<h3 class = "panel-title">
								Domicilio
							</h3>
					   </div>
						<div class = "panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="txt_calle">Calle</label>
										<input type="text" class="form-control" id="txt_calle" placeholder="Calle">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="txt_numero">Número</label>
										<input type="text" class="form-control" id="txt_numero" placeholder="Número">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="txt_colonia">Colonia</label>
										<input type="text" class="form-control" id="txt_colonia" placeholder="Colonia">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="select_estado">Estado</label>
										<select class="form-control" id="select_estado">
											<option>Seleccionar estado (Obligatorio)</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="select_municipio">Municipio</label>
										<select class="form-control" id="select_municipio">
											<option>Seleccionar municipio (Obligatorio)</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="txt_ciudad">Ciudad</label>
										<input type="text" class="form-control" id="txt_ciudad" placeholder="Sinaloa">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<label for="select_facturar">¿Facturar?</label>
										</div>
										<div class="col-md-6">
											<select class="form-control" id="select_facturar">
													<option>No</option>
													<option>Sí</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="div_facturacion" class="col-md-12" hidden="">
	<div class="col-md-1"></div>
		<div class="col-md-9">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Datos de facturación</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="txtRazonSocial">Razon Social</label>
								<input type="text" class="form-control" id="txt_razon_social" placeholder="Nombre o Razon Social" maxlength="100" autocomplete="off">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="txtRfc">RFC</label>
								<input type="text" class="form-control" id="txt_rfc" placeholder="XAXX010101000" maxlength="14" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="txtCalle">Dirección</label>
								<input type="text" class="form-control" id="txt_calle_factura" placeholder="Calle y Número" maxlength="254" autocomplete="off">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="txtColonia">Colonia</label>
								<input type="text" class="form-control" id="txt_colonia_factura" placeholder="Colonia" maxlength="30" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label for="txtCiudad">Ciudad</label>
								<input type="text" class="form-control" id="txt_ciudad_factura" placeholder="Ciudad | Población | Municipio" maxlength="30" autocomplete="off">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="txtEstado">Estado</label>
								<input type="text" class="form-control" id="txt_estado" placeholder="Colonia" maxlength="30" autocomplete="off">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="txtCp">Código Postal</label>
								<input type="num" class="form-control" id="txt_cp" placeholder="CP" maxlength="5" autocomplete="off">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="col-md-2"></div>
</div>

<!-- Modal -->
<div id="modal_consultar_cliente" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Consultar cliente</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-10">
							<label>Nombre y/o teléfono del cliente</label>
							<input type="text" class="typeahead form-control" name="search-box3" autocomplete="off" id="search-box3"/>
						</div>
						<div class="col-md-2">
							<button style="margin-top: 1em" class="btn btn-lg btn-success" id="btn_buscar_cliente">Buscar</button>
						</div>
					</div>
				</div><br/>
				<div class="row" id="div_modificar_cliente" hidden="">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
							<label>Seleccionar una opción para agregar o elimar el correspondiente</label>
								<select class="form-control" id="opcion_modificar">
									<option value="0">Seleccione una opción..</option>
									<option value="1">Modificar Nombre</option>
									<option value="2">Domicilio</option>
									<option value="3">Telefono</option>
									<option value="4">Correo</option>
									<option value="5">Factura</option>
								</select>
							</div>
						</div><br/>	
						<!-- Formulario para agregar domicilio -->
						<div class="row" id="nombre" hidden="">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Modificar el nombre del cliente</h3>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-4">
												<label for="txt_nuevo_nombre">Nombre</label>
												<input class="form-control" type="text" id="txt_nuevo_nombre"/>
											</div>
											<div class="col-md-4">
												<label for="txt_nuevo_apellido_paterno">Apellido P.</label>
												<input class="form-control" type="text" id="txt_nuevo_apellido_paterno"/>
											</div>
											<div class="col-md-4">
												<label for="txt_nuevo_apellido_materno">Apellido M.</label>
												<input class="form-control" type="text" id="txt_nuevo_apellido_materno"/>
											</div>
										</div><br/>
										<div class="row">
											<div class="col-md-4">
												<button type="button" class="btn btn-success" id="btn_nuevo_nombre">Modificar</button>
											</div><br/>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						<!-- Formulario para agregar domicilio -->
						<div class="row" id="domicilio" hidden="">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Agregar nuevo Domicilio</h3>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-4">
												<label for="txt_nuevo_calle">Calle</label>
												<input class="form-control" type="text" id="txt_nuevo_calle" placeholder="Calle"/>
											</div>
											<div class="col-md-4">
												<label for="txt_nuevo_numero">Numero</label>
												<input class="form-control" type="text" id="txt_nuevo_numero" placeholder="Numero"/>
											</div>
											<div class="col-md-4">
												<label for="txt_nuevo_colonia">Colonia</label>
												<input class="form-control" type="text" id="txt_nuevo_colonia" placeholder="Colonia"/>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<label for="select_estado_nuevo">Estado</label>
												<select class="form-control" id="select_estado_nuevo">
													<option>Seleccione un Estado</option>
												</select>
											</div>
											<div class="col-md-4">
												<label for="select_municipio_nuevo">Municipio</label>
												<select class="form-control" id="select_municipio_nuevo">
													<option>Seleccione un Municipio</option>
												</select>
											</div>
											<div class="col-md-4">
												<label for="txt_nuevo_ciudad">Ciudad</label>
												<input class="form-control" type="text" id="txt_nuevo_ciudad" placeholder="Ciudad"/>
											</div>
										</div><br/>
										<div class="row">
											<div class="col-md-1"></div>
											<div class="col-md-10">
												<label>Roles</label>
												<table class="table table-hover">
													<thead>
													  <tr>
														<th>ROL</th>
														<th></th>
													  </tr>
													</thead>
													<tbody id="nuevo_table_roles">
														
													</tbody>
												  </table>
											</div>
											<div class="col-md-1"></div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<button type="button" class="btn btn-success" id="btn_nuevo_domicilio">Agregar</button>
											</div><br/>
										</div>
									</div>
								</div>
							</div>
							<!-- Panel para mostrar domicilios ya registrados-->
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Domicilios activos</h3>
									</div>
									<div class="panel-body">
										<table class="table table-hover">
											<thead>
												<tr>
												<th>Calle</th>
												<th>Número</th>
												<th>Colonia</th>
												<th>Ciudad</th>
												<th></th>
												</tr>
											</thead>
											<tbody id="domicilios_existentes">

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Formulario para agregar un nuevo telefono -->
						<div class="row" id="telefono" hidden="">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Agregar nuevo Telefono</h3>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-3">
												<label for="txt_nuevo_lada">Lada</label>
												<input class="form-control" type="text" id="txt_nuevo_lada" placeholder="667"/>
											</div>
											<div class="col-md-4">
												<label for="txt_nuevo_telefono">Telefono</label>
												<input class="form-control" type="text" id="txt_nuevo_telefono" placeholder="####"/>
											</div>
											<div class="col-md-5">
												<label for="txt_nuevo_tipo_telefono">Tipo de Telefono</label>
												<select class="form-control" id="txt_nuevo_tipo_telefono">
													<option value="1">Celular</option>
													<option value="0">Casa</option>
												</select>
											</div>
										</div><br/>
										<div class="row">
											<div class="col-md-4">
												<button type="button" class="btn btn-success" id="btn_nuevo_telefono">Agregar</button>
											</div><br/>
										</div>
									</div>
								</div>
							</div>
							<!-- Panel para mostrar telefonos ya registrados -->
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Telefono activos</h3>
									</div>
									<div class="panel-body">
										<table class="table table-hover">
											<thead>
												<tr>
												<th>Lada</th>
												<th>Telefono</th>
												<th>Tipo</th>
												<th></th>
												</tr>
											</thead>
											<tbody id="telefonos_existentes">

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Formulario para agregar un nuevo correo -->
						<div class="row" id="correo" hidden="">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Agregar nuevo Correo</h3>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-8">
												<label for="txt_nuevo_correo">Correo Electronico</label>
												<input class="form-control" type="text" id="txt_nuevo_correo" placeholder="algo@algo.com"/>
											</div>
										</div><br/>
										<div class="row">
											<div class="col-md-4">
												<button type="button" class="btn btn-success" id="btn_nuevo_correo">Agregar</button>
											</div><br/>
										</div>
									</div>
								</div>
							</div>
							<!-- Panel para mostrar correos ya registrados -->
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Correos activos</h3>
									</div>
									<div class="panel-body">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Correo</th>
													<th></th>
												</tr>
											</thead>
											<tbody id="correos_existentes">

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Formulario para agregar un nueva factura -->
						<div class="row" id="factura_datos" hidden="">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Agregar nueva Factura</h3>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<label for="txt_nuevo_razon_social">Razon Social</label>
													<input type="text" class="form-control" id="txt_nuevo_razon_social" placeholder="Razon Social" maxlength="100" autocomplete="off">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="txt_nuevo_rfc">RFC</label>
													<input type="text" class="form-control" id="txt_nuevo_rfc" placeholder="XAXX010101000" maxlength="14" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<label for="txt_nuevo_calle_factura">Dirección</label>
													<input type="text" class="form-control" id="txt_nuevo_calle_factura" placeholder="Calle y Número" maxlength="254" autocomplete="off">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="txt_nuevo_colonia_factura">Colonia</label>
													<input type="text" class="form-control" id="txt_nuevo_colonia_factura" placeholder="Colonia" maxlength="30" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="txt_nuevo_ciudad_factura">Ciudad</label>
													<input type="text" class="form-control" id="txt_nuevo_ciudad_factura" placeholder="Ciudad" maxlength="30" autocomplete="off">
												</div>
											</div>
											<div class="col-md-4">
												<label for="select_estado_nuevo_factura">Estado</label>
												<select class="form-control" id="select_estado_nuevo_factura">
													<option>Seleccione un Estado</option>
												</select>
											</div>
											<div class="col-md-4">
												<label for="select_municipio_nuevo_factura">Municipio</label>
												<select class="form-control" id="select_municipio_nuevo_factura">
													<option>Seleccione un Municipio</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label for="txt_nuevo_cp_factura">C.Postal</label>
													<input type="num" class="form-control" id="txt_nuevo_cp_factura" placeholder="CP" maxlength="5" autocomplete="off">
												</div>
											</div>
											<div class="col-md-9"></div>
										</div><br/>
										<div class="row">
											<div class="col-md-4">
												<button type="button" class="btn btn-success" id="btn_nuevo_factura_datos">Agregar</button>
											</div><br/>
										</div>
									</div>
								</div>
							</div>
							<!-- Panel para mostrar correos ya registrados -->
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Facturas Activas</h3>
									</div>
									<div class="panel-body">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Razon Social</th>
													<th>Dirección</th>
													<th></th>
												</tr>
											</thead>
											<tbody id="facturas_existentes">

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<script src="../js/typeahead.bundle.js"></script>
<script src="../js/crear_cliente.js"></script>

