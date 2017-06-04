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
				  {
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
}


?>
