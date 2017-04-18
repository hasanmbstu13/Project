-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2016 at 12:37 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sqfoufou_intranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(10, 10, 'e3muK2vB8JZySNiK8oYl7pfqYpOFgcMH', 1, '2016-02-23 07:00:17', '2016-02-23 07:00:17', '2016-02-23 07:00:17'),
(13, 13, 'IEYM9fFKVSktKg8MbbhKeV3b4gaxxpnj', 1, '2016-03-30 13:13:49', '2016-03-30 13:13:49', '2016-03-30 13:13:49'),
(15, 15, 'FmmKv17D4wqrVFBESVAKLhezM6f06tHU', 1, '2016-04-19 14:19:04', '2016-04-19 14:19:04', '2016-04-19 14:19:04'),
(16, 16, '6uBf0v58M14ZENansV7ACtgzgrU53UJx', 1, '2016-04-19 14:22:16', '2016-04-19 14:22:16', '2016-04-19 14:22:16'),
(17, 17, 'ETRmHD2xdVxnQ6Beq9F1H2QfsOr5yaEx', 1, '2016-04-19 14:23:53', '2016-04-19 14:23:53', '2016-04-19 14:23:53'),
(18, 18, '12uNkkVvL1jrI5B3yXN1ddDadPn4Ym03', 1, '2016-05-03 16:22:05', '2016-05-03 16:22:05', '2016-05-03 16:22:05'),
(19, 19, 'jn3W6m3xNGcoW4cfYhYNcRINNDiCS1OR', 1, '2016-05-13 17:08:10', '2016-05-13 17:08:10', '2016-05-13 17:08:10'),
(20, 20, 'bfmdR0en9N0IScEXPhbPRWhmKB6D3CFX', 1, '2016-05-13 17:10:06', '2016-05-13 17:10:06', '2016-05-13 17:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_07_02_230147_migration_cartalyst_sentinel', 1),
('2015_11_12_095246_create_projects_table', 1),
('2015_11_16_103713_add_color_code_to_users_table', 1),
('2015_11_16_104143_create_projects_users_table', 1),
('2015_11_16_104405_create_works_table', 1),
('2015_11_16_105955_create_works_log_table', 1),
('2015_11_18_102907_add_nick_name_to_users_table', 1),
('2015_11_23_122259_add_status_to_projects_table', 1),
('2015_11_23_123803_update_status_on_works_table', 1),
('2015_11_24_100904_update_assigned_hour_on_works_table', 1),
('2015_12_01_124502_add_status_to_works_log_table', 1),
('2016_02_23_124928_add_fonts_color_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(68, 13, 'F4PLnb0XHJIwajZTgtOhqzGRw7UZElZx', '2016-04-19 14:37:58', '2016-04-19 14:37:58'),
(69, 17, 'lprpe0S5TQJSOyODg0ncKS2E0kN863SL', '2016-04-19 14:39:12', '2016-04-19 14:39:12'),
(70, 13, 'UTDH1Vd38PQhT1yTxcm7Kd4etULLuJG9', '2016-04-19 14:40:11', '2016-04-19 14:40:11'),
(73, 17, '4w7BZnuJqw5XuMzui1SGUA3AJNMPuIao', '2016-04-19 15:18:06', '2016-04-19 15:18:06'),
(74, 17, 'KZ6TfbjPSkXUM5uojCaGHkITqfRBcNNS', '2016-04-20 09:27:18', '2016-04-20 09:27:18'),
(75, 17, 'fTPGYS0DhYTr8HQlas1YfkXvoC0LXbKu', '2016-04-20 12:52:12', '2016-04-20 12:52:12'),
(76, 15, 'Ud7nX5HLu3qVlXR8olY9NnUy88g3oG2E', '2016-04-20 12:53:07', '2016-04-20 12:53:07'),
(79, 17, 'K35GEoF9onq1JUcBNHq4HLOMjqT1SoO9', '2016-04-20 12:57:22', '2016-04-20 12:57:22'),
(80, 17, 'AaouuIAXstPGD9z5wyNOvx6HNQetGUbu', '2016-04-21 12:31:39', '2016-04-21 12:31:39'),
(81, 17, 'Xts2Vbf0kHuw7QE2Ilw4UHCBrTcXcJTM', '2016-04-21 12:33:41', '2016-04-21 12:33:41'),
(85, 17, '2XFSf4VXDrhcYRAdvQbJGEkZzxdIjwtK', '2016-04-22 18:27:01', '2016-04-22 18:27:01'),
(88, 17, 'JNGVBJmHlwMa7DeOwb3DcQYgvWb8Jd8z', '2016-04-22 19:27:07', '2016-04-22 19:27:07'),
(89, 17, 'FKDYjmf9yI2C7SK67NYpEnwWnfYdTMKn', '2016-04-27 11:53:29', '2016-04-27 11:53:29'),
(91, 17, 'JIoof7ErUimBYSTpnM5NJAR8mDfEAPX0', '2016-04-28 18:24:33', '2016-04-28 18:24:33'),
(92, 17, 'OiRwSYSPbH3cFxoh7EaPM3htacJNiasP', '2016-04-29 18:31:42', '2016-04-29 18:31:42'),
(94, 17, 'J47krILBJK5ATlsNBf9hvfoZS0mZwMuO', '2016-05-02 15:17:07', '2016-05-02 15:17:07'),
(96, 17, 'hN3vWxZTX2CHFPGKmfLbSaU8jS9fYZ4K', '2016-05-02 16:52:13', '2016-05-02 16:52:13'),
(99, 15, 'CLDaDW2xgmgxVuwScubRrj5uSKMZWvAx', '2016-05-03 10:22:19', '2016-05-03 10:22:19'),
(100, 17, 'ybcCkSaHDN7BIEV6Rjjj99Z8molwjOKP', '2016-05-03 12:08:44', '2016-05-03 12:08:44'),
(104, 17, 'XcasK2BxD7JeA8a1s7NUuRNFbHyd7P66', '2016-05-03 16:22:41', '2016-05-03 16:22:41'),
(105, 17, 'id25O077slfn3gclkpshFuPjUPwKmg5A', '2016-05-03 16:25:15', '2016-05-03 16:25:15'),
(106, 17, 'gHkJO1ynpio1ze1yDtMBCbGP0VafDQMA', '2016-05-04 14:55:05', '2016-05-04 14:55:05'),
(107, 17, 'cEltFPdMGOhSCZad33RTBshPdS0WGZDO', '2016-05-04 19:38:39', '2016-05-04 19:38:39'),
(108, 17, 'HP4wP6KtdijquC8qO2xU8RVtB5W1SxEv', '2016-05-06 12:46:02', '2016-05-06 12:46:02'),
(109, 17, 'EHgTTxydfjYScZlWVtAFeBuNIDiNow7O', '2016-05-06 20:40:20', '2016-05-06 20:40:20'),
(110, 17, 'uH0UVJ6CodoCZrCUU9P2KMGEmt7Ig5Qv', '2016-05-09 13:12:33', '2016-05-09 13:12:33'),
(111, 17, 'meg1Q4c9zyKFI4KhCcBxCuaRA7IqD9Wi', '2016-05-09 13:15:08', '2016-05-09 13:15:08'),
(112, 17, 'tj6p8lym7HimZCmPxiW2TDkCVvmwCQl5', '2016-05-10 12:06:20', '2016-05-10 12:06:20'),
(113, 17, 'cRP9pIlzBAMSJrbpq0V8El4PHXbpy3UA', '2016-05-12 12:52:47', '2016-05-12 12:52:47'),
(117, 17, 'R5wevo5zygxDDC7bDCOvfoshtJYh7Grl', '2016-05-12 19:46:57', '2016-05-12 19:46:57'),
(125, 18, 'RZ7cvJe7nDA0IvpNyilpMjSF6BgJze2T', '2016-05-13 12:20:05', '2016-05-13 12:20:05'),
(142, 17, 'LTM7xu6UTAMjH0ONOm1n5yU3IumdtVCr', '2016-05-13 19:10:17', '2016-05-13 19:10:17'),
(143, 17, 'lglqY76LZQ70W4UHnmsMHGU8QInYexs1', '2016-05-16 11:59:28', '2016-05-16 11:59:28'),
(144, 17, 'D15R0tXGzNrYtSyS4HOzGBKi6KgawL0R', '2016-05-16 14:21:08', '2016-05-16 14:21:08'),
(146, 17, 'b9gnJtYmTIKRK4HInQZOPU44AsGTEngl', '2016-05-16 18:10:05', '2016-05-16 18:10:05'),
(147, 17, 'h0mUeOlze3cYfmKuv4Tbj58qxSlv1iok', '2016-05-17 10:04:32', '2016-05-17 10:04:32'),
(148, 17, 'MBDBmKMyx4T4GHQaljkHG6ujNyghp4au', '2016-05-17 15:46:39', '2016-05-17 15:46:39'),
(150, 18, '45hCfFcmM8s8uVTJqbvdYIHjdzwQFt7X', '2016-05-17 18:12:08', '2016-05-17 18:12:08'),
(151, 18, 'wyHZbk2TIL8HiEdKl8mvIQytRq6lWcBv', '2016-05-18 12:39:43', '2016-05-18 12:39:43'),
(153, 17, 'dygNA30ZUm3nnZY8ETf4leP2dHKROcKZ', '2016-05-18 14:30:16', '2016-05-18 14:30:16'),
(154, 18, 'xyfevCxdh9BbJ0L9TxWdSzzdGLvIuAY9', '2016-05-18 16:05:37', '2016-05-18 16:05:37'),
(155, 18, 'N3k1uqzo9H7g79U5svPc2Mp7e572EJyq', '2016-05-18 19:19:03', '2016-05-18 19:19:03'),
(156, 18, 'DAZhKEoOAWUDdY6ixYgPU20pFJuY4ety', '2016-05-19 12:14:30', '2016-05-19 12:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL,
  `project_no` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `project_text` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `project_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `leader_id` int(10) unsigned NOT NULL,
  `project_manager` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `spent_hours` decimal(11,0) NOT NULL,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'created',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_no`, `project_text`, `project_name`, `company_name`, `start_time`, `deadline`, `leader_id`, `project_manager`, `description`, `spent_hours`, `status`, `created_at`, `updated_at`) VALUES
(27, '1234', 'laravel_', 'Symphony Application', 'Codetrio.com', '0000-00-00 00:00:00', '2016-05-05 06:00:00', 15, 17, '', '0', 'default', '2016-05-04 19:33:47', '2016-05-16 16:55:38'),
(29, '432', 'SKv3', 'SKv3', 'Skylark', '0000-00-00 00:00:00', '2016-05-20 06:00:00', 16, 17, 'Bla bla bla', '0', 'closed', '2016-05-04 19:39:30', '2016-05-16 16:55:56'),
(30, '123', 'pos', 'pos', 'Codetrio.com', '0000-00-00 00:00:00', '2016-05-11 06:00:00', 16, 17, '', '0', 'closed', '2016-05-12 19:47:38', '2016-05-16 19:31:14'),
(31, '666', 'STEEL', 'STEELDECK', 'STEELDECK', '0000-00-00 00:00:00', '2016-05-31 06:00:00', 18, 17, '', '0', 'development', '2016-05-13 12:17:59', '2016-05-13 12:19:08'),
(32, '1234', 'EC2013', 'Economic Census', 'Codetrio.com', '0000-00-00 00:00:00', '2016-05-03 06:00:00', 18, 17, '', '0', 'development', '2016-05-13 12:33:31', '2016-05-13 16:02:53'),
(33, '123', 'CRM', 'CRM', 'Codetrio.com', '0000-00-00 00:00:00', '2016-05-18 06:00:00', 15, 17, '', '0', 'closed', '2016-05-13 16:07:26', '2016-05-16 17:49:03'),
(34, '313', 'SKYLARK', 'SKYLARK', 'Skylark Creative', '0000-00-00 00:00:00', '2016-05-20 06:00:00', 20, 19, '', '0', 'closed', '2016-05-13 17:09:01', '2016-05-16 17:46:12'),
(35, '777', 'Lorem', 'Lorem', 'Ipsum', '0000-00-00 00:00:00', '2016-05-31 06:00:00', 20, 19, '', '0', 'development', '2016-05-13 17:54:06', '2016-05-13 17:56:49'),
(36, '256', 'IPSUM', 'Symphony App', 'Codetrio.com', '0000-00-00 00:00:00', '2016-05-19 06:00:00', 18, 17, 'This is a symphony app.', '0', 'default', '2016-05-13 18:13:03', '2016-05-16 14:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE IF NOT EXISTS `projects_users` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 27, 15, '2016-05-04 19:33:47', '2016-05-04 19:33:47'),
(5, 27, 16, '2016-05-04 19:33:47', '2016-05-04 19:33:47'),
(6, 27, 18, '2016-05-04 19:33:47', '2016-05-04 19:33:47'),
(9, 29, 16, '2016-05-04 19:39:30', '2016-05-04 19:39:30'),
(10, 29, 18, '2016-05-04 19:39:30', '2016-05-04 19:39:30'),
(11, 30, 15, '2016-05-12 19:47:38', '2016-05-12 19:47:38'),
(12, 30, 16, '2016-05-12 19:47:39', '2016-05-12 19:47:39'),
(13, 30, 18, '2016-05-12 19:47:39', '2016-05-12 19:47:39'),
(14, 31, 16, '2016-05-13 12:17:59', '2016-05-13 12:17:59'),
(15, 31, 18, '2016-05-13 12:17:59', '2016-05-13 12:17:59'),
(16, 32, 15, '2016-05-13 12:33:31', '2016-05-13 12:33:31'),
(17, 32, 16, '2016-05-13 12:33:31', '2016-05-13 12:33:31'),
(18, 32, 18, '2016-05-13 12:33:31', '2016-05-13 12:33:31'),
(19, 33, 15, '2016-05-13 16:07:26', '2016-05-13 16:07:26'),
(20, 33, 16, '2016-05-13 16:07:26', '2016-05-13 16:07:26'),
(22, 34, 18, '2016-05-13 17:09:01', '2016-05-13 17:09:01'),
(23, 35, 16, '2016-05-13 17:54:06', '2016-05-13 17:54:06'),
(24, 35, 20, '2016-05-13 17:54:06', '2016-05-13 17:54:06'),
(25, 36, 15, '2016-05-13 18:13:03', '2016-05-13 18:13:03'),
(28, 36, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 34, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'super-user', 'Super User', '{"admin":true}', '2015-12-10 06:14:29', '2015-12-10 06:14:29'),
(2, 'project-manager', 'Project Manager', '{"project-manager":true}', '2015-12-10 06:14:29', '2015-12-10 06:14:29'),
(3, 'designer', 'Designer', '{"designer":true}', '2015-12-10 06:14:29', '2015-12-10 06:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(10, 3, '2016-02-23 07:00:17', '2016-02-23 07:00:17'),
(13, 1, '2016-03-30 13:13:49', '2016-03-30 13:13:49'),
(15, 3, '2016-04-19 14:19:04', '2016-04-19 14:19:04'),
(16, 3, '2016-04-19 14:22:16', '2016-04-19 14:22:16'),
(17, 2, '2016-04-19 14:23:53', '2016-04-19 14:23:53'),
(18, 3, '2016-05-03 16:22:05', '2016-05-03 16:22:05'),
(19, 2, '2016-05-13 17:08:10', '2016-05-13 17:08:10'),
(20, 3, '2016-05-13 17:10:06', '2016-05-13 17:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2015-12-10 06:28:26', '2015-12-10 06:28:26'),
(2, NULL, 'ip', '127.0.0.1', '2015-12-10 06:28:26', '2015-12-10 06:28:26'),
(3, NULL, 'global', NULL, '2015-12-10 19:34:55', '2015-12-10 19:34:55'),
(4, NULL, 'ip', '115.127.31.178', '2015-12-10 19:34:55', '2015-12-10 19:34:55'),
(6, NULL, 'global', NULL, '2016-01-22 17:10:42', '2016-01-22 17:10:42'),
(7, NULL, 'ip', '103.239.254.2', '2016-01-22 17:10:42', '2016-01-22 17:10:42'),
(8, NULL, 'global', NULL, '2016-01-22 17:10:47', '2016-01-22 17:10:47'),
(9, NULL, 'ip', '103.239.254.2', '2016-01-22 17:10:47', '2016-01-22 17:10:47'),
(10, NULL, 'global', NULL, '2016-01-22 17:10:50', '2016-01-22 17:10:50'),
(11, NULL, 'ip', '103.239.254.2', '2016-01-22 17:10:50', '2016-01-22 17:10:50'),
(12, NULL, 'global', NULL, '2016-01-22 17:30:17', '2016-01-22 17:30:17'),
(13, NULL, 'ip', '115.127.31.178', '2016-01-22 17:30:17', '2016-01-22 17:30:17'),
(14, NULL, 'global', NULL, '2016-01-22 17:30:37', '2016-01-22 17:30:37'),
(15, NULL, 'ip', '115.127.31.178', '2016-01-22 17:30:37', '2016-01-22 17:30:37'),
(17, NULL, 'global', NULL, '2016-02-23 14:02:20', '2016-02-23 14:02:20'),
(18, NULL, 'ip', '115.127.31.178', '2016-02-23 14:02:20', '2016-02-23 14:02:20'),
(19, NULL, 'global', NULL, '2016-02-23 14:53:25', '2016-02-23 14:53:25'),
(20, NULL, 'ip', '115.127.31.178', '2016-02-23 14:53:25', '2016-02-23 14:53:25'),
(21, NULL, 'global', NULL, '2016-02-23 15:00:10', '2016-02-23 15:00:10'),
(22, NULL, 'ip', '115.127.31.178', '2016-02-23 15:00:10', '2016-02-23 15:00:10'),
(24, NULL, 'global', NULL, '2016-02-23 04:40:25', '2016-02-23 04:40:25'),
(25, NULL, 'ip', '127.0.0.1', '2016-02-23 04:40:25', '2016-02-23 04:40:25'),
(26, NULL, 'global', NULL, '2016-03-21 07:10:58', '2016-03-21 07:10:58'),
(27, NULL, 'ip', '127.0.0.1', '2016-03-21 07:10:58', '2016-03-21 07:10:58'),
(28, NULL, 'global', NULL, '2016-03-25 12:43:14', '2016-03-25 12:43:14'),
(29, NULL, 'ip', '115.127.31.178', '2016-03-25 12:43:14', '2016-03-25 12:43:14'),
(30, NULL, 'global', NULL, '2016-03-25 12:53:14', '2016-03-25 12:53:14'),
(31, NULL, 'ip', '115.127.31.178', '2016-03-25 12:53:14', '2016-03-25 12:53:14'),
(33, NULL, 'global', NULL, '2016-03-25 12:53:24', '2016-03-25 12:53:24'),
(34, NULL, 'ip', '115.127.31.178', '2016-03-25 12:53:24', '2016-03-25 12:53:24'),
(36, NULL, 'global', NULL, '2016-03-30 13:10:21', '2016-03-30 13:10:21'),
(37, NULL, 'ip', '115.127.31.178', '2016-03-30 13:10:21', '2016-03-30 13:10:21'),
(38, NULL, 'global', NULL, '2016-03-30 13:12:13', '2016-03-30 13:12:13'),
(39, NULL, 'ip', '115.127.31.178', '2016-03-30 13:12:13', '2016-03-30 13:12:13'),
(41, NULL, 'global', NULL, '2016-03-30 13:12:53', '2016-03-30 13:12:53'),
(42, NULL, 'ip', '115.127.31.178', '2016-03-30 13:12:53', '2016-03-30 13:12:53'),
(44, NULL, 'global', NULL, '2016-03-30 13:14:52', '2016-03-30 13:14:52'),
(45, NULL, 'ip', '115.127.31.178', '2016-03-30 13:14:52', '2016-03-30 13:14:52'),
(47, NULL, 'global', NULL, '2016-04-19 13:57:50', '2016-04-19 13:57:50'),
(48, NULL, 'ip', '1.1.190.192', '2016-04-19 13:57:50', '2016-04-19 13:57:50'),
(50, NULL, 'global', NULL, '2016-04-19 13:57:55', '2016-04-19 13:57:55'),
(51, NULL, 'ip', '1.1.190.192', '2016-04-19 13:57:55', '2016-04-19 13:57:55'),
(53, NULL, 'global', NULL, '2016-04-19 13:58:47', '2016-04-19 13:58:47'),
(54, NULL, 'ip', '1.1.190.192', '2016-04-19 13:58:47', '2016-04-19 13:58:47'),
(56, NULL, 'global', NULL, '2016-04-19 14:00:07', '2016-04-19 14:00:07'),
(57, NULL, 'ip', '1.1.190.192', '2016-04-19 14:00:07', '2016-04-19 14:00:07'),
(59, NULL, 'global', NULL, '2016-04-19 14:00:08', '2016-04-19 14:00:08'),
(60, NULL, 'ip', '1.1.190.192', '2016-04-19 14:00:08', '2016-04-19 14:00:08'),
(62, NULL, 'global', NULL, '2016-04-19 14:02:03', '2016-04-19 14:02:03'),
(63, NULL, 'ip', '115.127.31.178', '2016-04-19 14:02:03', '2016-04-19 14:02:03'),
(64, 13, 'user', NULL, '2016-04-19 14:02:03', '2016-04-19 14:02:03'),
(65, NULL, 'global', NULL, '2016-04-19 14:08:38', '2016-04-19 14:08:38'),
(66, NULL, 'ip', '1.1.190.192', '2016-04-19 14:08:38', '2016-04-19 14:08:38'),
(68, NULL, 'global', NULL, '2016-04-19 14:11:09', '2016-04-19 14:11:09'),
(69, NULL, 'ip', '115.127.31.178', '2016-04-19 14:11:09', '2016-04-19 14:11:09'),
(71, NULL, 'global', NULL, '2016-04-19 14:12:08', '2016-04-19 14:12:08'),
(72, NULL, 'ip', '115.127.31.178', '2016-04-19 14:12:08', '2016-04-19 14:12:08'),
(74, NULL, 'global', NULL, '2016-04-19 14:13:29', '2016-04-19 14:13:29'),
(75, NULL, 'ip', '1.1.190.192', '2016-04-19 14:13:29', '2016-04-19 14:13:29'),
(77, NULL, 'global', NULL, '2016-04-21 12:31:29', '2016-04-21 12:31:29'),
(78, NULL, 'ip', '115.127.31.178', '2016-04-21 12:31:29', '2016-04-21 12:31:29'),
(79, NULL, 'global', NULL, '2016-04-21 12:31:33', '2016-04-21 12:31:33'),
(80, NULL, 'ip', '125.25.160.235', '2016-04-21 12:31:33', '2016-04-21 12:31:33'),
(81, 17, 'user', NULL, '2016-04-21 12:31:33', '2016-04-21 12:31:33'),
(82, NULL, 'global', NULL, '2016-04-21 12:32:10', '2016-04-21 12:32:10'),
(83, NULL, 'ip', '115.127.31.178', '2016-04-21 12:32:10', '2016-04-21 12:32:10'),
(84, NULL, 'global', NULL, '2016-04-21 12:33:06', '2016-04-21 12:33:06'),
(85, NULL, 'ip', '115.127.31.178', '2016-04-21 12:33:06', '2016-04-21 12:33:06'),
(86, NULL, 'global', NULL, '2016-04-21 12:33:13', '2016-04-21 12:33:13'),
(87, NULL, 'ip', '115.127.31.178', '2016-04-21 12:33:13', '2016-04-21 12:33:13'),
(88, NULL, 'global', NULL, '2016-04-22 18:20:21', '2016-04-22 18:20:21'),
(89, NULL, 'ip', '115.127.31.178', '2016-04-22 18:20:21', '2016-04-22 18:20:21'),
(90, NULL, 'global', NULL, '2016-04-22 18:20:40', '2016-04-22 18:20:40'),
(91, NULL, 'ip', '115.127.31.178', '2016-04-22 18:20:40', '2016-04-22 18:20:40'),
(92, 13, 'user', NULL, '2016-04-22 18:20:40', '2016-04-22 18:20:40'),
(93, NULL, 'global', NULL, '2016-04-22 18:21:26', '2016-04-22 18:21:26'),
(94, NULL, 'ip', '115.127.31.178', '2016-04-22 18:21:26', '2016-04-22 18:21:26'),
(95, NULL, 'global', NULL, '2016-04-22 18:21:43', '2016-04-22 18:21:43'),
(96, NULL, 'ip', '115.127.31.178', '2016-04-22 18:21:43', '2016-04-22 18:21:43'),
(97, 13, 'user', NULL, '2016-04-22 18:21:43', '2016-04-22 18:21:43'),
(98, NULL, 'global', NULL, '2016-04-22 18:22:12', '2016-04-22 18:22:12'),
(99, NULL, 'ip', '115.127.31.178', '2016-04-22 18:22:12', '2016-04-22 18:22:12'),
(100, 13, 'user', NULL, '2016-04-22 18:22:12', '2016-04-22 18:22:12'),
(101, NULL, 'global', NULL, '2016-04-22 19:26:46', '2016-04-22 19:26:46'),
(102, NULL, 'ip', '115.127.31.178', '2016-04-22 19:26:46', '2016-04-22 19:26:46'),
(103, 17, 'user', NULL, '2016-04-22 19:26:46', '2016-04-22 19:26:46'),
(104, NULL, 'global', NULL, '2016-05-03 10:21:25', '2016-05-03 10:21:25'),
(105, NULL, 'ip', '125.25.160.72', '2016-05-03 10:21:25', '2016-05-03 10:21:25'),
(106, NULL, 'global', NULL, '2016-05-03 10:21:26', '2016-05-03 10:21:26'),
(107, NULL, 'ip', '125.25.160.72', '2016-05-03 10:21:26', '2016-05-03 10:21:26'),
(108, NULL, 'global', NULL, '2016-05-12 19:45:43', '2016-05-12 19:45:43'),
(109, NULL, 'ip', '202.134.13.133', '2016-05-12 19:45:43', '2016-05-12 19:45:43'),
(110, 17, 'user', NULL, '2016-05-12 19:45:43', '2016-05-12 19:45:43'),
(111, NULL, 'global', NULL, '2016-05-13 12:34:37', '2016-05-13 12:34:37'),
(112, NULL, 'ip', '115.127.31.178', '2016-05-13 12:34:37', '2016-05-13 12:34:37'),
(113, 18, 'user', NULL, '2016-05-13 12:34:37', '2016-05-13 12:34:37'),
(114, NULL, 'global', NULL, '2016-05-13 16:01:23', '2016-05-13 16:01:23'),
(115, NULL, 'ip', '115.127.31.178', '2016-05-13 16:01:23', '2016-05-13 16:01:23'),
(116, 17, 'user', NULL, '2016-05-13 16:01:23', '2016-05-13 16:01:23'),
(117, NULL, 'global', NULL, '2016-05-13 16:06:35', '2016-05-13 16:06:35'),
(118, NULL, 'ip', '115.127.31.178', '2016-05-13 16:06:35', '2016-05-13 16:06:35'),
(119, 17, 'user', NULL, '2016-05-13 16:06:35', '2016-05-13 16:06:35'),
(120, NULL, 'global', NULL, '2016-05-16 11:59:17', '2016-05-16 11:59:17'),
(121, NULL, 'ip', '115.127.31.178', '2016-05-16 11:59:17', '2016-05-16 11:59:17'),
(122, 17, 'user', NULL, '2016-05-16 11:59:17', '2016-05-16 11:59:17'),
(123, NULL, 'global', NULL, '2016-05-17 18:11:24', '2016-05-17 18:11:24'),
(124, NULL, 'ip', '115.127.31.178', '2016-05-17 18:11:24', '2016-05-17 18:11:24'),
(125, 18, 'user', NULL, '2016-05-17 18:11:24', '2016-05-17 18:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `color_code` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `nick_name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `font_color` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`, `color_code`, `nick_name`, `font_color`) VALUES
(13, 'math@square44.com', '$2y$10$gXXCgosVHttEIXI8BB.99.Y2pfkDlQe079fEYz/n01dNO3akWfVTC', NULL, '2016-05-13 17:09:31', 'Mathijs', 'Aliet', '2016-03-30 13:13:49', '2016-05-13 17:09:31', '#FFFFFF', 'Math', '#000000'),
(15, 'latt@square44.com', '$2y$10$vb4LZpjuJPRuGvG0WTvVwOBhe8HFdxJWixr56bd9NRfoZH4Gym3.6', NULL, '2016-05-03 10:22:19', 'latt', 'Lek', '2016-04-19 14:19:04', '2016-05-03 10:22:19', '#F50DE7', 'latt', '#000000'),
(16, 'tomo@square44.com', '$2y$10$oJpuS.y51mJSK8Wmd/7Fae.ipvV1sr4EOdTWm3AnHN.3G1xzFZI8u', NULL, '2016-04-20 12:54:35', 'Tomo', 'Kku', '2016-04-19 14:22:16', '2016-05-13 12:34:18', '#00FFDB', 'TOMO', '#000000'),
(17, 'willy@square44.com', '$2y$10$upTDjLoznEKXD9SWFanu9OovbZSM8WPOKmC1uR577i.BQXq.KcwGO', NULL, '2016-05-18 14:30:16', 'willy', 'jan', '2016-04-19 14:23:53', '2016-05-18 14:30:16', '#FF0000', 'willy', '#000000'),
(18, 'mainul@codetrio.com', '$2y$10$hcKC7MGmKExBYq.FogNMRu7MHM9C90NX.V6pHlKodudBQOx30a53S', NULL, '2016-05-19 12:14:30', 'Mainul', 'Hasan', '2016-05-03 16:22:05', '2016-05-19 12:14:30', '#C57355', 'Hasan', '#000000'),
(19, 'musa@codetrio.com', '$2y$10$FqHoTboEKQJxcvEFg1.w1eu5HNbQGJt5WuQE/Hu2K8YXvOLu04ZYi', NULL, '2016-05-13 17:10:21', 'Abu', 'Musa', '2016-05-13 17:08:10', '2016-05-13 17:10:21', '#0074D9', 'Musa', '#000000'),
(20, 'alamin@codetrio.com', '$2y$10$YQWueVUKHllVxCXw4NPcSutBtUaCSJ1JFB6hWeFCmdYjxV527fWRu', NULL, NULL, 'Al-Amin', 'Hossain', '2016-05-13 17:10:06', '2016-05-13 17:10:06', '#FFFFFF', 'Al-Amin', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `task` text COLLATE utf8_unicode_ci NOT NULL,
  `brief_number` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `assigned_hour` decimal(11,0) NOT NULL,
  `used_hour` decimal(11,0) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `next_deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `priority` smallint(6) NOT NULL,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'queued',
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `project_id`, `user_id`, `task`, `brief_number`, `assigned_hour`, `used_hour`, `start_time`, `next_deadline`, `priority`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(77, 29, 16, 'clean up job', '0555sqtr', '5', '0', '0000-00-00 00:00:00', '2016-05-17 06:00:00', 0, 'devlopment', 0, '2016-05-09 13:14:09', '2016-05-09 13:14:09'),
(78, 30, 15, '1234', '123456', '10', '0', '0000-00-00 00:00:00', '2016-05-26 06:00:00', 0, 'devlopment', 0, '2016-05-12 19:48:36', '2016-05-12 19:48:36'),
(79, 30, 16, '1234', '123456', '10', '0', '0000-00-00 00:00:00', '2016-05-26 06:00:00', 0, 'devlopment', 0, '2016-05-12 19:48:36', '2016-05-12 19:48:36'),
(80, 30, 18, '1234', '123456', '10', '0', '0000-00-00 00:00:00', '2016-05-26 06:00:00', 0, 'devlopment', 0, '2016-05-12 19:48:36', '2016-05-12 19:48:36'),
(81, 27, 15, '#12345', '123456', '12', '0', '0000-00-00 00:00:00', '2016-05-20 06:00:00', 0, 'started', 0, '2016-05-13 11:48:07', '2016-05-13 11:48:07'),
(82, 27, 16, '#12345', '123456', '12', '0', '0000-00-00 00:00:00', '2016-05-20 06:00:00', 0, 'started', 0, '2016-05-13 11:48:07', '2016-05-13 11:48:07'),
(83, 27, 18, '#12345', '123456', '12', '0', '0000-00-00 00:00:00', '2016-05-20 06:00:00', 0, 'started', 0, '2016-05-13 11:48:07', '2016-05-13 11:48:07'),
(84, 31, 18, 'Authentication', '001', '20', '0', '0000-00-00 00:00:00', '2016-05-15 16:00:00', 0, 'started', 0, '2016-05-13 12:19:08', '2016-05-13 12:19:08'),
(85, 32, 15, '#12345', '18', '10', '0', '0000-00-00 00:00:00', '2016-05-26 04:58:59', 0, 'queued', 0, '2016-05-13 16:02:53', '2016-05-13 16:02:53'),
(86, 32, 16, '#12345', '18', '10', '0', '0000-00-00 00:00:00', '2016-05-26 04:58:59', 0, 'queued', 0, '2016-05-13 16:02:53', '2016-05-13 16:02:53'),
(87, 32, 18, '#12345', '18', '10', '0', '0000-00-00 00:00:00', '2016-05-26 04:58:59', 0, 'queued', 0, '2016-05-13 16:02:53', '2016-05-13 16:02:53'),
(88, 33, 15, '#12345', '123456', '10', '0', '0000-00-00 00:00:00', '2016-05-13 16:10:00', 0, 'queued', 0, '2016-05-13 17:05:37', '2016-05-13 17:05:37'),
(89, 33, 16, '#12345', '123456', '10', '0', '0000-00-00 00:00:00', '2016-05-13 16:10:00', 0, 'queued', 0, '2016-05-13 17:05:37', '2016-05-13 17:05:37'),
(90, 34, 18, 'Fix the sticky nav', '001', '20', '0', '0000-00-00 00:00:00', '2016-05-20 16:10:00', 0, 'queued', 0, '2016-05-13 17:13:32', '2016-05-13 17:13:32'),
(91, 35, 16, '', '002', '40', '0', '0000-00-00 00:00:00', '2016-05-20 16:10:00', 0, 'queued', 0, '2016-05-13 17:56:49', '2016-05-13 17:56:49'),
(92, 35, 20, '', '002', '40', '0', '0000-00-00 00:00:00', '2016-05-20 16:10:00', 0, 'queued', 0, '2016-05-13 17:56:49', '2016-05-13 17:56:49'),
(93, 30, 15, 'dsaf', '123456', '10', '0', '0000-00-00 00:00:00', '2016-06-07 18:00:00', 0, 'queued', 0, '2016-05-16 16:56:22', '2016-05-16 16:56:22'),
(94, 30, 16, 'dsaf', '123456', '10', '0', '0000-00-00 00:00:00', '2016-06-07 18:00:00', 0, 'queued', 0, '2016-05-16 16:56:22', '2016-05-16 16:56:22'),
(95, 30, 18, 'dsaf', '123456', '10', '0', '0000-00-00 00:00:00', '2016-06-07 18:00:00', 0, 'queued', 0, '2016-05-16 16:56:22', '2016-05-16 16:56:22'),
(96, 34, 20, 'Fix video popup', '777', '18', '0', '0000-00-00 00:00:00', '2016-05-18 11:00:00', 0, 'queued', 0, '2016-05-16 17:45:10', '2016-05-16 17:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `works_log`
--

CREATE TABLE IF NOT EXISTS `works_log` (
  `id` int(10) unsigned NOT NULL,
  `works_id` int(10) unsigned NOT NULL,
  `started_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ended_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `spent_hours` decimal(11,0) NOT NULL,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'started',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`), ADD KEY `projects_leader_id_foreign` (`leader_id`), ADD KEY `projects_project_manager_foreign` (`project_manager`);

--
-- Indexes for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD PRIMARY KEY (`id`), ADD KEY `projects_users_project_id_foreign` (`project_id`), ADD KEY `projects_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`), ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`), ADD KEY `works_project_id_foreign` (`project_id`), ADD KEY `works_user_id_foreign` (`user_id`);

--
-- Indexes for table `works_log`
--
ALTER TABLE `works_log`
  ADD PRIMARY KEY (`id`), ADD KEY `works_log_works_id_foreign` (`works_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `projects_users`
--
ALTER TABLE `projects_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `works_log`
--
ALTER TABLE `works_log`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
ADD CONSTRAINT `projects_project_manager_foreign` FOREIGN KEY (`project_manager`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_users`
--
ALTER TABLE `projects_users`
ADD CONSTRAINT `projects_users_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `projects_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
ADD CONSTRAINT `works_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `works_log`
--
ALTER TABLE `works_log`
ADD CONSTRAINT `works_log_works_id_foreign` FOREIGN KEY (`works_id`) REFERENCES `works` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
