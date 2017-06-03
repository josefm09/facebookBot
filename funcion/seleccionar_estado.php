<?php

function seleccionar_estado($mysqli)
  {
	//inicio del query
	$query = "SELECT `id`, `nombre` FROM `estados`";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		//$stmt->bind_param("s", $correo_encriptado);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($id, $estado);

		//obtener valor
		while ($stmt->fetch())
			{
				$var[]=array(
					"id" => $id,
					"estado" => $estado
				);
			}

		//Cierra el query
		$stmt->close();
		}
	return $var;
  }
?>
