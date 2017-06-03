<link href="../css/dropzone.min.css" type="text/css" rel="stylesheet"/>
<link href="../css/typeahead.css" type="text/css" rel="stylesheet"/>


	<div class="col-md-10">
		<h3><span class='nombreSistema'>Entrevista de Mucama <small class="numero_formulario">PARTE 1</small></span></h3>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<button class="btn btn-success btn-lg btn-block btn-huge" id="btn_continuar"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Siguiente</button>
		</div>
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<span class = "panel-title">
					<i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i> <span class="texto">Datos de Contacto</span>
				</span>
			</div>
			<div class = "panel-body">
			
				<div class="row formulario_1">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="#txt_nombre_trabajador">Nombre(s):</label>
									<input type="text" class="form-control" id="txt_nombre_trabajador" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="#txt_apellido_paterno_trabajador">Apellido Paterno:</label>
									<input type="text" class="form-control" id="txt_apellido_paterno_trabajador" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="#txt_apellido_materno_trabajador">Apellido Materno:</label>
									<input type="text" class="form-control" id="txt_apellido_materno_trabajador" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<hr/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="#txt_lada_trabajador">Lada:</label>
									<input type="text" class="form-control" id="txt_lada_trabajador" />
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="#txt_telefono_trabajador">Teléfono:</label>
									<input type="text" class="form-control" id="txt_telefono_trabajador" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="#txt_tipo_telefono_trabajador">Tipo Telefono:</label>
									<select class="form-control" id="txt_tipo_telefono_trabajador">
										<option value="1">Celular</option>
										<option value="0">Casa</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<hr/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="#txt_calle_trabajador">Calle:</label>
									<input type="text" class="form-control" id="txt_calle_trabajador" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="#txt_colonia_trabajador">Colonia:</label>
									<input type="text" class="form-control" id="txt_colonia_trabajador" />
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="#txt_numero_trabajador">Número:</label>
									<input type="text" class="form-control" id="txt_numero_trabajador"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="select_estado">Estado</label>
									<select class="form-control" id="select_estado"></select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="select_municipio">Municipio</label>
									<select class="form-control" id="select_municipio"></select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_ciudad">Ciudad</label>
									<input type="text" class="form-control" id="txt_ciudad" />
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row formulario_2">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_tiempo_en_domicilio">Tiempo en su Domicilio</label>
									<select class="form-control" id="txt_tiempo_en_domicilio">
										<option value="0">Menor a un año</option>
										<option value="1">De 1 a 5 años</option>
										<option value="2">Más de 5 años</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_cuenta_con_imss">¿Actualmente con IMSS?</label>
									<select class="form-control" id="txt_cuenta_con_imss">
										<option value="0">No</option>
										<option value="1">Si</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_edad">¿Cuántos años tiene?</label>
									<input type="number" class="form-control" id="txt_edad"/>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_padecimientos">¿Algún Padecimiento?</label>
									<select class="form-control" id="txt_padecimientos">
										<option value="0">Ninguno </option>
										<option value="1">Hipertensión</option>
										<option value="2">Diabetes</option>
										<option value="3">Alergias</option>
										<option value="4">Huesos o músculos</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_escolaridad">Escolaridad</label>
									<select class="form-control" id="txt_escolaridad">
										<option value="0">Primaria</option>
										<option value="1">Secundaria</option>
										<option value="2">Preparatoria</option>
										<option value="3">Profesional</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_citas_periodicas">Citas Periódicas</label>
									<select class="form-control" id="txt_citas_periodicas">
										<option value="0">Ninguno </option>
										<option value="1">Semanal</option>
										<option value="2">Quincenal</option>
										<option value="3">Mensual</option>
										<option value="4">Bimestral</option>
										<option value="5">Semestral</option>
										<option value="6">Anual</option>
									</select>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_familiar_con_padecimientos">Familiar con padecimiento</label>
									<select class="form-control" id="txt_familiar_con_padecimientos">
										<option value="0">No</option>
										<option value="1">Si</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-4 familiar_padecimiento">
								<div class="form-group">
									<label for="txt_familiar_parentesco">Parentesco:</label>
									<input type="text" class="form-control" id="txt_familiar_parentesco"/>
								</div>
							</div>
							<div class="col-md-4 familiar_padecimiento">
								<div class="form-group">
									<label for="txt_familiar_descripcion">Descripción </label>
									<input type="text" class="form-control" id="txt_familiar_descripcion"/>
								</div>
							</div>
							
						
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_cuenta_con_infonavit">¿Infonavit?</label>
									<select class="form-control" id="txt_cuenta_con_infonavit">
										<option value="0">No</option>
										<option value="1">Si</option>
									</select>
								</div>
							</div>
							<div class="col-md-4 cuento_con_infonavit">
								<div class="form-group">
									<label for="txt_pregunta_contrato_infonavit">¿No. de Contrato?</label>
									<select class="form-control" id="txt_pregunta_contrato_infonavit">
										<option value="0">No</option>
										<option value="1">Si</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-4 cuento_con_contrato">
								<div class="form-group">
									<label for="txt_retencion_mensual">Retención Mensual</label>
									<input type="number" class="form-control" id="txt_retencion_mensual" />
								</div>
							</div>
						
							<div class="col-md-4">
								<div class="form-group">
									<label for="select_estado">Estado Civil</label>
									<select class="form-control" id="select_estado_civil">
										<option value="0">Soltera</option>
										<option value="1">Casada</option>
										<option value="2">Viuda</option>
										<option value="3">Divorciada</option>
										<option value="4">Unión Libre</option>
										<option value="5">Comprometida</option>
									</select>
								</div>
							</div>
							<div class="col-md-4 cuento_con_esposo">
								<div class="form-group">
									<label for="txt_trabajo_esposo">Trabajo de Esposo</label>
									<input type="text" class="form-control" id="txt_trabajo_esposo" placeholder="Vacío si no trabaja" />
								</div>
							</div>
							<div class="col-md-4 cuento_con_esposo">
								<div class="form-group">
									<label for="txt_telefono_trabajo_esposo">Teléfono de trabajo (Esposo)</label>
									<input type="text" class="form-control" id="txt_telefono_trabajo_esposo" placeholder="10 dígitos" />
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_cantidad_hijos">Cantidad de Hijos</label>
									<input type="number" class="form-control" id="txt_cantidad_hijos" />
								</div>
							</div>
							<div class="col-md-4 cuento_con_hijos">
								<div class="form-group">
									<label for="txt_edad_hijo_menor">Edad de Hijo Menor</label>
									<input type="number" class="form-control" id="txt_edad_hijo_menor" />
								</div>
							</div>
							<div class="col-md-4 quien_cuidan_a_mi_hijo">
								<div class="form-group">
									<label for="txt_quien_cuida_a_mi_hijo">¿Quién Cuida al Hijo?</label>
									<select class="form-control" id="txt_quien_cuida_a_mi_hijo">
										<option value="0">Familiar</option>
										<option value="1">Vecino</option>
										<option value="2">Amistades</option>
										<option value="3">Guardería</option>
									</select>
								</div>
							</div>
						
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_publicidad">¿Cómo se enteró?</label>
									<select class="form-control" id="txt_publicidad">
										<option value="0">Ninguno</option>
										<option value="1">Periódico</option>
										<option value="2">Recomendación</option>
										<option value="3">Anuncio</option>
										<option value="4">Volante</option>
										<option value="5">Internet y Redes Sociales</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-4 publidad_periodico">
								<div class="form-group">
									<label for="txt_publicidad_periodico">Periodico:</label>
									<select class="form-control" id="txt_publicidad_periodico">
										<option value="0">Debate</option>
										<option value="1">La i</option>
										<option value="2">Sirena</option>
										<option value="3">Alarma</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-4 publidad_recomendacion">
								<div class="form-group">
									<label for="txt_publicidad_remondadacion">¿Conoce al recomendador?</label>
									<select class="form-control" id="txt_publicidad_remondadacion">
										<option value="0">No</option>
										<option value="1">Si</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-4 nombre_recomendador">
								<div class="form-group">
									<label for="search-recomendador">Nombre del recomendador</label>
									<input type="text" class="typeahead form-control" name="search-recomendador" id="search-recomendador"/>
								</div>
							</div>
							
						</div>	
						
						
					</div>
				</div>
				

				<div class="row formulario_3">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_modtivo_salida_ultimo_trabajo">Motivo de salida del ultimo trabajo:</label>
									<select class="form-control" id="txt_modtivo_salida_ultimo_trabajo">
										<option value="0">Sueldo</option>
										<option value="1">Horario</option>
										<option value="2">Acoso</option>
										<option value="3">Distancia</option>
										<option value="4">Prestaciones</option>
										<option value="5">Enfermedad</option>
										<option value="6">Problema Familiar</option>
										<option value="7">Embarazo</option>
										<option value="8">Cliente Cambio de Domicilio</option>
										<option value="9">Cliente no podía Pagar</option>
										<option value="10">Trabajo no cumplía con expectativas </option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_respuesta_camiones">¿Cuántos camiones tomaba al ir al trabajo?</label>
									<input type="number" class="form-control" id="txt_respuesta_camiones" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_respuesta_camiones">¿Cuánto ganaba en su trabajo anterior?</label>
									<select class="form-control" id="txt_modtivo_salida_ultimo_trabajo">
										<option value="0">Menor a $1,000.00 MXN</option>
										<option value="1">$1,000.00 MXN a $3,000.00 MXN</option>
										<option value="2">Más de $3,000.00 MXN</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_pregunta_tabaja">¿Trabajas actualmente?</label>
									<select class="form-control" id="txt_pregunta_tabaja">
										<option value="0">No</option>
										<option value="1">Si</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group trabajo_actualmente">
									<label for="txt_tiempo_disponible">Disponible:</label>
									<select class="form-control" id="txt_tiempo_disponible">
										<option value="0">Desde Mañana</option>
										<option value="1">Semana</option>
										<option value="2">Dos Semanas</option>
										<option value="3">Tres semanas</option>
										<option value="4">Un mes</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<hr/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_experiencia">¿Experiencia?</label>
									<select class="form-control" id="txt_experiencia">
										<option value="0">Casa</option>
										<option value="1">Oficina</option>
										<option value="2">Ambos</option>
										<option value="3">Ninguno</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_preferencia_de_trabajo">Preferencia de Trabajo</label>
									<select class="form-control" id="txt_preferencia_de_trabajo">
										<option value="0">Casa</option>
										<option value="1">Oficina</option>
										<option value="2">Indistinto</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="txt_preferencia_de_trabajo">Horario Disponible</label>
									<select class="form-control" id="txt_preferencia_de_trabajo">
										<option value="0">Turno Completo</option>
										<option value="1">Turno Matutino</option>
										<option value="2">Turno Vespertino</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="txt_dias_disponibles">Días Disponibles</label>
								<div class="weekDays-selector">
								  <input type="checkbox" id="weekday-mon" class="weekday" />
								  <label for="weekday-mon">Lunes</label>
								  <input type="checkbox" id="weekday-tue" class="weekday" />
								  <label for="weekday-tue">Martes</label>
								  <input type="checkbox" id="weekday-wed" class="weekday" />
								  <label for="weekday-wed">Miercoles</label>
								  <input type="checkbox" id="weekday-thu" class="weekday" />
								  <label for="weekday-thu">Jueves</label>
								  <input type="checkbox" id="weekday-fri" class="weekday" />
								  <label for="weekday-fri">Viernes</label>
								  <input type="checkbox" id="weekday-sat" class="weekday" />
								  <label for="weekday-sat">Sábado</label>
								  <input type="checkbox" id="weekday-sun" class="weekday" />
								  <label for="weekday-sun">Domingo</label>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12"><br/>
								<label for="txt_dias_disponibles">Experiencia y Habilidades</label>
								<div class="skills-selector">
								  <input type="checkbox" id="skills_0" class="skills" />
								  <label for="skills_0">Lavado</label>
								  <input type="checkbox" id="skills_1" class="skills" />
								  <label for="skills_1">Planchado</label>
								  <input type="checkbox" id="skills_2" class="skills" />
								  <label for="skills_2">Cocina</label>
								  <input type="checkbox" id="skills_3" class="skills" />
								  <label for="skills_3">Aseo</label>
								  <input type="checkbox" id="skills_4" class="skills" />
								  <label for="skills_4">Cuidado de Niños</label>
								  <input type="checkbox" id="skills_5" class="skills" />
								  <label for="skills_5">Mayores de Edad</label>
								  <input type="checkbox" id="skills_6" class="skills" />
								  <label for="skills_6">Enfermos</label>
								  <input type="checkbox" id="skills_7" class="skills" />
								  <label for="skills_7">Mascotas</label>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="row formulario_4">
					<div class="col-md-12">
						<div class = "panel panel-default">
							<div class = "panel-body">
								<!--<h4 class="text-right"><strong>Referencia 1</strong></h4>-->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_nombre_referencia1_encuesta">Nombre(s):</label>
											<input type="text" class="form-control" id="txt_nombre_referencia1_trabajador" placeholder="Nombre">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_apellido_paterno_referencia1_encuesta">Apelido Paterno:</label>
											<input type="text" class="form-control" id="txt_apellido_paterno_referencia1_trabajador" placeholder="A paterno">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_apellido_materno_referencia1_encuesta">Apelido Materno:</label>
											<input type="text" class="form-control" id="txt_apellido_materno_referencia1_trabajador" placeholder="A materno">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="#txt_calle_referencia1_encuesta">Calle:</label>
											<input type="text" class="form-control" id="txt_calle_referencia1_trabajador" placeholder="Calle..">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_colonia_referencia1_trabajador">Colonia:</label>
											<input type="text" class="form-control" id="txt_colonia_referencia1_encuesta" placeholder="colonia..">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="#txt_numero_referencia1_trabajador">Numero:</label>
											<input type="text" class="form-control" id="txt_numero_referencia1_encuesta" placeholder="#">
										</div>
									</div>

								</div>
								<div class="row">
								
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_lada_referencia1_trabajador">Lada:</label>
											<input type="text" class="form-control" id="txt_lada_referencia1_encuesta" placeholder="667">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_telefono_referencia1_trabajador">Telefono:</label>
											<input type="text" class="form-control" id="txt_telefono_referencia1_encuesta" placeholder="###..">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_tipo_telefono_referencia1_trabajador">Tipo Telefono:</label>
											<select class="form-control" id="txt_tipo_telefono_referencia1_encuesta">
												<option value="1">Celular</option>
												<option value="0">Casa</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="#txt_telefono_referencia1_trabajador">Tiempo de concer:</label>
											<input type="number" class="form-control" id="txt_telefono_referencia1_encuesta">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="#txt_telefono_referencia1_trabajador">Sueldo anterior:</label>
											<input type="number" class="form-control" id="txt_telefono_referencia1_encuesta">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="#txt_telefono_referencia1_trabajador">Motivo de salida:</label>
											<input type="text" class="form-control" id="txt_telefono_referencia1_encuesta">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="#txt_tipo_telefono_referencia1_trabajador">¿Recomiendas?</label>
											<select class="form-control" id="txt_tipo_telefono_referencia1_encuesta">
												<option value="0">No</option>
												<option value="1">Si</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class = "panel panel-default">
							<div class = "panel-body">
								<!--<h4 class="text-right"><strong>Referencia 2</strong></h4>-->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_nombre_referencia1_trabajador">Nombre(s):</label>
											<input type="text" class="form-control" id="txt_nombre_referencia2_encuesta" placeholder="Nombre">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_apellido_paterno_referencia1_trabajador">Apelido Paterno:</label>
											<input type="text" class="form-control" id="txt_apellido_paterno_referencia2_encuesta" placeholder="A paterno">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_apellido_materno_referencia1_trabajador">Apelido Materno:</label>
											<input type="text" class="form-control" id="txt_apellido_materno_referencia2_encuesta" placeholder="A materno">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="#txt_calle_referencia1_trabajador">Calle:</label>
											<input type="text" class="form-control" id="txt_calle_referencia2_encuesta" placeholder="Calle..">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_colonia_referencia1_trabajador">Colonia:</label>
											<input type="text" class="form-control" id="txt_colonia_referencia2_encuesta" placeholder="colonia..">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="#txt_numero_referencia1_trabajador">Numero:</label>
											<input type="text" class="form-control" id="txt_numero_referencia2_encuesta" placeholder="#">
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_lada_referencia1_trabajador">Lada:</label>
											<input type="text" class="form-control" id="txt_lada_referencia2_encuesta" placeholder="667">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_telefono_referencia1_trabajador">Telefono:</label>
											<input type="text" class="form-control" id="txt_telefono_referencia2_encuesta" placeholder="###..">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="#txt_tipo_telefono_referencia1_trabajador">Tipo Telefono:</label>
											<select class="form-control" id="txt_tipo_telefono_referencia2_encuesta">
												<option value="1">Celular</option>
												<option value="0">Casa</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="#txt_telefono_referencia1_trabajador">Tiempo de concer:</label>
											<input type="number" class="form-control" id="txt_telefono_referencia2_encuesta">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="#txt_telefono_referencia1_trabajador">Sueldo anterior:</label>
											<input type="number" class="form-control" id="txt_telefono_referencia2_encuesta">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="#txt_telefono_referencia1_trabajador">Motivo de salida:</label>
											<input type="text" class="form-control" id="txt_telefono_referencia2_encuesta">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="#txt_tipo_telefono_referencia1_trabajador">¿Recomiendas?</label>
											<select class="form-control" id="txt_tipo_telefono_referencia2_encuesta">
												<option value="0">No</option>
												<option value="1">Si</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row formulario_5">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-5">
								<div class = "panel panel-default">
									<div class = "panel-body">
										<h4><strong>Identificacion Oficial</strong></h4>
										<form class="dropzone" id="upload_identificacion_oficial_encuesta" enctype="multipart/form-data" method="post">
											<div class="fallback">
												<input name="file" type="file"/>
											  </div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class = "panel panel-default">
									<div class = "panel-body">
										<h5><strong>Comprobante de Domicilio</strong></h5>
										<form class="dropzone" id="upload_comprobante_domicilio_encuesta" enctype="multipart/form-data" method="post">
											<div class="fallback">
												<input name="file" type="file"/>
											  </div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-5">
								<div class = "panel panel-default">
									<div class = "panel-body">
										<h4><strong>Contrato</strong></h4>
										<form class="dropzone" id="upload_contrato_encuesta" enctype="multipart/form-data" method="post">
											<div class="fallback">
												<input name="file" type="file"/>
											  </div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class = "panel panel-default">
									<div class = "panel-body">
										<h4><strong>Imagen de Usuario</strong></h4>
										<form class="dropzone" id="upload_imgaen_usuario_encuesta" enctype="multipart/form-data" method="post">
											<div class="fallback">
												<input name="file" type="file"/>
											  </div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>
				</div>
				
				<div class="row formulario_6">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row calificacion_mucama text-center">
									<input id="estarella1" type="radio" name="estrellas" value="5">
									<label id="label_estrella" for="estarella1"><i id="star_cla" class="fa fa-star-o fa-3x" aria-hidden="true"></i></label>
									<input id="estarella2" type="radio" name="estrellas" value="4">
									<label id="label_estrella" for="estarella2"><i class="fa fa-star-o fa-3x" aria-hidden="true"></i></label>
									<input id="estarella3" type="radio" name="estrellas" value="3">
									<label id="label_estrella" for="estarella3"><i class="fa fa-star-o fa-3x" aria-hidden="true"></i></label>
									<input id="estarella4" type="radio" name="estrellas" value="2">
									<label id="label_estrella" for="estarella4"><i class="fa fa-star-o fa-3x" aria-hidden="true"></i></label>
									<input id="estarella5" type="radio" name="estrellas" value="1">
									<label id="label_estrella" for="estarella5"><i class="fa fa-star-o fa-3x" aria-hidden="true"></i></label>
								</div><br/>
							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8 text-center">
								<textarea id="txt_comentarios" name="comentarios" rows="10" cols="60" placeholder="Escribe aquí tus comentarios :D"></textarea>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
<script src="../js/dropzone.js"></script>	
<script src="../js/nueva_encuesta.js"></script>