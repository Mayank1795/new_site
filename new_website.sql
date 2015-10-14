-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 08:26 PM
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
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
`campaignID` int(11) NOT NULL,
  `name_person` varchar(1024) NOT NULL,
  `name_candidate` varchar(1024) NOT NULL,
  `election_year` year(4) NOT NULL,
  `election_type` varchar(1024) NOT NULL,
  `office_sought` varchar(1024) NOT NULL,
  `state_of_candidate` varchar(1024) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(60) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `active` varchar(255) CHARACTER SET latin1 NOT NULL,
  `resetToken` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `resetComplete` varchar(3) CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaignID`, `name_person`, `name_candidate`, `election_year`, `election_type`, `office_sought`, `state_of_candidate`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(1, 'Mayank', 'Mayank', 2045, 'Regular', 'City Council', 'active', 'Mayank', '$2y$10$jxRqvZH4D94S746JR8AvledW6C7Masas1hE7/.rHfHtIm78eaOMDS', 'mctyson1795@gmail.com', 'yes', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
`donor_id` int(11) NOT NULL,
  `campaignID` int(11) NOT NULL,
  `trans_id` varchar(1024) NOT NULL,
  `contribution_type` varchar(1024) NOT NULL,
  `amount` int(11) NOT NULL,
  `donor_name` varchar(1024) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(1024) NOT NULL,
  `state` varchar(1024) NOT NULL,
  `telephone` int(13) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `employer_type` varchar(1024) NOT NULL,
  `occupation` varchar(1024) NOT NULL,
  `business_address` varchar(1024) NOT NULL,
  `date_contribution` date NOT NULL,
  `city_agency` varchar(1024) NOT NULL,
  `business_type` varchar(1024) NOT NULL,
  `business_entity` varchar(1024) NOT NULL,
  `position` varchar(1024) NOT NULL,
  `ac_holder` varchar(1024) NOT NULL,
  `card_type` varchar(1024) NOT NULL,
  `ac_number` int(30) NOT NULL,
  `expiration_date` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `field_name` varchar(1024) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`field_name`, `state`) VALUES
('Contribution Type', 1),
('Amount', 1),
('Donor Name', 1),
('Address', 1),
('Zip Code', 1),
('City', 1),
('State', 1),
('Telephone', 1),
('Email', 1),
('Employer', 1),
('Occupation', 1),
('Business Address', 1),
('Date of Contribution', 1),
('City Agency', 1),
('Business Type', 1),
('Business Entity', 1),
('Position', 1),
('Account Holder', 1),
('Account No.', 1),
('Card Type', 1),
('Expiration Date', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
 ADD PRIMARY KEY (`campaignID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
 ADD PRIMARY KEY (`donor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
MODIFY `campaignID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
