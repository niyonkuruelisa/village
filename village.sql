-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 09:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.10

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
  `PIN` varchar(32) DEFAULT NULL,
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

INSERT INTO `clients` (`id`, `created_by`, `nid`, `PIN`, `names`, `sex`, `father_names`, `mother_names`, `birth_date`, `job_type`, `education_type`, `relationship`, `position`, `zip_code`, `house_code`, `assurance`, `telephone`, `district`, `village`, `sector`, `cell`, `status`, `created_at`, `updated_at`) VALUES
(1, '11', '12345678', '1234', 'MUGABO Eric', 'dfghjkyt', 'sdfyuiuyt', 'dfghjhgfd', '2019-02-27', 'PRIVATE', 'HIGHT SCHOOL', 'Single', 1, 'sdftyuiolp', 'wertyui', 'MITUEL', 'wertyuiop', 'KICUKIRO', 'NIBOYE', 'GATARE', 'BYIMANA', 'ACTIVE', '2019-03-28 18:39:09', '2019-03-28 18:39:09'),
(2, '', '119998', NULL, 'Placide', 'GABO', 'jnjsn', 'jjsjfsd', '1999-01-01', 'PUBLIC', 'HIGHT SCHOOL', 'Single', 3, 'KG126st', 'JADAS', 'MITUEL', '0785762982', 'KICUKIRO', 'NIBOYE', 'GATARE', 'BYIMANA', 'ACTIVE', '2019-04-10 09:52:26', '2019-04-10 09:52:26'),
(3, '', '12', NULL, 'Pla', 'GABO', 'Ok', 'Test', '1199-01-01', 'PRIVATE', 'HIGHT SCHOOL', 'Single', 1, 'ksa', 'askd', 'MITUEL', 'pla', 'KICUKIRO', 'NIBOYE', 'GATARE', 'BYIMANA', 'ACTIVE', '2019-04-25 06:51:13', '2019-04-25 06:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `month_names`
--

CREATE TABLE `month_names` (
  `id` int(11) NOT NULL,
  `kin` varchar(20) NOT NULL,
  `en` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month_names`
--

INSERT INTO `month_names` (`id`, `kin`, `en`) VALUES
(1, 'Mutarama', 'January'),
(2, 'Gashyantare', 'February'),
(3, 'Werurwe', 'March'),
(4, 'Mata', 'April'),
(5, 'Gicurasi', 'May'),
(6, 'Kamena', 'June'),
(7, 'Nyakanga', 'July'),
(8, 'Kanama', 'August'),
(9, 'Nzeri', 'September'),
(10, 'Ukwakira', 'October'),
(11, 'Ugushyingo', 'November'),
(12, 'Ukuboza', 'December');

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
(1, '', 1, '1000', 'MTN Mobile Money', '+250785290539', 'kamena (Ukwa 6)', 'Pending', '2019-03-29 14:50:12', '2019-03-29 14:50:12'),
(2, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Kanama (Ukwa 8)', 'Pending', '2019-04-02 21:46:36', '2019-04-02 21:46:36'),
(3, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'Pending', '2019-04-03 06:49:16', '2019-04-03 06:49:16'),
(4, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:36:06', '2019-04-03 07:36:06'),
(5, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:37:33', '2019-04-03 07:37:33'),
(6, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:41:04', '2019-04-03 07:41:04'),
(7, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:45:17', '2019-04-03 07:45:17'),
(8, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:45:48', '2019-04-03 07:45:48'),
(9, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:45:53', '2019-04-03 07:45:53'),
(10, '', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:47:08', '2019-04-03 07:47:08'),
(11, '', 1, '5000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:47:38', '2019-04-03 07:47:38'),
(12, '', 1, '5000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:49:18', '2019-04-03 07:49:18'),
(13, '', 1, '5000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 07:50:01', '2019-04-03 07:50:01'),
(14, '', 1, '5000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 08:02:08', '2019-04-03 08:02:08'),
(15, '', 1, '5000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 08:08:00', '2019-04-03 08:08:00'),
(16, '', 1, '5000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 08:11:31', '2019-04-03 08:11:31'),
(17, '2c9e802a06f0da99ba9d867d045de128f779c3a1f48e98af1945a3c27c074865', 1, '5000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'FAILED', '2019-04-03 08:12:10', '2019-04-03 08:12:14'),
(18, 'ccdfba8e15357073b4e2188b0a08b4c21e6e6dbedf98ff49341fc0aa7814d019', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'FAILED', '2019-04-03 08:28:21', '2019-04-03 08:28:25'),
(19, 'da87152f4edca75394e42eedd27b887b4e465d1104ad62d9bd37131e08973c1a', 1, '100', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'PENDING', '2019-04-03 08:29:32', '2019-04-03 08:29:36'),
(20, 'adab981c0b6551695a4b17737637439bf836e2fcbb57e9df940771221e2e65ed', 1, '100', 'MTN Mobile Money', '0782163537', 'Mutarama (Ukwa 1)', 'FAILED', '2019-04-23 16:09:42', '2019-04-23 16:09:44'),
(21, '0da4d57d93b33806533cbabef283dd9623a061e43c8462c5aa984b93a6ab9d39', 1, '1000', 'MTN Mobile Money', '0782163537', 'Mutarama (Ukwa 1)', 'FAILED', '2019-04-23 16:09:58', '2019-04-23 16:10:04'),
(22, 'a9102914f8460c72cd308d1d0653e5609d48a6b491f350a6d28d6b46f7f33454', 1, '1000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'FAILED', '2019-04-23 16:10:15', '2019-04-23 16:10:21'),
(23, '23bcd2429cd3c01e666c48929ac25a0025063c6edc55444c2b90cbf994d17bf8', 1, '1000', 'MTN Mobile Money', '0784762982', 'Mutarama (Ukwa 1)', 'FAILED', '2019-04-23 16:10:28', '2019-04-23 16:10:35'),
(24, '', 0, '100', '', '0784762982', '1', 'PENDING', '2019-05-17 06:48:05', '2019-05-17 06:48:05'),
(25, 'e64d1f50de94430fae0034e64472c59b3015d9d7e819d39c6637253cbf87b665', 12345678, '', 'MOMO', '0784762982', '3', 'FAILED', '2019-05-26 17:58:24', '2019-05-26 17:58:26'),
(26, '1d65193ba792b3491475532b430ec2a701b5af7289886f9d4653851e73a9180d', 12345678, '200', 'MOMO', '0784762982', '3', 'PENDING', '2019-05-26 17:59:20', '2019-05-26 17:59:23'),
(27, '592863284ee5e8a65ab9f2eed11f62507b68d0c39f6e3df75f0ccf500c3f8d38', 12345678, '200', 'MOMO', '0784762982', '3', 'PENDING', '2019-05-26 18:02:10', '2019-05-26 18:02:14'),
(28, '4fc53d669233566357fdea5b092c6d35caf6ddba469dc9dc9dcba0431563d64d', 12345678, '200', 'MOMO', '0784762982', '3', 'PENDING', '2019-05-26 18:02:53', '2019-05-26 18:02:56'),
(29, '7911138ba159c38f4fac4e402af2a82058e12cdd0b089a7e64fdc568bfd6af51', 12345678, '200', 'MOMO', '0784762982', '5', 'PENDING', '2019-05-26 18:05:13', '2019-05-26 18:05:17'),
(30, '62615ca3970a10a90fb3241470df49c8e94c2d95f74527a7d64b9eddb2e428cb', 1, '200', 'MOMO', '0784762982', '5', 'PENDING', '2019-05-26 18:46:27', '2019-05-26 18:46:30'),
(31, '', 0, '100', '', '0784762982', '1', 'PENDING', '2019-05-30 17:56:18', '2019-05-30 17:56:18'),
(32, '', 0, '100', '', '0784762982', '1', 'PENDING', '2019-05-30 18:00:57', '2019-05-30 18:00:57'),
(33, '3f1b70387b17bce94ca0361d9d25eec19193c76f370509e147a0b50447e33c25', 1, '200', 'MTN Mobile Money', '0784762982', '8', 'FAILED', '2020-01-10 20:07:00', '2020-01-10 20:07:03'),
(34, '52a54246a877a932dbdc3589211febd6feb424ba26afb1d913658f4a29f2c1f9', 1, '200', 'MTN Mobile Money', '0785290539', '1', 'PENDING', '2020-01-10 20:10:02', '2020-01-10 20:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `ussdtempdata`
--

CREATE TABLE `ussdtempdata` (
  `id` int(11) NOT NULL,
  `session_id` varchar(256) NOT NULL,
  `data` varchar(1024) NOT NULL,
  `type` varchar(64) NOT NULL COMMENT 'type of data we''re keeping',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ussdtempdata`
--

INSERT INTO `ussdtempdata` (`id`, `session_id`, `data`, `type`, `time`) VALUES
(1, '2n3v4j44nuefscto0pebbf7jn1', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 05:09:20'),
(2, '2n3v4j44nuefscto0pebbf7jn1', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 05:20:11'),
(3, 'ATUid_78749eaf9fbf083a924ebde421ed182c', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 06:02:26'),
(4, 'ATUid_8e12fc430cb2f65a3d5f6f71dcc19801', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 06:02:45'),
(5, 'ATUid_8e12fc430cb2f65a3d5f6f71dcc19801', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 06:03:06'),
(6, 'ATUid_a0d1edacd2e9a78bb891b8bc809d5466', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 07:07:40'),
(7, '6ivo6i5ifekj4nj6bm6gb7c883', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 07:35:01'),
(8, 'ATUid_7bc14ed227c068001d15d6fcbdb18d82', '[]', 'usercars', '2018-10-18 07:40:07'),
(9, 'ATUid_f476eb57ad95b2ec1e4933d46a277aaa', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 07:40:52'),
(10, 'ATUid_9d4b218ad778ff25fe902acf0e1f7136', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 07:44:44'),
(11, 'ATUid_37d9e250e7dd695e09ab5e03bae67d7a', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 07:58:16'),
(12, 'ATUid_bd9f45c2fe6798fc1a4ebb699533b15d', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-18 08:06:08'),
(13, 'ATUid_c63db9fa3ddea6241dda8c7fa9444609', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-19 21:16:00'),
(14, 'ATUid_4ddf89f25e8857db54bcb5527341600e', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-20 08:16:57'),
(15, 'ATUid_e37028165fdc78091897d2b602a34335', '{\"1\":\"RAC210K\"}', 'usercars', '2018-10-20 08:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `ussduser`
--

CREATE TABLE `ussduser` (
  `id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `lang` enum('kin','en') NOT NULL DEFAULT 'kin',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ussduser`
--

INSERT INTO `ussduser` (`id`, `phone`, `lang`, `createdDate`) VALUES
(0, '', 'kin', '2019-04-02 15:07:29'),
(1, '0784762982', 'kin', '2019-05-19 18:30:58'),
(2, '', 'kin', '2018-10-26 12:07:58'),
(3, '0788701203', 'kin', '2018-10-26 12:10:52'),
(4, '0784848236', 'en', '2019-03-10 13:59:36'),
(5, '0780292886', 'kin', '2018-10-26 12:25:46'),
(6, '0788677050', 'en', '2018-10-27 19:51:31'),
(7, '0788397938', 'en', '2018-12-20 06:25:29'),
(8, '0785859805', 'en', '2018-10-29 12:32:41'),
(9, '0788353377', 'kin', '2018-10-30 12:28:38'),
(10, '0788356321', 'kin', '2018-11-01 14:20:39'),
(11, '0782208555', 'en', '2018-11-01 16:53:30'),
(12, '0785660921', 'kin', '2018-11-02 17:31:59'),
(13, '0784589841', 'kin', '2019-03-17 16:33:59'),
(14, '0784853194', 'kin', '2018-11-05 07:38:29'),
(15, '0782528184', 'kin', '2018-11-05 07:38:36'),
(16, '0788462939', 'en', '2018-11-05 07:39:49'),
(17, '0789789763', 'kin', '2018-11-09 13:12:23'),
(18, '0787510261', 'kin', '2018-11-12 17:20:15'),
(19, '0783626860', 'kin', '2018-11-30 12:02:00'),
(20, '0787440205', 'kin', '2018-11-30 21:22:17'),
(21, '0788944903', 'kin', '2018-12-03 14:40:14'),
(22, '0787065803', 'kin', '2018-12-06 17:24:28'),
(23, '0787972795', 'kin', '2018-12-10 07:34:46'),
(24, '0783101473', 'kin', '2018-12-12 13:24:11'),
(25, '0782474387', 'kin', '2018-12-13 05:51:21'),
(26, '0786741964', 'kin', '2018-12-20 07:48:16'),
(27, '0781263436', 'kin', '2018-12-21 10:35:10'),
(28, '0781032112', 'kin', '2018-12-23 14:33:45'),
(29, '0788624733', 'kin', '2018-12-25 05:18:03'),
(30, '0789604455', 'kin', '2018-12-31 16:45:39'),
(31, '0788384449', 'kin', '2019-01-08 06:47:40'),
(32, '0783366893', 'en', '2019-01-24 08:35:10'),
(33, '0788647117', 'kin', '2019-01-26 16:35:40'),
(34, '0783381318', 'kin', '2019-01-28 16:28:00'),
(35, '0788580740', 'kin', '2019-01-29 13:00:46'),
(36, '0789812906', 'en', '2019-01-31 13:59:45'),
(37, '0788303058', 'en', '2019-01-31 13:59:51'),
(38, '0786542040', 'en', '2019-01-31 13:59:51'),
(39, '0788301141', 'kin', '2019-01-31 13:59:51'),
(40, '0789831116', 'kin', '2019-02-01 16:23:26'),
(41, '0788300456', 'kin', '2019-02-01 19:35:45'),
(42, '0781392020', 'kin', '2019-02-02 14:47:50'),
(43, '0783908960', 'kin', '2019-02-04 18:52:07'),
(44, '0789438523', 'kin', '2019-02-06 11:41:12'),
(45, '0788873051', 'kin', '2019-02-06 18:10:31'),
(46, '0786260551', 'kin', '2019-02-12 08:59:43'),
(47, '0784732546', 'kin', '2019-02-19 10:58:38'),
(48, '0780826430', 'kin', '2019-02-19 11:18:09'),
(49, '0787747956', 'kin', '2019-02-20 05:37:38'),
(50, '0786992490', 'kin', '2019-02-20 16:59:06'),
(51, '0787329847', 'kin', '2019-02-20 19:08:46'),
(52, '0788726903', 'kin', '2019-02-26 18:10:46'),
(53, '0788370859', 'kin', '2019-02-27 07:04:38'),
(54, '0785747420', 'kin', '2019-02-28 18:13:08'),
(55, '0783626454', 'kin', '2019-03-01 13:00:15'),
(56, '0788963267', 'kin', '2019-03-15 07:08:25'),
(57, '0788882362', 'kin', '2019-03-05 23:11:03'),
(58, '0783237883', 'kin', '2019-03-14 07:49:30'),
(59, '0780192164', 'kin', '2019-03-14 11:03:48'),
(60, '0789754425', 'kin', '2019-03-15 06:26:53'),
(61, '0783045650', 'kin', '2019-03-15 09:51:35'),
(62, '0788570076', 'kin', '2019-03-15 12:32:10'),
(63, '0782277663', 'kin', '2019-03-16 09:17:45'),
(64, '0785536883', 'kin', '2019-03-17 15:51:41'),
(65, '0783424994', 'kin', '2019-03-17 16:02:22'),
(66, '0783665587', 'kin', '2019-03-26 07:43:03'),
(67, '7847629821', 'kin', '2019-05-13 04:34:12');

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
-- Indexes for table `month_names`
--
ALTER TABLE `month_names`
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
-- Indexes for table `ussdtempdata`
--
ALTER TABLE `ussdtempdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ussduser`
--
ALTER TABLE `ussduser`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `month_names`
--
ALTER TABLE `month_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ussdtempdata`
--
ALTER TABLE `ussdtempdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ussduser`
--
ALTER TABLE `ussduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
