-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2015 a las 19:48:09
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cart`
--
CREATE DATABASE IF NOT EXISTS `cart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cart`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id` int(11) NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pantalla` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ram` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `procesador` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `disco_duro` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double(11,0) NOT NULL,
  `opcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `valores` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `marca`, `pantalla`, `ram`, `procesador`, `disco_duro`, `precio`, `opcion`, `valores`, `imagen`) VALUES
(1, 'Walkera Scout - Helidroid', '1280x1240(HD)', '32 Gb', 'DEVO F12E', '32 Gb', 29590, 'color', 'blanco,negro', 'walkera-scout-x4-quad-1.jpg'),
(2, 'HELIDROID KB-1000', 'No Tiene', '32 GB', 'Quad- Copter KB-1000', '32 GB', 5999, 'color', 'blanco,negro', 'KB1000-4.jpg'),
(3, 'Walkera QR X350 PRO', '720x1280P(HD)', '32 Gb', 'DEVO F7', '32 Gb', 14490, 'color', 'blanco,negro', 'Walkera-QR-X350-PRO.jpg'),
(4, 'Walkera TALI H500', '1920x1080P(HD)', '32 Gb', 'DEVO F12e', '32 Gb', 33999, 'color', 'blanco,negro', 'Walkera-TALI-H500-RTF.jpg'),
(5, 'Walkera QR X800', '1920x1080P(HD)', '32 Gb', 'DEVO F12E', '32 Gb', 49999, 'color', 'blanco,negro', 'walkera-qr-x800.jpg'),
(6, 'Mini Drone Hubsan X4 H107C', 'Camara HD', 'No Tiene', 'No Tiene. A Radiocontrol', 'Por USB', 1590, 'color', 'blanco,negro,rojo,verde,azul', 'Hubsan_H107C.jpg'),
(7, 'Mini Drone Hubsan X4 H107D', 'FPV', 'No Tiene', 'No Tiene. A Radiocontrol', 'Por USB', 3490, 'color', 'blanco,negro,rosa', 'hubsan-x4-h107d.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `username`, `password`) VALUES
(11, 'Ivana', 'Curra', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(20, 'Marcos', 'Abel', 'Marcos', 'dfefdb66581190514404f57cdf74a8eb'),
(23, 'Andrea', 'Maubert', 'Andrea', '28f719c89ef7f33ce2e178490676b5ab');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
