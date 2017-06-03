<div class="row">
	<div class="row" id="vista_crear_mesa">
		<div class="row"><br>
			<div class="col-md-5 col-sm-3 col-xs-6">
				<a class="btn btn-success btn-lg btn-block btn-huge" data-toggle="modal" data-target="#dlgProducto" data-whatever="@mdo" id="btnConsultar">Consultar</a>
			</div>
			
			<div class="col-md-2">
			</div>
			
			<div class="col-md-5 col-sm-3 col-xs-6">
				<button class="btn btn-success btn-lg btn-block btn-huge" id="btnDinamica">Mesa Dinámica</button>
			</div>
		</div>
		
		<div class="row"></br>
			<div class="col-md-12">
				<div class="col-md-5">
					<div class="panel panel-default">
						<div class="panel panel-heading">
							<h3 class="panel-title">
								Datos de la mesa
							</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="txt_nombre">Nombre:</label>
										<input type="text" class="form-control" id="txt_nombre" placeholder="Nombre de mesa">
									</div>
								</div>	
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="txt_capacidad">Capacidad:</label>
										<input type="text" class="form-control" id="txt_capacidad" placeholder="Capacidad de mesa">
									</div>
								</div>
							</div>
							<div class="row">
								<div class=col-md-8 col-sm-3 col-xs-6">
									<button class="btn btn-success btn-lg btn-block btn-huge" id="btnMesa">Crear Mesa</button>
								</div>
								<div class="col-md-4">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel panel-heading">
								<h3 class="panel-title">
									Mesas Disponibles
								</h3>
							</div>
							<table class="table table-striped" id="carga_mesa">
								<thead >
									<tr>
										<th>Nombre</th>
										<th>Capacidad</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" id="vista_crear_mesa_dinamica">
	
		<div class="row">
			<div class="col-md-7">
			</div>
			<div class="col-md-4 col-sm-3 col-xs-6">
				<button class="btn btn-success btn-lg btn-block btn-huge" id="btnfinal">Finalizar</button>
			</div>
		</div>
		
		<div class="row"></br>
			<div class="col-md-12">
				<div class="col-md-5">
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel panel-heading">
								<h3 class="panel-title">
									Mesas Disponibles
								</h3>
							</div>
							<table class="table table-striped" id="carga_mesa2">
								<thead >
									<tr>
										<th>Nombre</th>
										<th>Capacidad</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel panel-heading">
								<h3 class="panel-title">
									Mesa Dinamica
								</h3>
							</div>
							<table class="table table-striped" id="carga_mesa_dinamica">
								<thead >
									<tr>
										<th>Nombre</th>
										<th>Capacidad</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="dlgProducto">
		<div class="modal-dialog" role="document">
			<div class="modal-content">								
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						<h3 class="panel-title">
							Mesas Disponibles
						</h3>
					</div>
					<table class="table table-striped" id="carga_mesas_consulta">
						<thead >
							<tr>
								<th>Nombre</th>
								<th>Capacidad</th>
								<th>Estatus</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnCerrar" data-dismiss="modal">Salir</button>
				</div>
			</div>			
		</div>
	</div>
	
</div>

<script src="../js/crear_mesa.js"></script>
