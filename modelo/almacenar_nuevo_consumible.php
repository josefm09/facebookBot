<?PHP
	
	require "../class/gestion_consumible.php";
	$consumible = new consumible();
	
	$id_empresa = $_SESSION['id_empresa'];
	$id_sucursal = $_SESSION['id_sucursal'];
	$nombre = $_GET['nombre'];
	$capacidad = $_GET['capacidad'];
	$precio_compra = $_GET['precio_compra'];
	$precio_venta = $_GET['precio_venta'];
	$inventario = $_GET['inventario'];
	
	$respuesta = $consumible->crear_consumible($mysqli, $nombre, $capacidad, $precio_compra, $precio_venta, $inventario, $id_empresa, $id_sucursal);

	echo($respuesta);
	
?>