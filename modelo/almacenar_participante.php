<?PHP

	//llama al documento
	require "../class/gestion_participante.php";
	
	//Hacemos una instancia de la clase participante 
	$participante = new participante();
	
	//var para ejecucion correcta de funcion crear_partipante
	$nombre = $variables_recibidas['nombre'];
	$calle = $variables_recibidas['calle'];
	$numero= $variables_recibidas['numero'];
	$codigo_postal = $variables_recibidas['codigo_postal'];
	$comunidad = $variables_recibidas['comunidad'];
	$id_colonia = 1;
	$id_sindicatura =1;
	
	$id_participante = $participante -> crear_participante($mysqli, $nombre, $calle, $numero, $id_colonia, $id_sindicatura, $codigo_postal, $comunidad);
	
	if($id_participante != '')
	{
		$estatus_request = 'success';
		$respuesta_servidor = 'Registro exitoso!';
	}
	
	//Valida que la informacion que llego este correcta
	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	//codifica la informacion recibida para enviar
	echo json_encode($respuesta);

?>