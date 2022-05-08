-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2022 a las 15:47:30
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `videoclub`
--
CREATE DATABASE IF NOT EXISTS `videoclub` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `videoclub`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentesSesiones`
--

CREATE TABLE `asistentesSesiones` (
  `idSala` varchar(10) NOT NULL,
  `idSocio` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `disponible` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nombre`, `categoria`, `disponible`) VALUES
('1', 'Narnia', 'prueba', 'si'),
('2', 'Ted', 'prueba', 'si'),
('3', 'Soy leyenda', 'prueba', 'si'),
('4', 'Los pitufos', 'prueba', 'si'),
('5', 'Los simpson', 'prueba', 'si'),
('6', 'Se busca', 'prueba', 'si'),
('7', '2012', 'prueba', 'si'),
('8', 'Grease', 'prueba', 'si'),
('9', 'Pasajero 57', 'prueba', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculaRota`
--

CREATE TABLE `peliculaRota` (
  `idPeli` varchar(30) NOT NULL,
  `idSocio` varchar(10) NOT NULL,
  `motivo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id` int(100) NOT NULL,
  `fechaInicio` date NOT NULL,
  `idSocio` varchar(10) NOT NULL,
  `idPelicula` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` varchar(10) NOT NULL,
  `idPelicula` varchar(30) NOT NULL,
  `numeroSala` int(10) NOT NULL,
  `aforo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `idPelicula`, `numeroSala`, `aforo`) VALUES
('1', '1', 1, 10),
('2', '4', 2, 10),
('3', '5', 3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id`, `nombre`, `pass`) VALUES
('06015058', 'Marlon', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistentesSesiones`
--
ALTER TABLE `asistentesSesiones`
  ADD KEY `idSala` (`idSala`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculaRota`
--
ALTER TABLE `peliculaRota`
  ADD KEY `idPeli` (`idPeli`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSocio` (`idSocio`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistentesSesiones`
--
ALTER TABLE `asistentesSesiones`
  ADD CONSTRAINT `asistentessesiones_ibfk_1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`id`);

--
-- Filtros para la tabla `peliculaRota`
--
ALTER TABLE `peliculaRota`
  ADD CONSTRAINT `pelicularota_ibfk_1` FOREIGN KEY (`idPeli`) REFERENCES `pelicula` (`id`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`id`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`id`);

--
-- Filtros para la tabla `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`id`);
COMMIT;
