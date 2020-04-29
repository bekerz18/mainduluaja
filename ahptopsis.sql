-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2020 at 08:33 PM
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
-- Database: `kawaluk1_ahptopsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(1209) NOT NULL,
  `gender` enum('Pria','Wanita') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `handphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `gender`, `username`, `password`, `kode_alternatif`, `email`, `handphone`) VALUES
(9, 'Prof. Dr. H. Djam’an Satori, MA', 'Pria', '195008021973031000', '32ec1cf6d36480de04e4795a2b376143', '', '', ''),
(10, 'Prof. Dr. H. Suryana, M.Si.', 'Pria', '196006021986011000', '9793794cf06034fe89386210298398a7', '', '', ''),
(11, 'Prof. dr. H. JS. Husdarta, M.Pd. ', 'Pria', '194506121973031000', '48748d53fdbb0a3e3c4479ab921e67ce', '', '', ''),
(12, 'Prof. Dr. H. Wahyudin, M.Pd.', 'Pria', '195108081974121000', '3ea96429faa81f7e5b4502467629bf03', '', '', ''),
(13, 'Prof. Dr. H. Dadang Suhardan, M.Pd', 'Pria', '13044302', '9fbfedf58bf9375afb21a5332da2e8c4', '', '', ''),
(14, 'Prof. Dr. H.  Toto SGU, M.Pd', 'Pria', '195610291984031000', '1bcce4b63376a9a85994eba3b8782bfa', '', '', ''),
(15, 'Prof. Dr. H. Udin Saud, M.Pd.', 'Pria', '195306121981031000', 'a0603da3f4cbafcd8b23f32623606075', '', '', ''),
(16, 'Prof. Dr. H. Yudha, MS., M.s.', 'Pria', '19630312198', 'c552bd74731c3b2b0fa7c21b5af5e53a', '', '', ''),
(17, 'Prof. Dr. Herman Subarjah, M.Si.', 'Pria', '196000918198603000', '541b47d171f045018a54ce2f9284f2d0', '', '', ''),
(18, 'Dr. H. Tatang Parjaman, M.Si.', 'Pria', '195811051986011000', 'f45af52d68168cfc95bbd2a975c18142', '', '', ''),
(19, 'Dr. H. Kusnandi, MM., M.Pd.', 'Pria', '12106201', 'd0cca2f9ff1f89edd9bdac10a4f7e323', '', '', ''),
(20, 'Dr. H. Awang Kustiawan, MM.', 'Pria', '131578550', 'c848d1a5e7e61a8946af3f2aca7e5bed', '', '', ''),
(21, 'Dr. Maman Herman, M.Pd.', 'Pria', '3112770252', '4cf9320209dccd0b393f3ee6f70f8fc0', '', '', ''),
(22, 'Dr. Hj. Elly Resli Rachlan, MM.', 'Wanita', '401095802', '03c1c18c5f60036f8ab1c11a36947eb9', '', '', ''),
(23, 'Dr. H. Abdul Rohman, M.Pd.', 'Pria', '414026605', '0904d8b6cb1267eba62dab02b0057885', '', '', ''),
(24, 'Dr. H. Toto, M.Pd.', 'Pria', '131648930', '85574e811451b7c22c1ece254a5d44d8', '', '', ''),
(25, 'Dr. Hj. Dedeh Rukaesih, M.Pd.', 'Wanita', '131690342', '322c7f672d65a6aa89bfa1a5aedfe062', '', '', ''),
(26, 'Dr. H. Adun Rusyana, M.Pd.', 'Pria', '131839196', 'ec9177bc4c9e479240b4946b04c4070c', '', '', ''),
(27, 'Dr. H. Nono Mulyono, MM.', 'Pria', '196112221981091000', '972ab18697bea2fc5334a13308f1fb57', '', '', ''),
(28, 'Dr. Alan Rusyandi, MM.', 'Pria', '195804041988111000', 'bdee08b80e78093173fde5fdb6a4438d', '', '', ''),
(29, 'Dr. H. Enas, SE., MM.', 'Pria', '410046401', '81247ad61ef5dd3f9e00780e63e2624d', '', '', ''),
(30, 'Prof. Dr. H. Day Ravena, SH., MH', 'Pria', '11035903', 'a98ee61250997b81f5a8a3191fdec6b8', '', '', ''),
(31, 'Prof. Dr. H. Toto Suryaatmadja, SH., MH', 'Pria', '11035923', '1f4cbb5db76974b2f14b4596a77b2085', '', '', ''),
(32, 'Dr. Ida Farida, SH., MH', 'Wanita', '420026802', 'b84d12ac803ac90eb905b82eabd76e42', '', '', ''),
(33, 'Dr. Hj. Nining Latianingsih, SH., MH', 'Wanita', '196209301992032000', '6918905c1fab9274d284cf50e96ec9bf', '', '', ''),
(34, 'Dr. Nanang Abimanyu, drg., SP.KG., MH.Kes', 'Pria', '420026821', '4a612dbbfe79c94893f510a5af8c451f', '', '', ''),
(35, 'Dr. Eman Sungkawa, SH., MH', 'Pria', '420026832', 'd5d21e84e6d24b5ff52387a441f37f2b', '', '', ''),
(36, 'Dr. H. Amin Mashur, DRS., SH., M.Hum', 'Pria', '420026844', '668cdc48217b7c66eecb830a2de5e868', '', '', ''),
(37, 'Dr. Juju Samsudin, SH., MH', 'Pria', '420026212', '2ebb30ae02531f33f5ad5c293ec24c39', '', '', ''),
(38, 'Dr. H. Sobari, SH., MH', 'Pria', '420023302', 'd03d6aee0f7cec30f0a5d094b2e220b4', '', '', ''),
(39, 'Brigjen (Pol) Dr. Agung Makbul, SH., MH', 'Pria', '420024802', '6cb4078fcd9fcec56df7d0905860afca', '', '', ''),
(40, 'Dr. H. Yana Sahyana, SH., MH', 'Pria', '420024828', 'e9c30c8892835f3dc0b42b43394aae12', '', '', ''),
(41, 'Dr. R. Herman Katimin, SH., MH', 'Pria', '195108081973432000', '8c5dba68ee918fed7a35b80b3950d4a9', '', '', ''),
(42, 'Dr. Hj. Ratnawati, SH., MH', 'Wanita', '195134381934121000', 'fe92e788776bcd514a1db0b8b66af385', '', '', ''),
(43, 'Dr. Hj Yetti Suciati, SH., MBA', 'Wanita', '195108085543421000', '0f18b4d5b59caa77f0ee9ceef8fc21e9', '', '', ''),
(44, 'Dr. H. Zulkarnaen, SH., MH', 'Pria', '195108667854513000', '8fb24e74fbbf7481367bcfd9b0fa6ed2', '', '', ''),
(45, 'Dr. dr. Herdi Wibowo, SH., MH.Kes.,MM', 'Pria', '195108081974435000', 'f4285b29470830d8acd715f58ceb9161', '', '', ''),
(46, 'Dr. Renny Supriyatni, SH., MH', 'Wanita', '131345642', '3842352af789d2ed6774649b9b3b3271', '', '', ''),
(47, 'Dr. Rachmatin Artita, SH., MH', 'Pria', '131877862', '2f8ddc9f59917a867e723365421581df', '', '', ''),
(49, 'Prof. Dr. H. Sucherly, SE., MS', 'Pria', '131839887', 'ded03cdc4c960ad87dffd51ae763f60c', '', '', ''),
(50, 'Prof. Dr. H. Endang Sumantri, M.Ed', 'Pria', '3112774343', 'c05420b3260f4331d72f11ed496e4998', '', '', ''),
(51, 'Prof. Dr. Sadu Wasistiono, MS', 'Pria', '3112774533', 'cfc26fe60d5fec47022d4ff97b25be04', '', '', ''),
(52, 'Prof. Dr. Endang Wirjatmi Trilestari, M.Si.', 'Wanita', '405101123', '34cc478b77d016b5b4e1cf4d39df1f57', '', '', ''),
(53, 'Prof. Dr. H. Idrus Affandi, SH.', 'Pria', '405177634', 'f523e72ed670b1c0a491e1d90ea46b70', '', '', ''),
(54, 'Dr. H. A. A. Anwar Prabu Mangkunegara, MS., Psi.', 'Pria', '405144356', '944029cd2551f58be721918f1566681e', '', '', ''),
(55, 'Dr. H. Yat Rospia Brata, M.Si', 'Pria', '3112770003', '27120865f439d85e88ca6868c674f1e5', '', '', ''),
(56, 'Dr. H. Oyon Saryono, MM', 'Pria', '195701131980021000', '063a0a5407129982d0742cc692630903', '', '', ''),
(57, 'Dr. Dyah Indriana Kusumastuti,S.T.,M.Sc', 'Wanita', '196912191995122001', '2c10b0f66cec37958da6beb592c474cb', '', '', ''),
(58, 'Dr. H. Kusnendi, M.Si', 'Pria', '132387529', '1d13861e3e6670cd64bb73ddf1459113', '', '', ''),
(59, 'Ir. H. Ridwan Sutriadi, MT., Ph.D', 'Pria', '131472257', 'e7a97658031e42366495dff1c41048ba', '', '', ''),
(60, 'Dr. Hj. Aini Kusniawati, MM', 'Wanita', '131457257', '44a7fc7b48462b6c61fc1afba908c221', '', '', ''),
(61, 'Dr. Hj. Irma Bastaman Darmawati, MM', 'Wanita', '3112334223', '8726e2c82d85859d44de0296820c2f3b', '', '', ''),
(62, 'Dr. H. Hariswan, SE., SH., MM., MH', 'Pria', '3132770223', '631ff973f255a1c2d9dae1a078b156db', '', '', ''),
(63, 'Dr. Ferey Herman, SE., MM', 'Pria', '3112770223', 'b5e211ed1a2d23bf79c6426844f7291e', '', '', ''),
(65, 'Dr. Apri Budianto, MM', 'Pria', '405106201', '7104e96f6854d58aa0f9f5a155e2764b', '', '', ''),
(67, 'ZAM ZAM SAEFUL BAHTIAR', 'Pria', 'z', 'fbade9e36a3f36d3d676c1b808451dd7', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(1209) NOT NULL,
  `gender` enum('Pria','Wanita') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `handphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `gender`, `username`, `password`, `prodi`, `email`, `handphone`) VALUES
(7, 'Dede Sujana', 'Pria', '823514150413', 'e8f3d63f0714cf25adf55ae686713626', 'adpend', '', ''),
(8, 'Cecep Kusnandar', 'Pria', '823214150913', 'ec5271af1f558615a00bcb877b1083e0', 'adpend', '', ''),
(9, 'Ganda Sukmana', 'Pria', '823214150153', '0be1a9000f57446a1f389ec0eff91e1c', 'adpend', '', ''),
(12, 'Triani Widyanti', 'Wanita', '1311476165', 'b3199fad6fe4350bf013e67371a4c01b', 'adpend', '', ''),
(14, ' Heri Siswanto', 'Pria', '3300070140', '7c6ebedefc0e9c13a4be8a04247748ec', 'manajemen', '', ''),
(15, 'Riadhi Sanjaya', 'Pria', '3403130079', '47b3acb2f8aae2f14c4ee4ee86c93db2', 'manajemen', '', ''),
(16, 'Sri Wulandari', 'Wanita', '2109140006', '6eb38c768a1c0f07c91ea47f8fba058d', 'manajemen', '', ''),
(17, 'Erwin Yulianto', 'Wanita', '0425068404', 'c163eb78eabc004432495969c7f09ab0', 'manajemen', '', ''),
(18, 'Alwi Patoni', 'Pria', '82337190001', 'b91dd74e8a9c10f60a995d0aec9be94f', 'hukum', '', ''),
(19, 'Dewi Setiawati', 'Wanita', '82337190004', 'f9d7b93dcbce9337e9b752de1ae236ea', 'hukum', '', ''),
(20, 'Muhammad Indanus', 'Pria', '82337190007', '5cb90b6120bedbc8e64cba4fdbe86cd7', 'hukum', '', ''),
(21, 'Yoga Noviyanto', 'Pria', '82337190012', '29e1cc1cae6f36ea3b35bd6d404613dd', 'hukum', '', ''),
(22, 'Nurhayati', 'Wanita', '82337190009', '6808cad98a975c6045d8d8ed4f454e01', 'hukum', '', ''),
(23, 'Harin Sanditha Rahmawati', 'Wanita', '6160138', '34110146d443256a1325aa0c1105ec0b', 'hukum', '', ''),
(24, 'Eldi Mulyana', 'Pria', '12000965', '82f7f280c2ce8fd0cd82461946dcd148', 'adpend', '', ''),
(25, 'Emay Irmayanti', 'Wanita', '82341718029', '40054172a67c8188916c637b9e1d5929', 'manajemen', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `id_pembimbing1` int(11) DEFAULT NULL,
  `id_pembimbing2` int(11) DEFAULT NULL,
  `konsentrasi` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tglpengajuan` timestamp NULL DEFAULT NULL,
  `tglditerima` timestamp NULL DEFAULT NULL,
  `status` enum('tolak','terima','belum') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `id_mahasiswa`, `prodi`, `id_pembimbing1`, `id_pembimbing2`, `konsentrasi`, `judul`, `tglpengajuan`, `tglditerima`, `status`) VALUES
(13, 23, 'manajemen', NULL, NULL, 'Hukum Perdata', 'Sistem Informasi Hukum Perdata', '2020-04-29 05:50:27', NULL, 'belum'),
(14, 17, 'manajemen', NULL, NULL, 'Manajemen Sumberdaya Manusia', 'Pengaruh Kompetensi Dan Program Merchant Day Terhadap Customer Relationship Management Serta Dampakn', '2020-04-29 09:37:45', NULL, 'belum'),
(15, 17, 'adpend', NULL, NULL, 'Bala Bala Haneut', 'Gorengan', '2020-04-29 11:57:45', NULL, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `sebutan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `sebutan`) VALUES
(1, 'Administrasi Pendidikan', 'adpend'),
(2, 'Manajemen', 'manajemen'),
(3, 'Hukum', 'hukum');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_detail`
--

CREATE TABLE `prodi_detail` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi_detail`
--

INSERT INTO `prodi_detail` (`id`, `id_prodi`, `id_dosen`) VALUES
(1, 1, 9),
(2, 1, 10),
(3, 1, 11),
(4, 1, 12),
(5, 1, 13),
(6, 1, 14),
(7, 1, 15),
(8, 1, 16),
(9, 1, 17),
(10, 1, 18),
(11, 1, 19),
(12, 1, 20),
(13, 1, 21),
(14, 1, 22),
(15, 1, 23),
(16, 1, 24),
(17, 1, 25),
(18, 1, 26),
(19, 1, 27),
(20, 1, 28),
(21, 1, 29),
(23, 3, 31),
(24, 3, 32),
(25, 3, 33),
(26, 3, 34),
(27, 3, 35),
(28, 3, 36),
(29, 3, 37),
(30, 3, 38),
(31, 3, 39),
(32, 3, 40),
(33, 3, 41),
(34, 3, 42),
(35, 3, 43),
(36, 3, 44),
(37, 3, 45),
(38, 3, 46),
(39, 3, 47),
(40, 2, 49),
(41, 2, 50),
(42, 2, 51),
(43, 2, 52),
(44, 2, 53),
(45, 2, 54),
(46, 2, 55),
(47, 2, 56),
(48, 2, 57),
(49, 2, 58),
(50, 2, 59),
(51, 2, 60),
(52, 2, 61),
(53, 2, 62),
(54, 2, 63),
(55, 2, 65),
(56, 2, 29),
(57, 2, 10),
(60, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(1209) NOT NULL,
  `gender` enum('Pria','Wanita') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `handphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `gender`, `username`, `password`, `email`, `handphone`) VALUES
(1, 'Harin Sanditha', 'Wanita', 'harin', 'fa18d54cb9b90baac79ce2bbbf028aec', '', ''),
(2, 'ZAM ZAM SAEFUL BAHTIAR', 'Pria', 'zamzam', 'd0db05aabb991942a64e1b599ce379f9', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`,`prodi`,`id_pembimbing1`,`id_pembimbing2`,`konsentrasi`),
  ADD KEY `prodi` (`prodi`),
  ADD KEY `id_pembimbing1` (`id_pembimbing1`),
  ADD KEY `id_pembimbing2` (`id_pembimbing2`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sebutan` (`sebutan`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `prodi_detail`
--
ALTER TABLE `prodi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prodi_detail`
--
ALTER TABLE `prodi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_pembimbing1`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_pembimbing2`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `prodi` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`sebutan`) ON UPDATE CASCADE;

--
-- Constraints for table `prodi_detail`
--
ALTER TABLE `prodi_detail`
  ADD CONSTRAINT `prodi_detail_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prodi_detail_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;