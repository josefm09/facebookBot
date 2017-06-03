$(document).ready(function(){
	$('#btnGuardar').click(function(){
		var parametros={
			"accion": "almacenar_nueva_empresa",
			"tipo_accion": "modelo",
			"nombre_selecc": $('#txt_nombre').val(),
			"rfc_selecc": $('#txt_rfc').val(),
			"correo1_selecc": $('#txt_correo_1').val(),
			"correo2_selecc": $('#txt_correo_2').val(),
			"correo3_selecc": $('#txt_correo_3').val(),
			"correo4_selecc": $('#txt_correo_4').val(),
			"correo5_selecc": $('#txt_correo_5').val(),
			"razon_social_selecc": $('#txt_razon_social').val()
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

					cargar_vista('crear_empresa');//Recarga la vista para limpiar todo el form
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