-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 08:45 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

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
  `campaignID` int(11) NOT NULL AUTO_INCREMENT,
  `name_person` varchar(1024) NOT NULL,
  `name_candidate` varchar(1024) NOT NULL,
  `election_year` year(4) NOT NULL,
  `election_type` varchar(1024) NOT NULL,
  `office_sought` varchar(1024) NOT NULL,
  `state_of_candidate` varchar(1024) NOT NULL,
  `notify` tinyint(1) NOT NULL,
  `notify_email` varchar(1024) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(60) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `active` varchar(255) CHARACTER SET latin1 NOT NULL,
  `resetToken` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `resetComplete` varchar(3) CHARACTER SET latin1 DEFAULT 'No',
  PRIMARY KEY (`campaignID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaignID`, `name_person`, `name_candidate`, `election_year`, `election_type`, `office_sought`, `state_of_candidate`, `notify`, `notify_email`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(1, 'Mayank', 'Mayank', 2045, 'Regular', 'City Council', 'active', 0, '', 'Mayank', '$2y$10$jxRqvZH4D94S746JR8AvledW6C7Masas1hE7/.rHfHtIm78eaOMDS', 'mctyson1795@gmail.com', 'yes', NULL, 'No'),
(2, 'Vidit Tiwari', 'Vidit Tiwari', 2015, 'Regular', 'City Council', 'active', 0, 'hello@hello.com', 'vidit', '$2y$10$IFP/Egn8adjgobUkkQDRVesOXCBh0MWiQ9zeLSe43gwTdvd1DKuyW', 'vidittiwari95@gmail.com', 'yes', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `expiration_date` varchar(10) NOT NULL,
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `campaignID`, `trans_id`, `contribution_type`, `amount`, `donor_name`, `address`, `zip`, `city`, `state`, `telephone`, `email`, `employer_type`, `occupation`, `business_address`, `date_contribution`, `city_agency`, `business_type`, `business_entity`, `position`, `ac_holder`, `card_type`, `ac_number`, `expiration_date`) VALUES
(31, 2, '', 'cash', 100, 'Hello', 'PO Box 124', 1001, 'Agawam', 'MA', 123214, 'hello@gmail.com', 'Go Go', 'qwdn', 'rwebwef', '2015-08-11', '', 'Conte', 'dask', 'wefkwe ', '', '', 0, ''),
(32, 2, '', 'cash', 100, 'Hello', 'Po Box123', 1001, 'Agawam', 'MA', 123214, 'hello@gmail.com', 'Go Go', 'qwdn', '', '2015-11-08', '', 'Conte', 'dask', 'wefkwe ', '', '', 0, '');

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
(4, 'Address', 0),
(5, 'Zip Code', 1),
(6, 'City', 1),
(7, 'State', 1),
(8, 'Telephone', 1),
(9, 'Email', 1),
(10, 'Employer', 1),
(11, 'Occupation', 1),
(12, 'Business Address', 1),
(13, 'Date of Contribution', 1),
(14, 'City Agency', 1),
(15, 'Business Type', 1),
(16, 'Business Entity', 1),
(17, 'Position', 1),
(18, 'Account Holder', 1),
(19, 'Account No.', 1),
(20, 'Card Type', 1),
(21, 'Expiration Date', 1),
(0, 'Contribution Type', 1),
(0, 'Amount', 1),
(0, 'Donor Name', 1),
(0, 'Address', 1),
(0, 'Zip Code', 1),
(0, 'City', 1),
(0, 'State', 1),
(0, 'Telephone', 1),
(0, 'Email', 1),
(0, 'Employer', 1),
(0, 'Occupation', 1),
(0, 'Business Address', 1),
(0, 'Date of Contribution', 1),
(0, 'City Agency', 1),
(0, 'Business Type', 1),
(0, 'Business Entity', 1),
(0, 'Position', 1),
(0, 'Account Holder', 1),
(0, 'Account No.', 1),
(0, 'Card Type', 1),
(0, 'Expiration Date', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
