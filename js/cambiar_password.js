key_override();

$(document).ready(function(){
	//Focus para el primer elemento del formulario
	$('#cambiar_password_old_password').focus();
});

//Mapeo de teclas
$(document).on('keypress', '#cambiar_password_old_password', function (e) {
        if (e.keyCode == 13) {
			e.preventDefault(); 
			$('#cambiar_password_nueva_password').focus();
		}
});

$(document).on('keypress', '#cambiar_password_nueva_password', function (e) {
        if (e.keyCode == 13) {
			e.preventDefault(); 
			$('#cambiar_password_nueva_password_repetir').focus();
		}
});

$(document).on('keypress', '#cambiar_password_nueva_password_repetir', function (e) {
        if (e.keyCode == 13) {
			e.preventDefault(); 
			enviar_cambiar_password();
		}
});

function key_override() {
	var util = { };
	document.addEventListener('keydown', function(e){
		var key = util.key[e.which];
		
		if( key ){
			e.preventDefault();
		}
		
		if( key === 'F1' ){     
			enviar_cambiar_password();
		}
				
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
}

//Almacenado del nuevo cliente
function enviar_cambiar_password() {
var parametros = {
	"accion":"almacenar_cambiar_password",
	"tipo_accion":"modelo",
	"current_password":$('#cambiar_password_old_password').val(),
	"new_password":$('#cambiar_password_nueva_password').val(),
	"repeat_new_password":$('#cambiar_password_nueva_password_repetir').val(),
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
				
				cargar_vista('cambiar_password');//Recarga la vista para limpiar todo el form
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