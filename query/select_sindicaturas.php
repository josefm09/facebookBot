<?php
	//inicio del query
	$valores = array();
	$query = "SELECT `id_sindicatura`, `sindicatura` FROM `sindicaturas`";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		//$stmt->bind_param("s", $correo_encriptado);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($id, $sindicatura);

		//obtener valor
		while ($stmt->fetch())
			{
				$valores[]=array(
					"id_sindicatura" => $id,
					"sindicatura" => $sindicatura
				);
			}
		//Cierra el query
		$stmt->close();
		}
	return $valores;
?>
