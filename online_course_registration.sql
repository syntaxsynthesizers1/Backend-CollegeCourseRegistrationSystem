-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 06:12 PM
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
-- Database: `online_coures_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `department`, `course_code`, `course_name`, `created_at`) VALUES
(11, 25, 'INS-123', 'Insurance', '2024-04-06 15:03:36'),
(12, 24, 'BNA-123', 'Banking and Finance', '2024-04-06 15:05:56'),
(13, 23, 'ACC-123', 'Accountancy', '2024-04-06 15:06:47'),
(14, 22, 'MEC-132', 'Mechatronics', '2024-04-06 15:07:43'),
(15, 21, 'COME-213', 'Computer Engineering', '2024-04-06 15:38:08'),
(16, 20, 'MEC-412', 'Mechanical Engineeri', '2024-04-06 15:38:45'),
(17, 19, 'EEE-123', 'Electrical Engineeri', '2024-04-06 15:39:16'),
(18, 18, 'CNG-233', 'Civil Engineering', '2024-04-06 15:39:55'),
(19, 17, 'QSG-123', 'Quantity surveying', '2024-04-06 15:40:28'),
(20, 16, 'BTH-512', 'Building Technology', '2024-04-06 15:41:05'),
(21, 15, 'IND-123', 'Industrial design', '2024-04-06 15:42:15'),
(22, 14, 'ESM-333', 'Estate management', '2024-04-06 15:42:43'),
(23, 13, 'ATC-123', 'Architecture', '2024-04-06 15:43:23'),
(24, 12, 'STS-122', 'Statistics', '2024-04-06 15:43:51'),
(25, 11, 'GEO-343', 'Geology', '2024-04-06 15:44:32'),
(26, 10, 'SLT-111', 'Science Laboratory T', '2024-04-06 15:45:04'),
(27, 9, 'BOC-323', 'Biochemistry', '2024-04-06 15:45:47'),
(28, 8, 'COM-321', 'Computer science', '2024-04-06 15:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `faculty_id`, `name`, `created_at`) VALUES
(8, 2, 'Computer science', '2024-04-06 14:25:46'),
(9, 2, 'Biochemistry', '2024-04-06 14:41:04'),
(10, 2, 'Science Laboratory Technology', '2024-04-06 14:41:35'),
(11, 2, 'Geology', '2024-04-06 14:41:50'),
(12, 2, 'Statistics', '2024-04-06 14:42:08'),
(13, 3, 'Architecture', '2024-04-06 14:42:35'),
(14, 3, 'Estate management', '2024-04-06 14:43:30'),
(15, 3, 'Industrial design', '2024-04-06 14:43:46'),
(16, 3, 'Building Technology', '2024-04-06 14:44:02'),
(17, 3, 'Quantity surveying', '2024-04-06 14:44:26'),
(18, 4, 'Civil Engineering', '2024-04-06 14:46:43'),
(19, 4, 'Electrical Engineering', '2024-04-06 14:47:00'),
(20, 4, 'Mechanical Engineering', '2024-04-06 14:47:20'),
(21, 4, 'Computer Engineering', '2024-04-06 14:47:37'),
(22, 4, 'Mechatronics', '2024-04-06 14:48:06'),
(23, 5, 'Accountancy', '2024-04-06 14:49:02'),
(24, 5, 'Banking and finance', '2024-04-06 14:49:18'),
(25, 5, 'Insurance', '2024-04-06 14:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`id`, `student_id`, `student_name`, `session`, `level`, `semester`, `course`, `created_at`) VALUES
(1, 10, ' Oladimeji Adegboyega', '2022/2023', '100', 'first', '28', '2024-04-06 17:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `created_at`) VALUES
(2, 'Science', '2024-04-06 14:09:26'),
(3, 'Enviromental studies', '2024-04-06 14:10:04'),
(4, 'Engineering', '2024-04-06 14:10:22'),
(5, 'Financial and management studies', '2024-04-06 14:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `created_at`) VALUES
(1, 'first', '2024-03-28 14:41:02'),
(3, 'second', '2024-03-28 14:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `created_at`) VALUES
(11, '2023/2024', '2024-04-06 15:51:48'),
(12, '2022/2023', '2024-04-06 15:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `verified` int(3) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `gender`, `phone`, `password`, `img`, `status`, `verified`, `created_at`) VALUES
(10, 'Adegboyega', 'Oladimeji', 'ade@gmail.com', 'male', '08133517471', '81dc9bdb52d04dc20036dbd8313ed055', '923421712840246photo-1500648767791-00dcc994a43e.jpeg', 0, 1, '2024-04-01 23:15:50'),
(16, 'Admin', 'Admin', 'admin@gmail.com', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 0, '2024-04-02 01:26:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
