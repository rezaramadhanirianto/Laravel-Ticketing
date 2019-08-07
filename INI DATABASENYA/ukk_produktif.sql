-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 01:11 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_produktif`
--

-- --------------------------------------------------------

--
-- Table structure for table `bis`
--

CREATE TABLE `bis` (
  `id` int(11) NOT NULL,
  `bis` varchar(100) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bis`
--

INSERT INTO `bis` (`id`, `bis`, `jumlah_kursi`, `created_at`, `updated_at`) VALUES
(1, 'Agra Mas', 195, '2019-08-06 15:01:15', '2019-08-06 08:01:15'),
(2, 'Agra Merah', 200, '2019-08-06 00:22:01', '2019-08-06 00:22:01'),
(3, 'Doa Ibu', 100, '2019-08-06 00:22:16', '2019-08-06 00:22:16'),
(4, 'Doa Bapa', 200, '2019-08-06 00:22:26', '2019-08-06 00:22:26'),
(6, 'Agra Mas', 150, '2019-08-06 07:54:54', '2019-08-06 07:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id` int(11) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `id_pemesanan_head` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_bis` int(11) NOT NULL,
  `jadwal_berangkat` varchar(50) NOT NULL,
  `berangkat` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_bis`, `jadwal_berangkat`, `berangkat`, `tujuan`, `harga`, `jumlah_kursi`, `created_at`, `updated_at`) VALUES
(2, 2, '2019-08-08 12:01', 1, 1, '100000', 0, '2019-08-07 07:08:05', '2019-08-07 00:04:39'),
(3, 3, '2019-08-07 12:21', 1, 2, '98000', 98, '2019-08-07 09:15:41', '2019-08-07 02:15:41'),
(5, 3, '2019-08-06 14:03', 1, 1, '180.000', 98, '2019-08-07 09:15:33', '2019-08-07 02:15:33'),
(6, 3, '2019-08-07 00:12', 1, 1, '100.000', 100, '2019-08-06 23:51:38', '2019-08-06 23:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `kota_berangkat`
--

CREATE TABLE `kota_berangkat` (
  `id` int(11) NOT NULL,
  `kota_berangkat` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota_berangkat`
--

INSERT INTO `kota_berangkat` (`id`, `kota_berangkat`, `created_at`, `updated_at`) VALUES
(1, 'Bandung', '2019-08-07 02:18:26', '2019-08-06 19:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `kota_tujuan`
--

CREATE TABLE `kota_tujuan` (
  `id` int(11) NOT NULL,
  `kota_tujuan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota_tujuan`
--

INSERT INTO `kota_tujuan` (`id`, `kota_tujuan`, `created_at`, `updated_at`) VALUES
(1, 'Bogor', '2019-08-06 19:09:18', '2019-08-06 19:09:18'),
(2, 'Bandungs', '2019-08-07 02:09:44', '2019-08-06 19:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_pemesanan_head` int(11) NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_pemesanan_head`, `id_penumpang`, `id_jadwal`, `created_at`, `updated_at`) VALUES
(26, 11, 26, 3, '2019-08-07 01:14:23', '2019-08-07 01:14:23'),
(27, 11, 27, 3, '2019-08-07 01:14:23', '2019-08-07 01:14:23'),
(28, 12, 28, 3, '2019-08-07 01:14:24', '2019-08-07 01:14:24'),
(29, 12, 29, 3, '2019-08-07 01:14:24', '2019-08-07 01:14:24'),
(34, 15, 34, 6, '2019-08-07 02:16:36', '2019-08-07 02:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_head`
--

CREATE TABLE `pemesanan_head` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_head`
--

INSERT INTO `pemesanan_head` (`id`, `id_user`, `created_at`, `updated_at`) VALUES
(11, 1, '2019-08-07 01:14:23', '2019-08-07 01:14:23'),
(12, 1, '2019-08-07 01:14:24', '2019-08-07 01:14:24'),
(15, 4, '2019-08-07 02:16:36', '2019-08-07 02:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id`, `nama`, `umur`, `created_at`, `updated_at`) VALUES
(1, 'Restu', 16, '2019-08-06 20:01:23', '2019-08-06 20:01:23'),
(2, 'Bayu', 17, '2019-08-06 20:02:25', '2019-08-06 20:02:25'),
(3, 'Yuba', 17, '2019-08-06 20:02:25', '2019-08-06 20:02:25'),
(4, 'Banu', 17, '2019-08-06 20:03:04', '2019-08-06 20:03:04'),
(5, 'Bayu', 17, '2019-08-06 20:03:04', '2019-08-06 20:03:04'),
(6, 'Yuba', 17, '2019-08-06 20:03:05', '2019-08-06 20:03:05'),
(7, 'Satria', 12, '2019-08-06 20:12:58', '2019-08-06 20:12:58'),
(8, 'Satria', 31, '2019-08-06 20:12:58', '2019-08-06 20:12:58'),
(9, 'Banu', 13, '2019-08-06 20:12:58', '2019-08-06 20:12:58'),
(10, 'Satria', 13, '2019-08-06 20:12:58', '2019-08-06 20:12:58'),
(11, 'Ucup', 15, '2019-08-06 20:26:45', '2019-08-06 20:26:45'),
(12, 'Satria', 17, '2019-08-06 20:26:45', '2019-08-06 20:26:45'),
(13, 'Satria', 12, '2019-08-06 21:41:05', '2019-08-06 21:41:05'),
(14, 'Banu', 13, '2019-08-06 21:41:05', '2019-08-06 21:41:05'),
(15, 'Banu', 23, '2019-08-06 21:45:46', '2019-08-06 21:45:46'),
(16, 'Banu', 23, '2019-08-06 21:45:47', '2019-08-06 21:45:47'),
(17, 'Satria', 13, '2019-08-06 22:30:11', '2019-08-06 22:30:11'),
(18, 'Banu', 14, '2019-08-06 22:30:11', '2019-08-06 22:30:11'),
(19, 'Banu', 12, '2019-08-06 22:45:47', '2019-08-06 22:45:47'),
(20, 'Satria', 12, '2019-08-06 22:49:09', '2019-08-06 22:49:09'),
(21, 'Satria', 12, '2019-08-06 22:51:25', '2019-08-06 22:51:25'),
(22, 'Satria', 12, '2019-08-06 23:20:51', '2019-08-06 23:20:51'),
(23, 'Satria', 12, '2019-08-06 23:20:51', '2019-08-06 23:20:51'),
(24, 'Banu', 12, '2019-08-06 23:59:34', '2019-08-06 23:59:34'),
(25, 'Demo', 14, '2019-08-07 00:03:22', '2019-08-07 00:03:22'),
(26, 'Demo', 12, '2019-08-07 01:14:23', '2019-08-07 01:14:23'),
(27, 'Demo', 14, '2019-08-07 01:14:23', '2019-08-07 01:14:23'),
(28, 'Demo', 12, '2019-08-07 01:14:24', '2019-08-07 01:14:24'),
(29, 'Demo', 14, '2019-08-07 01:14:24', '2019-08-07 01:14:24'),
(30, 'Demo', 16, '2019-08-07 01:15:25', '2019-08-07 01:15:25'),
(31, 'Demo', 16, '2019-08-07 01:15:25', '2019-08-07 01:15:25'),
(32, 'Demo', 17, '2019-08-07 02:14:21', '2019-08-07 02:14:21'),
(33, 'Saya', 18, '2019-08-07 02:14:22', '2019-08-07 02:14:22'),
(34, 'Demo', 17, '2019-08-07 02:16:36', '2019-08-07 02:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `id_user`, `id_penumpang`, `id_jadwal`, `created_at`, `updated_at`) VALUES
(1, 2, 15, 2, '2019-08-06 21:49:40', '2019-08-06 21:49:40'),
(2, 2, 16, 2, '2019-08-06 21:49:40', '2019-08-06 21:49:40'),
(3, 2, 17, 2, '2019-08-06 22:44:00', '2019-08-06 22:44:00'),
(4, 2, 18, 2, '2019-08-06 22:44:00', '2019-08-06 22:44:00'),
(5, 2, 19, 3, '2019-08-06 22:46:41', '2019-08-06 22:46:41'),
(6, 1, 21, 2, '2019-08-06 22:52:30', '2019-08-06 22:52:30'),
(7, 1, 22, 2, '2019-08-06 23:21:48', '2019-08-06 23:21:48'),
(8, 1, 23, 2, '2019-08-06 23:21:48', '2019-08-06 23:21:48'),
(9, 1, 24, 3, '2019-08-07 00:00:46', '2019-08-07 00:00:46'),
(10, 1, 25, 2, '2019-08-07 00:04:39', '2019-08-07 00:04:39'),
(11, 4, 32, 5, '2019-08-07 02:15:32', '2019-08-07 02:15:32'),
(12, 4, 33, 5, '2019-08-07 02:15:32', '2019-08-07 02:15:32'),
(13, 1, 30, 3, '2019-08-07 02:15:41', '2019-08-07 02:15:41'),
(14, 1, 31, 3, '2019-08-07 02:15:41', '2019-08-07 02:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('0','1') NOT NULL COMMENT '0 => User biasa, 1 => Admin',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `no`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'Demo', 'demo@gmail.com', '081265351616', '$2y$10$2dpAQuDKLCzCcQUu7o1nWOMzFoSRasLX8qEzVm.96rH7iSsbsazaa', '0', '2019-08-05 20:19:12', '2019-08-05 20:19:12'),
(2, 'Admin', 'admin@gmail.com', '081234567890', '$2y$10$7jz7UvjT77xqWNSKrn9UzO78lhzly4R7vvtRm/xVQBJrAzCYBjFpC', '1', '2019-08-06 04:35:35', '2019-08-05 21:34:09'),
(3, 'Sadam', 'sadam@gmail.com', '01828316671', '$2y$10$FD..9e0ygy7fhy5tsYnTpOhBkp1ZHzyC5XuncxaSkFWejdotQcgJW', '0', '2019-08-05 21:49:42', '2019-08-05 21:49:42'),
(4, 'Saya', 'saya@gmail.com', '08128731731', '$2y$10$KKy7aWXcWXtGrp9UMJqvdOgcPXw9pEp8TafoOYHoYfrCY2tGtV8Vq', '0', '2019-08-07 02:13:43', '2019-08-07 02:13:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bis`
--
ALTER TABLE `bis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota_berangkat`
--
ALTER TABLE `kota_berangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan_head`
--
ALTER TABLE `pemesanan_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bis`
--
ALTER TABLE `bis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kota_berangkat`
--
ALTER TABLE `kota_berangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pemesanan_head`
--
ALTER TABLE `pemesanan_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
