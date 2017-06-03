<?php
	$valores = array();
	//inicio del query
	$query = "SELECT `id_colonia`, `colonia` FROM `colonias`";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		//$stmt->bind_param("s", $correo_encriptado);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($id, $colonia);

		//obtener valor
		while ($stmt->fetch())
			{
				$valores[]=array(
					"id_colonia" => $id,
					"colonia" => $colonia
				);
			}
		//Cierra el query
		$stmt->close();
		}
	return $valores;
?>
