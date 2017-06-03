setInterval(function(){
	verificar_tiempo_restante_session();
	}, 15000);

//Pide a la api el tiempo restante antes de que la session sea terminada por inactividad y valida si es necesario hacer el cierre del lado del usuario
function verificar_tiempo_restante_session() {
	
var parametros = {
	"accion":"tiempo_restante_session",
	"tipo_accion":"modelo",
	"request_tiempo_restante_session":"beep_boop",
};
	$.ajax({
        url: '../api/api.php',
        type: 'POST',
		dataType: 'json',
        data: parametros,
        success:function(data){
			var tiempo_restante_session = (data["tiempo_restante_session"]); //El tiempo en segundos restantes antes de que la session caduque

			//Si quedan menos de 30 segundos cierra la session
			if(tiempo_restante_session < 30)
				{
				window.location.href = "../logout.php";
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