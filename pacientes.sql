-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2023 a las 05:37:26
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
(12340, 'Pepito Perez', 'Manizales- Caldas', '3113223221', 'Manizales', 'Caldas', '10004', 12340, 1002542488);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`documento_pac`),
  ADD KEY `medicoID` (`medicoID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`medicoID`) REFERENCES `medicosTitulares` (`documento_tit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
