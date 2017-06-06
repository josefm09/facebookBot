<?PHP
class problematica
{
	function crear_problematica($mysqli, $id_participante, $id_sub_tema, $id_sesion, $ponente_designado, $origen_presentacion, $tipo, $titulo, $descripcion, $propuesta_solucion, $estado)
	{
		estatus = 1;
		
		$query = "INSERT INTO ´problematica´(´id_problematica´, ´id_participante´, ´id_sub_tema´, ´id_sesion´, ´ponente_designado´, ´origen_presentacion´, ´tipo´
												, ´titulo´, ´descripcion´, ´propuesta_solucion´, ´estado´, ´estatus´, `fecha_creacion`, `ultima_modificacion`)
											VALUES
												(NULL,?,?,?,?,?,?,?,?,?,?,?,now(),now())";
		
		if ($stmt = $mysqli->prepare($query))
				  {
				  //Asigna las variables para el query
				  $stmt->bind_param("iiisssssssi", $id_participante, $id_sub_tema, $id_sesion, $ponente_designado, $origen_presentacion, $tipo, $titulo, 
										$descripcion, $propuesta_solucion, $estado, $estatus);

				  //Ejecuta el query
				  $stmt->execute();

				  $id_problematica = $stmt->insert_id;

				  //Cierra el query
				  $stmt->close();
				  }

				return $id_problematica;
	}
}

?>