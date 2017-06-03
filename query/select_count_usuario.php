<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Noviembre de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Busca si el usuario existe en base de datos en base a su username, si lo encuentra retorna un 1 si no retorna un 0
*
* No se considera el estatus porque sin importar si fue inactivado el usuario no debe de existir multuples veces
*/

$coincidencias = 0;//Inicializa la variable

//inicio del query
$query = "SELECT COUNT(usuario.id_usuario), prioridad.nombre_prioridad FROM usuario INNER JOIN prioridad ON prioridad.prioridad = usuario.prioridad WHERE usuario.usuario = ? GROUP BY(usuario.id_usuario)";
if ($stmt = $mysqli->prepare($query))
	{
	//Asigna las variables para el query
	$stmt->bind_param("s", $usuario_seleccionado);

	//Ejecuta el query
	$stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($coincidencias, $nombre_prioridad_usuario);

	//obtener valor
	while ($stmt->fetch())
		{
		//
		}

	//Cierra el query
	$stmt->close();
	}
?>
