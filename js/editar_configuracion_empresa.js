$(document).ready(function(){
	
	$('.validacionCongreso').bootstrapSwitch();
	revisar_configuracion();
	
	Dropzone.autoDiscover = true;
	
	id_imagen = "";
	
	$('#upload_logotipo_empresa').dropzone({
		url: "../api/api.php?accion=almacenar_logotipo_empresa&tipo_accion=modelo",		
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
			var hash = response;
			$.ajax({
				url: '../api/api.php',
				type: 'POST',
				dataType: 'json',
				data:{
					"accion": "almacenar_configuracion_empresa",
					"tipo_accion": "modelo",
					"valor_selector": 4,
					"id_switch": 7,
					"hash_imag": hash
				},
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
					}
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
				},
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$('#btncambiar').click(function(){
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data:{
				"accion":"almacenar_configuracion_empresa",
				"tipo_accion":"modelo",
				"nombre_empresa": $('#txt_nombre').val(),
				"valor_selector": 3,
				"id_switch": 6
			},
			success:function(data){
				var estatus_request = (data["estatus_request"]);//Notifica el estatus del query
				var respuesta_servidor = (data["respuesta_servidor"]);;//Mensaje a mostrar al usuario
				
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
				}
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
			
	});
});

function mandar_formulario(valor_switch){

	var id_switch = valor_switch;
	
	var validacion = 0;
	
	if($('#txt_validacion_'+id_switch).prop('checked')){
		validacion = 1;
	}
	
	var parametros = {
		"accion":"almacenar_configuracion_empresa",
		"tipo_accion":"modelo",
		"valor_selector": validacion,
		"id_switch": id_switch
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
			}
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
		},
	});
}

function revisar_configuracion(){
		
	var parametros = {
		"accion":"consultar_atributos_configuracion_empresa",
		"tipo_accion":"modelo"
	};
	
	$.ajax({
		url: "../api/api.php",
		data: parametros,
		dataType: "json",
		success: function(data){
			$(data).each(function(i, v){
				if(v.id_configuracion == 13){
					if(v.atributo_de_variable == "true"){
						$('#txt_validacion_2').attr('checked', true);
					}
				}
				if(v.id_configuracion == 14){
					if(v.atributo_de_variable == "true"){
						$('#txt_validacion_3').attr('checked', true);
					}
				}
				if(v.id_configuracion == 15){
					if(v.atributo_de_variable == "true"){
						$('#txt_validacion_4').attr('checked', true);
					}
				}
				if(v.id_configuracion == 16){
					if(v.atributo_de_variable == "true"){
						$('#txt_validacion_5').attr('checked', true);
					}
				}
			});
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
}

