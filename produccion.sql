-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2020 a las 19:27:03
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(16, 'Consolas', 8, 1);

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
(1, 'Muy malo, me vino sin el manual.', 9, 1, '::1', '2020-07-10 15:53:18', 1, 'rodrigo.miliano@davinci.edu.ar', 0),
(2, 'No es lo que esperaba, hay mejores precios en otro lado.', 15, 1, '::1', '2020-07-10 15:54:40', 2, 'ignacio.esses@davinci.edu.ar', 0),
(3, 'Complicada de instalar.', 8, 1, '::1', '2020-07-10 15:45:20', 2, 'porceljr@yahoo.com.ar', 1),
(4, 'Es lo que estaba necesitando, por fin lo tengo.', 1, 1, '::1', '2020-07-10 15:43:06', 4, 'pepeargento@hotmail.com', 0),
(5, 'Esta muy bueno!', 2, 1, '::1', '2020-07-10 15:44:42', 4, 'guillecoppola@gmail.com', 0),
(6, 'Muy buen producto, lo recomiendo!', 2, 1, '::1', '2020-07-10 15:40:20', 5, 'rodrigomiliano16@gmail.com', 1),
(7, 'Excelente calidad, funciona perfecto.', 8, 1, '::1', '2020-07-10 15:45:39', 5, 'lulipop@fibertel.com.ar', 1),
(8, 'El producto esta bien', 18, 1, '::1', '2020-07-10 15:56:26', 3, 'maximiliano.principe@davinci.edu.ar', 0),
(9, '¡Excelente!', 19, 1, '::1', '2020-07-10 15:57:16', 5, 'rodrigomiliano16@hotmail.com', 1),
(10, 'Me encanta!!', 11, 1, '::1', '2020-07-10 15:42:25', 5, 'ignacio.esses@davinci.edu.ar', 1),
(11, 'El producto es bueno.', 23, 1, '::1', '2020-07-10 15:58:10', 3, 'el_bromas@gmail.com', 0),
(12, 'Funciona muy bien', 2, 1, '::1', '2020-07-10 15:40:04', 4, 'santiago.astrada@davinci.edu.ar', 1),
(13, 'Me gustó y lo entregaron en tiempo y forma.', 2, 1, '::1', '2020-07-10 15:41:56', 4, 'cosmefulanito@outlook.com', 0),
(14, 'Bastante bien', 11, 1, '::1', '2020-07-10 15:42:15', 3, 'cosmefulanito@outlook.com', 0),
(15, 'Me gusto mucho, a pesar que fue difícil de instalar', 2, 1, '::1', '2020-07-10 15:30:51', 3, 'maxi.principe@gmail.com', 1),
(16, 'Muy practica, me encanta que además sea portable. Sirve para cuando te quedas sin luz en casa.', 22, 1, '::1', '2020-07-10 16:03:01', 5, 'rodrigo_cuervo1@hotmail.com', 1),
(17, 'Me gusto mucho, seria bueno quizás que con tu compra te regalen algún juego.', 22, 1, '::1', '2020-07-10 16:03:03', 4, 'pibeplay@speedy.com.ar', 0),
(19, 'Playstation siempre la mejor!', 3, 1, '::1', '2020-07-10 16:08:15', 5, 'pibeplay@hotmail.com', 1),
(20, 'Funciona muy bien.', 20, 1, '::1', '2020-07-10 16:27:24', 4, 'jorge.perez@outlook.com', 1),
(21, 'Sirve para trabajar, pero para juegos no tanto.', 21, 1, '::1', '2020-07-10 16:27:26', 3, 'juantopo@gmail.com', 0),
(22, 'Estoy esperando la entrega, se demoraron mas de lo que habían dicho.', 16, 1, '::1', '2020-07-10 16:27:29', 2, 'bruno_diaz@gmail.com', 0),
(23, 'Buena definición.', 17, 1, '::1', '2020-07-10 16:27:31', 4, 'santiago.astrada@davinci.edu.ar', 1),
(24, 'Me gusto por la capacidad que tiene.', 24, 1, '::1', '2020-07-10 16:27:33', 5, 'seba-alvarez@hotmail.com', 1),
(25, 'Me gusto, es muy practica.', 14, 1, '::1', '2020-07-10 16:27:36', 4, 'esteban_quito@gmail.com', 1),
(26, 'No se si es la mejor, pero la garantía respondió rápido cuando tuve un problema.', 12, 1, '::1', '2020-07-10 16:27:38', 3, 'karol-g@gmail.com', 1),
(27, 'Muy caro para sus características, es mejor Xiaomi.', 13, 1, '::1', '2020-07-10 16:26:37', 2, 'shu_wu_wang@gmail.com', 1),
(28, 'Gran oferta!', 18, 1, '::1', '2020-07-10 16:26:31', 5, 'rodrigo.miliano@davinci.edu.ar', 1),
(29, 'Pude comprarla gracias a las cuotas sin interés, muy buena!', 18, 1, '::1', '2020-07-10 16:26:34', 4, 'ignacio.esses@davinci.edu.ar', 1);

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
(8, 'Apple', 1),
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
(30, 'nombre2', 0),
(31, 'nombre3', 0);

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
(189, 1, 1),
(190, 1, 2),
(191, 1, 4),
(192, 1, 6),
(193, 1, 7),
(194, 1, 8),
(195, 1, 9),
(196, 1, 10),
(197, 1, 11);

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
(1, 'Monitor HP', 10000, 'Nuevo', 'Monitor HP V194 led 18.5', 5, 3, 11, 4, '114.jpg', 1, 1),
(2, 'Intel I9', 64710, 'Nuevo', 'Micro Procesador Intel I9 9900k Coffee Lake 9na Gen', 10, 5, 14, 5, '115.jpg', 1, 1),
(3, 'Playstation 4 + juegos', 52999, 'Nuevo', 'Playstation 4 Megapack Ps4 3 Juegos, Joystick Cupón Fortnite', 4, 7, 16, 3, '119.jpg', 1, 1),
(6, 'iPhone 7 Plus', 136649, 'Nuevo', 'iPhone 7 Plus 256 GB Negro mate 3 GB RAM', 11, 8, 10, 5, '112.jpg', 1, 1),
(8, 'Impresora Epson', 29999, 'Nuevo', 'Impresora a color fotográfica Epson EcoTank L805 con wifi 220V negra', 5, 2, 13, 5, '123.jpg', 1, 1),
(9, 'Amd Ryzen 5', 43990, 'Nuevo', 'Amd Ryzen 5 2600 8gb Fury B450 C1', 15, 6, 12, 5, '122.jpg', 1, 1),
(11, 'Notebook Asus Intel Core I7', 174999, 'Nuevo', 'Notebook Asus Intel Core I7 X509 8565u 12gb 480gb Ssd Gamer', 9, 1, 15, 4, '116.jpg', 1, 1),
(12, 'Notebook Asus Tuf Ryzen 7', 297190, 'Nuevo', 'Notebook Asus Tuf Ryzen 7 16gb Ssd 512gb + 1tb Rtx 2060 6gb', 2, 1, 15, 5, '117.jpg', 1, 1),
(13, 'iPhone 11', 169999, 'Nuevo', 'iPhone 11 64 GB Negro 4 GB RAM', 2, 8, 7, 5, '125.jpg', 1, 1),
(14, 'Notebook Hp 240 G7', 59999, 'Nuevo', 'Notebook Hp 240 G7 6fu25lt Celeron N4000 4gb 1tb 14 Free Dos', 7, 1, 15, 4, '118.jpg', 1, 1),
(15, 'Intel I5', 35799, 'Nuevo', 'Procesador gamer Intel Core i5-9600K de 6 núcleos y 4.6GHz ', 6, 5, 14, 5, '124.jpg', 0, 1),
(16, 'Intel I3', 9499, 'Nuevo', 'Procesador gamer Intel Core i3-9100F de 4 núcleos y 4.2GHz de frecuencia', 3, 5, 14, 4, '113.jpg', 1, 1),
(17, 'Monitor Sentey MS-2150', 21999, 'Nuevo', 'Monitor Sentey MS-2150 led 21.5', 8, 3, 11, 5, '126.jpg', 1, 1),
(18, 'Monitor LG UltraWide', 36998, 'Nuevo', 'Monitor LG UltraWide 25UM58 led 25', 4, 3, 11, 5, '127.jpg', 1, 1),
(19, 'Impresora a color multifunción Epson', 29280, 'Nuevo', 'Impresora a color multifunción Epson EcoTank L4160 con wifi 220V negra', 6, 2, 13, 4, '128.jpg', 1, 1),
(20, 'Samsung Galaxy A51', 36999, 'Nuevo', 'Samsung Galaxy A51 128 GB Prism crush white 4 GB RAM', 6, 4, 9, 5, '130.jpg', 0, 1),
(21, 'Notebook Exo', 78399, 'Nuevo', 'Notebook Exo Smart Intel I3 Xl4 F3145 4gb/500gb 15.6 W10', 2, 1, 15, 5, '131.jpg', 0, 1),
(22, 'Consola Nintendo Switch', 73000, 'Nuevo', 'Consola Nintendo Switch 32gb Neon', 2, 7, 16, 5, '133.jpg', 0, 0),
(23, 'Monitor Pc 19 Pulgadas Philips', 10889, 'Nuevo', 'Monitor Pc 19 Pulgadas Philips Led Hdmi Vga 1366 X 768', 10, 3, 11, 5, '134.jpg', 0, 1),
(24, 'iPad Apple 7', 56900, 'Nuevo', 'iPad Apple 7ª Generación 2019 A2197 10.2\" 32GB gold con memoria RAM 3GB', 14, 8, 10, 4, '135.jpg', 0, 1);

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
(59, 'pepe', 'argento', 'carlos', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pepe@hotmail.com', 4, 1, '1234'),
(60, 'pepe', 'argento', 'admin@carrito.com', '8d421e892a47dff539f46142eb09e56b', 'pepe@hotmail.com', 4, 1, '1234'),
(61, 'f', 'Principe', 'admin', '24c68898d2dfadd0f52cbff689e09392', 'maxi.principe@gmail.com', 0, 1, '5f079f53edd3f');

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
(102, 58, 1);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
  MODIFY `id_dato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
