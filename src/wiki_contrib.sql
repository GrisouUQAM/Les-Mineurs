-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 02:39 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wiki_contrib`
--
CREATE DATABASE IF NOT EXISTS `wiki_contrib` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `wiki_contrib`;

-- --------------------------------------------------------

--
-- Table structure for table `contributor`
--

CREATE TABLE IF NOT EXISTS `contributor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contributor_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rev_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrib_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL,
  FOREIGN KEY (`ID`) REFERENCES contributor(`ID`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `talk`
--

CREATE TABLE IF NOT EXISTS `talk` (
  `ID` int(11) NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rev_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  FOREIGN KEY (`ID`) REFERENCES contributor(`ID`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
