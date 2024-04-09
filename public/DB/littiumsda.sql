-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 10:28 PM
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
(10, '771764', 'testing', '20000', 'By Admin', NULL, 'TX17125993724806', '1', '2024-04-08 12:32:52', '2024-04-08 12:32:52'),
(11, '771764', 'testing', '50000', 'By Admin', NULL, 'TX17126820955339', '1', '2024-04-09 11:31:35', '2024-04-09 11:31:35');

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
(44, '774123', 'Test', '679593', '702896', '10000', '2024-04-09 18:48:24', '2024-04-29 18:48:24', '2024-04-09 13:18:24', '2024-04-09 13:18:24', 0);

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
  `compound_perc` int(100) NOT NULL DEFAULT 100,
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
(7, '679593', 'TESLA LITHIUM INVESTMENT PLAN: BY DEMO COMPANY', 'Active', '10000', 'Monthly', '20', '30', '10', 'TESLA LITHIUM INVESTMENT PLAN: BY DEMO COMPANY', 'Suspended', 100, 'Disabled', '100', '80024', 'upload/plans/plan_image_66157ff071807.png', 6, '2024-04-09 12:20:40', '2024-04-09 13:18:24');

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
('duZFMejJU30V2WHTtJc1n0WvnfelcaUTPYtnQIH6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaVJzUzU2cVhHTWZXcGZBU2dCSlZ4MnZ0OW9uOFJQbmpZUFFIMkZmSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ydW5faW52ZXN0X2NoZWNrZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6InNfdXNlciI7TzoxNToiQXBwXE1vZGVsc1xVc2VyIjozMDp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo1OiJ1c2VycyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjMxOntzOjI6ImlkIjtpOjE0O3M6NzoidXNlcl9pZCI7czo2OiI3MDI4OTYiO3M6Mzoia3ljIjtpOjA7czo0OiJuYW1lIjtzOjQ6IlRlc3QiO3M6NToiZW1haWwiO3M6MTQ6InRlc3RAZ21haWwuY29tIjtzOjc6ImNvdW50cnkiO3M6NzoiQW5kb3JyYSI7czoxMDoiaW1hZ2VfZGF0YSI7czozNDoidXBsb2FkL3NlbGZpZS9JRDY2MTU3Mjg1YWE5M2QuanBlZyI7czo4OiJpZF9wcm9vZiI7czo0MToidXBsb2FkL2lkX2ltYWdlL2lkX2ltYWdlNjYxNTcyODVhYWU2Yi5wbmciO3M6MTM6ImFkZHJlc3NfcHJvb2YiO3M6NTE6InVwbG9hZC9hZGRyZXNzX3Byb29mL2FkZHJlc3NfcHJvb2Y2NjE1NzI4ZGJiNTJkLnBuZyI7czo4OiJwYXNzd29yZCI7czo1OiIxMjM0NSI7czo2OiJzdGF0dXMiO3M6MTI6Im5vdF9hcHByb3ZlZCI7czoxMzoiYXV0b193aXRoZHJhdyI7TjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtOO3M6MTI6Im1heF93aXRoZHJhdyI7TjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA2IDEyOjQ4OjQxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA5IDE2OjUzOjMzIjtzOjc6ImJhbGFuY2UiO2k6OTQwMDA7czo2OiJmdW5kZWQiO2k6NjMxMjtzOjc6IndpdGhyYXciO2k6MDtzOjg6ImRlcG9zaXRlIjtpOjMwMDtzOjEwOiJjb21taXNzaW9uIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6MDtzOjExOiJyZWZlcnJhbF9pZCI7TjtzOjE0OiJ0b3RhbF9kZXBvc2l0ZSI7czoxOiIwIjtzOjk6ImlkX3N0YXR1cyI7aToxO3M6MTA6ImFkZF9zdGF0dXMiO2k6MTtzOjEwOiJlbWFpbF9hdXRoIjtpOjA7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjMxOntzOjI6ImlkIjtpOjE0O3M6NzoidXNlcl9pZCI7czo2OiI3MDI4OTYiO3M6Mzoia3ljIjtpOjA7czo0OiJuYW1lIjtzOjQ6IlRlc3QiO3M6NToiZW1haWwiO3M6MTQ6InRlc3RAZ21haWwuY29tIjtzOjc6ImNvdW50cnkiO3M6NzoiQW5kb3JyYSI7czoxMDoiaW1hZ2VfZGF0YSI7czozNDoidXBsb2FkL3NlbGZpZS9JRDY2MTU3Mjg1YWE5M2QuanBlZyI7czo4OiJpZF9wcm9vZiI7czo0MToidXBsb2FkL2lkX2ltYWdlL2lkX2ltYWdlNjYxNTcyODVhYWU2Yi5wbmciO3M6MTM6ImFkZHJlc3NfcHJvb2YiO3M6NTE6InVwbG9hZC9hZGRyZXNzX3Byb29mL2FkZHJlc3NfcHJvb2Y2NjE1NzI4ZGJiNTJkLnBuZyI7czo4OiJwYXNzd29yZCI7czo1OiIxMjM0NSI7czo2OiJzdGF0dXMiO3M6MTI6Im5vdF9hcHByb3ZlZCI7czoxMzoiYXV0b193aXRoZHJhdyI7TjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtOO3M6MTI6Im1heF93aXRoZHJhdyI7TjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA2IDEyOjQ4OjQxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTA5IDE2OjUzOjMzIjtzOjc6ImJhbGFuY2UiO2k6OTQwMDA7czo2OiJmdW5kZWQiO2k6NjMxMjtzOjc6IndpdGhyYXciO2k6MDtzOjg6ImRlcG9zaXRlIjtpOjMwMDtzOjEwOiJjb21taXNzaW9uIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6MDtzOjExOiJyZWZlcnJhbF9pZCI7TjtzOjE0OiJ0b3RhbF9kZXBvc2l0ZSI7czoxOiIwIjtzOjk6ImlkX3N0YXR1cyI7aToxO3M6MTA6ImFkZF9zdGF0dXMiO2k6MTtzOjEwOiJlbWFpbF9hdXRoIjtpOjA7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6MDp7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX19', 1712692050),
('Nft8R7DIGpmadEWkiCAJ4F921N4oIDoXvr14GBAL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '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', 1712693741);

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
(14, '702896', 0, 'Test', 'test@gmail.com', 'Andorra', 'upload/selfie/ID66157285aa93d.jpeg', 'upload/id_image/id_image66157285aae6b.png', 'upload/address_proof/address_proof6615728dbb52d.png', '12345', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:18:41', '2024-04-09 13:18:24', 13976, 86336, 0, 300, 0, 0, 0, NULL, '0', 2, 2, 0),
(15, '771764', 0, 'testing', 'avi@gmail.com', 'Australia', 'upload/selfie/ID661403d268141.jpeg', 'upload/id_image/id_image661403d2683b4.jpg', 'upload/address_proof/address_proof661403fec65a4.jpg', '12345', 'Active', '0', 'No', NULL, NULL, NULL, NULL, '2024-04-08 09:16:25', '2024-04-09 11:31:35', 57877, 12000, 0, 70000, 0, 0, 0, NULL, '0', 0, 0, 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
