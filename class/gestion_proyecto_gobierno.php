<?php

class gestion_proyecto_gobierno

  {

  function almacenar_nuevo_proyecto($mysqli, $id_cliente)

    {
//
      //inicio del query

    	$query = "SELECT COUNT(*) FROM cliente WHERE `id_cliente` = ? AND `estatus` = 1";

    	if ($stmt = $mysqli->prepare($query))

    		{

    		//Asigna las variables para el query

    		$stmt->bind_param( "i", $id_cliente);



    		//Ejecuta el query

    		$stmt->execute();



    		//Asigna el resultado a una variable

    		$stmt->bind_result($count_cliente);



    		//obtener valor

    		while ($stmt->fetch())

    			{



    			}



    		//Cierra el query

    		$stmt->close();

    		}



    if($count_cliente > 0)

      {

      $respuesta = "success";

      }



    if($count_cliente == 0)

      {

      $respuesta = "error";

      }



    return $respuesta;

    }
  }
?>
