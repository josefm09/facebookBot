-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2017 a las 19:21:13
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
-- Estructura de tabla para la tabla `configuracion_tipo`
--

CREATE TABLE `configuracion_tipo` (
  `id_configuracion_tipo` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `estatus` int(10) UNSIGNED NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion_tipo`
--

INSERT INTO `configuracion_tipo` (`id_configuracion_tipo`, `tipo`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES
(1, 'sistema', 1, '2017-03-07 11:20:19', '2017-03-07 11:20:19'),
(2, 'empresa_para_master', 1, '2017-03-07 11:20:19', '2017-03-07 11:21:06'),
(3, 'empresa_para_cliente', 1, '2017-03-07 11:20:45', '2017-03-07 11:20:45'),
(4, 'sucursal', 1, '2017-03-07 11:20:45', '2017-03-07 11:20:45'),
(5, 'usuario', 1, '2017-03-07 11:20:52', '2017-03-07 11:20:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion_tipo`
--
ALTER TABLE `configuracion_tipo`
  ADD PRIMARY KEY (`id_configuracion_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracion_tipo`
--
ALTER TABLE `configuracion_tipo`
  MODIFY `id_configuracion_tipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
