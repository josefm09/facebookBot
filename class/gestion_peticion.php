<?php

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

	function obtener_tema_peticion_por_id_peticion($mysqli, $id_peticion) {
		$estatus = 1;
		
		$stmt=$mysqli->prepare("SELECT tema from peticion where estatus = ?");
		
		$stmt->bind_param("i", $estatus);

		$stmt->execute();

		$stmt->bind_result($tema);

		$tema_peticion = 1;

		while($stmt->fetch()) {
			$tema_peticion = $tema;
		}

		$stmt->close();

		$stmt=$mysqli->prepare("SELECT tema from temas where id_tema = ?");

		$stmt->bind_param("i", $tema_peticion);

		$stmt->execute();

		$stmt->bind_result($tema);

		$tema_desencriptado = "";
		while($stmt->fetch()) {
			$tema_desencriptado = $tema;
		}

		$stmt->close();

		return $tema_desencriptado;
	}

?>