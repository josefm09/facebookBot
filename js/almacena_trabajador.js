$(document).ready(function(){
	Dropzone.autoDiscover = true;
	
	consultar_privilegio();
	
	id_imagen = "";
	
	$('#upload_imagen_trabajador').dropzone({
		url: "../api/api.php?accion=almacenar_imagen_trabajador&tipo_accion=modelo",		
		maxFiles: 1,
		addRemoveLinks: true,
		acceptedFiles: 'image/*',
		parallelUploads: 1,
		dictDefaultMessage: "Arrastra elementos aquí o da click.",
		dictResponseError: "Ha ocurrido un error en el server",
		dictRemoveFile: "Remover Imagen",
		init: function(){
			this.on("maxfilesexceeded", function(file){
				this.removeFile(file);
				document.getElementById('respuesa_servidor_error').innerHTML = "<center>Límite de documentos excedido</center>";
				$('#modal_respuesa_servidor_error').modal('show');
			});
		},
		success:function(file,response){
			id_imagen = response;
			
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$.ajax({
		url: '../api/api.php',
		data: {
			"accion": "consultar_prioridades_permitidas",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			$(data).each(function(i, v){
				$('#txt_tipo_trabajador').append('<option value="' + v.nombre_prioridad + '">' + v.nombre_en_vista + '</option>');
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$.ajax({
		url: '../api/api.php',
		data: {
			"accion": "consultar_llaves_de_session",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			if(data.nombre_prioridad === "mucaama_master" || data.nombre_prioridad === "dbm_v3_admin_empresa"){
				if(data.nombre_prioridad === "mucaama_master"){
					$.ajax({
						url: '../api/api.php',
						data: {
							"accion": "consultar_empresa_por_estatus",
							"tipo_accion": "modelo",
							"estatus": 1
						},
						type: 'post',
						dataType: 'json',
						success: function(data){
							$(data).each(function(i,v){
								$("#txt_empresa").append('<option value="' + v.id + '">' + v.nombre + '</option>');
							});
						},
						error: function(xhr, desc, err){
							console.log(xhr);
							console.log("Details: " + desc + "\nError:" + err);
						}
					});	
				}
			}
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	// $('#txt_empresa').on("change", function(data){
		// $('#txt_sucursal').empty();
		// $("#txt_sucursal").append('<option value="">Seleccione una Sucursal</option>');
		// $.ajax({
			// url: '../api/api.php',
			// data: {
				// "accion": "consultar_sucursal_por_empresa",
				// "tipo_accion": "modelo",
				// "id_empresa": $(this).val()
			// },
			// type: 'post',
			// dataType: 'json',
			// success: function(data){
				// $(data).each(function(i,v){
					// $("#txt_sucursal").append('<option value="' + v.id + '">' + v.nombre + '</option>');
				// });
			// },
			// error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
			// }
		// });	
	// });	 	
	
	/*Función para cargar todos los estados a la página*/
	$(function(){
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: {
				"accion":"select_estados",
				"tipo_accion":"modelo"
			},
			success:function(data){
				$(data).each(function(i,v){
					$('#select_estado').append(
						'<option id="'+v.id+'">'+ v.nombre + '</option>'
					);
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});		
	});
	
	//para poblar municipios
	$('#select_estado').on('change', function () {
		var seleccionado = $('#select_estado').find(":selected"); //This works
		//alert(seleccionado.attr('id'));
		$('#select_municipio').empty();
		if(seleccionado.val() == 'Seleccionar estado (Obligatorio)') {
			$('#select_municipio').append('<option>Seleccionar municipio (Obligatorio)</option>');
			return;
		}
		var parametros = {	
			"accion":"select_municipios",
			"tipo_accion":"modelo",
			"id_municipio": seleccionado.attr('id')
		};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				$(data).each(function(i,v){
					$('#select_municipio').append(
						'<option id="'+v.id+'">'+ v.nombre + '</option>'
					);
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});		
	});
	
	
	$('#txt_tipo_trabajador').on('change', function () {
		var seleccionado = $(this).val();
		if(seleccionado === 'mucaama_empleadas')
		{
			$('#roles').prop('hidden', false);
			return;
		}
		$('#roles').prop('hidden', true);
		
	});
	
	//para poblar la tabla de roles
	var parametros = {	
		"accion":"select_roles",
		"tipo_accion":"modelo"
		};
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				$(data).each(function(i,v){
					$('#table_roles').append(
						'<tr>'+
							'<td>'+ v.nombre + '</td>'+
							// '<td><input value='+v.id +' type="checkbox">Seleccionar</td>'+
							'<td>'+
								'<div class="make-switch">'+
									'<input type="checkbox" class="validacionCongreso txt_validacion" value='+ v.id +' id="check_switch" data-on-text="SI" data-off-text="NO" />'+
								'</div>'+
							'</td>'+
						'</tr>'
					);
					
					$('.validacionCongreso').bootstrapSwitch();
					
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});	
});

function consultar_privilegio(){
	$.ajax({
		url: '../api/api.php',
		data: {
			"accion": "consultar_nivel_privilegio",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			var respuesta_privilegio = (data["privilegio_administrativo"]);
			if(respuesta_privilegio == 2)
				{
					$.ajax({									
						url: '../api/api.php',
						type: 'POST',
						dataType: 'json',
						data:{
							"accion": "consultar_sucursal_de_empresa",
							"tipo_accion": "modelo"
						},
						success:function(data){
							$(data).each(function(i,v){
								$("#txt_sucursal").append('<option value="' + v.id + '">' + v.nombre + '</option>');
							});							
						},
						
						//Si el request falla genera mensajes de errores de posibles eventos comunes
						error:function(x,e,xre) {
							
								if (x.status==0) {
									   $('#modal_error_internet').modal('show');
								} else if(x.status==404) {
										$('#modal_error_404').modal('show');
								} else if(x.status==500) {
										$('#modal_error_500').modal('show');
								} else if(e=='parsererror') {
										$('#modal_error_parsererror').modal('show');
								} else if(e=='timeout'){
										$('#modal_error_timeout').modal('show');
								} else {
										$('#modal_error_otro').modal('show');
								}
						}
					});
				}
		},
		error:function(x,e,xre) 
			{			
				if (x.status==0) {
					   $('#modal_error_internet').modal('show');
				} else if(x.status==404) {
						$('#modal_error_404').modal('show');
				} else if(x.status==500) {
						$('#modal_error_500').modal('show');
				} else if(e=='parsererror') {
						$('#modal_error_parsererror').modal('show');
				} else if(e=='timeout'){
						$('#modal_error_timeout').modal('show');
				} else {
						$('#modal_error_otro').modal('show');
				}
			}		
	});

	$('#btnGuardar').click(function(){
		
		var id;
		var id_roles = Array();
		var j = 0;
		$("input[id=check_switch]").each(function (index){  
			if($(this).is(':checked')){
				id = $(this).val();
				id_roles[j] = id ;
				j++;
			}
		});
		var roles_trabajador = JSON.stringify(id_roles);
	
		
		var estado_seleccionado = $('#select_estado').find(":selected"); //This works
		var municipio_seleccionado = $('#select_municipio').find(":selected"); //This works

		if(estado_seleccionado.val() == 'Seleccionar estado (Obligatorio)' || municipio_seleccionado.val() == 'Seleccionar municipio (Obligatorio)') {
			alert("Debe selccionar estado y municipio correctamente");
			return;
		}
		
		var parametros={
			"accion": "almacenar_trabajador",
			"tipo_accion": "modelo",
			"nombre_trabajador":$('#txt_nombre_trabajador').val(),
			"apellido_paterno_trabajador":$('#txt_apellido_paterno_trabajador').val(),
			"apellido_materno_trabajador":$('#txt_apellido_materno_trabajador').val(),
			"calle_trabajador":$('#txt_calle_trabajador').val(),
			"colonia_trabajador":$('#txt_colonia_trabajador').val(),
			"numero_trabajador":$('#txt_numero_trabajador').val(),
			"correo_trabajador":$('#txt_correo_trabajador').val(),
			"lada_trabajador":$('#txt_lada_trabajador').val(),
			"telefono_trabajador":$('#txt_telefono_trabajador').val(),
			"tipo_telefono_trabajador":$('#txt_tipo_telefono_trabajador').val(),
			"ciudad_trabajador" : $('#txt_ciudad').val(),
			"estado_trabajador" : estado_seleccionado.attr('id'),
			"municipio_trabajador" : municipio_seleccionado.attr('id'),
			"usuario_trabajador":$('#txt_usuario_trabajador').val(),
			"tipo_trabajador":$('#txt_tipo_trabajador').val(),
			"imagen": id_imagen,
			"roles_trabajador": roles_trabajador,

			"nombre_referencia2_trabajador": $('#txt_nombre_referencia2_trabajador').val(),
			"apellido_paterno_referencia2_trabajador": $('#txt_apellido_paterno_referencia2_trabajador').val(),
			"apellido_materno_referencia2_trabajador": $('#txt_apellido_materno_referencia2_trabajador').val(),
			"calle_referencia2_trabajador": $('#txt_calle_referencia2_trabajador').val(),
			"colonia_referencia2_trabajador": $('#txt_colonia_referencia2_trabajador').val(),
			"numero_referencia2_trabajador": $('#txt_numero_referencia2_trabajador').val(),
			"correo_referencia2_trabajador": $('#txt_correo_referencia2_trabajador').val(),
			"lada_referencia2_trabajador": $('#txt_lada_referencia2_trabajador').val(),
			"telefono_referencia2_trabajador": $('#txt_telefono_referencia2_trabajador').val(),
			"tipo_telefono_referencia2_trabajador": $('#txt_tipo_telefono_referencia2_trabajador').val(),

			"nombre_referencia1_trabajador": $('#txt_nombre_referencia1_trabajador').val(),
			"apellido_paterno_referencia1_trabajador" :$('#txt_apellido_paterno_referencia1_trabajador').val(),
			"apellido_materno_referencia1_trabajador": $('#txt_apellido_materno_referencia1_trabajador').val(),
			"calle_referencia1_trabajador": $('#txt_calle_referencia1_trabajador').val(),
			"colonia_referencia1_trabajador": $('#txt_colonia_referencia1_trabajador').val(),
			"numero_referencia1_trabajador": $('#txt_numero_referencia1_trabajador').val(),
			"correo_referencia1_trabajador": $('#txt_correo_referencia1_trabajador').val(),
			"lada_referencia1_trabajador": $('#txt_lada_referencia1_trabajador').val(),
			"telefono_referencia1_trabajador": $('#txt_telefono_referencia1_trabajador').val(),
			"tipo_telefono_referencia1_trabajador": $('#txt_tipo_telefono_referencia1_trabajador').val()

			// "empresa_trabajador": $('#txt_empresa').val(),
			// "sucursal_trabajador": $('#txt_sucursal').val(),
			// "trabajador_asignado": $('#txt_trabajador_asignado').val()
		};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);//Notifica el estatus del query
				var respuesta_servidor = (data["respuesta_servidor"]);//Mensaje a mostrar al usuario

				//Si el servidor retorna un error
				if(estatus_request == "error")
					{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
					$("#reset_password_usuario").focus(); //Pasa el focus al punto de inicio del formulario
					}

				//Si no hay errores
				if(estatus_request == "success")
					{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('toggle');
					}, 3000);

					cargar_vista('registar_nuevo_trabajador');//Recarga la vista para limpiar todo el form
					}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x,e,err) {
				console.log(x);
				console.log("Detales: "+e+" \nError: "+err);
				if (x.status==0) {
					   $('#modal_error_internet').modal('show');
				} else if(x.status==404) {
						$('#modal_error_404').modal('show');
				} else if(x.status==500) {
						$('#modal_error_500').modal('show');
				} else if(e=='parsererror') {
						$('#modal_error_parsererror').modal('show');
				} else if(e=='timeout'){
						$('#modal_error_timeout').modal('show');
				} else {
						$('#modal_error_otro').modal('show');
				}
			}
		});

	});

}