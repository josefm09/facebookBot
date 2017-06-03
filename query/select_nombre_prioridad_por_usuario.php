<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Toma la prioridad del usuario de la tabla prioridades bajo el parametro nombre_prioridad para su uso en la api
*/
	
//inicio del query
$query = "SELECT prioridad.nombre_prioridad FROM prioridad, usuario WHERE usuario.usuario = ? AND prioridad.prioridad = usuario.prioridad";
if ($stmt = $mysqli->prepare($query))
	{
	//Asigna las variables para el query
	$stmt->bind_param("s", $usuario_seleccionado);
			
	//Ejecuta el query
	$stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($nombre_prioridad);
								
	//obtener valor 
	while ($stmt->fetch())
		{
					
		}

	//Cierra el query
	$stmt->close();
	}
?>