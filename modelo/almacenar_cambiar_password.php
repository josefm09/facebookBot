<?php
$current_password = $variables_recibidas['current_password'];
$new_password = $variables_recibidas['new_password'];
$repeat_new_password = $variables_recibidas['repeat_new_password'];

//Verifica que todos los campos esten rellenados
if($current_password === '' OR $new_password === '' OR $repeat_new_password === '')
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'Es necesario llenar todos los campos';
	}

if($new_password !== $repeat_new_password)
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'La nueva contraseña no es idéntica en ambos campos.';
	}

//Toma la contraseña actual del usuario (encryptada), retorna $current_password
require "../query/select_password_current_usuer.php";

//Verifica que la contraseña actual enviada por el usuario coincida con la contraseña en base de datos
//Retorna password_correcta = 1 si la contraseña coincide y 0 si no coincide
$password_correcta = decrypt_password($configuraciones_sistema, $current_password, $password_database);

//Si no hay coincidencia en la contraseña actual
if($password_correcta !== 1)
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'La contraseña actual proporcionada no coincide.';
	}

//Si no hay errores en la validacion de variables
if($estatus_request != 'error')
	{
	$password = $new_password;//Nombre de variable que espera el modelo encrypt

	//Encrypta la nueva contraseña
	$encrypted_password = encrypt_password($configuraciones_sistema, $repeat_new_password);

	//Almacena la nueva contraseña
	require "../query/update_password.php";

	$estatus_request = 'success';
	$respuesta_servidor = 'La contraseña fue cambiada con éxito.';
	}

$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);

echo json_encode($respuesta);
?>
