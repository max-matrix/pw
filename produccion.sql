-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2020 a las 20:15:46
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `produccion`
--
drop database if exists produccion;
create database produccion;
use produccion;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `id_padre`) VALUES
(6, 'Informatica', 0),
(7, 'Celulares', 0),
(8, 'Videojuegos', 0),
(9, 'Android', 7),
(10, 'IOS', 7),
(11, 'Monitores', 6),
(12, 'Motherboard', 6),
(13, 'Impresoras', 6),
(14, 'Microprocesadores', 6),
(15, 'Notebooks', 6),
(16, 'Consolas', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato`
--

CREATE TABLE `dato` (
  `id_dato` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefono` int(11) NOT NULL,
  `area` varchar(250) NOT NULL,
  `comentario` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dato`
--

INSERT INTO `dato` (`id_dato`, `nombre`, `apellido`, `email`, `telefono`, `area`, `comentario`) VALUES
(1, 'rodrigo ezequiel', 'miliano', 'rodrigomiliano16@hotmail.com', 1567390317, 'Administración', 'asdqweqwe'),
(2, 'rodrigo ezequiel', 'miliano', 'rodrigomiliano16@hotmail.com', 1567390317, 'Administración', 'asdqweqwe'),
(3, 'rodrigo ezequiel', 'miliano', 'rodrigomiliano16@hotmail.com', 1567390317, 'Administración', 'asdqweqwe'),
(4, '', '', '', 0, '', ''),
(5, 'rodrigo ezequiel', 'miliano', 'rodrigomiliano16@hotmail.com', 1567390317, 'Administración', 'asdqweqwe'),
(6, 'rodrigo ezequiel', 'miliano', 'rodrigomiliano16@hotmail.com', 1567390317, 'Administración', 'asdqweqwe'),
(7, 'rodrigo ezequiel', 'miliano', 'rodrigomiliano16@hotmail.com', 1567390317, 'Administración', 'asdqweqwe'),
(8, 'Maxi', 'Principe', 'maxi.principe@davinci.edu.ar', 1163529844, 'Comercial', 'Hola esto es una prueba'),
(9, 'Maxi', 'Principe', 'maxi.principe@davinci.edu.ar', 1163529844, 'Comercial', 'Hola esto es una prueba'),
(10, 'Maxi', 'Principe', 'maxi.principe@davinci.edu.ar', 1163529844, 'Comercial', 'Hola esto es una prueba'),
(11, 'Ignacio', 'Esses', 'ignacio.esses@gmail.com', 1144775896, 'Ventas', 'Esta es la prueba final de la noche.'),
(12, 'Maximiliano', 'Principe', 'maximiliano.principe@davinci.edu.ar', 1131681566, 'Administración', 'Prueba funcionamiento Form'),
(13, 'Maximiliano', 'Principe', 'maxi.principe@gmail.com', 1131681566, 'Comercial', 'Otra prueba'),
(14, 'Maximiliano', 'Principe', 'maxi.principe@gmail.com', 1131681566, 'Comercial', 'Otra prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nom_marca` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nom_marca`) VALUES
(1, 'Exo'),
(2, 'Epson'),
(3, 'Philips'),
(4, 'Samsung'),
(5, 'Intel'),
(6, 'Gigabyte'),
(7, 'Nintendo'),
(8, 'Apple'),
(9, 'Sony');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `condicion` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `nombre_imagen` varchar(250) NOT NULL DEFAULT 'img',
  `prod_destacado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `condicion`, `descripcion`, `disponibilidad`, `id_marca`, `id_categoria`, `ranking`, `nombre_imagen`, `prod_destacado`) VALUES
(1, 'Notebook', 80000, 'Nuevo', 'Windows 10, 1tb de memoria.', 20, 1, 15, 25, '101', 0),
(2, 'Impresora', 10000, 'Nuevo', 'Impresora multifuncion.', 36, 2, 13, 10, '102', 1),
(3, 'monitor', 25000, 'Usados', 'Monitores con 1 año de uso particular, excelente estado.', 2, 3, 11, 5, '103', 0),
(4, 'celular', 80000, 'Nuevo', 'Samsung s9 plus 64gb memoria.', 16, 4, 9, 15, '104', 0),
(5, 'procesador', 40000, 'Nuevo', 'Lo último de mercado.', 11, 5, 14, 35, '105', 1),
(6, 'placa', 38000, 'Nuevo', 'Desconocido', 8, 6, 12, 20, '106', 0),
(7, 'Nintendo Switch', 65000, 'Nuevo', 'La mas nueva consola de Nintendo', 15, 7, 16, 30, '107', 0),
(8, 'Iphone X', 100000, 'Nuevo', 'Celular de alta gama', 3, 8, 10, 40, '108', 1),
(9, 'Gran pantalla 4k', 50000, 'Nuevo', '4k pantalla', 8, 3, 11, 5, '103', 1),
(10, 'Pantalla', 15000, 'Nuevo', 'nueva pantalla', 50, 3, 11, 5, '103', 0),
(11, 'Espectacular pantalla', 32000, 'Nuevo', 'mejor pantalla', 10, 3, 11, 5, '103', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `dato`
--
ALTER TABLE `dato`
  ADD PRIMARY KEY (`id_dato`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
  MODIFY `id_dato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
