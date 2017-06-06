<?php
/*
* Creado por José Carlos Flores Morán
* Abril de 2017
* jose9x.jcfm@gmail.com
*/
/*
* modificado por AlexisDos
* Abril de 2017
* usuario_wp21@hotmail.com
*/

/*
* Agrupa las funciones para el manejo de proveedores dentro del sistema
*/

class proveedor
  {

  function crear_proveedor($mysqli, $empresa, $nombre_proveedor, $lada_telefono_1_proveedor, $telefono_1_proveedor, $tipo_telefono_1_proveedor, $lada_tlefono_2_proveedor, $telefono_2_proveedor, $tipo_telefono_2_proveedor, $calle_proveedor, $numero_proveedor, $colonia_proveedor, $correo_proveedor, $id_estado_proveedor, $id_municipio_proveedor, $ciudad_proveedor, $razon_social,$rfc, $direccion_fiscal, $colonia_fiscal, $id_estado_fiscal, $id_municipio_fiscal, $ciudad_fiscal, $codigo_postal)
    {
    /*
    * Crea un nuevo proveedor y lo relaciona con sus respectivos campos
    *
    * Retorna el $id_proveedor
    */
    $estatus = 1;//Por defecto los proveedores estan activos

	

    //******Alta del proveedor******
    $stmt = $mysqli->prepare("INSERT INTO `proveedor`(`id_proveedor`, `nombre`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
    													VALUES
    													(NULL,?,?,now(),now())");

    //Indica a la base de datos que recibira las variables correspoendietes a los signos de ? en el query
    $stmt->bind_param("si", $nombre_proveedor, $estatus);

    //Ejecuta el query
    $stmt->execute();

    //Toma el ID del insert recien hecho
    $nuevo_id_proveedor = $mysqli->insert_id;

    //Cierra el query
    $stmt->close();
	
	if(isset($nuevo_id_proveedor)){
		$var="success";
			
		//******Relacion del empresa con proveedor_empresa******
		$stmt = $mysqli->prepare("INSERT INTO `proveedor_empresa`(`id_proveedor_empresa`, `id_proveedor`, `id_empresa`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_proveedor, $empresa, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();
		
		
		//******Relacion del municipio con proveedor_municipio******
		$stmt = $mysqli->prepare("INSERT INTO `proveedor_municipio`(`id_proveedor_municipio`, `id_proveedor`, `id_municipio`, `ciudad`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("iiis", $nuevo_id_proveedor, $id_municipio_proveedor, $ciudad_proveedor, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();
		

		//******Relacion del poveedor con correo_electronico******
		$nuevo_id_correo_electronico = almacenar_correo_electronico($mysqli, $correo_proveedor);
		
		//******Relacion del correo_electronico con proveedor_correo_electronico******
		$stmt = $mysqli->prepare("INSERT INTO `proveedor_correo_electronico`(`id_proveedor_correo_electronico`, `id_proveedor`, `id_correo_electronico`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_proveedor, $nuevo_id_correo_electronico, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();
		
		
		
		
		//******Relacion del proveedor con su domicilio******
		$nuevo_id_domicilio = almacenar_domicilio($mysqli, $numero_proveedor, $colonia_proveedor, $calle_proveedor);

		 //******Relacion de domicilio con proveedor_domicilio******
		$stmt = $mysqli->prepare("INSERT INTO `proveedor_domicilio`(`id_proveedor_domicilio`, `id_proveedor`, `id_domicilio`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_proveedor, $nuevo_id_domicilio, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();
		
		
		
		
		
		
		
		//******Relacion del esatdo con su proveedor_estado******
		$stmt = $mysqli->prepare("INSERT INTO `proveedor_estado`(`id_proveedor_estado`, `id_proveedor`, `id_estado`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_proveedor, $id_estado_proveedor, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();




		//******Relacion del proveedor con su factura_datos******
		$stmt = $mysqli->prepare("INSERT INTO `factura_datos`(`id_factura_datos`, `razon_social`, `rfc`, `domicilio`, `colonia`, `ciudad`, `estado`, `codigo_postal`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,?,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("sssssisi", $razon_social, $rfc, $direccion_fiscal, $colonia_fiscal, $ciudad_fiscal, $id_estado_fiscal, $codigo_postal, $estatus);

		//Ejecuta el query
		$stmt->execute();
		
		$nuevo_id_factura_datos = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();

		//******Relacion de factura_datos con su proveedor_factura_datos******
		$stmt = $mysqli->prepare("INSERT INTO `proveedor_factura_datos`(`id_proveedor_factura_datos`, `id_proveedor`, `id_factura_datos`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_proveedor, $nuevo_id_factura_datos, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();
		
		
		
		
		if($telefono_2_proveedor != ""){
			//******Relacion del proveedor con su telefono******
			$nuevo_id_telefono_1 = almacenar_telefono($mysqli,$telefono_1_proveedor,$tipo_telefono_1_proveedor,$lada_telefono_1_proveedor);
			
			//******Relacion del telefono con su proveedor_telefono******
			$stmt = $mysqli->prepare("INSERT INTO `proveedor_telefono`(`id_proveedor_telefono`, `id_proveedor`, `id_telefono`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
																VALUES
																(NULL,?,?,?,now(),now())");

			//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
			$stmt->bind_param("iii", $nuevo_id_proveedor, $nuevo_id_telefono_1, $estatus);

			//Ejecuta el query
			$stmt->execute();

			//Cierra el query
			$stmt->close();
			
			//******Relacion del proveedor con su telefono******
			$nuevo_id_telefono_2 = almacenar_telefono($mysqli,$telefono_2_proveedor,$tipo_telefono_2_proveedor,$lada_telefono_2_proveedor);
			
			//******Relacion del telefono con su proveedor_telefono******
			$stmt = $mysqli->prepare("INSERT INTO `proveedor_telefono`(`id_proveedor_telefono`, `id_proveedor`, `id_telefono`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
																VALUES
																(NULL,?,?,?,now(),now())");

			//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
			$stmt->bind_param("iii", $nuevo_id_proveedor, $nuevo_id_telefono_2, $estatus);

			//Ejecuta el query
			$stmt->execute();

			//Cierra el query
			$stmt->close();

		}
		else
		{
			//******Relacion del proveedor con su telefono******
			$nuevo_id_telefono = almacenar_telefono($mysqli, $telefono_1_proveedor, $tipo_telefono_1_proveedor, $lada_telefono_1_proveedor);
			
			//******Relacion del telefono con su proveedor_telefono******
			$stmt = $mysqli->prepare("INSERT INTO `proveedor_telefono`(`id_proveedor_telefono`, `id_proveedor`, `id_telefono`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
																VALUES
																(NULL,?,?,?,now(),now())");

			//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
			$stmt->bind_param("iii", $nuevo_id_proveedor, $nuevo_id_telefono, $estatus);

			//Ejecuta el query
			$stmt->execute();

			//Cierra el query
			$stmt->close();
		}
		
	}else{
		$var="error";
	}
	

    return $var;
    }


	function poblar_municipios($mysqli, $id_estado)
	{
		//inicio del query
		$query = "SELECT `id`, `nombre` FROM `municipios` WHERE estado_id = ?";
		if ($stmt = $mysqli->prepare($query))
			{
			// Asigna las variables para el query
			$stmt->bind_param("i", $id_estado);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($id, $municipio);

			//obtener valor
			while ($stmt->fetch())
				{
					$var[]=array(
						"id" => $id,
						"municipio" => $municipio
					);
				}

			//Cierra el query
			$stmt->close();
			}
	return $var;
	}
	
	
	
	
	
	
	
	function crear_referencia($mysqli, $nombre_referencia, $apellido_paterno_referencia, $apellido_materno_referencia,
					$id_correo_electronico_referencia, $id_telefono_referencia, $id_domicilio_referencia)
	{
		 /*
		* Crea una nueva referencia y lo relaciona con sus respectivos campos
		*
		* Retorna el $id_referencia
		*/
		$estatus = 1;//Por defecto las referencias estan activas

			 //******Alta del referencia******
		$stmt = $mysqli->prepare("INSERT INTO `referencia`(`id_referencia`, `nombre`, `apellido_paterno`, `apellido_materno`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 String y 1 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("sssi", $nombre_referencia, $apellido_paterno_referencia, $apellido_materno_referencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_refencia = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();



			 //******Relacion de correo con  referencia_correo******
		$stmt = $mysqli->prepare("INSERT INTO `referencia_correo`(`id_referencia_correo`, `id_referencia`, `id_correo_electronico`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_refencia, $id_correo_electronico_referencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_refencia_correo = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();



			 //******Relacion de domicilio con  referencia_domicilio******
		$stmt = $mysqli->prepare("INSERT INTO `referencia_domicilio`(`id_referencia_domicilio`, `id_referencia`, `id_domicilio`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_refencia, $id_domicilio_referencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_refencia_domicilio = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();



			 //******Relacion de telefono con  referencia_telefono******
		$stmt = $mysqli->prepare("INSERT INTO `referencia_telefono`(`id_referencia_telefono`, `id_referencia`, `id_telefono`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $nuevo_id_refencia, $id_telefono_referencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_refencia_telefono = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();

		return $nuevo_id_refencia;
	}

	function seleccionar_empresa_proveedor($mysqli, $id_usuario, $id_empresa){

		$estatus = 1;

		 //******Relacion usuario con  usuario_empresa******
		$stmt = $mysqli->prepare("INSERT INTO `usuario_empresa`(`id_usuario_empresa`, `id_usuario`, `id_empresa`, `estatus`,`fecha_creacion`,`ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 3 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iii", $id_usuario, $id_empresa, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_usuario_empresa = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();

		return $nuevo_id_usuario_empresa;
	}

	function seleccionar_sucursal_proveedor($mysqli, $id_usuario, $id_sucursal, $boolean_sucursal_principal){

		$estatus = 1;

		 //******Relacion usuario con  usuario_sucursal******
		$stmt = $mysqli->prepare("INSERT INTO `usuario_sucursal`(`id_usuario_sucursal`, `id_usuario`, `id_sucursal`, `boolean_sucursal_principal`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 4 integer correspondientes a los signos de ? en el query
		$stmt->bind_param("iiii", $id_usuario, $id_sucursal, $boolean_sucursal_principal, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id_usuario_sucursal = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();

		return $nuevo_id_usuario_sucursal;
	}

  }
?>
