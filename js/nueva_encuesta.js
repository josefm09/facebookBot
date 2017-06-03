$(document).ready(function(){
	
	
	$('.cuento_con_hijos').hide();
	$('.cuento_con_esposo').hide();
	$('.quien_cuidan_a_mi_hijo').hide();
	$('.requiero_imss').hide();
	$('.cuento_con_infonavit').hide();
	$('.cuento_con_contrato').hide();
	$('.trabajo_actualmente').hide();
	$('.publidad_periodico').hide();
	$('.publidad_recomendacion').hide();
	$('.nombre_recomendador').hide();
	$('.familiar_padecimiento').hide();
	
	$('.formulario_2').hide();
	$('.formulario_3').hide();
	$('.formulario_4').hide();
	$('.formulario_5').hide();
	$('.formulario_6').hide();
	
	
	$('#btn_continuar').data('id',1);
	
	
	
	$(function(){
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: {
				"accion":"select_estados",
				"tipo_accion":"modelo"
			},
			success:function(data){
				$(data).each(function(i,v){
					
					var valor_default = '';
					
					if(v.nombre == 'Sinaloa'){
						valor_default = 'selected';
					}
					
					$('#select_estado').append(
						'<option value="' + v.id + '" ' + valor_default + '>'+ v.nombre + '</option>'
					);
				});
				
				$('#select_estado').change();
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});		
		
	});
	
	$('#select_municipio').change(function () {
		
		var municipio_seleccionado = $(this).find(':selected').html();
		
		$('#txt_ciudad').val(municipio_seleccionado);
		
	});
	
	$('#select_estado').change(function () {
		
		var estado_seleccionado = $(this).val();
		
		$('#select_municipio').empty();
		
		var parametros = {	
			"accion":"select_municipios",
			"tipo_accion":"modelo",
			"id_municipio": estado_seleccionado
		};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				$(data).each(function(i,v){
					
					var valor_default = '';
					
					if(v.nombre == 'Culiacán'){
						valor_default = 'selected';
					}
					
					$('#select_municipio').append(
						'<option value="' + v.id + '" ' + valor_default + '>'+ v.nombre + '</option>'
					);
				});
				
				$('#select_municipio').change();
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});		
	});	
	
	$('#select_estado_civil').change(function(){
		
		var estado_civil = parseInt($(this).val());
			
		if(estado_civil == 1 || estado_civil == 4 || estado_civil == 5){
			$('.cuento_con_esposo').show('slow');
		}else{
			$('#txt_trabajo_esposo').val('');
			$('#txt_telefono_trabajo_esposo').val('');
			$('.cuento_con_esposo').hide('slow');
		}
		
	});
	
	$('#txt_cuenta_con_infonavit').change(function(){
		var cuaenta_infonavit = parseInt($(this).val());
			
		if(cuaenta_infonavit == 1){
			$('.cuento_con_infonavit').show('slow');
		}else{
			$('#txt_pregunta_contrato_infonavit').val('');
			$('#txt_retencion_mensual').val('');
			$('.cuento_con_infonavit').hide('slow');
		}
		$('#txt_pregunta_contrato_infonavit').change();
	});
	$('#txt_pregunta_contrato_infonavit').change(function(){
		var cuaenta_contrato = parseInt($(this).val());
		if(cuaenta_contrato == 1){
			
			$('.cuento_con_contrato').show('slow');	
		}else{
			
			$('.cuento_con_contrato').hide('slow');	
		}
		
	});
	
	
	$('#txt_publicidad').change(function(){

		var publicidad_respuesta = parseInt($(this).val());
			
		if(publicidad_respuesta == 1){
			$('.publidad_periodico').show('slow');
		}else{
			$('#txt_publicidad_periodico').val('');
			$('#txt_publicidad_remondadacion').val('');
			$('.publidad_periodico').hide('slow');
		}
		if(publicidad_respuesta == 2){
			$('.publidad_recomendacion').show('slow');
		}else{
			$('#txt_publicidad_periodico').val('');
			$('#txt_publicidad_remondadacion').val('');
			$('.publidad_recomendacion').hide('slow');
		}
		$('#txt_publicidad_remondadacion').change();
	});
	
	$('#txt_publicidad_remondadacion').change(function(){

		var respuesta_nombre_recomendador = parseInt($(this).val());
			
		if(respuesta_nombre_recomendador == 1){
			$('.nombre_recomendador').show('slow');
		}else{
			$('#search-recomendador').val('');
			$('.nombre_recomendador').hide('slow');
		}
	});
	
	$('#txt_familiar_con_padecimientos').change(function(){

		var respuesta_familiar = parseInt($(this).val());
			
		if(respuesta_familiar == 1){
			$('.familiar_padecimiento').show('slow');
		}else{
			$('#txt_familiar_parentesco').val('');
			$('#txt_familiar_descripcion').val('');
			$('.familiar_padecimiento').hide('slow');
		}
	});
	
	$('#txt_cantidad_hijos').keyup(function(){
		
		var numero_de_hijos = parseInt($(this).val());
			
		if(numero_de_hijos > 0){
			$('.cuento_con_hijos').show('slow');
		}else{
			$('#txt_edad_hijo_menor').val('');
			$('#txt_quien_cuida_a_mi_hijo').val('');
			$('.cuento_con_hijos').hide('slow');
		}
		$('#txt_edad_hijo_menor').keyup();
	});
	
	$('#txt_edad_hijo_menor').keyup(function(){
		
		var edad_hijo = parseInt($(this).val());
			
		if(edad_hijo < 6){
			$('.quien_cuidan_a_mi_hijo').show('slow');
		}else{
			
			$('.quien_cuidan_a_mi_hijo').hide('slow');
		}
		
	});
	
	$('#txt_pregunta_tabaja').change(function(){

		var trabaja_actualmente = parseInt($(this).val());
			
		if(trabaja_actualmente == 1){
			$('.trabajo_actualmente').show('slow');
		}else{
			$('#txt_tiempo_disponible').val('');
			$('.trabajo_actualmente').hide('slow');
		}
	});
	
	Dropzone.autoDiscover = true;
	id_imagen_identificacion_oficial_encuesta = "";
	id_imagen_commprobante_domicilio_encuesta = "";
	id_imagen_contrato_encuesta = "";
	id_imagen_imegen_usuario_encuesta = "";
	
	$('#upload_identificacion_oficial_encuesta').dropzone({
		url: "../api/api.php?accion= modelo que inserte imagen !!",		
		maxFiles: 1,
		addRemoveLinks: true,
		acceptedFiles: 'image/*',
		parallelUploads: 1,
		dictDefaultMessage: "Arrastra elementos aquí o da click.",
		dictResponseError: "Ha ocurrido un error en el server",
		dictRemoveFile: "Remover Imagen",
		init: function(){
			this.on("maxfilesexceeded", function(file){
				this.removeFile(file);
				document.getElementById('respuesa_servidor_error').innerHTML = "<center>Límite de documentos excedido</center>";
				$('#modal_respuesa_servidor_error').modal('show');
			});
		},
		success:function(file,response){
			id_imagen_identificacion_oficial_encuesta = response;
			
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$('#upload_comprobante_domicilio_encuesta').dropzone({
		url: "../api/api.php?accion= modelo que inserte imagen !!",		
		maxFiles: 1,
		addRemoveLinks: true,
		acceptedFiles: 'image/*',
		parallelUploads: 1,
		dictDefaultMessage: "Arrastra elementos aquí o da click.",
		dictResponseError: "Ha ocurrido un error en el server",
		dictRemoveFile: "Remover Imagen",
		init: function(){
			this.on("maxfilesexceeded", function(file){
				this.removeFile(file);
				document.getElementById('respuesa_servidor_error').innerHTML = "<center>Límite de documentos excedido</center>";
				$('#modal_respuesa_servidor_error').modal('show');
			});
		},
		success:function(file,response){
			id_imagen_commprobante_domicilio_encuesta = response;
			
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$('#upload_contrato_encuesta').dropzone({
		url: "../api/api.php?accion= modelo que inserte imagen !!",		
		maxFiles: 1,
		addRemoveLinks: true,
		acceptedFiles: 'image/*',
		parallelUploads: 1,
		dictDefaultMessage: "Arrastra elementos aquí o da click.",
		dictResponseError: "Ha ocurrido un error en el server",
		dictRemoveFile: "Remover Imagen",
		init: function(){
			this.on("maxfilesexceeded", function(file){
				this.removeFile(file);
				document.getElementById('respuesa_servidor_error').innerHTML = "<center>Límite de documentos excedido</center>";
				$('#modal_respuesa_servidor_error').modal('show');
			});
		},
		success:function(file,response){
			id_imagen_contrato_encuesta = response;
			
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$('#upload_imgaen_usuario_encuesta').dropzone({
		url: "../api/api.php?accion= modelo que inserte imagen !!",		
		maxFiles: 1,
		addRemoveLinks: true,
		acceptedFiles: 'image/*',
		parallelUploads: 1,
		dictDefaultMessage: "Arrastra elementos aquí o da click.",
		dictResponseError: "Ha ocurrido un error en el server",
		dictRemoveFile: "Remover Imagen",
		init: function(){
			this.on("maxfilesexceeded", function(file){
				this.removeFile(file);
				document.getElementById('respuesa_servidor_error').innerHTML = "<center>Límite de documentos excedido</center>";
				$('#modal_respuesa_servidor_error').modal('show');
			});
		},
		success:function(file,response){
			id_imagen_imegen_usuario_encuesta = response;
			
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$('#btn_continuar').click(function(){
		
		//codigo para recorrer estrellas de calificacion c:
		// var calificaion="";
		// $("input[name=estrellas]").each(function(index){  
				// if($(this).is(':checked')){
					// calificaion = $(this).val();
				// }
				
		// });
		// alert(calificaion);
		
		var formulario_actual = parseInt($(this).data('id'));
		
		if(formulario_actual == 1){
			
			$(this).data('id',2);
			
			$('.formulario_1').hide('slow');
			
			$('.formulario_2').show('slow');
			
			$('.numero_formulario').html('PARTE 2');
			
			$('.panel-title').html('<i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i> <span class="texto">Datos Personales</span>');
			
		}
		
		if(formulario_actual == 2){
			
			$(this).data('id',3);
			
			$('.formulario_2').hide('slow');
			
			$('.formulario_3').show('slow');
			
			$('.numero_formulario').html('PARTE 3');
			
			$('.panel-title').html('<i class="fa fa-suitcase fa-2x" aria-hidden="true"></i> <span class="texto">Laboral</span>');
			
		}
		
		if(formulario_actual == 3){
			
			$(this).data('id',4);
			
			$('.formulario_3').hide('slow');
			
			$('.formulario_4').show('slow');
			
			$('.numero_formulario').html('PARTE 4');
			
			$('.panel-title').html('<i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i> <span class="texto">Referencias</span>');
			
		}
		
		if(formulario_actual == 4){
			
			$(this).data('id',5);
			
			$('.formulario_4').hide('slow');
			
			$('.formulario_5').show('slow');
			
			$('.numero_formulario').html('PARTE 5');
			
			$('.panel-title').html('<i class="fa fa-cloud-upload fa-2x" aria-hidden="true"></i> <span class="texto">Adjuntos</span>');
			
			
		}
		
		if(formulario_actual == 5){
			
			$(this).data('id',6);
			
			$('.formulario_5').hide('slow');
			
			$('.formulario_6').show('slow');
			
			$('.numero_formulario').html('PARTE 6');
			
			$('.panel-title').html('<i class="fa fa-check-square fa-2x" aria-hidden="true"></i> <span class="texto">Calificación</span>');
			
			$('#btn_continuar').html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Finalizar');
			
		}
	});
	
	
});