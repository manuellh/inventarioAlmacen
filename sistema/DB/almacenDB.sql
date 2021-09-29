-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-12-2020 a las 03:20:46
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id13590286_almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `idAlmacen` int(11) NOT NULL,
  `nombreAlmacen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcionAlmacen` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`idAlmacen`, `nombreAlmacen`, `descripcionAlmacen`) VALUES
(1, 'almacen uno', 'almacen uno'),
(2, 'INTERIOR', 'ALMACEN INTERIOR'),
(3, 'EXTERIOR', 'ALMACEN EXTERIOR'),
(4, 'Almacen 4', 'Almacen 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `razon` varchar(255) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `razon`, `telefono`, `direccion`) VALUES
(1, 'Nexteer Automotive 65', 'Nexteer Automotive Mexico S De R.l De C.v - Sociedades Mexicanas con Inversión Extranjera', '442-211-5200', 'Avenida, Santa Rosa de Viterbo 12, Parque Ind. Finsa, 76246 Santiago de Querétaro, Qro.'),
(2, 'Dräxlmaier', 'DRAEXLMAIER COMPONENTS AUTOMOTIVE DE MEXICO S. DE R.L. DE C.V.', '444 137 1345', 'Circuito Zelkova No. 3 Col. Rancho Los Guantes Parque Industrial Sendai C.P. 38424 Valle de Santiago, Guanajuato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `moneda` varchar(50) DEFAULT NULL,
  `costoMoneda` double DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `moneda`, `costoMoneda`, `total`) VALUES
(60, '2020-06-18 03:08:11', 'MXN', 1, 575),
(61, '2020-06-18 04:01:33', 'MXN', 1, 575),
(62, '2020-06-18 04:03:20', 'MXN', 1, 575),
(63, '2020-06-18 04:08:26', 'MXN', 1, 575),
(64, '2020-06-19 17:11:14', 'USD', 22.27, 7116),
(65, '2020-07-01 18:51:30', 'MXN', 1, 2500),
(66, '2020-08-10 14:09:51', 'MXN', 1, 3500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda_cambio`
--

CREATE TABLE `moneda_cambio` (
  `id` int(11) NOT NULL,
  `moneda` varchar(50) DEFAULT NULL,
  `costo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `moneda_cambio`
--

INSERT INTO `moneda_cambio` (`id`, `moneda`, `costo`) VALUES
(1, 'MXN', 1),
(2, 'USD', 22.39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL DEFAULT '0',
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `moneda` int(11) NOT NULL DEFAULT 0,
  `precioVenta` decimal(10,2) NOT NULL,
  `precioCompra` decimal(10,2) NOT NULL,
  `existencia` bigint(20) DEFAULT 0,
  `proveedor` int(11) NOT NULL,
  `almacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `moneda`, `precioVenta`, `precioCompra`, `existencia`, `proveedor`, `almacen`) VALUES
(12, '074983171293', 'UTPSP7BUY', 'Patch cord de 7FT azul', 2, 14.00, 11.00, 183, 1, 2),
(13, '02147483647', 'CFPE2WHY', 'Panduit Placa Ejecutiva 2 Ventanas', 2, 2.00, 2.00, 121, 1, 2),
(14, '43223303', ' Anixter 6D460-7G', 'Anixter 6D460-7G', 1, 115.00, 100.00, 63, 2, 2),
(23, '074983008964', 'FOSMF', 'Charola de Empalme para Fibra Óptica, Para Protección de 24 Empalmes', 0, 150.50, 127.63, 50, 1, 2),
(24, '074983921935', 'FX2ERLNLNSNM001', 'Jumper multimodo OM3 de 2 fibras LC  to duplex LC', 0, 75.50, 73.48, 40, 1, 2),
(25, '074983097036', 'CJK688TGBL', 'Módulo universal, Codificado, Categoría 6, RJ45, 8 posiciones, 8 cables.', 0, 18.24, 15.32, 26, 1, 2),
(26, '7501483187071', 'COM-595', 'Lector de codigo de barras USB', 1, 774.00, 500.00, 7, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comprados`
--

CREATE TABLE `productos_comprados` (
  `id` int(11) NOT NULL,
  `id_Producto` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `codigo` varchar(50) DEFAULT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_compra` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_comprados`
--

INSERT INTO `productos_comprados` (`id`, `id_Producto`, `codigo`, `producto`, `cantidad`, `id_compra`) VALUES
(48, 23, '074983008964', 'FOSMF', 50, 64),
(49, 24, '074983921935', 'FX2ERLNLNSNM001', 10, 64),
(50, 26, '7501483187071', 'Lector de codigo de barras USB', 5, 65),
(51, 26, '7501483187071', 'COM-595', 7, 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL DEFAULT '',
  `producto` varchar(50) NOT NULL DEFAULT '',
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id`, `id_producto`, `codigo`, `producto`, `cantidad`, `id_cliente`, `id_venta`) VALUES
(9, 24, '074983921935', 'FX2ERLNLNSNM001', 10, 2, 4),
(10, 24, '074983921935', 'FX2ERLNLNSNM001', 10, 1, 5),
(11, 26, '7501483187071', 'Lector de codigo de barras USB', 5, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `razon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moneda_Proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `razon`, `rfc`, `direccion`, `contacto`, `img`, `moneda_Proveedor`) VALUES
(1, 'COMERCIALIZADORA LUGUER', 'LUGUER MEXICO SA DE CV', 'CLU9512154BA', 'Av. Tlacote 422, C.E.A., 76179 Santiago de Querétaro, Qro.', '442 242 7804', 'https://i.pinimg.com/originals/13/69/ad/1369adcc608031bb35e1f13f8f18b1de.jpg', 2),
(2, 'MISCELÁNEA ELECTROINDUSTRIAL (MISCELEC)', 'MISCELÁNEA ELECTROINDUSTRIAL (MISCELEC, S.A. DE C.V.) ', 'MEI130312KX5', 'Av. 5 de Febrero 1316, Industrias la Montana, Los Molinos, 76150 Santiago de Querétaro, Qro.', '442 238 4250', 'https://i.pinimg.com/originals/f8/78/22/f87822e4d6af893d73f0d4a509f29e08.jpg', 1),
(3, 'Steren (Zaragoza)', 'Electrónica Steren, S. A. de C.V.', 'SPE941215H43', 'Calle Ignacio Zaragoza 281 Pte, El Prado, 76039 Santiago de Querétaro, Qro.', '442 242 4347', 'https://http2.mlstatic.com/kit-de-caja-de-toques-de-alta-potencia-para-armar-steren-D_NQ_NP_703211-MLM29196112516_012019-F.jpg', 1),
(4, 'GRUPO DICE TELECOMUNICACIONES', 'GRUPO DICE, SA DE CV', 'GDI880315IYA', 'AV. LUIS VEGA Y MONRROY NO. 407 COL. BALAUSTRADAS QUERÉTARO QRO MEX', '+52 (442) 153-3400 ', 'https://i.pinimg.com/originals/04/26/59/042659426ea455b22e8b61aa8ec6d3e1.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contrasena`) VALUES
(1, 'manuel', 'MANUEL_INGE-TEL', '123456'),
(2, 'almacen', 'almacen', 'inge05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `moneda` varchar(50) NOT NULL DEFAULT '',
  `costoMoneda` double NOT NULL DEFAULT 0,
  `total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `moneda`, `costoMoneda`, `total`) VALUES
(4, '2020-06-19 01:42:42', 'USD', 22.27, 755.00),
(5, '2020-06-19 17:12:33', 'USD', 22.27, 755.00),
(6, '2020-07-01 18:52:29', 'MXN', 1, 3870.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`idAlmacen`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `moneda_cambio`
--
ALTER TABLE `moneda_cambio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedor` (`proveedor`),
  ADD KEY `almacen` (`almacen`),
  ADD KEY `moneda` (`moneda`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cantidad` (`cantidad`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `id_venta` (`id_compra`) USING BTREE,
  ADD KEY `id_Producto` (`id_Producto`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `moneda_Proveedor` (`moneda_Proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `idAlmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `moneda_cambio`
--
ALTER TABLE `moneda_cambio`
  ADD CONSTRAINT `moneda_cambio_ibfk_1` FOREIGN KEY (`id`) REFERENCES `proveedor` (`moneda_Proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`almacen`) REFERENCES `almacen` (`idAlmacen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD CONSTRAINT `productos_comprados_ibfk_4` FOREIGN KEY (`id_Producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_comprados_ibfk_5` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
