-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 09:17 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `production_control`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `document_type` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `cell_phone_number` varchar(50) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `document_type`, `number`, `address`, `email`, `phone_number`, `cell_phone_number`, `state`, `created_at`, `updated_at`) VALUES
(1, 'SOPROT S.A.C.', 'DNI', '24234234234', 'Acasd asd asdasdasd', 'carl@asdasd.asd', '234234', '6234', 1, '2017-05-18 00:00:00', '2017-05-25 08:05:10'),
(2, 'OTOR', 'DNI', '46846545', 'Direccion', 'hola@gmail.com', '2131523', '234 23 4233', 2, '2017-05-23 06:34:13', '2017-05-23 06:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order_products`
--

CREATE TABLE `detail_order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `lot_product_id` int(11) NOT NULL,
  `quantity_order` int(11) NOT NULL,
  `quantity_delivered` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order_products`
--

INSERT INTO `detail_order_products` (`id`, `order_id`, `product_id`, `lot_product_id`, `quantity_order`, `quantity_delivered`, `state`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 20, 20, 1, '2017-05-25 00:33:34', '2017-05-25 00:33:34'),
(2, 2, 4, 1, 7, 7, 1, '2017-05-25 03:23:31', '2017-05-25 04:17:39'),
(3, 2, 4, 1, 5, 5, 3, '2017-05-25 03:59:45', '2017-05-25 05:05:04'),
(4, 2, 4, 1, 1, 1, 3, '2017-05-25 04:00:56', '2017-05-25 05:05:38'),
(5, 2, 4, 1, 1, 1, 1, '2017-05-25 04:19:19', '2017-05-25 04:41:40'),
(6, 2, 4, 1, 5, 4, 3, '2017-05-25 04:42:06', '2017-05-25 05:03:51'),
(7, 2, 4, 1, 1, 1, 3, '2017-05-25 04:42:57', '2017-05-25 04:45:31'),
(8, 2, 4, 1, 2, 0, 3, '2017-05-25 04:43:53', '2017-05-25 04:46:00'),
(9, 2, 4, 1, 3, 3, 1, '2017-05-25 04:52:07', '2017-05-25 04:52:07'),
(10, 2, 4, 1, 2, 2, 1, '2017-05-25 04:57:21', '2017-05-25 04:57:21'),
(11, 2, 4, 1, 2, 2, 1, '2017-05-25 04:57:35', '2017-05-25 04:57:35'),
(12, 2, 4, 1, 11, 11, 1, '2017-05-25 04:58:43', '2017-05-25 05:23:53'),
(13, 2, 4, 1, 5, 4, 3, '2017-05-25 04:59:55', '2017-05-25 05:01:55'),
(14, 3, 4, 1, 2, 2, 1, '2017-05-25 07:35:53', '2017-06-13 03:30:34'),
(15, 4, 5, 3, 19, 19, 1, '2017-05-25 18:28:39', '2017-05-25 18:42:13'),
(16, 3, 4, 1, 4, 2, 1, '2017-06-13 03:31:06', '2017-07-21 01:34:44'),
(17, 5, 4, 1, 22, 22, 3, '2017-07-21 01:35:56', '2017-07-21 01:36:24'),
(18, 5, 4, 1, 20, 18, 1, '2017-07-21 01:36:35', '2017-07-21 01:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `detail_production_planning_raw_materials`
--

CREATE TABLE `detail_production_planning_raw_materials` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `ten` int(15) NOT NULL,
  `twenty` int(15) NOT NULL,
  `thirty` int(15) NOT NULL,
  `forty` int(15) NOT NULL,
  `fifty` int(15) NOT NULL,
  `sixty` int(15) NOT NULL,
  `seventy` int(15) NOT NULL,
  `eighty` int(15) NOT NULL,
  `ninety` int(15) NOT NULL,
  `hundred` int(15) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_production_planning_raw_materials`
--

INSERT INTO `detail_production_planning_raw_materials` (`id`, `product_id`, `raw_material_id`, `ten`, `twenty`, `thirty`, `forty`, `fifty`, `sixty`, `seventy`, `eighty`, `ninety`, `hundred`, `state`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 1, '2017-05-23 23:33:38', '2017-05-24 04:15:36'),
(2, 3, 1, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, '2017-05-24 00:32:15', '2017-05-24 04:15:24'),
(3, 3, 2, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 1, '2017-05-24 03:39:40', '2017-05-24 04:16:16'),
(4, 4, 2, 1, 2, 3, 6, 5, 6, 7, 8, 9, 10, 1, '2017-05-24 07:31:22', '2017-07-12 03:39:00'),
(5, 1, 2, 2, 1, 3, 4, 5, 2, 1, 2, 1, 3, 1, '2017-05-24 07:36:58', '2017-05-24 07:37:14'),
(6, 2, 2, 1, 2, 3, 1, 2, 2, 2, 1, 3, 2, 1, '2017-05-24 07:37:23', '2017-05-24 07:37:44'),
(7, 2, 1, 3, 2, 1, 0, 1, 3, 1, 2, 1, 1, 1, '2017-05-24 07:37:24', '2017-05-24 07:37:47'),
(8, 5, 6, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, '2017-05-25 18:15:07', '2017-05-25 18:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `detail_production_product_lot_raw_materials`
--

CREATE TABLE `detail_production_product_lot_raw_materials` (
  `id` int(11) NOT NULL,
  `production_product_id` int(11) NOT NULL,
  `lot_raw_material_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_production_product_lot_raw_materials`
--

INSERT INTO `detail_production_product_lot_raw_materials` (`id`, `production_product_id`, `lot_raw_material_id`, `quantity`, `state`, `created_at`, `updated_at`) VALUES
(8, 2, 4, '12.00', 1, '2017-05-24 19:26:26', '2017-05-24 21:01:51'),
(9, 2, 5, '2.00', 1, '2017-05-24 20:44:47', '2017-05-24 20:47:24'),
(10, 2, 2, '4.00', 1, '2017-05-24 20:47:25', '2017-05-24 20:47:54'),
(11, 1, 7, '3.00', 1, '2017-05-25 02:27:53', '2017-05-25 02:35:20'),
(12, 3, 8, '2.00', 1, '2017-05-25 18:22:34', '2017-05-25 18:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `lot_products`
--

CREATE TABLE `lot_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_production` date NOT NULL,
  `quantity` decimal(15,0) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lot_products`
--

INSERT INTO `lot_products` (`id`, `product_id`, `date_production`, `quantity`, `state`, `created_at`, `updated_at`) VALUES
(1, 4, '2017-05-21', '21', 1, '2017-05-25 02:32:30', '2017-07-21 01:57:38'),
(2, 4, '2017-05-25', '10', 1, '2017-05-25 02:35:30', '2017-05-25 02:35:30'),
(3, 5, '2017-05-24', '0', 2, '2017-05-25 18:27:33', '2017-05-25 19:00:35'),
(4, 4, '2017-07-12', '21', 1, '2017-07-12 03:51:36', '2017-07-12 03:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `lot_raw_materials`
--

CREATE TABLE `lot_raw_materials` (
  `id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `quantity` int(15) NOT NULL,
  `date_entry` date NOT NULL,
  `date_expiration` date NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lot_raw_materials`
--

INSERT INTO `lot_raw_materials` (`id`, `raw_material_id`, `quantity`, `date_entry`, `date_expiration`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 123, '2017-05-02', '2017-05-23', 1, '2017-05-08 00:00:00', '2017-05-01 00:00:00'),
(2, 1, 41, '2017-05-01', '2017-05-24', 1, '2017-05-01 00:00:00', '2017-05-24 20:47:53'),
(3, 2, 210, '2017-05-17', '2017-05-08', 1, '2017-05-23 18:29:34', '2017-05-23 20:07:39'),
(4, 2, 317, '2017-05-01', '2017-05-31', 1, '2017-05-23 18:33:28', '2017-05-24 21:01:51'),
(5, 2, 8, '2017-05-01', '2017-05-19', 1, '2017-05-23 20:08:07', '2017-05-24 20:47:24'),
(6, 2, 0, '2017-05-06', '2017-05-18', 2, '2017-05-23 20:08:50', '2017-05-23 20:22:00'),
(7, 4, 9, '2017-05-18', '2017-05-27', 1, '2017-05-23 22:18:28', '2017-05-25 02:27:54'),
(8, 6, 19, '2017-05-01', '2017-05-18', 1, '2017-05-25 18:14:50', '2017-05-25 18:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `date_delivery_estimated` date NOT NULL,
  `time_delivery_estimated` time NOT NULL,
  `date_delivery_real` date DEFAULT NULL,
  `time_delivery_real` time DEFAULT NULL,
  `total_amount` decimal(15,2) DEFAULT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `priority`, `date_delivery_estimated`, `time_delivery_estimated`, `date_delivery_real`, `time_delivery_real`, `total_amount`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alta', '2017-05-26', '00:33:00', NULL, NULL, NULL, 3, '2017-05-24 22:03:37', '2017-05-24 22:08:18'),
(2, 1, 'Alta', '2017-05-08', '13:31:00', '2017-05-08', '12:03:00', '1722.00', 2, '2017-05-24 22:05:30', '2017-05-25 07:39:26'),
(3, 2, 'Alta', '2017-05-26', '12:34:00', '2017-06-16', '02:32:00', '246.00', 1, '2017-05-25 07:35:26', '2017-06-13 03:31:06'),
(4, 1, 'Alta', '2017-05-24', '12:12:00', '2017-05-26', '12:31:00', '190.00', 2, '2017-05-25 18:28:22', '2017-05-25 19:00:35'),
(5, 1, 'Normal', '2017-07-21', '10:12:00', '2017-07-21', '00:32:00', '2161.00', 2, '2017-07-21 01:35:31', '2017-07-21 01:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Secretario', 1, '2017-05-20 00:00:00', '2017-05-20 00:00:00'),
(2, 'Tesorero', 1, '2017-05-18 00:00:00', '2017-05-09 00:00:00'),
(3, 'as', 2, '2017-05-22 01:13:06', '2017-05-22 01:15:53'),
(4, 'adasdssssa', 2, '2017-05-22 01:16:27', '2017-05-23 08:35:47'),
(5, 'asdf', 1, '2017-05-23 08:35:52', '2017-05-23 08:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `production_products`
--

CREATE TABLE `production_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `quantity_estimated` int(11) NOT NULL,
  `quantity_real` int(15) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_products`
--

INSERT INTO `production_products` (`id`, `product_id`, `date_start`, `date_end`, `quantity_estimated`, `quantity_real`, `state`, `created_at`, `updated_at`) VALUES
(1, 4, '2017-05-20', '2017-07-12', 30, 21, 3, '2017-05-24 05:09:35', '2017-07-12 03:51:36'),
(2, 4, '2017-05-24', '2017-05-16', 20, 19, 3, '2017-05-24 07:38:42', '2017-05-24 21:01:51'),
(3, 5, '2017-05-25', '2017-05-24', 20, 20, 3, '2017-05-25 18:16:43', '2017-05-25 18:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `offer` decimal(11,2) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `fullname`, `stock`, `price`, `offer`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Preservantes de 1Tl', 1231, '127.00', '12.00', 1, '2017-05-10 00:00:00', '2017-05-23 07:19:55'),
(2, 'asdas dasd', 0, '234.00', '24.50', 1, '2017-05-23 07:21:02', '2017-05-23 07:21:43'),
(3, 'sdfsdf', 0, '123.00', '21.00', 1, '2017-05-23 07:28:34', '2017-05-23 07:28:34'),
(4, 'Adsd', 201, '123.00', '0.00', 1, '2017-05-23 07:29:22', '2017-07-21 01:57:38'),
(5, 'nuevo producto', 0, '10.00', '0.00', 1, '2017-05-25 18:13:55', '2017-05-25 18:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity` int(15) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `fullname`, `unit`, `quantity`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Materia prima 2', '', 12313, 1, '2017-05-24 00:00:00', '2017-05-24 21:01:51'),
(2, 'Materia prima 1', 'T', 1246, 1, '2017-05-17 00:00:00', '2017-05-25 02:27:54'),
(3, 'Materia prima 3', '', -1, 2, '2017-05-23 08:37:03', '2017-05-23 20:00:44'),
(4, 'Materia prima 4', 'f³', 7, 1, '2017-05-23 22:12:25', '2017-05-24 20:47:54'),
(5, 'as', 'Kg', 0, 1, '2017-05-25 18:12:53', '2017-05-25 18:12:53'),
(6, 'nueva materia prima', 'T', 19, 1, '2017-05-25 18:14:16', '2017-05-25 18:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rol`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 1, '2017-05-17 00:00:00', '2017-05-29 00:00:00'),
(2, 'Jefe de producción', 1, '2017-05-09 00:00:00', '2017-05-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `cell_phone_number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `position_id`, `fullname`, `address`, `phone_number`, `cell_phone_number`, `email`, `civil_status`, `date`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 'Carl Rueda Diaz', 'D ASD AS ASd', '213123', '34524235', 'car..rdj@sda.asd', 'Casado', '2017-05-22', 2, '2017-05-17 00:00:00', '2017-05-21 07:15:31'),
(2, 2, 'Hola Huopoasd asd asd', 'Asd asd asd', '34 345345', '234 234 234', 'asdas@asd.asd', 'Soltero', '2017-05-15', 2, '2017-05-25 13:23:33', '2017-05-23 06:42:45'),
(3, 1, 'axasdasd', 'asdasd', '2342', '34234', 'asdas@asd.asd', 'Casado', '2017-05-18', 1, '2017-05-21 05:49:15', '2017-05-21 06:13:37'),
(4, 2, 'Hola', 'Holasd asd', '0144665', '5984455466', 'asdasdas@asdasd.asd', 'Casado', '2017-05-09', 1, '2017-05-17 00:00:00', '2017-05-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rol_id`, `staff_id`, `fullname`, `username`, `avatar`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Mr. Newton Boyer IV', 'hane.sherman', 'http://lorempixel.com/100/100/people/?58822', 'gkling@example.com', '$2y$10$jkLRhAtDPzx2oO3dQu8LUeA9TR4zmzRaiqtdUzf4dFLjqy.faf.uC', 'I4pwqdyfEp', '2017-05-19 09:26:15', '2017-05-19 09:26:15'),
(3, 1, 3, 'Prof. Travon Eichmann DDS', 'waelchi.evelyn', 'http://lorempixel.com/100/100/people/?42233', 'upton.nickolas@example.org', '$2y$10$jkLRhAtDPzx2oO3dQu8LUeA9TR4zmzRaiqtdUzf4dFLjqy.faf.uC', 'mBrupBig1l', '2017-05-19 09:26:15', '2017-05-19 09:26:15'),
(11, 1, 1, 'Carlos Rueda Diaz', 'Carl RDJ', '2pKbvrmDc3P2JaQUsIb1qBXfjcpI9GarNHzYjeeB.jpeg', 'carl.rdj@gmail.com', '$2y$10$jkLRhAtDPzx2oO3dQu8LUeA9TR4zmzRaiqtdUzf4dFLjqy.faf.uC', '1X6698WrvxYdbHtqFPHCuXvIllt7TSde5rmEES9oQ1kZbX0BOk8iyF1CjmHw', '2017-05-18 05:00:00', '2017-05-21 14:29:26'),
(12, 1, 3, 'axasdasd', '234', 'logo.jpg', 'asdas@asd.asd', '$2y$10$AA4PqRvr1AxanrvEM.246.Nwt89fIy5y7BL7qH.qTNzeve3ueJFme', NULL, '2017-05-21 13:42:24', '2017-05-21 13:42:24'),
(13, 2, 1, 'Carl Rueda Diaz', 'ssssssss', 'logo.jpg', 'car..rdj@sda.asd', '$2y$10$T0dWAs7o4mvWfGpP2rO2ROlPxOG6OhFU0b5agrq5ietdEO2L4Yc6O', NULL, '2017-05-21 13:42:42', '2017-05-21 13:53:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_order_products`
--
ALTER TABLE `detail_order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`lot_product_id`),
  ADD KEY `produ` (`product_id`);

--
-- Indexes for table `detail_production_planning_raw_materials`
--
ALTER TABLE `detail_production_planning_raw_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_planning_id` (`product_id`),
  ADD KEY `raw_material_id` (`raw_material_id`);

--
-- Indexes for table `detail_production_product_lot_raw_materials`
--
ALTER TABLE `detail_production_product_lot_raw_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_product_id` (`production_product_id`),
  ADD KEY `lot_raw_material_id` (`lot_raw_material_id`);

--
-- Indexes for table `lot_products`
--
ALTER TABLE `lot_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `lot_raw_materials`
--
ALTER TABLE `lot_raw_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_material_id` (`raw_material_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_products`
--
ALTER TABLE `production_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD KEY `id` (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_order_products`
--
ALTER TABLE `detail_order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `detail_production_planning_raw_materials`
--
ALTER TABLE `detail_production_planning_raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `detail_production_product_lot_raw_materials`
--
ALTER TABLE `detail_production_product_lot_raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lot_products`
--
ALTER TABLE `lot_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lot_raw_materials`
--
ALTER TABLE `lot_raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `production_products`
--
ALTER TABLE `production_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order_products`
--
ALTER TABLE `detail_order_products`
  ADD CONSTRAINT `fk_contraint_lot_product` FOREIGN KEY (`lot_product_id`) REFERENCES `lot_products` (`id`),
  ADD CONSTRAINT `fk_contraint_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `detail_production_planning_raw_materials`
--
ALTER TABLE `detail_production_planning_raw_materials`
  ADD CONSTRAINT `fk_contraint_product_02` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_contraint_raw_material_02` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`);

--
-- Constraints for table `detail_production_product_lot_raw_materials`
--
ALTER TABLE `detail_production_product_lot_raw_materials`
  ADD CONSTRAINT `fk_contraint_lot_raw_material` FOREIGN KEY (`lot_raw_material_id`) REFERENCES `lot_raw_materials` (`id`),
  ADD CONSTRAINT `fk_contraint_production_product` FOREIGN KEY (`production_product_id`) REFERENCES `production_products` (`id`);

--
-- Constraints for table `lot_products`
--
ALTER TABLE `lot_products`
  ADD CONSTRAINT `fk_contraint_product_01` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `lot_raw_materials`
--
ALTER TABLE `lot_raw_materials`
  ADD CONSTRAINT `fk_contraint_raw_material` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_contraint_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `production_products`
--
ALTER TABLE `production_products`
  ADD CONSTRAINT `fk_contraint_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `fk_contraint_position` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_contraint_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `fk_contraint_staff` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
