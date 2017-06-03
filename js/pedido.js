$(document).ready(function(){

	/*
	*
	*
	* id_producto_comensal_pedido PENDIENTE POR ASIGNAR NOMBRE CORRECTO
	* id_venta PENDIENTE POR ASIGNAR NOMBRE CORRECTO
	*
	*
	*/
	$('#remover_comensal').hide();
	$('.configuracion_pedido').hide();
	
	$(function(){
		
		// $.ajax({
			// url:  '../api/api.php',
      // data: {
  			// "accion": "consultar_caja_chica",
  			// "tipo_accion": "modelo",
  		// },
			// success:function(data){
				// if(data.respuesta_servidor == 1){
					// $('#dlg_caja').modal('show');
					// setTimeout(function(){
						// $('#txt_corte').focus();
					// },500);
				// }else if(data.respuesta_servidor == 2){
					// $('#dlg_caja').modal('show');
					// $('.ocultarCajaChica').hide();
					// setTimeout(function(){
						// $('#txt_corte').focus();
					// },500);
				// }
			// }
		// });
		// $.ajax({
			// dataType: 'json',
      // url:  '../api/api.php',
      // data: {
  			// "accion": "consulta_usuario",//Todavia no está estandarizado
  			// "tipo_accion": "modelo",
  		// },
			// success: function(data) {

				// var clasificacion = $("#txt_usuario_servicio");
				// var clasificacion1 = $("#txt_usuario_servicio_general");

				// $("#txtSucursal option").each(function() {
					// $(this).remove();
				// });

				// $(data).each(function(i, v){
					// clasificacion.append('<option value="' + v.id + '">' + v.nombre + '</option>');
					// clasificacion1.append('<option value="' + v.id + '">' + v.nombre + '</option>');
				// })

			// },
			// error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
			// }
		// });
		$.ajax({
			dataType: 'json',
			url:  '../api/api.php',
			data: {
				"accion": "clasificacion_pedido",
				"tipo_accion": "modelo",
			},
			success: function(data) {
				
				$(data.respuesta_servidor).each(function(i, v){  
					$('#clasificacion').append('' +
					'<div class="img-pedido" data-id_clasificacion="' + v.id_clasificacion + '">' +
					'	<img src="' + v.nombre_de_almacenado + '" class="img-responsive" />' +
						v.nombre +
					'</div>');
				});
				
		   },
		   error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
		   }
		});
		
	});
	
	$('#clasificacion').on('click', '.img-pedido' ,function(){

		var id_clasificacion = $(this).data('id_clasificacion');
		
		$.ajax({
			dataType: 'json',
			url:  '../api/api.php',
			data: {
				"accion": "consultar_productos_por_id_clasificacion",
				"tipo_accion": "modelo",
				"id_clasificacion": id_clasificacion,
			},
			success: function(data) {
				
				var j = 0;
				
				$('#producto').empty();
				
				//Se recorre el arreglo de productos recibidos y se muestran en DIV productos
				$(data.respuesta_servidor).each(function(i, v){
					$('#producto').append('' +
						'<div class="img-pedido-producto" data-id_producto="' + v.id_producto + '">' +
						'	<div class="thumbnail">' +
						'		<img src="' + v.imagen + '" />' +
						'	</div>' +
							v.nombre +
						'</div>' +
					'');
					
					j++;
				});
				
				//En caso de no recibir ningún producto se envía un mensaje de alerta
				if(j == 0){
					$('#producto').append('<h4>No se encontraron <strong>productos</strong> en esta clasificación.<h4>');
				}
				
		   },
		   error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
		   }
		});

	});
	
	$('#producto').on('click', '.img-pedido-producto' ,function(){

		var id_producto = $(this).data('id_producto');
		var id_comensal = $('#remover_comensal').data('id_comensal');
		
		agregar_producto_a_pedido(id_producto, id_comensal);

	});
	
	//*****************************
	// Instantiate the Bloodhound suggestion engine
	var ingredientes_extras = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			'cache': false,
			url: "../api/api.php?tipo_accion=modelo&accion=consultar_productos_por_nombre_y_tipo",

			replace: function(url, uriEncodedQuery) {
				
				var tipo_busqueda = 2;
				
				return url + '&q=' + uriEncodedQuery + '&tipo_busqueda=' + tipo_busqueda

			},
			wildcard: '%QUERY',
			filter: function (data) {
				return data;
			}
		}
	});

	// Initialize the Bloodhound suggestion engine
	ingredientes_extras.initialize();

	 $("#txt_ingrediente_extra").typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},
	{
		name: "result",
		displayKey: "nombre",
		source: ingredientes_extras.ttAdapter()
	}).bind("typeahead:selected", function(obj, datum, name) {
		$(this).data("id", datum.id_producto);
		$(this).data("nombre", $(this).val());
	});
	
	//*****************************
	// Instantiate the Bloodhound suggestion engine
	var buscador_producto = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			'cache': false,
			url: "../api/api.php?tipo_accion=modelo&accion=consultar_productos_por_nombre",

			replace: function(url, uriEncodedQuery) {
				
				var tipo_busqueda = 2;
				
				return url + '&q=' + uriEncodedQuery

			},
			wildcard: '%QUERY',
			filter: function (data) {
				return data;
			}
		}
	});

	// Initialize the Bloodhound suggestion engine
	buscador_producto.initialize();

	 $("#txt_busqueda_producto").typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},
	{
		name: "result",
		displayKey: "nombre",
		source: buscador_producto.ttAdapter()
	}).bind("typeahead:selected", function(obj, datum, name) {
		$(this).data("id", datum.id_producto);
		$(this).data("nombre", $(this).val());
	});

	$('#btn_busqueda_producto').click(function(){
		
		var id_mesa_dinamica = parseInt($('#carga_mesa').data('id_mesa_dinamica'));
		var id_producto = parseInt($('#txt_busqueda_producto').data('id'));
		var id_comensal = $('#remover_comensal').data('id_comensal');
		var nombre_producto = $('#txt_busqueda_producto').data('nombre');
		
		if(id_mesa_dinamica > 0 && id_producto > 0){
			
			$("#txt_busqueda_producto").val(nombre_producto);
			agregar_producto_a_pedido(id_producto, id_comensal);
			
		}else if(id_producto > 0 && isNaN(id_mesa_dinamica)){
			
			$('#agregar_comensal').click();
			
		}
		
	});
	
	$('#btn_ingrediente_extra').click(function(){
		
		var id_producto_comensal_pedido = parseInt($('.configuracion_pedido').data('id_producto_comensal_pedido'));
		var id_ingrediente_extra = parseInt($("#txt_ingrediente_extra").data("id"));
		var nombre_ingrediente_extra = $("#txt_ingrediente_extra").data("nombre");
		var nuevo_ingrediente = 1;
		
		$("#txt_ingrediente_extra").val(nombre_ingrediente_extra);
		
		//Si existe un pedido actualmente abierto a configuración, se procesará el producto encontrado en bloodhound
		if(id_producto_comensal_pedido > 0 && id_ingrediente_extra > 0){
			
			$('#ingrediente_extra tbody tr').each(function(i,v){
				
				var id_ingrediente_extra_actual = parseInt($(this).data('id_ingrediente_extra'));
				
				if(id_ingrediente_extra == id_ingrediente_extra_actual){
					
					//Se aumenta un valor a la cantidad del ingrediente extra
					var cantidad_ingrediente_extra = parseInt($(this).data('cantidad_ingrediente_extra')) + 1;
					
					//Se inscribe el valor tanto en data como en vista
					$(this).data('cantidad_ingrediente_extra', cantidad_ingrediente_extra);
					$('.cantidad_ingrediente_extra_vista[data-id_ingrediente_extra="' + id_ingrediente_extra + '"]').html(cantidad_ingrediente_extra);
					
					//Se especifica que no es necesario crear un nuevo ingrediente
					nuevo_ingrediente = 0;
					
					//se detiene ciclo
					return;
					
				}
				
			});
			
			if(nuevo_ingrediente == 1){
				
				$('#ingrediente_extra tbody').append('' +
					'<tr data-id_ingrediente_extra="' + id_ingrediente_extra + '" data-cantidad_ingrediente_extra="1">' +
					'	<td class="col-md-10">' + nombre_ingrediente_extra + ' (<span class="cantidad_ingrediente_extra_vista" data-id_ingrediente_extra="' + id_ingrediente_extra + '">1</span>)</td>' +
					'	<td class="col-md-2"><button class="btn btn-danger btn_eliminar_ingrediente_extra" data-id_ingrediente_extra="' + id_ingrediente_extra + '"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> <span class="font-title"></span></button></td>' +
					'</tr>');
				
			}
			
			/*
			*
			* 	FALTA CÓDIGO PARA AGREGAR DESDE PHP, ESTO SOLAMENTE ES VISTA
			*
			*/
			
			/*$.ajax({
				dataType: 'json',
				url:  '../api/api.php',
				data: {
					"accion": "consultar_productos_por_id_clasificacion",
					"tipo_accion": "modelo",
					"id_clasificacion": id_clasificacion,
				},
				success: function(data) {
					
					$('#ingrediente_extra tbody tr').each(function(i,v){
				
						var id_ingrediente_extra_actual = parseInt($(this).data('id_ingrediente_extra'));
						
						if(id_ingrediente_extra == id_ingrediente_extra_actual){
							
							//Se aumenta un valor a la cantidad del ingrediente extra
							var cantidad_ingrediente_extra = parseInt($(this).data('cantidad_ingrediente_extra')) + 1;
							
							//Se inscribe el valor tanto en data como en vista
							$(this).data('cantidad_ingrediente_extra', cantidad_ingrediente_extra);
							$('.cantidad_ingrediente_extra_vista[data-id_ingrediente_extra="' + id_ingrediente_extra + '"]').html(cantidad_ingrediente_extra);
							
							//Se especifica que no es necesario crear un nuevo ingrediente
							nuevo_ingrediente = 0;
							
							//se detiene ciclo
							return;
							
						}
						
					});
					
					if(nuevo_ingrediente == 1){
						
						$('#ingrediente_extra tbody').append('' +
							'<tr data-id_ingrediente_extra="' + id_ingrediente_extra + '" data-cantidad_ingrediente_extra="1">' +
							'	<td class="col-md-10">' + nombre_ingrediente_extra + ' (<span class="cantidad_ingrediente_extra_vista" data-id_ingrediente_extra="' + id_ingrediente_extra + '">1</span>)</td>' +
							'	<td class="col-md-2"><button class="btn btn-danger btn_eliminar_ingrediente_extra" data-id_ingrediente_extra="' + id_ingrediente_extra + '"><i class="fa fa-trash fa-1x" aria-hidden="true"></i> <span class="font-title"></span></button></td>' +
							'</tr>');
						
					}
				},
			   error: function(xhr, desc, err){
					console.log(xhr);
					console.log("Details: " + desc + "\nError:" + err);
			   }
			});*/
			
		}
	});
	
	$('#btn_nueva_mesa').click(function(){
		
		//Se crea variables que será utilizada como contador
		var id_mesa_dinamica = parseInt($('#carga_mesa').data('id_mesa_dinamica'));
		
		//Posteriormente se evalua si existe una mesa dinámica abierta, en caso de existir alguna, 
		//se advertirá la situación con un modal, en caso de ser lo contrario, se abre directamente la mesa
		if(id_mesa_dinamica > 0){
			
			//Advertir que existe una comanda abierta
			$('#dlg_mesa_abierta').modal('show');
			
		}else{
			
			//Se cargan mesas disponibles y se abre panel para nueva mesa
			limpiar();
			cargar_mesas_disponibles_y_crear_mesa_dinamica();
			$('#dlg_nueva_mesa').modal('show');
			
		}
		
	});
	
	$('#btn_aceptar_cierre_comensal').click(function(){
		
		limpiar();
		cargar_mesas_disponibles_y_crear_mesa_dinamica();
		$('#dlg_mesa_abierta').modal('hide');
		
		setTimeout(function(){
			$('#dlg_nueva_mesa').modal('show');
		},500);
			
		
	});
	
	$('#ingrediente_extra').on('click', '.btn_eliminar_ingrediente_extra' ,function(){

		var id_ingrediente_extra = $(this).data('id_ingrediente_extra');
		
		$('#ingrediente_extra tbody tr[data-id_ingrediente_extra="' + id_ingrediente_extra + '"]').remove();
		
		/*
		*
		* 	FALTA CÓDIGO PARA ELIMINAR DESDE PHP, ESTO SOLAMENTE ES VISTA
		*
		*/
		
		/*$.ajax({
			dataType: 'json',
			url:  '../api/api.php',
			data: {
				"accion": "consultar_productos_por_id_clasificacion",
				"tipo_accion": "modelo",
				"id_clasificacion": id_clasificacion,
			},
			success: function(data) {
				$('#ingrediente_extra tbody tr[data-id_ingrediente_extra="' + id_ingrediente_extra + '"]').remove();
			},
		   error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
		   }
		});*/

	});

	$('#carga_mesa tbody').on('click', '.agrega_mesa', function(){
		
		var id_mesa = $(this).data('id');
		var posicion_mesa = $(this).data('position');
		var nombre_mesa = $(this).data('name');
		var capacidad_mesa = $(this).data('capacidad');
		var id_mesa_dinamica = $('#carga_mesa').data('id_mesa_dinamica_por_validar');
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "relacionar_mesa_con_mesa",
				"tipo_accion": "modelo",
				"global_id_mesa": id_mesa,
				"global_id_mesa_dinamica": id_mesa_dinamica
			},
			dataType: 'json',
			success:function(data){	
				if(data.estatus_request === 'error'){
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = "¡Ha ocurrido un error !";
					// Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_error").modal('hide');
					}, 3000);
				}
				
				// Si no hay errores
				if(data.estatus_request === 'success'){
					$('#carga_mesa_dinamica tbody').append('<tr data-id="' + data.respuesta_servidor + '"><td>'+ nombre_mesa +'</td><td>'+ capacidad_mesa +'</td><td><button type="button" class="btn btn-danger btn_eliminar_mesa_de_mesa_dinamica" data-id="' + data.respuesta_servidor + '" data-nombre="'+ nombre_mesa +'" data-capacidad="' + capacidad_mesa + '" > <i class="fa fa-trash" aria-hidden="true"></i> Remover</button></td></tr>');
					$('#carga_mesa tbody tr[data-position="' + posicion_mesa + '"]').remove();
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
			
		});
		
	});
	
	$('#carga_mesa_dinamica tbody').on('click', '.btn_eliminar_mesa_de_mesa_dinamica', function(){
		
		var id_mesa = $(this).data('id');
		var nombre_mesa = $(this).data('nombre');
		var capacidad_mesa = $(this).data('capacidad');
		var id_mesa_dinamica = $('#carga_mesa').data('id_mesa_dinamica');
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "remover_mesa_de_mesa_dinamica",
				"tipo_accion": "modelo",
				"global_id_mesa": id_mesa,
				"global_id_mesa_dinamica": id_mesa_dinamica
			},
			dataType: 'json',
			success:function(data){	
		
				// Si no hay errores
				if(data.estatus_request === 'success'){
					
					var contador_actual = parseInt($('#carga_mesa tbody tr:last').data('position')) + 1;
					
					if(isNaN(contador_actual)){
						contador_actual = 0;
					}
					
					$('#carga_mesa tbody').append('<tr data-position="' + contador_actual + '"><td class="col-md-6">'+ nombre_mesa + '</td><td class="col-md-4">'+ capacidad_mesa +' Personas</td><td class="col-md-2"><button type="button" class="btn btn-success agrega_mesa" data-name="' + nombre_mesa + '" data-capacidad="'+ capacidad_mesa +'" data-position="' + contador_actual + '" data-id="'+ id_mesa +'"><i class="fa fa-check-square" aria-hidden="true"></i> Agregar</button></td></tr>');
					$('#carga_mesa_dinamica tr[data-id="' + id_mesa + '"]').remove();
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
			
		});
		
	});
	
	$('#btn_activar_mesa').click(function(){
		
		var id_mesa_dinamica = $('#carga_mesa').data('id_mesa_dinamica_por_validar');
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "mesa_relacional",
				"tipo_accion": "modelo",
				"mesa_dinamica": id_mesa_dinamica	
			},
			dataType: 'json',
			success:function(data){	
				
				if(data.estatus_request == 'success'){
					
					$('#carga_mesa').data('id_mesa_dinamica',id_mesa_dinamica);
					$('#dlg_nueva_mesa').modal('hide');
					
				}else if(data.estatus_request == 'error'){
					
					$('.mensaje_dlg_nueva_mesa').hide();
					$('.mensaje_dlg_nueva_mesa').html(data.respuesta_servidor);
					
					setTimeout(function(){
						
						$('.mensaje_dlg_nueva_mesa').show('slow');
						
					},500);
					
				}
				
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
		});			
	});
	
	$('#agregar_comensal').click(function(){
		
		var id_mesa_dinamica = parseInt($('#carga_mesa').data('id_mesa_dinamica'));
		
		//Si existe un ID de mesa dinámica, se abre la configuración de comensal
		if(id_mesa_dinamica > 0){
			
			$.ajax({
				url: '../api/api.php',
				type: 'POST',
				data: {
					"accion": "consultar_color_comensal",
					"tipo_accion": "modelo",
					"id_mesa_dinamica": id_mesa_dinamica	
				},
				dataType: 'json',
				success:function(data){
					
					$('.colores_de_comensal').empty();
					
					$(data.respuesta_servidor).each(function(i, v){
						
						$('.colores_de_comensal').append('<div class="color-group"><div class="color-block"><div class="color-item" style="background-color: ' + v.hexadecimal_color_comensal + '" data-hexadecimal="' + v.hexadecimal_color_comensal + '" data-id_color="' + v.id_color_comensal + '"  data-nombre_color="' + v.nombre_color_comensal + '"></div></div></div></div>');
					});
					
					$('#dlg_comensal').modal('show');
					
				},
				//Si el request falla genera mensajes de errores de posibles eventos comunes
				error: function(xhr, desc, err){
					console.log(xhr);
					console.log("Detalles: " + desc + "\nError:" + err);
				}
			});
			
		}else{
			
			//Se cargan mesas disponibles y se abre panel para nueva mesa
			cargar_mesas_disponibles_y_crear_mesa_dinamica();
			$('#dlg_nueva_mesa').modal('show');
			
		}
	});
	
	$('.colores_de_comensal').on('click', '.color-item', function(){
		
		var id_mesa_dinamica = $('#carga_mesa').data('id_mesa_dinamica');
		var id_color = $(this).data('id_color');
		var hexadecimal = $(this).data('hexadecimal');
		var nombre_comensal = $('#txt_nombre_comensal').val();
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "almacenar_comensal_a_mesa_dinamica",
				"tipo_accion": "modelo",
				"mesa_dinamica": id_mesa_dinamica,	
				"id_color": id_color
			},
			dataType: 'json',
			success:function(data){
				
				$('.panel_clientes_con_pedido .panel-body').prepend('' + 
						'<button class="btn btn-block btn_comensal" data-id_comensal="' + data.respuesta_servidor + '" style="background-color: ' + hexadecimal + '">' +
							'<i class="fa fa-user fa-2x" aria-hidden="true"></i>' +
						'</button>');
				
				$('#dlg_comensal').modal('hide');
				
				$('#remover_comensal').data('id_comensal',data.respuesta_servidor);
				
				$('#remover_comensal').show('slow');
				
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
		});
		
	});
	
	$('.panel_clientes_con_pedido .panel-body').on('click', '.btn_comensal', function(){
		
		var id_comensal = $(this).data('id_comensal');
		
		$('#remover_comensal').data('id_comensal',id_comensal);
				
		$('#remover_comensal').show('slow');
				
		//Código para cargar pedido
		// $.ajax({
			// url: '../api/api.php',
			// type: 'POST',
			// data: {
				// "accion": "cargar_pedido_comensal",
				// "tipo_accion": "modelo",
				// "id_comensal": id_comensal
			// },
			// dataType: 'json',
			// success:function(data){
				
				//Carga de datos en tabla
				
				
			// },
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			// error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Detalles: " + desc + "\nError:" + err);
			// }
		// });
		
	});
	
	$('#remover_comensal').click(function(){
		
		var id_comensal = $(this).data('id_comensal');
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "cambiar_estatus_de_comensal_a_mesa_dinamica",
				"tipo_accion": "modelo",
				"id_comensal": id_comensal
			},
			dataType: 'json',
			success:function(data){
				
				//Carga de datos en tabla
				$('.btn_comensal[data-id_comensal="' + id_comensal + '"]').hide('slow');
				
				$('#remover_comensal').hide('slow');
				
				setTimeout(function(){
					$('.btn_comensal[data-id_comensal="' + id_comensal + '"]').remove();
				},1000);
				
				//Falta limpiar tabla de comanda 
				//Falta limpiar la configuración de producto
				
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
		});
		
	});
	// $('#btn_actualizar_mesa').click(function() {

		// var mesa = $('#txt_numero_mesa').val();
		// var idPedido = $('#numero_pedido').html();

		// if(mesa != ''){
			// var parametros = {
				// "mesa": $('#txt_numero_mesa').val(),
				// "id_pedido": $('#numero_pedido').html(),
        // "accion": "actualizar_mesa",//quedo pendiente
				// "tipo_accion": "modelo",
			// };

			// $.ajax({
				// url: '../api/api.php',
				// type: 'post',
				// data: parametros,
				// success:function(data){
					// if(data == 1){
						// $('#txt_numero_mesa').val(mesa);
						// $('#btn_vista_pedido').data('mesa', mesa);
					// }
				// }
			// });
		// }
	// });

	// $('#btn_aceptar_cliente').click(function() {
		// var cadena = $('#search-box').val().split('-');
		// var servicio = $('#txt_tipo_pedido').val().split('-');
		// var idCliente = '';
		// var nombre = '';
		// if($.isNumeric(cadena[0])){

			// $('.lblIdCliente').html(cadena[0]);
			// $('.lblNombre').html(cadena[1].toUpperCase());

			// idCliente = cadena[0];
			// nombre = cadena[1];

			// var url = "almacenar_cliente";//creo que faltan isset en este documento

		// }else{

			// idCliente = '';
			// nombre = cadena[0];

			// var url = "almacenar_cliente";//los datos de la funcion están en veremos

		// }
		// if($('#search-box').val() != ""){

			// var parametros = {
				// "accion": url,
				// "tipo_accion": "modelo",
				// "idCliente": idCliente,
				// "nombre": nombre,
				// "telefono2": $('#txt_telefono2').val(),
				// "ciudad": $('#txtCiudad').val(),
				// "colonia": $('#txt_colonia').val(),
				// "calle": $('#txt_direccion').val(),
				// "telefono1": $('#txt_telefono1').val(),
				// "estatus": 0
			// };

			// var contenido_variable = {
				// "accion": "ultimo_cliente",
				// "tipo_accion": "modelo",
				// "idCliente": idCliente,
				// "nombre": nombre,
				// "telefono2": $('#txt_telefono2').val(),
				// "ciudad": $('#txtCiudad').val(),
				// "colonia": $('#txt_colonia').val(),
				// "calle": $('#txt_direccion').val(),
				// "telefono1": $('#txt_telefono1').val(),
				// "estatus": 0
			// };

			// $.ajax({
				// url: '../api/api.php',
				// type: 'post',
				// data: parametros,
				// success:function(data){
					// if(!$.isNumeric(cadena[0])){
						// $.ajax({
							// url:'../api/api.php',
							// type: 'post',
							// data: contenido_variable,
							// success:function(data1){
								// $('.lblIdCliente').html(data1);
								// $('.lblNombre').html(($('#search-box').val()).toUpperCase());
							// }
						// });
					// }
				// }
			// });
		// }
		// $('.lblIdTipoServicio').html(servicio[0]);
		// $('.lblTipoServicio').html(servicio[1]);

		// $('#btn_cerrar').click();
	// });

	// $('#btn_aceptar_cobrar').click(function() {
		// if(repeticion == 0){

			// repeticion = 1;

			// var total = $('#txt_pago_total').val();
			// var tipoPago = $('input[name=rdoPago]:checked').val();
			// if(total <= 0 || (resta > 0 && tipoPago == 0) || (resta <= 0 && tipoPago == 1)){
				// if(total <= 0){
					// alert('El total a pagar debe ser mayor a 0 (cero).');
					// return false;
				// }
				// if(resta > 0 && tipoPago == 0){
					// alert('Debes completar el total a pagar');
					// return false;
				// }
				// if(resta <= 0 && tipoPago == 1){
					// alert('Usted pagó un total mayor al total a pagar, no es posible realizar venta a crédito.');
					// return false;
				// }

				// repeticion = 0;

			// }else{
				// enviarDato();
				// $('#Cerrar').click();
				// setTimeout(function(){

					// $('#txt_mesa').focus();

					// repeticion = 0;

				// }, 400);
			// }

		// }
	// });

	// $('#btn_precio').click(function() {
		// $.ajax({
			// dataType: 'json',
			// url:  '../api/api.php',
      // data: {
  			// "accion": "busca_pedido",//Todavia no está estandarizado
  			// "tipo_accion": "modelo",
  		// },
			// success: function(data) {
				// $('#carga_pedido > tbody tr').remove();
				// $('#carga_pedido > tbody').append('<tr></tr>');
				// $(data).each(function(i, v){
					// if(v.tipo == 4)
						// destino = v.nombre;
					// else
						// destino = v.mesa;

					// if(v.tipo == 0)
						// tipo = 'Local';
					// else if(v.tipo == 1)
						// tipo = 'Para Llevar';
					// else if(v.tipo == 2)
						// tipo = 'Domicilio';

					// $('#carga_pedido tbody tr:last').after('<tr data-id=' + v.id + '><td><button type="button"  data-toggle="modal" data-target="#dlgVistaPedido" data-whatever="@mdo" class="btn btn-primary" data-id="' + v.id + '" data-mesa="' + v.mesa + '" id="btn_vista_pedido">' + v.id + ' <span class="glyphicon glyphicon-search"></span></button></td><td>' + destino + '</td><td>' + tipo + '</td><td>' + parseFloat(v.importe).toFixed(2) + '</td><td> <button type="button" class="btn btn-success" data-id="' + v.id + '" data-mesa="' + v.mesa + '" id="btnImprimirCuenta"><span class="glyphicon glyphicon-print"></span></button> <button type="button" data-toggle="modal" data-target="#dlgCobrar" data-whatever="@mdo" class="btn btn-primary" data-cliente="' + v.cliente + '" data-sell="' + v.importe + '" data-id="' + v.id + '" id="btnCobroCuenta" ><span class="glyphicon glyphicon-ok"></span></button> <button type="button" class="btn btn-secondary" data-id="' + v.id + '" id="btnCancelar"><span class="glyphicon glyphicon-trash"></span></button></td></tr>');
				// })
		   // },
		   // error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
		   // }
		// });
	// });

	// $('#btn_agregar').click(function() {
		// $("input[type=checkbox]:checked").each(function(){
			// $('#carga_producto > tbody tr:last').after('<tr><td data-title="' + $(this).data('id') + '">' + $(this).data('title') + '</td><td data-title="1" class="hidden-print"> <a href="#" id="btnComentarioExtra" class="btn mini red-stripe" role="button" data-title="' + $(this).data('title') + '" data-id="' + counter + '"><span class="glyphicon glyphicon-comment"></span></a> <a href="#" id="btnEliminar" class="confirm-delete btn mini red-stripe" role="button" data-title="' + $(this).data('title') + '" data-id="' + counter + '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>');
			// counter++;
		// });
		// $("input[type=checkbox]:checked").each(function(){
			// $("input[type=checkbox]:checked").prop('checked', false);
		// });
		// if($('#txt_anotacion').val() != ""){
			// $('#carga_producto > tbody tr:last').after('<tr class="hide anotacion' + counter + '" data-id="' + counter + '"><td colspan="3" class="modificaAnotacion' + counter + '" data-id="' + counter + '">' + $('#txt_anotacion').val() + '</td><td class="hidden-print"><a href="#" id="btnEliminar" class="confirm-delete btn mini red-stripe" role="button" data-title="Anotación" data-id="' + counter + '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>');
			 // $('#txt_anotacion').val('');
			 // counter++;
		// }else{
			// $('#carga_producto > tbody tr:last').after('<tr class="hide anotacion' + counter + '" data-id="' + counter + '"><td colspan="3" class="modificaAnotacion' + counter + '" data-id="' + counter + '"></td><td class="hidden-print"><a href="#" id="btnEliminar" class="confirm-delete btn mini red-stripe" role="button" data-title="Anotación" data-id="' + counter + '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>');
			// counter++;
		// }
		// calcularTotal();
	// });

	// $('#btn_cerrar').click(function() {
		// if($('#dlgCliente').is(':visible'))
			// $('#dlgCliente').modal('hide');
		// if($('#dlgCobrar').is(':visible'))
			// $('#dlgCobrar').modal('hide');
		// if($('#dlgPrecio').is(':visible'))
			// $('#dlgPrecio').modal('hide');
		// if($('#dlgVistaPedido').is(':visible'))
			// $('#dlgVistaPedido').modal('hide');
		// $('#txt_mesa').focus();
	// });

	// $('#btn_cliente').click(function() {
		// if($('#dlgCliente').is(':hidden')){
			// setTimeout(function(){
				// $('#txt_tipo_pedido option:eq(0)').prop('selected', true)
				// $('.datoDomicilio').hide();

				// $('#search-box').val('');
				// $('#txt_direccion').val('');
				// $('#txt_colonia').val('');
				// $('#txt_telefono1').val('');
				// $('#txt_telefono2').val('');

				// $('#search-box').focus();
			// }, 500);
		// }else{
			// setTimeout(function(){
				// $('#txt_mesa').focus();
			// }, 400);
		// }
	// });

	// $('#btn_enviar').click(function() {

		// if(repeticion == 0){

			// repeticion = 1;

			// var data = Array();
			// $("#carga_producto tr").each(function(i, v){
				// data[i] = Array();
				// $(this).children('td').each(function(ii, vv){
						// if($(this).data('title') != null)
							// data[i][ii] = $(this).data('title');
						// else
							// data[i][ii] = $(this).text();
				// });
			// });

			// if($('.lblIdModificaPedido').html() != ''){
				// var url = 'actualizar_pedido';
			// }else{
				// var url = 'guarda_pedido';
			// }

			// if(($('#txt_mesa').val() != '' || $('.lblIdTipoServicio').html() == 2) && $('.lblIdTipoServicio').html() != '' && $('.lblIdCliente').html() != '' && $('.cantidadTotal').html() != ''){

				// var contenidoVariable = {
					// "accion": url,//Todavia no está estandarizado
	  			// "tipo_accion": "modelo",
					// "data": data,
					// "idPedido":$('.lblIdModificaPedido').html(),
					// "idCliente":$(".lblIdCliente").html(),
					// "total":$(".cantidadTotal").html(),
					// "mesa":$("#txt_mesa").val(),
					// "idUsuario":$("#txt_usuario_servicio_general").val(),
					// "tipoPedido":$('.lblIdTipoServicio').html()
				// }

				// $.ajax({
					// url: '../api/api.php',
					// type: 'post',
					// data: parametros,
					// success: function (e) {

						// idPedido = e;
						// nombreEmpresa = $('.nombreSistema').html();
						// totalPagar = $(".cantidadTotal").html();
						// idCliente = $(".lblIdCliente").html();

						// $('#dlgCobrar').data('sell', totalPagar);
						// $('#dlgCobrar').data('id', idPedido);
						// $('#dlgCobrar').data('cliente', idCliente);

						// $('#dlgCobrar').modal('show');

						// repeticion = 0;

					// },
				// });

			// }else{

				// var error = '';
				// $('#tituloProcesaCobro').html('¡Error al realizar el movimiento!');

				// if(($('#txt_mesa').val() == '' || $('.lblIdTipoServicio').html() != 2)){
					// error = "<div class='text-danger'><h4>Escribe el nombre del cliente. </h4> </div>";
					// setTimeout(function(){
						// $('#txt_mesa').focus();
					// }, 2100);
				// }
				// if($('.lblIdTipoServicio').html() == ''){
					// error += "<div class='text-danger'><h4> Selecciona un tipo de servicio. </h4> </div>";
				// }

				// if($('.lblIdCliente').html() == ''){
					// error += "<div class='text-danger'><h4> Selecciona un cliente. </h4> </div>";
				// }

				// if($('.cantidadTotal').html() == ''){
					// error += "<div class='text-danger'><h4> El total a pagar es incorrecto. </h4> </div>";
				// }

				// $('#mensajeProcesaCobro').html(error);
				// $('#dlgProcesaCobro').modal('toggle');
				// setTimeout(function(){

					// $('#tituloProcesaCobro').html('¡Finalizamos!');
					// $('#mensajeProcesaCobro').html('Tarea Procesada');
					// $('#dlgProcesaCobro').modal('hide');

					// repeticion = 0;

				// }, 2000);

			// }
		// }

	// });

	// $('#btnLimpiar').click(function() {
		// limpiar();
	// });

	// $('#btnModificarPedido').click(function() {
		// var mesa = $(this).data('mesa');
		// var idPedido = $(this).data('id');
		// $('#txt_mesa').prop('readonly', true);
		// $('#txt_mesa').val(mesa);
		// $('.lblIdModificaPedidoTexto').html('| Pedido #');
		// $('.lblIdModificaPedido').html(idPedido);
	// });

	// $('#btn_precio').click(function() {
		// if($('#dlgPrecio').is(':hidden')){
			// setTimeout(function(){
				// $('#search-box1').focus();
			// }, 400);
		// }else{
			// setTimeout(function(){
				// $('#txt_mesa').focus();
			// }, 400);
		// }
	// });

	// $('#btnSalir').click(function() {
		// $.ajax({
			// url:  '../api/api.php',
      // data: {
  			// "accion": "dato_sesion",//Todavia no está estandarizado
  			// "tipo_accion": "modelo",
  		// },
			// success:function(data){
				// if(data != 3){
					// window.location.href = "../index.php";
				// }else{
					// $.ajax({
						// url:'../logout.php',
						// success:function(data){
							// window.open("../index.php","_self");
						// }
					// });
				// }
			// }
		// });
	// });

	// $('#btnRealizarCorte').click(function(){
		// var saldo = $('#txt_corte').val();
		// var vaso = $('#txt_vaso').val();

		// if( saldo != '' && vaso != '' ){
			// if( saldo >= 0 ){
				// $('#dlg_caja').modal('hide');
				// $('.totalCaja').html(saldo);
				// $('.totalCaja').data('id',vaso);
				// $('#dlgSeguridadCorte').modal('show');
			// }else{
				// $('#dlgSeguridadCorte2').modal('show');
				// setTimeout(function(){
					// $('#dlgSeguridadCorte2').modal('hide');
				// }, 3000);
			// }
		// }else{
			// $('.mensajeCorte').html('Escribe el Saldo en Caja');
		// }

	// });

	// $('.muestraCaja').click(function(){
		// $('#dlg_caja').modal('show');
	// });

	// $('#btn_seguro_corte').click(function(){
		// var saldo = $('#txt_corte').val();
		// var vaso = $('#txt_vaso').val();
		// $.ajax({
			// type: "POST",
			// url:  '../api/api.php',
      // data: {
  			// "accion": "fondo_caja",//Todavia no está estandarizado
  			// "tipo_accion": "modelo",
				// "saldo": saldo,
				// "vaso": vaso,
  		// },
			// success: function(data){
				// setTimeout(function(){
					// $('#dlgSeguridadCorte').modal('hide');
					// $('#txt_corte').html('');
				// }, 1000);
			// }
		// });

	// });

	// $('#carga_producto').on('click', '#btnEliminar',function() {
		// var data = $(this).data('id') + "%%" + $(this).data('title');
		// $('#eliminar_producto').data('data', data).modal('show');
	// });


	// $('#carga_producto').on('click', '#btnComentarioExtra',function() {
		// var data = $(this).data('id') + "%%" + $(this).data('title');
		// $('#dlgComentarioExtra').data('data', data).modal('show');
	// });

	// $('#carga_pedido').on('click', '#btnCancelar',function() {
		// $('#btn_cerrar').click();
		// var data = $(this).data('id');
		// $('#cancelar_pedido').data('id', data).modal('show');
	// });

	// $('#cancelar_pedido').on('show', function() {
		// var data = $(this).data('id');
		// $(this).data('id',data);
		// $('#cancelar_pedido .modal-body p').html("Desea cancelar el pedido " + '<b>' + data +'</b>' + ' ?');
	// })

	// $('#btn_cancela_seguro').click(function() {
		// var idCancelar = $('#cancelar_pedido').data('id');
		// $.ajax({
			// url:  '../api/api.php',
      // data: {
  			// "accion": "cancela_pedido",//Todavia no está estandarizado
  			// "tipo_accion": "modelo",
				// "keyword": idCancelar,
  		// },
			// dataType: 'json',
			// success:function(data){
				// if(imprimir == 1){
					// $('#cancelar_pedido').modal('hide');

					// $('.container').hide();
					// $('#modal-producto').show();
					// $('#modal-producto tbody').empty();
					// $('#modal-producto thead').hide();

					// $('#imprimirTicket').show();
					// $('#imprimirTicket .modal-body').html('<div><h4>Cancelación de Pedido</h4></div><div>Mesa:' + data.mesa + '</div><div>Pedido:' + idCancelar + '</div><div>' + data.fecha + '</div><div>Mesero:' + data.usuario + '</div>');

					// $(data.cadenaProducto).each(function(i,v){
						// $('#modal-producto tbody').append('<tr><td class="col-md-3">' + v.cantidad + '</td><td colspan="2" class="col-md-9">' + v.nombreProducto + '</td></tr>');

					// });

					////imprimir ticket
					// window.print();

					////todo a la normalidad
					// $('#imprimirTicket').hide();
					// $('.container').show();
					// $('#modal-producto thead').show();
					// $('#modal-producto tbody').empty();

					// setTimeout(function(){
						// $('#txt_mesa').focus();
					// }, 400);
				// }else{
					// var time = 1000;

					// $('#tituloProcesaCobro').html('¡Tarea Exitosa!');
					// $('#mensajeProcesaCobro').html('Pedido Cancelado');

					// $('#dlgProcesaCobro').modal('toggle');
					// setTimeout(function(){

						// $('#tituloProcesaCobro').html('¡Muchas Gracias!');
						// $('#mensajeProcesaCobro').html('Pago Procesado');

						// $('#dlgProcesaCobro').modal('hide');
						// limpiar();
					// }, time);
				// }
			// },
			// error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
			// }
		// });
	// });


	

	// $('#txt_busqueda_producto').keyup(function(){

		// contador_s =0;
		// window.clearInterval(cronometro);
		// cronometro = window.setInterval(function(){
			// if(contador_s >= 8){

				// var keyword = clasificacion;
				// var search = $('#txt_busqueda_producto').val();

				// $.ajax({
					// dataType: 'json',
					// url:  '../api/api.php',
		      // data: {
		  			// "accion": "producto_pedido",//Todavia no está estandarizado
		  			// "tipo_accion": "modelo",
						// "keyword": keyword,
						// "search": search,
		  		// },
					// success: function(data) {
						// $('.muestraProducto div').empty();

						// $(data).each(function(i, v){
							// i++;
							// var ingrediente = ' data-count="' + v.ingrediente + '" ';

							// if(v.liga == 0){
								// img = "default.png";
							// }else{
								// img = v.id_img;
							// }
							// if(v.ingrediente < 0){
								// ingrediente = "";
							// }
							// $('#producto').append('<a href="#" data-id="' + v.id + '" data-free-product="' + v.gratuito + '" data-medium-price="'+ v.precioMedio +'" data-title="' + v.nombre +'" data-acumulate=' + v.acumulable + ' data-medium=" ' + v.venta + '" data-price="' + v.precio + '" ' + ingrediente + ' role="button" id="btnProducto" class="btn btn-sq-md btn-default"><img src="../../include/img/producto/' + img + '" class="img-circle"><br/>' + v.nombre + '</a>');
						// });
				   // },
				   // error: function(xhr, desc, err){
						// console.log(xhr);
						// console.log("Details: " + desc + "\nError:" + err);
				   // }
				// });

				// contador_s =0;
				// window.clearInterval(cronometro);
				// return false;
			// }
			// contador_s++;
		// }, 100);
	// });

	// $(document.body).on('click', '#btnCobroCuenta' ,function(){

		// var idPedido = $(this).data('id');
		// var totalPagar = $(this).data('sell');
		// var idCliente = $(this).data('cliente');

		// $('#dlgCobrar').data('sell', totalPagar);
		// $('#dlgCobrar').data('id', idPedido);
		// $('#dlgCobrar').data('cliente', idCliente);

	// });

	$(document.body).on('click', '#btnImprimirCuenta' ,function(){

		idPedido = $(this).data('id');
		nombreEmpresa = $('.nombreSistema').html();

		$.ajax({
			dataType: 'json',
			url:  '../api/api.php',
      data: {
  			"accion": "dato_ticket_venta",//Todavia no está estandarizado
  			"tipo_accion": "modelo",
				"keyword": idPedido,
  		},
			success:function(data){
				if(imprimir == 1){
					$('#dlgPrecio').modal('hide');

					$('.container').hide();

					$('#imprimirTicket').show();
					$('#modal-producto').show();

					if(data.imagenLogo == 1){
						logotipo = '<img src="../../include/img/empresa/' + data.noEmpresa + '" width="50%" />';
					}else{
						logotipo = '';
					}

					//$('#imprimirTicket .modal-body').html('<center>' + logotipo + '<h5><b>' + nombreEmpresa + '</b></h5><div class="comandaCh">' + data.domicilio + '</div><div class="comandaCh">' + data.colonia + '</div><div class="comandaCh">Tel. ' + data.telefono + '</div></center><br/><div class="comandaCh">Cliente: '+ data.cliente +'</div><div class="comandaCh">' + data.domicilioCliente + '</div><div class="comandaCh">Mesa: '+ data.mesa +'</div><div class="comandaCh">Pedido: ' + idPedido + ' ' + data.tipo + '</div><div class="comandaCh">Mesero: ' + data.usuario + '</div><div class="comandaCh">' + data.fecha + '</div>');
					$('#imprimirTicket .modal-body').html('<div class="col-xs-4">' + logotipo + '</div><div class="col-xs-8"><div class="comandaCh"><strong>YELATO</strong></div><div class="comandaCh">' + data.domicilio + ' Col. '+data.colonia+'</div></div><!--FIN DE CODIGO DE EMPRESA--><div class="col-xs-12"><div class="comandaCh">Cliente: '+ data.mesa +'</div><div class="comandaCh">Pedido: ' + idPedido + '</div><div class="comandaCh">Atendió: ' + data.usuario + '</div><div class="comandaCh">' + data.fecha + '</div></div>');

					//Consulta de productos
					$.ajax({
						dataType: 'json',
						url:  '../api/api.php',
			      data: {
			  			"accion": "dato_ticket_venta_producto",//Todavia no está estandarizado
			  			"tipo_accion": "modelo",
							"keyword": idPedido,
			  		},
						success:function(data){
							var total = 0.00;

							$(data).each(function(i, v){

								//Operaciones matematicas
								total = parseFloat(total) + parseFloat(v.precio);
								precioUnitario = parseFloat(v.precio / v.cantidad).toFixed(2);

								$('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="col-md-12 comandaGr">' + v.nombre + '</td></tr><tr><td class="col-md-2 comandaGr">' + v.cantidad + '</td><td class="col-md-5 comandaGr">$' + precioUnitario + '</td><td class="col-md-5 comandaGr">$' + v.precio +'</td></tr><tr><td colspan="3" class="col-md-12 comandaGr">----------------------------------</td></tr>');
							});

							//var propinaSugerida = (Math.round(parseFloat(total) / 10)) * 10;
							var propinaSugerida = parseFloat(total) * 0.10;
							var totalSugerido = parseFloat(total) + propinaSugerida;
							var totalSugerido = (Math.round(parseFloat(totalSugerido) / 10)) * 10;

							$('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="comandaSemi"><span class="pull-right">Total:'+
							' $ ' + parseFloat(total).toFixed(2) + ' <small>MX</small></span></td></tr>');
							//$('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="comandaSemi"><span class="pull-right">Propina Sug. 10%:'+
							//' $ ' + parseFloat(propinaSugerida).toFixed(2) + ' <small>MX</small></span></td></tr>');
							//$('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="comandaSemi"><span class="pull-right"><h4><small>Total Sugerido:</small><strong>'+
							//' $ ' + parseFloat(totalSugerido).toFixed(2) + ' <small>MX</small></strong></h4></span></td></tr>');
							//$('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="col-md-12 comandaCh"><br/>El total sugerido estima un <strong>10% de propinas aproximadamente.</strong></td></tr>');
							$('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="col-md-12 comandaCh"><br/><center>¡Gracias por su preferencia!</center></td></tr>');

							//imprimir ticket
							window.print();

							//todo a la normalidad
							$('#imprimirTicket').hide();

							//Limpiar Tabla
							$('#imprimirTicket #modal-producto > tbody').empty();

							$('.container').show();

						},
						error: function(xhr, desc, err){
							console.log(xhr);
							console.log("Details: " + desc + "\nError:" + err);
						}
					});

					setTimeout(function(){
						$('#txt_mesa').focus();
					}, 400);
				}else{
					var time = 1000;

					$('#tituloProcesaCobro').html('¡Función no disponible!');
					$('#mensajeProcesaCobro').html('Para visualizar ticket de venta, debe habilitar desde módulo de configuración.');

					$('#dlgProcesaCobro').modal('toggle');
					setTimeout(function(){

						$('#tituloProcesaCobro').html('¡Muchas Gracias!');
						$('#mensajeProcesaCobro').html('Pago Procesado');

						$('#dlgProcesaCobro').modal('hide');
						limpiar();
					}, time);
				}
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});

	});
	// jQuery.fn.reverse = [].reverse;
	// $(document.body).on('click', '#btnProducto' ,function(){
		// var aux = '';
		// var middle = '' ;
		// var repeticion = 0;
		// var precio = parseFloat($(this).data("price")).toFixed(2) * $('#txtCantidad').val();
		// var precioUnitario = parseFloat($(this).data("price"));
		// var precioMedio = parseFloat($(this).data("medium-price"));
		// var cantidad = parseFloat($('#txtCantidad').val());
		// var venta = $(this).data('medium');
		// var acumulado = $(this).data('acumulate');
		// var nombre = $(this).data('title');
		// var idAsociado = parseFloat($(this).data('id'));
		// var ingredienteLimite = $(this).data("count");
		// var ingredienteGratuito = $(this).data("free-product");
		// var totalIngrediente = 'data-value="-1" data-count="-1"';
		// var clasificacionProducto = $(this).data("clasificacion");
		// var btn_agregarProducto = '';
		// var idAgregarProducto = '';

		// if(clasificacionProducto == 3){
			// btn_agregarProducto = '<a href="#" id="btn_agregarProducto" class="confirm-delete btn mini red-stripe" role="button" data-title="' + nombre + '" data-id="' + counter + '"><span class="glyphicon glyphicon-plus"></span></a>';
			// idAgregarProducto = 'id="base_'+counter+'"';
		// }

		// if(ingredienteLimite >= 0){

			// totalIngrediente = 'data-value="0" data-count="' + ingredienteLimite + '"';

		// }else{

			// $('#carga_producto > tbody tr').reverse().each(function () {
				// if($(this).data('count') >= 0){

					// var ingredientePermitido = parseInt($(this).data('count'));
					// var valorActual = parseInt($(this).data('value'));

					// if(valorActual < ingredientePermitido){

						// $(this).data('value', (valorActual + 1));
						// precio = 0.00;
						// precioUnitario = 0.00;
					// }

					// return false;

				// }

			// });

		// }



		// if(acumulado == 1){

			// $('#carga_producto tr').each(function() {

				// var idProductoTemporal = $(this).children('td:first-child').data('title');

				// if(idProductoTemporal == idAsociado){

					// Calculo de nueva cantidad
					// var cantidadTemporal = parseFloat($(this).find('td:eq(1)').data('title'));
					// cantidad = cantidad + cantidadTemporal;

					// $(this).find('td:eq(1)').data('title', cantidad);
					// Calculo de nuevo precio
					// var precioTemporal = parseFloat($(this).find('td:eq(2)').html());
					// precio = parseFloat(precioUnitario * cantidad).toFixed(2);

					// $(this).find('td:eq(2)').html(precio);

					// repeticion = 1;
					// return;

				// }

			// });
		// }
		// if(venta == 1){
			// middle = '<a href="#" class="btn mini red-stripe btnMitad" role="button" data-title="' + nombre + '"  data-count="'+cantidad+'" data-price="'+precio+'" data-medium-price="'+precioMedio+'" data-id="' + counter + '" data-status = "0"><span class="glyphicon glyphicon-flash"></span></a>' ;
		// }
		// if(repeticion == 0){
			// $('#carga_producto > tbody tr:last').after('<tr data-id="' + counter + '" ' + totalIngrediente +' '+ idAgregarProducto +'><td data-id= '+counter+' data-title="' + $(this).data('id') + '">' + nombre + ' <br/><span class="operador' + counter + '" class="text-info small"></span></td><td data-title="'+cantidad+'"></td><td class="hidden-print" data-title="'+precioUnitario+'">' + precio + '</td><td id="' + counter + '" class="hidden"></td><td data-title="0" class="hidden-print"> <a href="#" id="btnComentarioExtra" class="btn mini red-stripe" role="button" data-title="' + nombre + '" data-id="' + counter + '"><span class="glyphicon glyphicon-comment"></span></a> <a href="#" id="btnEliminar" class="confirm-delete btn mini red-stripe" role="button" data-title="' + nombre + '" data-id="' + counter + '"><span class="glyphicon glyphicon-trash"></span></a> '+ btn_agregarProducto +' '+ middle +'</td></tr>');
		// }
		// calcularTotal();
		// $('#txtCantidad').val(1);
		// counter++;
		// if($('#txt_anotacion').val() != ""){
			// $('#carga_producto > tbody tr:last').after('<tr class="hide anotacion' + counter + '" data-id="' + counter + '"><td colspan="3" class="modificaAnotacion' + counter + '" data-id="' + counter + '">' + $('#txt_anotacion').val() + '</td><td class="hidden-print"><a href="#" id="btnEliminar" class="confirm-delete btn mini red-stripe" role="button" data-title="Anotación" data-id="' + counter + '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>');
			// $('#txt_anotacion').val('');
			// counter++;
		// }else{
			// $('#carga_producto > tbody tr:last').after('<tr class="hide anotacion' + counter + '" data-id="' + counter + '"><td colspan="3" class="modificaAnotacion' + counter + '" data-id="' + counter + '"></td><td class="hidden-print"><a href="#" id="btnEliminar" class="confirm-delete btn mini red-stripe" role="button" data-title="Anotación" data-id="' + counter + '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>');
			// counter++;
		// }
		// var keyword = $(this).data('id');

		// $.ajax({
			// dataType: 'json',
			// url:  '../api/api.php',
			// data: {
				// "accion": "ingrediente_pedido",//Todavia no está estandarizado
				// "tipo_accion": "modelo",
				// "keyword": keyword,
			// },
			// success: function(data) {
				// $('#ingrediente').empty();
				// $(data).each(function(i, v){
					// i++;
					// $('#ingrediente').append('<label class="checkbox-inline"><input type="checkbox" data-title="- Sin ' + v.nombre + '" data-id="'+v.id+'"> ' + v.nombre + '</label>');
				// })
		   // },
		   // error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
		   // }
		// });
	// });

	// $('#carga_producto').on('click','#btn_agregarProducto', function() {
		// cantidadAgregarProducto++;
		// var recount = $(this).data('id');
		// var cuentaIngrediente = recount + 2;
		// var c = 0;
		// counter = counter - 2;
		// var productoMovimiento = Array();
		// $('#carga_producto tbody tr').each(function(){
			// productoMovimiento[c] = Array();

			// productoMovimiento[c][0] = $(this).find('td:eq(0)').text();
			// productoMovimiento[c][1] = $(this).find('td:eq(0)').data('id');
			// productoMovimiento[c][2] = $(this).find('td:eq(0)').data('title');
			// productoMovimiento[c][3] = $(this).find('td:eq(1)').data('title');
			// productoMovimiento[c][4] = $(this).find('td:eq(2)').data('title');
			// productoMovimiento[c][5] = $(this).find('td:eq(2)').text();

			// c++;
		// });
		// var posicion = productoMovimiento.length - (1 + cantidadAgregarProducto);
		// for(var i = 0;i < productoMovimiento.length; i++){
			// alert(productoMovimiento.length+' '+i+' '+
				// productoMovimiento[i][0]+' '+
				// productoMovimiento[i][1]+' '+
				// productoMovimiento[i][2]+' '+
				// productoMovimiento[i][3]+' '+
				// productoMovimiento[i][4]+' '+
				// productoMovimiento[i][5]
			// );
		// }
		// $('[data-id="'+counter+'"]').parents('tr').remove();
		// $('#carga_producto > tbody #base_'+recount+'').after('<tr data-id="' + cuentaIngrediente + '"><td data-id= '+cuentaIngrediente+' data-title="' + productoMovimiento[posicion][2] + '">' + productoMovimiento[posicion][0] + ' <br/><span class="operador' + cuentaIngrediente + '" class="text-info small"></span></td><td data-title="'+productoMovimiento[posicion][3]+'"></td><td class="hidden-print" data-title="'+productoMovimiento[posicion][4]+'">' + productoMovimiento[posicion][5] + '</td><td id="' + cuentaIngrediente + '" class="hidden"></td><td data-title="0" class="hidden-print"> <a href="#" id="btnComentarioExtra" class="btn mini red-stripe" role="button" data-title="' + productoMovimiento[posicion][0] + '" data-id="' + cuentaIngrediente + '"><span class="glyphicon glyphicon-comment"></span></a> <a href="#" id="btnEliminar" class="confirm-delete btn mini red-stripe" role="button" data-title="' + productoMovimiento[posicion][0] + '" data-id="' + cuentaIngrediente + '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>');
		// $('#carga_producto tbody tr').each(function(){
			// cuentaIngrediente = recount + 2;
			// $(this).find('td:eq(0)').data('id',cuentaIngrediente);
			// $('btnEliminar').data('id',cuentaIngrediente);
			// $('btnComentarioExtra').data('id',cuentaIngrediente);
		// });
	// });

	// $('#btnAceptarUsuario').click(function() {
		// Puede existir un error en counter
		// var idUsuario = $('#txt_usuario_servicio').val();
		// var nombreUsuario = $('#txt_usuario_servicio option:selected').text();
		// var contador = $('#btnAceptarUsuario').data('counter');

		// $('.operador'+ contador).html(nombreUsuario);
		// $('#'+ contador).html(idUsuario);

	// });

	// $('#btnYes').click(function() {
		// var id = $('#eliminar_producto').data('id');
		// $('[data-id="'+id+'"]').parents('tr').remove();
		// $('#eliminar_producto').modal('hide');
		// calcularTotal();
		// setTimeout(function(){
			// $('#txt_mesa').focus();
		// }, 400);
	// });

	// $('#btnAceptarComentario').click(function() {
		// var id = (parseInt($('#dlgComentarioExtra').data('id')) + 1);
		// var texto = $('#txtComentarioExtra').val();

		// $('.anotacion' + id).removeClass('hide');
		// $('.modificaAnotacion' + id).html(texto);

		// $('#dlgComentarioExtra').modal('hide');

		// setTimeout(function(){
			// $('#txt_mesa').focus();
			// $('#txtComentarioExtra').val('');
		// }, 500);
	// });

	// $('#carga_pedidoProducto').on('click', '#btneliminar_producto',function() {
		// $('#cancelarProducto').modal('show');
		// $('#dlgVistaPedido').modal('hide');
		// var id = $(this).data('id');
		// var mesa = $(this).data('mesa');
		// var nombre = $(this).data('title');
		// var value = $(this).data('value');
		// var folio = $(this).data('folio');
		// $('#cancelarProducto .modal-body p').html('¿Estas seguro que deseas eliminar <b>'+ nombre +'</b>?');
		// $('#btnCancelaProducto').data('id', id);
		// $('#btnCancelaProducto').data('mesa', mesa);
		// $('#btnCancelaProducto').data('value', value);
		// $('#btnCancelaProducto').data('folio', folio);
	// });

	// $('#carga_producto').on('click', '#obrero' ,function(){
		// idProducto = $(this).data('id');
		// nombre = $(this).data('title');
		// contador = $(this).data('counter');

		// $('.productoRealizado').html(nombre);
		// $('#dlgUsuario').modal('show');

		// $('#btnAceptarUsuario').data('counter',contador);

		// setTimeout(function(){
			// $('#txt_usuario_servicio').focus();
		// }, 500);

	// });

	// $('#carga_producto').on('click', '.btnMitad',function() {
		// var aux = '';
		// var cantidadAux = '';
		// var middle = '' ;
		// var cantidad = 0;
		// var precio = 0;
		// var precioTemporal = 0;
		// var referencia = $(this);
		// var important = $(this).data('tittle');
		// var contador = $(this).data('id');
		// var precioMedio = $(this).data('medium-price');
		// var precioNormal = $(this).data('price');
		// var cantidad = $(this).data('count');

		// if($(this).data("status") == 0){
			// $(this).data("status",1);
		// }else{
			// $(this).data("status",0);
		// }

		// $('#carga_producto tbody tr').each(function() {
			// var contadorProducto = $(this).children('td:first-child').data('id');
			// if(referencia.data('status') == 1){
				// precio = parseFloat(precioNormal) * parseInt(cantidad);
				// precioTemporal = precioNormal;
			// }else{
				// precio = parseFloat(precioMedio) * parseInt(cantidad);
				// precioTemporal = precioMedio;
			// }

			// if(contadorProducto == contador){

				// $(this).find('td:eq(2)').html(parseFloat(precio).toFixed(2));
				// $(this).find('td:eq(2)').data('title',parseFloat(precioTemporal).toFixed(2));
				// return;

			// }

		// });

		// calcularTotal();
		// var keyword = $('#btnProducto').data('id');

		// $.ajax({
			// dataType: 'json',
			// url:  '../api/api.php',
			// data: {
				// "accion": "ingrediente_pedido",//Todavia no está estandarizado
				// "tipo_accion": "modelo",
				// "keyword": keyword,
			// },
			// success: function(data) {
				// $('#ingrediente').empty();
				// $(data).each(function(i, v){
					// i++;
					// $('#ingrediente').append('<label class="checkbox-inline"><input type="checkbox" data-title="- Sin ' + v.nombre + '" data-id="'+v.id+'"> ' + v.nombre + '</label>');
				// })
		   // },
		   // error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
		   // }
		// });
	// });

	// $('#btnCancelaProducto').click(function(){

		// var datoEnviar = $(this).data('id');
		// var mesa = $(this).data('mesa');
		// var folio = $(this).data('folio');
		// $.ajax({
			// url: "cancelaProductoPedido.php",
			// data: "pedido=" + datoEnviar,
			// success:function(data){
				// if(imprimir == 1){
				// $('#cancelarProducto').modal('hide');

				// $('.container').hide();
				// $('#modal-producto').hide();

				// $('#imprimirTicket').show();
				// $('#imprimirTicket .modal-body').html('<div><h4>Cambios en Pedido</h4></div><div>Mesa:' + mesa + '</div><div>Pedido:' + folio + '</div>' + data);

				//imprimir ticket
				// window.print();

				//todo a la normalidad
				// $('#imprimirTicket').hide();
				// $('.container').show();
				// }else{
					// var time = 1000;

					// $('#tituloProcesaCobro').html('¡Tarea Exitosa!');
					// $('#mensajeProcesaCobro').html('Pedido Modificado');

					// $('#dlgProcesaCobro').modal('toggle');
					// setTimeout(function(){

						// $('#tituloProcesaCobro').html('¡Muchas Gracias!');
						// $('#mensajeProcesaCobro').html('Pago Procesado');

						// $('#dlgProcesaCobro').modal('hide');
						// limpiar();
					// }, time);
				// }
			// },
			// error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
			// }
		// });
	// });

	// $('#carga_pedido').on('click', '#btn_vista_pedido',function() {

		// $('#btn_cerrar').click();

		// $('#numero_pedido').html($(this).data('id'));
		// $('#btnModificarPedido').data('id',$(this).data('id'));
		// $('#btnModificarPedido').data('mesa',$(this).data('mesa'));
		// $('#txt_numero_mesa').val($(this).data('mesa'));

		// var mesa = $(this).data('mesa');
		// var datoEnviar = $(this).data('id');
		// $.ajax({
			// url: "../../include/php/datoComandaProducto.php",
			// dataType: 'json',
			// url:  '../api/api.php',
			// data: {
				// "accion": "dato_comanda_producto",//Todavia no está estandarizado
				// "tipo_accion": "modelo",
				// "keyword": datoEnviar,
			// },
			// success:function(data){
				//Eliminar datos anteriormente insertados
				// $('#carga_pedidoProducto > tbody tr').remove();
				//Agregar campo tr base para realizar nueva inserción de datos
				// $('#carga_pedidoProducto > tbody').append('<tr></tr>');

				//Agregar nuevos datos consultados
				// $(data).each(function(i, v){
					// i++;
					// $('#carga_pedidoProducto > tbody tr:last').after('<tr><td>' + v.nombre + '(' +v.cantidad + ')</td><td><a href="#" id="btneliminar_producto" class="confirm-delete btn mini red-stripe" data-toggle="modal" data-target="#cancelaProducto" role="button" data-title="' + v.nombre + '" data-folio="' + datoEnviar + '" data-value="' + datoEnviar + '" data-id="' + v.id + '" data-mesa="' + mesa + '"><span class="glyphicon glyphicon-trash"></span> Cancelar</a></td></tr>');
				// });

			// },
			// error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
			// }
		// });

	// });

	// $('#dlgCobrar').keyup(function(e){
		// if(e.keyCode ==13){
			// $('#btn_aceptar_cobrar').click();
		// }
		// if(e.keyCode ==37){
			// if($('.rdoCredito').is(':checked')){
				// $('.rdoCredito').prop( "checked", false );
				// $('.rdoContado').prop( "checked", true );
			// }
		// }
		// if(e.keyCode == 39){
			// if($('.rdoCredito').is(':enabled') && $('.rdoContado').is(':checked')){
				// $('.rdoContado').prop( "checked", false );
				// $('.rdoCredito').prop( "checked", true );

			// }
		// }
	// });

	// $('#dlgCobrar').on('show', function() {

		// $.ajax({
			// dataType: 'json',
			// url:  '../api/api.php',
			// data: {
				// "accion": "consultar_tipo_pago",//Todavia no está estandarizado
				// "tipo_accion": "modelo",
			// },
			// success: function(data) {
				// $(".tipo_pago").html('');
				// $('#txtDescuentoCuenta').val('');
				// $(data).each(function(i, v){
					// $(".tipo_pago").append('<label for="txtPago[]" class="form-control-label">'+v.nombre+':</label><input type="number" class="form-control" data-id="' + v.id + '" id="txtPago[]" />');
				// });
			// },
		   // error: function(xhr, desc, err){
				// console.log(xhr);
				// console.log("Details: " + desc + "\nError:" + err);
		   // }
		// });

		//Si cliente es público en general, deshabilitar venta a crédito
		// if(parseInt($("#dlgCobrar").data('cliente')) <= 1){
			// $('.rdoCredito').attr("disabled", true);
		// }else if(parseInt($("#dlgCobrar").data('cliente')) > 1){
			// $(".rdoCredito").removeAttr("disabled");
		// }

		// $('#dlgPrecio').modal('hide');

		// var totalPagar = $(this).data('sell');
		// var idCuenta = $(this).data('id');
		// var idCliente = $(this).data('cliente');

		// $('#txt_pago_total').val(totalPagar);
		// $('.folioCuenta').html(idCuenta);
		// $('#dlgCobrar').data('cliente',idCliente);

		// resta = totalPagar;
		// $('#txtPagoResta').val(resta);

		// setTimeout(function(){
			// $("#dlgCobrar input").first().focus();
		// }, 700);


	// });

	// $('#eliminar_producto').on('show', function() {
		// var data = $(this).data('data').split('%%');
		// $(this).data('id',data[0]);
		// $('#eliminar_producto .modal-body p').html("Desea eliminar " + '<b>' + data[1] +'</b>' + ' ?');
		// var id = data[0],
		// removeBtn = $(this).find('.danger');
	// });

	// $('#dlgComentarioExtra').on('show', function() {
		// var data = $(this).data('data').split('%%');
		// $(this).data('id',data[0]);
		// $('.productoComentarioExtra').html('<b>' + data[1] +'</b>');
		// var id = data[0],
		// removeBtn = $(this).find('.danger');
		// setTimeout(function(){
			// $('#txtComentarioExtra').focus();
		// },500);
	// });

	// $('#eliminar_producto').keyup(function(e){
		// if(e.keyCode ==13){
			// $("#btnYes").click();
		// }
	// });

	// $('#dlgCobrar').keyup(function(e){
		// var total = $('#txt_pago_total').val();
		// var descuento = parseFloat($('#txtDescuentoCuenta').val());

		// if(isNaN(descuento)){
			// descuento = 0;
		// }

		// total = parseFloat(total) - parseFloat(descuento);

		// var totalPago = 0;
		// var diferentePago = 0;

		// $('input[id="txtPago[]"]').each(function() {
			// if($(this).val() != '')
				// diferentePago = parseFloat($(this).val());
			// else
				// diferentePago = 0;
			// totalPago =  totalPago + diferentePago;
		// });

		// resta = parseFloat(total - totalPago).toFixed(2);
		// $('#txtPagoResta').val(resta);

		// if(resta < 0){
			// $('#lblOD').html('Cambio');
			// $('#txtPagoResta').val(resta.substr(1));
		// }else{
			// $('#lblOD').html('Resta');
		// }

	// });

	// $('#txt_mesa').focus();

	// $('#txt_tipo_pedido').change(function(){
		// if($('#txt_tipo_pedido').val() == "2-Domicilio"){
			// $('.datoDomicilio').show();
		// }else{
			// $('.datoDomicilio').hide();
		// }
		// $('#search-box').focus();
	// });

	var util = { };
	document.addEventListener('keydown', function(e){
		var key = util.key[e.which];

		if( key ){
			e.preventDefault();
		}

		// if( key === 'end'){
			// $('#btnSalir').click();
		// }

		// if( key === 'F1' ){
			// $('#btn_enviar').click();
		// }

		// if( key === 'F2' ){
			// $('#btn_precio').click();
		// }

		// if( key === 'F3' ){
			// $('#btn_cliente').click();
		// }

		// if( key === 'F5' ){
			// limpiar();
		// }

		// if( key === 'F12' ){
			// $('#btn_agregar').click();
		// }

		// if( key === 'up' ){
			// var i =  $('#carga_producto tbody tr').index($("#carga_producto tbody tr.active")) ;
			// $("#carga_producto tbody tr.active").removeClass('active');
			// i--;
			// $('#carga_producto tbody tr:eq('+i+')').addClass('active');
		// }

		// if( key === 'down' ){
			// var i =  $('#carga_producto tbody tr').index($("#carga_producto tbody tr.active")) ;
			// $("#carga_producto tbody tr.active").removeClass('active');
			// i++;
			// $('#carga_producto tbody tr:eq('+i+')').addClass('active');
		// }

		// if( key === 'del' ){
			// value = $("#carga_producto tbody tr.active").data('value');
			// if(value >= 0){
				// $("#carga_producto tbody tr.active").remove();
				// calcularTotal();
			// }
		// }

	})
	util.key = {

	  13: "enter",
	  16: "shift",
	  18: "alt",
	  27: "esc",
	  33: "rePag",
	  34: "avPag",
	  35: "end",
	  36: "home",
	  38: "up",
	  40: "down",
	  46: "del",
	  112: "F1",
	  113: "F2",
	  114: "F3",
	  115: "F4",
	  116: "F5",
	  117: "F6",
	  118: "F7",
	  119: "F8",
	  120: "F9",
	  121: "F10",
	  122: "F11",
	  123: "F12"

	}


});

// function enviarDato() {
	//Obtener datos de tabla y almacenarlos en data
	// var data = [];
	// $('input[id="txtPago[]"]').each(function(i, v) {
		// data.push([parseFloat($(this).val()), $(this).data('id')]);
	// });

	// var resta = 0;

	// if($('#lblOD').html() == 'Cambio'){
		// resta = $('#txtPagoResta').val();
	// }else{
		// resta = 0;
	// }

	// var descuento = parseFloat($('#txtDescuentoCuenta').val());

	// if(isNaN(descuento)){
		// descuento = 0;
	// }

	// var totalPagar = parseFloat($("#txt_pago_total").val()) - parseFloat(descuento);

	// var contenidoVariable = {
		// data: data,
		// folioCuenta:$(".folioCuenta").html(),
		// idCliente:$("#dlgCobrar").data('cliente'),
		// resta:resta,
		// total:totalPagar,
		// propina:$("#txtPropina").val(),
		// tipoPago:$('input[name=rdoPago]:checked').val()
	// }

	// $.ajax({
		// url: 'cobro.php',
		// type: 'post',
		// data: contenidoVariable,
		// success: function (data) {
			// /*$('#dlgProcesaCobro').modal('toggle');
			// setTimeout(function(){
				// $('#dlgProcesaCobro').modal('hide');
				// $('#tituloProcesaCobro').html('¡Muchas Gracias!');
				// $('#mensajeProcesaCobro').html('Pago Procesado');
				// $('.txtPagoEfectivo').val('');
				// $('#txt_mesa').focus();
			// }, 3000);
			// */
			//Ahora se imprimirá el ticket
			// idPedido = $('#dlgCobrar').data('id');
			// $.ajax({
							// url: "../../include/php/datoTicketVenta.php",
							// dataType: 'json',
							// data: "keyword=" + idPedido,
							// success:function(data){
								// if(imprimir == 1){
									// $('#dlgPrecio').modal('hide');
									// setTimeout(function(){
										// $('.container').hide();

										// $('#imprimirTicket').show();
										// $('#modal-producto').show();

										// if(data.imagenLogo == 1){
											// logotipo = '<img src="../../include/img/empresa/' + data.noEmpresa + '" />';
										// }else{
											// logotipo = '';
										// }

										//$('#imprimirTicket .modal-body').html('<div class="col-xs-3">' + logotipo + '</div><div class="col-xs-9"><h5><b>' + nombreEmpresa + '</b></h5><div class="comandaCh">' + data.domicilio + '</div><div class="comandaCh">' + data.colonia + '</div><div class="comandaCh">Tel. ' + data.telefono + '</div></div><!--FIN DE CODIGO DE EMPRESA--><br/><div class="comandaCh">Cliente: '+ data.cliente +'</div><div class="comandaCh">' + data.domicilioCliente + '</div><div class="comandaCh">Mesa: '+ data.mesa +'</div><div class="comandaCh">Pedido: ' + idPedido + ' ' + data.tipo + '</div><div class="comandaCh">Mesero: ' + data.usuario + '</div><div class="comandaCh">' + data.fecha + '</div>');
										// $('#imprimirTicket .modal-body').html('<div class="col-xs-4">' + logotipo + '</div><div class="col-xs-8><div class="comandaCh"><strong>YELATO</strong></div><div class="comandaCh">' + data.domicilio + ' Col. '+data.colonia+'</div></div><!--FIN DE CODIGO DE EMPRESA--><br/><div class="comandaCh">Cliente: <span class="h3">'+ data.mesa +'</span></div>');

										//Consulta de productos
										// $.ajax({
											// url: "../../include/php/datoTicketVentaProducto.php",
											// dataType: 'json',
											// data: "keyword=" + idPedido,
											// success:function(data){
												// var total = 0.00;
												// var descuento = $('#txtDescuentoCuenta').val();

												// $(data).each(function(i, v){

													// var ordenDiferente = '';
													// var nombreProducto = '<strong>' + v.nombre + '</strong>';
													//Operaciones matematicas
													// total = parseFloat(total) + parseFloat(v.precio);
													// precioUnitario = parseFloat(v.precio / v.cantidad).toFixed(2);

													// if(v.tipoProducto == 0){
														// nombreProducto = ' -' + v.nombre;
													// }else{
														// ordenDiferente = '<td colspan="3" class="col-md-12 comandaGr">----------------------------------</td>';
													// }

													// $('#imprimirTicket #modal-producto > tbody').append('<tr>' + ordenDiferente + '</tr><tr><td class="col-md-9 comandaPrincipal">' + nombreProducto + '</td><td class="col-md-3 comandaPrincipal">$' + v.precio +'</td></tr>');

												// });

												// total = parseFloat(total) - parseFloat(descuento);

												// var propinaSugerida = (Math.round(parseFloat(total) / 10)) * 10;
												// var propinaSugerida = parseFloat(total) * 0.10;
												// var totalSugerido = parseFloat(total) + propinaSugerida;
												// var totalSugerido = (Math.round(parseFloat(totalSugerido) / 10)) * 10;

												// $('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="comandaSemi"><br/><span class="pull-right">Total:'+
												// '<span class="comandaPrincipal"><strong> $ ' + parseFloat(total).toFixed(2) + ' <small>MXN</small></strong></span></span></td></tr>');
												// $('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="comandaSemi"><span class="pull-right">Cambio:'+
												// '<span class="comandaPrincipal"> $ ' + parseFloat($('#txtPagoResta').val()).toFixed(2) + ' <small>MXN</small></span></span></td></tr>');
												// $('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="comandaSemi"><span class="pull-right">Propina Sug. 10%:'+
												// ' $ ' + parseFloat(propinaSugerida).toFixed(2) + ' <small>MX</small></span></td></tr>');
												// $('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="comandaSemi"><span class="pull-right"><h4><small>Total Sugerido:</small><strong>'+
												// ' $ ' + parseFloat(totalSugerido).toFixed(2) + ' <small>MX</small></strong></h4></span></td></tr>');
												// $('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="col-md-12 comandaCh"><br/>El total sugerido estima un <strong>10% de propinas aproximadamente.</strong></td></tr>');
												// $('#imprimirTicket #modal-producto > tbody').append('<tr><td colspan="3" class="col-md-12 comandaCh"><br/><center>¡Gracias por su preferencia!</center></td></tr>');
												// $('#imprimirTicket #modal-producto > tbody').append('<tr><div class="comandaCh">Atendió: ' + data.usuario + '</div><div class="comandaCh">' + data.fecha + '</div></tr>');

												//imprimir ticket
												// window.print();

												//todo a la normalidad
												// $('#imprimirTicket').hide();

												//Limpiar Tabla
												// $('#imprimirTicket #modal-producto > tbody').empty();

												// $('.container').show('slow');

												// setTimeout(function(){
													// $('#txt_mesa').focus();
													// limpiar();
													// repeticion = 0;
												// }, 400);

											// },
											// error: function(xhr, desc, err){
												// console.log(xhr);
												// console.log("Details: " + desc + "\nError:" + err);
											// }
										// });

									// },400);
								// }else{
									// var time = 1000;

									// $('#tituloProcesaCobro').html('¡Función no disponible!');
									// $('#mensajeProcesaCobro').html('Para visualizar ticket de venta, debe habilitar desde módulo de configuración.');

									// $('#dlgProcesaCobro').modal('toggle');
									// setTimeout(function(){

										// $('#tituloProcesaCobro').html('¡Muchas Gracias!');
										// $('#mensajeProcesaCobro').html('Pago Procesado');

										// $('#dlgProcesaCobro').modal('hide');
										// limpiar();
										// repeticion = 0;
									// }, time);
								// }
							// },
							// error: function(xhr, desc, err){
								// console.log(xhr);
								// console.log("Details: " + desc + "\nError:" + err);
							// }
						// });
		// },
		// error: function(xhr, desc, err){
			// console.log(xhr);
			// console.log("Details: " + desc + "\nError:" + err);
	    // }
	// });

// }

function limpiar(){
	
	$('#carga_mesa').data('id_mesa_dinamica','');
	$('#carga_mesa').data('id_mesa_dinamica_por_validar','');
	
	$('#remover_comensal').hide('slow');
	
	$('.mensaje_dlg_nueva_mesa').html('');
	
}
// function limpiar(){
	// $('.lblIdModificaPedidoTexto').html('');
	// $('.lblIdModificaPedido').html('');
	// $('#txt_mesa').prop('readonly', false);
	// $('.txtPagoEfectivo').val('');
	// $('.lblIdCliente').html('0001');
	// $('.lblTipoServicio').html('Local');
	// $('.lblIdTipoServicio').html('0');
	// $('.lblNombre').html('Público en general');
	// $('#txt_direccion').val('');
	// $('#txtDescuentoCuenta').val('');
	// $('#txt_colonia').val('');
	// $('#txt_mesa').val('');
	// $('#txt_telefono1').val('');
	// $('#txt_telefono2').val('');
	// $('#txtReferencia').val('');
	// $('#txt_tipo_pedido option:eq(0)').prop('selected', true);
	// $('#search-box').val('');
	// $('#txtCantidad').val(1);
	// $('.cantidadTotal').html('0.00');
	// $('tbody tr').remove();
	// $('#carga_producto > tbody').append('<tr></tr>');
	// $(".rdoContado").prop("checked", true);
	// counter = 0;
	// resta = 0;
	// $('#txt_mesa').focus();
// }

// function calcularTotal(){
	// var data = Array();
	// $("#carga_producto tr").each(function(i, v){
		// data[i] = Array();
		// $(this).children('td').each(function(ii, vv){
			// data[i][ii] = $(this).text();
		// });
	// });
	// var total = 0;
	// var comparativo = (data.length - 1);
	//var descuento = $('#txtDescuento').val();
	// for(var i = 2; i <= comparativo; i++){
		// if($.isNumeric(data[i][2])){
			// total = total + parseFloat(data[i][2]);
			//total = (parseFloat(total) * (parseFloat(descuento) / 100)) + parseFloat(total);
		// }
		// $('.cantidadTotal').html(parseFloat(total).toFixed(2));
	// }
	// if(comparativo == 1){
		// $('.cantidadTotal').html("0.00");
	// }
	// $('#search-box5').focus();
// }

function cargar_mesas_disponibles_y_crear_mesa_dinamica(){
	$.ajax({
		url: "../api/api.php",
		data: {
			"accion": "consultar_mesas_activas_y_crear_mesa_dinamica",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			
			var j = 0;
			
			$('#carga_mesa tbody').empty();
			$('#carga_mesa_dinamica tbody').empty();
			
			$(".panel_clientes_con_pedido .panel-body .btn_comensal").remove();
			
			$(data.respuesta_servidor).each(function(i, v){
				
				$('#carga_mesa tbody').append('<tr data-position="' + j + '"><td class="col-md-6">'+ v.nombre + '</td><td class="col-md-4">'+ v.capacidad+' Personas</td><td class="col-md-2"><button type="button" class="btn btn-success agrega_mesa" data-name="' + v.nombre + '" data-capacidad="'+ v.capacidad+'" data-position="' + i + '" data-id="'+v.id_mesa+'" value="'+v.id_mesa+'"><i class="fa fa-check-square" aria-hidden="true"></i> Agregar</button></td></tr>');				
				
				j++;
				
			});
			
			$('#carga_mesa').data('id_mesa_dinamica_por_validar',data.id_mesa_dinamica);
			
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Detalles: " + desc + "\nError:" + err);
		}
	});
}

function agregar_producto_a_pedido(id_producto, id_comensal){
	
	/*
	*
	* Módulo para agregar producto a comanda
	*
	* Antes de enviar producto a comanda se comprueba la existencia de un comensal
	* Si no existe, abrirá modal para su creación
	*
	*/
	
	var j = 0;
	
	//Lectura de número de comensales abiertos
	$(".panel_clientes_con_pedido .panel-body .btn_comensal").each(function(i, v){
		j++;
	});
	
	if(j > 0){
		alert(id_comensal);
		$.ajax({
			dataType: 'json',
			url:  '../api/api.php',
			data: {
				"accion": "agregar_producto_a_pedido",
				"tipo_accion": "modelo",
				"id_producto": id_producto,
				"id_comensal": id_comensal,
			},
			success: function(data){
				
				$('.configuracion_pedido').show('slow');
				
				//Dependiendo de la estructura del producto, se mostrará la configuración del producto
				if(data.caracteristicas.tipo === 'Ingrediente' || data.caracteristicas.tipo === 'Final'){
					
					$('.no_aplica_configuracion_pedido').hide('slow');
					
				}else{
					
					$('.no_aplica_configuracion_pedido').show('slow');
					
				}
				
				//Se asigna el pedido actual a la configuración
				$('.configuracion_pedido').data('id_producto_comensal_pedido',data.id_producto_comensal_pedido);
				
				//Se limpia la fracción del producto
				//$('#slt_tipo').empty();
				
				//Se recorre el arreglo de fracciones recibidos y se muestran en el select
				// $(data.fraccion).each(function(i, v){
					// $('#slt_tipo').append('<option value="' + v.id_fraccion_producto + '">' + v.fraccion + '</option>');
				// });
				
				$('.producto_abierto_actualmente').html(data.caracteristicas.nombre);
				
				//Se limpia la fracción del producto
				$('#ingrediente').empty();
				
				//Se recorre el arreglo de fracciones recibidos y se muestran en el select
				$(data.ingrediente).each(function(i, v){
					$('#ingrediente').append(''+
						'<tr>' +
						'	<td class="col-md-4">' +
						'		<div class="make-switch">' +
						'			<input type="checkbox" class="validacion_ingrediente txt_validacion_ingrediente" data-id_ingrediente = "' + v.id_ingrediente + '" data-cantidad_ingrediente = "' + v.cantidad + '" data-on-text="Con" data-off-text="Sin" checked />' +
						'		</div>' +
						'	</td>' +
						'	<td class="col-md-8">' + v.nombre + ' (' + v.cantidad + ')</td>' +
						'</tr>' +
					'');
				});
				
				$('.validacion_ingrediente').bootstrapSwitch({
					size: 'small',
				});
				
				alert(data.id_producto_comensal_pedido);
				
				$('.pedido_comanda tbody').append(''+
					'<tr>' +
					'	<td class="text-left">Hamburguesa Americana (1)</td>' +
					'	<td class="text-right">$180.00</td>' +
					'	<td>' +
					'		<button class="btn btn-info btn-sm"><i class="fa fa-comment"></i></button>' +
					'		<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' +
					'	</td>' +
					'</tr>' +
				);
					
				
				
		   },
		   error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
		   }
		});
		
	}else{
		
		//Sección para iniciar la carga de un comensal
		$('#agregar_comensal').click();
		
	}
}