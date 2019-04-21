-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2019 a las 18:25:09
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beereveryday`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos-cervezas`
--

CREATE TABLE `pedidos-cervezas` (
  `idCerveza` int(5) NOT NULL,
  `idPedido` int(5) NOT NULL,
  `unidades` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que representa la relación pedidos-cervezas';

--
-- Volcado de datos para la tabla `pedidos-cervezas`
--

INSERT INTO `pedidos-cervezas` (`idCerveza`, `idPedido`, `unidades`) VALUES
(4, 30, 2),
(6, 29, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos-cervezas`
--
ALTER TABLE `pedidos-cervezas`
  ADD PRIMARY KEY (`idCerveza`,`idPedido`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos-cervezas`
--
ALTER TABLE `pedidos-cervezas`
  ADD CONSTRAINT `pedidos-cervezas_ibfk_2` FOREIGN KEY (`idCerveza`) REFERENCES `cervezas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos-cervezas_ibfk_3` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
