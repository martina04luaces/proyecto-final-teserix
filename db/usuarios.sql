-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 11-10-2023 a las 23:46:06
=======
-- Tiempo de generación: 27-10-2023 a las 03:21:07
>>>>>>> emy
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
<<<<<<< HEAD
-- Base de datos: `teserix`
=======
-- Base de datos: `usuarios`
>>>>>>> emy
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
<<<<<<< HEAD
  `id_usuario` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `document` int(11) NOT NULL
=======
  `ID` varchar(50) NOT NULL,
  `Nbr_u` varchar(30) DEFAULT NULL,
  `Img_u` varchar(50) DEFAULT NULL,
  `Pass_u` varchar(120) DEFAULT NULL,
  `gmail` varchar(50) DEFAULT NULL,
  `token` int(11) NOT NULL
>>>>>>> emy
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

<<<<<<< HEAD
INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `document`) VALUES
(1, 'sexoman', '$2y$10$fLiBYN9BuRIVKqC/7MokjeuqqCMI7FBEbddOeq/YskYeUScC2Y.qW', 46291213);
=======
INSERT INTO `usuarios` (`ID`, `Nbr_u`, `Img_u`, `Pass_u`, `gmail`, `token`) VALUES
('2', 'nico', NULL, '$2y$10$mq0N1KN.as9CLwUD0mriEOx.mWjxy4LJBSnwgR7drAUL9ZxZLtY9.', 'emyalexandraoliverarocha@gmail.com', 1);
>>>>>>> emy

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
<<<<<<< HEAD
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
=======
  ADD PRIMARY KEY (`ID`);
>>>>>>> emy
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;