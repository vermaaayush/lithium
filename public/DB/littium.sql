-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 10:43 PM
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
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investment_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `plan_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `extra1` varchar(255) DEFAULT NULL,
  `extra2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `investment_id`, `name`, `plan_id`, `user_id`, `amount`, `extra1`, `extra2`, `created_at`, `updated_at`) VALUES
(1, '646463', 'TESTING', '657076', '10', '2000', NULL, NULL, '2024-03-31 14:22:48', '2024-03-31 14:22:48');

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
(8, '2024_03_31_191853_create_investments_table', 6);

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
  `period` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `roi` varchar(155) NOT NULL,
  `risk` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `compounding` varchar(255) NOT NULL,
  `principal_release` varchar(255) DEFAULT NULL,
  `release_fee` varchar(255) DEFAULT NULL,
  `total_invested` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `extra2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `name`, `status`, `minimum_amount`, `period`, `duration`, `roi`, `risk`, `description`, `compounding`, `principal_release`, `release_fee`, `total_invested`, `image`, `extra2`, `created_at`, `updated_at`) VALUES
(5, '657076', 'TESTING', 'Active', 'dsad', 'Daily', 'asdsad', 'wdasd', 'wdsad', 'WDADSAD', 'Disabled', 'Disabled', 'dsadsD', NULL, 'upload/plans/plan_image_660996780126b.png', NULL, '2024-03-31 10:15:23', '2024-03-31 11:29:36'),
(6, '152100', 'Test Lithium Plan %', 'Active', '1000', 'Monthly', '30', '33', '18', 'Invest in Test Lithium Plan % and Earn 33% with us.', 'Disabled', 'Disabled', '50', NULL, 'upload/plans/plan_image_6609a88b6b0da.jpg', NULL, '2024-03-31 12:45:38', '2024-03-31 12:46:43');

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
('78jemZAEFIJOoZVOKkusmVw2erob3ZOWFmcPgKQq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGtWdzVLZXlZNnVzVENlNnhmUElVYW5qaGpQRW9xbXBwcHRNb1Q2MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6InNfdXNlciI7TzoxNToiQXBwXE1vZGVsc1xVc2VyIjozMDp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo1OiJ1c2VycyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjI5OntzOjI6ImlkIjtpOjc7czo3OiJ1c2VyX2lkIjtzOjY6IjMwMDU5NSI7czo0OiJuYW1lIjtzOjQ6IlRlc3QiO3M6NToiZW1haWwiO3M6MTQ6InRlc3RAZ21haWwuY29tIjtzOjg6InVzZXJuYW1lIjtzOjEwOiJ0ZXN0aW5nMTIzIjtzOjU6InBob25lIjtzOjY6IjEyMzIxMyI7czo3OiJhZGRyZXNzIjtzOjY6IjIxMzIxMyI7czozOiJkb2IiO3M6MTA6IjIwMjQtMDMtMTYiO3M6NToiaW1hZ2UiO3M6Mzk6InVwbG9hZC91c2Vycy91c2VyX3BpY182NjA5OWEyY2I1MDA5LnBuZyI7czo4OiJwYXNzd29yZCI7czo1OiIxMjM0NSI7czo2OiJzdGF0dXMiO3M6NjoiQWN0aXZlIjtzOjE1OiJzZWNyZXRfcXVlc3Rpb24iO3M6MjoiYWEiO3M6MTM6InNlY3JldF9hbnN3ZXIiO3M6MjoiYWEiO3M6MTM6ImF1dG9fd2l0aGRyYXciO3M6MToiMSI7czoxNjoicGF5X2Vhcm5pbmdfYXV0byI7czoyOiJObyI7czoxMjoibWF4X3dpdGhkcmF3IjtzOjc6IjIxMTMyMTMiO3M6MTI6ImRlbW9fYWNjb3VudCI7TjtzOjk6ImJsYWNrbGlzdCI7TjtzOjEwOiJhZG1pbl9ub3RlIjtzOjEyOiJhc2RmYXNkYXNkc2EiO3M6NjoiZXh0cmExIjtOO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjQtMDMtMjAgMTk6MDg6NDUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjQtMDMtMjAgMTk6MDg6NDUiO3M6NzoiYmFsYW5jZSI7aTowO3M6NjoiZnVuZGVkIjtpOjA7czo3OiJ3aXRocmF3IjtpOjA7czoxMDoiY29tbWlzc2lvbiI7aTowO3M6NjoiYXNzZXRzIjtpOjA7czo3OiJFYXJuaW5nIjtpOjA7czoxMToicmVmZXJyYWxfaWQiO3M6MDoiIjt9czoxMToiACoAb3JpZ2luYWwiO2E6Mjk6e3M6MjoiaWQiO2k6NztzOjc6InVzZXJfaWQiO3M6NjoiMzAwNTk1IjtzOjQ6Im5hbWUiO3M6NDoiVGVzdCI7czo1OiJlbWFpbCI7czoxNDoidGVzdEBnbWFpbC5jb20iO3M6ODoidXNlcm5hbWUiO3M6MTA6InRlc3RpbmcxMjMiO3M6NToicGhvbmUiO3M6NjoiMTIzMjEzIjtzOjc6ImFkZHJlc3MiO3M6NjoiMjEzMjEzIjtzOjM6ImRvYiI7czoxMDoiMjAyNC0wMy0xNiI7czo1OiJpbWFnZSI7czozOToidXBsb2FkL3VzZXJzL3VzZXJfcGljXzY2MDk5YTJjYjUwMDkucG5nIjtzOjg6InBhc3N3b3JkIjtzOjU6IjEyMzQ1IjtzOjY6InN0YXR1cyI7czo2OiJBY3RpdmUiO3M6MTU6InNlY3JldF9xdWVzdGlvbiI7czoyOiJhYSI7czoxMzoic2VjcmV0X2Fuc3dlciI7czoyOiJhYSI7czoxMzoiYXV0b193aXRoZHJhdyI7czoxOiIxIjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtzOjI6Ik5vIjtzOjEyOiJtYXhfd2l0aGRyYXciO3M6NzoiMjExMzIxMyI7czoxMjoiZGVtb19hY2NvdW50IjtOO3M6OToiYmxhY2tsaXN0IjtOO3M6MTA6ImFkbWluX25vdGUiO3M6MTI6ImFzZGZhc2Rhc2RzYSI7czo2OiJleHRyYTEiO047czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNC0wMy0yMCAxOTowODo0NSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNC0wMy0yMCAxOTowODo0NSI7czo3OiJiYWxhbmNlIjtpOjA7czo2OiJmdW5kZWQiO2k6MDtzOjc6IndpdGhyYXciO2k6MDtzOjEwOiJjb21taXNzaW9uIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6MDtzOjExOiJyZWZlcnJhbF9pZCI7czowOiIiO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjA6e31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjEzOiJ1c2VzVW5pcXVlSWRzIjtiOjA7czo5OiIAKgBoaWRkZW4iO2E6MDp7fXM6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTE6IgAqAGZpbGxhYmxlIjthOjA6e31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO319fQ==', 1712347299),
('gou9cPB3UGioB9bO9BKEXaQpZGxpZ7wTqb0rrMsB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS25lMUVlWUw1eENPYkE3dUFpUnFZUTdpMzlhTjZHenJRaU1KU1RjZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6Njoic191c2VyIjtPOjE1OiJBcHBcTW9kZWxzXFVzZXIiOjMwOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjU6InVzZXJzIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6Mjk6e3M6MjoiaWQiO2k6NztzOjc6InVzZXJfaWQiO3M6NjoiMzAwNTk1IjtzOjQ6Im5hbWUiO3M6NDoiVGVzdCI7czo1OiJlbWFpbCI7czoxNDoidGVzdEBnbWFpbC5jb20iO3M6ODoidXNlcm5hbWUiO3M6MTA6InRlc3RpbmcxMjMiO3M6NToicGhvbmUiO3M6NjoiMTIzMjEzIjtzOjc6ImFkZHJlc3MiO3M6NjoiMjEzMjEzIjtzOjM6ImRvYiI7czoxMDoiMjAyNC0wMy0xNiI7czo1OiJpbWFnZSI7TjtzOjg6InBhc3N3b3JkIjtzOjU6IjEyMzQ1IjtzOjY6InN0YXR1cyI7czo2OiJBY3RpdmUiO3M6MTU6InNlY3JldF9xdWVzdGlvbiI7czoyOiJhYSI7czoxMzoic2VjcmV0X2Fuc3dlciI7czoyOiJhYSI7czoxMzoiYXV0b193aXRoZHJhdyI7czoxOiIxIjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtzOjI6Ik5vIjtzOjEyOiJtYXhfd2l0aGRyYXciO3M6NzoiMjExMzIxMyI7czoxMjoiZGVtb19hY2NvdW50IjtOO3M6OToiYmxhY2tsaXN0IjtOO3M6MTA6ImFkbWluX25vdGUiO3M6MTI6ImFzZGZhc2Rhc2RzYSI7czo2OiJleHRyYTEiO047czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNC0wMy0yMCAxOTowODo0NSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNC0wMy0yMCAxOTowODo0NSI7czo3OiJiYWxhbmNlIjtpOjA7czo2OiJmdW5kZWQiO2k6MDtzOjc6IndpdGhyYXciO2k6MDtzOjEwOiJjb21taXNzaW9uIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6MDtzOjExOiJyZWZlcnJhbF9pZCI7czowOiIiO31zOjExOiIAKgBvcmlnaW5hbCI7YToyOTp7czoyOiJpZCI7aTo3O3M6NzoidXNlcl9pZCI7czo2OiIzMDA1OTUiO3M6NDoibmFtZSI7czo0OiJUZXN0IjtzOjU6ImVtYWlsIjtzOjE0OiJ0ZXN0QGdtYWlsLmNvbSI7czo4OiJ1c2VybmFtZSI7czoxMDoidGVzdGluZzEyMyI7czo1OiJwaG9uZSI7czo2OiIxMjMyMTMiO3M6NzoiYWRkcmVzcyI7czo2OiIyMTMyMTMiO3M6MzoiZG9iIjtzOjEwOiIyMDI0LTAzLTE2IjtzOjU6ImltYWdlIjtOO3M6ODoicGFzc3dvcmQiO3M6NToiMTIzNDUiO3M6Njoic3RhdHVzIjtzOjY6IkFjdGl2ZSI7czoxNToic2VjcmV0X3F1ZXN0aW9uIjtzOjI6ImFhIjtzOjEzOiJzZWNyZXRfYW5zd2VyIjtzOjI6ImFhIjtzOjEzOiJhdXRvX3dpdGhkcmF3IjtzOjE6IjEiO3M6MTY6InBheV9lYXJuaW5nX2F1dG8iO3M6MjoiTm8iO3M6MTI6Im1heF93aXRoZHJhdyI7czo3OiIyMTEzMjEzIjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7czoxMjoiYXNkZmFzZGFzZHNhIjtzOjY6ImV4dHJhMSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTAzLTIwIDE5OjA4OjQ1IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTAzLTIwIDE5OjA4OjQ1IjtzOjc6ImJhbGFuY2UiO2k6MDtzOjY6ImZ1bmRlZCI7aTowO3M6Nzoid2l0aHJhdyI7aTowO3M6MTA6ImNvbW1pc3Npb24iO2k6MDtzOjY6ImFzc2V0cyI7aTowO3M6NzoiRWFybmluZyI7aTowO3M6MTE6InJlZmVycmFsX2lkIjtzOjA6IiI7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6MDp7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX19', 1712346807),
('snzgoACUX9lUKsgiVhDiUmv6DiqSndc0B4lELiQJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZzhiUHIydHhtZEJIYzBQNUpoNFNSMklZVWFtU3F2d2VXaDByVmJkMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXBvc2l0ZV9mdW5kcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6Njoic191c2VyIjtPOjE1OiJBcHBcTW9kZWxzXFVzZXIiOjMwOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjU6InVzZXJzIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6MzA6e3M6MjoiaWQiO2k6NztzOjc6InVzZXJfaWQiO3M6NjoiMzAwNTk1IjtzOjQ6Im5hbWUiO3M6NDoiVGVzdCI7czo1OiJlbWFpbCI7czoxNDoidGVzdEBnbWFpbC5jb20iO3M6ODoidXNlcm5hbWUiO3M6MTA6InRlc3RpbmcxMjMiO3M6NToicGhvbmUiO3M6NjoiMTIzMjEzIjtzOjc6ImFkZHJlc3MiO3M6NjoiMjEzMjEzIjtzOjM6ImRvYiI7czoxMDoiMjAyNC0wMy0xNiI7czo1OiJpbWFnZSI7czozOToidXBsb2FkL3VzZXJzL3VzZXJfcGljXzY2MDk5YTJjYjUwMDkucG5nIjtzOjg6InBhc3N3b3JkIjtzOjU6IjEyMzQ1IjtzOjY6InN0YXR1cyI7czo2OiJBY3RpdmUiO3M6MTU6InNlY3JldF9xdWVzdGlvbiI7czoyOiJhYSI7czoxMzoic2VjcmV0X2Fuc3dlciI7czoyOiJhYSI7czoxMzoiYXV0b193aXRoZHJhdyI7czoxOiIxIjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtzOjI6Ik5vIjtzOjEyOiJtYXhfd2l0aGRyYXciO3M6NzoiMjExMzIxMyI7czoxMjoiZGVtb19hY2NvdW50IjtOO3M6OToiYmxhY2tsaXN0IjtOO3M6MTA6ImFkbWluX25vdGUiO3M6MTI6ImFzZGZhc2Rhc2RzYSI7czo2OiJleHRyYTEiO047czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNC0wMy0yMCAxOTowODo0NSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNC0wMy0yMCAxOTowODo0NSI7czo3OiJiYWxhbmNlIjtpOjA7czo2OiJmdW5kZWQiO2k6MDtzOjc6IndpdGhyYXciO2k6MDtzOjEwOiJjb21taXNzaW9uIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6MDtzOjExOiJyZWZlcnJhbF9pZCI7czowOiIiO3M6MTQ6InRvdGFsX2RlcG9zaXRlIjtzOjE6IjAiO31zOjExOiIAKgBvcmlnaW5hbCI7YTozMDp7czoyOiJpZCI7aTo3O3M6NzoidXNlcl9pZCI7czo2OiIzMDA1OTUiO3M6NDoibmFtZSI7czo0OiJUZXN0IjtzOjU6ImVtYWlsIjtzOjE0OiJ0ZXN0QGdtYWlsLmNvbSI7czo4OiJ1c2VybmFtZSI7czoxMDoidGVzdGluZzEyMyI7czo1OiJwaG9uZSI7czo2OiIxMjMyMTMiO3M6NzoiYWRkcmVzcyI7czo2OiIyMTMyMTMiO3M6MzoiZG9iIjtzOjEwOiIyMDI0LTAzLTE2IjtzOjU6ImltYWdlIjtzOjM5OiJ1cGxvYWQvdXNlcnMvdXNlcl9waWNfNjYwOTlhMmNiNTAwOS5wbmciO3M6ODoicGFzc3dvcmQiO3M6NToiMTIzNDUiO3M6Njoic3RhdHVzIjtzOjY6IkFjdGl2ZSI7czoxNToic2VjcmV0X3F1ZXN0aW9uIjtzOjI6ImFhIjtzOjEzOiJzZWNyZXRfYW5zd2VyIjtzOjI6ImFhIjtzOjEzOiJhdXRvX3dpdGhkcmF3IjtzOjE6IjEiO3M6MTY6InBheV9lYXJuaW5nX2F1dG8iO3M6MjoiTm8iO3M6MTI6Im1heF93aXRoZHJhdyI7czo3OiIyMTEzMjEzIjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7czoxMjoiYXNkZmFzZGFzZHNhIjtzOjY6ImV4dHJhMSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTAzLTIwIDE5OjA4OjQ1IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTAzLTIwIDE5OjA4OjQ1IjtzOjc6ImJhbGFuY2UiO2k6MDtzOjY6ImZ1bmRlZCI7aTowO3M6Nzoid2l0aHJhdyI7aTowO3M6MTA6ImNvbW1pc3Npb24iO2k6MDtzOjY6ImFzc2V0cyI7aTowO3M6NzoiRWFybmluZyI7aTowO3M6MTE6InJlZmVycmFsX2lkIjtzOjA6IiI7czoxNDoidG90YWxfZGVwb3NpdGUiO3M6MToiMCI7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6MDp7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX19', 1712349658);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `secret_question` varchar(255) DEFAULT NULL,
  `secret_answer` varchar(255) DEFAULT NULL,
  `auto_withdraw` varchar(255) DEFAULT NULL,
  `pay_earning_auto` varchar(255) DEFAULT NULL,
  `max_withdraw` varchar(255) DEFAULT NULL,
  `demo_account` varchar(255) DEFAULT NULL,
  `blacklist` varchar(255) DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `extra1` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balance` int(100) DEFAULT 0,
  `funded` int(100) DEFAULT 0,
  `withraw` int(100) DEFAULT 0,
  `commission` int(100) DEFAULT 0,
  `assets` int(100) DEFAULT 0,
  `Earning` int(100) DEFAULT 0,
  `referral_id` varchar(20) DEFAULT NULL,
  `total_deposite` varchar(120) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `username`, `phone`, `address`, `dob`, `image`, `password`, `status`, `secret_question`, `secret_answer`, `auto_withdraw`, `pay_earning_auto`, `max_withdraw`, `demo_account`, `blacklist`, `admin_note`, `extra1`, `created_at`, `updated_at`, `balance`, `funded`, `withraw`, `commission`, `assets`, `Earning`, `referral_id`, `total_deposite`) VALUES
(7, '300595', 'Test', 'test@gmail.com', 'testing123', '123213', '213213', '2024-03-16', 'upload/users/user_pic_66099a2cb5009.png', '12345', 'Active', 'aa', 'aa', '1', 'No', '2113213', NULL, NULL, 'asdfasdasdsa', NULL, '2024-03-20 13:38:45', '2024-03-20 13:38:45', 0, 0, 0, 0, 0, 0, '', '0'),
(8, '166570', 'Testing123', 'testing@gmail.com', 'testing123', '123213213123', 'testing', '2024-03-20', NULL, '12345', 'Active', 'aa', 'aa', '1', 'No', '10000', NULL, NULL, 'welcome, test', NULL, '2024-03-20 14:30:25', '2024-03-20 14:30:25', 0, 0, 0, 0, 0, 0, '', '0'),
(9, '319959', 'sdsad', 'wdfafsa@gmail.com', 'asdsad', 'assadsad', 'sadsadsad', '2024-03-18', NULL, '12345', 'Active', 'aa', 'aa', '1', 'No', '213213', NULL, NULL, 'asdsadasd', NULL, '2024-03-31 10:28:19', '2024-03-31 10:28:19', 0, 0, 0, 0, 0, 0, '', '0'),
(10, '862201', 'TESTING', 'sadasd@gmail.com', 'asdsd', '123213', 'asdsadsad', '2024-03-27', 'upload/users/user_pic_66099a2cb5009.png', '12345', 'Active', 'aaaa', NULL, '0', 'No', '213213', NULL, NULL, 'asdsadasdasd', NULL, '2024-03-31 10:33:45', '2024-03-31 12:22:35', 1524200, 0, 0, 0, 0, 0, '', '0'),
(11, '639730', 'asdsad', 'asdsad@gmail.com', NULL, '123213', NULL, NULL, 'upload/users/user_pic_6610180e2559a.jpg', '12345', 'Disabled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 09:56:06', '2024-04-05 09:56:06', 0, 0, 0, 0, 0, 0, NULL, '0');

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
