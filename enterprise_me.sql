-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20230111.1d37607132
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 07:36 AM
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
  `no_barang` varchar(255) NOT NULL,
  `no_gambar` varchar(255) NOT NULL,
  `tgl_penerima` date NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `nama_pelaksana` varchar(255) NOT NULL,
  `record_order` varchar(255) DEFAULT NULL,
  `catatan` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_order_logistik`
--

INSERT INTO `form_order_logistik` (`id_orderlog`, `no_spk`, `pemesan`, `tanggal_created`, `unit_kerja`, `batas_waktu`, `disetujui`, `jml_satuan`, `nama_barang`, `no_barang`, `no_gambar`, `tgl_penerima`, `nama_penerima`, `tgl_pembelian`, `tgl_pesanan`, `berat_barang`, `nama_pelaksana`, `record_order`, `catatan`) VALUES
(6, 'PM240051', 'Rachmat Syaiful', '2024-04-01', 'Milling', '2024-04-02', '1', 2, 'Arduino', '1', 'G0003', '2024-04-01', 'Sri Asih', '2024-04-03', '2024-04-04', 1, 'Sakamoto', NULL, ''),
(9, 'PM240050', 'Asdad', '2024-04-13', 'Asdsad', '2024-05-04', '1', 2, 'Asdsadsa', 'asdsad', 'Asdsadsdada', '2024-04-27', 'Asdadsddsadsa', '2024-04-13', '2024-04-10', 1, 'Asdas', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `form_proses`
--

CREATE TABLE `form_proses` (
  `id_proses_start` int(11) NOT NULL,
  `id_stoklogistik` int(11) NOT NULL,
  `id_orderlog` int(11) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_spk` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `nama_pembuat` varchar(100) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `durasi_waktu` int(11) NOT NULL,
  `komponen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` int(11) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `no_mesin` varchar(255) DEFAULT NULL,
  `gambar_mesin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `nama_mesin`, `no_mesin`, `gambar_mesin`) VALUES
(4, 'Bubut', NULL, 'bubut_1.jpg'),
(5, 'Bubut', '002', NULL),
(6, 'Bor', NULL, 'bor_1.png'),
(7, 'Cnc Milling', NULL, 'cncmil_2.png'),
(10, 'Cnc Bubut', NULL, '093112600_1574929209-New_Project__3_.jpg'),
(17, 'External Grinding', NULL, 'eksgrind_1.jpg'),
(18, 'Internal Grinding', NULL, 'internalgrind_1.jpg'),
(19, 'Heat Treatment', NULL, 'heat_1.jpg'),
(20, 'Quality Control', NULL, 'qc_1.png'),
(21, 'Milling Manual', NULL, 'mil_1.png'),
(24, 'Bor', '003', NULL),
(25, 'Cnc Bubut', '004', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengerjaan`
--

CREATE TABLE `pengerjaan` (
  `id_pengerjaan` int(11) NOT NULL,
  `id_spk` int(11) NOT NULL,
  `id_prosesstart` int(11) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `tgl_selesai` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `wkt_pengerjaan` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `no_spk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `pengorder`, `tgl_selesai`, `tgl_penyerahan`, `nama_produk`, `jml_pesanan`, `gbr_kerja`, `tgl_upm`, `no_penawar`, `no_order`, `no_spk`) VALUES
(51, 'Rachmat Syaiful M', '2024-04-27', '2024-04-11', 'Mikrokontroller', 1, 'https://cdn-icons-png.flaticon.com/512/5968/5968332.png', '2024-05-04', 'Q24.0050', '0050/PTR/II/2024', 'PM240050'),
(52, 'Thomas Shelby', '2024-05-11', '2024-03-08', 'Shaft', 89, 'https://upload.wikimedia.org/wikipedia/commons/3/38/Arduino_Uno_-_R3.jpg', '2024-04-27', 'Q24.0051', '0051/PTR/II/2024', 'PM240051'),
(53, 'Agung', '2024-03-23', '2024-03-08', 'Jubah', 68, NULL, '2024-04-25', 'Q24.0052', '0052/PTR/II/2024', 'PM240052'),
(58, 'Ipman', '2024-03-18', '2024-03-13', 'Gearbox', 1, NULL, '2024-03-27', 'Q24.0053', '0053/PTR/II/2024', 'PM240053'),
(59, 'Yang Chen', '2024-03-28', '2024-03-13', 'Pesawat', 22, 'https://samehadaku.show/undead-unluck-episode-22/', '2024-03-18', 'Q24.0058', '0058/PTR/II/2024', 'PM240058'),
(60, 'korra', '2024-04-15', '2024-03-20', 'panah', 1, 'https://cdn.oneesports.id/cdn-data/wp-content/uploads/sites/2/2020/05/MLBB_PopolandKupa.jpg', '2024-04-02', 'Q24.0059', '0059/PTR/II/2024', 'PM240059'),
(61, 'Kol', '2024-04-25', '2024-02-26', 'Panah', 1, NULL, '2024-03-26', 'Q24.0060', '0060/PTR/II/2024', 'PM240060'),
(69, 'Adsadsa', '2024-04-27', '2024-04-13', 'Fffff', 1, NULL, '2024-05-04', 'Q24.0061', '0061/PTR/II/2024', 'PM240061'),
(70, 'Kontol', '2024-04-27', '2024-04-24', 'Asdsad', 1, NULL, '2024-05-04', 'Q24.0069', '0069/PTR/II/2024', 'PM240069'),
(71, 'Kolpri', '2024-04-27', '2024-04-11', 'Asd', 1, NULL, '2024-04-20', 'Q24.0070', '0070/PTR/II/2024', 'PM240070'),
(72, 'Koko', '2024-04-27', '2024-04-19', 'Bracket Arduino', 1, 'https://cdn-icons-png.flaticon.com/512/5968/5968332.png', '2024-05-04', 'Q24.0071', '0071/PTR/II/2024', 'PM240071'),
(74, 'Kolp', '2024-04-27', '2024-04-20', 'Kolll', 3, NULL, '2024-05-11', 'Q24.0073', '0073/PTR/II/2024', 'PM240073'),
(75, 'Asdasda', '2024-05-11', '2024-04-27', 'Asdasdasdasd', 1, NULL, '2024-05-04', 'Q24.0074', '0074/PTR/II/2024', 'PM240074'),
(76, 'Adasdasd', '2024-04-26', '2024-04-10', 'Aasdasdasd', 1, NULL, '2024-05-11', 'Q24.0075', '0075/PTR/II/2024', 'PM240075'),
(97, 'Dsf', '2024-04-25', '2024-04-11', 'Ret', 1, NULL, '2024-06-01', 'Q24.0076', '0076/PTR/II/2024', 'PM240076');

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

--
-- Dumping data for table `stok_gudang`
--

INSERT INTO `stok_gudang` (`id_stoklogistik`, `no_spk`, `nama_penerima`, `status`, `batas_waktu`, `nama_barang`, `tempat_simpan`, `jml_komponen`) VALUES
(6, 'PM240059', 'Rachmat Syaiful Mujab', 'Tersedia', '2024-04-25', 'Arduino', 'Rak A', 10);

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
  ADD KEY `no_spk` (`no_spk`);

--
-- Indexes for table `form_proses`
--
ALTER TABLE `form_proses`
  ADD PRIMARY KEY (`id_proses_start`),
  ADD KEY `form_proses_ibfk_1` (`id_mesin`),
  ADD KEY `form_proses_ibfk_2` (`id_orderlog`),
  ADD KEY `form_proses_ibfk_3` (`id_stoklogistik`),
  ADD KEY `id_spk` (`id_spk`),
  ADD KEY `no_order` (`no_order`);

--
-- Indexes for table `google_calendar`
--
ALTER TABLE `google_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indexes for table `pengerjaan`
--
ALTER TABLE `pengerjaan`
  ADD PRIMARY KEY (`id_pengerjaan`),
  ADD KEY `id_mesin` (`id_mesin`),
  ADD KEY `id_prosesstart` (`id_prosesstart`),
  ADD KEY `id_spk` (`id_spk`),
  ADD KEY `id_worker` (`id_worker`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`),
  ADD UNIQUE KEY `no_spk` (`no_spk`),
  ADD UNIQUE KEY `no_order` (`no_order`) USING BTREE,
  ADD UNIQUE KEY `no_penawar` (`no_penawar`);

--
-- Indexes for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
  ADD PRIMARY KEY (`id_stoklogistik`),
  ADD KEY `no_spk` (`no_spk`);

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
  MODIFY `id_orderlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form_proses`
--
ALTER TABLE `form_proses`
  MODIFY `id_proses_start` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengerjaan`
--
ALTER TABLE `pengerjaan`
  MODIFY `id_pengerjaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
  MODIFY `id_stoklogistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `form_order_logistik_ibfk_2` FOREIGN KEY (`no_spk`) REFERENCES `spk` (`no_spk`);

--
-- Constraints for table `form_proses`
--
ALTER TABLE `form_proses`
  ADD CONSTRAINT `form_proses_ibfk_1` FOREIGN KEY (`id_mesin`) REFERENCES `mesin` (`id_mesin`) ON DELETE NO ACTION,
  ADD CONSTRAINT `form_proses_ibfk_3` FOREIGN KEY (`id_stoklogistik`) REFERENCES `stok_gudang` (`id_stoklogistik`) ON DELETE NO ACTION,
  ADD CONSTRAINT `form_proses_ibfk_4` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`),
  ADD CONSTRAINT `form_proses_ibfk_5` FOREIGN KEY (`no_order`) REFERENCES `spk` (`no_order`);

--
-- Constraints for table `pengerjaan`
--
ALTER TABLE `pengerjaan`
  ADD CONSTRAINT `pengerjaan_ibfk_1` FOREIGN KEY (`id_mesin`) REFERENCES `mesin` (`id_mesin`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pengerjaan_ibfk_2` FOREIGN KEY (`id_prosesstart`) REFERENCES `form_proses` (`id_proses_start`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pengerjaan_ibfk_3` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pengerjaan_ibfk_4` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`) ON DELETE NO ACTION;

--
-- Constraints for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
  ADD CONSTRAINT `stok_gudang_ibfk_1` FOREIGN KEY (`no_spk`) REFERENCES `spk` (`no_spk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
