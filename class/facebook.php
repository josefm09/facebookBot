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

  function tomar_ultimo_request($mysqli, $sender)
    {
    /*
    * Siempre da un output, si el usuario esta pasando por alguna fase de
    * multiples pasos se retorna el paso siguiente a cargar, alternativamente
    * retorna "default" si no hay actividad por un periodo de tiempo o "nothing"
    * si no hay ningun flujo en curso
    *
    * Esta funcion es la que actua como cierre de session y esta predefinida
    * en 3 minutos
    */
    $query = "SELECT `ultimo_request` FROM log_peticiones WHERE `id_cliente` = ? AND (UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(`fecha_creacion`)) < 180 ORDER BY(`id_log_peticiones`) DESC LIMIT 1";
    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      $stmt->bind_param( "i", $sender);

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($ultima_accion);

      //obtener valor
      while ($stmt->fetch())
        {

        }

      //Cierra el query
      $stmt->close();
      }

    if(!isset)
      {
      $ultima_accion = "default";
      }

    return $ultima_accion;
    }
  }
?>
