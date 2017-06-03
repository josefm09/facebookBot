 $(document).ready(function(){

	// $('#btn_actualizar').click(function() {
    // var cadena = $('#search-box').val().split(' - ');
    // var parametros={
			// "accion": "consultar_proveedor",
			// "tipo_accion": "modelo",
      // "keyword":cadena[0],
    // };
		// if(cadena[0] != ""){
			// $.ajax({
				// type: 'POST',
				// dataType: 'json',
				// url: '../api/api.php',
				// data: parametros,
				// success: function(data) {
					// $('.solo_actualizar').show();

					// $('#txt_id_proveedor').val(data.id);
					// $('#txt_nombre').val(data.nombre);
					// $('#txt_correo').val(data.correo);
					// $('#txt_ciudad').val(data.ciudad);
					// $('#txt_colonia').val(data.colonia);
					// $('#txt_calle').val(data.calle);
					// $('#txt_Estatus option[value="' + data.estatus + '"]').prop("selected", true);
					// $('#txt_telefono').val(data.telefono);
					// $('#txt_razon').val(data.razon);
					// $('#txt_rfc').val(data.rfc);
					// $('#txt_estado').val(data.estado);
					// $('#txt_cp').val(data.cp);

					// $('#search-box').val('');
					// $('#btn_cerrar').click();
					// $('#txt_nombre').focus();
			   // },
			   // error: function(xhr, desc, err){
					// console.log(xhr);
					// console.log("Details: " + desc + "\nError:" + err);
			   // }
			// });
		// }
	// });

	// $('#btn_cerrar').click(function() {
		// if($('#dlgGuardar').is(':visible'))
			// $('#dlgGuardar').modal('hide');
		// if($('#dlgProveedor').is(':visible'))
			// $('#dlgProveedor').modal('hide');
		// $('#txt_nombre').focus();
	// });

	$('#btn_guardar').click(function() {

		if($('#txt_nombre_proveedor').val() != "" && $('#txt_lada_tlefono_1_proveedor').val() != "" && $('#txt_telefono_1_proveedor').val() != "" && $('#txt_tipo_telefono_1_proveedor').val() != "" && $('#txt_calle_proveedor').val() != "" && $('#txt_numero_proveedor').val() != "" && $('#txt_correo_proveedor').val() != "" && $('#txt_colonia_proveedor').val() != "" && $('#txt_ciudad_proveedor').val() != "" && $('#txt_estado_proveedor').val() != "" && $('#txt_razon_social').val() != "" && $('#txt_rfc').val() != "" && $('#txt_direccion_fiscal').val() != "" && $('#txt_colonia_fiscal').val() != "" && $('#txt_ciudad_fiscal').val() != "" && $('#txt_estado_fiscal').val() != "" && $('#txt_codigo_postal').val() != ""){
			
			var parametros = {
				"accion": "almacenar_proveedor",
				"tipo_accion": "modelo",
				"nombre_proveedor": $('#txt_nombre_proveedor').val(),
				"lada_tlefono_1_proveedor": $('#txt_lada_tlefono_1_proveedor').val(),
				"telefono_1_proveedor": $('#txt_telefono_1_proveedor').val(),
				"tipo_telefono_1_proveedor": $('#txt_tipo_telefono_1_proveedor').val(),
				"lada_tlefono_2_proveedor": $('#txt_lada_tlefono_2_proveedor').val(),
				"telefono_2_proveedor": $('#txt_telefono_2_proveedor').val(),
				"tipo_telefono_2_proveedor": $('#txt_tipo_telefono_2_proveedor').val(),
				"calle_proveedor": $('#txt_calle_proveedor').val(),
				"numero_proveedor": $('#txt_numero_proveedor').val(),
				"colonia_proveedor": $('#txt_colonia_proveedor').val(),
				"correo_proveedor": $('#txt_correo_proveedor').val(),
				"id_estado_proveedor": $('#txt_id_estado_proveedor').val(),
				"id_municipio_proveedor": $('#txt_id_municipio_proveedor').val(),
				"ciudad_proveedor": $('#txt_ciudad_proveedor').val(),
				"razon_social": $('#txt_razon_social').val(),
				"rfc": $('#txt_rfc').val(),
				"direccion_fiscal": $('#txt_direccion_fiscal').val(),
				"colonia_fiscal": $('#txt_colonia_fiscal').val(),
				"id_estado_fiscal": $('#txt_id_estado_fiscal').val(),
				"id_municipio_fiscal": $('#txt_id_municipio_fiscal').val(),
				"ciudad_fiscal": $('#txt_ciudad_fiscal').val(),
				"codigo_postal": $('#txt_codigo_postal').val()
				
			};


			$.ajax({
				url:'../api/api.php',
				type: 'post',
				data: parametros,
				success:function(data){
					alert(data);
					var time = 1000;
					if(data == "success"){
						$('#dlgAlmacenar').modal('toggle');
						setTimeout(function(){
							$('#dlgAlmacenar').modal('hide');						
							cargar_vista('proveedor');
						}, time);
					}
					else{
						time = 3000;
						$('#dlgAlmacenar').modal('toggle');
						setTimeout(function(){
							$('#tituloProcesaCobro').html('¡Error al realizar el movimiento!');
							$('#mensajeProcesaCobro').html(data);
							$('#dlgAlmacenar').modal('hide');
						}, time);
					}
				}
			});
		}
		// else{
			// var error = '';
			// $('#tituloProcesaCobro').html('¡Error al realizar el movimiento!');

			// if($('#txt_nombre').val() == ""){
				// error = "<div class='text-danger'><h4> Nombre debe ser diferente a vacio </h4> </div>";
				// setTimeout(function(){
					// $('#txt_nombre').focus();
				// }, 2100);
			// }
			// if($('#txt_telefono').val() == ""){
				// error += "<div class='text-danger'><h4> Debe capturar al menos un teléfono </h4> </div>";
				// setTimeout(function(){
					// $('#txt_telefono').focus();
				// }, 2100);
			// }

			// $('#mensajeProcesaCobro').html(error);
			// $('#dlgAlmacenar').modal('toggle');
			// setTimeout(function(){
				// $('#tituloProcesaCobro').html('¡Finalizamos!');
				// $('#mensajeProcesaCobro').html('Tarea Procesada');
				// $('#dlgAlmacenar').modal('hide');
			// }, 2000);
		// }
	});

	// $('#btnProveedor').click(function() {
		// if($('#dlgProveedor').is(':hidden')){
			// setTimeout(function(){
				// $('#search-box').focus();
			// }, 400);
		// }else{
			// setTimeout(function(){
				// $('#txt_nombre').focus();
			// }, 400);
		// }
	// });

	// $('#btnSalir').click(function() {
		// window.location.href = "../../index.php";
	// });

	// $('.solo_actualizar').hide();

	// $('#txt_nombre').focus();

	// var util = { };
	// document.addEventListener('keydown', function(e){
		// var key = util.key[e.which];

		// if( key ){
			// e.preventDefault();
		// }

		// if( key === 'end'){
			// $('#btnSalir').click();
		// }

		// if( key === 'F1' ){
			// $('#btn_guardar').click();
		// }

		// if( key === 'F2' ){
			// $('#btnProveedor').click();
		// }

		// if( key === 'F5' ){
			// limpiar();
		// }

	// })
	// util.key = {

	  // 13: "enter",
	  // 16: "shift",
	  // 18: "alt",
	  // 27: "esc",
	  // 33: "rePag",
	  // 34: "avPag",
	  // 35: "end",
	  // 36: "home",
	  // 37: "left",
	  // 38: "up",
	  // 39: "right",
	  // 40: "down",
	  // 46: "del",
	  // 112: "F1",
	  // 113: "F2",
	  // 114: "F3",
	  // 115: "F4",
	  // 116: "F5",
	  // 117: "F6",
	  // 118: "F7",
	  // 119: "F8",
	  // 120: "F9",
	  // 121: "F10",
	  // 122: "F11",
	  // 123: "F12"
	// }
	
	$.ajax({
		url: '../api/api.php',
		data: {
			"accion": "estados_disponibles",
			"tipo_accion": "modelo",
			"estatus": 1
		},
		type: 'post',
		dataType: 'json',
		success: function(data){
			$(data).each(function(i,v){

				$("#txt_id_estado_proveedor").append('<option value="' + v.id + '">' + v.estado + '</option>');
				$("#txt_id_estado_fiscal").append('<option value="' + v.id + '">' + v.estado + '</option>');
				
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
	
	$("#txt_id_estado_proveedor").change(function(){
		$("#txt_id_municipio_proveedor").empty();
		$("#txt_id_municipio_proveedor").append('<option>Seleccione un municipio...</option>');

		$.ajax({
			url: '../api/api.php',
			data: {
				"accion": "poblar_municipios",
				"tipo_accion": "modelo",
				"id_estado": $('#txt_id_estado_proveedor').val()
			},
			type: 'post',
			dataType: 'json',
			success: function(data){
				$(data).each(function(i,v){
					$("#txt_id_municipio_proveedor").append('<option value="' + v.id + '">' + v.municipio + '</option>');
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	$("#txt_id_estado_fiscal").change(function(){
		$("#txt_id_municipio_fiscal").empty();
		$("#txt_id_municipio_fiscal").append('<option>Seleccione un municipio...</option>');
		$.ajax({
			url: '../api/api.php',
			data: {
				"accion": "poblar_municipios",
				"tipo_accion": "modelo",
				"id_estado": $('#txt_id_estado_fiscal').val()
			},
			type: 'post',
			dataType: 'json',
			success: function(data){
				$(data).each(function(i,v){
					$("#txt_id_municipio_fiscal").append('<option value="' + v.id + '">' + v.municipio + '</option>');
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	

});

// var cronometro = null;

// autocomplete("","?reporte=2");

// function autocomplete(n,r){
	// $(document).ready(function(){
		// var timer = null;
		// $(document).mouseover(function(e){
			// $("#search_suggestion_holder" + n + " li").css("color","#000");
			// $("#search_suggestion_holder" + n + " li").css("background","#fff");
			// $("#search_suggestion_holder" + n + " li:hover").css("color","#fff");
			// $("#search_suggestion_holder" + n + " li:hover").css("background","#428bca");
			// $("#search_suggestion_holder" + n + " li.active").removeClass('active');
		// });
		// $('#search-box'+n).keyup(function(e){
			// if( e.keyCode ==38 ){
				// if( $("#search_suggestion_holder" + n).is(':visible') ){
					// if( ! $('.active').is(':visible') ){
						// $('#search_suggestion_holder'+n+' li').last().addClass('active');
					// }else{
						// var i =  $('#search_suggestion_holder'+n+' li').index($("#search_suggestion_holder" + n + " li.active")) ;
						// $("#search_suggestion_holder" + n + " li.active").removeClass('active');
						// i--;
						// $('#search_suggestion_holder'+ n +' li:eq('+i+')').addClass('active');
					// }
				// }
			// }else if(e.keyCode ==40){
				// if( $("#search_suggestion_holder" + n).is(':visible') ){
					// if( ! $('.active').is(':visible') ){
						// $('#search_suggestion_holder'+n+' li').first().addClass('active');
					// }else{
						// var i =  $('#search_suggestion_holder'+n+' li').index($("#search_suggestion_holder" + n + " li.active")) ;
						// $("#search_suggestion_holder" + n + " li.active").removeClass('active');
						// i++;
						// $('#search_suggestion_holder'+n+' li:eq('+i+')').addClass('active');
					// }
				// }
			// }else if(e.keyCode ==13){
				// if( $('.active').is(':visible') )
					// var value	=	$('#search_suggestion_holder' + n + ' li.active').text();
				// else
					// var value	=	$('#search_suggestion_holder'+n+' li:hover').text();
				// if($("#search_suggestion_holder" + n).is(':visible')){
					// $(this).val(value);
				// }else{
					// $('#btn_actualizar').click();
				// }
				// $("#search_suggestion_holder" + n).hide();
				// $("#search_suggestion_holder" + n).html('');
			// }else if($(this).val() != "" && e.keyCode !=13){
				// contador_s =0;
				// window.clearInterval(cronometro);
				// cronometro = window.setInterval(function(){
					// if(contador_s >= 8){
						// var keyword = $('#search-box'+n).val();
						// $.ajax({
							// url:'../../include/php/get_suggestions_cpyp.php' + r,
							// data:'keyword='+keyword,
							// success:function(data){
								// if($('#search-box'+n).val() != data && $('#search-box'+n).val() != ""){
									// $("#search_suggestion_holder" + n).html(data);
									// $("#search_suggestion_holder" + n).show();
									// $('#search_suggestion_holder'+n+' li').first().addClass('active');
								// }
							// }
						// });
						// contador_s =0;
						// window.clearInterval(cronometro);
						// return false;
					// }
					// contador_s++;
				// }, 100);
			// }else if($("#search-box"+n).val() == "")
				// $("#search_suggestion_holder" + n).hide();
			// $("#search_suggestion_holder" + n + " li:hover").css("color","#000");
			// $("#search_suggestion_holder" + n + " li:hover").css("background","#fff");
		// });
		// function doneTyping(){
			// if(!$('.active').is(':visible'))
				// $('#search_suggestion_holder'+n+' li').first().addClass('active');
		// }
		// $("#search_suggestion_holder" + n).on('click','li',function(){
			// var value	=	$(this).text();
			// if(r == "")
				// $('#search-box'+n).val(value);
			// else{
				// var existencia = 0, precio = 0;
				// var array = value.split('%%');
				// $('#search-box'+n).val(array[0]);
				// precio = array[1];
				// existencia = array[2];
				// $('#txtExistencia').val(existencia);
				// $('#txtPrecio').val(precio);
			// }
			// $("#search_suggestion_holder" + n).hide();
			// $("#search_suggestion_holder" + n).html('');
			// $('#search-box'+n).focus();
		// });
	// });
// }

function limpiar(){
	alert(1);
	$('#txt_nombre_proveedor').val("");
	$('#txt_lada_tlefono_1_proveedor').val("");
	$('#txt_telefono_1_proveedor').val("");
	$('#txt_tipo_telefono_1_proveedor').val("");
	$('#txt_lada_tlefono_2_proveedor').val("");
	$('#txt_telefono_2_proveedor').val("");
	$('#txt_tipo_telefono_2_proveedor').val("");
	$('#txt_calle_proveedor').val("");
	$('#txt_numero_proveedor').val("");
	$('#txt_colonia_proveedor').val("");
	$('#txt_correo_proveedor').val("");
	$('#txt_ciudad_proveedor').val("");
	$('#txt_id_estado_proveedor').val("Seleccione un estado...");
	$('#txt_id_municipio_proveedor').val("Seleccione un municipio...");
	$('#txt_razon_social').val("");
	$('#txt_rfc').val("");
	$('#txt_direccion_fiscal').val("");
	$('#txt_colonia_fiscal').val("");
	$('#txt_ciudad_fiscal').val("");
	$('#txt_id_estado_fiscal').val("Seleccione un estado...");
	$('#txt_id_municipio_fiscal').val("Seleccione un municipio...");
	$('#txt_codigo_postal').val("");

	$('#txt_nombre_proveedor').focus();
}

