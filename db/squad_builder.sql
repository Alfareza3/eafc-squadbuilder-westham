-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2025 at 06:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `squad_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemain`
--

CREATE TABLE `pemain` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` int NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kapten_urutan` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('starter','sub','cadangan') DEFAULT 'starter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemain`
--

INSERT INTO `pemain` (`id`, `nama`, `nomor`, `posisi`, `foto`, `kapten_urutan`, `created_at`, `status`) VALUES
(1, 'Ginola', 14, 'LW', 'ginola.avif', 5, '2025-08-01 02:47:02', 'starter'),
(2, 'Shevchenko', 9, 'ST', 'shevchenko.avif', 0, '2025-08-01 02:54:57', 'starter'),
(3, 'Olise', 17, 'RW', 'olise.avif', 0, '2025-08-01 02:55:15', 'starter'),
(4, 'Szoboszlai', 8, 'CM', 'szoboszlai.avif', 0, '2025-08-01 02:55:36', 'starter'),
(5, 'Keane', 16, 'CDM', 'keane.avif', 3, '2025-08-01 02:56:00', 'starter'),
(6, 'Scholes', 18, 'CM', 'scholes.avif', 4, '2025-08-01 02:56:21', 'starter'),
(7, 'Lizarazu', 2, 'LB', 'lizarazu.avif', 0, '2025-08-01 02:56:40', 'starter'),
(8, 'Tah', 5, 'CB', 'tah.avif', 0, '2025-08-01 02:57:03', 'starter'),
(9, 'Koeman', 4, 'CB', 'koeman.avif', 2, '2025-08-01 02:57:21', 'starter'),
(10, 'Alexander-Arnold', 12, 'RB', 'alexander-arnold.avif', 0, '2025-08-01 02:57:46', 'starter'),
(11, 'De Gea', 1, 'GK', 'de gea.avif', 0, '2025-08-01 02:58:03', 'starter'),
(12, 'Van Persie', 10, 'ST', 'van persie.avif', 0, '2025-08-01 02:58:25', 'sub'),
(13, 'Vini Jr.', 7, 'LW', 'vini.avif', 0, '2025-08-01 05:48:32', 'sub'),
(14, 'Di Maria', 11, 'CAM', 'di maria.avif', 0, '2025-08-01 05:48:47', 'sub'),
(15, 'McTominay', 39, 'CM', 'mctominay.avif', 0, '2025-08-01 05:49:35', 'sub'),
(16, 'Calafiori', 33, 'LB', 'calafiori.avif', 0, '2025-08-01 05:49:56', 'sub'),
(17, 'Maldini', 3, 'CB', 'maldini.avif', 1, '2025-08-01 05:50:15', 'sub'),
(18, 'Martinez', 23, 'GK', 'martinez.avif', 0, '2025-08-01 05:50:39', 'sub'),
(19, 'Tanaka', 22, 'CDM', 'tanaka.avif', 0, '2025-08-01 05:54:38', 'cadangan'),
(20, 'Pickford', 13, 'GK', 'pickford.avif', 0, '2025-08-01 05:55:00', 'cadangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
