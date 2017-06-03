<div class="row container">
	<div class="row" id="vista_crear_mesa">
		<div class="row">
			<div class="col-md-12">
				<h3><span class='nombre_sistema'>DBM Restaurant</span> <small>Productos</small></h3>
			</div>
		</div>		

		<div class="row"></br>
			<div class="col-md-2"></div>
				<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel panel-heading">
						<h3 class="panel-title">
							Productos Sucursal
						</h3>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
								  <th></th>
								  <th><strong>Producto</strong></th>
								  <th><strong>Clasificación</strong></th>
								  <th></th>
								</tr>
							</thead>
							<tbody id="tbl_productos">
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
				
			
		</div>
	</div>
</div>


<!-- Modal -->
<div id="modal_producto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="titulo_modal"></h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-md-6">
				<label for="txt_cantidad">Cantidad:</label>
				<input type="text" class="form-control" id="txt_cantidad"></input>
				
				<label for="txt_cantidad_minima">Cantidad Minima:</label>
				<input type="text" class="form-control" id="txt_cantidad_minima"></input>
				
				<label for="txt_cantidad_maxima">Cantidad Maxima:</label>
				<input type="text" class="form-control" id="txt_cantidad_maxima"></input>
			</div>
			<div class="col-md-6">
				<label for="txt_precio_compra">Precio Compra:</label>
				<input type="text" class="form-control" id="txt_precio_compra"></input>

				<label for="txt_precio_venta">Precio Venta:</label>
				<input type="text" class="form-control" id="txt_precio_venta"></input>

			</div>
		</div>
		
		<div class="row">
		</div>
      </div>
      <div class="modal-footer">
		<div class="col-md-12">
			<p>
				Modifice que el nombre de la unidad de medida tecleadola correctamente a como se dese el cambio.
				Para finalizar el cambio de click en el boton "Listo"
			</p>
		</div>
        <button id="btn_cerrar" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="btn_actualizar" type="button" class="btn btn-default">Agregar</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="dlgActulizar" tabindex="-1" role="dialog" aria-labelledby="dlgAlmacenarLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 id="titulo">¡Finalizamos!</h5>
			</div>
			<div class="modal-body">
				<h4 id="mensaje">Tarea Procesada</h4>
			</div>
		</div>
	</div>
</div>

<script src="../js/producto_sucursal.js"></script>