<?PHP
	//llama al documento
	require "../class/gestion_mesa.php";
	
	//Hacemos una instancia de la clase mesa
	$mesas = new mesas();
	
	//var para ejecucion correcta de funcion agregar 
	$id_mesa_dinamica= $variables_recibidas['global_id_mesa_dinamica'];
	$id_mesa= $variables_recibidas['global_id_mesa'];
	
	//Agrega mesas a una mesa dinamica y guarda la respuesta del servidor
	$remover_mesa = $mesas->remover_mesa_de_mesa_dinamica($mysqli, $id_mesa, $id_mesa_dinamica);
	
	$estatus_request = 'success';
	
	//Valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $remover_mesa);
	
	//Codifica la informacion validada
	echo json_encode($respuesta);
?>