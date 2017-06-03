<?PHP
	require "../class/gestion_proveedor.php";
	$proveedores = new proveedor();//Inicializa la clase
	
	$id_estado = $_POST['id_estado'];
	
	$var = $proveedores->poblar_municipios($mysqli, $id_estado);
	
	echo json_encode($var);
?>