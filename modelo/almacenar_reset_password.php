<?php
$usuario_seleccionado = $variables_recibidas['usuario_seleccionado'];
$password = $configuraciones_sistema['default_password'];

//Verifica que todos los campos esten rellenados
if($usuario_seleccionado === '')
	{
	$estatus_request = 'error';
	$respuesta_servidor = 'Es necesario seleccionar un usuario';
	}

//Verifica que el usuario exista, retorna $coincidencias = 0 si el usuario no existe o un numero mayor segun la cantidad de hallazgos
require "../query/select_count_usuario.php";

if($coincidencias === 0)
	{
	$estatus_request = 'error';
	$respuesta_servidor = "El usuario $usuario_seleccionado no existe.";
	}

if($nombre_prioridad_usuario === "mucaama_master")
	{
	$estatus_request = 'error';
	$respuesta_servidor = "No es posible restablecer la contraseña de un usuario master, contacte a JelouSoft (JelouSoft.com) para restaurar la contraseña.";
	}

//Si no hay errores en la validacion de variables
if($estatus_request != 'error')
	{
	//Encrypta la nueva contraseña del usuario
	$encrypted_password = encrypt_password($configuraciones_sistema, $password);

	//Modifica la contraseña en base de datos
	require "../query/update_password_username.php";

	$estatus_request = 'success';
	$respuesta_servidor = "La contraseña fue restaurada con exito a <b>$password</b> para el usuario <b>$usuario_seleccionado</b>";
	}

$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $respuesta_servidor);

echo json_encode($respuesta);
?>
