-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2019 a las 18:32:46
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abdprojectmysql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(5) NOT NULL,
  `estado` enum('enviado','recibido','cesta','grupo') DEFAULT NULL,
  `fechaPedido` date DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `fechaLimite` date DEFAULT NULL,
  `Direccion` varchar(50) CHARACTER SET ascii DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `estado`, `fechaPedido`, `fechaEntrega`, `fechaLimite`, `Direccion`) VALUES
(30, 'enviado', '2018-05-29', NULL, NULL, 'estadio santiago bernab?u');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos-cervezas`
--
-- Error leyendo la estructura de la tabla abdprojectmysql.pedidos-cervezas: #1932 - Table 'abdprojectmysql.pedidos-cervezas' doesn't exist in engine
-- Error leyendo datos de la tabla abdprojectmysql.pedidos-cervezas: #1064 - Algo está equivocado en su sintax cerca 'FROM `abdprojectmysql`.`pedidos-cervezas`' en la linea 1

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombreUsuario` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `fechaNac` date NOT NULL,
  `ciudad` varchar(35) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `rol` enum('user','admin') NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombreUsuario`, `password`, `email`, `fechaNac`, `ciudad`, `avatar`, `rol`, `nombre`, `apellidos`) VALUES
('cristiano', '$2y$10$Vevg1NMiHHHA3PyqZKD5e.uF/7NKHmjJtyDSrK2c2rSZjSv3.YM4G', 'cr@cr.es', '1985-02-05', 'Madeira', 'img/users/cr.jpg', 'user', 'Cristiano', 'Ronaldo Sánchez'),
('CuentaPrueba', '$2y$10$T44k1POLIB7zULkYuLedMuml/h5rLrqE0O5W6HWPxWfQZrR7Fx0XS', 'CuentaPrueba@Soylacuentadeprueba.sisoyyo', '0001-11-03', 'Madrid', 'img/users/prueba.jpg', 'user', 'Cuenta', 'Prueba'),
('CuentaPruebaAdmin', '$2y$10$wR6kWpbEcLCEXHdC3pC3VO/lRZx6t27P8Da/dHrCSQoD495nviIYe', 'prueba@prueba.com', '2019-12-31', 'Pruebaland', 'img/users/pruebaadmin.jpg', 'user', 'cuenta', 'admin'),
('Ruben', '$2y$10$/zqO9CpcgBMjr3OAmcZUi.Im.6cWSntAMPpQ8hohkIU4vND7R/Sye', 'wiuehd@em.com', '0121-12-12', 'isudhq', 'img/users/', 'user', 'Ruben', 'Ruebn'),
('rubenoide', '$2y$10$G5eD1G.k/nTQ4FkfYIdMT.6aq4Zc1joHQC3ZQMxXFIC0Y/IqDiX66', 'Rubenizquierdo96@gmail.com', '2018-02-06', 'Madrid', 'img/users/', 'user', 'Izquierdo', 'Izquierdo');

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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombreUsuario`),
  ADD UNIQUE KEY `id` (`nombreUsuario`);

--
-- Indices de la tabla `usuarios-pedidos`
--
ALTER TABLE `usuarios-pedidos`
  ADD PRIMARY KEY (`idUsuario`,`idPedido`),
  ADD KEY `idPedido` (`idPedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `usuarios-pedidos` (`idPedido`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedidos-cervezas` (`idPedido`);

--
-- Filtros para la tabla `usuarios-pedidos`
--
ALTER TABLE `usuarios-pedidos`
  ADD CONSTRAINT `usuarios-pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`nombreUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
