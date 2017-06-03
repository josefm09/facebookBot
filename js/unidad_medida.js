$(document).ready(function(){
	
	// $id_empresa = $_SESSION['id_empresa'];
	// $id_sucursal = $_SESSION['id_sucursal'];
	

	consulta();
	
	
	
	$('#btn_unidad').click(function(){
		
		var parametros = {
			"accion": "almacenar_unidad",
			"tipo_accion": "modelo",
			"unidad": $("#txt_unidad").val()
			
		};
		
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				var respuesta_servidor = (data["respuesta_servidor"]);//Mensaje a mostrar al usuario
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
		consulta();
	});
	
	
	$('#carga_unidad').on('click', '#btn_modificar', function(){
		
		var id_unidad = $(this).data('id');
	
		
		var parametros_consulta = {
			"accion": "consultar_unidad_medida_modificar",
			"tipo_accion": "modelo",
			"id_unidad": id_unidad
		};
		
		
		$.ajax({
			url: '../api/api.php',
			dataType: 'json',
			data: parametros_consulta,
			success:function(data){
				$(data).each(function(i,v){
					$('#txt_unidad_modificada').val(v.unidad);
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
			}
		});
		
		$('#btn_unidad_modificada').click(function(){
			
			var unidad_medida = $('#txt_unidad_modificada').val();
			var parametros_modificar = {
				"accion": "modificar_unidad_medida",
				"tipo_accion": "modelo",
				"id_unidad": id_unidad,
				"unidad_medida": unidad_medida
			};
		
		
			$.ajax({
				url: '../api/api.php',
				type: 'POST',
				data: parametros_modificar,
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
			consulta();
		});
		
	});
	
	
	
});


function consulta() {
	$('#carga_unidad').empty();
	var parametros_consulta = {
			"accion": "consultar_unidad_medida",
			"tipo_accion": "modelo"
		};
		
	$.ajax({
			url: '../api/api.php',
			dataType: 'json',
			data: parametros_consulta,
			success:function(data){
				// alert(data);
				$(data).each(function(i,v){
				
					$('#carga_unidad').append(
						'<tr>'+
							'<td>'+v.unidad+'</td>'+
							'<td><button type="button" class="btn btn-danger" id="btn_modificar" data-id='+v.id_unidad_medida+' data-toggle="modal" data-target="#modal_modificar">Modificar</button></td>'+
						'</tr>'
					);
					
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
			}
		});
}