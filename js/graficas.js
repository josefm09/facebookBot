$(document).ready(function(){
	
	chart = "";
	
	chart = $('#column').highcharts({

		title: {
			text: 'Chart.update'
		},

		subtitle: {
			text: 'Plain'
		},

		xAxis: {
			categories: ['<button id="btn_mostrar_uno" class="btn btn-link btn-lg btn-block btn-huge btn_mostrar_uno" data-id="1">OBRAS Y SERVICIOS</button>', '<button class="btn btn-link btn-lg btn-block btn-huge btn_mostrar_dos" data-id="2">CULTURA CÍVICA Y SEGURIDAD PÚBLICA</button>', '<button class="btn btn-link btn-lg btn-block btn-huge btn_mostrar_tres" data-id="3">DESARROLLO ECONÓMICO Y COMPETITIVIDAD</button>', '<button class="btn btn-link btn-lg btn-block btn-huge btn_mostrar_cuatro" data-id="4">DESARROLLO SOCIAL Y POLÍTICAS DE IGUALDAD</button>']
		},

		series: [{
			type: 'column',
			colorByPoint: true,
			data: [31.5, 79, 102, 12],
			showInLegend: false
		}]

	});
	
	$('.btn_mostrar_uno').click(function(){
		var id_clasificacion_uno = 1;
		alert(id_clasificacion_uno);
		var parametros = {
			"accion":"votos_por_clasificacion",
			"tipo_accion":"modelo",
			"id_clasificacion":id_clasificacion_uno
		}
		$.ajax({
			url:"../api/api.php",
			data:parametros,
			dataType:"json",
			success:function(data){
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	$('.btn_mostrar_dos').click(function(){
		var id_clasificacion_dos = 2;
		alert(id_clasificacion_dos);
		var parametros = {
			"accion":"votos_por_clasificacion",
			"tipo_accion":"modelo",
			"id_clasificacion":id_clasificacion_uno
		}
		$.ajax({
			url:"../api/api.php",
			data:parametros,
			dataType:"json",
			success:function(data){
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	$('.btn_mostrar_tres').click(function(){
		var id_clasificacion_tres = 3;
		alert(id_clasificacion_tres);
		var parametros = {
			"accion":"votos_por_clasificacion",
			"tipo_accion":"modelo",
			"id_clasificacion":id_clasificacion_uno
		}
		$.ajax({
			url:"../api/api.php",
			data:parametros,
			dataType:"json",
			success:function(data){
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	$('.btn_mostrar_cuatro').click(function(){
		var id_clasificacion_cuatro = 4;
		alert(id_clasificacion_cuatro);
		var parametros = {
			"accion":"votos_por_clasificacion",
			"tipo_accion":"modelo",
			"id_clasificacion":id_clasificacion_uno
		}
		$.ajax({
			url:"../api/api.php",
			data:parametros,
			dataType:"json",
			success:function(data){
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
});