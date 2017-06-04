$(document).ready(function(){

	// 0 - Visible , 1 - Oculta
	estado_barra_navegacion = 1;
	// $('.ocultar_barra_eventos').click(function(){
		// if(estado_barra_navegacion == 0){

			// estado_barra_navegacion = 1;
			// $('#btn_text').hide().html(' Visualizar').fadeOut(1000).fadeIn(1000);
			// $('.ocultar_barra_eventos i').hide().removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-left').fadeOut(1000).fadeIn(1000);
			// $('#cuerpo').removeClass('col-md-10').addClass('col-md-11');
			// $('#eventos').removeClass('col-md-2').addClass('col-md-1');

		// } else if(estado_barra_navegacion == 1){

			// estado_barra_navegacion = 0;
			// $('#btn_text').hide().html(' Ocultar').fadeOut(1000).fadeIn(1000);
			// $('.ocultar_barra_eventos i').hide().removeClass('glyphicon-chevron-left').addClass('glyphicon-chevron-right').fadeOut(1000).fadeIn(1000);
			// $('#cuerpo').removeClass('col-md-11').addClass('col-md-10');
			// $('#eventos').removeClass('col-md-1').addClass('col-md-2');

		// }
	// });
	
	/*$.ajax({
		url:,
		dataType:'json',
		success: function(data){
			$(data).each(function(i, v){
				$().html('<div class="row"><div class="col-md-4 col-xs-4 btn"><a href="#" class="ocultar_barra_eventos icono"><span class='+v.icon+'></span><span id="informacion"> '+v.mensaje+'</span></div><div class="col-md-4 col-xs-4"></div><div class="col-md-4 col-xs-4"></div></div>');
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
		},
	});*/

});

cargar_navbar();
cargar_primer_vista();

function cargar_navbar(){
	var parametros = {
		"accion":"navigation",
		"tipo_accion":"view",
		};

	$.ajax({
		url: '../api/api.php',
		type: 'get',
		data: parametros,
		success:function(data){
			$("#navigation_spot").html(data);
			//$("#navigation_spot").hide().html(data).fadeIn(1000);
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

function cargar_primer_vista(){
	
	var parametros = {
		"accion":"primer_vista",
		"tipo_accion":"modelo",
		};

	$.ajax({
		url: '../api/api.php',
		type: 'get',
		data: parametros,
		success:function(data){
			$("#cuerpo").html(data);
			
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
