<?PHP
	class comentario_ciudadano(){
		
		function insertar_propuesta_comentario_ciudadano($mysqli, $id_propuesta, $id_cliudadano, $comentario){
			
			$estatus=1;
			$query = "INSERT INTO `propuesta_comentario_ciudadano`(`id_propuesta_comentario_ciudadano`, `id_propuesta`, `id_ciudadano`, `comentario`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
						VALUES(NULL, ?,?,?,?,now(),now())";
			$stm = $mysqli->prepare($query);
			$stm->bind_param("iisi",$id_propuesta, $id_cliudadano, $comentario, $estatus);
			$stm->execute();
			$id_propuesta_comentario_ciudadano=-$mysqli->insert_id;
			$stm->close();
			return ($id_propuesta_comentario_ciudadano);
		}
	}
?>