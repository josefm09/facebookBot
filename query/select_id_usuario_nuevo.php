<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Junio de 2016
* josepablo.aramburo@gmail.com
*/

/*
* Busca una coincidencia casi absoluta del usuario recientemente creado y devuelve su id_usuario
*/
	
//inicio del query
$query = "SELECT `id_usuario` FROM usuario WHERE `nombre_usuario` = ? AND `apellido_paterno` = ? AND `apellido_materno` = ? AND `prioridad` = ? ORDER BY(`id_usuario`)DESC LIMIT 1";
if ($stmt = $mysqli->prepare($query))
	{
	//Asigna las variables para el query
	$stmt->bind_param("ssss", $crear_nuevo_cliente_nombre, $crear_nuevo_cliente_paterno, $crear_nuevo_cliente_materno, $prioridad);
			
	//Ejecuta el query
	$stmt->execute();

	//Asigna el resultado a una variable
	$stmt->bind_result($id_nuevo_usuario);
								
	//obtener valor 
	while ($stmt->fetch())
		{
					
		}

	//Cierra el query
	$stmt->close();
	}
?>