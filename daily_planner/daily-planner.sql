-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2023 at 04:50 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daily-planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `timestart` varchar(255) NOT NULL,
  `timefinish` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `subject`, `timestart`, `timefinish`, `date`, `comment`, `user_id`, `created_at`) VALUES
(25, '111', '11:11', '11:11', '02/10/4', '1111', 1, '2023-12-28 16:46:48'),
(23, '1111', '11:11', '11:11', '02/10/4', '1111', 1, '2023-12-28 16:42:06'),
(24, '111', '11:11', '11:11', '02/10/4', '1111', 1, '2023-12-28 16:43:18'),
(21, 'aaa', '11:11', '11:11', '02/10/4', 'dfgfds', 1, '2023-12-28 16:40:32'),
(22, '1111', '11:11', '11:11', '02/10/4', '1111', 1, '2023-12-28 16:41:02'),
(19, 'sskkcl', '09:57', '10:55', '02/10/5', '', 1, '2023-12-28 16:36:00'),
(20, 'qqq', '11:11', '11:11', '02/10/5', 'aaaa', 1, '2023-12-28 16:40:09'),
(18, 'زبان تخصصی', '01:49', '18:37', '02/10/6', 'قثنبانثباردو', 1, '2023-12-28 13:23:29'),
(17, 'اب', '03:42', '03:42', '02/10/7', '', 1, '2023-12-28 13:13:34'),
(16, 'من', '03:41', '03:40', '02/10/7', '', 1, '2023-12-28 13:13:00'),
(15, '11', '11:11', '11:01', '02/10/7', '123454', 1, '2023-12-28 09:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `text`, `created_at`, `user_id`) VALUES
(1, 'test', '2023-12-28 15:54:18', 1),
(2, 'qqqq', '2023-12-28 15:54:31', 1),
(3, 'qqqq', '2023-12-28 15:58:22', 1),
(4, 'qqqq', '2023-12-28 15:58:40', 1),
(5, 'qqqq', '2023-12-28 15:59:17', 1),
(6, 'qqqq', '2023-12-28 15:59:25', 1),
(7, 'qqqq', '2023-12-28 16:00:06', 1),
(8, 'qqqq', '2023-12-28 16:00:38', 1),
(9, 'qqqq', '2023-12-28 16:00:56', 1),
(10, 'qqqq', '2023-12-28 16:01:08', 1),
(11, 'qqqq', '2023-12-28 16:01:32', 1),
(12, 'qqqq', '2023-12-28 16:01:36', 1),
(13, 'qqqq', '2023-12-28 16:01:55', 1),
(14, 'qqqq', '2023-12-28 16:02:04', 1),
(15, 'qqqq', '2023-12-28 16:02:12', 1),
(16, 'qqqq', '2023-12-28 16:02:17', 1),
(17, 'qqqq', '2023-12-28 16:02:22', 1),
(18, 'qqqq', '2023-12-28 16:02:38', 1),
(19, 'qqqq', '2023-12-28 16:02:52', 1),
(20, 'qqqq', '2023-12-28 16:04:39', 1),
(21, 'qqqq', '2023-12-28 16:04:51', 1),
(22, 'qqqq', '2023-12-28 16:06:19', 1),
(23, 'qqqq', '2023-12-28 16:06:20', 1),
(24, 'qqqq', '2023-12-28 16:06:54', 1),
(25, 'qqqq', '2023-12-28 16:07:21', 1),
(26, 'qqqq', '2023-12-28 16:07:30', 1),
(27, 'qqqq', '2023-12-28 16:07:49', 1),
(28, 'qqqq', '2023-12-28 16:08:09', 1),
(29, 'qqqq', '2023-12-28 16:08:42', 1),
(30, 'qqqq', '2023-12-28 16:08:52', 1),
(31, 'qqqq', '2023-12-28 16:08:58', 1),
(32, 'qqqq', '2023-12-28 16:09:15', 1),
(33, 'qqqq', '2023-12-28 16:09:20', 1),
(34, 'qqqq', '2023-12-28 16:09:28', 1),
(35, 'qqqq', '2023-12-28 16:09:41', 1),
(36, 'qqqq', '2023-12-28 16:09:52', 1),
(37, 'qqqq', '2023-12-28 16:10:06', 1),
(38, 'qqqq', '2023-12-28 16:10:19', 1),
(39, 'qqqq', '2023-12-28 16:10:27', 1),
(40, 'qqqq', '2023-12-28 16:10:34', 1),
(41, 'qqqq', '2023-12-28 16:10:48', 1),
(42, 'سلام', '2023-12-28 16:10:58', 1),
(43, 'سلام', '2023-12-28 16:11:06', 1),
(44, 'سلام', '2023-12-28 16:11:53', 1),
(45, 'testetstets', '2023-12-28 16:12:03', 1),
(46, 'سلام', '2023-12-28 16:12:18', 1),
(47, 'qqqq', '2023-12-28 16:13:03', 1),
(48, 'test', '2023-12-28 16:13:04', 1),
(49, '1111', '2023-12-28 16:13:05', 1),
(50, 'test', '2023-12-28 16:15:11', 2),
(51, 'test', '2023-12-28 16:15:50', 2),
(52, 'test', '2023-12-28 16:16:00', 2),
(53, 'test', '2023-12-28 16:16:06', 2),
(54, 'امروز یمخوام شروع کنم', '2023-12-28 16:33:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `Fname` char(25) DEFAULT NULL,
  `Lname` char(25) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `goal` char(20) DEFAULT NULL,
  `field` char(30) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Fname`, `Lname`, `age`, `goal`, `field`, `user_name`, `password`) VALUES
(1, 'amir', 'test', 18, 'test', 'test', 'amir', '1234'),
(2, 'bita', 'test', 21, 'test', 'test', 'bita', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
