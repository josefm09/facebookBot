-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2017 a las 17:10:15
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hackathon_cd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `prioridad` varchar(250) NOT NULL,
  `nombre_prioridad` varchar(100) NOT NULL,
  `nombre_en_vista` varchar(250) NOT NULL,
  `privilegio_administrativo` int(10) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`prioridad`, `nombre_prioridad`, `nombre_en_vista`, `privilegio_administrativo`, `fecha_creacion`, `ultima_modificacion`) VALUES
('2da0dd2b797124a6c0f201c8b8cd5c4a0aba540d56dd70993ca27b647b0098da', 'hackathon_administrativo', 'Personal administrativo', 2, '2017-05-15 18:33:33', '2017-06-03 17:35:41'),
('3b85bcf702a145831a33b14d3e0647c0ce30dc4fe2c78c20234c6616ab7e7df5', 'hackathon_master', 'Usuario master', 1, '2017-05-15 18:33:33', '2017-06-03 17:35:48'),
('6fb5c1153cda6716fb669fca860c3406c1ef477a74d67eb9d527c6deea105b51', 'hackathon_cliente', 'Cliente', 3, '2017-05-15 18:34:19', '2017-06-03 17:36:00'),
('ff9e23b37424aee60caa715cea42cb82c2089c0e66f6f2c5f5b4415a62f5224c', 'hackathon_empleadas', 'Mucamas', 3, '2017-05-15 18:34:50', '2017-06-03 17:36:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`prioridad`),
  ADD UNIQUE KEY `nombre_prioridad` (`nombre_prioridad`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
