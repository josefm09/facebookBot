<?PHP

	class voto_ciudadano
	{
		
		function insertar_propuesta_voto_ciudadano($mysqli, $id_propuesta, $id_ciudadano, $voto){
			$estatus=1;
			$query = "INSERT INTO `propuesta_votacion_ciudadano`(`id_propuesta_votacion_ciudadano`, `id_propuesta`, `id_ciudadano`, `votacion`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
						VALUES(NULL, ?,?,?,?,now(),now())";
			$stm = $mysqli->prepare($query);
			$stm->bind_param("sssi",$id_propuesta, $id_ciudadano, $voto, $estatus);
			$stm->execute();
			$id_propuesta_votacion_ciudadano = $stm->insert_id;
			$stm->close();
			
			return ($id_propuesta_votacion_ciudadano);
		}
		
	}

?>