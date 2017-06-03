<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Crea un usuario en la tabla padre 'usuario', la funcion se encarga de asignar el hash
* que otorga al usuario su prioridad de acceso al sistema, da una contraseña predefinida
* y encrypta la informacion sensible
*
* Si el username esta tomado la funcion retorna "user_taken" y no hara el insert,
* de estar disponible la funcion retorna el id de la insersion
*/

function almacenar_usuario($mysqli, $usuario, $nombre, $apellido_paterno, $apellido_materno, $nombre_prioridad, $configuraciones_sistema, $id_usuario)
  {
  /*
  * Si el usuario ya existe la funcion dedendra la ejecucion y retornara un codigo
  * de error
  */
  //******Selecciona la cantidad de veces que el usuario existe******
  //inicio del query
  $query = "SELECT COUNT(*) FROM usuario WHERE `usuario` = ?";
  if ($stmt = $mysqli->prepare($query))
  	{
  	//Asigna las variables para el query
  	$stmt->bind_param("s", $usuario);

  	//Ejecuta el query
  	$stmt->execute();

  	//Asigna el resultado a una variable
  	$stmt->bind_result($coincidencias);

  	//obtener valor
  	while ($stmt->fetch())
  		{
  		//
  		}

  	//Cierra el query
  	$stmt->close();
  	}

  //Si el usuario aparece por lo menos una vez no se debe permitir el insert
  if($coincidencias > 0)
    {
    return "user_taken";
    }

  //Si el usuario no esta tomado
  if($coincidencias == 0)
    {
    $nombre_encriptado = encrypt_string($nombre);
    $apellido_paterno_encriptado = encrypt_string($apellido_paterno);
    $apellido_materno_encriptado = encrypt_string($apellido_materno);
    $password = $configuraciones_sistema['default_password'];//Predefinida como configuracion global
    $estatus = 1;

    $password_encriptada = encrypt_password($configuraciones_sistema, $password);

    //******Seleccion de la prioridad******
    //inicio del query
    $query = "SELECT `prioridad` FROM prioridad WHERE `nombre_prioridad` = ?";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("s", $nombre_prioridad);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($hash_prioridad);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		//
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    //******Insersion del usuario******
    //Inicio del query preparado
    $stmt = $mysqli->prepare("INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `nombre_usuario`, `apellido_paterno`, `apellido_materno`, `registrado_por`, `prioridad`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 6 string y 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("sssssisi", $usuario, $password_encriptada, $nombre_encriptado, $apellido_paterno_encriptado, $apellido_materno_encriptado, $id_usuario, $hash_prioridad, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();

    return $nuevo_id;
    }
  }
?>
