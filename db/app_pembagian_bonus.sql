-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Jun 2024 pada 22.28
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

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
(14, 259000, 2, '40,60', '2024-06-02 22:24:35');

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
(1, 'admin', '$2y$10$ABYpUS37sYNTIjyNTIkP2OsiTtPGuXwgV9vvfxdfZ60Cq.pEB074a', 'admin', '2024-06-02 11:57:36'),
(2, 'user', '$2y$10$8WX.IAukvBYgvRBaB62IDOI.Bgc96AibieJ649vKqh2vjhSYVdxF6', 'user', '2024-06-02 15:43:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`idbonus`);

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
  MODIFY `idbonus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
