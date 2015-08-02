-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2015 at 11:58 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `country`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`) VALUES
(1, 1, 'Noakhali'),
(2, 1, 'Chittagong'),
(3, 2, 'Manikganj'),
(4, 3, 'Sunaganj'),
(5, 3, 'Maulovibazar'),
(6, 2, 'Gopalganj'),
(7, 1, 'Khagrachhari'),
(8, 1, 'Comilla'),
(9, 5, 'Rangpur'),
(10, 4, 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`) VALUES
(1, 'Chittagong'),
(2, 'Dhaka'),
(3, 'Sylhet'),
(4, 'Rajshahi'),
(5, 'Rangpur');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE IF NOT EXISTS `upazilas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`) VALUES
(1, 1, 'Companigonj'),
(2, 1, 'Chatkil'),
(3, 1, 'Begumganj'),
(4, 2, 'Fatikchari'),
(5, 2, 'Doublemouring'),
(6, 2, 'Bashkali'),
(7, 2, 'Raujan'),
(8, 8, 'Chadduagram');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
