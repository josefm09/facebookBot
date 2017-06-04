$(document).ready(function(){
	
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};
	
	$('#btn_unidad').click(function(){
		
		var id_propuesta = getUrlParameter('id_propuesta');
		
		var parametros = {
			"accion": "consulta_informacion_por_id",
			"tipo_accion": "modelo",
			"auth": "c",
			"id_propuesta": id_propuesta
		};
		
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				
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