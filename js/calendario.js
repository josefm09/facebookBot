$(document).ready(function(){
	
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	var mostrarComentario = 0;
	
	var calendar = $('#calendar').fullCalendar({
		lang: 'es',
		height: 550,
		allDaySlot:false,
		minTime: '06:00:00',
		maxTime: '23:00:00',
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		events: {
			url: '../modelos/eventos.php',
			cache: true
		},
		selectable: true,
		select: function(start) {
			
			//Evento clic en una fecha del calendario
			$('#dlgCliente').modal('show');
			$('.fechaSeleccionada').html($.fullCalendar.moment(start).format("DD MMMM YYYY"));
			$('#dlgCliente').data('date',(new Date(start)).toISOString().slice(0, 10));
			
			setTimeout(function(){
				$("#search-box").focus();
			}, 400);
			
		},
		eventClick: function(event) {

			$.ajax({
				url: '../modelos/select_cita.php',
				type: 'post',
				data: 'keyword='+event.id,
				success:function(data){
					
					limpiar();
					
					//data.idUsuario;
					//data.idCalendario;
					
					$('.responsableAsunto').html('Agendó: <br /><b>' + data.nombre + '</b>');
					$('#txtAsunto').val(data.asunto);
					$('#txtDescripcion').val(data.descripcion);
					
					//Formato de fecha
					var fecha = data.inicio.split(" ");
					$('.fechaSeleccionada').html($.fullCalendar.moment(fecha[0]).format("DD MMMM YYYY"));
					$('#dlgCliente').data('date',(fecha[0]));
					$('#dlgCliente').data('id',event.id);
					
					//Seleccionar hora de cita
					var hora = fecha[1].split(":");
					$('#txtHoraInicio option[value="' + hora[0] + '"]').prop("selected", true);
					$('#txtMinutoInicio option[value="' + hora[1] + '"]').prop("selected", true);
					
					//Duración estimada
					var a = new Date(data.inicio);
					var b = new Date(data.fin);
					
					//La diferencia se da en milisegundos así que debes dividir entre 1000 y para minutos dividiendo entre 60
					var c = (((b-a)/1000)/60);
					$('#txtTipoDuracion option[value="0"]').prop("selected", true);
					$('#txtDuracion').val(c);
					
					//Una vez tramitado todo, se configuramos modal y botoneria
					$('#dlgCliente').modal('show');
					$('#btnCancelar').show();
					$('#btnActualizar').show();
					$('#btnGuardar').hide();
					
				},
				error: function(xhr, desc, err){
					console.log(xhr);
					console.log("Details: " + desc + "\nError:" + err);
				}
			});
			
		}
	});
	
	$('#btnActualizar').hide();
	
	$('#btnActualizar').click(function(){
		
		var idCita = $('#dlgCliente').data('id');
		
		var title = $('#txtAsunto').val();
		
		actualizarEvento(title,idCita);
		
		$('#dlgCliente').modal('hide');
		
	});
	
	$('#btnCerrar').click(function() {
		$('#dlgCliente').modal('hide');
		limpiar();
	});
	
	$('#btnCancelar').hide();
	
	$('#btnCancelar').click(function(){
		
		var idCita = $('#dlgCliente').data('id');
		
		$.ajax({
			url: '../modelos/delete_eventos.php',
			data: 'keyword='+idCita,
			type: "POST",
			success: function(json) {
				
				$('#dlgCliente').modal('hide');
				$('#btnCancelar').hide();
				$('#btnActualizar').hide();
				$('#btnGuardar').show();
				$('#tituloProcesaCobro').html('¡Finalizamos!');
				$('#mensajeProcesaCobro').html('Tarea Procesada');
				$('#dlgAlmacenar').modal('toggle');
				$('#calendar').fullCalendar('removeEvents', idCita);
				
				setTimeout(function(){
					$('#dlgAlmacenar').modal('hide');
					limpiar();
				}, 1500);
				
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	$('#btnGuardar').click(function(){
		
		//Realizar la cita y poner valores
		var hora = $('#txtHoraInicio').val() + ":" + $('#txtMinutoInicio').val();
		var tiempoAgregado = $('#txtDuracion').val();
		var tipoTiempo = $('#txtTipoDuracion').val();
		
		var horaFinal = restarHoras(hora,tiempoAgregado,tipoTiempo);
		
		var start = $('#dlgCliente').data('date') + "T" + hora + ":00";
		var end = $('#dlgCliente').data('date') + "T" + horaFinal + ":00";
		
		var contenidoVariable = {
			inicio: start,
			fin: end,
			asunto: $('#txtAsunto').val(),
			descripcion: $('#txtDescripcion').val()
		};
		
		var title = $('#txtAsunto').val();
		
		url = '../modelos/insert_eventos.php';
	
		$.ajax({
			url: url,
			data: contenidoVariable,
			type: "POST",
			success: function(json) {
				
				//ID de cita recien registrada
				id = json;
				
				calendar.fullCalendar('renderEvent',{
				   id: id,
				   title: title,
				   start: start,
				   end: end
				},true);

				calendar.fullCalendar('unselect');
				
				$('#tituloProcesaCobro').html('¡Finalizamos!');
				$('#mensajeProcesaCobro').html('Tarea Procesada');
				
				$('#dlgCliente').modal('hide');
				$('#dlgAlmacenar').modal('toggle');
				
				setTimeout(function(){
					$('#dlgAlmacenar').modal('hide');
					limpiar();
				}, 1500);
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	
	});
	
	function actualizarEvento(title,id){
		//Realizar la cita y poner valores

		var hora = $('#txtHoraInicio').val() + ":" + $('#txtMinutoInicio').val();
		var tiempoAgregado = $('#txtDuracion').val();
		var tipoTiempo = $('#txtTipoDuracion').val();
		
		var horaFinal = restarHoras(hora,tiempoAgregado,tipoTiempo);
		
		var start = $('#dlgCliente').data('date') + "T" + hora + ":00";
		var end = $('#dlgCliente').data('date') + "T" + horaFinal + ":00";
		
		var contenidoVariable = {
			idCita: id,
			inicio: start,
			fin: end,
			descripcion: $('#txtDescripcion').val(),
			asunto: $('#txtAsunto').val()
		};
	
		url = '../modelos/update_eventos.php';
	
		$.ajax({
			url: url,
			data: contenidoVariable,
			type: "POST",
			success: function(json) {
				
				calendar.fullCalendar('renderEvent',{
				   id: id,
				   title: title,
				   start: start,
				   end: end
				},true);

				calendar.fullCalendar('unselect');
				
				$('#tituloProcesaCobro').html('¡Finalizamos!');
				$('#mensajeProcesaCobro').html('Tarea Procesada');
				$('#dlgAlmacenar').modal('toggle');
				setTimeout(function(){
					$('#dlgAlmacenar').modal('hide');
					limpiar();
				}, 1500);
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}
	
});

function limpiar(){
	$('#txtAsunto').val('');
	$('#txtDuracion').val('');
	$('#txtDescripcion').val('');
	$('#btnCancelar').hide();
	$('#btnActualizar').hide();
	$('#btnGuardar').show();
}

function restarHoras(inicio,fin,tipo) {
	
	transcurridoMinutos = parseInt(inicio.substr(3,2));
	transcurridoHoras = parseInt(inicio.substr(0,2));
	
	if(tipo == 0){
		transcurridoMinutos = parseInt(fin) + transcurridoMinutos;
	}else if(tipo == 1){
		transcurridoHoras = parseInt(fin) + transcurridoHoras;
	}
	
	if (transcurridoMinutos >= 60) {
		
		division = parseInt(transcurridoMinutos / 60);
		
		transcurridoHoras = transcurridoHoras + division;
		transcurridoMinutos = transcurridoMinutos - (division * 60);
		
	}
	
	horas = ("0" + transcurridoHoras).slice(-2);
	minutos = ("0" + transcurridoMinutos).slice(-2);
	
	if (horas.length < 2) {
		horas = "0"+horas;
	}
	
	return horas+":"+minutos;

}