-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 02:51 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `village`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `nid` varchar(11) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `akarere` varchar(50) NOT NULL DEFAULT '',
  `umurenge` varchar(50) NOT NULL DEFAULT '',
  `akagali` varchar(50) NOT NULL DEFAULT '',
  `umudugudu` varchar(50) DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT '2',
  `code` int(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `nid`, `names`, `username`, `password`, `user_type`, `akarere`, `umurenge`, `akagali`, `umudugudu`, `status`, `type`, `code`, `created_at`, `updated_at`) VALUES
(11, '10998046993', 'Niyonkuru Elisa', 'niyonkuru', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'LEADER', 'KICUKIRO', 'KANOMBE', 'GATARE', 'KAMAHORO', 'ACTIVE', 2, 460016, '2019-03-27 22:20:51', '2019-03-27 22:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `created_by` text NOT NULL,
  `nid` text NOT NULL,
  `names` varchar(1024) NOT NULL DEFAULT '',
  `sex` varchar(1024) NOT NULL DEFAULT '',
  `father_names` varchar(1024) NOT NULL DEFAULT '',
  `mother_names` varchar(1024) NOT NULL DEFAULT '',
  `birth_date` varchar(200) DEFAULT '',
  `job_type` varchar(20) NOT NULL DEFAULT '',
  `education_type` varchar(50) NOT NULL DEFAULT '',
  `relationship` varchar(50) NOT NULL DEFAULT '',
  `position` int(5) NOT NULL,
  `zip_code` text NOT NULL,
  `house_code` text NOT NULL,
  `assurance` varchar(20) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `district` varchar(50) NOT NULL DEFAULT '',
  `village` varchar(50) NOT NULL DEFAULT '',
  `sector` varchar(50) NOT NULL DEFAULT '',
  `cell` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `created_by`, `nid`, `names`, `sex`, `father_names`, `mother_names`, `birth_date`, `job_type`, `education_type`, `relationship`, `position`, `zip_code`, `house_code`, `assurance`, `telephone`, `district`, `village`, `sector`, `cell`, `status`, `created_at`, `updated_at`) VALUES
(1, '11', '12345678', 'MUGABO Eric', 'dfghjkyt', 'sdfyuiuyt', 'dfghjhgfd', '2019-02-27', 'PRIVATE', 'HIGHT SCHOOL', 'Single', 1, 'sdftyuiolp', 'wertyui', 'MITUEL', 'wertyuiop', 'KICUKIRO', 'NIBOYE', 'GATARE', 'BYIMANA', 'ACTIVE', '2019-03-28 18:39:09', '2019-03-28 18:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `user_id` int(100) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(255) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `user_type` int(2) NOT NULL,
  `verified` int(2) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `isOnline` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`user_id`, `email`, `password`, `names`, `phone`, `gender`, `occupation`, `user_type`, `verified`, `verification_code`, `status`, `isOnline`, `regDate`, `updated_at`) VALUES
(1, 'admin@gmail.com', '6436e7e3345ee3b38542b73085742d0dee22d574c6875e8eb84d20215b8605c6', 'Administrator', '0987654321', 'Male', 'Admin', 1, 1, '123456', 'ACTIVE', '1', '2018-08-26 09:13:35', '2019-02-22 11:33:57'),
(7, 'agent@gmail.com', '628d43140cfcb85c8549cf6785924c4bd8d4ad6f98e4b84d7d09302d253d7033', 'Agent', '+250785290539', 'Male', 'Agent', 2, 1, '574518', 'ACTIVE', '1', '2019-02-10 07:07:25', '2019-02-22 11:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment` varchar(200) NOT NULL DEFAULT '',
  `payment_method` varchar(200) NOT NULL DEFAULT '',
  `phone_number` varchar(200) DEFAULT '',
  `Month` varchar(200) NOT NULL DEFAULT '',
  `status` varchar(200) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `token`, `client_id`, `payment`, `payment_method`, `phone_number`, `Month`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 1, '1000', 'MTN Mobile Money', '+250785290539', 'kamena (Ukwa 6)', 'Pending', '2019-03-29 14:50:12', '2019-03-29 14:50:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
