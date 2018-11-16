-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2018 a las 21:35:34
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softicul`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invetario`
--

CREATE TABLE `invetario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descricion` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_item` int(11) NOT NULL,
  `asociacion` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invetario`
--

INSERT INTO `invetario` (`id`, `nombre`, `descricion`, `nota`, `foto`, `id_item`, `asociacion`, `fecha_registro`) VALUES
(1, 'a', 'a', 'a', '', 1, 0, '0000-00-00 00:00:00'),
(2, 'a', 'a', 'a', '', 1, 0, '0000-00-00 00:00:00'),
(3, 'a', 'a', 'a', '', 3, 0, '0000-00-00 00:00:00'),
(4, 'fecha', 'a', 'a', '', 1, 1, '2018-11-08 11:02:54'),
(5, 'a', 'a', 'a', '', 0, 1, '2018-11-08 11:03:21'),
(6, 'a', '1', '1', '', 1, 1, '2018-11-08 11:03:51'),
(7, 'a', 'a', 'a', '', 1, 1, '2018-11-08 11:04:13'),
(8, 'ssss', 'sss', 'sss', '', 3, 1, '2018-11-08 11:04:47'),
(9, 'mesa', 'laga', 'el lobo  esta', '', 3, 1, '2018-11-12 14:10:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `asociacion` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `nombre`, `estado`, `asociacion`, `fecha_registro`) VALUES
(1, '0', 1, 0, '0000-00-00 00:00:00'),
(2, '2', 0, 0, '0000-00-00 00:00:00'),
(3, '3', 1, 0, '0000-00-00 00:00:00'),
(4, '1', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `privilegio` int(2) NOT NULL,
  `asociacion` int(2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `apellido`, `password`, `privilegio`, `asociacion`, `fecha_registro`) VALUES
(1, 'adlay', 'adlay', 'cesar@eytoo.com', '1234', 1, 0, '2016-08-18 03:59:20'),
(2, 'Alan Mejia', 'ualan', 'cesar@eytoo.com', '1234', 2, 0, '2016-08-18 03:59:20'),
(5, 'Delectus fugit', 'uadmin', 'dyxisev@yahoo.com', 'Pa$$w0rd!', 2, 0, '2016-10-06 06:30:53'),
(6, 'alan', 'asdasd', 'alan@web.co', '12345', 2, 0, '2016-10-06 06:33:37'),
(7, 'Vsadsad', 'asdad', 'qusy@gmail.com', 'Pa$$w0rd!', 2, 0, '2016-10-06 06:34:30'),
(8, 'Alan Vidales', 'udev', 'avidal@dev.com', '1234', 2, 0, '2016-10-06 06:35:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `invetario`
--
ALTER TABLE `invetario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `invetario`
--
ALTER TABLE `invetario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
