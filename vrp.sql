-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2021 a las 01:15:42
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vrp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmaceuticas`
--

CREATE TABLE `farmaceuticas` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `pais` text NOT NULL,
  `ciudad` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `farmaceuticas`
--

INSERT INTO `farmaceuticas` (`id`, `nombre`, `pais`, `ciudad`, `direccion`, `telefono`, `email`) VALUES
(1, 'Pfizer S.A.', 'Perú', 'Lima', 'Calle Las Orquídeas 585, San Isidro, Lima', '(01) 6152100', 'per.aereporting@pfizer.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitales`
--

CREATE TABLE `hospitales` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `email` text NOT NULL,
  `contacto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hospitales`
--

INSERT INTO `hospitales` (`id`, `nombre`, `direccion`, `telefono`, `email`, `contacto`) VALUES
(1, 'Clínica San Pablo', 'Av. El Polo 789, Santiago de Surco.', '(01)610–3333', 'clinicasanpablo@contacto.com', 'Atención de Central Telefónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `tipdoc` text NOT NULL,
  `numdoc` text NOT NULL,
  `numcel` text NOT NULL,
  `mail` text NOT NULL,
  `enfermedad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombre`, `apellido`, `tipdoc`, `numdoc`, `numcel`, `mail`, `enfermedad`) VALUES
(2, 'andres', 'ramirez', 'cedula', '234345', '345345', 'asdf@dfdgdg.com', 1),
(3, 'andres', 'Sanchez', 'cedula', '23434598', '364567768', 'asdf@dfgfgdg.com', 0),
(4, 'Andrew', 'sanchez', 'cedula', '23434', '2334566', 'asdf@hdhf.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fabricante` text NOT NULL,
  `modAdministracion` text NOT NULL,
  `refrigeracion` tinyint(1) NOT NULL,
  `efectividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id`, `nombre`, `fabricante`, `modAdministracion`, `refrigeracion`, `efectividad`) VALUES
(2, 'BNT162b2', 'Pfizer', 'inyección en el músculo', 1, 90);

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
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
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

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
