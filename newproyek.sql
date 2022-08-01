-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2022 pada 11.29
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newproyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auto_numbers`
--

CREATE TABLE `auto_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kost_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fas_id` int(11) DEFAULT NULL,
  `nama_penyewa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_booking` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `bukti_dp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `fasilitas`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Laundry perkilo', 10000, 'Laundry perkilo.jpg', '2022-07-11 08:39:52', '2022-07-11 08:39:52'),
(2, 'catering nasi kotak', 13000, 'catering nasi kotak.jpg', '2022-07-11 08:41:01', '2022-07-11 08:41:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `kost_id` int(11) NOT NULL,
  `tgl_komplain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`id`, `user_id`, `kost_id`, `tgl_komplain`, `deskripsi`, `gambar_ket`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 5, '2022-07-12', 'Tembok kamar rembes', 'gambar_ket1657616563.jpg', 'Selesai', '2022-07-12 09:02:43', '2022-07-12 09:04:32'),
(3, 5, 1, '2022-07-12', 'pintu kamar mandi susah dibuka', 'gambar_ket1657617686.jpg', 'Selesai', '2022-07-12 09:21:26', '2022-07-12 09:21:47'),
(4, 6, 2, '2022-07-12', 'Kran dikamar mandi sering mati', 'gambar_ket1657618100.jpg', 'Selesai', '2022-07-12 09:28:20', '2022-07-12 09:28:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kost` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_kost` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `statuskost` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotokost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`id`, `nama_kost`, `kategori_kost`, `fasilitas`, `keterangan`, `harga`, `statuskost`, `fotokost`, `created_at`, `updated_at`) VALUES
(1, 'Kamar 1', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Terisi', 'fotokost1657528080.jpg', '2022-07-11 08:28:00', '2022-07-12 09:13:05'),
(2, 'Kamar 2', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Terisi', 'fotokost1657528148.jpg', '2022-07-11 08:29:08', '2022-07-12 09:25:30'),
(3, 'Kamar 3', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1657528191.jpg', '2022-07-11 08:29:51', '2022-07-11 08:29:51'),
(4, 'Kamar 4', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Terisi', 'fotokost1657528230.jpg', '2022-07-11 08:30:30', '2022-07-11 13:45:52'),
(5, 'Kamar 5', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Terisi', 'fotokost1657528281.jpg', '2022-07-11 08:31:21', '2022-07-12 08:57:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `kost_id` bigint(20) NOT NULL,
  `fas_id` int(11) DEFAULT NULL,
  `nama_penyewa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `tenggat` date DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_bayar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `user_id`, `kost_id`, `fas_id`, `nama_penyewa`, `tgl_booking`, `tgl_masuk`, `tgl_bayar`, `tenggat`, `bukti`, `status_bayar`, `bulan`, `created_at`, `updated_at`) VALUES
(1, 3, 4, NULL, 'Rina Dwi Oktavia', '2022-07-10', '2022-07-10', '2022-07-10', NULL, 'bukti1657547185.jpg', 'Diterima(Booking)', NULL, '2022-07-11 13:45:52', '2022-07-11 13:46:40'),
(2, 3, 4, NULL, 'Rina Dwi Oktavia', '2022-07-10', '2022-07-10', '2022-07-10', '2022-08-10', 'bukti1657547293.jpg', 'Diterima', 'Juli', '2022-07-11 13:48:01', '2022-07-11 13:48:28'),
(3, 4, 5, NULL, 'Diva Tasbiha Salwabilla', '2022-07-01', '2022-07-01', '2022-07-01', NULL, 'bukti1657616307.jpg', 'Diterima(Booking)', NULL, '2022-07-12 08:57:22', '2022-07-12 08:58:42'),
(4, 4, 5, 1, 'Diva Tasbiha Salwabilla', '2022-07-01', '2022-07-01', '2022-07-01', '2022-08-01', 'bukti1657616383.jpg', 'Diterima', 'Juli', '2022-07-12 08:58:55', '2022-07-12 08:59:55'),
(5, 5, 1, NULL, 'Umi Masrifah', '2022-07-04', '2022-07-04', '2022-07-04', NULL, 'bukti1657617204.jpg', 'Diterima(Booking)', NULL, '2022-07-12 09:13:05', '2022-07-12 09:13:32'),
(6, 5, 1, 2, 'Umi Masrifah', '2022-07-04', '2022-07-04', '2022-07-04', '2022-08-04', 'bukti1657617234.jpg', 'Diterima', 'Juli', '2022-07-12 09:13:45', '2022-07-12 09:14:02'),
(7, 6, 2, NULL, 'Putri', '2022-07-08', '2022-07-08', '2022-07-08', NULL, 'bukti1657617941.jpg', 'Diterima(Booking)', NULL, '2022-07-12 09:25:30', '2022-07-12 09:25:57'),
(8, 6, 2, 1, 'Putri', '2022-07-08', '2022-07-08', '2022-07-08', '2022-08-08', 'bukti1657617983.jpg', 'Diterima', 'Juli', '2022-07-12 09:26:09', '2022-07-12 09:26:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`id`, `user_id`, `ktp`, `jenis_kelamin`, `alamat`, `no_hp`, `tgl_lahir`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'ktp1657547108.jpg', 'Perempuan', 'Tulung Agung', '0895396109608', '2000-12-28', 'sewa', '2022-07-11 13:45:08', '2022-07-11 13:45:52'),
(2, 4, 'ktp1657616083.jpg', 'Perempuan', 'Jl Sawo 13 RT 02 RW 08 DS Pelem Kec Kertosono Kab Nganjuk', '082243442747', '2001-06-14', 'sewa', '2022-07-12 08:54:43', '2022-07-12 08:57:22'),
(3, 5, 'ktp1657617141.jpg', 'Perempuan', 'Jl Imam Bonjol 368 Ngadirejo Kota Kediri', '081224702051', '2000-07-07', 'sewa', '2022-07-12 09:12:21', '2022-07-12 09:13:05'),
(4, 6, 'ktp1657617826.jpg', 'Perempuan', 'Trenggalek', '081252211424', '2001-06-30', 'sewa', '2022-07-12 09:23:46', '2022-07-12 09:25:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, NULL, NULL),
(4, 'pengunjung', NULL, NULL, NULL, NULL),
(5, 'Pemilik', NULL, NULL, NULL, NULL),
(6, 'Penyewa', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 5, 'Suyatik', 'suyatik@gmail.com', NULL, '$2y$10$SGz5xTVadMWmYuFd0l90KOdeoPgJnb/n4092qL54V3udM5AxoJ/vm', NULL, '2022-07-10 08:58:08', '2022-07-10 08:58:08'),
(2, 1, 'Admin 1', 'admin1@gmail.com', NULL, '$2y$10$OLGzZTiggQPFbNz3x1sWJO8SSmv5G0sAE7PN9kKsIOQi1.yG5Sy6O', 'FnmFQOWBhSqgbWIv3oRzy048NIMb9WhmgDKdsdvzqtPL3EfxICmtSAMfF6dT', '2022-07-10 12:08:23', '2022-07-10 12:08:23'),
(3, 6, 'Rina Dwi Oktavia', 'rina@gmail.com', NULL, '$2y$10$kuDhauyM4DTv0ClP4hcRH.HIUQ1ZUtfxOgGAX.51r422vrcVArSLG', NULL, '2022-07-11 13:42:05', '2022-07-11 13:45:20'),
(4, 6, 'Diva Tasbiha Salwabilla', 'dina@gmail.com', NULL, '$2y$10$iTWnGVgc9yt.PQlTjgqSNO1qcUe2YWTzUctAxCNf04rFOQ5.F4v0C', NULL, '2022-07-12 08:53:29', '2022-07-12 08:56:35'),
(5, 6, 'Umi Masrifah', 'umi@gmail.com', NULL, '$2y$10$gKOC9cMy17eLr4hVTol5ye/UjOwRn2p04gzINRfIS0UGyZ.PcRy0i', NULL, '2022-07-12 09:11:08', '2022-07-12 09:12:31'),
(6, 6, 'Putri', 'putri@gmail.com', NULL, '$2y$10$MT3GxN8GpEkES8G6DoM6MeM.3R2hDRco/4kgDp4SVcpCrXjBnBAau', NULL, '2022-07-12 09:23:02', '2022-07-12 09:24:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auto_numbers`
--
ALTER TABLE `auto_numbers`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `pemilik_id_penyewa_unique` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `penyewa_id_penyewa_unique` (`user_id`) USING BTREE,
  ADD UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  ADD UNIQUE KEY `user_id_2` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `roles_name_unique` (`name`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auto_numbers`
--
ALTER TABLE `auto_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kost`
--
ALTER TABLE `kost`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
