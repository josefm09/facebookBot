<?PHP

	$estatus= $variables_recibidas['valor_estatus'];
	$id_mesa= $variables_recibidas['id_mesa'];
	
	if($estatus == 0){
		$estatus = 1;
	}
	else{
		$estatus = 0;
	}

	$query = "UPDATE mesa SET estatus= ? WHERE id_mesa = ?";
	if ($stmt = $mysqli->prepare($query)){
	
		//Asigna las variables para el query
		$stmt->bind_param("ii", $estatus, $id_mesa);

		//Ejecuta el query
		$stmt->execute();		

		//Cierra el query
		$stmt->close();
	}

	$estatus_request = 'success';		
	$respuesta_servidor = "El estatus ha sido modificado.";
	
	$respuesta= array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);
	
	echo json_encode($respuesta);

?>