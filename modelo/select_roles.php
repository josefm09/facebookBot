<?php
	require "../class/gestion_cliente.php";
	$cliente = new Cliente();
	
	$roles = $cliente->poblar_roles($mysqli);
	
	echo json_encode($roles);
?>