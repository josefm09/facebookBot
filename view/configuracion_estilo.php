<div class="col-md-12">
	<div class="panel panel-default">
		<div class = "panel-heading color_panel">
			<h3 class = "panel-title">
				Editar color de panel
			</h3>
		</div>
		<div class="panel-body">

			<center>
				<button type="button" class="btn btn-primary change_color_btn_primary">Button primary</button>
				<button type="button" class="btn btn-success change_color_btn_success">Button Success</button>
				<button type="button" class="btn btn-warning change_color_btn_warning">Button Warning</button>
			</center>

			<br><br>

			<div class="row">
				<div class="form-group">
					<label class="col-md-4 control-label" for="configuracion_usuario_fuente">Fuente para todo el sistema</label>
					<div class="col-md-5">
						<select id="configuracion_usuario_fuente" name="configuracion_usuario_fuente" class="form-control">
							<option value="''Inconsolata', monospace" style="font-family: 'Inconsolata', monospace;">Inconsolata</option>
							<option value="'Josefin Sans', sans-serif" style="font-family: 'Josefin Sans', sans-serif;">Josefin Sans</option>
							<option value="'Audiowide', cursive" style="font-family: 'Audiowide', cursive;">Audiowide</option>
							<option value="'Petit Formal Script', cursive" style="font-family: 'Petit Formal Script', cursive;">Petit Formal Script</option>
							<option value="'Open Sans', sans-serif" style="font-family: 'Open Sans', sans-serif;">Open Sans</option>
							<option value="'Droid Serif', serif" style="font-family: 'Droid Serif', serif;">Droid Serif</option>
							<option value="'Indie Flower', cursive" style="font-family: 'Indie Flower', cursive;">Indie Flower</option>
							<option value="'UnifrakturCook', cursive" style="font-family: 'UnifrakturCook', cursive;">UnifrakturCook</option>
							<option value="'Josefin Sans', sans-serif" style="font-family: 'Josefin Sans', sans-serif;">Josefin Sans</option>
							<option value="'Gloria Hallelujah', cursive" style="font-family: 'Gloria Hallelujah', cursive;">Gloria Hallelujah</option>
						</select>
					</div>
				</div>
			</div>

			<br><br>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<p class="input-group">
									<label for="txtFecha">Color de fondo en panel</label>
									<span class="input-group-btn">
									<button type="button" class="btn btn-default color_fondo_panel" ><i class="glyphicon glyphicon-tint"></i></button>
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<p class="input-group">
									<label for="txtFecha">Color de fondo en sistema</label>
									<span class="input-group-btn">
									<button type="button" class="btn btn-default color_fondo_sistema" ><i class="glyphicon glyphicon-tint"></i></button>
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="col-md-12">
	<div id="custom-bootstrap-menu" class="navbar navbar-default color_navbar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="#">Brand</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Productos</a>
                </li>
                <li><a href="#">Sobre nosotros</a>
                </li>
                <li><a href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<script src="../js/configuracion_estilo.js"></script>
<?php require('../view/modal_seleccionar_color.php'); ?>
