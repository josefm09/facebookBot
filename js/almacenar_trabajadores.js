/*
* Creado por AlexisDos
* Marzo de 2017
* usuario_wp21@hotmail.com
*/

/*
* manda la imagen atravez del dropzone al archivo php en modelo almacenar_imagen_trabajador
*
* imprime el id de la imgen almacenada traida desde el php almacenar_imagen_trabajador
*
*/

$(document).ready(function(){
	// Dropzone.autoDiscover = false;
	
	// consultar_privilegio();
	
	// id_imagen = "";
	
	// $('#upload_imagen_trabajador').dropzone({
		// url: "../api/api.php?accion=almacenar_imagen_trabajador&tipo_accion=modelo",		
		// maxFiles: 1,
		// addRemoveLinks: true,
		// acceptedFiles: 'image/*',
		// parallelUploads: 1,
		// dictDefaultMessage: "Arrastra elementos aquí o da click.",
		// dictResponseError: "Ha ocurrido un error en el server",
		// dictRemoveFile: "Remover Imagen",
		// init: function(){
			// this.on("maxfilesexceeded", function(file){
				// this.removeFile(file);
				// document.getElementById('respuesa_servidor_error').innerHTML = "<center>Límite de documentos excedido</center>";
				// $('#modal_respuesa_servidor_error').modal('show');
			// });
		// },
		// success:function(file,response){
			// var response_text = JSON.parse(response);
			// id_imagen = response_text.id_imagen;
		// },
		// error: function(xhr, desc, err){
			// console.log(xhr);
			// console.log("Details: " + desc + "\nError:" + err);
		// }
	// });
	
	$.ajax({
		url: '../api/api.php',
		data: {
			"accion": "consultar_prioridades_permitidas",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			$(data).each(function(i, v){
				$('#txt_tipo_trabajador').append('<option value="' + v.nombre_prioridad + '">' + v.nombre_en_vista + '</option>');
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$.ajax({
		url: '../api/api.php',
		data: {
			"accion": "consultar_llaves_de_session",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			if(data.nombre_prioridad === "mucaama_master" || data.nombre_prioridad === "dbm_v3_admin_empresa"){
				if(data.nombre_prioridad === "mucaama_master"){
					$.ajax({
						url: '../api/api.php',
						data: {
							"accion": "consultar_empresa_por_estatus",
							"tipo_accion": "modelo",
							"estatus": 1
						},
						type: 'post',
						dataType: 'json',
						success: function(data){
							$(data).each(function(i,v){
								$("#txt_empresa").append('<option value="' + v.id + '">' + v.nombre + '</option>');
							});
						},
						error: function(xhr, desc, err){
							console.log(xhr);
							console.log("Details: " + desc + "\nError:" + err);
						}
					});	
				}
			}
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$('#txt_empresa').on("change", function(data){
		$('#txt_sucursal').empty();
		$("#txt_sucursal").append('<option value="">Seleccione una Sucursal</option>');
		$.ajax({
			url: '../api/api.php',
			data: {
				"accion": "consultar_sucursal_por_empresa",
				"tipo_accion": "modelo",
				"id_empresa": $(this).val()
			},
			type: 'post',
			dataType: 'json',
			success: function(data){
				$(data).each(function(i,v){
					$("#txt_sucursal").append('<option value="' + v.id + '">' + v.nombre + '</option>');
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});	
	});	 	
	
	$('#btn_seleccionar_usuario').click(function(){

		if($('#search-box1').val() != ""){
			var array = $('#search-box1').val().split(' - ');
			var id_producto = array[0];

			$.ajax({
				url: '../api/api.php',
				data: {
					"accion": "consultar_productos_por_id",
					"tipo_accion": "modelo",
					"id_producto": id_producto
				},
				type: 'post',
				dataType: 'json',
				success: function(data){
					$('.solo_actualizar').show('slow');
					$('#txt_Id_producto').val(id_producto);
					$('#txt_estatus').val('activo');
					$('#txt_nombre').val(data.nombre);

					$('#search-box1').val('');
					$("#search_suggestion_holder1").html('');
					$('#dlgProducto').modal('hide');
				},
				error: function(xhr, desc, err){
					console.log(xhr);
					console.log("Details: " + desc + "\nError:" + err);
				}
			});
		}
	});

	//*****************************
	// Instantiate the Bloodhound suggestion engine
	 var productos = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			'cache': false,
			url: "../api/api.php?tipo_accion=modelo&accion=consultar_trabajador_por_nombre",

			replace: function(url, uriEncodedQuery) {
				
				return url + '&q=' + uriEncodedQuery

			},
			wildcard: '%QUERY',
			filter: function (data) {
				return data;
			}
		}
	});

	// Initialize the Bloodhound suggestion engine
	productos.initialize();
	
	$("#search-box").typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},
	{
		name: "result",
		displayKey: "nombre",
		source: productos.ttAdapter()
	}).bind("typeahead:selected", function(obj, datum, name) {
		$(this).data("id", datum.id_producto);
	});
});

function consultar_privilegio(){
	$.ajax({
		url: '../api/api.php',
		data: {
			"accion": "consultar_nivel_privilegio",
			"tipo_accion": "modelo"
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			var respuesta_privilegio = (data["privilegio_administrativo"]);
			if(respuesta_privilegio == 2)
				{
					$.ajax({									
						url: '../api/api.php',
						type: 'POST',
						dataType: 'json',
						data:{
							"accion": "consultar_sucursal_de_empresa",
							"tipo_accion": "modelo"
						},
						success:function(data){
							$(data).each(function(i,v){
								$("#txt_sucursal").append('<option value="' + v.id + '">' + v.nombre + '</option>');
							});							
						},
						
						//Si el request falla genera mensajes de errores de posibles eventos comunes
						error:function(x,e,xre) {
							
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
		},
		error:function(x,e,xre) 
			{			
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
