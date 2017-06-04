<?PHP

class participante
{
	function crear_participante($mysqli, $nombre, $calle, $numero, $id_colonia, $id_sindicatura, $codigo_postal, $comunidad)
	{
		
		$estatus = 1;
		
		$query = "INSERT INTO ´participante´(´id_participante´, ´nombre´, ´calle´, ´numero´, ´id_colonia´, ´id_sindicatura´, ´codigo_postal´, ´comunidad´,
												´estatus´, `fecha_creacion`, `ultima_modificacion`)
											VALUES
												(´NULL,?,?,?,?,?,?,?,?,now(),now())";
												
		if ($stmt = $mysqli->prepare($query))
				  {
				  //Asigna las variables para el query
				  $stmt->bind_param("ssiiiisi", $nombre, $calle, $numero, $id_colonia, $id_sindicatura, $codigo_postal, $comunidad, $estatus);

				  //Ejecuta el query
				  $stmt->execute();

				  $id_participante = $stmt->insert_id;

				  //Cierra el query
				  $stmt->close();
				  }

				return $id_participante;
	}
}


?>