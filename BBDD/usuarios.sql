-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2019 a las 18:24:29
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
('Ruben', '$2y$10$/zqO9CpcgBMjr3OAmcZUi.Im.6cWSntAMPpQ8hohkIU4vND7R/Sye', 'wiuehd@em.com', '0121-12-12', 'isudhq', 'img/users/', 'user', 'Ruben', 'Ruebn'),
('rubenoide', '$2y$10$G5eD1G.k/nTQ4FkfYIdMT.6aq4Zc1joHQC3ZQMxXFIC0Y/IqDiX66', 'Rubenizquierdo96@gmail.com', '2018-02-06', 'Madrid', 'img/users/', 'user', 'Izquierdo', 'Izquierdo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombreUsuario`),
  ADD UNIQUE KEY `id` (`nombreUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
