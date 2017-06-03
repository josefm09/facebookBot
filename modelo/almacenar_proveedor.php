<?PHP

	require "../class/gestion_proveedor.php";

	$proveedores = new proveedor();//Inicializa la clase

	// $keyword_before = json_decode($_REQUEST['keyword']);
	// $keyword = mysqli_real_escape_string($c,$keyword_before);

	$empresa = $_SESSION['id_empresa'];
	$nombre_proveedor = $_POST['nombre_proveedor'];
	$lada_tlefono_1_proveedor = $_POST['lada_tlefono_1_proveedor'];
	$telefono_1_proveedor = $_POST['telefono_1_proveedor'];
	$tipo_telefono_1_proveedor = $_POST['tipo_telefono_1_proveedor'];
	$lada_tlefono_2_proveedor = $_POST['lada_tlefono_2_proveedor'];
	$telefono_2_proveedor = $_POST['telefono_2_proveedor'];
	$tipo_telefono_2_proveedor = $_POST['tipo_telefono_2_proveedor'];
	$calle_proveedor = $_POST['calle_proveedor'];
	$numero_proveedor = $_POST['numero_proveedor'];
	$colonia_proveedor = $_POST['colonia_proveedor'];
	$correo_proveedor = $_POST['correo_proveedor'];
	$id_estado_proveedor = $_POST['id_estado_proveedor'];
	$id_municipio_proveedor = $_POST['id_municipio_proveedor'];
	$ciudad_proveedor = $_POST['ciudad_proveedor'];
	$razon_social = $_POST['razon_social'];
	$rfc = $_POST['rfc'];
	$direccion_fiscal = $_POST['direccion_fiscal'];
	$colonia_fiscal = $_POST['colonia_fiscal'];
	$id_estado_fiscal = $_POST['id_estado_fiscal'];
	$id_municipio_fiscal = $_POST['id_municipio_fiscal'];
	$ciudad_fiscal = $_POST['ciudad_fiscal'];
	$codigo_postal = $_POST['codigo_postal'];
	

	$var = $proveedores->crear_proveedor($mysqli, $empresa, $nombre_proveedor, $lada_tlefono_1_proveedor, $telefono_1_proveedor, $tipo_telefono_1_proveedor, $lada_tlefono_2_proveedor, $telefono_2_proveedor, $tipo_telefono_2_proveedor, $calle_proveedor, $numero_proveedor, $colonia_proveedor, $correo_proveedor, $id_estado_proveedor, $id_municipio_proveedor, $ciudad_proveedor, $razon_social, $rfc, $direccion_fiscal, $colonia_fiscal, $id_estado_fiscal, $id_municipio_fiscal, $ciudad_fiscal, $codigo_postal);

	echo json_encode($var);
?>
