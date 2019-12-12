-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2019 at 01:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rateyourisp_schema`
--
CREATE DATABASE IF NOT EXISTS `rateyourisp_schema` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rateyourisp_schema`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_subscribers`
--

DROP TABLE IF EXISTS `tbl_email_subscribers`;
CREATE TABLE IF NOT EXISTS `tbl_email_subscribers` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `col_email` varchar(25) NOT NULL,
  `comments` varchar(125) NOT NULL DEFAULT 'no_comments_added',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricing`
--

DROP TABLE IF EXISTS `tbl_pricing`;
CREATE TABLE IF NOT EXISTS `tbl_pricing` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `pricing` varchar(25) NOT NULL,
  `comments` varchar(125) NOT NULL DEFAULT 'no_comments_added',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='pricing table to hold for how expensiveness of bundle';

--
-- Dumping data for table `tbl_pricing`
--

INSERT INTO `tbl_pricing` (`id`, `pricing`, `comments`) VALUES
(7, 'very expensive', 'no_comments_added'),
(8, 'expensive', 'no_comments_added'),
(9, 'okay', 'no_comments_added'),
(10, 'affordable', 'no_comments_added'),
(11, 'very affordable', 'no_comments_added'),
(12, 'cheap', 'no_comments_added');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratings`
--

DROP TABLE IF EXISTS `tbl_ratings`;
CREATE TABLE IF NOT EXISTS `tbl_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col_telco` smallint(3) NOT NULL,
  `col_region` tinyint(2) DEFAULT NULL,
  `col_area` varchar(125) NOT NULL,
  `col_reliability` tinyint(2) NOT NULL,
  `col_pricing` tinyint(2) NOT NULL,
  `col_support` tinyint(2) NOT NULL,
  `comments` varchar(125) NOT NULL DEFAULT 'no_comments_added',
  PRIMARY KEY (`id`),
  KEY `telco_id` (`col_telco`),
  KEY `pricing_id` (`col_pricing`),
  KEY `reliability_id` (`col_reliability`) USING BTREE,
  KEY `support_id` (`col_support`),
  KEY `region_id` (`col_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regions`
--

DROP TABLE IF EXISTS `tbl_regions`;
CREATE TABLE IF NOT EXISTS `tbl_regions` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `capital` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_regions`
--

INSERT INTO `tbl_regions` (`id`, `name`, `capital`) VALUES
(1, 'Ahafo', 'Goaso'),
(2, 'Ashanti', 'Kumasi'),
(3, 'Bono', 'Sunyani'),
(4, 'Bono East', 'Techiman'),
(5, 'Central', 'Cape Coast'),
(6, 'Eastern', 'Koforidua'),
(7, 'Greater Accra', 'Accra'),
(8, 'Northern', 'Tamale'),
(9, 'North East', 'Nalerigu'),
(10, 'Oti', 'Dambi'),
(11, 'Savannah', 'Damango'),
(12, 'Volta', 'Ho'),
(13, 'Western', 'Sekondi'),
(14, 'Western North', 'Sefwi Wiawso'),
(15, 'Upper East', 'Bolgatanga'),
(16, 'Upper West', 'Wa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reliability`
--

DROP TABLE IF EXISTS `tbl_reliability`;
CREATE TABLE IF NOT EXISTS `tbl_reliability` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `realiability` varchar(25) NOT NULL,
  `comments` varchar(125) NOT NULL DEFAULT 'no_comments_has_been_added',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='reliability table to hold connectivity status';

--
-- Dumping data for table `tbl_reliability`
--

INSERT INTO `tbl_reliability` (`id`, `realiability`, `comments`) VALUES
(1, 'very poor', 'no_comments_has_been_added'),
(2, 'poor', 'no_comments_has_been_added'),
(3, 'okay', 'no_comments_has_been_added'),
(4, 'good', 'no_comments_has_been_added'),
(5, 'very good', 'no_comments_has_been_added'),
(6, 'excellent', 'no_comments_has_been_added');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_support`
--

DROP TABLE IF EXISTS `tbl_support`;
CREATE TABLE IF NOT EXISTS `tbl_support` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `support` varchar(25) NOT NULL,
  `comments` varchar(125) NOT NULL DEFAULT 'no_comments_added',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='support table for how they respond to customers';

--
-- Dumping data for table `tbl_support`
--

INSERT INTO `tbl_support` (`id`, `support`, `comments`) VALUES
(13, 'very poor', 'no_comments_added'),
(14, 'poor', 'no_comments_added'),
(15, 'okay', 'no_comments_added'),
(16, 'good', 'no_comments_added'),
(17, 'very good', 'no_comments_added'),
(18, 'excellent', 'no_comments_added');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_telcos`
--

DROP TABLE IF EXISTS `tbl_telcos`;
CREATE TABLE IF NOT EXISTS `tbl_telcos` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_telcos`
--

INSERT INTO `tbl_telcos` (`id`, `name`) VALUES
(100, 'AirtelTigo'),
(200, 'Glo'),
(300, 'MTN'),
(400, 'Vodafone');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD CONSTRAINT `pricing_id` FOREIGN KEY (`col_pricing`) REFERENCES `tbl_pricing` (`id`),
  ADD CONSTRAINT `region_id` FOREIGN KEY (`col_region`) REFERENCES `tbl_regions` (`id`),
  ADD CONSTRAINT `reliability_id` FOREIGN KEY (`col_reliability`) REFERENCES `tbl_reliability` (`id`),
  ADD CONSTRAINT `support_id` FOREIGN KEY (`col_support`) REFERENCES `tbl_support` (`id`),
  ADD CONSTRAINT `telco_id` FOREIGN KEY (`col_telco`) REFERENCES `tbl_telcos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
