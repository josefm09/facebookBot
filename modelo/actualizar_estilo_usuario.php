<?php

	if(isset($_POST['color']) && isset($_POST['elemento'])){
		
		$color = $_POST['color'];
		$elemento = $_POST['elemento'];
		
		actualizar_estilo_usuario($mysqli, $color, $elemento, $id_usuario);
		
	}

?>