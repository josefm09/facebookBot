$(document).ready(function(){
	nombre_tema = "";
	
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
				$(data).each(function(i,v){
					consulta_tema_por_id(v.tema);
					alert(nombre_tema);
					//$('#mostrar_peticiones').append('<tr><td data-id="'+ v.id_peticion +'">'+ v.id_peticion +'</td><td>'+ v.id_peticion +'</td><td data-id="'+ v.id_peticion +'">'+ v.id_peticion +'</td><td data-id="'+ v.id_peticion +'">'+ v.id_peticion +'</td></tr>');
	
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});		
	});
	
	
	/*$('#mostrar_peticion').on('click', function (){
		alert();
	});*/
	
});

function consulta_tema_por_id(id_tema){
	nombre_tema = "";
	var id_tema = id_tema;
	var parametros = {	
		"accion":"consulta_tema_por_id",
		"tipo_accion":"modelo",
		"id_tema": id_tema
	};
	
	$.ajax({
		url: '../api/api.php',
		type: 'POST',
		dataType: 'json',
		data: parametros,
		success:function(data){
			alert(data);
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
}