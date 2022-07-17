-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2022 a las 06:31:16
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
-- Base de datos: `logistica`
--
CREATE DATABASE IF NOT EXISTS `logistica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `logistica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id` int(10) NOT NULL,
  `id_cotizacion` int(10) NOT NULL,
  `codigo_producto` int(10) NOT NULL,
  `nro_item` int(10) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `pais_origen` varchar(40) NOT NULL,
  `tip_unid_fisica` varchar(40) NOT NULL,
  `cant_unid_fisica` int(10) NOT NULL,
  `kilos_netos` int(10) NOT NULL,
  `total` double(10,2) NOT NULL,
  `sw` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id`, `id_cotizacion`, `codigo_producto`, `nro_item`, `descripcion`, `estado`, `pais_origen`, `tip_unid_fisica`, `cant_unid_fisica`, `kilos_netos`, `total`, `sw`) VALUES
(8, 626487, 3162423, 1, 'tarjeta de video', 'Nueva', 'mexico', 'general', 1, 1, 800.00, 1),
(9, 751181, 7345230, 3, 'pantalla', 'Usada como nueva', 'peru', 'granel', 1, 3, 200.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_cot`
--

CREATE TABLE `detalles_cot` (
  `id_detalle` int(10) NOT NULL,
  `id_cotizacion` int(10) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `proveedor` varchar(40) NOT NULL,
  `incoterm` varchar(10) NOT NULL,
  `pais_embarque` varchar(40) NOT NULL,
  `puerto_destino` varchar(40) NOT NULL,
  `moneda` varchar(40) NOT NULL,
  `n_contenedores` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles_cot`
--

INSERT INTO `detalles_cot` (`id_detalle`, `id_cotizacion`, `fecha_emision`, `fecha_vencimiento`, `proveedor`, `incoterm`, `pais_embarque`, `puerto_destino`, `moneda`, `n_contenedores`) VALUES
(7, 751181, '2022-07-01', '2022-07-22', 'galicia', 'FCA', 'Peru', 'Duanas', 'Dolar', 3),
(8, 626487, '2022-07-02', '2022-07-09', 'galicia', 'FCA', 'Colombia', 'Duanas', 'Dolar', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `codigo` int(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `preventa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_cliente`, `codigo`, `nombre`, `categoria`, `preventa`) VALUES
(1, 2532, 3162423, 'gtx 2060 super', 'electronica', 800),
(2, 5238, 7345230, 'Monitor Asus 22', 'electronica', 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `ruc` varchar(40) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `clave` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `ruc`, `correo`, `nombre`, `usuario`, `clave`) VALUES
(1, '100', 'jonh11@gmail.com', 'carlos', 'carlos22', '123'),
(2, '100', 'jaider@gmail.com', 'john', 'lol', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_cot`
--
ALTER TABLE `detalles_cot`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalles_cot`
--
ALTER TABLE `detalles_cot`
  MODIFY `id_detalle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
