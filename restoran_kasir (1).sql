-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2025 at 05:20 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_kasir`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateOrder` (IN `p_idpelanggan` INT, IN `p_idmeja` INT, IN `p_iduser` INT, IN `p_items` JSON)   BEGIN
  -- [Implementasi lengkap seperti sebelumnya]
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `idmeja` int NOT NULL,
  `nomor_meja` varchar(10) NOT NULL,
  `status` enum('tersedia','terisi') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`idmeja`, `nomor_meja`, `status`) VALUES
(1, 'No 1', 'tersedia'),
(2, 'No 2', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idmenu` int NOT NULL,
  `Namamenu` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `Namamenu`, `harga`, `foto`) VALUES
(8, 'Ayam Goreng', 25000, '839e11ca-7112-4b53-a743-c3a387474b91.jpg'),
(9, 'Air Mineral', 3000, 'blog-10-manfaat-minum-air-hangat-untuk-kesehatan-yang-perlu-diketahui-483-l.jpg'),
(10, 'Salad Buah', 15000, '5ff142b238972.jpg'),
(11, 'Kolak', 17000, 'Resep-Kolak-labu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int NOT NULL,
  `Namapelanggan` varchar(100) NOT NULL,
  `Jeniskelamin` tinyint(1) DEFAULT NULL,
  `Nohp` varchar(15) DEFAULT NULL,
  `Alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `Namapelanggan`, `Jeniskelamin`, `Nohp`, `Alamat`) VALUES
(2, 'Muhammad Fadhil Adha', 0, '082273318016', 'Jl. Karya Gg. Salak'),
(3, 'Muhammad Fajar Fikri', 0, '081376490300', 'Banda Aceh'),
(4, 'Tes Pelanggan 1', 1, '08123291837', 'Marelan pasar 2'),
(5, 'Ida Kuswarni', 1, '081376490300', 'Jl. Karya'),
(6, 'Tes 2', 0, '086672736', 'Tes 2 Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanan` int NOT NULL,
  `idpelanggan` int DEFAULT NULL,
  `idmeja` int DEFAULT NULL,
  `iduser` int DEFAULT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `invoice` varchar(255) DEFAULT NULL,
  `total` int DEFAULT NULL,
  `status` enum('diproses','selesai','dibayar') DEFAULT 'diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idpesanan`, `idpelanggan`, `idmeja`, `iduser`, `tanggal`, `invoice`, `total`, `status`) VALUES
(2, 2, 2, 2, '2025-04-22 00:00:00', 'INV-J7S0E', 43000, 'dibayar'),
(3, 3, 2, 2, '2025-04-22 00:00:00', 'INV-ES820', 160000, 'dibayar'),
(4, 5, 1, 2, '2025-04-22 00:00:00', 'INV-4LB4U', 289000, 'dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `pesanandetail`
--

CREATE TABLE `pesanandetail` (
  `iddetail` int NOT NULL,
  `idpesanan` int DEFAULT NULL,
  `idmenu` int DEFAULT NULL,
  `Jumlah` int NOT NULL,
  `hargasatuan` int NOT NULL
) ;

--
-- Dumping data for table `pesanandetail`
--

INSERT INTO `pesanandetail` (`iddetail`, `idpesanan`, `idmenu`, `Jumlah`, `hargasatuan`) VALUES
(25, 2, 8, 1, 25000),
(26, 2, 9, 1, 3000),
(27, 2, 10, 1, 15000),
(40, 3, 8, 5, 25000),
(41, 3, 9, 1, 3000),
(42, 3, 10, 1, 15000),
(43, 3, 11, 1, 17000),
(44, 4, 8, 2, 25000),
(45, 4, 9, 3, 3000),
(46, 4, 10, 4, 15000),
(47, 4, 11, 10, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int NOT NULL,
  `idpesanan` int DEFAULT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `Total` int NOT NULL,
  `Bayar` int NOT NULL,
  `Kembalian` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idpesanan`, `tanggal`, `Total`, `Bayar`, `Kembalian`) VALUES
(2, 4, '2025-04-22 00:00:00', 289000, 300000, 11000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Namauser` varchar(100) NOT NULL,
  `role` enum('administrator','waiter','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `Namauser`, `role`) VALUES
(1, 'admin', 'admin123', 'Admin Utama', 'administrator'),
(2, 'waiter1', 'waiter123', 'Pelayan 1', 'waiter'),
(3, 'kasir1', 'kasir123', 'Kasir 1', 'kasir'),
(4, 'owner', 'owner123', 'Pemilik', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`idmeja`),
  ADD UNIQUE KEY `nomor_meja` (`nomor_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`),
  ADD KEY `idpelanggan` (`idpelanggan`),
  ADD KEY `idmeja` (`idmeja`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `pesanandetail`
--
ALTER TABLE `pesanandetail`
  ADD PRIMARY KEY (`iddetail`),
  ADD KEY `idpesanan` (`idpesanan`),
  ADD KEY `idmenu` (`idmenu`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD UNIQUE KEY `idpesanan` (`idpesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `idmeja` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanandetail`
--
ALTER TABLE `pesanandetail`
  MODIFY `iddetail` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`idmeja`) REFERENCES `meja` (`idmeja`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `pesanandetail`
--
ALTER TABLE `pesanandetail`
  ADD CONSTRAINT `pesanandetail_ibfk_1` FOREIGN KEY (`idpesanan`) REFERENCES `pesanan` (`idpesanan`),
  ADD CONSTRAINT `pesanandetail_ibfk_2` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idpesanan`) REFERENCES `pesanan` (`idpesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
