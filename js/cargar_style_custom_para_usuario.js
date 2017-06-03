cargar_css_custom_usuario();

function cargar_css_custom_usuario() {

var parametros = {
	"accion":"configuracion_css_usuario",
	"tipo_accion":"modelo",
};
	$.ajax({
        url: '../api/api.php',
        type: 'POST',
				dataType: 'json',
        data: parametros,
        success:function(data){
						var css_custom = (data["respuesta_servidor"]); //El CSS a cargar

						//Agrega la nueva configuracion de CSS
						addNewStyle(css_custom);

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

/*
* Crea un archivo que es cargado en el header del documento con el css dado
*
* En landing/panel.php el CSS principal es cargado despues de body y por ello el archivo
* no debe contener las mismas tags que son pasadas a esta funcion o
* seran sobre escritas
*/
function addNewStyle(newStyle) {
    var styleElement = document.getElementById('styles_js');
    if (!styleElement) {
        styleElement = document.createElement('style');
        styleElement.type = 'text/css';
        styleElement.id = 'styles_js';
        document.getElementsByTagName('head')[0].appendChild(styleElement);
    }
    styleElement.appendChild(document.createTextNode(newStyle));
}
