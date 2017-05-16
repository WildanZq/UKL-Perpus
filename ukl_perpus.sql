-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Mei 2017 pada 11.48
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukl_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `ID_USER` int(11) NOT NULL,
  `NIS` mediumtext,
  `NAMA` mediumtext,
  `KELAS` mediumtext,
  `JK` char(1) DEFAULT NULL,
  `NO_HP` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`ID_USER`, `NIS`, `NAMA`, `KELAS`, `JK`, `NO_HP`) VALUES
(1, '91781367', 'Mia', 'X', 'P', '0878164861'),
(2, '9113896', 'Made', 'XI', 'L', '0813413513'),
(3, '9813951', 'Wildan', 'XI', 'L', '0817358135'),
(4, '9815598161', 'Heru', 'X', 'L', '087135617'),
(6, '98131909', 'Putri', 'X', 'P', '084817461'),
(8, '9868745', 'Jono', 'XI', 'L', '087587584'),
(9, '965846765', 'Tina', 'X', 'P', '0875643678'),
(10, '967945754', 'Beni', 'XI', 'L', '087564575'),
(11, '98867576', 'Mona', 'X', 'L', '087563736'),
(12, '97856474', 'Bolu', 'XI', 'L', '08453767'),
(13, '9785864', 'Lusi', 'XI', 'P', '087564534'),
(14, '61930', 'Luki', 'X', 'L', '085103013091');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `KD_BUKU` int(11) NOT NULL,
  `BARCODE` int(11) DEFAULT NULL,
  `JUDUL` varchar(32) NOT NULL,
  `KATEGORI` mediumtext,
  `PENULIS` mediumtext,
  `PENERBIT` mediumtext,
  `JUMLAH` int(11) DEFAULT NULL,
  `DIPINJAM` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`KD_BUKU`, `BARCODE`, `JUDUL`, `KATEGORI`, `PENULIS`, `PENERBIT`, `JUMLAH`, `DIPINJAM`) VALUES
(1, 130571385, 'Dunia Mimpi', 'Fiksi', 'Herman', 'Lokomedia', 2, 1),
(2, 418961985, 'Astro Fisik', 'Sains', 'Steve', 'Andi', 3, 1),
(3, 316359918, 'Hadist', 'Agama', 'Habibi', 'Sinar Dunia', 2, 0),
(4, 214748364, 'Avangers', 'Komik', 'John', 'Marvel', 4, 1),
(5, 598163598, 'Kumpulan Puisi', 'Bahasa', 'Munir', 'Erlangga', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `ID_USER` int(11) NOT NULL,
  `ID_BTAMU` int(11) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KEPERLUAN` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`ID_USER`, `ID_BTAMU`, `TANGGAL`, `KEPERLUAN`) VALUES
(1, 1, '2017-05-01', 'Pinjam'),
(2, 2, '2017-05-02', 'Baca'),
(3, 3, '2017-05-02', 'Pinjam'),
(4, 4, '2017-05-03', 'Pinjam'),
(5, 5, '2017-05-07', 'Pinjam'),
(6, 6, '2017-05-09', 'Pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `ID_DIPINJAM` int(11) NOT NULL,
  `NO_PINJAM` varchar(11) DEFAULT NULL,
  `KD_BUKU` varchar(11) DEFAULT NULL,
  `TANGGAL_KEMBALI` date DEFAULT NULL,
  `ID_PETUGAS_KEMBALI` int(11) NOT NULL DEFAULT '0',
  `DENDA` int(11) NOT NULL DEFAULT '0',
  `STATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`ID_DIPINJAM`, `NO_PINJAM`, `KD_BUKU`, `TANGGAL_KEMBALI`, `ID_PETUGAS_KEMBALI`, `DENDA`, `STATUS`) VALUES
(1, '1', '1', '2017-05-09', 4, 500, 'Terlambat'),
(2, '2', '2', NULL, 0, 0, 'Belum kembali'),
(3, '3', '3', '2017-05-06', 1, 0, 'Tepat waktu'),
(4, '4', '4', '2017-05-09', 3, 0, 'Tepat waktu'),
(5, '5', '5', NULL, 0, 0, 'Belum kembali'),
(6, '6', '1', NULL, 0, 0, 'Belum kembali'),
(7, '6', '4', NULL, 0, 0, 'Belum kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `ID_PETUGAS` int(11) NOT NULL,
  `USERNAME` mediumtext,
  `PASSWORD` mediumtext,
  `NAMA` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`ID_PETUGAS`, `USERNAME`, `PASSWORD`, `NAMA`) VALUES
(1, 'antok', '123', 'Antok'),
(2, 'yanti', '123', 'Yanti'),
(3, 'bejo', '123', 'Bejo'),
(4, 'bagus', '123', 'Bagus'),
(5, 'nani', '123', 'Nani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `NO_PINJAM` int(11) NOT NULL,
  `ID_PETUGAS` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`NO_PINJAM`, `ID_PETUGAS`, `ID_USER`, `TANGGAL`) VALUES
(1, 2, 1, '2017-05-01'),
(2, 4, 3, '2017-05-04'),
(3, 1, 4, '2017-05-03'),
(4, 3, 5, '2017-05-07'),
(5, 5, 6, '2017-05-09'),
(6, 3, 8, '2017-05-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `ANGGOTA_PK` (`ID_USER`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`KD_BUKU`),
  ADD UNIQUE KEY `BUKU_PK` (`KD_BUKU`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`ID_BTAMU`),
  ADD KEY `MENGISI_FK` (`ID_USER`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`ID_DIPINJAM`),
  ADD UNIQUE KEY `DETAIL_PINJAM_PK` (`ID_DIPINJAM`),
  ADD KEY `TERDAPAT_FK` (`KD_BUKU`),
  ADD KEY `MEMILIKI_FK` (`NO_PINJAM`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`),
  ADD UNIQUE KEY `PETUGAS_PK` (`ID_PETUGAS`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`NO_PINJAM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `KD_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `ID_BTAMU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `ID_DIPINJAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `ID_PETUGAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `NO_PINJAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
