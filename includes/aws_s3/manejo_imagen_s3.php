<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Mayo de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Almacena imagen con las variables dadas desde el modelo
*
* Retorna el id de la imagen almacenada
*
*/


require 'vendor/autoload.php';

use Aws\Common\Aws;

// Create the AWS service builder, providing the path to the config file
$aws = Aws::factory(dirname(__FILE__) . '/config.php');

$s3Client = $aws->get('s3');

function almacenar_imagen($configuraciones_sistema, $s3Client, $mysqli, $filename, $hash, $ext, $tipo_almacenado, $estatus)
  {
  /*
  * Crea el registro de las imagenes enviadas al servidor por los clientes
  * dando como opciones de almacenado el modo local y s3, donde tiene
  * la modalidad privada y la modalidad publica
  *
  * Requiere que el archivo pasado este guardado en el servidor y en el caso
  * de subirlo a s3 este sera borrado del almacenamiento local posteriormente
  */

  /*
  * Toma los parametros desde el array de configuracion de sistema donde
  * se definen los criterios de almacenado
  */
  $bucket = $configuraciones_sistema['s3_bucket_name'];
  $carpeta_raiz_sistema_s3 = $configuraciones_sistema['s3_main_folder_name'];
  $ruta_almacenado_local = $configuraciones_sistema['directorio_local_imagenes'];
  $borrar_imagen_tras_upload = $configuraciones_sistema['boolean_borrar_imagen_local_tras_subir_s3'];

  /*
  * Datos del usuario
  */
  $id_usuario = $_SESSION['userid'];

  $file_path_s3 = "$carpeta_raiz_sistema_s3/uploads/$hash.$ext";

  /*
  * Para imagenes que seran almacenadas en el mismo servidor que el sistema
  */
  if($tipo_almacenado === "local")
    {
    //Inicio del query preparado
		$stmt = $mysqli->prepare("INSERT INTO `imagen` (`id_imagen`, `nombre_original`, `nombre_de_almacenado`, `extencion`,`tipo_almacenado`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
														VALUES
														(NULL,?,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 4 string y 1 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param( "ssssi", $filename, $hash, $ext, $tipo_almacenado, $estatus);

		//Ejecuta el query
		$stmt->execute();

		$id_imagen = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();
    }

  /*
  * Almacenado en Amazon s3
  */
  if($tipo_almacenado === "s3_public" OR $tipo_almacenado === "s3_private")
    {
    /*
    * Archvios que estaran subidos a s3 y podran ser accesidos desde un link
    * sin necesidad de autentificacion
    */
    if($tipo_almacenado === "s3_public")
      {
      $acl = 'public-read';
      }

    else
      {
      $acl = 'private';
      }

    // Upload an object by streaming the contents of a file
    // $pathToFile should be absolute path to a file on disk
    $result = $s3Client->putObject(array(
        'Bucket'     => $bucket,
        'Key'        => $file_path_s3,//Filename, permite seleccionar la carpeta donde guardar
        'SourceFile' => dirname(__FILE__) . "/../../$ruta_almacenado_local/$hash.$ext",//Ruta a la imagen
        'ACL'        => $acl,//Determina el tipo de privacidad del archivo
        'Metadata'   => array(
            'timestamp' => time(),
            'id_usuario' => $id_usuario,
            'empresa' => 'Mucaama',
            'nombre_origial_archivo' => $filename,
            'nombre_hashed' => $hash,
            'extencion_archivo' => $ext
        )
    ));

    $url = $result['ObjectURL'];//La url para acceder al archivos

    //**************************** Almacenado ****************************
    /*
    * Si el archivo es guardado como publico este podra ser accedido desde
    * la url proporcionada y este debe ser el valor guardado en base de datos
    * no obstante si es privado es necesario tener la ruta dentro del bucket de
    * s3 incluyendo el nombre de almacenado para poder tomar el binario cuando
    * sea necesario
    */
    if($tipo_almacenado === "s3_public")
      {
      $ruta = $url;
      }

    else
      {
      $ruta = $file_path_s3;
      }

  	//Inicio del query preparado
		$stmt = $mysqli->prepare("INSERT INTO `imagen` (`id_imagen`, `nombre_original`, `nombre_de_almacenado`, `extencion`,`tipo_almacenado`, `estatus`, `fecha_creacion`, `ultima_modificacion`)
														VALUES
														(NULL,?,?,?,?,?,now(),now())");

		//Indica a la base de datos que recibira 4 string y 1 integer correspoendietes a los signos de ? en el query
		$stmt->bind_param( "ssssi", $filename, $ruta, $ext, $tipo_almacenado, $estatus);

		//Ejecuta el query
		$stmt->execute();

		$id_imagen = $mysqli->insert_id;

		//Cierra el query
		$stmt->close();

    //Elimina la imagen del almacenamiento local
    if($borrar_imagen_tras_upload == "true")
      {
      unlink(dirname(__FILE__) . "/../../$ruta_almacenado_local/$hash.$ext");
      }
    }

  return $id_imagen;
	}

function consultar_imagen($configuraciones_sistema, $s3Client, $mysqli, $id_imagen)
  {
  $respuesta = array();//El valor que sera retornado en forma de json

  //******************** Verifica que la imagen exista ********************
	$query = "SELECT COUNT(*) FROM imagen WHERE `id_imagen` = ? AND `estatus` = 1";
	if ($stmt = $mysqli->prepare($query))
		{
		//Asigna las variables para el query
		$stmt->bind_param("i", $id_imagen);

		//Ejecuta el query
		$stmt->execute();

		//Asigna el resultado a una variable
		$stmt->bind_result($imagen_existe);

		//obtener valor
		while ($stmt->fetch())
			{
      //
			}

		//Cierra el query
		$stmt->close();
		}

  /*
  * Si el id de la imagen es encontrado en base de datos y como un valor
  * activo se procede a obtener la ruta de almacenado o el archivo en si
  * segun sea tu tipo de almacenado
  */
  if($imagen_existe == 1)
    {
		$query = "SELECT `nombre_original`, `extencion`, `nombre_de_almacenado`, `tipo_almacenado` FROM imagen WHERE `id_imagen` = ?";
		if ($stmt = $mysqli->prepare($query))
			{
			//Asigna las variables para el query
			$stmt->bind_param("i", $id_imagen);

			//Ejecuta el query
			$stmt->execute();

			//Asigna el resultado a una variable
			$stmt->bind_result($nombre_original, $extencion, $nombre_de_almacenado, $tipo_almacenado);

			//obtener valor
			while ($stmt->fetch())
				{
				//
				}

			//Cierra el query
			$stmt->close();
			}

    /*
    * Los tipos de almacenado soportados son
    * local - son guardadas en una carpeta del sistema en el mismo servidor
    * s3_public - guardados en s3 con una url accesible por cualquiera
    * s3_private - guardados en s3 pero solo accesibles en forma de archivo
    * binario por aquellos con las credenciales de accesso
    */
    if($tipo_almacenado == 'local' OR $tipo_almacenado == 's3_public')
      {
      $respuesta['estatus'] = 'success';
      $respuesta['tipo_almacenado'] = $tipo_almacenado;
      $respuesta['nombre_de_almacenado'] = $nombre_de_almacenado;
      $respuesta['nombre_original'] = $nombre_original;
      $respuesta['extencion'] = $extencion;
      }

    if($tipo_almacenado == 's3_private')
      {
      /*
      * Toma los parametros desde el array de configuracion de sistema donde
      * se definen los criterios de almacenado
      */
      $bucket = $configuraciones_sistema['s3_bucket_name'];

      /*
      * La imagen sera descargada y guardada de manera temporal en este
      * ruta
      */
      $ruta_almacenado_temporal = "/tmp/$nombre_original.$extencion";

      $result = $s3Client->getObject(array(
          'Bucket' => $bucket,
          'Key'    => $nombre_de_almacenado,
          'SaveAs' => $ruta_almacenado_temporal
      ));

      $respuesta['estatus'] = 'success';
      $respuesta['tipo_almacenado'] = $tipo_almacenado;
      $respuesta['nombre_de_almacenado'] = $ruta_almacenado_temporal;
      $respuesta['nombre_original'] = $nombre_original;
      $respuesta['extencion'] = $extencion;
      }
    }

  //Si no se encontro la imagen
  else
    {
    $respuesta['estatus'] = 'error';
    }

  return json_encode($respuesta);
  }
?>
