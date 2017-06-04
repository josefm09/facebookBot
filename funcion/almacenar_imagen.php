<?PHP
		function almacenar_imagen($mysqli, $filename, $hash, $ext, $tipo_almacenado, $estatus)
		{
			//Inicio del query preparado
			$stmt = $mysqli->prepare("INSERT INTO `imagen` (`id_imagen`, `nombre_original`, `nombre_de_almacenado`, `extencion`,`tipo_almacenado`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,?,?,now(),now())");

			//Indica a la base de datos que recibira 4 string y 1 integer correspoendietes a los signos de ? en el query
			$stmt->bind_param( "ssssi", $filename, $hash, $ext, $tipo_almacenado, $estatus);

			//Ejecuta el query
			$stmt->execute();

			$id_imagen = $mysqli->insert_id;

			//Cierra el query
			$stmt->close();
			
			return($id_imagen);
		}
?>