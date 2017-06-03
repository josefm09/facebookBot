<!-- Js de la vista -->
<script src="../js/editar_variables_configuracion_sistema.js"></script>

<div class="row">
	<center>
		<div id="cuerpo" class="col-sm-12">
			<form class="form-horizontal" id="registro_crear_facultad">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Variables del sistema</h3>
						</div>
						<div class="panel-body">
									<!-- Contraseña default -->
									<div class="alert alert-success" role="alert">
										<span class="sr-only">Info:</span>
										<p>Contraseña default usada por el sistema, será asignada a todos los nuevos usuarios y también se usara como nueva contraseña si se hace un reset.</p>
									</div>

									<div class="row">
										<div class="form-group">
											<label class="col-md-4 control-label" for="default_password">Contraseña default</label>
											<div class="col-md-5">
												<input id="default_password" name="default_password" type="text" placeholder="" class="form-control input-md" >
											</div>
										</div>
									</div>
									<hr>

									<!-- Años desde para la generacion en creacion de grupo -->
									<div class="alert alert-success" role="alert">
										<span class="sr-only">Info:</span>
										<p>Define el tiempo máximo de inactividad en segundos que un usuario puede acumular en el sistema antes de que se cierre sesión de manera automática.</p>
									</div>

									<div class="row">
										<div class="form-group">
											<label class="col-md-4 control-label" for="max_inactive_session_time">Tiempo máximo de sesión</label>
											<div class="col-md-5">
												<input id="max_inactive_session_time" name="max_inactive_session_time" type="text" placeholder="" class="form-control input-md" >
											</div>
										</div>
									</div>
									<hr>

						</div>
					</div>
				</div>

			</div>
			</form>
		</div>
	</center>
</div>
