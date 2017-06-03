<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Toma la prioridad que fue seleccionada y la retorna en su formato hashed
*/
	
//inicio del query
$query = "SELECT `prioridad` FROM `prioridad` WHERE `nombre_prioridad` = ?";
if ($stmt = $mysqli->prepare($query))
	{
	//Asigna las variables para el query
	$stmt->bind_param("s", $prioridad_seleccionada);
			
	//Ejecuta el query
	$stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($prioridad);
								
	//obtener valor 
	while ($stmt->fetch())
		{
		//
		}

	//Cierra el query
	$stmt->close();
	}
?>