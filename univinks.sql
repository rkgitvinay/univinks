-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 05:50 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `univinks`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`, `address`) VALUES
(1, 'Raj kumar Goel Institute of Technology', 'ghaziabad');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `college_id` int(10) NOT NULL,
  `parent_id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ug` enum('0','1') NOT NULL,
  `pg` enum('0','1') NOT NULL,
  `dual_degree` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `college_id`, `parent_id`, `name`, `ug`, `pg`, `dual_degree`) VALUES
(1, 1, 0, 'Electrical Engineering', '1', '', ''),
(7, 1, 0, 'Mechanical Engineering', '1', '', ''),
(8, 1, 0, 'Civil Engineering', '1', '', ''),
(11, 1, 1, 'Testing', '0', '1', '0'),
(18, 1, 1, 'btech', '1', '0', '0'),
(19, 1, 1, 'again', '0', '0', '1'),
(20, 1, 7, 'b.tech', '1', '0', '0'),
(21, 1, 8, 'mtech', '0', '1', '0'),
(26, 1, 7, 'Mechanical Engineering', '0', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(9) NOT NULL,
  `college_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `college_id`, `name`, `email`, `department`) VALUES
(1, 1, 'vinay singh', 'vinay@gmail.com', 'computer science'),
(2, 1, 'yogesh jaiswal', 'yogesh@gmail.com', 'electronics communication'),
(3, 1, 'sumit singh', 'sumit@gmail.com', 'electronics communication'),
(4, 1, 'santosh sonkar', 'santosh@gmail.com', 'computer science'),
(5, 1, 'vinay singh', 'vinay@gmail.com', 'computer science'),
(6, 1, 'yogesh jaiswal', 'yogesh@gmail.com', 'electronics communication'),
(7, 1, 'sumit singh', 'sumit@gmail.com', 'electronics communication'),
(8, 1, 'santosh sonkar', 'santosh@gmail.com', 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(9) NOT NULL,
  `college_id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `college_id`, `name`, `designation`, `email`) VALUES
(1, 1, 'vinay singh', 'director', 'vinayksingh2@gmail.com'),
(2, 1, 'yogesh', 'dean', 'yogesh.jaiswal1994@gmail.com'),
(3, 1, 'Sumit singh', 'collector', 'smart@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(9) NOT NULL,
  `college_id` int(5) NOT NULL,
  `identity_number` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `college_id`, `identity_number`, `name`, `department`) VALUES
(1, 1, '0121cse082', 'vinay singh', 'computer science'),
(2, 1, '0121cse083', 'yogesh jaiswal', 'electronics communication'),
(3, 1, '0121cse084', 'sumit singh', 'electronics communication'),
(4, 1, '0121cse085', 'santosh sonkar', 'computer science'),
(5, 1, '0121cse082', 'vinay singh', 'computer science'),
(6, 1, '0121cse083', 'yogesh jaiswal', 'electronics communication'),
(7, 1, '0121cse084', 'sumit singh', 'electronics communication'),
(8, 1, '0121cse085', 'santosh sonkar', 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(9) NOT NULL,
  `course_id` int(9) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_id`, `subject_name`, `subject_code`, `semester`) VALUES
(3, 11, 'Mathematics', '123math', '1st'),
(4, 11, 'English', '242asd', '2nd'),
(5, 18, 'hindi', 'hindi01', '1st'),
(6, 18, 'science', 'sci012', '2nd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `college_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `user_type` enum('student','faculty','admin') NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `setup` enum('college','department','courses','subject','database','studentDatabase','people','complete') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `college_id`, `name`, `email`, `password`, `mobile`, `user_type`, `is_active`, `setup`) VALUES
(1, 1, 'Admin', 'admin@univinks.com', '21232f297a57a5a743894a0e4a801fc3', 1234567890, 'admin', '1', 'people');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
