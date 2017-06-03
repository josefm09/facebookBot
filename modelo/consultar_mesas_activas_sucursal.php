<?PHP
	
	require "../class/gestion_mesa.php";

	$id_sucursal = $_SESSION['id_sucursal'];
	$mesas = new mesas(); //Inicializa la clase
	$mesas_activas_sucursal_array = $mesas->mesas_activas_sucursal($mysqli, $id_sucursal);
	
	echo json_encode($mesas_activas_sucursal_array);
	
?>