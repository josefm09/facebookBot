<?php

	require '../class/gestion_mesa.php';

	$mesa = new mesas();

	if(isset($_POST['id_pedido']) && isset($_POST['mesa']) && isset($_SESSION['id_empresa']) && isset($_SESSION['userid'])){

		$id_pedido = $_POST['id_pedido'];
		$mesa = $_POST['mesa'];
		$id_usuario = $_SESSION['userid'];
		$id_empresa = $_SESSION['id_empresa'];

		$id_producto = $mesa->actualizar_mesa($mysqli, $id_pedido, $mesa, $id_usuario, $id_empresa);
		echo $id_producto;
	}

?>
