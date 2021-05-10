-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-05-2021 a las 20:13:13
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `persanv1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicionales`
--

CREATE TABLE `adicionales` (
  `adicional_id` int(11) NOT NULL,
  `nombre_adicional` varchar(30) NOT NULL,
  `precio` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `correo_cliente` varchar(30) DEFAULT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `apellido_cliente` varchar(30) NOT NULL,
  `direccion_cliente` text NOT NULL,
  `es_preferencial` tinyint(1) NOT NULL,
  `es_mayorista` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_materiales`
--

CREATE TABLE `inventario_materiales` (
  `inventario_material` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_productos`
--

CREATE TABLE `inventario_productos` (
  `inventario_producto_id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `material_id` int(11) NOT NULL,
  `nombre_material` varchar(30) NOT NULL,
  `descripción_material` text NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `pago_id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `cantidad_pago` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `permiso_id` int(11) NOT NULL,
  `nombre_permiso` varchar(30) NOT NULL,
  `descripción_permiso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`permiso_id`, `nombre_permiso`, `descripción_permiso`) VALUES
(1, 'Administrador', 'Todos los permisos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `descripción_producto` text NOT NULL,
  `precio_producto` float NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_materiales`
--

CREATE TABLE `productos_materiales` (
  `producto_materiales_id` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_ventas`
--

CREATE TABLE `productos_ventas` (
  `productos_venta_id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `proveedor_id` int(11) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `direccion_proveedor` text DEFAULT NULL,
  `descripcion_proveedor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `sucursal_id` int(11) NOT NULL,
  `nombre_sucursal` varchar(30) NOT NULL,
  `direccion_sucursal` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`sucursal_id`, `nombre_sucursal`, `direccion_sucursal`) VALUES
(1, 'Matriz', 'Centro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `unidad_id` int(11) NOT NULL,
  `nombre_unidad` varchar(15) NOT NULL,
  `descripcion_unidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `direccion` text DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `username`, `password`, `nombre_usuario`, `apellido_usuario`, `telefono`, `direccion`, `id_sucursal`, `id_permiso`) VALUES
(1, 'ruben.mendoza', '$2y$12$ZdY8Qr58UlbaBHJsWZ5Q6Onp3nMi/XNbUDtO0874uDOpqpf7Su66G', 'Alejandro', 'Mendoza', 2211532584, 'Nogales 15509', 1, 1),
(17, 'admin', '$2y$12$jRYSuwAFCesUYuP7Wb5g4eItCxTKKwOeKodUA6YGfNLhcFZsL/cE6', 'Ruben Alejandro', 'Mendoza', 2211532584, 'Nogales 15509', NULL, NULL),
(18, 'admin2', '$2y$12$Hw7BIf9TPjhQwGwpiXexi.Gah/qlI2LF.4eHw1mxtKUoMOlf2Y3Hu', 'Alejandro', 'Dominguez', 2222889988, 'Centro', NULL, NULL),
(30, 'lore.santamaria', '$2y$12$zNHblkIBDH8ehRsHjEkW7.M7od/tB1iMRC9MO2FNZGJBCVkDVwkom', 'Lorena', 'Santamaria', 555555555, '38 sur', NULL, NULL),
(33, 'sara.dominguez', '$2y$12$HfXyM9cqaNorQZFuzq9.sOjgv2x9bVK.wnk6O0N7995O/UnDw095S', 'Sara', 'Dominguez', 2221938919, 'Centro', NULL, NULL),
(83, 'usuario.prueba7', '$2y$12$J.znGmCVZhZR7PSJDnRnbuluen4V1AA6soHzXI/T.7hmQpmRqiOF.', 'Usuario', 'Prueba', 2233333887, 'San ramon', 1, 1),
(101, 'usuario.test', '$2y$12$zp7bUHRXGRlqwU85A/WRP.wE8hbX9gUDKIuVo7OMbgBMgGucA.OAO', 'Prueba', 'Prueba', 66666666, 'Feliciano', 1, 1),
(111, 'roger.huesca', '$2y$12$4tLSs9amYn4PIVi/HFxcnur11TeB2KIEuWXNbEgNp43xcbmH2iPKC', 'Roger', 'Huesca', 22222222, 'uuuuuuuu', 1, 1),
(118, 'ruben.mend', '$2y$12$X0o/FXiNkWm2JNwj69Y2rus.xGDp4FRGoNvRu8poGjDG5cFujK7aS', 'Ruben', 'Mendoza', 222222222, 'Nogales', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `venta_id` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adicionales`
--
ALTER TABLE `adicionales`
  ADD PRIMARY KEY (`adicional_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `inventario_materiales`
--
ALTER TABLE `inventario_materiales`
  ADD PRIMARY KEY (`inventario_material`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `inventario_productos`
--
ALTER TABLE `inventario_productos`
  ADD PRIMARY KEY (`inventario_producto_id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pago_id`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`permiso_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_unidad` (`id_unidad`);

--
-- Indices de la tabla `productos_materiales`
--
ALTER TABLE `productos_materiales`
  ADD PRIMARY KEY (`producto_materiales_id`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos_ventas`
--
ALTER TABLE `productos_ventas`
  ADD PRIMARY KEY (`productos_venta_id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`sucursal_id`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`unidad_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adicionales`
--
ALTER TABLE `adicionales`
  MODIFY `adicional_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_materiales`
--
ALTER TABLE `inventario_materiales`
  MODIFY `inventario_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_productos`
--
ALTER TABLE `inventario_productos`
  MODIFY `inventario_producto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pago_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos_materiales`
--
ALTER TABLE `productos_materiales`
  MODIFY `producto_materiales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos_ventas`
--
ALTER TABLE `productos_ventas`
  MODIFY `productos_venta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `proveedor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `unidad_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario_materiales`
--
ALTER TABLE `inventario_materiales`
  ADD CONSTRAINT `inventario_materiales_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`material_id`);

--
-- Filtros para la tabla `inventario_productos`
--
ALTER TABLE `inventario_productos`
  ADD CONSTRAINT `inventario_productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`producto_id`);

--
-- Filtros para la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `materiales_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`proveedor_id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`venta_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`proveedor_id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`unidad_id`);

--
-- Filtros para la tabla `productos_ventas`
--
ALTER TABLE `productos_ventas`
  ADD CONSTRAINT `productos_ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`producto_id`),
  ADD CONSTRAINT `productos_ventas_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`venta_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`sucursal_id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`permiso_id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`cliente_id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`sucursal_id`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_vendedor`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
