<?PHP

class propuesta
{
	function crear_propuesta($mysqli, $titulo, $solucion, $problema)
	{
		$estatus = 1;
		
		$query = "INSERT INTO propuesta(id_propuesta, titulo, problematica, solucion, estatus, fecha_creacion, ultima_modificacion)
									VALUES
										(NULL,?,?,?,?,now(),now())";
										
		if ($stmt = $mysqli->prepare($query))
		{
			//Asigna las variables para el query
			$stmt->bind_param("sssi", $titulo, $solucion, $problema, $estatus);

			//Ejecuta el query
			$stmt->execute();

			$id_propuesta = $stmt->insert_id;

			//Cierra el query
			$stmt->close();
		}

		return $id_propuesta;
	}
	
	function relacion_propuesta_con_subtema($mysqli, $id_propuesta, $id_subtema)
	{
		
		$estatus = 1;
		
		$query = "INSERT INTO `propuesta_subtema`(`id_propuesta_subtema`, `id_propuesta`, `id_subtema`, `estatus`, `fecha_creacion`, `ultima_modificacion`) 
											VALUES 
											(NULL,?,?,?,now(),now())";
											
		if ($stmt = $mysqli->prepare($query))
		{
			//Asigna las variables para el query
			$stmt->bind_param("iii", $id_propuesta, $id_subtema, $estatus);

			//Ejecuta el query
			$stmt->execute();

			$id_propuesta_subtema = $stmt->insert_id;

			//Cierra el query
			$stmt->close();
		}

		return $id_propuesta_subtema;
	}
	
	function relacion_propuesta_con_comentario($mysqli, $id_propuesta, $id_ciudadano, $comentario)
	{
		
		$estatus = 1;
		
		$query = "INSERT INTO `propuesta_comentario_ciudadano`(`id_propuesta_comentario_ciudadano`, `id_propuesta`, `id_ciudadano`, `comentario`, `estatus`, 
																	`fecha_creacion`, `ultima_modificacion`) 
															VALUES 
																	(NULL,?,?,?,?,now(),now())";
											
		if ($stmt = $mysqli->prepare($query))
		{
			//Asigna las variables para el query
			$stmt->bind_param("iisi", $id_propuesta, $id_ciudadano, $comentario, $estatus);

			//Ejecuta el query
			$stmt->execute();

			$id_propuesta_comentario_ciudadano = $stmt->insert_id;

			//Cierra el query
			$stmt->close();
		}

		return $id_propuesta_comentario_ciudadano;
	}
	
	function relacion_propuesta_con_votacion($mysqli, $id_propuesta, $id_ciudadano, $votacion)
	{
		
		$estatus = 1;
		
		$query = "INSERT INTO `propuesta_votacion_ciudadano`(`id_propuesta_votacion_ciudadano`, `id_propuesta`, `id_ciudadano`, `votacion`, `estatus`, 
																`fecha_creacion`, `ultima_modificacion`) 
															VALUES 
																(NULL,?,?,?,?,now(),now())";
											
		if ($stmt = $mysqli->prepare($query))
		{
			//Asigna las variables para el query
			$stmt->bind_param("iiii", $id_propuesta, $id_ciudadano, $votacion, $estatus);

			//Ejecuta el query
			$stmt->execute();

			$id_propuesta_votacion_ciudadano = $stmt->insert_id;

			//Cierra el query
			$stmt->close();
		}

		return $id_propuesta_votacion_ciudadano;
	}
	
	function relacion_propuesta_con_imagen($mysqli, $id_propuesta, $id_imagen)
	{
		
		$estatus = 1;
		
		$query = "INSERT INTO `propuesta_imagen`(`id_propuesta_imagen`, `id_propuesta`, `id_imagen`, `estatus`, `fecha_creacion`, `ultima_modificacion`) 
										VALUES 
											(NULL,?,?,?,now(),now())";
											
		if ($stmt = $mysqli->prepare($query))
		{
			//Asigna las variables para el query
			$stmt->bind_param("iii", $id_propuesta, $id_imagen, $estatus);

			//Ejecuta el query
			$stmt->execute();

			$id_propuesta_imagen = $stmt->insert_id;

			//Cierra el query
			$stmt->close();
		}

		return $id_propuesta_imagen;
	}
	
}
?>