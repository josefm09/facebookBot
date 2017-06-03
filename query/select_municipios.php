<?php
	$elementos_encontrados = array();//variable retornada
	$id_estado = $_POST['id_municipio'];

	$query = "SELECT id, estado_id, clave, nombre FROM municipios WHERE estado_id = $id_estado";

	if($stmt = $mysqli->prepare($query)){
		
		//Ejecuta el query
		$stmt->execute();
		
		//Asigna el resultado a una variable
		$stmt->bind_result($id, $estado_id, $clave, $nombre);
		
		//obtener valor 
		while ($stmt->fetch()) 
			{
				$elementos_encontrados[] = Array(
					"id" => $id,
					"estado_id" => $estado_id,
					"clave" => $clave,
					"nombre" => $nombre
				);
			}
				
		//Cierra el query
		$stmt->close();
	}
?>