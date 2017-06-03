<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>


	<div class="col-md-8 col-sm-6">
		<h3><span class='nombreSistema'>Registrar Nueva Mucama</span></h3>
	</div>
	<div class="col-md-2 col-sm-3 col-xs-6">
		<div class="form-group">
			<button class="btn btn-success btn-lg btn-block btn-huge" id="btnGuardar">Terminé [F1]</button>
		</div>
	</div>
	<div class="col-md-2 col-sm-3 col-xs-6">
		<div class="form-group">
			<button class="btn btn-primary btn-lg btn-block btn-huge" id="btn_consultar_trabajador">Consultar [F2]</button>
		</div>
	</div>


		<div class="col-md-8">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title">
						Nuevo Trabajador
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
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_nombre_trabajador">Nombre(s):</label>
								<input type="text" class="form-control" id="txt_nombre_trabajador" placeholder="Nombre">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_apellido_paterno_trabajador">Apelido Paterno:</label>
								<input type="text" class="form-control" id="txt_apellido_paterno_trabajador" placeholder="A paterno">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_apellido_materno_trabajador">Apelido Materno:</label>
								<input type="text" class="form-control" id="txt_apellido_materno_trabajador" placeholder="A materno">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="#txt_calle_trabajador">Calle:</label>
								<input type="text" class="form-control" id="txt_calle_trabajador" placeholder="Calle..">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_colonia_trabajador">Colonia:</label>
								<input type="text" class="form-control" id="txt_colonia_trabajador" placeholder="colonia..">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="#txt_numero_trabajador">Numero:</label>
								<input type="text" class="form-control" id="txt_numero_trabajador" placeholder="#">
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_correo_trabajador">Correo:</label>
								<input type="text" class="form-control" id="txt_correo_trabajador" placeholder="ejemplo@ejemplo.com">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="#txt_lada_trabajador">Lada:</label>
								<input type="text" class="form-control" id="txt_lada_trabajador" placeholder="667">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="#txt_telefono_trabajador">Telefono:</label>
								<input type="text" class="form-control" id="txt_telefono_trabajador" placeholder="###..">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="#txt_tipo_telefono_trabajador">Tipo Telefono:</label>
								<select class="form-control" id="txt_tipo_telefono_trabajador">
									<option value="1">Celular</option>
									<option value="0">Casa</option>
								</select>
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
							<div class="form-group">
								<label for="#txt_usuario_trabajador">Nombre Usuario:</label>
								<input type="text" class="form-control" id="txt_usuario_trabajador" placeholder="usuario..">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="#txt_tipo_trabajador">Tipo Empleado:</label>
								<select class="form-control" id="txt_tipo_trabajador">
									<option value="">Seleccione un tipo de Trabajador</option>
								</select>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title">
						Imagen del Trabajador
					</h3>
				</div>
				<div class = "panel-body">
					<!-- Change /upload-target to your upload address -->
					<form class="dropzone" id="upload_imagen_trabajador" enctype="multipart/form-data" method="post">
						<div class="fallback">
							<input name="file" type="file"/>
						  </div>
					</form>
				</div>
			</div>
			<?PHP
				if($_SESSION['privilegio_administrativo'] <= 2){
			?>
			<!-- <div class = "panel panel-default">
				<div class = "panel-body">

							// if($_SESSION['privilegio_administrativo'] == 1){

						<label for="#txt_empresa">Empresa:</label>
						<select class="form-control" id="txt_empresa" >

							<option value="">Seleccione una Empresa</option>
						</select>

						<label for="#txt_sucursal">Sucursal:</label>
						<select class="form-control" id="txt_sucursal">
							<option value="">Seleccione una Sucursal</option>
						</select>

						<label for="#txt_trabajador_asignado">¿Trabajador asignado?</label>
							<select class="form-control" id="txt_trabajador_asignado">
								<option value="1">Sí</option>
								<option value="0" selected>No</option>
							</select>
				</div>
			</div> -->
			<?PHP
				}
			?>
			
			
			<div class="row" id="roles" hidden="">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<label for="txt_correo2">Roles</label>
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
	

		<div class="col-md-6">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title">
						Datos de Referencia(1) de Nuevo Trabajador
					</h3>
				</div>
				<div class = "panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_nombre_referencia1_trabajador">Nombre(s):</label>
								<input type="text" class="form-control" id="txt_nombre_referencia1_trabajador" placeholder="Nombre">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_apellido_paterno_referencia1_trabajador">Apelido Paterno:</label>
								<input type="text" class="form-control" id="txt_apellido_paterno_referencia1_trabajador" placeholder="A paterno">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_apellido_materno_referencia1_trabajador">Apelido Materno:</label>
								<input type="text" class="form-control" id="txt_apellido_materno_referencia1_trabajador" placeholder="A materno">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="#txt_calle_referencia1_trabajador">Calle:</label>
								<input type="text" class="form-control" id="txt_calle_referencia1_trabajador" placeholder="Calle..">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_colonia_referencia1_trabajador">Colonia:</label>
								<input type="text" class="form-control" id="txt_colonia_referencia1_trabajador" placeholder="colonia..">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="#txt_numero_referencia1_trabajador">Numero:</label>
								<input type="text" class="form-control" id="txt_numero_referencia1_trabajador" placeholder="#">
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_correo_referencia1_trabajador">Correo:</label>
								<input type="text" class="form-control" id="txt_correo_referencia1_trabajador" placeholder="ejemplo@ejemplo.com">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="#txt_lada_referencia1_trabajador">Lada:</label>
								<input type="text" class="form-control" id="txt_lada_referencia1_trabajador" placeholder="667">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="#txt_telefono_referencia1_trabajador">Telefono:</label>
								<input type="text" class="form-control" id="txt_telefono_referencia1_trabajador" placeholder="###..">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="#txt_tipo_telefono_referencia1_trabajador">Tipo Telefono:</label>
								<select class="form-control" id="txt_tipo_telefono_referencia1_trabajador">
									<option value="1">Celular</option>
									<option value="0">Casa</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-6">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title">
						Datos de Referencia(2) de Nuevo Trabajador
					</h3>
				</div>
				<div class = "panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_nombre_referencia2_trabajador">Nombre(s):</label>
								<input type="text" class="form-control" id="txt_nombre_referencia2_trabajador" placeholder="Nombre">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_apellido_paterno_referencia2_trabajador">Apelido Paterno:</label>
								<input type="text" class="form-control" id="txt_apellido_paterno_referencia2_trabajador" placeholder="A paterno">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_apellido_materno_referencia2_trabajador">Apelido Materno:</label>
								<input type="text" class="form-control" id="txt_apellido_materno_referencia2_trabajador" placeholder="A materno">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="#txt_calle_referencia2_trabajador">Calle:</label>
								<input type="text" class="form-control" id="txt_calle_referencia2_trabajador" placeholder="Calle..">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_colonia_referencia2_trabajador">Colonia:</label>
								<input type="text" class="form-control" id="txt_colonia_referencia2_trabajador" placeholder="colonia..">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="#txt_numero_referencia2_trabajador">Numero:</label>
								<input type="text" class="form-control" id="txt_numero_referencia2_trabajador" placeholder="#">
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="#txt_correo_referencia2_trabajador">Correo:</label>
								<input type="text" class="form-control" id="txt_correo_referencia2_trabajador" placeholder="ejemplo@ejemplo.com">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="#txt_lada_referencia2_trabajador">Lada:</label>
								<input type="text" class="form-control" id="txt_lada_referencia2_trabajador" placeholder="667">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="#txt_telefono_referencia2_trabajador">Telefono:</label>
								<input type="text" class="form-control" id="txt_telefono_referencia2_trabajador" placeholder="###..">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="#txt_tipo_telefono_referencia2_trabajador">Tipo Telefono:</label>
								<select class="form-control" id="txt_tipo_telefono_referencia2_trabajador">
									<option value="1">Celular</option>
									<option value="0">Casa</option>
								</select>
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
<div class="modal fade" id="dlg_usuario_consulta" tabindex="-1" role="dialog" aria-labelledby="dlgUsuarioLabel" aria-hidden="true">
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
							<label for="search-box1" class="form-control-label">Nombre:</label>
							<span id="autocomplete">
								<input type="text" class="form-control" name="search-box1" id="search-box1" placeholder="Nombre de trabajador" autocomplete="off"/>
								<ul class="list-group" id="search_suggestion_holder1"></ul>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btnCerrar" data-dismiss="modal">Salir</button>
				<button type="button" class="btn btn-primary" id="btn_seleccionar_usuario">Actualizar</button>
			</div>
		</div>
	</div>
</div>

<script src="../js/dropzone.js"></script>
<script src="../js/typeahead.bundle.js"></script>
<!--<script src="../js/almacenar_trabajadores.js"></script>-->
<script src="../js/almacena_trabajador.js"></script>
