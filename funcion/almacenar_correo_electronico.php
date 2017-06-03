<?php
/*
* Creado por AlexisDos
* Marzo de 2017
* usuario_wp21@hotmail.com
*/

/*
* Encrypta y almacena el correo electronico recibido
*
* Retorna un inter que contiene el id del correo alectronico almacenado
*
*/

function almacenar_correo_electronico($mysqli,$correo)
  {
	  $correo_encriptado = encrypt_string($correo);
	  $estatus=1;

	  //Inicio del query preparado
		$stmt = $mysqli->prepare("INSERT INTO `correo_electronico` (`id_correo_electronico`, `correo_electronico`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
														VALUES
														(NULL,?,?,now(),now())");

		//Indica a la base de datos que recibira 1 string y 1 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param( "si", $correo_encriptado, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();


		//inicio del query
		$query = "SELECT `id_correo_electronico` FROM correo_electronico WHERE `correo_electronico` = ? ORDER BY (id_correo_electronico) DESC LIMIT 1";
		if ($stmt = $mysqli->prepare($query))
			{
			//Asigna las variables para el query
			$stmt->bind_param("s", $correo_encriptado);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_correo_electronico);

			//obtener valor
			while ($stmt->fetch())
				{

				}

			//Cierra el query
			$stmt->close();
			}
	return $id_correo_electronico;
  }
?>
