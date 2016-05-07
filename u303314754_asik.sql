
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2016 at 06:07 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u303314754_asik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `nama_lengkap`, `password`, `username`, `no_telp`) VALUES
(1, 'administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin', '081905461213'),
(12, 'Eko Okda', '72e4e8e12b03631bfe6b3e88fa6f9b1e', 'eko.okda', '081912345678');

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE IF NOT EXISTS `bukutamu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `guest_name`, `email`, `judul`, `pesan`) VALUES
(8, 'Eko Okda', 'eko.okda@gmail.com', '9 Langkah menjadi master Framework', 'bla..bla..bla..');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `location` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=177 ;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `location`, `ipaddress`) VALUES
(1, '/index.php', '180.252.165.33'),
(2, '/index.php', '180.252.165.33'),
(3, '/index.php', '180.252.163.102'),
(4, '/index.php', '64.233.173.160'),
(5, '/index.php', '180.252.163.102'),
(6, '/index.php', '8.37.237.142'),
(7, '/index.php', '8.37.237.142'),
(8, '/index.php', '8.37.237.142'),
(9, '/index.php', '112.215.63.22'),
(10, '/index.php', '124.153.33.36'),
(11, '/index.php', '223.255.229.75'),
(12, '/index.php', '124.153.33.36'),
(13, '/index.php', '180.252.163.102'),
(14, '/index.php', '36.77.221.84'),
(15, '/index.php', '107.167.98.134'),
(16, '/index.php', '223.255.229.75'),
(17, '/index.php', '36.77.221.84'),
(18, '/index.php', '180.252.163.102'),
(19, '/index.php', '180.252.163.102'),
(20, '/index.php', '70.39.186.47'),
(21, '/index.php', '223.255.229.75'),
(22, '/index.php', '223.255.229.75'),
(23, '/index.php', '223.255.229.75'),
(24, '/index.php', '107.167.113.114'),
(25, '/index.php', '107.167.113.114'),
(26, '/index.php', '107.167.113.114'),
(27, '/index.php', '107.167.113.114'),
(28, '/index.php', '223.255.229.75'),
(29, '/index.php', '107.167.113.114'),
(30, '/index.php', '107.167.113.114'),
(31, '/index.php', '70.39.186.48'),
(32, '/index.php', '36.77.215.172'),
(33, '/index.php', '203.174.11.138'),
(34, '/index.php', '36.77.221.84'),
(35, '/index.php', '36.77.221.84'),
(36, '/index.php', '203.174.11.138'),
(37, '/index.php', '107.167.112.141'),
(38, '/index.php', '203.174.11.138'),
(39, '/index.php', '107.167.112.141'),
(40, '/index.php', '180.252.163.102'),
(41, '/index.php', '112.215.63.20'),
(42, '/index.php', '180.252.163.102'),
(43, '/index.php', '180.252.163.102'),
(44, '/index.php', '180.252.163.102'),
(45, '/index.php', '180.252.163.102'),
(46, '/index.php', '180.252.163.102'),
(47, '/index.php', '180.252.163.102'),
(48, '/index.php', '112.215.63.20'),
(49, '/index.php', '8.37.237.142'),
(50, '/index.php', '8.37.237.142'),
(51, '/index.php', '8.37.237.142'),
(52, '/index.php', '180.252.163.102'),
(53, '/index.php', '8.37.237.142'),
(54, '/index.php', '180.252.163.102'),
(55, '/index.php', '8.37.237.142'),
(56, '/index.php', '180.252.163.102'),
(57, '/index.php', '180.252.163.102'),
(58, '/index.php', '8.37.237.142'),
(59, '/index.php', '8.37.237.142'),
(60, '/index.php', '180.252.163.102'),
(61, '/index.php', '8.37.237.142'),
(62, '/index.php', '130.193.51.75'),
(63, '/index.php', '180.252.163.102'),
(64, '/index.php', '8.37.237.142'),
(65, '/index.php', '8.37.237.142'),
(66, '/index.php', '180.252.163.102'),
(67, '/index.php', '39.250.154.45'),
(68, '/index.php', '39.250.154.45'),
(69, '/index.php', '168.235.206.229'),
(70, '/index.php', '180.252.163.102'),
(71, '/index.php', '39.250.154.45'),
(72, '/index.php', '168.235.206.229'),
(73, '/index.php', '180.252.163.102'),
(74, '/index.php', '112.215.63.20'),
(75, '/index.php', '180.252.163.102'),
(76, '/index.php', '180.252.163.102'),
(77, '/index.php', '8.37.237.142'),
(78, '/index.php', '8.37.237.142'),
(79, '/index.php', '180.252.163.102'),
(80, '/index.php', '93.158.152.72'),
(81, '/index.php', '180.252.163.102'),
(82, '/index.php', '180.252.163.102'),
(83, '/index.php', '180.252.163.102'),
(84, '/index.php', '8.37.237.142'),
(85, '/index.php', '112.215.63.22'),
(86, '/index.php', '8.37.237.142'),
(87, '/index.php', '112.215.63.22'),
(88, '/index.php', '8.37.237.142'),
(89, '/index.php', '8.37.237.142'),
(90, '/index.php', '8.37.237.142'),
(91, '/index.php', '8.37.237.142'),
(92, '/index.php', '8.37.237.142'),
(93, '/index.php', '8.37.237.142'),
(94, '/index.php', '8.37.237.142'),
(95, '/index.php', '8.37.237.142'),
(96, '/index.php', '8.37.237.142'),
(97, '/index.php', '8.37.237.142'),
(98, '/index.php', '180.252.163.102'),
(99, '/index.php', '8.37.237.142'),
(100, '/index.php', '114.4.79.40'),
(101, '/index.php', '112.215.63.20'),
(102, '/index.php', '114.4.79.40'),
(103, '/index.php', '115.178.201.160'),
(104, '/index.php', '223.255.230.31'),
(105, '/index.php', '223.255.230.3'),
(106, '/index.php', '115.178.201.160'),
(107, '/index.php', '115.178.201.160'),
(108, '/index.php', '115.178.201.160'),
(109, '/index.php', '115.178.201.160'),
(110, '/index.php', '112.215.63.22'),
(111, '/index.php', '107.167.98.134'),
(112, '/index.php', '107.167.99.115'),
(113, '/index.php', '107.167.99.115'),
(114, '/index.php', '107.167.99.115'),
(115, '/index.php', '64.233.173.170'),
(116, '/index.php', '114.121.130.191'),
(117, '/index.php', '112.215.63.22'),
(118, '/index.php', '114.121.130.191'),
(119, '/index.php', '114.121.130.191'),
(120, '/index.php', '112.215.63.22'),
(121, '/index.php', '114.121.130.191'),
(122, '/index.php', '112.215.63.22'),
(123, '/index.php', '64.233.173.160'),
(124, '/index.php', '114.121.130.191'),
(125, '/index.php', '114.121.130.191'),
(126, '/index.php', '114.121.130.191'),
(127, '/index.php', '64.233.173.166'),
(128, '/index.php', '114.121.130.191'),
(129, '/index.php', '112.215.63.22'),
(130, '/index.php', '107.167.98.134'),
(131, '/index.php', '114.121.130.191'),
(132, '/index.php', '114.121.130.191'),
(133, '/index.php', '107.167.98.4'),
(134, '/index.php', '114.121.130.191'),
(135, '/index.php', '114.121.130.191'),
(136, '/index.php', '107.167.98.4'),
(137, '/index.php', '114.121.130.191'),
(138, '/index.php', '114.121.130.191'),
(139, '/index.php', '114.121.130.191'),
(140, '/index.php', '114.121.130.191'),
(141, '/index.php', '114.121.130.191'),
(142, '/index.php', '107.167.98.4'),
(143, '/index.php', '107.167.98.4'),
(144, '/index.php', '114.121.130.191'),
(145, '/index.php', '114.121.152.220'),
(146, '/index.php', '223.255.230.3'),
(147, '/index.php', '223.255.230.16'),
(148, '/index.php', '114.121.130.191'),
(149, '/index.php', '114.121.130.191'),
(150, '/index.php', '114.121.130.191'),
(151, '/index.php', '114.121.130.191'),
(152, '/index.php', '124.153.32.10'),
(153, '/index.php', '223.255.229.31'),
(154, '/index.php', '223.255.229.31'),
(155, '/index.php', '223.255.229.31'),
(156, '/index.php', '8.37.230.23'),
(157, '/index.php', '8.37.230.23'),
(158, '/index.php', '8.37.230.23'),
(159, '/index.php', '124.153.32.10'),
(160, '/index.php', '124.153.32.10'),
(161, '/index.php', '180.252.165.33'),
(162, '/index.php', '180.252.165.33'),
(163, '/index.php', '180.252.165.33'),
(164, '/index.php', '36.79.119.16'),
(165, '/index.php', '36.79.119.16'),
(166, '/index.php', '36.79.119.16'),
(167, '/index.php', '36.79.119.16'),
(168, '/index.php', '36.79.119.16'),
(169, '/index.php', '36.84.71.104'),
(170, '/index.php', '8.37.230.23'),
(171, '/index.php', '8.37.230.23'),
(172, '/index.php', '8.37.230.23'),
(173, '/index.php', '8.37.230.23'),
(174, '/index.php', '8.37.230.23'),
(175, '/index.php', '8.37.230.23'),
(176, '/index.php', '8.37.230.23');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` varchar(3) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`) VALUES
('A01', 'IPA'),
('S01', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(2) NOT NULL AUTO_INCREMENT,
  `id_peserta` varchar(20) DEFAULT NULL,
  `id_jurusan` varchar(3) NOT NULL,
  `naindo` float DEFAULT NULL,
  `nainggris` float DEFAULT NULL,
  `namat` float DEFAULT NULL,
  `kimia` float NOT NULL,
  `biologi` float NOT NULL,
  `fisika` float NOT NULL,
  `ekonomi` float NOT NULL,
  `geografi` float NOT NULL,
  `sosiologi` int(11) NOT NULL,
  `naipa` float DEFAULT NULL,
  `naips` float NOT NULL,
  `jml_nilai` float NOT NULL,
  `keterangan` enum('LULUS','TIDAK LULUS') NOT NULL,
  `pesan` text,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=475 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_peserta`, `id_jurusan`, `naindo`, `nainggris`, `namat`, `kimia`, `biologi`, `fisika`, `ekonomi`, `geografi`, `sosiologi`, `naipa`, `naips`, `jml_nilai`, `keterangan`, `pesan`) VALUES
(1, '01-02-066-001-8', 'A01', 50, 30, 30, 40, 50, 45, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(4, '01-02-066-004-5', 'A01', 54, 20, 47.5, 35, 50, 42.5, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(3, '01-02-066-003-6', 'A01', 54, 32, 45, 22.5, 47.5, 40, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(6, '01-02-066-005-4', 'A01', 56, 38, 32.5, 45, 60, 32.5, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(7, '01-02-066-006-3', 'A01', 42, 22, 30, 22.5, 47.5, 30, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(8, '01-02-066-007-2', 'A01', 70, 48, 45, 37.5, 65, 35, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(9, '01-02-066-008-9', 'A01', 48, 46, 25, 27.5, 75, 32.5, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(10, '01-02-066-009-8', 'A01', 68, 48, 47.5, 55, 65, 40, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(11, '01-02-066-010-7', 'A01', 58, 52, 47.5, 42.5, 67.5, 47.5, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(12, '01-02-066-011-6', 'A01', 78, 46, 75, 60, 72.5, 55, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(13, '01-02-066-012-5', 'A01', 74, 42, 57.5, 45, 80, 45, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(14, '01-02-066-013-4', 'A01', 50, 34, 37.5, 32.5, 32.5, 35, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(15, '01-02-066-014-3', 'A01', 56, 38, 55, 40, 62.5, 27.5, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(16, '01-02-066-015-2', 'A01', 76, 28, 52.5, 45, 67.5, 42.5, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(17, '01-02-066-016-9', 'A01', 68, 42, 42.5, 42.5, 62.5, 42.5, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(18, '01-02-066-017-8', 'A01', 68, 36, 42.5, 42.5, 45, 25, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(19, '01-02-066-018-7', 'A01', 66, 40, 42.5, 47.5, 62.5, 32.5, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(20, '01-02-066-019-6', 'A01', 48, 48, 55, 55, 60, 35, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(21, '01-02-066-020-5', 'A01', 70, 32, 40, 47.5, 60, 30, 0, 0, 0, 0, 0, 0, 'LULUS', ''),
(22, '01-02-066-021-4', 'S01', 40, 34, 30, 0, 0, 0, 22.5, 44, 52, 0, 0, 0, 'LULUS', ''),
(23, '01-02-066-022-3', 'S01', 62, 38, 27.5, 0, 0, 0, 32.5, 50, 50, 0, 0, 0, 'LULUS', ''),
(24, '01-02-066-023-2', 'S01', 46, 46, 27.5, 0, 0, 0, 45, 44, 42, 0, 0, 0, 'LULUS', ''),
(25, '01-02-066-024-9', 'S01', 60, 52, 17.5, 0, 0, 0, 42.5, 44, 40, 0, 0, 0, 'LULUS', ''),
(26, '01-02-066-025-8', 'S01', 48, 36, 20, 0, 0, 0, 47.5, 48, 50, 0, 0, 0, 'LULUS', ''),
(27, '01-02-066-026-7', 'S01', 58, 34, 25, 0, 0, 0, 52.5, 42, 50, 0, 0, 0, 'LULUS', ''),
(28, '01-02-066-027-6', 'S01', 56, 36, 20, 0, 0, 0, 47.5, 48, 48, 0, 0, 0, 'LULUS', ''),
(29, '01-02-066-028-5', 'S01', 54, 40, 20, 0, 0, 0, 32.5, 40, 42, 0, 0, 0, 'LULUS', ''),
(30, '01-02-066-029-4', 'S01', 60, 50, 27.5, 0, 0, 0, 60, 44, 48, 0, 0, 0, 'LULUS', ''),
(31, '01-02-066-030-3', 'S01', 36, 28, 25, 0, 0, 0, 42.5, 62, 36, 0, 0, 0, 'LULUS', ''),
(32, '01-02-066-031-2', 'S01', 48, 28, 25, 0, 0, 0, 37.5, 50, 42, 0, 0, 0, 'LULUS', ''),
(33, '01-02-066-032-9', 'S01', 60, 46, 30, 0, 0, 0, 42.5, 42, 46, 0, 0, 0, 'LULUS', ''),
(34, '01-02-066-033-8', 'S01', 56, 28, 15, 0, 0, 0, 20, 28, 16, 0, 0, 0, 'LULUS', ''),
(35, '01-02-066-034-7', 'S01', 42, 28, 20, 0, 0, 0, 35, 28, 36, 0, 0, 0, 'LULUS', ''),
(36, '01-02-066-035-6', 'S01', 36, 26, 30, 0, 0, 0, 30, 36, 22, 0, 0, 0, 'LULUS', ''),
(37, '01-02-066-036-5', 'S01', 42, 48, 37.5, 0, 0, 0, 47.5, 54, 48, 0, 0, 0, 'LULUS', ''),
(38, '01-02-066-037-4', 'S01', 46, 50, 42.5, 0, 0, 0, 37.5, 32, 30, 0, 0, 0, 'LULUS', ''),
(39, '01-02-066-038-3', 'S01', 42, 40, 25, 0, 0, 0, 30, 36, 40, 0, 0, 0, 'LULUS', ''),
(40, '01-02-066-039-2', 'S01', 30, 44, 22.5, 0, 0, 0, 25, 32, 38, 0, 0, 0, 'LULUS', ''),
(41, '01-02-066-040-9', 'S01', 32, 50, 25, 0, 0, 0, 40, 32, 30, 0, 0, 0, 'LULUS', ''),
(42, '01-02-066-041-8', 'S01', 38, 32, 30, 0, 0, 0, 27.5, 28, 26, 0, 0, 0, 'LULUS', ''),
(43, '01-02-066-042-7', 'S01', 58, 36, 20, 0, 0, 0, 47.5, 52, 46, 0, 0, 0, 'LULUS', ''),
(2, '01-02-066-002-7', 'A01', 46, 32, 30, 25, 50, 42.5, 0, 0, 0, 0, 0, 0, 'LULUS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_peserta` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `jurusan` enum('IPA','IPS') NOT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_peserta`, `nama_siswa`, `jurusan`) VALUES
('01-02-066-001-8', 'AJENG ARUM GUMELAR', 'IPA'),
('01-02-066-004-5', 'DIKA JULIANDY BUNGSU', 'IPA'),
('01-02-066-003-6', 'BELLA DINIYATI', 'IPA'),
('01-02-066-005-4', 'EKA INDRIANI', 'IPA'),
('01-02-066-006-3', 'EKA SAPITRI', 'IPA'),
('01-02-066-007-2', 'ERI ROHMAWATI', 'IPA'),
('01-02-066-008-9', 'ERIC', 'IPA'),
('01-02-066-009-8', 'JOHNY', 'IPA'),
('01-02-066-010-7', 'MUHAMAD LUTFI PRASETIO', 'IPA'),
('01-02-066-011-6', 'MUHAMMAD BARKAH', 'IPA'),
('01-02-066-012-5', 'NENG RISANTY', 'IPA'),
('01-02-066-013-4', 'NIRMALA DEVI', 'IPA'),
('01-02-066-014-3', 'NOVITASARI', 'IPA'),
('01-02-066-015-2', 'RAYHAN SYAHDEINI', 'IPA'),
('01-02-066-016-9', 'SARASTI KHATINA GAUTAMI', 'IPA'),
('01-02-066-017-8', 'STIYOKO ADI PRADEPTO', 'IPA'),
('01-02-066-018-7', 'SYARIFAH NOER AMELYA', 'IPA'),
('01-02-066-019-6', 'TIYA UMAYAH', 'IPA'),
('01-02-066-020-5', 'UMI AZIZII FAJAR NURULLOH', 'IPA'),
('01-02-066-021-4', 'ACHMAD FAEDDULLAH', 'IPS'),
('01-02-066-022-3', 'APRILIA MIRANDA', 'IPS'),
('01-02-066-023-2', 'CINDY FIRDA DWI SHINTA YULIA', 'IPS'),
('01-02-066-024-9', 'DWIE YUNIANAWATI BASUKI', 'IPS'),
('01-02-066-025-8', 'HAERUL MUHAMMAD AMMAR', 'IPS'),
('01-02-066-026-7', 'LULU FITRIANI', 'IPS'),
('01-02-066-027-6', 'MEGAWATI', 'IPS'),
('01-02-066-028-5', 'MELLINDA PUTRI', 'IPS'),
('01-02-066-029-4', 'MIRANDA', 'IPS'),
('01-02-066-030-3', 'MUHAMMAD RIFQI ZUHDI', 'IPS'),
('01-02-066-031-2', 'MUHAMMAD YUNUS', 'IPS'),
('01-02-066-032-9', 'NADILAH', 'IPS'),
('01-02-066-033-8', 'NOVIANNY ARYANSYAH', 'IPS'),
('01-02-066-034-7', 'NURTANTI', 'IPS'),
('01-02-066-035-6', 'PANDU KELANA', 'IPS'),
('01-02-066-036-5', 'RAFIKA SAFITRI', 'IPS'),
('01-02-066-037-4', 'REZA MAULANA RINALDI', 'IPS'),
('01-02-066-038-3', 'RICKY HENDRAWAN', 'IPS'),
('01-02-066-039-2', 'SUKMA WAHYU AJI', 'IPS'),
('01-02-066-040-9', 'SULTONI', 'IPS'),
('01-02-066-041-8', 'SYAFRIDA', 'IPS'),
('01-02-066-042-7', 'YU OVA OCTAVIANI', 'IPS'),
('01-02-066-002-7', 'ALIAH', 'IPA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
