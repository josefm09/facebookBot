<?PHP
	require "../class/gestion_productos.php";
	$productos = new productos();//Inicializa la clase
		
	$id_empresa = $_SESSION['id_empresa'];
	$id_sucursal = $_SESSION['id_sucursal'];

	$var = $productos->consulta_clasificacion_impresora($mysqli, $id_empresa, $id_sucursal);
	
	echo json_encode($var);
?>