-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2017 at 12:55 AM
-- Server version: 5.6.35-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Hackathon_cd`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_request`
--

CREATE TABLE IF NOT EXISTS `audit_request` (
  `id_audit_request` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `json_recibido` mediumtext NOT NULL,
  `json_repuesta` mediumtext,
  `mb_usados` varchar(25) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_audit_request`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `audit_request`
--

INSERT INTO `audit_request` (`id_audit_request`, `json_recibido`, `json_repuesta`, `mb_usados`, `fecha_creacion`, `ultima_modificacion`) VALUES
(1, 'cosa', 'algo', '0.233818054199', '2017-06-04 06:18:32', '2017-06-04 06:18:32'),
(2, 'cosa', 'algo', '0.233856201172', '2017-06-04 06:35:25', '2017-06-04 06:35:25'),
(3, 'cosa', 'algo', '0.227981567383', '2017-06-04 06:35:55', '2017-06-04 06:35:55'),
(4, 'cosa', 'algo', '0.227981567383', '2017-06-04 06:36:46', '2017-06-04 06:36:46'),
(5, 'cosa', 'algo', '0.227981567383', '2017-06-04 06:38:08', '2017-06-04 06:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `ciudadano`
--

CREATE TABLE IF NOT EXISTS `ciudadano` (
  `id_ciudadano` int(20) unsigned NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ciudadano`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ciudadano_correo_electronico`
--

CREATE TABLE IF NOT EXISTS `ciudadano_correo_electronico` (
  `id_ciudadano_correo_electronico` int(10) NOT NULL AUTO_INCREMENT,
  `id_ciudadano` varchar(75) NOT NULL,
  `id_correo_electronico` int(20) unsigned NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ciudadano_correo_electronico`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ciudadano_telefono`
--

CREATE TABLE IF NOT EXISTS `ciudadano_telefono` (
  `id_ciudadano_telefono` int(10) NOT NULL AUTO_INCREMENT,
  `id_ciudadano` int(20) NOT NULL,
  `id_telefono` int(10) unsigned NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ciudadano_telefono`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `correo_electronico`
--

CREATE TABLE IF NOT EXISTS `correo_electronico` (
  `id_correo_electronico` int(10) NOT NULL AUTO_INCREMENT,
  `correo_electronico` varchar(75) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_correo_electronico`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log_peticiones`
--

CREATE TABLE IF NOT EXISTS `log_peticiones` (
  `id_log_peticiones` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(20) NOT NULL,
  `ultimo_request` varchar(25) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log_peticiones`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `log_peticiones`
--

INSERT INTO `log_peticiones` (`id_log_peticiones`, `id_cliente`, `ultimo_request`, `estatus`, `fecha_creacion`, `ultima_modificacion`) VALUES
(1, '1', 'algo', 1, '2017-06-04 06:54:20', '2017-06-04 06:54:20'),
(2, '1681399951877822', 'nothing', 1, '2017-06-04 06:55:06', '2017-06-04 06:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `propuesta`
--

CREATE TABLE IF NOT EXISTS `propuesta` (
  `id_propuesta` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(75) NOT NULL,
  `problematica` varchar(255) NOT NULL,
  `solucion` varchar(255) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_propuesta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `propuesta_comentario_ciudadano`
--

CREATE TABLE IF NOT EXISTS `propuesta_comentario_ciudadano` (
  `id_propuesta_comentario_ciudadano` int(10) NOT NULL AUTO_INCREMENT,
  `id_propuesta` int(10) NOT NULL,
  `id_ciudadano` int(10) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_propuesta_comentario_ciudadano`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `propuesta_imagen`
--

CREATE TABLE IF NOT EXISTS `propuesta_imagen` (
  `id_propuesta_imagen` int(10) NOT NULL AUTO_INCREMENT,
  `id_propuesta` varchar(75) NOT NULL,
  `id_imagen` varchar(255) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_propuesta_imagen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `propuesta_subtema`
--

CREATE TABLE IF NOT EXISTS `propuesta_subtema` (
  `id_propuesta_subtema` int(10) NOT NULL AUTO_INCREMENT,
  `id_propuesta` int(10) NOT NULL,
  `id_subtema` int(10) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_propuesta_subtema`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `propuesta_tema`
--

CREATE TABLE IF NOT EXISTS `propuesta_tema` (
  `id_propuesta_tema` int(10) NOT NULL AUTO_INCREMENT,
  `id_propuesta` varchar(75) NOT NULL,
  `id_tema` varchar(255) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_propuesta_tema`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `propuesta_votacion_ciudadano`
--

CREATE TABLE IF NOT EXISTS `propuesta_votacion_ciudadano` (
  `id_propuesta_votacion_ciudadano` int(10) NOT NULL AUTO_INCREMENT,
  `id_propuesta` int(10) NOT NULL,
  `id_ciudadano` int(10) NOT NULL,
  `votacion` varchar(255) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_propuesta_votacion_ciudadano`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `telefono`
--

CREATE TABLE IF NOT EXISTS `telefono` (
  `id_telefono` int(10) NOT NULL AUTO_INCREMENT,
  `telefono` varchar(75) NOT NULL,
  `estatus` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_telefono`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
