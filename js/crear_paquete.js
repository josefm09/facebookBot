$(document).ready(function(){
	
	Dropzone.autoDiscover = true;
	id_imagen =	0;
	
	$('#imagen_paquete').dropzone({
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
	
	$.ajax({
		url: '../api/api.php',
		data: {
			"accion": "consultar_productos_por_estatus",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			$(data).each(function(i,v){
				$("#txt_id_producto").append('<option value="' + v.id_producto + '">' + v.nombre +  " " +v.tipo +  " " + v.clasificacion +'</option>');
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});	
	
	$('#btnCrearPaquete').click(function(){
		var parametros = {
			"accion":"almacenar_paquete",
			"tipo_accion":"modelo",
			"nombre_paquete": $('#txt_nombre').val(),
			"precio_paquete": $('#txt_precio').val(),
			"producto_paquete": $('#txt_id_producto').val(),
			"id_imagen_paquete": id_imagen
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
					
					cargar_vista('crear_paquete');
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