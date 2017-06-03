<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Mayo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Agrupa las funciones para el manejo de todas la posibles acciones a llevar
* a cabo al manejar ventas
*/

class ventas
  {
  function nuevo_ticket_para_sucursal($mysqli, $id_sucursal)
    {
    /*
    * Con base al id_sucursal toma el identificar_sucursal, iteracion y
    * contador_actual para formar un nuevo ticket el cual es guardado en
    *la tabla ticket_sucursal_historial
    *
    * Retorna id_ticket_sucursal_historial
    */
    $query = "SELECT nuevo_ticket_para_sucursal(?)";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("i", $id_sucursal);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($respuesta_mysql);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		//
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $respuesta_mysql;
    }
	
	function nueva_venta($mysqli, $id_producto, $precio, $descuento, $id_comensal, $registrado_por, $estatus)
    {
    /*
    * Crea un nuevo producto y lo relaciona con al empresa enviada
    *
    * Retorna el $id_producto
    */
    $estatus = 1;//Por defecto los producos estan activos

    //******Alta del producto******
    $stmt = $mysqli->prepare("INSERT INTO `venta` (`id_venta`, `id_producto`, `precio`, `descuento`, `id_comensal`, `id_ticket_sucursal_historial`, `registrado_por`, `estatus`, `fecha_creacion`, `ultima_modificacion`) 
								VALUES 
								(NULL, ?, ?, ?, ?, NULL, ?, ?, now(), now());");

    //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("issiii", $id_producto, $precio, $descuento, $id_comensal, $registrado_por ,$estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();


    return $nuevo_id;
    }
	
	function consulta_venta_por_id_comensal($mysqli, $id_comensal)
    {
   /*
    * Retorna un JSON con todas las clasificaciones que la empresa tiene
    * como activas y la imagen
    */
    //Array que sera retornado
    $venta = array();

    $query = "SELECT
				  id_venta,
				  id_producto,
				  precio,
				  descuento,
				  id_ticket_sucursal_historial,
				  registrado_por
				FROM
				  venta
				WHERE
				 estatus != 0 AND estatus != 5 AND id_comensal = ?";

    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      $stmt->bind_param("ii", $id_comensal, $id_comensal);

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($id_venta, $id_producto, $precio, $descuento, $id_ticket_sucursal_historial, $registrado_por);

      //obtener valor
      while ($stmt->fetch())
        {
        $venta[] = Array(
          "id_venta" => $id_venta,
          "id_producto" => $id_producto,
          "precio" => $precio,
          "descuento" => $descuento,
          "id_ticket_sucursal_historial" => $id_ticket_sucursal_historial,
          "registrado_por" => $registrado_por,
        );
        }

      //Cierra el query
      $stmt->close();
      }

    return $venta;

  }
  
  function consulta_comentario_por_id_venta($mysqli, $id_venta)
    {
   /*
    * Retorna un JSON con todas las clasificaciones que la empresa tiene
    * como activas y la imagen
    */
    //Array que sera retornado
    $arreglo = array();

    $query = "SELECT
				  comentario.id_comentario,
				  comentario.comentario
				FROM
				  comentario
				INNER JOIN
				  venta_comentario ON venta_comentario.id_comentario = comentario.id_comentario
				WHERE
				 comentario.estatus = 1 AND venta_comentario.estatus = 1 AND venta_comentario.id_venta = ?";

    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      $stmt->bind_param("i", $id_venta);

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($id_comentario, $comentario);

      //obtener valor
      while ($stmt->fetch())
        {
        $arreglo[] = Array(
          "id_comentario" => $id_comentario,
          "comentario" => $comentario,
        );
        }

      //Cierra el query
      $stmt->close();
      }

    return $arreglo;

  }
  }