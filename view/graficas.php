<div class="row">
	<div class="col-md-6">
		<h3><span class='nombre_sistema'>Estadistica</span> <small>Clasificaciones</small></h3>
	</div>
</div>
<div class="row"><br />
	<div class="col-md-12" id="clasificaciones">
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<h3 class = "panel-title">
					<span class="lblUsuario"></span> Clasificaciones <span class="lblAccion"></span>
				</h3>
			</div>
			<div class = "panel-body">
				<div id="column"></div>
			</div>
		</div>
	</div>
	<div class="col-md-12 hide" id="sub-clasificaciones">
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<h3 class = "panel-title">
					<span class="lblUsuario"></span> Subclasificaciones <span class="lblAccion"></span>
				</h3>
			</div>
			<div class = "panel-body">
				<div id="column_subclasificaciones"></div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="dlgFiltrar" tabindex="-1" role="dialog" aria-labelledby="dlgFiltrarLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Subclasificaciones</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<span id="autocomplete">
								<select class="form-control" id="subclasificaciones">
								</select>
							</span>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4>Nota Informativa:</h4>
						<p>Si realizaste un <strong>Retiro de Efectivo</strong> significa que tomaste dinero recibido de tus abonos para reportar a usuario master o realizar algún gasto operativo (gasolina, comida, etc).</p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btn_cerrar_modal" data-dismiss="modal">Salir</button>
				<button type="button" class="btn btn-primary" id="btn_mostrar_grafica" data-dismiss="modal">Filtrar</button>
			</div>
		</div>
	</div>
</div>
<script src="../js/graficas.js"></script>