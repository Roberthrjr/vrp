-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 22:06:55
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_vacunacion`
--
CREATE DATABASE IF NOT EXISTS `app_vacunacion` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `app_vacunacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmaceutica`
--

CREATE TABLE `farmaceutica` (
  `idfarmaceutica` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `pais` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `farmaceutica`
--

INSERT INTO `farmaceutica` (`idfarmaceutica`, `nombre`, `pais`, `direccion`, `telefono`, `email`) VALUES
(1, 'Pfizer', 'Perú', 'Calle Las Orquídeas 585, San Isidro 15046', '(01)6152100', 'per.aereporting@pfizer.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospital`
--

CREATE TABLE `hospital` (
  `idhospital` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hospital`
--

INSERT INTO `hospital` (`idhospital`, `nombre`, `direccion`, `telefono`, `email`) VALUES
(1, 'Hospital Edgardo Rebagliati Martins', 'Av Edgardo Rebagliati 490, Jesús María 15072', '(01)2654901', 'carlos.saito@essalud.gob.pe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `numdoc` text DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `numdoc`, `nombre`, `apellido`, `telefono`, `email`) VALUES
(1, '72224689', 'Roberth Jason', 'Rios Jesus', '+51925407136', 'roberth@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `idvacuna` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `efectividad` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `farmaceutica_idfarmaceutica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`idvacuna`, `nombre`, `efectividad`, `stock`, `farmaceutica_idfarmaceutica`) VALUES
(1, 'Pfizer-BioNTech', '95%', 200, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna_has_hospital`
--

CREATE TABLE `vacuna_has_hospital` (
  `vacuna_idvacuna` int(11) NOT NULL,
  `hospital_idhospital` int(11) NOT NULL,
  `paciente_idpaciente` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `primer_cita` timestamp NULL DEFAULT NULL,
  `ultima_cita` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vacuna_has_hospital`
--

INSERT INTO `vacuna_has_hospital` (`vacuna_idvacuna`, `hospital_idhospital`, `paciente_idpaciente`, `cantidad`, `primer_cita`, `ultima_cita`) VALUES
(1, 1, 1, 2, '2021-05-25 19:31:34', '2021-06-15 14:31:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `farmaceutica`
--
ALTER TABLE `farmaceutica`
  ADD PRIMARY KEY (`idfarmaceutica`);

--
-- Indices de la tabla `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`idhospital`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`idvacuna`),
  ADD KEY `fk_vacuna_farmaceutica1_idx` (`farmaceutica_idfarmaceutica`);

--
-- Indices de la tabla `vacuna_has_hospital`
--
ALTER TABLE `vacuna_has_hospital`
  ADD PRIMARY KEY (`vacuna_idvacuna`,`hospital_idhospital`,`paciente_idpaciente`),
  ADD KEY `fk_vacuna_has_hospital_hospital1_idx` (`hospital_idhospital`),
  ADD KEY `fk_vacuna_has_hospital_vacuna1_idx` (`vacuna_idvacuna`),
  ADD KEY `fk_vacuna_has_hospital_paciente1_idx` (`paciente_idpaciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `farmaceutica`
--
ALTER TABLE `farmaceutica`
  MODIFY `idfarmaceutica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `hospital`
--
ALTER TABLE `hospital`
  MODIFY `idhospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `idvacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD CONSTRAINT `fk_vacuna_farmaceutica1` FOREIGN KEY (`farmaceutica_idfarmaceutica`) REFERENCES `farmaceutica` (`idfarmaceutica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacuna_has_hospital`
--
ALTER TABLE `vacuna_has_hospital`
  ADD CONSTRAINT `fk_vacuna_has_hospital_hospital1` FOREIGN KEY (`hospital_idhospital`) REFERENCES `hospital` (`idhospital`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vacuna_has_hospital_paciente1` FOREIGN KEY (`paciente_idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vacuna_has_hospital_vacuna1` FOREIGN KEY (`vacuna_idvacuna`) REFERENCES `vacuna` (`idvacuna`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
