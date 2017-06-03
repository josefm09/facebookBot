<!-- 
=================================================================================
                        Errores en query de AJAX
=================================================================================
-->

<!-- Fallo en la conexion de internet -->
<div id="modal_error_internet" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="modal_header_error">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Ha ocurrido un error</center></h4>
			</div>
			<div class="modal-body">
				<p>Por favor revise su conexión a internet.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>

<!-- El recurso solicitado no existe -->
<div id="modal_error_404" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="modal_header_error">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Ha ocurrido un error</center></h4>
			</div>
			<div class="modal-body">
				<p>El URL del formulario no pudo ser encontrado en el servidor.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>

<!-- Error interno del servidor donde no es posible detectar la causa especifica -->
<div id="modal_error_500" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="modal_header_error">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Ha ocurrido un error</center></h4>
			</div>
			<div class="modal-body">
				<p>Error interno del servidor.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>

<!-- El servidor respone con un string que no esta en formato JSON o contiene caracteres adicionales al JSON -->
<div id="modal_error_parsererror" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="modal_header_error">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Ha ocurrido un error</center></h4>
			</div>
			<div class="modal-body">
				<p>Fallo al procesar el JSON enviado por el servidor.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>

<!-- El servidortardo demasiado en responder -->
<div id="modal_error_timeout" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="modal_header_error">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Ha ocurrido un error</center></h4>
			</div>
			<div class="modal-body">
				<p>La petición excedió el limite de tiempo.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>

<!-- Si el request AJAX falla por alguna razon no listada -->
<div id="modal_error_otro" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="modal_header_error">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Ha ocurrido un error</center></h4>
			</div>
			<div class="modal-body">
				<p>Ha ocurrido un error desconocido.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>

<!-- 
=================================================================================
                        Respuesta del servidor
=================================================================================
-->

<!-- Si el request AJAX falla por alguna razon no listada -->
<div id="modal_respuesa_servidor_error" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="modal_header_respuesa_servidor_error">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Ha ocurrido un error</center></h4>
			</div>
			<div class="modal-body">
				<p id="respuesa_servidor_error"></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>

<!-- Si el request AJAX recibe un success en la variable pasasa por el servidor -->
<div id="modal_respuesa_servidor_success" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="modal_header_respuesa_servidor_success">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>El almacenado ha sido exitoso</center></h4>
			</div>
			<div class="modal-body">
				<p id="respuesa_servidor_success"></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>