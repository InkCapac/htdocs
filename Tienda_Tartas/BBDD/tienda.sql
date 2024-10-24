-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 19:05:34
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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `id_producto`, `nombre`, `cantidad`, `precio`) VALUES
(1, 1, 'Tarta de Queso Original', 1, 39.99),
(2, 1, 'Tarta de Queso Original', 1, 39.99),
(3, 2, 'Tarta de Nutella', 1, 29.99),
(4, 2, 'Tarta de Nutella', 1, 29.99),
(5, 3, 'Tarta de Pistacho', 1, 39.99),
(6, 2, 'Tarta de Nutella', 1, 29.99),
(7, 1, 'Tarta de Queso Original', 1, 39.99),
(8, 1, 'Tarta de Queso Original', 1, 39.99),
(9, 1, 'Tarta de Queso Original', 1, 39.99),
(10, 1, 'Tarta de Queso Original', 1, 39.99),
(11, 1, 'Tarta de Queso Original', 1, 39.99),
(12, 2, 'Tarta de Nutella', 1, 29.99),
(13, 2, 'Tarta de Nutella', 1, 29.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `nombre`, `imagen`, `precio`, `descripcion`) VALUES
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
  `imagen` varchar(500) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `alergenos` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tartas`
--

INSERT INTO `tartas` (`id`, `nombre`, `imagen`, `descripcion`, `precio`, `alergenos`) VALUES
(1, 'Tarta de Queso Original', 'https://imag.bonviveur.com/tarta-de-queso-la-vina.jpg', 'Una deliciosa tarta con queso.', 39.99, 'GG'),
(2, 'Tarta de Nutella', 'https://lacocinadefrabisa.lavozdegalicia.es/wp-content/uploads/2015/03/Tarta-queso-nutella-.jpg', 'Una tarta que conquistará tu corazón.', 29.99, 'GG'),
(3, 'Tarta de Pistacho', 'https://www.fresondepalos.es/wp-content/uploads/2020/04/Tarta-de-Pistacho_FdP.jpg', 'Una deliciosa tarta hecha con pistacho :).', 39.99, 'GG'),
(4, 'Tarta de Dulce de leche', 'https://lacocinadefrabisa.lavozdegalicia.es/wp-content/uploads/2017/06/tarta-queso-dulce-de-leche-4jpg.jpg', 'Una rica tarta.', 29.99, 'GG'),
(5, 'Tarta de Lotus', 'https://www.recetasderechupete.com/wp-content/uploads/2024/04/Tarta-Lotus-paso-18-1200x668.png', 'Una rica tarta de Lotus.', 34.99, 'No sé'),
(6, 'Tarta de Maracuya', 'https://pandelino.es/4055-large_default/tarta-de-maracuya.jpg', 'Una rica tarta de Maracuya.', 29.99, 'No sé.'),
(7, 'Tarta de Fresa', 'https://scontent-dfw5-1.cdninstagram.com/v/t51.29350-15/461806833_880765633987810_2360435985379839187_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=18de74&_nc_ohc=hkTlA2PJiYUQ7kNvgGU7G2K&_nc_ht=scontent-dfw5-1.cdninstagram.com&edm=AL-3X8kEAAAA&_nc_gid=Az03C-sb8vWphtKqwRLQGpM&oh=00_AYCvRbq8Hsu-6jX7IADBfZYdHrnsEL4_jwnClP1xL40amQ&oe=6715DD3E', 'Una rica tarta de Fresa.', 34.99, 'No sé.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tartas`
--
ALTER TABLE `tartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tartas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
