<?php
/*
* Creado por Nicolás Zavala Sajarópulos
* Marzo de 2017
* nicolas.zavala.sajaropulos@gmail.com
*/

/*
* 
* Retorna todas las prioridades que están por encima del privilegio administrativo del usuario actual
*
*/


function consultar_prioridades_permitidas($mysqli, $privilegio_administrativo){
	//Arrays que seran retornados
	$datos_prioridad = array();

	//inicio del query
	$query = "SELECT `prioridad`, `nombre_prioridad`, `nombre_en_vista`, `privilegio_administrativo` FROM `prioridad` WHERE `privilegio_administrativo` > ? ORDER BY `privilegio_administrativo`";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		$stmt->bind_param("i", $privilegio_administrativo);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($prioridad, $nombre_prioridad, $nombre_en_vista, $privilegio_administrativo);

		//obtener valor
		while ($stmt->fetch()){
			
			$datos_prioridad[] = Array(
				"prioridad" => $prioridad,
				"nombre_prioridad" => $nombre_prioridad,
				"nombre_en_vista" => $nombre_en_vista,
				"privilegio_administrativo" => $privilegio_administrativo
			);
		}
		//Cierra el query
		$stmt->close();
		}
	return json_encode($datos_prioridad);
}
?>
