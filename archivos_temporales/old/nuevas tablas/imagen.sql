-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2017 a las 17:09:41
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
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(10) UNSIGNED NOT NULL,
  `nombre_original` varchar(500) NOT NULL,
  `nombre_de_almacenado` varchar(500) NOT NULL,
  `extencion` varchar(10) NOT NULL,
  `tipo_almacenado` varchar(100) NOT NULL,
  `estatus` int(10) UNSIGNED NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `nombre_original`, `nombre_de_almacenado`, `extencion`, `tipo_almacenado`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES
(1, 'imageedit_1_8117031089.png', 'c9364b62541898f7bf6708e9bbcae49570f80bd877acde1f0af62c73663af803', 'png', 'local', 1, '2017-03-18 18:36:17', '2017-03-18 18:36:17'),
(2, 'imageedit_1_8117031089.png', 'f31258d9284c77c292451f42c754d3eba0f0e28a71071f2a75f201249031c8b8', 'png', 'local', 1, '2017-03-18 19:38:25', '2017-03-18 19:38:25'),
(3, 'Koala.jpg', 'd09ff32e1a7741adf45cd4cd2806a7187a7f330650b084aeb5d763e5a47e43da', 'jpg', 'local', 1, '2017-04-24 16:51:50', '2017-04-24 16:51:50'),
(4, 'Koala.jpg', '32d4d1bc777684e2b1c379f80cfe061a0e664b9be5e4debd64574de941c7bb5b', 'jpg', 'local', 1, '2017-05-02 18:01:19', '2017-05-02 18:01:19'),
(5, 'Penguins.jpg', '90ed4c9237a78b7c7f53b0b8759d9ad522c806c2f4a633594e80d3db0c552f07', 'jpg', 'local', 1, '2017-05-02 18:04:46', '2017-05-02 18:04:46'),
(6, 'Lighthouse.jpg', 'e6b7e49174bfaf44a26a2f09a8a6b220136ab928eef835e73d65ba50f86ae524', 'jpg', 'local', 1, '2017-05-02 18:05:45', '2017-05-02 18:05:45'),
(7, 'Tulips.jpg', '303a6b33b661b7fdcd7d34dc33ee53b083fc6d9c15cf93b07c02a59b9de6a644', 'jpg', 'local', 1, '2017-05-02 18:08:08', '2017-05-02 18:08:08'),
(8, 'Jellyfish.jpg', '4c5031cec2630fba2c05532d75a2ab9649e9e1da69bdc35b20d2c4c2c08b0565', 'jpg', 'local', 1, '2017-05-02 18:12:07', '2017-05-02 18:12:07'),
(9, 'Desert.jpg', '4f875f253633822dcc1f238c47df75666e0c46867e44daf754ab78c1a90f010e', 'jpg', 'local', 1, '2017-05-02 18:12:26', '2017-05-02 18:12:26'),
(10, 'Hydrangeas.jpg', '93d5367c1de8d99d50371202990399fc7b83dc3b7e382561afc992d76dfaae0d', 'jpg', 'local', 1, '2017-05-02 18:13:44', '2017-05-02 18:13:44'),
(11, 'Chrysanthemum.jpg', '56fc062581cb7c5f477ca97ea0070075d58afc81361e76fd8a260605b85d7ff4', 'jpg', 'local', 1, '2017-05-02 18:22:11', '2017-05-02 18:22:11'),
(12, 'Lighthouse.jpg', 'c207badb47e229d35f53d24fe8d83af84688a3849c7cdc28b6c8a2766ff4f651', 'jpg', 'local', 1, '2017-05-02 18:23:18', '2017-05-02 18:23:18'),
(13, 'jelousoft.jpg', '8b5fe3db53a688392a6c669ecb22d639d301441ab9a8d23404c72b4653d80aaa', 'jpg', 'local', 1, '2017-05-03 16:37:49', '2017-05-03 16:37:49'),
(14, 'jelousoft.jpg', '96ee16b67d93fcf7a4c027162c251b74aa7e7ad03e5f4d9c5983e1841851264d', 'jpg', 'local', 1, '2017-05-03 16:53:53', '2017-05-03 16:53:53'),
(15, 'Penguins.jpg', '5a344bc5b916d9f3020bc24d7b3ac178419630de8e3a1f0036705204fd27c24c', 'jpg', 'local', 1, '2017-05-03 17:00:33', '2017-05-03 17:00:33'),
(16, 'Chrysanthemum.jpg', '57d248b38b21d4f38201c4ce63da019e2164c1c2af67484166e27fed0b04f4d8', 'jpg', 'local', 1, '2017-05-03 17:02:18', '2017-05-03 17:02:18'),
(17, 'Koala.jpg', 'a232c46e28ce0eb296406393788dabc6beaab9a60f73984b1fc6eb3776d17d2c', 'jpg', 'local', 1, '2017-05-03 17:04:26', '2017-05-03 17:04:26'),
(18, 'ironmansloth.png', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/7e27c8c3f16ca1b004baf8bab7cd4253c15d7952a2da1136f33e5e8db3573796.png', 'png', 's3_public', 1, '2017-05-05 21:01:02', '2017-05-05 21:01:02'),
(19, 'sloth-3.jpg.662x0_q70_crop-scale.jpg', '0143cff5fd6ccafaac5677c1ff343ff6c70ebf4b739f21eb8ca2a4dc89a41ad4', 'jpg', 'local', 1, '2017-05-05 21:15:06', '2017-05-05 21:15:06'),
(20, 'Captura de pantalla_2017-05-02_11-06-43.png', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/7b37571486846432aeb923039e308a7e5466a30d6cab1dc3a2d22de1552ef860.png', 'png', 's3_public', 1, '2017-05-05 21:16:46', '2017-05-05 21:16:46'),
(21, '13697012_492974560913898_1873338316088675744_n.jpg', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/3d01003b97c7c5f3b43ddd14d359dc3028eac73d9192a4269aaac3498b45d922.jpg', 'jpg', 's3_public', 1, '2017-05-05 21:19:04', '2017-05-05 21:19:04'),
(22, 'sloth-3.jpg.662x0_q70_crop-scale.jpg', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/7e51fb45d2d0f2f3075c62e566572d7c3ae1f95e90daa23228f3ef95d62f5ad0.jpg', 'jpg', 's3_public', 1, '2017-05-05 21:31:54', '2017-05-05 21:31:54'),
(23, 'ironmansloth.png', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/607589c906e41256625049416589cd5ad5f5ba340df7bf499f60b74f82f8b693.png', 'png', 's3_public', 1, '2017-05-06 00:00:13', '2017-05-06 00:00:13'),
(24, 'Lighthouse.jpg', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/c65196923b7f4cc3e353a85f4c9fc8fdc95b5d86779612c8c779ffdf788cac68.jpg', 'jpg', 's3_public', 1, '2017-05-08 19:27:57', '2017-05-08 19:27:57'),
(25, 'Penguins.jpg', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/18bf5792d46cf9a1c834513c4a244240b690e384ee2381079ff36627ef9d9355.jpg', 'jpg', 's3_public', 1, '2017-05-08 19:28:11', '2017-05-08 19:28:11'),
(26, 'Penguins.jpg', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/41b0e809b454c8b2f0592117c34dfc38cbee7c695d51e8884095d336886597bb.jpg', 'jpg', 's3_public', 1, '2017-05-08 19:55:06', '2017-05-08 19:55:06'),
(27, 'Penguins.jpg', 'https://jelousoft.s3.eu-central-1.amazonaws.com/mezon/0/060c9ac881b123b25156f46518db163cbb7cb926a88fe62abaa8021d94fe5c95.jpg', 'jpg', 's3_public', 1, '2017-05-08 20:03:07', '2017-05-08 20:03:07'),
(28, '16473748_1811977822430159_817115036625551387_n.jpg', '8f23ac63c0cd0e528962457dce2aed490fd84c45a1e6dcd74ec6e62acb29b7af', 'jpg', 'local', 1, '2017-06-04 14:45:09', '2017-06-04 14:45:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
