-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2017 a las 17:13:02
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
-- Estructura de tabla para la tabla `sub_temas`
--

CREATE TABLE `sub_temas` (
  `id_sub_tema` int(11) NOT NULL,
  `sub_tema` varchar(255) NOT NULL,
  `id_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sub_temas`
--

INSERT INTO `sub_temas` (`id_sub_tema`, `sub_tema`, `id_tema`) VALUES
(1, 'Los servicios públicos de aseo ', 1),
(2, 'Limpia de calles', 1),
(3, 'Pavimento de calles', 1),
(4, 'Limpia de parques', 1),
(5, 'Limpia de jardines  ', 1),
(6, 'Equipamiento ', 1),
(7, 'Panteones', 1),
(8, 'Comercio en la vía pública ', 1),
(9, 'Mercados', 1),
(10, 'Las obras públicas de interés general', 1),
(11, 'Construcción de infraestructura municipal y su mantenimiento', 1),
(12, 'La apertura de nuevas vialidades ', 1),
(13, 'La construcción de puentes peatonales', 1),
(14, 'Pasos a desnivel', 1),
(15, 'La civilidad ciudadana', 2),
(16, 'La prevención de accidentes de tránsito ', 2),
(17, 'La promoción, apoyo y a la prevención de enfermedades  ', 2),
(18, 'Fortalecimiento de la educación', 2),
(19, 'Respeto al Estado de Derecho, al bienestar y la paz social', 2),
(20, 'La información, y comunicación', 2),
(21, 'El impulso a las actividades productivas como el turismo ', 3),
(22, 'La agricultura ', 3),
(23, 'La pesca', 3),
(24, 'La caza ', 3),
(25, 'La acuacultura', 3),
(26, 'La industria', 3),
(27, 'El comercio de bienes y servicios', 3),
(28, 'La competitividad económica', 3),
(29, 'Fomento de la cultura y del deporte ', 4),
(30, 'La implementación de programas relativos a la protección de los derechos humanos', 4),
(31, 'La igualdad entre mujeres y  hombres', 4),
(32, 'Protección a la niñez, a la juventud, a las personas con discapacidad, a personas de la tercera edad, a migrantes, a jornaleras y jornaleros agrícolas', 4),
(33, 'Al respeto a la diversidad sexual', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sub_temas`
--
ALTER TABLE `sub_temas`
  ADD PRIMARY KEY (`id_sub_tema`),
  ADD KEY `fk_sub_temas_temas1_idx` (`id_tema`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sub_temas`
--
ALTER TABLE `sub_temas`
  MODIFY `id_sub_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sub_temas`
--
ALTER TABLE `sub_temas`
  ADD CONSTRAINT `fk_sub_temas_temas1` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
