<?PHP

	//llama al documento
	require "../class/gestion_mesa.php";
	
	//hacemos una instancia de la clase mesa
	$mesas = new mesas();
	
	$id_comensal= $variables_recibidas['id_comensal'];
	
	$estatus = 0;
	
	//variable que recibe las mesas activas
	$estatus_comensal = $mesas->cambiar_estatus_de_comensal_a_mesa_dinamica($mysqli, $id_comensal, $estatus);
	
	$estatus_request='success';
	
	//valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $estatus_comensal);
	
	//codifica la informacion validada
	echo json_encode($respuesta);

?>