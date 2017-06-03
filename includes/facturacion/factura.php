<?php
/*
* Creado por Diego Payan Lopez
* Mayo de 2017
*/

/*
* Agrupa las funciones para la creacion de Facturas
*/
include_once (dirname(__FILE__) . '/lib/cfdi32_multifacturas.php');
require (dirname(__FILE__) . '/fpdf/fpdf.php');

class facturas
  {
	  
  function tipos_de_producto($mysqli)
    {
		$usuario = $datos['PAC']['usuario'] = 'DEMO700101XXX';
		$datos['PAC']['pass'] = 'DEMO700101XXX';
		$datos['PAC']['produccion'] = 'NO'; //   [SI|NO]
		$datos['conf']['cer'] = 'pruebas/CSD09_AAA010101AAA.cer.pem';
		$datos['conf']['key'] = 'pruebas/CSD09_AAA010101AAA.key.pem';
		$datos['conf']['pass'] = '12345678a';

		//RUTA DONDE ALMACENARA EL CFDI
		$datos['cfdi']='timbrados/cfdi_ejemplo_factura.xml';
		// OPCIONAL GUARDAR EL XML GENERADO ANTES DE TIMBRARLO
		$datos['xml_debug']='timbrados/sin_timbrar_ejemplo_factura.xml';

		//OPCIONAL, ACTIVAR SOLO EN CASO DE CONFLICTOS
		$datos['remueve_acentos']='SI';

		//OPCIONAL, UTILIZAR LA LIBRERIA PHP DE OPENSSL, DEFAULT SI
		$datos['php_openssl']='SI';

		$serie = $datos['factura']['serie'] = 'A'; //opcional
		$folio = $datos['factura']['folio'] = '100'; //opcional
		$fecha_expedicion = $datos['factura']['fecha_expedicion'] = date('Y-m-d H:i:s',time()-120);// Opcional  "time()-120" para retrasar la hora 2 minutos para evitar falla de error en rango de fecha


		$datos['factura']['metodo_pago'] = '01'; // EFECTIV0, CHEQUE, TARJETA DE CREDITO, TRANSFERENCIA BANCARIA, NO IDENTIFICADO
		
		switch($datos['factura']['metodo_pago']){
			case 01 : $metodo_pago = 'EFECTIVO';break;
			case 02 : $metodo_pago = 'CHEQUE';break;
			case 03	: $metodo_pago = 'TARJETA DE CREDITO';break;
			case 04 : $metodo_pago = 'TRANSFERENCIA BANCARIA';break;
			case 05 : $metodo_pago = 'NO IDENTIFICADO';break;
			default : $metodo_pago = 'TIPO NO IDENTIFICADO';break;
		}
		
		$forma_pago = $datos['factura']['forma_pago'] = 'PAGO EN UNA SOLA EXHIBICION';  //PAGO EN UNA SOLA EXHIBICION, CREDITO 7 DIAS, CREDITO 15 DIAS, CREDITO 30 DIAS, ETC
		$datos['factura']['tipocomprobante'] = 'ingreso'; //ingreso, egreso
		$moneda = $datos['factura']['moneda'] = 'MXN'; // MXN USD EUR
		$datos['factura']['tipocambio'] = '1.0000'; // OPCIONAL (MXN = 1.00, OTRAS EJ: USD = 13.45; EUR = 16.86)
		$lugar_expedicion = $datos['factura']['LugarExpedicion'] = 'MONTERREY, NUEVO LEON';
		//$datos['factura']['NumCtaPago'] = '0234'; //opcional; 4 DIGITOS pero obligatorio en transferencias y cheques

		$regimen_fiscal = $datos['factura']['RegimenFiscal'] = 'MI REGIMEN';

		$rfc_emisor = $datos['emisor']['rfc'] = 'AAA010101AAA'; //RFC DE PRUEBA  
		$nombre_emisor = $datos['emisor']['nombre'] = 'JELOUSOFT';  // EMPRESA DE PRUEBA
		$calle_emisor = $datos['emisor']['DomicilioFiscal']['calle'] = 'Blv. Francisco I. Madero';
		$exterior_emisor = $datos['emisor']['DomicilioFiscal']['noExterior'] = '1790';
		$datos['emisor']['DomicilioFiscal']['noInterior'] = ''; //(opcional)
		$colonia_emisor = $datos['emisor']['DomicilioFiscal']['colonia'] = 'Miguel Hidalgo';
		$localidad_emisor = $datos['emisor']['DomicilioFiscal']['localidad'] = 'CULIACAN';
		$municipio_emisor = $datos['emisor']['DomicilioFiscal']['municipio'] = 'CULIACAN'; // o delegacion
		$estado_emisor = $datos['emisor']['DomicilioFiscal']['estado'] = 'SINALOA';
		$pais_emisor = $datos['emisor']['DomicilioFiscal']['pais'] = 'MEXICO';
		$cpostal_emisor = $datos['emisor']['DomicilioFiscal']['CodigoPostal'] = '80090'; // 5 digitos

		//SI EX EXPEDIDO EN SUCURSAL CAMBIA EL DOMICILIO
		//SI ES EN EL MISMO DOMICILIO REPETIR INFORMACION
		$calle_expedido = $datos['emisor']['ExpedidoEn']['calle'] = 'HIDALGO';
		$exterior_expedido = $datos['emisor']['ExpedidoEn']['noExterior'] = '240';
		$datos['emisor']['ExpedidoEn']['noInterior'] = ''; //(opcional)
		$colonia_expedido = $datos['emisor']['ExpedidoEn']['colonia'] = 'LAS CUMBRES 3 SECTOR';
		$localidad_expedido = $datos['emisor']['ExpedidoEn']['localidad'] = 'MONTERREY';
		$municipio_expedido = $datos['emisor']['ExpedidoEn']['municipio'] = 'MONTERREY'; // O DELEGACION
		$estado_expedido = $datos['emisor']['ExpedidoEn']['estado'] = 'NUEVO LEON';
		$pais_expedido = $datos['emisor']['ExpedidoEn']['pais'] = 'MEXICO';
		$cpostal_expedido = $datos['emisor']['ExpedidoEn']['CodigoPostal'] = '64610'; // 5 digitos

		// IMPORTANTE PROBAR CON NOMBRE Y RFC REAL O GENERARA ERROR DE XML MAL FORMADO
		$rfc_receptor = $datos['receptor']['rfc'] = 'SOHM7509289MA';
		$nombre_receptor = $datos['receptor']['nombre'] = 'MIGUEL ANGEL SOSA HERNANDEZ';
		//opcional
		$calle_receptor = $datos['receptor']['Domicilio']['calle'] = 'PERIFERICO';
		$exterior_receptor = $datos['receptor']['Domicilio']['noExterior'] = '1024';
		$datos['receptor']['Domicilio']['noInterior'] = 'B';
		$colonia_receptor = $datos['receptor']['Domicilio']['colonia'] = 'SAN ANGEL';
		$localidad_receptor = $datos['receptor']['Domicilio']['localidad'] = 'CIUDAD DE MEXICO';
		$municipio_receptor = $datos['receptor']['Domicilio']['municipio'] = 'ALVARO OBREGON';
		$estado_receptor = $datos['receptor']['Domicilio']['estado'] = 'DISTRITO FEDERAL';
		$pais_receptor = $datos['receptor']['Domicilio']['pais'] = 'MEXICO';
		$cpostal_receptor = $datos['receptor']['Domicilio']['CodigoPostal'] = '23010'; // 5 digitos

		//AGREGAR 10 CONCEPTOS DE PRUEBA
		for($i = 0; $i < 10; $i++){
			unset($concepto);
			$concepto['cantidad'] = $i;
			$concepto['unidad'] = 'PIEZA';
			$concepto['ID'] = "COD$i"; //ID, REF, CODIGO O SKU DEL PRODUCTO

			$concepto['descripcion'] = "DESCRIPCION - ".$i;
			$concepto['valorunitario'] = $i.".00"; // SIN IVA
			$concepto['importe'] = $i*$i.".00";
			
			$importe_total += $i*$i;
			
			$datos['conceptos'][] = $concepto;
		}

		$subtotal = $datos['factura']['subtotal'] = $importe_total; // sin impuestos
		$descuento = $datos['factura']['descuento'] = 100.00; // descuento sin impuestos
		$total = $datos['factura']['total'] = ($importe_total - $descuento) * 1.16; // total incluyendo impuestos

		$translado1['impuesto'] = 'IVA';
		$tasa = $translado1['tasa'] = '16';
		$importe_factura = $translado1['importe'] = ($importe_total - $descuento) * ($tasa/100); // iva de los productos facturados
		$datos['impuestos']['translados'][0] = $translado1;

		$res = cfdi_generar_xml($datos);
	 
		///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
		
		/*echo "<h1>Respuesta Generar XML y Timbrado</h1>";
		foreach($res AS $variable=>$valor){
			$valor = htmlentities($valor);
			$valor = str_replace('&lt;br/&gt;','<br/>',$valor);
			echo "<b>[$variable] = </b>$valor<hr>";
		}
		
		print_r ($datos);*/

		foreach($res AS $variable=>$valor){
			
			$valor = htmlentities($valor);
			$valor = str_replace('&lt;br/&gt;','<br/>',$valor);
			if($variable == "representacion_impresa_cadena")
				$representacion_impresa_cadena = $valor;
			if($variable == "representacion_impresa_sello")
				$representacion_impresa_sello = $valor;
			if($variable == "representacion_impresa_selloSAT")
				$representacion_impresa_selloSAT = $valor;
			if($variable == "representacion_impresa_certificadoSAT")
				$representacion_impresa_certificadoSAT = $valor;
			if($variable == "representacion_impresa_certificado_no")
				$representacion_impresa_certificado_no = $valor;
			if($variable == "uuid")
				$uuid = $valor;
			
		}
		
		//Genera codigo QR para esta factura y la almacena en directorio
		$data = isset($_GET['data']) ? $_GET['data'] : '?re='.$usuario.'&rr='.$rfc_receptor.'&tt='.$total.'&id='.$uuid;
		$size = isset($_GET['size']) ? $_GET['size'] : '300x300';
		
		$QR = file_get_contents('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
		$path = 'qr/'.$uuid.'.png';
		
		file_put_contents($path,$QR);
		
		///////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////// Genera PDF  //////////////////////////////////
		///////////////////////////////////////////////////////////////////////////////////
		
		class PDF extends FPDF{
			
			//Cabecera de página
			function Header(){
				$this->Image('jelousoft.jpg',11.6,13,45,20);
				$this->SetFont('Arial','B',15);
				$this->SetFillColor(230,230,230);
				$this->Cell(0,0,$GLOBALS['nombre_emisor'],0,0,'');
				$this->Ln(5);
				$this->SetFont('Arial','B',17.5);
				$this->Cell(0,0,"FACTURA: ".$GLOBALS['serie']."".$GLOBALS['folio'],0,0,'R');
				$this->Ln(7);
				$this->SetFont('Arial','B',9.5);
				$this->Cell(0,0,"FOLIO FISCAL : ". $GLOBALS['uuid'],0,0,'R');
				$this->Ln(4);
				$this->Cell(0,0,"NUMERO CERTIFICADO CSD : ".$GLOBALS['representacion_impresa_certificado_no'],0,0,'R');
				$this->Ln(4);
				$this->Cell(0,0,"LUGAR Y FECHA: ".$GLOBALS['municipio_expedido'].", ".$GLOBALS['estado_expedido']." ".$GLOBALS['fecha_expedicion'],0,0,'R');
				$this->SetFont('Arial','B',8.6);
				$this->Ln(7);
				$this->Cell(0,0,"EXPEDIDO EN: ".$GLOBALS['calle_expedido']." ".$GLOBALS['exterior_expedido']." , ".$GLOBALS['colonia_expedido']." ".$GLOBALS['municipio_expedido']." , ". $GLOBALS['estado_expedido'].", ".$GLOBALS['pais_expedido']." CP:".$GLOBALS['cpostal_expedido'],0,0,'L');
				$this->Ln(4);
				$this->Cell(0,0,"",1,0,'L');
				
			}
			
			//Pie de página
			function Footer(){
				$this->SetY(-10);
				$this->SetFont('Arial','I',8);
				$this->Cell(0,10,utf8_decode($this->PageNo()),0,0,'C');
			}
		}
		
		//Creación del objeto de la clase heredada
		$pdf=new PDF();
		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B',9);
		//$pdf->SetFillColor(230,230,230);
		$pdf->SetXY(10,43);
		$pdf->Cell(0,8,utf8_decode('EMISOR:'),0,0,'');
		$pdf->SetXY(110,43);
		$pdf->Cell(0,8,utf8_decode('RECEPTOR:'),0,0,'');
		$pdf->Ln(5);
		$pdf->Cell(0,8,utf8_decode($nombre_emisor."."),0,0,'');
		$pdf->SetX(110);
		$pdf->Cell(0,8,utf8_decode($nombre_receptor."."),0,0,'');
		$pdf->Ln(5);
		$pdf->Cell(0,8,utf8_decode("RFC: ".$rfc_emisor."."),0,0,'');
		$pdf->SetX(110);
		$pdf->Cell(0,8,utf8_decode("RFC: ".$rfc_receptor."."),0,0,'');
		$pdf->Ln(5);
		$pdf->Cell(0,8,utf8_decode($calle_emisor." ".$exterior_emisor." , ".$colonia_emisor." CP:".$cpostal_emisor."."),0,0,'');
		$pdf->SetX(110);
		$pdf->Cell(0,8,utf8_decode($calle_receptor." ".$exterior_receptor." , ".$colonia_receptor." CP:".$cpostal_receptor."."),0,0,'');
		$pdf->Ln(5);
		$pdf->Cell(0,8,utf8_decode($municipio_emisor." ". $localidad_emisor ." ,".$estado_emisor." ,".$pais_emisor."."),0,0,'');
		$pdf->SetX(110);
		$pdf->Cell(0,8,utf8_decode($municipio_receptor."  ". $localidad_receptor ." ,"),0,0,'');
		$pdf->Ln(4);
		$pdf->SetX(110);
		$pdf->Cell(0,8,utf8_decode($estado_receptor." ,".$pais_receptor."."),0,0,'');
		$pdf->SetTextColor(255,255,255);
		$pdf->Ln(7);
		$pdf->Cell(11,8,utf8_decode("CANT"),0,0,'',true);
		$pdf->SetX(22);
		$pdf->Cell(15,8,utf8_decode("UNIDAD"),0,0,'',true);
		$pdf->SetX(38);
		$pdf->Cell(15,8,utf8_decode("CODIGO"),0,0,'',true);
		$pdf->SetX(54);
		$pdf->Cell(83,8,utf8_decode("DESCRIPCION"),0,0,'',true);
		$pdf->SetX(138);
		$pdf->Cell(31,8,utf8_decode("PRECIO UNITARIO"),0,0,'',true);
		$pdf->SetX(170);
		$pdf->Cell(31,8,utf8_decode("IMPORTE"),0,0,'',true);
		
		$pdf->SetTextColor(0,0,0);
		$pdf->Ln(7);
		
		$importe_total = 0;
		
		//Tabla de productos
		for($i = 0; $i < 10; $i++){
			$pdf->Cell(11,8,utf8_decode($i),0,0);
			$pdf->SetX(22);
			$pdf->Cell(15,8,utf8_decode("PIEZA"),0,0);
			$pdf->SetX(38);
			$pdf->Cell(15,8,utf8_decode("COD".$i),0,0);
			$pdf->SetX(54);
			$pdf->Cell(83,8,utf8_decode("DESCRIPCION - ".$i),0,0);
			$pdf->SetX(138);
			$pdf->Cell(31,8,utf8_decode("$".$i.".00"),0,0);
			$pdf->SetX(170);
			$pdf->Cell(31,8,utf8_decode("$".$i*$i.".00"),0,0);
			$pdf->Ln(7);
			
			$importe_total += $i*$i;
		}
		
		$pdf->SetX(138);
		$pdf->Cell(31,8,utf8_decode("IMPORTE $"),0,0);
		$pdf->SetX(170);
		$pdf->Cell(31,8,utf8_decode($importe_total.".00"),0,0);
		$pdf->Ln(7);
		$pdf->SetX(138);
		$pdf->Cell(31,8,utf8_decode("DESCUENTO $"),0,0);
		$pdf->SetX(170);
		$pdf->Cell(31,8,utf8_decode("100.00"),0,0);
		$pdf->Ln(7);
		$pdf->SetX(138);
		$pdf->Cell(31,8,utf8_decode("IVA(16%)"),0,0);
		$pdf->SetX(170);
		$pdf->Cell(31,8,utf8_decode($importe_total * 0.16),0,0);
		$pdf->Ln(7);
		$pdf->SetX(138);
		$pdf->Cell(31,8,utf8_decode("TOTAL $"),0,0);
		$pdf->SetX(170);
		$pdf->Cell(31,8,utf8_decode($total),0,0);
		$pdf->Ln(7);
		$pdf->SetX(170);
		$pdf->Cell(31,8,utf8_decode($moneda),0,0);
		
		//Numero a Letra
		$numero_letra = numtoletras($total);
		
		//Carga imagen de QR
		$QR = 'qr/'.$uuid.'.png';
		$pdf->Image($QR,11,195,47,47);
		
		$pdf->SetFont('Arial','B',7.2);
		$pdf->Ln(7);
		$pdf->SetX(60);
		$pdf->Cell(31,8,utf8_decode("MONEDA CON LETRA: ".$numero_letra),0,0);
		$pdf->Ln(5);
		$pdf->SetX(60);
		$pdf->Cell(31,8,utf8_decode("METODO DE PAGO: ".$metodo_pago." | FORMA PAGO: ".$forma_pago),0,0);
		$pdf->Ln(5);
		$pdf->SetX(60);
		$pdf->Cell(31,8,utf8_decode("REGIMEN FISCAL: ".$regimen_fiscal." | FECHA TIMBRADO: ".$fecha_expedicion),0,0);
		$pdf->Ln(5);
		$pdf->SetX(60);
		$pdf->Cell(31,8,utf8_decode("SELLO:"),0,0);
		$pdf->Ln(6);
		$pdf->SetX(60);
		$pdf->MultiCell(136,3,utf8_decode($representacion_impresa_sello),0,"L");
		$pdf->Ln(-2);
		$pdf->SetX(60);
		$pdf->Cell(31,8,utf8_decode("SELLO SAT:"),0,0);
		$pdf->Ln(6);
		$pdf->SetX(60);
		$pdf->MultiCell(136,3,utf8_decode($representacion_impresa_selloSAT),0,"L");
		$pdf->Ln(-2);
		$pdf->SetX(60);
		$pdf->Cell(31,8,utf8_decode("NUMERO CERTIFICADO SAT:".$representacion_impresa_certificadoSAT),0,0);
		$pdf->Ln(4);
		$pdf->SetX(60);
		$pdf->Cell(31,8,utf8_decode("CADENA ORIGINAL:"),0,0);
		$pdf->Ln(6);
		$pdf->SetX(60);
		$pdf->MultiCell(136,3,utf8_decode($representacion_impresa_cadena),0,"L");
		$pdf->Ln(-2);
		$pdf->SetX(60);
		$pdf->Cell(31,8,utf8_decode("ESTE DOCUMENTO ES UNA REPRESENTACION IMPRESA DE UN CFDI EFECTOS FISCALES AL PAGO"),0,0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial','B',7.4);
		$pdf->MultiCell(0,3,utf8_decode("Por este pagare me(nos) obligo(amos) a pagar incondicionalmente el dia ______________________ en esta ciudad de ".$municipio_expedido.",".$estado_expedido.", o en cualquier otra plaza que se me(nos) requiera a la orden de ".$nombre_emisor." la cantidad de valor recibido a mi(nuestra) entera satisfaccion, queda convenida que en caso de demora el presente pagare causara un interes ____% mensual a la liquidacion."),0,"L");
		$pdf->Ln(4);
		$pdf->Cell(31,8,utf8_decode("FIRMA DE CLIENTE: __________________________"),0,0);
		
		$pdf->Output();

	}
	
  //Funcion para convertir cantidad total numerica a letra
  function numtoletras($xcifra)
	{
		$xarray = array(0 => "Cero",1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE", "DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE", "VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA", 100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS");
		
		$xcifra = trim($xcifra);
		$xlength = strlen($xcifra);
		$xpos_punto = strpos($xcifra, ".");
		$xaux_int = $xcifra;
		$xdecimales = "00";
		if (!($xpos_punto === false)){
			if ($xpos_punto == 0){
				$xcifra = "0".$xcifra;
				$xpos_punto = strpos($xcifra, ".");
			}
			$xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
			$xdecimales = substr($xcifra."00", $xpos_punto + 1, 2); // obtengo los valores decimales
		}
	 
		$XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
		$xcadena = "";
		for($xz = 0; $xz < 3; $xz++){
			$xaux = substr($XAUX, $xz * 6, 6);
			$xi = 0; $xlimite = 6; // inicializo el contador de centenas xi y establezco el limite a 6 digitos en la parte entera
			$xexit = true; // bandera para controlar el ciclo del While	
			while ($xexit){
				if ($xi == $xlimite){ // si ya llego al limite maximo de enteros
					break; // termina el ciclo
				}
	 
				$x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
				$xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres digitos)
				for ($xy = 1; $xy < 4; $xy++){ // ciclo para revisar centenas, decenas y unidades, en ese orden
				
					switch ($xy) {
						case 1: // checa las centenas
							if (substr($xaux, 0, 3) < 100){ // si el grupo de tres digitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas
							}else{
								$xseek = $xarray[substr($xaux, 0, 3)]; // busco si la centena es numero redondo (100, 200, 300, 400, etc..)
								if ($xseek){
									$xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millon, Millones, Mil o nada)
									if (substr($xaux, 0, 3) == 100) 
										$xcadena = " ".$xcadena." CIEN ".$xsub;
									else
										$xcadena = " ".$xcadena." ".$xseek." ".$xsub;
									$xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
								}else{ // entra aqui si la centena no fue numero redondo (101, 253, 120, 980, etc.)
									$xseek = $xarray[substr($xaux, 0, 1) * 100]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
									$xcadena = " ".$xcadena." ".$xseek;
								}
							}
						break;
						case 2: // checa las decenas (con la misma l?gica que las centenas)
							if (substr($xaux, 1, 2) < 10){
							}else{
								$xseek = $xarray[substr($xaux, 1, 2)];
								if ($xseek){
									$xsub = subfijo($xaux);
									if (substr($xaux, 1, 2) == 20)
										$xcadena = " ".$xcadena." VEINTE ".$xsub;
									else
										$xcadena = " ".$xcadena." ".$xseek." ".$xsub;
									$xy = 3;
								}else{
									$xseek = $xarray[substr($xaux, 1, 1) * 10];
									if (substr($xaux, 1, 1) * 10 == 20)
										$xcadena = " ".$xcadena." ".$xseek;
									else	
										$xcadena = " ".$xcadena." ".$xseek." Y ";
								}
							}
						break;
						case 3: // checa las unidades
							if (substr($xaux, 2, 1) < 1){ // si la unidad es cero, ya no hace nada
							}else{
								$xseek = $xarray[substr($xaux, 2, 1)]; // obtengo directamente el valor de la unidad (del uno al nueve)
								$xsub = subfijo($xaux);
								$xcadena = " ".$xcadena." ".$xseek." ".$xsub;
							}
						break;
					}
				}
				$xi = $xi + 3;
			}
	 
			if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
				$xcadena.= " DE";
	 
			if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
				$xcadena.= " DE";
	 
			// ----------- Esta linea la puedes cambiar de acuerdo a tus necesidades o a tu pais ------- \\
			if (trim($xaux) != ""){
				switch ($xz){
					
					case 0:
						if (trim(substr($XAUX, $xz * 6, 6)) == "1")
							$xcadena.= "UN BILLON ";
						else
							$xcadena.= " BILLONES ";
						break;
						
					case 1:
						if (trim(substr($XAUX, $xz * 6, 6)) == "1")
							$xcadena.= "UN MILLON ";
						else
							$xcadena.= " MILLONES ";
						break;
						
					case 2:
						if ($xcifra < 1 ){
							$xcadena = "CERO PESOS $xdecimales/100 MXN";
						}
						if ($xcifra >= 1 && $xcifra < 2){
							$xcadena = "UN PESO $xdecimales/100 MXN";
						}
						if ($xcifra >= 2){
							$xcadena.= " PESOS $xdecimales/100 MXN";
						}
						break;
					}
				}
			// ------------------      En este caso, para Mexico se usa esta leyenda     ---------------- \\
			$xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
			$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles 
			$xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
			$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles 
			$xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
			$xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
			$xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
		}
		return trim($xcadena);
	}

	function subfijo($xx)
	{ // Esta funcion regresa un subfijo para la cifra
		$xx = trim($xx);
		$xstrlen = strlen($xx);
		if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
			$xsub = "";

		if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
			$xsub = "MIL";

		return $xsub;
	}

  }
?>
