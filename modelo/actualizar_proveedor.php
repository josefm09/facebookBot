<?PHP

	require "../class/gestion_proveedor.php";

	$proveedores = new proveedor();//Inicializa la clase

	$keyword_before = json_decode($_REQUEST['keyword']);
	$keyword = mysqli_real_escape_string($c,$keyword_before);

	$empresa = $_SESSION['empresa'];
  $id_proveedor = $_POST['id_proveedor'];
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $ciudad = $_POST['ciudad'];
  $colonia = $_POST['colonia'];
  $calle = $_POST['calle'];
  $estatus = $_POST['estatus'];
  $telefono = $_POST['telefono'];
  $estado = $_POST['estado'];
  $razon = $_POST['razon'];
  $rfc = $_POST['rfc'];
  $cp = $_POST['cp'];

	$var = $proveedores->crear_proveedor($mysqli, $id_proveedor, $empresa, $nombre, $correo, $ciudad, $colonia, $ciudad, $colonia, $calle, $estatus, $telefono, $estado, $razon, $rfc, $cp);

	echo json_encode($var);
?>
