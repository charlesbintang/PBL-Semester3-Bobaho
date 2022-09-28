-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2022 at 08:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bobaho`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `kata_sandi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `kata_sandi`) VALUES
(1, 'Charles', '5e4314d455238959972be1f534da1411');

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `id_costumer` int(11) NOT NULL,
  `nama_costumer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dibuat`
--

CREATE TABLE `dibuat` (
  `id_buat` int(11) NOT NULL,
  `kode_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membeli`
--

CREATE TABLE `membeli` (
  `kode_pesanan` int(11) NOT NULL,
  `id_costumer` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_pesanan` int(100) NOT NULL,
  `total_pesanan` int(100) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu_costumer`
--

CREATE TABLE `menu_costumer` (
  `id_menu` int(11) NOT NULL,
  `jenisproduk` text NOT NULL,
  `kategori` text NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `catatan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_costumer`
--

INSERT INTO `menu_costumer` (`id_menu`, `jenisproduk`, `kategori`, `namaproduk`, `harga`, `catatan`) VALUES
(3, 'minumann', 'new series', 'Vanilla gurih v2', 'Rp 15.000', 'ini vanilla makin enak bosque'),
(4, 'minuman', 'best seller', 'vanilla mulu', 'Rp 12.000', 'vanilla enak boii');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `dibuat`
--
ALTER TABLE `dibuat`
  ADD PRIMARY KEY (`id_buat`),
  ADD KEY `kode_pesanan` (`kode_pesanan`);

--
-- Indexes for table `membeli`
--
ALTER TABLE `membeli`
  ADD PRIMARY KEY (`kode_pesanan`),
  ADD KEY `id_costumer` (`id_costumer`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `menu_costumer`
--
ALTER TABLE `menu_costumer`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `jenisproduk` (`jenisproduk`(768)),
  ADD KEY `kategori` (`kategori`(768)),
  ADD KEY `nama_produk` (`namaproduk`),
  ADD KEY `harga` (`harga`,`catatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_costumer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dibuat`
--
ALTER TABLE `dibuat`
  MODIFY `id_buat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membeli`
--
ALTER TABLE `membeli`
  MODIFY `kode_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_costumer`
--
ALTER TABLE `menu_costumer`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dibuat`
--
ALTER TABLE `dibuat`
  ADD CONSTRAINT `dibuat_ibfk_1` FOREIGN KEY (`kode_pesanan`) REFERENCES `membeli` (`kode_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membeli`
--
ALTER TABLE `membeli`
  ADD CONSTRAINT `membeli_ibfk_1` FOREIGN KEY (`id_costumer`) REFERENCES `costumer` (`id_costumer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `membeli_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu_costumer` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
