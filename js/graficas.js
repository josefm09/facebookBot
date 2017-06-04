$(document).ready(function(){
	
	chart = "";
	
	$(function(){
		var parametros = {
			"accion":"votos_total_clasificacion",
			"tipo_accion":"modelo"
		}
		
		$.ajax({
			url:"../api/api.php",
			dataType:"json",
			data: parametros,
			success: function(data){
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
						data: [data['voto_uno'], data['voto_dos'], data['voto_tres'], data['voto_cuatro']],
						showInLegend: false
					}]

				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	$('.btn_mostrar_uno').click(function(){
		alert('mierda1');
		
		/*var id_clasificacion_uno = 1;

		var parametros = {
			"accion":"votos_por_clasificacion",
			"tipo_accion":"modelo",
			"id_clasificacion":id_clasificacion_uno
		}*/

		alert(id_clasificacion_uno);
		/*$.ajax({
			url:"../api/api.php",
			data:parametros,
			dataType:"json",
			success:function(data){
				alert('mierda');
				$('#column').hide();
				$('#sub-clasificaciones').removeClass("hide");
				$('#column_subclasificaciones').highcharts({

					title: {
						text: 'Chart.update'
					},

					subtitle: {
						text: 'Plain'
					},

					xAxis: {
						categories: [
							data[0]['nombre_sub_tema'],
							data[1]['nombre_sub_tema'],
							data[2]['nombre_sub_tema'],
							data[3]['nombre_sub_tema'],
							data[4]['nombre_sub_tema'],
							data[5]['nombre_sub_tema'],
							data[6]['nombre_sub_tema'],
							data[7]['nombre_sub_tema'],
							data[8]['nombre_sub_tema'],
							data[9]['nombre_sub_tema'],
							data[10]['nombre_sub_tema'],
							data[11]['nombre_sub_tema'],
							data[12]['nombre_sub_tema'],
							data[13]['nombre_sub_tema']
						]
					},

					series: [{
						type: 'column',
						colorByPoint: true,
						data: [
							data[0]['votos_clasificacion'],
							data[1]['votos_clasificacion'],
							data[2]['votos_clasificacion'],
							data[3]['votos_clasificacion'],
							data[4]['votos_clasificacion'],
							data[5]['votos_clasificacion'],
							data[6]['votos_clasificacion'],
							data[7]['votos_clasificacion'],
							data[8]['votos_clasificacion'],
							data[9]['votos_clasificacion'],
							data[10]['votos_clasificacion'],
							data[11]['votos_clasificacion'],
							data[12]['votos_clasificacion'],
							data[13]['votos_clasificacion']
						],
						showInLegend: false
					}]

				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});*/
	});
	$('.btn_mostrar_dos').click(function(){
		var id_clasificacion_dos = 2;

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
				$('#column').hide();
				$('#column_subclasificaciones').removeClass("hide");
				$('#column_subclasificaciones').highcharts({

					title: {
						text: 'Chart.update'
					},

					subtitle: {
						text: 'Plain'
					},

					xAxis: {
						categories: [
							data[0]['nombre_sub_tema'],
							data[1]['nombre_sub_tema'],
							data[2]['nombre_sub_tema'],
							data[3]['nombre_sub_tema'],
							data[4]['nombre_sub_tema'],
							data[5]['nombre_sub_tema']
						]
					},

					series: [{
						type: 'column',
						colorByPoint: true,
						data: [
							data[0]['votos_clasificacion'],
							data[1]['votos_clasificacion'],
							data[2]['votos_clasificacion'],
							data[3]['votos_clasificacion'],
							data[4]['votos_clasificacion'],
							data[5]['votos_clasificacion']
						],
						showInLegend: false
					}]

				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	$('.btn_mostrar_tres').click(function(){
		var id_clasificacion_tres = 3;

		var parametros = {
			"accion":"votos_por_clasificacion",
			"tipo_accion":"modelo",
			"id_clasificacion":id_clasificacion_uno
		};

		$.ajax({
			url:"../api/api.php",
			data:parametros,
			dataType:"json",
			success:function(data){
				$('#column').hide();
				$('#column_subclasificaciones').removeClass("hide");
				$('#column_subclasificaciones').highcharts({

					title: {
						text: 'Chart.update'
					},

					subtitle: {
						text: 'Plain'
					},

					xAxis: {
						categories: [
							data[0]['nombre_sub_tema'],
							data[1]['nombre_sub_tema'],
							data[2]['nombre_sub_tema'],
							data[3]['nombre_sub_tema'],
							data[4]['nombre_sub_tema'],
							data[5]['nombre_sub_tema'],
							data[6]['nombre_sub_tema'],
							data[7]['nombre_sub_tema']
						]
					},

					series: [{
						type: 'column',
						colorByPoint: true,
						data: [
							data[0]['votos_clasificacion'],
							data[1]['votos_clasificacion'],
							data[2]['votos_clasificacion'],
							data[3]['votos_clasificacion'],
							data[4]['votos_clasificacion'],
							data[5]['votos_clasificacion'],
							data[6]['votos_clasificacion'],
							data[7]['votos_clasificacion']
						],
						showInLegend: false
					}]

				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	$('.btn_mostrar_cuatro').click(function(){
		var id_clasificacion_cuatro = 4;

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
				$('#column').hide();
				$('#column_subclasificaciones').removeClass("hide");
				$('#column_subclasificaciones').highcharts({

					title: {
						text: 'Chart.update'
					},

					subtitle: {
						text: 'Plain'
					},

					xAxis: {
						categories: [
							data[0]['nombre_sub_tema'],
							data[1]['nombre_sub_tema'],
							data[2]['nombre_sub_tema'],
							data[3]['nombre_sub_tema'],
							data[4]['nombre_sub_tema']
						]
					},

					series: [{
						type: 'column',
						colorByPoint: true,
						data: [
							data[0]['votos_clasificacion'],
							data[1]['votos_clasificacion'],
							data[2]['votos_clasificacion'],
							data[3]['votos_clasificacion'],
							data[4]['votos_clasificacion']
						],
						showInLegend: false
					}]

				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
});