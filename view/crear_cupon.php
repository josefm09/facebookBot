<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>
<link href="../css/typeahead.css" type="text/css" rel="stylesheet"/>

<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12"></br>
				<h3><span class='nombre_sistema'>DBM Restaurant</span> <small>Cupones</small></h3>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6" id="div_cupon">
		<div class="col-md-12">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					<h3 class = "panel-title lbl_nombre">
						<span class="lbl_nombre">Nuevo Cupon</span>
					</h3>
			   </div>
				<div class = "panel-body">
					<div class="row">
						<div class="col-md-7">
							<div  class="form-group">
								<label for="slt_duracion">Duración</label>
								<select class="form-control" id="slt_duracion">
									<option value='NULL'>Duración</option>
									<option value='3'>3 meses</option>
									<option value='6'>6 meses</option>
									<option value='12'>12 meses</option>
								</select>
							</div>
						</div>
						<div class="col-md-5">
						<div class="form-group">
							<label for="txt_cantidad_canjear">Veces Canjeable</label>
							<input type="text" class="form-control" id="txt_cantidad_canjear" placeholder="Veces Canjeable">
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div  class="form-group">
								<label for="txtFechaNacimiento">Fecha De Vencimiento</label>
								<input type="date" class="form-control" id="txt_fecha_vencimiento" placeholder="dd/mm/aaaa"/>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group"></br>
								<a href="#" class="btn btn-success btn-lg btn-block btn-huge btn_guardar" id="btn_guardar">Terminé [F1]</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-4"></div>
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

<script src="../js/typeahead.bundle.js"></script>
<script src="../js/crear_cupon.js"></script>
