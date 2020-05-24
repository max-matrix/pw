-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2020 a las 20:30:58
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
  `id_padre` int(11) NOT NULL DEFAULT 0
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
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Ventas'),
(3, 'Comercial'),
(10, 'Test');

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
(19, 10, 1),
(20, 10, 4),
(29, 1, 1),
(30, 1, 2),
(31, 1, 4);

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
(5, 'Agregar Noticias', 'new.add');

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
(33, 'Ignacio', 'Esses', 'iesses', '861f194e9d6118f3d942a72be3e51749', 'ignacio.esses@davinci.edu.ar', 4, 1, 'test');

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
  MODIFY `id_dato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
