-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2021 a las 08:36:23
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `clave` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id`, `idUsuario`, `correo`, `fecha`, `clave`) VALUES
(37, 1, 'alvadevis@hotmail.com', '2021-06-30 09:00:00', 'fdzqb5aKBNkt'),
(40, 3, 'alvadevis@hotmail.com', '2021-06-28 09:00:00', 'ih6bj4rLVxMl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFinal` datetime NOT NULL,
  `duracion` int(11) NOT NULL,
  `dias` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `idUsuario`, `fechaInicio`, `fechaFinal`, `duracion`, `dias`) VALUES
(2, 1, '2021-06-09 09:00:00', '2021-06-30 21:30:00', 30, '1;3'),
(3, 2, '2021-06-09 09:00:00', '2021-06-30 21:30:00', 40, '2;3'),
(4, 3, '2021-06-09 09:00:00', '2021-06-30 21:00:00', 60, '1;4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `curso` varchar(200) DEFAULT NULL,
  `asignatura` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `correo`, `password`, `curso`, `asignatura`) VALUES
(1, 'Alvaro', 'Devis Tamarit', 'alvadevis@hotmail.com', '$2y$10$kyMx2aop8S0oJbvhex8ZM.vlpoLCh9Y1F0ndfJtk1UGgQNrMUDIE2', '1ºDAM', 'Base de Datos'),
(2, 'Manolo', 'Saeut Cuye', 'patata@hotmail.com', '$2y$10$kyMx2aop8S0oJbvhex8ZM.vlpoLCh9Y1F0ndfJtk1UGgQNrMUDIE2', '2ºDAM', 'Fol'),
(3, 'Sara', 'Cuopo Sert', 'patata2@hotmail.com', '$2y$10$kyMx2aop8S0oJbvhex8ZM.vlpoLCh9Y1F0ndfJtk1UGgQNrMUDIE2', '1ºDAM', 'Programación');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idUsuarioCita` (`idUsuario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_idUsuarioCita` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
