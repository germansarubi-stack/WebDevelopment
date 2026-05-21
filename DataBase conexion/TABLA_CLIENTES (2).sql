-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2025 a las 20:56:52
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
-- Base de datos: `tp3_abm_clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `clinete_ID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clinete_ID`, `nombre`, `apellido`, `email`, `telefono`, `direccion`, `fecha_alta`) VALUES
(1, 'German', 'Sarubi', 'germansaru55@gmail.com', '452053463', 'Del pipo 23789', '2025-04-16 20:43:42'),
(4, 'Florencia', 'Bordon', 'florbordo@hotmail.com', '3416851972', 'San lorenzo 155', '2025-04-16 20:46:47'),
(5, 'Claudia', 'Wokjsic', 'clauwok@outlook.com', '11532596', 'Alem 1369', '2025-04-16 20:49:30'),
(6, 'Juan Carlos', 'Raskouwki', 'juacarras@gmail.com', NULL, NULL, '2025-04-16 20:50:25'),
(7, 'Joaquin', 'Martinez', 'joakmar@gmail.com', NULL, 'Fiorino 698', '2025-04-16 20:51:49'),
(8, 'Hugo', 'Perez', 'hugper@yahoo.com', '11593636', NULL, '2025-04-16 20:52:27'),
(9, 'Azucena', 'Gomez', 'azugomez@hotmail.com', '290148649', 'Mirador del olivia 741', '2025-04-16 20:53:37'),
(10, 'Pedro', 'Aguilar', 'agipedro@gmail.com', '118834598', NULL, '2025-04-16 21:07:07'),
(11, 'Itati', 'Godoy', 'itago@outlook.com', NULL, 'Maipu 125', '2025-04-16 21:09:05'),
(12, 'Sebastian', 'Ortiz', 'ortseb@gmail.com', '341996622', 'Florida 3657', '2025-04-16 21:10:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clinete_ID`),
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clinete_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
