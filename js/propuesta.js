$(document).ready(function(){
	$('.validacionCongreso').bootstrapSwitch();
	$('.propuesta').hide();
	
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
	
	$(function(){
		
		var id_propuesta_buscar = getUrlParameter('id_propuesta');
		
		var parametros = {
			"accion": "consultar_informacion_por_id",
			"tipo_accion": "modelo",
			"auth": "c",
			"id_propuesta_buscar": id_propuesta_buscar
		};
		
		$.ajax({
			url: '../api/api.php',
			type: 'GET',
			dataType: 'json',
			data: parametros,
			success:function(data){
				//datos de propuesta
				$('.titulo').html(data.datos_propuesta.titulo);
				$('.problematica').html(data.datos_propuesta.problematica);
				$('.solucion').html(data.datos_propuesta.solucion);
				
				//tema y subtema
				data.datos_tema.nombre_subtema;
				data.datos_tema.nombre_tema;
				
				//imagen
				//data.nombre_completo;
				var directorio = '../imagenes/imagenes/'+data.nombre_completo;
				$('#imagen').html('<img src='+directorio+' alt="">');
				setTimeout(function(){
					$('.propuesta').show('slow');
				},500);
				
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	$('#btn_enviar').click(function(){
		var valor_switch = 0;
		
		if($('#txt_validacion_4').is(':checked')){
			valor_switch = 1;
		}

		var parametros = {
			"accion":"insertar_voto_ciudadano",
			"tipo_accion":"modelo",
			"comentario":$('#txt_comentario').val(),
			"voto":valor_switch,
			"auth":"C"
		}
		
		$.ajax({
			url:'../api/api.php',
			data:parametros,
			dataType:'json',
			success: function(data){
				
			},
			//Si el request falla genera mensajes de errores de posibles eventos comunes
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
});