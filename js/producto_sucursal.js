$(document).ready(function(){
		
		
		var parametros = {
			"accion": "consultar_productos_por_estatus",
			"tipo_accion": "modelo"
		};
		
		$.ajax({
			url: '../api/api.php',
			data: parametros,
			dataType: 'json',
			success: function(data){
				// alert(data);
				$(data).each(function(i,v){					
					$('#tbl_productos').append(
						'<tr>'+
							'<td></td>'+
							'<td>' + v.nombre + '</td>'+
							'<td>' + v.clasificacion + '</td>'+
							'<td><button class="btn btn-warning btn-xs btn_abrir_modal" data-nombre_producto="'+ v.nombre +'" data-id_producto="' + v.id_producto + '">Activar</button></td>"'+
						'</tr>'
					);
				});
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
		
		$('#tbl_productos').on('click', '.btn_abrir_modal', function(){
			var nombre = $(this).data('nombre_producto');
			$("#titulo_modal").html(nombre);
			$('#modal_producto').modal('toggle');
			
			var id_producto = $(this).data('id_producto');
			
			
			$('#txt_cantidad').focus();
			
			$('#txt_cantidad').keyup(function(){
				var cantidad = $(this).val();
				
				if(cantidad == ''){
					$(this).css('border', 'solid 1px #ff0000');
				}else{
					$('#txt_cantidad').css('border', 'solid 1px #cecece');
				}
			});
			
			$('#txt_cantidad_minima').keyup(function(){
				var cantidad_minima = $(this).val();
				
				if(cantidad_minima == ''){
					$(this).css('border', 'solid 1px #ff0000');
				}else{
					$('#txt_cantidad_minima').css('border', 'solid 1px #cecece');
				}
			});
			
			$('#txt_cantidad_maxima').keyup(function(){
				var cantidad_maxima = $(this).val();
				
				if(cantidad_maxima == ''){
					$(this).css('border', 'solid 1px #ff0000');
				}else{
					$('#txt_cantidad_maxima').css('border', 'solid 1px #cecece');
				}
			});
			
			$('#txt_precio_compra').keyup(function(){
				var precio_compra = $(this).val();
				
				if(precio_compra == ''){
					$(this).css('border', 'solid 1px #ff0000');
				}else{
					$('#txt_precio_compra').css('border', 'solid 1px #cecece');
				}
			});
			
			$('#txt_precio_venta').keyup(function(){
				var precio_venta = $(this).val();
				
				if(precio_venta == ''){
					$(this).css('border', 'solid 1px #ff0000');
				}else{
					$('#txt_precio_venta').css('border', 'solid 1px #cecece');
				}
			});
			
			$("#btn_actualizar").click(function(){
				
				if(
					id_producto != '' &&
					$("#txt_cantidad").val() != '' &&
					$("#txt_cantidad_minima").val() != '' &&
					$("#txt_cantidad_maxima").val() != '' &&
					$("#txt_precio_compra").val() != '' &&
					$("#txt_precio_venta").val() != ''
				)
				{
					// alert(id_producto);
					var parametros = {
						"accion": "modificar_estatus_producto",
						"tipo_accion": "modelo",
						"id_producto" : id_producto,
						"existencia_actual" : $("#txt_cantidad").val(),
						"cantidad_minima" : $("#txt_cantidad_minima").val(),
						"cantidad_maxima" : $("#txt_cantidad_maxima").val(),
						"precio_compra" : $("#txt_precio_compra").val(),
						"precio_venta" : $("#txt_precio_venta").val()
					};
					$('#modal_producto').modal('hide');
					$.ajax({
						url: '../api/api.php',
						data: parametros,
						type: 'POST',
						dataType: 'json',
						success: function(data){
							// alert(data);
							var time = 1000;
							if(data == "success")
							{
								$('#dlgActulizar').modal('toggle');
								setTimeout(function(){
									$('#dlgActulizar').modal('toggle');						
									cargar_vista('relacion_producto_sucursal');
								}, time);
								
							}
							else
							{
								time = 3000;
								$('#dlgActulizar').modal('toggle');
								setTimeout(function(){
									$('#tituloProcesaCobro').html('¡Error al realizar el movimiento!');
									$('#mensaje').html(data);
									$('#dlgActulizar').modal('toggle');
								}, time);
							}
						},
						error: function(xhr, desc, err){
							console.log(xhr);
							console.log("Details: " + desc + "\nError:" + err);
						}
					});
					
				}
				else
				{
					if($('#txt_cantidad').val() == ''){
						$('#txt_cantidad').css('border', 'solid 1px #ff0000');
					}else{
						$('#txt_cantidad').css('border', 'solid 1px #cecece');
					}
					
					if($('#txt_cantidad_minima').val() == ''){
						$('#txt_cantidad_minima').css('border', 'solid 1px #ff0000');
					}else{
						$('#txt_cantidad_minima').css('border', 'solid 1px #cecece');
					}
					
					if($("#txt_cantidad_maxima").val() == ''){
						$('#txt_cantidad_maxima').css('border', 'solid 1px #ff0000');
					}else{
						$('#txt_cantidad_maxima').css('border', 'solid 1px #cecece');
					}
					if($("#txt_precio_compra").val() == ''){
						$('#txt_precio_compra').css('border', 'solid 1px #ff0000');
					}else{
						$('#txt_precio_compra').css('border', 'solid 1px #cecece');
					}
					if($("#txt_precio_venta").val() == ''){
						$('#txt_precio_venta').css('border', 'solid 1px #ff0000');
					}else{
						$('#txt_precio_venta').css('border', 'solid 1px #cecece');
					}
				}		
				
			});
			$('#btn_cerrar').click(function(){
				limpiar_modal();
				
			});
			
			
		});	
});

function limpiar_modal(){
	$('#txt_cantidad').val('');
	$('#txt_cantidad_minima').val('');
	$('#txt_cantidad_maxima').val('');
	$('#txt_precio_compra').val('');
	$('#txt_precio_venta').val('');
}