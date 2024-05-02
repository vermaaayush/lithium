-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 10:29 AM
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
-- Table structure for table `access_control`
--

CREATE TABLE `access_control` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `m_instant_payment` varchar(255) NOT NULL,
  `m_deposite` varchar(255) DEFAULT NULL,
  `m_transfer` varchar(255) DEFAULT NULL,
  `extra1` varchar(255) DEFAULT NULL,
  `extra2` varchar(255) DEFAULT NULL,
  `extra3` varchar(255) DEFAULT NULL,
  `extra4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `m_email`, `m_instant_payment`, `m_deposite`, `m_transfer`, `extra1`, `extra2`, `extra3`, `extra4`, `created_at`, `updated_at`) VALUES
(1, '0', '1', '1', '1', '1', '1', '0', '0', '2024-04-24 16:16:17', '2024-04-27 16:22:31');

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
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `licence_key` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `url`, `phone`, `address`, `email`, `licence_key`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'asdsad', 'asdsad', 'asdasd', 'asdasd', 'sadas@gmail.com', '123213213', 'upload/logo/company_logo662b7b756cde1.png', 'upload/favicon/favicon662b7b756ef25.png', '2024-04-08 13:24:41', '2024-04-26 04:31:25');

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
  `img` varchar(255) DEFAULT NULL,
  `notes` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposite`
--

INSERT INTO `deposite` (`id`, `user_id`, `name`, `amount`, `pay_mode`, `description`, `transaction_id`, `status`, `bank_name`, `acc_number`, `img`, `notes`, `created_at`, `updated_at`) VALUES
(24, '671123', 'test', '20000', 'Bank Wire', NULL, 'BW17135582411637', '1', 'bank of usa', '1122334455', 'upload/bank_wire/img6622d2f3a145c.png', '', '2024-04-19 14:54:01', '2024-04-19 14:54:39'),
(25, '823119', 'John King', '1200', 'Bank Wire', NULL, 'BW17136862555472', '1', 'TEST', '12321321321', NULL, '', '2024-04-21 02:27:35', '2024-04-27 17:23:29'),
(26, '823119', 'John King', '1200', 'Bank Wire', NULL, 'BW17136864507074', '1', 'TEST', '12321321321', 'upload/bank_wire/img6624c7c1461c9.jpeg', '', '2024-04-21 02:30:50', '2024-04-21 02:33:17'),
(27, '871985', 'Avi', 'dsad', 'Bank Wire', NULL, 'dsad', '1', 'assasd', 'sad', 'upload/bank_wire/depo_proof662d7ea004fc9.png', 'sadas', '2024-04-27 17:09:28', '2024-04-27 17:23:26'),
(28, '871985', 'Avi', '2312', 'Bank Wire', NULL, 'asdasd', '1', 'adadasd', 'sasasd', 'upload/bank_wire/depo_proof662d82160b3a3.png', 'sasdasd', '2024-04-27 17:24:14', '2024-04-27 17:24:21');

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
  `end_amount` int(100) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `investment_id`, `name`, `plan_id`, `user_id`, `amount`, `end_amount`, `start_date`, `end_date`, `created_at`, `updated_at`, `status`) VALUES
(68, '531703', 'test', '861008', '671123', '20000', NULL, '2024-04-19 20:25:29', '2024-05-10 20:25:29', '2024-04-19 14:55:29', '2024-04-19 14:57:48', 1),
(69, '956997', 'test', '861008', '671123', '20000', NULL, '2024-04-19 20:29:03', '2024-05-10 20:29:03', '2024-04-19 14:59:03', '2024-04-19 14:59:03', 0),
(70, '182320', 'John King', '861008', '823119', '20000', NULL, '2024-04-21 08:03:44', '2024-05-12 08:03:44', '2024-04-21 02:33:44', '2024-04-21 02:33:44', 0),
(71, '635335', 'asdasd', '337694', '609355', '20000', NULL, NULL, NULL, '2024-04-24 12:48:52', '2024-04-24 12:48:52', 0),
(72, '950721', 'Avi', '861008', '871985', '50000', NULL, '2024-04-28 07:45:30', '2024-05-19 07:45:30', '2024-04-28 02:15:30', '2024-04-28 02:15:30', 0),
(73, '757250', 'Avi', '861008', '871985', '200000', NULL, '2024-04-28 07:58:02', '2024-05-19 07:58:02', '2024-04-28 02:28:02', '2024-04-28 02:28:02', 0),
(74, '135021', 'Avi', '861008', '871985', '200000', NULL, '2024-04-28 07:58:30', '2024-05-19 07:58:30', '2024-04-28 02:28:30', '2024-04-28 02:28:30', 0),
(75, '414980', 'Avi', '861008', '871985', '200000', NULL, '2024-04-28 07:59:00', '2024-05-19 07:59:00', '2024-04-28 02:29:00', '2024-04-28 02:29:00', 0),
(76, '549357', 'Avi', '861008', '871985', '200000', NULL, '2024-04-28 07:59:13', '2024-05-19 07:59:13', '2024-04-28 02:29:13', '2024-04-28 02:29:13', 0),
(77, '375524', 'Avi', '861008', '871985', '200000', NULL, '2024-04-28 07:59:48', '2024-05-19 07:59:48', '2024-04-28 02:29:48', '2024-04-28 02:29:48', 0),
(78, '519809', 'Avi', '861008', '871985', '200000', 229067, '2024-04-28 08:00:13', '2024-05-19 08:00:13', '2024-04-28 02:30:13', '2024-04-28 16:24:09', 1),
(79, '704006', 'Avi', '861008', '871985', '200000', 198667, '2024-04-28 08:00:44', '2024-05-19 08:00:44', '2024-04-28 02:30:44', '2024-04-28 16:17:50', 1),
(80, '713134', 'Avi', '861008', '871985', '200000', 201067, '2024-04-28 08:00:54', '2024-05-19 08:00:54', '2024-04-28 02:30:54', '2024-04-28 10:11:15', 1),
(81, '482048', 'Avi', '861008', '871985', '2032421', 2235663, '2024-04-28 08:02:15', '2024-05-19 08:02:15', '2024-04-28 02:32:15', '2024-04-28 10:09:30', 1),
(82, '983191', 'Avi', '861008', '871985', '20000', 24267, '2024-04-28 08:03:09', '2024-05-19 08:03:09', '2024-04-28 02:33:09', '2024-04-28 09:48:37', 1);

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
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(100) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nationality` varchar(70) NOT NULL,
  `id_type` varchar(70) NOT NULL,
  `id_no` varchar(70) DEFAULT NULL,
  `adrs_nationality` varchar(100) DEFAULT NULL,
  `adrs_country` varchar(80) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `code` varchar(80) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `state` varchar(80) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `user_id`, `name`, `nationality`, `id_type`, `id_no`, `adrs_nationality`, `adrs_country`, `address`, `code`, `city`, `state`, `updated_at`, `created_at`) VALUES
(3, '871985', 'test', 'asdasdsad', 'Driving License', '2213213213', 'test', 'Albania', 'asdasd', 'asdasd', 'asdasdsad', 'asdasdd', '2024-04-27', '2024-04-27');

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
(14, '2024_04_16_174939_create_stocks', 12),
(15, '2024_04_18_210156_create__withrawals', 13),
(16, '2024_04_18_210445_create_withrawals', 14),
(17, '2024_04_24_131113_create_configs', 15),
(18, '2024_04_24_155649_create_access_control', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `updated_at`, `created_at`) VALUES
(35, '871985', 'dscasdasdsad', '2024-04-28 00:48:31', '2024-04-28 00:48:31'),
(36, '871985', 'dscasdasdsad', '2024-04-28 00:48:37', '2024-04-28 00:48:37'),
(37, '871985', 'ssssssssssssss', '2024-04-28 00:49:21', '2024-04-28 00:49:21');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `dlt_status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `name`, `status`, `minimum_amount`, `period`, `duration`, `roi`, `risk`, `description`, `compounding`, `compound_perc`, `principal_release`, `release_fee`, `total_invested`, `image`, `no_of_users`, `created_at`, `updated_at`, `dlt_status`) VALUES
(10, '337694', 'asdsad', 'Active', '21213213', 'Daily', '12213', '1', '1.99', 'asddasdasdasd', 'Disabled', NULL, 'Suspended', '1231', '20000', 'upload/plans/plan_image_6622acd139094.png', 1, '2024-04-19 12:11:37', '2024-04-28 02:47:27', 1),
(11, '861008', 'TESTING #!@@#@$@#$@', 'Active', '20000', 'Daily', '21', '40', '20', 'Testing 1234 tewrwe1212', 'Disabled', 20, 'Enabled', '2', '3762421', 'upload/plans/plan_image_6622d200b5ecb.png', 14, '2024-04-19 14:50:16', '2024-04-28 09:48:12', 0),
(12, '129149', 'Alpha asklcjklb akldmsakf AS', 'Active', '20000', 'Daily', '20', '30', '20', 'lkasnkld as,dasfasd asf asd as fsdf as dasf', 'Disabled', 2, 'Disabled', '20', '200000', 'upload/plans/plan_image_662f69e48922b.png', 0, '2024-04-29 04:02:29', '2024-04-29 04:05:32', 0);

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
('tINtLiyADD66hWkJ7ozSbR04XKrSrX7CA8WTpP70', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOWlhVFVDZkV5czk3a2dpS2NsZ2xoeTBhWmlMSFM2V1ZjdDNHcTNFbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJzX3VzZXIiO086MTU6IkFwcFxNb2RlbHNcVXNlciI6MzA6e3M6MTM6IgAqAGNvbm5lY3Rpb24iO3M6NToibXlzcWwiO3M6ODoiACoAdGFibGUiO3M6NToidXNlcnMiO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YTozMzp7czoyOiJpZCI7aToyNTtzOjc6InVzZXJfaWQiO3M6NjoiODcxOTg1IjtzOjM6Imt5YyI7aTowO3M6NDoibmFtZSI7czozOiJBdmkiO3M6NToiZW1haWwiO3M6MjQ6ImFheXVzaHZlcm1hMjAwQGdtYWlsLmNvbSI7czo1OiJwaG9uZSI7czo5OiIxMmUyMWUyMWUiO3M6MzoiZG9iIjtzOjEwOiIyMDI0LTA0LTEyIjtzOjc6ImNvdW50cnkiO3M6OToiQXVzdHJhbGlhIjtzOjEwOiJpbWFnZV9kYXRhIjtzOjM0OiJ1cGxvYWQvc2VsZmllL0lENjYyZDU0YTE4NjNlYi5qcGVnIjtzOjg6ImlkX3Byb29mIjtzOjQxOiJ1cGxvYWQvaWRfaW1hZ2UvaWRfaW1hZ2U2NjJkNTRhMTg2ODRmLnBuZyI7czoxMzoiYWRkcmVzc19wcm9vZiI7czo1MToidXBsb2FkL2FkZHJlc3NfcHJvb2YvYWRkcmVzc19wcm9vZjY2MmQ1ODAxZGVkNDYucG5nIjtzOjg6InBhc3N3b3JkIjtzOjU6IjEyMzQ1IjtzOjY6InN0YXR1cyI7czoxMjoibm90X2FwcHJvdmVkIjtzOjEzOiJhdXRvX3dpdGhkcmF3IjtOO3M6MTY6InBheV9lYXJuaW5nX2F1dG8iO047czoxMjoibWF4X3dpdGhkcmF3IjtOO3M6MTI6ImRlbW9fYWNjb3VudCI7TjtzOjk6ImJsYWNrbGlzdCI7TjtzOjEwOiJhZG1pbl9ub3RlIjtOO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjQtMDQtMjcgMTc6NDg6NDEiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjQtMDQtMjggMjE6NTQ6MDkiO3M6NzoiYmFsYW5jZSI7aToyODk5NjM3NztzOjY6ImZ1bmRlZCI7aTozNzAyNDIxO3M6Nzoid2l0aHJhdyI7aToyMDAwMDtzOjg6ImRlcG9zaXRlIjtpOjIzMTIzMTIzO3M6MTA6ImNvbW1pc3Npb24iO2k6MDtzOjY6ImFzc2V0cyI7aTowO3M6NzoiRWFybmluZyI7aTo4NDczNjk7czoxMToicmVmZXJyYWxfaWQiO047czoxNDoidG90YWxfZGVwb3NpdGUiO3M6MToiMCI7czo5OiJpZF9zdGF0dXMiO2k6MTtzOjEwOiJhZGRfc3RhdHVzIjtpOjE7czoxMDoiZW1haWxfYXV0aCI7aTowO31zOjExOiIAKgBvcmlnaW5hbCI7YTozMzp7czoyOiJpZCI7aToyNTtzOjc6InVzZXJfaWQiO3M6NjoiODcxOTg1IjtzOjM6Imt5YyI7aTowO3M6NDoibmFtZSI7czozOiJBdmkiO3M6NToiZW1haWwiO3M6MjQ6ImFheXVzaHZlcm1hMjAwQGdtYWlsLmNvbSI7czo1OiJwaG9uZSI7czo5OiIxMmUyMWUyMWUiO3M6MzoiZG9iIjtzOjEwOiIyMDI0LTA0LTEyIjtzOjc6ImNvdW50cnkiO3M6OToiQXVzdHJhbGlhIjtzOjEwOiJpbWFnZV9kYXRhIjtzOjM0OiJ1cGxvYWQvc2VsZmllL0lENjYyZDU0YTE4NjNlYi5qcGVnIjtzOjg6ImlkX3Byb29mIjtzOjQxOiJ1cGxvYWQvaWRfaW1hZ2UvaWRfaW1hZ2U2NjJkNTRhMTg2ODRmLnBuZyI7czoxMzoiYWRkcmVzc19wcm9vZiI7czo1MToidXBsb2FkL2FkZHJlc3NfcHJvb2YvYWRkcmVzc19wcm9vZjY2MmQ1ODAxZGVkNDYucG5nIjtzOjg6InBhc3N3b3JkIjtzOjU6IjEyMzQ1IjtzOjY6InN0YXR1cyI7czoxMjoibm90X2FwcHJvdmVkIjtzOjEzOiJhdXRvX3dpdGhkcmF3IjtOO3M6MTY6InBheV9lYXJuaW5nX2F1dG8iO047czoxMjoibWF4X3dpdGhkcmF3IjtOO3M6MTI6ImRlbW9fYWNjb3VudCI7TjtzOjk6ImJsYWNrbGlzdCI7TjtzOjEwOiJhZG1pbl9ub3RlIjtOO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjQtMDQtMjcgMTc6NDg6NDEiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjQtMDQtMjggMjE6NTQ6MDkiO3M6NzoiYmFsYW5jZSI7aToyODk5NjM3NztzOjY6ImZ1bmRlZCI7aTozNzAyNDIxO3M6Nzoid2l0aHJhdyI7aToyMDAwMDtzOjg6ImRlcG9zaXRlIjtpOjIzMTIzMTIzO3M6MTA6ImNvbW1pc3Npb24iO2k6MDtzOjY6ImFzc2V0cyI7aTowO3M6NzoiRWFybmluZyI7aTo4NDczNjk7czoxMToicmVmZXJyYWxfaWQiO047czoxNDoidG90YWxfZGVwb3NpdGUiO3M6MToiMCI7czo5OiJpZF9zdGF0dXMiO2k6MTtzOjEwOiJhZGRfc3RhdHVzIjtpOjE7czoxMDoiZW1haWxfYXV0aCI7aTowO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjA6e31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjEzOiJ1c2VzVW5pcXVlSWRzIjtiOjA7czo5OiIAKgBoaWRkZW4iO2E6MDp7fXM6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTE6IgAqAGZpbGxhYmxlIjthOjA6e31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO319fQ==', 1714593684),
('V0f6wVRmHdKhAKTf5r3bwxz7ZTfYQdg43y5D9Z3o', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTBlMk5jbTliNFduWWZzdlF6cUM1VEdBVmpZNmdIZmRzQ3ZnQXc0ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1714590263);

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
(3, '337694', '100', '50', '150', '0', NULL, '2024-04-19 12:11:37', '2024-04-28 02:47:27'),
(4, '861008', '150', '120', '200', '1', NULL, '2024-04-19 14:50:16', '2024-04-28 03:18:26'),
(5, '129149', '200', '190', '300', '1', NULL, '2024-04-29 04:02:29', '2024-04-29 04:02:29');

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
(139, '671123', 'Fund Deposite', 'test', '20000', NULL, 'Credit', '2024-04-19 14:54:39', '2024-04-19 14:54:39'),
(140, '671123', 'Investment', 'TESTING #!@@#@$@#$@', '20000', NULL, 'debit', '2024-04-19 14:55:29', '2024-04-19 14:55:29'),
(141, '671123', 'Profit In Investment', 'test', '11200', NULL, 'credit', '2024-04-19 14:57:48', '2024-04-19 14:57:48'),
(142, '671123', 'Investment', 'TESTING #!@@#@$@#$@', '20000', NULL, 'debit', '2024-04-19 14:59:03', '2024-04-19 14:59:03'),
(143, '823119', 'Fund Deposite', 'John King', '1200', NULL, 'Credit', '2024-04-21 02:33:17', '2024-04-21 02:33:17'),
(144, '823119', 'Investment', 'TESTING #!@@#@$@#$@', '20000', NULL, 'debit', '2024-04-21 02:33:44', '2024-04-21 02:33:44'),
(145, '671123', 'Fund Withdrawal', 'test', '10000', NULL, 'Debit', '2024-04-24 11:28:53', '2024-04-24 11:28:53'),
(146, '609355', 'Investment', 'asdsad', '20000', NULL, 'debit', '2024-04-24 12:48:52', '2024-04-24 12:48:52'),
(147, '425016', 'Fund Transfer', 'test', '12000', NULL, 'debit', '2024-04-26 03:40:55', '2024-04-26 03:40:55'),
(148, '608774', 'Fund Transfer', 'avi', '12000', NULL, 'credit', '2024-04-26 03:40:55', '2024-04-26 03:40:55'),
(149, '425016', 'Fund Transfer', 'test', '12000', NULL, 'debit', '2024-04-26 03:41:06', '2024-04-26 03:41:06'),
(150, '608774', 'Fund Transfer', 'avi', '12000', NULL, 'credit', '2024-04-26 03:41:06', '2024-04-26 03:41:06'),
(151, '425016', 'Fund Transfer', 'test', '12000', NULL, 'debit', '2024-04-26 03:41:12', '2024-04-26 03:41:12'),
(152, '608774', 'Fund Transfer', 'avi', '12000', NULL, 'credit', '2024-04-26 03:41:12', '2024-04-26 03:41:12'),
(153, '425016', 'Fund Transfer', 'test', '12000', NULL, 'debit', '2024-04-26 03:41:28', '2024-04-26 03:41:28'),
(154, '608774', 'Fund Transfer', 'avi', '12000', NULL, 'credit', '2024-04-26 03:41:28', '2024-04-26 03:41:28'),
(155, '871985', 'Fund Deposite', 'Avi', '12312', NULL, 'Credit', '2024-04-27 17:23:26', '2024-04-27 17:23:26'),
(156, '823119', 'Fund Deposite', 'John King', '1200', NULL, 'Credit', '2024-04-27 17:23:29', '2024-04-27 17:23:29'),
(157, '871985', 'Fund Deposite', 'Avi', '23123123', NULL, 'Credit', '2024-04-27 17:24:21', '2024-04-27 17:24:21'),
(158, '871985', 'Fund Withdrawal', 'Avi', '20000', NULL, 'Debit', '2024-04-27 17:25:30', '2024-04-27 17:25:30'),
(159, '871985', 'Fund Transfer', 'test', '100', NULL, 'Debit', '2024-04-28 00:50:14', '2024-04-28 00:50:14'),
(160, '608774', 'Fund Transfer', 'Avi', '100', NULL, 'credit', '2024-04-28 00:50:14', '2024-04-28 00:50:14'),
(161, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '50000', NULL, 'Debit', '2024-04-28 02:15:30', '2024-04-28 02:15:30'),
(162, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '200000', NULL, 'Debit', '2024-04-28 02:28:03', '2024-04-28 02:28:03'),
(163, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '200000', NULL, 'Debit', '2024-04-28 02:28:30', '2024-04-28 02:28:30'),
(164, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '200000', NULL, 'Debit', '2024-04-28 02:29:00', '2024-04-28 02:29:00'),
(165, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '200000', NULL, 'Debit', '2024-04-28 02:29:14', '2024-04-28 02:29:14'),
(166, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '200000', NULL, 'Debit', '2024-04-28 02:29:48', '2024-04-28 02:29:48'),
(167, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '200000', NULL, 'Debit', '2024-04-28 02:30:13', '2024-04-28 02:30:13'),
(168, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '200000', NULL, 'Debit', '2024-04-28 02:30:44', '2024-04-28 02:30:44'),
(169, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '200000', NULL, 'Debit', '2024-04-28 02:30:54', '2024-04-28 02:30:54'),
(170, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '2032421', NULL, 'Debit', '2024-04-28 02:32:16', '2024-04-28 02:32:16'),
(171, '871985', 'Investment', 'TESTING #!@@#@$@#$@', '20000', NULL, 'Debit', '2024-04-28 02:33:09', '2024-04-28 02:33:09'),
(172, '871985', 'Profit In Investment', 'Avi', '4266.67', NULL, 'Credit', '2024-04-28 09:48:37', '2024-04-28 09:48:37'),
(173, '871985', 'Profit In Investment', 'Avi', '203242.1', NULL, 'Credit', '2024-04-28 10:07:05', '2024-04-28 10:07:05'),
(174, '871985', 'Profit In Investment', 'Avi', '203242.1', NULL, 'Credit', '2024-04-28 10:07:26', '2024-04-28 10:07:26'),
(175, '871985', 'Profit In Investment', 'Avi', '203242.1', NULL, 'Credit', '2024-04-28 10:07:56', '2024-04-28 10:07:56'),
(176, '871985', 'Profit In Investment', 'Avi', '203242.1', NULL, 'Credit', '2024-04-28 10:09:30', '2024-04-28 10:09:30'),
(177, '871985', 'Profit In Investment', 'Avi', '1066.67', NULL, 'Credit', '2024-04-28 10:11:15', '2024-04-28 10:11:15'),
(178, '871985', 'Loss In Investment', 'Avi', '1333.33', NULL, 'LOSS', '2024-04-28 16:17:50', '2024-04-28 16:17:50'),
(179, '871985', 'Profit In Investment', 'Avi', '29066.67', NULL, 'Credit', '2024-04-28 16:24:09', '2024-04-28 16:24:09');

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
(32, '425016', 'test', '608774', 'test@gmail.com', '12000', 'TX17141226551067', '1', '2024-04-26 03:40:55', '2024-04-26 03:40:55'),
(33, '425016', 'test', '608774', 'test@gmail.com', '12000', 'TX17141226666471', '1', '2024-04-26 03:41:06', '2024-04-26 03:41:06'),
(34, '425016', 'test', '608774', 'test@gmail.com', '12000', 'TX17141226727138', '1', '2024-04-26 03:41:12', '2024-04-26 03:41:12'),
(35, '425016', 'test', '608774', 'test@gmail.com', '12000', 'TX17141226883718', '1', '2024-04-26 03:41:28', '2024-04-26 03:41:28'),
(36, '871985', 'test', '608774', 'test@gmail.com', '100', 'TX17142852142018', '1', '2024-04-28 00:50:14', '2024-04-28 00:50:14');

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
  `phone` varchar(155) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
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
  `balance` int(255) NOT NULL DEFAULT 0,
  `funded` int(255) DEFAULT 0,
  `withraw` int(255) DEFAULT 0,
  `deposite` int(255) NOT NULL DEFAULT 0,
  `commission` int(255) DEFAULT 0,
  `assets` int(255) DEFAULT 0,
  `Earning` int(255) NOT NULL DEFAULT 0,
  `referral_id` varchar(20) DEFAULT NULL,
  `total_deposite` varchar(120) DEFAULT '0',
  `id_status` int(10) NOT NULL DEFAULT 0,
  `add_status` int(10) NOT NULL DEFAULT 0,
  `email_auth` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `kyc`, `name`, `email`, `phone`, `dob`, `country`, `image_data`, `id_proof`, `address_proof`, `password`, `status`, `auto_withdraw`, `pay_earning_auto`, `max_withdraw`, `demo_account`, `blacklist`, `admin_note`, `created_at`, `updated_at`, `balance`, `funded`, `withraw`, `deposite`, `commission`, `assets`, `Earning`, `referral_id`, `total_deposite`, `id_status`, `add_status`, `email_auth`) VALUES
(17, '823119', 0, 'John King', 'john@gmail.com', NULL, NULL, 'Bahamas', 'upload/selfie/ID6624c52f0bad9.jpeg', 'upload/id_image/id_image6624c52f0be47.jpeg', 'upload/address_proof/address_proof6624c5bfeb462.jpeg', '12345', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-21 02:17:53', '2024-04-27 17:23:29', 181200, 20000, 0, 2400, 0, 0, 0, NULL, '0', 2, 2, 0),
(18, '425016', 0, 'avi', 'avi@gmail.com', '21213123', '2024-05-03', '123213123', 'upload/users/user_pic_66293e09cd620.png', NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, 'ASDASDASDA', '2024-04-24 11:44:49', '2024-04-26 03:41:28', 120075123, 0, 0, 0, 0, 0, 0, NULL, '0', 2, 2, 2),
(19, '608774', 0, 'test', 'test@gmail.com', '123213', '2024-04-12', 'Albania', 'upload/users/user_pic_66293ea7e4c11.png', NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, 'ACADASD', '2024-04-24 11:47:27', '2024-04-28 00:50:14', 48100, 0, 0, 0, 0, 0, 0, NULL, '0', 0, 0, 0),
(20, '443218', 0, 'ASDSAD', 'ASDASD@GMAIL.COM', '23213', '2024-04-19', 'Bahamas', NULL, NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, 'asdsadasd', '2024-04-24 11:48:44', '2024-04-24 11:48:44', 0, 0, 0, 0, 0, 0, 0, NULL, '0', 1, 1, 0),
(21, '609355', 0, 'asdasd', 'asdasd@gmail.com', 'asdasdSAD', '2024-04-29', 'Antarctica', NULL, NULL, NULL, '12345', 'Suspended', NULL, NULL, NULL, NULL, NULL, '31213ASDSADAS', '2024-04-24 11:53:29', '2024-04-24 13:50:07', 0, 20000, 0, 0, 0, 0, 0, NULL, '0', 2, 2, 2),
(22, '992901', 0, '123', 'alpha@gmail.com', '21213', '2024-05-03', 'Azerbaijan', NULL, NULL, NULL, 'testing', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-27 10:05:43', '2024-04-27 10:05:43', 0, 0, 0, 0, 0, 0, 0, NULL, '0', 0, 0, 0),
(23, '692438', 0, 'sdasd', 'alpha1@gmail.com', '123213', '2024-05-09', 'Australia', NULL, NULL, NULL, '12345', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-27 10:07:03', '2024-04-27 10:07:03', 0, 0, 0, 0, 0, 0, 0, NULL, '0', 0, 0, 0),
(25, '871985', 0, 'Avi', 'aayushverma200@gmail.com', '12e21e21e', '2024-04-12', 'Australia', 'upload/selfie/ID662d54a1863eb.jpeg', 'upload/id_image/id_image662d54a18684f.png', 'upload/address_proof/address_proof662d5801ded46.png', '12345', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-27 12:18:41', '2024-04-28 16:24:09', 28996377, 3702421, 20000, 23123123, 0, 0, 847369, NULL, '0', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `withrawals`
--

CREATE TABLE `withrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `extra2` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withrawals`
--

INSERT INTO `withrawals` (`id`, `user_id`, `name`, `amount`, `extra`, `extra2`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(3, '671123', 'test', '10000', NULL, NULL, 'AD17139779245197', '1', '2024-04-24 11:28:44', '2024-04-24 11:28:53'),
(4, '871985', 'Avi', '20000', NULL, NULL, 'AD17142585241575', '1', '2024-04-27 17:25:24', '2024-04-27 17:25:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control`
--
ALTER TABLE `access_control`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `withrawals`
--
ALTER TABLE `withrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposite`
--
ALTER TABLE `deposite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `withrawals`
--
ALTER TABLE `withrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
