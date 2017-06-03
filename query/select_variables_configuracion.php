<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Marzo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Toma las variables de configuracion de todos los tipos de usuarios disponibles
* y las retorna en la forma de un array por clasifiacion
*
* Siempre debe ser llamado despues del archivo conexion
*/

//Arrays que seran retornados
$configuraciones_sistema = array();
$configuraciones_usuario = array();


//******************************************configuraciones del sistema******************************************
//inicio del query
$query = "SELECT `variable_de_configuracion`, `atributo_de_variable` FROM `configuracion` WHERE `id_configuracion_tipo` = 1 AND `estatus` = 1";
if ($stmt = $mysqli->prepare($query))
	{
	//Asigna las variables para el query
	//$stmt->bind_param("", );

	//Ejecuta el query
	$stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($variable_de_configuracion, $atributo_de_variable );

	//obtener valor
	while ($stmt->fetch())
		{
		$configuraciones_sistema[$variable_de_configuracion] = $atributo_de_variable;
		}

	//Cierra el query
	$stmt->close();
	}




	//******************************************configuraciones por usuario******************************************
//inicio del query
$query = "SELECT configuracion.variable_de_configuracion, configuracion_usuario.atributo_de_variable FROM configuracion INNER JOIN configuracion_usuario ON configuracion_usuario.id_configuracion = configuracion.id_configuracion WHERE configuracion.id_configuracion_tipo = 5 AND configuracion_usuario.id_usuario = ?";
if ($stmt = $mysqli->prepare($query))
	{
	//Asigna las variables para el query
	$stmt->bind_param("i", $id_usuario);
	//Ejecuta el query
	$stmt->execute();
	//Asigna el resultado a una variable
	$stmt->bind_result($variable_de_configuracion, $atributo_de_variable );
	//obtener valor
	while ($stmt->fetch())
		{
		$configuraciones_usuario[$variable_de_configuracion] = $atributo_de_variable;
		}
	//Cierra el query
	$stmt->close();
	}
?>
