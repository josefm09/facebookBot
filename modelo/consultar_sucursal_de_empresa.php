<?PHP
	$privilegio = $_SESSION['privilegio_administrativo'];
	
	if($privilegio == 2)
		{
			$empresa = $_SESSION['id_empresa'];
			echo consultar_sucursales_por_empresa($mysqli, $empresa);
		}
?>