-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 08:38 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `nm_kota` varchar(25) NOT NULL,
  `tarif` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_prov`, `nm_kota`, `tarif`) VALUES
(7, 3, 'Semarang', 10000),
(8, 3, 'Pekalongan', 10000),
(9, 3, 'Surakarta', 9000),
(11, 2, 'Bandung', 17000),
(12, 2, 'Bekasi', 16000),
(13, 2, 'Bogor', 15000),
(14, 2, 'Cirebon', 15000),
(19, 1, 'Malang', 5000),
(20, 1, 'Blitar', 7000),
(21, 1, 'Surabaya', 9000),
(22, 1, 'Lamongan', 10000),
(23, 7, 'Medan ', 30000),
(24, 6, 'Padang', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(50) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `kodepos` varchar(100) NOT NULL,
  `kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal`, `total`, `provinsi`, `tarif`, `alamat_pengiriman`, `kodepos`, `kota`) VALUES
(169, 83, 1, '2019-10-23', 2020000, 'Jawa Timur', 20000, 'Jl Brantas No 19 Kota Malang', '322123', ''),
(170, 82, 4, '2019-10-23', 12100000, 'Sumatra', 100000, 'Jl. Pandan No 11 Kota Padang', '212321', ''),
(171, 82, 4, '2019-10-23', 2100000, 'Sumatra', 100000, 'Jl. Kotamobagu No 12 Kota Lampung', '212322', ''),
(172, 82, 1, '2019-10-23', 12020000, 'Jawa Timur', 20000, 'jl semanggi no11 bumiayu malang', '123', ''),
(173, 82, 5, '2019-10-24', 2040000, 'Jawa Barat', 40000, 'Jl. Braga No : 11 Kota Bandung', '321938', ''),
(174, 84, 1, '2019-10-24', 174020000, 'Jawa Timur', 20000, 'Jl. tanimbar No : 11 Kota Malang', '329837', ''),
(175, 85, 1, '2019-10-25', 60020000, 'Jawa Timur', 20000, 'j.kol sugiono Gg3b Rt07 Rw04', '65134', ''),
(180, 87, 1, '2019-10-31', 5010000, 'JAWA TIMUR', 10000, 'njshsu', '27182718', 'SURABAYA'),
(181, 87, 1, '2019-10-31', 4600000, 'JAWA TIMUR', 0, 'Jl. Danau Toba No : 19', '23728', ''),
(182, 87, 6, '2019-10-31', 2000000, 'Sumatra Barat', 0, 'lp', '676', ''),
(183, 87, 1, '2019-10-31', 20000000, 'JAWA TIMUR', 0, 'maka', '92019', ''),
(184, 87, 6, '2019-10-31', 20000000, 'Sumatra Barat', 0, 'dada', '32323', ''),
(185, 87, 3, '2019-10-31', 6000000, 'JAWA TENGAH', 0, 'sasa', '782723', ''),
(186, 87, 1, '2019-10-31', 12000000, 'JAWA TIMUR', 0, 'Jl. Semanggi', '909989', ''),
(187, 87, 3, '2019-10-31', 2300000, 'JAWA TENGAH', 0, 'jakd', 'ksks', ''),
(188, 87, 1, '2019-10-31', 7000000, 'JAWA TIMUR', 0, 'Malang', '62761', ''),
(189, 87, 1, '2019-10-31', 0, 'JAWA TIMUR', 0, 'Malang', '62761', ''),
(190, 87, 6, '2019-10-31', 5000000, 'Sumatra Barat', 0, 'msa', '8787', ''),
(191, 87, 3, '2019-10-31', 6010000, 'JAWA TENGAH', 10000, 'sjia', '91919', 'SEMARANG'),
(192, 87, 7, '2019-10-31', 23030000, 'Sumatra Utara', 30000, 'Jl. Sigura', '82918', 'Medan '),
(193, 89, 2, '2019-10-31', 4617000, 'JAWA BARAT', 17000, 'Jl. Braga No :11', '53261', 'BANDUNG'),
(194, 89, 1, '2019-10-31', 7005000, 'JAWA TIMUR', 5000, 'jln', '', 'Malang'),
(195, 90, 1, '2019-11-01', 2005000, 'Jawa Timur', 5000, 'Malang', '45353', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subtotal`) VALUES
(193, 169, 13, 1, 'Samsung J3 2016', 2000000, 2000000),
(194, 170, 9, 1, 'HP envy', 12000000, 12000000),
(195, 171, 6, 1, 'Laptop', 2000000, 2000000),
(196, 172, 9, 1, 'HP envy', 12000000, 12000000),
(197, 173, 13, 1, 'Samsung J3 2016', 2000000, 2000000),
(198, 174, 6, 47, 'Lenovo Ideapad 320', 2000000, 94000000),
(199, 174, 13, 40, 'Samsung J3 2016', 2000000, 80000000),
(200, 175, 7, 3, 'vivoaio', 20000000, 60000000),
(201, 176, 7, 1, 'vivoaio', 20000000, 20000000),
(202, 176, 6, 1, 'Lenovo Ideapad 320', 2000000, 2000000),
(203, 176, 14, 1, 'Infinix z3 pro', 2300000, 2300000),
(204, 177, 8, 1, 'vivo v15', 5000000, 5000000),
(205, 177, 9, 1, 'HP envy', 12000000, 12000000),
(206, 178, 7, 1, 'vivoaio', 20000000, 20000000),
(207, 179, 7, 2, 'vivoaio', 20000000, 40000000),
(208, 180, 8, 1, 'vivo v15', 5000000, 5000000),
(209, 181, 14, 2, 'Infinix z3 pro', 2300000, 4600000),
(210, 182, 6, 1, 'Lenovo Ideapad 320', 2000000, 2000000),
(211, 183, 7, 1, 'vivoaio', 20000000, 20000000),
(212, 184, 7, 1, 'vivoaio', 20000000, 20000000),
(213, 185, 11, 1, 'Asus Vivobook s15', 6000000, 6000000),
(214, 186, 9, 1, 'HP envy', 12000000, 12000000),
(215, 187, 14, 1, 'Infinix z3 pro', 2300000, 2300000),
(216, 188, 10, 1, 'Asus vivobook 14', 7000000, 7000000),
(217, 190, 8, 1, 'vivo v15', 5000000, 5000000),
(218, 191, 11, 1, 'Asus Vivobook s15', 6000000, 6000000),
(219, 192, 14, 10, 'Infinix z3 pro', 2300000, 23000000),
(220, 193, 14, 2, 'Infinix z3 pro', 2300000, 4600000),
(221, 194, 10, 1, 'Asus vivobook 14', 7000000, 7000000),
(222, 195, 6, 1, 'Lenovo Ideapad 320', 2000000, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(5) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_produk`, `nama_produk`, `harga_produk`, `foto`, `deskripsi`, `stok`, `kategori`) VALUES
(6, 'Lenovo Ideapad 320', 2000000, 'ideapad 320.jpg', 'Ram : 2 Gb\r\nRom : 16 Gb\r\nProcessor : intel i3', 87, 'Laptop '),
(7, 'vivoaio', 20000000, 'vivoaio.jpg', 'Ram : 10\r\nRom : 300 Gb\r\nprocessor : AMD A9', 30, 'Komputer'),
(8, 'vivo v15', 5000000, 'vivov15.jpg', 'Ram : 3\r\nRom : 16 Gb\r\n', 15, 'Smartphone '),
(9, 'HP envy', 12000000, 'envy.png', 'Ram : 6 Gb\r\nRom : 300 Gb\r\nProcessor : intel 17', 28, 'Laptop '),
(10, 'Asus vivobook 14', 7000000, 'vivobook 14.jpg', 'Ram : 4\r\nRom : 16\r\nProcessor : AMD A12', 38, 'Laptop '),
(11, 'Asus Vivobook s15', 6000000, 'vivobook s14.jpg', 'Ram : 6\r\nRom : 300 Gb\r\nProcessor : Intel I7', 48, 'Laptop '),
(14, 'Infinix z3 pro', 2300000, 'infinix.jpg', 'Ram : 4 Gb\r\nRom : 64 Gb\r\nAndroid : Nauget\r\n', 24, 'Smartphone ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(9, 'Komputer'),
(27, 'Smartphone '),
(28, 'Laptop ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_produk`, `nama`, `email`, `komentar`, `tanggal`, `foto`, `id_pelanggan`) VALUES
(23, 6, 'RPL C GRAFIKA', 'rpl@gmail.com', 'bagus', '2019-10-24', '960x0.jpg', 84),
(25, 7, 'RPL C Grafika', 'user@gmail.com', 'baagus', '2019-10-30', 'baru.jpg', 87);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id_prov` int(11) NOT NULL,
  `nama_prov` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id_prov`, `nama_prov`) VALUES
(1, 'Jawa Timur'),
(2, 'Jawa Barat'),
(3, 'Jawa Tengah'),
(6, 'Sumatra Barat'),
(7, 'Sumatra Utara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `metode` varchar(20) NOT NULL,
  `status_pembelian` varchar(10) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_bayar`, `id_pembelian`, `id_pelanggan`, `code`, `metode`, `status_pembelian`, `total`, `tanggal`) VALUES
(49, 155, 68, '390D1BEC', 'Alfamart', 'Sukses', '6030000', '2019-10-22'),
(52, 158, 71, 'FE5AECCD', 'Indomaret', 'Sukses', '4100000', '2019-10-22'),
(53, 159, 71, '18E15D89', 'Indomaret', 'pending', '2030000', '2019-10-22'),
(54, 160, 68, 'E6F5EC43', 'Alfamart', 'pending', '2030000', '2019-10-23'),
(55, 161, 77, '2FBCA3D0', 'Indomaret', 'Sukses', '20020000', '2019-10-23'),
(63, 169, 83, '2BBA7FC1', 'Indomaret', 'Sukses', '2020000', '2019-10-23'),
(64, 170, 82, '30F29D6F', 'Indomaret', 'Sukses', '12100000', '2019-10-23'),
(65, 171, 82, '34F3EA29', 'Alfamart', 'Sukses', '2100000', '2019-10-23'),
(66, 172, 82, '3EC080FC', 'Indomaret', 'Sukses', '12020000', '2019-10-23'),
(67, 173, 82, '1CCB701D', 'Indomaret', 'Sukses', '2040000', '2019-10-24'),
(68, 174, 84, '663AB57F', 'Alfamart', 'Sukses', '174020000', '2019-10-24'),
(69, 175, 85, '91174D17', 'Alfamart', 'Sukses', '60020000', '2019-10-25'),
(70, 176, 86, 'E1211408', 'Indomaret', 'Sukses', '24320000', '2019-10-30'),
(71, 177, 86, '1AB3BCE5', 'Alfamart', 'Sukses', '17030000', '2019-10-30'),
(72, 178, 86, 'E8BBBDDF', 'Alfamart', 'Sukses', '20020000', '2019-10-30'),
(73, 179, 87, '823BB190', 'Indomaret', 'pending', '40000000', '2019-10-31'),
(74, 180, 87, 'A8D5CF39', 'Alfamart', 'Sukses', '5010000', '2019-10-31'),
(75, 181, 87, 'E24A6297', 'Indomaret', 'Sukses', '4600000', '2019-10-31'),
(76, 182, 87, 'E9B9641C', 'Alfamart', 'Sukses', '2000000', '2019-10-31'),
(77, 183, 87, 'EF97715A', 'Indomaret', 'pending', '20000000', '2019-10-31'),
(78, 184, 87, 'F83E6EC2', 'Alfamart', 'Sukses', '20000000', '2019-10-31'),
(79, 185, 87, '0A277328', 'Indomaret', 'pending', '6000000', '2019-10-31'),
(80, 186, 87, '2F49802E', 'Indomaret', 'Sukses', '12000000', '2019-10-31'),
(81, 187, 87, '3E194824', 'Indomaret', 'pending', '2300000', '2019-10-31'),
(82, 188, 87, '872D3AF5', 'Alfamart', 'pending', '7000000', '2019-10-31'),
(83, 189, 87, '8919B4E1', 'Alfamart', 'pending', '0', '2019-10-31'),
(84, 190, 87, '8B55C54C', 'Alfamart', 'pending', '5000000', '2019-10-31'),
(85, 191, 87, '9141B2C6', 'Indomaret', 'pending', '6010000', '2019-10-31'),
(86, 192, 87, '96F0CDF1', 'Alfamart', 'Sukses', '23030000', '2019-10-31'),
(87, 193, 89, 'A2F5F164', 'Indomaret', 'Sukses', '4617000', '2019-10-31'),
(88, 194, 89, 'E42A3E01', 'Indomaret', 'pending', '7005000', '2019-10-31'),
(89, 195, 90, 'A0EA3F70', 'Indomaret', 'Sukses', '2005000', '2019-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET latin2 COLLATE latin2_bin NOT NULL,
  `password` varchar(32) CHARACTER SET latin2 COLLATE latin2_bin NOT NULL,
  `level` varchar(5) CHARACTER SET latin2 COLLATE latin2_bin NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'baru.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_pelanggan`, `username`, `password`, `level`, `email`, `alamat`, `telepon`, `foto`) VALUES
(66, 'admin', 'f57883687154a089550c75e012a67e2b', 'admin', 'admin@gmail.com', '', '', 'baru.jpg'),
(83, 'Ilham Zora', 'ebf0664735062d6ddce4b9e5be760825', 'user', 'ilham@gmail.com', 'Jl Lesanpuro', '089726615626', 'VEKTOR MICKEY MOUSE.png'),
(84, 'RPL C GRAFIKA', 'ebf0664735062d6ddce4b9e5be760825', 'user', 'rpl@gmail.com', 'Jl. Tanimbar', '089728737232', '960x0.jpg'),
(85, 'audry@gmail.com', 'e2e0edc669ac1cbbb97c2cf5faed50d5', 'user', 'audry@gmail.com', '', '', 'baru.jpg'),
(87, 'RPL C Grafika', 'e742d53a9db9dd35cda4f05b44ada6e5', 'user', 'user@gmail.com', '', '', 'baru.jpg'),
(89, 'Yuda Prameswara', 'ebf0664735062d6ddce4b9e5be760825', 'user', 'yuda@gmail.com', '', '', 'baru.jpg'),
(90, 'Grafika', 'e742d53a9db9dd35cda4f05b44ada6e5', 'user', 'grafika@gmail.com', '', '', 'baru.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
