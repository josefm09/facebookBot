<?PHP
/*
Almacena el JSON enviado por el cliente java como una forma de prevenir el posible mal funcionamniento de alguna funcion
*/

//Inicio del query preparado
$stmt = $mysqli->prepare("INSERT INTO `trabajador` (`id_trabajador`, `id_usuario`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
												VALUES
												(NULL,?,?,now(),now())");
	
//Indica a la base de datos que recibira 1 string y 1 integer correspoendietes a los signos de ? en el query
$stmt->bind_param("si", $nombre_selec, $apellidoP_selec, $apellidoM_selec, $calle_selec, $colonia_selec, $numero_selec, $correo_selec, $lada_selec, 
				$telefono_selec, $tipo_tel_selec, $nombre_usuario_selec, $tipo_empleado_selec;

//Ejecuta el query
$stmt->execute();

$id_trabajador = $mysqli->insert_id;

//Cierra el query
$stmt->close();

?>