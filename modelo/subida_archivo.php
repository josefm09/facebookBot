<?php

include ("../includes/aws_s3/manejo_archivo_s3.php");

// almacenar_archivo($configuraciones_sistema, $s3Client, $mysqli, 'pica', 'CSD09_AAA010101AAA.cer', 'pem', 's3_private', 1);
echo consultar_archivo($configuraciones_sistema, $s3Client, $mysqli, 3);

?>
