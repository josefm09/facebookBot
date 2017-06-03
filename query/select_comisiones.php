<?php
	$valores = array();
	//inicio del query
	$query = "SELECT id_comision, comision, tipo FROM `comisiones`";
	if ($stmt = $mysqli->prepare($query)) {
		//Asigna las variables para el query
		//$stmt->bind_param("s", $correo_encriptado);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($id, $comision, $tipo);

		//obtener valor
		while ($stmt->fetch())
			{
				$valores[]=array(
					"id_comision" => $id,
					"comision" => $estado,
					"tipo_comision" => $tipo
				);
			}
		//Cierra el query
		$stmt->close();
	}
	return $valores;
?>