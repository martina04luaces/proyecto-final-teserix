-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 19:34:42
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
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrator`
--

INSERT INTO `administrator` (`id_admin`, `username`, `password`, `document`) VALUES
(2, 'Administrador', '$2y$10$koh2t4Zdvi3qCl4oCdpJb.TUUUdxx1xaJ3iCJcew22Gejm3z2SBsu', 23261233);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arreglos`
--

CREATE TABLE `arreglos` (
  `ID_arreglo` int(11) NOT NULL,
  `Tipo_arreglo` varchar(200) NOT NULL,
  `Desc_arreglo` varchar(100) NOT NULL,
  `Date_arreglo` date NOT NULL,
  `Estado_arreglo` varchar(150) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `arreglos`
--

INSERT INTO `arreglos` (`ID_arreglo`, `Tipo_arreglo`, `Desc_arreglo`, `Date_arreglo`, `Estado_arreglo`, `ID_user`) VALUES
(1, 'Instalación de componentes', 'Necesito la instalacion de un procesador en mi computadora', '2023-12-04', 'En revisión.', 13),
(8, 'Revision General', 'necesito una limpieza en mi equipo', '2023-12-04', 'En revisión.', 13);

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
(2, 'Procesador Ryzen 3 3200g', 'pro.png\r\n', 111999, 119),
(3, 'Memoria RAM HyperX 8gb', 'ram.png', 15999, 897),
(4, 'Notebook IdeaPad 1 Intel', 'net1.png', 532999, 300),
(5, 'Notebook gamer Legion 5 Gen 6', 'net2.png', 1294000, 100),
(6, 'Dell Inspiron 3525', 'net3.png', 584999, 259),
(7, 'Procesador AMD Ryzen 7 5700X', 'pro2.png', 408999, 124),
(8, 'Motherboard TUF Gaming Z690-PLUS', 'mother.png', 608999, 10),
(9, 'Fuente Be Quiet! 1000W 80 Plus Gold', 'fuente.png', 155999, 29),
(14, 'Fuente Sentey 725W', '1701370689-image-removebg-preview.png', 20000, 200),
(15, 'Play Station 5', '1701554592-image-removebg-preview.png', 991899, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `ID_order` int(11) NOT NULL,
  `Date_order` date NOT NULL,
  `Articles` varchar(150) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`ID_order`, `Date_order`, `Articles`, `ID_user`) VALUES
(1, '2023-11-29', ' 1/9599/1', 12),
(2, '2023-12-03', ' 8/608999/1', 12),
(3, '2023-12-03', ' 9/155999/1 8/608999/1', 12),
(4, '2023-12-04', ' 2/111999/1', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `document` int(11) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `email`, `password`, `document`, `token`) VALUES
(13, 'carlitos', 'elpapu@gmail.com', '$2y$10$LffhJOH9mPavy8K5xVtp7ezJlWMjU4xQLT0pWSv9nYDZDjLoQmgZ6', 23999874, 1701659990);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `arreglos`
--
ALTER TABLE `arreglos`
  ADD PRIMARY KEY (`ID_arreglo`);

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_art`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID_order`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `arreglos`
--
ALTER TABLE `arreglos`
  MODIFY `ID_arreglo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `ID_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
