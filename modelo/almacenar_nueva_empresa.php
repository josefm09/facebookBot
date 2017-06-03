<?PHP
$nombre_selecc= $variables_recibidas['nombre_selecc'];
$rfc_selecc= $variables_recibidas['rfc_selecc'];
$correo1_selecc= $variables_recibidas['correo1_selecc'];
$correo2_selecc= $variables_recibidas['correo2_selecc'];
$correo3_selecc= $variables_recibidas['correo3_selecc'];
$correo4_selecc= $variables_recibidas['correo4_selecc'];
$correo5_selecc= $variables_recibidas['correo5_selecc'];
$razon_social_selecc= $variables_recibidas['razon_social_selecc'];

require "../class/creacion_empresa.php";
$obj = new creacion_empresa();//Inicializa la clase

//Verifica que todos los campos esten rellenados
if($nombre_selecc === '' OR $rfc_selecc === '' OR $correo1_selecc === '' OR $razon_social_selecc === '')
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'Es necesario proveer un nombre, rfc, razon social y por lo menos un correo electronico';
	}

//Si no hay errores
if($estatus_request !== 'error')
	{
	$id_nueva_empresa = $obj->crear_nueva_empresa($mysqli, $nombre_selecc, $rfc_selecc, $razon_social_selecc);

	//Verifica que correos electronicos fueron enviados y los almacena
	if(isset($correo1_selecc))
		{
		$id_correo = almacenar_correo_electronico($mysqli, $correo1_selecc);

		//Registra el correo electronico
		$obj->relacionar_correo_con_empresa($mysqli, $id_nueva_empresa, $id_correo);
		}

	if(isset($correo2_selecc))
		{
		$id_correo = almacenar_correo_electronico($mysqli, $correo2_selecc);

		//Registra el correo electronico
		$obj->relacionar_correo_con_empresa($mysqli, $id_nueva_empresa, $id_correo);
		}

	if(isset($correo3_selecc))
		{
		$id_correo = almacenar_correo_electronico($mysqli, $correo3_selecc);

		//Registra el correo electronico
		$obj->relacionar_correo_con_empresa($mysqli, $id_nueva_empresa, $id_correo);
		}

	if(isset($correo4_selecc))
		{
		$id_correo = almacenar_correo_electronico($mysqli, $correo4_selecc);

		//Registra el correo electronico
		$obj->relacionar_correo_con_empresa($mysqli, $id_nueva_empresa, $id_correo);
		}

	if(isset($correo5_selecc))
		{
		$id_correo = almacenar_correo_electronico($mysqli, $correo5_selecc);

		//Registra el correo electronico
		$obj->relacionar_correo_con_empresa($mysqli, $id_nueva_empresa, $id_correo);
		}

	$estatus_request = 'success';
	$respuesta_servidor = "La empresa <b>$nombre_selecc</b> fue creada con exito";
	}

	$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);

echo json_encode($respuesta);
?>
