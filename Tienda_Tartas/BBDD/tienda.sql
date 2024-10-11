-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 13:28:34
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `precio` double(5,2) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `imagen`, `precio`, `descripcion`) VALUES
(1, 'God of War Ragnarok', 'https://cdn.atomix.vg/wp-content/uploads/2022/11/Review-God-of-War-Ragnarok.jpg', 59.99, 'Atreus es loki :0'),
(2, 'Grand Theft Auto V', 'https://i.ebayimg.com/images/g/L8sAAOSwjyJhw-hx/s-l400.jpg', 64.99, 'La historia del anterior estuvo mejor.'),
(3, 'Red Dead Redemption 2', 'https://egoamo.co.za/cdn/shop/files/RDRIIOutlawsforLife_300x300.jpg?v=1700257738', 59.99, 'Historia digna de un Oscar.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tartas`
--

CREATE TABLE `tartas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tartas`
--

INSERT INTO `tartas` (`id`, `nombre`, `imagen`, `descripcion`, `precio`) VALUES
(1, 'Tarta de Selva Negra', 'https://cositasguenas.es/cdn/shop/products/tarta-selva-negra-555888_2048x.jpg?v=1607028297', 'Una deliciosa tarta con chocolate.', 39.99),
(2, 'Tarta de Maracuya', 'https://pandelino.es/4055-large_default/tarta-de-maracuya.jpg', 'Está deliciosa! Dadle una probadita.', 29.99);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tartas`
--
ALTER TABLE `tartas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tartas`
--
ALTER TABLE `tartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
