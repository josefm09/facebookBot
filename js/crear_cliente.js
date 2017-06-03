
$(document).ready(function(){
	
	//Variables básicas
	var txt_nombre = "";
	var txt_paterno = "";
	var txt_materno = "";
	var txt_lada1 = ""; 
	var txt_telefono1 = "";
	var txt_tipo_telefono1 = "";
	var txt_lada2 = "";
	var txt_telefono2 = "";
	var txt_tipo_telefono2 = "";
	var txt_correo1 = "";
	var txt_correo2 = "";
	var txt_calle = "";
	var txt_numero = "";
	var txt_colonia = "";
	var txt_ciudad = "";
	//Variables para facturación
	var razon_social_factura = "";
	var rfc_factura = "";
	var direccion_factura = "";
	var colonia_factura = "";
	var ciudad_factura = "";
	var estado_factura = "";
	var cp_factura = "";
	var opcion_seleccionada_factura= "";
	$('#txt_nombre').focus();
	//Variable para el cliente a modificar
	var id_cliente_modificar = 0;
	var id_usuario_modificar = 0;

	var modificar_usuario = false;


	function vaciarCajasTextoYRegresarFocus () {
		$('#txt_nombre').val("");
		$('#txt_paterno').val("");
		$('#txt_materno').val("");
		$('#txt_telefono1').val("");
		$('#txt_telefono2').val("");
		$('#txt_correo1').val("");
		$('#txt_correo2').val("");
		$('#txt_calle').val("");
		$('#txt_numero').val("");
		$('#txt_colonia').val("");
		$('#txt_ciudad').val();
		$('#txt_razon_social').val("");
		$('#txt_rfc').val(""); 
		$('#txt_calle_factura').val("");
		$('#txt_colonia_factura').val("");
		$('#txt_ciudad_factura').val("");
		$('#txt_estado').val("");
		$('#txt_cp').val("");
		$('#txt_nombre').focus();

	}

	function verificarVaciosFactura () {
		razon_social_factura = $('#txt_razon_social').val();
		rfc_factura = $('#txt_rfc').val(); 
		direccion_factura = $('#txt_calle_factura').val();
		colonia_factura = $('#txt_colonia_factura').val();
		ciudad_factura = $('#txt_ciudad_factura').val();
		estado_factura = $('#txt_estado').val();
		cp_factura = $('#txt_cp').val();

		if(razon_social_factura == '' || rfc_factura == '' || direccion_factura == '' || colonia_factura == '' || ciudad_factura == '' || estado_factura == '' || cp_factura == '') 
			return true;
		return false;
	}

	function verificarVacios () {
		txt_nombre = $('#txt_nombre').val();
		txt_paterno = $('#txt_paterno').val();
		txt_materno = $('#txt_materno').val();
		txt_lada1 = $('#txt_lada1').val();
		txt_telefono1 = $('#txt_telefono1').val();
		txt_tipo_telefono1 = $('#txt_tipo_telefono1').val();
		txt_lada2 = $('#txt_lada2').val();
		txt_telefono2 = $('#txt_telefono2').val();
		txt_tipo_telefono2 = $('#txt_tipo_telefono2').val();
		txt_correo1 = $('#txt_correo1').val();
		txt_correo2 = $('#txt_correo2').val();
		txt_calle = $('#txt_calle').val();
		txt_numero = $('#txt_numero').val();
		txt_colonia = $('#txt_colonia').val();
		txt_ciudad = $('#txt_ciudad').val();

		if(txt_nombre == '' || txt_paterno == '' || txt_materno == '' || txt_lada1 == '' || txt_telefono1 == '' || txt_tipo_telefono1 == '' 
			|| txt_lada2 == '' || txt_telefono2 == '' || txt_tipo_telefono2 == '' || txt_correo1 == '' || txt_correo2 == '' 
			|| txt_calle == '' || txt_numero == '' || txt_colonia == '' || txt_ciudad == '') {
			return true;
		}
		return false;
	}

	/*Función para cargar todos los estados a la página*/
	$(function(){
		var parametros = {	
		"accion":"select_estados",
		"tipo_accion":"modelo"
		};
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				$(data).each(function(i,v){
					$('#select_estado').append(
						'<option id="'+v.id+'">'+ v.nombre + '</option>'
					);
					$('#select_estado_nuevo').append(
						'<option id="'+v.id+'">'+ v.nombre + '</option>'
					);
					$('#select_estado_nuevo_factura').append(
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
	
	
	//para poblar municipios de un nuevo domicilio
	$('#select_estado_nuevo').on('change', function () {
		var seleccionado_nuevo = $('#select_estado_nuevo').find(":selected"); 
		$('#select_municipio_nuevo').empty();
		if(seleccionado_nuevo.val() == 'Seleccione un Municipio') {
			$('#select_municipio_nuevo').append('<option>Seleccione un Municipio</option>');
			return;
		}
		var parametros = {	
			"accion":"select_municipios",
			"tipo_accion":"modelo",
			"id_municipio": seleccionado_nuevo.attr('id')
		};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				$(data).each(function(i,v){
					$('#select_municipio_nuevo').append(
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
	
	
	$('#select_estado_nuevo_factura').on('change', function () {
		var seleccionado_nuevo_factura = $('#select_estado_nuevo_factura').find(":selected"); 
		$('#select_municipio_nuevo_factura').empty();
		if(seleccionado_nuevo_factura.val() == 'Seleccione un Municipio') {
			$('#select_municipio_nuevo_factura').append('<option>Seleccione un Municipio</option>');
			return;
		}
		var parametros = {	
			"accion":"select_municipios",
			"tipo_accion":"modelo",
			"id_municipio": seleccionado_nuevo_factura.attr('id')
		};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				$(data).each(function(i,v){
					$('#select_municipio_nuevo_factura').append(
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
							'<td>'+
								'<div class="make-switch">'+
									'<input type="checkbox" class="validacionCongreso txt_validacion" value='+ v.id +' id="check_switch" data-on-text="SI" data-off-text="NO" />'+
								'</div>'+
							'</td>'+
						'</tr>'
					);
					
					$('#nuevo_table_roles').append(
						'<tr>'+
							'<td>'+ v.nombre + '</td>'+
							'<td>'+
								'<div class="make-switch">'+
									'<input type="checkbox" class="validacionCongreso txt_validacion" value='+ v.id +' id="check_switch_nuevo" data-on-text="SI" data-off-text="NO" />'+
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
		
		
		
		
	function marcarVaciosFactura () {
		if(razon_social_factura == '')
			$('#txt_razon_social').css('border','solid 1px #ff0000')
		else
			$('#txt_razon_social').css('border','solid 1px #cecece')
		if(rfc_factura == '')
			$('#txt_rfc').css('border','solid 1px #ff0000')
		else
			$('#txt_rfc').css('border','solid 1px #cecece')
		if(direccion_factura == '')
			$('#txt_calle_factura').css('border','solid 1px #ff0000')
		else
			$('#txt_calle_factura').css('border','solid 1px #cecece')
		if(colonia_factura == '')
			$('#txt_colonia_factura').css('border','solid 1px #ff0000')
		else
			$('#txt_colonia_factura').css('border','solid 1px #cecece')
		if(ciudad_factura == '')
			$('#txt_ciudad_factura').css('border','solid 1px #ff0000')
		else
			$('#txt_ciudad_factura').css('border','solid 1px #cecece')
		if(estado_factura == '')
			$('#txt_estado').css('border','solid 1px #ff0000')
		else
			$('#txt_estado').css('border','solid 1px #cecece')
		if(cp_factura == '')
			$('#txt_cp').css('border','solid 1px #ff0000')
		else
			$('#txt_cp').css('border','solid 1px #cecece')
	}

	function marcarVacios () {
		if(txt_nombre == '')				
			$('#txt_nombre').css('border','solid 1px #ff0000')
		else
			$('#txt_nombre').css('border','solid 1px #cecece')		
		
		if(txt_paterno == '')				
			$('#txt_paterno').css('border','solid 1px #ff0000')
		else
			$('#txt_paterno').css('border','solid 1px #cecece')		

		if(txt_materno == '')				
			$('#txt_materno').css('border','solid 1px #ff0000')
		else
			$('#txt_materno').css('border','solid 1px #cecece')		
		
		if(txt_telefono1 == '')				
			$('#txt_telefono1').css('border','solid 1px #ff0000')
		else
			$('#txt_telefono1').css('border','solid 1px #cecece')		

		if(txt_telefono2 == '')				
			$('#txt_telefono2').css('border','solid 1px #ff0000')
		else
			$('#txt_telefono2').css('border','solid 1px #cecece')			
		
		if(txt_correo1 == '')				
			$('#txt_correo1').css('border','solid 1px #ff0000')
		else
			$('#txt_correo1').css('border','solid 1px #cecece')		
		
		if(txt_correo2 == '')				
			$('#txt_correo2').css('border','solid 1px #ff0000')
		else
			$('#txt_correo2').css('border','solid 1px #cecece')		

		if(txt_calle == '')				
			$('#txt_calle').css('border','solid 1px #ff0000')
		else
			$('#txt_calle').css('border','solid 1px #cecece')		

		if(txt_numero == '')				
			$('#txt_numero').css('border','solid 1px #ff0000')
		else
			$('#txt_numero').css('border','solid 1px #cecece')		

		if(txt_colonia == '')				
			$('#txt_colonia').css('border','solid 1px #ff0000')
		else
			$('#txt_colonia').css('border','solid 1px #cecece')		

		if(txt_ciudad == '')				
			$('#txt_ciudad').css('border','solid 1px #ff0000')
		else
			$('#txt_ciudad').css('border','solid 1px #cecece')		
	}

	
	$('#select_facturar').on('change', function () {
		opcion_seleccionada_factura = $(this).val();
		if(opcion_seleccionada_factura == 'No') {
			$('#div_facturacion').prop('hidden', true);
			return;
		}
		$('#div_facturacion').prop('hidden', false);
	});

	$('#btn_consultar_cliente').click(function () {
		bloodhound_cliente();
		$('#modal_consultar_cliente').modal('show');
	})
	
	
	
	
	function bloodhound_cliente(){
		//Bloodhound
		 var clientes = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace("nombre_completo"),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			prefetch: "../api/api.php?tipo_accion=modelo&accion=consultar_clientes"
		});
		clientes.initialize();
		clientes.clearPrefetchCache();
		
		$("#search-box3").typeahead({
				hint: true,
				highlight: true,
				minLength: 1
		},
		{
			name: "result",
			displayKey: "nombre_completo",
			source: clientes
		}).bind("typeahead:selected", function(obj, datum, name) {
			$(this).data("id_cliente", datum.id_cliente);
			$(this).data("id_usuario", datum.id_usuario);
			var id_buscado = $(this).data('id_cliente');
			var id_usuario_buscado = $(this).data('id_usuario');
			id_cliente_modificar = id_buscado;
			id_usuario_modificar = id_usuario_buscado;
			$('#div_modificar_cliente').prop('hidden', false);
			// alert(id_usuario_modificar);
			llenar_campos_consultados();
		});
	}

	
	//lecciona una opccion y se despiilga diferente div correspondiente
	$('#opcion_modificar').on('change', function () {
		opcion_modificar = $(this).val();
		if(opcion_modificar == 0) {
			$('#nombre').prop('hidden', true);
			$('#domicilio').prop('hidden', true);
			$('#telefono').prop('hidden', true);
			$('#correo').prop('hidden', true);
			$('#factura_datos').prop('hidden', true);
			return;
		}
		else if(opcion_modificar == 1){
			$('#nombre').prop('hidden', false);
			$('#domicilio').prop('hidden', true);
			$('#telefono').prop('hidden', true);
			$('#correo').prop('hidden', true);
			$('#factura_datos').prop('hidden', true);
		}
		else if(opcion_modificar == 2){
			$('#nombre').prop('hidden', true);
			$('#domicilio').prop('hidden', false);
			$('#telefono').prop('hidden', true);
			$('#correo').prop('hidden', true);
			$('#factura_datos').prop('hidden', true);
		}
		else if(opcion_modificar == 3){
			$('#nombre').prop('hidden', true);
			$('#domicilio').prop('hidden', true);
			$('#telefono').prop('hidden', false);
			$('#correo').prop('hidden', true);
			$('#factura_datos').prop('hidden', true);
		}else if(opcion_modificar == 4){
			$('#nombre').prop('hidden', true);
			$('#domicilio').prop('hidden', true);
			$('#telefono').prop('hidden', true);
			$('#correo').prop('hidden', false);
			$('#factura_datos').prop('hidden', true);
		}else{
			$('#nombre').prop('hidden', true);
			$('#domicilio').prop('hidden', true);
			$('#telefono').prop('hidden', true);
			$('#correo').prop('hidden', true);
			$('#factura_datos').prop('hidden', false);
		}
	});
	
	
	
	
	function llenar_campos_consultados() {
		parametros = {
			"accion" : "consulta_cliente_id",
			"tipo_accion" : "modelo",
			"id_cliente" : id_cliente_modificar
		};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				
				$(data).each(function(i,v){			
					$(v.cliente).each(function(y,b){
						$("#txt_nuevo_nombre").val(b.nombre);
						$("#txt_nuevo_apellido_paterno").val(b.paterno);
						$("#txt_nuevo_apellido_materno").val(b.materno);
					});
					$(v.domicilios).each(function(y,b){
						$("#domicilios_existentes").append(
							'<tr>'+
								'<td>'+ b.calle +'</td>'+
								'<td>'+ b.numero +'</td>'+
								'<td>'+ b.colonia +'</td>'+
								'<td>'+ b.ciudad +'</td>'+
								'<td><button type="button" class="btn btn-danger" id="btn_eliminar_domicilio" data-id_domicilio='+ b.id_domicilio +' data-id_domicilio_estado='+ b.id_domicilio_estado +' data-id_domicilio_municipio='+ b.id_domicilio_municipio +'>Eliminar</button></td>'+
							'</tr>'
						);
					});
					$(v.telefonos).each(function(y,b){
						$("#telefonos_existentes").append(
							'<tr>'+
								'<td>'+ b.lada +'</td>'+
								'<td>'+ b.telefono +'</td>'+
								'<td>'+ b.tipo_telefono +'</td>'+
								'<td><button type="button" class="btn btn-danger" id="btn_eliminar_telefono" data-id_telefono='+ b.id_telefono +'>Eliminar</button></td>'+
							'</tr>'
						);
					});
					$(v.correos).each(function(y,b){
						$("#correos_existentes").append(
							'<tr>'+
								'<td>'+ b.correo +'</td>'+
								'<td><button type="button" class="btn btn-danger" id="btn_eliminar_correo" data-id_correo='+ b.id_correo +'>Eliminar</button></td>'+
							'</tr>'
						)
					});
					$(v.factura_datos).each(function(y,b){
						$("#facturas_existentes").append(
							'<tr>'+
								'<td>'+ b.razon +'</td>'+
								'<td>'+ b.domicilio_factura +' '+ b.colonia +'</td>'+
								'<td><button type="button" class="btn btn-danger" id="btn_eliminar_factura" data-id_factura_datos='+ b.id_factura_datos +'>Eliminar</button></td>'+
							'</tr>'
						)
					});
				});
					
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	$("#domicilios_existentes").on('click','#btn_eliminar_domicilio', function(){
		
		var parametros = {
			"accion" : "modificar_estatus_domicilio_cliente",
			"tipo_accion" : "modelo",
			"id_domicilio" : $(this).data('id_domicilio'),
			"id_domicilio_estado" : $(this).data('id_domicilio_estado'),
			"id_domicilio_municipio" : $(this).data('id_domicilio_municipio')
		};
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);

				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						$("#domicilios_existentes").empty();
						$("#telefonos_existentes").empty();
						$("#correos_existentes").empty();
						$("#facturas_existentes").empty();
						llenar_campos_consultados();
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	$("#telefonos_existentes").on('click','#btn_eliminar_telefono', function(){
		alert($(this).data('id_telefono'));
		
		var parametros = {
			"accion" : "modificar_estatus_telefono_cliente",
			"tipo_accion" : "modelo",
			"id_telefono" : $(this).data('id_telefono')
		};
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);

				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						$("#domicilios_existentes").empty();
						$("#telefonos_existentes").empty();
						$("#correos_existentes").empty();
						$("#facturas_existentes").empty();
						llenar_campos_consultados();
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	$("#correos_existentes").on('click','#btn_eliminar_correo', function(){
		alert($(this).data('id_correo'));
		
		var parametros = {
			"accion" : "modificar_estatus_correo_cliente",
			"tipo_accion" : "modelo",
			"id_correo" : $(this).data('id_correo')
		};
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);

				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						$("#domicilios_existentes").empty();
						$("#telefonos_existentes").empty();
						$("#correos_existentes").empty();
						$("#facturas_existentes").empty();
						llenar_campos_consultados();
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	
	$("#facturas_existentes").on('click','#btn_eliminar_factura', function(){
		
		var parametros = {
			"accion" : "modificar_estatus_factura_datos_cliente",
			"tipo_accion" : "modelo",
			"id_factura_datos" : $(this).data('id_factura_datos')
		};
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);

				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						$("#domicilios_existentes").empty();
						$("#telefonos_existentes").empty();
						$("#correos_existentes").empty();
						$("#facturas_existentes").empty();
						llenar_campos_consultados();
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	$('#btn_nuevo_nombre').click(function(){
		
		var parametros = {
			"accion" : "modificar_nombre_cliente",
			"tipo_accion" : "modelo",
			"nombre" : $('#txt_nuevo_nombre').val(),
			"paterno" : $('#txt_nuevo_apellido_paterno').val(),
			"materno" : $('#txt_nuevo_apellido_materno').val(),
			"id_usuario" : id_usuario_modificar
		};
		
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);
				$("#modal_consultar_cliente").modal('hide');
				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;
					bloodhound_cliente();
					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						cargar_vista("crear_cliente");
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	$('#btn_nuevo_domicilio').click(function(){
		
		var id;
		var id_roles = Array();
		var j = 0;
		$("input[id=check_switch_nuevo]").each(function (index){  
			if($(this).is(':checked')){
				id = $(this).val();
				id_roles[j] = id ;
				j++;
			}
		});
		var roles = JSON.stringify(id_roles);
		
		
		var estado_seleccionado_nuevo = $('#select_estado_nuevo').find(":selected");
		var municipio_seleccionado_nuevo = $('#select_municipio_nuevo').find(":selected");
		
		var parametros = {
			"accion" : "almacenar_nuevo_domicilio_cliente",
			"tipo_accion" : "modelo",
			"calle_cliente" : $('#txt_nuevo_calle').val(),
			"numero_cliente" : $('#txt_nuevo_numero').val(),
			"colonia_cliente" : $('#txt_nuevo_colonia').val(),
			"estado_cliente" : estado_seleccionado_nuevo.attr('id'),
			"municipio_cliente" : municipio_seleccionado_nuevo.attr('id'),
			"ciudad_cliente" : $('#txt_nuevo_ciudad').val(),
			"id_cliente" : id_cliente_modificar,
			"roles":  roles
		};
		
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);

				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						$("#domicilios_existentes").empty();
						$("#telefonos_existentes").empty();
						$("#correos_existentes").empty();
						$("#facturas_existentes").empty();
						llenar_campos_consultados();
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	
	$('#btn_nuevo_telefono').click(function(){
		
		var parametros = {
			"accion" : "almacenar_nuevo_telefono_cliente",
			"tipo_accion" : "modelo",
			"lada" : $('#txt_nuevo_lada').val(),
			"telefono" : $('#txt_nuevo_telefono').val(),
			"tipo_telefono" : $('#txt_nuevo_tipo_telefono').val(),
			"id_cliente" : id_cliente_modificar
		};
		
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);

				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						$("#domicilios_existentes").empty();
						$("#telefonos_existentes").empty();
						$("#correos_existentes").empty();
						$("#facturas_existentes").empty();
						llenar_campos_consultados();
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	$('#btn_nuevo_correo').click(function(){
		
		var parametros = {
			"accion" : "almacenar_nuevo_correo_electronico_cliente",
			"tipo_accion" : "modelo",
			"correo" : $('#txt_nuevo_correo').val(),
			"id_cliente" : id_cliente_modificar
		};
		
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);

				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						$("#domicilios_existentes").empty();
						$("#telefonos_existentes").empty();
						$("#correos_existentes").empty();
						$("#facturas_existentes").empty();
						llenar_campos_consultados();
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	
	$('#btn_nuevo_factura_datos').click(function(){
		var estado_seleccionado_nuevo_factura = $('#select_estado_nuevo_factura').find(":selected");
		var municipio_seleccionado_nuevo_factura = $('#select_municipio_nuevo_factura').find(":selected");
		
		var parametros = {
			"accion" : "almacenar_nuevo_factura_datos_cliente",
			"tipo_accion" : "modelo",
			"razon_social" : $('#txt_nuevo_razon_social').val(),
			"rfc" : $('#txt_nuevo_rfc').val(),
			"calle_factura" : $('#txt_nuevo_calle_factura').val(),
			"colonia_factura" : $('#txt_nuevo_colonia_factura').val(),
			"ciudad_factura" : $('#txt_nuevo_ciudad_factura').val(),
			"estado_factura" : estado_seleccionado_nuevo_factura.attr('id'),
			"municipio_factura" : municipio_seleccionado_nuevo_factura.attr('id'),
			"cp_factura" : $('#txt_nuevo_cp_factura').val(),
			"id_cliente" : id_cliente_modificar
		};
		
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]);
				var respuesta_servidor = (data["respuesta_servidor"]);

				//Si el servidor retorna un error
				if(estatus_request == "error")
				{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}

				//Si no hay errores
				if(estatus_request == "success")
				{
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						$("#domicilios_existentes").empty();
						$("#telefonos_existentes").empty();
						$("#correos_existentes").empty();
						$("#facturas_existentes").empty();
						llenar_campos_consultados();
					}, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	
	
	$('#btn_crear_cliente').click(function(){
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
		var roles = JSON.stringify(id_roles);
	
		
		if(verificarVacios()) {
			alert("Faltan campos por llenar");
			marcarVacios();
			return;
		}
		var estado_seleccionado = $('#select_estado').find(":selected"); //This works
		var municipio_seleccionado = $('#select_municipio').find(":selected"); //This works

		if(estado_seleccionado.val() == 'Seleccionar estado (Obligatorio)' || municipio_seleccionado.val() == 'Seleccionar municipio (Obligatorio)') {
			alert("Debe selccionar estado y municipio correctamente");
			return;
		}
		var fact = 0;
		if(opcion_seleccionada_factura == 'Sí') {
			fact = 1;
			if(verificarVaciosFactura()) {
				alert("Faltan campos de facturación por llenar");
				marcarVaciosFactura();
				return;
			}
		}
		var parametros = {
			"accion" : "almacenar_cliente",
			"tipo_accion" : "modelo",
			"txt_nombre_cliente" : txt_nombre,
			"txt_paterno_cliente" : txt_paterno,
			"txt_materno_cliente" : txt_materno,
			"txt_lada1_cliente" : txt_lada1,
			"txt_telefono1_cliente" : txt_telefono1,
			"txt_tipo_telefono1_cliente" : txt_tipo_telefono1,
			"txt_lada2_cliente" : txt_lada2,
			"txt_telefono2_cliente" : txt_telefono2,
			"txt_tipo_telefono2_cliente" : txt_tipo_telefono2,
			"txt_correo1_cliente" : txt_correo1,
			"txt_correo2_cliente" : txt_correo2,
			"txt_calle_cliente" : txt_calle,
			"txt_numero_cliente" : txt_numero,
			"txt_colonia_cliente" : txt_colonia,
			"txt_ciudad_cliente" : txt_ciudad,
			"txt_estado_cliente" : estado_seleccionado.attr('id'),
			"txt_municipio_cliente" : municipio_seleccionado.attr('id'),
			"txt_razon_social_factura" : razon_social_factura,
			"txt_rfc" : rfc_factura,
			"txt_direccion_factura" : direccion_factura,
			"txt_colonia_factura" : colonia_factura,
			"txt_ciudad_factura" : ciudad_factura,
			"txt_estado_factura" : estado_factura,
			"txt_cp_factura" : cp_factura,
			"requiere_factura" : fact,
			"roles" : roles
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
						$("#modal_respuesa_servidor_success").modal('hide');
					}, 3000);
					cargar_vista('crear_cliente');//Recarga la vista para limpiar todo el form
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x, desc, e) {
				console.log(x);
				console.log("Details: " + desc + "\nError:" + e);
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
	
	$('#txt_nombre').focusout(function(){	
		if($(this).val() == '')					
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});
	
	$('#txt_telefono1').focusout(function(){	
		if($(this).val() == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_paterno').focusout(function(){	
		if($(this).val() == '')					
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_materno').focusout(function(){	
		if($(this).val() == '')					
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_telefono1').focusout(function(){	
		if($(this).val() == '')			
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_telefono2').focusout(function(){	
		if($(this).val() == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	//txt_correo1
	$('#txt_correo1').focusout(function(){	
		if($(this).val() == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_correo2').focusout(function(){	
		if($(this).val() == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});
	
	$('#txt_calle').focusout(function(){	
		if($(this).val() == '')			
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_numero').focusout(function(){	
		if($(this).val() == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_colonia').focusout(function(){	
		var colonia = $(this).val();		
		if(colonia == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_ciudad').focusout(function(){		
		if($(this).val() == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_razon_social').focusout(function(){	
		if($(this).val()	 == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_rfc').focusout(function(){	
		if($(this).val()	 == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_calle_factura').focusout(function(){	
		if($(this).val()	 == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_colonia_factura').focusout(function(){	
		if($(this).val()	 == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_ciudad_factura').focusout(function(){	
		if($(this).val()	 == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_estado').focusout(function(){	
		if($(this).val()	 == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});

	$('#txt_cp').focusout(function(){	
		if($(this).val()	 == '')				
			$(this).css('border','solid 1px #ff0000')
		else
			$(this).css('border','solid 1px #cecece')		
	});
});