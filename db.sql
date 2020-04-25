-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2020 at 05:29 AM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.3.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahptopsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `prodi` enum('adpend','manajemen','hukum') NOT NULL,
  `pembimbing1` varchar(30) DEFAULT NULL,
  `pembimbing2` varchar(30) DEFAULT NULL,
  `konsentrasi` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tglpengajuan` date DEFAULT NULL,
  `tglditerima` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nim`, `nama`, `prodi`, `pembimbing1`, `pembimbing2`, `konsentrasi`, `judul`, `tglpengajuan`, `tglditerima`) VALUES
(1, 'adasd', 'ZAM ZAM SAEFUL BAHTIAR', 'adpend', 'A07', 'A02', '2', '2', '0000-00-00', '0000-00-00'),
(2, '22', '22', 'adpend', 'A19', 'A02', '2', '2', '1970-01-01', '1970-01-01'),
(3, '2', '2', 'adpend', 'A19', 'A02', '2', '2', '1970-01-01', '1970-01-01'),
(4, '2', '2', 'adpend', 'A14', 'A02', '2', '2', '2000-09-02', '1970-01-01'),
(5, '3403170243', 'Intan Hartiwan', 'adpend', NULL, NULL, '23', '23', '1970-01-01', '1970-01-01'),
(6, '3403170243', 'Intan Hartiwan', 'adpend', NULL, NULL, '2', '2', '2020-04-22', NULL);

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
  `level` enum('0','1','2') NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `prodi` enum('adpend','hukum','manajamen') NOT NULL,
  `email` varchar(50) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `login_last` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `login_ip` varchar(30) NOT NULL,
  `login_os_browser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `gender`, `username`, `password`, `level`, `kode_alternatif`, `prodi`, `email`, `handphone`, `created_at`, `updated_at`, `login_last`, `login_ip`, `login_os_browser`) VALUES
(1, 'Harin Sanditha', 'Wanita', 'harin', 'fa18d54cb9b90baac79ce2bbbf028aec', '0', '', 'adpend', '', '', '2020-04-23 15:43:55', '2020-04-23 15:43:55', '0000-00-00 00:00:00', '', ''),
(2, 'Prof. Dr. H. Djam’an Satori, MA', 'Pria', '0002085003', '714ad82dddaa6fa94ab4d0f88e5ef3ac', '1', '', 'adpend', '', '', '2020-04-23 15:45:14', '2020-04-23 15:45:14', '0000-00-00 00:00:00', '', ''),
(3, 'Intan Hartiwan', 'Wanita', '3403170243', 'd5d9cb457a93e751293ef68e41d542c3', '2', '', 'adpend', '', '', '2020-04-23 15:46:04', '2020-04-23 15:46:04', '0000-00-00 00:00:00', '', ''),
(4, '222222222', 'Pria', '22222222222222', '26c924b47cf221582c9d5aede42dadf5', '0', '2222222222', 'adpend', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 'kkkkkkkkkkkkk', 'Wanita', '555555555555555', 'ac3c5467da09c3a9d71323ca0696fb31', '0', 'zamzamkase', 'adpend', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, '432007006170196', 'Wanita', '24', '1ff1de774005f8da13f42943881c655f', '1', '44', 'adpend', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;