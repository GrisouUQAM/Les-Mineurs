-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 12:12 AM
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
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `ID` int(11) NOT NULL,
  `page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rev_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrib_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`ID`, `page_id`, `rev_id`, `parent_id`, `contrib_time`, `website`) VALUES
(1, '3109537', '30052958', '29737862', '2008-05-27 19:58:19', 'fr.wikipedia.org'),
(3, '146692', '1436002', '1342924', '2005-01-21 17:37:04', 'fr.wikipedia.org');

-- --------------------------------------------------------

--
-- Table structure for table `contributor`
--

CREATE TABLE IF NOT EXISTS `contributor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contributor_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contributor`
--

INSERT INTO `contributor` (`ID`, `contributor_username`) VALUES
(1, 'victor'),
(2, 'etienne'),
(3, 'fernando');

-- --------------------------------------------------------

--
-- Table structure for table `talk`
--

CREATE TABLE IF NOT EXISTS `talk` (
  `ID` int(11) NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rev_id` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `talk`
--

INSERT INTO `talk` (`ID`, `website`, `page_id`, `rev_id`) VALUES
(1, 'fr.wikipedia.org', '511134', '21392592'),
(1, 'fr.wikipedia.org', '511134', '17355651'),
(1, 'fr.wikipedia.org', '108426', '14349484'),
(1, 'fr.wikipedia.org', '959857', '13697420'),
(1, 'fr.wikipedia.org', '959857', '13697413'),
(1, 'fr.wikipedia.org', '959857', '13696868'),
(1, 'fr.wikipedia.org', '959857', '13696821'),
(1, 'fr.wikipedia.org', '959857', '13686857'),
(1, 'fr.wikipedia.org', '959857', '13686516'),
(1, 'fr.wikipedia.org', '959857', '13686469');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
