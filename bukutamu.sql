-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2024 pada 18.46
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukutamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id` int(11) NOT NULL,
  `nama_acara` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Dibuka'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id`, `nama_acara`, `tempat`, `tanggal`, `waktu`, `status`) VALUES
(1, 'Milad', 'Lobby RSI Aja', '2024-01-09', '00:09:00', 'Dibuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harian`
--

CREATE TABLE `harian` (
  `id` int(11) NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `keperluan` text NOT NULL,
  `paraf` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harian`
--

INSERT INTO `harian` (`id`, `nama_pengunjung`, `instansi`, `alamat`, `keperluan`, `paraf`, `date_created`, `email`) VALUES
(1, 'Bla', 'bla', '123', '123', 'default.jpg', '2024-01-08', '123@123.com'),
(2, 'John Doe', 'Pemerintahan Konoha', 'Negara Api', 'Pembuatan Cabang di Konoha', 'default.jpg', '2024-01-09', 'konoha@konoha.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `janji`
--

CREATE TABLE `janji` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tentang` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id` int(11) NOT NULL,
  `nama_kantor` varchar(100) NOT NULL,
  `alamat_kantor` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id`, `nama_kantor`, `alamat_kantor`, `no_hp`, `fax`, `tentang`, `about`) VALUES
(1, 'Kantor Pemerintahan Konoha', 'Desa Konoha, Negara Api', '01234567', '123456', 'Ini adalah buku tamu digital dari kantor kami, untuk memudahkan anda dalam bertamu  ', 'Kantor kami menyediakan tempat pengisian buku digital kepada anda, sehingga kami bisa membantu anda menginvestasi waktu dan tempat dalam pengisian, jangan lupa berikan saran kepada kami sehingga kami bisa meningkatkan pelayanan  ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu_acara`
--

CREATE TABLE `tamu_acara` (
  `id` int(11) NOT NULL,
  `acara` varchar(100) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `paraf` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu_acara`
--

INSERT INTO `tamu_acara` (`id`, `acara`, `nama_tamu`, `instansi`, `alamat`, `paraf`, `date_created`, `email`) VALUES
(1, 'Milad', 'Zikri', 'bla', '123', 'default.jpg', '2024-01-08 17:09:55', '321@123.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role`, `date_created`) VALUES
(1, 'Zikri', 'contoh@contoh.com', '$2y$10$RK.wJPQQCD4pKgMeN.4dSeRlPqMiz5EPrS7eaZtxYNkn5PaHQgMQa', 'Admin', '2024-01-08 15:40:36'),
(2, 'Ronaldo', '123@123.com', '$2y$10$Fa6TX.htQFDYYScoZNPSKeZ8VoyYB.ut4xLYF6AxOeqbHkBvJA5Aa', 'User', '2024-01-08 15:53:57'),
(3, 'Ronaldo', '321@123.com', '$2y$10$rmASj1LujnlWpo51Nqzze.td5M7cUQ7QZO4bJaldjaJ1BYmj6VqmS', 'User', '2024-01-08 17:09:24'),
(4, 'Fakhri Rahman', 'konoha@konoha.com', '$2y$10$HBMdsIa3OM3JK/L5FTLY5ue/xCMWoCMOuj/.7wWK2OwHcfzmQr1YW', 'Admin', '2024-01-08 17:34:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `harian`
--
ALTER TABLE `harian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `janji`
--
ALTER TABLE `janji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tamu_acara`
--
ALTER TABLE `tamu_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `harian`
--
ALTER TABLE `harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `janji`
--
ALTER TABLE `janji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tamu_acara`
--
ALTER TABLE `tamu_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
