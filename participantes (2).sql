-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2025 a las 15:07:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `numero_entrada` varchar(50) DEFAULT NULL,
  `dni` int(11) NOT NULL,
  `colegio` text NOT NULL,
  `forma_pago` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id`, `nombre`, `apellido`, `numero_entrada`, `dni`, `colegio`, `forma_pago`) VALUES
(28, 'Julio', 'Gonzalez', '3', 33333333, 'Pompeya', 'opcion1'),
(31, 'Benjamin', 'Lopez', '73', 22222111, 'Media 3', 'Tarjeta'),
(33, 'Benjamin', 'Lopez', '74', 22222111, 'Media 3', 'Efectivo'),
(34, 'Tomás', 'Fuhr', '7', 67456345, 'La Piedad', 'Efectivo'),
(35, 'Tomás', 'Fuhr', '733', 67456345, 'La Piedad', 'Efectivo'),
(36, 'Tomás', 'Fuhr', '7334', 67456345, 'La Piedad', 'Efectivo'),
(38, 'Tomás', 'Fuhrdsg', '34', 67456345, 'La Piedaddsg', 'Tarjeta'),
(39, 'Franco', 'Gimenez', '666', 45678000, 'Marina copa', 'Efectivo'),
(40, 'jeremias', 'huhhh', '675', 67456856, 'hola123', 'Efectivo'),
(41, 'hihiffdh', 'hfghgfh', '897', 67676767, 'jiji', 'Efectivo'),
(42, '', '', '', 0, '', ''),
(43, 'adolfo', 'gustof', '89', 56222178, 'vms', 'Efectivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_entrada` (`numero_entrada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
