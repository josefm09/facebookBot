$(document).ready(function(){
	
	$('#mostrar_peticiones').append('<tr><td><strong>hola</strong></td></tr>');
	
	$(function (){
		var parametros = {
			"accion":"select_peticion",
			"accion":"modelo",
		}
		$.ajax({
			url: '../api/api.php',
			type: 'POST',
			dataType: 'json',
			data = parametros,
			success:function(data){
				$(data).each(function(i,v){
					alert(v.id_peticion);
					//$('#mostrar_peticiones').append('<tr><td><strong>hola</strong></td></tr>');
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