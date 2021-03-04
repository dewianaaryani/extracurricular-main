-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 02:37 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extracurricular_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `tempat` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `hari` varchar(225) NOT NULL,
  `jam` varchar(225) NOT NULL,
  `image_1` varchar(225) NOT NULL,
  `image_2` varchar(225) NOT NULL,
  `image_3` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id`, `name`, `description`, `tempat`, `type`, `hari`, `jam`, `image_1`, `image_2`, `image_3`, `created_at`, `updated_at`) VALUES
(2, 'Karate', '', 'Balai Krida', 'Upd', 'Sabtu', '7', '', '', '', '2021-02-28 22:00:48', '2021-03-01 02:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Ciawi 4', '2021-02-28 14:47:46', '2021-02-28 14:47:46'),
(3, 'Cia 1', '2021-03-02 02:31:50', '2021-03-02 02:31:50'),
(4, 'Cia 3', '2021-03-02 02:31:55', '2021-03-02 02:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'RPL XII-1', '2021-03-02 02:31:07', '2021-03-02 02:31:07'),
(5, 'RPL XII-4', '2021-03-02 02:31:23', '2021-03-02 02:31:23'),
(6, 'RPL XII-2', '2021-03-02 02:31:31', '2021-03-02 02:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rombel_id` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rayon_id` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upd_id` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senbud_id` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nomor_induk`, `role`, `rombel_id`, `rayon_id`, `upd_id`, `senbud_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'lorem', '', 'Koordinator Senbud & UPD', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', NULL, '2021-02-26 20:03:53', '2021-02-26 20:03:53'),
(3, 'dew', NULL, 'Siswa', '1', '2', 'Open this select menu', 'Open this select menu', 'dfa', 'dew', NULL, '2021-02-28 09:07:27', '2021-03-01 19:50:04'),
(4, 'dew', NULL, 'Siswa', NULL, NULL, '2', '7', 'dedew', 'dedew', NULL, '2021-02-28 22:52:44', '2021-02-28 22:52:44'),
(5, 'dd', NULL, 'Siswa', NULL, NULL, '2', '7', 'dd', 'dd', NULL, '2021-03-01 01:29:58', '2021-03-01 01:29:58'),
(6, 'dd', NULL, 'Siswa', NULL, NULL, '2', '7', 'dd', 'dd', NULL, '2021-03-01 01:29:58', '2021-03-01 01:29:58'),
(7, 'dadf', 'fadf', 'Siswa', NULL, NULL, '2', '7', 'dafd', 'fadf', NULL, '2021-03-01 01:32:21', '2021-03-01 01:32:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
