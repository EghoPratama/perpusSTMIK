-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 01:51 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusstmik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` varchar(10) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `PASSWORD`, `NAMA`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Luthfi Muhammad');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `NIM` varchar(25) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `JURUSAN` varchar(50) NOT NULL,
  `ALAMAT` text NOT NULL,
  `NO_TELEPON` varchar(12) NOT NULL,
  `PHOTO` varchar(50) DEFAULT NULL,
  `TANGGAL_PENDAFTARAN` date NOT NULL,
  `BIAYA_PENDAFTARAN` int(10) NOT NULL,
  `Admin_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`NIM`, `NAMA`, `JURUSAN`, `ALAMAT`, `NO_TELEPON`, `PHOTO`, `TANGGAL_PENDAFTARAN`, `BIAYA_PENDAFTARAN`, `Admin_ID`) VALUES
('1157050001', 'Adi Nugroho', 'Teknik Informatika', 'Jl. Bhayangkara', '08xxxxxxx', 'mardira.jpg', '2017-01-01', 25000, 'admin'),
('1157050002', 'Bagas Adi', 'Teknik Informatika', 'Jl. Merdeka', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050003', 'Chakra Bernat', 'Teknik Informatika', 'Jl. Pahlawan', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050004', 'Dede Rahmat', 'Teknik Informatika', 'Jl. Manisi', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050005', 'Erik Nugraha', 'Teknik Informatika', 'Jl. Cipadung', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050006', 'Fena Ayu', 'Teknik Informatika', 'Jl. Ahmad Yani', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050007', 'Gema Ramadhan', 'Teknik Informatika', 'Jl. Cibiru', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050008', 'Hagi Nusa', 'Teknik Informatika', 'Jl. Harapan', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050009', 'Ikma Fitri', 'Teknik Informatika', 'Jl. Cikidang', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050010', 'Jatnika', 'Teknik Informatika', 'Jl. Siliwangi', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050011', 'Kevin Sanjaya', 'Teknik Informatika', 'Jl. Raya', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050012', 'Luthfi Muhammad', 'Teknik Informatika', 'Jl. Otista', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050013', 'Median Nur', 'Teknik Informatika', 'Jl. Bantar', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050014', 'Novi Amalia', 'Teknik Informatika', 'Jl. Gebang', '08xxxxxxx', '', '2017-01-01', 25000, 'admin'),
('1157050015', 'Septya Eghu', 'Teknik Informatika', 'Jl. Tamvan', '08xxxxxxx', 'septya.jpg', '2017-01-01', 25000, 'admin'),
('1157050016', '1', '1', '1', '1', '', '2018-05-28', 1, 'admin'),
('1157050017', 'www', 'www', 'www', '4464', '', '2018-05-29', 455, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_BUKU` int(15) NOT NULL,
  `JUDUL_BUKU` varchar(100) NOT NULL,
  `CATEGORY` varchar(25) NOT NULL,
  `PENGARANG` varchar(100) NOT NULL,
  `PENERBIT` varchar(100) NOT NULL,
  `TAHUN_TERBIT` int(11) NOT NULL,
  `JUMLAH_BUKU` int(11) NOT NULL,
  `Admin_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_BUKU`, `JUDUL_BUKU`, `CATEGORY`, `PENGARANG`, `PENERBIT`, `TAHUN_TERBIT`, `JUMLAH_BUKU`, `Admin_ID`) VALUES
(7050001, 'Menembus Langit', 'Buku', 'Anonim', 'PT. Buku', 2015, 19, 'admin'),
(7050002, 'Code For Funny', 'Buku', 'Anonim', 'PT. Buku', 2013, 0, 'admin'),
(7050003, 'APTX49', 'Buku', 'Anonim', 'PT. Buku', 2015, 1, 'admin'),
(7050004, 'Science from One Piece', 'Buku', 'Anonim', 'PT. Buku', 2017, 1, 'admin'),
(7050005, 'Filosofi Coding', 'Buku', 'Anonim', 'PT. Buku', 2017, 1, 'admin'),
(7050006, 'Filosofi Coding II', 'Buku', 'Anonim', 'PT. Buku', 2017, 1, 'admin'),
(7050007, 'Hidup Seperti Egho', 'Buku', 'Anonim', 'PT. Buku', 2015, 4, 'admin'),
(7050008, 'Antologi Semesta', 'Buku', 'Anonim', 'PT. Buku', 2016, 9, 'admin'),
(7050009, 'Visual Basic I', 'Buku', 'Anonim', 'PT. Buku', 2018, 0, 'admin'),
(7050010, 'Java Programming', 'Buku', 'Anonim', 'PT. Buku', 2018, 1, 'admin'),
(7050011, 'Kok Bisa??', 'Buku', 'Anonim', 'PT. Buku', 2017, 1, 'admin'),
(7050012, 'Hidup Seperti Zyran', 'Buku', 'Anonim', 'PT. Buku', 2015, 2, 'admin'),
(7050013, 'Ingatlah Ini Sebelum KP', 'Buku', 'Anonim', 'PT. Buku', 2015, 1, 'admin'),
(7050014, 'Skripshit', 'Buku', 'Anonim', 'PT. Buku', 2015, 1, 'admin'),
(7050015, 'Think Twice Code One', 'Buku', 'Anonim', 'PT. Buku', 2015, 3, 'admin'),
(7050016, 'Komputer Aplikasi Design', 'Buku', 'Tedy Tateu', 'Andi Offset', 2011, 11, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_PEMINJAMAN` int(15) NOT NULL,
  `TANGGAL_PINJAM` date NOT NULL,
  `TANGGAL_KEMBALI` date NOT NULL,
  `Anggota_NIM` varchar(25) NOT NULL,
  `Buku_ID_BUKU` int(15) NOT NULL,
  `Admin_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID_PEMINJAMAN`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`, `Anggota_NIM`, `Buku_ID_BUKU`, `Admin_ID`) VALUES
(1, '2017-03-11', '2017-03-18', '1157050003', 7050007, 'admin'),
(2, '2017-03-11', '2017-03-18', '1157050006', 7050008, 'admin'),
(3, '2017-03-11', '2017-03-18', '1157050008', 7050004, 'admin'),
(4, '2017-03-11', '2017-03-18', '1157050004', 7050001, 'admin'),
(5, '2017-03-11', '2017-03-18', '1157050012', 7050012, 'admin'),
(6, '2017-03-11', '2017-03-18', '1157050001', 7050002, 'admin'),
(7, '2017-03-11', '2017-03-18', '1157050006', 7050012, 'admin'),
(8, '2017-03-11', '2017-03-18', '1157050002', 7050014, 'admin'),
(9, '2017-03-11', '2017-03-18', '1157050006', 7050003, 'admin'),
(10, '2017-03-11', '2017-03-11', '1157050001', 7050001, 'admin'),
(11, '2017-03-11', '2017-03-18', '1157050012', 7050007, 'admin'),
(12, '2017-03-11', '2017-03-18', '1157050010', 7050005, 'admin'),
(13, '2017-03-11', '2017-03-18', '1157050015', 7050006, 'admin'),
(14, '2017-03-11', '2017-03-18', '1157050014', 7050008, 'admin'),
(15, '2017-03-11', '2017-03-18', '1157050013', 7050012, 'admin'),
(16, '2018-04-30', '2018-05-07', '1157050004', 7050005, 'admin'),
(17, '2018-04-30', '2018-05-07', '1157050005', 7050005, 'admin'),
(18, '2018-04-30', '2018-05-07', '1157050001', 7050009, 'admin'),
(19, '2018-05-04', '2018-05-11', '1157050001', 7050016, 'admin'),
(20, '2018-06-03', '2018-06-10', '1157050003', 7050007, 'admin'),
(21, '2018-06-03', '2018-06-10', '1157050005', 7050002, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `ID_PENGEMBALIAN` int(15) NOT NULL,
  `TANGGAL_KEMBALI` date NOT NULL,
  `TANGGAL_PENGEMBALIAN` date DEFAULT NULL,
  `DENDA` int(11) DEFAULT NULL,
  `STATUS` text,
  `Anggota_NIM` varchar(25) NOT NULL,
  `Buku_ID_BUKU` int(15) NOT NULL,
  `Admin_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`ID_PENGEMBALIAN`, `TANGGAL_KEMBALI`, `TANGGAL_PENGEMBALIAN`, `DENDA`, `STATUS`, `Anggota_NIM`, `Buku_ID_BUKU`, `Admin_ID`) VALUES
(1, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050003', 7050007, 'admin'),
(2, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050006', 7050008, 'admin'),
(3, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050008', 7050004, 'admin'),
(4, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050004', 7050001, 'admin'),
(5, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050012', 7050012, 'admin'),
(6, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050001', 7050002, 'admin'),
(7, '2017-03-18', '2018-06-01', 220000, 'Sudah Dikembalikan', '1157050006', 7050012, 'admin'),
(8, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050002', 7050014, 'admin'),
(9, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050006', 7050003, 'admin'),
(10, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050009', 7050008, 'admin'),
(11, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050012', 7050007, 'admin'),
(12, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050010', 7050005, 'admin'),
(13, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050015', 7050006, 'admin'),
(14, '2017-03-11', '2017-03-18', 3500, 'Sudah Dikembalikan', '1157050014', 7050008, 'admin'),
(15, '2017-03-11', '2017-03-31', 10000, 'Sudah Dikembalikan', '1157050013', 7050012, 'admin'),
(16, '2018-05-07', '2018-06-01', 12500, 'Belum Dikembalikan', '1157050004', 7050005, 'admin'),
(17, '2018-05-07', '2018-05-01', 0, 'Sudah Dikembalikan', '1157050005', 7050005, 'admin'),
(18, '2018-05-07', '0000-00-00', 0, 'Belum Dikembalikan', '1157050001', 7050009, 'admin'),
(19, '2018-05-11', '0000-00-00', 0, 'Belum Dikembalikan', '1157050001', 7050016, 'admin'),
(20, '2018-06-10', '0000-00-00', 0, 'Belum Dikembalikan', '1157050003', 7050007, 'admin'),
(21, '2018-06-10', '0000-00-00', 0, 'Belum Dikembalikan', '1157050005', 7050002, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `Anggota_Admin_FK` (`Admin_ID`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`),
  ADD KEY `Buku_Admin_FK` (`Admin_ID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID_PEMINJAMAN`),
  ADD KEY `Peminjaman_Admin_FK` (`Admin_ID`),
  ADD KEY `Peminjaman_Anggota_FK` (`Anggota_NIM`),
  ADD KEY `Peminjaman_Buku_FK` (`Buku_ID_BUKU`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`ID_PENGEMBALIAN`),
  ADD KEY `Pengembalian_Admin_FK` (`Admin_ID`),
  ADD KEY `Pengembalian_Anggota_FK` (`Anggota_NIM`),
  ADD KEY `Pengembalian_Buku_FK` (`Buku_ID_BUKU`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `Anggota_Admin_FK` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`ID`);

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `Buku_Admin_FK` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`ID`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `Peminjaman_Admin_FK` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`ID`),
  ADD CONSTRAINT `Peminjaman_Anggota_FK` FOREIGN KEY (`Anggota_NIM`) REFERENCES `anggota` (`NIM`),
  ADD CONSTRAINT `Peminjaman_Buku_FK` FOREIGN KEY (`Buku_ID_BUKU`) REFERENCES `buku` (`ID_BUKU`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `Pengembalian_Admin_FK` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`ID`),
  ADD CONSTRAINT `Pengembalian_Anggota_FK` FOREIGN KEY (`Anggota_NIM`) REFERENCES `anggota` (`NIM`),
  ADD CONSTRAINT `Pengembalian_Buku_FK` FOREIGN KEY (`Buku_ID_BUKU`) REFERENCES `buku` (`ID_BUKU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
