<?php

	$stmt = $mysqli->prepare("SELECT `id_peticion`, `tema`, `id_ciudadano`, `tipo_propuesta`, `planteamiento`, `propuesta_solucion`, `estatus`, `fecha_creacion`, `ultima_modificacion` FROM `peticion` WHERE estatus = ?");

	$estatus = 1;
	$stmt->bind_param("i", $estatus);

	$stmt->execute();

	$stmt->bind_result($id_peticion, $tema, $id_ciudadano, $tipo_propuesta, $planteamiento, $propuesta_solucion, $estatus, $fecha_creacion, $ultima_modificacion);

	$valores = array();
	while($stmt->fectch()) {
		$valores[]=array(
			"id_peticion" => $id_peticion,
			"tema" => $tema,
			"id_ciudadano" => $id_ciudadano,
			"tipo_propuesta" => $tipo_propuesta,
			"planteamiento" => $planteamiento,
			"propuesta_solucion" => $propuesta_solucion,
			"estatus" => $estatus,
			"fecha_creacion" => $fecha_creacion,
			"ultima_modificacion" => $ultima_modificacion
		);
	}

	$stmt->close();

	return $valores;
?>