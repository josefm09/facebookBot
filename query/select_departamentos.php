<?php
	//inicio del query
	$query = "SELECT `id_departamento`, `departamento`, `parent_id`, `order_by`, `valida` FROM `departamentos`";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		//$stmt->bind_param("s", $correo_encriptado);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($id, $departamento, $parent_id, $order_by, $valida);

		//obtener valor
		while ($stmt->fetch())
			{
				$valores[]=array(
					"id_departamento" => $id,
					"departamento" => $departamento,
					"parent_id" => $parent_id,
					"order_by" => $order_by,
					"valida" => $valida
				);
			}
		//Cierra el query
		$stmt->close();
		}
	return $valores;
?>