-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2025 at 04:54 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--
CREATE DATABASE IF NOT EXISTS `hotel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotel`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `phone`, `password`, `created_at`) VALUES
(37, 'hetbhojani2412@gmail.com', 'Het', 'Patel', '0000000000', 'dd4b21e9ef71e1291183a46b913ae6f2', '2025-02-16 16:59:45'),
(38, 'dishant@gmail.com', 'Dishant', 'Patel', '1234567890', '1bbd886460827015e5d605ed44252251', '2025-02-16 17:41:36'),
(39, 'harsh@gmail.com', 'Harsh ', 'Mistry', '9687968569', '3158aae2f639622eb50bff2e8c8b649d', '2025-02-17 05:30:28'),
(40, 'rahulbhai010000@gmail.com', 'Rahul', 'bhai', '9292394948', 'bae5e3208a3c700e3db642b6631e95b9', '2025-02-17 18:05:26'),
(41, 'harshil@gmail.com', 'Harshil', 'Mogariya', '9856786443', '1bbd886460827015e5d605ed44252251', '2025-02-18 04:15:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
