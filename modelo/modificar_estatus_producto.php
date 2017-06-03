<?PHP
	require '../class/gestion_productos.php';
	$productos = new productos();
	
	$id_sucursal = $_SESSION['id_sucursal'];
	$id_producto = $_POST['id_producto'];
	$existencia_actual = $_POST['existencia_actual'];
	$cantidad_minima = $_POST['cantidad_minima'];
	$cantidad_maxima = $_POST['cantidad_maxima'];
	$precio_compra = $_POST['precio_compra'];
	$precio_venta = $_POST['precio_venta'];
	
	$var = $productos->activar_producto_sucursal($mysqli, $id_sucursal, $id_producto, $existencia_actual, $cantidad_minima, $cantidad_maxima, $precio_compra, $precio_venta);
	
	echo json_encode ($var);
	
	
?>