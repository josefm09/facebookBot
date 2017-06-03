solicitar_valores_actuales_configuracion_de_sistema();

//Publa las opciones de configuracion del sistema con su estado actual en base de datos
function solicitar_valores_actuales_configuracion_de_sistema() {
var parametros = {
	"accion":"valores_actuales_configuracion_de_sistema",
	"tipo_accion":"modelo",
};

$.ajax({
        url: '../api/api.php',
        type: 'POST',
		dataType: 'json',
        data: parametros,
        success:function(data){
			var estatus_request = (data["estatus_request"]); //Notifica el estatus del query
			var default_password = (data["default_password"]);
			var max_inactive_session_time = (data["max_inactive_session_time"]);

			
			//Si el servidor retorna un error
			if(estatus_request == "error")
				{
				$('#modal_respuesa_servidor_error').modal('show');
				document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
				}
			
			//Si no hay errores
			if(estatus_request == "success")
				{
				$("#default_password").val(default_password);
				$("#max_inactive_session_time").val(max_inactive_session_time);
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
        },
});
}

//inician los querys de almacenado
//Administra el delay para prevenir multiples requests en una misma operacion
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

$('#default_password').keyup(function() {
    delay(function(){
		var parametros = {
		"accion":"almacenar_nuevo_valor_configuracion_de_sistema",
		"tipo_accion":"modelo",
		"variable":"default_password",
		"valor":$('#default_password').val(),
	};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]); //Notifica el estatus del query
				var respuesta_servidor = (data["respuesta_servidor"]); //Mensaje a mostrar al usuario
					
				//Si el servidor retorna un error
				if(estatus_request == "error")
					{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
					
					//Recarga los valores de configuracion
					solicitar_valores_actuales_configuracion_de_sistema();
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
						
					//Recarga los valores de configuracion
					solicitar_valores_actuales_configuracion_de_sistema();	
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
			},
		});
    }, 3000 );
});

$('#max_inactive_session_time').keyup(function() {
    delay(function(){
		var parametros = {
		"accion":"almacenar_nuevo_valor_configuracion_de_sistema",
		"tipo_accion":"modelo",
		"variable":"max_inactive_session_time",
		"valor":$('#max_inactive_session_time').val(),
	};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var estatus_request = (data["estatus_request"]); //Notifica el estatus del query
				var respuesta_servidor = (data["respuesta_servidor"]); //Mensaje a mostrar al usuario
					
				//Si el servidor retorna un error
				if(estatus_request == "error")
					{
					$('#modal_respuesa_servidor_error').modal('show');
					document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
					
					//Recarga los valores de configuracion
					solicitar_valores_actuales_configuracion_de_sistema();
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
						
					//Recarga los valores de configuracion
					solicitar_valores_actuales_configuracion_de_sistema();	
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
			},
		});
    }, 3000 );
});