<?php
/*
* Creado por AlexisDos
* Marzo de 2017
* usuario_wp21@hotmail.com
*/

/*
* Encrypta y almacena el telefono recibido
*
* Retorna un inter que contiene el id del telefono almacenado
*
*/

function almacenar_telefono($mysqli,$telefono,$tipo_telefono,$lada)
  {
	  $telefono_encriptado = encrypt_string($telefono);
	  $estatus=1;

	  //Inicio del query preparado
		$stmt = $mysqli->prepare("INSERT INTO `telefono` (`id_telefono`, `telefono`, `tipo_telefono`, `lada`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
														VALUES
														(NULL,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 1 string y 3 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param( "siii", $telefono_encriptado, $tipo_telefono, $lada, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();


		//inicio del query
		$query = "SELECT `id_telefono` FROM telefono WHERE `telefono` = ? ORDER BY (id_telefono) DESC LIMIT 1";
		if ($stmt = $mysqli->prepare($query))
			{
			//Asigna las variables para el query
			$stmt->bind_param("s", $telefono_encriptado);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_telefono);

			//obtener valor
			while ($stmt->fetch())
				{

				}

			//Cierra el query
			$stmt->close();
			}
	return $id_telefono;
  }
?>
