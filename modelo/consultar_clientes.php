<?php
	
		require "../class/gestion_cliente.php";
		$clientes = new cliente();
		
		$lista_clientes = array();
		$estatus = 1;
		
		//Posteriormente de ser un producto elaborado la selección, se llamará a la funcion que solo devuelva ingredientes
		$lista_clientes = $clientes->consultar_clientes($mysqli, $estatus);
		
		header('Content-Type: application/json');
		
		echo json_encode($lista_clientes);
		
?>