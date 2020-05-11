-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2020 at 11:24 AM
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
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id` varchar(100) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `pembimbing` enum('1','2') NOT NULL,
  `bab` enum('1','2','3','4') NOT NULL,
  `status` enum('belum','sudah') NOT NULL,
  `tgl_acc` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id`, `id_pengajuan`, `pembimbing`, `bab`, `status`, `tgl_acc`) VALUES
('5eb8bd0d11657', 12, '1', '1', 'sudah', '2020-05-11 02:50:12'),
('5eb8bd6f77f1c', 12, '1', '2', 'sudah', '2020-05-11 02:51:46'),
('5eb8bded74f95', 12, '1', '3', 'sudah', '2020-05-11 02:53:04'),
('5eb8be2687fa2', 12, '1', '4', 'sudah', '2020-05-11 02:54:10'),
('5eb8beb69bcf1', 12, '2', '1', 'sudah', '2020-05-11 02:56:45'),
('5eb8befe497f4', 12, '2', '2', 'sudah', '2020-05-11 02:57:51'),
('5eb8bf3d9a642', 12, '2', '3', 'sudah', '2020-05-11 02:59:01'),
('5eb8bfa6bf6ea', 12, '2', '4', 'sudah', '2020-05-11 03:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan_detail`
--

CREATE TABLE `bimbingan_detail` (
  `id` varchar(100) NOT NULL,
  `id_bimbingan` varchar(100) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` text NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimbingan_detail`
--

INSERT INTO `bimbingan_detail` (`id`, `id_bimbingan`, `file`, `tanggal`, `deskripsi`, `id_pengguna`, `level`) VALUES
('5eb8bd4b99839', '5eb8bd0d11657', '5eb8bd4b99839.pdf', '2020-05-11 02:49:47', 'khghkgh', 7, '2'),
('5eb8bda093f29', '5eb8bd6f77f1c', '5eb8bda093f29.pdf', '2020-05-11 02:51:12', 'bab 2', 7, '2'),
('5eb8be0022a21', '5eb8bded74f95', '5eb8be0022a21.pdf', '2020-05-11 02:52:48', 'bab 3', 7, '2'),
('5eb8be4916245', '5eb8be2687fa2', '5eb8be4916245.pdf', '2020-05-11 02:54:01', 'bab 4', 7, '2'),
('5eb8bee2361dd', '5eb8beb69bcf1', '5eb8bee2361dd.pdf', '2020-05-11 02:56:34', 'bab 1', 7, '2'),
('5eb8bf1356a52', '5eb8befe497f4', '5eb8bf1356a52.pdf', '2020-05-11 02:57:23', 'bab 2', 7, '2'),
('5eb8bf527716e', '5eb8bf3d9a642', '5eb8bf527716e.pdf', '2020-05-11 02:58:26', 'bab 3', 7, '2'),
('5eb8bfc430956', '5eb8bfa6bf6ea', '5eb8bfc430956.pdf', '2020-05-11 03:00:20', 'dtd', 42, '1'),
('5eb8bfe99528b', '5eb8bfa6bf6ea', '5eb8bfe99528b.pdf', '2020-05-11 03:00:57', 'ads', 7, '2');

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
(57, 'Dr. Hj. Dyah Kusumastuti, MS', 'Wanita', '196912191995122001', '2c10b0f66cec37958da6beb592c474cb', '', '', ''),
(58, 'Dr. H. Kusnendi, M.Si', 'Pria', '132387529', '1d13861e3e6670cd64bb73ddf1459113', '', '', ''),
(59, 'Ir. H. Ridwan Sutriadi, MT., Ph.D', 'Pria', '131472257', 'e7a97658031e42366495dff1c41048ba', '', '', ''),
(60, 'Dr. Hj. Aini Kusniawati, MM', 'Wanita', '131457257', '44a7fc7b48462b6c61fc1afba908c221', '', '', ''),
(61, 'Dr. Hj. Irma Bastaman Darmawati, MM', 'Wanita', '3112334223', '8726e2c82d85859d44de0296820c2f3b', '', '', ''),
(62, 'Dr. H. Hariswan, SE., SH., MM., MH', 'Pria', '3132770223', '631ff973f255a1c2d9dae1a078b156db', '', '', ''),
(63, 'Dr. Ferey Herman, SE., MM', 'Pria', '3112770223', 'b5e211ed1a2d23bf79c6426844f7291e', '', '', ''),
(65, 'Dr. Apri Budianto, MM', 'Pria', '405106201', '7104e96f6854d58aa0f9f5a155e2764b', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `komprehensif`
--

CREATE TABLE `komprehensif` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `status` enum('ya','tidak') NOT NULL,
  `tgl_daftar` timestamp NULL DEFAULT NULL,
  `tgl_terima` timestamp NULL DEFAULT NULL,
  `tgl_sidang` date DEFAULT NULL,
  `id_penguji1` int(11) DEFAULT NULL,
  `id_penguji2` int(11) DEFAULT NULL,
  `id_penguji3` int(11) DEFAULT NULL,
  `nilai_1` int(11) DEFAULT NULL,
  `nilai_2` int(11) DEFAULT NULL,
  `nilai_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komprehensif`
--

INSERT INTO `komprehensif` (`id`, `id_pengajuan`, `status`, `tgl_daftar`, `tgl_terima`, `tgl_sidang`, `id_penguji1`, `id_penguji2`, `id_penguji3`, `nilai_1`, `nilai_2`, `nilai_3`) VALUES
(4, 12, 'ya', '2020-05-11 03:02:13', '2020-05-11 03:04:36', '2020-05-11', 36, 38, 40, 90, 89, 78);

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
  `konsentrasi` varchar(50) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `handphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `gender`, `username`, `password`, `konsentrasi`, `prodi`, `email`, `handphone`) VALUES
(7, 'sanditha', 'Wanita', '43200', 'f8db36f4eb09c494a1619ebe4d8db028', 'hukum perdata', 'hukum', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tglpengajuan` timestamp NULL DEFAULT NULL,
  `tglditerima` timestamp NULL DEFAULT NULL,
  `status` enum('tolak','terima','belum') NOT NULL DEFAULT 'belum',
  `latarbelakang` text NOT NULL,
  `tujuan` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_pembimbing1` int(11) DEFAULT NULL,
  `id_pembimbing2` int(11) DEFAULT NULL,
  `acc_bab_pembimbing1` enum('ya','belum') DEFAULT NULL,
  `acc_bab_pembimbing2` enum('ya','belum') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `id_mahasiswa`, `judul`, `tglpengajuan`, `tglditerima`, `status`, `latarbelakang`, `tujuan`, `keterangan`, `id_pembimbing1`, `id_pembimbing2`, `acc_bab_pembimbing1`, `acc_bab_pembimbing2`) VALUES
(12, 7, 'sistem manajemen pemasaran berbasis aplikasi', '2020-05-11 02:31:00', '2020-05-11 02:32:00', 'terima', 'drdg', 'dtff', NULL, 33, 42, 'ya', 'ya');

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
(67, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` varchar(150) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `file` varchar(150) NOT NULL,
  `tgl_seminar` date DEFAULT NULL,
  `acc_seminar` timestamp NULL DEFAULT NULL,
  `id_penguji1` int(11) DEFAULT NULL,
  `id_penguji2` int(11) DEFAULT NULL,
  `id_penguji3` int(11) DEFAULT NULL,
  `nilai_1` int(11) DEFAULT NULL,
  `nilai_2` int(11) DEFAULT NULL,
  `nilai_3` int(11) DEFAULT NULL,
  `revisi` enum('ya','tidak') DEFAULT NULL,
  `ket_revisi` text DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `id_pengajuan`, `file`, `tgl_seminar`, `acc_seminar`, `id_penguji1`, `id_penguji2`, `id_penguji3`, `nilai_1`, `nilai_2`, `nilai_3`, `revisi`, `ket_revisi`, `last_update`) VALUES
('5eb8ba25cdcde', 12, '5eb8ba25cdcde.pdf', '2020-05-11', '2020-05-11 02:37:09', 39, 45, 35, 89, 90, 88, 'tidak', NULL, '2020-05-11 02:36:21'),
('5eb8ba635b600', 12, '5eb8ba635b600.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 02:37:23'),
('5eb8bbdf2332b', 12, '5eb8bbdf2332b.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 02:43:43'),
('5eb8bcdcdaf72', 12, '5eb8bcdcdaf72.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 02:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `id` varchar(100) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `status` enum('ya','tidak') NOT NULL,
  `tgl_daftar` timestamp NULL DEFAULT NULL,
  `tgl_terima` timestamp NULL DEFAULT NULL,
  `tgl_sidang` date DEFAULT NULL,
  `id_penguji1` int(11) DEFAULT NULL,
  `id_penguji2` int(11) DEFAULT NULL,
  `id_penguji3` int(11) DEFAULT NULL,
  `nilai_1` int(11) DEFAULT NULL,
  `nilai_2` int(11) DEFAULT NULL,
  `nilai_3` int(11) DEFAULT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `id_pengajuan`, `status`, `tgl_daftar`, `tgl_terima`, `tgl_sidang`, `id_penguji1`, `id_penguji2`, `id_penguji3`, `nilai_1`, `nilai_2`, `nilai_3`, `file`) VALUES
('5eb8c1f084788', 12, 'ya', '2020-05-11 03:09:36', '2020-05-11 03:10:21', '2020-05-11', 39, 45, 35, 80, 88, 88, '5eb8c1f084788.pdf');

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
(1, 'Harin Sanditha', 'Wanita', 'harin', 'fa18d54cb9b90baac79ce2bbbf028aec', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `bimbingan_detail`
--
ALTER TABLE `bimbingan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bimbingan` (`id_bimbingan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `komprehensif`
--
ALTER TABLE `komprehensif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_penguji1` (`id_penguji1`),
  ADD KEY `id_penguji2` (`id_penguji2`),
  ADD KEY `id_penguji3` (`id_penguji3`);

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
  ADD UNIQUE KEY `judul` (`judul`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
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
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_pembimbing1` (`id_penguji1`),
  ADD KEY `id_pembimbing2` (`id_penguji2`),
  ADD KEY `id_pembimbing3` (`id_penguji3`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_penguji1` (`id_penguji1`),
  ADD KEY `id_penguji2` (`id_penguji2`),
  ADD KEY `id_penguji3` (`id_penguji3`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `komprehensif`
--
ALTER TABLE `komprehensif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prodi_detail`
--
ALTER TABLE `prodi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `bimbingan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id`);

--
-- Constraints for table `bimbingan_detail`
--
ALTER TABLE `bimbingan_detail`
  ADD CONSTRAINT `bimbingan_detail_ibfk_1` FOREIGN KEY (`id_bimbingan`) REFERENCES `bimbingan` (`id`);

--
-- Constraints for table `komprehensif`
--
ALTER TABLE `komprehensif`
  ADD CONSTRAINT `komprehensif_ibfk_1` FOREIGN KEY (`id_penguji1`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `komprehensif_ibfk_2` FOREIGN KEY (`id_penguji2`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `komprehensif_ibfk_3` FOREIGN KEY (`id_penguji3`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `komprehensif_ibfk_4` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_pembimbing1`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_pembimbing2`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `prodi_detail`
--
ALTER TABLE `prodi_detail`
  ADD CONSTRAINT `prodi_detail_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prodi_detail_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `proposal_ibfk_2` FOREIGN KEY (`id_penguji1`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `proposal_ibfk_3` FOREIGN KEY (`id_penguji2`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `proposal_ibfk_4` FOREIGN KEY (`id_penguji3`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `thesis`
--
ALTER TABLE `thesis`
  ADD CONSTRAINT `thesis_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id`),
  ADD CONSTRAINT `thesis_ibfk_2` FOREIGN KEY (`id_penguji1`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `thesis_ibfk_3` FOREIGN KEY (`id_penguji2`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `thesis_ibfk_4` FOREIGN KEY (`id_penguji3`) REFERENCES `dosen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;