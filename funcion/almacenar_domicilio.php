<?php 
/*
Parámetros:
conexión, numero, callle, colonia
*/
	function almacenar_domicilio ($mysqli, $numero, $colonia, $calle)
	{
		$numero_encriptado = encrypt_string($numero);
		$colonia_encriptada = encrypt_string($colonia);
		$calle_encriptada = encrypt_string($calle);
		$estatus = 1;
		$stmt =  $mysqli->prepare("INSERT INTO domicilio (id_domicilio, calle, numero, colonia, estatus, fecha_creacion, ultima_modificacion)VALUES(NULL,?, ?, ?, ?, now(),now())");
		
		if($stmt === false) {
			echo "error 1 ".htmlspecialchars($stmt->error);
			return;
		}
		
		$stmt->bind_param("sssi", $calle_encriptada, $numero_encriptado, $colonia_encriptada, $estatus);
		
		$stmt->execute();
		
		$stmt->close();
		//SELECT * FROM `domicilio` WHERE 1
		
		$query = "SELECT id_domicilio from domicilio where calle = ? and numero = ? and colonia = ? order by id_domicilio desc LIMIT 1";
		if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		$stmt->bind_param("sss", $calle_encriptada, $numero_encriptado, $colonia_encriptada);
				
		//Ejecuta el query
		$stmt->execute();
		//Asigna el resultado a una variable
		$stmt->bind_result($id);		
		//obtener valor 
		//$aqui = -1;
		while($stmt -> fetch()) {
		}
				
		//Cierra el query
		//$stmt->free_result();
		$stmt->close();
		}
		return $id;
	}
?>