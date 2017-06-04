<?PHP

class ciudadano
{
	function crear_ciudadano($mysqli, $id ,$nombre)
	{

		$estatus = 1;

		$query = "INSERT INTO `ciudadano`(`id_ciudadano`, `nombre`,
												`estatus`, `fecha_creacion`, `ultima_modificacion`)
											VALUES
												(?,?,?,now(),now())";

		if ($stmt = $mysqli->prepare($query))
				  
				  //Asigna las variables para el query
				  $stmt->bind_param("isi", $id, $nombre, $estatus);

				  //Ejecuta el query
				  $stmt->execute();

				  $id_ciudadano = $stmt->insert_id;

				  //Cierra el query
				  $stmt->close();
				  }

				return $id_ciudadano;
	}

	function verificar_existencia_ciudadano($mysqli, $id_ciudadano)

    {
//
      //inicio del query

    	$query = "SELECT COUNT(*) FROM ciudadano WHERE `id_ciudadano` = ? AND `estatus` = 1";

    	if ($stmt = $mysqli->prepare($query))

    		{

    		//Asigna las variables para el query

    		$stmt->bind_param( "i", $id_ciudadano);



    		//Ejecuta el query

    		$stmt->execute();



    		//Asigna el resultado a una variable

    		$stmt->bind_result($count_ciudadano);



    		//obtener valor

    		while ($stmt->fetch())

    			{



    			}



    		//Cierra el query

    		$stmt->close();

    		}



    if($count_ciudadano > 0)

      {

      $respuesta = "success";

      }



    if($count_ciudadano == 0)

      {

      $respuesta = "error";

      }



    return $respuesta;

    }
	
	function informacion_ciudano_por_id($mysqli, $id_ciudadano){
		$estatus = 1;
		$datos_ciudadano = new array();
		$query = "SELECT ciudadano.nombre, correo_electronico.correo_electronico, telefono.telefono FROM ciudadano
					INNER JOIN ciudadano_correo_electronico ON ciudadano_correo_electronico.id_ciudadano = ciudadano.id_ciudadano
					INNER JOIN correo_electronico ON correo_electronico.id_correo_electronico = ciudadano_correo_electronico.id_correo_electronico
					INNER JOIN ciudadano_telefono ON ciudadano_telefono.id_ciudadano = ciudadano.id_ciudadano
					INNER JOIN telefono ON telefono.id_telefono = ciudadano_telefono.id_telefono
					WHERE ciudadano.id_ciudadano = ? AND ciudadano.estatus = ? AND correo_electronico.estatus = ? AND telefono.estatus = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param( "iiii", $id_ciudadano, $estatus, $estatus, $estatus);
			$stmt->bind_result($nombre, $telefono, $correo);
			
			while ($stmt->fetch())
			{
				//Cierra el query
				$stmt->close();
				
				$datos_ciudadano = Array (
					"nombre" => $nombre, 
					"telefono" => $telefono, 
					"correo" => $correo
				);
			}
		}
		return($datos_ciudadano);
	}
	
		
	
	function consulta_correo_por_id($mysqli, $id_ciudadano){
		$estatus = 1;
		$query = "SELECT correo_electronico.estatus from ciudadano_correo_electronico INNER JOIN correo_electronico on ciudadano_correo_electronico.id_correo_electronico = correo_electronico.id_correo_electronico where id_ciudadano = ?";
		
    	if ($stmt = $mysqli->prepare($query))
    	{

    		//Asigna las variables para el query
    		$stmt->bind_param( "i", $id_ciudadano);
			
    		//Ejecuta el query
    		$stmt->execute();

    		//Asigna el resultado a una variable
    		$stmt->bind_result($estatus);
			
    		//obtener valor
    		while ($stmt->fetch())
			{
				
			}
    		
    		//Cierra el query
    		$stmt->close();
			
			if($estatus == 1){
				return true;
			}else{
				return false;
			}
	}
	
	
}


?>
