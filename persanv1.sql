-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2021 at 07:41 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persanv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `adicionales`
--

CREATE TABLE `adicionales` (
  `adicional_id` int(11) NOT NULL,
  `nombre_adicional` varchar(30) NOT NULL,
  `precio` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `correo_cliente` varchar(30) DEFAULT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `apellido_cliente` varchar(30) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `direccion_cliente` text NOT NULL,
  `es_preferencial` tinyint(1) NOT NULL,
  `es_mayorista` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `id_usuario`, `correo_cliente`, `nombre_cliente`, `apellido_cliente`, `telefono`, `direccion_cliente`, `es_preferencial`, `es_mayorista`) VALUES
(1, 30, '', 'Lorena', 'Santamaria Ramirez', 2222222222, 'no tiene', 0, 0),
(2, 30, '', 'Cliente 3', 'Prueba', 2222222222, '2 suer', 0, 0),
(3, 30, '', 'Cliente 4', 'Prueba', 2222222222, '2 suer', 0, 0),
(4, 30, '', 'Cliente 5', 'Prueba', 2222222222, '2 suer', 0, 0),
(5, 30, '', 'Cliente 6', 'Nuevo', 2222222222, 'no', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventario_materiales`
--

CREATE TABLE `inventario_materiales` (
  `inventario_material` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventario_productos`
--

CREATE TABLE `inventario_productos` (
  `inventario_producto_id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materiales`
--

CREATE TABLE `materiales` (
  `material_id` int(11) NOT NULL,
  `nombre_material` varchar(30) NOT NULL,
  `descripción_material` text NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `pago_id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `cantidad_pago` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `permiso_id` int(11) NOT NULL,
  `nombre_permiso` varchar(30) NOT NULL,
  `descripción_permiso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`permiso_id`, `nombre_permiso`, `descripción_permiso`) VALUES
(1, 'Administrador', 'Todos los permisos');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
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
-- Table structure for table `productos_materiales`
--

CREATE TABLE `productos_materiales` (
  `producto_materiales_id` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productos_ventas`
--

CREATE TABLE `productos_ventas` (
  `productos_venta_id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `proveedor_id` int(11) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `direccion_proveedor` text,
  `descripcion_proveedor` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sucursales`
--

CREATE TABLE `sucursales` (
  `sucursal_id` int(11) NOT NULL,
  `nombre_sucursal` varchar(30) NOT NULL,
  `direccion_sucursal` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sucursales`
--

INSERT INTO `sucursales` (`sucursal_id`, `nombre_sucursal`, `direccion_sucursal`) VALUES
(1, 'Matriz', 'Centro');

-- --------------------------------------------------------

--
-- Table structure for table `unidades`
--

CREATE TABLE `unidades` (
  `unidad_id` int(11) NOT NULL,
  `nombre_unidad` varchar(15) NOT NULL,
  `descripcion_unidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `direccion` text,
  `id_sucursal` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `username`, `password`, `nombre_usuario`, `apellido_usuario`, `telefono`, `direccion`, `id_sucursal`, `id_permiso`) VALUES
(1, 'ruben.mendoza', '$2y$12$ZdY8Qr58UlbaBHJsWZ5Q6Onp3nMi/XNbUDtO0874uDOpqpf7Su66G', 'Alejandro', 'Mendoza', 2211532584, 'Nogales 15509', 1, 1),
(17, 'admin', '$2y$12$jRYSuwAFCesUYuP7Wb5g4eItCxTKKwOeKodUA6YGfNLhcFZsL/cE6', 'Ruben Alejandro', 'Mendoza', 2211532584, 'Nogales 15509', NULL, NULL),
(18, 'admin2', '$2y$12$Hw7BIf9TPjhQwGwpiXexi.Gah/qlI2LF.4eHw1mxtKUoMOlf2Y3Hu', 'Alejandro', 'Dominguez', 2222889988, 'Centro', NULL, NULL),
(30, 'lore.santamaria', '$2y$12$ie756w/KBuzXp1N8dSeGJuXnsVmLb8H9eJqc3mHa1WWkXji8f0udu', 'Lorena', 'Santamaria', 555555555, '38 sur', NULL, NULL),
(33, 'sara.dominguez', '$2y$12$HfXyM9cqaNorQZFuzq9.sOjgv2x9bVK.wnk6O0N7995O/UnDw095S', 'Sara', 'Dominguez', 2221938919, 'Centro', NULL, NULL),
(83, 'usuario.prueba7', '$2y$12$J.znGmCVZhZR7PSJDnRnbuluen4V1AA6soHzXI/T.7hmQpmRqiOF.', 'Usuario', 'Prueba', 2233333887, 'San ramon', 1, 1),
(101, 'usuario.test', '$2y$12$zp7bUHRXGRlqwU85A/WRP.wE8hbX9gUDKIuVo7OMbgBMgGucA.OAO', 'Prueba', 'Prueba', 66666666, 'Feliciano', 1, 1),
(118, 'ruben.mend', '$2y$12$X0o/FXiNkWm2JNwj69Y2rus.xGDp4FRGoNvRu8poGjDG5cFujK7aS', 'Ruben', 'Mendoza', 222222222, 'Nogales', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `adicionales`
--
ALTER TABLE `adicionales`
  ADD PRIMARY KEY (`adicional_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `inventario_materiales`
--
ALTER TABLE `inventario_materiales`
  ADD PRIMARY KEY (`inventario_material`),
  ADD KEY `id_material` (`id_material`);

--
-- Indexes for table `inventario_productos`
--
ALTER TABLE `inventario_productos`
  ADD PRIMARY KEY (`inventario_producto_id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pago_id`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`permiso_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_unidad` (`id_unidad`);

--
-- Indexes for table `productos_materiales`
--
ALTER TABLE `productos_materiales`
  ADD PRIMARY KEY (`producto_materiales_id`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `productos_ventas`
--
ALTER TABLE `productos_ventas`
  ADD PRIMARY KEY (`productos_venta_id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indexes for table `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`sucursal_id`);

--
-- Indexes for table `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`unidad_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adicionales`
--
ALTER TABLE `adicionales`
  MODIFY `adicional_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventario_materiales`
--
ALTER TABLE `inventario_materiales`
  MODIFY `inventario_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventario_productos`
--
ALTER TABLE `inventario_productos`
  MODIFY `inventario_producto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materiales`
--
ALTER TABLE `materiales`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pago_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos_materiales`
--
ALTER TABLE `productos_materiales`
  MODIFY `producto_materiales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos_ventas`
--
ALTER TABLE `productos_ventas`
  MODIFY `productos_venta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `proveedor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unidades`
--
ALTER TABLE `unidades`
  MODIFY `unidad_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventario_materiales`
--
ALTER TABLE `inventario_materiales`
  ADD CONSTRAINT `inventario_materiales_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`material_id`);

--
-- Constraints for table `inventario_productos`
--
ALTER TABLE `inventario_productos`
  ADD CONSTRAINT `inventario_productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`producto_id`);

--
-- Constraints for table `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `materiales_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`proveedor_id`);

--
-- Constraints for table `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`venta_id`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`proveedor_id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`unidad_id`);

--
-- Constraints for table `productos_ventas`
--
ALTER TABLE `productos_ventas`
  ADD CONSTRAINT `productos_ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`producto_id`),
  ADD CONSTRAINT `productos_ventas_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`venta_id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`sucursal_id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`permiso_id`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`cliente_id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`sucursal_id`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_vendedor`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
