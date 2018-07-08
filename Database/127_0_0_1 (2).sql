-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2018 at 06:11 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempenilaiankaryawan`
--
CREATE DATABASE IF NOT EXISTS `sistempenilaiankaryawan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistempenilaiankaryawan`;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `tanggal_lahir` varchar(250) NOT NULL,
  `pendidikan` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `posisi` varchar(250) NOT NULL,
  `akhir_kontrak` varchar(250) NOT NULL,
  `status_penilaian_hod` int(11) NOT NULL DEFAULT '0',
  `status_penilaian_hrd` int(11) NOT NULL DEFAULT '0',
  `status_penilaian_gm` int(11) NOT NULL DEFAULT '0',
  `status_perpanjang_kontrak` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_lengkap`, `tanggal_lahir`, `pendidikan`, `department`, `posisi`, `akhir_kontrak`, `status_penilaian_hod`, `status_penilaian_hrd`, `status_penilaian_gm`, `status_perpanjang_kontrak`) VALUES
(2, 'asdada', '06/26/2018', 'asdsad', 'asgfasga', 'gasga', 'asgsaga', 1, 1, 1, 99),
(3, 'neymar', '06/29/2018', 'sma', 'usaha', 'uhsa', '20 tahun', 1, 1, 1, 0),
(4, 'fathan', '07/16/2018', 's1', 'lineen', 'supervioser', '1 tahun', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `penilaian_1` int(11) NOT NULL,
  `penilaian_2` int(11) NOT NULL,
  `penilaian_3` int(11) NOT NULL,
  `penilaian_4` int(11) NOT NULL,
  `penilaian_5` int(11) NOT NULL,
  `penilaian_6` int(11) NOT NULL,
  `penilaian_7` int(11) NOT NULL,
  `penilaian_8` int(11) NOT NULL,
  `penilaian_9` int(11) NOT NULL,
  `penilaian_10` int(11) NOT NULL,
  `penilaian_11` int(11) NOT NULL,
  `penilaian_12` int(11) NOT NULL,
  `pemberi_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_pegawai`, `penilaian_1`, `penilaian_2`, `penilaian_3`, `penilaian_4`, `penilaian_5`, `penilaian_6`, `penilaian_7`, `penilaian_8`, `penilaian_9`, `penilaian_10`, `penilaian_11`, `penilaian_12`, `pemberi_nilai`) VALUES
(1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(7, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 1),
(8, 3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 2),
(9, 3, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 3),
(10, 4, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 1),
(11, 4, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 2),
(12, 4, 10, 10, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'adminhod', '3ed8fb66b1ee8d343fbc98909364ce95', 1),
(2, 'adminhrd', '5aa06f6061f47ba35c1ba56529d6efc1', 2),
(3, 'gm', '92073d2fe26e543ce222cc0fb0b7d7a0', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
