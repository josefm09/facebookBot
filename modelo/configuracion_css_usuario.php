<?php
/*
* Creado por Jose Pablo Domingo Aramburo Sanchez
* Abril de 2017
* josepablo.aramburo@gmail.com
*/

/*
* Retorna un string que contiene las configuraciones de CSS a usar en la vista
* para el usuario con la sessiona activa alimentandose del array $configuraciones_usuario
* que es cargado desde la api
*
* En landing/panel.php el CSS principal es cargado despues de body y por ello el archivo
* no debe contener las mismas tags que son pasadas a esta funcion o
* seran sobre escritas
*/

/*
* Crea una version nueva de color en base a uno proporcionado
*/
function adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}

/*
* Para determinar que tan obscuro o claro es un color
*/
function brightness($hex)
  {
  $hex = str_replace("#", "", $hex);

  //break up the color in its RGB components
  $r = hexdec(substr($hex,0,2));
  $g = hexdec(substr($hex,2,2));
  $b = hexdec(substr($hex,4,2));

  //do simple weighted avarage
  //
  //(This might be overly simplistic as different colors are perceived
  // differently. That is a green of 128 might be brighter than a red of 128.
  // But as long as it's just about picking a white or black text color...)
  if($r + $g + $b > 382)
    {
    $color_letra = 'black';
    }

  else
    {
    $color_letra = '#f5f5f5';
    }

  return $color_letra;
  }

/*
* Se crea una variable a la cual se le suman las configuraciones de CSS
* por medio de concatenacion, JavaScript is primitivo y notiene un buen
* soporte para elmentos espaciados en sus variables por ello es necesario
* mandar todo como un string
*/
$css_custom = NULL; //Inicializa la variables

//Variables de style
$color_panel_header = $configuraciones_usuario['color_panel'];
$color_letra_adaptado_a_panel_header = brightness($color_panel_header);
$color_texto_en_elementos = $configuraciones_usuario['color_texto_en_elementos'];
$color_button_primary = $configuraciones_usuario['color_button_primary'];
$color_letra_adaptado_a_button_primary = brightness($color_button_primary);
$color_button_primary_darker = adjustBrightness($color_button_primary, -30);
$color_button_success = $configuraciones_usuario['color_button_success'];
$color_letra_adaptado_a_button_success = brightness($color_button_success);
$color_button_success_darker = adjustBrightness($color_button_success, -30);
$color_button_warning = $configuraciones_usuario['color_button_warning'];
$color_letra_adaptado_a_button_warning = brightness($color_button_warning);
$color_button_warning_darker = adjustBrightness($color_button_warning, -30);
$fuente = $configuraciones_usuario['fuente'];
$color_fondo_panel = $configuraciones_usuario['color_fondo_panel'];
$color_fondo_panel_input = adjustBrightness($color_fondo_panel, 30);//No esta en uso
$color_letra_adaptado_a_fondo_panel_body = brightness($color_fondo_panel);
$color_fondo_sistema = $configuraciones_usuario['color_fondo_sistema'];
$color_navbar = $configuraciones_usuario['color_navbar'];
$color_letra_adaptado_a_navbar = brightness($color_navbar);
$color_navbar_lighter = adjustBrightness($color_navbar, 50);
$color_navbar_darker = adjustBrightness($color_navbar, -50);

//Para el color del panel
$css_custom .= "#cuerpo .panel-default{border:3px solid $color_panel_header;border-radius:5px;color:$color_letra_adaptado_a_panel_header}#cuerpo .panel>.panel-heading{background-image:none;background-color:$color_panel_header;color:$color_texto_en_elementos;border-radius:0;color:$color_letra_adaptado_a_panel_header}";
//Button primary
$css_custom .= "#cuerpo .btn-primary{color:$color_texto_en_elementos;border:2px solid $color_button_primary;background:$color_button_primary;color:$color_letra_adaptado_a_button_primary}#cuerpo .btn-primary:hover{color:$color_texto_en_elementos;border:2px solid $color_button_primary_darker;background:$color_button_primary_darker;color:$color_letra_adaptado_a_button_primary}";
//Button success
$css_custom .= "#cuerpo .btn-success{color:$color_texto_en_elementos;border:2px solid $color_button_success;background:$color_button_success;color:$color_letra_adaptado_a_button_success}#cuerpo .btn-success:hover{color:$color_texto_en_elementos;border:2px solid $color_button_success_darker;background:$color_button_success_darker;color:$color_letra_adaptado_a_button_success}";
//Button warning
$css_custom .= "#cuerpo .btn-warning{color:$color_texto_en_elementos;border:2px solid $color_button_warning;background:$color_button_warning;color:$color_letra_adaptado_a_button_warning}#cuerpo .btn-warning:hover{color:$color_texto_en_elementos;border:2px solid $color_button_warning_darker;background:$color_button_warning_darker;color:$color_letra_adaptado_a_button_warning}";
//Fuente
$css_custom .= "body{font-family:$fuente}";
//Fondo para los paneles
$css_custom .= ".panel-body{background:$color_fondo_panel;color:$color_letra_adaptado_a_fondo_panel_body}";
//Fondo para el sistema en general
$css_custom .= "body{background-color:$color_fondo_sistema}";
//Configuracion de la barra de navegacion
$css_custom .= "#custom-bootstrap-menu.navbar-default .navbar-brand{color:$color_letra_adaptado_a_navbar;margin:0;padding:0}#custom-bootstrap-menu.navbar-default{font-size:14px;background-color:$color_navbar;border-width:1px;border-radius:4px;border-color:$color_navbar;margin:0;padding:0}#custom-bootstrap-menu.navbar-default .navbar-nav>li>a{color:$color_letra_adaptado_a_navbar;background-color:$color_navbar}#custom-bootstrap-menu.navbar-default .navbar-nav>li>a:hover,#custom-bootstrap-menu.navbar-default .navbar-nav>li>a:focus{color:$color_navbar_lighter;background-color:$color_navbar}#custom-bootstrap-menu.navbar-default .navbar-nav>.active>a,#custom-bootstrap-menu.navbar-default .navbar-nav>.active>a:hover,#custom-bootstrap-menu.navbar-default .navbar-nav>.active>a:focus{color:$color_navbar_lighter;background-color:$color_navbar}#custom-bootstrap-menu.navbar-default .navbar-toggle{border-color:white}#custom-bootstrap-menu.navbar-default .navbar-toggle:hover,#custom-bootstrap-menu.navbar-default .navbar-toggle:focus{background-color:$color_navbar_darker}#custom-bootstrap-menu.navbar-default .navbar-toggle .icon-bar{background-color:$color_navbar_darker}#custom-bootstrap-menu.navbar-default .navbar-toggle:hover .icon-bar,#custom-bootstrap-menu.navbar-default .navbar-toggle:focus .icon-bar{background-color:$color_navbar_darker}";
//Color para los input
$css_custom .= ".form-control{background-color:$color_fondo_panel_input!important}input[type='tel']{background-color:$color_fondo_panel_input!important}";
//color para los placeholders de los inputs
$css_custom .= ".form-control::-webkit-input-placeholder{color:$color_letra_adaptado_a_fondo_panel_body}.form-control:-moz-placeholder{color:$color_letra_adaptado_a_fondo_panel_body}.form-control::-moz-placeholder{color:$color_letra_adaptado_a_fondo_panel_body}.form-control:-ms-input-placeholder{color:$color_letra_adaptado_a_fondo_panel_body}.form-control { color:$color_letra_adaptado_a_fondo_panel_body; }";
//Color para el texto dentro de los dropdown y su fondo
$css_custom .= "select option{background:$color_fondo_panel_input;color:$color_letra_adaptado_a_fondo_panel_body;text-shadow:0 1px 0 rgba(0,0,0,.4)}";

$respuesta = array('estatus_request' => 'success', 'respuesta_servidor' => $css_custom);

echo json_encode($respuesta);
?>
