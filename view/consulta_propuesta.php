<div class="col-md-12 text-left">
	<div class="col-md-2">
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Peticiones Recibidas</h3>
			</div>
			<div class="panel-body">	
				<table class="table table-striped" id="mostrar_peticiones">	
					<thead class="row">
						<tr>
							<th class="col-md-1">#</th>
							<th class="col-md-3">Tema</th>
							<th class="col-md-3">Titulo</th>
							<th class="col-md-5">Planteamiento Del Problema</th>
							
							
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
	<div class="col-md-2">
	</div>
</div>
<div class="modal fade" id="dlg_consulta_datos" tabindex="-1" role="dialog" aria-labelledby="dlg_consultar_datos" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="Cerrar"  aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3><span id="tema_propuesta"></span><small id="sub_tema_propuesta"></small></h3>
			</div>
			<div class="modal-body">
				<h4>Titulo: <span id="titulo_propuesta"></h4>
				<h5><strong>Problematica: </strong><span id="problematica_propuesta"></h5>
				<h5><strong>Solución: </strong><span id="solucion_propuesta"></h5>
				<div class="row">
					<div class="col-md-12 imagen_propuesta"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../js/consulta_propuesta.js"></script>