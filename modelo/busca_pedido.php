<?PHP
	require "../class/gestion_pedido.php";
	$pedidos = new pedidos();//Inicializa la clase

	$id_empresa = $_SESSION['id_empresa'];
	$id_sucursal = $_SESSION['id_sucursal'];

	$var = $pedidos->busca_pedido($mysqli, $id_empresa, $id_sucursal);

	echo json_encode($var);
?>
