-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2023 at 07:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monevco`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_terapi`
--

CREATE TABLE `hasil_terapi` (
  `id_hasil_terapi` int(11) NOT NULL,
  `rom` float NOT NULL,
  `dorsifleksi` float NOT NULL,
  `plantarfleksi` float NOT NULL,
  `durasi_langkah` float NOT NULL,
  `jumlah_langkah` float NOT NULL,
  `nama_pasien` varchar(120) NOT NULL,
  `nama_terapis` varchar(120) NOT NULL,
  `status` enum('Baik','Cukup Baik','Kurang Baik','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_terapi`
--

INSERT INTO `hasil_terapi` (`id_hasil_terapi`, `rom`, `dorsifleksi`, `plantarfleksi`, `durasi_langkah`, `jumlah_langkah`, `nama_pasien`, `nama_terapis`, `status`) VALUES
(1, 50.2, 20.7, 6, 20, 20, 'Wahyu Aji', 'Joko', 'Cukup Baik'),
(5, 2.3, 0.3, 32, 10.1, 11, 'budi', 'Joko', 'Kurang Baik'),
(6, 33, 44, 32, 29, 11, 'Wahyu Aji', 'Sandra Tania', 'Cukup Baik'),
(7, 29, 48, 4, 1.3, 3.2, 'budi', 'Joko', 'Cukup Baik'),
(8, 77, 77, 77, 77, 77, 'Wahyu Aji', 'Sandra Tania', 'Baik'),
(9, 10.3, 2.94, 38, 42, 230, 'budi', 'Sandra Tania', 'Baik'),
(11, 2.3, 77, 32, 77, 11, 'Welt', 'Joko', 'Baik'),
(12, 33, 77, 32, 77, 11, 'Welt', 'budi', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nama_pasien` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam`, `nama`, `nama_pasien`) VALUES
(24, 'SELASA', '07.30 - 12.00', 'Joko', 'budi'),
(39, 'SABTU', '09.00', 'Sandra Tania', 'Wahyu Aji'),
(40, 'SELASA', '15.00', 'Sandra Tania', 'Wahyu Aji'),
(41, 'JUMAT', '10.00', 'Sandra Tania', 'budi'),
(42, 'SABTU', '15.00', 'Joko', 'Wahyu Aji'),
(43, 'MINGGU', '10.00', 'Sandra Tania', 'budi'),
(46, 'SABTU', '12.00', 'budi', 'Wahyu Aji'),
(47, 'SABTU', '07.30 - 12.00', 'Joko', 'Wahyu Aji');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_terapi`
--

CREATE TABLE `riwayat_terapi` (
  `id_riwayatTerapi` int(11) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `nama_terapis` varchar(120) NOT NULL,
  `nama_pasien` varchar(120) NOT NULL,
  `status` enum('Baik','Cukup Baik','Kurang Baik','') NOT NULL,
  `hari` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_terapi`
--

INSERT INTO `riwayat_terapi` (`id_riwayatTerapi`, `catatan`, `nama_terapis`, `nama_pasien`, `status`, `hari`) VALUES
(9, 'Rutin', 'Joko', 'budi', 'Kurang Baik', 'Rabu'),
(12, 'Rutin', 'Joko', 'Wahyu Aji', 'Baik', 'Senin'),
(14, 'Secukupnya', 'Sandra Tania', 'Wahyu Aji', 'Baik', 'Senin'),
(15, 'Secukupnya', 'Sandra Tania', 'budi', 'Baik', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_user`
--

CREATE TABLE `tipe_user` (
  `id_tipeUser` int(11) NOT NULL,
  `kode_user` varchar(25) NOT NULL,
  `tipe_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_user`
--

INSERT INTO `tipe_user` (`id_tipeUser`, `kode_user`, `tipe_user`) VALUES
(1, 'ADM', 'Admin'),
(2, 'TRS', 'Terapis'),
(3, 'PSN', 'Pasien');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id_tipeUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `username`, `password`, `photo`, `id_tipeUser`) VALUES
(3, 'budi', 'Sidoarjo', '2022-07-03', 'Sidoarjo', '129194118', 'budi', 'budi', 'user_94d4289223.png', 2),
(7, 'Joko', 'Surabaya', '2022-07-28', 'Surabaya', '0891191914832', 'joko', 'joko', '', 2),
(10, 'Wahyu Aji', 'Surabaya', '2022-07-29', 'Surabaya', '087853328522', 'yuji', 'yuji', 'user_cd6f0c5042.jpg', 3),
(11, 'admin', 'Surabaya', '1999-02-24', 'Sidoarjo', '123341231123', 'admin', 'admin', 'user_79027bac04.jpg', 1),
(13, 'Welt', 'Sidoarjo', '2023-12-31', 'Sidoarjo', '087853328522', 'Welt', '123456', 'user_7b1f0cc7b4.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_terapi`
--
ALTER TABLE `hasil_terapi`
  ADD PRIMARY KEY (`id_hasil_terapi`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `riwayat_terapi`
--
ALTER TABLE `riwayat_terapi`
  ADD PRIMARY KEY (`id_riwayatTerapi`);

--
-- Indexes for table `tipe_user`
--
ALTER TABLE `tipe_user`
  ADD PRIMARY KEY (`id_tipeUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_tipeUser` (`id_tipeUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_terapi`
--
ALTER TABLE `hasil_terapi`
  MODIFY `id_hasil_terapi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `riwayat_terapi`
--
ALTER TABLE `riwayat_terapi`
  MODIFY `id_riwayatTerapi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tipe_user`
--
ALTER TABLE `tipe_user`
  MODIFY `id_tipeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_tipeUser`) REFERENCES `tipe_user` (`id_tipeUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
