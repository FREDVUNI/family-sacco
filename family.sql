-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 05:01 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `family`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(180) NOT NULL,
  `role` varchar(180) NOT NULL,
  `is_active` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `role`, `is_active`, `image`, `date_created`) VALUES
(1, 'Fred admin', 'fredvuni809@gmail.com', '$2y$10$wamwE5yRl21wn3t6FBLWS.zGcz4XC4TLSVa7puOQgtCxITJ1hsL/q', 'admin', 1, 'default.png', '2022-02-23 19:58:59'),
(2, 'Samuel', 'kmbsamaurice@gmail.com', '$2y$10$IoNMYpJTHPEfKtxyMvucZuxWHjbYhs9pFQoVpiU/ojDndJHlF.Kru', 'admin', 1, 'default.png', '2022-02-23 20:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `circles`
--

CREATE TABLE `circles` (
  `circle_id` int(11) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `close_date` date NOT NULL DEFAULT current_timestamp(),
  `water` varchar(180) NOT NULL,
  `earth1` varchar(180) NOT NULL,
  `earth2` varchar(200) NOT NULL,
  `wind1` varchar(200) NOT NULL,
  `wind2` varchar(200) NOT NULL,
  `wind3` varchar(200) NOT NULL,
  `wind4` varchar(200) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circles`
--

INSERT INTO `circles` (`circle_id`, `start_date`, `close_date`, `water`, `earth1`, `earth2`, `wind1`, `wind2`, `wind3`, `wind4`, `slug`) VALUES
(1, '2022-02-28', '2022-02-28', 'Tinah', 'Doreen', 'Maureen', 'Eddy', 'Jackie', 'Sophie', 'Kate', '370657521'),
(2, '2022-02-28', '0000-00-00', 'Doreen', 'Eddy', 'Jackie', '3', '5', '6', '7', '925054223'),
(3, '2022-02-28', '0000-00-00', 'Maureen', 'Sophie', 'Kate', '', '', '', '', '977884264');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `referred_by` varchar(200) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(200) NOT NULL,
  `phone` varchar(180) NOT NULL,
  `email` varchar(180) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `referred_by`, `join_date`, `name`, `phone`, `email`, `slug`) VALUES
(1, 'Tinah', '2022-02-28 10:46:45', 'Maureen', '0784912802', 'maureen@gmail.com', 'maureen'),
(2, 'Kate', '2022-02-28 10:47:14', 'Tinah', '0750730118', 'tinah@gmail.com', 'tinah'),
(3, 'Sophie', '2022-02-28 10:47:37', 'Kate', '0781014681', 'kate@gmail.com', 'kate'),
(4, 'Sophie', '2022-02-28 10:49:25', 'Sophie', '0784912803', 'sophie@gmail.com', 'sophie'),
(5, 'Sophie', '2022-02-28 10:49:46', 'Jackie', '0702688576', 'jackie@gmail.com', 'jackie'),
(6, 'Kate', '2022-02-28 10:50:11', 'Doreen', '0702688570', 'doreen@gmail.com', 'doreen'),
(7, 'Doreen', '2022-02-28 10:50:34', 'Eddy', '0784912806', 'eddie@gmail.com', 'eddy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circles`
--
ALTER TABLE `circles`
  ADD PRIMARY KEY (`circle_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `circles`
--
ALTER TABLE `circles`
  MODIFY `circle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
