<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Marzo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Agrupa las funciones para el manejo de productos dentro del sistema
*/

class productos
  {
  function tipos_de_producto($mysqli)
    {
    /*
    * Retorna los tipos de productos que estan marcados como activos
    * en el sistema
    */
    //Array que sera retornado
    $tipo_producto = array();

    $query = "SELECT `id_tipo_producto`, `tipo` FROM tipo_producto WHERE `estatus` = 1";
    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      //$stmt->bind_param("", );

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($id_tipo_producto, $tipo);

      //obtener valor
      while ($stmt->fetch())
        {
        $tipo_producto[] = Array(
          "id_tipo_producto" => $id_tipo_producto,
          "tipo" => $tipo
        );
        }

      //Cierra el query
      $stmt->close();
      }

    return $tipo_producto;
    }

  function tipos_de_impuesto($mysqli)
    {
    /*
    * Retorna los tipos de impuestos que estan marcados como activos
    * en el sistema
    */
    //Array que sera retornado
    $tipo_impuesto = array();

    $query = "SELECT `id_impuesto`, `tipo_impuesto` FROM `impuesto` WHERE `estatus` = 1";
    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      //$stmt->bind_param("", );

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($id_impuesto, $tipo);

      //obtener valor
      while ($stmt->fetch())
        {
        $tipo_impuesto[] = Array(
          "id_impuesto" => $id_impuesto,
          "tipo_impuesto" => $tipo
        );
        }

      //Cierra el query
      $stmt->close();
      }

    return $tipo_impuesto;
    }

  function crear_producto($mysqli, $estatus, $nombre, $id_tipo_producto, $clasificacion, $codigo_barras, $cantidad_consumible, $boolean_acumulable, $boolean_agrupamiento, $id_imagen, $iva, $ieps, $id_empresa)
    {
    /*
    * Crea un nuevo producto y lo relaciona con al empresa enviada
    *
    * Retorna el $id_producto
    */
    $estatus = 1;//Por defecto los producos estan activos

    //******Alta del producto******
    $stmt = $mysqli->prepare("INSERT INTO `producto`(`id_producto`, `codigo_barras`, `nombre`, `boolean_acumulable`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("ssii", $codigo_barras, $nombre, $boolean_acumulable, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();

	//***Se relaciona la cantidad_consumible con su id del producto en la tabla producto_cantidad_consumible ***
    $stmt = $mysqli->prepare("INSERT INTO `producto_cantidad_consumible`(`id_producto_cantidad_consumible`, `id_producto`, `cantidad`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $nuevo_id, $cantidad_consumible, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id_producto_consumible = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();
	
	//***Se relaciona la fraccion con su id del producto en la tabla producto_fraccion_producto ***
    $stmt = $mysqli->prepare("INSERT INTO `producto_fraccion_producto`(`id_producto_fraccion_producto`, `id_producto`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("ii", $nuevo_id, $boolean_agrupamiento);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id_producto_fraccion = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();
	
    //******Relacion del producto con la empresa******
    $stmt = $mysqli->prepare("INSERT INTO `producto_empresa`(`id_producto_empresa`, `id_empresa`, `id_producto`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 6 string y 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $id_empresa, $nuevo_id, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();

    //******Relacion del producto con tipo producto******
    $stmt = $mysqli->prepare("INSERT INTO `producto_tipo_producto`(`id_producto_tipo_producto`, `id_tipo_producto`, `id_producto`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $id_tipo_producto, $nuevo_id, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();

    //******Relacion del producto con su imagen******
    $stmt = $mysqli->prepare("INSERT INTO `producto_imagen`(`id_producto_imagen`, `id_producto`, `id_imagen`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $nuevo_id, $id_imagen, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close(); 
	
	//******Relacion del producto con su clasificacion******
    $stmt = $mysqli->prepare("INSERT INTO `clasifiacion_producto`(`id_clasifiacion_producto`, `id_clasificacion`, `id_producto`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $clasificacion, $nuevo_id, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();

    return $nuevo_id;
    }

	
  function agregar_ingrediente_a_producto($mysqli, $id_producto, $id_producto_ingrediente, $cantidad_ingrediente)
  {
	/*
    * Se relaciona los ingredientes con su producto
    *
    * Retorna el $id_producto_ingrediente
    */
    $estatus = 1;//Por defecto los producos estan activos

     //******Alta del producto******
    $stmt = $mysqli->prepare("INSERT INTO `producto_ingrediente`(`id_producto_ingrediente`, `id_producto`, `id_ingrediente`, `cantidad`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iiii", $id_producto, $id_producto_ingrediente, $cantidad_ingrediente, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id_producto_ingrediente = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();
	
	return $nuevo_id_producto_ingrediente;
  } 
  
  function agregar_producto_impuesto($mysqli, $id_producto, $id_impuesto, $porcentaje)
  {
	/*
    * Se relaciona los impuestos con su producto
    *
    * Retorna el $id_producto_impuesto
    */
    $estatus = 1;//Por defecto los producos estan activos

     //******Alta del producto******
    $stmt = $mysqli->prepare("INSERT INTO `producto_impuesto`(`id_producto_impuesto`, `id_producto`, `id_impuesto`, `porcentaje`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iisi", $id_producto, $id_impuesto, $porcentaje, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id_producto_impuesto = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();
	
	return $nuevo_id_producto_impuesto;
  }
  
   function agregar_unidad_a_producto($mysqli, $id_producto, $id_unidad_original, $cantidad_unidad, $id_unidad_conversion)
  {
	/*
    * Se relaciona las unidades con su producto
    *
    * Retorna el $id_producto_unidad_medida
    */
    $estatus = 1;//Por defecto los producos estan activos

     //******Alta del producto******
    $stmt = $mysqli->prepare("INSERT INTO `producto_unidad_medida`(`id_producto_unidad_medida`, `id_producto`, `id_unidad_original`, `cantidad_unidad`, `id_unidad_conversion`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 5 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iiiii", $id_producto, $id_unidad_original, $cantidad_unidad, $id_unidad_conversion, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id_producto_unidad = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();
	
	return $nuevo_id_producto_unidad;
  }
	
	
  function agregar_impuesto_producto($mysqli, $id_producto, $id_impuesto, $porcentaje)
    {
    if(is_numeric($porcentaje))
      {
      $estatus = 1;
      $stmt = $mysqli->prepare("INSERT INTO `producto_impuesto`(`id_producto_impuesto`, `id_producto`, `id_impuesto`, `porcentaje`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
      													VALUES
      													(NULL,?,?,?,?,now(),now())");

      //Indica a la base de datos que recibira 3 integer y 1 string correspoendietes a los signos de ? en el query
      $stmt->bind_param("iisi", $id_producto, $id_impuesto, $porcentaje, $estatus);

      //Ejecuta el query
      $stmt->execute();

      //Cierra el query
      $stmt->close();

      $repuesta = "success";
      }

      else
        {
        $repuesta = "error";
        }


    return $repuesta;
    }

  function productos_sucursal_por_estatus($mysqli, $id_sucursal, $estatus)
    {
    /*
    * Retorna los productos de una sucursal segun el estatus solicitado
    */
    //Array que sera retornado
    $productos = array();

    $query = "SELECT
                producto.id_producto,
                producto.nombre,
                tipo_producto.tipo,
				clasificacion.nombre
              FROM
                `producto_sucursal`
              INNER JOIN
                producto ON producto.id_producto = producto_sucursal.id_producto
              INNER JOIN
                producto_tipo_producto ON producto_tipo_producto.id_producto = producto_sucursal.id_producto
              INNER JOIN
                tipo_producto ON tipo_producto.id_tipo_producto = producto_tipo_producto.id_tipo_producto
                INNER JOIN clasifiacion_producto ON clasifiacion_producto.id_producto = producto.id_producto
                INNER JOIN clasificacion ON clasificacion.id_clasificacion = clasifiacion_producto.id_clasificacion

              WHERE
                producto_sucursal.estatus = ? AND producto_sucursal.id_sucursal = ?
                ORDER by (clasificacion.nombre) ASC";
    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      $stmt->bind_param("ii", $estatus, $id_sucursal);

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($id_producto, $nombre, $tipo, $clasificacion);

      //obtener valor
      while ($stmt->fetch())
        {
        $productos[] = Array(
          "id_producto" => $id_producto,
          "nombre" => $nombre,
          "tipo" => $tipo,
		  "clasificacion" => $clasificacion
        );
        }

      //Cierra el query
      $stmt->close();
      }

    return $productos;
    }
	function consultar_productos_por_nombre($mysqli, $nombre_producto, $id_sucursal, $estatus){
		/*
		* Retorna los productos de una sucursal segun el nombre y estatus solicitado
		*/
		//Array que sera retornado

		$nombre_producto = '%'.$nombre_producto.'%';

		$productos = array();

		$query = "SELECT
					producto.id_producto,
					producto.nombre,
					tipo_producto.tipo
				FROM
					`producto_sucursal`
				INNER JOIN
					producto ON producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					producto_tipo_producto ON producto_tipo_producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					tipo_producto ON tipo_producto.id_tipo_producto = producto_tipo_producto.id_tipo_producto
				WHERE
					producto_sucursal.estatus = ? AND producto_sucursal.id_sucursal = ? AND producto.nombre like ?";
		if ($stmt = $mysqli->prepare($query)){
			//Asigna las variables para el query
			$stmt->bind_param("iis", $estatus, $id_sucursal, $nombre_producto);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_producto, $nombre, $tipo);

			//obtener valor
			while ($stmt->fetch()){
				$productos[] = Array(
					"id_producto" => $id_producto,
					"nombre" => $nombre,
					"tipo" => $tipo
				);
			}

			//Cierra el query
			$stmt->close();
		}
		/*
		$productos[] = Array(
					"id_producto" => '1',
					"nombre" => 'cerveza',
					"tipo" => '0'
				);$productos[] = Array(
					"id_producto" => '2',
					"nombre" => 'hamburguesa',
					"tipo" => '0'
				);
		*/
		return $productos;
	}
	function consultar_productos_por_nombre_y_tipo($mysqli, $nombre_producto, $tipo, $id_sucursal, $estatus){
		/*
		* Retorna los productos de una sucursal segun el nombre y estatus solicitado
		*/
		//Array que sera retornado

		$nombre_producto = '%'.$nombre_producto.'%';

		$productos = array();

		$query = "SELECT
					producto.id_producto,
					producto.nombre
				FROM
					`producto_sucursal`
				INNER JOIN
					producto ON producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					producto_tipo_producto ON producto_tipo_producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					tipo_producto ON tipo_producto.id_tipo_producto = producto_tipo_producto.id_tipo_producto
				WHERE
					producto_sucursal.estatus = ? AND producto_sucursal.id_sucursal = ? AND producto.nombre like ? AND producto_tipo_producto.id_tipo_producto = ?";
		if ($stmt = $mysqli->prepare($query)){
			//Asigna las variables para el query
			$stmt->bind_param("iisi", $estatus, $id_sucursal, $nombre_producto, $tipo);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_producto, $nombre);

			//obtener valor
			while ($stmt->fetch()){
				$productos[] = Array(
					"id_producto" => $id_producto,
					"nombre" => $nombre
				);
			}

			//Cierra el query
			$stmt->close();
		}

		return $productos;
	}
	function consultar_productos_por_nombre_y_dos_tipos($mysqli, $nombre_producto, $tipo1, $tipo2, $id_sucursal, $estatus){
		/*
		* Retorna los productos de una sucursal segun el nombre y estatus solicitado
		*/
		//Array que sera retornado

		$nombre_producto = '%'.$nombre_producto.'%';

		$productos = array();

		$query = "SELECT
					producto.id_producto,
					producto.nombre
				FROM
					`producto_sucursal`
				INNER JOIN
					producto ON producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					producto_tipo_producto ON producto_tipo_producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					tipo_producto ON tipo_producto.id_tipo_producto = producto_tipo_producto.id_tipo_producto
				WHERE
					producto_sucursal.estatus = ? AND producto_sucursal.id_sucursal = ? AND producto.nombre like ? AND producto_tipo_producto.id_tipo_producto = ?";
		if ($stmt = $mysqli->prepare($query)){
			//Asigna las variables para el query
			$stmt->bind_param("iisi", $estatus, $id_sucursal, $nombre_producto, $tipo1);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_producto, $nombre);

			//obtener valor
			while ($stmt->fetch()){
				$productos[] = Array(
					"id_producto" => $id_producto,
					"nombre" => $nombre
				);
			}

			//Cierra el query
			$stmt->close();
		}

		/*
		* Retorna los productos de una sucursal segun el nombre y estatus solicitado
		*/

		$query = "SELECT
					producto.id_producto,
					producto.nombre
				FROM
					`producto_sucursal`
				INNER JOIN
					producto ON producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					producto_tipo_producto ON producto_tipo_producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					tipo_producto ON tipo_producto.id_tipo_producto = producto_tipo_producto.id_tipo_producto
				WHERE
					producto_sucursal.estatus = ? AND producto_sucursal.id_sucursal = ? AND producto.nombre like ? AND producto_tipo_producto.id_tipo_producto = ?";
		if ($stmt1 = $mysqli->prepare($query)){
			//Asigna las variables para el query
			$stmt1->bind_param("iisi", $estatus, $id_sucursal, $nombre_producto, $tipo2);

			//Ejecuta el query
			$stmt1->execute();

			//Asigna el resultado a una variable
			$stmt1->bind_result($id_producto, $nombre);

			//obtener valor
			while ($stmt1->fetch()){
				$productos[] = Array(
					"id_producto" => $id_producto,
					"nombre" => $nombre
				);
			}

			//Cierra el query
			$stmt1->close();
		}

		return $productos;
	}

	function consultar_producto_por_id($mysqli, $id_producto, $id_sucursal, $estatus){
		/*
		* Retorna los productos de una sucursal segun el nombre y estatus solicitado
		*/
		//Array que sera retornado

		$productos = array();

		$query = "SELECT
					producto.id_producto,
					producto.codigo_barras,
					producto.nombre,
					producto.boolean_acumulable,
					tipo_producto.tipo,
					precio.precio_venta,
					imagen.nombre_de_almacenado
				FROM
					`producto_sucursal`
				INNER JOIN
					producto ON producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					producto_tipo_producto ON producto_tipo_producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					tipo_producto ON tipo_producto.id_tipo_producto = producto_tipo_producto.id_tipo_producto
				INNER JOIN
					producto_precio ON producto_precio.id_producto = producto.id_producto
				INNER JOIN
					precio ON precio.id_precio = producto_precio.id_precio
				INNER JOIN
					producto_imagen ON producto_imagen.id_producto = producto.id_producto
				INNER JOIN
					imagen ON producto_imagen.id_imagen = imagen.id_imagen
				WHERE
					producto_sucursal.estatus = ? AND producto_sucursal.id_sucursal = ?  AND producto.id_producto = ?";
		if ($stmt = $mysqli->prepare($query)){
			//Asigna las variables para el query
			$stmt->bind_param("iii", $estatus, $id_sucursal, $id_producto);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_producto, $codigo_barras, $nombre, $boolean_acumulable, $tipo, $precio_venta, $imagen);

			//obtener valor
			while ($stmt->fetch()){
				$productos = Array(
					"id_producto" => $id_producto,
					"codigo_barras" => $codigo_barras,
					"nombre" => $nombre,
					"boolean_acumulable" => $boolean_acumulable,
					"tipo" => $tipo,
					"precio_venta" => $precio_venta,
					"imagen" => $imagen,
				);
			}

			//Cierra el query
			$stmt->close();
		}

		return $productos;
	}
	
	function consultar_producto_por_id_clasificacion($mysqli, $id_clasificacion, $id_sucursal, $estatus){
		/*
		* Retorna los productos de una sucursal segun el nombre y estatus solicitado
		*/
		//Array que sera retornado

		$productos = array();

		$query = "SELECT
					producto.id_producto,
					producto.codigo_barras,
					producto.nombre,
					producto.boolean_acumulable,
					producto_fraccion_producto.estatus,
					tipo_producto.tipo,
					precio.precio_venta,
					imagen.nombre_de_almacenado
				FROM
					`producto_sucursal`
				INNER JOIN
					producto ON producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					clasifiacion_producto ON producto_sucursal.id_producto = clasifiacion_producto.id_producto
				INNER JOIN
					producto_tipo_producto ON producto_tipo_producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					tipo_producto ON tipo_producto.id_tipo_producto = producto_tipo_producto.id_tipo_producto
				INNER JOIN
					producto_fraccion_producto ON producto_fraccion_producto.id_producto = producto_sucursal.id_producto
				INNER JOIN
					producto_precio ON producto_precio.id_producto = producto_sucursal.id_producto
				INNER JOIN
					precio ON precio.id_precio = producto_precio.id_precio
				INNER JOIN
					producto_imagen ON producto_imagen.id_producto = producto_sucursal.id_producto
				INNER JOIN
					imagen ON producto_imagen.id_imagen = imagen.id_imagen
				WHERE
					producto_sucursal.estatus = ? AND producto_sucursal.id_sucursal = ?  AND clasifiacion_producto.id_clasificacion = ?";
		if ($stmt = $mysqli->prepare($query)){
			//Asigna las variables para el query
			$stmt->bind_param("iii", $estatus, $id_sucursal, $id_clasificacion);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id_producto, $codigo_barras, $nombre, $boolean_acumulable, $boolean_agrupamiento, $tipo, $precio_venta, $imagen);

			//obtener valor
			while ($stmt->fetch()){
				$productos = Array(
					"id_producto" => $id_producto,
					"codigo_barras" => $codigo_barras,
					"nombre" => $nombre,
					"boolean_acumulable" => $boolean_acumulable,
					"boolean_agrupamiento" => $boolean_agrupamiento,
					"tipo" => $tipo,
					"precio_venta" => $precio_venta,
					"imagen" => $imagen,
				);
			}

			//Cierra el query
			$stmt->close();
		}

		return $productos;
	}


  function activar_producto_sucursal($mysqli, $id_sucursal, $id_producto, $existencia_actual, $cantidad_minima, $cantidad_maxima, $precio_compra, $precio_venta)
    {
    /*
    * Todas las sucursales tienen los productos creados por la empresa de forma
    * default como no vaiidados (estatus 2) para activarlos es necesario
    * proveer al sistema de un maximo y un minimo de dicho producto a ser
    * manejado en inventario lo cual aplicara solo a esa sucursal
    */
    $estatus = 1;

	if($id_sucursal != '' && $id_producto != '' && $existencia_actual != '' && $cantidad_minima != '' && $cantidad_maxima != '' && $precio_compra != '' && $precio_venta != '')
	{
		//Inicio del query preparado
		$stmt = $mysqli->prepare("UPDATE `producto_sucursal` SET `estatus` = 1 WHERE `id_producto` = ? AND `id_sucursal` = ? AND `estatus` = 2");

		//Indica a la base de datos que recibira 2 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("ii", $id_producto, $id_sucursal);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();

		//*****Crea una relacion con el minimo y maximo del producto que debe haber en la sucursal*****
		$stmt = $mysqli->prepare("INSERT INTO `inventario_producto_max_min_sucursal`(`id_inventario_producto_max_min_sucursal`, `maximo`, `minimo`, `id_producto`, `id_sucursal`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
								  VALUES
								  (NULL,?,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 5 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("iiiii", $cantidad_maxima, $cantidad_minima, $id_producto, $id_sucursal, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();

		//*****Hace el ajuste de inventario del produco para la sucursal actual*****
		$stmt = $mysqli->prepare("INSERT INTO `inventario_producto`(`id_inventario_producto`, `id_producto`, `id_sucursal`, `inventario`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
								  VALUES
								  (NULL,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 4 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("iiii", $id_producto, $id_sucursal, $existencia_actual, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();


		//*****inserta los precios del producto en la tabla precios*****
		$stmt = $mysqli->prepare("INSERT INTO `precio`(`id_precio`, `precio_compra`, `precio_venta`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
								  VALUES
								  (NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 4 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("ssi", $precio_compra, $precio_venta, $estatus);

		//Ejecuta el query
		$stmt->execute();
		
		//Toma el ID del insert recien hecho
		$id_precio = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();

		//*****inserta los precios del producto en la tabla precios*****
		$stmt = $mysqli->prepare("INSERT INTO `producto_precio`(`id_producto_precio`, `id_precio`, `id_producto`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
								  VALUES
								  (NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 4 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("iii", $id_precio, $id_producto, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();

		$respuesta = "success";

	}
	else
	{
		$respuesta = "error";
	}

	return $respuesta;
    }


	function almacenar_unidad_medida($mysqli, $nombre_unidad, $id_empresa){

		if($nombre_unidad != '' && $id_empresa != '')
		{
			$estatus = 1;
			$stmt = $mysqli->prepare("INSERT INTO `unidad_medida`( `id_unidad_medida`,`unidad`, `id_empresa`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

			//Indica a la base de datos que recibira 3 integer y 1 string correspoendietes a los signos de ? en el query
			$stmt->bind_param("sii", $nombre_unidad, $id_empresa, $estatus);

			//Ejecuta el query
			$stmt->execute();

			//Cierra el query
			$stmt->close();

			$respuesta = "success";
		}


		else
		{
		$respuesta = "error";
		}


		return $respuesta;

	}


	function unidades_activas($mysqli, $id_empresa)
    {
    /*
    * Toma todas las unidades asignadas a una empresa las cuales estan activas
    */
    //Array que sera retornado
  	$unidades = array();

	$query = "SELECT id_unidad_medida, unidad FROM unidad_medida WHERE estatus = 1 AND id_empresa = ?";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("i", $id_empresa);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($id_unidad_medida, $unidad);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		$unidades[] = Array(
  				"id_unidad_medida" => $id_unidad_medida,
  				"unidad" => $unidad

  			);
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $unidades;
    }

	function consulta_unidad_modificar($mysqli, $id_empresa, $id_unidad)
    {
    /*
    * consulta la unidad de medida a modificar para posocionarla en el modal
    */
	//Array que sera retornado
  	$consulta_unidad = array();

    $query = "SELECT id_unidad_medida, unidad FROM unidad_medida WHERE estatus = 1 AND id_empresa = ? AND id_unidad_medida = ?";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("ii", $id_empresa, $id_unidad);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($id_unidad_medida, $unidad);

    	//obtener valor
    	while ($stmt->fetch())
    		{
    		$consulta_unidad[] = Array(
  				"id_unidad_medida" => $id_unidad_medida,
  				"unidad" => $unidad

  			);
    		}

    	//Cierra el query
    	$stmt->close();
    	}

    return $consulta_unidad;
    }



	function modificar_unidad_medida($mysqli, $unidad_medida, $id_empresa, $id_unidad)
    {
    /*
    * Cambia el estatus de una mesa dinamica por aquel recibido
    *
    * Retorna "success" o "error"
    */
    if(isset($unidad_medida))
      {
      //Inicio del query preparado
      $stmt = $mysqli->prepare("UPDATE unidad_medida SET unidad = ? WHERE id_empresa = ? AND id_unidad_medida = ? AND estatus = 1");

      //Indica a la base de datos
      $stmt->bind_param("sii", $unidad_medida, $id_empresa, $id_unidad);

      //Ejecuta el query
      $stmt->execute();

      //Cierra el query
      $stmt->close();

      $repuesta = "success";
      }

    else
      {
      $repuesta = "error";
      }

    return $repuesta;
    }

  function listado_clasifiaciones_por_empresa($mysqli, $id_empresa)
    {
    /*
    * Retorna un JSON con todas las clasificaciones que la empresa tiene
    * como activas y la imagen
    */
    //Array que sera retornado
    $clasificaciones = array();

    $query = "SELECT
				  clasifiacion_empresa.id_clasificacion,
				  clasificacion.nombre,
				  clasifiacion_imagen.id_imagen,
				  imagen.nombre_original
				FROM
				  clasificacion
				INNER JOIN
				  clasifiacion_empresa
				ON
				  clasifiacion_empresa.id_clasificacion = clasificacion.id_clasificacion
				INNER JOIN
				  clasifiacion_imagen
				ON
				  clasifiacion_imagen.id_clasificacion = clasificacion.id_clasificacion
				INNER JOIN
				  imagen
				ON
				  clasifiacion_imagen.id_imagen = imagen.id_imagen
				WHERE
				  clasificacion.estatus != 0 AND clasifiacion_empresa.id_empresa = ?";

    if ($stmt = $mysqli->prepare($query))
      {
      //Asigna las variables para el query
      $stmt->bind_param("i", $id_empresa);

      //Ejecuta el query
      $stmt->execute();

      //Asigna el resultado a una variable
      $stmt->bind_result($id_clasificacion, $nombre, $imagen, $liga);

      //obtener valor
      while ($stmt->fetch())
        {
        $clasificaciones[] = Array(
          "id_clasificacion" => $id_clasificacion,
          "nombre" => $nombre,
          "imagen" => $imagen,
          "liga" => $liga
        );
        }

      //Cierra el query
      $stmt->close();
      }

    return $clasificaciones;
    }

  function crear_clasificacion($mysqli, $id_empresa, $nombre, $id_imagen_clasificacion)
    {
    /*
    * Crea una nueva clasificacion para la empresa dada
    */
    $estatus = 1;

    //**************************** Crea la clasificacion ****************************
    $stmt = $mysqli->prepare("INSERT INTO `clasificacion`(`id_clasificacion`, `nombre`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("si", $nombre, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();

    //**************************** Relacion de clasifiacion con empresa ****************************
    $stmt = $mysqli->prepare("INSERT INTO `clasifiacion_empresa`(`id_clasifiacion_empresa`, `id_empresa`, `id_clasificacion`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $id_empresa, $nuevo_id, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();

	if($id_imagen_clasificacion != 0)
	{
		//**************************** Relacion de clasifiacion con clasificacion_imagen ****************************
		$stmt = $mysqli->prepare("INSERT INTO `clasificacion_imagen`(`id_clasificacion_imagen`, `id_clasificacion`, `id_imagen`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id, $id_imagen_clasificacion, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();

	}



    return $nuevo_id;
    }

	function consulta_clasificacion_impresora($mysqli, $id_empresa, $id_sucursal)
	{
		/*
		* Retorna un JSON con todas las clasificaciones de la empresa y las impresoras de la sucursalque se tiene como activas
		*/

		$clasificaciones_impresoras = array();
		$clasificaciones = array();
		$impresoras = array();

		$query = "SELECT
		clasifiacion_empresa.id_clasificacion,
		clasificacion.nombre
		FROM
		clasificacion
		INNER JOIN
		clasifiacion_empresa
		ON
		clasifiacion_empresa.id_clasificacion = clasificacion.id_clasificacion
		WHERE
		clasificacion.estatus != 0 AND clasifiacion_empresa.id_empresa = ?";

		if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		$stmt->bind_param("i", $id_empresa);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($id_clasificacion, $nombre);

		//obtener valor
		while ($stmt->fetch())
		{
			$clasificaciones[] = Array(
			"id_clasificacion" => $id_clasificacion,
			"nombre" => $nombre
			);
		}

		//Cierra el query
		$stmt->close();
		}


		$query = "SELECT id_impresora_servidor_impresion, impresora FROM impresora_servidor_impresion WHERE estatus != 0 AND impresora_servidor_impresion.id_servidor_impresion IN (SELECT id_servidor_impresion FROM servidor_impresion WHERE id_sucursal = ?)";

		if ($stmt = $mysqli->prepare($query))
		{
		// Asigna las variables para el query
		$stmt->bind_param("i", $id_sucursal);

		// Ejecuta el query
		$stmt->execute();

		// Asigna el resultado a una variable
		$stmt->bind_result($id_impresora, $nombre_impresora);

		// obtener valor
		while ($stmt->fetch())
		{
			$impresoras[] = Array(
			"id_impresora" => $id_impresora,
			"nombre_impresora" => $nombre_impresora
			);
		}

		// Cierra el query
		$stmt->close();
		}
		
		$clasificaciones_impresoras[] =Array(
			"clasificaciones" => $clasificaciones,
			"impresoras" => $impresoras
		);
		
		return $clasificaciones_impresoras;

	}

    function consulta_clasificacion_pedido($mysqli, $id_empresa){
      /*
      * Retorna un JSON con todas las clasificaciones que la empresa tiene
      * como activas
      */
      //Array que sera retornado
      $clasificaciones = array();

      $query = "SELECT
        clasifiacion_empresa.id_clasificacion,
        clasificacion.nombre,
		clasificacion_imagen.id_imagen AS id__imagen,
		IFNULL ((SELECT 
					imagen.nombre_de_almacenado 
				FROM 
					imagen 
				WHERE 
					imagen.id_imagen = id__imagen), 0)
      FROM
        clasificacion
      INNER JOIN
        clasifiacion_empresa
      ON
        clasifiacion_empresa.id_clasificacion = clasificacion.id_clasificacion
      INNER JOIN
        clasificacion_imagen
      ON
        clasificacion_imagen.id_clasificacion = clasificacion.id_clasificacion
      WHERE
        clasificacion.estatus != 0 AND clasifiacion_empresa.id_empresa = ?";

      if ($stmt = $mysqli->prepare($query))
        {
        //Asigna las variables para el query
        $stmt->bind_param("i", $id_empresa);

        //Ejecuta el query
        $stmt->execute();

        //Asigna el resultado a una variable
        $stmt->bind_result($id_clasificacion, $nombre, $id_imagen, $nombre_de_almacenado);

        //obtener valor
        while ($stmt->fetch())
          {
          $clasificaciones[] = Array(
            "id_clasificacion" => $id_clasificacion,
            "nombre" => $nombre,
            "id_imagen" => $id_imagen,
            "nombre_de_almacenado" => $nombre_de_almacenado
          );
          }

        //Cierra el query
        $stmt->close();
        }

      return $clasificaciones;
    }
	
	
	function almacenar_clasificacion_impresora_servidor_impresion($mysqli, $id_clasificacion, $id_impresora){
      /*
      * almacena el id de la clasificacion y el id de la impresora del sucursal con  la cual se le quiere relacionar a la clasificacion
	  * en la tabla clasifiacion_impresora_servidor_imprecion
      */
		
		$estatus = 1;

		//**************************** Crea la clasificacion ****************************
		$stmt = $mysqli->prepare("INSERT INTO `clasificacion_impresora_servidor_impresion`(`id_clasificacion_impresora_servidor_impresion`, `id_clasificacion`, `id_impresora_servidor_impresion`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("iii", $id_clasificacion, $id_impresora, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();

		return $nuevo_id;
	}

	 function seleccionar_fraccion_por_id_producto($mysqli,$id_producto)
	  {
			
			//Se agrega el producto completo
			$var[]=array(
				"id_fraccion_producto" => 0,
				"fraccion" => 'Completo'
			);
			
			//inicio del query
			$query = "SELECT
						fraccion_producto.id_fraccion_producto, fraccion_producto.fraccion 
					FROM 
						`fraccion_producto` 
					INNER JOIN
						producto_fraccion_producto
							ON
							producto_fraccion_producto.id_fraccion_producto = fraccion_producto.id_fraccion_producto
					WHERE 
						fraccion_producto.estatus = 1 AND producto_fraccion_producto.id_producto = ?";
						
			if ($stmt = $mysqli->prepare($query))
				{
				//Asigna las variables para el query
				$stmt->bind_param("i", $id_producto);

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($id_fraccion_producto, $fraccion);

				//obtener valor
				while ($stmt->fetch())
					{
						
						$fraccion = $fraccion.' Porción';
						
						$var[]=array(
							"id_fraccion_producto" => $id_fraccion_producto,
							"fraccion" => $fraccion
						);
					}

				//Cierra el query
				$stmt->close();
				}
		return $var;
	  }
	
	function seleccionar_ingrediente_por_id_producto($mysqli,$id_producto)
	  {
		  
			$var = array();
			
			//inicio del query
			$query = "SELECT
						ingrediente.id_producto, ingrediente.nombre, producto_ingrediente.cantidad
					FROM 
						`producto` as ingrediente
					INNER JOIN
						producto_ingrediente
							ON
							producto_ingrediente.id_ingrediente = ingrediente.id_producto
					INNER JOIN
						producto
							ON
							producto_ingrediente.id_producto = producto.id_producto
					WHERE 
						producto_ingrediente.estatus = 1 AND producto.id_producto = ?";
						
			if ($stmt = $mysqli->prepare($query))
				{
				//Asigna las variables para el query
				$stmt->bind_param("i", $id_producto);

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($id_ingrediente, $nombre, $cantidad);

				//obtener valor
				while ($stmt->fetch())
					{
						$var[]=array(
							"id_ingrediente" => $id_ingrediente,
							"nombre" => $nombre,
							"cantidad" => $cantidad
						);
					}

				//Cierra el query
				$stmt->close();
				}
		return $var;
	  }
	
  } 
?>
