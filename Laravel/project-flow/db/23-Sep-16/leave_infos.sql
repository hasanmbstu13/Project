-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 01:04 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
(77, 21, '2016-10-07 06:00:00', '2016-09-21 06:00:00', 10.00, 18, 'annual', '2016-09-23 03:43:30', '2016-09-23 03:43:30'),
(78, 15, '2016-09-27 06:00:00', '2016-09-06 06:00:00', 10.00, 18, 'annual', '2016-09-23 04:02:54', '2016-09-23 04:02:54'),
(79, 15, '2016-10-04 06:00:00', '2016-09-14 06:00:00', 10.00, 18, 'sick', '2016-09-23 04:03:10', '2016-09-23 04:03:10'),
(80, 15, '2016-10-26 06:00:00', '2016-09-21 06:00:00', 10.00, 18, 'annual', '2016-09-23 04:03:38', '2016-09-23 04:03:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_infos`
--
ALTER TABLE `leave_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_infos`
--
ALTER TABLE `leave_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
