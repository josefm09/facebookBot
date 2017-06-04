$(document).ready(function(){
	$('#navegacion li a').click(function(){

		//Toma el atributo
		var accion = $(this).data('nav_accion');
		
		//Para que no borre el contenido de #cuerpo si se hace click en un menu de dropdown
		if (accion != "#")
			{
			/*
			* Todo podria ser cargado dentro de la misma funcion pero se separa el ajax y la toma de data-* para poder re utilizar el metodo
			* de carga desde las otras vistas como forma de limpiar el form
			*/
			cargar_vista(accion);
			}
	});
	
});
//Cierra el menu desplegable de la barra de navegacion bajo el evento click en movil
$(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
        $(this).collapse('hide');
    }
});

//Pide a la api la vista que le fue pasada
function cargar_vista(accion){
	var parametros = {
		"accion":accion,
		"tipo_accion":"view",
		};
		
	$.ajax({
		url: '../api/api.php',
		type: 'get',
		data: parametros,
		success:function(data){
			$("#cuerpo").hide().html(data);
			//$("#cuerpo").hide().html(data).slideDown(1000);
			setTimeout(function(){
				$("#cuerpo").show('slow');
			},400);
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