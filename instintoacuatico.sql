-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2021 a las 00:31:45
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `instintoacuatico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `name`, `lastname`, `email`, `message`, `phone`) VALUES
(1, 'Mariangel ', 'Sierra ', 'marijohansierra@gmail.com', 'Hola', 4587215),
(2, 'Liam', 'Payne', 'liam@gmail.com', 'Quiero inscribirme en una clase de natación', 5445462),
(3, 'María', 'Sierra', 'marijohansierra@gmail.com', 'Los niños quieren nadar', 9809808);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `service` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `service`, `description`, `url`) VALUES
(7, 'Matronatacion', 'Clases para bebés (0-24 meses) y embarazadas.', 'galeria/Matronatacion.png'),
(8, 'Parvulos', 'Clases para niños de 3 a 5 años', 'galeria/Parvulos.jpeg'),
(9, 'Escolares', 'Clases para niños de 6 a 9 años', 'galeria/Escolares.jpeg'),
(10, 'Predeportivos', 'Clases para personas de 9 a 13 años', 'galeria/Predeportivos.jpeg'),
(11, 'Adultos', 'Clases para personas de 13+ años', 'galeria/Adultos.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `nombrealumno` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombreacudiente` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parentesco` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `edadalumno` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `curso` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `acepta` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `nombrealumno`, `nombreacudiente`, `parentesco`, `edadalumno`, `email`, `telefono`, `direccion`, `curso`, `acepta`, `mensaje`) VALUES
(1, 'Liam Payne ', 'Harry Styles', 'Esposo', '17', 'liam@gmail.com', '5452625', 'cll 74 n 48-32', 'Escolares', 'on', 'Hola :)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instructores`
--

INSERT INTO `instructores` (`id`, `nombres`, `rol`, `telefono`, `url`) VALUES
(2, 'Valentina Jaramillo', 'Gerente/Instructora', '3136083995', 'galeria/.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descripcion`, `url`) VALUES
(4, 'Anivesario', 'Cumplimos 3 años desde el inicio de nuestra academia el 19 de septiembre de 2018. Nos alegra que nos acompañantes en esta linda academia que se ha formado, por lo que creamos nuevos espacios para tí.', 'galeria/aniversario.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `fechaentrega` varchar(50) NOT NULL,
  `horaentrega` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `servicio`, `fecha`, `fechaentrega`, `horaentrega`, `email`) VALUES
(1, 'Matronatacion', '2021-10-26', '', '', 'valentina@gmail.com '),
(2, 'Matronatacion', '2021-10-26', '', '', 'valentina@gmail.com '),
(3, 'Matronatacion', '2021-10-26', '', '', 'valentina@gmail.com '),
(5, 'Gorros', '2021-11-03', '', '', 'mjsierra921@misena.edu.co ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `Service_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AR_Date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Service_Date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Service_hour` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `Service_Name`, `AR_Date`, `Service_Date`, `Service_hour`, `email`) VALUES
(14, 'Predeportivos', '2021-10-17', '2021-10-19', '2021-10-25', 'intento@1000.com'),
(15, 'Adultos ', '2021-10-17', '', '', 'intento@1000.com '),
(16, 'Escolares', '2021-10-17', '', '', 'intento@1000.com '),
(17, 'Escolares', '2021-10-17', '', '', 'intento@1000.com '),
(18, 'Parvulos', '2021-10-17', '', '', 'intento@1000.com '),
(19, 'Parvulos', '2021-10-17', '', '', 'intento@1000.com '),
(20, 'Matronatacion', '2021-10-18', '', '', 'valentina@gmail.com '),
(21, 'Predeportivos', '2021-10-18', '', '', 'valentina@gmail.com '),
(22, 'Parvulos', '2021-10-18', '', '', 'valentina@gmail.com '),
(23, 'Matronatacion', '2021-10-18', '', '', 'valentina@gmail.com '),
(24, 'Parvulos', '2021-10-19', '', '', 'valentina@gmail.com '),
(25, 'Parvulos', '2021-10-20', '', '', 'intento2@gmail.com '),
(26, 'Escolares', '2021-10-20', '2021-10-20', '2021-12-20', 'valentina@gmail.com'),
(27, 'Parvulos', '2021-10-20', '', '', 'intento@1000.com '),
(28, 'Matronatacion', '2021-10-20', '', '', 'intento@1000.com '),
(29, 'Parvulos', '2021-10-20', '', '', 'valentina@gmail.com '),
(30, 'Escolares', '2021-10-21', '', '', 'jaramillochavarriasofia@gmail.com '),
(31, 'Matronatacion', '2021-10-21', '', '', 'valentina@gmail.com '),
(32, 'Adultos ', '2021-10-21', '2021-10-26', '2021-11-20', 'jaramillochavarriasofia@gmail.com'),
(33, 'Matronatacion', '2021-10-22', '2021-10-26', '2021-11-20', 'intento3@gmail.com'),
(34, 'Parvulos', '2021-10-26', '', '', 'valentina@gmail.com '),
(35, 'Predeportivos', '2021-10-26', '', '', 'valentina@gmail.com '),
(36, 'Predeportivos', '2021-10-26', '', '', 'valentina@gmail.com '),
(37, 'Predeportivos', '2021-10-26', '', '', 'valentina@gmail.com '),
(38, 'Parvulos', '2021-10-28', '', '', 'mariangel.sierrajaller@inemjose.edu.co '),
(39, 'Matronatacion', '2021-11-03', '', '', 'mjsierra921@misena.edu.co '),
(40, 'Parvulos', '2021-11-03', '', '', 'mjsierra921@misena.edu.co '),
(41, 'Predeportivos', '2021-11-03', '', '', 'sebas@gmail.com '),
(42, 'Matronatacion', '2021-11-03', '', '', 'mjsierra921@misena.edu.co ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL COMMENT '0:default 1:Admin 2:Boss'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `name`, `lastname`, `phone`, `direction`, `password`, `type`) VALUES
(1, 'mjsierra921@misena.edu.co', 'Mariángel', 'Sierra Jaller', '3225169236', 'calle103#51b-20', '$2y$10$PWK/21UmBR9ZLH7Myn2/H.X9VxpUD7EKuiu5rtXPYCZXVCsa94DmK', 1),
(3, 'sebas@gmail.com', 'sebastian', 'Hola', '4488123', 'calle #2ksa1', '$2y$10$QdipN4AKLmIpDaF9865ZeOknfHxDxT3Z01wEH3J3BfhgdLYCJqR3y', 0),
(4, 'sofia@gmail.com', 'Sofia', 'Styles', '0000000', '0000000', '$2y$10$ssHm3ZlyiPspnGwwGyEgpeavUoic57Wg6M5nq2gszHBaL8ZOOgPVq', 1),
(5, 'juesrami@gmail.com', 'Juan ', 'Ramirez', '3015272301', 'cll 48 #4-74', '$2y$10$vjT.jLR1n8P5SeYW1Qw0mOHt5VyMb20UDHo0qugaOHL5AL55zl3tC', 0),
(6, 'juanhiguita@inemjose.edu.co', 'Juan David', 'Higuita Taborda', '3502054959', 'Cll 53 10 C 12 INT 1187', '$2y$10$3TWd2XEkUcSVYP0.XtKhcO3tmz3uKDixd4SSfduC8IycCXW4RextK', 0),
(7, 'valentina@gmail.com', 'Valentina', 'Jaramillo ', '3135243327', '1334 calle 113', '$2y$10$1Csct6MLEyeJZVgcEVbg1eJAM5sOr7rBpMI.nq3bwTtFS9KYvqDq.', 1),
(9, 'juesrami@hotmail.com', 'JuanRamirez', 'Echeverry', '3015272301', 'cl25d #10-2', '$2y$10$rJCboMRt2hDVJu2cb2zt0.2wzO4mRUqFDCgn2ADGF1u0wnkwYbFFy', 0),
(10, 'marijohansierra@gmail.com', 'Mariangel ', 'Sierra ', '+57 322 51', '14-58', '$2y$10$SBY67a6RAAgAzbxddaj0WuGJfyobrYkrWyaykHhIb.DcBQqNM4cxy', 0),
(11, 'jallerwarnez1981@hotmail.com', 'Johanna', 'Sabana', '57 322 51', '14-58', '$2y$10$mg8VD76QbIFAsD7/fq.Kvu.Wh0bR6JLKE4PAl3FzxTG1GdEbmlOSa', 0),
(12, 'intento@1000.com', 'SofÃ­a', 'Jaramillo ', '0000000', '0000000', '$2y$10$0LsxK7glbVVzOE0tECkLvuDzXO0SPYeT3Y0DtOnWAA8wqO9d7nkpO', 1),
(13, 'intento20@gmail.com', 'SofÃ­a', 'Styles', '0000000', '0000000', '$2y$10$0e3SV2s8yMQAL1/bUGxM0OI7fRcZwdDIsvUnIcHSOqueX1mMredKG', 1),
(17, 'hola@gmail.com', 'chess', 'Che', '0000000', '0000000', '$2y$10$KlxBiuBR/7ofP6.4A4gCUupmmzjn.G3p3it2lSoRcjzsO/X19.JJi', 0),
(18, 'ayuda@gmail.com', 'Sofia', 'Jaramillo ', '0000000', '0000000', '$2y$10$N1n3.HxXoVhPeka1I3zzWOs.guYO1oStQyA7yYCrX4helxZJ6djxK', 0),
(19, 'jaramillochavarriasofia@gmail.com', 'SofÃ­a', 'Jaramillo ChavarrÃ­a', '0000000', '0000000', '$2y$10$FkFTLjcQzwkKbYhuv0avjuBJOmTUeZ2tLSL2LLSUecG0A8s02GrI2', 0),
(21, 'alo@gmail.com', 'alo', 'chao', '1234566', '0985 cra 86', '$2y$10$mduPspPaU./z5lDOv8tYceAdT9l83gRqHjP1z3fJgxiCA8p/1Axzy', 0),
(22, 'mariangel.sierrajaller@inemjose.edu.co', 'Johanna', 'Sierra ', '4587215', '15-89', '$2y$10$XWi68QYk/LoCky307lFVnepQ1lPlaC0TU0sxUrbWIy8tgBMFtjBS2', 0),
(23, 'mari@gmai.com', 'Mariangel ', 'Sierra ', '4587215', '14-58', '$2y$10$oPmt3WmPVgMbdu1xWz5SzOiAFLn5Sp9gunzvbOwDGNJTstFSepkc.', 0),
(29, 'Eli@gmail.com', 'Eli', 'ventas', '1515494', '14-58', '$2y$10$8DfHhPYpmTp4m6pvnbc4JukP2XIEcevXb8c8uER7tZtqVJFTm3X2S', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE `valor` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `precio` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clases` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valor`
--

INSERT INTO `valor` (`id`, `descripcion`, `precio`, `clases`) VALUES
(3, 'Clases Personalizadas', 'Valor por nivel $300.000', '10 clases');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vitrina`
--

CREATE TABLE `vitrina` (
  `id` int(11) NOT NULL,
  `implemento` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vitrina`
--

INSERT INTO `vitrina` (`id`, `implemento`, `descripcion`, `url`) VALUES
(1, 'Vestido de baÃ±o', 'Son necesarios para el ingreso a la piscina, estÃ¡n hechos de licra lo que hace que se facilite el movimiento a la hora de nadar.', 'vitrina/Captura.JPG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vitrina`
--
ALTER TABLE `vitrina`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `instructores`
--
ALTER TABLE `instructores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vitrina`
--
ALTER TABLE `vitrina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
