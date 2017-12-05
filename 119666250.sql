-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 03:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `119666250`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `Username` text COLLATE utf8_unicode_ci NOT NULL,
  `Attempt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`Username`, `Attempt`, `Time`) VALUES
('aaa', '7', '2017-11-20 16:44:32'),
('abadee', '6', '2017-11-20 16:44:54'),
('admin', '1', '2017-11-20 16:44:21'),
('test01', '1', '2017-11-27 22:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE `personaldetails` (
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`firstname`, `lastname`, `dob`, `phone`, `Username`) VALUES
('abdullah', 'qukandy', '1992-04-23', '1234567890', 'test01'),
('test02', 'test02', '1985-09-28', '8882546628', 'test02');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` datetime NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `subject`, `description`, `createdDate`, `deleted`, `Username`) VALUES
(1, 'test', 'hello world&nbsp;<div>test&nbsp;</div>', '2017-11-07 01:17:52', 0, 'abadee'),
(2, 'delete ', 'delete&nbsp;', '2017-11-07 01:18:41', 1, 'abadee'),
(3, '', '<br>', '2017-11-07 03:09:41', 1, 'aaa'),
(4, 'Sub 04', 'Des 04', '2017-12-04 20:30:00', 0, 'test01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `Email`) VALUES
('aaa', '$2y$10$PlQGx2ILb3TP3OQGwet1aeWp/eultXDCZpHeW1p70NaFZklxPnyli', 'aaa'),
('abadee', '$2y$10$XYFKkGqTQN/F0dYR6I5UMuJBx5FbBWAPweE/O/N.H26nE4ObDs1bq', 'abadee'),
('admin', '$2y$10$rzMr9ShamdIVKYx7LDnxeeKsfgd09Cq8zvpsQ5VMI5vysV6rn8Dmq', 'admin'),
('test01', '$2y$10$O1oo39xBT/gXaq06qDJkVu4lfbAXDKtGjFM8lO2L97yvCKZ2FqYP6', 'test01@gmail.com'),
('test02', '$2y$10$6ML5y1UQFmctdSGhFGmEHeka0VUaRuramZXxooL7gYMXQztKtxb66', 'test02@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wronglog`
--

CREATE TABLE `wronglog` (
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
