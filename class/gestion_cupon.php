<?php
/*
* Creado por JOAS
* Mayo de 2017
* jelousoft28@gmail.com
*/

/*
* Agrupa las funciones para el manejo de todas la posibles acciones a llevar
* a cabo al manejar cupones
*/

class cupon
{
	function crear_nuevo_cupon($mysqli, $key, $duracion, $cantidad_a_usar, $fecha_vigencia)
    {
		/*
		* Crea un nuevo cupon
		*
		* Retorna el $id_cupon
		*/
		$estatus = 1;//Por defecto los producos estan activos

		//******Alta del cupon******
		$stmt = $mysqli->prepare("INSERT INTO `cupon`(`id_cupon`, `key`, `duracion`, `cantidad_a_usar`, `fecha_vigencia`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,?,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 2 string y 3 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param("ssiss", $key, $nombre, $duracion, $cantidad_a_usar, $fecha_vigencia, $estatus);

		//Ejecuta el query
		$stmt->execute();

		//Toma el ID del insert recien hecho
		$nuevo_id = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();
		
		return $nuevo_id;
	}
	
}
