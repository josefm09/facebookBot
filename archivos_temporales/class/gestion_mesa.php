<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Marzo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Agrupa las funciones para el manejo de todas la posibles acciones a llevar
* a cabo con las mesas
*/

class mesas
  {
  function crear_nueva_mesa($mysqli, $nombre_mesa, $capacidad_mesa, $id_sucursal)
    {
    /*
    * Crea una nueva mesa en su forma basica
    *
    * Retorna  'success' o 'La sucursal no existe' en caso de error
    */
    $query = "SELECT nueva_mesa(?,?,?)";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("sii", $nombre_mesa, $capacidad_mesa, $id_sucursal);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($respuesta_mysql);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		//
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $respuesta_mysql;
    }

  function mesas_activas_sucursal($mysqli, $id_sucursal)
    {
    /*
    * Toma todas las mesas asignadas a una sucursal las cuales estan activas
    * el return es un array con el id_mesa y el nombre
    */
    //Array que sera retornado
  	$mesas = array();

    $query = "SELECT mesa.id_mesa, mesa.nombre, mesa.capacidad FROM mesa INNER JOIN mesa_sucursal ON mesa_sucursal.id_mesa = mesa.id_mesa WHERE mesa.estatus = 1 AND mesa_sucursal.id_sucursal = ?";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("i", $id_sucursal);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($id_mesa, $nombre, $capacidad);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		$mesas[] = Array(
  				"id_mesa" => $id_mesa,
  				"nombre" => $nombre,
				"capacidad" => $capacidad
  			);
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $mesas;
    }
	
	function mesas_activas_general($mysqli, $id_sucursal){
		$mesas = array();

		$query = "SELECT mesa.id_mesa, mesa.nombre, mesa.capacidad, mesa.estatus FROM mesa INNER JOIN mesa_sucursal ON mesa_sucursal.id_mesa = mesa.id_mesa WHERE (mesa.estatus = 1 or mesa.estatus = 4 or mesa.estatus = 0) AND mesa_sucursal.id_sucursal = ?";
		if ($stmt = $mysqli->prepare($query))
			{
			//Asigna las variables para el query
			$stmt->bind_param("i", $id_sucursal);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_mesa, $nombre, $capacidad, $estatus);

			//obtener valor
			while ($stmt->fetch())
				{
					$mesas[] = Array(
						"id_mesa" => $id_mesa,
						"nombre" => $nombre,
						"capacidad" => $capacidad,
						"estatus" => $estatus
					);
				}

			//Cierra el query
			$stmt->close();
			}

		return $mesas;
	}
	
	function actualizar_info_mesa($mysqli, $nombre_mesa, $capacidad_mesa, $id_mesa){
		$query = "UPDATE mesa SET nombre= ?,capacidad= ? WHERE id_mesa = ?";
		if ($stmt = $mysqli->prepare($query)){
    	
			//Asigna las variables para el query
			$stmt->bind_param("sii", $nombre_mesa, $capacidad_mesa, $id_mesa);

			//Ejecuta el query
			$stmt->execute();		

			//Cierra el query
			$stmt->close();
    	}

		return "success";
	}

  function nueva_mesa_dinamica($mysqli, $id_sucursal)
    {
    /*
    * Crea una mesa dinamica dentro del sistema la cual esta vinculada a la
    * sucursal seleccionada
    *
    * Retorna el id_mesa_dinamica o 'La sucursal no existe' en caso de error'
    */
    $query = "SELECT crear_mesa_dinamica(?)";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("i", $id_sucursal);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($respuesta_mysql);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		//
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $respuesta_mysql;
    }

  function cambiar_estatus_mesa_dinamica($mysqli, $nuevo_estatus, $id_mesa_dinamica)
    {
    /*
    * Cambia el estatus de una mesa dinamica por aquel recibido
    *
    * Retorna "success" o "error"
    */
    if(is_numeric($nuevo_estatus) AND is_numeric($id_mesa_dinamica))
      {
      //Inicio del query preparado
      $stmt = $mysqli->prepare("UPDATE mesa_dinamica SET `estatus` = ? WHERE `id_mesa_dinamica` = ?");

      //Indica a la base de datos que recibira 1 string y 1 integer correspoendietes a los signos de ? en el query
      $stmt->bind_param("ii", $nuevo_estatus, $id_mesa_dinamica);

      //Ejecuta el query
      $stmt->execute();

      //Cierra el query
      $stmt->close();

      $repuesta = "success";
      }

    else
      {
      $repuesta = "error";
      }

    return $repuesta;
    }

  function agregar_mesa_a_mesa_dinamica($mysqli, $id_mesa, $id_mesa_dinamica)
    {
    /*
    * Agrega una mesa a un grupo de mesa dinamica
    *
    * Retorna 'success' o en caso se error 'La mesa no existe' o 'La mesa no existe'
    */
    $query = "SELECT relacionar_mesa_con_mesa_dinamica(?,?)";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("ii", $id_mesa, $id_mesa_dinamica);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($respuesta_mysql);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		//
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $respuesta_mysql;
    }
	
	function remover_mesa_de_mesa_dinamica($mysqli, $id_mesa, $id_mesa_dinamica)
    {
    /*
    * Agrega una mesa a un grupo de mesa dinamica
    *
    * Retorna 'success'
    */
    $query = "UPDATE mesa_dinamica_relacion SET estatus = 0 WHERE id_mesa = ? AND id_mesa_dinamica = ?";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("ii", $id_mesa, $id_mesa_dinamica);

    	//Ejecuta el query
    	$stmt->execute();

    	//Cierra el query
    	$stmt->close();
    	}	
		
    $query = "UPDATE mesa SET estatus = 1 WHERE id_mesa = ?";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("i", $id_mesa);

    	//Ejecuta el query
    	$stmt->execute();

    	//Cierra el query
    	$stmt->close();
    	}

    return "success";
    }

  function cerrar_ciclo_mesa_dinamica($mysqli, $id_mesa_dinamica)
    {
    /*
    * Marca la mesa dinamica como terminada dandole un estatus de 5 y retorna
    * las mesas que la conforman a activas (estatus 1) para que sean reusadas
    *
    * Retorna  'success' o 'La mesa dinamica no esta marcada como activa'
    */
    $query = "SELECT cerrar_mesa_dinamica(?)";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("i", $id_mesa_dinamica);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($respuesta_mysql);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		//
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $respuesta_mysql;
    }

	function colores_de_comensal_disponibles($mysqli, $id_mesa_dinamica){
		$color_comensal = array();

		$query = "SELECT 
					id_color_comensal,
					color,
					hexadecimal
				FROM 
					color_comensal 
				WHERE 
						estatus = 1
					AND
						id_color_comensal NOT IN (SELECT 
													id_color_comensal 
												FROM
													comensal
												WHERE
													id_mesa_dinamica = ? AND estatus = 1)";
		if ($stmt = $mysqli->prepare($query))
			{
			//Asigna las variables para el query
			$stmt->bind_param("i", $id_mesa_dinamica);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_color_comensal, $color, $hexadecimal);

			//obtener valor
			while ($stmt->fetch())
				{
					$color_comensal[] = Array(
						"id_color_comensal" => $id_color_comensal,
						"nombre_color_comensal" => $color,
						"hexadecimal_color_comensal" => $hexadecimal
					);
				}

			//Cierra el query
			$stmt->close();
			}

		return $color_comensal;
	}
	
	function almacenar_comensal_a_mesa_dinamica($mysqli, $mesa_dinamica, $id_color){
		
		 /*
    * Crea un comensal
    *
    * Retorna el $id_comensal`
    */
    $estatus = 1;//Por defecto los trabajadores estan activos

    //******Alta del trabajador******
     $stmt = $mysqli->prepare("INSERT INTO `comensal` (`id_comensal`, `id_mesa_dinamica`, `id_color_comensal`, `estatus`, `fecha_creacion`, `ultima_modificacion`) 
														VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $mesa_dinamica, $id_color, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $id_comanda = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();

	return $id_comanda;
	
	}
	
	
	function mesas_dinamicas_activas_sucursal($mysqli, $id_masa_dinamica)
    {
    /*
    * Toma todas las mesas asignadas a una mesa dinamica las cuales estan activas
    */
    //Array que sera retornado
  	$mesas = array();

    $query = "SELECT 
				mesa.id_mesa, 
				mesa.nombre, 
				mesa.capacidad 
			FROM 
				mesa 
			INNER JOIN 
				mesa_dinamica_relacion ON mesa_dinamica_relacion.id_mesa = mesa.id_mesa 
			INNER JOIN 
				mesa_dinamica ON mesa_dinamica.id_mesa_dinamica = mesa_dinamica_relacion.id_mesa_dinamica 
			WHERE 
				mesa_dinamica_relacion.estatus = 1 AND mesa_dinamica.estatus IN (1,2) AND mesa_dinamica_relacion.id_mesa_dinamica = ?";
				
	if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("i", $id_masa_dinamica);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($id_mesa, $nombre, $capacidad);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		$mesas[] = Array(
  				"id_mesa" => $id_mesa,
  				"nombre" => $nombre,
				"capacidad" => $capacidad
  			);
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $mesas;
    }
	
	
	function cambiar_estatus_de_comensal_a_mesa_dinamica($mysqli, $id_comensal, $estatus){
		
	/*
    * update comensal
    *
    * Retorna el $id_comensal`
    */


    //******cambiar estatus del comensal******
    $stmt = $mysqli->prepare("UPDATE comensal SET estatus = ? WHERE id_comensal = ?");

    //Indica a la base de datos que recibira 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("ii", $id_comensal, $estatus);

    //Ejecuta el query
    $stmt->execute();


    //Cierra el query
    $stmt->close();

	return "success";
	
	}

  }
?>
