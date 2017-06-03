<?php
//**************** Creacion de la sucursal****************
//Inicio del query preparado
$stmt = $mysqli->prepare("INSERT INTO `sucursal` (`id_sucursal`, `nombre`, `calle`, `numero_interior`, `numero_exterior`, `codigo_postal`, `colonia`, `ciudad`, `estado`, `pais`, `boolean_matriz`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
												VALUES
												(NULL,?,?,?,?,?,?,?,?,?,?,?,now(),now())");

//Indica a la base de datos que recibira 9 string y 2 integer correspoendietes a los signos de ? en el query
$stmt->bind_param("sssssssssii", $nombre_seleccionado, $calle_seleccionado, $int_seleccionado, $ext_seleccionado, $codigo_postal_seleccionado, $colonia_seleccionado,
 $ciudad_seleccionado, $estado_seleccionado, $pais_seleccionado, $tipo_sucursal_seleccionado, $estatus_seleccionado);

//Ejecuta el query
$stmt->execute();

$id_sucursal = $mysqli->insert_id;

//Cierra el query
$stmt->close();

//****************Relacion de la sucursal con la empresa****************
$stmt = $mysqli->prepare("INSERT INTO `sucursal_empresa`(`id_sucursal_empresa`, `id_empresa`, `id_sucursal`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
													VALUES
													(NULL,?,?,?,now(),now())");

$stmt->bind_param("iii", $empresa_seleccionado, $id_sucursal, $estatus_seleccionado);

//Ejecuta el query
$stmt->execute();

//Cierra el query
$stmt->close();

//****************Agrega a la sucursal un identificar_sucursal para sus tickets****************
$identificar_sucursal_tomado = 1;//Representa que el id ya esta tomado
$estatus = 1;

//Mientras no se tenga un ID no tomado
while($identificar_sucursal_tomado > 0)
	{
	$identificar_sucursal = random_int(1, 9999);

	//Asegura que el resultado sea de almeos 4 caracteres y de ser mas coro
	//agrega zeros a la izquierda hasta lograr la longitud
	$identificar_sucursal = str_pad($identificar_sucursal, 4, '0', STR_PAD_LEFT);

	$query = "SELECT COUNT(`id_ticket_referencia_sucursal`) FROM `ticket_referencia_sucursal` WHERE `identificar_sucursal` = ?";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		$stmt->bind_param("i", $identificar_sucursal);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($identificar_sucursal_tomado);

		//obtener valor
		while ($stmt->fetch())
			{

			}

		//Cierra el query
		$stmt->close();
		}

	if($identificar_sucursal_tomado == 0)
		{
		$stmt = $mysqli->prepare("INSERT INTO `ticket_referencia_sucursal`(`id_ticket_referencia_sucursal`, `identificar_sucursal`, `id_sucursal`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,now(),now())");

		$stmt->bind_param("iii", $identificar_sucursal, $id_sucursal, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Cierra el query
		$stmt->close();
		}
	}

?>
