-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2020 a las 19:39:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `registro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descripcion` varchar(5000) NOT NULL,
  `imgs` varchar(50) NOT NULL,
  `borrado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = borrado',
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`registro_id`, `user_id`, `titulo`, `descripcion`, `imgs`, `borrado`, `fecha`) VALUES
(69, 2, 'PARA CHECKZ', 'siempreforever\r\n', '', 1, '2020-12-09 19:16:14'),
(70, 2, 'Tarea definitiva', 'tarea233', '', 0, '2020-12-09 19:16:14'),
(76, 18, 'SOY EL ADMIN', 'BLABABA', '', 1, '2020-12-09 19:16:14'),
(78, 24, 'Rufo', 'cuenta del rufian', '', 0, '2020-12-09 19:16:14'),
(81, 18, 'PROBANDO LA HORA', 'jujuuu', '', 1, '2020-12-09 19:18:44'),
(82, 2, 'nueva tarea', 'y aqui la descripcion', '', 0, '2020-12-11 18:38:00'),
(89, 2, 'EDITADO', 'BORRADO!', '', 0, '2020-12-15 19:58:23'),
(90, 2, 'RESTAURAR', 'RESTABLECER', '', 0, '2020-12-15 19:58:39'),
(91, 18, 'ADMIN', 'ADMIN', '', 0, '2020-12-15 20:05:35'),
(92, 28, 'probando', 'está quedando tremend', '', 0, '2020-12-15 20:08:47'),
(93, 28, 'prueba2', 'probado\r\nTEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    TEXTO LARGO QUE PASA    ', '', 0, '2020-12-15 20:09:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `state` int(11) NOT NULL DEFAULT 1 COMMENT '0 = desactivado',
  `rol` char(1) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user`, `pass`, `email`, `state`, `rol`) VALUES
(2, 'checkz', '102030', 'checkz@hotmail.com', 1, 'U'),
(18, 'admin', 'admin', 'admin@admin.com', 1, 'A'),
(23, 'lalala', 'lalala', 'lalala@hotmail.com', 1, 'U'),
(24, 'rufo', '102030', 'rufo@rufo.com', 1, 'U'),
(28, 'probando', '1234', 'probando@pr.com', 1, 'U');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`registro_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `registro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
