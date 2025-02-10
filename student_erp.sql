-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 07:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_erp`
--

-- --------------------------------------------------------

--
-- 
-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `email`, `password`, `phone`, `created_at`) VALUES
(16, '7', 'deven patel', 'devenp55@gmail.com', '$2y$10$A.9fXssabhKdZAdDUxIeVeH4eAyUVoeVkPCifep074XwAHlZpD3Lu', '7990851740', '2024-11-11 17:13:59'),
(17, '77', 'deven', 'devenp556@gmail.com', '$2y$10$k6WitTEfIBghyiPAr1kdsOd2FAKk94lPNDxNnSbAmqBP/Bonuyczu', '9426126434', '2024-11-11 17:14:32'),
(18, '777', 'deven', 'devenp555@gmail.com', '$2y$10$yiHtfx2Gqcref53n/.60PeAMwbnB2fJmVN2JjJLWUZEOW2F7oZq6.', '7990851740', '2024-11-11 17:18:02'),
(21, '10', 'dp', 'devenp5554@gmail.com', '$2y$10$N1KCTiDIXd5dUAwbSW.w0uLMBurTFbH.HJCPefSccwJ2GIkImXMCy', '7536412896', '2024-11-12 07:28:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
