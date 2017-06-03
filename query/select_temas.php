<?php
	$valores = array();
	//inicio del query
	$query = "SELECT `id_tema`, `tema` FROM `temas`";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		//$stmt->bind_param("s", $correo_encriptado);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($id, $tema);

		//obtener valor
		while ($stmt->fetch())
			{
				$valores[]=array(
					"id_tema" => $id,
					"tema" => $tema
				);
			}
		//Cierra el query
		$stmt->close();
		}
	return $valores;
?>
