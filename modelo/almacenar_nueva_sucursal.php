<?PHP

$empresa_seleccionado = $variables_recibidas['empresa_seleccionado'];
$nombre_seleccionado = $variables_recibidas['nombre_seleccionado'];
$calle_seleccionado = $variables_recibidas['calle_seleccionado'];
$ext_seleccionado = $variables_recibidas['ext_seleccionado'];
$int_seleccionado = $variables_recibidas['int_seleccionado'];
$codigo_postal_seleccionado = $variables_recibidas['codigo_postal_seleccionado'];
$colonia_seleccionado = $variables_recibidas['colonia_seleccionado'];
$ciudad_seleccionado = $variables_recibidas['ciudad_seleccionado'];
$estado_seleccionado = $variables_recibidas['estado_seleccionado'];
$pais_seleccionado = $variables_recibidas['pais_seleccionado'];
$tipo_sucursal_seleccionado = $variables_recibidas['tipo_sucursal_seleccionado'];
$estatus_seleccionado = 1;

//Valida las variables
if($empresa_seleccionado === '' or
$nombre_seleccionado === '' or
$calle_seleccionado === '' or
$ext_seleccionado === '' or
$int_seleccionado === '' or
$codigo_postal_seleccionado === '' or
$colonia_seleccionado === '' or
$ciudad_seleccionado === '' or
$estado_seleccionado === '' or
$pais_seleccionado === '' or
$tipo_sucursal_seleccionado === '')
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'Es necesario llenar todos los campos.';
	}

//Si no hay errores en el verifiacion de variables
if($estatus_request != 'error')
	{
	$calle_seleccionado=encrypt_string($calle_seleccionado);
	$ext_seleccionado=encrypt_string($ext_seleccionado);
	$int_seleccionado=encrypt_string($int_seleccionado);
	$codigo_postal_seleccionado=encrypt_string($codigo_postal_seleccionado);
	$colonia_seleccionado=encrypt_string($colonia_seleccionado);

	//Modifica la contraseña en base de datos
	require "../query/insertar_sucursal.php";

	$estatus_request = 'success';
	$respuesta_servidor = "La sucursal <b>".$nombre_seleccionado."</b> fue almacenada con éxito";
	}

$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);

echo json_encode($respuesta);
?>
