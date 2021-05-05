-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 07:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenilaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(10) NOT NULL,
  `nama_dosen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`) VALUES
('1003088202', 'Firmansyah David'),
('1005079101', 'Anisya'),
('1006068501', 'Anna Syahrani'),
('1007077201', 'Yuhendra'),
('1010077602', 'Indra Warman'),
('1010128501', 'Eko Kurniawanto Putra'),
('1013087202', 'Busran'),
('1017067501', 'Minarni'),
('1020098602', 'Harison'),
('1022077601', 'Eva Yulianti'),
('1022128501', 'Putri Mandarani'),
('1025019003', 'Dede Wira Trise Putra'),
('1025108901', 'Ganda Yoga Swara');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `ta` varchar(5) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `mk` varchar(7) NOT NULL,
  `nidn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`ta`, `nim`, `mk`, `nidn`) VALUES
('20201', '1234567890', 'TIS8312', '1025108901'),
('20201', '2019610051', 'TIS1213', '1017067501'),
('20201', '2019610051', 'TIS3321', '1010128501'),
('20201', '2019610051', 'TIS5623', '1005079101'),
('20201', '2019610051', 'TIS5653', '1005079101'),
('20201', '2019610051', 'TIS7312', '1006068501'),
('20201', '2019610051', 'TIS7613', '1010128501'),
('20201', '2019610051', 'TIS8312', '1025108901'),
('20201', '2020610034', 'TIS1213', '1017067501'),
('20202', '2020610001', 'TIS6642', '1022077601');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `namamahasiswa` varchar(25) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `namamahasiswa`, `jeniskelamin`, `alamat`) VALUES
('2019610051', 'Nursyahrina', 'Perempuan', 'Padang'),
('2020610001', 'Hasna Susanti', 'Perempuan', 'Padang Pariaman'),
('2020610015', 'Kamila Ulya', 'Perempuan', 'Bukittinggi'),
('2020610033', 'Intan Sri Putri', 'Perempuan', 'Padang Pariaman'),
('2020610034', 'Rizki Siregar', 'Laki-Laki', 'Padang'),
('2020610042', 'Okta Wira Gunawan', 'Laki-Laki', 'Padang'),
('2020610050', 'Ahmad Arif', 'Laki-Laki', 'Padang Panjang');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` varchar(7) NOT NULL,
  `nama_mk` varchar(25) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`) VALUES
('TIS1112', 'Pendidikan Pancasila', 2),
('TIS1213', 'Kalkulus 1', 3),
('TIS1313', 'Bahasa Pemograman', 3),
('TIS2223', 'Algoritma dan Pemograman', 3),
('TIS2642', 'Tek. Elektronika Digital', 2),
('TIS3213', 'Struktur Data', 3),
('TIS3221', 'Prak. Struktur Data', 1),
('TIS3313', 'Sistem Operasi', 3),
('TIS3321', 'Prak. Sistem Operasi', 1),
('TIS4613', 'Perancangan Web', 3),
('TIS5623', 'Komputer Grafis', 3),
('TIS5653', 'Pemograman Web', 3),
('TIS6313', 'Jaringan Komputer 2', 3),
('TIS6321', 'Prak. Jaringan Komputer 2', 1),
('TIS6642', 'Sist. Pendukung Keputusan', 2),
('TIS7312', 'Metodologi Riset', 2),
('TIS7613', 'Aplikasi Multimedia 2', 3),
('TIS8312', 'Kerja Praktek', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `ta` varchar(5) NOT NULL,
  `detail_ta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`ta`, `detail_ta`) VALUES
('20191', 'Ganjil TA 2019/2020'),
('20192', 'Genap TA 2019/2020'),
('20201', 'Ganjil TA 2020/2021'),
('20202', 'Genap TA 2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(4) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`) VALUES
('U001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('U002', 'Nursyahrina', 'nursyahrina', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`ta`,`nim`,`mk`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`ta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
