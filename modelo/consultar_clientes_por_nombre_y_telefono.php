<?php
	
		require "../class/crear_cliente.php";
		
		$clientes = new Cliente();
		
		//$id_sucursal = $_SESSION['id_sucursal'];
		$nombre_cliente = $_REQUEST['q'];
		//$tipo_busqueda = $_REQUEST['tipo_busqueda'];
		$lista_clientes = array();
		$estatus = 1;
		
		//Posteriormente de ser un producto elaborado la selección, se llamará a la funcion que solo devuelva ingredientes
		$lista_clientes = $clientes->consultar_clientes_por_nombre_y_telefono($mysqli, $nombre_cliente, $estatus);
		
		header('Content-Type: application/json');
		
		echo json_encode($lista_clientes);
		
?>