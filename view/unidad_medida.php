<div class="row">
	<div class="row" id="vista_crear_mesa">
		

		<div class="row"></br>
			<div class="col-md-12">
				<div class="col-md-5">
					<div class="panel panel-default">
						<div class="panel panel-heading">
							<h3 class="panel-title">
								Datos de la unidad
							</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="txt_unidad">Unidad:</label>
										<input type="text" class="form-control" id="txt_unidad" placeholder="Nombre de la unidad de medida">
									</div>
								</div>	
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<button class="btn btn-success btn-lg btn-block btn-huge" id="btn_unidad">Crear Unidad</button>
								</div>
								<div class="col-md-8">
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
									Unidades de Medida Disponibles
								</h3>
							</div>
							<table class="table table-striped">
								<thead >
									<tr>
										<th>Unidad</th>
									</tr>
								</thead>
								<tbody id="carga_unidad">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-1">
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="modal_modificar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Unidad de Medida</h4>
      </div>
      <div class="modal-body">
		<div class="col-md-6">
			<label for="txt_unidad">Nombre de la Unidad:</label>
			<input type="text" class="form-control" id="txt_unidad_modificada"></input>
		</div>
		<div class="col-md-6"></div>
		<div class="col-md-12">
			<p>
				Modifice que el nombre de la unidad de medida tecleadola correctamente a como se dese el cambio.
				Para finalizar el cambio de click en el boton "Listo"
			</p>
		</div>
      </div>
      <div class="modal-footer">
        <button id="btn_unidad_modificada" type="button" class="btn btn-default" data-dismiss="modal">Listo</button>
      </div>
    </div>

  </div>
</div>

<script src="../js/unidad_medida.js"></script>