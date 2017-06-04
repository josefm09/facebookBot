$(document).ready(function(){
	$('.formulario_2').hide();
	$('.formulario_3').hide();
	$('.formulario_4').hide();
	
		
	$('#btn_continuar').data('id',1);
	$('#btn_regresar').data('id',1);



	$('#btn_continuar').click(function(){
		
		var formulario_actual= parseInt($(this).data('id'));
		
		if(formulario_actual == 1){
			$(this).data('id',2);
			$('#btn_regresar').data('id',2);
			$('.formulario_1').hide('slow');
			$('.formulario_2').show('slow');
			$('.numero_formulario').html('PARTE 2');
		}	
		if(formulario_actual == 2){
			$(this).data('id',3);
			$('#btn_regresar').data('id',3);
			$('.formulario_2').hide('slow');
			$('.formulario_3').show('slow');
			$('.numero_formulario').html('PARTE 3');
		}
		if(formulario_actual == 3){
			$(this).data('id',4);
			$('#btn_regresar').data('id',4);
			$('.formulario_3').hide('slow');
			$('.formulario_4').show('slow');
			$('.numero_formulario').html('PARTE 4');
			$('#btn_continuar').html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Finalizar');
		}	
		
		if(formulario_actual == 4){
			almacenar_propuesta();
		}	
		
	});
	
	$('#btn_regresar').click(function(){
		
		var formulario_actual= parseInt($(this).data('id'));
		
		if(formulario_actual == 2){
			$(this).data('id',1);
			$('#btn_continuar').data('id',1);
			$('.formulario_2').hide('slow');
			$('.formulario_1').show('slow');
			$('.numero_formulario').html('PARTE 1');
		}	
		if(formulario_actual == 3){
			$(this).data('id',2);
			$('#btn_continuar').data('id',3);
			$('.formulario_3').hide('slow');
			$('.formulario_2').show('slow');
			$('.numero_formulario').html('PARTE 2');
		}
		if(formulario_actual == 4){
			$(this).data('id',3);
			$('#btn_continuar').data('id',3);
			$('.formulario_4').hide('slow');
			$('.formulario_3').show('slow');
			$('.numero_formulario').html('PARTE 3');
			$('#btn_continuar').html('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Siguiente');
		}	
		
	});
	
	id_imagen_propuesta = "";
	
	$('#upload_imgaen_propuesta').dropzone({
		url: "../api/api.php?accion=almacenar_imagen&tipo_accion=modelo",		
		maxFiles: 1,
		addRemoveLinks: true,
		acceptedFiles: 'image/*',
		parallelUploads: 1,
		dictDefaultMessage: "Para <strong>Adjuntar</strong> da clic aquí o arrastra un elemento.",
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
			id_imagen_propuesta = response;
			
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	var parametros = {	
	"accion":"select_temas",
	"tipo_accion":"modelo"
	};
	$.ajax({
		url: '../api/api.php',
		type: 'POST',
		dataType: 'json',
		data: parametros,
		success:function(data){
			$(data).each(function(i,v){
				$('#txt_id_tema').append(
					'<option id="'+v.id_tema+'">'+ v.tema + '</option>'
				);
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});	
	
	
	$('#txt_id_tema').on('change', function () {
		var seleccionado = $('#txt_id_tema').find(":selected"); //This works
		//alert(seleccionado.attr('id'));
		$('#txt_id_subtema').empty();
		if(seleccionado.val() == 'Seleccionar tema (Obligatorio)') {
			$('#txt_id_subtema').append('<option>Seleccionar subtema (Obligatorio)</option>');
			return;
		}
		var parametros = {	
			"accion":"select_subtemas_por_id_tema",
			"tipo_accion":"modelo",
			"id_tema": seleccionado.attr('id')
		};

		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				$(data).each(function(i,v){
					
					$('#txt_id_subtema').append(
						'<option value="'+v.id_sub_tema+'">'+ v.sub_tema + '</option>'
					);
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});		
	});
	
	
	
	function almacenar_propuesta(){
		var parametros = {
			'accion' : 'almacenar_propuesta',
			'tipo_accion' : 'modelo',
			'titulo' : $('#txt_titulo_propuesta').val(),
			'problematica' : $('#txt_problema').val(),
			'solucion' : $('#txt_propuesta').val(),
			'id_subtema' : $('#txt_id_subtema').val(),
			'id_imagen' : id_imagen_propuesta
		};
		
		$.ajax({
				url: '../api/api.php',
				type: 'POST',
				dataType: 'json',
				data: parametros,
				success:function(data){
					var estatus_request = (data["estatus_request"]);//Notifica el estatus del query
					var respuesta_servidor = (data["respuesta_servidor"]);//Mensaje a mostrar al usuario

					// Si el servidor retorna un error
					if(estatus_request == "error")
					{
						$('#modal_respuesa_servidor_error').modal('show');
						document.getElementById('respuesa_servidor_error').innerHTML = respuesta_servidor;
						$("#reset_password_usuario").focus(); //Pasa el focus al punto de inicio del formulario
					}

					// Si no hay errores
					if(estatus_request == "success")
					{
						$('#modal_respuesa_servidor_success').modal('show');
						document.getElementById('respuesa_servidor_success').innerHTML = respuesta_servidor;

						// Cierra el modal despues de 3 segundos
						setTimeout(function(){
							$("#modal_respuesa_servidor_success").modal('hide');
						}, 3000);
						cargar_vista('crear_cliente');//Recarga la vista para limpiar todo el form
					}
				},
				// Si el request falla genera mensajes de errores de posibles eventos comunes
				error:function(x, desc, e) {
					console.log(x);
					console.log("Details: " + desc + "\nError:" + e);
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
	}
		
});