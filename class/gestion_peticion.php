<?php

	class gestion_peticion{
	
		function obtener_imagen_peticion_por_id_peticion ($mysqli, $id_peticion) {
			$stmt = $mysqli->prepare("Select id_imagen from peticion_imagen where id_peticion = ?");
			
			$stmt->bind_param("i", $id_peticion);

			$stmt->execute();

			$stmt->bind_result($id_imagen);

			$id_imagen_buscada = 0;
			while($stmt->fetch()) {
				$id_imagen_buscada = $id_imagen;
			}

			$stmt->close();

			//Para este punto, tenemos ya obtenido el id de la imagen, ahora solo la buscamos

			$stmt = $mysqli->prepare("SELECT `nombre_de_almacenado` from imagen where id_imagen = ? and estatus = ?");

			$stmt->bind_param("ii", $id_imagen_buscada, $estatus);

			$stmt->execute();

			$stmt->bind_result($nombre_imagen);

			$nombre_imagen_desencriptada = "";

			while($stmt->fetch()) {
				$nombre_imagen_desencriptada = decrypt_string($nombre_imagen);
			}

			$stmt->close();
			
			return $nombre_imagen_desencriptada;
		}

		function obtener_tema_peticion_por_id_peticion($mysqli, $id_tema) {
			
			$query = "SELECT `tema` from `temas` where `id_tema` = ?";
			if($stmt = $mysqli->prepare($query))
			{
			  //Asigna las variables para el query
			  $stmt->bind_param("i", $id_tema );

			  //Ejecuta el query
			  $stmt->execute();

			  //Asigna el resultado a una variable
			  $stmt->bind_result($tema);

			  //obtener valor
			  while ($stmt->fetch())
				{
				
				}
				$nombre_tema = $tema;
				  //Cierra el query
				  $stmt->close();
			}

			return $nombre_tema;
		}
			
			/*$stmt=$mysqli->prepare("SELECT tema from temas where id_tema = ?");

			$stmt->bind_param("i", $tema_peticion);

			$stmt->execute();

			$stmt->bind_result($tema);

			$tema_desencriptado = "";
			while($stmt->fetch()) {
				$tema_desencriptado = $tema;
			}

			$stmt->close();

			return $tema_desencriptado;*/
		
	}

?>