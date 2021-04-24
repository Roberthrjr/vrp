-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-04-2021 a las 02:47:25
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vrp`
--
CREATE DATABASE IF NOT EXISTS `vrp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vrp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmaceuticas`
--

DROP TABLE IF EXISTS `farmaceuticas`;
CREATE TABLE `farmaceuticas` (
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pais` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ciudad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `farmaceuticas`
--

INSERT INTO `farmaceuticas` (`id`, `nombre`, `pais`, `ciudad`, `direccion`, `telefono`, `email`) VALUES
(1, 'Pfizer S.A.', 'Perú', 'Lima', 'Calle Las Orquídeas 585, San Isidro, Lima', '(01) 6152100', 'per.aereporting@pfizer.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitales`
--

DROP TABLE IF EXISTS `hospitales`;
CREATE TABLE `hospitales` (
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contacto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hospitales`
--

INSERT INTO `hospitales` (`id`, `nombre`, `direccion`, `telefono`, `email`, `contacto`) VALUES
(1, 'Clínica San Pablo', 'Av. El Polo 789, Santiago de Surco.', '(01)610–3333', 'clinicasanpablo@contacto.com', 'Atención de Central Telefónica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `farmaceuticas`
--
ALTER TABLE `farmaceuticas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `farmaceuticas`
--
ALTER TABLE `farmaceuticas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
