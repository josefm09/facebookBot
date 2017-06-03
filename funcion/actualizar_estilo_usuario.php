<?php
/*
* Creado por Nicolás Zavala Sajarópulos
* Abril de 2017
* nicolas.zavala.sajaropulos@gmail.com
*/

/*
* Actualiza el color del componente
*
*/
	function actualizar_estilo_usuario($mysqli, $color, $elemento, $id_usuario){
		
		$stmt =  $mysqli->prepare("UPDATE `configuracion_usuario` SET `atributo_de_variable`= ? WHERE `id_configuracion` = ? AND `id_usuario` = ?");
		
		if($stmt === false) {
			echo "error 1 ".htmlspecialchars($stmt->error);
			return;
		}
		
		$stmt->bind_param("sii", $color, $elemento, $id_usuario);
		
		$stmt->execute();
		
		$id_actualizado = $mysqli->insert_id;
		
		$stmt->close();
	}
?>