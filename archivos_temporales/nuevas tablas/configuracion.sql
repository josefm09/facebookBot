-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2017 a las 19:18:00
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mucaama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id_configuracion` int(10) UNSIGNED NOT NULL,
  `variable_de_configuracion` varchar(500) NOT NULL,
  `atributo_de_variable` varchar(500) NOT NULL,
  `id_configuracion_tipo` int(10) UNSIGNED NOT NULL,
  `estatus` int(10) UNSIGNED NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_configuracion`, `variable_de_configuracion`, `atributo_de_variable`, `id_configuracion_tipo`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES
(1, 'password_encrypt', 'true', 1, 1, '2017-03-09 05:22:05', '2017-03-09 05:22:05'),
(2, 'default_password', '123456789', 1, 1, '2017-03-09 05:22:05', '2017-03-09 17:38:38'),
(3, 'max_inactive_session_time', '3600', 1, 1, '2017-03-09 05:22:22', '2017-05-16 03:03:13'),
(4, 'color_panel', '#4A89A5', 5, 1, '2017-04-19 23:43:13', '2017-04-19 23:43:13'),
(5, 'color_button_primary', '#428bca', 5, 1, '2017-04-20 23:50:49', '2017-04-20 23:50:49'),
(6, 'color_button_success', '#5cb85c', 5, 1, '2017-04-20 23:50:49', '2017-04-20 23:50:49'),
(7, 'color_button_warning', '#f0ad4e', 5, 1, '2017-04-20 23:53:29', '2017-04-20 23:53:29'),
(8, 'color_texto_en_elementos', '#e8e5da', 5, 1, '2017-04-21 00:41:55', '2017-04-21 00:41:55'),
(9, 'fuente', '''Josefin Sans'', sans-serif', 5, 1, '2017-04-21 03:15:44', '2017-04-28 16:38:33'),
(10, 'color_fondo_panel', '#f5f5f5', 5, 1, '2017-04-21 05:18:50', '2017-04-21 05:18:50'),
(11, 'color_fondo_sistema', '#f5f5f5', 5, 1, '2017-04-21 05:18:50', '2017-04-21 05:18:50'),
(12, 'color_navbar', '#5cb85c', 5, 1, '2017-04-21 06:10:22', '2017-04-21 06:10:22'),
(19, 's3_bucket_name', 'jelousoft', 1, 1, '2017-05-06 09:00:21', '2017-05-06 09:00:21'),
(20, 's3_main_folder_name', 'mucaama', 1, 1, '2017-05-06 09:00:21', '2017-05-16 01:50:15'),
(21, 'directorio_local_imagenes', 'imagenes/aaa', 1, 1, '2017-05-06 09:00:49', '2017-05-06 09:00:49'),
(22, 'boolean_borrar_imagen_local_tras_subir_s3', 'true', 1, 1, '2017-05-06 09:00:49', '2017-05-06 09:00:49'),
(23, 'directorio_local_archivos', 'archivos', 1, 1, '2017-05-08 23:02:49', '2017-05-08 23:02:49');

--
-- Disparadores `configuracion`
--
DELIMITER $$
CREATE TRIGGER `agregar_configuraciones_nueva_instancia` AFTER INSERT ON `configuracion` FOR EACH ROW BEGIN

   

   
   IF(NEW.id_configuracion_tipo != 1) THEN

     CASE
       WHEN NEW.id_configuracion_tipo = 5  THEN          INSERT INTO configuracion_usuario (`id_configuracion`, `id_usuario`, `atributo_de_variable`, `estatus`, `fecha_creacion`, `ultima_modificacion`) SELECT NEW.id_configuracion, `id_usuario`, NEW.atributo_de_variable, 1, NOW(), NOW() FROM `usuario`;
     END CASE;

   END IF;

 END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id_configuracion`),
  ADD KEY `fk_configuracion_tipo` (`id_configuracion_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id_configuracion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD CONSTRAINT `fk_configuracion_tipo` FOREIGN KEY (`id_configuracion_tipo`) REFERENCES `configuracion_tipo` (`id_configuracion_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
