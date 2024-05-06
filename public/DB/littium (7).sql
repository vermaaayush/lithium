-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 11:27 PM
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
  `referral` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `m_email`, `m_instant_payment`, `m_deposite`, `m_transfer`, `extra1`, `extra2`, `extra3`, `extra4`, `referral`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', '1', '1', '0', '0', '1', '2024-04-24 16:16:17', '2024-05-06 08:09:46');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `reff_code_bonus` varchar(80) DEFAULT NULL,
  `reff_depo_earning` varchar(80) DEFAULT NULL,
  `reff_trade_earning` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `url`, `phone`, `address`, `email`, `licence_key`, `logo`, `favicon`, `created_at`, `updated_at`, `reff_code_bonus`, `reff_depo_earning`, `reff_trade_earning`) VALUES
(1, 'asdsad', 'asdsad', 'asdasd', 'asdasd', 'sadas@gmail.com', '123213213', 'upload/logo/company_logo662b7b756cde1.png', 'upload/favicon/favicon662b7b756ef25.png', '2024-04-08 13:24:41', '2024-05-06 07:53:42', '100', '5', '5');

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
  `notes` varchar(200) DEFAULT NULL,
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
(28, '871985', 'Avi', '2312', 'Bank Wire', NULL, 'asdasd', '1', 'adadasd', 'sasasd', 'upload/bank_wire/depo_proof662d82160b3a3.png', 'sasdasd', '2024-04-27 17:24:14', '2024-04-27 17:24:21'),
(29, '212130', 'asbdksbdkjasd', '20000', 'Bank Wire', NULL, 'asdasfsafsaf', '1', 'kjkasbkdjbkajdbkasbd', '123213213123', 'upload/bank_wire/depo_proof6638e7e1d88a2.png', 'asdavascasv', '2024-05-06 08:53:29', '2024-05-06 09:07:07'),
(30, '871985', 'Aayush Verma', '324234324', 'Bank Wire', NULL, 'sdvasdjsdnkasn', '1', 'asdadv kladnd', '12332424', 'upload/bank_wire/depo_proof66390e0d8f1b5.png', '', '2024-05-06 11:36:21', '2024-05-06 12:21:38'),
(31, '871985', 'Aayush Verma', '20000', 'By Admin', NULL, 'AD17150153084489', '1', NULL, NULL, NULL, NULL, '2024-05-06 11:38:28', '2024-05-06 11:39:30'),
(32, '871985', 'Aayush Verma', '2342423', 'Bank Wire', NULL, 'wdfaddv', '1', 'asdsad', '23532623432542', 'upload/bank_wire/depo_proof6639198b2f2b1.png', 'qdsvdfdfsad', '2024-05-06 12:25:23', '2024-05-06 12:25:41'),
(33, '871985', 'Aayush Verma', '324423', 'Bank Wire', NULL, 'wdnfmbanmfb', '3', 'jkasbdhb', '32324324', 'upload/bank_wire/depo_proof66391c6dd34c1.png', 'fadfdsfds', '2024-05-06 12:37:41', '2024-05-06 12:37:58'),
(34, '871985', 'Aayush Verma', '324324', 'Bank Wire', NULL, 'ad,fj,', '3', 'nasbdkjasd', '324324324', 'upload/bank_wire/depo_proof66391cf2c445a.png', 'wfqfdf', '2024-05-06 12:39:54', '2024-05-06 12:43:57'),
(35, '871985', 'Aayush Verma', '2324324', 'Bank Wire', NULL, 'asdasd', '2', 'asdsad', '123123', 'upload/bank_wire/depo_proof6639280004b15.png', 'dsadasda', '2024-05-06 13:27:04', '2024-05-06 13:27:04');

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
(82, '983191', 'Avi', '861008', '871985', '20000', 24267, '2024-04-28 08:03:09', '2024-05-19 08:03:09', '2024-04-28 02:33:09', '2024-04-28 09:48:37', 1),
(83, '642484', 'Aayush Verma', '129149', '871985', '20000', 20080, '2024-05-04 16:04:48', '2024-05-24 16:04:48', '2024-05-04 10:34:48', '2024-05-04 10:37:37', 1),
(84, '231531', 'asbdksbdkjasd', '129149', '212130', '20000', 20080, '2024-05-06 14:55:48', '2024-05-26 14:55:48', '2024-05-06 09:25:48', '2024-05-06 09:32:51', 1),
(85, '684730', 'asbdksbdkjasd', '861008', '212130', '20000', 20533, '2024-05-06 15:05:30', '2024-05-27 15:05:30', '2024-05-06 09:35:30', '2024-05-06 09:35:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `iplogs`
--

CREATE TABLE `iplogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iplogs`
--

INSERT INTO `iplogs` (`id`, `ip_address`, `country`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', NULL, '2024-05-04 14:28:23', '2024-05-04 14:28:23'),
(2, '127.0.0.1', NULL, '2024-05-05 14:50:44', '2024-05-05 14:50:44'),
(3, '127.0.0.1', NULL, '2024-05-06 03:18:59', '2024-05-06 03:18:59'),
(4, '127.0.0.1', NULL, '2024-05-06 06:49:39', '2024-05-06 06:49:39'),
(5, '127.0.0.1', NULL, '2024-05-06 07:11:47', '2024-05-06 07:11:47'),
(6, '127.0.0.1', NULL, '2024-05-06 08:07:39', '2024-05-06 08:07:39'),
(7, '127.0.0.1', NULL, '2024-05-06 08:52:31', '2024-05-06 08:52:31'),
(8, '127.0.0.1', NULL, '2024-05-06 09:07:35', '2024-05-06 09:07:35'),
(9, '127.0.0.1', NULL, '2024-05-06 09:25:16', '2024-05-06 09:25:16'),
(10, '127.0.0.1', NULL, '2024-05-06 09:33:24', '2024-05-06 09:33:24'),
(11, '127.0.0.1', NULL, '2024-05-06 09:34:56', '2024-05-06 09:34:56'),
(12, '127.0.0.1', NULL, '2024-05-06 11:02:08', '2024-05-06 11:02:08'),
(13, '127.0.0.1', NULL, '2024-05-06 11:16:15', '2024-05-06 11:16:15'),
(14, '127.0.0.1', NULL, '2024-05-06 11:35:15', '2024-05-06 11:35:15'),
(15, '127.0.0.1', NULL, '2024-05-06 13:40:10', '2024-05-06 13:40:10');

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
(3, '871985', 'test', 'asdasdsad', 'Driving License', '2213213213', 'qdjkasmd', 'Åland Islands', 'asdsad', 'asdsadsad', 'asdsad', 'asdsad', '2024-05-06', '2024-04-27');

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
(18, '2024_04_24_155649_create_access_control', 16),
(19, '2024_05_04_194146_create_iplogs', 17);

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
(37, '871985', 'ssssssssssssss', '2024-04-28 00:49:21', '2024-04-28 00:49:21'),
(38, '871985', 'Congratulations! You just received an investment bonus USD500, Happy investing!', '2024-05-04 12:43:44', '2024-05-04 12:43:44'),
(39, '871985', 'Congratulations! You just received an investment bonus USD500, Happy investing!', '2024-05-04 12:44:10', '2024-05-04 12:44:10'),
(40, '871985', 'Congratulations! You just received an investment bonus of $3, Happy investing!', '2024-05-04 12:46:17', '2024-05-04 12:46:17'),
(41, '871985', 'We regret to inform you that a penalty of $460 has been deducted from your account', '2024-05-04 13:04:54', '2024-05-04 13:04:54'),
(42, '871985', 'Congratulations! You just received an investment bonus of $1, Happy investing!', '2024-05-04 13:07:23', '2024-05-04 13:07:23'),
(43, '871985', 'We regret to inform you that a penalty of $1 has been deducted from your account', '2024-05-04 13:07:47', '2024-05-04 13:07:47');

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
(11, '861008', 'TESTING #!@@#@$@#$@', 'Active', '20000', 'Daily', '21', '40', '20', 'Testing 1234 tewrwe1212', 'Disabled', 20, 'Enabled', '2', '3782421', 'upload/plans/plan_image_6622d200b5ecb.png', 15, '2024-04-19 14:50:16', '2024-05-06 09:35:30', 0),
(12, '129149', 'Alpha asklcjklb akldmsakf AS', 'Active', '20000', 'Daily', '20', '30', '20', 'lkasnkld as,dasfasd asf asd as fsdf as dasf', 'Disabled', 2, 'Enabled', '20', '240000', 'upload/plans/plan_image_662f69e48922b.png', 2, '2024-04-29 04:02:29', '2024-05-06 09:25:48', 0);

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
('G2vIdcePiCPfA1RkgxAGcD1tOn5V5TE8X7iLP1hR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia0dhNXh3WXRpWkVRVGp2M2E4eVdqc0ZmR2Z3Rk5QNnVXNDVjYm9vciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGlfZGFzaCI7fXM6MTk6ImludmVzdF9zdWNjZXNzX2RhdGEiO2E6NTp7czo3OiJtZXNzYWdlIjtzOjIyOiJJbnZlc3RtZW50IHN1Y2Nlc3NmdWwhIjtzOjY6ImFtb3VudCI7aToxMDAwO3M6OToicGxhbl9uYW1lIjtzOjE5OiJURVNUSU5HICMhQEAjQCRAIyRAIjtzOjk6InVzZXJfbmFtZSI7czoxMzoiYXNiZGtzYmRramFzZCI7czoxMzoiaW52ZXN0bWVudF9pZCI7aTo2ODQ3MzA7fXM6Njoic191c2VyIjtPOjE1OiJBcHBcTW9kZWxzXFVzZXIiOjMwOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjU6InVzZXJzIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6MzQ6e3M6MjoiaWQiO2k6MjU7czo3OiJ1c2VyX2lkIjtzOjY6Ijg3MTk4NSI7czo0OiJuYW1lIjtzOjEyOiJBYXl1c2ggVmVybWEiO3M6NToiZW1haWwiO3M6MjQ6ImFheXVzaHZlcm1hMjAwQGdtYWlsLmNvbSI7czo1OiJwaG9uZSI7czoxMDoiMTIzNDU2Nzg5MCI7czozOiJkb2IiO3M6MTA6IjE5OTktMDQtMTIiO3M6NzoiY291bnRyeSI7czo5OiJTaW5nYXBvcmUiO3M6MTA6ImltYWdlX2RhdGEiO3M6MzQ6InVwbG9hZC9zZWxmaWUvSUQ2NjJkNTRhMTg2M2ViLmpwZWciO3M6ODoiaWRfcHJvb2YiO3M6NDE6InVwbG9hZC9pZF9pbWFnZS9pZF9pbWFnZTY2MmQ1NGExODY4NGYucG5nIjtzOjEzOiJhZGRyZXNzX3Byb29mIjtzOjUxOiJ1cGxvYWQvYWRkcmVzc19wcm9vZi9hZGRyZXNzX3Byb29mNjYyZDU4MDFkZWQ0Ni5wbmciO3M6ODoicGFzc3dvcmQiO3M6NToiMTIzNDUiO3M6Njoic3RhdHVzIjtzOjY6IkFjdGl2ZSI7czoxMzoiYXV0b193aXRoZHJhdyI7TjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtOO3M6MTI6Im1heF93aXRoZHJhdyI7TjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTI3IDE3OjQ4OjQxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTA1LTA2IDE5OjA3OjMzIjtzOjc6ImJhbGFuY2UiO2k6MzU1NTk0Mjc0O3M6NjoiZnVuZGVkIjtpOjM3MjI0MjE7czo3OiJ3aXRocmF3IjtpOjIwNTAwO3M6ODoiZGVwb3NpdGUiO2k6MzQ5NzE5ODcwO3M6MTc6InJlZmVycmFsc19lYXJuaW5nIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6ODQ3NDQ5O3M6MTE6InJlZmVycmFsX2lkIjtzOjEzOiJzZGZhc3ZkYWZhc3ZhIjtzOjE2OiJub19yZWZlcnJhbF91c2VyIjtpOjE7czo5OiJpZF9zdGF0dXMiO2k6MjtzOjEwOiJhZGRfc3RhdHVzIjtpOjI7czoxMDoiZW1haWxfYXV0aCI7aToxO3M6OToicGFyZW50X2lkIjtOO3M6MTA6ImRsdF9zdGF0dXMiO2k6MDt9czoxMToiACoAb3JpZ2luYWwiO2E6MzQ6e3M6MjoiaWQiO2k6MjU7czo3OiJ1c2VyX2lkIjtzOjY6Ijg3MTk4NSI7czo0OiJuYW1lIjtzOjEyOiJBYXl1c2ggVmVybWEiO3M6NToiZW1haWwiO3M6MjQ6ImFheXVzaHZlcm1hMjAwQGdtYWlsLmNvbSI7czo1OiJwaG9uZSI7czoxMDoiMTIzNDU2Nzg5MCI7czozOiJkb2IiO3M6MTA6IjE5OTktMDQtMTIiO3M6NzoiY291bnRyeSI7czo5OiJTaW5nYXBvcmUiO3M6MTA6ImltYWdlX2RhdGEiO3M6MzQ6InVwbG9hZC9zZWxmaWUvSUQ2NjJkNTRhMTg2M2ViLmpwZWciO3M6ODoiaWRfcHJvb2YiO3M6NDE6InVwbG9hZC9pZF9pbWFnZS9pZF9pbWFnZTY2MmQ1NGExODY4NGYucG5nIjtzOjEzOiJhZGRyZXNzX3Byb29mIjtzOjUxOiJ1cGxvYWQvYWRkcmVzc19wcm9vZi9hZGRyZXNzX3Byb29mNjYyZDU4MDFkZWQ0Ni5wbmciO3M6ODoicGFzc3dvcmQiO3M6NToiMTIzNDUiO3M6Njoic3RhdHVzIjtzOjY6IkFjdGl2ZSI7czoxMzoiYXV0b193aXRoZHJhdyI7TjtzOjE2OiJwYXlfZWFybmluZ19hdXRvIjtOO3M6MTI6Im1heF93aXRoZHJhdyI7TjtzOjEyOiJkZW1vX2FjY291bnQiO047czo5OiJibGFja2xpc3QiO047czoxMDoiYWRtaW5fbm90ZSI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTA0LTI3IDE3OjQ4OjQxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTA1LTA2IDE5OjA3OjMzIjtzOjc6ImJhbGFuY2UiO2k6MzU1NTk0Mjc0O3M6NjoiZnVuZGVkIjtpOjM3MjI0MjE7czo3OiJ3aXRocmF3IjtpOjIwNTAwO3M6ODoiZGVwb3NpdGUiO2k6MzQ5NzE5ODcwO3M6MTc6InJlZmVycmFsc19lYXJuaW5nIjtpOjA7czo2OiJhc3NldHMiO2k6MDtzOjc6IkVhcm5pbmciO2k6ODQ3NDQ5O3M6MTE6InJlZmVycmFsX2lkIjtzOjEzOiJzZGZhc3ZkYWZhc3ZhIjtzOjE2OiJub19yZWZlcnJhbF91c2VyIjtpOjE7czo5OiJpZF9zdGF0dXMiO2k6MjtzOjEwOiJhZGRfc3RhdHVzIjtpOjI7czoxMDoiZW1haWxfYXV0aCI7aToxO3M6OToicGFyZW50X2lkIjtOO3M6MTA6ImRsdF9zdGF0dXMiO2k6MDt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjA6e31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTowOnt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9fX0=', 1715030757),
('JsFx4OoCg5ryVsUJiOUHGXgDLQzgA6xDJNRItNii', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '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', 1715030754);

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
(179, '871985', 'Profit In Investment', 'Avi', '29066.67', NULL, 'Credit', '2024-04-28 16:24:09', '2024-04-28 16:24:09'),
(180, '871985', 'Investment', 'Alpha asklcjklb akldmsakf AS', '20000', NULL, 'Debit', '2024-05-04 10:34:48', '2024-05-04 10:34:48'),
(181, '871985', 'Profit In Investment', 'Aayush Verma', '80', NULL, 'Credit', '2024-05-04 10:37:37', '2024-05-04 10:37:37'),
(182, '871985', 'Bonus', 'Investment Bonus', '500', NULL, 'Credit', '2024-05-04 12:43:44', '2024-05-04 12:43:44'),
(183, '871985', 'Bonus', 'Investment Bonus', '500', NULL, 'Credit', '2024-05-04 12:44:10', '2024-05-04 12:44:10'),
(184, '871985', 'Bonus', 'Investment Bonus', '3', NULL, 'Credit', '2024-05-04 12:46:17', '2024-05-04 12:46:17'),
(185, '871985', 'Penalty', 'Penalty Deducted', '460', NULL, 'Debit', '2024-05-04 13:04:54', '2024-05-04 13:04:54'),
(186, '871985', 'Investment Bonus', 'Aayush Verma', '1', NULL, 'Credit', '2024-05-04 13:07:23', '2024-05-04 13:07:23'),
(187, '871985', 'Penalty Deducted', 'Aayush Verma', '1', NULL, 'Debit', '2024-05-04 13:07:47', '2024-05-04 13:07:47'),
(188, '974234', 'Bonus', 'Referral Code Reward', '100', NULL, 'Credit', '2024-05-06 08:46:05', '2024-05-06 08:46:05'),
(189, '212130', 'Bonus', 'Referral Code Reward', '100', NULL, 'Credit', '2024-05-06 08:50:33', '2024-05-06 08:50:33'),
(190, '212130', 'Fund Deposite', 'asbdksbdkjasd', '20000', NULL, 'Credit', '2024-05-06 09:07:07', '2024-05-06 09:07:07'),
(191, '871985', 'Commission', 'Referral Deposite Bonus', '1000', NULL, 'Credit', '2024-05-06 09:07:07', '2024-05-06 09:07:07'),
(192, '212130', 'Investment', 'Alpha asklcjklb akldmsakf AS', '20000', NULL, 'Debit', '2024-05-06 09:25:48', '2024-05-06 09:25:48'),
(193, '212130', 'Profit In Investment', 'asbdksbdkjasd', '80', NULL, 'Credit', '2024-05-06 09:32:51', '2024-05-06 09:32:51'),
(194, '212130', 'Investment', 'TESTING #!@@#@$@#$@', '20000', NULL, 'Debit', '2024-05-06 09:35:30', '2024-05-06 09:35:30'),
(195, '212130', 'Profit In Investment', 'asbdksbdkjasd', '533.33', NULL, 'Credit', '2024-05-06 09:35:53', '2024-05-06 09:35:53'),
(196, '871985', 'Commission', 'Trade Profit Commission', '26.6665', NULL, 'Credit', '2024-05-06 09:35:53', '2024-05-06 09:35:53'),
(197, '871985', 'Fund Deposite', 'Aayush Verma', '20000', NULL, 'Credit', '2024-05-06 11:39:30', '2024-05-06 11:39:30'),
(198, '871985', 'Fund Deposite', 'Aayush Verma', '324234324', NULL, 'Credit', '2024-05-06 12:21:38', '2024-05-06 12:21:38'),
(199, '871985', 'Fund Deposite', 'Aayush Verma', '2342423', NULL, 'Credit', '2024-05-06 12:25:41', '2024-05-06 12:25:41'),
(200, '871985', 'Fund Withdrawal', 'Aayush Verma', '500', NULL, 'Debit', '2024-05-06 13:11:00', '2024-05-06 13:11:00');

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
  `referrals_earning` int(255) DEFAULT 0,
  `assets` int(255) DEFAULT 0,
  `Earning` int(255) NOT NULL DEFAULT 0,
  `referral_id` varchar(20) DEFAULT NULL,
  `no_referral_user` int(100) NOT NULL DEFAULT 0,
  `id_status` int(10) NOT NULL DEFAULT 0,
  `add_status` int(10) NOT NULL DEFAULT 0,
  `email_auth` int(100) NOT NULL DEFAULT 0,
  `parent_id` varchar(100) DEFAULT NULL,
  `dlt_status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `phone`, `dob`, `country`, `image_data`, `id_proof`, `address_proof`, `password`, `status`, `auto_withdraw`, `pay_earning_auto`, `max_withdraw`, `demo_account`, `blacklist`, `admin_note`, `created_at`, `updated_at`, `balance`, `funded`, `withraw`, `deposite`, `referrals_earning`, `assets`, `Earning`, `referral_id`, `no_referral_user`, `id_status`, `add_status`, `email_auth`, `parent_id`, `dlt_status`) VALUES
(17, '823119', 'John King', 'john@gmail.com', NULL, NULL, 'Bahamas', 'upload/selfie/ID6624c52f0bad9.jpeg', 'upload/id_image/id_image6624c52f0be47.jpeg', 'upload/address_proof/address_proof6624c5bfeb462.jpeg', '12345', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-21 02:17:53', '2024-05-06 13:33:26', 181200, 20000, 0, 2400, 0, 0, 0, NULL, 0, 2, 2, 0, NULL, 1),
(18, '425016', 'avi', 'avi@gmail.com', '21213123', '2024-05-03', '123213123', 'upload/users/user_pic_66293e09cd620.png', NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, 'ASDASDASDA', '2024-04-24 11:44:49', '2024-04-26 03:41:28', 120075123, 0, 0, 0, 0, 0, 0, NULL, 0, 2, 2, 2, NULL, 0),
(19, '608774', 'test', 'test@gmail.com', '123213', '2024-04-12', 'Albania', 'upload/users/user_pic_66293ea7e4c11.png', NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, 'ACADASD', '2024-04-24 11:47:27', '2024-04-28 00:50:14', 48100, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, 0),
(20, '443218', 'ASDSAD', 'ASDASD@GMAIL.COM', '23213', '2024-04-19', 'Bahamas', NULL, NULL, NULL, '12345', 'Suspended', NULL, NULL, NULL, NULL, NULL, 'asdsadasd', '2024-04-24 11:48:44', '2024-05-04 15:54:48', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 1, 1, 0, NULL, 0),
(21, '609355', 'asdasd', 'asdasd@gmail.com', 'asdasdSAD', '2024-04-29', 'Antarctica', NULL, NULL, NULL, '12345', 'Suspended', NULL, NULL, NULL, NULL, NULL, '31213ASDSADAS', '2024-04-24 11:53:29', '2024-04-24 13:50:07', 0, 20000, 0, 0, 0, 0, 0, NULL, 0, 2, 2, 2, NULL, 0),
(22, '992901', '123', 'alpha@gmail.com', '21213', '2024-05-03', 'Azerbaijan', NULL, NULL, NULL, 'testing', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-27 10:05:43', '2024-04-27 10:05:43', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, 0),
(23, '692438', 'sdasd', 'alpha1@gmail.com', '123213', '2024-05-09', 'Australia', NULL, NULL, NULL, '12345', 'not_approved', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-27 10:07:03', '2024-04-27 10:07:03', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, NULL, 0),
(25, '871985', 'Aayush Verma', 'aayushverma200@gmail.com', '1234567890', '1999-04-12', 'Singapore', 'upload/selfie/ID662d54a1863eb.jpeg', 'upload/id_image/id_image662d54a18684f.png', 'upload/address_proof/address_proof66394ad5b6de6.png', '12345', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-27 12:18:41', '2024-05-06 15:55:53', 355594274, 3722421, 20500, 349719870, 0, 0, 847449, 'sdfasvdafasva', 1, 2, 2, 1, NULL, 0),
(27, '974234', 'astwersdagafas', 'sdbsdvascklmk@gmail.com', '21414124', '2024-05-09', 'Australia', NULL, NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-06 08:46:05', '2024-05-06 08:46:05', 100, 0, 0, 0, 0, 0, 0, 'nvpdRtCjtOHHAx5G', 0, 0, 0, 0, '871985', 0),
(28, '212130', 'asbdksbdkjasd', 'aasadsadsadsad@gmail.com', '1221242', '2024-05-14', 'Armenia', NULL, NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-06 08:50:33', '2024-05-06 09:35:53', 20713, 40000, 0, 20000, 0, 0, 613, 'bLHyLYa5jGdg4RkT', 0, 1, 1, 0, '871985', 0),
(29, '530913', 'testtemp', 'pedecoy626@ociun.com', '1232131', '2024-05-21', 'Bahrain', NULL, NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, 'hello', '2024-05-06 11:05:42', '2024-05-06 11:05:42', 0, 0, 0, 0, 0, 0, 0, 'whAIefseA1GbPHJf', 0, 2, 2, 2, NULL, 0),
(30, '389824', 'testtemp', 'pedecoy626@ociun.com', '1232131', '2024-05-21', 'Bahrain', NULL, NULL, NULL, '12345', 'Active', NULL, NULL, NULL, NULL, NULL, 'hello', '2024-05-06 11:06:09', '2024-05-06 11:07:38', 0, 0, 0, 0, 0, 0, 0, 'TFeGtAcz8U8Kqeq1', 0, 2, 2, 2, NULL, 0);

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
(4, '871985', 'Avi', '20000', NULL, NULL, 'AD17142585241575', '1', '2024-04-27 17:25:24', '2024-04-27 17:25:30'),
(5, '871985', 'Aayush Verma', '500', NULL, NULL, 'AD17150192696608', '1', '2024-05-06 12:44:29', '2024-05-06 13:11:00');

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
-- Indexes for table `iplogs`
--
ALTER TABLE `iplogs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `iplogs`
--
ALTER TABLE `iplogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `withrawals`
--
ALTER TABLE `withrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
