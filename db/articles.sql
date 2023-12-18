-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2023 a las 03:20:28
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
-- Base de datos: `teserix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `ID_art` int(11) NOT NULL,
  `Name_art` varchar(100) NOT NULL,
  `Img_art` varchar(100) NOT NULL,
  `Price_art` float NOT NULL,
  `Stock_art` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`ID_art`, `Name_art`, `Img_art`, `Price_art`, `Stock_art`) VALUES
(1, 'Disco Duro Seagate 1TB', 'hdd.png', 9599, 44),
(2, 'Procesador Ryzen 3 3200g', 'pro.png\r\n', 111999, 120),
(3, 'Memoria RAM HyperX 8gb', 'ram.png', 15999, 897),
(4, 'Notebook IdeaPad 1 Intel', 'net1.png', 532999, 300),
(5, 'Notebook gamer Legion 5 Gen 6', 'net2.png', 1294000, 100),
(6, 'Dell Inspiron 3525', 'net3.png', 584999, 259),
(7, 'Procesador Ryzen 7 5800x', 'pro2.png', 453545, 10),
(8, 'Motherboard TUF Gaming Z690-PLUS', 'mother.png', 1118840, 12),
(9, 'Fuente Be Quiet! 1000W 80 Plus Gold', 'fuente.png', 155999, 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_art`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
