-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2016 a las 21:16:40
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `nombre` char(50) NOT NULL,
  `apellido` char(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` char(10) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`nombre`, `apellido`, `email`, `telefono`, `direccion`, `usuario`, `contrasena`) VALUES
('Zafiro', 'BOrja', 'zaf@hotmail.com', '0987654321', '', 'zafba', 'asdfg'),
('Jessica', 'Arciniega', 'brigatita1795@hotmail.com', '0999004793', 'Av. eloy alfaro', 'Brizita1908', 'Briza'),
('Jess', 'Arci', 'briza@hotmail.com', '0987656789', '', 'jessy.a', 'asdfg'),
('Briza', 'Arci', 'brig@hotmail.com', '0987654356', '', 'brizaf', 'zxcvb');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
