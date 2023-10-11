-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-09-2013 a las 03:13:31
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `arrocera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--
create database arrocera;
use arrocera;

CREATE TABLE IF NOT EXISTS `cliente` (
  `cedula` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `localizacion` varchar(30) NOT NULL,
  `comentarios` varchar(30) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `cliente`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
  `ultimafecha` varchar(20) NOT NULL,
  `fechaprestamo` varchar(20) NOT NULL,
  `capitalprestado` bigint(20) NOT NULL,
  `interespactado` double NOT NULL,
  `capitalliquidacion` bigint(20) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `nomape` varchar(20) NOT NULL,
  `codprestam` int(11) NOT NULL DEFAULT '0',
  `fechaLiquidacion` varchar(20) NOT NULL,
  PRIMARY KEY (`codprestam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`ultimafecha`, `fechaprestamo`, `capitalprestado`, `interespactado`, `capitalliquidacion`, `estado`, `idCliente`, `nomape`, `codprestam`, `fechaLiquidacion`) VALUES
('2013/09/23', '2013/09/23', 10000000, 5, 10000000, 1, 1100688005, 'andres montaña revol', 0, '0000/00/00');
