-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2025 pada 05.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kencleng_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jamaahs`
--

CREATE TABLE `jamaahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelompok` enum('Kelompok 1','Kelompok 2','Kelompok 3','Kelompok 4') NOT NULL,
  `jml_jamaah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jamaahs`
--

INSERT INTO `jamaahs` (`id`, `nama`, `alamat`, `kelompok`, `jml_jamaah`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'supri', 'RT 1/RW 3', 'Kelompok 2', 1, '2025-06-25', '2025-06-24 21:35:04', '2025-06-24 21:35:04'),
(2, 'wahyuni', 'RT 2/RW 3', 'Kelompok 2', 2, '2025-06-25', '2025-06-24 21:35:18', '2025-06-24 21:35:18'),
(3, 'Sarno', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(4, 'Parman', 'RT 2/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(5, 'Wagimin', 'RT 2/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(6, 'Sutarmi', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(7, 'Ponidi', 'RT 1/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(8, 'Jumadi', 'RT 1/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(9, 'Sukijan', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(10, 'Muryati', 'RT 2/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(11, 'Wagini', 'RT 2/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(12, 'Mulyono', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(13, 'Paijo', 'RT 1/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(14, 'Painem', 'RT 2/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(15, 'Wiroso', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(16, 'Tugino', 'RT 1/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(17, 'Suparti', 'RT 1/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(18, 'Sulastri', 'RT 1/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(19, 'Karto', 'RT 2/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(20, 'Lestari', 'RT 1/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(21, 'Sumarno', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(22, 'Paiman', 'RT 1/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(23, 'Parwati', 'RT 1/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(24, 'Karjo', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(25, 'Wiyono', 'RT 2/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(26, 'Suharto', 'RT 2/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(27, 'Wirorekso', 'RT 1/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(28, 'Juwariyah', 'RT 2/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(29, 'Tuminem', 'RT 2/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(30, 'Sarmini', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(31, 'Sastro', 'RT 1/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(32, 'Mulyadi', 'RT 1/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:39:29', '2025-06-25 04:39:29'),
(53, 'Sutrisno', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(54, 'Sarmilah', 'RT 2/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(55, 'Paidi', 'RT 1/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(56, 'Mursinah', 'RT 1/RW 3', 'Kelompok 4', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(57, 'Kasiman', 'RT 2/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(58, 'Sriatun', 'RT 1/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(59, 'Suraji', 'RT 1/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(60, 'Marwati', 'RT 1/RW 3', 'Kelompok 4', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(61, 'Gunarto', 'RT 1/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(62, 'Lastri', 'RT 1/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(63, 'Sanusi', 'RT 1/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(64, 'Karminah', 'RT 2/RW 3', 'Kelompok 4', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(65, 'Nuryadi', 'RT 1/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(66, 'Wulandari', 'RT 2/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(67, 'Suripno', 'RT 2/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(68, 'Rustam', 'RT 1/RW 3', 'Kelompok 1', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(69, 'Marsono', 'RT 2/RW 3', 'Kelompok 2', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(70, 'Minarsih', 'RT 1/RW 3', 'Kelompok 3', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(71, 'Slamet', 'RT 1/RW 3', 'Kelompok 4', 0, '0000-00-00', '2025-06-25 04:41:13', '2025-06-25 04:41:13'),
(72, 'suro', 'RT 2/RW 3', 'Kelompok 4', 5, '2025-06-25', '2025-06-24 22:34:35', '2025-06-24 22:34:35'),
(73, 'ahmad', 'RT 2/RW 3', 'Kelompok 3', 6, '2025-06-25', '2025-06-24 22:34:52', '2025-06-24 22:43:10'),
(75, 'Adi Surya', 'RT 1/RW 3', 'Kelompok 1', 1, '2025-07-20', '2025-07-14 12:44:34', '2025-07-20 03:00:09'),
(76, 'Arul Budianti Karjono', 'RT 2/RW 3', 'Kelompok 3', 2, '2025-07-14', '2025-07-14 12:44:58', '2025-07-14 12:45:22'),
(77, 'Aryaning', 'RT 1/RW 3', 'Kelompok 3', 3, '2025-07-20', '2025-07-20 02:59:26', '2025-07-20 02:59:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah_pengambilan`
--

CREATE TABLE `jamaah_pengambilan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengambilan_id` bigint(20) UNSIGNED NOT NULL,
  `jamaah_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jamaah_pengambilan`
--

INSERT INTO `jamaah_pengambilan` (`id`, `pengambilan_id`, `jamaah_id`, `created_at`, `updated_at`) VALUES
(147, 31, 60, NULL, NULL),
(148, 31, 64, NULL, NULL),
(149, 33, 64, NULL, NULL),
(150, 33, 71, NULL, NULL),
(151, 26, 61, NULL, NULL),
(152, 26, 65, NULL, NULL),
(153, 26, 68, NULL, NULL),
(154, 26, 5, NULL, NULL),
(155, 26, 8, NULL, NULL),
(156, 26, 11, NULL, NULL),
(157, 26, 14, NULL, NULL),
(158, 26, 17, NULL, NULL),
(159, 26, 20, NULL, NULL),
(160, 26, 23, NULL, NULL),
(161, 26, 26, NULL, NULL),
(162, 26, 56, NULL, NULL),
(163, 26, 60, NULL, NULL),
(164, 26, 64, NULL, NULL),
(165, 26, 71, NULL, NULL),
(166, 34, 60, NULL, NULL),
(167, 34, 64, NULL, NULL),
(168, 32, 1, NULL, NULL),
(169, 32, 2, NULL, NULL),
(170, 32, 4, NULL, NULL),
(171, 32, 7, NULL, NULL),
(172, 32, 10, NULL, NULL),
(173, 35, 6, NULL, NULL),
(174, 35, 71, NULL, NULL),
(175, 35, 72, NULL, NULL),
(176, 30, 25, NULL, NULL),
(177, 30, 28, NULL, NULL),
(178, 30, 58, NULL, NULL),
(179, 36, 3, NULL, NULL),
(180, 36, 9, NULL, NULL),
(181, 36, 66, NULL, NULL),
(182, 36, 69, NULL, NULL),
(183, 36, 70, NULL, NULL),
(184, 36, 73, NULL, NULL),
(185, 37, 3, NULL, NULL),
(186, 37, 9, NULL, NULL),
(187, 37, 66, NULL, NULL),
(188, 37, 69, NULL, NULL),
(189, 37, 70, NULL, NULL),
(190, 37, 73, NULL, NULL),
(191, 35, 56, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_24_031233_create_jamaahs_table', 1),
(5, '2025_06_24_031245_create_pengambilans_table', 1),
(6, '2025_06_24_031256_create_pengeluarans_table', 1),
(7, 'create_jamaah_pengambilan_table', 1),
(8, '2025_06_26_042822_add_user_tracking_to_pengambilans_table', 2),
(9, '2025_06_26_044051_add_user_tracking_to_pengambilans_table', 3),
(10, '2025_07_04_092541_create_pengambilan_temps_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilans`
--

CREATE TABLE `pengambilans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jml_dana` int(11) NOT NULL,
  `jml_jamaah` int(11) NOT NULL,
  `jml_pengambilan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `periode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengambilans`
--

INSERT INTO `pengambilans` (`id`, `jml_dana`, `jml_jamaah`, `jml_pengambilan`, `tanggal`, `periode`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(26, 8000000, 15, 34800000, '2025-06-30', 'Februari 2023', '2025-06-30 09:04:39', '2025-06-30 10:35:14', 1, 1),
(27, 3000000, 0, 11000000, '2025-06-30', 'Juni 2023', '2025-06-30 09:04:53', '2025-06-30 09:04:53', 1, 1),
(28, 3200000, 0, 14200000, '2025-06-30', 'Januari 2024', '2025-06-30 09:05:13', '2025-06-30 09:05:13', 1, 1),
(29, 2900000, 0, 17100000, '2025-06-30', 'April 2024', '2025-06-30 09:05:25', '2025-06-30 09:05:25', 1, 1),
(30, 5600000, 3, 41500000, '2025-07-08', 'Oktober 2024', '2025-06-30 09:05:44', '2025-07-08 00:17:55', 1, 5),
(31, 2800000, 2, 25500000, '2025-06-30', 'April 2025', '2025-06-30 09:06:14', '2025-06-30 09:06:14', 1, 1),
(32, 5000000, 5, 37500000, '2025-07-01', 'Mei 2025', '2025-06-30 09:06:32', '2025-07-01 11:15:52', 1, 1),
(33, 4300000, 2, 34800000, '2025-06-30', 'Juni 2025', '2025-06-30 09:06:49', '2025-06-30 09:06:49', 1, 1),
(34, 2700000, 2, 37500000, '2025-06-30', 'Juli 2025', '2025-06-30 12:28:36', '2025-06-30 12:28:36', 1, 1),
(35, 4000000, 4, 48508000, '2025-07-14', 'Agustus 2025', '2025-07-08 00:17:10', '2025-07-14 13:07:06', 5, 1),
(36, 7000000, 6, 48500000, '2025-07-14', 'Januari 2025', '2025-07-14 12:46:49', '2025-07-14 12:46:49', 1, 1),
(37, 8000, 6, 48508000, '2025-07-14', 'Februari 2025', '2025-07-14 12:47:11', '2025-07-14 12:47:11', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilan_temps`
--

CREATE TABLE `pengambilan_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jamaah_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengambilan_temps`
--

INSERT INTO `pengambilan_temps` (`id`, `user_id`, `jamaah_id`, `created_at`, `updated_at`) VALUES
(3, 1, 66, '2025-07-04 02:40:08', '2025-07-04 02:40:08'),
(4, 1, 69, '2025-07-04 02:40:08', '2025-07-04 02:40:08'),
(5, 1, 73, '2025-07-04 02:40:15', '2025-07-04 02:40:15'),
(6, 1, 70, '2025-07-04 02:40:17', '2025-07-04 02:40:17'),
(7, 1, 3, '2025-07-04 02:47:07', '2025-07-04 02:47:07'),
(8, 1, 9, '2025-07-04 02:47:53', '2025-07-04 02:47:53'),
(9, 5, 6, '2025-07-08 00:16:51', '2025-07-08 00:16:51'),
(10, 5, 72, '2025-07-08 00:16:56', '2025-07-08 00:16:56'),
(11, 5, 71, '2025-07-08 00:16:57', '2025-07-08 00:16:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengeluaran` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jml_pengeluaran` int(11) NOT NULL,
  `jml_dana` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengeluarans`
--

INSERT INTO `pengeluarans` (`id`, `pengeluaran`, `keterangan`, `jml_pengeluaran`, `jml_dana`, `tanggal`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Pembelian Karpet', 'Untuk ruang utama masjid', 0, 1500000, '2024-01-10', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(2, 'Perbaikan Pengeras Suara', 'Speaker masjid rusak diganti baru', 0, 850000, '2024-01-15', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(3, 'Honor Penceramah', 'Penceramah pengajian rutin', 0, 500000, '2024-01-20', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(4, 'Pengadaan Al-Quran', 'Tambahan mushaf untuk jamaah', 0, 1200000, '2024-01-25', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(5, 'Bayar Listrik', 'Pembayaran listrik bulanan', 0, 400000, '2024-02-01', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(6, 'Bayar Air', 'Tagihan air bulanan', 0, 300000, '2024-02-05', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(7, 'Konsumsi Pengajian', 'Snack dan minum pengajian ibu-ibu', 0, 750000, '2024-02-10', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(8, 'Beli Sapu & Alat Bersih', 'Alat kebersihan masjid', 0, 200000, '2024-02-12', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(9, 'Cetak Spanduk Ramadhan', 'Spanduk kegiatan bulan Ramadhan', 0, 250000, '2024-03-01', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(10, 'Biaya Marbot', 'Honor bulanan marbot masjid', 0, 600000, '2024-03-05', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(11, 'Perbaikan Genteng', 'Genteng bocor saat hujan deras', 0, 1000000, '2024-03-10', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(12, 'Beli Lampu', 'Penggantian lampu di serambi', 0, 180000, '2024-03-15', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(13, 'Transportasi Pengurus', 'Biaya perjalanan ke baznas', 0, 300000, '2024-03-20', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(14, 'Beli Tikar', 'Tambahan tikar untuk jamaah', 0, 900000, '2024-03-25', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(15, 'Kegiatan TPA', 'Biaya lomba dan hadiah anak TPA', 0, 700000, '2024-04-01', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(16, 'Perbaikan Pintu', 'Pintu utama rusak', 0, 550000, '2024-04-03', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(17, 'Cetak Buku Kegiatan', 'Dokumentasi dan laporan tahunan', 0, 320000, '2024-04-08', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(18, 'Sedekah Korban Bencana', 'Donasi warga terdampak banjir', 0, 1000000, '2024-04-12', '2025-06-25 04:41:36', '2025-06-25 04:41:36', NULL, NULL),
(20, 'Honor Imam Tarawih', 'Untuk imam selama bulan Ramadhan', 8000000, 8000000, '2024-04-25', '2025-06-25 04:41:36', '2025-06-25 01:18:19', NULL, NULL),
(22, 'mic', 'dd', 3000000, 3000000, '2025-06-02', '2025-06-25 23:18:43', '2025-06-25 23:18:43', NULL, NULL),
(23, 'Semen', 'dfdf', 4000000, 4000000, '2024-03-01', '2025-06-25 23:21:13', '2025-06-25 23:21:13', 1, 1),
(24, 'tenda', 'dfdf', 8000000, 8000000, '2025-06-28', '2025-06-30 02:18:25', '2025-06-30 02:18:25', NULL, NULL),
(25, 'Jajan', 'ksks', 2000000, 2000000, '2025-07-10', '2025-07-08 00:05:56', '2025-07-08 00:06:11', 6, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','takmir','remas') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$ZOiqQKFQiH0vddE77gSige4T6hSHWBzovQw3xRK/f0xYL/K2Hv/aS', 'sP0vFlowyMcdhRPjwxcWCy3kRR3sGCC1NXt3G6TBF6VDDRCD0vMw4sB87cUL', '2025-06-24 05:45:56', '2025-07-19 10:36:01'),
(5, 'remas', 'remas@gmail.com', 'remas', NULL, '$2y$12$PK2Flh7DH29bmglCa2nBhe5hBPCQ0uFp2Z.EUe3F64fgRtcn.HAqO', 'ewRL9bY65Efub3KV14G1agcOl9zScWec9WRrJ5LqzyXnUbICe9jNvjCyTtrc', '2025-06-30 02:15:09', '2025-07-08 10:18:40'),
(6, 'takmir', 'takmir@gmail.com', 'takmir', NULL, '$2y$12$.3yltj.BPF4uAhCWSXqKOuYV90frJrR8/xqMv15kPhXJJeHIS0iK2', NULL, '2025-06-30 02:34:46', '2025-06-30 02:34:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jamaahs`
--
ALTER TABLE `jamaahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jamaahs_nama_unique` (`nama`);

--
-- Indeks untuk tabel `jamaah_pengambilan`
--
ALTER TABLE `jamaah_pengambilan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jamaah_pengambilan_pengambilan_id_foreign` (`pengambilan_id`),
  ADD KEY `jamaah_pengambilan_jamaah_id_foreign` (`jamaah_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengambilans`
--
ALTER TABLE `pengambilans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengambilans_created_by_foreign` (`created_by`),
  ADD KEY `pengambilans_updated_by_foreign` (`updated_by`);

--
-- Indeks untuk tabel `pengambilan_temps`
--
ALTER TABLE `pengambilan_temps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengambilan_temps_user_id_foreign` (`user_id`),
  ADD KEY `pengambilan_temps_jamaah_id_foreign` (`jamaah_id`);

--
-- Indeks untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by` (`created_by`),
  ADD KEY `fk_updated_by` (`updated_by`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jamaahs`
--
ALTER TABLE `jamaahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `jamaah_pengambilan`
--
ALTER TABLE `jamaah_pengambilan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengambilans`
--
ALTER TABLE `pengambilans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `pengambilan_temps`
--
ALTER TABLE `pengambilan_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jamaah_pengambilan`
--
ALTER TABLE `jamaah_pengambilan`
  ADD CONSTRAINT `jamaah_pengambilan_jamaah_id_foreign` FOREIGN KEY (`jamaah_id`) REFERENCES `jamaahs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jamaah_pengambilan_pengambilan_id_foreign` FOREIGN KEY (`pengambilan_id`) REFERENCES `pengambilans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengambilans`
--
ALTER TABLE `pengambilans`
  ADD CONSTRAINT `pengambilans_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengambilans_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pengambilan_temps`
--
ALTER TABLE `pengambilan_temps`
  ADD CONSTRAINT `pengambilan_temps_jamaah_id_foreign` FOREIGN KEY (`jamaah_id`) REFERENCES `jamaahs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengambilan_temps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengeluarans_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
