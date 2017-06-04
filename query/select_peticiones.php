<?php

	$estatus = 1;
	$stmt = $mysqli->prepare("SELECT `id_propuesta`, `titulo`, `problematica`, `solucion` FROM `propuesta` WHERE estatus = ?");

	$stmt->bind_param("i", $estatus);

	$stmt->execute();

	$stmt->bind_result($id_propuesta, $titulo, $problematica, $solucion);

	$valores = array();
	while($stmt->fetch()) {
		$valores[]=array(
			"id_propuesta" => $id_propuesta,
			"titulo" => $titulo,
			"problematica" => $problematica,
			"solucion" => $solucion
		);
	}

	$stmt->close();

	return $valores;
?>