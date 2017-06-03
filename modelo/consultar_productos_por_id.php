<?php

	if(isset($_REQUEST['id_producto'])){
		
		require '../class/gestion_productos.php';
		
		$productos = new productos();
		
		$id_producto = $_REQUEST['id_producto'];
		$id_sucursal = $_SESSION['id_sucursal'];
		$estatus = 1;
		
		$detalles_producto = $productos->consultar_producto_por_id($mysqli, $id_producto, $id_sucursal, $estatus);
		
		echo json_encode($detalles_producto);
		
	}

?>