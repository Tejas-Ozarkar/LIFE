-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 12:55 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` int(11) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `blood_type`, `created_at`, `updated_at`) VALUES
(1, 'A+', '2018-04-21 18:05:59', '2018-04-21 18:05:59'),
(2, 'B+', '2018-04-21 18:05:59', '2018-04-21 18:05:59'),
(3, 'AB+', '2018-04-21 18:05:59', '2018-04-21 18:05:59'),
(4, 'O+', '2018-04-21 18:05:59', '2018-04-21 18:05:59'),
(5, 'A-', '2018-04-21 18:05:59', '2018-04-21 18:05:59'),
(6, 'B-', '2018-04-21 18:05:59', '2018-04-21 18:05:59'),
(7, 'AB-', '2018-04-21 18:05:59', '2018-04-21 18:05:59'),
(8, 'O-', '2018-04-21 18:05:59', '2018-04-21 18:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `contact_person_name` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `address_line_1`, `address_line_2`, `city`, `state`, `pincode`, `contact_person_name`, `contact_no`, `email`, `password`, `created_at`, `modified_at`) VALUES
(6, 'Ruby Hall Clinic', 'Shivaji Nagar', '', 'Pune', 'Maharashtra', 411001, '0202616 3391', 0, 'ruby@gmail.com', 'ruby', '2018-04-26 10:17:47', '2018-04-26 10:17:47'),
(9, 'Sancheti Hospital', 'SB, Road, Shivaji Nagar', '', 'Pune', 'Maharashtra', 411001, '23432423', 0, 'sancheti@gmail.com', 'sancheti', '2018-04-26 10:20:13', '2018-04-26 10:20:13'),
(10, 'Lotus Hospital', 'Gurugram', '', 'Gurgaon', 'Haryana', 420010, '852382848', 0, 'lotus@gmail.com', 'lotus', '2018-04-26 10:21:26', '2018-04-26 10:21:26'),
(11, 'Civil Hospital', 'Gurugram', '', 'Gurgaon', 'Maharashtra', 420100, '234828248', 0, 'civil@gmail.com', 'civil', '2018-04-26 10:22:37', '2018-04-26 10:22:37'),
(12, 'Safe Hands Hospital', 'Mulund', '', 'Mumbai', 'Maharashtra', 422006, '824823998', 0, 'safe@gmail.com', 'safe', '2018-04-26 10:23:32', '2018-04-26 10:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_blood`
--

CREATE TABLE `hospital_blood` (
  `id` int(11) NOT NULL,
  `blood_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `samples` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_blood`
--

INSERT INTO `hospital_blood` (`id`, `blood_id`, `hospital_id`, `samples`, `created_at`, `updated_at`) VALUES
(55, 1, 6, 39, '2018-04-26 10:27:19', '2018-04-26 10:27:19'),
(56, 2, 6, 40, '2018-04-26 10:27:25', '2018-04-26 10:47:44'),
(57, 4, 6, 31, '2018-04-26 10:27:32', '2018-04-26 10:46:17'),
(58, 6, 6, 30, '2018-04-26 10:27:44', '2018-04-26 10:27:44'),
(59, 8, 6, 5, '2018-04-26 10:27:50', '2018-04-26 10:27:50'),
(60, 2, 10, 30, '2018-04-26 10:28:55', '2018-04-26 10:28:55'),
(61, 3, 10, 0, '2018-04-26 10:29:24', '2018-04-26 10:52:58'),
(62, 5, 10, 50, '2018-04-26 10:29:31', '2018-04-26 10:29:31'),
(63, 1, 10, 32, '2018-04-26 10:29:44', '2018-04-26 10:29:44'),
(64, 1, 12, 10, '2018-04-26 10:30:12', '2018-04-26 10:30:12'),
(65, 2, 12, 28, '2018-04-26 10:30:20', '2018-04-26 10:43:14'),
(66, 7, 12, 6, '2018-04-26 10:30:31', '2018-04-26 10:30:31'),
(67, 2, 9, 80, '2018-04-26 10:30:59', '2018-04-26 10:43:07'),
(68, 4, 9, 59, '2018-04-26 10:31:06', '2018-04-26 10:47:00'),
(69, 5, 9, 59, '2018-04-26 10:31:18', '2018-04-26 10:31:46'),
(71, 6, 9, 10, '2018-04-26 10:35:46', '2018-04-26 10:35:46'),
(72, 3, 11, 8, '2018-04-26 10:36:17', '2018-04-26 10:44:51'),
(73, 4, 11, 42, '2018-04-26 10:36:30', '2018-04-26 10:36:30'),
(74, 6, 11, 31, '2018-04-26 10:36:42', '2018-04-26 10:36:42'),
(75, 1, 11, 41, '2018-04-26 10:36:58', '2018-04-26 10:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `first_name`, `last_name`, `address_line_1`, `address_line_2`, `city`, `state`, `pincode`, `contact_no`, `email`, `password`, `gender`, `blood_group`, `created_at`, `modified_at`) VALUES
(14, 'Tejas', 'Ozarkar', 'FC Road, Shivaji Nagar', 'Indira Nagar', 'Pune', 'Maharashtra', 410036, 2147483647, 'tejozarkar@gmail.com', 'tejas', 'male', 'B+', '2018-04-26 10:24:24', '2018-04-26 10:27:01'),
(15, 'Jiya', 'Ozarkar', 'Deepali Nagar', 'Indira Nagar', 'Nashik', 'Maharashtra', 422006, 824823985, 'jiya@gmail.com', 'jiya', 'female', 'AB+', '2018-04-26 10:25:14', '2018-04-26 10:25:14'),
(16, 'Rita ', 'P', 'JM Road', 'Indira Nagar', 'Pune', 'Maharashtra', 412320, 823842934, 'rita@gmail.com', 'rita', 'female', 'O+', '2018-04-26 10:26:26', '2018-04-26 10:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `hospital_blood_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `no_of_samples` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `hospital_blood_id`, `receiver_id`, `no_of_samples`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5, 'accept', '2018-04-22 07:52:54', '2018-04-22 13:45:00'),
(2, 1, 1, 5, 'accept', '2018-04-22 08:02:47', '2018-04-22 13:46:27'),
(3, 3, 2, 3, 'pending', '2018-04-22 08:04:13', '2018-04-22 08:04:13'),
(4, 2, 2, 3, 'reject', '2018-04-22 09:56:30', '2018-04-22 13:45:07'),
(5, 3, 1, 5, 'pending', '2018-04-22 13:34:43', '2018-04-22 13:34:43'),
(6, 1, 1, 0, 'accept', '2018-04-22 13:36:20', '2018-04-22 13:45:48'),
(7, 1, 1, 15, 'accept', '2018-04-22 15:33:28', '2018-04-22 15:45:34'),
(8, 1, 1, 6, 'pending', '2018-04-22 15:48:29', '2018-04-22 15:48:29'),
(9, 1, 5, 5, 'pending', '2018-04-23 17:06:37', '2018-04-23 17:06:37'),
(10, 1, 5, 6, 'reject', '2018-04-23 17:06:50', '2018-04-23 17:18:14'),
(11, 1, 5, 5, 'pending', '2018-04-23 17:07:51', '2018-04-23 17:07:51'),
(12, 1, 5, 6, 'pending', '2018-04-23 17:08:41', '2018-04-23 17:08:41'),
(13, 1, 5, 5, 'pending', '2018-04-23 17:11:58', '2018-04-23 17:11:58'),
(14, 44, 0, 0, 'pending', '2018-04-23 20:57:49', '2018-04-23 20:57:49'),
(15, 44, 0, 3, 'pending', '2018-04-23 20:58:05', '2018-04-23 20:58:05'),
(20, 44, 2, 10, 'reject', '2018-04-23 21:21:05', '2018-04-23 21:33:30'),
(21, 44, 2, 10, 'accept', '2018-04-23 21:35:35', '2018-04-23 21:36:21'),
(28, 43, 5, 1, 'reject', '2018-04-23 22:01:20', '2018-04-23 23:23:04'),
(46, 43, 5, 6, 'accept', '2018-04-23 23:24:47', '2018-04-25 09:38:39'),
(47, 43, 5, 3, 'pending', '2018-04-23 23:24:48', '2018-04-23 23:24:48'),
(48, 43, 5, 3, 'reject', '2018-04-24 09:29:28', '2018-04-25 09:44:46'),
(50, 43, 5, 90, 'pending', '2018-04-24 17:16:51', '2018-04-24 17:16:51'),
(52, 43, 5, 542, 'pending', '2018-04-25 10:51:58', '2018-04-25 10:51:58'),
(53, 56, 14, 3, 'pending', '2018-04-26 10:39:02', '2018-04-26 10:39:02'),
(54, 56, 14, 10, 'reject', '2018-04-26 10:42:28', '2018-04-26 10:47:44'),
(55, 67, 14, 10, 'pending', '2018-04-26 10:43:07', '2018-04-26 10:43:07'),
(56, 65, 14, 5, 'pending', '2018-04-26 10:43:14', '2018-04-26 10:43:14'),
(57, 72, 15, 7, 'pending', '2018-04-26 10:44:51', '2018-04-26 10:44:51'),
(58, 61, 15, 7, 'accept', '2018-04-26 10:45:19', '2018-04-26 10:49:46'),
(59, 57, 16, 9, 'pending', '2018-04-26 10:46:17', '2018-04-26 10:46:17'),
(60, 68, 16, 7, 'pending', '2018-04-26 10:47:00', '2018-04-26 10:47:00'),
(61, 61, 15, 5, 'reject', '2018-04-26 10:50:42', '2018-04-26 10:52:25'),
(62, 61, 15, 12, 'pending', '2018-04-26 10:52:58', '2018-04-26 10:52:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hospital_blood`
--
ALTER TABLE `hospital_blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hospital_blood`
--
ALTER TABLE `hospital_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
