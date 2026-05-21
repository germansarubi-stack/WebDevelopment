-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2025 a las 17:46:26
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
-- Base de datos: `tp4_personas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `ID` int(11) NOT NULL,
  `DNI` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`ID`, `DNI`, `Nombre`, `Apellido`, `Edad`, `Email`, `Telefono`) VALUES
(1, 36651460, 'German', 'Sarubi', 32, 'gerarubi@gmail.com', '586543999'),
(2, 11111111, 'Florencia', 'Bordon', 29, '', ''),
(3, 22222222, 'Claudia', 'Wokcsik', 40, 'clauwok@outlook', ''),
(4, 33333333, 'Juan Carlos', 'Raskousky', 55, '', '1133664488'),
(5, 44444444, 'Hugo', 'Perez', 65, 'hugito@yahoo.com', '29013399774'),
(6, 55555555, 'Maria', 'Azucena', 60, 'azul@gmail.com', '2901654789'),
(7, 66666666, 'Joaquin', 'Martinez', 30, 'joakimar@outlook.com', '249369852'),
(8, 77777777, 'Sebastian', 'Ortiz', 23, '', ''),
(9, 88888888, 'Lucas', 'Gonsales', 37, '', '341852147'),
(10, 99999999, 'Byron', 'Olaso', 20, 'bayorla@gmail.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
