-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2024 a las 23:58:49
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
-- Base de datos: `proyect`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_portfolio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido1` varchar(255) DEFAULT NULL,
  `apellido2` varchar(255) DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `habilidades` text DEFAULT NULL,
  `experiencia` text DEFAULT NULL,
  `estudios` text DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `testimonio` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `enlaces` text DEFAULT NULL,
  `blog` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portfolios`
--

INSERT INTO `portfolios` (`id`, `id_usuario`, `nombre`, `apellido1`, `apellido2`, `biografia`, `habilidades`, `experiencia`, `estudios`, `categoria`, `testimonio`, `telefono`, `enlaces`, `blog`) VALUES
(1, 1, 'Marco', 'Denegri', 'López', 'Erudito', 'HTML', 'Trabajé en la tele.', 'PUCP', '', 'Dicen que soy MAD.', '1234567891', 'https://es.linkedin.com/', 'https://www.climaterealityproject.org/blog'),
(2, 2, 'Tony', 'Montana', 'Esmeralda', 'Hey chico.', 'HTML', 'No quieres saber.', 'UNMSM', '', 'Nada que agregar.', '9876543219', 'https://es.linkedin.com/', 'https://www.climaterealityproject.org/blog'),
(3, 2, 'Tony', 'Montana', 'Esmeralda', 'Hey chico.', 'HTML', 'No quieres saber.', 'UNMSM', '', 'Nada que agregar.', '9876543219', 'https://es.linkedin.com/', 'https://www.climaterealityproject.org/blog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `id_portfolio` int(11) NOT NULL,
  `trabajo` text NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `id_portfolio`, `trabajo`, `fecha_inicio`, `fecha_fin`, `id_usuario`) VALUES
(1, 1, 'Entrevistador', '2024-11-25', '2024-12-01', 1),
(2, 2, 'Camionero', '2024-11-25', '2024-12-01', 2),
(3, 3, 'Camionero', '2024-11-25', '2024-12-01', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(1, NULL, 'aurelio@gmail.com', '$2y$10$3kfbU58HPvwOFZOXILnrHOLnyg5mbQtQGvgU3dBdr9NTQ1FYsyOZy'),
(2, NULL, 'montana@gmail.com', '$2y$10$Oa0osQoA9h2a3HbHX8kYYuujNLLvs6V7Lq6gTcblSYIf6/JT7Sx2K');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_portfolio` (`id_portfolio`);

--
-- Indices de la tabla `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_portfolio` (`id_portfolio`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_portfolio`) REFERENCES `portfolios` (`id`);

--
-- Filtros para la tabla `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`id_portfolio`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
