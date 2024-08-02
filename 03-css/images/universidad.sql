-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2024 a las 18:58:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` mediumint(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `cantidadEstudiantes` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `nombre`, `fechaInicio`, `fechaFin`, `cantidadEstudiantes`) VALUES
(1, 'ADSO', '0224-07-23', '2026-10-01', 26),
(2, 'ADSO', '2025-01-20', '2028-05-29', 29),
(3, 'ADSO', '2022-03-30', '2025-06-30', 36),
(4, 'ADSO', '2024-02-12', '2029-05-28', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `codEstudiante` mediumint(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fkIdCurso` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`codEstudiante`, `nombre`, `email`, `telefono`, `fkIdCurso`) VALUES
(1, 'Angie Dahiana Rios Quintero', 'angie0410@gmail.com', '3228667453', 1),
(2, 'Andres Giraldo Cardona', 'andres1022@gmail.com', '3120657480', 2),
(3, 'Carolina Torres Infante Perez', 'juanfer00@gmail.com', '3112200099', 3),
(4, 'Ricardo Rios Nuñez', 'ricardo55@gmail.com', '3100000099', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `idExamen` mediumint(9) NOT NULL,
  `nota` float DEFAULT NULL,
  `fechaRealizacion` datetime NOT NULL,
  `fkIdCurso` mediumint(9) NOT NULL,
  `fkCodEstudiante` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`idExamen`, `nota`, `fechaRealizacion`, `fkIdCurso`, `fkCodEstudiante`) VALUES
(1, 4.4, '2025-08-20 08:30:00', 1, 1),
(2, 3.9, '2024-08-01 07:15:30', 2, 2),
(3, 5, '2026-05-24 03:00:00', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idPregunta` mediumint(9) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` text NOT NULL,
  `tema` varchar(100) NOT NULL,
  `fkIdExamen` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idPregunta`, `pregunta`, `respuesta`, `tema`, `fkIdExamen`) VALUES
(1, '¿cuanto es 50 + 87?', 'la respuesta es 137', 'matematicas', 1),
(2, '¿cuanto es la mitad de 2 + 2?', 'la respuesta es 3', 'matematicas', 1),
(3, 'escriba una palabra que lleve tilde', 'la respuesta es papá', 'español', 2),
(4, 'escriba una palabra palindroma', 'la respuesta es Arenera', 'español', 2),
(5, '¿cuantos huesos tiene el cuerpo humano?', 'la respuesta es 206', 'ciencias', 3),
(6, '¿cual es el organo mas grande de la piel?', 'la respuesta es la piel', 'ciencias', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`codEstudiante`),
  ADD KEY `fkIdCurso` (`fkIdCurso`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idExamen`),
  ADD KEY `fkIdCurso` (`fkIdCurso`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `fkIdExamen` (`fkIdExamen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `codEstudiante` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `idExamen` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idPregunta` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`fkIdCurso`) REFERENCES `curso` (`idCurso`);

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`fkIdCurso`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `examen_ibfk_2` FOREIGN KEY (`fkIdCurso`) REFERENCES `estudiante` (`codEstudiante`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`fkIdExamen`) REFERENCES `examen` (`idExamen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
