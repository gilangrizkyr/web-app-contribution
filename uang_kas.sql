-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Jul 2024 pada 17.05
-- Versi server: 11.4.2-MariaDB-log
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uang_kas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hdata_warga`
--

DROP TABLE IF EXISTS `hdata_warga`;
CREATE TABLE `hdata_warga` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_hapus` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hdata_warga`
--

INSERT INTO `hdata_warga` (`id`, `nama`, `nik`, `tgl_lahir`, `alamat`, `gender`, `alasan`, `tgl_hapus`) VALUES
(1, 'amsnams', '121212', '2024-07-25', 'ptk', 'Perempuan', 'asasa', '2024-07-25 03:24:53'),
(11, 'sdfd', '21212', '1211-12-12', 'fdfdf', 'Laki-Laki', 'asasa', '2024-07-25 05:52:03'),
(12, 'asas', '12121', '1211-12-12', 'ssdsd', 'Laki-Laki', 'asas', '2024-07-25 05:51:54'),
(14, 'dada', '24351', '1211-12-12', 'sfdfd', 'Laki-Laki', 'asasasasas11', '2024-07-25 03:39:20'),
(15, 'asasa', '212121', '0002-02-13', '3dsd', 'Laki-Laki', 'aas', '2024-07-25 05:23:51'),
(16, 'plplpojo1', '121212', '1211-12-12', 'fdfdf', 'Laki-Laki', 'asas\r\n', '2024-07-25 07:39:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_iuran`
--

DROP TABLE IF EXISTS `pembayaran_iuran`;
CREATE TABLE `pembayaran_iuran` (
  `id` int(11) NOT NULL,
  `periode_bulan` varchar(2) NOT NULL,
  `periode_tahun` varchar(4) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `nominal_iuran` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `warga_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pembayaran_iuran`
--

INSERT INTO `pembayaran_iuran` (`id`, `periode_bulan`, `periode_tahun`, `tgl_bayar`, `nominal_iuran`, `status`, `warga_id`) VALUES
(9, '12', '2020', '2222-12-12', 20000.00, 'ya', 19),
(10, '12', '2020', '2222-12-12', 20000.00, 'ya', 20),
(11, '12', '2020', '2222-12-12', 20000.00, 'ya', 21),
(12, '12', '2020', '2222-12-12', 20000.00, 'ya', 22),
(13, '12', '2020', '2222-12-12', 20000.00, 'ya', 23),
(14, '12', '2020', '2222-12-12', 20000.00, 'ya', 24),
(15, '12', '2020', '2222-12-12', 20000.00, 'ya', 25),
(16, '12', '2020', '2222-12-12', 20000.00, 'ya', 26),
(17, '12', '2020', '2222-12-12', 20000.00, 'ya', 27),
(18, '12', '2020', '2222-12-12', 20000.00, 'ya', 28),
(19, '12', '2020', '2222-12-12', 20000.00, 'ya', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

DROP TABLE IF EXISTS `tagihan`;
CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `nama` varchar(1201) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `periode` timestamp NOT NULL DEFAULT current_timestamp(),
  `riwayat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `nama`, `nik`, `periode`, `riwayat`) VALUES
(6, 'sfd', '12345', '2024-07-25 04:27:50', 1),
(13, 'asasas', '3652143', '2024-07-25 04:25:26', 9),
(15, 'asasa', '212121', '2024-07-25 05:23:00', 1),
(16, 'plplpojo1', '121212', '2024-07-25 06:30:08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

DROP TABLE IF EXISTS `warga`;
CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(120) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `alamat` varchar(120) DEFAULT NULL,
  `gender` varchar(125) NOT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `no_hp`, `alamat`, `gender`, `tgl_lahir`) VALUES
(19, '1212', 'ssf', '1000', 'jksdsao', 'Laki-Laki', '1212-12-12'),
(20, '909088', '090909', '82910281', 'fjshfjsaf', 'Laki-Laki', '9009-09-09'),
(21, '5845709', 'jdoshda', '87987', 'jdsdjasd', 'Laki-Laki', '2910-01-12'),
(22, '182910829', 'djshdasjh', '76876', 'jdkdhaJ', 'Laki-Laki', '1212-02-19'),
(23, '892108291', 'huhh', '29128', 'djsaodj', 'Laki-Laki', '1212-12-12'),
(24, '12019210', 'sjldjsk', '897', 'kjje', 'Laki-Laki', '2121-09-01'),
(25, '12121209', 'hhohiho', '8787', 'ioasaa', 'Perempuan', '1222-12-12'),
(26, '0212019', 'jdjak', '8098', 'sfdf', 'Perempuan', '1212-12-12'),
(27, '90471028', 'asasa', '21921', 'djhsiadhsa', 'Laki-Laki', '1212-12-12'),
(28, '21212', 'dahaj', '12719281', 'adadahda', 'Perempuan', '3178-12-13'),
(29, '8338927328', 'hahjaha', '72817291', 'udiudaui', 'Perempuan', '1221-12-12'),
(30, '42432', 'akaks', '8787', '324354', 'Perempuan', '1212-12-12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hdata_warga`
--
ALTER TABLE `hdata_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran_iuran`
--
ALTER TABLE `pembayaran_iuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warga_id` (`warga_id`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hdata_warga`
--
ALTER TABLE `hdata_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_iuran`
--
ALTER TABLE `pembayaran_iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran_iuran`
--
ALTER TABLE `pembayaran_iuran`
  ADD CONSTRAINT `fk_warga_id` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_iuran_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
