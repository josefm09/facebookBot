<?php

	class gestion_peticion{
	
		function obtener_imagen_peticion_por_id_peticion ($mysqli, $id_propuesta) {
			$estatus = 1;
			$stmt = $mysqli->prepare("Select id_imagen from propuesta_imagen where id_propuesta = ? and estatus = ?");
			
			$stmt->bind_param("ii", $id_propuesta, $estatus);

			$stmt->execute();

			$stmt->bind_result($id_imagen);

			$id_imagen_buscada = 0;
			while($stmt->fetch()) {
				$id_imagen_buscada = $id_imagen;
			}

			$stmt->close();

			//Para este punto, tenemos ya obtenido el id de la imagen, ahora solo la buscamos

			$stmt = $mysqli->prepare("SELECT `nombre_de_almacenado`, `extencion`  from imagen where id_imagen = ? and estatus = ?");

			$stmt->bind_param("ii", $id_imagen_buscada, $estatus);

			$stmt->execute();

			$stmt->bind_result($nombre_imagen, $extencion);

			$nombre_imagen_desencriptada = "";

			while($stmt->fetch()) {
			}
			$nombre_completo = $nombre_imagen.".".$extencion;
			$stmt->close();	
			
			return $nombre_completo;
		}

		function obtener_tema_peticion_por_id_peticion($mysqli, $id_propuesta) {
			
			$query = "SELECT `id_subtema` from `propuesta_subtema` where `id_propuesta` = ?";
			if($stmt = $mysqli->prepare($query))
			{
			  //Asigna las variables para el query
			  $stmt->bind_param("i", $id_propuesta);

			  //Ejecuta el query
			  $stmt->execute();

			  //Asigna el resultado a una variable
			  $stmt->bind_result($id_subtema);

			  //obtener valor
			  while ($stmt->fetch())
				{
				
				}
				//Cierra el query
				$stmt->close();
			}

			return $id_subtema;
		}
			
		function obtener_tema_id_por_id_subtema($mysqli, $id_subtema) {
			
			$query = "SELECT sub_temas.sub_tema, temas.tema from sub_temas INNER JOIN temas on temas.id_tema = sub_temas.id_tema where id_sub_tema = ?";
			if($stmt = $mysqli->prepare($query))
			{
			  //Asigna las variables para el query
			  $stmt->bind_param("i", $id_subtema);

			  //Ejecuta el query
			  $stmt->execute();

			  //Asigna el resultado a una variable
			  $stmt->bind_result($nombre_subtema, $nombre_tema);

			  //obtener valor
			  while ($stmt->fetch())
				{
				}
				//Cierra el query
				$stmt->close();
				
				$datos_tema = Array(
					"nombre_subtema" => $nombre_subtema, 
					"nombre_tema" => $nombre_tema 
				);
			}

			return $datos_tema;
		}
		
				
		function obtener_informacion_por_id($mysqli, $id_propuesta) {
			$estatus = 1;
			$datos_propuesta = Array();
			$query = "SELECT `titulo`,`problematica`,`solucion` from propuesta where id_propuesta = ? and estatus = ?";
			if($stmt = $mysqli->prepare($query))
			{
			  //Asigna las variables para el query
			  $stmt->bind_param("ii", $id_propuesta, $estatus);

			  //Ejecuta el query
			  $stmt->execute();

			  //Asigna el resultado a una variable
			  $stmt->bind_result($titulo, $problematica, $solucion);

			  //obtener valor
			  while ($stmt->fetch())
				{
				}
				//Cierra el query
				$stmt->close();
				
				$datos_propuesta = Array (
					"titulo" => $titulo, 
					"problematica" => $problematica, 
					"solucion" => $solucion
				);
			}

			return $datos_propuesta;
		}
			
		
	}

?>