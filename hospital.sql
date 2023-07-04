-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-07-2023 a las 06:09:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `documento_emp` int(11) NOT NULL,
  `nombre_emp` varchar(255) NOT NULL,
  `direccion_emp` varchar(255) NOT NULL,
  `telefono_emp` varchar(10) NOT NULL,
  `ciudad_emp` varchar(255) NOT NULL,
  `departamento_emp` varchar(255) NOT NULL,
  `codigoPostal_emp` varchar(20) NOT NULL,
  `seguridadSocial_emp` int(11) NOT NULL,
  `tipo_emp` varchar(50) NOT NULL,
  `estadoVacaciones_emp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `medicoID` int(11) NOT NULL,
  `dia` varchar(30) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `medicoID`, `dia`, `hora_inicio`, `hora_fin`) VALUES
(3, 1002542488, 'Lunes', '06:00:00', '18:00:00'),
(4, 1002542488, 'Martes', '06:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `documento_med` int(11) NOT NULL,
  `nombre_med` varchar(255) NOT NULL,
  `direccion_med` varchar(255) NOT NULL,
  `telefono_med` varchar(10) NOT NULL,
  `ciudad_med` varchar(255) NOT NULL,
  `departamento_med` varchar(255) NOT NULL,
  `codigoPostal_med` varchar(20) NOT NULL,
  `seguridadSocial_med` int(11) NOT NULL,
  `matriculaProfesional_med` int(11) NOT NULL,
  `tipo_med` varchar(50) NOT NULL,
  `estadoVacaciones_med` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`documento_med`, `nombre_med`, `direccion_med`, `telefono_med`, `ciudad_med`, `departamento_med`, `codigoPostal_med`, `seguridadSocial_med`, `matriculaProfesional_med`, `tipo_med`, `estadoVacaciones_med`) VALUES
(1002542488, 'Juan Diego', 'José Restrepo', '3215883759', 'Manizales', 'Caldas', '140001', 1002542488, 1002542488, 'Titular', 'Programadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `documento_pac` int(11) NOT NULL,
  `nombre_pac` varchar(255) NOT NULL,
  `direccion_pac` varchar(255) NOT NULL,
  `telefono_pac` varchar(10) NOT NULL,
  `ciudad_pac` varchar(255) NOT NULL,
  `departamento_pac` varchar(255) NOT NULL,
  `codigoPostal_pac` varchar(20) NOT NULL,
  `seguridadSocial_pac` int(11) NOT NULL,
  `medicoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`documento_pac`, `nombre_pac`, `direccion_pac`, `telefono_pac`, `ciudad_pac`, `departamento_pac`, `codigoPostal_pac`, `seguridadSocial_pac`, `medicoID`) VALUES
(1002542488, 'El wey', 'Manizales', '8787665', 'Manizales', 'Caldas', '140001', 1002542488, 1002542488);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustitutos`
--

CREATE TABLE `sustitutos` (
  `documento_sus` int(11) NOT NULL,
  `nombre_sus` varchar(255) NOT NULL,
  `direccion_sus` varchar(255) NOT NULL,
  `telefono_sus` varchar(10) NOT NULL,
  `ciudad_sus` varchar(255) NOT NULL,
  `departamento_sus` varchar(255) NOT NULL,
  `codigoPostal_sus` varchar(20) NOT NULL,
  `seguridadSocial_sus` int(11) NOT NULL,
  `matriculaProfesional_sus` int(11) NOT NULL,
  `fechaAlta_sus` date NOT NULL,
  `fechaBaja_sus` date NOT NULL,
  `estadoVacaciones_sus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sustitutos`
--

INSERT INTO `sustitutos` (`documento_sus`, `nombre_sus`, `direccion_sus`, `telefono_sus`, `ciudad_sus`, `departamento_sus`, `codigoPostal_sus`, `seguridadSocial_sus`, `matriculaProfesional_sus`, `fechaAlta_sus`, `fechaBaja_sus`, `estadoVacaciones_sus`) VALUES
(1002542488, 'Chococono', 'Panamericana', '8787665', 'Manizales', 'Caldas', '140001', 21312, 1002542488, '2023-06-01', '2023-06-30', 'No disponbles');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`documento_emp`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicoID` (`medicoID`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`documento_med`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`documento_pac`),
  ADD KEY `medicoID` (`medicoID`);

--
-- Indices de la tabla `sustitutos`
--
ALTER TABLE `sustitutos`
  ADD PRIMARY KEY (`documento_sus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`medicoID`) REFERENCES `medicos` (`documento_med`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`medicoID`) REFERENCES `medicos` (`documento_med`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
