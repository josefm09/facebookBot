$(document).ready(function(){
	
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
				$("#txt_id_empresa").append('<option value="' + v.id + '">' + v.nombre + '</option>');
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
			"accion": "estados_disponibles",
			"tipo_accion": "modelo",
			"estatus": 1
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			$(data).each(function(i,v){
				$("#txt_estado").append('<option value="' + v.id + '">' + v.estado + '</option>');
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});	
	
	
	$('#btn_termine').click(function(){
		var parametros = {
			"accion":"almacenar_nueva_sucursal",
			"tipo_accion":"modelo",
			"empresa_seleccionado":$('#txt_id_empresa').val(),
			"nombre_seleccionado":$('#txt_nombre').val(),
			"calle_seleccionado":$('#txt_calle').val(),
			"ext_seleccionado":$('#txt_numero_exterior').val(),
			"int_seleccionado":$('#txt_numero_interior').val(),
			"codigo_postal_seleccionado":$('#txt_cp').val(),
			"colonia_seleccionado":$('#txt_colonia').val(),
			"ciudad_seleccionado":$('#txt_ciudad').val(),
			"estado_seleccionado":$('#txt_estado').val(),
			"pais_seleccionado":$('#txt_pais').val(),
			"tipo_sucursal_seleccionado":$('#txt_matriz').val()
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
					
					cargar_vista('crear_sucursal');
				}
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
});