-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2019 a las 18:25:28
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
-- Estructura de tabla para la tabla `usuarios-pedidos`
--

CREATE TABLE `usuarios-pedidos` (
  `idUsuario` varchar(25) NOT NULL,
  `idPedido` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que representa la relación usaurios-pedidos';

--
-- Volcado de datos para la tabla `usuarios-pedidos`
--

INSERT INTO `usuarios-pedidos` (`idUsuario`, `idPedido`) VALUES
('cristiano', 29),
('cristiano', 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios-pedidos`
--
ALTER TABLE `usuarios-pedidos`
  ADD PRIMARY KEY (`idUsuario`,`idPedido`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios-pedidos`
--
ALTER TABLE `usuarios-pedidos`
  ADD CONSTRAINT `usuarios-pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`nombreUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios-pedidos_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
