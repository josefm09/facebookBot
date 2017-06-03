<?PHP
	require '../class/gestion_trabajador.php';
		
	$trabajador = new trabajador();
		
	$id_sucursal = $_SESSION['id_sucursal'];
	$nombre_trabajador = $_REQUEST['q'];
	$lista_trabajadores = array();
	$estatus = 1;

	if(isset($_SESSION['id_empresa'])){
		$lista_trabajadores = $trabajador -> consultar_trabajador_por_nombre($mysqli, $nombre_trabajador, $id_sucursal, $estatus);
	}

	header('Content-Type: application/json');
	
	echo json_encode($lista_trabajadores);
?>