<!-- Js de la vista -->
<script src="../js/restaurar_password.js"></script>

	<div class="col-md-2"></div>
		<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"> Restaurar contraseña </h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" id="reset_password">
				<div class="row">
					<div class="form-group">
						<label class="col-md-4 control-label" for="reset_password_usuario">Nombre de usuario</label>
						<div class="col-md-5">
							<input id="reset_password_usuario" name="reset_password_usuario" type="text" placeholder="" class="form-control input-md">
						</div>
					</div>
				</div>

				<center>
					<div class="col-md-12">
						<div class="row">
							<div class="form-group">
								<a href="#" class="btn btn-lg btn-success" value="Registrar" onclick="enviar_reset_password();">Terminar [F1]</a>
							</div>
						</div>
					</div>
			</center>
			</form>
		</div>
	</div>
</div>
	<div class="col-md-2"></div>