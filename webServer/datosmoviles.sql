-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2015 a las 13:55:13
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `datosmoviles`
--
CREATE DATABASE IF NOT EXISTS `datosmoviles` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `datosmoviles`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registos`
--

DROP TABLE IF EXISTS `registos`;
CREATE TABLE IF NOT EXISTS `registos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idNick` varchar(100) NOT NULL,
  `longitud` varchar(100) NOT NULL,
  `latitud` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
