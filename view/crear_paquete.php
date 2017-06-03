<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>

<div class="row">
	<div class="col-md-8 col-sm-6">
		<h3><span class='nombreSistema'>Registrar un Nuevo Paquete</span></h3>
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

<div class="col-md-10 col-sm-12">
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


<div class="col-md-8">
	<div class = "panel panel-default">
		<div class = "panel-heading">
			<h3 class = "panel-title">
				Nuevo Paquete
			</h3>
		</div>
		<div class = "panel-body">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="#txt_nombre">Nombre:</label>
						<input type="text" class="form-control" id="txt_nombre" placeholder="Nombre del Paquete">
					</div>
				</div>
				<div class="col-md-4">
					<div  class="form-group">
						<label for="#txt_calle">Precio:</label>
						<input type="tel" class="form-control" id="txt_precio" placeholder="Precio del Paquete" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="txt_id_producto">Productos:</label>
						<select class="form-control" id="txt_id_producto">
							<option value="">Seleccione un producto...</option>
						</select>
					</div>
				</div>

				<div class="col-md-2">
				</div>
				
				<div class="col-md-5">
					<span class="row uploadImage">
						<div class="form-group">
							<form class="dropzone" id="imagen_paquete" enctype="multipart/form-data" method="post">
								<div class="fallback">
									<input name="file" type="file"/>
								</div>
							</form>
						</div>
					</span>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-3 col-xs-6">
					<button class="btn btn-success btn-lg btn-block btn-huge" id="btnCrearPaquete">Crear Paquete</button>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../js/dropzone.js"></script>
<script src="../js/crear_paquete.js"></script>