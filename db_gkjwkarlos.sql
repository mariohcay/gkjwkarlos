-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2021 pada 11.25
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gkjwkarlos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jemaat`
--

CREATE TABLE `tb_jemaat` (
  `id` varchar(128) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_majelis`
--

CREATE TABLE `tb_majelis` (
  `noUrut` varchar(128) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `detail` text NOT NULL,
  `suara` int(5) NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_majelis`
--

INSERT INTO `tb_majelis` (`noUrut`, `nama`, `alamat`, `detail`, `suara`, `foto`) VALUES
('1', 'Anu', 'Malang', 'hdsahksadhjk', 0, 'dsadasdsadas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jemaat`
--
ALTER TABLE `tb_jemaat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_majelis`
--
ALTER TABLE `tb_majelis`
  ADD PRIMARY KEY (`noUrut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
