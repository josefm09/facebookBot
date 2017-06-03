<?PHP
	require '../class/gestion_cliente.php';

	$cliente = new Cliente();

	$id_empresa = $_SESSION['id_empresa'];
	$estatus = 1;

	if(isset($_SESSION['id_empresa'])){
		$resultado = $cliente -> consultar_ultimo_cliente($mysqli, $id_empresa, $estatus);
	}

	header('Content-Type: application/json');

	echo json_encode($resultado);
?>
