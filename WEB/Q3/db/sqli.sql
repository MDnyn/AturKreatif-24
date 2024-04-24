-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 05:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqli`
--
CREATE DATABASE IF NOT EXISTS `sqli` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sqli`;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

DROP TABLE IF EXISTS `flight`;
CREATE TABLE IF NOT EXISTS `flight` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `flight_from` varchar(255) NOT NULL,
  `flight_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `status`, `ticket`, `company`, `flight_from`, `flight_to`) VALUES
(100082801, 'Arrival', 'AXM891', 'AirAsia', 'Bangkok', 'Kuala Lumpur'),
(100082802, 'Boarding', 'FFM1338', 'Firefly', 'Kuala Lumpur', 'Johor Bahru'),
(100082803, 'Departure', 'MAS715', 'Malaysia Airlines', 'Kuala Lumpur', 'Denpasar');

-- --------------------------------------------------------

--
-- Table structure for table `w0wg00d`
--

DROP TABLE IF EXISTS `w0wg00d`;
CREATE TABLE IF NOT EXISTS `w0wg00d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `f0undM3` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `w0wg00d`
--

INSERT INTO `w0wg00d` (`id`, `status`, `f0undM3`, `type`, `age`, `color`) VALUES
(1, 'hacked', '4turkr34tif24{h4v354f370urn3y}', 'Anonymous', '23', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
