-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2020 at 08:34 PM
-- Server version: 10.3.22-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawaluk1_ahptopmm`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `alternatif_kode` varchar(5) NOT NULL,
  `alternatif_nama` varchar(50) NOT NULL,
  `users_id` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif_kode`, `alternatif_nama`, `users_id`) VALUES
('A01', 'Prof. Dr. H. Suryana, M.Si.', '10'),
('A02', 'Prof. Dr. H. Sucherly, SE., MS', '49'),
('A03', 'Prof. Dr. H. Endang Sumantri, M.Ed', '50'),
('A04', 'Prof. Dr. Sadu Wasistiono, MS', '51'),
('A05', 'Prof. Dr. Endang Wirjatmi Trilestari, M.Si.', '52'),
('A06', 'Prof. Dr. H. Idrus Affandi, SH.', '53'),
('A07', 'Dr. H. A. A. Anwar Prabu Mangkunegara, MS., Psi.', '54'),
('A08', 'Dr. H. Yat Rospia Brata, M.Si', '55'),
('A09', 'Dr. H. Oyon Saryono, MM', '56'),
('A10', 'Dr. Hj. Dyah Kusumastuti, MS', '57'),
('A11', 'Dr. H. Kusnendi, M.Si', '58'),
('A12', 'Ir. H. Ridwan Sutriadi, MT., Ph.D', '59'),
('A13', 'Dr. Hj. Aini Kusniawati, MM', '60'),
('A14', 'Dr. Hj. Irma Bastaman Darmawati, MM', '61'),
('A15', 'Dr. H. Hariswan, SE., SH., MM., MH', '62'),
('A16', 'Dr. Ferey Herman, SE., MM', '63'),
('A17', 'Dr. H. Enas, SE., MM.', '29'),
('A18', 'Dr. Apri Budianto, MM', '65');

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
(1, 'A01', 0.314),
(2, 'A02', 0.547),
(3, 'A03', 0.323),
(4, 'A04', 0.521),
(5, 'A05', 0.527),
(6, 'A06', 0.282),
(7, 'A07', 0.518),
(8, 'A08', 0.332),
(9, 'A09', 0.427),
(10, 'A10', 0.457),
(11, 'A11', 0.261),
(12, 'A12', 0.694),
(13, 'A13', 0.641),
(14, 'A14', 0.8),
(15, 'A15', 0.327),
(16, 'A16', 0.471),
(17, 'A17', 0.283),
(18, 'A18', 0.273);

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
(47, 'A01', 25),
(48, 'A01', 27),
(50, 'A01', 34),
(51, 'A01', 35),
(52, 'A13', 38),
(53, 'A02', 22),
(54, 'A02', 25),
(55, 'A02', 27),
(56, 'A02', 31),
(57, 'A02', 32),
(58, 'A02', 36),
(59, 'A02', 39),
(60, 'A03', 21),
(61, 'A03', 25),
(62, 'A03', 27),
(63, 'A03', 30),
(64, 'A03', 34),
(65, 'A03', 35),
(66, 'A03', 40),
(67, 'A04', 22),
(68, 'A04', 24),
(69, 'A04', 27),
(70, 'A04', 31),
(71, 'A04', 34),
(72, 'A04', 35),
(73, 'A04', 41),
(74, 'A05', 22),
(75, 'A05', 25),
(76, 'A05', 27),
(77, 'A05', 29),
(78, 'A05', 34),
(79, 'A05', 36),
(80, 'A05', 38),
(81, 'A06', 21),
(82, 'A06', 24),
(83, 'A06', 27),
(84, 'A06', 31),
(85, 'A06', 32),
(86, 'A06', 36),
(87, 'A06', 39),
(88, 'A07', 22),
(89, 'A07', 25),
(90, 'A07', 27),
(91, 'A01', 29),
(92, 'A07', 34),
(93, 'A07', 29),
(94, 'A07', 37),
(95, 'A07', 40),
(96, 'A08', 21),
(97, 'A08', 25),
(98, 'A08', 27),
(99, 'A08', 31),
(100, 'A08', 32),
(101, 'A08', 35),
(102, 'A08', 41),
(103, 'A09', 22),
(104, 'A09', 24),
(105, 'A09', 26),
(106, 'A09', 28),
(107, 'A09', 33),
(108, 'A09', 37),
(109, 'A09', 38),
(110, 'A10', 22),
(111, 'A10', 24),
(112, 'A10', 27),
(113, 'A10', 29),
(114, 'A10', 34),
(115, 'A10', 36),
(116, 'A10', 39),
(117, 'A11', 21),
(118, 'A11', 25),
(119, 'A11', 26),
(120, 'A11', 28),
(121, 'A11', 33),
(122, 'A11', 35),
(123, 'A11', 40),
(124, 'A12', 23),
(125, 'A12', 24),
(126, 'A12', 27),
(127, 'A12', 30),
(128, 'A12', 34),
(129, 'A12', 36),
(130, 'A12', 41),
(131, 'A13', 23),
(132, 'A13', 24),
(133, 'A13', 26),
(134, 'A13', 28),
(135, 'A13', 33),
(136, 'A13', 36),
(137, 'A01', 38),
(138, 'A14', 23),
(139, 'A14', 25),
(140, 'A14', 27),
(141, 'A14', 30),
(142, 'A14', 34),
(143, 'A14', 37),
(144, 'A14', 39),
(145, 'A15', 21),
(146, 'A15', 25),
(147, 'A15', 27),
(148, 'A15', 30),
(149, 'A15', 34),
(150, 'A15', 37),
(151, 'A15', 40),
(152, 'A16', 22),
(153, 'A16', 26),
(154, 'A16', 28),
(155, 'A16', 33),
(156, 'A16', 36),
(157, 'A16', 41),
(158, 'A17', 21),
(159, 'A17', 25),
(160, 'A16', 25),
(161, 'A17', 26),
(162, 'A17', 28),
(163, 'A17', 33),
(164, 'A17', 37),
(165, 'A17', 38),
(166, 'A18', 21),
(167, 'A18', 25),
(168, 'A18', 26),
(169, 'A18', 28),
(170, 'A18', 33),
(171, 'A18', 37),
(172, 'A18', 39);

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
(21, 'B1', '7 sampai 11', 2),
(22, 'B1', '12 sampai 15', 6),
(23, 'B1', '16 full', 10),
(24, 'B2', 'Tidak Tetap', 5),
(25, 'B2', 'Tetap', 10),
(26, 'B3', 'lektor kepala', 10),
(27, 'B3', 'tenaga pengajar', 7),
(28, 'B4', '1-5 orang', 5),
(29, 'B4', '6-8 orang', 7),
(30, 'B4', '9-12 orang', 10),
(31, 'B4', '13-18 orang', 15),
(32, 'B5', '1 x /Minggu', 3),
(33, 'B5', '2 x /Minggu', 5),
(34, 'B5', '3 x /Minggu', 10),
(35, 'B6', 'Manajemen Pemerintahan', 5),
(36, 'B6', 'Manajemen Sumberdaya Manusia', 6),
(37, 'B6', 'Manajemen Pemasaran', 7),
(38, 'B7', 'Manajemen Strategi dan Manajemen Pemasaran', 10),
(39, 'B7', 'Metodologi Penelitian dan Sistem Informasi', 8),
(40, 'B7', 'Manajemen Keuangan dan Statistika Terapan', 6),
(41, 'B7', 'Manajemen Operasional dan Filsafat Ilmu ', 4);

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
(8, 'super', 'b0baee9d279d34fa1dfd71aadb908c3f', 'super', 'super@aaa.com', '08999', 'aaa', 'L', 'supervisor'),
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
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;