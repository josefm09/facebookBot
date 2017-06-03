<?PHP
	//llama al documento
	require "../class/gestion_mesa.php";

	//hacemos una instancia de la clase caja chica
	$mesas = new mesas();

	$mesa_dinamica = $variables_recibidas['mesa_dinamica'];
	$id_color = $variables_recibidas['id_color'];
	
	//variable que recibe la caja chica
	$resultado = $mesas->almacenar_comensal_a_mesa_dinamica($mysqli, $mesa_dinamica, $id_color);

	$estatus_request = 'success';
	
	//valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $resultado);

	//codifica la informacion validada
	echo json_encode($respuesta);
?>