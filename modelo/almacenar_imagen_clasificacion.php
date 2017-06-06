<?PHP

/*
* Creado por AlexisDos
* Marzo de 2017
* usuario_wp21@hotmail.com
*/

/*
* Almacena imagen y envia las variables a la funcion almacenar_imagen
*
* Retorna el id de la imagen almacenada al js almacenar_trabajadores
*
*/
header('Content-Type: application/json');

	$error="";
	$i = 0;
	//$id_catergoria = $_REQUEST['id_categoria_almacenada'];

	if (!empty($_FILES)) {
	//foreach($_FILES['file']['name'] as $key=>$val){
			//$tmp_name 	= addslashes(file_get_contents($_FILES['file']['tmp_name'][$key]));
			$tempFile = $_FILES['file']['tmp_name'];
			$filename = $_FILES['file']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$estatus = 1;
			$tipo_almacenado = "s3_public";
			//Se almacena imagen en base de datos

			$microtime = microtime();//Timesamp actual del servidor en millonesimas de segundo
			$file_name = "$microtime $filename";//Crea un string con el timestamp y el id del cliente consultado actuando como un salt
			$hash = hash_hmac('gost', $file_name, '743ded31b755c09a3cad90ef3e5f4379e22708e1e30aa543cebaed8cf03a2ad6c090033a780ae243');//Generacion de un hash con el string unico y "peper" o clave secreta en codigo duro

			$nombre_archivo_adjunto = $hash.'.'.$ext;

			//move uploaded file to uploads folder
			$ruta_almacenado_local = $configuraciones_sistema['directorio_local_imagenes'];//configuracion de sistema
			$target_dir = "../$ruta_almacenado_local/";
			$target_file = $target_dir.$nombre_archivo_adjunto;


			move_uploaded_file($tempFile,$target_file);

			include ("../includes/aws_s3/manejo_imagen_s3.php");

			$id_imagen = almacenar_imagen($configuraciones_sistema, $s3Client, $mysqli, $filename, $hash, $ext, $tipo_almacenado, $estatus);

			// $respuesta = $id_imagen;
			echo($id_imagen);


	}else{

			mysqli_query($c,"INSERT INTO `imagen` (`id_imagen`, `nombre_original`, `nombre_de_almacenado`, `extencion`,`tipo_almacenado`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
															VALUES
															(NULL,'1','1','1','1', 1,now(),now())") or die(mysqli_error($c));
	}

?>
