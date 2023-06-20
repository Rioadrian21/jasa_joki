-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 04:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasa_joki`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `namaBank` varchar(128) NOT NULL,
  `atasNama` varchar(128) NOT NULL,
  `noRekening` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `namaBank`, `atasNama`, `noRekening`) VALUES
(2, 'BRI', 'Rio Adrian Putra', '0355-01-054950-50-3'),
(3, 'BCA', 'Dina Prasasti', '2310877681'),
(5, 'Shopeepay', 'Ilham Maulana Ramadhan', '+62 857-1128-1727'),
(6, 'Gopay', 'Ilham Maulana Ramadhan', '+62 857-1128-1727'),
(7, 'Dana', 'Ilham Maulana Ramadhan', '+62 857-1128-1727');

-- --------------------------------------------------------

--
-- Table structure for table `login_via`
--

CREATE TABLE `login_via` (
  `id` int(11) NOT NULL,
  `loginVia` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_via`
--

INSERT INTO `login_via` (`id`, `loginVia`) VALUES
(1, 'Moonton'),
(2, 'Tiktok'),
(3, 'Facebook'),
(4, 'VK');

-- --------------------------------------------------------

--
-- Table structure for table `order_joki`
--

CREATE TABLE `order_joki` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `noHp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `loginVia` varchar(128) NOT NULL,
  `userId` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `paketJoki` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `reqHero` varchar(128) NOT NULL,
  `tglOrder` int(11) NOT NULL,
  `buktiTf` varchar(128) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `status` enum('Sedang Diproses','Belum Bayar','Sudah Bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paket_joki`
--

CREATE TABLE `paket_joki` (
  `id` int(11) NOT NULL,
  `paket` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_joki`
--

INSERT INTO `paket_joki` (`id`, `paket`, `harga`) VALUES
(1, 'Open Mythic Grading (15 star)', 'Rp. 169.999,-'),
(2, 'GM V - Epic V', 'Rp. 114.999,-'),
(3, 'GM V - Legends V', 'Rp. 284.999,-'),
(4, 'GM V - Mythic', 'Rp. 489.999,-'),
(5, 'Epic V - Legend V', 'Rp. 169.999,-'),
(6, 'Epic V - Mythic', 'Rp. 374.999,-'),
(7, 'Epic IV - Mythic', 'Rp. 340.000,-'),
(8, 'Epic III - Mythic', 'Rp. 306.999,-'),
(9, 'Epic II - Mythic', 'Rp. 272.999,-'),
(10, 'Epic I - Mythic', 'Rp. 238.999,-'),
(11, 'Legend V - Mythic', 'Rp. 204.999,-'),
(12, 'Mythic 1 - Mythic 25', 'Rp. 339.999,-'),
(13, 'Mythic 25 - Mythic 50', 'Rp. 499.999,-'),
(14, 'Mythic 1 - Mythic 50', 'Rp. 839.999,-'),
(15, 'Mythic 50 - Mythic 100', 'Rp. 1.350.000,-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role`, `is_active`, `date_created`) VALUES
(15, 'Rio Adrian', 'rioadrian2105@gmail.com', 'profile.jpeg', '$2y$10$BnDLLEs8MVMliTemqfqyruthI1SQ7oggZlV27yI/SlaD/elHlxrG.', 'admin', 1, 1686155948);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_via`
--
ALTER TABLE `login_via`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_joki`
--
ALTER TABLE `order_joki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_joki`
--
ALTER TABLE `paket_joki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_via`
--
ALTER TABLE `login_via`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_joki`
--
ALTER TABLE `order_joki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `paket_joki`
--
ALTER TABLE `paket_joki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
