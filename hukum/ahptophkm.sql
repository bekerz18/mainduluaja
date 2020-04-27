-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2020 at 06:43 PM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.3.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahptophkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `alternatif_kode` varchar(5) NOT NULL,
  `alternatif_nama` varchar(50) NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif_kode`, `alternatif_nama`, `users_id`) VALUES
('A01', 'Prof. Dr. H. Day Ravena, SH., MH', 30),
('A02', 'Prof. Dr. H. Toto Suryaatmadja, SH., MH', 31),
('A03', 'Dr. Ida Farida, SH., MH', 32),
('A04', 'Dr. Hj. Nining Latianingsih, SH., MH', 33),
('A05', 'Dr. Nanang Abimanyu, drg., SP.KG., MH.Kes', 34),
('A06', 'Dr. Eman Sungkawa, SH., MH', 35),
('A07', 'Dr. H. Amin Mashur, DRS., SH., M.Hum', 36),
('A08', 'Dr. Juju Samsudin, SH., MH', 37),
('A09', 'Dr. H. Sobari, SH., MH', 38),
('A10', 'Brigjen (Pol) Dr. Agung Makbul, SH., MH', 39),
('A11', 'Dr. H. Yana Sahyana, SH., MH', 40),
('A12', 'Dr. R. Herman Katimin, SH., MH', 41),
('A13', 'Dr. Hj. Ratnawati, SH., MH', 42),
('A14', 'Dr. Hj Yetti Suciati, SH., MBA', 43),
('A15', 'Dr. H. Zulkarnaen, SH., MH', 44),
('A16', 'Dr. dr. Herdi Wibowo, SH., MH.Kes.,MM', 45),
('A17', 'Dr. Renny Supriyatni, SH., MH', 46),
('A18', 'Dr. Rachmatin Artita, SH., MH', 47);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_rank`
--

CREATE TABLE `hasil_rank` (
  `hr_id` int(11) NOT NULL,
  `alternatif_kode` varchar(5) NOT NULL,
  `hr_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_rank`
--

INSERT INTO `hasil_rank` (`hr_id`, `alternatif_kode`, `hr_value`) VALUES
(50, 'A01', 0.515),
(51, 'A02', 0.387),
(52, 'A03', 0.311),
(53, 'A04', 0.707),
(54, 'A05', 0.441),
(55, 'A06', 0.161),
(56, 'A07', 0.436),
(57, 'A08', 0.535),
(58, 'A09', 0.567),
(59, 'A10', 0.423),
(60, 'A11', 0.237),
(61, 'A12', 0.394),
(62, 'A13', 0.37),
(63, 'A14', 0.518),
(64, 'A15', 0.542),
(65, 'A16', 0.605),
(66, 'A17', 0.372),
(67, 'A18', 0.578);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_kode` varchar(5) NOT NULL,
  `kriteria_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_kode`, `kriteria_nama`) VALUES
('B1', 'Absen'),
('B2', 'Status Ikatan Kerja'),
('B3', 'Jabatan Akademik'),
('B4', 'Kuota Mahasiswa'),
('B5', 'Durasi Bimbingan'),
('B6', 'Konsentrasi Jurusan'),
('B7', 'Keahlian Matakuliah');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `alternatif_kode` varchar(5) NOT NULL,
  `parameter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `alternatif_kode`, `parameter_id`) VALUES
(46, 'A01', 21),
(47, 'A01', 24),
(48, 'A01', 26),
(49, 'A01', 33),
(50, 'A01', 37),
(51, 'A01', 39),
(52, 'A01', 41),
(53, 'A02', 22),
(54, 'A02', 24),
(55, 'A02', 34),
(56, 'A02', 36),
(57, 'A02', 40),
(58, 'A02', 42),
(59, 'A03', 21),
(60, 'A03', 25),
(61, 'A03', 29),
(62, 'A03', 30),
(63, 'A03', 36),
(64, 'A03', 40),
(65, 'A03', 43),
(66, 'A04', 22),
(67, 'A04', 24),
(68, 'A04', 26),
(69, 'A04', 32),
(70, 'A04', 37),
(71, 'A04', 38),
(72, 'A04', 44),
(73, 'A05', 22),
(74, 'A05', 24),
(75, 'A05', 26),
(76, 'A05', 31),
(77, 'A05', 36),
(78, 'A05', 39),
(79, 'A05', 41),
(80, 'A06', 21),
(81, 'A06', 24),
(82, 'A06', 28),
(83, 'A06', 30),
(84, 'A06', 36),
(85, 'A06', 40),
(86, 'A06', 42),
(87, 'A07', 22),
(88, 'A07', 24),
(89, 'A07', 26),
(90, 'A07', 31),
(91, 'A07', 36),
(92, 'A07', 40),
(93, 'A07', 43),
(94, 'A08', 21),
(95, 'A08', 24),
(96, 'A08', 26),
(97, 'A08', 33),
(98, 'A08', 37),
(99, 'A08', 38),
(100, 'A08', 44),
(101, 'A09', 22),
(102, 'A09', 24),
(103, 'A09', 26),
(104, 'A09', 33),
(105, 'A09', 37),
(106, 'A09', 39),
(107, 'A09', 41),
(108, 'A10', 22),
(109, 'A10', 24),
(110, 'A10', 26),
(111, 'A10', 31),
(112, 'A10', 36),
(113, 'A10', 38),
(114, 'A10', 42),
(115, 'A11', 21),
(116, 'A11', 24),
(117, 'A11', 27),
(118, 'A11', 30),
(119, 'A11', 35),
(120, 'A11', 40),
(121, 'A11', 43),
(122, 'A12', 23),
(123, 'A12', 24),
(124, 'A12', 28),
(125, 'A12', 30),
(126, 'A12', 36),
(127, 'A12', 38),
(128, 'A12', 44),
(129, 'A13', 23),
(130, 'A13', 24),
(131, 'A13', 29),
(132, 'A13', 30),
(133, 'A13', 36),
(134, 'A13', 39),
(135, 'A13', 41),
(136, 'A14', 23),
(137, 'A14', 24),
(138, 'A14', 26),
(139, 'A14', 31),
(140, 'A14', 37),
(141, 'A14', 40),
(142, 'A14', 42),
(143, 'A15', 21),
(144, 'A15', 25),
(145, 'A15', 27),
(146, 'A15', 32),
(147, 'A15', 35),
(148, 'A15', 38),
(149, 'A15', 43),
(150, 'A16', 22),
(151, 'A16', 24),
(152, 'A16', 26),
(153, 'A16', 34),
(154, 'A16', 36),
(155, 'A16', 39),
(156, 'A16', 44),
(157, 'A17', 21),
(158, 'A17', 24),
(159, 'A17', 26),
(160, 'A17', 30),
(161, 'A17', 36),
(162, 'A17', 38),
(163, 'A17', 41),
(164, 'A18', 21),
(165, 'A18', 25),
(166, 'A18', 28),
(167, 'A18', 32),
(168, 'A18', 37),
(169, 'A18', 39),
(170, 'A18', 42);

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `parameter_id` int(11) NOT NULL,
  `kriteria_kode` varchar(5) NOT NULL,
  `parameter_ukuran` varchar(50) NOT NULL,
  `parameter_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`parameter_id`, `kriteria_kode`, `parameter_ukuran`, `parameter_nilai`) VALUES
(21, 'B1', '7 sampai 11', 4),
(22, 'B1', '12 sampai 15', 8),
(23, 'B1', '16 full', 12),
(24, 'B2', 'Tidak Tetap', 5),
(25, 'B2', 'Tetap', 10),
(26, 'B3', 'tenaga pengajar', 10),
(27, 'B3', 'lektor kepala', 5),
(28, 'B3', 'lektor', 3),
(29, 'B3', 'wakil rektor', 3),
(30, 'B4', '1-5 orang', 3),
(31, 'B4', '6-8 orang', 5),
(32, 'B4', '19-25 orang', 20),
(33, 'B4', '13-18 orang', 10),
(34, 'B4', '9-12 orang', 15),
(35, 'B5', '1 x /Minggu', 3),
(36, 'B5', '2 x /Minggu', 5),
(37, 'B5', '3 x /Minggu', 10),
(38, 'B6', 'Hukum Pidana', 8),
(39, 'B6', 'Hukum Tata Negara', 10),
(40, 'B6', 'Hukum Perdata', 6),
(41, 'B7', 'Filsafat Ilmu Hukum dan Tindak Pidana Medis', 6),
(42, 'B7', 'Hukum Tata Lingkungan dan Sengketa Hukum Pemilu', 5),
(43, 'B7', 'Hukum Bisnis Internasional dan Hukum Perbankan', 8),
(44, 'B7', 'Tindak Pidana Korupsi dan Hukum Ekonomi', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `sk_id` varchar(5) NOT NULL,
  `kriteria_kode` varchar(5) NOT NULL,
  `sk_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` char(12) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_jk` enum('L','P') NOT NULL,
  `user_role` enum('admin','supervisor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_email`, `user_tel`, `user_alamat`, `user_jk`, `user_role`) VALUES
(8, 'super', '202cb962ac59075b964b07152d234b70', 'super', 'super@aaa.com', '08999', 'aaa', 'L', 'supervisor'),
(9, 'harin', '827ccb0eea8a706c4c34a16891f84e7b', 'Harin Sanditha', 'harins@yahoo.com', '082217116202', 'ciamis', 'P', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`alternatif_kode`);

--
-- Indexes for table `hasil_rank`
--
ALTER TABLE `hasil_rank`
  ADD PRIMARY KEY (`hr_id`),
  ADD KEY `alternatif_kode` (`alternatif_kode`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_kode`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `alternatif_kode` (`alternatif_kode`),
  ADD KEY `parameter_id` (`parameter_id`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`parameter_id`),
  ADD KEY `kriteria_kode` (`kriteria_kode`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`sk_id`),
  ADD KEY `kriteria_kode` (`kriteria_kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_rank`
--
ALTER TABLE `hasil_rank`
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_rank`
--
ALTER TABLE `hasil_rank`
  ADD CONSTRAINT `hasil_rank_ibfk_1` FOREIGN KEY (`alternatif_kode`) REFERENCES `alternatif` (`alternatif_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`alternatif_kode`) REFERENCES `alternatif` (`alternatif_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`parameter_id`) REFERENCES `parameter` (`parameter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `parameter_ibfk_1` FOREIGN KEY (`kriteria_kode`) REFERENCES `kriteria` (`kriteria_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_kode`) REFERENCES `kriteria` (`kriteria_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;