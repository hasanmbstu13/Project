-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2016 at 11:54 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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

DROP TABLE IF EXISTS `activations`;
CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(10, 10, 'e3muK2vB8JZySNiK8oYl7pfqYpOFgcMH', 1, '2016-02-23 07:00:17', '2016-02-23 07:00:17', '2016-02-23 07:00:17'),
(13, 13, 'IEYM9fFKVSktKg8MbbhKeV3b4gaxxpnj', 1, '2016-03-30 13:13:49', '2016-03-30 13:13:49', '2016-03-30 13:13:49'),
(15, 15, 'FmmKv17D4wqrVFBESVAKLhezM6f06tHU', 1, '2016-04-19 14:19:04', '2016-04-19 14:19:04', '2016-04-19 14:19:04'),
(16, 16, '6uBf0v58M14ZENansV7ACtgzgrU53UJx', 1, '2016-04-19 14:22:16', '2016-04-19 14:22:16', '2016-04-19 14:22:16'),
(17, 17, 'ETRmHD2xdVxnQ6Beq9F1H2QfsOr5yaEx', 1, '2016-04-19 14:23:53', '2016-04-19 14:23:53', '2016-04-19 14:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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

DROP TABLE IF EXISTS `persistences`;
CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=90 ;

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
(89, 17, 'FKDYjmf9yI2C7SK67NYpEnwWnfYdTMKn', '2016-04-27 11:53:29', '2016-04-27 11:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_no` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `project_text` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `project_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `leader_id` int(10) unsigned NOT NULL,
  `project_manager` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'created',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `projects_leader_id_foreign` (`leader_id`),
  KEY `projects_project_manager_foreign` (`project_manager`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_no`, `project_text`, `project_name`, `company_name`, `start_time`, `deadline`, `leader_id`, `project_manager`, `description`, `status`, `created_at`, `updated_at`) VALUES
(19, '0000', 'SQUA', 'Creds', 'square44', '0000-00-00 00:00:00', '2016-04-21 06:00:00', 15, 17, 'good work ninja', 'closed', '2016-04-19 14:24:53', '2016-04-20 12:57:09'),
(20, '1234', 'SASA', 'cards', 'sasa', '0000-00-00 00:00:00', '2016-04-21 06:00:00', 15, 17, '', 'development', '2016-04-19 16:26:54', '2016-04-20 12:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

DROP TABLE IF EXISTS `projects_users`;
CREATE TABLE IF NOT EXISTS `projects_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `projects_users_project_id_foreign` (`project_id`),
  KEY `projects_users_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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

DROP TABLE IF EXISTS `role_users`;
CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(10, 3, '2016-02-23 07:00:17', '2016-02-23 07:00:17'),
(13, 1, '2016-03-30 13:13:49', '2016-03-30 13:13:49'),
(15, 3, '2016-04-19 14:19:04', '2016-04-19 14:19:04'),
(16, 3, '2016-04-19 14:22:16', '2016-04-19 14:22:16'),
(17, 2, '2016-04-19 14:23:53', '2016-04-19 14:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

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
(103, 17, 'user', NULL, '2016-04-22 19:26:46', '2016-04-22 19:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `font_color` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#000000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`, `color_code`, `nick_name`, `font_color`) VALUES
(13, 'math@square44.com', '$2y$10$gXXCgosVHttEIXI8BB.99.Y2pfkDlQe079fEYz/n01dNO3akWfVTC', NULL, '2016-04-22 19:25:20', 'Mathijs', 'Aliet', '2016-03-30 13:13:49', '2016-04-22 19:25:20', '#FFFFFF', 'Math', '#000000'),
(15, 'latt@square44.com', '$2y$10$vb4LZpjuJPRuGvG0WTvVwOBhe8HFdxJWixr56bd9NRfoZH4Gym3.6', NULL, '2016-04-20 12:53:07', 'latt', 'Lek', '2016-04-19 14:19:04', '2016-04-20 12:53:07', '#F50DE7', 'latt', '#000000'),
(16, 'tomo@square44.com', '$2y$10$oJpuS.y51mJSK8Wmd/7Fae.ipvV1sr4EOdTWm3AnHN.3G1xzFZI8u', NULL, '2016-04-20 12:54:35', 'Tomo', 'Kku', '2016-04-19 14:22:16', '2016-04-20 12:54:35', '#EBFF00', 'TOMO', '#000000'),
(17, 'willy@square44.com', '$2y$10$upTDjLoznEKXD9SWFanu9OovbZSM8WPOKmC1uR577i.BQXq.KcwGO', NULL, '2016-04-27 11:53:29', 'willy', 'jan', '2016-04-19 14:23:53', '2016-04-27 11:53:29', '#FF0000', 'willy', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `assigned_hour` int(11) NOT NULL,
  `used_hour` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `next_deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `priority` smallint(6) NOT NULL,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'queued',
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `works_project_id_foreign` (`project_id`),
  KEY `works_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77 ;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `project_id`, `user_id`, `assigned_hour`, `used_hour`, `start_time`, `next_deadline`, `priority`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(72, 19, 15, 0, 0, '2016-04-19 06:00:00', '2016-04-22 05:59:59', 0, 'closed', 0, '2016-04-19 14:26:35', '2016-04-19 14:27:54'),
(73, 19, 16, 0, 0, '2016-04-19 06:00:00', '2016-04-22 05:59:59', 0, 'closed', 0, '2016-04-19 14:26:35', '2016-04-19 14:27:54'),
(74, 19, 16, 0, 0, '2016-04-19 06:00:00', '2016-04-22 05:59:59', 0, 'closed', 0, '2016-04-20 12:54:12', '2016-04-20 12:55:58'),
(75, 20, 15, 0, 0, '2016-04-20 06:00:00', '2016-04-23 05:59:59', 0, 'queued', 0, '2016-04-20 12:56:23', '2016-04-20 12:56:23'),
(76, 20, 16, 0, 0, '2016-04-20 06:00:00', '2016-04-23 05:59:59', 0, 'queued', 0, '2016-04-20 12:56:23', '2016-04-20 12:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `works_log`
--

DROP TABLE IF EXISTS `works_log`;
CREATE TABLE IF NOT EXISTS `works_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `works_id` int(10) unsigned NOT NULL,
  `started_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ended_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'started',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `works_log_works_id_foreign` (`works_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
