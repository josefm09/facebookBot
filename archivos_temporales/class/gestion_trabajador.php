<?php
/*
* Creado por Jeimmy Paola Perez Ruelas
* Marzo de 2017
* ruelasjeimmy@gmai l.com
*/

/*
* Agrupa las funciones para el manejo de trabajadores dentro del sistema
*/

class trabajador
  {

  function crear_trabajador($mysqli, $id_usuario, $calle_trabajador, $numero_trabajador, $colonia_trabajador, $correo_trabajador, $telefono_trabajador, $tipo_telefono_trabajador, $lada_trabajador, $ciudad, $estado, $municipio)
    {
    /*
    * Crea un nuevo trabajador y lo relaciona con sus respectivos campos
    *
    * Retorna el $id_trabajador
    */
    $estatus = 1;//Por defecto los trabajadores estan activos

    //Encrypta los datos privados
    $correo_trabajador = encrypt_string($correo_trabajador);
    $calle_trabajador = encrypt_string($calle_trabajador);
    $numero_trabajador = encrypt_string($numero_trabajador);
    $colonia_trabajador = encrypt_string($colonia_trabajador);
    $telefono_trabajador = encrypt_string($telefono_trabajador);

    //******Alta del trabajador******
    $stmt = $mysqli->prepare("INSERT INTO `trabajador`(`id_trabajador`, `id_usuario`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("ii", $id_usuario, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id_trabajador = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();



    //******Relacion del trabajador con correo_electronico******
    $stmt = $mysqli->prepare("INSERT INTO `correo_electronico`(`id_correo_electronico`, `correo_electronico`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,now(),now())");

    //Indica a la base de datos que recibira 1 string y 1 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("si", $correo_trabajador, $estatus);

    //Ejecuta el query
    $stmt->execute();

	//Toma el ID del insert recien hecho
    $nuevo_id_correo_electronico = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();



    //******Relacion del correo_electronico con trabajador_correo******
    $stmt = $mysqli->prepare("INSERT INTO `trabajador_correo`(`id_trabajador_correo`, `id_trabajador`, `id_correo_electronico`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $nuevo_id_trabajador, $nuevo_id_correo_electronico, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();



    //******Relacion del trabajador con su domicilio******
    $stmt = $mysqli->prepare("INSERT INTO `domicilio`(`id_domicilio`, `calle`, `numero`, `colonia`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 String y 1 integer correspondientes a los signos de ? en el query
    $stmt->bind_param("sssi", $calle_trabajador, $numero_trabajador, $colonia_trabajador, $estatus);

    //Ejecuta el query
    $stmt->execute();

	//Toma el ID del insert recien hecho
    $nuevo_id_domicilio = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();



	 //******Relacion de domicilio con trabajador_domicilio******
    $stmt = $mysqli->prepare("INSERT INTO `trabajador_domicilio`(`id_trabajador_domicilio`, `id_trabajador`, `id_domicilio`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
    $stmt->bind_param("iii", $nuevo_id_trabajador, $nuevo_id_domicilio, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();



	 //******Relacion del trabajador con su telefono******
    $stmt = $mysqli->prepare("INSERT INTO `telefono`(`id_telefono`, `telefono`, `tipo_telefono`, `lada`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 1 String y 3 integer correspondientes a los signos de ? en el query
    $stmt->bind_param("siii", $telefono_trabajador, $tipo_telefono_trabajador, $lada_trabajador, $estatus);

    //Ejecuta el query
    $stmt->execute();

	//Toma el ID del insert recien hecho
    $nuevo_id_telefono = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();



	 //******Relacion del telefono con su trabajador_telefono******
    $stmt = $mysqli->prepare("INSERT INTO `trabajador_telefono`(`id_trabajador_telefono`, `id_trabajador`, `id_telefono`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
    $stmt->bind_param("iii", $nuevo_id_trabajador, $nuevo_id_telefono, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();

	
	//relacion de usuario con estado
	$stmt = $mysqli->prepare("INSERT INTO `usuario_estado`(`id_usuario_estado`, `id_usuario`, `id_estado`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL, ?, ?, ?, now(), now())");
	$estado = 4;
	$stmt->bind_param("iii", $id_usuario, $estado, $estatus);
	
	$stmt->execute();

	//Cierra el query
	$stmt->close();
	
	
	//relacion de usuario con municipio
	$stmt = $mysqli->prepare("INSERT INTO `usuario_municipio`(`id_usuario_municipio`, `id_usuario`, `id_municipio`, `ciudad`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES (NULL, ?, ?, ?, ?, now(), now())");
	
	$stmt->bind_param("iisi", $id_usuario, $municipio, $ciudad, $estatus);
	
	$stmt->execute();

	//Cierra el query
	$stmt->close();
	
	

    return $nuevo_id_trabajador;
    }



	function crear_referencia($mysqli, $nombre_referencia, $apellido_paterno_referencia, $apellido_materno_referencia,
					$id_correo_electronico_referencia, $id_telefono_referencia, $id_domicilio_referencia)
	{
		 /*
		* Crea una nueva referencia y lo relaciona con sus respectivos campos
		*
		* Retorna el $id_referencia
		*/
		$estatus = 1;//Por defecto las referencias estan activas

			 //******Alta del referencia******
		$stmt = $mysqli->prepare("INSERT INTO `referencia`(`id_referencia`, `nombre`, `apellido_paterno`, `apellido_materno`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 String y 1 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("sssi", $nombre_referencia, $apellido_paterno_referencia, $apellido_materno_referencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_refencia = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();



			 //******Relacion de correo con  referencia_correo******
		$stmt = $mysqli->prepare("INSERT INTO `referencia_correo`(`id_referencia_correo`, `id_referencia`, `id_correo_electronico`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_refencia, $id_correo_electronico_referencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_refencia_correo = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();



			 //******Relacion de domicilio con  referencia_domicilio******
		$stmt = $mysqli->prepare("INSERT INTO `referencia_domicilio`(`id_referencia_domicilio`, `id_referencia`, `id_domicilio`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_refencia, $id_domicilio_referencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_refencia_domicilio = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();



			 //******Relacion de telefono con  referencia_telefono******
		$stmt = $mysqli->prepare("INSERT INTO `referencia_telefono`(`id_referencia_telefono`, `id_referencia`, `id_telefono`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_refencia, $id_telefono_referencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_refencia_telefono = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();

		return $nuevo_id_refencia;
	}

	// function relacionar_usuario_empresa($mysqli, $id_usuario, $id_empresa){

		// $estatus = 1;

		 // // ******Relacion usuario con  usuario_empresa******
		// $stmt = $mysqli->prepare("INSERT INTO `usuario_empresa`(`id_usuario_empresa`, `id_usuario`, `id_empresa`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															// VALUES
															// (NULL,?,?,?,now(),now())");

		// // Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		// $stmt->bind_param("iii", $id_usuario, $id_empresa, $estatus);

		// // Ejecuta el query
		// $stmt->execute();

		// // Toma el ID del insert recien hecho
		// $nuevo_id_usuario_empresa = $mysqli->insert_id;

		// // Cierra el query
		// $stmt->close();

		// return $nuevo_id_usuario_empresa;
	// }

	// function relacionar_usuario_sucursal($mysqli, $id_usuario, $id_sucursal, $boolean_sucursal_principal){

		// $estatus = 1;

		 // // ******Relacion usuario con  usuario_sucursal******
		// $stmt = $mysqli->prepare("INSERT INTO `usuario_sucursal`(`id_usuario_sucursal`, `id_usuario`, `id_sucursal`, `boolean_sucursal_principal`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															// VALUES
															// (NULL,?,?,?,?,now(),now())");

		// // Indica a la base de datos que recibira 4 integer correspondientes a los signos de ? en el query
		// $stmt->bind_param("iiii", $id_usuario, $id_sucursal, $boolean_sucursal_principal, $estatus);

		// // Ejecuta el query
		// $stmt->execute();

		// // Toma el ID del insert recien hecho
		// $nuevo_id_usuario_sucursal = $mysqli->insert_id;

		// // Cierra el query
		// $stmt->close();

		// return $nuevo_id_usuario_sucursal;
	// }

  function relacionar_usuario_referencia($mysqli, $id_usuario_referenciado, $id_referencia)
    {
    $estatus = 1;

		$stmt = $mysqli->prepare("INSERT INTO `referencia_usuario`(`id_referencia_usuario`, `id_referencia`, `id_usuario`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $id_referencia, $id_usuario_referenciado, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();
    }
	
	function relacionar_usuario_imagen($mysqli, $id_usuario_trabajador, $id_imagen_trabajador)
	{
		$estatus =1;
		//query para relacionar usuario e imagen en la tabla usuario_imagen
		$stmt = $mysqli->prepare("INSERT INTO `usuario_imagen`(`id_usuario_imagen`, `id_usuario`, `id_imagen`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
														VALUES
														(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 0 string y 3 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param( "iii", $id_usuario_trabajador, $id_imagen_trabajador, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();
	}
	
	function relacion_trabajador_rol($mysqli, $id_rol, $id_trabajador)
	{
		$estatus = 1;
		
		$stmt = $mysqli->prepare("INSERT INTO `rol_trabajador`(`id_rol_trabajador`, `id_rol`, `id_trabajador`, `estatus`, `fecha_creacion`, `ultima_modificacion`) 
									VALUES (NUlL, ?, ?, ?, now(), now())");
		
		$stmt->bind_param("iii", $id_rol, $id_trabajador, $estatus);
		
		$stmt->execute();
		
		$stmt->close();
	}

	// function consultar_trabajador_por_nombre($mysqli, $nombre_trabajador, $id_sucursal, $estatus){
		// /*
		// * Retorna los trabajadores de una sucursal segun el nombre y estatus solicitado
		// */
		// //Array que sera retornado

		// $nombre_trabajador = '%'.$nombre_trabajador.'%';

		// $trabajadores = array();

		// $query = "SELECT
					// u.id_usuario,u.nombre_usuario,u.apellido_paterno,u.apellido_materno
				// FROM
					// `usuario_sucursal` as us
				// INNER JOIN
					// usuario as u ON u.id_usuario = us.id_usuario
				// WHERE
					// us.estatus = ? AND us.id_sucursal = ? AND u.nombre like ?";
		// if ($stmt = $mysqli->prepare($query)){
			// //Asigna las variables para el query
			// $stmt->bind_param("iisi", $estatus, $id_sucursal, $nombre_trabajador);

			// //Ejecuta el query
			// $stmt->execute();

			// //Asigna el resultado a una variable
			// $stmt->bind_result($id_producto, $nombre,$apellido_paterno,$apellido_materno);

			// //obtener valor
			// while ($stmt->fetch()){
				// $nombre = decrypt_string($nombre).' '.decrypt_string($apellido_paterno).' '.decrypt_string($apellido_materno);
				// $trabajadores[] = Array(
					// "id_usuario" => $id_producto,
					// "nombre" => $nombre
				// );
			// }

			// //Cierra el query
			// $stmt->close();
		// }

		// return $trabajadores;
	// }

  }
?>
