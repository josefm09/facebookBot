<?php
/*
* Creado por AlexisDos
* Marzo de 2017
*/

/*
* Agrupa las funciones para el manejo de todas la posibles acciones a llevar
* a cabo con las mesas
*/

class consumible
  {
  function crear_consumible($mysqli, $nombre, $capacidad, $precio_compra, $precio_venta, $inventario, $id_empresa, $id_sucursal)
    {
    /*
    * Crea una nuevo consumible
    *
    * Retorna  'success' o 'La sucursal no existe' en caso de error
    */
	
		$estatus = 1;
	
		if($nombre != "" && $capacidad != "" && $precio_compra != "" && $precio_venta != "" && $inventario != "" && $id_empresa != "" && $id_sucursal != "")
		{
			$query = "INSERT INTO `consumible` (`id_consumible`,`nombre`,`capacidad`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL, ?,?,?,now(),now())";
			if ($stmt = $mysqli->prepare($query))
				{
				//Asigna las variables para el query
				$stmt->bind_param("sii", $nombre, $capacidad, $estatus);

				//Ejecuta el query
				$stmt->execute();

				//Toma el ID del insert recien hecho
				$nuevo_id_consumible = $mysqli->insert_id;

				//Cierra el query
				$stmt->close();
				}

			
			if(isset($nuevo_id_consumible))
			{
				$query = "INSERT INTO `precio` (`id_precio`, `precio_compra`, `precio_venta`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL,?,?,?,now(),now())";
				if ($stmt = $mysqli->prepare($query))
					{
					//Asigna las variables para el query
					$stmt->bind_param("ssi", $precio_compra, $precio_venta, $estatus);

					//Ejecuta el query
					$stmt->execute();
					
					//Toma el ID del insert recien hecho
					$nuevo_id_precio = $mysqli->insert_id;

					//Cierra el query
					$stmt->close();
					}
				
				
				
				$query = "INSERT INTO `consumible_precio` (`id_consumible_precio`, `id_precio`, `id_consumible`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL,?,?,?,now(),now())";
				if ($stmt = $mysqli->prepare($query))
					{
					//Asigna las variables para el query
					$stmt->bind_param("iii", $nuevo_id_precio, $nuevo_id_consumible, $estatus);

					//Ejecuta el query
					$stmt->execute();

					//Cierra el query
					$stmt->close();
					}

					
				$query = "INSERT INTO `consumible_empresa` (`id_consumible_empresa`, `id_consumible`, `id_empresa`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL,?,?,?,now(),now())";
				if ($stmt = $mysqli->prepare($query))
					{
					//Asigna las variables para el query
					$stmt->bind_param("iii", $nuevo_id_consumible, $id_empresa, $estatus);

					//Ejecuta el query
					$stmt->execute();

					//Cierra el query
					$stmt->close();
					}
				
				$query = "INSERT INTO `inventario_consumible` (`id_inventario_consumible`, `id_consumible`, `id_sucursal`, `inventario`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL,?,?,?,?,now(),now())";
				if ($stmt = $mysqli->prepare($query))
					{
					//Asigna las variables para el query
					$stmt->bind_param("iiii", $nuevo_id_consumible, $id_sucursal, $inventario, $estatus);

					//Ejecuta el query
					$stmt->execute();

					//Cierra el query
					$stmt->close();
					}
				
			}		
			return ($nuevo_id_consumible);	
		}
	}
	
	function consulta_consumible_precio($mysqli,$id_consumible)
	{
		$estatus = 1;
		$precios = array();
		
		$query = "SELECT precio.precio_compra, precio.precio_venta FROM precio INNER JOIN consumible_precio ON consumible_precio.id_precio = precio.id_precio WHERE consumible_precio.estatus = ? AND consumible_precio.id_consumible = ?";
		if ($stmt = $mysqli->prepare($query))
			{
			//Asigna las variables para el query
			$stmt->bind_param("ii", $estatus, $id_consumible);

			//Ejecuta el query
			$stmt->execute();
			
			//Asigna el resultado a una variable
			$stmt->bind_result($precio_compra, $precio_venta);

			//obtener valor
			while ($stmt->fetch())
			{
				$precios[] = Array(
					"precio_compra" => $precio_compra,
					"precio_venta" => $precio_venta
				);
			}

			//Cierra el query
			$stmt->close();
			}
		return $precios;
		
	}
	
	
	function consulta_consumible($mysqli,$id_consumible)
	{
		$estatus = 1;
		$consumible = array();
		
		$query = "SELECT nombre, capacidad,  FROM consumible WHERE estatus = ? AND id_consumible = ?";
		if ($stmt = $mysqli->prepare($query))
			{
			//Asigna las variables para el query
			$stmt->bind_param("ii", $estatus, $id_consumible);

			//Ejecuta el query
			$stmt->execute();
			
			//Asigna el resultado a una variable
			$stmt->bind_result($nombre, $capacidad);

			//obtener valor
			while ($stmt->fetch())
			{
				$consumible[] = Array(
					"nombre" => $nombre,
					"capacidad" => $capacidad
				);
			}

			//Cierra el query
			$stmt->close();
			}
		return $consumible;
		
	}
	
  }
  
?>