-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 09:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasikelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`) VALUES
(12, 'X RPL 1'),
(13, 'X RPL 2'),
(14, 'X AKL'),
(15, 'X OTKP'),
(16, 'XI RPL 1'),
(17, 'XI RPL 2'),
(18, 'XI OTKP'),
(19, 'XI AKL'),
(20, 'XII RPL 1'),
(21, 'XII RPL 2'),
(22, 'XII OTKP'),
(23, 'XII AKL'),
(24, 'XIII RPL 1'),
(25, 'XIII RPL 2');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `notif` char(1) NOT NULL,
  `gallery` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tanggal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id`, `notif`, `gallery`, `email`, `username`, `password`, `tanggal`) VALUES
(1, 'y', '6187405d5a6e0.jpg', 'david@gmail.com', 'davidgs', '$2y$10$u/udwf21hdwMhKAtlbC.HeROwTf8OZ5hh7zxD1OJEjFfz1Bj1M2Oa', '04 October 2021'),
(4, 'y', '6185fc75240b6.png', 'admin@gmail.com', 'admin', '$2y$10$Nfr9q9rMfb8nc0al/D6F.u4ylGr/OJj/y2uiqw53kMvmTJfezcBNW', '06 November 2021');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tanggallahir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `email`, `nisn`, `kelas`, `tanggallahir`) VALUES
(254, 'David Garcia Saragih', 'davidgarciasaragih6@gmail.com', '2098390298', '16', '2005-09-13'),
(255, 'Jojo', 'jojo@gmail.com', '893873802989', '19', '2005-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nopinjam` varchar(25) NOT NULL,
  `nisnsiswa` varchar(49) NOT NULL,
  `judulbuku` varchar(80) NOT NULL,
  `tanggalpinjam` varchar(30) NOT NULL,
  `tanggalkembali` varchar(30) NOT NULL,
  `denda` varchar(50) NOT NULL,
  `totalbuku` varchar(10) NOT NULL,
  `uniqid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nopinjam`, `nisnsiswa`, `judulbuku`, `tanggalpinjam`, `tanggalkembali`, `denda`, `totalbuku`, `uniqid`) VALUES
(25, 'TP0025', '2098390298', '4', '2022-02-12', '2022-02-15', '824000', '2', '631b5710070d0');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `kodepenerbit` varchar(50) NOT NULL,
  `namapenerbit` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `kodepenerbit`, `namapenerbit`) VALUES
(5, 'BKCT44', 'Bintang Indonesia Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `pengarang` varchar(80) NOT NULL,
  `idpenerbit` varchar(80) NOT NULL,
  `jumlahbuku` varchar(10) NOT NULL,
  `denda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `idpenerbit`, `jumlahbuku`, `denda`) VALUES
(4, 'Danau Lipan', 'Shendiane Rimandani', '5', '0', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `utama`
--

CREATE TABLE `utama` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `logo2` varchar(30) NOT NULL,
  `copyright` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utama`
--

INSERT INTO `utama` (`id`, `nama`, `logo2`, `copyright`) VALUES
(1, 'Perpustakaan', '618cf98dbf0ad.png', '2022 by Dava');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `kelas` (`kelas`),
  ADD UNIQUE KEY `kelas_2` (`kelas`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `judulbuku` (`judulbuku`),
  ADD KEY `nisnsiswa` (`nisnsiswa`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idpenerbit` (`idpenerbit`);

--
-- Indexes for table `utama`
--
ALTER TABLE `utama`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `utama`
--
ALTER TABLE `utama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
