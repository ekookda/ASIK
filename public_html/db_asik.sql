-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2015 at 02:17 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_asik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubungi`
--

CREATE TABLE IF NOT EXISTS `tbl_hubungi` (
  `id_hubungi` int(10) NOT NULL auto_increment,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY  (`id_hubungi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_hubungi`
--

INSERT INTO `tbl_hubungi` (`id_hubungi`, `nama`, `email`, `pesan`, `komentar`) VALUES
(3, 'adi kiswanto', 'adikiswanto@gmail.com', 'halo halo', ''),
(15, 'paijo', 'mtsaddarain@gmail.com', 'halo halo bandung', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(10) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `pass`, `nama`) VALUES
(4, 'admin', 'admin', 'adminstrator'),
(10, 'paijo', '44529fdc8afb86d58c6c02cd00c02e43', 'paijo cool');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student`
--

CREATE TABLE IF NOT EXISTS `tb_student` (
  `id` int(4) NOT NULL auto_increment,
  `noujian` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `naindo` varchar(200) NOT NULL,
  `nainggris` varchar(200) NOT NULL,
  `namat` varchar(200) NOT NULL,
  `naipa` varchar(200) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tb_student`
--

INSERT INTO `tb_student` (`id`, `noujian`, `name`, `naindo`, `nainggris`, `namat`, `naipa`, `ket`, `komentar`) VALUES
(1, 'noujian', 'name', 'naindo', 'nainggris', 'namat', 'naipa', 'ket', 'komentar'),
(2, '02-334-001-8', 'ADELIA WULANDARI', '80', '85', '90', '83', 'Lulus', '1. Belum melunasi SPP bulan Mei 2015\r\n2. Belum melunasi buku LKS\r\n3. Belum mengembalikan buku perpustakaan'),
(3, '02-334-002-7', 'ADELIA YULIETA AYUNING SUKMA', '90', '88', '92', '80', 'Tidak Lulus', 'asdfadfa'),
(4, '02-334-003-6', 'ADHIKAVATI OVADA PARAMI KHEMA', '78', '70', '73', '75', 'Lulus', 'asdfahdgjf'),
(5, '02-334-004-5', 'ANDI RIFKY RAMADHAN', '90', '88', '92', '80', 'Lulus', 'tuyuifjpgoisvgnsg'),
(6, '02-334-005-4', 'ARGO YUSUF SYAH', '', '', '', '', '', ''),
(7, '02-334-006-3', 'ARIE RAHARDI PUTRA', '', '', '', '', '', ''),
(8, '02-334-007-2', 'ARMITHA PRAMESWARI', '', '', '', '', '', ''),
(9, '02-334-008-9', 'AYU WIDI ASIH', '', '', '', '', '', ''),
(10, '02-334-009-8', 'CINDY AULIA', '', '', '', '', '', ''),
(11, '02-334-010-7', 'DANDIS AMELIA PUTRI', '81', '82', '83', '84', '', 'sdfhasd'),
(12, '02-334-011-6', 'DENI PRIYATNA', '', '', '', '', '', ''),
(13, '02-334-012-5', 'DESMIANI SENARUL', '', '', '', '', '', ''),
(14, '02-334-013-4', 'ERICKA APRILIA', '', '', '', '', '', ''),
(15, '02-334-014-3', 'FENNY', '', '', '', '', '', ''),
(16, '02-334-015-2', 'INDRIA AYU CAHYANI', '', '', '', '', '', ''),
(17, '02-334-016-9', 'IRWIN D RYANTO', '', '', '', '', '', ''),
(18, '02-334-017-8', 'KELVIN TANUWIDJAYA', '', '', '', '', '', ''),
(19, '02-334-018-7', 'KHARISMA SAKTI NUGROHO', '', '', '', '', '', ''),
(20, '02-334-019-6', 'KRISNA MUFTI SAPTAJI', '', '', '', '', '', ''),
(21, '02-334-020-5', 'LILIAN TINTO ANANDA', '', '', '', '', '', ''),
(22, '02-334-021-4', 'LUQMAN MAULANA', '', '', '', '', '', ''),
(23, '02-334-022-3', 'NADA RIFQAH YAMIN', '', '', '', '', '', ''),
(24, '02-334-023-2', 'NADY FEBRILIANTO', '', '', '', '', '', ''),
(25, '02-334-024-9', 'NOVI WIDIYANINGSIH', '', '', '', '', '', ''),
(26, '02-334-025-8', 'RADEA DICKY KURSANI', '', '', '', '', '', ''),
(27, '02-334-026-7', 'RANDI', '', '', '', '', '', ''),
(28, '02-334-027-6', 'RIKI MARTIN', '', '', '', '', '', ''),
(29, '02-334-028-5', 'SUKOYO', '', '', '', '', '', ''),
(30, '02-334-029-4', 'TARA DAMAYANTI', '', '', '', '', '', ''),
(31, '02-334-030-3', 'WAHYU JANUAR RUDI SAPUTRA', '', '', '', '', '', ''),
(32, '02-334-031-2', 'WINDY SARTIKA', '', '', '', '', '', ''),
(33, '02-334-032-9', 'ZULKARNAIN SYARIEF', '', '', '', '', '', ''),
(34, '02-334-033-8', 'YOVANI TRIANANDA', '', '', '', '', '', ''),
(35, '02-334-034-7', 'TONI ADI INDARWAN', '', '', '', '', '', ''),
(36, '02-334-035-6', 'ANGGEL GABRIEL', '', '', '', '', '', ''),
(37, '02-334-036-5', 'ANTIKA PRIYANI', '', '', '', '', '', ''),
(38, '02-334-037-4', 'ARIF PRADIPTA', '', '', '', '', '', ''),
(39, '02-334-038-3', 'ASIH DESIKA RAHMADHANI', '', '', '', '', '', ''),
(40, '02-334-039-2', 'AULIA ANDINI', '', '', '', '', '', ''),
(41, '02-334-040-9', 'AZKA CANTIKA ANDRIANY', '', '', '', '', '', ''),
(42, '02-334-041-8', 'CAKRA SIDIQ', '', '', '', '', '', ''),
(43, '02-334-042-7', 'DESMIANA SENARUL', '', '', '', '', '', ''),
(44, '02-334-043-6', 'DEVI WULANDARI', '', '', '', '', '', ''),
(45, '02-334-044-5', 'DIAN LARASWATI', '', '', '', '', '', ''),
(46, '02-334-045-4', 'DIKY SUSANTO', '', '', '', '', '', ''),
(47, '02-334-046-3', 'DINNI APRILIYANTI', '', '', '', '', '', ''),
(48, '02-334-047-2', 'DIO MARSELINO', '', '', '', '', '', ''),
(49, '02-334-048-9', 'FADLY NURDIANSYAH', '', '', '', '', '', ''),
(50, '02-334-049-8', 'FAHMI AZIS', '', '', '', '', '', ''),
(51, '02-334-050-7', 'FARHAN NUR FADILLAH', '', '', '', '', '', ''),
(52, '02-334-051-6', 'KEVIN PRASETYO', '', '', '', '', '', ''),
(53, '02-334-052-5', 'KHIKMAH ARIFIN', '', '', '', '', '', ''),
(54, '02-334-053-4', 'LEONARDO OCTORIO', '', '', '', '', '', ''),
(55, '02-334-054-3', 'LUSIANA WATI', '', '', '', '', '', ''),
(56, '02-334-055-2', 'MILLENIQUE SALSA A', '', '', '', '', '', ''),
(57, '02-334-056-9', 'MUCHAMMAD WISNU MUKTI', '', '', '', '', '', ''),
(58, '02-334-057-8', 'NOVIA AGSA RAMADANTI', '', '', '', '', '', ''),
(59, '02-334-058-7', 'PANJI WILANTARA', '', '', '', '', '', ''),
(60, '02-334-059-6', 'RAHMAT SAPUTRA', '', '', '', '', '', ''),
(61, '02-334-060-5', 'RAIHAN FAIZA', '', '', '', '', '', ''),
(62, '02-334-061-4', 'REZKIKI GUNAEDI', '', '', '', '', '', ''),
(63, '02-334-062-3', 'RISKA ARYANI', '', '', '', '', '', ''),
(64, '02-334-063-2', 'ROEHILLAH', '', '', '', '', '', ''),
(65, '02-334-064-9', 'SANDRA AYU KUSUMAWARDHANI', '', '', '', '', '', ''),
(66, '02-334-065-8', 'SOLIHAH', '', '', '', '', '', ''),
(67, '02-334-066-7', 'SULTANNUDIN', '', '', '', '', '', ''),
(68, '02-334-067-6', 'TRI NOVANI', '', '', '', '', '', ''),
(69, '02-334-068-5', 'YULIA AMANDA', '90', '88', '73', '75', 'Tidak Lulus', 'dsfaaiugqp0t09r');
