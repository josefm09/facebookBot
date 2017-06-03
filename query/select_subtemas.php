<?php
	
	$valores = array();
	//inicio del query
	$query = "SELECT `id_sub_tema`, `sub_tema`, `id_tema` FROM `sub_temas`";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		//$stmt->bind_param("s", $correo_encriptado);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($id, $tema, $id_tema);

		//obtener valor
		while ($stmt->fetch())
			{
				$valores[]=array(
					"id_sub_tema" => $id,
					"sub_tema" => $tema,
					"id_tema" => $id_tema
				);
			}
		//Cierra el query
		$stmt->close();
		}
	return $valores;
?>
