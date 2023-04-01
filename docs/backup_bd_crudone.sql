-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 02:20 AM
-- Server version: 8.0.26
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_bd_crudone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_product`
--

CREATE TABLE `tm_product` (
  `product_id` int NOT NULL,
  `product_name` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `product_description` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL,
  `state` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_product`
--

INSERT INTO `tm_product` (`product_id`, `product_name`, `product_description`, `date_create`, `date_update`, `date_delete`, `state`) VALUES
(1, 'Teclado', 'Teclado Razor RGB', '2023-03-30 18:40:26', NULL, '2023-03-31 12:10:23', b'0'),
(2, 'Cargador', 'Cargador movil ASUS', '2023-03-30 18:40:26', NULL, '2023-03-31 12:10:26', b'0'),
(3, 'Mouse', 'Mouse hp', '2023-03-31 04:31:40', NULL, '2023-03-31 12:10:30', b'0'),
(4, 'Ventilador', 'Ventilador verde', '2023-03-31 04:31:40', NULL, '2023-03-31 12:08:20', b'1'),
(5, 'Celular', 'Celular Motorola', '2023-03-31 04:33:26', NULL, '2023-03-31 11:47:37', b'1'),
(6, 'Silla Gamer', 'Silla Gamer RGB ergonomica', '2023-03-31 04:33:26', NULL, '2023-03-31 12:10:33', b'0'),
(7, 'Control remoto', 'Control remoto de TV', '2023-03-30 22:18:55', NULL, '2023-03-31 11:53:04', b'1'),
(8, 'Laptop', 'Laptop ASUS ROG Strix Scar', '2023-03-30 22:26:54', '2023-03-31 18:09:28', '2023-03-31 12:09:05', b'1'),
(9, 'Lentes', 'Lentes de sol', '2023-03-30 22:27:27', NULL, '2023-03-31 11:20:23', b'1'),
(10, 'Lapiz', 'Lapiz Faber Castell', '2023-03-30 22:47:19', NULL, '2023-03-31 12:10:41', b'0'),
(11, 'papel', 'Papel de hoja bond', '2023-03-30 22:48:34', NULL, '2023-03-31 12:10:44', b'0'),
(12, 'billetera', 'Billetera billabongs', '2023-03-31 10:35:05', '2023-03-31 18:10:19', '2023-03-31 11:48:38', b'1'),
(22, 'Gorrito', 'Gorro para sol', '2023-03-31 12:26:12', '2023-03-31 12:26:18', NULL, b'1'),
(23, 'Sombrero', 'Sombrero para playa', '2023-03-31 12:26:25', NULL, NULL, b'1'),
(24, 'Cepillo', 'Cepillo dental', '2023-03-31 18:07:19', '2023-03-31 18:09:00', NULL, b'1'),
(25, 'Panel solar', 'Panel solar de 20m', '2023-03-31 18:09:44', '2023-03-31 18:09:54', NULL, b'1'),
(26, 'Fotos', 'Fotos de parejas', '2023-03-31 18:10:10', NULL, NULL, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_product`
--
ALTER TABLE `tm_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_product`
--
ALTER TABLE `tm_product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
