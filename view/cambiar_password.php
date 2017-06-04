<!-- Js de la vista -->
<script src="../js/cambiar_password.js"></script>

<form class="form-horizontal" id="cambiar_password">
					
	<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Cambiar contraseña</h3>
				</div>
				<div class="panel-body">
							<div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label" for="cambiar_password_old_password">Contraseña actual</label>
									<div class="col-md-5">
										<input id="cambiar_password_old_password" name="cambiar_password_old_password" type="password" placeholder="" class="form-control input-md">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label" for="cambiar_password_nueva_password">Nueva contraseña</label>
									<div class="col-md-5">
										<input id="cambiar_password_nueva_password" name="cambiar_password_nueva_password"type="password" placeholder="" class="form-control input-md">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group">
									<label class="col-md-4 control-label" for="cambiar_password_nueva_password_repetir">Repita la contraseña</label>
									<div class="col-md-5">
										<input id="cambiar_password_nueva_password_repetir" name="cambiar_password_nueva_password_repetir" type="password" placeholder="" class="form-control input-md">
									</div>
								</div>
							</div>

							<center>
								<div class="col-md-12">
									<div class="row">
										<div class="form-group">
											<a href="#" class="btn btn-lg btn-success" value="Registrar" onclick="enviar_cambiar_password();">Terminar [F1]</a>
										</div>
									</div>
								</div>
						</center>


				</div>
			</div>
		</div>
	<div class="col-md-2"></div>

	</div>
							
					</form>
