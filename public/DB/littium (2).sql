-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 11:03 PM
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
-- Database: `littium`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `status` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `status`, `address`, `phone`, `org_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Stock Exchange Company', 'admin@gmail.com', 'admin', 'admin', '1', 'address', '1111222333', 'WEB DEVELOPERS', '1111111111111111111111111111', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `account_number` varchar(150) DEFAULT NULL,
  `address` varchar(155) DEFAULT NULL,
  `swift_code` varchar(100) DEFAULT NULL,
  `ibank_number` varchar(100) DEFAULT NULL,
  `rounting_number` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `account_number`, `address`, `swift_code`, `ibank_number`, `rounting_number`, `description`, `updated_at`) VALUES
(1, 'TESTING', 'TESTING', 'TESTING', 'TESTING', NULL, 'TESTING', 'TESTING', '2024-04-17 20:39:23');

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
-- Table structure for table `deposite`
--

CREATE TABLE `deposite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pay_mode` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `acc_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposite`
--

INSERT INTO `deposite` (`id`, `user_id`, `name`, `amount`, `pay_mode`, `description`, `transaction_id`, `status`, `bank_name`, `acc_number`, `created_at`, `updated_at`) VALUES
(8, '702896', 'Test', '1200', 'Test', 'testing', 'TX17125931436504', '1', NULL, NULL, '2024-04-08 10:49:03', '2024-04-08 11:34:19'),
(9, '702896', 'Test', '100', 'By Admin', NULL, 'TX17125933245061', '1', NULL, NULL, '2024-04-08 10:52:04', '2024-04-08 10:52:04'),
(10, '771764', 'testing', '20000', 'By Admin', NULL, 'TX17125993724806', '1', NULL, NULL, '2024-04-08 12:32:52', '2024-04-08 12:32:52'),
(11, '771764', 'testing', '50000', 'By Admin', NULL, 'TX17126820955339', '1', NULL, NULL, '2024-04-09 11:31:35', '2024-04-09 11:31:35'),
(12, '702896', 'Test', '20000', 'Test', NULL, 'TX17131091197211', '1', NULL, NULL, '2024-04-14 10:08:39', '2024-04-14 10:09:09'),
(13, '702896', 'Test', '20000', 'Test', NULL, 'TX17131093668874', '1', NULL, NULL, '2024-04-14 10:12:46', '2024-04-14 10:13:27'),
(14, '702896', 'Test', '20000', 'By Admin', NULL, 'TX17131094371865', '1', NULL, NULL, '2024-04-14 10:13:57', '2024-04-14 10:13:57'),
(15, '702896', 'Test', '20', 'Test', NULL, 'TX17131098119524', '1', NULL, NULL, '2024-04-14 10:20:11', '2024-04-14 10:29:43'),
(16, '702896', 'Test', '20000', 'Test', NULL, 'TX17131104737212', '1', NULL, NULL, '2024-04-14 10:31:13', '2024-04-14 10:31:26'),
(17, '702896', 'Test', '200', 'Test', NULL, 'TX17133809864904', '1', NULL, NULL, '2024-04-17 13:39:46', '2024-04-17 13:44:05'),
(18, '702896', 'Test', '20000', 'Bank Wire', NULL, '428855840201', '0', 'bank of test', NULL, '2024-04-17 15:27:58', '2024-04-17 15:27:58');

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
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investment_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `plan_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `investment_id`, `name`, `plan_id`, `user_id`, `amount`, `start_date`, `end_date`, `created_at`, `updated_at`, `status`) VALUES
(43, '121915', 'Test', '679593', '702896', '10000', '2024-04-09 18:46:20', '2024-04-29 18:46:20', '2024-04-09 13:16:20', '2024-04-09 13:16:20', 0),
(44, '774123', 'Test', '679593', '702896', '10000', '2024-04-09 18:48:24', '2024-04-29 18:48:24', '2024-04-09 13:18:24', '2024-04-09 13:18:24', 0),
(45, '159485', 'Test', '196954', '702896', '20000', '2024-04-17 18:27:38', '2024-05-17 18:27:38', '2024-04-17 12:57:38', '2024-04-17 12:57:38', 0),
(46, '904076', 'Test', '838889', '702896', '20000', '2024-04-17 18:33:17', '2024-05-07 18:33:17', '2024-04-17 13:03:17', '2024-04-17 13:03:17', 0),
(47, '376495', 'Test', '838889', '702896', '20000', '2024-04-17 18:39:13', '2024-05-07 18:39:13', '2024-04-17 13:09:13', '2024-04-17 13:09:13', 0),
(48, '496942', 'Test', '838889', '702896', '20000', '2024-04-17 18:39:42', '2024-05-07 18:39:42', '2024-04-17 13:09:42', '2024-04-17 13:09:42', 0),
(49, '578767', 'Test', '838889', '702896', '20000', '2024-04-17 18:42:15', '2024-05-07 18:42:15', '2024-04-17 13:12:15', '2024-04-17 13:12:15', 0),
(50, '288875', 'Test', '838889', '702896', '20000', '2024-04-17 18:42:45', '2024-05-07 18:42:45', '2024-04-17 13:12:45', '2024-04-17 13:12:45', 0),
(51, '463993', 'Test', '838889', '702896', '20000', '2024-04-17 18:43:17', '2024-05-07 18:43:17', '2024-04-17 13:13:17', '2024-04-17 13:13:17', 0),
(52, '225047', 'Test', '838889', '702896', '20000', '2024-04-17 18:50:05', '2024-05-07 18:50:05', '2024-04-17 13:20:05', '2024-04-17 13:20:05', 0),
(53, '700867', 'Test', '838889', '702896', '20000', '2024-04-17 18:50:55', '2024-05-07 18:50:55', '2024-04-17 13:20:55', '2024-04-17 13:20:55', 0),
(54, '745735', 'Test', '838889', '702896', '20000', '2024-04-17 18:51:24', '2024-05-07 18:51:24', '2024-04-17 13:21:24', '2024-04-17 13:21:24', 0),
(55, '142768', 'Test', '838889', '702896', '20000', '2024-04-17 18:52:10', '2024-05-07 18:52:10', '2024-04-17 13:22:10', '2024-04-17 13:22:10', 0),
(56, '177740', 'Test', '838889', '702896', '20000', '2024-04-17 18:53:12', '2024-05-07 18:53:12', '2024-04-17 13:23:12', '2024-04-17 13:23:12', 0),
(57, '361459', 'Test', '838889', '702896', '20000', '2024-04-17 18:54:38', '2024-05-07 18:54:38', '2024-04-17 13:24:38', '2024-04-17 13:24:38', 0),
(58, '255303', 'Test', '838889', '702896', '20000', '2024-04-17 18:54:50', '2024-05-07 18:54:50', '2024-04-17 13:24:50', '2024-04-17 13:24:50', 0),
(59, '718827', 'Test', '838889', '702896', '20000', '2024-04-17 18:54:59', '2024-05-07 18:54:59', '2024-04-17 13:24:59', '2024-04-17 13:24:59', 0),
(60, '739849', 'Test', '838889', '702896', '20000', '2024-04-17 18:55:16', '2024-05-07 18:55:16', '2024-04-17 13:25:16', '2024-04-17 13:25:16', 0),
(61, '906204', 'Test', '838889', '702896', '20000', '2024-04-17 18:55:26', '2024-05-07 18:55:26', '2024-04-17 13:25:26', '2024-04-17 13:25:26', 0),
(62, '426984', 'Test', '838889', '702896', '20000', '2024-04-17 18:56:46', '2024-05-07 18:56:46', '2024-04-17 13:26:46', '2024-04-17 13:26:46', 0),
(63, '494432', 'Test', '838889', '702896', '20000', '2024-04-17 19:00:07', '2024-05-07 19:00:07', '2024-04-17 13:30:07', '2024-04-17 13:30:07', 0),
(64, '633079', 'Test', '838889', '702896', '20000', '2024-04-17 19:00:54', '2024-05-07 19:00:54', '2024-04-17 13:30:54', '2024-04-17 13:30:54', 0),
(65, '382885', 'Test', '838889', '702896', '20000', '2024-04-17 19:01:52', '2024-05-07 19:01:52', '2024-04-17 13:31:52', '2024-04-17 13:31:52', 0),
(66, '816918', 'Test', '838889', '702896', '20000', '2024-04-17 19:03:58', '2024-05-07 19:03:58', '2024-04-17 13:33:58', '2024-04-17 13:33:58', 0),
(67, '553500', 'Test', '838889', '702896', '20000', '2024-04-17 19:05:35', '2024-05-07 19:05:35', '2024-04-17 13:35:35', '2024-04-17 13:35:35', 0);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_19_200817_create_admins_table', 2),
(5, '2024_03_20_154412_create_users_table', 3),
(6, '2024_03_20_173906_add_columns_to_users_table', 4),
(7, '2024_03_30_173627_create_plans_table', 5),
(8, '2024_03_31_191853_create_investments_table', 6),
(9, '2024_04_07_200010_create_deposite_table', 7),
(10, '2024_04_14_184146_create_table_transfer', 8),
(11, '2024_04_14_184724_create_transfers', 9),
(12, '2024_04_14_184847_create_transfers', 10),
(13, '2024_04_14_185726_create_transactions', 11),
(14, '2024_04_16_174939_create_stocks', 12);

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
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `minimum_amount` varchar(255) NOT NULL,
  `period` varchar(255) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `roi` varchar(155) NOT NULL,
  `risk` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `compounding` varchar(255) NOT NULL,
  `compound_perc` int(100) DEFAULT 100,
  `principal_release` varchar(255) DEFAULT NULL,
  `release_fee` varchar(255) DEFAULT NULL,
  `total_invested` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `no_of_users` int(150) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `name`, `status`, `minimum_amount`, `period`, `duration`, `roi`, `risk`, `description`, `compounding`, `compound_perc`, `principal_release`, `release_fee`, `total_invested`, `image`, `no_of_users`, `created_at`, `updated_at`) VALUES
(5, '657076', 'TESTING', 'Active', '10000', 'Daily', '28', '28', '20', 'WDADSAD', 'Disabled', 100, 'Disabled', '100', '14212', 'upload/plans/plan_image_660996780126b.png', 0, '2024-03-31 10:15:23', '2024-04-09 07:40:27'),
(6, '152100', 'Lithium,,..', 'Active', '20000', 'Monthly', '30', '33', '18', 'Invest in Test Lithium Plan % and Earn 33% with us.', 'Disabled', 100, 'Disabled', '50', '6100', 'upload/plans/plan_image_6609a88b6b0da.jpg', 0, '2024-03-31 12:45:38', '2024-04-09 08:31:47'),
(7, '679593', 'TESLA LITHIUM INVESTMENT PLAN: BY DEMO COMPANY', 'Active', '10000', 'Monthly', '20', '30', '10', 'TESLA LITHIUM INVESTMENT PLAN: BY DEMO COMPANY', 'Suspended', 100, 'Disabled', '100', '80024', 'upload/plans/plan_image_66157ff071807.png', 6, '2024-04-09 12:20:40', '2024-04-09 13:18:24'),
(8, '196954', 'TESLA LITHIUM ---!@!@!@!@---123123213', 'Active', '20000', NULL, '30', '20', '20', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Disabled', NULL, NULL, '10', '20000', 'upload/plans/plan_image_661ec1cd4371e.png', 1, '2024-04-16 12:52:05', '2024-04-17 12:57:38'),
(9, '838889', 'TESTXP --asdasdsad--', 'Active', '20000', NULL, '20', '30', '20', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Disabled', NULL, NULL, '10', '440000', 'upload/plans/plan_image_661ecf932d355.png', 22, '2024-04-16 13:50:51', '2024-04-17 13:35:35');

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
('FnORACpj4EBVBIPtzDfWRwHfebg3HoeaEduJePiK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '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', 1713386510),
('o6mQsjMfvEHxz1fGBuGu8dA8JoxpDZSPCCBPgyvj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicUt6cDNYUUd0NE1LNWZvaTZvY2FBSkNwR1hubTh2OXNwYkJVSkp0SiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ydW5fYm90eCI7fXM6Njoic191c2VyIjtPOjE1OiJBcHBcTW9kZWxzXFVzZXIiOjMwOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjU6InVzZXJzIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6MzE6e3M6MjoiaWQiO2k6MTQ7czo3OiJ1c2VyX2lkIjtzOjY6IjcwMjg5NiI7czozOiJreWMiO2k6MDtzOjQ6Im5hbWUiO3M6NDoiVGVzdCI7czo1OiJlbWFpbCI7czoxNDoidGVzdEBnbWFpbC5jb20iO3M6NzoiY291bnRyeSI7czo3OiJBbmRvcnJhIjtzOjEwOiJpbWFnZV9kYXRhIjtzOjM0OiJ1cGxvYWQvc2VsZmllL0lENjYxNTcyODVhYTkzZC5qcGVnIjtzOjg6ImlkX3Byb29mIjtzOjQxOiJ1cGxvYWQvaWRfaW1hZ2UvaWRfaW1hZ2U2NjE1NzI4NWFhZTZiLnBuZyI7czoxMzoiYWRkcmVzc19wcm9vZiI7czo1MToidXBsb2FkL2FkZHJlc3NfcHJvb2YvYWRkcmVzc19wcm9vZjY2MTU3MjhkYmI1MmQucG5nIjtzOjg6InBhc3N3b3JkIjtzOjU6IjEyMzQ1IjtzOjY6InN0YXR1cyI7czoxMjoibm90X2FwcHJvdmVkIjtzOjEzOiJhdXRvX3dpdGhkcmF3IjtOO3M6MTY6InBheV9lYXJuaW5nX2F1dG8iO047czoxMjoibWF4X3dpdGhkcmF3IjtOO3M6MTI6ImRlbW9fYWNjb3VudCI7TjtzOjk6ImJsYWNrbGlzdCI7TjtzOjEwOiJhZG1pbl9ub3RlIjtOO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjQtMDQtMDYgMTI6NDg6NDEiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjQtMDQtMTQgMjA6MzA6MjQiO3M6NzoiYmFsYW5jZSI7aToxMTk5NzYwMDtzOjY6ImZ1bmRlZCI7aTowO3M6Nzoid2l0aHJhdyI7aTowO3M6ODoiZGVwb3NpdGUiO2k6MjAwMDA7czoxMDoiY29tbWlzc2lvbiI7aTowO3M6NjoiYXNzZXRzIjtpOjA7czo3OiJFYXJuaW5nIjtpOjA7czoxMToicmVmZXJyYWxfaWQiO047czoxNDoidG90YWxfZGVwb3NpdGUiO3M6MToiMCI7czo5OiJpZF9zdGF0dXMiO2k6MjtzOjEwOiJhZGRfc3RhdHVzIjtpOjI7czoxMDoiZW1haWxfYXV0aCI7aTowO31zOjExOiIAKgBvcmlnaW5hbCI7YTozMTp7czoyOiJpZCI7aToxNDtzOjc6InVzZXJfaWQiO3M6NjoiNzAyODk2IjtzOjM6Imt5YyI7aTowO3M6NDoibmFtZSI7czo0OiJUZXN0IjtzOjU6ImVtYWlsIjtzOjE0OiJ0ZXN0QGdtYWlsLmNvbSI7czo3OiJjb3VudHJ5IjtzOjc6IkFuZG9ycmEiO3M6MTA6ImltYWdlX2RhdGEiO3M6MzQ6InVwbG9hZC9zZWxmaWUvSUQ2NjE1NzI4NWFhOTNkLmpwZWciO3M6ODoiaWRfcHJvb2YiO3M6NDE6InVwbG9hZC9pZF9pbWFnZS9pZF9pbWFnZTY2MTU3Mjg1YWFlNmIucG5nIjtzOjEzOiJhZGRyZXNzX3Byb29mIjtzOjUxOiJ1cGxvYWQvYWRkcmVzc19wcm9vZi9hZGRyZXNzX3Byb29mNjYxNTcyOGRiYjUyZC5wbmciO3M6ODoicGFzc3dvcmQiO3M6NToiMTIzNDUiO3M6Njoic3RhdHVzIjtzOjEyOiJub3RfYXBwcm92ZWQiO3M6MTM6ImF1dG9fd2l0aGRyYXciO047czoxNjoicGF5X2Vhcm5pbmdfYXV0byI7TjtzOjEyOiJtYXhfd2l0aGRyYXciO047czoxMjoiZGVtb19hY2NvdW50IjtOO3M6OToiYmxhY2tsaXN0IjtOO3M6MTA6ImFkbWluX25vdGUiO047czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNC0wNC0wNiAxMjo0ODo0MSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNC0wNC0xNCAyMDozMDoyNCI7czo3OiJiYWxhbmNlIjtpOjExOTk3NjAwO3M6NjoiZnVuZGVkIjtpOjA7czo3OiJ3aXRocmF3IjtpOjA7czo4OiJkZXBvc2l0ZSI7aToyMDAwMDtzOjEwOiJjb21taXNzaW9uIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6MDtzOjExOiJyZWZlcnJhbF9pZCI7TjtzOjE0OiJ0b3RhbF9kZXBvc2l0ZSI7czoxOiIwIjtzOjk6ImlkX3N0YXR1cyI7aToyO3M6MTA6ImFkZF9zdGF0dXMiO2k6MjtzOjEwOiJlbWFpbF9hdXRoIjtpOjA7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6MDp7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX1zOjE5OiJpbnZlc3Rfc3VjY2Vzc19kYXRhIjthOjU6e3M6NzoibWVzc2FnZSI7czoyMjoiSW52ZXN0bWVudCBzdWNjZXNzZnVsISI7czo2OiJhbW91bnQiO2k6MTAwMDtzOjk6InBsYW5fbmFtZSI7czoyMDoiVEVTVFhQIC0tYXNkYXNkc2FkLS0iO3M6OToidXNlcl9uYW1lIjtzOjQ6IlRlc3QiO3M6MTM6ImludmVzdG1lbnRfaWQiO2k6NTUzNTAwO31zOjIxOiJ0cmFuc2Zlcl9zdWNjZXNzX2RhdGEiO2E6Njp7czo2OiJhbW91bnQiO3M6MToiMSI7czo2OiJzZW5kZXIiO3M6NDoiVGVzdCI7czoxMjoic2VuZGVyX2VtYWlsIjtzOjE0OiJ0ZXN0QGdtYWlsLmNvbSI7czo4OiJyZWNlaXZlciI7czo3OiJ0ZXN0aW5nIjtzOjE0OiJyZWNlaXZlcl9lbWFpbCI7czoxMzoiYXZpQGdtYWlsLmNvbSI7czoxNDoidHJhbnNhY3Rpb25faWQiO3M6MTY6IlRYMTcxMzM4MTI5Nzg1MTYiO319', 1713387742);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` varchar(255) NOT NULL,
  `base_value` varchar(255) NOT NULL,
  `down_limit` varchar(255) NOT NULL,
  `up_limit` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `plan_id`, `base_value`, `down_limit`, `up_limit`, `status`, `extra`, `created_at`, `updated_at`) VALUES
(1, '196954', '250', '190', '300', '1', NULL, '2024-04-16 12:52:05', '2024-04-16 12:52:05'),
(2, '838889', '500', '380', '620', '1', NULL, '2024-04-16 13:50:51', '2024-04-16 13:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `subject`, `name`, `amount`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(1, '702896', 'Fund Transfer', 'testing', '19000', NULL, 'debit', '2024-04-14 13:45:22', '2024-04-14 13:45:22'),
(2, '771764', 'Fund Transfer', 'Test', '19000', NULL, 'credit', '2024-04-14 13:45:22', '2024-04-14 13:45:22'),
(3, '702896', 'Fund Transfer', 'testing', '19000', NULL, 'debit', '2024-04-14 13:49:03', '2024-04-14 13:49:03'),
(4, '771764', 'Fund Transfer', 'Test', '19000', NULL, 'credit', '2024-04-14 13:49:03', '2024-04-14 13:49:03'),
(5, '702896', 'Fund Transfer', 'testing', '19000', NULL, 'debit', '2024-04-14 13:57:34', '2024-04-14 13:57:34'),
(6, '771764', 'Fund Transfer', 'Test', '19000', NULL, 'credit', '2024-04-14 13:57:34', '2024-04-14 13:57:34'),
(7, '702896', 'Fund Transfer', 'testing', '19000', NULL, 'debit', '2024-04-14 13:57:46', '2024-04-14 13:57:46'),
(8, '771764', 'Fund Transfer', 'Test', '19000', NULL, 'credit', '2024-04-14 13:57:46', '2024-04-14 13:57:46'),
(9, '702896', 'Fund Transfer', 'testing', '19000', NULL, 'debit', '2024-04-14 13:58:04', '2024-04-14 13:58:04'),
(10, '771764', 'Fund Transfer', 'Test', '19000', NULL, 'credit', '2024-04-14 13:58:04', '2024-04-14 13:58:04'),
(11, '702896', 'Fund Transfer', 'testing', '20000', NULL, 'debit', '2024-04-14 14:26:36', '2024-04-14 14:26:36'),
(12, '771764', 'Fund Transfer', 'Test', '20000', NULL, 'credit', '2024-04-14 14:26:36', '2024-04-14 14:26:36'),
(13, '702896', 'Fund Transfer', 'testing', '20000', NULL, 'debit', '2024-04-14 14:27:02', '2024-04-14 14:27:02'),
(14, '771764', 'Fund Transfer', 'Test', '20000', NULL, 'credit', '2024-04-14 14:27:02', '2024-04-14 14:27:02'),
(15, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:32:56', '2024-04-14 14:32:56'),
(16, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:32:56', '2024-04-14 14:32:56'),
(17, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:33:23', '2024-04-14 14:33:23'),
(18, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:33:23', '2024-04-14 14:33:23'),
(19, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:34:46', '2024-04-14 14:34:46'),
(20, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:34:46', '2024-04-14 14:34:46'),
(21, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:38:37', '2024-04-14 14:38:37'),
(22, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:38:37', '2024-04-14 14:38:37'),
(23, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:40:22', '2024-04-14 14:40:22'),
(24, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:40:22', '2024-04-14 14:40:22'),
(25, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:41:43', '2024-04-14 14:41:43'),
(26, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:41:43', '2024-04-14 14:41:43'),
(27, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:42:38', '2024-04-14 14:42:38'),
(28, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:42:38', '2024-04-14 14:42:38'),
(29, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:43:28', '2024-04-14 14:43:28'),
(30, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:43:28', '2024-04-14 14:43:28'),
(31, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:44:52', '2024-04-14 14:44:52'),
(32, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:44:52', '2024-04-14 14:44:52'),
(33, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:46:33', '2024-04-14 14:46:33'),
(34, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:46:33', '2024-04-14 14:46:33'),
(35, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:46:57', '2024-04-14 14:46:57'),
(36, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:46:57', '2024-04-14 14:46:57'),
(37, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:49:42', '2024-04-14 14:49:42'),
(38, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:49:42', '2024-04-14 14:49:42'),
(39, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:50:07', '2024-04-14 14:50:07'),
(40, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:50:07', '2024-04-14 14:50:07'),
(41, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:50:40', '2024-04-14 14:50:40'),
(42, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:50:40', '2024-04-14 14:50:40'),
(43, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:51:28', '2024-04-14 14:51:28'),
(44, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:51:28', '2024-04-14 14:51:28'),
(45, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:51:53', '2024-04-14 14:51:53'),
(46, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:51:53', '2024-04-14 14:51:53'),
(47, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:52:18', '2024-04-14 14:52:18'),
(48, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:52:18', '2024-04-14 14:52:18'),
(49, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:52:40', '2024-04-14 14:52:40'),
(50, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:52:40', '2024-04-14 14:52:40'),
(51, '702896', 'Fund Transfer', 'testing', '10000', NULL, 'debit', '2024-04-14 14:52:52', '2024-04-14 14:52:52'),
(52, '771764', 'Fund Transfer', 'Test', '10000', NULL, 'credit', '2024-04-14 14:52:52', '2024-04-14 14:52:52'),
(53, '702896', 'Fund Transfer', 'testing', '1200', NULL, 'debit', '2024-04-14 14:57:10', '2024-04-14 14:57:10'),
(54, '771764', 'Fund Transfer', 'Test', '1200', NULL, 'credit', '2024-04-14 14:57:10', '2024-04-14 14:57:10'),
(55, '702896', 'Fund Transfer', 'testing', '1200', NULL, 'debit', '2024-04-14 15:00:24', '2024-04-14 15:00:24'),
(56, '771764', 'Fund Transfer', 'Test', '1200', NULL, 'credit', '2024-04-14 15:00:24', '2024-04-14 15:00:24'),
(57, '702896', 'Fund Transfer', 'testing', '200', NULL, 'debit', '2024-04-17 13:00:49', '2024-04-17 13:00:49'),
(58, '771764', 'Fund Transfer', 'Test', '200', NULL, 'credit', '2024-04-17 13:00:49', '2024-04-17 13:00:49'),
(59, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:09:13', '2024-04-17 13:09:13'),
(60, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:09:43', '2024-04-17 13:09:43'),
(61, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:12:15', '2024-04-17 13:12:15'),
(62, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:12:45', '2024-04-17 13:12:45'),
(63, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:13:17', '2024-04-17 13:13:17'),
(64, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:20:05', '2024-04-17 13:20:05'),
(65, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:20:55', '2024-04-17 13:20:55'),
(66, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:21:24', '2024-04-17 13:21:24'),
(67, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:22:10', '2024-04-17 13:22:10'),
(68, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:23:12', '2024-04-17 13:23:12'),
(69, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:24:39', '2024-04-17 13:24:39'),
(70, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:24:50', '2024-04-17 13:24:50'),
(71, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:24:59', '2024-04-17 13:24:59'),
(72, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:25:17', '2024-04-17 13:25:17'),
(73, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:25:26', '2024-04-17 13:25:26'),
(74, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:26:46', '2024-04-17 13:26:46'),
(75, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:30:07', '2024-04-17 13:30:07'),
(76, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:30:54', '2024-04-17 13:30:54'),
(77, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:31:52', '2024-04-17 13:31:52'),
(78, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:33:58', '2024-04-17 13:33:58'),
(79, '702896', 'Investment', 'TESTXP --asdasdsad--', '20000', NULL, 'debit', '2024-04-17 13:35:35', '2024-04-17 13:35:35'),
(80, '702896', 'Fund Transfer', 'testing', '120', NULL, 'debit', '2024-04-17 13:38:18', '2024-04-17 13:38:18'),
(81, '771764', 'Fund Transfer', 'Test', '120', NULL, 'credit', '2024-04-17 13:38:18', '2024-04-17 13:38:18'),
(82, '702896', 'Fund Deposite', 'Test', '200', NULL, 'credit', '2024-04-17 13:44:05', '2024-04-17 13:44:05'),
(83, '702896', 'Fund Transfer', 'testing', '1', NULL, 'debit', '2024-04-17 13:44:57', '2024-04-17 13:44:57'),
(84, '771764', 'Fund Transfer', 'Test', '1', NULL, 'credit', '2024-04-17 13:44:57', '2024-04-17 13:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_user_id` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `transaction_id` varchar(150) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `user_id`, `receiver_name`, `receiver_user_id`, `receiver_email`, `amount`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '702896', 'testing', '771764', 'avi@gmail.com', '19000', '', '1', '2024-04-14 13:45:22', '2024-04-14 13:45:22'),
(2, '702896', 'testing', '771764', 'avi@gmail.com', '19000', '', '1', '2024-04-14 13:49:03', '2024-04-14 13:49:03'),
(3, '702896', 'testing', '771764', 'avi@gmail.com', '19000', '', '1', '2024-04-14 13:57:34', '2024-04-14 13:57:34'),
(4, '702896', 'testing', '771764', 'avi@gmail.com', '19000', '', '1', '2024-04-14 13:57:46', '2024-04-14 13:57:46'),
(5, '702896', 'testing', '771764', 'avi@gmail.com', '19000', '', '1', '2024-04-14 13:58:04', '2024-04-14 13:58:04'),
(6, '702896', 'testing', '771764', 'avi@gmail.com', '20000', '', '1', '2024-04-14 14:26:36', '2024-04-14 14:26:36'),
(7, '702896', 'testing', '771764', 'avi@gmail.com', '20000', '', '1', '2024-04-14 14:27:02', '2024-04-14 14:27:02'),
(8, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:32:56', '2024-04-14 14:32:56'),
(9, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:33:23', '2024-04-14 14:33:23'),
(10, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:34:46', '2024-04-14 14:34:46'),
(11, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:38:37', '2024-04-14 14:38:37'),
(12, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:40:22', '2024-04-14 14:40:22'),
(13, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:41:43', '2024-04-14 14:41:43'),
(14, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:42:38', '2024-04-14 14:42:38'),
(15, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:43:28', '2024-04-14 14:43:28'),
(16, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:44:52', '2024-04-14 14:44:52'),
(17, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:46:33', '2024-04-14 14:46:33'),
(18, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:46:57', '2024-04-14 14:46:57'),
(19, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:49:42', '2024-04-14 14:49:42'),
(20, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:50:07', '2024-04-14 14:50:07'),
(21, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:50:40', '2024-04-14 14:50:40'),
(22, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:51:28', '2024-04-14 14:51:28'),
(23, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:51:53', '2024-04-14 14:51:53'),
(24, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:52:18', '2024-04-14 14:52:18'),
(25, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:52:40', '2024-04-14 14:52:40'),
(26, '702896', 'testing', '771764', 'avi@gmail.com', '10000', '', '1', '2024-04-14 14:52:52', '2024-04-14 14:52:52'),
(27, '702896', 'testing', '771764', 'avi@gmail.com', '1200', 'TX17131264308798', '1', '2024-04-14 14:57:10', '2024-04-14 14:57:10'),
(28, '702896', 'testing', '771764', 'avi@gmail.com', '1200', 'TX17131266242920', '1', '2024-04-14 15:00:24', '2024-04-14 15:00:24'),
(29, '702896', 'testing', '771764', 'avi@gmail.com', '200', 'TX17133786483011', '1', '2024-04-17 13:00:49', '2024-04-17 13:00:49'),
(30, '702896', 'testing', '771764', 'avi@gmail.com', '120', 'TX17133808986500', '1', '2024-04-17 13:38:18', '2024-04-17 13:38:18'),
(31, '702896', 'testing', '771764', 'avi@gmail.com', '1', 'TX17133812978516', '1', '2024-04-17 13:44:57', '2024-04-17 13:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `kyc` int(10) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(155) DEFAULT NULL,
  `image_data` varchar(255) DEFAULT NULL,
  `id_proof` varchar(255) DEFAULT NULL,
  `address_proof` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `auto_withdraw` varchar(255) DEFAULT NULL,
  `pay_earning_auto` varchar(255) DEFAULT NULL,
  `max_withdraw` varchar(255) DEFAULT NULL,
  `demo_account` varchar(255) DEFAULT NULL,
  `blacklist` varchar(255) DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balance` int(255) DEFAULT 0,
  `funded` int(255) DEFAULT 0,
  `withraw` int(255) DEFAULT 0,
  `deposite` int(255) NOT NULL DEFAULT 0,
  `commission` int(255) DEFAULT 0,
  `assets` int(255) DEFAULT 0,
  `Earning` int(255) DEFAULT 0,
  `referral_id` varchar(20) DEFAULT NULL,
  `total_deposite` varchar(120) DEFAULT '0',
  `id_status` int(10) NOT NULL DEFAULT 0,
  `add_status` int(10) NOT NULL DEFAULT 0,
  `email_auth` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `kyc`, `name`, `email`, `country`, `image_data`, `id_proof`, `address_proof`, `password`, `status`, `auto_withdraw`, `pay_earning_auto`, `max_withdraw`, `demo_account`, `blacklist`, `admin_note`, `created_at`, `updated_at`, `balance`, `funded`, `withraw`, `deposite`, `commission`, `assets`, `Earning`, `referral_id`, `total_deposite`, `id_status`, `add_status`, `email_auth`) VALUES
(14, '702896', 0, 'Test', 'test@gmail.com', 'Andorra', 'upload/selfie/ID66157285aa93d.jpeg', 'upload/id_image/id_image66157285aae6b.png', 'upload/address_proof/address_proof6615728dbb52d.png', '12345', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:18:41', '2024-04-17 13:44:57', 11537479, 460000, 0, 20200, 0, 0, 0, NULL, '0', 2, 2, 0),
(15, '771764', 0, 'testing', 'avi@gmail.com', 'Australia', 'upload/selfie/ID661403d268141.jpeg', 'upload/id_image/id_image661403d2683b4.jpg', 'upload/address_proof/address_proof661403fec65a4.jpg', '12345', 'Active', '0', 'No', NULL, NULL, NULL, NULL, '2024-04-08 09:16:25', '2024-04-17 13:44:57', 404598, 12000, 0, 70000, 0, 0, 0, NULL, '0', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
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
-- Indexes for table `deposite`
--
ALTER TABLE `deposite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposite`
--
ALTER TABLE `deposite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
