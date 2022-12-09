-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2022 at 08:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(4, 'sawi ', 'lokal', 'baru', 6000, 61, 'IMG-20221022-WA0015.jpg'),
(11, 'kangkung', 'lokal', 'segar', 5000, 0, 'IMG-20221022-WA0016.jpg'),
(12, 'daunt mint', 'lokal', 'segar', 500, 20, 'PXL_20220913_155941599.jpg'),
(13, 'pakcoy', 'lokal', 'segar', 5000, 53, 'IMG-20221022-WA0048.jpg'),
(14, 'Selada', 'impor', 'segar', 5000, 66, 'IMG-20221022-WA0044.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `item` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id`, `id_user`, `id_barang`, `id_pesanan`, `item`) VALUES
(58, 18, 5, 25, 1),
(59, 18, 6, 25, 1),
(60, 18, 7, 25, 1),
(61, 18, 6, 26, 1),
(64, 18, 4, 28, 1),
(65, 18, 6, 28, 1),
(66, 19, 4, 29, 1),
(67, 19, 7, 29, 1),
(70, 19, 4, 30, 2),
(71, 18, 10, 31, 1),
(72, 18, 8, 31, 1),
(73, 18, 6, 31, 1),
(74, 18, 11, 31, 1),
(75, 18, 4, 31, 1),
(76, 18, 4, 32, 1),
(77, 20, 4, 33, 1),
(78, 20, 5, 33, 1),
(79, 20, 6, 33, 1),
(80, 20, 10, 33, 1),
(81, 21, 5, 34, 1),
(82, 21, 4, 35, 1),
(83, 21, 7, 36, 1),
(84, 21, 7, 37, 1),
(85, 21, 11, 38, 1),
(87, 21, 4, 38, 1),
(89, 19, 4, 38, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `metode_bayar` varchar(10) NOT NULL,
  `bukti_pembayaran` varchar(50) DEFAULT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(7) NOT NULL,
  `jenis_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_user`, `nama`, `alamat`, `no_hp`, `tgl`, `metode_bayar`, `bukti_pembayaran`, `total`, `status`, `jenis_pengiriman`) VALUES
(26, 26, 'arman horis', 'kassi\'jhi', '08998998989', '2022-02-02', 'TRANSFER', 'paru-paru.png', 8000, 'sukses', ''),
(28, 18, 'arman horis', 'kassi\'', '08998998989', '2022-02-02', 'COD', NULL, 28000, 'sukses', ''),
(29, 19, 'alda', 'Balibo', '087776676767', '2022-02-02', 'COD', NULL, 29000, 'proses', ''),
(31, 18, 'arman horis', 'bantaeng', '08998998989', '2022-09-12', 'COD', NULL, 48000, 'proses', ''),
(32, 18, 'arman horis', 'bantaeng', '08998998989', '2022-09-13', 'COD', NULL, 20000, 'sukses', ''),
(33, 20, 'sultan', 'kajang', '07777', '2022-09-13', 'TRANSFER', 'bg_pupuk.jpeg', 42000, 'sukses', ''),
(37, 21, 'abbas', 'vahsh', '085342560521', '2022-10-20', 'TRANSFER', 'ORDERANl.jpg', 9000, 'proses', ''),
(38, 19, 'alda', 'Balibo', '087776676767', '2022-11-23', 'COD', NULL, 12000, 'order', 'ambil sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `no_hp`, `alamat`, `status`) VALUES
(1, 'admin', 'admin', '123', NULL, '', 'admin'),
(18, 'arman horis', 'arman', '123', '08998998989', 'bantaeng', 'user'),
(19, 'alda', 'alda', '123', '087776676767', 'Balibo', 'user'),
(20, 'sultan', 'sultan', '123', '07777', 'kajang', 'user'),
(21, 'abbas', 'abbas', '1234', '085342560521', 'vahsh', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
