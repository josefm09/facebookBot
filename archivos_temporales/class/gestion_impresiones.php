<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Marzo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Funciones usadas para el manejo de impresoras por medio del cliente java
*/

class impresiones
  {
  function crear_servidor_impresion($mysqli, $id_sucursal, $nombre)
    {
    /*
    * Este servidor estara registrado bajo la sucursal seleccionada y actuara
    * como un repositorio centralizado para las impresoras
    *
    * Una sucursal puede tener mas de un servidor de impresion
    */
    $estatus = 1;

    /*
    * Codigo alatorio para distinguir el servidor desde la api
    */
    $codigo_servidor = random_string_openssl(20);

    $stmt = $mysqli->prepare("INSERT INTO `servidor_impresion`(`id_servidor_impresion`, `id_sucursal`, `nombre`, `codigo_servidor`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("issi", $id_sucursal, $nombre, $codigo_servidor, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();

    return $codigo_servidor;
    }

  function url_absoluto_script()
    {
  	$page_url = 'http';

    if($_SERVER["HTTPS"] == "on")
      {
      $page_url .= "s";
      }

    $page_url .= "://";

    if($_SERVER["SERVER_PORT"] != "80")
      {
      $page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
      }

    else
      {
      $page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  	  }

    return $page_url;
  	}

  function registrar_impresora($mysqli, $codigo_servidor, $nombre)
    {
    /*
    * Registra una impresora en el servidor de impresion seleccionado
    */
    $estatus = 1;

    //*****Toma el id_servidor_impresion*****
    $query = "SELECT `id_servidor_impresion` FROM servidor_impresion WHERE `estatus` = 1 AND `codigo_servidor` = ?";
    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      $stmt->bind_param("s", $codigo_servidor);

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($id_servidor_impresion);

      //obtener valor
      while ($stmt->fetch())
        {

        }

      //Cierra el query
      $stmt->close();
      }

    //*****Registro de la impresora*****
    $stmt = $mysqli->prepare("INSERT INTO `impresora_servidor_impresion`(`id_impresora_servidor_impresion`, `id_servidor_impresion`, `impresora`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 1 string y 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("isi", $id_servidor_impresion, $nombre, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();
    }

  function tomar_orden_impresion($mysqli, $codigo_servidor)
    {
    /*
    * Retorna la orden de impresion mas antigua para el servidor que hace
    * el request
    */
    //*****Toma la orden de impresion*****
    $query = "SELECT
                orden_impresion.id_orden_impresion_impresion, orden_impresion.json_impresion
              FROM
                orden_impresion
              INNER JOIN
                impresora_servidor_impresion ON impresora_servidor_impresion.id_impresora_servidor_impresion = orden_impresion.id_impresora_servidor_impresion
              INNER JOIN
                servidor_impresion ON servidor_impresion.id_servidor_impresion = impresora_servidor_impresion.id_servidor_impresion
              WHERE
                servidor_impresion.codigo_servidor = ? AND orden_impresion.estatus = 1
              ORDER BY
                (
                  orden_impresion.id_orden_impresion_impresion
                ) ASC
              LIMIT 1";
    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      $stmt->bind_param("s", $codigo_servidor);

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($id, $json_impresion);

      //obtener valor
      while ($stmt->fetch())
        {

        }

      //Cierra el query
      $stmt->close();
      }

    //*****Modifica el estatus de la orden de impresion tomada*****
    $stmt = $mysqli->prepare("UPDATE orden_impresion SET `estatus` = 2 WHERE `id_orden_impresion_impresion` = ?");

    //Indica a la base de datos que recibira 1 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("i", $id);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();

    return $json_impresion;
    }

  function agregar_trabajo_impresion($mysqli, $id_impresora_servidor_impresion, $json_impresion)
    {
    /*
    * Agrega un nuevo trabajo de impresion
    */
    $estatus = 1;
    $stmt = $mysqli->prepare("INSERT INTO `orden_impresion`(`id_orden_impresion_impresion`, `id_impresora_servidor_impresion`, `json_impresion`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("isi", $id_impresora_servidor_impresion, $json_impresion, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();
    }
  }
