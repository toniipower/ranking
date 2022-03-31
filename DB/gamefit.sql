-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-03-2022 a las 10:59:42
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gamefit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `logotipo_empresa` varchar(255) NOT NULL,
  `tipo_empresa` enum('gran empresa','pyme','','colegios','residencias ancianos','ayuntamientos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `logotipo_empresa`, `tipo_empresa`) VALUES
(1, 'Euroformac', '', 'pyme'),
(2, 'Álooliva SL', '', 'gran empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos`
--

CREATE TABLE `pasos` (
  `id_pasos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_pasos` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `n_pasos` int(5) NOT NULL,
  `lunes` int(5) NOT NULL DEFAULT '0',
  `martes` int(5) NOT NULL DEFAULT '0',
  `miercoles` int(5) NOT NULL DEFAULT '0',
  `jueves` int(5) NOT NULL DEFAULT '0',
  `viernes` int(5) NOT NULL DEFAULT '0',
  `sabado` int(5) NOT NULL DEFAULT '0',
  `domingo` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pasos`
--

INSERT INTO `pasos` (`id_pasos`, `id_usuario`, `fecha_pasos`, `n_pasos`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`) VALUES
(1, 1, '2022-03-29 09:37:51', 1230, 0, 0, 0, 0, 0, 0, 0),
(5, 8, '2022-03-17 09:50:21', 5555, 0, 0, 0, 0, 0, 0, 0),
(7, 2, '2022-03-22 11:07:43', 3, 0, 0, 0, 0, 0, 0, 0),
(8, 51, '2022-03-17 12:34:51', 5122, 0, 0, 0, 0, 0, 0, 0),
(18, 52, '2022-03-18 10:51:12', 9876, 0, 0, 0, 0, 0, 0, 0),
(31, 53, '2022-03-22 14:09:16', 20, 10000, 1800, 700, 800, 400, 3000, 5000),
(34, 54, '2022-03-21 09:09:37', 1717, 0, 0, 0, 0, 0, 0, 0),
(37, 55, '2022-03-21 09:12:59', 11000, 0, 0, 0, 0, 0, 0, 0),
(65, 56, '2022-03-22 10:43:37', 40000, 0, 0, 0, 0, 0, 0, 0),
(69, 50, '2022-03-22 11:14:21', 2, 0, 0, 0, 0, 0, 0, 0),
(70, 59, '2022-03-23 13:31:34', 200, 0, 0, 0, 0, 0, 0, 0),
(71, 60, '2022-03-25 12:42:08', 122, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `code` varchar(2) NOT NULL,
  `postal_code` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_code` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`code`, `postal_code`, `name`, `phone_code`) VALUES
('VI', 1, 'Álava', 945),
('AB', 2, 'Albacete', 967),
('A', 3, 'Alacant', 950),
('AL', 4, 'Almería', 920),
('AV', 5, 'Ávila', 924),
('BA', 6, 'Badajoz', 924),
('PM', 7, 'Illes Balears', 971),
('B', 8, 'Barcelona', 93),
('BU', 9, 'Burgos', 947),
('CC', 10, 'Cáceres', 927),
('CA', 11, 'Cádiz', 956),
('CS', 12, 'Castelló', 964),
('CR', 13, 'Ciudad Real', 926),
('CO', 14, 'Córdoba', 957),
('C', 15, 'A Coruña', 981),
('CU', 16, 'Cuenca', 969),
('GI', 17, 'Girona', 972),
('GR', 18, 'Granada', 958),
('GU', 19, 'Guadalajara', 949),
('SS', 20, 'Gipuzkoa', 943),
('H', 21, 'Huelva', 959),
('HU', 22, 'Huesca', 974),
('J', 23, 'Jaén', 953),
('LE', 24, 'León', 987),
('L', 25, 'Lleida', 973),
('LO', 26, 'La Rioja', 941),
('LU', 27, 'Lugo', 982),
('M', 28, 'Madrid', 91),
('MA', 29, 'Málaga', 95),
('MU', 30, 'Murcia', 968),
('NA', 31, 'Nafarroa', 948),
('OR', 32, 'Ourense', 988),
('O', 33, 'Asturias', 98),
('P', 34, 'Palencia', 979),
('GC', 35, 'Las Palmas', 928),
('PO', 36, 'Pontevedra', 986),
('SA', 37, 'Salamanca', 923),
('TF', 38, 'Sta. Cruz de Tenerife', 922),
('S', 39, 'Cantabria', 942),
('SG', 40, 'Segovia', 921),
('SE', 41, 'Sevilla', 95),
('SO', 42, 'Soria', 975),
('T', 43, 'Tarragona', 977),
('TE', 44, 'Teruel', 978),
('TO', 45, 'Toledo', 925),
('V', 46, 'Valéncia', 96),
('VA', 47, 'Valladolid', 983),
('BI', 48, 'Bizkaia', 94),
('ZA', 49, 'Zamora', 980),
('Z', 50, 'Zaragoza', 976),
('CE', 51, 'Ceuta', 956),
('ML', 52, 'Melilla', 95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_provincia` int(3) DEFAULT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `password_usuario` varchar(25) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido1_usuario` varchar(50) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `poblacion_usuario` varchar(25) DEFAULT NULL,
  `provincia_usuario` varchar(25) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `token` int(25) NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL,
  `tipo_usuario` enum('Administrador','Editor','Usuario','') NOT NULL,
  `apellido2_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_provincia`, `email_usuario`, `password_usuario`, `nombre_usuario`, `apellido1_usuario`, `fecha_nacimiento`, `poblacion_usuario`, `provincia_usuario`, `id_empresa`, `token`, `estado_usuario`, `tipo_usuario`, `apellido2_usuario`) VALUES
(1, 0, 'tony@gmail.com', '123', 'Antonio', 'Heredia', '1992-07-22', 'Álora', 'Málaga', 1, 12312, 1, 'Administrador', 'Leiva'),
(2, 0, 'alfonsocasermeiro@gmail.com', '123', 'Alfonso', 'Ramos', '1992-07-22', 'Álora', 'Málaga', 1, 12312, 1, 'Administrador', 'Casermeiro'),
(8, 0, 'antonio@gmail.com', '123', 'Antonio', 'Ruíz', '1991-02-25', NULL, 'A Coruña', 1, 476546, 1, 'Usuario', 'López'),
(50, 0, 'davidb@gmail.com', '123', 'David', 'gomez', '2022-03-16', NULL, 'Granada', 1, 889875, 1, 'Usuario', 'Vi'),
(51, 0, 'david22@gmail.com', '123', 'David', 'Torres', '2022-03-26', NULL, 'Granada', 1, 435994, 1, 'Usuario', 'Gómez'),
(52, 0, 'antonio45@gmail.com', '123', 'Antonio', 'Bernardo', '2021-11-01', NULL, 'Málaga', 1, 587942, 0, 'Usuario', 'Mancera'),
(53, 0, 'eu@gmail.com', '123', 'Eusebio', 'raimundo', '2022-03-18', NULL, '', 1, 34562, 1, 'Usuario', 'amador'),
(54, 0, 'sergio@gmail.com', '123', 'Sergio', 'Miranda', NULL, NULL, NULL, NULL, 782930, 1, 'Usuario', 'Ramos'),
(55, 0, 'gonzi@gmail.com', '123', 'Gonzalo', 'Gutierrez', NULL, NULL, NULL, NULL, 878384, 1, 'Usuario', 'Tamayo'),
(56, 0, 'rodres@gmail.com', '123', 'Rodre', 'De', '1990-02-20', NULL, 'Girona', 2, 181293, 0, 'Usuario', 'Ceses'),
(59, NULL, 'jose@g.com', '123', 'el_jose', '', '2021-06-03', NULL, 'Teruel', NULL, 874194, 1, 'Usuario', ''),
(60, NULL, 'alfon@gmail.com', '123', 'alfonsito', '', '2022-03-10', NULL, 'Guadalajara', NULL, 664145, 1, 'Usuario', ''),
(61, NULL, 'ju@ju.com', '123', 'juani', '', '2022-03-25', NULL, 'Córdoba', NULL, 839381, 1, 'Usuario', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD PRIMARY KEY (`id_pasos`),
  ADD KEY `id_usuarios` (`id_usuario`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`postal_code`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pasos`
--
ALTER TABLE `pasos`
  MODIFY `id_pasos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD CONSTRAINT `pasos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
