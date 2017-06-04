$(document).ready(function(){
	id_propuesta = 0;
	
	$(function(){
		var parametros = {	
		"accion":"select_peticiones",
		"tipo_accion":"modelo"
		};
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				id_propuesta = 0;
				$(data).each(function(i,v){
					id_propuesta = v.id_propuesta;
					consulta_tema_por_id(id_propuesta);
					
					$('#mostrar_peticiones').append('<tr data-id="'+ id_propuesta +'"><td>'+ id_propuesta +'</td><td>'+ v.titulo +'</td><td>'+ datos_tema[0] +'</td><td>'+ v.problematica +'</td></tr>');
	
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});		
	});
	
	
	$('#mostrar_peticiones').on('click','tr', function (){
		
		var id_propuesta_buscar = $(this).data('id');
		
		var parametros = {	
			"accion":"consultar_informacion_por_id",
			"tipo_accion":"modelo",
			"id_propuesta_buscar": id_propuesta_buscar
		};
		
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data: parametros,
			success:function(data){
				$('#tema_propuesta').html(data.datos_tema.nombre_tema + ' ');
				$('#sub_tema_propuesta').html(data.datos_tema.nombre_subtema);
				$('#titulo_propuesta').html(data.datos_propuesta.titulo);
				$('#problematica_propuesta').html(data.datos_propuesta.problematica);
				$('.imagen_propuesta').html('<img src="../imagenes/imagenes/'+data.nombre_completo+'" width="150px" height="200px"/>');
				$('#solucion_propuesta').html(data.datos_propuesta.solucion);
				$('#dlg_consulta_datos').modal('show');
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
			
	});
	
	
function consulta_tema_por_id (id_propuesta) {
	datos_tema = Array();
	var parametros = {	
		"accion":"consultar_tema_por_id",
		"tipo_accion":"modelo",
		"id_propuesta": id_propuesta
	};
	
	$.ajax({
		url: '../api/api.php',
		type: 'POST',
		dataType: 'json',
		data: parametros,
		success:function(data){
			datos_tema[0] = data.nombre_subtema;
			datos_tema[1] = data.nombre_tema;
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	return datos_tema;
}
	
});
