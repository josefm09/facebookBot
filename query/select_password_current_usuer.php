<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Toma la contraseña del usuario que tiene la session activa
*/
	
//inicio del query
$query = "SELECT password FROM usuario WHERE id_usuario = ?";
if ($stmt = $mysqli->prepare($query))
	{
	//Asigna las variables para el query
	$stmt->bind_param("i", $id_usuario);
			
	//Ejecuta el query
	$stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($password_database);
								
	//obtener valor 
	while ($stmt->fetch())
		{
					
		}

	//Cierra el query
	$stmt->close();
	}
?>