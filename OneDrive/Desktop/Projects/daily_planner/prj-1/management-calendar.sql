-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2021 at 06:34 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management-calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `timestart` varchar(255) NOT NULL,
  `timefinish` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `subject`, `timestart`, `timefinish`, `date`, `comment`) VALUES
(1, 'تست', '', '', '00/09/10', 'این مورد برای تست است'),
(4, 'رفع ارور', '21:03', '09:06', '00/09/24', 'این مورد تست می باشد'),
(5, 'این مورد تست22', '09:03', '23:07', '00/09/25', 'ابفلایبایباdvsknsoklnv'),
(7, 'امتحان ریاضی', '09:00', '10:30', '00/09/29', 'لطفا دانشجویان گرامی امتحان رو خوب مطالعه کنید');

-- --------------------------------------------------------

--
-- Table structure for table `calendar-users`
--

DROP TABLE IF EXISTS `calendar-users`;
CREATE TABLE IF NOT EXISTS `calendar-users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar-users`
--

INSERT INTO `calendar-users` (`id`, `user`, `pass`, `admin`) VALUES
(1, 'admin', '1234', 1),
(2, 'user', '1234', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
