-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 03:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `clerktasks`
--

CREATE TABLE `clerktasks` (
  `task_id` int(5) NOT NULL,
  `task_title` varchar(200) NOT NULL,
  `task_desc` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `assigned_to` varchar(30) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clerktasks`
--

INSERT INTO `clerktasks` (`task_id`, `task_title`, `task_desc`, `start_date`, `due_date`, `assigned_to`, `status`) VALUES
(78, 'Home Work', '   Complete this homework                ', '2022-03-24', '2022-03-24', 'Adi', ''),
(80, 'Home Work', '          Nothing         ', '2022-03-24', '2022-03-24', 'Avi', 'inprogress');

-- --------------------------------------------------------

--
-- Table structure for table `taskinfo`
--

CREATE TABLE `taskinfo` (
  `task_id` int(4) NOT NULL,
  `task_info` mediumtext NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taskinfo`
--

INSERT INTO `taskinfo` (`task_id`, `task_info`, `status`) VALUES
(72, 'Resume Of sarthak', 'Completed'),
(75, 'nothing', 'not complete'),
(74, 'Just completed', 'Completed'),
(73, 'asach', 'Pending'),
(76, 'Completed Just Now', 'Completed'),
(77, 'Just completed', 'completed'),
(80, 'hii', 'inprogress');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` text NOT NULL,
  `pass` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pass`, `contact`, `role`) VALUES
(1, 'Adi', 'Adi@pass', 1234567890, 'clerk'),
(2, 'Tanu', 'Tanu@pass', 987654321, 'principal'),
(3, 'Avi', 'Avi@pass', 1597536540, 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clerktasks`
--
ALTER TABLE `clerktasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clerktasks`
--
ALTER TABLE `clerktasks`
  MODIFY `task_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
