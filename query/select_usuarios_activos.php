<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Octubre de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Retorna un array bidimensional con su el id del activo y su nombre
*/

$elementos_encontrados = array();//variable retornada
$contador_productos = 1;

//inicio del query
$query = "SELECT `id_usuario`, `nombre_usuario`, `apellido_paterno`, `apellido_materno` FROM usuario WHERE `estatus` = 1";
if ($stmt = $mysqli->prepare($query))
	{
	//Asigna las variables para el query
	//$stmt->bind_param("", );

	//Ejecuta el query
	$stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($id, $nombre_usuario, $apellido_paterno, $apellido_materno);

	//obtener valor
	while ($stmt->fetch())
		{
		//
		$elementos_encontrados[$contador_productos][0] = $id;
		$elementos_encontrados[$contador_productos][1] = "$nombre_usuario $apellido_paterno $apellido_materno";
		$contador_productos++;
		}

	//Cierra el query
	$stmt->close();
	}
?>
