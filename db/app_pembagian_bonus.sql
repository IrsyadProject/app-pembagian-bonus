-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jun 2024 pada 08.55
-- Versi server: 8.0.30
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_pembagian_bonus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bonus`
--

CREATE TABLE `bonus` (
  `idbonus` int NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `jumlah_buruh` int NOT NULL,
  `presentase` varchar(255) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `bonus`
--

INSERT INTO `bonus` (`idbonus`, `total`, `jumlah_buruh`, `presentase`, `dibuat`) VALUES
(3, 1000000, 4, '30,20,20,30', '2024-06-02 14:27:54'),
(4, 300000, 5, '30,20,20,20,10', '2024-06-02 14:28:42'),
(6, 100000, 3, '50,40,10', '2024-06-02 22:18:41'),
(7, 450000, 4, '20,30,30,20', '2024-06-02 22:19:09'),
(8, 730000, 3, '50,35,15', '2024-06-02 22:20:19'),
(9, 300000, 2, '25,75', '2024-06-02 22:21:14'),
(10, 2000000, 3, '60,20,20', '2024-06-02 22:22:01'),
(11, 3255500, 2, '65,35', '2024-06-02 22:22:42'),
(12, 5000000, 3, '30,20,50', '2024-06-02 22:23:23'),
(13, 450500, 3, '45,30,25', '2024-06-02 22:24:09'),
(14, 259000, 2, '40,60', '2024-06-02 22:24:35'),
(15, 1000000, 3, '50,30,20', '2024-06-07 06:57:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `nama`, `dibuat`) VALUES
(1, 0, 'Laporan', '2024-06-07 07:39:05'),
(2, 0, 'Master', '2024-06-07 07:39:16'),
(3, 1, 'Laporan Penjualan', '2024-06-07 07:39:32'),
(4, 1, 'Laporan Pembelian', '2024-06-07 07:39:45'),
(5, 2, 'User', '2024-06-07 07:39:59'),
(6, 3, 'Role', '2024-06-07 07:40:17'),
(7, 6, 'Management', '2024-06-07 07:40:29'),
(8, 2, 'Admin', '2024-06-07 07:47:00'),
(9, 7, 'Satu', '2024-06-07 08:15:07'),
(10, 9, 'Dua', '2024-06-07 08:15:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `dibuat`) VALUES
(5, 'admin', '$2y$10$V0Eg8e.96Ze2FestBQKHkOQC0yrleMDtPm9ygrlX2zT8PW8aBtr4G', 'admin', '2024-06-07 06:55:36'),
(6, 'user', '$2y$10$6GqmflFg9J2CquCIwCGwXuDTFnjGLtAzea6m797BrAim6SLC36ovi', 'user', '2024-06-07 06:58:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`idbonus`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bonus`
--
ALTER TABLE `bonus`
  MODIFY `idbonus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
