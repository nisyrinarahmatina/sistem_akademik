-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 03:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `id_fingerprint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `status`, `id_fingerprint`) VALUES
(1, 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `Kelas` varchar(255) NOT NULL,
  `Hari` varchar(255) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'murid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_guru` varchar(255) DEFAULT NULL,
  `nama_murid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `mapel_id`, `nama_mapel`, `Kelas`, `Hari`, `waktu_mulai`, `waktu_selesai`, `type`, `created_at`, `updated_at`, `nama_guru`, `nama_murid`) VALUES
(17, NULL, 'ipa', '10 IPA 1', 'Senin', '08:00:00', '09:00:00', 'guru', '2025-05-08 08:05:48', '2025-05-08 08:05:48', 'mustofa', NULL),
(18, NULL, 'ips', '10 IPA 1', 'Senin', '08:00:00', '09:00:00', 'guru', '2025-05-08 08:10:28', '2025-05-08 08:10:28', 'Budi', NULL),
(19, NULL, 'ips', '10 IPA 1', 'Senin', '09:00:00', '10:00:00', 'guru', '2025-05-08 08:17:56', '2025-05-08 08:17:56', 'mustofa', NULL),
(20, NULL, 'ips', '10 IPA 1', 'Senin', '09:00:00', '10:00:00', 'murid', '2025-05-08 08:18:41', '2025-05-08 08:18:41', NULL, 'mustofa'),
(21, NULL, 'ipa', '11 IPA 1', 'Senin', '07:00:00', '08:00:00', 'guru', '2025-05-08 08:30:14', '2025-05-08 08:30:14', 'Budi', NULL),
(22, NULL, 'ipa', '12 IPA 3', 'Senin', '07:00:00', '08:00:00', 'murid', '2025-05-08 08:30:51', '2025-05-08 08:30:51', NULL, 'Budi'),
(24, NULL, 'ips', '12 IPA 1', 'Senin', '08:00:00', '09:00:00', 'murid', '2025-05-08 18:22:07', '2025-05-08 18:22:07', NULL, 'Budi');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NamaMapel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `NamaMapel`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Informasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2025_02_11_082453_create_mapel_table', 2),
(8, '2025_02_11_103208_create_jadwal_table', 3),
(9, '2025_02_11_104511_create_nilai_table', 3),
(10, '2025_02_14_081151_create_presensi_table', 3),
(11, '2025_03_03_101208_add_column_to_table', 4),
(12, '2025_03_03_130544_add__nama_murid_to_jadwal', 5),
(15, '2025_03_15_172440_rename_columns_in_jadwal_table', 6),
(16, '2025_03_21_092350_add_type_to_jadwal_table', 7),
(17, '2025_03_21_100615_update_jadwal_table_nullable', 8),
(18, '2025_04_18_115100_create_nilais_table', 9),
(19, '2025_04_22_023816_add_nama_to_nilai_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_murid` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) NOT NULL,
  `file_nilai` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_murid`, `nama`, `kelas`, `file_nilai`, `created_at`, `updated_at`) VALUES
(5, NULL, 'rani', '10 IPA 1', 'file_nilai/2GsnfU8fqtKIY0XjUOST0HF7qMQlbiU24qCC8Xqk.pdf', '2025-05-08 01:07:26', '2025-05-08 01:07:26'),
(6, NULL, 'rini', '12 IPA 2', 'file_nilai/Yaf5HXepuq05CWNlufCpys7IenBp5ZjnNGeU8iTj.pdf', '2025-05-08 08:19:30', '2025-05-08 08:19:30'),
(7, NULL, 'mari', '12 IPA 2', 'file_nilai/jY8xeBmtvQ23RAEr4omi3Vsf5ENA4TmtxucVpxfe.pdf', '2025-05-08 08:31:36', '2025-05-08 08:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orang`
--

CREATE TABLE `orang` (
  `id` int(255) NOT NULL,
  `id_fingerprint` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orang`
--

INSERT INTO `orang` (`id`, `id_fingerprint`, `nama`) VALUES
(1, 5, 'zaqi'),
(2, 6, 'mala'),
(8, 7, 'tina'),
(9, 8, 'rani'),
(10, 10, 'rini'),
(11, 11, 'mari'),
(12, 12, 'Rara'),
(13, 13, 'Bu Oky'),
(14, 14, 'Ibu  Oky'),
(15, 15, 'mila');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL,
  `Status` enum('Hadir','Izin','Sakit') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `id_pengguna`, `Tanggal`, `Waktu`, `Status`, `created_at`, `updated_at`) VALUES
(1, 5, '2025-05-01', '13:35:41', 'Hadir', '2025-05-01 06:35:41', '2025-05-01 06:35:41'),
(2, 6, '2025-05-01', '13:39:20', 'Hadir', '2025-05-01 06:39:20', '2025-05-01 06:39:20'),
(3, 5, '2025-05-06', '09:49:05', 'Hadir', '2025-05-06 02:49:05', '2025-05-06 02:49:05'),
(6, 6, '2025-05-06', '10:21:23', 'Hadir', '2025-05-06 03:21:23', '2025-05-06 03:21:23'),
(16, 5, '2025-05-07', '09:23:19', 'Hadir', '2025-05-07 02:23:19', '2025-05-07 02:23:19'),
(17, 7, '2025-05-07', '09:23:30', 'Hadir', '2025-05-07 02:23:30', '2025-05-07 02:23:30'),
(18, 10, '2025-05-07', '09:40:24', 'Hadir', '2025-05-07 02:40:24', '2025-05-07 02:40:24'),
(19, 6, '2025-05-07', '15:24:40', 'Hadir', '2025-05-07 08:24:40', '2025-05-07 08:24:40'),
(20, 11, '2025-05-07', '15:29:11', 'Hadir', '2025-05-07 08:29:11', '2025-05-07 08:29:11'),
(21, 5, '2025-05-09', '08:17:44', 'Hadir', '2025-05-09 01:17:44', '2025-05-09 01:17:44'),
(22, 11, '2025-05-09', '08:17:50', 'Hadir', '2025-05-09 01:17:50', '2025-05-09 01:17:50'),
(23, 7, '2025-05-09', '08:25:12', 'Hadir', '2025-05-09 01:25:12', '2025-05-09 01:25:12'),
(24, 12, '2025-05-09', '08:28:25', 'Hadir', '2025-05-09 01:28:25', '2025-05-09 01:28:25'),
(25, 6, '2025-05-09', '08:42:47', 'Hadir', '2025-05-09 01:42:47', '2025-05-09 01:42:47'),
(26, 5, '2025-05-18', '14:02:25', 'Hadir', '2025-05-18 07:02:25', '2025-05-18 07:02:25'),
(27, 6, '2025-05-18', '14:03:17', 'Hadir', '2025-05-18 07:03:17', '2025-05-18 07:03:17'),
(28, 11, '2025-05-18', '14:03:45', 'Hadir', '2025-05-18 07:03:45', '2025-05-18 07:03:45'),
(29, 5, '2025-05-19', '15:05:47', 'Hadir', '2025-05-19 08:05:47', '2025-05-19 08:05:47'),
(30, 15, '2025-05-19', '15:06:00', 'Hadir', '2025-05-19 08:06:00', '2025-05-19 08:06:00'),
(31, 7, '2025-05-19', '15:06:19', 'Hadir', '2025-05-19 08:06:19', '2025-05-19 08:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DjMfG02M02GILuz7SuYYxsEXhJRexIA7mdxiFk5R', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTGJwM1R3a1ZKWlBwank4aE00blJ5TGxDVkU3cWJ4UGdwem1RQ28zUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9fQ==', 1747642917);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Guru','Murid','Admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `kelas`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Contoh Nama', NULL, 'contohadmin', '$2y$12$2rjonLX3ilqWHBvu3lepxOjmcZBcY2/53XuLI9K0UHX4/GMIX5NFu', 'Admin', NULL, NULL),
(2, 'Nama Guru', NULL, 'contohguru', '$2y$12$l9EEI8NenmFHa.vvOAuv9eB2DW98aFSq3YDwaUc6jLKcSGFZ8OFXW', 'Guru', NULL, '2025-03-04 06:50:49'),
(3, 'Rina', NULL, '2112000', '$2y$12$0CNexjneT/6DPuxMsCz52.WfsI9M8CLY7LyhyPQJio5mB02ttXDZG', 'Murid', NULL, '2025-03-05 09:50:18'),
(5, 'zaqi', NULL, 'zaqi123', '123', 'Murid', NULL, NULL),
(6, 'mala', NULL, 'mala123', '123', 'Murid', NULL, NULL),
(7, 'tina', NULL, 'tina123', '$2y$12$zcnvicJdvrFxEwTcDLiL/Oz/jW/c4Cd6u7fu7RKwfI6s/qIEL88tW', 'Murid', NULL, NULL),
(8, 'rani', NULL, 'rani123', '$2y$12$bXkjsKm2cvUIytqfad.2ge09d963NOCcD641uxUnyDWYGcXF/lmVS', 'Murid', NULL, NULL),
(10, 'rini', NULL, 'rini123', '$2y$12$yBqgIX97CC29jAd/20c0HOBM1PxQBhgVi5qONdkolB0lVeUPBtyhy', 'Murid', NULL, NULL),
(11, 'mari', NULL, 'mari123', '$2y$12$MJ6GiUgrowkCAtozyQOqy..w/VzOfjFswNeEz.tY1u/7qpOAcbFQ6', 'Guru', NULL, NULL),
(12, 'Rara', NULL, 'rara123', '$2y$12$RgU144LZx2CVvF1kxSoo3eYlnDWLwlHZmf4zSzDI6nOmy5ZoPJJRu', 'Guru', NULL, NULL),
(13, 'Bu Oky', NULL, 'buoky123', '$2y$12$ghR/yHIy8VyPO/tspur9S.3oxzUynJFSeSeUZ6L/8ogGt.cDQ.27C', 'Guru', NULL, NULL),
(14, 'Ibu  Oky', NULL, 'ibuoky123', '$2y$12$Xgr4psyg0kjqddlz.s0s3O2egQWWzzkUYmLBr5GbdHPO7RBdgc/i2', 'Guru', NULL, NULL),
(15, 'mila', NULL, 'mila123', '$2y$12$44NeJ8VYg.6Wk0v1muW8seBU8EDECOnJTnbjHrfu.Waoc0itaqqje', 'Guru', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_matapelajaran_foreign` (`mapel_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_id_murid_foreign` (`id_murid`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang`
--
ALTER TABLE `orang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presensi_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orang`
--
ALTER TABLE `orang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_matapelajaran_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_id_murid_foreign` FOREIGN KEY (`id_murid`) REFERENCES `users` (`id`);

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
