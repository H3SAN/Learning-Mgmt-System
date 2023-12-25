-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 06:38 AM
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
-- Database: `teamsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(30) NOT NULL,
  `sub_gr_name` varchar(255) NOT NULL,
  `gr_id` int(30) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `sub_gr_name`, `gr_id`, `created_date`) VALUES
(1, 'tuttt', 1, '2023-12-24'),
(2, 'Second Channel', 1, '2023-12-24'),
(3, 'jolly channel', 1, '2023-12-24'),
(4, 'Tutorials', 4, '2023-12-24'),
(5, 'well done', 4, '2023-12-24'),
(6, 'Tutorials', 11, '2023-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `gr_name` varchar(255) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `creator_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `display_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_public` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `gr_name`, `created_by`, `creator_id`, `date_created`, `display_image`, `description`, `is_public`) VALUES
(1, 'Math 101', '20802915', 1, '2023-12-22 20:29:24', 'img/undraw_posting_photo.svg', 'Simply attend lectures and youll be fine', 1),
(2, 'English 101', '20802915', 1, '2023-12-22 20:29:24', 'img/undraw_road_to_knowledge_m8s0.svg', 'You already speak it, so you will be fine', 1),
(3, 'Phys 102', '20802915', 1, '2023-12-22 20:30:47', 'img/undraw_environmental_study_re_q4q8.svg', 'Why was the physics book so full of energy at the party?', 1),
(4, 'Stat 105', '20802915', 1, '2023-12-22 20:30:47', 'img/undraw_programmer_re_owql.svg', 'Statistics show that you cannot get a girlfriend', 1),
(5, 'CMSE 333', 'H3SAN', 1, '2023-12-24 04:26:55', 'img/undraw_engineering_team_a7n2.svg', 'Lets do this one more time', 0),
(6, 'VACD 455', 'H3SAN', 1, '2023-12-24 04:35:02', 'img/undraw_design_community_rcft.svg', 'Some art course for a free A', 1),
(7, 'MIC 101', 'Case', 7, '2023-12-25 05:39:03', '', 'Hopefully, this will work', 1),
(8, 'okay 322', 'Case', 7, '2023-12-25 05:45:37', '', 'one last time', 0),
(9, 'this 322', 'Case', 7, '2023-12-25 05:47:54', '', 'time it will work', 0),
(10, 'WANN 328', 'Case', 7, '2023-12-25 05:49:32', '', 'Go to sleep', 0),
(11, 'CRSS 333', 'Case', 7, '2023-12-25 05:51:26', 'img/undraw_design_community_rcft.svg', 'Finally It worked', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `department_code` varchar(10) DEFAULT NULL,
  `dean_name` varchar(255) DEFAULT NULL,
  `creation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_code`, `dean_name`, `creation_date`) VALUES
(1, 'Computer Science', '101', 'Dr. Smith', '2023-01-15'),
(2, 'Electrical Engineering', '202', 'Dr. Johnson', '2023-02-20'),
(3, 'Mathematics', '303', 'Dr. Brown', '2023-03-25'),
(4, 'Physics', '404', 'Dr. White', '2023-04-30'),
(5, 'Chemistry', '505', 'Dr. Miller', '2023-05-15'),
(6, 'Biology', '606', 'Dr. Davis', '2023-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `add_user` int(3) NOT NULL,
  `edit_priviledges` int(3) NOT NULL,
  `create_group` int(3) NOT NULL,
  `delete_user` int(3) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `add_user`, `edit_priviledges`, `create_group`, `delete_user`, `date_created`) VALUES
(1, 'Admin', 1, 1, 1, 0, '2023-12-21 23:37:10'),
(2, 'Teacher', 1, 1, 1, 1, '2023-12-23 23:11:46'),
(3, 'Student', 1, 1, 1, 1, '2023-12-23 23:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(30) NOT NULL,
  `student_id` int(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `department` varchar(255) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(30) NOT NULL,
  `std_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `std_id`, `course_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 7, 11),
(6, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL DEFAULT current_timestamp(),
  `role_id` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dept_id` int(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `first_name`, `last_name`, `date_of_birth`, `role_id`, `email`, `dept_id`, `password`, `salt`, `date_created`) VALUES
(1, 'H3SAN', 'Hyeladi', 'Malgwi', '2023-12-23', 1, '20802915@emu.edu.tr', 1, '20Lutwn8vNofg', '20231225', '2023-12-21 23:35:16'),
(2, 'Amrabey', 'Emre', 'Ucar', '0000-00-00', 1, 'luck@gmail.com', 2, 'yyy', '', '2023-12-23 15:19:13'),
(3, 'sdsdsd', 'dsdsdsdsd', 'sdsdsd', '2023-11-22', 3, 'sdsdsd@dfdf.dfdf', 3, 'sdsdsdsdsdsd', '', '2023-12-23 15:34:50'),
(4, 'dfjdlfkd;fl', 'Onee', 'fdoifmsdf', '0000-00-00', 3, 'dfdf@dvfgf.sdsd', 1, 'sdso,pdo,4wer', '', '2023-12-23 16:12:12'),
(5, 'Picture', 'Hello', 'world', '2023-12-11', 1, 'perferct@dsod.sdsd', 2, 'sdsdcscsdcew', '', '2023-12-23 20:45:53'),
(6, 'New_User', 'New', 'User', '2023-11-30', 3, 'new@gmail.com', 3, '200.mgXMIXVMA', '20231225', '2023-12-25 03:40:47'),
(7, 'Case', 'Just', 'in', '2023-12-06', 2, 'lucky@gmail.com', 4, '20Lutwn8vNofg', '20222212', '2023-12-25 03:44:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
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
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
