-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2024 a las 14:06:00
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
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id`, `nombre`, `imagen`, `precio`, `descripcion`) VALUES
(1, 'Dragon Ball Sparking Zero', 'https://m.media-amazon.com/images/I/81ivHwA2ZpL._AC_UF1000,1000_QL80_.jpg', 69.99, 'Buy it now!'),
(2, 'Grand Theft Auto V', 'https://m.media-amazon.com/images/I/81W+fYqjU0L._AC_UF1000,1000_QL80_.jpg', 59.99, 'There are no hackers on console.'),
(3, 'Astrobot', 'https://m.media-amazon.com/images/I/71rClGS09QL._AC_UF894,1000_QL80_.jpg', 59.99, 'Tribute to PS'),
(4, 'Black Myth Wukong', 'https://m.media-amazon.com/images/I/814doRZjgML._AC_UF894,1000_QL80_.jpg', 59.99, 'GOTY or not GOTY.'),
(5, 'EA Sports FC 25', 'https://i.ebayimg.com/images/g/g8gAAOSwSzxmpmNK/s-l1200.jpg', 54.99, 'The same as last year.'),
(6, 'Call Of Duty Black Ops 6', 'https://m.media-amazon.com/images/I/81cTJfYdiVL.jpg', 79.99, 'Sixth installment, what else.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
