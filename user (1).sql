-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 10:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_key` int(11) NOT NULL,
  `date_show` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity_key`, `date_show`) VALUES
(1, 6, 6706598, '2021-01-20'),
(2, 6, 6706598, '2021-01-20'),
(3, 6, 6706598, '2021-01-20'),
(4, 6, 6706598, '2021-01-20'),
(5, 6, 6706598, '2021-01-20'),
(6, 6, 6706598, '2021-01-20'),
(7, 6, 6706598, '2021-01-20'),
(8, 6, 6706598, '2021-01-20'),
(9, 6, 6706598, '2021-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `type` varchar(200) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`, `type`, `user_type`) VALUES
(2, 'admin', 'admin@demo.com', '202cb962ac59075b964b07152d234b70', '2021-01-19 08:51:13', '', 0),
(3, 'admin123', 'anuskumar123go@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-01-19 09:00:37', '', 0),
(4, 'admin@demo', 'anuskumar123go@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-01-19 09:01:02', '', 0),
(5, 'admin@demo.com', 'anuskumar123go@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-01-19 09:03:19', '', 0),
(6, 'anu', 'anuskumar123go@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-01-20 06:56:41', 'education', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
