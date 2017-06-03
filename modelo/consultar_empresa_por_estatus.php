<?PHP

	if(isset($_POST['estatus']) && $_POST['estatus'] != ""){
		$estatus=$_POST['estatus'];
		echo consultar_empresas_por_estatus($mysqli, $estatus);
	}

?> 