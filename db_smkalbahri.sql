-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 02:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smkalbahri`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT '',
  `level` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`, `nama`) VALUES
('agung', '202cb962ac59075b964b07152d234b70', 'siswa', 'Agung Ma\'ruf'),
('awijay', 'd41d8cd98f00b204e9800998ecf8427e', 'siswa', 'Oktavian Ari Wijaya'),
('derlugus', 'd41d8cd98f00b204e9800998ecf8427e', 'siswa', 'Deris Hardiansyah'),
('popcorn', '21232F297A57A5A743894A0E4A801FC3', 'admin', 'Agung');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kdmapel` varchar(5) NOT NULL,
  `kb` int(3) NOT NULL,
  `nmmapel` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kdmapel`, `kb`, `nmmapel`) VALUES
('KA001', 75, 'Pendidikan Agama dan Budi Pekerti'),
('KA002', 75, 'Pendidikan Pancasila dan Kewarganegaraan'),
('KA003', 75, 'Bahasa Indonesia'),
('KA004', 75, 'Matematika'),
('KA005', 75, 'Sejarah Indonesia'),
('KA006', 75, 'Bahasa Inggris'),
('KB001', 75, 'Seni Budaya'),
('KB002', 75, 'Prakarya dan Kewirausahaan'),
('KB003', 75, 'Pendidikan Jasmani, Olah Raga & Kesehatan'),
('KC301', 75, 'Komputer Terapan'),
('KC302', 75, 'Komunikasi Data'),
('KC303', 75, 'Sistem Operasi Jaringan'),
('KC304', 75, 'Administrasi Server'),
('KC305', 75, 'Rancang Bangun Jaringan'),
('KC307', 75, 'Troubleshooting Jaringan'),
('ML001', 75, 'Baca Tulis AlQur\'an');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nis` varchar(9) NOT NULL,
  `kdmapel` varchar(5) NOT NULL,
  `nilpel` int(5) NOT NULL,
  `nilket` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nis`, `kdmapel`, `nilpel`, `nilket`) VALUES
('111111111', 'KA001', 80, 80),
('122233333', 'KA001', 80, 80),
('151610489', 'KA001', 85, 85),
('151610489', 'KA002', 89, 86),
('151610489', 'KA003', 85, 85),
('151610489', 'KA004', 83, 80),
('151610489', 'KA005', 85, 80),
('151610489', 'KA006', 80, 90),
('151610489', 'KB001', 76, 80),
('151610489', 'KB002', 85, 90),
('151610489', 'KB003', 82, 82),
('151610489', 'KC301', 90, 90),
('151610489', 'KC302', 91, 91),
('151610489', 'KC303', 90, 90),
('151610489', 'KC304', 91, 91),
('151610489', 'KC305', 89, 89),
('151610489', 'KC307', 89, 89),
('151610489', 'ML001', 90, 85),
('1911501', 'KA001', 85, 85),
('1911501', 'KA003', 80, 80),
('1911501', 'KA004', 85, 86),
('1911501', 'KA006', 80, 78),
('1911501', 'KC302', 79, 80),
('1911501', 'KC307', 90, 90),
('1911501', 'ML001', 100, 90),
('192121212', 'KA001', 80, 80),
('1932500', 'KA001', 85, 83),
('999999999', 'KA001', 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(9) NOT NULL,
  `alamat` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `semester` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `alamat`, `username`, `nisn`, `kelas`, `jurusan`, `semester`) VALUES
('151610489', 'Klapanunggal', 'agung', '0008306498', 'XII', 'Teknik Komputer dan Jaringan', '5'),
('1911501', 'Cileungsi', 'awijay', '008306450', 'XII', 'Rekayasa Perangkat Lunak', '5'),
('1932500', 'Gunung Putri', 'derlugus', '008306500', 'XII', 'Teknik Komputer dan Jaringan', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kdmapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nis`,`kdmapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`,`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
