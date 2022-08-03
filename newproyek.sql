-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2022 pada 03.44
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
  `ket_fas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `fasilitas`, `harga`, `foto`, `ket_fas`, `created_at`, `updated_at`) VALUES
(1, 'Mesin Cuci', 100000, 'Laundry perkilo.jpg', 'Digunakan untuk semua pelanggan. Maksimal perhari adalah 10Kg', '2022-07-11 08:39:52', '2022-07-24 03:35:25'),
(2, 'Catering Sehari 1x', 300000, 'catering nasi kotak.jpg', 'Catering untuk 1 hari sekali saat sarapan pagi. Menunya setiap hari nya berbeda', '2022-07-11 08:41:01', '2022-07-27 03:39:40'),
(4, 'Rice Cooker', 60000, 'rice cooker1658892756.jpg', 'Rice Cooker yang bisa dipakai dikost dan hanya digunakan oleh pelanggan yg memesan', '2022-07-24 03:28:31', '2022-07-27 03:32:36'),
(5, 'Air Minum Galon', 25000, 'Air Minum 1 Galon.jpg', 'Air Galon yang ditaruh diluar dan bisa diambil oleh seluruh pelanggan', '2022-07-24 03:33:55', '2022-07-27 03:32:03');

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
(4, 6, 2, '2022-07-12', 'Kran dikamar mandi sering mati', 'gambar_ket1657618100.jpg', 'Selesai', '2022-07-12 09:28:20', '2022-07-12 09:28:41'),
(5, 6, 2, '2022-07-21', 'Kunci rusak', 'gambar_ket1658355872.jpg', 'Selesai', '2022-07-20 22:24:32', '2022-07-20 22:27:16');

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
  `fotokost2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokost3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotokost4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotokost5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotokost6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`id`, `nama_kost`, `kategori_kost`, `fasilitas`, `keterangan`, `harga`, `statuskost`, `fotokost`, `fotokost2`, `fotokost3`, `fotokost4`, `fotokost5`, `fotokost6`, `created_at`, `updated_at`) VALUES
(1, 'Kamar 1', 'Putri', 'kasur, lemari, meja kecil, kipas angin', '5 x 5 meter', 500000, 'Terisi', 'fotokost1658892169.jpg', 'fotokost21658634405.jpg', 'fotokost31659444904.jpg', 'fotokost41659444904.jpg', 'fotokost51659444904.jpg', 'fotokost61659436029.jpg', '2022-07-11 08:28:00', '2022-07-31 09:24:50'),
(2, 'Kamar 2', 'Putri', 'kasur, lemari, meja kecil, kipas angin', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1658892198.jpg', 'fotokost21658634405.jpg', 'fotokost31659444904.jpg', 'fotokost41659444904.jpg', 'fotokost51659444904.jpg', 'fotokost61659444904.jpg', '2022-07-11 08:29:08', '2022-08-02 12:52:28'),
(3, 'Kamar 3', 'Putri', 'kasur, lemari, meja kecil, kipas angin', '5 x 5 meter', 500000, 'Terisi', 'fotokost1658892274.jpg', 'fotokost21658634405.jpg', 'fotokost31659444904.jpg', 'fotokost41659444904.jpg', 'fotokost51659444904.jpg', 'fotokost61659444904.jpg', '2022-07-11 08:29:51', '2022-08-02 12:41:45'),
(4, 'Kamar 4', 'Putri', 'kasur, lemari, meja kecil, kipas angin', '5 x 5 meter', 500000, 'Terisi', 'fotokost1658892312.jpg', 'fotokost21658634405.jpg', 'fotokost31659444904.jpg', 'fotokost41659444904.jpg', 'fotokost51659444904.jpg', 'fotokost61659444904.jpg', '2022-07-11 08:30:30', '2022-07-27 03:25:12'),
(5, 'Kamar 5', 'Putri', 'kasur, lemari, meja kecil, kipas angin', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1658892339.jpg', 'fotokost21658634405.jpg', 'fotokost31659444904.jpg', 'fotokost41659444904.jpg', 'fotokost51659444904.jpg', 'fotokost61659444904.jpg', '2022-07-11 08:31:21', '2022-07-31 04:54:09'),
(6, 'Kamar 6', 'Putri', 'kasur, lemari, meja kecil, kipas angin', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1658892361.jpg', 'fotokost21658634405.jpg', 'fotokost31659444904.jpg', 'fotokost41659444904.jpg', 'fotokost51659444904.jpg', 'fotokost61659444904.jpg', '2022-07-20 14:01:08', '2022-08-02 09:57:32'),
(9, 'Kamar 7', 'Putri', 'kasur, lemari, meja kecil, kipas angin', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1658892384.jpg', 'fotokost21658634405.jpg', 'fotokost31659444904.jpg', 'fotokost41659444904.jpg', 'fotokost51659444904.jpg', 'fotokost61659444904.jpg', '2022-07-24 03:46:45', '2022-08-02 07:49:44');

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
  `tgl_booking` datetime DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `tenggat` datetime DEFAULT NULL,
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
(1, 3, 4, NULL, 'Rina Dwi Oktavia', '2022-07-10 00:00:00', '2022-07-12 00:00:00', '2022-07-10 00:00:00', NULL, 'bukti1657547185.jpg', 'Diterima(Booking)', NULL, '2022-07-11 13:45:52', '2022-07-11 13:46:40'),
(2, 3, 4, NULL, 'Rina Dwi Oktavia', '2022-07-10 00:00:00', '2022-07-12 00:00:00', '2022-07-10 00:00:00', '2022-08-10 00:00:00', 'bukti1657547293.jpg', 'Diterima', '7', '2022-07-11 13:48:01', '2022-07-11 13:48:28'),
(3, 4, 5, NULL, 'Diva Tasbiha Salwabilla', '2022-07-01 00:00:00', '2022-07-03 00:00:00', '2022-07-01 00:00:00', NULL, 'bukti1657616307.jpg', 'Diterima(Booking)', NULL, '2022-07-01 08:57:22', '2022-07-01 08:58:42'),
(4, 4, 5, 1, 'Diva Tasbiha Salwabilla', '2022-07-01 00:00:00', '2022-07-03 00:00:00', '2022-07-01 00:00:00', '2022-08-01 00:00:00', 'bukti1657616383.jpg', 'Diterima', '7', '2022-07-01 08:58:55', '2022-07-01 08:59:55'),
(5, 5, 1, NULL, 'Umi Masrifah', '2022-07-18 00:00:00', '2022-07-20 00:00:00', '2022-07-04 00:00:00', NULL, 'bukti1657617204.jpg', 'Diterima(Booking)', NULL, '2022-07-18 09:13:05', '2022-07-18 09:13:32'),
(6, 5, 1, 2, 'Umi Masrifah', '2022-07-18 00:00:00', '2022-07-20 00:00:00', '2022-07-18 00:00:00', '2022-08-04 00:00:00', 'bukti1657617234.jpg', 'Diterima', '7', '2022-07-18 09:13:45', '2022-07-18 09:14:02'),
(7, 6, 2, NULL, 'Putri', '2022-07-22 00:00:00', '2022-07-24 00:00:00', '2022-07-22 00:00:00', NULL, 'bukti1657617941.jpg', 'Diterima(Booking)', NULL, '2022-07-22 09:25:30', '2022-07-22 09:25:57'),
(8, 6, 2, 1, 'Putri', '2022-07-22 00:00:00', '2022-07-24 00:00:00', '2022-07-22 00:00:00', '2022-08-22 00:00:00', 'bukti1657617983.jpg', 'Diterima', '7', '2022-07-22 09:26:09', '2022-07-22 09:26:32'),
(9, 9, 3, NULL, 'Mila Putri Daniati', '2022-07-25 00:00:00', '2022-07-27 00:00:00', '2022-07-25 00:00:00', NULL, 'bukti1658899456.jpg', 'Diterima(Booking)', NULL, '2022-07-25 05:24:04', '2022-07-25 05:24:42'),
(10, 9, 3, 4, 'Mila Putri Daniati', '2022-07-25 00:00:00', '2022-07-27 00:00:00', '2022-07-25 00:00:00', '2022-08-25 00:00:00', 'bukti1658899525.jpg', 'Diterima', '7', '2022-07-25 05:25:16', '2022-07-25 05:25:32');

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
(2, 4, 'ktp1657616083.jpg', 'Perempuan', 'Jl Sawo 13 RT 02 RW 08 DS Pelem Kec Kertosono Kab Nganjuk', '082243442747', '2001-06-14', 'belum', '2022-07-12 08:54:43', '2022-07-31 04:54:10'),
(3, 5, 'ktp1657617141.jpg', 'Perempuan', 'Jl Imam Bonjol 368 Ngadirejo Kota Kediri', '081224702051', '2000-07-07', 'belum', '2022-07-12 09:12:21', '2022-07-31 04:53:00'),
(4, 6, 'ktp1657617826.jpg', 'Perempuan', 'Trenggalek', '081252211424', '2001-06-30', 'belum', '2022-07-12 09:23:46', '2022-07-31 04:56:44'),
(5, 8, 'ktp1658356474.webp', 'Perempuan', 'Gurah', '085289401677', '2001-01-31', 'sewa', '2022-07-20 22:34:34', '2022-08-02 10:39:26'),
(6, 9, 'ktp1658899293.jpg', 'Perempuan', 'Kasembon', '083851280793', '2000-02-14', 'sewa', '2022-07-27 05:21:33', '2022-07-27 05:24:04'),
(14, 10, 'ktp1659143743.png', 'Laki-Laki', 'Kediri', '085784003773', '2022-07-01', 'sewa', '2022-07-30 01:15:43', '2022-07-31 09:24:50'),
(15, 11, 'ktp1659279923.png', 'Laki-Laki', 'Kediri', '1234567', '2022-07-01', 'belum', '2022-07-31 15:05:23', '2022-07-31 15:05:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_fasilitas`
--

CREATE TABLE `p_fasilitas` (
  `id` int(11) NOT NULL,
  `id_pembayaran` bigint(20) NOT NULL,
  `id_fasilitas` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `p_fasilitas`
--

INSERT INTO `p_fasilitas` (`id`, `id_pembayaran`, `id_fasilitas`) VALUES
(5, 63, 1),
(6, 63, 4),
(7, 63, 5),
(8, 64, 4),
(9, 64, 5),
(10, 65, 5),
(11, 67, 1),
(12, 67, 2),
(13, 68, 1),
(14, 71, 1),
(15, 71, 2),
(16, 72, 1),
(17, 75, 1),
(18, 76, 1),
(19, 77, 1);

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
(2, 1, 'Admin 1', 'admin1@gmail.com', NULL, '$2y$10$cRfcQRNK4rVGgxeeQYLfHOBWWXKmkO/i/m98Aac5ERTXsGkTQcjRe', 'wajMs3f33stTojGfmqsK4AaRpTKeDqnMtoMK6d9u9Mk1y1SacGLGPA1VrWrr', '2022-07-10 12:08:23', '2022-07-21 03:33:21'),
(3, 6, 'Rina Dwi Oktavia', 'rina@gmail.com', NULL, '$2y$10$kuDhauyM4DTv0ClP4hcRH.HIUQ1ZUtfxOgGAX.51r422vrcVArSLG', NULL, '2022-07-11 13:42:05', '2022-07-11 13:45:20'),
(4, 6, 'Diva Tasbiha Salwabilla', 'dina@gmail.com', NULL, '$2y$10$iTWnGVgc9yt.PQlTjgqSNO1qcUe2YWTzUctAxCNf04rFOQ5.F4v0C', NULL, '2022-07-12 08:53:29', '2022-07-12 08:56:35'),
(5, 6, 'Umi Masrifah', 'umi@gmail.com', NULL, '$2y$10$gKOC9cMy17eLr4hVTol5ye/UjOwRn2p04gzINRfIS0UGyZ.PcRy0i', NULL, '2022-07-12 09:11:08', '2022-07-12 09:12:31'),
(6, 6, 'Putri', 'putri@gmail.com', NULL, '$2y$10$MT3GxN8GpEkES8G6DoM6MeM.3R2hDRco/4kgDp4SVcpCrXjBnBAau', NULL, '2022-07-12 09:23:02', '2022-07-12 09:24:07'),
(8, 6, 'eka', 'eka@gmail.com', NULL, '$2y$10$N5XWiITXrH4GmfFyiC5ugOxUyasVBi0QziHsjedNOAcs4ID5VL2nW', NULL, '2022-07-20 22:33:27', '2022-07-20 22:35:04'),
(9, 6, 'Mila Putri Daniati', 'mila@gmail.com', NULL, '$2y$10$/ilaoo9ZNtf2.NQgbYrQLuAdRp2Rk4TIvWzUn3qhtQ.f7Q1MZzs9G', NULL, '2022-07-27 05:20:38', '2022-07-27 05:21:44'),
(10, 6, 'fajar', 'fjr@gmail.com', NULL, '$2y$10$xa9m63e8.DbRS9MPBLH0S.27AzCzuJzdyLE.L2ZXbU3YJawFdhSma', NULL, '2022-07-29 01:25:32', '2022-07-31 04:37:41'),
(11, 6, 'gambar', 'g@gmail.com', NULL, '$2y$10$kCUQW3aChE4EAxEDb9t/1OE18wYzJQnWmNQpTmwCWMOE6sEu2Co/.', NULL, '2022-07-31 15:04:56', '2022-07-31 15:05:39');

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
-- Indeks untuk tabel `p_fasilitas`
--
ALTER TABLE `p_fasilitas`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kost`
--
ALTER TABLE `kost`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `p_fasilitas`
--
ALTER TABLE `p_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
