$(document).ready(function(){

	//Color del panel
	$('.color_panel').click(function(){
		$('#modal_seleccionar_color').modal('show');

		//Define que la variable de confifuracion sera la de id 4
		$('.color-item').data("element", 4);
	});

	//Color de button primary
	$('.change_color_btn_primary').click(function(){
		$('#modal_seleccionar_color').modal('show');

		//Define que la variable de confifuracion sera la de id 4
		$('.color-item').data("element", 5);
	});

	//Color de button success
	$('.change_color_btn_success').click(function(){
		$('#modal_seleccionar_color').modal('show');

		//Define que la variable de confifuracion sera la de id 4
		$('.color-item').data("element", 6);
	});

	//Color de button warning
	$('.change_color_btn_warning').click(function(){
		$('#modal_seleccionar_color').modal('show');

		//Define que la variable de confifuracion sera la de id 4
		$('.color-item').data("element", 7);
	});

	//Color de fondo para el panel
	$('.color_fondo_panel').click(function(){
		$('#modal_seleccionar_color').modal('show');

		//Define que la variable de confifuracion sera la de id 4
		$('.color-item').data("element", 10);
	});

	//Color de fondo del sistema
	$('.color_fondo_sistema').click(function(){
		$('#modal_seleccionar_color').modal('show');

		//Define que la variable de confifuracion sera la de id 4
		$('.color-item').data("element", 11);
	});

	//Color de barra de navegacion
	$('.color_navbar').click(function(){
		$('#modal_seleccionar_color').modal('show');

		//Define que la variable de confifuracion sera la de id 4
		$('.color-item').data("element", 12);
	});

	//Almacenado de cambio de color
	$(".color-item").click(function() {
		var hex = $(this).css("background-color");
		var elemento = $(this).data("element");
        if (hex != 'undefined' && hex != '') {
			var hexCode = hexc(hex);
            $.ajax({
				url: '../api/api.php',
				data: {
					"accion": "actualizar_estilo_usuario",
					"tipo_accion": "modelo",
					"color": hexCode,
					"elemento": elemento
				},
				type: 'post',
				success: function(data){

					$('#modal_seleccionar_color').modal('hide');

					cargar_css_custom_usuario();//Recarga el CSS del sistema
				},
				error: function(xhr, desc, err){
					console.log(xhr);
					console.log("Detalles: " + desc + "\nError:" + err);
				}
			});
        }
    });

	$("#configuracion_usuario_fuente").change(function()
		{
		$.ajax({
			url: '../api/api.php',
			data: {
				"accion": "actualizar_estilo_usuario",
				"tipo_accion": "modelo",
				"color":$('#configuracion_usuario_fuente').val(),
				"elemento": 9
			},
			type: 'post',
			success: function(data){

				$('#modal_seleccionar_color').modal('hide');

				cargar_css_custom_usuario();//Recarga el CSS del sistema
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError:" + err);
			}
			});
		});

	function hexc(colorval) {
		var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		delete(parts[0]);
		for (var i = 1; i <= 3; ++i) {
			parts[i] = parseInt(parts[i]).toString(16);
			if (parts[i].length == 1) parts[i] = '0' + parts[i];
		}
		color = '#' + parts.join('');
		return color;
	}

});
