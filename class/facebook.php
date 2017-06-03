<?php
/*
* Agrupacion de las funciones necesarias para el bot de facebook
*/
class facebook
  {
  function introducir_ultimo_request($mysqli, $id_cliente, $request)
    {
    /*
    * Registra las acciones a cargar en la api en caso de necesitarse seguir
    * un flujo definido durante un proceso
    *
    * Esta tabla es la que se usa como limitante de la session de un usuario
    * al usar facebook
    */
    $estatus = 1;

    //Inicio del query preparado
  	$stmt = $mysqli->prepare("INSERT INTO `log_peticiones` (`id_log_peticiones`, `id_cliente`, `ultimo_request`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
  														VALUES
  														(NULL,?,?,?,now(),now())");

  		//Indica a la base de datos que recibira 1 integer y 2 strings correspoendietes a los signos de ? en el query
  		$stmt->bind_param("ssi", $id_cliente, $request, $estatus);

  		//Ejecuta el query
  		$stmt->execute();

  		//Cierra el query
  		$stmt->close();

    return "success";
    }
  }
?>
