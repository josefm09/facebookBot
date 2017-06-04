$(document).ready(function(){
	
	chart = "";
	nombre_tema = "";
	id_clasificacion = 0;
	
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
						text: 'Votos en general'
					},

					subtitle: {
						text: 'Clasificaciones'
					},

					xAxis: {
						categories: [
						'OBRAS Y SERVICIOS',
						'CULTURA CÍVICA Y SEGURIDAD PÚBLICA', 
						'DESARROLLO ECONÓMICO Y COMPETITIVIDAD', 
						'DESARROLLO SOCIAL Y POLÍTICAS DE IGUALDAD'
						]
					},

					plotOptions: {
						series: {
							cursor: 'pointer',
							point: {
								events: {
									click: function () {
										nombre_tema = this.category;
										$('#clasificaciones').hide();
										$('#subclasificaciones').removeClass("hide");
										if(nombre_tema === 'OBRAS Y SERVICIOS'){
											id_clasificacion = 1;
											
											var parametros = {
												"accion":"votos_por_clasificacion",
												"tipo_accion":"modelo",
												"id_clasificacion":id_clasificacion
											}
											
											$.ajax({
												url:"../api/api.php",
												data:parametros,
												dataType:"json",
												success:function(data){
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
																data[0]['voto_total'],
																data[1]['voto_total'],
																data[2]['voto_total'],
																data[3]['voto_total'],
																data[4]['voto_total'],
																data[5]['voto_total'],
																data[6]['voto_total'],
																data[7]['voto_total'],
																data[8]['voto_total'],
																data[9]['voto_total'],
																data[10]['voto_total'],
																data[11]['voto_total'],
																data[12]['voto_total'],
																data[13]['voto_total']
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
											
										}
										if(nombre_tema === 'CULTURA CÍVICA Y SEGURIDAD PÚBLICA'){
											id_clasificacion = 2;
											
											var parametros = {
												"accion":"votos_por_clasificacion",
												"tipo_accion":"modelo",
												"id_clasificacion":id_clasificacion
											}
											$.ajax({
												url:"../api/api.php",
												data:parametros,
												dataType:"json",
												success:function(data){
													$('#column_subclasificaciones').highcharts({

														title: {
															text: 'Votos de subclasificaciones'
														},

														subtitle: {
															text: 'CULTURA CÍVICA Y SEGURIDAD PÚBLICA'
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
																data[0]['voto_total'],
																data[1]['voto_total'],
																data[2]['voto_total'],
																data[3]['voto_total'],
																data[4]['voto_total'],
																data[5]['voto_total']
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
										}
										if(nombre_tema === 'DESARROLLO ECONÓMICO Y COMPETITIVIDAD'){
											id_clasificacion = 3;
											
											var parametros = {
												"accion":"votos_por_clasificacion",
												"tipo_accion":"modelo",
												"id_clasificacion":id_clasificacion
											}

											$.ajax({
												url:"../api/api.php",
												data:parametros,
												dataType:"json",
												success:function(data){
													$('#column_subclasificaciones').highcharts({

														title: {
															text: 'Votos de subclasificaciones'
														},

														subtitle: {
															text: 'DESARROLLO ECONÓMICO Y COMPETITIVIDAD'
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
																data[0]['voto_total'],
																data[1]['voto_total'],
																data[2]['voto_total'],
																data[3]['voto_total'],
																data[4]['voto_total'],
																data[5]['voto_total'],
																data[6]['voto_total'],
																data[7]['voto_total']
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
										}
										if(nombre_tema === 'DESARROLLO SOCIAL Y POLÍTICAS DE IGUALDAD'){
											id_clasificacion = 4;
											
											var parametros = {
												"accion":"votos_por_clasificacion",
												"tipo_accion":"modelo",
												"id_clasificacion":id_clasificacion
											}
											$.ajax({
												url:"../api/api.php",
												data:parametros,
												dataType:"json",
												success:function(data){
													$('#column_subclasificaciones').highcharts({

														title: {
															text: 'Votos de subclasificaciones'
														},

														subtitle: {
															text: 'DESARROLLO SOCIAL Y POLÍTICAS DE IGUALDAD'
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
																data[0]['voto_total'],
																data[1]['voto_total'],
																data[2]['voto_total'],
																data[3]['voto_total'],
																data[4]['voto_total']
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
										}
									}
								}
							}
						}
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
});