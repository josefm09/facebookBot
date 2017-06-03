<?PHP
	
	$mesas=array();
	
	//Esta variable toma el valor que le asignen $_SESSION['id_sucursal'];
	$id_mesa= $variables_recibidas['id_mesa'];

	$stmt = $mysqli->prepare("SELECT nombre,capacidad FROM mesa WHERE id_mesa = ?");
		
	//Asigna las variables para el query
	$stmt->bind_param("i", $id_mesa);

	//Ejecuta el query
	$stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($nombre, $capacidad);
	
	while ($stmt->fetch())
		{
			$mesas[] = Array(
				"nombre" => $nombre,
				"capacidad" => $capacidad
			);
		}

	//Cierra el query
	$stmt->close();		

	//valida que la informacion que llego este correcta
	$respuesta = array('nombre_mesa' => $nombre, 'cantidad' => $capacidad);
	
	//codifica la informacion validada
	echo json_encode($respuesta);

?>