-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 10:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `user_id`, `produk_id`, `qty`, `sub_total`) VALUES
(21, 2, 8, 1, 34000),
(22, 7, 15, 1, 30000),
(23, 7, 8, 1, 34000),
(24, 2, 8, 1, 34000),
(25, 3, 8, 1, 34000),
(26, 3, 15, 1, 30000),
(27, 3, 18, 1, 34000),
(28, 3, 16, 1, 200000),
(29, 3, 16, 1, 20000),
(30, 3, 14, 1, 25000),
(31, 3, 9, 1, 45000),
(32, 2, 9, 1, 45000),
(33, 3, 18, 1, 34000),
(34, 3, 18, 1, 34000),
(35, 3, 18, 1, 34000),
(36, 3, 18, 1, 34000),
(37, 10, 9, 1, 45000),
(38, 10, 8, 1, 34000),
(39, 10, 18, 1, 34000),
(40, 10, 14, 2, 50000),
(41, 10, 8, 1, 34000),
(42, 11, 9, 1, 45000),
(43, 11, 17, 1, 22000),
(44, 11, 8, 1, 34000),
(45, 11, 16, 1, 20000),
(46, 11, 16, 1, 20000),
(47, 2, 15, 1, 30000),
(48, 2, 21, 1, 24000),
(49, 2, 8, 1, 34000),
(50, 3, 20, 1, 45000),
(51, 3, 20, 1, 45000),
(52, 3, 14, 1, 35000),
(53, 13, 23, 2, 60000),
(54, 14, 17, 2, 44000),
(55, 15, 25, 3, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `chekout`
--

CREATE TABLE `chekout` (
  `id_chekout` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_tlp` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status_terima` enum('belum di terima','sudah diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(22, 'Moisturizer'),
(24, 'Toner'),
(28, 'Sunscreen'),
(30, 'Serum Wajah');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `Nama` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `No.Hp` varchar(25) NOT NULL,
  `Alamat` varchar(25) NOT NULL,
  `Kota` varchar(25) NOT NULL,
  `Provinsi` varchar(25) NOT NULL,
  `Id_user` int(25) NOT NULL,
  `Id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`Nama`, `Email`, `No.Hp`, `Alamat`, `Kota`, `Provinsi`, `Id_user`, `Id`) VALUES
('Sari', 'sari123@gmail.com', '089553226789', 'Kota Tua', 'Jakarta', 'Jakarta Barat', 11, 9),
('nana', 'icanatasya72@gmail.com', '0896688865', 'bode', 'Cirebon', 'jawa barat', 0, 24),
('Mona Rosanah', 'mona@gmail.com', '089345765123', 'Sukra', 'Indramayu', 'Jawa Barat', 3, 29),
('Ica Natasya', 'icanatasya72@gmail.com', '0896688865', 'bode', 'Cirebon', 'Jawa Barat', 3, 30),
('ica', 'icanatasya72@gmail.com', '0896688865', 'bode', 'Cirebon', 'Jawa Barat', 0, 31),
('ica', 'icanatasya72@gmail.com', '0896688865', 'bode', 'Cirebon', 'Jawa Barat', 0, 32),
('ica', 'icanatasya72@gmail.com', '0896688865', 'bode', 'Cirebon', 'Jawa Barat', 0, 33),
('ica', 'icanatasya72@gmail.com', '0896688865', 'bode', 'Cirebon', 'kejayaan', 3, 34),
('Azahra', 'azahra123@gmail.com', '082567345178', 'Indramayu', 'Indramayu', 'Jawa Barat', 13, 35),
('Dinda', 'dinda@gmail.com', '087667453214', 'Sumber', 'Cirebon', 'Jawa Barat', 14, 36),
('Sinta', 'sinta@gmail.com', '089776543123', 'Karangsari', 'Cirebon', 'Jawa Barat', 15, 37);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `bentuk_produk` varchar(10) NOT NULL,
  `umur_simpan` varchar(20) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk`, `harga`, `gambar`, `bentuk_produk`, `umur_simpan`, `kadaluarsa`, `stok`) VALUES
(14, 'Body Butter', 35000, '60bd15ef1c89d.jpeg', 'Padat', '8 Bulan', '2021-06-01', 32),
(17, 'Face Wash', 22000, '60bd170c363be.jpeg', 'Lotion', '8 Bulan', '2021-06-30', 29),
(18, 'Body Mist', 34000, '60bd1772ce534.jpeg', 'Cair', '4 Bulan', '2021-06-02', 13),
(20, 'Body Wash', 45000, '60c38c5081865.jpeg', 'Cair', '8 Bulan', '2021-06-11', 58),
(21, 'Moisturizer', 24000, '60c38da29416c.jpeg', 'Lotion', '8 Bulan', '2024-02-06', 53),
(24, 'Toner', 35000, '60c501138fe14.jpeg', 'Cair', '6 Bulan', '2024-02-13', 34),
(25, 'Serum', 20000, '60c509c2a0e2b.jpeg', 'Cair', '8 Bulan', '2024-02-13', 20);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `transaksi_id` int(11) NOT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`transaksi_id`, `produk_id`, `tanggal`, `qty`, `status`) VALUES
(26, 9, '2007-06-21 20:02:00', 1, 1),
(27, 9, '2007-06-21 20:02:21', -3, 1),
(41, 14, '2013-06-21 01:19:54', 1, 1),
(42, 14, '2013-06-21 01:20:48', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(20) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `nama`, `role`) VALUES
(2, 'admin', '$2y$10$kovW1jjEITOO5UM1SwLoA.zwslr5m.TB2lQO5.zFAnmvJ2VrwrCw2', 'Administrator', 1),
(3, 'Ica', '$2y$10$XRMEegQgvM5tZY0WvTGFpuiYh56nAjSPljpGtwxRjWt3GmIEyAT0C', 'Ica Natasya', 0),
(7, 'hame', '$2y$10$ixNhSHyogH/1FXya8Qcd9Og2e3ZSuUgopGUuZh6.Ty1hav9PN/YYq', 'hame', 1),
(11, 'rosa', '$2y$10$8DV3JH2Bh3x2Yx8H4mFwaercsOzerpREjOsdTDjIf4ys4pHt6/7By', 'rosa', 0),
(12, 'Tamu', '$2y$10$UGq9UvjIWn/0Nahks6mHZOexolGRBqjXLuK.FcDKz3X9ju8K6FUFG', 'Pengunjung', 0),
(13, 'ara', '$2y$10$ms5bPaz4vC2YgsWUyyQcMOdaKGoxUlrTv74KMmw7.R79Ou3SQq/Ni', 'Azahra', 0),
(14, 'dinda', '$2y$10$sJlcANkdsKmUHHbZNyGFGeFmXDjhM5lh1ByzSuV.yfy.ojJiyUSru', 'Dinda', 0),
(15, 'sinta', '$2y$10$IdEQIPv1lWeSLGVZWCQ2Oebb8VBMCfgQAraaqqaCYO6eqw/5Qmra2', 'Sinta', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `chekout`
--
ALTER TABLE `chekout`
  ADD PRIMARY KEY (`id_chekout`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `chekout`
--
ALTER TABLE `chekout`
  MODIFY `id_chekout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
