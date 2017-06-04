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

		function almacenar_correo($mysqli, $correo_electronico )
		{

			$estatus = 1;

			$query = "INSERT INTO `correo_electronico`(`id_correo_electronico`,
													`correo_electronico`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
												VALUES
													(NULL,?,?,now(),now())";

			if ($stmt = $mysqli->prepare($query))
					  {
					  //Asigna las variables para el query
					  $stmt->bind_param("ii", $correo_electronico, $estatus);

					  //Ejecuta el query
					  $stmt->execute();

					  $id_ciudadano = $stmt->insert_id;

					  //Cierra el query
					  $stmt->close();
					  }

					return $id_ciudadano;

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
