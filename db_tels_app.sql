-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2025 at 07:55 AM
-- Server version: 8.0.43-0ubuntu0.24.04.2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tels_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1759981269),
('laravel-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1759981269;', 1759981269),
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:0:{}s:11:\"permissions\";a:0:{}s:5:\"roles\";a:0:{}}', 1760019029);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tes`
--

CREATE TABLE `jadwal_tes` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal_tes` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_tes`
--

INSERT INTO `jadwal_tes` (`id`, `tanggal_tes`, `waktu_mulai`, `lokasi`, `kuota`, `created_at`, `updated_at`) VALUES
(1, '2025-10-13', '08:00:00', 'Laboratorium Bahasa', 25, '2025-10-06 19:26:08', '2025-10-06 19:26:08'),
(2, '2025-10-20', '13:30:00', 'LAB UPT UPB UINSI', 25, '2025-10-08 23:26:07', '2025-10-08 23:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_06_143213_create_permission_tables', 2),
(5, '2025_10_06_143624_create_jadwal_tes_table', 3),
(6, '2025_10_06_143648_create_score_conversions_table', 3),
(7, '2025_10_06_143713_create_pendaftarans_table', 3),
(8, '2025_10_07_021746_add_nim_to_users_table', 4),
(9, '2025_10_07_132609_add_program_studi_to_users_table', 5),
(10, '2025_10_08_140424_add_nomor_sertifikat_to_pendaftarans_table', 6),
(11, '2025_10_09_005735_add_uuid_to_pendaftarans_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_sertifikat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jadwal_tes_id` bigint UNSIGNED NOT NULL,
  `status` enum('TERDAFTAR','SELESAI') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TERDAFTAR',
  `skor_listening` tinyint UNSIGNED DEFAULT NULL,
  `skor_structure` tinyint UNSIGNED DEFAULT NULL,
  `skor_reading` tinyint UNSIGNED DEFAULT NULL,
  `skor_total` smallint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `uuid`, `nomor_sertifikat`, `user_id`, `jadwal_tes_id`, `status`, `skor_listening`, `skor_structure`, `skor_reading`, `skor_total`, `created_at`, `updated_at`) VALUES
(2, 'c912a439-43ae-4917-8985-4bdbca2f9fdd', 'UPB/B/0000002/Un.21/PP.01.1/10/2025', 2, 1, 'SELESAI', 63, 54, 48, 550, '2025-10-06 19:36:55', '2025-10-08 17:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-10-06 06:33:59', '2025-10-06 06:33:59'),
(2, 'Admin', 'web', '2025-10-06 06:34:28', '2025-10-06 06:34:28'),
(3, 'Mahasiswa', 'web', '2025-10-06 06:34:51', '2025-10-06 06:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score_conversions`
--

CREATE TABLE `score_conversions` (
  `id` bigint UNSIGNED NOT NULL,
  `section` enum('listening','structure','reading') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answers` tinyint UNSIGNED NOT NULL,
  `converted_score` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `score_conversions`
--

INSERT INTO `score_conversions` (`id`, `section`, `correct_answers`, `converted_score`, `created_at`, `updated_at`) VALUES
(1, 'listening', 50, 68, NULL, NULL),
(2, 'listening', 49, 67, NULL, NULL),
(3, 'listening', 48, 67, NULL, NULL),
(4, 'listening', 47, 66, NULL, NULL),
(5, 'listening', 46, 65, NULL, NULL),
(6, 'listening', 45, 63, NULL, NULL),
(7, 'listening', 44, 62, NULL, NULL),
(8, 'listening', 43, 61, NULL, NULL),
(9, 'listening', 42, 60, NULL, NULL),
(10, 'listening', 41, 59, NULL, NULL),
(11, 'listening', 40, 58, NULL, NULL),
(12, 'listening', 39, 57, NULL, NULL),
(13, 'listening', 38, 57, NULL, NULL),
(14, 'listening', 37, 56, NULL, NULL),
(15, 'listening', 36, 55, NULL, NULL),
(16, 'listening', 35, 54, NULL, NULL),
(17, 'listening', 34, 54, NULL, NULL),
(18, 'listening', 33, 53, NULL, NULL),
(19, 'listening', 32, 52, NULL, NULL),
(20, 'listening', 31, 52, NULL, NULL),
(21, 'listening', 30, 51, NULL, NULL),
(22, 'listening', 29, 51, NULL, NULL),
(23, 'listening', 28, 50, NULL, NULL),
(24, 'listening', 27, 49, NULL, NULL),
(25, 'listening', 26, 49, NULL, NULL),
(26, 'listening', 25, 48, NULL, NULL),
(27, 'listening', 24, 48, NULL, NULL),
(28, 'listening', 23, 47, NULL, NULL),
(29, 'listening', 22, 47, NULL, NULL),
(30, 'listening', 21, 46, NULL, NULL),
(31, 'listening', 20, 45, NULL, NULL),
(32, 'listening', 19, 45, NULL, NULL),
(33, 'listening', 18, 44, NULL, NULL),
(34, 'listening', 17, 43, NULL, NULL),
(35, 'listening', 16, 43, NULL, NULL),
(36, 'listening', 15, 42, NULL, NULL),
(37, 'listening', 14, 41, NULL, NULL),
(38, 'listening', 13, 41, NULL, NULL),
(39, 'listening', 12, 40, NULL, NULL),
(40, 'listening', 11, 38, NULL, NULL),
(41, 'listening', 10, 37, NULL, NULL),
(42, 'listening', 9, 35, NULL, NULL),
(43, 'listening', 8, 33, NULL, NULL),
(44, 'listening', 7, 32, NULL, NULL),
(45, 'listening', 6, 30, NULL, NULL),
(46, 'listening', 5, 29, NULL, NULL),
(47, 'listening', 4, 28, NULL, NULL),
(48, 'listening', 3, 27, NULL, NULL),
(49, 'listening', 2, 26, NULL, NULL),
(50, 'listening', 1, 25, NULL, NULL),
(51, 'listening', 0, 24, NULL, NULL),
(52, 'structure', 40, 68, NULL, NULL),
(53, 'structure', 39, 67, NULL, NULL),
(54, 'structure', 38, 65, NULL, NULL),
(55, 'structure', 37, 63, NULL, NULL),
(56, 'structure', 36, 61, NULL, NULL),
(57, 'structure', 35, 60, NULL, NULL),
(58, 'structure', 34, 58, NULL, NULL),
(59, 'structure', 33, 57, NULL, NULL),
(60, 'structure', 32, 56, NULL, NULL),
(61, 'structure', 31, 55, NULL, NULL),
(62, 'structure', 30, 54, NULL, NULL),
(63, 'structure', 29, 53, NULL, NULL),
(64, 'structure', 28, 52, NULL, NULL),
(65, 'structure', 27, 51, NULL, NULL),
(66, 'structure', 26, 50, NULL, NULL),
(67, 'structure', 25, 49, NULL, NULL),
(68, 'structure', 24, 48, NULL, NULL),
(69, 'structure', 23, 47, NULL, NULL),
(70, 'structure', 22, 46, NULL, NULL),
(71, 'structure', 21, 45, NULL, NULL),
(72, 'structure', 20, 44, NULL, NULL),
(73, 'structure', 19, 43, NULL, NULL),
(74, 'structure', 18, 42, NULL, NULL),
(75, 'structure', 17, 41, NULL, NULL),
(76, 'structure', 16, 40, NULL, NULL),
(77, 'structure', 15, 38, NULL, NULL),
(78, 'structure', 14, 37, NULL, NULL),
(79, 'structure', 13, 36, NULL, NULL),
(80, 'structure', 12, 35, NULL, NULL),
(81, 'structure', 11, 33, NULL, NULL),
(82, 'structure', 10, 32, NULL, NULL),
(83, 'structure', 9, 31, NULL, NULL),
(84, 'structure', 8, 29, NULL, NULL),
(85, 'structure', 7, 27, NULL, NULL),
(86, 'structure', 6, 26, NULL, NULL),
(87, 'structure', 5, 25, NULL, NULL),
(88, 'structure', 4, 23, NULL, NULL),
(89, 'structure', 3, 22, NULL, NULL),
(90, 'structure', 2, 21, NULL, NULL),
(91, 'structure', 1, 20, NULL, NULL),
(92, 'structure', 0, 20, NULL, NULL),
(93, 'reading', 50, 67, NULL, NULL),
(94, 'reading', 49, 66, NULL, NULL),
(95, 'reading', 48, 65, NULL, NULL),
(96, 'reading', 47, 63, NULL, NULL),
(97, 'reading', 46, 61, NULL, NULL),
(98, 'reading', 45, 60, NULL, NULL),
(99, 'reading', 44, 59, NULL, NULL),
(100, 'reading', 43, 58, NULL, NULL),
(101, 'reading', 42, 57, NULL, NULL),
(102, 'reading', 41, 56, NULL, NULL),
(103, 'reading', 40, 55, NULL, NULL),
(104, 'reading', 39, 54, NULL, NULL),
(105, 'reading', 38, 54, NULL, NULL),
(106, 'reading', 37, 53, NULL, NULL),
(107, 'reading', 36, 52, NULL, NULL),
(108, 'reading', 35, 52, NULL, NULL),
(109, 'reading', 34, 51, NULL, NULL),
(110, 'reading', 33, 50, NULL, NULL),
(111, 'reading', 32, 49, NULL, NULL),
(112, 'reading', 31, 48, NULL, NULL),
(113, 'reading', 30, 48, NULL, NULL),
(114, 'reading', 29, 47, NULL, NULL),
(115, 'reading', 28, 46, NULL, NULL),
(116, 'reading', 27, 46, NULL, NULL),
(117, 'reading', 26, 45, NULL, NULL),
(118, 'reading', 25, 45, NULL, NULL),
(119, 'reading', 24, 44, NULL, NULL),
(120, 'reading', 23, 43, NULL, NULL),
(121, 'reading', 22, 43, NULL, NULL),
(122, 'reading', 21, 42, NULL, NULL),
(123, 'reading', 20, 42, NULL, NULL),
(124, 'reading', 19, 41, NULL, NULL),
(125, 'reading', 18, 40, NULL, NULL),
(126, 'reading', 17, 39, NULL, NULL),
(127, 'reading', 16, 38, NULL, NULL),
(128, 'reading', 15, 37, NULL, NULL),
(129, 'reading', 14, 35, NULL, NULL),
(130, 'reading', 13, 34, NULL, NULL),
(131, 'reading', 12, 32, NULL, NULL),
(132, 'reading', 11, 31, NULL, NULL),
(133, 'reading', 10, 30, NULL, NULL),
(134, 'reading', 9, 29, NULL, NULL),
(135, 'reading', 8, 28, NULL, NULL),
(136, 'reading', 7, 27, NULL, NULL),
(137, 'reading', 6, 26, NULL, NULL),
(138, 'reading', 5, 25, NULL, NULL),
(139, 'reading', 4, 24, NULL, NULL),
(140, 'reading', 3, 23, NULL, NULL),
(141, 'reading', 2, 23, NULL, NULL),
(142, 'reading', 1, 22, NULL, NULL),
(143, 'reading', 0, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ASmYSOsi3LEPBzRVRpavar6i25y7oW5hpnzDMOer', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFE0c1c0VW1jcTZmTW9yY25nR2Y2SXlac2ZIT1lqclhHbUNCSHByYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1759996404),
('uK5ym7ZpCgSiRb8CgQXNscVCpKvPr6uNRf0Fpnt6', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibmRXVUZkU2t2cVZvTWpJZjJEdFR2MjFZZGl0amUyaWZ3V0RGQm9hWSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vcGVuZGFmdGFyYW5zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJEZ2TkplREUuNElVV3A3S0V1LmJYRmVDTm9xNHFldFQ4Mlk3eE9YYWtzblFTZEljZlR5ckZTIjtzOjg6ImZpbGFtZW50IjthOjA6e319', 1759995611);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_studi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `program_studi`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin UPB', NULL, NULL, 'upb@uinsi.ac.id', NULL, '$2y$12$FvNJeDE.4IUWp7KEu.bXFeCNoq4qetT82Y7xOXaksnQSdIcfTyrFS', NULL, '2025-10-06 06:30:22', '2025-10-06 06:30:22'),
(2, 'Rizqi Saputra', '1715025092', 'Tadris Bahasa Inggris', 'rizqi@uinsi.ac.id', NULL, '$2y$12$jVl8x7I5uYjHZn2rMzZhm.yz3QacEnijCYXen0jk0ktnGk.AB.b/u', NULL, '2025-10-06 07:36:13', '2025-10-07 05:33:03'),
(3, 'Rojali Gagak', '1715025096', NULL, 'rojaliyahud123@yahoo.com', NULL, '$2y$12$x6ccxpueHee4xslPHgm0MunzLbU3IRT/Lgdg/vuCtGRaHpzsv1HFy', NULL, '2025-10-06 18:34:42', '2025-10-06 18:34:42'),
(4, 'John Doe', '1715025087', 'Manajemen Bisnis Syariah', 'john@uinsi.ac.id', NULL, '$2y$12$.5icXlPeMc6RWmnVGgaB6uGhnGXpSO6Di8H0QeOSwFhfeRyXqpzo2', NULL, '2025-10-08 19:42:32', '2025-10-08 19:42:32');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftarans_nomor_sertifikat_unique` (`nomor_sertifikat`),
  ADD UNIQUE KEY `pendaftarans_uuid_unique` (`uuid`),
  ADD KEY `pendaftarans_user_id_foreign` (`user_id`),
  ADD KEY `pendaftarans_jadwal_tes_id_foreign` (`jadwal_tes_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `score_conversions`
--
ALTER TABLE `score_conversions`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `score_conversions`
--
ALTER TABLE `score_conversions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD CONSTRAINT `pendaftarans_jadwal_tes_id_foreign` FOREIGN KEY (`jadwal_tes_id`) REFERENCES `jadwal_tes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
