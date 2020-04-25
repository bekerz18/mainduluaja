--
-- Database: `ahptopadm`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `alternatif_kode` varchar(5) NOT NULL,
  `alternatif_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif_kode`, `alternatif_nama`) VALUES
('A01', 'Prof. Dr. H. Djam’an Satori, MA'),
('A02', 'Prof. Dr. H. Suryana, M.Si.'),
('A03', 'Prof. dr. H. JS. Husdarta, M.Pd. '),
('A04', 'Prof. Dr. H. Wahyudin, M.Pd.'),
('A05', 'Prof. Dr. H. Dadang Suhardan, M.Pd'),
('A06', 'Prof. Dr. H.  Toto SGU, M.Pd'),
('A07', 'Prof. Dr. H. Udin Saud, M.Pd.'),
('A08', 'Prof. Dr. H. Yudha, MS., M.s.'),
('A09', 'Prof. Dr. Herman Subarjah, M.Si.'),
('A10', 'Dr. H. Tatang Parjaman, M.Si.'),
('A11', 'Dr. H. Kusnandi, MM., M.Pd.'),
('A12', 'Dr. H. Awang Kustiawan, MM.'),
('A13', 'Dr. Maman Herman, M.Pd.'),
('A14', 'Dr. Hj. Elly Resli Rachlan, MM.'),
('A15', 'Dr. H. Abdul Rohman, M.Pd.'),
('A16', 'Dr. H. Toto, M.Pd.'),
('A17', 'Dr. Hj. Dedeh Rukaesih, M.Pd.'),
('A18', 'Dr. H. Adun Rusyana, M.Pd.'),
('A19', 'Dr. H. Nono Mulyono, MM.'),
('A20', 'Dr. Alan Rusyandi, MM.'),
('A21', 'Dr. H. Enas, MM.');

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
(50, 'A01', 0.381),
(52, 'A02', 0.455),
(53, 'A03', 0.34),
(54, 'A04', 0.494),
(55, 'A05', 0.496),
(56, 'A06', 0.358),
(57, 'A07', 0.513),
(58, 'A08', 0.377),
(59, 'A09', 0.457),
(60, 'A10', 0.449),
(62, 'A11', 0.255),
(63, 'A12', 0.651),
(64, 'A13', 0.568),
(65, 'A14', 0.701),
(66, 'A15', 0.403),
(67, 'A16', 0.407),
(68, 'A17', 0.354),
(69, 'A18', 0.417),
(70, 'A19', 0.664),
(71, 'A20', 0.657),
(72, 'A21', 0.319);

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
(46, 'A01', 22),
(47, 'A02', 23),
(48, 'A03', 22),
(50, 'A04', 23),
(51, 'A05', 23),
(52, 'A06', 22),
(53, 'A07', 23),
(54, 'A01', 25),
(55, 'A03', 25),
(56, 'A02', 25),
(57, 'A04', 26),
(58, 'A05', 26),
(59, 'A06', 25),
(60, 'A07', 26),
(61, 'A01', 27),
(62, 'A02', 27),
(63, 'A03', 27),
(64, 'A04', 27),
(65, 'A05', 27),
(66, 'A06', 27),
(67, 'A07', 27),
(68, 'A01', 34),
(69, 'A02', 34),
(70, 'A03', 34),
(71, 'A04', 33),
(72, 'A05', 33),
(73, 'A06', 34),
(74, 'A07', 33),
(75, 'A01', 38),
(76, 'A02', 37),
(77, 'A03', 36),
(78, 'A04', 38),
(79, 'A05', 38),
(80, 'A06', 37),
(81, 'A07', 38),
(82, 'A01', 41),
(83, 'A02', 40),
(84, 'A03', 41),
(85, 'A04', 42),
(86, 'A05', 42),
(87, 'A06', 42),
(88, 'A07', 40),
(89, 'A01', 43),
(90, 'A02', 44),
(91, 'A03', 45),
(92, 'A04', 46),
(93, 'A05', 47),
(94, 'A06', 48),
(95, 'A07', 43),
(96, 'A08', 22),
(97, 'A08', 25),
(98, 'A08', 27),
(99, 'A08', 34),
(100, 'A08', 37),
(101, 'A08', 40),
(102, 'A08', 44),
(103, 'A09', 23),
(104, 'A09', 25),
(105, 'A09', 27),
(106, 'A09', 34),
(107, 'A09', 37),
(108, 'A09', 40),
(109, 'A09', 45),
(126, 'A12', 24),
(127, 'A12', 26),
(128, 'A12', 29),
(129, 'A12', 35),
(130, 'A12', 37),
(131, 'A12', 39),
(132, 'A12', 48),
(133, 'A13', 24),
(134, 'A13', 26),
(135, 'A13', 30),
(136, 'A13', 32),
(137, 'A13', 36),
(138, 'A13', 42),
(139, 'A13', 43),
(140, 'A14', 24),
(141, 'A14', 26),
(142, 'A14', 28),
(143, 'A14', 35),
(144, 'A14', 37),
(145, 'A14', 41),
(146, 'A14', 44),
(147, 'A15', 22),
(148, 'A15', 26),
(149, 'A15', 27),
(150, 'A15', 33),
(151, 'A15', 38),
(152, 'A15', 39),
(153, 'A15', 45),
(154, 'A16', 23),
(155, 'A16', 26),
(156, 'A16', 29),
(157, 'A16', 31),
(158, 'A16', 36),
(159, 'A16', 40),
(160, 'A16', 46),
(161, 'A17', 22),
(162, 'A17', 25),
(163, 'A16', 27),
(164, 'A16', 34),
(165, 'A17', 34),
(166, 'A17', 27),
(167, 'A17', 37),
(168, 'A17', 41),
(169, 'A17', 47),
(170, 'A18', 22),
(171, 'A18', 26),
(172, 'A18', 27),
(173, 'A18', 33),
(174, 'A18', 38),
(175, 'A18', 42),
(176, 'A18', 48),
(177, 'A19', 24),
(178, 'A19', 25),
(179, 'A19', 27),
(180, 'A19', 34),
(181, 'A19', 37),
(182, 'A19', 42),
(183, 'A19', 43),
(184, 'A20', 24),
(185, 'A20', 26),
(186, 'A20', 29),
(187, 'A20', 35),
(188, 'A20', 37),
(189, 'A20', 41),
(190, 'A20', 44),
(191, 'A21', 23),
(192, 'A21', 26),
(193, 'A21', 28),
(194, 'A21', 31),
(195, 'A21', 36),
(196, 'A21', 39),
(197, 'A21', 45),
(198, 'A11', 22),
(199, 'A11', 26),
(200, 'A11', 28),
(201, 'A11', 31),
(202, 'A11', 36),
(203, 'A11', 39),
(204, 'A11', 47),
(205, 'A10', 23),
(206, 'A10', 26),
(207, 'A10', 27),
(208, 'A10', 33),
(209, 'A10', 37),
(210, 'A10', 39),
(211, 'A10', 46);

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
(22, 'B1', '7 sampai 11', 3),
(23, 'B1', '12 sampai 15', 5),
(24, 'B1', '16 full', 10),
(25, 'B2', 'Tidak Tetap', 5),
(26, 'B2', 'Tetap', 10),
(27, 'B3', 'tenaga pengajar', 10),
(28, 'B3', 'lektor kepala', 5),
(29, 'B3', 'lektor', 3),
(30, 'B3', 'wakil rektor', 3),
(31, 'B4', '1-5 orang', 3),
(32, 'B4', '6-8 orang', 5),
(33, 'B4', '19-25 orang', 7),
(34, 'B4', '13-18 orang', 10),
(35, 'B4', '9-12 orang', 15),
(36, 'B5', '1 x /Minggu', 3),
(37, 'B5', '2 x /Minggu', 5),
(38, 'B5', '3 x /Minggu', 10),
(39, 'B6', 'Adm Pend Olahraga', 3),
(40, 'B6', 'Adm Sistem Pendidikan', 10),
(41, 'B6', 'Adm Pendidikan Dasar', 5),
(42, 'B6', 'Adm Pend LuarSekolah', 5),
(43, 'B7', 'Pengantar Ilmu Sosial dan Kepemimpinan Pendidikan', 3),
(44, 'B7', 'Statistika dan Matematika Ekonomi', 4),
(45, 'B7', 'Kimia Organik dan Kimia Anorganik', 5),
(46, 'B7', 'Etika Profesi dan Keguruan Manajemen Keuangan', 6),
(47, 'B7', 'Pengelolaan Pendidikan dan Reading For General Pur', 7),
(48, 'B7', 'Kapita Selekta Kependidikan dan Ilmu Pendidikan', 8);

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
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
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
