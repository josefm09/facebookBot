$(document).ready(function(){
	global_id_mesa_dinamica=0;
	global_id_mesa=0;
	global_var=0;
	
	$('#vista_crear_mesa_dinamica').hide();
	
	$.ajax({
		url: "../api/api.php",
		data: {
			"accion": "consultar_mesas_activas",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			$(data.respuesta_servidor).each(function(i, v){
				$('#carga_mesa tbody').append('<tr><td>' + v.nombre + '</td><td>'+ v.capacidad +'</td></tr>');
				$('#carga_mesa2 tbody').append('<tr data-position="' + i + '"><td>'+ v.nombre + '</td><td>'+ v.capacidad+'</td><td><button type="button" class="agrega_mesa" data-name="' + v.nombre + '" data-capacidad="'+ v.capacidad+'" data-position="' + i + '" data-id="'+v.id_mesa+'" value="'+v.id_mesa+'">Agregar</button></td></tr>');				
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Detalles: " + desc + "\nError:" + err);
		}
	});
	
	$.ajax({
		url: "../api/api.php",
		data: {
			"accion": "consulta_todas_mesas_activas",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){			
			
			$(data.respuesta_servidor).each(function(i, v){

			var valor_estatus = v.estatus;
			var nombre_boton = "";
			
			if(valor_estatus == 0){
				nombre_boton = "Habilitar";
			}
			else{
				nombre_boton = "Inabilitar";
			}
			
				$('#carga_mesas_consulta tbody').append('<tr data-position="' + i + '"><td>'+ v.nombre + '</td><td>'+ v.capacidad +'</td><td><button type="button" class="cambiar_estatus" data-position="'+ i +'" data-id="'+ v.id_mesa +'" data-boton="'+ v.estatus +'">'+  nombre_boton +'</button></td><td><button type="button" class="modificar_info_mesa" data-position="'+ i +'" data-id="'+ v.id_mesa +'">Modificar</button></td></tr>');
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Detalles: " + desc + "\nError:" + err);
		}
	});
	
	$('#btnMesa').click(function(){
		var parametros = {
			"accion": "almacenar_mesa",
			"tipo_accion": "modelo",
			"nombre_mesa": $('#txt_nombre').val(),
			"capacidad_mesa": $('#txt_capacidad').val(),
			"global": global_var
		};
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request= (data["estatus_request"]);//Notifica el estatus del query 
				var respuesta_servidor= (data["respuesta_servidor"]);//Mensaje a mostrar al usuario
				
				//Si el servidor retorna un error
				if(estatus_request == "error"){
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_error").modal('hide');
					}, 3000);
				}

				//Si no hay errores
				if(estatus_request == "success"){
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
					}, 3000);
					
					global_var=0;
				}
				
				cargar_vista('crear_mesa');
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error:function(x,e) {
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
	
	$('#btnDinamica').click(function(){
		
		crear_mesa_diamica();
		$('#vista_crear_mesa').hide();
		$('#vista_crear_mesa_dinamica').show();
		
	});
	
	$('#carga_mesa2 tbody').on('click', '.agrega_mesa', function(){
		
		var id_mesa = $(this).data('id');
		var posicion_mesa = $(this).data('position');
		var nombre_mesa = $(this).data('name');
		var size_mesa = $(this).data('capacidad');
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "relacionar_mesa_con_mesa",
				"tipo_accion": "modelo",
				"global_id_mesa": id_mesa,
				"global_id_mesa_dinamica": global_id_mesa_dinamica
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
					$('#carga_mesa_dinamica tbody').append('<tr><td>'+ nombre_mesa +'</td><td>'+ size_mesa +'</td></tr>');
					$('#carga_mesa2 tbody tr').filter("[data-position='" + posicion_mesa + "']").remove();
					// $('#modal_respuesa_servidor_success').modal('show');
					// document.getElementById('respuesa_servidor_success').innerHTML = "!Almacenado exitoso!";
					
					// Cierra el modal despues de 3 segundos
					// setTimeout(function(){
						// $("#modal_respuesa_servidor_success").modal('hide');
					// }, 3000);
					
				}
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
			
		});
		
	});
	
	$('#carga_mesas_consulta tbody').on('click', '.modificar_info_mesa', function(){
		$('#btnCerrar').click();
		var id_mesa = $(this).data('id');
		global_var= id_mesa;
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "modificar_datos_mesa",
				"tipo_accion": "modelo",
				"id_mesa": id_mesa
			},
			dataType: 'json',
			success:function(data){	
				var nombre= (data["nombre_mesa"]);//Notifica el estatus del query
				var cantidad= (data["cantidad"]);//Mensaje a mostrar al usuario
				
				$('#txt_nombre').val(nombre);
				$('#txt_capacidad').val(cantidad);

			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
		});			
		
	});
	
	$('#carga_mesas_consulta tbody').on('click', '.cambiar_estatus', function(){
		$('#btnCerrar').click();
		var id_mesa = $(this).data('id');
		var valor_estatus = $(this).data('boton');
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "cambiar_estatus_mesa_normal",
				"tipo_accion": "modelo",
				"id_mesa": id_mesa,
				"valor_estatus": valor_estatus
			},
			dataType: 'json',
			success:function(data){	
				var estatus_request= (data["estatus_request"]);//Notifica el estatus del query
				var respuesta_servidor= (data["respuesta_servidor"]);//Mensaje a mostrar al usuario
				
				if(estatus_request == "error"){
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_error").modal('hide');
					}, 3000);
				}

				//Si no hay errores
				if(estatus_request == "success"){
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

					//Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
					}, 3000);
				}

			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
		});			
		
	});
	
	function crear_mesa_diamica(){
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "operaciones_mesa_dinamica",
				"tipo_accion": "modelo",
				"var": "crear_mesa_dinamica"
			},
			dataType: 'json',
			success:function(data){	
				global_id_mesa_dinamica=(data["respuesta_servidor"]);
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
		});			
	};
	
	$('#btnfinal').click(function(){
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			data: {
				"accion": "mesa_relacional",
				"tipo_accion": "modelo",
				"mesa_dinamica": global_id_mesa_dinamica	
			},
			dataType: 'json',
			success:function(data){	
				
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
		});			
	});
	
});