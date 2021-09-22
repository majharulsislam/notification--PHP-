-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 10:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notificationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES
(29, 'Majharul', 'like', '', 'read', '2021-04-21 00:37:31'),
(30, '', 'comment', 'hi , I am masud', 'unread', '2021-04-21 00:38:07'),
(32, 'Mithun', 'like', '', 'read', '2021-04-21 02:11:26'),
(33, '', 'comment', 'hi , I am Mithun', 'read', '2021-04-21 02:13:28'),
(34, 'Masud', 'like', '', 'unread', '2021-04-21 03:10:55'),
(35, '', 'comment', 'hi , I am masud', 'unread', '2021-04-21 03:11:49'),
(36, '', 'comment', 'hi', 'unread', '2021-04-21 03:12:24'),
(37, 'Ashar', 'like', '', 'unread', '2021-04-21 16:27:13'),
(38, 'Masud', 'like', '', 'unread', '2021-04-21 16:27:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
