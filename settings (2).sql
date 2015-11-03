-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2015 at 12:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `field_name` varchar(1024) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `field_name`, `state`) VALUES
(1, 'Contribution Type', 0),
(2, 'Amount', 0),
(3, 'Donor Name', 0),
(4, 'Address', 1),
(5, 'Zip Code', 0),
(6, 'City', 0),
(7, 'State', 1),
(8, 'Telephone', 1),
(9, 'Email', 0),
(10, 'Employer', 1),
(11, 'Occupation', 1),
(12, 'Business Address', 0),
(13, 'Date of Contribution', 1),
(14, 'City Agency', 0),
(15, 'Business Type', 1),
(16, 'Business Entity', 0),
(17, 'Position', 1),
(18, 'Account Holder', 1),
(19, 'Account No.', 0),
(20, 'Card Type', 1),
(21, 'Expiration Date', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
