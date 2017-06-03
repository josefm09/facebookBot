<?php
include ("manejo_imagen_s3.php");

almacenar_imagen($s3Client, 's3_public');

/*
include ("../includes/aws_s3/manejo_imagen_s3.php");

almacenar_imagen($configuraciones_sistema, $s3Client, $mysqli, 'pica', 'f51f07d7e99088eb4342429b063ecac9a3e2c740f4e19a2d51b93529b48f4b10', 'jpg', 's3_public', 1);
*/
?>
