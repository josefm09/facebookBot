<?PHP
class paquete
	{
	
	function alta_paquete($mysqli, $nombre_paquete, $precio_paquete)
		{
			/*
			* Retorna el id del paquete creado
			*
			*/
	
			$estatus = 1;
			
			$query = "INSERT INTO `paquete`(`id_paquete`, `nombre`, `precio`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL,?,?,?,now(),now())";
			if ($stmt = $mysqli->prepare($query))
			  {
			  //Asigna las variables para el query
			  $stmt->bind_param("sii", $nombre_paquete, $precio_paquete, $estatus);

			  //Ejecuta el query
			  $stmt->execute();

			  $id_paquete = $stmt->insert_id;

			  //Cierra el query
			  $stmt->close();
			  }

			return $id_paquete;
			
		}
		
	function relacionar_paquete_con_imagen($mysqli, $id_paquete, $id_imagen)
		{
			
			$estatus = 1;
			
			$query = "INSERT INTO `paquete_imagen`(`id_paquete_imagen`, `id_paquete`, `id_imagen`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL,?,?,?,now(),now())";
			if ($stmt = $mysqli->prepare($query))
			  {
			  //Asigna las variables para el query
			  $stmt->bind_param("iii", $id_paquete, $id_imagen, $estatus);

			  //Ejecuta el query
			  $stmt->execute();
			  
			  $id_paquete_imagen = $stmt->insert_id;

			  //Cierra el query
			  $stmt->close();
			  }

			return $id_paquete_imagen;
		}
		
	function relacionar_paquete_con_sucursal($mysqli, $id_paquete, $id_sucursal)
		{
			
			$estatus = 1;
			
			$query = "INSERT INTO `paquete_sucursal`(`id_paquete_sucursal`, `id_paquete`, `id_sucursal`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL,?,?,?,now(),now())";
			if ($stmt = $mysqli->prepare($query))
			  {
			  //Asigna las variables para el query
			  $stmt->bind_param("iii", $id_paquete, $id_sucursal, $estatus);

			  //Ejecuta el query
			  $stmt->execute();

			  $id_paquete_sucursal = $stmt->insert_id;

			  //Cierra el query
			  $stmt->close();
			  }

			return $id_paquete_sucursal;
		}
		
	function relacionar_paquete_con_producto($mysqli, $id_paquete, $id_producto)
		{
			
			$estatus = 1;
			
			$query = "INSERT INTO `paquete_producto`(`id_paquete_producto`, `id_paquete`, `id_producto`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL,?,?,?,now(),now())";
			if ($stmt = $mysqli->prepare($query))
			  {
			  //Asigna las variables para el query
			  $stmt->bind_param("iii", $id_paquete, $id_producto, $estatus);

			  //Ejecuta el query
			  $stmt->execute();

			  $id_paquete_producto = $stmt->insert_id;

			  //Cierra el query
			  $stmt->close();
			  }

			return $id_paquete_producto;
		}
	}

?>