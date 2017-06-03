<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>
<link href="../css/typeahead.css" type="text/css" rel="stylesheet"/>

<div class="row">
	<div class="col-md-4">
		<h3><span class='nombreSistema'><strong>Empresa S.A. de C.V.</strong> | DBM Restaurant<br /><small>Módulo de Pedidos</small></span></h3>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<button class="btn btn-success btn-lg btn-block btn-menu-pedido" id="btn_enviar_pedido"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar Pedido</button>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<button class="btn btn-info btn-lg btn-block btn-menu-pedido" id="btn_nueva_mesa"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Mesa</button>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<button class="btn btn-primary btn-lg btn-block btn-menu-pedido" id="btn_mesas_vigentes"><i class="fa fa-search" aria-hidden="true"></i> Mesas Vigentes</button>
		</div>
	</div>
	<div class="col-md-2">
		<div class="btn-group btn-group-lg btn-block btn-menu-pedido">
		   <button type="button" class="btn btn-warning btn-block dropdown-toggle" data-toggle="dropdown">
			  <i class="fa fa-bars" aria-hidden="true"></i> Extras 
			  <span class="caret"></span>
		   </button>
		   <ul class="dropdown-menu" role="menu">
			  <li><a href="#"><i class="fa fa-car" aria-hidden="true"></i> Tipo de Pedido</a></li>
			  <li class="divider"></li>
			  <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Ticket</a></li>
			  <li><a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Facturar Ticket</a></li>
			  <li class="divider"></li>
			  <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
		   </ul>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-1">
		<div class="panel panel-default panel_clientes_con_pedido text-center">
			<div class="panel-heading">
				<i class="fa fa-users fa-2x" aria-hidden="true"></i> <span class="font-title"></span>
			</div>
			<div class="panel-body">
				
				<!--<button class="btn btn-info btn-block btn_comensal">
				  <i class="fa fa-user fa-2x" aria-hidden="true"></i>
				</button>
						-->	
				<button type="button" class="btn btn-danger btn-block" id="remover_comensal">
					<i class="fa fa-times fa-2x" aria-hidden="true"></i>
				</button>		
				<button class="btn btn-success btn-block" id="agregar_comensal">
				  <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
				</button>	
						
			</div>
		</div>
	</div>
	<div class="col-md-2 col-sm-12">
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<i class="fa fa-th-large fa-2x" aria-hidden="true"></i> <span class="font-title"> Clasificación</span>
		   </div>
			<div class="contenedor-pedido" id="clasificacion">
				<!--<div class="img-pedido">
					<img src="https://media-cdn.tripadvisor.com/media/photo-s/0b/01/02/9b/sushis.jpg" class="img-responsive" />
					Sushis
				</div>
				<div class="img-pedido">
					<img src="http://www.redcapitalmx.com/wp-content/uploads/2016/11/hamburguesafotoGu%C3%ADa-Veracruz.jpg" class="img-responsive" />
					Hamburguesas
				</div>
				<div class="img-pedido">
					<img src="http://www.quimatic.cl/wp-content/uploads/2016/08/bebidas-1-960x660.jpg" class="img-responsive" />
					Bebidas
				</div>-->
			</div>
		</div>
	</div>
	<div class="col-md-5 col-sm-12">
		<div class = "panel panel-default contenedor-pedido-pedido">
			<div class = "panel-heading">
				<div class = "panel-title">
					<div class = "row">
						<div class="col-md-7">
							<i class="fa fa-coffee fa-2x" aria-hidden="true"></i> <span class="font-title"> Productos</span>
						</div>
						<div class="col-md-5">
							<div class="input-group">
							  <input type="text" class="form-control" id="txt_busqueda_producto" placeholder="Busqueda de Producto">
							  <span class="input-group-btn">
								<button class="btn btn-success " id="btn_busqueda_producto" type="button">
									<i class="fa fa-plus" aria-hidden="true"></i>
								</button>
							  </span>
							</div>
						</div>
					</div>
					<!--<div class="row">
						<div class="col-md-5">
							<strong><span class="hidden lblIdTipoServicio">0</span> <span class="hidden lblTipoServicio">Local</span></strong> <br /> <span class="hidden lblIdCliente">0001</span> <span class="hidden lblNombre">Público en general</span> <b><span class="hidden lblIdModificaPedidoTexto"></span><span class="hidden lblIdModificaPedido"></span></b>
						</div>
						<div class="col-md-2">
							<input type="number" class="form-control" id="txtCantidad" placeholder="Cant" value="1">
						</div>
						<div class="col-md-5">
							<span id="autocomplete">
								<input type="text" class="form-control" id="search-box5" placeholder="Nombre de Producto" />
								<ul class="list-group" id="search_suggestion_holder5"></ul>
							</span>
						</div>
					</div>-->
				</div>
		   </div>
		   	<div class="contenedor-pedido text-center">
				<div class="contenedor_flotantes" id="producto">
					<!--<div class="img-pedido-producto">
						<div class="thumbnail">
							<img src="http://207.210.229.200/~sushi/wp-content/uploads/2014/05/marytierra.jpg" />
						</div>
						Mar y Tierra
					</div>
					<div class="img-pedido-producto">
						<div class="thumbnail">
							<img src="http://image.zmenu.com/large/73444/20150219141330653297.jpg" />
						</div>
						Tres Quesos Spicy
					</div>
					<div class="img-pedido-producto">
						<div class="thumbnail">
							<img src="http://www.sushitown.com.mx/images/menus/chon-big.jpg" />
						</div>
						Chon
					</div>
					<div class="img-pedido-producto">
						<div class="thumbnail">
							<img src="https://tevienlinea.in/cimages/contacto@chinaloa.com/4d1d41_image.jpg" />
						</div>
						Guamuchilito
					</div>
					<div class="img-pedido-producto">
						<div class="thumbnail">
							<img src="https://media.fromthegrapevine.com/assets/images/2015/10/vegetarian-sushi-rolls.jpg.839x0_q71_crop-scale.jpg" />
						</div>
						Vegetariano
					</div>-->
				</div>
			</div>
			
		</div>
			<div class = "panel panel-default configuracion_pedido">
				<div class = "panel-heading">
					<div class="row">
						<div class="col-md-12">
							<i class="fa fa-cog fa-2x" aria-hidden="true"></i> 
							<span class="font-title"> Configuración de Producto </span>
							<strong><span class="font-title producto_abierto_actualmente pull-right"></span></strong>
						</div>
					</div>
			   </div>
			   <div class = "panel-body">
					<div class="row">
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="slt_tipo">Tamaño de Porción:</label>
										<select class="form-control input-sm" id="slt_tipo">
											<!--<option value="1">Completo</option>
											<option value="2">1/2 Porción</option>
											<option value="4">3/4 Porción</option>-->
										</select>
									</div>
								</div>
							</div>
							<div class="row no_aplica_configuracion_pedido">
								<div class="col-md-12">
									<div class="input-group">
									  <input type="text" class="form-control" id="txt_ingrediente_extra" placeholder="Ingrediente Extra">
									  <span class="input-group-btn">
										<button class="btn btn-success " id="btn_ingrediente_extra" type="button">
											<i class="fa fa-plus" aria-hidden="true"></i>
										</button>
									  </span>
									</div><br/>
								</div>
							</div>
							<table id="ingrediente_extra" class="table table-striped no_aplica_configuracion_pedido">
								<tbody>
									<!--<tr>
										<td class="col-md-10">Tampico (1)</td>
										<td class="col-md-2"><button class="btn btn-danger"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> <span class="font-title"></span></button></td>
									</tr>
									<tr>
										<td class="col-md-10">Queso Parmesano (1)</td>
										<td class="col-md-2"><button class="btn btn-danger"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> <span class="font-title"></span></button></td>
									</tr>
									<tr>
										<td class="col-md-10">Camarón (2)</td>
										<td class="col-md-2"><button class="btn btn-danger"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> <span class="font-title"></span></button></td>
									</tr>-->
								</tbody>
							</table>
						</div>
						<div class="col-md-7 no_aplica_configuracion_pedido">
							
							<div class="row">
								<div class="col-md-12 ">
									<strong>Ingredientes Predefinidos</strong>
								</div>
							</div>
							<table id="ingrediente" class="table table-striped">
								<tbody>
									<!--<tr>
										<td class="col-md-4">
											<div class="make-switch">
												<input type="checkbox" class="validacionCongreso txt_validacion" data-on-text="Con" data-off-text="Sin" checked />
											</div>
										</td>
										<td class="col-md-8">Arroz</td>
									</tr>
									<tr>
										<td class="col-md-4">
											<div class="make-switch">
												<input type="checkbox" class="validacionCongreso txt_validacion" data-on-text="Con" data-off-text="Sin" checked />
											</div>
										</td>
										<td class="col-md-8">Res</td>
									</tr>
									<tr>
										<td class="col-md-4">
											<div class="make-switch">
												<input type="checkbox" class="validacionCongreso txt_validacion" data-on-text="Con" data-off-text="Sin" checked />
											</div>
										</td>
										<td class="col-md-8">Pollo</td>
									</tr>
									<tr>
										<td class="col-md-4">
											<div class="make-switch">
												<input type="checkbox" class="validacionCongreso txt_validacion" data-on-text="Con" data-off-text="Sin" checked />
											</div>
										</td>
										<td class="col-md-8">Chile Serrano</td>
									</tr>-->
								</tbody>
							</table>
						</div>
						

					</div>
				</div>
			</div>
	</div>
	<div class="col-md-4 col-sm-12">
		<div class = "panel panel-default cuenta_total">
			<div class = "panel-heading">
				<div class="row">
					<div class="col-md-12">
						<i class="fa fa-th-list fa-2x" aria-hidden="true"></i> 
						<span class="font-title"> Mi Comanda </span>
						<!--<strong><span class="font-title mesa_abierta_actualmente pull-right"></span></strong>-->
					</div>
				</div>
				<!--<h3 class = "panel-title">
					<div class="row">
						<div class="col-md-6">
							<input type="text" class="form-control" id="txt_mesa" placeholder="Cliente" />
						</div>
						<div class="col-md-6">
							<select class="form-control" id ="txt_usuario_servicio_general"></select>
						</div>
					</div>
				</h3>-->
			</div>
			
			<table id="pedido_comanda" class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="col-md-6 text-left">Producto</th>
						<th class="col-md-3 text-right">Importe</th>
						<th class="col-md-3"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-left">Hamburguesa Americana (1)</td>
						<td class="text-right">$180.00</td>
						<td>
							<button class="btn btn-info btn-sm"><i class="fa fa-comment"></i></button>
							<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					<tr>
						<td class="text-left">Agua Limon CH (1)</td>
						<td class="text-right"><small>$</small>30.00</td>
						<td>
							<button class="btn btn-info btn-sm"><i class="fa fa-comment"></i></button>
							<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				</tbody>
			</table>
			<div class = "panel-body">
				<div class="row">
					<div class="col-md-12 text-right">
						<h3><small>TOTAL <strong></strong></small>$<strong>210.00<strong> <small><strong>MXN</strong></small></h3>
					</div>
				</div>
			</div>
		</div>
		<!--<div class = "panel panel-default">
			<div class = "panel-heading">
				<h3 class = "panel-title">
					Total
				</h3>
		   </div>
		   <div class="panel-body">
				<div class="col-md-12">
					<h1>$<span class="cantidadTotal">0.00</span></h1>
				</div>
			</div>
		</div>-->
	</div>
</div>
<div id="eliminar_producto" class="modal fade hidden-print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Eliminar</h3>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btnYes">Eliminar</button>
			</div>
		</div>
	</div>
</div>
<div id="cancelar_pedido" class="modal fade hidden-print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Cancelar Pedido</h3>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btn_cancela_seguro">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<div id="cancelarProducto" class="modal fade hidden-print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Cancelar Producto</h3>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btnCancelaProducto">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade hidden-print" id="dlgCobrar" tabindex="-1" role="dialog" aria-labelledby="dlgCobrarLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Módulo de Cobro para cuenta <span class="folioCuenta"></span></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group tipoPagoElementos">
							<label for="txtPagoEfectivo" class="form-control-label">Efectivo:</label>
							<input type="number" class="txtPagoEfectivo form-control" data-id="0" id="txtPago[]" />
							<span class="tipo_pago"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="txtPagoResta" class="form-control-label" id="lblOD">Resta:</label>
							<input type="text" class="form-control" id="txtPagoResta"  readonly />
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="txt_pago_total" class="form-control-label">Total:</label>
							<input type="text" class="form-control" id="txt_pago_total" readonly />
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group hide">
								<label class="form-control-label">Tipo de pago:</label><br/>
								<div class="radio-inline">
									<label><input type="radio" name="rdoPago" id="rdoPago" class="rdoContado" value="0" checked>Contado</label>
								</div>
								<div class="radio-inline">
									<label><input type="radio" name="rdoPago" id="rdoPago" class="rdoCredito"  value="1">Crédito</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group hide">
								<label for="txtPropina" class="form-control-label">Propina:</label>
								<input type="number" class="txtPropina form-control" data-id="0" id="txtPropina" />
							</div>
							<div class="form-group">
								<label for="txtPropina" class="form-control-label">Descuento:</label>
								<input type="number" class="txtDescuentoCuenta form-control" data-id="0" id="txtDescuentoCuenta" placeholder="$" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btn_cerrar" data-dismiss="modal">Volver</button>
				<button type="button" class="btn btn-primary" id="btn_aceptar_cobrar">Cobrar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade hidden-print" id="dlgCliente" tabindex="-1" role="dialog" aria-labelledby="dlgClienteLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Extra</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="txt_tipo_pedido">Tipo de Pedido:</label>
							<select class="form-control" id="txt_tipo_pedido">
								<option value='0-Local' selected>Local</option>
								<option value='1-Para Llevar'>Para Llevar</option>
								<option value='2-Domicilio'>Domicilio</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="search-box1" class="form-control-label">Nombre de Cliente:</label>
							<span id="autocomplete">
								<input type="text" class="form-control" name="search-box" id="search-box" placeholder="Nombre de Cliente" autocomplete="off"/>
								<ul class="list-group" id="search_suggestion_holder"></ul>
							</span>
						</div>
					</div>
				</div>
				<div class="row datoDomicilio">
					<div class="col-md-8">
						<div class="form-group">
							<label for="txt_direccion">Domicilio:</label>
							<input type="text" class="form-control" id="txt_direccion" placeholder="Calle y Número" autocomplete="off"/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="message-text" class="form-control-label">Colonia:</label>
							<input type="text" class="form-control" id="txt_colonia" placeholder="Colonia" autocomplete="off"/>
						</div>
					</div>
				</div>
				<div class="row datoDomicilio">
					<div class="col-md-6">
						<div class="form-group">
							<label for="message-text" class="form-control-label">Teléfono 1:</label>
							<input type="text" class="form-control" id="txt_telefono1" placeholder="Celular" autocomplete="off"/>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="message-text" class="form-control-label">Teléfono 2:</label>
							<input type="text" class="form-control" id="txt_telefono2" placeholder="Teléfono" autocomplete="off"/>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btn_cerrar" data-dismiss="modal">Salir</button>
				<button type="button" class="btn btn-primary" id="btn_aceptar_cliente" data-dismiss="modal">Seleccionar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade hidden-print" id="dlgProcesaCobro" tabindex="-1" role="dialog" aria-labelledby="dlgPrecioLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 id="tituloProcesaCobro">¡Muchas Gracias!</h5>
			</div>
			<div class="modal-body">
				<h4 id="mensajeProcesaCobro">Pago Procesado</h4>
			</div>
		</div>
	</div>
</div>
<div class="modal fade hidden-print" id="dlgPrecio" tabindex="-1" role="dialog" aria-labelledby="dlgPrecioLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Pedidos</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table id="carga_pedido" class="table table-striped table-hover less">
							<thead>
								<tr>
									<th class="col-md-1">#</th>
									<th class="col-md-2">Mesa</th>
									<th class="col-md-3">Tipo</th>
									<th class="col-md-2">Importe</th>
									<th class="col-md-4">Acción</th>
								</tr>
							</thead>
							<tbody>
								<tr></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade hidden-print" id="dlgVistaPedido" tabindex="-1" role="dialog" aria-labelledby="dlgPrecioLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Pedido: <span id="numero_pedido"></span></h4>

			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table id="carga_pedidoProducto" class="table table-striped table-hover less">
							<thead>
								<tr>
									<th class="col-md-7">Descripción</th>
									<th class="col-md-4">Acción</th>
								</tr>
							</thead>
							<tbody>
								<tr></tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
					</div>
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h5>Mesa </h5>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6">
						<input type='text' class="form-control" id='txt_numero_mesa' />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6">
						<input type='button' class="form-control" id='btn_actualizar_mesa' value='Actualizar Mesa'/>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btnModificarPedido" data-dismiss="modal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Productos</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade hidden-print" id="dlgUsuario" tabindex="-1" role="dialog" aria-labelledby="dlgUsuarioLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Usuario que solicitó <b><span class="productoRealizado"></span></b></h4>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="form-group">
						<label for="txt_usuario_servicio" class="form-control-label">Nombre:</label>
						<select class="form-control" id ="txt_usuario_servicio"></select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btn_cerrar" data-dismiss="modal">Salir</button>
				<button type="button" class="btn btn-primary" id="btnAceptarUsuario" data-dismiss="modal">Seleccionar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade hidden-print" id="dlgComentarioExtra" tabindex="-1" role="dialog" aria-labelledby="dlgUsuarioLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Comentario para <b><span class="productoComentarioExtra"></span></b></h4>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="form-group">
						<label for="txtComentarioExtra" class="form-control-label">Comentario:</label>
						<textarea class="form-control" id ="txtComentarioExtra"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btn_cerrar" data-dismiss="modal">Salir</button>
				<button type="button" class="btn btn-primary" id="btnAceptarComentario" data-dismiss="modal">Comentar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="dlgSeguridadCorte" tabindex="-1" role="dialog" aria-labelledby="dlgAlmacenarLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Nota Importante</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">¿Estas seguro que el total de efectivo en caja es de $<strong><span class="totalCaja"></span></strong> pesos?</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default muestraCaja" aria-label="Close">No</button>
				<button type="button" class="btn btn-primary" id="btn_seguro_corte">Si</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="dlgSeguridadCorte2" tabindex="-1" role="dialog" aria-labelledby="dlgAlmacenarLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Nota Importante</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">Favor de introducir un valor positivo</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="dlg_nueva_mesa" tabindex="-1" role="dialog" aria-labelledby="dlg_cajaLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Selecciona la mesa que atenderás</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<strong>Mesas Disponibles</strong>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<table class="table" id="carga_mesa">
									<thead>
										<th class="col-md-6">Mesa</th>
										<th class="col-md-4">Capacidad</th>
										<th class="col-md-2"></th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<strong>Estructura de nueva mesa</strong>
						<table class="table" id="carga_mesa_dinamica">
							<thead>
								<th class="col-md-6">Mesa</th>
								<th class="col-md-4">Capacidad</th>
								<th class="col-md-2"></th>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mensaje_dlg_nueva_mesa"></div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4><i class="fa fa-info-circle" aria-hidden="true"></i> ¿Como funciona este módulo?</h4>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cerrar</button>
				<button type="button" class="btn btn-primary ocultarCajaChica" id="btn_activar_mesa">Siguiente Paso</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="dlg_mesa_abierta" tabindex="-1" role="dialog" aria-labelledby="dlgAlmacenarLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4>¡Nota Importante!</h4>
			</div>
			<div class="modal-body">
				<p>Actualmente existe un <strong>pedido abierto</strong> ¿Deseas <strong>cerrar</strong> este pedido para iniciar una <strong>nueva mesa</strong>?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">No</button>
				<button type="button" class="btn btn-primary" id="btn_aceptar_cierre_comensal">Si</button>
			</div>
		</div>
	</div>
</div>
<div id="dlg_comensal" class="modal fade" role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Comensal <small>Configuración</small></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<h4>Elige el <strong>color perfecto</strong> para tu comensal</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="entry-content">
							<div class="colores_de_comensal">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Volver al menú principal</button>
			</div>
		</div>
	</div>
</div>

<script src="../js/dropzone.js"></script>
<script src="../js/typeahead.bundle.js"></script>
<script type="text/javascript" src="../js/pedido.js"></script>