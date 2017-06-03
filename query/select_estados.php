<?php
	$elementos_encontrados = array();//variable retornada
	$contador_estados = 1;
	
	$query = "SELECT `id`,`clave`,`nombre`,`abrev` FROM estados";
	if($stmt = $mysqli->prepare($query)){
		
		//Ejecuta el query
		$stmt->execute();
		
		//Asigna el resultado a una variable
		$stmt->bind_result($id, $clave, $nombre, $abrev);
		
		//obtener valor 
		while ($stmt->fetch()) {
				//$direccion_imagen = '../imagenes/categoria/'.$hash.'.'.$extension;
			$elementos_encontrados[] = Array(
				"id" => $id,
				"clave" => $clave,
				"nombre" => $nombre,
				"abrev" => $abrev
			);
		}
				
		//Cierra el query
		$stmt->close();
	}
?>