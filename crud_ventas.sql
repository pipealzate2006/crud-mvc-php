-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 01:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_ventas`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`idproductos`, `nombre`, `precio`, `descripcion`) VALUES
(1, 'Iphone 12 Pro Max', 3500000, 'Apple iPhone 12 Pro Max (128 Gb) - Azul Pacífico (Reacondicionado)'),
(2, 'Apple AirPods', 1250000, 'Apple AirPods (3ª generación) con estuche de carga MagSafe - Distribuidor Autorizado'),
(3, 'Apple Watch SE GPS', 1000000, 'Apple Watch SE GPS - Caja de aluminio blanco estelar 40 mm - Correa deportiva blanco estelar - Patrón'),
(4, 'Xiaomi Poco X3 Pro', 900000, 'Xiaomi Poco X3 Pro 128 Gb Dual Sim 6 Gb Ram Cargador Estuche'),
(5, 'Acer Nitro 51s2 Ci5', 3500000, 'Portátil Acer Nitro 51s2 Ci5 12500H/8GB/512G/3050 15.6\" Color Negro + Gaming Nitro - NGR200');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idroles`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(300) NOT NULL,
  `idroles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombres`, `apellidos`, `celular`, `correo`, `password`, `idroles`) VALUES
(1, 'Felipe', 'Alzate', '3117029837', 'felipegil@gmail.com', '$2y$10$WRHPfDA3plmMeD3sLqzLouuqdxFUFUVIUDT8t//Miex4N2Cbi6136', 1),
(2, 'Dora', 'Gil Sanchez', '3127309729', 'dora@gmail.com', '$2y$10$C.2w5eMPDPR9zv4Pf4NQreSKM9ikSwXzQJPEYWIUmmgugg7nNkCI2', 1),
(3, 'Julian', 'Restrepo', '3228103847', 'julian@gmail.com', '$2y$10$dgzXo1obPyKmS/AD6IAzWe61vrF.aECyHZLK24VZ2WMfVlEJcz28y', 2),
(4, 'Laura', 'Gomez', '3139103892', 'laura@gmail.com', '$2y$10$lPpbB2ewpKvQhHvbQZ5PO.K6dGpzqV9losV1.HC46F70utRbVVEYK', 2),
(5, 'Juan Jose', 'Giraldo', '3142973027', 'juanjose@gmail.com', '$2y$10$9cjotf/7w43geDfciplPYufHGI1o5T.LVVd9z7Kad3yJrHFC887Bu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `idventas` int(11) NOT NULL,
  `descripcion_venta` varchar(200) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idproductos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`idventas`, `descripcion_venta`, `idusuarios`, `idproductos`) VALUES
(1, 'Compra de un telefono inteligente', 1, 1),
(2, 'Compra de un reloj inteligente de la marca apple', 2, 3),
(3, 'Compra de un celular de la marca xiaomi', 3, 4),
(4, 'Compra de unos airpods de la marca apple', 4, 2),
(5, 'Compra de un computador gaming', 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD KEY `fk_usuarios_roles1_idx` (`idroles`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventas`),
  ADD KEY `fk_ventas_productos1_idx` (`idproductos`),
  ADD KEY `fk_ventas_usuarios1_idx` (`idusuarios`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`idroles`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_productos1` FOREIGN KEY (`idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_usuarios1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
