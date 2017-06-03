$(document).ready(function(){
	
	$('.solo_actualizar').hide();
	$('#div_ingrediente').hide();
	$('#div_fraccion').hide();

	//autocomplete("1","");
	cronometro = null;
	Dropzone.autoDiscover = false;
	imagen_producto = "";
	tipo_producto = 4;

	$('.producto_tipo_fraccion').bootstrapSwitch();
	
	$(function(){
		$.ajax({
			url: '../api/api.php',
			data: {
				"tipo_accion": "modelo",
				"accion": "clasificacion_pedido"
			},
			dataType: 'json',
			success: function(data){
				$(data.respuesta_servidor).each(function(i,v){
					$("#slt_categoria").append('<option value="' + v.id_clasificacion + '">' + v.nombre + '</option>');
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
		
		/*$.ajax({
			url: '../api/api.php',
			data: {
				"accion": "fracciones_disponibles",
				"tipo_accion": "modelo"
			},
			type: 'post',
			dataType: 'json',
			success: function(data){
				$(data).each(function(i,v){

					$("#slt_fraccion").append('<option value="' + v.id_fraccion_producto + '">' + v.fraccion + '</option>');

				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});*/

		$.ajax({
			url: '../api/api.php',
			data: {
				"accion": "unidades_disponibles",
				"tipo_accion": "modelo"
			},
			type: 'post',
			dataType: 'json',
			success: function(data){
				$(data).each(function(i,v){

					$("#slt_unidad_original").append('<option value="' + v.id_unidad_medida + '">' + v.unidad + '</option>');
					$("#slt_unidad_conversion").append('<option value="' + v.id_unidad_medida + '">' + v.unidad + '</option>');

				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});

		/*$.ajax({
			url: '../api/api.php',
			data: {
				"accion": "clasificaciones_disponibles",
				"tipo_accion": "modelo"
			},
			type: 'post',
			dataType: 'json',
			success: function(data){
				$(data).each(function(i,v){

					$("#slt_categoria").append('<option value="' + v.id_clasificacion + '">' + v.nombre + '</option>');

				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});*/

		$('#imagen_producto').dropzone({
			url: "../api/api.php?accion=almacenar_imagen_clasificacion&tipo_accion=modelo",
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

					setTimeout(function(){
						$('#modal_respuesa_servidor_error').modal('hide');
					}, 2000);
					
				});
			},
			success:function(file,response){
				// alert(file + ' : ' + response);
				//var response_text = JSON.parse(response);
				imagen_producto = response;
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});

	});

	$('#slt_tipo').change(function(){

		if($('#slt_tipo').val() == 1){
			$('#div_ingrediente').hide('slow');
			$('#div_fraccion').hide('slow');
			nombre = 'Nuevo Producto Final';
		}

		if($('#slt_tipo').val() == 2){
			$('#div_ingrediente').show('slow');
			$('#div_fraccion').show('slow');
			nombre = 'Nuevo Producto Elaborado';
		}

		if($('#slt_tipo').val() == 3){
			$('#div_ingrediente').hide('slow');
			$('#div_fraccion').hide('slow');
			nombre = 'Nuevo Ingrediente';
		}

		if($('#slt_tipo').val() == 4){
			$('#div_ingrediente').show('slow');
			$('#div_fraccion').hide('slow');
			nombre = 'Nuevo Ingrediente';
		}

		$('.lbl_nombre').html(nombre);

	});

	/*$('#btn_enviar_fraccion').click(function(){

		var id_fraccion = $('#slt_fraccion').val();
		var nombre_fraccion = $('#slt_fraccion option:selected').text();
		var precio_venta_fraccion = $('#txt_precio_venta_fraccion').val();

		if(id_fraccion !== 'NULL' && precio_venta_fraccion > 0){

			//Agregar valor en tabla
			$('#tbl_fraccion tbody').append('<tr data-id_fraccion="' + id_fraccion + '" data-precio="' + precio_venta_fraccion + '"><td>' + nombre_fraccion + '</td><td>$ ' + parseFloat(precio_venta_fraccion).toFixed(2) + ' MXN</td><td><button class="btn btn-warning btn-xs btn_eliminar_fraccion" data-id_fraccion="' + id_fraccion + '" data-nombre_fraccion="' + nombre_fraccion + '">Eliminar</button></td></tr>');

			//Eliminar campo de la selección
			$('#slt_fraccion option[value="' + id_fraccion + '"]').remove();

			//Limpiar y redireccionar a txt_precio_venta_fraccion
			$('#txt_precio_venta_fraccion').val('');
			$('#txt_precio_venta_fraccion').focus();

		}

	});

	$('#tbl_fraccion tbody').on('click', '.btn_eliminar_fraccion', function(){

		var id_fraccion = $(this).data('id_fraccion');
		var nombre_fraccion = $(this).data('nombre_fraccion');

		//Remover campo en tabla
		$('#tbl_fraccion tbody tr[data-id_fraccion="' + id_fraccion + '"]').remove();

		//Agregar opción a select para habilitar
		$('#slt_fraccion').append('<option value="' + id_fraccion + '">' + nombre_fraccion + '</option>');

	});*/

	$('#btn_enviar_medida').click(function(){

		var id_unidad_original = $('#slt_unidad_original').val();
		var nombre_unidad_original = $('#slt_unidad_original option:selected').text();

		var txt_cantidad_conversion = $('#txt_cantidad_conversion').val();

		var id_unidad_conversion = $('#slt_unidad_conversion').val();
		var nombre_unidad_conversion = $('#slt_unidad_conversion option:selected').text();

		if(id_unidad_original !== 'NULL' && id_unidad_conversion !== 'NULL' && txt_cantidad_conversion > 0){

			var i = $('#tbl_medida tbody tr:last').data('counter');

			i++;

			//Agregar valor en tabla
			$('#tbl_medida tbody').append('<tr data-counter="' + i + '" data-id_unidad_original="' + id_unidad_original + '" data-id_unidad_conversion="' + id_unidad_conversion + '" data-cantidad_conversion="' + txt_cantidad_conversion + '"><td>' + nombre_unidad_original + '</td><td>' + txt_cantidad_conversion + '</td><td>' + nombre_unidad_conversion + '</td><td><button class="btn btn-warning btn-xs btn_eliminar_medida" data-counter="' + i + '">Eliminar</button></td></tr>');


			//Limpiar y redireccionar a txt_precio_venta_fraccion
			$('#txt_cantidad_conversion').val('');
			$('#txt_cantidad_conversion').focus();

		}

	});

	$('#tbl_medida tbody').on('click', '.btn_eliminar_medida', function(){

		var i = $(this).data('counter');

		//Remover campo en tabla
		$('#tbl_medida tbody tr[data-counter="' + i + '"]').remove();

	});

	$('#btn_guardar').click(function(){
		
		var j = 0;
		var ingrediente = Array();
		
		$('#tbl_ingrediente tr').each(function(i, e){
			
			var id_producto_tbl_ingrediente = $(this).data('id_producto');
			var cantidad_tbl_ingrediente = $(this).data('cantidad');
			
			ingrediente[j] = Array();
			ingrediente[j][0] = id_producto_tbl_ingrediente;
			ingrediente[j][1] = cantidad_tbl_ingrediente;
			
			j++;
		});
		
		/*var j = 0;
		var fraccion = Array();
		$('#tbl_fraccion tr').each(function(i, e){
			var id_fraccion_tbl_fraccion = $(this).data('id_fraccion');
			var precio_tbl_fraccion = $(this).data('precio');
			fraccion[j] = Array();
			fraccion[j][0] = id_fraccion_tbl_fraccion;
			fraccion[j][1] = precio_tbl_fraccion;
			j++;
		});*/
		
		var j = 0;
		var unidades = Array();
		$('#tbl_medida tr').each(function(i, e){

			var id_unidad_original = $(this).data('id_unidad_original');
			var id_unidad_conversion = $(this).data('id_unidad_conversion');
			var cantidad_conversion = $(this).data('cantidad_conversion');

			unidades[j] = Array();

			unidades[j][0] = id_unidad_original;
			unidades[j][1] = cantidad_conversion;
			unidades[j][2] = id_unidad_conversion;

			j++;

		});
		
		var accion = "almacenar_producto";

		var impuesto = Array();
		impuesto[0] = $('#txt_iva').data('id');
		impuesto[1] = $('#txt_ieps').data('id');
		
		//var txt_id_producto = $('#txt_id_producto').val();
		//var txt_estatus = $('#txt_estatus').val();
		//var txt_precio_venta = $('#txt_precio_venta').val();
		//var imagen_producto = $('#imagen_producto').val();
		//fraccion
		var txt_nombre = $('#txt_nombre').val();
		var slt_tipo = $('#slt_tipo').val();
		var slt_categoria = $('#slt_categoria').val();
		var txt_codigo_barra = $('#txt_codigo_barra').val();
		var txt_cantidad_consumible = $('#txt_cantidad_consumible').val();
		var txt_acumulable = $('#txt_producto_acumulable').prop('checked');
		var txt_fraccion_producto = $('#txt_producto_agrupamiento').prop('checked');
		var txt_iva = $('#txt_iva').val();
		var txt_ieps = $('#txt_ieps').val();
		ingrediente
		unidades
		
		var boolean_acumulable = 0;
		if(txt_acumulable == true){
			boolean_acumulable = 1;
		}
		
		var boolean_agrupamiento = 0;
		if(txt_fraccion_producto == true){
			boolean_agrupamiento = 1;
		}
		
		$.ajax({
			url: '../api/api.php',
			data:{
				"accion": accion,
				"tipo_accion": "modelo",
				"txt_nombre" : txt_nombre,
				"slt_tipo" : slt_tipo,
				"slt_categoria" : slt_categoria,
				"txt_codigo_barra" : txt_codigo_barra,
				"cantidad_consumible" : txt_cantidad_consumible,
				"boolean_acumulable" : boolean_acumulable,
				"boolean_agrupamiento" : boolean_agrupamiento,
				"imagen_producto" : imagen_producto,
				"txt_iva" : txt_iva,
				"txt_ieps" : txt_ieps,
				"ingrediente" : ingrediente,
				"unidades" : unidades,
				"impuesto" : impuesto
				//id_producto" : txt_id_producto,
				//"estatus" : txt_estatus,
				//"cantidad" : txt_cantidad,
				//"precio_compra" : txt_precio_compra,
				//"unidad" : txt_unidad,
				//"cantidad_conversion" : txt_cantidad_conversion,
				//"conversion" : txt_conversion,
				//"precio_venta" : txt_precio_venta,
				//"fraccion" : fraccion,
			},
			type: 'post',
			success: function(data){
				if(data > 0){
					$('#respuesa_servidor_success').html("<center>Producto agregado</center>");
					$('#modal_respuesa_servidor_success').modal('show');

					setTimeout(function(){
						$('#modal_respuesa_servidor_success').modal('hide');
						cargar_vista('productos');
					}, 2000);
				}else{
					alert();
				}
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});

	});

	$('#btnActualizar').click(function(){

		if($('#search-box1').val() != ""){
			var array = $('#search-box1').val().split(' - ');
			var id_producto = array[0];

			$.ajax({
				url: '../api/api.php',
				data: {
					"accion": "consultar_productos_por_id",
					"tipo_accion": "modelo",
					"id_producto": id_producto
				},
				type: 'post',
				dataType: 'json',
				success: function(data){
					$('.solo_actualizar').show('slow');
					$('#txt_Id_producto').val(id_producto);
					$('#txt_estatus').val('activo');
					$('#txt_nombre').val(data.nombre);
					$('#slt_tipo').val(data.tipo);
					$('#txt_precio_venta').val(data.costo);
					$('#txt_codigo_barra').val(data.codigo_barras);
					$('#txt_acumulable').val(data.boolean_acumulable);

					$('#search-box1').val('');
					$("#search_suggestion_holder1").html('');
					$('#dlgProducto').modal('hide');
				},
				error: function(xhr, desc, err){
					console.log(xhr);
					console.log("Details: " + desc + "\nError:" + err);
				}
			});
		}
	});

	//*****************************
	// Instantiate the Bloodhound suggestion engine
	 var productos = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			'cache': false,
			url: "../api/api.php?tipo_accion=modelo&accion=consultar_productos_por_nombre_y_tipo",

			replace: function(url, uriEncodedQuery) {

				var tipo_busqueda = $('#slt_tipo').val();

				return url + '&q=' + uriEncodedQuery + '&tipo_busqueda=' + tipo_busqueda

			},
			wildcard: '%QUERY',
			filter: function (data) {
				return data;
			}
		}
	});

	// Initialize the Bloodhound suggestion engine
	productos.initialize();

	 $("#search-box3").typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},
	{
		name: "result",
		displayKey: "nombre",
		source: productos.ttAdapter()
	}).bind("typeahead:selected", function(obj, datum, name) {
		$(this).data("id", datum.id_producto);
		
	});

	$('#btn_enviar_ingrediente').click(function(){

		var id_producto = $('#search-box3').data('id');
		var nombre = $('#search-box3').val();
		var cantidad = $('#txt_cantidad_ingrediente').val();

		$('#tbl_ingrediente tbody').append('<tr data-id_producto="' + id_producto + '" data-cantidad="' + cantidad + '"><td>' + nombre + '</td><td>' + cantidad + '</td><td><button class="btn btn-warning btn_eliminar_ingrediente" data-posicion="' + nombre + '">Eliminar</button></td></tr>');

	});

	$('#tbl_ingrediente tbody').on('click', '.btn_eliminar_ingrediente', function(){

		var posicion = $(this).data('posicion');

		//Remover campo en tabla
		$('#tbl_ingrediente tbody tr[data-nombre="' + posicion + '"]').remove();

	});

});
