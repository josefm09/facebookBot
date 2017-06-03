<?PHP

	$keyword_before = json_decode($_REQUEST['keyword']);
	//Tomamos el string del key
	$keyword = mysqli_real_escape_string($c,$keyword_before);
	$empresa = $_SESSION['empresa'];

	echo consultar_proveedor_por_key($mysqli, $keyword, $empresa);
?>
