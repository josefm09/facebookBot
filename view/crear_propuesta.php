<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>
		<div class="row">
			<div class="col-md-6">
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<button class="btn btn-warning btn-lg btn-block btn-huge" id="btn_regresar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Anterior</button>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<button class="btn btn-success btn-lg btn-block btn-huge" id="btn_continuar"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Siguiente</button>
				</div>
			</div>
			<div class="col-md-2">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row formulario_1">
					<div class="col-md-12">
						<div class = "panel panel-default">
							<div class = "panel-heading">
								<div class="row">
									<div class="col-md-6">
										<h5 class = "panel-title pull-left"><i class="fa fa-university fa-2x" aria-hidden="true"></i> <strong>Problemática</strong></h5>
									</div>
									<div class="col-md-6">
										<h3 class = "panel-title pull-right panel-title-derecha"><i class="fa fa-paper-plane" aria-hidden="true"></i> <strong class="numero_formulario">PARTE 1</strong></h3>
									</div>
								</div>
							</div>
							<div class = "panel-body">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<label for="txt_titulo_propuesta">Titulo de propuesta</label>
										<input class="form-control" type="text" id="txt_titulo_propuesta"/>
									</div>
									<div class="col-md-1"></div>
								</div>
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<label for="txt_id_tema"><br/>Relación de la problematica con el tema</label><br/>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="txt_id_tema">Tema</label>
													<select class="form-control" id="txt_id_tema">
														<option>Seleccionar tema (Obligatorio)</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="txt_id_subtema">Subtema</label>
														<select class="form-control" id="txt_id_subtema">
														<option value="0">Seleccionar tema (Obligatorio)</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-1"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row formulario_2">
					<div class="col-md-12">
						<div class = "panel panel-default">
							<div class = "panel-heading">
								<div class="row">
									<div class="col-md-6">
										<h5 class = "panel-title pull-left"><i class="fa fa-university fa-2x" aria-hidden="true"></i> <strong>Problemática</strong></h5>
									</div>
									<div class="col-md-6">
										<h3 class = "panel-title pull-right panel-title-derecha"><i class="fa fa-paper-plane" aria-hidden="true"></i> <strong class="numero_formulario">PARTE 2</strong></h3>
									</div>
								</div>
						   </div>
							<div class = "panel-body">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="form-group col-md-10">
										<label for="txt_problema">Describa el Problema</label>
										<textarea type="text" class="form-control" id="txt_problema" rows="5" cols="40" />
									</div>
									<div class="col-md-1"></div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="row formulario_3">
					<div class="col-md-12">
						<div class = "panel panel-default">
							<div class = "panel-heading">
								<div class="row">
									<div class="col-md-6">
										<h5 class = "panel-title pull-left"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> <strong>Propuesta</strong></h5>
									</div>
									<div class="col-md-6">
										<h3 class = "panel-title pull-right panel-title-derecha"><i class="fa fa-paper-plane" aria-hidden="true"></i> <strong class="numero_formulario">PARTE 3</strong></h3>
									</div>
								</div>
						   </div>
							<div class = "panel-body">
								<div class="col-md-1"></div>
								<div class="form-group col-md-10">
									<label for="txt_propuesta">Proporcione la solución del problema</label>
									<textarea type="text" class="form-control" id="txt_propuesta" rows="5" cols="40"/>
								</div>
								<div class="col-md-1"></div>
							</div>
						</div>
					</div>
				</div>			
				
				<div class="row formulario_4">
					<div class="col-md-12">
						<div class = "panel panel-default">
							<div class = "panel-heading">
							
							<div class="row">
									<div class="col-md-6">
										<h5 class = "panel-title pull-left"><i class="fa fa-cloud fa-2x" aria-hidden="true"></i> <strong>Adjuntos</strong></h5>
									</div>
									<div class="col-md-6">
										<h3 class = "panel-title pull-right panel-title-derecha"><i class="fa fa-paper-plane" aria-hidden="true"></i> <strong class="numero_formulario">PARTE FINAL</strong></h3>
									</div>
								</div>
							</div>
							<div class = "panel-body">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<h4><strong>Evidencia</strong></h4>
									<form class="dropzone" id="upload_imgaen_propuesta" enctype="multipart/form-data" method="post">
										<div class="fallback">
											<input name="file" type="file"/>
										</div>
									</form>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</div>
				</div>					
			</div>
			<div class="col-md-2"></div>
		</div>
<script src="../js/dropzone.js"></script>	
<script src="../js/crear_propuesta.js"></script>

