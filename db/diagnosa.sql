-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2022 pada 08.29
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnosa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayes_admin`
--

CREATE TABLE `bayes_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayes_admin`
--

INSERT INTO `bayes_admin` (`user`, `pass`, `level`) VALUES
('ivan', 'ivan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayes_aturan`
--

CREATE TABLE `bayes_aturan` (
  `ID` int(11) NOT NULL,
  `kode_penyakit` varchar(16) NOT NULL,
  `kode_gejala` varchar(16) NOT NULL,
  `nilai` double NOT NULL,
  `jumlah_penyakit` int(15) NOT NULL,
  `jumlah_gejala` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayes_aturan`
--

INSERT INTO `bayes_aturan` (`ID`, `kode_penyakit`, `kode_gejala`, `nilai`, `jumlah_penyakit`, `jumlah_gejala`) VALUES
(1, 'P1', 'G1', 0.88, 17, 15),
(2, 'P1', 'G2', 0.76, 17, 13),
(3, 'P1', 'G3', 0.29, 17, 5),
(4, 'P2', 'G1', 0.75, 8, 6),
(5, 'P2', 'G2', 0.5, 8, 4),
(6, 'P2', 'G9', 0.5, 8, 4),
(7, 'P2', 'G10', 0.75, 8, 6),
(8, 'P3', 'G5', 0.88, 8, 7),
(11, 'P3', 'G9', 0.75, 8, 6),
(12, 'P4', 'G3', 0.6, 10, 6),
(13, 'P4', 'G6', 0.5, 10, 5),
(14, 'P4', 'G7', 0.6, 10, 6),
(15, 'P4', 'G8', 0.9, 10, 9),
(16, 'P5', 'G1', 0.64, 11, 7),
(17, 'P5', 'G3', 0.64, 11, 7),
(18, 'P5', 'G4', 0.45, 11, 5),
(19, 'P5', 'G7', 0.55, 6, 11),
(88, 'P1', 'G10', 0.41, 17, 7),
(89, 'P3', 'G10', 0.5, 8, 4),
(90, 'P3', 'G1', 0.37, 8, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayes_gejala`
--

CREATE TABLE `bayes_gejala` (
  `kode_gejala` varchar(16) NOT NULL,
  `nama_gejala` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayes_gejala`
--

INSERT INTO `bayes_gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G1', 'Nafsu makan berkurang'),
('G2', 'Kotoran berwarna putih'),
('G3', 'Lemah lesu'),
('G4', 'Mendekam'),
('G5', 'Pembekakan muka dan mengeluarkan air mata'),
('G6', 'Bersin bersin'),
('G7', 'Sesak napas'),
('G8', 'Keluarnya cairan dihidung'),
('G9', 'Bulu kusam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayes_penyakit`
--

CREATE TABLE `bayes_penyakit` (
  `kode_penyakit` varchar(16) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `bobot` double NOT NULL,
  `keterangan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `Jumlah_data` int(15) NOT NULL,
  `jumlah_penyakit` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayes_penyakit`
--

INSERT INTO `bayes_penyakit` (`kode_penyakit`, `nama_penyakit`, `bobot`, `keterangan`, `deskripsi`, `Jumlah_data`, `jumlah_penyakit`) VALUES
('P01', 'Berak Kapur', 0.31, 'Mencampurkan antbiotik pada air minum dan menyeterilkan kandang. Pemberian obat menggunakan preparat antibiotik terramicyn, oksitrasikin dan pemeberian vitamin', 'Disebabkan oleh bakteri Salmonella Pollurum, Sering ditemukan pada anak ayam, dapat menular, biasanya mulai menjangkit sejak menetas dan menyebabkan kematian pada anak ayam', 54, 17),
('P02', 'Cacingan', 0.15, 'Memisahkan ayam yang terkena virus, menjaga kebersihan kandang dan pemberian obat preparat sulfa dan anti cacing', 'Menyerang sistem kekebalan tubuh dan menyebabkan kerusakan pada sistem pencernaan, biasanya terinfeksi oleh cacing gelang maupun cacing pita ', 54, 8),
('P03', 'Mata (oxypiluraisi)', 0.15, 'Memisahkan ayam yang terkena virus dan bisa juga melakukan pengobatan dengan memberikan preparat antibiotik', 'Disebabkan oleh bakteri koksidia (protozoa) ,penyakit menular dan penularan melalui kontak langsung', 54, 8),
('P04', 'Pilek', 0.19, 'Menjaga kebersihan kandang, memisahkan ayam yang terkena virus, usahakan juga agar suhu kandang stabil dan pemberian obat dari golongan sulfa dan antibiotika', 'Disebabkan oleh Virus, menyerang sistem pernafasan, penularan dapat terjadi melalui udara, minuman, makanan, peralatan, dan pakaian, dan virus ini hidup selama kurang satu minggu jika tidak terdapat pada ternak karena jenis virus ini mudah mati jika terkena panas atau desinfektan', 54, 10),
('P05', 'Tetelo', 0.2, 'Melakukan vaksinasi ND pada  ayam, memberikan pakan nutrisi, membersihkan kandang dan pemberian obat herbal', 'Menyerang bagian pernafasan, Disebabkan oleh virus Paramyxo dan penyakit menular yang biasanya dalam 3-4 hari seluruh ternak akan terinfeksi', 54, 11)
('P06')
('P07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayes_user`
--

CREATE TABLE `bayes_user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'user',
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayes_user`
--

INSERT INTO `bayes_user` (`id_user`, `user`, `pass`, `email`, `nama`, `level`, `alamat`) VALUES
(1, 'user', 'user', 'user@mail.com', 'Nama User', 'user', ''),
(2, 'pakar', 'pakar', 'pakar@mail.com', 'Nama Pakar', 'pakar', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayes_admin`
--
ALTER TABLE `bayes_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indeks untuk tabel `bayes_aturan`
--
ALTER TABLE `bayes_aturan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `bayes_gejala`
--
ALTER TABLE `bayes_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indeks untuk tabel `bayes_penyakit`
--
ALTER TABLE `bayes_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indeks untuk tabel `bayes_user`
--
ALTER TABLE `bayes_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bayes_aturan`
--
ALTER TABLE `bayes_aturan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `bayes_user`
--
ALTER TABLE `bayes_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
