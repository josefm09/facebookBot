<?php

	if(isset($_REQUEST['id_clasificacion'])){
		
		require '../class/gestion_productos.php';
		
		$productos = new productos();
		
		$id_clasificacion = $_REQUEST['id_clasificacion'];
		$id_sucursal = $_SESSION['id_sucursal'];
		$estatus = 1;
		
		$detalles_producto = $productos->consultar_producto_por_id_clasificacion($mysqli, $id_clasificacion, $id_sucursal, $estatus);
		
		$estatus_request='success';
		
		$respuesta = array('estatus_request' => $estatus_request, 'respuesta_servidor' => $detalles_producto);
		
		echo json_encode($respuesta);
	}

?>