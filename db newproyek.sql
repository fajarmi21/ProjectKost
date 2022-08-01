/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50738
 Source Host           : localhost:3306
 Source Schema         : newproyek

 Target Server Type    : MySQL
 Target Server Version : 50738
 File Encoding         : 65001

 Date: 31/07/2022 22:22:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auto_numbers
-- ----------------------------
DROP TABLE IF EXISTS `auto_numbers`;
CREATE TABLE `auto_numbers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auto_numbers
-- ----------------------------

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kost_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fas_id` int(11) NULL DEFAULT NULL,
  `nama_penyewa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_booking` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `bukti_dp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of booking
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for fasilitas
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE `fasilitas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------
INSERT INTO `fasilitas` VALUES (1, 'mesin cuci', 100000, 'Laundry perkilo.jpg', '2022-07-11 15:39:52', '2022-07-24 10:35:25');
INSERT INTO `fasilitas` VALUES (2, 'catering Sehari 1x', 300000, 'catering nasi kotak.jpg', '2022-07-11 15:41:01', '2022-07-27 10:39:40');
INSERT INTO `fasilitas` VALUES (4, 'rice cooker', 60000, 'rice cooker1658892756.jpg', '2022-07-24 10:28:31', '2022-07-27 10:32:36');
INSERT INTO `fasilitas` VALUES (5, 'Air Minum Galon', 25000, 'Air Minum 1 Galon.jpg', '2022-07-24 10:33:55', '2022-07-27 10:32:03');

-- ----------------------------
-- Table structure for komplain
-- ----------------------------
DROP TABLE IF EXISTS `komplain`;
CREATE TABLE `komplain`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kost_id` int(11) NOT NULL,
  `tgl_komplain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of komplain
-- ----------------------------
INSERT INTO `komplain` VALUES (1, 4, 5, '2022-07-12', 'Tembok kamar rembes', 'gambar_ket1657616563.jpg', 'Selesai', '2022-07-12 16:02:43', '2022-07-12 16:04:32');
INSERT INTO `komplain` VALUES (3, 5, 1, '2022-07-12', 'pintu kamar mandi susah dibuka', 'gambar_ket1657617686.jpg', 'Selesai', '2022-07-12 16:21:26', '2022-07-12 16:21:47');
INSERT INTO `komplain` VALUES (4, 6, 2, '2022-07-12', 'Kran dikamar mandi sering mati', 'gambar_ket1657618100.jpg', 'Selesai', '2022-07-12 16:28:20', '2022-07-12 16:28:41');
INSERT INTO `komplain` VALUES (5, 6, 2, '2022-07-21', 'Kunci rusak', 'gambar_ket1658355872.jpg', 'Selesai', '2022-07-21 05:24:32', '2022-07-21 05:27:16');

-- ----------------------------
-- Table structure for kost
-- ----------------------------
DROP TABLE IF EXISTS `kost`;
CREATE TABLE `kost`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kost` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_kost` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `statuskost` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotokost` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotokost2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kost
-- ----------------------------
INSERT INTO `kost` VALUES (1, 'Kamar 1', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Terisi', 'fotokost1658892169.jpg', NULL, '2022-07-11 15:28:00', '2022-07-31 16:24:50');
INSERT INTO `kost` VALUES (2, 'Kamar 2', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1658892198.jpg', NULL, '2022-07-11 15:29:08', '2022-07-31 11:56:44');
INSERT INTO `kost` VALUES (3, 'Kamar 3', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Terisi', 'fotokost1658892274.jpg', NULL, '2022-07-11 15:29:51', '2022-07-27 12:24:04');
INSERT INTO `kost` VALUES (4, 'Kamar 4', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Terisi', 'fotokost1658892312.jpg', NULL, '2022-07-11 15:30:30', '2022-07-27 10:25:12');
INSERT INTO `kost` VALUES (5, 'Kamar 5', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1658892339.jpg', NULL, '2022-07-11 15:31:21', '2022-07-31 11:54:09');
INSERT INTO `kost` VALUES (6, 'Kamar 6', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1658892361.jpg', 'fotokost21658325668.jpg', '2022-07-20 21:01:08', '2022-07-31 11:48:06');
INSERT INTO `kost` VALUES (9, 'Kamar 7', 'Putri', 'kasur, lemari, meja kecil, kipas angin, dapur, wifi, kamar mandi luar', '5 x 5 meter', 500000, 'Tersedia', 'fotokost1658892384.jpg', 'fotokost21658634405.jpg', '2022-07-24 10:46:45', '2022-07-31 11:49:12');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for p_fasilitas
-- ----------------------------
DROP TABLE IF EXISTS `p_fasilitas`;
CREATE TABLE `p_fasilitas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembayaran` bigint(20) NOT NULL,
  `id_fasilitas` bigint(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p_fasilitas
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kost_id` bigint(20) NOT NULL,
  `fas_id` int(11) NULL DEFAULT NULL,
  `nama_penyewa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_booking` date NULL DEFAULT NULL,
  `tgl_masuk` date NULL DEFAULT NULL,
  `tgl_bayar` date NULL DEFAULT NULL,
  `tenggat` date NULL DEFAULT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_bayar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES (1, 3, 4, NULL, 'Rina Dwi Oktavia', '2022-07-10', '2022-07-12', '2022-07-10', NULL, 'bukti1657547185.jpg', 'Diterima(Booking)', NULL, '2022-07-11 20:45:52', '2022-07-11 20:46:40');
INSERT INTO `pembayaran` VALUES (2, 3, 4, NULL, 'Rina Dwi Oktavia', '2022-07-10', '2022-07-12', '2022-07-10', '2022-08-10', 'bukti1657547293.jpg', 'Diterima', 'Juli', '2022-07-11 20:48:01', '2022-07-11 20:48:28');
INSERT INTO `pembayaran` VALUES (3, 4, 5, NULL, 'Diva Tasbiha Salwabilla', '2022-07-01', '2022-07-03', '2022-07-01', NULL, 'bukti1657616307.jpg', 'Diterima(Booking)', NULL, '2022-07-01 15:57:22', '2022-07-01 15:58:42');
INSERT INTO `pembayaran` VALUES (4, 4, 5, 1, 'Diva Tasbiha Salwabilla', '2022-07-01', '2022-07-03', '2022-07-01', '2022-08-01', 'bukti1657616383.jpg', 'Diterima', 'Juli', '2022-07-01 15:58:55', '2022-07-01 15:59:55');
INSERT INTO `pembayaran` VALUES (5, 5, 1, NULL, 'Umi Masrifah', '2022-07-18', '2022-07-20', '2022-07-04', NULL, 'bukti1657617204.jpg', 'Diterima(Booking)', NULL, '2022-07-18 16:13:05', '2022-07-18 16:13:32');
INSERT INTO `pembayaran` VALUES (6, 5, 1, 2, 'Umi Masrifah', '2022-07-18', '2022-07-20', '2022-07-18', '2022-08-04', 'bukti1657617234.jpg', 'Diterima', 'Juli', '2022-07-18 16:13:45', '2022-07-18 16:14:02');
INSERT INTO `pembayaran` VALUES (7, 6, 2, NULL, 'Putri', '2022-07-22', '2022-07-24', '2022-07-22', NULL, 'bukti1657617941.jpg', 'Diterima(Booking)', NULL, '2022-07-22 16:25:30', '2022-07-22 16:25:57');
INSERT INTO `pembayaran` VALUES (8, 6, 2, 1, 'Putri', '2022-07-22', '2022-07-24', '2022-07-22', '2022-08-22', 'bukti1657617983.jpg', 'Diterima', 'Juli', '2022-07-22 16:26:09', '2022-07-22 16:26:32');
INSERT INTO `pembayaran` VALUES (9, 9, 3, NULL, 'Mila Putri Daniati', '2022-07-25', '2022-07-27', '2022-07-25', NULL, 'bukti1658899456.jpg', 'Diterima(Booking)', NULL, '2022-07-25 12:24:04', '2022-07-25 12:24:42');
INSERT INTO `pembayaran` VALUES (10, 9, 3, 4, 'Mila Putri Daniati', '2022-07-25', '2022-07-27', '2022-07-25', '2022-08-25', 'bukti1658899525.jpg', 'Diterima', 'Juli', '2022-07-25 12:25:16', '2022-07-25 12:25:32');
INSERT INTO `pembayaran` VALUES (51, 10, 9, NULL, 'fajar', '2022-07-31', '2022-07-31', '2022-07-31', NULL, 'bukti1659241112.png', 'Diterima(Booking)', NULL, '2022-07-31 10:04:38', '2022-07-31 11:19:13');
INSERT INTO `pembayaran` VALUES (53, 10, 1, NULL, 'fajar', '2022-07-31', '2022-07-25', '2022-07-31', NULL, 'bukti1659259929.png', 'Diterima(Booking)', NULL, '2022-07-31 16:24:50', '2022-07-31 16:33:59');
INSERT INTO `pembayaran` VALUES (58, 10, 1, NULL, 'fajar', '2022-07-31', '2022-07-25', '2022-07-31', '2022-08-31', 'bukti1659276882.png', 'Diterima', 'Juli', '2022-07-31 21:06:15', '2022-07-31 21:19:13');
INSERT INTO `pembayaran` VALUES (59, 10, 1, NULL, 'fajar', '2022-07-31', '2022-07-25', '2022-07-31', NULL, NULL, 'Menunggu Konfirmasi', 'Agustus', '2022-07-31 21:06:15', '2022-07-31 21:06:15');
INSERT INTO `pembayaran` VALUES (60, 10, 1, NULL, 'fajar', '2022-07-31', '2022-07-25', '2022-07-31', NULL, NULL, 'Menunggu Konfirmasi', 'September', '2022-07-31 21:06:15', '2022-07-31 21:06:15');

-- ----------------------------
-- Table structure for pemilik
-- ----------------------------
DROP TABLE IF EXISTS `pemilik`;
CREATE TABLE `pemilik`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `pemilik_id_penyewa_unique`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pemilik
-- ----------------------------

-- ----------------------------
-- Table structure for penyewa
-- ----------------------------
DROP TABLE IF EXISTS `penyewa`;
CREATE TABLE `penyewa`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `penyewa_id_penyewa_unique`(`user_id`) USING BTREE,
  UNIQUE INDEX `user_id`(`user_id`) USING BTREE,
  UNIQUE INDEX `user_id_2`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of penyewa
-- ----------------------------
INSERT INTO `penyewa` VALUES (1, 3, 'ktp1657547108.jpg', 'Perempuan', 'Tulung Agung', '0895396109608', '2000-12-28', 'sewa', '2022-07-11 20:45:08', '2022-07-11 20:45:52');
INSERT INTO `penyewa` VALUES (2, 4, 'ktp1657616083.jpg', 'Perempuan', 'Jl Sawo 13 RT 02 RW 08 DS Pelem Kec Kertosono Kab Nganjuk', '082243442747', '2001-06-14', 'belum', '2022-07-12 15:54:43', '2022-07-31 11:54:10');
INSERT INTO `penyewa` VALUES (3, 5, 'ktp1657617141.jpg', 'Perempuan', 'Jl Imam Bonjol 368 Ngadirejo Kota Kediri', '081224702051', '2000-07-07', 'belum', '2022-07-12 16:12:21', '2022-07-31 11:53:00');
INSERT INTO `penyewa` VALUES (4, 6, 'ktp1657617826.jpg', 'Perempuan', 'Trenggalek', '081252211424', '2001-06-30', 'belum', '2022-07-12 16:23:46', '2022-07-31 11:56:44');
INSERT INTO `penyewa` VALUES (5, 8, 'ktp1658356474.webp', 'Perempuan', 'Gurah', '085289401677', '2001-01-31', 'belum', '2022-07-21 05:34:34', '2022-07-21 05:35:04');
INSERT INTO `penyewa` VALUES (6, 9, 'ktp1658899293.jpg', 'Perempuan', 'Kasembon', '083851280793', '2000-02-14', 'sewa', '2022-07-27 12:21:33', '2022-07-27 12:24:04');
INSERT INTO `penyewa` VALUES (14, 10, 'ktp1659143743.png', 'Laki-Laki', 'Kediri', '085784003773', '2022-07-01', 'sewa', '2022-07-30 08:15:43', '2022-07-31 16:24:50');
INSERT INTO `penyewa` VALUES (15, 11, 'ktp1659279923.png', 'Laki-Laki', 'Kediri', '1234567', '2022-07-01', 'belum', '2022-07-31 22:05:23', '2022-07-31 22:05:39');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', NULL, NULL, NULL, NULL);
INSERT INTO `roles` VALUES (4, 'pengunjung', NULL, NULL, NULL, NULL);
INSERT INTO `roles` VALUES (5, 'Pemilik', NULL, NULL, NULL, NULL);
INSERT INTO `roles` VALUES (6, 'Penyewa', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 5, 'Suyatik', 'suyatik@gmail.com', NULL, '$2y$10$SGz5xTVadMWmYuFd0l90KOdeoPgJnb/n4092qL54V3udM5AxoJ/vm', NULL, '2022-07-10 15:58:08', '2022-07-10 15:58:08');
INSERT INTO `users` VALUES (2, 1, 'Admin 1', 'admin1@gmail.com', NULL, '$2y$10$cRfcQRNK4rVGgxeeQYLfHOBWWXKmkO/i/m98Aac5ERTXsGkTQcjRe', '7USvNHJ1uQXrC2cqdUt2t6FSQhhsAcPtILlKQUzMKez8PZLvgL3rnEdV2VWw', '2022-07-10 19:08:23', '2022-07-21 10:33:21');
INSERT INTO `users` VALUES (3, 6, 'Rina Dwi Oktavia', 'rina@gmail.com', NULL, '$2y$10$kuDhauyM4DTv0ClP4hcRH.HIUQ1ZUtfxOgGAX.51r422vrcVArSLG', NULL, '2022-07-11 20:42:05', '2022-07-11 20:45:20');
INSERT INTO `users` VALUES (4, 6, 'Diva Tasbiha Salwabilla', 'dina@gmail.com', NULL, '$2y$10$iTWnGVgc9yt.PQlTjgqSNO1qcUe2YWTzUctAxCNf04rFOQ5.F4v0C', NULL, '2022-07-12 15:53:29', '2022-07-12 15:56:35');
INSERT INTO `users` VALUES (5, 6, 'Umi Masrifah', 'umi@gmail.com', NULL, '$2y$10$gKOC9cMy17eLr4hVTol5ye/UjOwRn2p04gzINRfIS0UGyZ.PcRy0i', NULL, '2022-07-12 16:11:08', '2022-07-12 16:12:31');
INSERT INTO `users` VALUES (6, 6, 'Putri', 'putri@gmail.com', NULL, '$2y$10$MT3GxN8GpEkES8G6DoM6MeM.3R2hDRco/4kgDp4SVcpCrXjBnBAau', NULL, '2022-07-12 16:23:02', '2022-07-12 16:24:07');
INSERT INTO `users` VALUES (8, 6, 'eka', 'eka@gmail.com', NULL, '$2y$10$N5XWiITXrH4GmfFyiC5ugOxUyasVBi0QziHsjedNOAcs4ID5VL2nW', NULL, '2022-07-21 05:33:27', '2022-07-21 05:35:04');
INSERT INTO `users` VALUES (9, 6, 'Mila Putri Daniati', 'mila@gmail.com', NULL, '$2y$10$/ilaoo9ZNtf2.NQgbYrQLuAdRp2Rk4TIvWzUn3qhtQ.f7Q1MZzs9G', NULL, '2022-07-27 12:20:38', '2022-07-27 12:21:44');
INSERT INTO `users` VALUES (10, 6, 'fajar', 'fjr@gmail.com', NULL, '$2y$10$xa9m63e8.DbRS9MPBLH0S.27AzCzuJzdyLE.L2ZXbU3YJawFdhSma', NULL, '2022-07-29 08:25:32', '2022-07-31 11:37:41');
INSERT INTO `users` VALUES (11, 6, 'gambar', 'g@gmail.com', NULL, '$2y$10$kCUQW3aChE4EAxEDb9t/1OE18wYzJQnWmNQpTmwCWMOE6sEu2Co/.', NULL, '2022-07-31 22:04:56', '2022-07-31 22:05:39');

SET FOREIGN_KEY_CHECKS = 1;
