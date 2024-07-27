-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2024 pada 06.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_masuk`
--

CREATE TABLE `absen_masuk` (
  `id` int(11) NOT NULL,
  `absen` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `waktu` varchar(128) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absen_masuk`
--

INSERT INTO `absen_masuk` (`id`, `absen`, `nama`, `kelas`, `waktu`, `keterangan`) VALUES
(1, 2, 'ghandur', 'x pplg 1', 'Wednesday July 2024, 22:01', 'Hadir'),
(2, 1, 'rehan', 'x pplg 1', 'Wednesday July 2024, 22:11', 'Hadir'),
(3, 1, 'rehan', 'x pplg 1', 'Wednesday July 2024, 22:11', 'Hadir'),
(4, 1, 'rehan', 'x pplg 1', 'Wednesday July 2024, 22:11', 'Hadir'),
(5, 1, 'rehan', 'x pplg 1', 'Wednesday July 2024, 22:11', 'Hadir'),
(6, 1, 'rehan', 'x pplg 1', 'Wednesday July 2024, 22:11', 'Hadir'),
(7, 1, 'rehan', 'x pplg 1', 'Wednesday July 2024, 22:11', 'Hadir'),
(8, 1, 'rehan', 'x pplg 1', 'Wednesday July 2024, 22:11', 'Hadir'),
(9, 1, 'rehan', 'x pplg 1', 'Wednesday July 2024, 22:11', 'Hadir'),
(10, 2, 'ghandur', 'x pplg 1', 'Wednesday July 2024, 22:13', 'Hadir'),
(11, 4, 'vindy', 'XI PPLG 1', 'Wednesday July 2024, 22:15', 'Hadir'),
(12, 5, 'bilal', 'XI PPLG 1', 'Wednesday July 2024, 22:53', 'Hadir'),
(13, 5, 'bilal', 'XI PPLG 1', 'Wednesday July 2024, 22:54', 'Hadir'),
(14, 4, 'vindy', 'XI PPLG 1', 'Wednesday July 2024, 22:55', 'Hadir'),
(15, 5, 'bilal', 'XI PPLG 1', 'Friday July 2024, 10:02', 'Hadir'),
(16, 5, 'bilal', 'XI PPLG 1', 'Friday July 2024, 10:18', 'Hadir'),
(17, 15, 'favian daffa', 'XI PPLG 1', 'Friday July 2024, 10:19', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`) VALUES
(1, 'Rehan Maulana', 'rehanmaulanaa21@gmail.com', '$2y$10$8av81z49VtDT5qY6p4TRZeuBCKMk5r7Nf44qhyweJNND003U8Hwh2', 2),
(2, 'Maulana', 'maul@gmail.com', '$2y$10$qWHm0cYogvsGnI1B6Zmt8.kgcyI6Mtut6TW9SjSetyxuiycVXo0jm', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 1, 3),
(11, 1, 4),
(13, 1, 2),
(14, 2, 6),
(15, 1, 6),
(17, 1, 8),
(18, 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'siswa'),
(3, 'menu management'),
(4, 'absensi'),
(8, 'absen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `sub_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`sub_id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'administrator', 'admin', 'bi bi-archive-fill'),
(2, 2, 'data siswa', 'siswa', 'bi bi-person-circle'),
(3, 3, 'kelola menu', 'menu', 'bi bi-list'),
(4, 3, 'kelola submenu', 'menu/submenu', 'bi bi-menu-down'),
(5, 1, 'role akses', 'admin/role', 'bi bi-badge-vo'),
(6, 4, 'absensi siswa', 'absensi', 'bi bi-telephone-forward'),
(8, 4, 'scan qr code', 'absensi/scan', 'bi bi-qr-code-scan'),
(9, 6, 'absen siswa', 'absen', 'bi bi-person-workspace'),
(10, 7, 'data absen siswa', 'absen', 'bi bi-telephone-forward'),
(11, 8, 'absen data', 'absen', 'bi bi-pencil-fill');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_masuk`
--
ALTER TABLE `absen_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_masuk`
--
ALTER TABLE `absen_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
