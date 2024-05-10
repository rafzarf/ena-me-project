-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20230111.1d37607132
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 11:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enterprise_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_order_logistik`
--

CREATE TABLE `form_order_logistik` (
  `id_orderlog` int(11) NOT NULL,
  `no_spk` varchar(50) NOT NULL,
  `pemesan` varchar(255) NOT NULL,
  `tanggal_created` date NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `batas_waktu` date NOT NULL,
  `disetujui` varchar(255) NOT NULL,
  `jml_satuan` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `no_barang` varchar(255) NOT NULL,
  `no_gambar` varchar(255) NOT NULL,
  `tgl_penerima` date DEFAULT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `tgl_pesanan` date NOT NULL,
  `berat_barang` int(11) DEFAULT NULL,
  `nama_pelaksana` varchar(255) NOT NULL,
  `record_order` varchar(255) DEFAULT NULL,
  `catatan` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_order_logistik`
--

INSERT INTO `form_order_logistik` (`id_orderlog`, `no_spk`, `pemesan`, `tanggal_created`, `unit_kerja`, `batas_waktu`, `disetujui`, `jml_satuan`, `nama_barang`, `uraian`, `ukuran`, `no_barang`, `no_gambar`, `tgl_penerima`, `nama_penerima`, `tgl_pembelian`, `tgl_pesanan`, `berat_barang`, `nama_pelaksana`, `record_order`, `catatan`) VALUES
(12, 'PM240000', 'Pt.jaya Abadi', '2024-05-17', 'Me', '2024-05-24', '1', 1, 'Arduino', '2', '2x5x3', '11', '11', '2024-05-16', 'Gundala P', '2024-05-10', '2024-05-11', 1, 'Rafza', NULL, ''),
(14, 'PM240000', 'Pt.jaya Abadi', '2024-05-11', 'Me', '2024-05-31', '1', 2, 'Arduino Mega 2560', '89', '20x10x9', '', '', '0000-00-00', '', NULL, '0000-00-00', NULL, '', NULL, ''),
(15, 'PM240000', 'Pt.jaya Abadi', '2024-05-10', 'Me', '2024-05-24', '1', 1, 'Bracket Arduino', '1', '2x5x15', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', 0, '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `google_calendar`
--

CREATE TABLE `google_calendar` (
  `id` int(11) NOT NULL,
  `API_KEY` varchar(255) NOT NULL,
  `GCAL_ID` varchar(255) NOT NULL,
  `CLIENT_ID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `google_calendar`
--

INSERT INTO `google_calendar` (`id`, `API_KEY`, `GCAL_ID`, `CLIENT_ID`) VALUES
(0, 'AIzaSyDlw5GVO5tjX4PNJwS3GnxDCfb_8Mu8BEQ', 'c_ffa1b58f0e7dec6a3cd0c90223fb278bd272d089f65265a8449af9049dda7030@group.calendar.google.com', '1070827281495-mhrjqr19ehd0vn8dlfrrrjs21jtqnate.apps.googleusercontent.com');

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `id_komponen` int(11) NOT NULL,
  `nama_komponen` varchar(255) NOT NULL,
  `no_spk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`id_komponen`, `nama_komponen`, `no_spk`) VALUES
(14, 'As Roda', 'PM240000'),
(15, 'Crank Shaft', 'PM240000'),
(16, 'Balok', 'PM240000'),
(17, 'Balok', 'PM240102');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` int(11) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `no_mesin` varchar(255) DEFAULT NULL,
  `gambar_mesin` varchar(255) DEFAULT NULL,
  `total_jam` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `nama_mesin`, `no_mesin`, `gambar_mesin`, `total_jam`) VALUES
(4, 'Bubut', NULL, 'bubut_1.jpg', 0),
(5, 'Bubut', '002', NULL, 0),
(6, 'Bor', NULL, 'bor_1.png', 0),
(7, 'Cnc Milling', NULL, 'cncmil_2.png', 0),
(10, 'Cnc Bubut', NULL, '093112600_1574929209-New_Project__3_.jpg', 0),
(17, 'External Grinding', NULL, 'eksgrind_1.jpg', 0),
(18, 'Internal Grinding', NULL, 'internalgrind_1.jpg', 1.7280555555556),
(19, 'Heat Treatment', NULL, 'heat_1.jpg', 0),
(20, 'Quality Control', NULL, 'qc_1.png', 0),
(21, 'Milling Manual', NULL, 'mil_1.png', 0.0058333333333333),
(24, 'Bor', '003', NULL, 0),
(25, 'Cnc Bubut', '004', NULL, 0),
(27, 'Quality Control', 'Qc-001', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengerjaan`
--

CREATE TABLE `pengerjaan` (
  `id_pengerjaan` int(11) NOT NULL,
  `id_prosesstart` int(11) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `no_mesin` varchar(255) DEFAULT NULL,
  `nama_komponen` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `no_spk` varchar(50) NOT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `wkt_pengerjaan` int(11) NOT NULL,
  `pelaksana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengerjaan`
--

INSERT INTO `pengerjaan` (`id_pengerjaan`, `id_prosesstart`, `nama_mesin`, `no_mesin`, `nama_komponen`, `nama_produk`, `no_spk`, `tgl_mulai`, `tgl_selesai`, `status`, `jml_barang`, `wkt_pengerjaan`, `pelaksana`) VALUES
(20, 27, 'Cnc Bubut', '004', 'As Roda', 'Mikrokontroller', 'PM240000', '2024-05-10 07:13:33', NULL, 'Diproses', 2, 3, 'Superuser'),
(21, 28, 'Cnc Bubut', '004', 'As Roda', 'Mikrokontroller', 'PM240000', '2024-05-10 07:19:07', NULL, 'Diproses', 2, 2, 'Superuser'),
(22, 29, 'Cnc Bubut', '004', 'Crank Shaft', 'Mikrokontroller', 'PM240000', NULL, NULL, 'Menunggu', 1, 5, NULL),
(23, 30, 'Cnc Bubut', '004', 'Balok', 'Gearbox', 'PM240102', NULL, NULL, 'Menunggu', 1, 2, NULL),
(24, 36, 'Quality Control', 'Qc-001', 'Crank Shaft', 'Mikrokontroller', 'PM240000', '2024-05-10 15:22:44', NULL, 'Diproses', 1, 1, 'Superuser');

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses_start` int(11) NOT NULL,
  `no_spk` varchar(50) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `no_mesin` varchar(255) DEFAULT NULL,
  `nama_komponen` varchar(255) NOT NULL,
  `durasi_waktu` int(11) NOT NULL,
  `jml_komponen` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id_proses_start`, `no_spk`, `nama_mesin`, `no_mesin`, `nama_komponen`, `durasi_waktu`, `jml_komponen`, `status`) VALUES
(27, 'PM240000', 'Cnc Bubut', '004', 'As Roda', 3, 2, 'Diproses'),
(28, 'PM240000', 'Cnc Bubut', '004', 'As Roda', 2, 2, 'Diproses'),
(29, 'PM240000', 'Cnc Bubut', '004', 'Crank Shaft', 5, 1, 'Menunggu'),
(30, 'PM240102', 'Cnc Bubut', '004', 'Balok', 2, 1, 'Menunggu'),
(36, 'PM240000', 'Quality Control', 'Qc-001', 'Crank Shaft', 1, 1, 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` int(11) NOT NULL,
  `pengorder` varchar(255) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jml_pesanan` int(11) NOT NULL,
  `gbr_kerja` varchar(255) DEFAULT NULL,
  `tgl_upm` date DEFAULT NULL,
  `no_penawar` varchar(255) DEFAULT NULL,
  `no_order` varchar(255) DEFAULT NULL,
  `no_spk` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `pengorder`, `tgl_selesai`, `tgl_penyerahan`, `nama_produk`, `jml_pesanan`, `gbr_kerja`, `tgl_upm`, `no_penawar`, `no_order`, `no_spk`, `status`) VALUES
(102, 'Rachmat Syaiful Mujab', '2024-05-11', '2024-05-09', 'Mikrokontroller', 1, 'https://upload.wikimedia.org/wikipedia/commons/3/38/Arduino_Uno_-_R3.jpg', '2024-05-25', 'Q24.0000', '0000/PTR/II/2024', 'PM240000', 'Diproses'),
(103, 'Pt.jaya Abadi', '2024-05-18', '2024-05-10', 'Gearbox', 1, NULL, '2024-05-25', 'Q24.0102', '0102/PTR/II/2024', 'PM240102', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `stok_gudang`
--

CREATE TABLE `stok_gudang` (
  `id_stoklogistik` int(11) NOT NULL,
  `no_spk` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `batas_waktu` date NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tempat_simpan` varchar(255) NOT NULL,
  `jml_komponen` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id_worker` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Role` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT 'profiles.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id_worker`, `Username`, `Password`, `Name`, `Role`, `profile_picture`) VALUES
(9, 'superuser', '$2y$10$wSOBpoFdSccpU6XKyvCr2eHbrhu5TZwutAvVdb7p/.xZSklzBgQnW', 'Superuser', 'Superuser', 'profiles.jpg'),
(10, '220441016', '$2y$10$38UbKf6oBoEQiB04qfssIuLRzIzCB53N/zCgjBvJF8jHvd2rMnkjq', 'Rachmat Syaiful Mujab', 'Operator', 'profiles.jpg'),
(11, 'Kajur', '$2y$10$imL7hjfA4SawV3lnZCNDNOOX31eZ1tMmus8SJ0.07dML.4bIBUvcW', 'Kajur', 'Kajur', 'profiles.jpg'),
(12, 'gudang', '$2y$10$aeW339PwmfOPjqT9eYoIXu93vgnldYI5c8NVTos4zrujI5lVWUaUK', 'Gudang', 'Gudang', 'profiles.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_order_logistik`
--
ALTER TABLE `form_order_logistik`
  ADD PRIMARY KEY (`id_orderlog`),
  ADD KEY `form_order_logistik_ibfk_2` (`no_spk`);

--
-- Indexes for table `google_calendar`
--
ALTER TABLE `google_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id_komponen`),
  ADD KEY `no_spk` (`no_spk`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`),
  ADD UNIQUE KEY `no_mesin` (`no_mesin`);

--
-- Indexes for table `pengerjaan`
--
ALTER TABLE `pengerjaan`
  ADD PRIMARY KEY (`id_pengerjaan`),
  ADD KEY `pengerjaan_ibfk_2` (`id_prosesstart`),
  ADD KEY `no_spk` (`no_spk`),
  ADD KEY `no_mesin` (`no_mesin`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses_start`),
  ADD KEY `no_spk` (`no_spk`),
  ADD KEY `no_mesin` (`no_mesin`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`),
  ADD UNIQUE KEY `no_order` (`no_order`) USING BTREE,
  ADD UNIQUE KEY `no_penawar` (`no_penawar`) USING BTREE,
  ADD UNIQUE KEY `no_spk` (`no_spk`) USING BTREE;

--
-- Indexes for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
  ADD PRIMARY KEY (`id_stoklogistik`),
  ADD KEY `stok_gudang_ibfk_1` (`no_spk`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id_worker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_order_logistik`
--
ALTER TABLE `form_order_logistik`
  MODIFY `id_orderlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pengerjaan`
--
ALTER TABLE `pengerjaan`
  MODIFY `id_pengerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id_proses_start` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
  MODIFY `id_stoklogistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_order_logistik`
--
ALTER TABLE `form_order_logistik`
  ADD CONSTRAINT `form_order_logistik_ibfk_2` FOREIGN KEY (`no_spk`) REFERENCES `spk` (`no_spk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komponen`
--
ALTER TABLE `komponen`
  ADD CONSTRAINT `komponen_ibfk_1` FOREIGN KEY (`no_spk`) REFERENCES `spk` (`no_spk`);

--
-- Constraints for table `pengerjaan`
--
ALTER TABLE `pengerjaan`
  ADD CONSTRAINT `pengerjaan_ibfk_2` FOREIGN KEY (`id_prosesstart`) REFERENCES `proses` (`id_proses_start`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengerjaan_ibfk_3` FOREIGN KEY (`no_spk`) REFERENCES `spk` (`no_spk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengerjaan_ibfk_4` FOREIGN KEY (`no_mesin`) REFERENCES `mesin` (`no_mesin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `proses_ibfk_1` FOREIGN KEY (`no_spk`) REFERENCES `spk` (`no_spk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proses_ibfk_2` FOREIGN KEY (`no_mesin`) REFERENCES `mesin` (`no_mesin`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
  ADD CONSTRAINT `stok_gudang_ibfk_1` FOREIGN KEY (`no_spk`) REFERENCES `spk` (`no_spk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
