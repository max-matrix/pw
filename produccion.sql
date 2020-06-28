-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2020 a las 15:27:02
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database produccion;
use produccion;

--
-- Base de datos: `produccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT 0,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `id_padre`, `activo`) VALUES
(6, 'Informatica', 1, 1),
(7, 'Celulares', 1, 1),
(8, 'Videojuegos', 1, 1),
(9, 'Android', 7, 1),
(10, 'IOS', 7, 1),
(11, 'Monitores', 6, 1),
(12, 'Motherboard', 6, 1),
(13, 'Impresoras', 6, 1),
(14, 'Microprocesadores', 6, 1),
(15, 'Notebooks', 6, 1),
(16, 'Consolas', 8, 1),
(73, 'nombre1', 2, 1),
(75, 'prueba', 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  `id_prod_com` int(11) NOT NULL,
  `id_us_com` int(11) NOT NULL,
  `ip_us_com` varchar(20) NOT NULL,
  `fecha_us_com` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `puntaje_us_com` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `comentario`, `id_prod_com`, `id_us_com`, `ip_us_com`, `fecha_us_com`, `puntaje_us_com`, `email`, `activo`) VALUES
(1, 'Muy buen producto, lo recomiendo!', 0, 0, '0', '2020-06-22 04:15:44', 0, '', 0),
(2, 'No es lo que esperaba, hay mejores precios en otro lado.', 0, 0, '0', '2020-06-22 04:15:39', 0, '', 1),
(3, 'dfasdfasdfafsd', 8, 1, '::1', '2020-06-22 03:29:53', 2, '', 0),
(4, 'dfsasdfasfd', 1, 1, '::1', '2020-06-22 03:29:55', 4, '', 0),
(5, 'vfasdfasdfa', 2, 1, '::1', '2020-06-21 20:20:54', 4, '', 0),
(6, 'Nuevo comentario', 2, 1, '::1', '2020-06-21 20:22:08', 5, '', 0),
(7, 'dfadfadsf', 8, 1, '::1', '2020-06-21 20:23:06', 5, '', 0),
(8, 'Ultimo comentario', 5, 1, '::1', '2020-06-21 21:21:20', 3, '', 0),
(9, 'Ultimo comentario', 5, 1, '::1', '2020-06-21 20:29:23', 5, '', 0),
(10, 'Otro comentario y van', 11, 1, '::1', '2020-06-21 20:29:39', 5, '', 0),
(11, 'uno mas', 4, 1, '::1', '2020-06-21 20:30:47', 3, '', 0),
(12, 'fasdfasfd', 2, 1, '::1', '2020-06-21 20:32:02', 4, '', 0),
(13, 'fasdfasfd', 2, 1, '::1', '2020-06-21 20:33:23', 4, '', 0),
(14, 'dfsafasdf', 11, 1, '::1', '2020-06-21 20:33:36', 3, '', 0),
(15, 'dsfajsdflkjña', 2, 1, '::1', '2020-06-21 23:05:21', 3, 'maxi.principe@gmail.com', 1),
(16, 'Es muy caro pero parece bueno!', 8, 1, '::1', '2020-06-22 04:18:23', 3, 'rodrigomiliano16@gmail.com', 0),
(17, 'Necesito una!!!!!', 1, 1, '::1', '2020-06-22 04:19:45', 5, 'rodrigomiliano16@hotmail.com', 0),
(18, 'es carisimo!!!!!', 11, 1, '::1', '2020-06-22 04:21:50', 2, 'email1@gmail.com', 0),
(19, 'Hola esto es para la grabacion!', 2, 0, '::1', '2020-06-23 01:38:47', 5, 'prueba@gmail.com', 1);

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
(14, 'Maximiliano', 'Principe', 'maxi.principe@gmail.com', 1131681566, 'Comercial', 'Otra prueba'),
(15, 'Ignacio', 'Esses', 'ignacio.esses@davinci.edu.ar', 44444123, 'Ventas', 'Test 20200513 1628'),
(16, 'Ignacio', 'Esses', 'ignacio.esses@davinci.edu.ar', 44444123, 'Ventas', 'Test 20200513 1630'),
(17, 'Ignacio', 'Esses', 'ignacio.esses@davinci.edu.ar', 44444123, 'Ventas', 'Test 20200513 1631'),
(18, 'Ignacio', 'Esses', 'ignacio.esses@davinci.edu.ar', 44444123, 'Ventas', 'Test 20200513 1632'),
(19, 'Ignacio', 'Esses', 'ignacio.esses@davinci.edu.ar', 44444123, 'Ventas', 'Test 2020051301634'),
(20, 'Ignacio', 'Esses', 'ignacio.esses@davinci.edu.ar', 44444123, 'Ventas', 'Test 2020051301635');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nom_marca` varchar(250) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nom_marca`, `activo`) VALUES
(1, 'Exo', 1),
(2, 'Epson', 1),
(3, 'Philips', 1),
(4, 'Samsung', 1),
(5, 'Intel', 1),
(6, 'Gigabyte', 1),
(7, 'Nintendo', 1),
(8, 'Apple', 0),
(74, 'marca1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `activo`) VALUES
(1, 'Administrador', 1),
(2, 'Ventas', 1),
(3, 'Comercial', 1),
(11, 'Recursos Humanos', 1),
(13, 'RRHH', 1),
(21, 'perfil1', 1),
(22, 'perfil2', 1),
(24, 'nombre1', 1),
(37, 'prueba', 1),
(38, 'perfilprueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_permisos`
--

CREATE TABLE `perfil_permisos` (
  `id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_permisos`
--

INSERT INTO `perfil_permisos` (`id`, `perfil_id`, `permiso_id`) VALUES
(1, 9, 2),
(2, 9, 3),
(3, 9, 4),
(36, 13, 4),
(42, 11, 4),
(57, 3, 4),
(110, 21, 1),
(111, 21, 2),
(112, 21, 3),
(113, 21, 4),
(114, 21, 5),
(115, 21, 9),
(164, 22, 1),
(165, 22, 2),
(166, 22, 4),
(167, 22, 6),
(168, 22, 7),
(169, 22, 8),
(170, 22, 9),
(171, 22, 10),
(185, 24, 2),
(186, 24, 3),
(198, 37, 9),
(199, 1, 1),
(200, 1, 2),
(201, 1, 4),
(202, 1, 6),
(203, 1, 7),
(204, 1, 8),
(205, 1, 9),
(206, 1, 10),
(207, 1, 11),
(208, 38, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `cod` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `cod`) VALUES
(1, 'Agregar usuarios', 'user.add'),
(2, 'Modificar usuarios', 'user.edit'),
(3, 'Borrar Usuarios', 'user.del'),
(4, 'Ver Usuarios', 'user.see'),
(5, 'Agregar Noticias', 'new.add'),
(6, 'Marcas abm', 'brands.admin'),
(7, 'Categorias abm', 'categories.admin'),
(8, 'Perfiles abm', 'profiles.admin'),
(9, 'Productos abm', 'products.admin'),
(10, 'Usuarios abm', 'users.admin'),
(11, 'Comentarios abm', 'commentaries.admin');

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
  `prod_destacado` tinyint(1) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `condicion`, `descripcion`, `disponibilidad`, `id_marca`, `id_categoria`, `ranking`, `nombre_imagen`, `prod_destacado`, `activo`) VALUES
(1, 'Notebook1', 80000, 'Nuevo', 'Windows 10, 1tb de memoria.', 20, 1, 15, 25, '101.jpg', 0, 1),
(2, 'Impresora', 10000, 'Nuevo', 'Impresora multifuncion.', 36, 2, 13, 10, '102.jpg', 1, 1),
(3, 'monitor', 25000, 'Usados', 'Monitores con 1 año de uso particular, excelente estado.', 2, 3, 11, 5, '103.jpg', 0, 1),
(5, 'procesador', 40000, 'Nuevo', 'Lo último de mercado.', 11, 5, 14, 35, '105.jpg', 1, 1),
(6, 'placa', 38000, 'Nuevo', 'Desconocido', 8, 6, 12, 20, '106.jpg', 0, 1),
(7, 'Nintendo Switch', 65000, 'Nuevo', 'La mas nueva consola de Nintendo', 15, 7, 16, 30, '107.jpg', 1, 1),
(8, 'Iphone X', 100000, 'Nuevo', 'Celular de alta gama', 3, 8, 10, 40, '108.jpg', 1, 1),
(9, 'Gran pantalla 4k', 50000, 'Nuevo', '4k pantalla', 8, 3, 11, 5, '103.jpg', 1, 1),
(10, 'Pantalla', 15000, 'Nuevo', 'nueva pantalla', 50, 3, 11, 5, '103.jpg', 0, 1),
(11, 'Espectacular pantalla2', 3200000000, 'Nuevo', 'mejor pantalla', 10, 3, 11, 5, '103.jpg', 0, 1),
(64, 'Samsung s9', 65000, '', 'Celular de alta gama', 15, 4, 9, 4, '104.jpg', 1, 1),
(65, 'prueba', 80000, '', 'esto es prueba', 15, 4, 7, 16, 'descarga.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` int(2) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `salt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `email`, `tipo`, `activo`, `salt`) VALUES
(1, 'Admin', 'Sistema', 'admin', '207acd61a3c1bd506d7e9a4535359f8a', 'admin@carrito.com', 1, 1, 'salt'),
(32, 'Ignacio', 'Esses', 'iesses', '5a2e54ee57e5b7273b9a8fed78c1ebd8', 'ignacio.esses@davinci.edu.ar', 4, 1, 'test'),
(34, 'Rodrigo', 'Miliano', 'rodrigomiliano16', '64513b8a91f3263b7f048e40affd60ee', 'rodrigomiliano16@hotmail.com', 0, 1, '5ec03337b8774'),
(42, 'Santiago', 'Astrada', 'Santii', '36c978418bb566ecd70f5f610970f2be', 'santiago.astrada@davinci.edu.ar', 0, 0, '5ed300b24473c'),
(55, 'nombre1', 'apellido1', 'usuario1', '00b354bfa01d9c31a82a04d24922b559', 'email1@gmail.com', 0, 0, '5ee7ac2fbb63d'),
(56, 'nombre2', 'apellido2', 'usuario2', '23a1387770ea8bdf925deba43acea208', 'email2@gmail.com', 0, 0, '5ee7ac4a40082'),
(57, 'nombre4', 'apellido4', 'usuario4', 'b64dc7b9883dd535166337d9646e09be', 'email4@gmail.com', 0, 1, '5eee3a912ec5b'),
(58, 'nombre3', 'apellido3', 'usuario3', 'a012cfb8d887d4e52cdb17fda9f9d22b', 'email3@gmail.com', 0, 1, '5eee5de702227'),
(59, 'nombre5', 'apellido5', 'usuario5', '5d6a04497cf1c39941e74121810cb9ed', 'email5@gmail.com', 0, 1, '5ef0332bc3466'),
(60, 'prueba', 'prueba', 'prueba', 'cd9d4021dbc18e58958b2a6d06a34972', 'pruebaadmin@gmail.com', 0, 1, '5ef15dc13b801');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfiles`
--

CREATE TABLE `usuarios_perfiles` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_perfiles`
--

INSERT INTO `usuarios_perfiles` (`id`, `usuario_id`, `perfil_id`) VALUES
(25, 34, 2),
(26, 34, 3),
(41, 36, 1),
(42, 36, 2),
(43, 36, 3),
(44, 36, 11),
(45, 35, 2),
(46, 35, 3),
(49, 38, 2),
(54, 37, 1),
(55, 37, 3),
(57, 1, 1),
(58, 1, 2),
(59, 1, 3),
(67, 39, 2),
(68, 40, 2),
(69, 40, 3),
(70, 41, 2),
(71, 41, 3),
(75, 42, 2),
(76, 32, 3),
(77, 33, 1),
(78, 33, 2),
(80, 43, 13),
(81, 54, 3),
(97, 56, 22),
(98, 55, 21),
(99, 57, 1),
(102, 58, 1),
(103, 59, 37),
(104, 60, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipos`
--

CREATE TABLE `usuarios_tipos` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_tipos`
--

INSERT INTO `usuarios_tipos` (`id_tipo`, `tipo`) VALUES
(1, 'admin'),
(2, 'ventas'),
(3, 'comercial'),
(4, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

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
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
  MODIFY `id_dato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
