<?php
/*
* Creado por José Carlos Flores Morán
* Abril de 2017
* jose9x.jcfm@gmail.com
*/

/*
* Agrupa las funciones para el manejo de todas la posibles acciones a llevar
* a cabo con la caja chica
*/

class cajas
  {
  function corte_caja($mysqli, $nombre_mesa, $capacidad_mesa, $id_sucursal)
    {
    /*
    * Crea una caja chica
    *
    * Retorna  'success' o 'La sucursal no existe' en caso de error
    */
    $estatus = 1;//Por defecto los movimentos están activos

    //******Alta del movimiento******
    $stmt = $mysqli->prepare("INSERT INTO `caja_chica`(`id_caja_chica`, `cantidad`, `fecha_deposito`, `fecha_retiro`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,now(),now())");

    //Indica a la base de datos que recibira 2 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("ii", $id_usuario, $estatus);//falta definir

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id_trabajador = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();



    //******Relacion del movimiento con usuario******
    $stmt = $mysqli->prepare("INSERT INTO `usuario_caja_chica`(`id_usuario_caja_chica`, `id_caja_chica`, `id_usuario`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,now(),now())");

    //Indica a la base de datos que recibira 1 string y 1 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("si", $correo_trabajador, $estatus);//falta por definir

    //Ejecuta el query
    $stmt->execute();

	//Toma el ID del insert recien hecho
    $nuevo_id_correo_electronico = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();



    //******Relacion del movimiento con sucursal******
    $stmt = $mysqli->prepare("INSERT INTO `sucursal_caja_chica`(`id_sucursal_caja_chica`, `id_caja_chica`, `id_sucursal`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 integer correspoendietes a los signos de ? en el query
    $stmt->bind_param("iii", $nuevo_id_trabajador, $nuevo_id_correo_electronico, $estatus);//falta definir

    //Ejecuta el query
    $stmt->execute();

    //Cierra el query
    $stmt->close();



    //******Relacion del movimiento con empresa******
    $stmt = $mysqli->prepare("INSERT INTO `empresa`(`id_empresa_caja_chica`, `id_caja_chica`, `id_empresa`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,?,?,now(),now())");

    //Indica a la base de datos que recibira 3 String y 1 integer correspondientes a los signos de ? en el query
    $stmt->bind_param("sssi", $calle_trabajador, $numero_trabajador, $colonia_trabajador, $estatus);//falta definir

    //Ejecuta el query
    $stmt->execute();

	//Toma el ID del insert recien hecho
    $nuevo_id_domicilio = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();

    return $nuevo_id_caja_chica;
    }

  function consultar_caja_chica($mysqli, $id_sucursal, $id_empresa, $prioridad)
    {
    /*
    * selecciona la fecha de deposito y la fecha de retiro para comparar el corte
    * el return es un numero para js
    */
    //Array que sera retornado
  	$mesas = array();

    $query = "SELECT caja_chica.fecha_deposito, caja_chica.fecha_retiro FROM caja_chica JOIN empresa_caja_chica ON caja_chica.id_caja_chica = empresa_caja_chica.id_caja_chica JOIN sucursal_caja_chica ON empresa_caja_chica.id_caja_chica = sucursal_caja_chica.id_caja_chica WHERE sucursal_caja_chica.sucursal = ? AND empresa_caja_chica.empresa = ? order by caja_chica.id_caja_chica desc limit 1";
    if ($stmt = $mysqli->prepare($query))
    	{
    	//Asigna las variables para el query
    	$stmt->bind_param("ii", $id_sucursal, $id_empresa);

    	//Ejecuta el query
    	$stmt->execute();

    	//Asigna el resultado a una variable
    	$stmt->bind_result($fecha_deposito, $fecha_retiro);

    	//obtener valor
      //Comparación de fecha para verificar si se realizó un corte
    	if($fecha_deposito != $fecha_corte || $stmt == 0){
    		if($tipo == 2){
    			echo 2;
    		}else{
    			echo 1;
    		}
    	}
    	//Cierra el query
    	$stmt->close();
    	}

    return $mesas;
    }

  }
?>
