<?php
		header('Content-Type: application/json');

	// //if(isset($_REQUEST['keyword'])){
		
		require '../class/gestion_productos.php';
		
		$productos = new productos();
		
		
		$id_sucursal = 1;//$_SESSION['id_sucursal'];
		$estatus = 1;
		
		$lista_productos = $productos->productos_sucursal_por_estatus($mysqli, $id_sucursal, $estatus);
		
		// var_dump($_SESSION);
		// echo "nada";
		echo json_encode($lista_productos);
		// for($i = 0; $i < count($lista_productos); $i++){
			// echo '<li class="list-group-item">'.$lista_productos[$i]['id_producto']." - ".$lista_productos[$i]['nombre'].'</li>';			
		// }
	//}
?>