-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 11:08 PM
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
-- Table structure for table `deposite`
--

CREATE TABLE `deposite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pay_mode` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposite`
--

INSERT INTO `deposite` (`id`, `user_id`, `name`, `amount`, `pay_mode`, `description`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(8, '702896', 'Test', '1200', 'Test', 'testing', 'TX17125931436504', '1', '2024-04-08 10:49:03', '2024-04-08 11:34:19'),
(9, '702896', 'Test', '100', 'By Admin', NULL, 'TX17125933245061', '1', '2024-04-08 10:52:04', '2024-04-08 10:52:04'),
(10, '771764', 'testing', '20000', 'By Admin', NULL, 'TX17125993724806', '1', '2024-04-08 12:32:52', '2024-04-08 12:32:52');

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
(23, '204504', 'testing', '657076', '15', '10000', NULL, NULL, '2024-04-08 12:58:56', '2024-04-08 12:58:56');

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
(9, '2024_04_07_200010_create_deposite_table', 7);

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
  `total_invested` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `extra2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `name`, `status`, `minimum_amount`, `period`, `duration`, `roi`, `risk`, `description`, `compounding`, `principal_release`, `release_fee`, `total_invested`, `image`, `extra2`, `created_at`, `updated_at`) VALUES
(5, '657076', 'TESTING', 'Active', '10000', 'Daily', '28', '28', '20', 'WDADSAD', 'Disabled', 'Disabled', '100', '10000', 'upload/plans/plan_image_660996780126b.png', NULL, '2024-03-31 10:15:23', '2024-04-08 12:58:56'),
(6, '152100', 'Lithium,,..', 'Active', '20000', 'Monthly', '30', '33', '18', 'Invest in Test Lithium Plan % and Earn 33% with us.', 'Disabled', 'Disabled', '50', '0', 'upload/plans/plan_image_6609a88b6b0da.jpg', NULL, '2024-03-31 12:45:38', '2024-03-31 12:46:43');

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
('b3o7ZnIsUsmWezM1eV45ynqH28745gUU6khrITFY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUHdkTmVXRVpxVWs5Q1hoQUJLYzBZYWl5bHJKOXVldlgwTmpMaDg1OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6InNfdXNlciI7TzoxNToiQXBwXE1vZGVsc1xVc2VyIjozMDp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo1OiJ1c2VycyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjMxOntzOjI6ImlkIjtpOjE0O3M6NzoidXNlcl9pZCI7czo2OiI3MDI4OTYiO3M6Mzoia3ljIjtpOjA7czo0OiJuYW1lIjtzOjQ6IlRlc3QiO3M6NToiZW1haWwiO3M6MTQ6InRlc3RAZ21haWwuY29tIjtzOjc6ImNvdW50cnkiO3M6NzoiQW5kb3JyYSI7czoxMDoiaW1hZ2VfZGF0YSI7czozMzoidXBsb2FkL3VzZXJzL0lENjYxMmZhMDExOTEwYy5qcGVnIjtzOjg6ImlkX3Byb29mIjtzOjM4OiJ1cGxvYWQvdXNlcnMvaWRfaW1hZ2U2NjEyZmEwMTU0NmE5LnBuZyI7czoxMzoiYWRkcmVzc19wcm9vZiI7czo0MzoidXBsb2FkL3VzZXJzL2FkZHJlc3NfcHJvb2Y2NjEyZmEwOTdmOWEzLnBuZyI7czo4OiJwYXNzd29yZCI7czo1OiIxMjM0NSI7czo2OiJzdGF0dXMiO3M6MTI6Im5vdF9hcHByb3ZlZCI7czoxMzoiYXV0b193aXRoZHJhdyI7TjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtOO3M6MTI6Im1heF93aXRoZHJhdyI7TjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA2IDEyOjQ4OjQxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA3IDE5OjU0OjQ5IjtzOjc6ImJhbGFuY2UiO2k6MDtzOjY6ImZ1bmRlZCI7aTowO3M6Nzoid2l0aHJhdyI7aTowO3M6ODoiZGVwb3NpdGUiO2k6MDtzOjEwOiJjb21taXNzaW9uIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6MDtzOjExOiJyZWZlcnJhbF9pZCI7TjtzOjE0OiJ0b3RhbF9kZXBvc2l0ZSI7czoxOiIwIjtzOjk6ImlkX3N0YXR1cyI7aToxO3M6MTA6ImFkZF9zdGF0dXMiO2k6MTtzOjEwOiJlbWFpbF9hdXRoIjtpOjA7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjMxOntzOjI6ImlkIjtpOjE0O3M6NzoidXNlcl9pZCI7czo2OiI3MDI4OTYiO3M6Mzoia3ljIjtpOjA7czo0OiJuYW1lIjtzOjQ6IlRlc3QiO3M6NToiZW1haWwiO3M6MTQ6InRlc3RAZ21haWwuY29tIjtzOjc6ImNvdW50cnkiO3M6NzoiQW5kb3JyYSI7czoxMDoiaW1hZ2VfZGF0YSI7czozMzoidXBsb2FkL3VzZXJzL0lENjYxMmZhMDExOTEwYy5qcGVnIjtzOjg6ImlkX3Byb29mIjtzOjM4OiJ1cGxvYWQvdXNlcnMvaWRfaW1hZ2U2NjEyZmEwMTU0NmE5LnBuZyI7czoxMzoiYWRkcmVzc19wcm9vZiI7czo0MzoidXBsb2FkL3VzZXJzL2FkZHJlc3NfcHJvb2Y2NjEyZmEwOTdmOWEzLnBuZyI7czo4OiJwYXNzd29yZCI7czo1OiIxMjM0NSI7czo2OiJzdGF0dXMiO3M6MTI6Im5vdF9hcHByb3ZlZCI7czoxMzoiYXV0b193aXRoZHJhdyI7TjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtOO3M6MTI6Im1heF93aXRoZHJhdyI7TjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA2IDEyOjQ4OjQxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA3IDE5OjU0OjQ5IjtzOjc6ImJhbGFuY2UiO2k6MDtzOjY6ImZ1bmRlZCI7aTowO3M6Nzoid2l0aHJhdyI7aTowO3M6ODoiZGVwb3NpdGUiO2k6MDtzOjEwOiJjb21taXNzaW9uIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6MDtzOjExOiJyZWZlcnJhbF9pZCI7TjtzOjE0OiJ0b3RhbF9kZXBvc2l0ZSI7czoxOiIwIjtzOjk6ImlkX3N0YXR1cyI7aToxO3M6MTA6ImFkZF9zdGF0dXMiO2k6MTtzOjEwOiJlbWFpbF9hdXRoIjtpOjA7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6MDp7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX19', 1712602620),
('NrQlGSMXAX3irzAvYxBKBR3HpOZ5z3qRPjBvTGLp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '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', 1712602598),
('pbXPpKJ4rGe1VUfkWWGr3wk4UPntJoh3ErzqJvjJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibUtOenh6M2NxNE9pZ0JFRlVYM1RuVXNXdWFzYjBRZFZOUUZiVXd2ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbGxfZGVwb3NpdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6InNfdXNlciI7TzoxNToiQXBwXE1vZGVsc1xVc2VyIjozMDp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo1OiJ1c2VycyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjMxOntzOjI6ImlkIjtpOjE0O3M6NzoidXNlcl9pZCI7czo2OiI3MDI4OTYiO3M6Mzoia3ljIjtpOjA7czo0OiJuYW1lIjtzOjQ6IlRlc3QiO3M6NToiZW1haWwiO3M6MTQ6InRlc3RAZ21haWwuY29tIjtzOjc6ImNvdW50cnkiO3M6NzoiQW5kb3JyYSI7czoxMDoiaW1hZ2VfZGF0YSI7czozMzoidXBsb2FkL3VzZXJzL0lENjYxMmZhMDExOTEwYy5qcGVnIjtzOjg6ImlkX3Byb29mIjtzOjM4OiJ1cGxvYWQvdXNlcnMvaWRfaW1hZ2U2NjEyZmEwMTU0NmE5LnBuZyI7czoxMzoiYWRkcmVzc19wcm9vZiI7czo0MzoidXBsb2FkL3VzZXJzL2FkZHJlc3NfcHJvb2Y2NjEyZmEwOTdmOWEzLnBuZyI7czo4OiJwYXNzd29yZCI7czo1OiIxMjM0NSI7czo2OiJzdGF0dXMiO3M6MTI6Im5vdF9hcHByb3ZlZCI7czoxMzoiYXV0b193aXRoZHJhdyI7TjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtOO3M6MTI6Im1heF93aXRoZHJhdyI7TjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA2IDEyOjQ4OjQxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA4IDE2OjIyOjA0IjtzOjc6ImJhbGFuY2UiO2k6MzAwO3M6NjoiZnVuZGVkIjtpOjA7czo3OiJ3aXRocmF3IjtpOjA7czo4OiJkZXBvc2l0ZSI7aTozMDA7czoxMDoiY29tbWlzc2lvbiI7aTowO3M6NjoiYXNzZXRzIjtpOjA7czo3OiJFYXJuaW5nIjtpOjA7czoxMToicmVmZXJyYWxfaWQiO047czoxNDoidG90YWxfZGVwb3NpdGUiO3M6MToiMCI7czo5OiJpZF9zdGF0dXMiO2k6MDtzOjEwOiJhZGRfc3RhdHVzIjtpOjA7czoxMDoiZW1haWxfYXV0aCI7aTowO31zOjExOiIAKgBvcmlnaW5hbCI7YTozMTp7czoyOiJpZCI7aToxNDtzOjc6InVzZXJfaWQiO3M6NjoiNzAyODk2IjtzOjM6Imt5YyI7aTowO3M6NDoibmFtZSI7czo0OiJUZXN0IjtzOjU6ImVtYWlsIjtzOjE0OiJ0ZXN0QGdtYWlsLmNvbSI7czo3OiJjb3VudHJ5IjtzOjc6IkFuZG9ycmEiO3M6MTA6ImltYWdlX2RhdGEiO3M6MzM6InVwbG9hZC91c2Vycy9JRDY2MTJmYTAxMTkxMGMuanBlZyI7czo4OiJpZF9wcm9vZiI7czozODoidXBsb2FkL3VzZXJzL2lkX2ltYWdlNjYxMmZhMDE1NDZhOS5wbmciO3M6MTM6ImFkZHJlc3NfcHJvb2YiO3M6NDM6InVwbG9hZC91c2Vycy9hZGRyZXNzX3Byb29mNjYxMmZhMDk3ZjlhMy5wbmciO3M6ODoicGFzc3dvcmQiO3M6NToiMTIzNDUiO3M6Njoic3RhdHVzIjtzOjEyOiJub3RfYXBwcm92ZWQiO3M6MTM6ImF1dG9fd2l0aGRyYXciO047czoxNjoicGF5X2Vhcm5pbmdfYXV0byI7TjtzOjEyOiJtYXhfd2l0aGRyYXciO047czoxMjoiZGVtb19hY2NvdW50IjtOO3M6OToiYmxhY2tsaXN0IjtOO3M6MTA6ImFkbWluX25vdGUiO047czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNC0wNC0wNiAxMjo0ODo0MSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNC0wNC0wOCAxNjoyMjowNCI7czo3OiJiYWxhbmNlIjtpOjMwMDtzOjY6ImZ1bmRlZCI7aTowO3M6Nzoid2l0aHJhdyI7aTowO3M6ODoiZGVwb3NpdGUiO2k6MzAwO3M6MTA6ImNvbW1pc3Npb24iO2k6MDtzOjY6ImFzc2V0cyI7aTowO3M6NzoiRWFybmluZyI7aTowO3M6MTE6InJlZmVycmFsX2lkIjtOO3M6MTQ6InRvdGFsX2RlcG9zaXRlIjtzOjE6IjAiO3M6OToiaWRfc3RhdHVzIjtpOjA7czoxMDoiYWRkX3N0YXR1cyI7aTowO3M6MTA6ImVtYWlsX2F1dGgiO2k6MDt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjA6e31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTowOnt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9fX0=', 1712610404);

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
  `balance` int(100) DEFAULT 0,
  `funded` int(100) DEFAULT 0,
  `withraw` int(100) DEFAULT 0,
  `deposite` int(150) NOT NULL DEFAULT 0,
  `commission` int(100) DEFAULT 0,
  `assets` int(100) DEFAULT 0,
  `Earning` int(100) DEFAULT 0,
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
(14, '702896', 0, 'Test', 'test@gmail.com', 'Andorra', 'upload/users/ID6612fa011910c.jpeg', 'upload/users/id_image6612fa01546a9.png', 'upload/users/address_proof6612fa097f9a3.png', '12345', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:18:41', '2024-04-08 10:52:04', 300, 0, 0, 300, 0, 0, 0, NULL, '0', 0, 0, 0),
(15, '771764', 0, 'testing', 'avi@gmail.com', 'Australia', 'upload/selfie/ID661403d268141.jpeg', 'upload/id_image/id_image661403d2683b4.jpg', 'upload/address_proof/address_proof661403fec65a4.jpg', '12345', 'Active', '0', 'No', NULL, NULL, NULL, NULL, '2024-04-08 09:16:25', '2024-04-08 12:58:56', 9877, 10000, 0, 20000, 0, 0, 0, NULL, '0', 0, 0, 0);

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
-- AUTO_INCREMENT for table `deposite`
--
ALTER TABLE `deposite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
