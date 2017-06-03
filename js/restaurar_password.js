key_override();

//Autofocus al cargar la vista
$(document).ready(function(){
        $('#reset_password_usuario').focus();
});

//Mapeo de taclas
$(document).on('keypress', '#reset_password_usuario', function (e) {
        if (e.keyCode == 13) {
			e.preventDefault(); 
			enviar_reset_password();
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
			enviar_reset_password();
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

function enviar_reset_password() {
var parametros = {
	"accion":"almacenar_reset_password",
	"tipo_accion":"modelo",
	"usuario_seleccionado":$('#reset_password_usuario').val(),
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
				
				cargar_vista('restaurar_password');//Recarga la vista para limpiar todo el form
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
$("#reset_password_usuario").focus(); //Pasa el focus al punto de inicio del formulario
}