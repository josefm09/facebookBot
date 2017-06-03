<?PHP

	$empresa = $_SESSION['id_empresa'];
	if(isset($_POST['id_empresa'])){		
		$empresa = $_POST['id_empresa'];
	}
	echo consultar_sucursales_por_empresa($mysqli, $empresa);
	

?> 