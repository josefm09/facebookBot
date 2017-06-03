$(document).ready(function(){
	
	
	
	
	Dropzone.autoDiscover = true;
	id_imagen =	0;
	$('#upload_imagen_clasificacion').dropzone({
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
	$('#btn_crear_clasificacion').click(function(){
		
		alert(id_imagen);
		
		var cadena_variable = {
			'accion':'almacenar_nueva_clasificacion',
			'tipo_accion':'modelo',
			'nombre_clasificacion': $('#txt_nombre_clasificacion').val(),
			'id_imagen_clasificacion' : id_imagen
		};
		
		$.ajax({
			url: '../api/api.php',
			data: cadena_variable,
			type: 'POST',
			dataType: 'json',
			success: function(data){
				var estatus_request = (data["estatus_request"]);//Notifica el estatus del query
				var respuesta_servidor = (data["respuesta_servidor"]);//Mensaje a mostrar al usuario
				
				// Si el servidor retorna un error
				if(estatus_request == "error"){
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
					
					// Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_error").modal('hide');
					}, 3000);
				}
				
				// Si no hay errores
				if(estatus_request == "success"){
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;
					
					// Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						cargar_vista("crear_clasificacion");
					}, 3000);
				}
			},
			// Si el request falla genera mensajes de errores de posibles eventos comunes
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
			},
		});
		
		
		
	});
	
	$.ajax({
			url: '../api/api.php',
			data: {
				"accion": "consulta_clasificacion_impresora",
				"tipo_accion": "modelo",
			},
			type: 'POST',
			dataType: 'json',
			success: function(data){
				
				$(data).each(function(i,v){

					$(v.clasificaciones).each(function(y,b){
						$("#txt_clasificacion").append('<option value="' + b.id_clasificacion + '">' + b.nombre + '</option>');
					});
					
					$(v.impresoras).each(function(y,b){
						$("#txt_impresora").append('<option value="' + b.id_impresora + '">' + b.nombre_impresora + '</option>');
					});
					
				});
				
			},
			// Si el request falla genera mensajes de errores de posibles eventos comunes
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
			},
		});
	
	
	$("#btn_relacionar").click(function(){
		alert(1);
		
		//un dia tuve un seño donde el mundo estaba al revez, todos flotamos en un espacio y morimos como heroes
		
		var parametros = {
			'accion':'relacionar_clasificacion_impresora',
			'tipo_accion':'modelo',
			'id_clasificacion': $('#txt_clasificacion').val(),
			'id_impresora' : $('#txt_impresora').val()
		};
		
		$.ajax({
			url: '../api/api.php',
			data: parametros,
			type: 'POST',
			dataType: 'json',
			success: function(data){
				$("#dlgClasificacion").modal('hide');
				
				var estatus_request = (data["estatus_request"]);//Notifica el estatus del query
				var respuesta_servidor = (data["respuesta_servidor"]);//Mensaje a mostrar al usuario
				
				
				// Si el servidor retorna un error
				if(estatus_request == "error"){
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
					
					// Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_error").modal('hide');
					}, 3000);
				}
				
				// Si no hay errores
				if(estatus_request == "success"){
					$('#modal_respuesa_servidor_success').modal('show');
					document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;
					
					// Cierra el modal despues de 3 segundos
					setTimeout(function(){
						$("#modal_respuesa_servidor_success").modal('hide');
						cargar_vista("crear_clasificacion");
					}, 3000);
				}
			},
			// Si el request falla genera mensajes de errores de posibles eventos comunes
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
			},
		});
		
	});
		
});