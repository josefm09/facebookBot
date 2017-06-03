<?php

	require '../class/gestion_productos.php';
	require '../class/gestion_venta.php';

	// $productos = new productos();
	$venta = new ventas();

	// $id_producto = $_REQUEST['id_producto'];
	// $id_comensal = $_REQUEST['id_comensal'];
	// $id_sucursal = $_SESSION['id_sucursal'];
	// $id_empresa= $_SESSION['id_empresa'];
	$ventas_total = array();
	
	// $estatus = 1;
	
	////Se obtienen las variables de configuración del producto
	//Fracción de Producto
	//$fraccion = $productos->seleccionar_fraccion_por_id_producto($mysqli, $id_producto);
	
	////Carasteristicas generales del producto como nombre y tipo
	//$caracteristicas = $productos->consultar_producto_por_id($mysqli, $id_producto, $id_sucursal, $estatus);
	
	////Caracteristicas de productos
	//$precio_venta = $caracteristicas['precio_venta'];
	//$descuento = 0;
	
	////Ingredientes de Producto
	//$ingrediente = $productos->seleccionar_ingrediente_por_id_producto($mysqli, $id_producto);

	////Se almacena venta y se retorna comensal
	//$id_producto_comensal_pedido = $venta->nueva_venta($mysqli, $id_producto, $precio_venta, $descuento, $id_comensal, $id_usuario, $estatus);
	$id_producto_comensal_pedido = 27;
	////Se consultar todas las ventas a partir del id del comensal
	$ventas_de_comensal = $venta->consulta_venta_por_id_comensal($mysqli, $id_producto_comensal_pedido);
	
	foreach($ventas_de_comensal as $var)
	{
		$id_venta = $var['id_venta'];
		
		$comentarios = $venta->consulta_comentario_por_id_venta($mysqli, $id_venta);
		
		$ventas_total[] = array(
			"ventas_de_comensal" => $var,
			"comentarios" => $comentarios,
		);
		
	}
	
	echo json_encode($ventas_total);
	// $datos_producto = array(
		// "id_producto_comensal_pedido" => $id_producto_comensal_pedido,
		////"fraccion" => $fraccion,
		// "caracteristicas" => $caracteristicas,
		// "ingrediente" => $ingrediente,
	// );


	// echo json_encode($datos_producto);
?>