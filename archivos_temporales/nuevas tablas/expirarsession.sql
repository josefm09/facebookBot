-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2017 a las 17:09:08
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
-- Estructura de tabla para la tabla `expirarsession`
--

CREATE TABLE `expirarsession` (
  `idexpiracion` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `ip` varchar(150) NOT NULL,
  `session_token` varchar(150) NOT NULL,
  `user_agent` varchar(500) NOT NULL,
  `browser` varchar(150) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `expirarsession`
--

INSERT INTO `expirarsession` (`idexpiracion`, `id_usuario`, `ip`, `session_token`, `user_agent`, `browser`, `timestamp`, `inicio`) VALUES
(1, 1, '::1', 'cd912cccbdd0eb00e72bb70aa42a52d2859e8b8a', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488918754, '2017-03-07 20:32:33'),
(2, 1, '::1', '64c5ead8b5345f046a9110792fed853e21fdc72d', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488918786, '2017-03-07 20:33:05'),
(3, 1, '::1', '2c318c2198a6b70b01f3c24f6664574c34c7faa8', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488918862, '2017-03-07 20:34:05'),
(4, 1, '::1', '04f2de7be84908d7c99db513845be32a18de16ee', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488922613, '2017-03-07 20:38:58'),
(5, 1, '::1', '808af0fac5a371e200d73957fda383a0e3ec42f4', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488922848, '2017-03-07 21:38:35'),
(6, 1, '::1', 'e2531aea07b7466fb7d1b294e37089e456bb4ef9', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488923862, '2017-03-07 21:41:10'),
(7, 1, '::1', '065f8baa2f71c162b628f0272f0d98db30d79df9', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488924094, '2017-03-07 22:01:27'),
(8, 1, '::1', '55592d8e61c937a1f20d0c99a0f276b443ac3c7e', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488924137, '2017-03-07 22:01:46'),
(9, 1, '::1', '8293f19c94aa94dbe08a47e199b91aefc1c87427', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488924143, '2017-03-07 22:02:23'),
(10, 1, '::1', 'a34d8b749690badb670b072a0dec6d4b1215fb20', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488930776, '2017-03-07 23:22:06'),
(11, 1, '::1', '16f2526ffd99651f9f6d12399b687aa6f6e5ac5e', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488930809, '2017-03-07 23:53:10'),
(12, 1, '::1', 'e1a7ab85765bbf5e71ceff2457f27d25cc393d0d', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488998922, '2017-03-08 18:48:27'),
(13, 1, '::1', '35b415d30b886562b45a55554007a872ec63da18', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488998941, '2017-03-08 18:48:54'),
(14, 1, '::1', '6e9f2991b69250321e775da319a67e90e779f1da', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1488998948, '2017-03-08 18:49:07'),
(15, 1, '::1', 'b99fb6b9e60076e5374e319cfd8bb72a6385eb3e', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489002011, '2017-03-08 19:40:04'),
(16, 1, '::1', 'd654432ae3f97c621908c2cbcbff0f83250ed7bc', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489002172, '2017-03-08 19:40:21'),
(17, 1, '::1', '362bb7aa66b801b2f3b00de665ffa0b01fb488b9', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489002179, '2017-03-08 19:42:59'),
(18, 1, '::1', 'e6a52e35fee596349a147f5770750418d25118d3', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489005504, '2017-03-08 20:38:10'),
(19, 1, '::1', '6a1aecc9ac63bed8900127d21bf09e34d2971096', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489005622, '2017-03-08 20:39:08'),
(20, 1, '::1', '054b26ecbb785cceb174b0a503a231cc3aea0202', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489005637, '2017-03-08 20:40:29'),
(21, 1, '::1', '5331383ad4f77d25e08d08fd12644c88c85600c9', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489005833, '2017-03-08 20:43:52'),
(22, 1, '::1', 'b5a5bbebe947c5bd131ec4d79bcd9cb496183484', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489005913, '2017-03-08 20:44:27'),
(23, 1, '::1', '7d2806039efd59885200e62929759745b25960ee', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489007263, '2017-03-08 21:07:30'),
(24, 1, '::1', 'cea9cbc66fc0850729276095f7924e29fb86fa2a', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489099921, '2017-03-09 22:52:00'),
(25, 1, '::1', '17918c43fcdcae05db9206d1c5224f34728bb22f', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489168608, '2017-03-10 17:56:30'),
(26, 1, '::1', '34597bbfcb644171debcea08934203ac4cc8bd8d', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489620735, '2017-03-15 23:30:21'),
(27, 1, '::1', '47f90a428e0843cad53bfa03ed2d828369cda427', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489708739, '2017-03-16 23:58:59'),
(28, 1, '::1', 'd2cf327b2c8df4cb028440e9d2674314e0d7af63', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489710556, '2017-03-17 00:28:57'),
(29, 1, '::1', '84c3115df319dad572195da0128e156bf3aa13a8', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489791362, '2017-03-17 22:53:09'),
(30, 1, '::1', '0a8549b6729453e0fb2f2f9ed66d187703f4303e', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489792877, '2017-03-17 23:21:16'),
(31, 1, '::1', '069cd1dfe5b82349ffed4811179d7501afd37d91', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1489866189, '2017-03-18 18:35:51'),
(32, 1, '::1', '78cf05e051356c2d2b8195fd8c343c8232833e92', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1490144104, '2017-03-22 00:54:38'),
(33, 1, '::1', '3a106c7c2933ce53bd0e7ba75d48733050731b23', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1490144108, '2017-03-22 00:55:08'),
(34, 1, '::1', '813fa23e661285a592a89e56f9bcd03bb7d51d98', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1490398813, '2017-03-24 23:37:33'),
(35, 3, '::1', '1b4ce1f7bb19126902285c09a909698e2eb28d1b', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1490398916, '2017-03-24 23:41:55'),
(36, 1, '::1', '10e773751d65d04445410f33a70a1c438b0942cc', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'Chrome', 1490474121, '2017-03-25 20:15:20'),
(37, 1, '::1', 'cbb009eff8c8c4b71f142573cde6e80141ffc156', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492537302, '2017-04-18 17:30:19'),
(38, 1, '::1', '609e15cca6bd97226d8e1d32ef9ff50085f6b48e', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492550950, '2017-04-18 20:05:31'),
(39, 1, '::1', '84b073ed9384719647aa9d920cff2d043aacb1c5', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492554590, '2017-04-18 21:32:19'),
(40, 1, '::1', '26f8af1bdbea9bfc80f07692a300293d52cd479d', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492569156, '2017-04-19 02:32:12'),
(41, 1, '::1', '0def3ea4c6318772a08212ae3a0ef28ded8d02af', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492649210, '2017-04-19 16:29:25'),
(42, 1, '::1', 'b9f24ef7e0b44928a84b1b427dcc86e4ec49de3d', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492659722, '2017-04-20 03:35:05'),
(43, 1, '::1', '64a4341989fb7633179c0d5ab745c9ffae1d8ded', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492712072, '2017-04-20 16:30:32'),
(44, 1, '::1', '0c978311e892fb28345b25686309a7adc4886027', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492715100, '2017-04-20 18:15:34'),
(45, 1, '::1', 'f25bcb643e1d6468eb97d383fd5197aaa1f73718', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1492720316, '2017-04-20 19:12:13'),
(46, 1, '::1', 'dac607afe0739e50f4b510bf9db22939e79916be', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493052759, '2017-04-24 16:16:42'),
(47, 16, '::1', '72c1db9205413c6140eee8a1674f3e13419c87b2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493057575, '2017-04-24 16:52:57'),
(48, 1, '::1', '5118e39a96b60d62253fb686aaccfa2989a30897', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493069225, '2017-04-24 21:15:16'),
(49, 1, '::1', '7d23cf3ffc358df2c2db706b853fb9e4580e3b3e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493075924, '2017-04-24 22:27:27'),
(50, 1, '::1', '2caae10ab00219805c9b2265dcaf3cb9bfbb6703', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493082115, '2017-04-25 00:56:54'),
(51, 16, '::1', '2b1113b7e7a471974dc00be20b90b2bff2b15ca7', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493137147, '2017-04-25 16:18:38'),
(52, 1, '127.0.0.1', 'd17214761e9926b5b1923ff2e080e5b2295c1ce0', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1493251255, '2017-04-26 21:39:26'),
(53, 1, '127.0.0.1', 'dcffdc6abccfd1336bed49bc54c05d17f5371131', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1493310419, '2017-04-27 16:26:58'),
(54, 1, '127.0.0.1', '722b9f56382445e26ebf2497b51575255af35096', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1493314494, '2017-04-27 16:36:36'),
(55, 1, '127.0.0.1', '9cf741ef8f7f45de4c5eeef383046e5f3d234532', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1493319021, '2017-04-27 18:50:20'),
(56, 1, '127.0.0.1', '49dfb9c32a3a3144715fd6f23c564e465a2fdf09', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1493325984, '2017-04-27 20:46:21'),
(57, 1, '127.0.0.1', 'acd3711da81faa95265a943ad38ab58883ba8aa8', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1493397384, '2017-04-28 16:05:03'),
(58, 16, '::1', '2f1284ce25c7c99d5ac58d177a93ed875335002f', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493224553, '2017-04-26 16:35:51'),
(59, 16, '::1', 'e943833bdac682ec49398ee60ebf7debedbff84c', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493427661, '2017-04-28 23:07:05'),
(60, 16, '::1', '4915b9928ad9bdea2746c233c7c4435f3000b664', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493428194, '2017-04-29 01:02:42'),
(61, 16, '::1', 'ee5c297c356d9ee94c2517acd12477366cae54f2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493428443, '2017-04-29 01:10:12'),
(62, 16, '::1', '6be90624ca8301b128d79f545ad2b8b74521511f', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493429203, '2017-04-29 01:14:14'),
(63, 1, '::1', '38422fd74a2f29929c25738eb0018806bd03f106', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493746430, '2017-05-02 17:08:43'),
(64, 16, '::1', '7bbbd6e629b0ae881cbce3cc8df9cc48d1bf71a4', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493749398, '2017-05-02 17:33:59'),
(65, 16, '::1', '7db19318f5ea6e13cf8735af41c8a6a49e47ba79', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1493833811, '2017-05-03 16:28:56'),
(66, 1, '127.0.0.1', '9bd08abb1bef4c3d7a3c363e7fd5fa1ed9664e65', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1493858755, '2017-05-03 23:51:42'),
(67, 1, '127.0.0.1', '96cd2754e26f7e8b568047cc17cdd083c4882eb2', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1494019144, '2017-05-05 20:57:30'),
(68, 1, '127.0.0.1', '4174c420714308194d3d6b1f93f50b764e643295', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1494020863, '2017-05-05 21:23:34'),
(69, 1, '127.0.0.1', 'db49d250da65df801980577192e5926365509406', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1494031636, '2017-05-05 23:51:29'),
(70, 1, '127.0.0.1', '1b5018591a049cd1dc957f97107be5001b785e06', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1494091496, '2017-05-06 16:45:18'),
(71, 1, '127.0.0.1', 'f114a2fd39a78f1257c9c6882acee8d5cc39b75c', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:53.0) Gecko/20100101 Firefox/53.0', 'Firefox', 1494091501, '2017-05-06 17:25:00'),
(72, 1, '127.0.0.1', '82e4de9366fdbe2a6f3f5f59bb94f2190a305b78', 'Mozilla/5.0 (Linux; U; Android 4.4.4; Nexus 5 Build/KTU84P) AppleWebkit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30', 'Safari', 1494092149, '2017-05-06 17:28:08'),
(73, 1, '127.0.0.1', '5d1a3743652963fa7c4934fdad6d3bbdc6b8152e', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494100658, '2017-05-06 19:54:04'),
(74, 1, '127.0.0.1', '7d7db347c053192aa43cdc5b4f7c38a3a6cc717a', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494263428, '2017-05-08 17:10:27'),
(75, 1, '127.0.0.1', '8ae3e3b3e9ca9d66ecde5c5d10c8a10db5e3ead1', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494275561, '2017-05-08 20:27:26'),
(76, 20, '127.0.0.1', 'd255adcefeee55cd7453c8cb217781a787b48a88', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494276042, '2017-05-08 20:32:48'),
(77, 1, '127.0.0.1', '534aee7c888aeab9de60d0e45f2786c64954ec96', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494366182, '2017-05-09 20:43:02'),
(78, 1, '127.0.0.1', '0f5531ddfe44813f238d294a6bc6a4bfb5da2d72', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494371804, '2017-05-09 23:16:40'),
(79, 4, '::1', '7e7045d961255bd20ab8ac0eb913f790b7126ca7', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1494544125, '2017-05-11 21:17:12'),
(80, 4, '::1', '11aacb9e98196d79c0d60b11a66d82c0593d2923', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1494549281, '2017-05-11 23:08:59'),
(81, 4, '::1', '9cf4fb6b391becc5a956f2a0d8f5bdbb29109ca2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1494550541, '2017-05-12 00:35:03'),
(82, 4, '::1', 'ba1d85de389bdbf666a38040d2c3bd62c0b4aa92', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1494551661, '2017-05-12 01:13:56'),
(83, 4, '::1', 'f83d4653cfc733660f06a8cca240d3717e5fceb6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1494610348, '2017-05-12 15:51:32'),
(84, 4, '::1', '38aa7c66d907a509abcfb733574ac5a6952106a9', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Chrome', 1494616531, '2017-05-12 19:14:17'),
(85, 1, '127.0.0.1', 'c1011df47070389bfd80d2947a1491452ea09922', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494866063, '2017-05-15 16:34:22'),
(86, 1, '127.0.0.1', '1fae8ddfad8db5c23c9c0225095089ec22155469', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494870148, '2017-05-15 17:42:27'),
(87, 1, '127.0.0.1', '2aced49a723b3de1d86474aa994530432ce13b82', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494873304, '2017-05-15 18:05:53'),
(88, 1, '127.0.0.1', 'df1fadb2902df7560d562e85e9a003739b697002', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494874863, '2017-05-15 19:01:03'),
(89, 1, '127.0.0.1', '951e9d1a499813393af2392107ab0d52dfc28c95', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494875056, '2017-05-15 19:01:41'),
(90, 1, '127.0.0.1', '01e2ec4f2a1d1badbcea5dcf085491ffa91cd1fb', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494875089, '2017-05-15 19:04:31'),
(91, 1, '127.0.0.1', '25a43c3658da5b6ea4d038b4116f9cba9e6aebe8', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494877206, '2017-05-15 19:05:24'),
(92, 1, '127.0.0.1', '64d0f33210f125ac0595cc9aa7b556534e73faff', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494879408, '2017-05-15 19:56:35'),
(93, 1, '127.0.0.1', '2e7c00a1f08d862cb530e48f87ca1c013a4db80b', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494880193, '2017-05-15 20:28:16'),
(94, 1, '127.0.0.1', '1aeb10cb8296a757398a034a17f03b42cd7a394a', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494882169, '2017-05-15 20:45:09'),
(95, 1, '127.0.0.1', '349133e6b920c930e3d474f510005851f5bfe102', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494883574, '2017-05-15 21:03:02'),
(96, 21, '127.0.0.1', '0ab0ac4ca50432bb02e43fdadfbf8851fa04b268', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494883826, '2017-05-15 21:30:17'),
(97, 21, '127.0.0.1', 'a49f074903b696b03d019c6c8398a67992f362bb', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494883871, '2017-05-15 21:31:06'),
(98, 1, '127.0.0.1', '2968c7a495877aa88e536bcfd9a31654b12cb29d', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494883917, '2017-05-15 21:31:21'),
(99, 1, '127.0.0.1', '00fdeee5e0a3edafbfe8e4eedb95baa134ed327e', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494885577, '2017-05-15 21:59:36'),
(100, 21, '127.0.0.1', '7ee4777098869acdb54968b7ce7f1cf62b5a0f7e', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494885588, '2017-05-15 21:59:47'),
(101, 1, '127.0.0.1', 'abff2dcfbe31415d201e0eda02346ea70c1ec51e', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494885640, '2017-05-15 22:00:27'),
(102, 1, '127.0.0.1', '6b4f5f0f480e0a86d932368f85da5a38ebdb0673', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494886656, '2017-05-15 22:00:48'),
(103, 23, '127.0.0.1', '5738901801b666fb19888c23e635370058a11d64', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494886683, '2017-05-15 22:17:46'),
(104, 1, '127.0.0.1', '6b398095f9174f267cab2727c3ef819573010c11', 'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.04', 'Firefox', 1494892645, '2017-05-15 22:18:10'),
(105, 1, '::1', '4e8689be6a4f4bd6a5e641b7e76a138cb8799f4d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495170691, '2017-05-19 03:43:11'),
(106, 1, '::1', 'f9199ac2892e63adfdc5d50f1686eda3c3ef14da', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495171645, '2017-05-19 05:21:54'),
(107, 1, '::1', 'd850b4e8eea25e08c5a6c2c90edd5264e5cd3bfa', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495172248, '2017-05-19 05:35:36'),
(108, 1, '::1', '9c625d85d6871564e402fbc7eda0e276ed96e36f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495251118, '2017-05-20 02:47:05'),
(109, 1, '::1', 'd5635bb9d4548358a010f38c1d3a06a399235eb0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495342039, '2017-05-21 04:47:14'),
(110, 1, '::1', '1b8009bb71ac65bd697949f6b98ce5f6472d012d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495347446, '2017-05-21 04:47:29'),
(111, 1, '::1', 'b11dd26721fe10a04ae97970e21c1fdac1f9e32f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495387374, '2017-05-21 16:59:40'),
(112, 1, '::1', 'efa8f977810568a91797d275cee1675180264d06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495420725, '2017-05-21 23:57:48'),
(113, 1, '::1', '13e5a3b98a0474d0f3bb285ffc14354e1cd54959', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495436847, '2017-05-22 03:47:21'),
(114, 1, '::1', '1b970cba28b718d0abce8b16678d3544cc5b5ca3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495509921, '2017-05-23 01:38:09'),
(115, 1, '::1', 'bcc531b8303df0cd924f8a4aec0def46dc00b834', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495520702, '2017-05-23 03:26:13'),
(116, 1, '::1', 'e58e96f0d63842f633fd44bafb235376d34211ad', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495614175, '2017-05-24 03:41:42'),
(117, 1, '::1', '3ca34b0b51c461f14cb2f71fe6cfca023e2d5954', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495762373, '2017-05-26 01:21:09'),
(118, 1, '::1', '250e93f3f2791a40780ba7a3519b27903e634727', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1495778150, '2017-05-26 05:38:33'),
(119, 1, '::1', '9d75b780f3e0cdd20368d666bf1dbe1f07a8fe9f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1496508988, '2017-06-03 15:48:27'),
(120, 1, '::1', 'a5f3facade726c97db8629738db0fa7609120051', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1496513852, '2017-06-03 17:46:29'),
(121, 1, '::1', 'db5b589404da5ff731dbd2defb78f28b32159fa6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1496544284, '2017-06-04 02:38:39'),
(122, 1, '::1', '4ad68194253e44b868444d52289ada62c517dea3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1496552857, '2017-06-04 04:06:31'),
(123, 1, '::1', 'ae63ee8d4ea7acee18370bc3bf805db7ab15f96c', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1496555090, '2017-06-04 05:08:27'),
(124, 1, '::1', 'b5965dd34ca19758314c449831780edfff21be24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1496561368, '2017-06-04 07:09:11'),
(125, 1, '::1', 'e031e473d7de10dc69bd78ee4aa31e4912be3c62', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Chrome', 1496587512, '2017-06-04 14:44:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `expirarsession`
--
ALTER TABLE `expirarsession`
  ADD PRIMARY KEY (`idexpiracion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `expirarsession`
--
ALTER TABLE `expirarsession`
  MODIFY `idexpiracion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
