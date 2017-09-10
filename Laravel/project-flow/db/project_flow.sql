-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 09:51 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_flow`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(10, 10, 'e3muK2vB8JZySNiK8oYl7pfqYpOFgcMH', 1, '2016-02-23 07:00:17', '2016-02-23 07:00:17', '2016-02-23 07:00:17'),
(13, 13, 'IEYM9fFKVSktKg8MbbhKeV3b4gaxxpnj', 1, '2016-03-30 13:13:49', '2016-03-30 13:13:49', '2016-03-30 13:13:49'),
(15, 15, 'FmmKv17D4wqrVFBESVAKLhezM6f06tHU', 1, '2016-04-19 14:19:04', '2016-04-19 14:19:04', '2016-04-19 14:19:04'),
(16, 16, '6uBf0v58M14ZENansV7ACtgzgrU53UJx', 1, '2016-04-19 14:22:16', '2016-04-19 14:22:16', '2016-04-19 14:22:16'),
(17, 17, 'ETRmHD2xdVxnQ6Beq9F1H2QfsOr5yaEx', 1, '2016-04-19 14:23:53', '2016-04-19 14:23:53', '2016-04-19 14:23:53'),
(18, 18, 'BkbBdXeVew3wZ98yWU9CYZxfhMYCU1EO', 1, '2016-05-03 03:48:07', '2016-05-03 03:48:07', '2016-05-03 03:48:07'),
(19, 21, '12WXg93rbfq3dujeWRGvZ8WVUbClwc37', 1, '2016-05-03 04:14:17', '2016-05-03 04:14:17', '2016-05-03 04:14:17'),
(20, 23, '8gD3gUKoMn3RXwxGLXljO6XTV3hHF2sb', 1, '2016-05-06 03:42:50', '2016-05-06 03:42:50', '2016-05-06 03:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `leave_infos`
--

CREATE TABLE `leave_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number_of_days` double(8,2) NOT NULL,
  `leave_added_by` int(10) UNSIGNED NOT NULL,
  `leave_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_infos`
--

INSERT INTO `leave_infos` (`id`, `user_id`, `start_date`, `end_date`, `number_of_days`, `leave_added_by`, `leave_type`, `created_at`, `updated_at`) VALUES
(153, 15, '2016-10-08 04:55:00', '2016-10-14 06:52:00', 6.00, 18, 'annual', '2016-10-06 02:28:42', '2016-10-06 02:28:42'),
(156, 15, '2016-10-27 19:53:00', '2016-11-04 20:54:00', 7.00, 18, 'annual', '2016-10-06 03:42:53', '2016-10-06 03:42:53'),
(157, 15, '2016-10-15 00:00:00', '2016-10-27 00:00:00', 12.00, 18, 'annual', '2016-10-06 03:46:07', '2016-10-06 03:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
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
('2016_02_23_124928_add_fonts_color_to_users_table', 2),
('2016_05_05_102056_add_breif_number_to_works_table', 3),
('2016_05_18_095140_add_spent_hours_to_projects_table', 4),
('2016_05_19_063553_add_task_to_works_table', 5),
('2016_05_19_064540_add_works_id_to_works_log_table', 6),
('2016_07_29_114446_add_est_start_time_to_works_table', 7),
('2016_09_21_114639_create_leave_info_table', 8),
('2016_09_21_124415_add_leave_type_to_leave_info_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(98, 17, 'rrRji0ykFPDojcJhVH9TpkVUROr6ALUf', '2016-04-27 04:03:22', '2016-04-27 04:03:22'),
(99, 17, 'd5UsX88qDlpSEfd3PtVSHPirzzQvi9yc', '2016-04-27 05:43:36', '2016-04-27 05:43:36'),
(100, 17, 'BrPjPAZLgEu7NtI2Eg8rfpyN2MOTd3HD', '2016-04-28 01:40:38', '2016-04-28 01:40:38'),
(101, 17, 'MWgNWgdylGmWNgpm699LD0cEkOdH6211', '2016-04-29 01:54:54', '2016-04-29 01:54:54'),
(104, 17, 'xj545eH0v8TZdfXO8079OFzil376t6ke', '2016-05-02 02:34:04', '2016-05-02 02:34:04'),
(106, 17, 'kudOz4mFHnzZLqYBkxGeCKGsax0MSLxc', '2016-05-02 05:55:42', '2016-05-02 05:55:42'),
(107, 17, 'BozadD56nL4lEFZaGCJtlnA1tx6pscFb', '2016-05-02 23:57:47', '2016-05-02 23:57:47'),
(114, 17, 'JbBwf26GNGxPTqTg8pNrjpNis6QSohu7', '2016-05-03 06:25:39', '2016-05-03 06:25:39'),
(116, 17, 'qJKTxfd1KZrK4WZ4S6QkyxX9Vriv0Rwz', '2016-05-03 06:26:20', '2016-05-03 06:26:20'),
(117, 17, 'yIfQ8UHFpUk7KPbji8ASiEzkhEuF1T6e', '2016-05-04 00:10:21', '2016-05-04 00:10:21'),
(118, 17, 'A0SLFnd6i0cgF6cK4kw4xTdBPFw4bmZV', '2016-05-04 02:54:26', '2016-05-04 02:54:26'),
(119, 17, 'Pq6scr9PVZVpMWV9Ra8CV5lYPwU904N9', '2016-05-04 07:21:24', '2016-05-04 07:21:24'),
(120, 17, '1vSqCZfk6HdNkJUJoLsN1DO0KEW2gysk', '2016-05-05 00:12:43', '2016-05-05 00:12:43'),
(121, 17, '78Dg8Xc7vR0txmJJS76YEZwifEw7Cxs4', '2016-05-05 01:01:28', '2016-05-05 01:01:28'),
(122, 17, 'OYaJWCVTWoKPZV0z1oD0HxiNN159CgFa', '2016-05-05 01:35:04', '2016-05-05 01:35:04'),
(123, 17, '4Mn5m1dBNfry7mUIKoQVOf4fvgmaIh52', '2016-05-05 01:36:04', '2016-05-05 01:36:04'),
(125, 17, 'mU5bjlBGwZXygfsCTAzRdQUxCA1gQNx7', '2016-05-05 01:38:06', '2016-05-05 01:38:06'),
(132, 21, 'm6C2DmKL5lunGVN4r8aEuiI2Ldno4BGT', '2016-05-06 03:49:57', '2016-05-06 03:49:57'),
(133, 21, 'rSvlua8U6UORev7lLSGbauyItPBjNW1Z', '2016-05-06 06:14:09', '2016-05-06 06:14:09'),
(135, 21, '3BgmXT2Y8EJ6I7WzozB6CBvTDseZlVGi', '2016-05-12 01:43:47', '2016-05-12 01:43:47'),
(138, 21, 'dRPCFktEGU6yLVcVfJL1l4lgp9CmrX9Y', '2016-05-12 04:09:00', '2016-05-12 04:09:00'),
(145, 18, 'FJPLz7Y5llrOaPOkfUXdxNyyWlWDRAz7', '2016-05-12 07:57:08', '2016-05-12 07:57:08'),
(156, 13, 'zqtOi86fpi6PVcuqFzvqd7af1sS3ctZB', '2016-05-13 03:52:23', '2016-05-13 03:52:23'),
(159, 18, 'soUI9aw7MVzeSNmFxUrnjut9O3S0nU2t', '2016-05-13 04:03:47', '2016-05-13 04:03:47'),
(161, 18, 'hK9qKQDVPtGh1ONdcvd0Jpx0GTGXDwi6', '2016-05-13 05:00:11', '2016-05-13 05:00:11'),
(178, 21, 'UelSILSvukPs6kmDGdRjBk2um7j44YNS', '2016-05-13 07:36:45', '2016-05-13 07:36:45'),
(180, 18, 'jKTUyZNYRP0Oc7qYbLqVPzfF6vWIG2H3', '2016-05-16 06:12:05', '2016-05-16 06:12:05'),
(181, 17, 'hKMcrhq2hRhaFivUIMzzjsVxEc1W38Uq', '2016-05-16 23:34:50', '2016-05-16 23:34:50'),
(186, 21, 'ZhNKuM3HV1h3TXa5YQslV2keCvxcR4XG', '2016-05-17 05:35:23', '2016-05-17 05:35:23'),
(189, 21, 'Yf9fiCictBR52qvXCHe5xnHnXPzDxeLo', '2016-05-18 02:23:55', '2016-05-18 02:23:55'),
(194, 21, 'JGpCQ44Xy7BbZG9q5fqXzQc7nFJAhMsn', '2016-05-19 02:16:10', '2016-05-19 02:16:10'),
(199, 21, 'g7U9ZYK3QBk8AxTjABAlf0qyTBxcjVOS', '2016-05-19 07:11:19', '2016-05-19 07:11:19'),
(201, 21, 'WAL1LEAoWoXyi0UoZvb6ItO4wIK1mMZO', '2016-05-20 02:25:01', '2016-05-20 02:25:01'),
(203, 18, 'Nn2DAsfo9KBDSwjcQ6luVhhrMHZKs0ge', '2016-05-20 06:19:04', '2016-05-20 06:19:04'),
(207, 21, '4cj6O3J0lo1RHL0kQwhfeRSYNQpIfrAS', '2016-05-24 00:34:29', '2016-05-24 00:34:29'),
(211, 21, 'QTgHUnF2LDAEVDaEjDJOoLAZbRuWloAO', '2016-05-24 05:08:34', '2016-05-24 05:08:34'),
(212, 18, 'OlYIaZ5FCcnNso7UHGKoViBRnBJtoNZY', '2016-05-25 00:54:42', '2016-05-25 00:54:42'),
(213, 18, 'zlqQ2dBoTxqJX4rEi5uHYhz6pRlvj63L', '2016-05-25 00:54:57', '2016-05-25 00:54:57'),
(214, 18, '7sZsjTc7JIixXvHxmMZMtYp5W2xLnxy9', '2016-05-25 00:55:02', '2016-05-25 00:55:02'),
(215, 18, 'RQsSyj6S3VEewDK9gMx6qPg77lf5iZ5x', '2016-05-25 00:55:09', '2016-05-25 00:55:09'),
(216, 18, 'foWXsz9HuVzRkmAZTnRUCmmpELCM2JDR', '2016-05-25 00:57:51', '2016-05-25 00:57:51'),
(217, 18, 'V2ucgt4Gw8pA129o1YkgIiFXk3HqBbkU', '2016-05-25 00:59:04', '2016-05-25 00:59:04'),
(218, 18, 'wakwFcBVTVRDhNjf82X9sw3nsF4hBHl9', '2016-05-25 00:59:07', '2016-05-25 00:59:07'),
(219, 18, 'LUAuzX9wlrzoGhgphKSi56iWufKY31xw', '2016-05-25 07:43:08', '2016-05-25 07:43:08'),
(220, 18, 'c00W02LfwpH3mR7aGfdxnJRrtET8V50w', '2016-05-27 02:22:48', '2016-05-27 02:22:48'),
(221, 18, 'QMlTmkJ5QEqh02X07GNhee8gEmsCaQlQ', '2016-05-30 00:04:38', '2016-05-30 00:04:38'),
(228, 18, 'ITGTh6EsMCma6Oc1TmzDyDSNT83sF1nc', '2016-05-31 06:34:18', '2016-05-31 06:34:18'),
(231, 18, 'Pe2JiH45qPl0JErA5pIsXGhgTjIUtEjM', '2016-06-01 04:38:41', '2016-06-01 04:38:41'),
(232, 13, 'ICejQTy0gZhkMeYmhmrXrFFaW2oFIQA2', '2016-06-02 05:41:02', '2016-06-02 05:41:02'),
(235, 18, 'tKerzSgQ3mcbjQZPD8vf4qNmvnu4juVv', '2016-06-13 05:33:19', '2016-06-13 05:33:19'),
(236, 18, 'qXODDghbNgd821ybA7Zp847D79DeW6Id', '2016-06-13 06:48:07', '2016-06-13 06:48:07'),
(240, 21, 'LYGklTSvKPadyn4hHKuFh5uzWavff81g', '2016-06-14 05:10:46', '2016-06-14 05:10:46'),
(241, 18, 'QnkCrhnsFMXsL5zdUBsgZ43Ut9N68plE', '2016-06-15 01:58:26', '2016-06-15 01:58:26'),
(242, 18, 'iG24INUwJQPSQXmQyZACLzMymNTF7ARw', '2016-06-15 05:47:08', '2016-06-15 05:47:08'),
(243, 18, 'SzmCv6AekqFEvJMezyE7vAnui5KihGlr', '2016-06-15 05:48:49', '2016-06-15 05:48:49'),
(244, 18, 'doWbh7shM1HlcPNWxqLdcikRldSnKmBu', '2016-06-15 23:56:30', '2016-06-15 23:56:30'),
(245, 18, 'lz6CpuACOx1XOvkCt6S1XuEhC5mofrdl', '2016-06-17 02:07:44', '2016-06-17 02:07:44'),
(246, 17, 'MawhcXjSIOVVvNMAmo4WUNX1OjAyTkLt', '2016-06-19 23:47:03', '2016-06-19 23:47:03'),
(247, 18, 'A7wx7uO7Q4L2VUF2gMpVBkmNNrpdRRJj', '2016-06-20 00:07:54', '2016-06-20 00:07:54'),
(248, 17, 'wi2pM70rQfjqKQekYnUy0YGNrZCUawtx', '2016-06-20 06:42:07', '2016-06-20 06:42:07'),
(250, 18, 'e5GqtkkOC3V9FsKpfenCL0UKTjaZYLhI', '2016-06-21 01:50:57', '2016-06-21 01:50:57'),
(253, 21, 'IJ8SgddlqB1Zru15rNBEqxnSfZcFLaVp', '2016-06-21 05:06:13', '2016-06-21 05:06:13'),
(255, 21, 'AFLvMjNQZHHanX9djQdwtlyYhLs77eAo', '2016-06-21 23:58:40', '2016-06-21 23:58:40'),
(257, 18, '87hmSA0QUyNoD5JqWkwjVLxGGyALlvwv', '2016-06-22 04:18:17', '2016-06-22 04:18:17'),
(258, 18, 'xUYUCXG8ljgc2it0CozgBFeyJwjxY0EV', '2016-06-27 23:50:30', '2016-06-27 23:50:30'),
(259, 18, 'lc1GQfZnLUmPdLkTgwvTx4lEeAhE7Nat', '2016-06-29 06:42:41', '2016-06-29 06:42:41'),
(279, 13, 'CXQZe20j9P9cQxGJ7Va5xi76uvP4Cf68', '2016-06-30 06:43:08', '2016-06-30 06:43:08'),
(292, 18, 'xEsgJIIQ17VHQR7do0zLHXSGLndrhGvg', '2016-07-01 06:30:48', '2016-07-01 06:30:48'),
(293, 13, '6RozZx2xK8rbMXmV6nt3zxoXt2bvfqth', '2016-07-11 03:37:40', '2016-07-11 03:37:40'),
(294, 18, 'BfZFirw8V5iPOOdz3TBCWnCG3E8W5wOE', '2016-07-11 03:39:57', '2016-07-11 03:39:57'),
(295, 13, 'TObjjYpisgazyJNZCxWIBvXBBji29hez', '2016-07-11 03:40:32', '2016-07-11 03:40:32'),
(296, 18, '83eZ67bV7yNItbSSz83VR2A12nDpdNyX', '2016-07-11 04:51:38', '2016-07-11 04:51:38'),
(298, 21, '7qExZX7KaOAosf02hB9qWk8Q8QPRVd3Z', '2016-07-11 05:04:25', '2016-07-11 05:04:25'),
(299, 18, 'XXTjfTPPHMDFu22ehROXINnzQE5knkGy', '2016-07-11 05:05:35', '2016-07-11 05:05:35'),
(300, 18, 'pDOcHRXf7oEgCsW9tpko5bZPkuEPorh4', '2016-07-11 23:53:08', '2016-07-11 23:53:08'),
(302, 13, 'eaX1RqnLdbvoeXJGOEIRm9rKSMgCc0x3', '2016-07-12 00:59:57', '2016-07-12 00:59:57'),
(305, 18, 'ztROvWNXatcQw4ztiZvEZRTvJ1AQfrBc', '2016-07-12 06:51:16', '2016-07-12 06:51:16'),
(306, 18, 'f6nXVJO2nrKDoXCMFsXshLo4VAA7vsCj', '2016-07-12 07:18:22', '2016-07-12 07:18:22'),
(307, 13, 'salhvsQCdjBGhBN6oAXx5TM2kQmSAjyw', '2016-07-13 00:09:53', '2016-07-13 00:09:53'),
(309, 13, 'wphIxlR8b1zmOis6k5J5crG9wDafISND', '2016-07-13 03:58:17', '2016-07-13 03:58:17'),
(310, 13, 'nEBYVSI9bWJ6Zlbmk4EWCKSPBhZ309Sm', '2016-07-13 06:05:04', '2016-07-13 06:05:04'),
(312, 21, 'okWdVxYvES80vSyR3k4U1dUall3hCDOI', '2016-07-13 23:50:12', '2016-07-13 23:50:12'),
(320, 13, 'J9rtwej0o2Bhq0fha0gcJUrzzbQWkmvF', '2016-07-14 02:51:08', '2016-07-14 02:51:08'),
(325, 13, 'FuJuxo0VnCkppNAiEXvzehjzvJepNJy9', '2016-07-14 07:26:07', '2016-07-14 07:26:07'),
(326, 13, '3g2UsNDFHwyUvmoYypnsn4y0Jydf3hCW', '2016-07-14 08:09:31', '2016-07-14 08:09:31'),
(327, 13, 'g05JYh1pvfv81M8iyxDJsJKdvKQczpp3', '2016-07-15 02:18:43', '2016-07-15 02:18:43'),
(328, 13, 'xoEjP6eOUmK1Z7QrAoJz3RT5tHhEg0kM', '2016-07-15 03:36:56', '2016-07-15 03:36:56'),
(330, 17, '4Tul0otMC7hxL0XhBA0htPPbbSqZZtnx', '2016-07-15 05:54:06', '2016-07-15 05:54:06'),
(331, 13, '6JpBAqEV9xcO7Nzw1cRnmP7KKpj4Rxxc', '2016-07-15 05:58:49', '2016-07-15 05:58:49'),
(333, 13, 'zoBU6eXISvSc60N2GKYjt24loikKCy6H', '2016-07-15 06:17:22', '2016-07-15 06:17:22'),
(335, 21, 'dBq8zcwSygUHc8NK10ghxfDBD5o7LgQ9', '2016-07-15 08:06:52', '2016-07-15 08:06:52'),
(341, 13, '9wlGT1r1ZCppcOzp1LMzODmdb6Jxfeow', '2016-07-19 04:14:10', '2016-07-19 04:14:10'),
(352, 13, 'UWRnUdbLlK8DNSEPltvtThvxvvAtMwTT', '2016-07-19 06:43:51', '2016-07-19 06:43:51'),
(353, 13, 'b49QAoeaZjrjkOWimSknKY9VOeECyLRb', '2016-07-20 00:53:02', '2016-07-20 00:53:02'),
(354, 13, 'TSdH4RA8kuXbv9VKKgvQTg42eJCSEyh0', '2016-07-20 04:15:03', '2016-07-20 04:15:03'),
(355, 18, 'B3kQL2GWvlQW4MQhSlKKOpb9e0wcqpdg', '2016-07-21 01:54:48', '2016-07-21 01:54:48'),
(357, 13, 'hbhnO8DhSEb9Df1BwH3h8Iahyk83hVvF', '2016-07-21 06:18:02', '2016-07-21 06:18:02'),
(358, 18, 'b4ae9OEgxkiZE4TlzbgfJAoUTkGtWDFA', '2016-07-25 03:24:51', '2016-07-25 03:24:51'),
(359, 17, 'tqyxa8DPrMqbZfQYGsGels6ZAa1cj7Pw', '2016-07-26 02:05:43', '2016-07-26 02:05:43'),
(360, 18, 'DYavVSSwtn16uGXUMoWsLqHz9hMeuUDD', '2016-07-26 06:44:40', '2016-07-26 06:44:40'),
(363, 18, 'K1DrOxYlocRUIUV16WlfoE1hvplx7FcT', '2016-07-29 06:30:23', '2016-07-29 06:30:23'),
(365, 13, 'AMLUtZhX0sPHgCHOJgLvq6YCHfK2MyuV', '2016-08-01 06:15:49', '2016-08-01 06:15:49'),
(366, 13, 'IVamKWpHuZZw0hqgZGiCCv5A2NcwnNAB', '2016-08-01 06:26:11', '2016-08-01 06:26:11'),
(368, 17, 'PeOGyw5xVrIwo3FHopJ5at1kSyX0mfmQ', '2016-08-01 07:12:55', '2016-08-01 07:12:55'),
(373, 18, 'vqx8Rw5aSFuqK3ffa622Al1slW91c6zS', '2016-08-01 08:08:49', '2016-08-01 08:08:49'),
(377, 13, 'GMS47ULLywipG0PzCGWosKTt7teqPSRF', '2016-08-02 00:58:45', '2016-08-02 00:58:45'),
(383, 18, 'YodMf9oyOJOy7W8gJEjULESJK3FBp74G', '2016-08-02 04:35:08', '2016-08-02 04:35:08'),
(386, 18, 'DWAs5KISn48Ums1xbB6i9CnBMhd6g1RY', '2016-08-02 05:00:35', '2016-08-02 05:00:35'),
(388, 21, 'FISfEaH02YCeh4dQXM3JBVUip8muiIlc', '2016-08-02 07:10:09', '2016-08-02 07:10:09'),
(389, 21, '6X2H98rtNVAhz477Zvi37KUshg3xNsSi', '2016-08-02 07:19:35', '2016-08-02 07:19:35'),
(390, 21, 'd6SsAF08QazarB2ZeQp5eewZvrxrF7Ay', '2016-08-02 07:21:42', '2016-08-02 07:21:42'),
(391, 18, 'JvbVNRsRLsABW3RpK9LcoADqe72hSqBy', '2016-08-02 23:53:59', '2016-08-02 23:53:59'),
(392, 18, 'nJj9E3xjFXoOqaNPNPZN8g1zlhRPIS5a', '2016-08-03 00:48:51', '2016-08-03 00:48:51'),
(393, 18, 'KzpUDonhHEdwk0AOL5vq2DdQrjyaEeEu', '2016-08-03 02:48:28', '2016-08-03 02:48:28'),
(394, 18, 'OyPZ3gQtIz0NwW8oEacEzy0SAFGoX1ZT', '2016-08-03 03:34:44', '2016-08-03 03:34:44'),
(406, 21, 'sqw6F8daFNiW49NClFwOr4xGQZpQJbWX', '2016-08-03 04:15:29', '2016-08-03 04:15:29'),
(411, 18, 'EXtzQ40pNRBxA4qAPRH0NcvUuRFji7TF', '2016-08-03 07:19:47', '2016-08-03 07:19:47'),
(412, 18, 'Z7mEuhRClL0DCx6k6EPXmAzLP9lg8gtJ', '2016-08-03 07:25:06', '2016-08-03 07:25:06'),
(413, 18, 'LZA2cLkrFKcPZXv7l3kgFR1Se4UK8G2r', '2016-08-03 07:25:23', '2016-08-03 07:25:23'),
(414, 18, 'vFDngWgjCfa3Y326gVbMalSf5C403Xhr', '2016-08-03 07:25:32', '2016-08-03 07:25:32'),
(415, 18, 'Z4GIcFeZGdI6uhC4XPxlRrnuRo3897fv', '2016-08-03 07:28:43', '2016-08-03 07:28:43'),
(416, 18, 'zl0OREUhWkRdhbcm3g1cFWZjXKs34YLK', '2016-08-03 08:38:36', '2016-08-03 08:38:36'),
(422, 21, 'sN76O0P1LeNozAqTQH0uuDClB7XrUM30', '2016-08-04 01:53:39', '2016-08-04 01:53:39'),
(427, 18, 'vzlj7ogyBnnw2ZHAvctzjWVUXoRhLMPW', '2016-08-04 04:09:43', '2016-08-04 04:09:43'),
(435, 13, '9xh5SLWUU9XFsTjjxs2yzXv9NqDQgmoC', '2016-08-04 05:33:54', '2016-08-04 05:33:54'),
(436, 13, 'qja76fK29Z5iSI7Ek9P4e7nGDHo7oZir', '2016-08-04 05:58:53', '2016-08-04 05:58:53'),
(437, 13, 'uWPrqHdHJTamDprdfEeMMxMLh6mDlWda', '2016-08-04 06:10:06', '2016-08-04 06:10:06'),
(438, 13, 'Mjd10aZphbautIr7BVdU9fZDD5p4kpYz', '2016-08-04 07:21:19', '2016-08-04 07:21:19'),
(439, 13, 'IjhJt3n5FS9pd4Yql9K2XvTKeJWxUcrQ', '2016-08-04 07:21:25', '2016-08-04 07:21:25'),
(440, 13, 'M44ai1srzULvNmh9UnCuRh4w2wZfNCqO', '2016-08-04 08:11:10', '2016-08-04 08:11:10'),
(444, 21, '6gGzrIT3N47j9TxSMz7wEbfztiGT2Zch', '2016-08-05 02:29:32', '2016-08-05 02:29:32'),
(446, 21, '0kbMyZrnnQL7OUUFqy0nJA33qil2Eo1x', '2016-08-05 04:06:32', '2016-08-05 04:06:32'),
(447, 21, 'K6VQIONZ68g3zyLX2iRKxkSi5J2COxgF', '2016-08-05 04:12:27', '2016-08-05 04:12:27'),
(448, 21, 'i41ja5Eoq4FmqiZ5Smuaxfr9xjmRZNvY', '2016-08-05 06:18:28', '2016-08-05 06:18:28'),
(451, 21, 'sST7cHz36t3ip2FgTjPkNXEj64ihDG8z', '2016-08-05 06:44:19', '2016-08-05 06:44:19'),
(454, 21, 'ehqfEplJPVt5rGHRhvotdjtnRskEAQaF', '2016-08-05 07:16:33', '2016-08-05 07:16:33'),
(462, 21, 'X7upECHXeza7MUk8Ms55KPbHs2wZ1a1o', '2016-08-05 09:39:27', '2016-08-05 09:39:27'),
(466, 18, 'cBt1jVzxO5ADQvBz3CDW6g8irWDldRJm', '2016-08-09 04:51:50', '2016-08-09 04:51:50'),
(470, 13, 'nD67rxUBdWPbyDOfziwSId8asLfz07HE', '2016-08-10 00:32:50', '2016-08-10 00:32:50'),
(471, 13, 'qtvOSPSIrP0PipkoAKWUAQtkeSzqhiXV', '2016-08-11 06:09:52', '2016-08-11 06:09:52'),
(473, 18, '1uQYYLFPXfbmavPyqURiZCMF8HddhGit', '2016-08-12 04:06:49', '2016-08-12 04:06:49'),
(475, 21, 'Z5BKfCmNga97o2Bze2KBXyei4U3Ixxe3', '2016-08-12 07:47:27', '2016-08-12 07:47:27'),
(476, 21, 'UrB3ZDvsZ8IMSJ1hGGq6wql8xRcyOU7a', '2016-08-12 07:50:04', '2016-08-12 07:50:04'),
(490, 18, 'HOzILlpveRoDqlH8UXVprfchhTzw1V73', '2016-08-12 08:55:16', '2016-08-12 08:55:16'),
(492, 18, 'JwE01omINMHWoxtxKxZxNnhQ1bwvM8gA', '2016-08-12 09:17:23', '2016-08-12 09:17:23'),
(493, 18, 's9nZlFSitP2DBbGQfgWP5MhlM3I9YG0s', '2016-08-12 09:21:11', '2016-08-12 09:21:11'),
(494, 17, 'aBqaOs4MX1boxwiyr866veMlRaumaz8a', '2016-08-24 05:51:48', '2016-08-24 05:51:48'),
(495, 13, 'xHOAnwdQnKCvYaL3wwIuxSNk933Qzqph', '2016-08-24 06:26:21', '2016-08-24 06:26:21'),
(498, 13, 'rVCoEuokNU03P6jkKM5YjeyeOrknTtTl', '2016-08-24 23:59:58', '2016-08-24 23:59:58'),
(500, 21, 'fO2cvxnMGDxOTpLp10GYiMTZ2Rm9nd4z', '2016-08-25 00:36:56', '2016-08-25 00:36:56'),
(520, 13, 'CUhFtfK6r2ZtOxRaAnDR7ox0DvTBxMTx', '2016-09-05 09:05:59', '2016-09-05 09:05:59'),
(521, 18, 'BXugMi4Q3W4PHm6pQlCL0CML3Db9AMRY', '2016-09-05 23:38:45', '2016-09-05 23:38:45'),
(522, 18, 'oFhb5cZSxfCNFSvZT48LuvtQXbdpSCio', '2016-09-06 00:10:24', '2016-09-06 00:10:24'),
(523, 18, '6fkEzWjsVSNYsJZyhHWEOClcKgmZsSNd', '2016-09-06 02:01:09', '2016-09-06 02:01:09'),
(524, 18, 'WnXO8HIHDcOswNHR3A0ZWj9LpIhkQeLE', '2016-09-06 02:11:47', '2016-09-06 02:11:47'),
(526, 18, '2H4y1Xv7ARQ05wxO2MwWXus7HhzxgHxn', '2016-09-06 02:46:46', '2016-09-06 02:46:46'),
(527, 18, 'EO2Ot7ccR2iPWLZm8HPfGcgQiI2iokub', '2016-09-06 03:27:26', '2016-09-06 03:27:26'),
(528, 18, 'zISh2b5rnft4SXB8uQA334ip0laqhaXC', '2016-09-06 04:44:12', '2016-09-06 04:44:12'),
(530, 13, 'N5TZY2abj6kQN6f4d1jjXMX4dJdClY1W', '2016-09-06 05:33:45', '2016-09-06 05:33:45'),
(532, 18, 'Crc8mz3vStM2XeAisIUwxBekyW9p95JX', '2016-09-07 00:17:15', '2016-09-07 00:17:15'),
(533, 18, 'zyBratjbeJiJOpJXgnRWu3hXXWxeHbMg', '2016-09-07 00:35:15', '2016-09-07 00:35:15'),
(538, 13, 'KDS0OykRE3BXpO8IG9H1v6i8yJlOeA7Y', '2016-09-07 07:21:28', '2016-09-07 07:21:28'),
(540, 21, 'BKFzHI9fH5s806qu0PExVL2mHkKNhBeT', '2016-09-09 02:26:36', '2016-09-09 02:26:36'),
(541, 21, 'CKQ872NWC6BYQUK0IIey0ltIYbeIajVr', '2016-09-09 03:03:36', '2016-09-09 03:03:36'),
(542, 18, 'DZsIJUxZgeSylJ5WUcRvYg1ZioFChzbE', '2016-09-19 00:02:19', '2016-09-19 00:02:19'),
(545, 18, 'JU1IIKteFPXIqBH931pfIQX5r215C0Vv', '2016-09-19 01:43:20', '2016-09-19 01:43:20'),
(546, 18, 'gUYrYXwYKgoXpVHRlwgYYAd8xqWz2URu', '2016-09-19 02:33:31', '2016-09-19 02:33:31'),
(547, 18, 'NjfWSD996LhgLMJL5yQAKILIR9KVAb6D', '2016-09-19 02:47:06', '2016-09-19 02:47:06'),
(549, 21, 'ua17QHQIKygbr5efqLHZZAUWqDbcefZZ', '2016-09-19 02:49:18', '2016-09-19 02:49:18'),
(550, 18, 'TwfPW3w3Az6tbwq5reHNp8ECaUFGpPX3', '2016-09-19 06:55:15', '2016-09-19 06:55:15'),
(551, 17, '3dZCfcxbyjn8LjNXLz6hZZsHgKyDtnwC', '2016-09-19 06:55:32', '2016-09-19 06:55:32'),
(552, 18, 'CpJz7OtPX6SwVOuGDq5uvJkxMXregkm1', '2016-09-21 06:49:15', '2016-09-21 06:49:15'),
(553, 17, 'glAeUysqusZcnmedwm39GC194l2eEuZR', '2016-09-21 06:49:30', '2016-09-21 06:49:30'),
(554, 18, 'GSEEQjUorSg7McNtZewpu6sCdHJt33SN', '2016-09-22 00:01:25', '2016-09-22 00:01:25'),
(555, 18, 'f48xBvQ1PBUZqKaMB2Jl7RjJTZnCeu5D', '2016-09-22 03:51:06', '2016-09-22 03:51:06'),
(556, 18, 'aSPwfNsvhuY0vMy0Ms24daXatIfyIQlR', '2016-09-22 08:04:30', '2016-09-22 08:04:30'),
(557, 18, 'JwckM5TraaUZynNQRLoibdKSqqWeIqqD', '2016-09-23 02:36:00', '2016-09-23 02:36:00'),
(558, 18, 'XS78CDVwztunA0r1dukyCJ9AawhSuGlM', '2016-09-23 03:44:16', '2016-09-23 03:44:16'),
(559, 18, 'DphMfDAarRUywf31YWVxDdL3YDKfC9b1', '2016-09-23 06:27:19', '2016-09-23 06:27:19'),
(560, 18, 'ZrqD7OPr043b3L4g690ycFwt26BBaYQz', '2016-09-27 02:23:58', '2016-09-27 02:23:58'),
(561, 18, 'S1LTwyL57nNrVw1VZD74kN45fEjG7lNO', '2016-09-27 03:26:34', '2016-09-27 03:26:34'),
(562, 18, 'eWoJ6Tbfnr7NipJonYVQiCzJSFGMkAaR', '2016-09-27 07:33:27', '2016-09-27 07:33:27'),
(563, 18, 'Y9yPQk1DJa3uEEFEPnIT9XL1ozWeFmr2', '2016-09-27 23:45:01', '2016-09-27 23:45:01'),
(564, 18, 'IHDKhRBuyCaIYYiYbfUL1jigchrYRBgl', '2016-09-28 02:39:48', '2016-09-28 02:39:48'),
(565, 18, 'ZBl4rr2PSosagvNsJUIKyVZZF1iNHNpX', '2016-09-29 02:28:57', '2016-09-29 02:28:57'),
(567, 18, 'pTdwAX9RidOkjcIdGEqrDMRpit1lWtCb', '2016-10-03 04:00:18', '2016-10-03 04:00:18'),
(568, 18, 'Js8hf4gadzxkVXme3sljeIRav73TSpRn', '2016-10-03 05:19:28', '2016-10-03 05:19:28'),
(569, 18, 'Q0wGCLflbBnTyQW1iB4Tra4lqOag1ui0', '2016-10-04 23:36:16', '2016-10-04 23:36:16'),
(570, 18, 'IlRDwXt6qrD4kVlXSTugKf2cxlFiGkng', '2016-10-06 00:30:16', '2016-10-06 00:30:16'),
(571, 18, 'FNIgWMDYzACLph9godIrEQjCHZyLJmlt', '2016-10-17 00:36:01', '2016-10-17 00:36:01'),
(572, 17, 'X9ZNTOt28kARGS3pSGfDPjfVtSRBaVZg', '2016-10-17 07:25:44', '2016-10-17 07:25:44'),
(573, 17, 'ReUNMPipyUEc17q0ANgompIbARXrP1IZ', '2016-10-20 00:39:57', '2016-10-20 00:39:57'),
(575, 21, '2XOuJzc4EopxYBtGaxn0dZCU2LBLmv88', '2016-10-28 02:10:02', '2016-10-28 02:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_no` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `project_text` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `project_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `leader_id` int(10) UNSIGNED NOT NULL,
  `project_manager` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `spent_hours` decimal(11,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_no`, `project_text`, `project_name`, `company_name`, `start_time`, `deadline`, `leader_id`, `project_manager`, `description`, `status`, `created_at`, `updated_at`, `spent_hours`) VALUES
(1, '123', 'lar', '123 Laravel', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 21, 18, '', 'development', '2016-09-05 23:50:34', '2016-10-17 02:14:31', '15.25000'),
(2, 'ghh', 'hgd', 'ghd', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 17, '', 'completed', '2016-09-07 03:16:13', '2016-09-07 07:22:20', '0.00000'),
(3, 'dsaf', 'dsfaf', 'dsafaf', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 17, '', 'completed', '2016-09-07 03:16:23', '2016-09-07 07:22:20', '0.00000'),
(4, 'dfaf', 'dsfasf', 'dsfasfaf', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 18, '', 'development', '2016-09-07 03:16:34', '2016-09-07 07:22:20', '0.00000'),
(5, 'dsfa', 'asdff', 'asdfaf', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 18, '', 'completed', '2016-09-07 03:17:00', '2016-10-17 02:05:50', '0.00000'),
(6, 'fdgd', 'fgsdg', 'fdgsdg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 18, '', 'default', '2016-09-07 03:17:17', '2016-09-07 07:22:20', '0.00000'),
(7, 'dsfa', 'sadfasfa', 'dsafsfas', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 17, '', 'feedback', '2016-09-07 03:17:29', '2016-09-07 07:22:20', '0.00000'),
(8, 'rewq', 'erweqr', 'ewrwq', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 18, '', 'feedback', '2016-09-07 03:17:44', '2016-09-07 07:22:20', '0.00000'),
(9, 'dfsa', 'sdafaf', 'dsfasfsafewqrewqr', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 18, '', 'completed', '2016-09-07 03:18:00', '2016-10-17 02:06:31', '0.00000'),
(10, 'iyuo', 'iuoyu', 'uiomhnydrgfd ', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 17, '', 'default', '2016-09-07 03:18:18', '2016-09-07 07:22:20', '0.00000'),
(11, 'dasf', 'dsfafaf', 'asdrewqr', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 18, '', 'default', '2016-09-07 03:18:31', '2016-09-07 07:22:20', '0.00000'),
(12, 'dsaf', 'ewrwqrwe', 'dsafsaf', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 17, '', 'completed', '2016-09-07 03:18:45', '2016-10-17 00:52:11', '0.00000');

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE `projects_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 16, '2016-09-05 23:50:34', '2016-09-05 23:50:34'),
(2, 1, 21, '2016-09-05 23:50:34', '2016-09-05 23:50:34'),
(3, 2, 16, '2016-09-07 03:16:13', '2016-09-07 03:16:13'),
(4, 2, 21, '2016-09-07 03:16:13', '2016-09-07 03:16:13'),
(5, 3, 21, '2016-09-07 03:16:24', '2016-09-07 03:16:24'),
(6, 4, 16, '2016-09-07 03:16:34', '2016-09-07 03:16:34'),
(7, 5, 21, '2016-09-07 03:17:00', '2016-09-07 03:17:00'),
(8, 6, 16, '2016-09-07 03:17:17', '2016-09-07 03:17:17'),
(9, 7, 21, '2016-09-07 03:17:29', '2016-09-07 03:17:29'),
(10, 8, 16, '2016-09-07 03:17:44', '2016-09-07 03:17:44'),
(11, 9, 16, '2016-09-07 03:18:00', '2016-09-07 03:18:00'),
(12, 9, 21, '2016-09-07 03:18:00', '2016-09-07 03:18:00'),
(13, 10, 16, '2016-09-07 03:18:18', '2016-09-07 03:18:18'),
(14, 11, 16, '2016-09-07 03:18:31', '2016-09-07 03:18:31'),
(15, 12, 16, '2016-09-07 03:18:45', '2016-09-07 03:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
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

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
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
(18, 2, '2016-05-03 03:48:07', '2016-05-03 03:48:07'),
(21, 3, '2016-05-03 04:14:17', '2016-05-03 04:14:17'),
(23, 1, '2016-05-06 03:42:50', '2016-05-06 03:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(104, NULL, 'global', NULL, '2016-04-29 02:16:52', '2016-04-29 02:16:52'),
(105, NULL, 'ip', '127.0.0.1', '2016-04-29 02:16:52', '2016-04-29 02:16:52'),
(106, NULL, 'global', NULL, '2016-05-02 05:31:49', '2016-05-02 05:31:49'),
(107, NULL, 'ip', '127.0.0.1', '2016-05-02 05:31:49', '2016-05-02 05:31:49'),
(108, 13, 'user', NULL, '2016-05-02 05:31:49', '2016-05-02 05:31:49'),
(109, NULL, 'global', NULL, '2016-05-02 05:31:51', '2016-05-02 05:31:51'),
(110, NULL, 'ip', '127.0.0.1', '2016-05-02 05:31:51', '2016-05-02 05:31:51'),
(111, NULL, 'global', NULL, '2016-05-02 05:32:02', '2016-05-02 05:32:02'),
(112, NULL, 'ip', '127.0.0.1', '2016-05-02 05:32:02', '2016-05-02 05:32:02'),
(113, NULL, 'global', NULL, '2016-05-02 05:32:09', '2016-05-02 05:32:09'),
(114, NULL, 'ip', '127.0.0.1', '2016-05-02 05:32:09', '2016-05-02 05:32:09'),
(115, NULL, 'global', NULL, '2016-05-02 05:33:52', '2016-05-02 05:33:52'),
(116, NULL, 'ip', '127.0.0.1', '2016-05-02 05:33:52', '2016-05-02 05:33:52'),
(117, 13, 'user', NULL, '2016-05-02 05:33:52', '2016-05-02 05:33:52'),
(118, NULL, 'global', NULL, '2016-05-06 03:43:03', '2016-05-06 03:43:03'),
(119, NULL, 'ip', '127.0.0.1', '2016-05-06 03:43:03', '2016-05-06 03:43:03'),
(120, NULL, 'global', NULL, '2016-05-06 03:43:16', '2016-05-06 03:43:16'),
(121, NULL, 'ip', '127.0.0.1', '2016-05-06 03:43:16', '2016-05-06 03:43:16'),
(122, NULL, 'global', NULL, '2016-05-13 03:50:16', '2016-05-13 03:50:16'),
(123, NULL, 'ip', '127.0.0.1', '2016-05-13 03:50:17', '2016-05-13 03:50:17'),
(124, NULL, 'global', NULL, '2016-05-13 03:50:39', '2016-05-13 03:50:39'),
(125, NULL, 'ip', '127.0.0.1', '2016-05-13 03:50:39', '2016-05-13 03:50:39'),
(126, NULL, 'global', NULL, '2016-05-13 03:54:43', '2016-05-13 03:54:43'),
(127, NULL, 'ip', '127.0.0.1', '2016-05-13 03:54:43', '2016-05-13 03:54:43'),
(128, 21, 'user', NULL, '2016-05-13 03:54:43', '2016-05-13 03:54:43'),
(129, NULL, 'global', NULL, '2016-05-13 06:14:14', '2016-05-13 06:14:14'),
(130, NULL, 'ip', '127.0.0.1', '2016-05-13 06:14:14', '2016-05-13 06:14:14'),
(131, NULL, 'global', NULL, '2016-05-13 07:05:02', '2016-05-13 07:05:02'),
(132, NULL, 'ip', '127.0.0.1', '2016-05-13 07:05:02', '2016-05-13 07:05:02'),
(133, 21, 'user', NULL, '2016-05-13 07:05:02', '2016-05-13 07:05:02'),
(134, NULL, 'global', NULL, '2016-07-01 02:31:25', '2016-07-01 02:31:25'),
(135, NULL, 'ip', '127.0.0.1', '2016-07-01 02:31:25', '2016-07-01 02:31:25'),
(136, 21, 'user', NULL, '2016-07-01 02:31:25', '2016-07-01 02:31:25'),
(137, NULL, 'global', NULL, '2016-07-11 05:04:17', '2016-07-11 05:04:17'),
(138, NULL, 'ip', '127.0.0.1', '2016-07-11 05:04:17', '2016-07-11 05:04:17'),
(139, 21, 'user', NULL, '2016-07-11 05:04:17', '2016-07-11 05:04:17'),
(140, NULL, 'global', NULL, '2016-07-12 00:59:35', '2016-07-12 00:59:35'),
(141, NULL, 'ip', '127.0.0.1', '2016-07-12 00:59:35', '2016-07-12 00:59:35'),
(142, NULL, 'global', NULL, '2016-07-12 00:59:52', '2016-07-12 00:59:52'),
(143, NULL, 'ip', '127.0.0.1', '2016-07-12 00:59:52', '2016-07-12 00:59:52'),
(144, NULL, 'global', NULL, '2016-07-15 08:06:43', '2016-07-15 08:06:43'),
(145, NULL, 'ip', '127.0.0.1', '2016-07-15 08:06:43', '2016-07-15 08:06:43'),
(146, 21, 'user', NULL, '2016-07-15 08:06:43', '2016-07-15 08:06:43'),
(147, NULL, 'global', NULL, '2016-08-02 00:39:03', '2016-08-02 00:39:03'),
(148, NULL, 'ip', '127.0.0.1', '2016-08-02 00:39:03', '2016-08-02 00:39:03'),
(149, 18, 'user', NULL, '2016-08-02 00:39:03', '2016-08-02 00:39:03'),
(150, NULL, 'global', NULL, '2016-08-02 00:40:10', '2016-08-02 00:40:10'),
(151, NULL, 'ip', '127.0.0.1', '2016-08-02 00:40:10', '2016-08-02 00:40:10'),
(152, 18, 'user', NULL, '2016-08-02 00:40:10', '2016-08-02 00:40:10'),
(153, NULL, 'global', NULL, '2016-08-02 00:41:15', '2016-08-02 00:41:15'),
(154, NULL, 'ip', '127.0.0.1', '2016-08-02 00:41:15', '2016-08-02 00:41:15'),
(155, 18, 'user', NULL, '2016-08-02 00:41:15', '2016-08-02 00:41:15'),
(156, NULL, 'global', NULL, '2016-08-02 00:41:21', '2016-08-02 00:41:21'),
(157, NULL, 'ip', '127.0.0.1', '2016-08-02 00:41:21', '2016-08-02 00:41:21'),
(158, 18, 'user', NULL, '2016-08-02 00:41:21', '2016-08-02 00:41:21'),
(159, NULL, 'global', NULL, '2016-08-02 00:41:28', '2016-08-02 00:41:28'),
(160, NULL, 'ip', '127.0.0.1', '2016-08-02 00:41:28', '2016-08-02 00:41:28'),
(161, 18, 'user', NULL, '2016-08-02 00:41:28', '2016-08-02 00:41:28'),
(162, NULL, 'global', NULL, '2016-08-02 00:43:46', '2016-08-02 00:43:46'),
(163, NULL, 'ip', '127.0.0.1', '2016-08-02 00:43:46', '2016-08-02 00:43:46'),
(164, 13, 'user', NULL, '2016-08-02 00:43:46', '2016-08-02 00:43:46'),
(165, NULL, 'global', NULL, '2016-08-02 00:59:28', '2016-08-02 00:59:28'),
(166, NULL, 'ip', '127.0.0.1', '2016-08-02 00:59:28', '2016-08-02 00:59:28'),
(167, 17, 'user', NULL, '2016-08-02 00:59:28', '2016-08-02 00:59:28'),
(168, NULL, 'global', NULL, '2016-08-02 01:41:23', '2016-08-02 01:41:23'),
(169, NULL, 'ip', '127.0.0.1', '2016-08-02 01:41:23', '2016-08-02 01:41:23'),
(170, 17, 'user', NULL, '2016-08-02 01:41:23', '2016-08-02 01:41:23'),
(171, NULL, 'global', NULL, '2016-08-02 01:45:05', '2016-08-02 01:45:05'),
(172, NULL, 'ip', '127.0.0.1', '2016-08-02 01:45:05', '2016-08-02 01:45:05'),
(173, 17, 'user', NULL, '2016-08-02 01:45:05', '2016-08-02 01:45:05'),
(174, NULL, 'global', NULL, '2016-08-02 01:45:40', '2016-08-02 01:45:40'),
(175, NULL, 'ip', '127.0.0.1', '2016-08-02 01:45:40', '2016-08-02 01:45:40'),
(176, 17, 'user', NULL, '2016-08-02 01:45:40', '2016-08-02 01:45:40'),
(177, NULL, 'global', NULL, '2016-08-02 01:48:11', '2016-08-02 01:48:11'),
(178, NULL, 'ip', '127.0.0.1', '2016-08-02 01:48:11', '2016-08-02 01:48:11'),
(179, 17, 'user', NULL, '2016-08-02 01:48:11', '2016-08-02 01:48:11'),
(180, NULL, 'global', NULL, '2016-08-02 01:48:15', '2016-08-02 01:48:15'),
(181, NULL, 'ip', '127.0.0.1', '2016-08-02 01:48:15', '2016-08-02 01:48:15'),
(182, 17, 'user', NULL, '2016-08-02 01:48:15', '2016-08-02 01:48:15'),
(183, NULL, 'global', NULL, '2016-08-02 01:48:19', '2016-08-02 01:48:19'),
(184, NULL, 'ip', '127.0.0.1', '2016-08-02 01:48:19', '2016-08-02 01:48:19'),
(185, 17, 'user', NULL, '2016-08-02 01:48:19', '2016-08-02 01:48:19'),
(186, NULL, 'global', NULL, '2016-08-02 01:58:09', '2016-08-02 01:58:09'),
(187, NULL, 'ip', '127.0.0.1', '2016-08-02 01:58:09', '2016-08-02 01:58:09'),
(188, 17, 'user', NULL, '2016-08-02 01:58:09', '2016-08-02 01:58:09'),
(189, NULL, 'global', NULL, '2016-08-02 02:00:49', '2016-08-02 02:00:49'),
(190, NULL, 'ip', '127.0.0.1', '2016-08-02 02:00:49', '2016-08-02 02:00:49'),
(191, 17, 'user', NULL, '2016-08-02 02:00:49', '2016-08-02 02:00:49'),
(192, NULL, 'global', NULL, '2016-08-02 02:00:54', '2016-08-02 02:00:54'),
(193, NULL, 'ip', '127.0.0.1', '2016-08-02 02:00:54', '2016-08-02 02:00:54'),
(194, 17, 'user', NULL, '2016-08-02 02:00:54', '2016-08-02 02:00:54'),
(195, NULL, 'global', NULL, '2016-08-02 02:13:22', '2016-08-02 02:13:22'),
(196, NULL, 'ip', '127.0.0.1', '2016-08-02 02:13:22', '2016-08-02 02:13:22'),
(197, 17, 'user', NULL, '2016-08-02 02:13:22', '2016-08-02 02:13:22'),
(198, NULL, 'global', NULL, '2016-08-02 02:13:26', '2016-08-02 02:13:26'),
(199, NULL, 'ip', '127.0.0.1', '2016-08-02 02:13:26', '2016-08-02 02:13:26'),
(200, 17, 'user', NULL, '2016-08-02 02:13:26', '2016-08-02 02:13:26'),
(201, NULL, 'global', NULL, '2016-08-02 02:13:29', '2016-08-02 02:13:29'),
(202, NULL, 'ip', '127.0.0.1', '2016-08-02 02:13:29', '2016-08-02 02:13:29'),
(203, 17, 'user', NULL, '2016-08-02 02:13:29', '2016-08-02 02:13:29'),
(204, NULL, 'global', NULL, '2016-08-02 02:13:33', '2016-08-02 02:13:33'),
(205, NULL, 'ip', '127.0.0.1', '2016-08-02 02:13:33', '2016-08-02 02:13:33'),
(206, 17, 'user', NULL, '2016-08-02 02:13:33', '2016-08-02 02:13:33'),
(207, NULL, 'global', NULL, '2016-08-02 02:16:41', '2016-08-02 02:16:41'),
(208, NULL, 'ip', '127.0.0.1', '2016-08-02 02:16:41', '2016-08-02 02:16:41'),
(209, 17, 'user', NULL, '2016-08-02 02:16:41', '2016-08-02 02:16:41'),
(210, NULL, 'global', NULL, '2016-08-02 02:16:44', '2016-08-02 02:16:44'),
(211, NULL, 'ip', '127.0.0.1', '2016-08-02 02:16:44', '2016-08-02 02:16:44'),
(212, 17, 'user', NULL, '2016-08-02 02:16:44', '2016-08-02 02:16:44'),
(213, NULL, 'global', NULL, '2016-08-02 02:32:09', '2016-08-02 02:32:09'),
(214, NULL, 'ip', '127.0.0.1', '2016-08-02 02:32:09', '2016-08-02 02:32:09'),
(216, NULL, 'global', NULL, '2016-08-02 02:32:16', '2016-08-02 02:32:16'),
(217, NULL, 'ip', '127.0.0.1', '2016-08-02 02:32:16', '2016-08-02 02:32:16'),
(219, NULL, 'global', NULL, '2016-08-02 02:32:25', '2016-08-02 02:32:25'),
(220, NULL, 'ip', '127.0.0.1', '2016-08-02 02:32:25', '2016-08-02 02:32:25'),
(222, NULL, 'global', NULL, '2016-08-02 02:32:33', '2016-08-02 02:32:33'),
(223, NULL, 'ip', '127.0.0.1', '2016-08-02 02:32:33', '2016-08-02 02:32:33'),
(225, NULL, 'global', NULL, '2016-08-02 02:32:42', '2016-08-02 02:32:42'),
(226, NULL, 'ip', '127.0.0.1', '2016-08-02 02:32:42', '2016-08-02 02:32:42'),
(228, NULL, 'global', NULL, '2016-08-02 02:32:50', '2016-08-02 02:32:50'),
(229, NULL, 'ip', '127.0.0.1', '2016-08-02 02:32:50', '2016-08-02 02:32:50'),
(231, NULL, 'global', NULL, '2016-08-02 03:02:31', '2016-08-02 03:02:31'),
(232, NULL, 'ip', '127.0.0.1', '2016-08-02 03:02:31', '2016-08-02 03:02:31'),
(233, 13, 'user', NULL, '2016-08-02 03:02:31', '2016-08-02 03:02:31'),
(234, NULL, 'global', NULL, '2016-08-02 03:02:34', '2016-08-02 03:02:34'),
(235, NULL, 'ip', '127.0.0.1', '2016-08-02 03:02:34', '2016-08-02 03:02:34'),
(236, 13, 'user', NULL, '2016-08-02 03:02:34', '2016-08-02 03:02:34'),
(237, NULL, 'global', NULL, '2016-08-02 03:02:38', '2016-08-02 03:02:38'),
(238, NULL, 'ip', '127.0.0.1', '2016-08-02 03:02:38', '2016-08-02 03:02:38'),
(239, 13, 'user', NULL, '2016-08-02 03:02:38', '2016-08-02 03:02:38'),
(240, NULL, 'global', NULL, '2016-08-02 03:02:41', '2016-08-02 03:02:41'),
(241, NULL, 'ip', '127.0.0.1', '2016-08-02 03:02:41', '2016-08-02 03:02:41'),
(242, 13, 'user', NULL, '2016-08-02 03:02:41', '2016-08-02 03:02:41'),
(243, NULL, 'global', NULL, '2016-08-02 03:02:44', '2016-08-02 03:02:44'),
(244, NULL, 'ip', '127.0.0.1', '2016-08-02 03:02:44', '2016-08-02 03:02:44'),
(245, 13, 'user', NULL, '2016-08-02 03:02:44', '2016-08-02 03:02:44'),
(246, NULL, 'global', NULL, '2016-08-02 03:02:47', '2016-08-02 03:02:47'),
(247, NULL, 'ip', '127.0.0.1', '2016-08-02 03:02:47', '2016-08-02 03:02:47'),
(248, 13, 'user', NULL, '2016-08-02 03:02:47', '2016-08-02 03:02:47'),
(249, NULL, 'global', NULL, '2016-08-02 03:17:50', '2016-08-02 03:17:50'),
(250, NULL, 'ip', '127.0.0.1', '2016-08-02 03:17:51', '2016-08-02 03:17:51'),
(251, 13, 'user', NULL, '2016-08-02 03:17:51', '2016-08-02 03:17:51'),
(252, NULL, 'global', NULL, '2016-08-02 03:17:54', '2016-08-02 03:17:54'),
(253, NULL, 'ip', '127.0.0.1', '2016-08-02 03:17:54', '2016-08-02 03:17:54'),
(254, 13, 'user', NULL, '2016-08-02 03:17:54', '2016-08-02 03:17:54'),
(255, NULL, 'global', NULL, '2016-08-02 03:17:57', '2016-08-02 03:17:57'),
(256, NULL, 'ip', '127.0.0.1', '2016-08-02 03:17:57', '2016-08-02 03:17:57'),
(257, 13, 'user', NULL, '2016-08-02 03:17:57', '2016-08-02 03:17:57'),
(258, NULL, 'global', NULL, '2016-08-02 03:18:00', '2016-08-02 03:18:00'),
(259, NULL, 'ip', '127.0.0.1', '2016-08-02 03:18:00', '2016-08-02 03:18:00'),
(260, 13, 'user', NULL, '2016-08-02 03:18:00', '2016-08-02 03:18:00'),
(261, NULL, 'global', NULL, '2016-08-02 03:18:03', '2016-08-02 03:18:03'),
(262, NULL, 'ip', '127.0.0.1', '2016-08-02 03:18:03', '2016-08-02 03:18:03'),
(263, 13, 'user', NULL, '2016-08-02 03:18:03', '2016-08-02 03:18:03'),
(264, NULL, 'global', NULL, '2016-08-02 03:18:06', '2016-08-02 03:18:06'),
(265, NULL, 'ip', '127.0.0.1', '2016-08-02 03:18:06', '2016-08-02 03:18:06'),
(266, 13, 'user', NULL, '2016-08-02 03:18:06', '2016-08-02 03:18:06'),
(267, NULL, 'global', NULL, '2016-08-02 03:32:59', '2016-08-02 03:32:59'),
(268, NULL, 'ip', '127.0.0.1', '2016-08-02 03:32:59', '2016-08-02 03:32:59'),
(269, 13, 'user', NULL, '2016-08-02 03:32:59', '2016-08-02 03:32:59'),
(270, NULL, 'global', NULL, '2016-08-02 03:33:07', '2016-08-02 03:33:07'),
(271, NULL, 'ip', '127.0.0.1', '2016-08-02 03:33:07', '2016-08-02 03:33:07'),
(272, 13, 'user', NULL, '2016-08-02 03:33:07', '2016-08-02 03:33:07'),
(273, NULL, 'global', NULL, '2016-08-02 03:33:10', '2016-08-02 03:33:10'),
(274, NULL, 'ip', '127.0.0.1', '2016-08-02 03:33:10', '2016-08-02 03:33:10'),
(275, 13, 'user', NULL, '2016-08-02 03:33:10', '2016-08-02 03:33:10'),
(276, NULL, 'global', NULL, '2016-08-02 03:33:14', '2016-08-02 03:33:14'),
(277, NULL, 'ip', '127.0.0.1', '2016-08-02 03:33:14', '2016-08-02 03:33:14'),
(278, 13, 'user', NULL, '2016-08-02 03:33:14', '2016-08-02 03:33:14'),
(279, NULL, 'global', NULL, '2016-08-02 03:33:18', '2016-08-02 03:33:18'),
(280, NULL, 'ip', '127.0.0.1', '2016-08-02 03:33:18', '2016-08-02 03:33:18'),
(281, 13, 'user', NULL, '2016-08-02 03:33:18', '2016-08-02 03:33:18'),
(282, NULL, 'global', NULL, '2016-08-02 03:33:22', '2016-08-02 03:33:22'),
(283, NULL, 'ip', '127.0.0.1', '2016-08-02 03:33:22', '2016-08-02 03:33:22'),
(284, 13, 'user', NULL, '2016-08-02 03:33:22', '2016-08-02 03:33:22'),
(285, NULL, 'global', NULL, '2016-08-02 03:51:04', '2016-08-02 03:51:04'),
(286, NULL, 'ip', '127.0.0.1', '2016-08-02 03:51:04', '2016-08-02 03:51:04'),
(287, 13, 'user', NULL, '2016-08-02 03:51:04', '2016-08-02 03:51:04'),
(288, NULL, 'global', NULL, '2016-08-02 03:51:07', '2016-08-02 03:51:07'),
(289, NULL, 'ip', '127.0.0.1', '2016-08-02 03:51:07', '2016-08-02 03:51:07'),
(290, 13, 'user', NULL, '2016-08-02 03:51:07', '2016-08-02 03:51:07'),
(291, NULL, 'global', NULL, '2016-08-02 03:51:10', '2016-08-02 03:51:10'),
(292, NULL, 'ip', '127.0.0.1', '2016-08-02 03:51:10', '2016-08-02 03:51:10'),
(293, 13, 'user', NULL, '2016-08-02 03:51:10', '2016-08-02 03:51:10'),
(294, NULL, 'global', NULL, '2016-08-02 03:51:12', '2016-08-02 03:51:12'),
(295, NULL, 'ip', '127.0.0.1', '2016-08-02 03:51:12', '2016-08-02 03:51:12'),
(296, 13, 'user', NULL, '2016-08-02 03:51:12', '2016-08-02 03:51:12'),
(297, NULL, 'global', NULL, '2016-08-02 03:51:15', '2016-08-02 03:51:15'),
(298, NULL, 'ip', '127.0.0.1', '2016-08-02 03:51:15', '2016-08-02 03:51:15'),
(299, 13, 'user', NULL, '2016-08-02 03:51:15', '2016-08-02 03:51:15'),
(300, NULL, 'global', NULL, '2016-08-02 03:51:18', '2016-08-02 03:51:18'),
(301, NULL, 'ip', '127.0.0.1', '2016-08-02 03:51:18', '2016-08-02 03:51:18'),
(302, 13, 'user', NULL, '2016-08-02 03:51:18', '2016-08-02 03:51:18'),
(303, NULL, 'global', NULL, '2016-08-03 04:09:49', '2016-08-03 04:09:49'),
(304, NULL, 'ip', '127.0.0.1', '2016-08-03 04:09:49', '2016-08-03 04:09:49'),
(305, 17, 'user', NULL, '2016-08-03 04:09:49', '2016-08-03 04:09:49'),
(306, NULL, 'global', NULL, '2016-08-03 04:12:32', '2016-08-03 04:12:32'),
(307, NULL, 'ip', '127.0.0.1', '2016-08-03 04:12:32', '2016-08-03 04:12:32'),
(308, 21, 'user', NULL, '2016-08-03 04:12:32', '2016-08-03 04:12:32'),
(309, NULL, 'global', NULL, '2016-08-04 04:20:35', '2016-08-04 04:20:35'),
(310, NULL, 'ip', '127.0.0.1', '2016-08-04 04:20:35', '2016-08-04 04:20:35'),
(311, 21, 'user', NULL, '2016-08-04 04:20:35', '2016-08-04 04:20:35'),
(312, NULL, 'global', NULL, '2016-08-09 07:32:36', '2016-08-09 07:32:36'),
(313, NULL, 'ip', '127.0.0.1', '2016-08-09 07:32:37', '2016-08-09 07:32:37'),
(314, NULL, 'global', NULL, '2016-08-12 08:30:27', '2016-08-12 08:30:27'),
(315, NULL, 'ip', '127.0.0.1', '2016-08-12 08:30:27', '2016-08-12 08:30:27'),
(316, NULL, 'global', NULL, '2016-08-12 08:30:43', '2016-08-12 08:30:43'),
(317, NULL, 'ip', '127.0.0.1', '2016-08-12 08:30:43', '2016-08-12 08:30:43'),
(318, NULL, 'global', NULL, '2016-08-22 02:15:41', '2016-08-22 02:15:41'),
(319, NULL, 'ip', '127.0.0.1', '2016-08-22 02:15:41', '2016-08-22 02:15:41'),
(320, NULL, 'global', NULL, '2016-08-22 02:15:57', '2016-08-22 02:15:57'),
(321, NULL, 'ip', '127.0.0.1', '2016-08-22 02:15:57', '2016-08-22 02:15:57'),
(322, NULL, 'global', NULL, '2016-08-22 02:16:40', '2016-08-22 02:16:40'),
(323, NULL, 'ip', '127.0.0.1', '2016-08-22 02:16:40', '2016-08-22 02:16:40'),
(324, NULL, 'global', NULL, '2016-08-22 02:16:55', '2016-08-22 02:16:55'),
(325, NULL, 'ip', '127.0.0.1', '2016-08-22 02:16:55', '2016-08-22 02:16:55'),
(326, NULL, 'global', NULL, '2016-09-05 00:00:46', '2016-09-05 00:00:46'),
(327, NULL, 'ip', '127.0.0.1', '2016-09-05 00:00:46', '2016-09-05 00:00:46'),
(328, NULL, 'global', NULL, '2016-09-05 00:01:44', '2016-09-05 00:01:44'),
(329, NULL, 'ip', '127.0.0.1', '2016-09-05 00:01:44', '2016-09-05 00:01:44'),
(330, 13, 'user', NULL, '2016-09-05 00:01:44', '2016-09-05 00:01:44'),
(331, NULL, 'global', NULL, '2016-09-06 05:33:23', '2016-09-06 05:33:23'),
(332, NULL, 'ip', '127.0.0.1', '2016-09-06 05:33:23', '2016-09-06 05:33:23'),
(333, 13, 'user', NULL, '2016-09-06 05:33:23', '2016-09-06 05:33:23'),
(334, NULL, 'global', NULL, '2016-09-07 02:00:12', '2016-09-07 02:00:12'),
(335, NULL, 'ip', '127.0.0.1', '2016-09-07 02:00:12', '2016-09-07 02:00:12'),
(336, 13, 'user', NULL, '2016-09-07 02:00:12', '2016-09-07 02:00:12'),
(337, NULL, 'global', NULL, '2016-09-19 02:29:14', '2016-09-19 02:29:14'),
(338, NULL, 'ip', '127.0.0.1', '2016-09-19 02:29:14', '2016-09-19 02:29:14'),
(339, NULL, 'global', NULL, '2016-09-19 02:30:30', '2016-09-19 02:30:30'),
(340, NULL, 'ip', '127.0.0.1', '2016-09-19 02:30:30', '2016-09-19 02:30:30'),
(341, NULL, 'global', NULL, '2016-09-19 02:48:44', '2016-09-19 02:48:44'),
(342, NULL, 'ip', '127.0.0.1', '2016-09-19 02:48:44', '2016-09-19 02:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`, `color_code`, `nick_name`, `font_color`) VALUES
(13, 'math@square44.com', '$2y$10$Bk.sC0uBWrdiSlGVdQ3X/egEtDsfMnUjtZsQLetZfkSPcUBBCMYGa', NULL, '2016-09-07 07:21:28', 'Mathijs', 'Aliet', '2016-03-30 13:13:49', '2016-09-07 07:21:28', '#855847', 'Math', '#456989'),
(15, 'latt@square44.com', '$2y$10$vb4LZpjuJPRuGvG0WTvVwOBhe8HFdxJWixr56bd9NRfoZH4Gym3.6', NULL, '2016-04-20 12:53:07', 'Latt', 'Lek', '2016-04-19 14:19:04', '2016-04-20 12:53:07', '#919746', 'latt', '#000000'),
(16, 'tomo@square44.com', '$2y$10$BQg0CPNimgdhvF/rcwG5sOU0rVfeky2OL8Yz0FTh0b7XDlQXeeHA.', NULL, '2016-04-27 04:03:04', 'Tomo', 'Kku', '2016-04-19 14:22:16', '2016-05-13 03:51:28', '#EBFF00', 'TOMO', '#000000'),
(17, 'willy@square44.com', '$2y$10$upTDjLoznEKXD9SWFanu9OovbZSM8WPOKmC1uR577i.BQXq.KcwGO', NULL, '2016-11-01 00:47:29', 'willy', 'jan', '2016-04-19 14:23:53', '2016-11-01 00:47:29', '#FF0000', 'willy', '#000000'),
(18, 'mainul@codetrio.com', '$2y$10$8XwX5FSjOS1KY3zBtWGpMezB4Bv7wksOs8qhszfZkZeKbCoVHI2ti', NULL, '2016-10-28 02:08:41', 'Mainul', 'Hasan', '2016-05-03 03:48:07', '2016-10-28 02:08:41', '#AF5A3B', 'Hasan', '#000000'),
(21, 'hasanmbstu13@gmail.com', '$2y$10$B7J4eLxrm8DMpcNGbBNyAeBRMmGw2ukI8reawO26CO3HDlFAlEj7i', NULL, '2016-10-28 02:10:02', 'Hasan', 'Hasan', '2016-05-03 04:14:17', '2016-10-28 02:10:02', '#81513F', 'Hasan', '#000000'),
(23, 'mainulmbstu@codetrio.com', '$2y$10$g9yr9SICN28LqvZHIfnBIe722o3.mG.a5g4jow/Mc3M58G4GOonq2', NULL, '2016-05-06 03:43:47', 'Mohammad ', 'Mainul', '2016-05-06 03:42:50', '2016-09-06 05:34:19', '#469B28', 'Hasan', '#28659B');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `assigned_hour` decimal(11,2) NOT NULL,
  `used_hour` decimal(11,2) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `next_deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `priority` smallint(6) NOT NULL,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'queued',
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `brief_number` int(11) NOT NULL,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `est_start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `project_id`, `user_id`, `assigned_hour`, `used_hour`, `start_time`, `next_deadline`, `priority`, `status`, `sort_order`, `created_at`, `updated_at`, `brief_number`, `task`, `est_start_time`) VALUES
(3, 1, 15, '0.25', '0.00', '0000-00-00 00:00:00', '2017-09-05 23:56:53', 0, 'closed', 0, '2016-09-05 23:56:53', '2016-09-07 06:45:33', 156, '', '2016-09-06 05:56:00'),
(5, 1, 16, '0.25', '0.00', '0000-00-00 00:00:00', '2017-09-05 23:56:53', 0, 'closed', 0, '2016-09-05 23:56:53', '2016-09-19 01:39:38', 156, '', '2016-09-06 05:56:00'),
(9, 1, 16, '0.25', '0.00', '0000-00-00 00:00:00', '2017-09-06 03:09:33', 0, 'closed', 0, '2016-09-06 03:09:33', '2016-09-06 03:09:33', 456, '', '2016-09-05 21:09:00'),
(11, 1, 16, '0.25', '0.00', '0000-00-00 00:00:00', '2016-10-08 06:00:00', 0, 'closed', 0, '2016-09-07 04:00:53', '2016-09-07 04:00:53', 125, '', '2016-09-06 22:00:00'),
(13, 1, 16, '0.25', '0.00', '0000-00-00 00:00:00', '2016-10-05 06:00:00', 0, 'closed', 0, '2016-09-07 04:08:42', '2016-09-07 04:08:42', 125, '', '2016-09-06 22:08:00'),
(14, 1, 21, '0.25', '2.00', '2016-09-09 03:08:49', '2016-10-05 06:00:00', 0, 'closed', 0, '2016-09-07 04:08:42', '2016-09-09 03:09:04', 125, '', '2016-09-06 22:08:00'),
(15, 1, 16, '0.25', '0.00', '0000-00-00 00:00:00', '2016-10-05 06:00:00', 0, 'closed', 0, '2016-09-07 04:10:05', '2016-09-07 04:10:05', 69, '', '2016-09-06 22:09:00'),
(16, 1, 21, '0.25', '124.25', '2016-09-07 06:44:58', '2016-10-05 06:00:00', 0, 'closed', 0, '2016-09-07 04:10:05', '2016-09-09 03:08:11', 69, '', '2016-09-06 22:09:00'),
(17, 1, 16, '0.25', '0.00', '0000-00-00 00:00:00', '2016-10-05 06:00:00', 0, 'closed', 0, '2016-09-07 04:10:29', '2016-09-07 04:10:29', 555555, '', '2016-09-06 22:10:00'),
(18, 1, 21, '0.25', '10.00', '2016-09-07 07:07:26', '2016-10-05 06:00:00', 0, 'closed', 0, '2016-09-07 04:10:29', '2016-09-07 07:11:00', 555555, '', '2016-09-06 22:10:00'),
(21, 1, 21, '0.25', '0.75', '2016-09-07 06:45:33', '2017-09-05 23:56:53', 0, 'closed', 0, '2016-09-07 06:45:33', '2016-09-07 07:04:33', 156, '', '2016-09-06 05:56:00'),
(23, 1, 16, '20.00', '0.00', '0000-00-00 00:00:00', '2017-09-19 02:06:14', 0, 'closed', 0, '2016-09-19 02:06:14', '2016-09-19 02:06:14', 96, '', '2016-09-18 20:05:00'),
(24, 1, 21, '10.00', '0.00', '0000-00-00 00:00:00', '2016-09-29 06:00:00', 0, 'closed', 0, '2016-09-27 02:24:37', '2016-09-27 02:24:37', 18569, 'Markup Design', '2016-09-26 20:24:00'),
(25, 12, 16, '4.50', '0.00', '0000-00-00 00:00:00', '2016-10-07 06:00:00', 0, 'queued', 0, '2016-09-28 02:47:39', '2016-09-28 02:47:39', 656, '25', '2016-09-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `works_log`
--

CREATE TABLE `works_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `works_id` int(10) UNSIGNED NOT NULL,
  `started_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ended_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'started',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `spent_hours` decimal(11,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `works_log`
--

INSERT INTO `works_log` (`id`, `works_id`, `started_time`, `ended_time`, `status`, `created_at`, `updated_at`, `spent_hours`) VALUES
(1, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-07 06:55:32', '2016-09-07 06:55:32', '0.25000'),
(2, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-07 07:01:36', '2016-09-07 07:01:36', '0.25000'),
(3, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-07 07:04:33', '2016-09-07 07:04:33', '0.50000'),
(4, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-07 07:10:30', '2016-09-07 07:10:30', '10.00000'),
(5, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-07 07:11:00', '2016-09-07 07:11:00', '0.00000'),
(8, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-09 03:06:31', '2016-09-09 03:06:31', '123.00000'),
(9, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-09 03:06:53', '2016-09-09 03:06:53', '1.00000'),
(10, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-09 03:08:42', '2016-09-09 03:08:42', '0.00000'),
(11, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '2016-09-09 03:09:04', '2016-09-09 03:09:04', '2.00000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_infos`
--
ALTER TABLE `leave_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_leader_id_foreign` (`leader_id`),
  ADD KEY `projects_project_manager_foreign` (`project_manager`);

--
-- Indexes for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_users_project_id_foreign` (`project_id`),
  ADD KEY `projects_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_project_id_foreign` (`project_id`),
  ADD KEY `works_user_id_foreign` (`user_id`);

--
-- Indexes for table `works_log`
--
ALTER TABLE `works_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_log_works_id_foreign` (`works_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `leave_infos`
--
ALTER TABLE `leave_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `projects_users`
--
ALTER TABLE `projects_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `works_log`
--
ALTER TABLE `works_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
