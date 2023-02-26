-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 02:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_harga`
--

CREATE TABLE `barang_harga` (
  `kode_harga` varchar(10) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(6) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_harga`
--

INSERT INTO `barang_harga` (`kode_harga`, `kode_barang`, `harga`, `stok`, `kode_cabang`) VALUES
('BR001BDG', 'BR001', 215000, 10, 'BDG'),
('BR002JKT', 'BR002', 449000, 15, 'JKT');

-- --------------------------------------------------------

--
-- Table structure for table `barang_master`
--

CREATE TABLE `barang_master` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_master`
--

INSERT INTO `barang_master` (`kode_barang`, `nama_barang`, `satuan`) VALUES
('BR001', 'Logitech G102', 'unit'),
('BR002', 'Fantech MAXFIT61', 'unit');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `namabulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `namabulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kode_cabang` char(3) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat_cabang` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kode_cabang`, `nama_cabang`, `alamat_cabang`, `telepon`) VALUES
('BDG', 'BANDUNG', 'ARCAMANIK', '022-12345'),
('JKT', 'JAKARTA', 'SUDIRMAN', '021-12345');

-- --------------------------------------------------------

--
-- Table structure for table `historibayar`
--

CREATE TABLE `historibayar` (
  `nobukti` varchar(14) NOT NULL,
  `no_faktur` varchar(13) NOT NULL,
  `tglbayar` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historibayar`
--

INSERT INTO `historibayar` (`nobukti`, `no_faktur`, `tglbayar`, `bayar`, `id_user`) VALUES
('22000004', 'PST09220004', '2022-09-08', 400000, 'USR001'),
('22000003', 'PST09220003', '2022-09-08', 645000, 'USR001'),
('22000005', '', '2022-09-08', 800000, 'USR001'),
('22000006', '', '2022-09-08', 800000, 'USR001'),
('22000007', '', '2022-09-08', 700000, 'USR001'),
('22000008', '', '2022-09-08', 0, 'USR001'),
('22000009', '', '2022-09-08', 0, 'USR001'),
('22000010', '', '2022-09-08', 0, 'USR001'),
('22000011', '', '2022-09-08', 800000, 'USR001'),
('22000012', '', '2022-09-08', 0, 'USR001'),
('22000013', '', '2022-09-08', 800000, 'USR001'),
('22000014', '', '2022-09-08', 800000, 'USR001'),
('22000015', '', '2022-09-08', 0, 'USR001'),
('22000016', '', '2022-09-08', 800000, 'USR001'),
('22000017', '', '2022-09-08', 800000, 'USR001'),
('22000018', '', '2022-09-08', 0, 'USR001'),
('22000019', '', '2022-09-08', 400000, 'USR001'),
('22000020', '', '2022-09-08', 400000, 'USR001'),
('22000021', '', '2022-09-08', 400000, 'USR001'),
('22000022', '', '2022-09-08', 400000, 'USR001'),
('22000023', '', '2022-09-08', 400000, 'USR001'),
('22000024', '', '2022-09-08', 400000, 'USR001');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(13) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_hp`, `kode_cabang`) VALUES
('CS001', 'Anas', 'BOJONG AWI KALER, KOTA BANDUNG', '089604129300', 'BDG'),
('CS002', 'Wawan', 'ARCAMANIK', '08123456', 'BDG'),
('CS003', 'Ulwan', 'ARCAMANIK', '08123456', 'BDG');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur` varchar(13) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `kode_pelanggan` varchar(13) NOT NULL,
  `jenistransaksi` varchar(6) NOT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_faktur`, `tgltransaksi`, `kode_pelanggan`, `jenistransaksi`, `jatuhtempo`, `id_user`) VALUES
('PST09220004', '2022-09-08', 'CS002', 'kredit', '2022-10-08', 'USR001'),
('PST09220003', '2022-09-08', 'CS003', 'tunai', '2022-10-08', 'USR001');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `no_faktur` varchar(13) DEFAULT NULL,
  `kode_barang` varchar(8) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`no_faktur`, `kode_barang`, `harga`, `qty`) VALUES
('PST09220003', 'BR001', 215000, 3),
('PST09220004', 'BR002', 449000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail_temp`
--

CREATE TABLE `penjualan_detail_temp` (
  `no_fak_penj` varchar(13) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` char(6) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `no_hp`, `username`, `password`, `level`, `kode_cabang`) VALUES
('USR001', 'Nasyih', '089604129300', 'admin', '123', 'administrator', 'PST'),
('USR002', 'Wawan', '089604129666', 'wawan', '123', 'kasir', 'BDG');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totalbayar`
-- (See below for the actual view)
--
CREATE TABLE `view_totalbayar` (
`no_faktur` varchar(13)
,`totalbayar` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totalpenjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_totalpenjualan` (
`no_faktur` varchar(13)
,`totalpenjualan` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Structure for view `view_totalbayar`
--
DROP TABLE IF EXISTS `view_totalbayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalbayar`  AS SELECT `historibayar`.`no_faktur` AS `no_faktur`, sum(`historibayar`.`bayar`) AS `totalbayar` FROM `historibayar` GROUP BY `historibayar`.`no_faktur` ;

-- --------------------------------------------------------

--
-- Structure for view `view_totalpenjualan`
--
DROP TABLE IF EXISTS `view_totalpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalpenjualan`  AS SELECT `penjualan_detail`.`no_faktur` AS `no_faktur`, sum(`penjualan_detail`.`harga` * `penjualan_detail`.`qty`) AS `totalpenjualan` FROM `penjualan_detail` GROUP BY `penjualan_detail`.`no_faktur` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_harga`
--
ALTER TABLE `barang_harga`
  ADD PRIMARY KEY (`kode_harga`);

--
-- Indexes for table `barang_master`
--
ALTER TABLE `barang_master`
  ADD PRIMARY KEY (`kode_barang`) USING BTREE;

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kode_cabang`),
  ADD KEY `kode_cab_idx` (`kode_cabang`);

--
-- Indexes for table `historibayar`
--
ALTER TABLE `historibayar`
  ADD PRIMARY KEY (`nobukti`),
  ADD KEY `hb_nofaktur` (`no_faktur`),
  ADD KEY `hb_tglbayar_jenis` (`tglbayar`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`) USING BTREE,
  ADD KEY `pel_nama` (`nama_pelanggan`),
  ADD KEY `pel_kodecab` (`kode_cabang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur`) USING BTREE,
  ADD KEY `kode_pelanggan` (`kode_pelanggan`),
  ADD KEY `tgltransaksi` (`tgltransaksi`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD KEY `detailpenj_nofaktur` (`no_faktur`),
  ADD KEY `detailpenj_kodebarang` (`kode_barang`);

--
-- Indexes for table `penjualan_detail_temp`
--
ALTER TABLE `penjualan_detail_temp`
  ADD KEY `detailpenj_nofaktur` (`no_fak_penj`),
  ADD KEY `detailpenj_kodebarang` (`kode_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
