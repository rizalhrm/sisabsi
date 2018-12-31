-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2018 at 08:46 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisabsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `ida` int(10) NOT NULL,
  `ids` int(10) NOT NULL,
  `idj` int(11) NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `ket` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`ida`, `ids`, `idj`, `tgl`, `ket`) VALUES
(1, 11, 2, '2018-05-01', 'M'),
(2, 12, 2, '2018-05-01', 'M'),
(3, 13, 2, '2018-05-01', 'M'),
(4, 23, 2, '2018-05-01', 'M'),
(5, 25, 2, '2018-05-01', 'S'),
(6, 27, 2, '2018-05-01', 'A'),
(7, 11, 2, '2018-05-08', 'S'),
(8, 12, 2, '2018-05-08', 'M'),
(9, 13, 2, '2018-05-08', 'M'),
(10, 23, 2, '2018-05-08', 'I'),
(11, 25, 2, '2018-05-08', 'M'),
(12, 27, 2, '2018-05-08', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idg` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(3) NOT NULL,
  `alamat` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idg`, `nip`, `nama`, `jk`, `alamat`, `pass`) VALUES
(9, '19610506199', 'Utami, M. Pd.', 'P', '-', '77e69c137812518e359196bb2f5e9bb9'),
(10, '19540914972', 'Dra. Hj. Latifah', 'P', '-', '77e69c137812518e359196bb2f5e9bb9'),
(13, '19661025191		', 'Yasin, S.Pd', 'L', '-', '77e69c137812518e359196bb2f5e9bb9'),
(17, '34547566583', 'Ibnu, S.Pd', 'L', '-', '77e69c137812518e359196bb2f5e9bb9'),
(18, '34627426463', 'Drs. Masrur', 'L', '-', '77e69c137812518e359196bb2f5e9bb9'),
(19, '72427476493', 'Syarifuddin, S.Ag', 'L', '-', '77e69c137812518e359196bb2f5e9bb9'),
(21, '44357356372', 'Rina, S.Pd', 'P', '-', '77e69c137812518e359196bb2f5e9bb9'),
(23, '17367626692', 'Rizki, ST.', 'L', '-', '77e69c137812518e359196bb2f5e9bb9'),
(24, '70547476433', 'Drs. Nur', 'L', '-', '77e69c137812518e359196bb2f5e9bb9'),
(25, '74377586613', 'Rizal Hermawan, M.Kom', 'L', '-', '77e69c137812518e359196bb2f5e9bb9');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `idh` int(11) NOT NULL,
  `hari` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`idh`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum''at');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idj` int(11) NOT NULL,
  `idh` int(11) NOT NULL,
  `idg` int(11) NOT NULL,
  `idk` int(11) NOT NULL,
  `idm` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idj`, `idh`, `idg`, `idk`, `idm`, `jam_mulai`, `jam_selesai`, `aktif`) VALUES
(1, 1, 9, 7, 2, '07:00:00', '09:00:00', 0),
(2, 2, 25, 8, 1, '07:00:00', '09:00:00', 0),
(4, 3, 25, 7, 1, '14:00:00', '15:00:00', 1),
(5, 3, 25, 9, 1, '13:00:00', '15:00:00', 1),
(6, 2, 23, 7, 3, '10:00:00', '12:00:00', 0),
(7, 4, 10, 9, 3, '10:00:00', '12:00:00', 0),
(8, 2, 17, 8, 3, '13:00:00', '15:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idk` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idk`, `id`, `nama`) VALUES
(7, 2, 'VII'),
(8, 2, 'VIII'),
(9, 2, 'IX');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `idm` int(11) NOT NULL,
  `nama_mp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`idm`, `nama_mp`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia'),
(3, 'Ilmu Pengetahuan Alam');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(10) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `kode`, `nama`, `alamat`) VALUES
(2, '2010902872872', 'SMP Negeri 46 Depok', 'Jl. FX Sejahtera No. 46 Depok Timur , Depok 16446');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `ids` int(10) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `idk` int(5) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `bapak` varchar(50) NOT NULL,
  `k_bapak` varchar(50) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `k_ibu` varchar(50) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ids`, `nis`, `nama`, `jk`, `alamat`, `idk`, `tlp`, `bapak`, `k_bapak`, `ibu`, `k_ibu`, `pass`) VALUES
(1, '9965340897', 'Zildjian', 'L', '-', 7, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(5, '9974601836', 'Mitra', 'P', '-', 7, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(8, '9974601924', 'Dhea', 'P', '-', 7, '85954590935', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(9, '9974601993', 'Armando', 'L', '-', 7, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(10, '9974602034', 'Yunaz', 'L', '-', 7, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(11, '9974602051', 'Susanto', 'L', '-', 8, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(12, '9974602083', 'Rani', 'P', '-', 8, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(13, '9974602096', 'Hardianti', 'P', '-', 8, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(23, '9974603377', 'Ari Nur', 'L', '-', 8, '85954590935', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(25, '9985109543', 'Adit', 'L', '-', 8, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(27, '9965320857', 'Bani', 'L', '-', 8, '85733743907', '-', '-', '-', '-', 'd41d8cd98f00b204e9800998ecf8427e'),
(28, '9974603400', 'Angel', 'P', '-', 9, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(29, '9965320870', 'Rezah', 'L', '-', 9, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(30, '9965320876', 'Dwi', 'L', '-', 9, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(34, '9965320890', 'Evi', 'P', '-', 9, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(35, '9985109574', 'Fio', 'P', '-', 9, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102'),
(36, '9965320905', 'Rindy', 'P', '-', 9, '85733743907', '-', '-', '-', '-', 'bcd724d15cde8c47650fda962968f102');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idu` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pass` text NOT NULL,
  `level` varchar(50) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idu`, `nama`, `pass`, `level`, `id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`ida`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idg`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`idh`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idj`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idk`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `ida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `idh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
