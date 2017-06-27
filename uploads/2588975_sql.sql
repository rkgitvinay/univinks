-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2017 at 11:38 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `univinks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `name`, `email`) VALUES
(1, 1, 'Admin', 'admin@univinks.com');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(9) NOT NULL,
  `subject_id` int(9) NOT NULL,
  `faculty_id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `upvote` int(5) NOT NULL,
  `downvote` int(5) NOT NULL,
  `comments` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `subject_id`, `faculty_id`, `name`, `notes`, `deadline`, `upvote`, `downvote`, `comments`, `created_at`) VALUES
(3, 3, 14, '3609212_DMRC Test Pager.csv', 'this is notes', '2016-12-28', 0, 0, 0, '2016-12-30 20:26:17'),
(4, 3, 14, '3989800_Dmrc.pdf', '', '2016-12-24', 0, 0, 0, '2016-12-30 20:41:56'),
(5, 1, 14, '4805268_Data Structure.pdf', 'asap', '2017-01-15', 0, 0, 0, '2017-01-08 18:11:54'),
(7, 28, 1987, '3496227_Data Structures.pdf', '', '2017-03-30', 0, 1, 0, '2017-03-02 19:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submit`
--

CREATE TABLE `assignment_submit` (
  `id` int(9) NOT NULL,
  `subject_id` int(9) NOT NULL,
  `assgn_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('submit','accept','reject','review') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_submit`
--

INSERT INTO `assignment_submit` (`id`, `subject_id`, `assgn_id`, `user_id`, `name`, `status`, `created_at`) VALUES
(6, 28, 7, 2119, '3496227_Data Structures.pdf_510815035.pdf', 'submit', '2017-04-03 18:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_upvote`
--

CREATE TABLE `assignment_upvote` (
  `id` int(9) NOT NULL,
  `assignment_id` int(9) NOT NULL,
  `student_id` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('upvote','downvote') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_upvote`
--

INSERT INTO `assignment_upvote` (`id`, `assignment_id`, `student_id`, `created_at`, `status`) VALUES
(1, 7, 2124, '2017-03-02 20:50:26', 'downvote');

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
(1, 'Raj kumar Goel Institute of Technology', 'ghaziabad'),
(2, 'krishna enginnering college', 'ghaziabad'),
(3, 'Ajay kumar garg engg college', 'noida');

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
(68, 1, 0, 'Computer Science and Technology', '0', '1', '1'),
(69, 1, 0, 'Information Technology', '0', '1', '1'),
(70, 1, 0, 'Electrical Engineering', '0', '1', '1'),
(71, 1, 0, 'Mechanical Engineering', '0', '1', '1'),
(72, 1, 0, 'Electronics and Telecommunication Engineering', '0', '1', '1'),
(73, 1, 0, 'Mining Engineering', '0', '1', '1'),
(74, 1, 0, 'Metallurgy and Material Science', '0', '1', '1'),
(75, 1, 0, 'Civil Engineering', '0', '1', '1'),
(76, 1, 0, 'Aerospace Engineering and Applied Mechanics', '0', '1', '1'),
(77, 1, 68, 'Dual Degree', '0', '0', '1'),
(78, 1, 68, 'M. Tech', '0', '1', '0'),
(79, 1, 69, 'Dual Degree', '0', '0', '1'),
(80, 1, 69, 'M. Tech', '0', '1', '0'),
(81, 1, 70, 'Dual Degree', '0', '0', '1'),
(82, 1, 70, 'M. Tech', '0', '1', '0'),
(83, 1, 71, 'Dual Degree', '0', '0', '1'),
(84, 1, 71, 'M. Tech', '0', '1', '0'),
(85, 1, 72, 'Dual Degree', '0', '0', '1'),
(86, 1, 72, 'M. Tech', '0', '1', '0'),
(87, 1, 73, 'Dual Degree', '0', '0', '1'),
(88, 1, 73, 'M. Tech', '0', '1', '0'),
(89, 1, 74, 'Dual Degree', '0', '0', '1'),
(90, 1, 74, 'M. Tech', '0', '1', '0'),
(91, 1, 75, 'Dual Degree', '0', '0', '1'),
(92, 1, 75, 'M. Tech', '0', '1', '0'),
(93, 1, 76, 'Dual Degree', '0', '0', '1'),
(94, 1, 76, 'M. Tech', '0', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `user_id`, `name`, `email`, `department`) VALUES
(95, 701, 'Aditya Bose', 'adityabose27@gmail.com', 'Information Technology'),
(96, 702, 'Sanket Chakraborty', 'sanketchaku@gmail.com', 'Information Technology'),
(97, 703, 'Rohit Pandey', 'rohitpandey0194@gmail.com', 'Information Technology'),
(98, 704, 'Ankita Singh', 'ankitasinghchikki@gmail.com', 'Information Technology'),
(99, 705, 'Richa Tiberewal', 'richa.besu@gmail.com', 'Information Technology'),
(100, 706, 'Sourav Saha', 'itzmesourav@outlook.com', 'Information Technology'),
(101, 707, 'Ashish Sharma', 'asishkumarsharma1994@gmail.com', 'Information Technology'),
(102, 708, 'Kajal Agarwal', 'agrawal.kj1204@gmail.com', 'Information Technology'),
(103, 709, 'Shantanu Saurabh', 'saurabh1595@gmail.com', 'Information Technology'),
(104, 710, 'Mayank Kumar', 'kumar.mayank98@gmail.com', 'Computer Science and Technology'),
(105, 711, 'Sandeep Kumar', 'sandeep.gprs@gmail.com', 'Computer Science and Technology'),
(106, 712, 'Tuhin Dan', 'mail.tuhin.dan@gmail.com', 'Computer Science and Technology'),
(107, 713, 'Ankit Choudhary', 'ankitchoudhary2008@gmail.com', 'Computer Science and Technology'),
(108, 714, 'Diptanshu Ghosh', 'diptanshu94@gmail.com', 'Computer Science and Technology'),
(109, 715, 'Roushan Sinha', 'roushan.jmp@gmail.com', 'Electronics and Telecommunication'),
(110, 716, 'Anurag Gupta', 'anurag181995gupta@gmail.com', 'Electronics and Telecommunication'),
(111, 717, 'Anurag Malakar', 'anu.23.5.95.mal@gmail.com', 'Mechanical Engineering'),
(112, 718, 'Sekhar Choudhury', 'csekhary53@gmail.com', 'Aerospace Engineering and Applied Mechanics'),
(113, 719, 'Gaurav Syal', 'gauravsyal220295@gmail.com', 'Civil Engineering'),
(114, 720, 'Basant Bera', 'berabasanta95@gmail.com', 'Civil Engineering'),
(115, 721, 'Mousom Singha', 'ananda3017@gmail.com', 'Mining Engineering'),
(116, 722, 'Jaspal Singh', 'singhjaspal9801@gmail.com', 'Mining Engineering'),
(117, 723, 'Niharika Singh', 'niharikas981@gmail.com', 'Electrical Engineering'),
(118, 724, 'Sabyasachi Datta', 'sabyasachi.datta11@gmail.com', 'Electrical Engineering'),
(119, 725, 'Vishal Singh', 'vshlsingh566@gmail.com', 'Electrical Engineering'),
(120, 726, 'Nitish Kumar', 'nitish.iiest@gmail.com', 'Metallurgy and Material Science'),
(121, 1032, 'Devang Singh', '10.devang@gmail.com', 'Information Technology'),
(148, 1935, 'Aditya Bose', 'adityabose27@gmail.com', 'Information Technology'),
(149, 1936, 'Sanket Chakraborty', 'sanketchaku@gmail.com', 'Information Technology'),
(150, 1937, 'Rohit Pandey', 'rohitpandey0194@gmail.com', 'Information Technology'),
(151, 1938, 'Ankita Singh', 'ankitasinghchikki@gmail.com', 'Information Technology'),
(152, 1939, 'Richa Tiberewal', 'richa.besu@gmail.com', 'Information Technology'),
(153, 1940, 'Sourav Saha', 'itzmesourav@outlook.com', 'Information Technology'),
(154, 1941, 'Ashish Sharma', 'asishkumarsharma1994@gmail.com', 'Information Technology'),
(155, 1942, 'Kajal Agarwal', 'agrawal.kj1204@gmail.com', 'Information Technology'),
(156, 1943, 'Shantanu Saurabh', 'saurabh1595@gmail.com', 'Information Technology'),
(157, 1944, 'Mayank Kumar', 'kumar.mayank98@gmail.com', 'Computer Science and Technology'),
(158, 1945, 'Sandeep Kumar', 'sandeep.gprs@gmail.com', 'Computer Science and Technology'),
(159, 1946, 'Tuhin Dan', 'mail.tuhin.dan@gmail.com', 'Computer Science and Technology'),
(160, 1947, 'Ankit Choudhary', 'ankitchoudhary2008@gmail.com', 'Computer Science and Technology'),
(161, 1948, 'Diptanshu Ghosh', 'diptanshu94@gmail.com', 'Computer Science and Technology'),
(162, 1949, 'Roushan Sinha', 'roushan.jmp@gmail.com', 'Electronics and Telecommunication'),
(163, 1950, 'Anurag Gupta', 'anurag181995gupta@gmail.com', 'Electronics and Telecommunication'),
(164, 1951, 'Anurag Malakar', 'anu.23.5.95.mal@gmail.com', 'Mechanical Engineering'),
(165, 1952, 'Sekhar Choudhury', 'csekhary53@gmail.com', 'Aerospace Engineering and Applied Mechanics'),
(166, 1953, 'Gaurav Syal', 'gauravsyal220295@gmail.com', 'Civil Engineering'),
(167, 1954, 'Basant Bera', 'berabasanta95@gmail.com', 'Civil Engineering'),
(168, 1955, 'Mousom Singha', 'ananda3017@gmail.com', 'Mining Engineering'),
(169, 1956, 'Jaspal Singh', 'singhjaspal9801@gmail.com', 'Mining Engineering'),
(170, 1957, 'Niharika Singh', 'niharikas981@gmail.com', 'Electrical Engineering'),
(171, 1958, 'Sabyasachi Datta', 'sabyasachi.datta11@gmail.com', 'Electrical Engineering'),
(172, 1959, 'Vishal Singh', 'vshlsingh566@gmail.com', 'Electrical Engineering'),
(173, 1960, 'Nitish Kumar', 'nitish.iiest@gmail.com', 'Metallurgy and Material Science'),
(174, 1961, 'Aditya Bose', 'adityabose27@gmail.com', 'Information Technology'),
(175, 1962, 'Sanket Chakraborty', 'sanketchaku@gmail.com', 'Information Technology'),
(176, 1963, 'Rohit Pandey', 'rohitpandey0194@gmail.com', 'Information Technology'),
(177, 1964, 'Ankita Singh', 'ankitasinghchikki@gmail.com', 'Information Technology'),
(178, 1965, 'Richa Tiberewal', 'richa.besu@gmail.com', 'Information Technology'),
(179, 1966, 'Sourav Saha', 'itzmesourav@outlook.com', 'Information Technology'),
(180, 1967, 'Ashish Sharma', 'asishkumarsharma1994@gmail.com', 'Information Technology'),
(181, 1968, 'Kajal Agarwal', 'agrawal.kj1204@gmail.com', 'Information Technology'),
(182, 1969, 'Shantanu Saurabh', 'saurabh1595@gmail.com', 'Information Technology'),
(183, 1970, 'Mayank Kumar', 'kumar.mayank98@gmail.com', 'Computer Science and Technology'),
(184, 1971, 'Sandeep Kumar', 'sandeep.gprs@gmail.com', 'Computer Science and Technology'),
(185, 1972, 'Tuhin Dan', 'mail.tuhin.dan@gmail.com', 'Computer Science and Technology'),
(186, 1973, 'Ankit Choudhary', 'ankitchoudhary2008@gmail.com', 'Computer Science and Technology'),
(187, 1974, 'Diptanshu Ghosh', 'diptanshu94@gmail.com', 'Computer Science and Technology'),
(188, 1975, 'Roushan Sinha', 'roushan.jmp@gmail.com', 'Electronics and Telecommunication'),
(189, 1976, 'Anurag Gupta', 'anurag181995gupta@gmail.com', 'Electronics and Telecommunication'),
(190, 1977, 'Anurag Malakar', 'anu.23.5.95.mal@gmail.com', 'Mechanical Engineering'),
(191, 1978, 'Sekhar Choudhury', 'csekhary53@gmail.com', 'Aerospace Engineering and Applied Mechanics'),
(192, 1979, 'Gaurav Syal', 'gauravsyal220295@gmail.com', 'Civil Engineering'),
(193, 1980, 'Basant Bera', 'berabasanta95@gmail.com', 'Civil Engineering'),
(194, 1981, 'Mousom Singha', 'ananda3017@gmail.com', 'Mining Engineering'),
(195, 1982, 'Jaspal Singh', 'singhjaspal9801@gmail.com', 'Mining Engineering'),
(196, 1983, 'Niharika Singh', 'niharikas981@gmail.com', 'Electrical Engineering'),
(197, 1984, 'Sabyasachi Datta', 'sabyasachi.datta11@gmail.com', 'Electrical Engineering'),
(198, 1985, 'Vishal Singh', 'vshlsingh566@gmail.com', 'Electrical Engineering'),
(199, 1986, 'Nitish Kumar', 'nitish.iiest@gmail.com', 'Metallurgy and Material Science'),
(200, 1987, 'Devang Singh', '10.devang@gmail.com', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_department`
--

CREATE TABLE `faculty_department` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_department`
--

INSERT INTO `faculty_department` (`id`, `user_id`, `department`) VALUES
(93, 701, 'Information Technology'),
(94, 702, 'Information Technology'),
(95, 703, 'Information Technology'),
(96, 704, 'Information Technology'),
(97, 705, 'Information Technology'),
(98, 706, 'Information Technology'),
(99, 707, 'Information Technology'),
(100, 708, 'Information Technology'),
(101, 709, 'Information Technology'),
(102, 710, 'Computer Science and Technology'),
(103, 711, 'Computer Science and Technology'),
(104, 712, 'Computer Science and Technology'),
(105, 713, 'Computer Science and Technology'),
(106, 714, 'Computer Science and Technology'),
(107, 715, 'Electronics and Telecommunication'),
(108, 716, 'Electronics and Telecommunication'),
(109, 717, 'Mechanical Engineering'),
(110, 718, 'Aerospace Engineering and Applied Mechanics'),
(111, 719, 'Civil Engineering'),
(112, 720, 'Civil Engineering'),
(113, 721, 'Mining Engineering'),
(114, 722, 'Mining Engineering'),
(115, 723, 'Electrical Engineering'),
(116, 724, 'Electrical Engineering'),
(117, 725, 'Electrical Engineering'),
(118, 726, 'Metallurgy and Material Science'),
(119, 1032, 'Information Technology'),
(120, 1909, 'Information Technology'),
(121, 1910, 'Information Technology'),
(122, 1911, 'Information Technology'),
(123, 1912, 'Information Technology'),
(124, 1913, 'Information Technology'),
(125, 1914, 'Information Technology'),
(126, 1915, 'Information Technology'),
(127, 1916, 'Information Technology'),
(128, 1917, 'Information Technology'),
(129, 1918, 'Computer Science and Technology'),
(130, 1919, 'Computer Science and Technology'),
(131, 1920, 'Computer Science and Technology'),
(132, 1921, 'Computer Science and Technology'),
(133, 1922, 'Computer Science and Technology'),
(134, 1923, 'Electronics and Telecommunication'),
(135, 1924, 'Electronics and Telecommunication'),
(136, 1925, 'Mechanical Engineering'),
(137, 1926, 'Aerospace Engineering and Applied Mechanics'),
(138, 1927, 'Civil Engineering'),
(139, 1928, 'Civil Engineering'),
(140, 1929, 'Mining Engineering'),
(141, 1930, 'Mining Engineering'),
(142, 1931, 'Electrical Engineering'),
(143, 1932, 'Electrical Engineering'),
(144, 1933, 'Electrical Engineering'),
(145, 1934, 'Metallurgy and Material Science'),
(146, 1935, 'Information Technology'),
(147, 1936, 'Information Technology'),
(148, 1937, 'Information Technology'),
(149, 1938, 'Information Technology'),
(150, 1939, 'Information Technology'),
(151, 1940, 'Information Technology'),
(152, 1941, 'Information Technology'),
(153, 1942, 'Information Technology'),
(154, 1943, 'Information Technology'),
(155, 1944, 'Computer Science and Technology'),
(156, 1945, 'Computer Science and Technology'),
(157, 1946, 'Computer Science and Technology'),
(158, 1947, 'Computer Science and Technology'),
(159, 1948, 'Computer Science and Technology'),
(160, 1949, 'Electronics and Telecommunication'),
(161, 1950, 'Electronics and Telecommunication'),
(162, 1951, 'Mechanical Engineering'),
(163, 1952, 'Aerospace Engineering and Applied Mechanics'),
(164, 1953, 'Civil Engineering'),
(165, 1954, 'Civil Engineering'),
(166, 1955, 'Mining Engineering'),
(167, 1956, 'Mining Engineering'),
(168, 1957, 'Electrical Engineering'),
(169, 1958, 'Electrical Engineering'),
(170, 1959, 'Electrical Engineering'),
(171, 1960, 'Metallurgy and Material Science'),
(172, 1961, 'Information Technology'),
(173, 1962, 'Information Technology'),
(174, 1963, 'Information Technology'),
(175, 1964, 'Information Technology'),
(176, 1965, 'Information Technology'),
(177, 1966, 'Information Technology'),
(178, 1967, 'Information Technology'),
(179, 1968, 'Information Technology'),
(180, 1969, 'Information Technology'),
(181, 1970, 'Computer Science and Technology'),
(182, 1971, 'Computer Science and Technology'),
(183, 1972, 'Computer Science and Technology'),
(184, 1973, 'Computer Science and Technology'),
(185, 1974, 'Computer Science and Technology'),
(186, 1975, 'Electronics and Telecommunication'),
(187, 1976, 'Electronics and Telecommunication'),
(188, 1977, 'Mechanical Engineering'),
(189, 1978, 'Aerospace Engineering and Applied Mechanics'),
(190, 1979, 'Civil Engineering'),
(191, 1980, 'Civil Engineering'),
(192, 1981, 'Mining Engineering'),
(193, 1982, 'Mining Engineering'),
(194, 1983, 'Electrical Engineering'),
(195, 1984, 'Electrical Engineering'),
(196, 1985, 'Electrical Engineering'),
(197, 1986, 'Metallurgy and Material Science'),
(198, 1987, 'Information Technology'),
(199, 1987, 'Computer Science and Technology'),
(200, 1961, 'Computer Science and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subjects`
--

CREATE TABLE `faculty_subjects` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `subject_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_subjects`
--

INSERT INTO `faculty_subjects` (`id`, `user_id`, `subject_id`) VALUES
(1, 14, 1),
(2, 14, 2),
(3, 14, 3),
(4, 14, 1),
(5, 14, 3),
(6, 14, 4),
(7, 1961, 28),
(8, 1961, 29),
(9, 1961, 25),
(10, 1961, 26),
(11, 1987, 28),
(12, 1987, 25),
(13, 1987, 28),
(14, 1987, 25);

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
(6, 1, 'Devang Singh', 'Setup Admin', '10.devang@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `identity_number` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `course_type` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_id`, `identity_number`, `name`, `department`, `email`, `mobile`, `semester`, `course_type`) VALUES
(1856, 2057, '510815079', 'Adavelly Nikhileshwar Reddy', 'Information Technology', '', 0, '', ''),
(1857, 2058, '510815031', 'Aditya Gautam Mishra', 'Information Technology', '', 0, '', ''),
(1858, 2059, '510815026', 'AGNIBHA CHANDRA', 'Information Technology', '', 0, '', ''),
(1859, 2060, '510815024', 'Aman Bhadani', 'Information Technology', '', 0, '', ''),
(1860, 2061, '510815063', 'Amit kumar', 'Information Technology', '', 0, '', ''),
(1861, 2062, '510815071', 'Angshu Mukherjee', 'Information Technology', '', 0, '', ''),
(1862, 2063, '510815020', 'Ankit Kumar', 'Information Technology', '', 0, '', ''),
(1863, 2064, '510815046', 'Ankita Singh', 'Information Technology', '', 0, '', ''),
(1864, 2065, '510815060', 'Anu Kumari Gond', 'Information Technology', '', 0, '', ''),
(1865, 2066, '510815044', 'Anurag Kumar', 'Information Technology', '', 0, '', ''),
(1866, 2067, '510815058', 'Anushka Sinha', 'Information Technology', '', 0, '', ''),
(1867, 2068, '510815077', 'Apoorva', 'Information Technology', '', 0, '', ''),
(1868, 2069, '510815038', 'Arkoprobho Pal', 'Information Technology', '', 0, '', ''),
(1869, 2070, '510815075', 'Atasi Das', 'Information Technology', '', 0, '', ''),
(1870, 2071, '510815074', 'Atrayee Roy', 'Information Technology', '', 0, '', ''),
(1871, 2072, '510815005', 'ayush ranjan lohani', 'Information Technology', '', 0, '', ''),
(1872, 2073, '510815011', 'Badam Akash Prasad ', 'Information Technology', '', 0, '', ''),
(1873, 2074, '510815076', 'Chandan Sharma', 'Information Technology', '', 0, '', ''),
(1874, 2075, '510815073', 'Daravath Gokul krishna', 'Information Technology', '', 0, '', ''),
(1875, 2076, '510815034', 'Debdatta Barman', 'Information Technology', '', 0, '', ''),
(1876, 2077, '510815055', 'Devang Singh', 'Information Technology', '', 0, '', ''),
(1877, 2078, '510815048', 'Diwakar', 'Information Technology', '', 0, '', ''),
(1878, 2079, '510815056', 'Harish soren', 'Information Technology', '', 0, '', ''),
(1879, 2080, '510815068', 'Jayant BISHT', 'Information Technology', '', 0, '', ''),
(1880, 2081, '510815045', 'Kanav Mehra', 'Information Technology', '', 0, '', ''),
(1881, 2082, '510815061', 'KUMAR ABHISHEK', 'Information Technology', '', 0, '', ''),
(1882, 2083, '510815059', 'Malay bhowmick ', 'Information Technology', '', 0, '', ''),
(1883, 2084, '510815027', 'Md. Dilshad Akhtar', 'Information Technology', '', 0, '', ''),
(1884, 2085, '510815021', 'Milind Agarwal', 'Information Technology', '', 0, '', ''),
(1885, 2086, '510815033', 'Mimat Khalil Kasu', 'Information Technology', '', 0, '', ''),
(1886, 2087, '510815006', 'MINAL TANDEKAR', 'Information Technology', '', 0, '', ''),
(1887, 2088, '510815003', 'MODASSIR KASHANI', 'Information Technology', '', 0, '', ''),
(1888, 2089, '510815062', 'Mohd Danish Kaleem', 'Information Technology', '', 0, '', ''),
(1889, 2090, '510815080', 'Mohit Negi', 'Information Technology', '', 0, '', ''),
(1890, 2091, '510815015', 'NABANEET ROY', 'Information Technology', '', 0, '', ''),
(1891, 2092, '510815016', 'Nahid Ahmed', 'Information Technology', '', 0, '', ''),
(1892, 2093, '510815067', 'Naman Kumar Mehta', 'Information Technology', '', 0, '', ''),
(1893, 2094, '510815066', 'Namit Bhasin', 'Information Technology', '', 0, '', ''),
(1894, 2095, '510815009', 'Nilesh Ranjan', 'Information Technology', '', 0, '', ''),
(1895, 2096, '510815002', 'Pankaj Kumar Ray', 'Information Technology', '', 0, '', ''),
(1896, 2097, '510815001', 'Paritosh Kumar Yadav', 'Information Technology', '', 0, '', ''),
(1897, 2098, '510815043', 'PAYEL BERA', 'Information Technology', '', 0, '', ''),
(1898, 2099, '510815053', 'Pratima Devi Upadhyay', 'Information Technology', '', 0, '', ''),
(1899, 2100, '510815054', 'Praveen Kumar Awasthi ', 'Information Technology', '', 0, '', ''),
(1900, 2101, '510815017', 'Rapaj Beshra', 'Information Technology', '', 0, '', ''),
(1901, 2102, '510815070', 'RASHMI SINGH', 'Information Technology', '', 0, '', ''),
(1902, 2103, '510815041', 'Rishav Putatunda', 'Information Technology', '', 0, '', ''),
(1903, 2104, '510815010', 'Rohitashwa Chakraborty', 'Information Technology', '', 0, '', ''),
(1904, 2105, '510815008', 'Sachin Kumar', 'Information Technology', '', 0, '', ''),
(1905, 2106, '510815023', 'SAMIT MANDAL', 'Information Technology', '', 0, '', ''),
(1906, 2107, '510815032', 'Sankalp Abhishek Roy', 'Information Technology', '', 0, '', ''),
(1907, 2108, '510815004', 'SHUBHAM PANDEY', 'Information Technology', '', 0, '', ''),
(1908, 2109, '510815081', 'Siddhant Bajaj', 'Information Technology', '', 0, '', ''),
(1909, 2110, '510815018', 'Siddhant Mishra', 'Information Technology', '', 0, '', ''),
(1910, 2111, '510815072', 'Smriti chhaya', 'Information Technology', '', 0, '', ''),
(1911, 2112, '510815057', 'Snehlata Yadav', 'Information Technology', '', 0, '', ''),
(1912, 2113, '510815022', 'Sohini Saha', 'Information Technology', '', 0, '', ''),
(1913, 2114, '510815082', 'Soumik Pal', 'Information Technology', '', 0, '', ''),
(1914, 2115, '510815049', 'Soumyoprabho Mukherjee', 'Information Technology', '', 0, '', ''),
(1915, 2116, '510814033', 'Sourav Halder', 'Information Technology', '', 0, '', ''),
(1916, 2117, '510815013', 'Sourav Maji', 'Information Technology', '', 0, '', ''),
(1917, 2118, '510815012', 'SUBHRADEEP MANDAL ', 'Information Technology', '', 0, '', ''),
(1918, 2119, '510815035', 'Sukanta Nandi', 'Information Technology', 'vinayksingh2@gmail.com', 27412128713, '3rd', 'dd'),
(1919, 2120, '510815052', 'Sumit Kumar', 'Information Technology', 'sumit@gmail.com', 1234567890, '3rd', 'dd'),
(1920, 2121, '510815050', 'Suprotik Dey', 'Information Technology', '', 0, '', ''),
(1921, 2122, '510815083', 'Syed Saikat Iqbal', 'Information Technology', '', 0, '', ''),
(1922, 2123, '510815051', 'Vaibhav Pandey', 'Information Technology', 'vaibhav@gmail.com', 8285846271, '3rd', 'dd'),
(1923, 2124, '510815037', 'Vivek Sharma', 'Information Technology', 'viveksharma@gmail.com', 9038670547, '3rd', 'dd'),
(1924, 2125, '510815019', 'Krishanu Dey', 'Information Technology', 'krishanu Dey', 1234567890, '3rd', 'dd');

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
(25, 77, 'Data Structures', 'CST31', '3rd'),
(26, 77, 'Digital Logic', 'CST32', '3rd'),
(27, 78, 'Subject01', 'CSTM21', '2nd'),
(28, 79, 'Data Structures', 'IT31', '3rd'),
(29, 79, 'Signals, Systems and Circuits', 'IT32', '3rd');

-- --------------------------------------------------------

--
-- Table structure for table `subject_discussion`
--

CREATE TABLE `subject_discussion` (
  `id` int(9) NOT NULL,
  `parent_id` int(9) NOT NULL,
  `subject_id` int(9) NOT NULL,
  `student_id` int(9) NOT NULL,
  `discussion` varchar(255) NOT NULL,
  `ask_faculty` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_discussion`
--

INSERT INTO `subject_discussion` (`id`, `parent_id`, `subject_id`, `student_id`, `discussion`, `ask_faculty`, `created_at`) VALUES
(3, 0, 28, 2124, 'hello this is data ', '1', '2017-03-02 20:55:58'),
(4, 0, 28, 2124, 'hii ', '0', '2017-03-02 20:56:05'),
(5, 4, 0, 2124, 'hello', '0', '2017-03-02 20:56:15'),
(6, 4, 0, 2124, 'dasdas', '0', '2017-03-02 20:56:24'),
(7, 3, 0, 2124, 'asdfasf', '0', '2017-03-02 20:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `college_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_token` varchar(50) NOT NULL,
  `user_type` enum('student','faculty','admin') NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `setup` enum('college','department','courses','subject','database','studentDatabase','people','complete','createPassword','headToDashboard','selectDepartment','selectSubject','postAssignments','facultyDashboard') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `college_id`, `username`, `name`, `password`, `access_token`, `user_type`, `is_active`, `setup`) VALUES
(1, 1, 'admin@univinks.com', '', '21232f297a57a5a743894a0e4a801fc3', '1', 'admin', '1', 'complete'),
(1961, 1, 'adityabose27@gmail.com', '', '057829fa5a65fc1ace408f490be486ac', '1', 'faculty', '1', 'facultyDashboard'),
(1962, 1, 'sanketchaku@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '3f105a4773aab66eff8dd25e3ea7b7b6', 'faculty', '0', 'createPassword'),
(1963, 1, 'rohitpandey0194@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'f6b5d2e54434219c40143537b8add461', 'faculty', '0', 'createPassword'),
(1964, 1, 'ankitasinghchikki@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '581177dbd9162fd9d773623fe53ae599', 'faculty', '0', 'createPassword'),
(1965, 1, 'richa.besu@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '7384a3067c4241f9b36c20c78461db8f', 'faculty', '0', 'createPassword'),
(1966, 1, 'itzmesourav@outlook.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '2180ddd0d5e34a07e222483e35bf4007', 'faculty', '0', 'createPassword'),
(1967, 1, 'asishkumarsharma1994@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '92544960a5f8e82ff366925405b1f784', 'faculty', '0', 'createPassword'),
(1968, 1, 'agrawal.kj1204@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '9d3c176a610d17c8c2c36a8bd9b62300', 'faculty', '0', 'createPassword'),
(1969, 1, 'saurabh1595@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'c8cf3f8660884c1953b55d95eb76ff39', 'faculty', '0', 'createPassword'),
(1970, 1, 'kumar.mayank98@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '753cd01bb3aaf5fc24680f320b96543f', 'faculty', '0', 'createPassword'),
(1971, 1, 'sandeep.gprs@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '0cc9a456b69094eb708782738d62454a', 'faculty', '0', 'createPassword'),
(1972, 1, 'mail.tuhin.dan@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '6498e73ecbbcd291e225002618afb2a2', 'faculty', '0', 'createPassword'),
(1973, 1, 'ankitchoudhary2008@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '901a8347ee8d7cc061d3a894b619fec2', 'faculty', '0', 'createPassword'),
(1974, 1, 'diptanshu94@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '90d7bb3fe0a3843ba10d119c5434563d', 'faculty', '0', 'createPassword'),
(1975, 1, 'roushan.jmp@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'cffb8575ad9bdc7a4c2b8bff0f3d5e06', 'faculty', '0', 'createPassword'),
(1976, 1, 'anurag181995gupta@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'db65c4212f08a533a678012a3c8c7e0b', 'faculty', '0', 'createPassword'),
(1977, 1, 'anu.23.5.95.mal@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'd91b6902cb5f501054bda3abfc380f90', 'faculty', '0', 'createPassword'),
(1978, 1, 'csekhary53@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'c5a06cade07ffb66c74091a4c7b78090', 'faculty', '0', 'createPassword'),
(1979, 1, 'gauravsyal220295@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'fb1dc81dd39e4bc26e5f853638ed2b4a', 'faculty', '0', 'createPassword'),
(1980, 1, 'berabasanta95@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '45dd027ee6cb96da25b0c44b61071c7e', 'faculty', '0', 'createPassword'),
(1981, 1, 'ananda3017@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'e9f33404de5c823442352b02222a221d', 'faculty', '0', 'createPassword'),
(1982, 1, 'singhjaspal9801@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '811ccb7416ed69e3654dad5e6f4c14cd', 'faculty', '0', 'createPassword'),
(1983, 1, 'niharikas981@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'a9ea4895bcf908a06986fa6d85abf209', 'faculty', '0', 'createPassword'),
(1984, 1, 'sabyasachi.datta11@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'fbf6b532ce9a20b17f389291b74c37d6', 'faculty', '0', 'createPassword'),
(1985, 1, 'vshlsingh566@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '60106fa3009364fe449b945941643fdb', 'faculty', '0', 'createPassword'),
(1986, 1, 'nitish.iiest@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '7ec65009fc9a1dcc32504719febdb683', 'faculty', '0', 'createPassword'),
(1987, 1, '10.devang@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', '1', 'faculty', '1', 'facultyDashboard'),
(2057, 1, '510815079', '', '5f4dcc3b5aa765d61d8327deb882cf99', '063055ab49b0557b36f8945b7b3675ed', 'student', '0', 'college'),
(2058, 1, '510815031', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'fe5abc0752c6dd7c006e0d3ae9128c9b', 'student', '0', 'college'),
(2059, 1, '510815026', '', '5f4dcc3b5aa765d61d8327deb882cf99', '29494192c4f8864f1c6e39505ab93206', 'student', '0', 'college'),
(2060, 1, '510815024', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'f325f920d512d2c156dd4718c098e857', 'student', '0', 'college'),
(2061, 1, '510815063', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'dacbd13b1afd423b84020b342b905ed8', 'student', '0', 'college'),
(2062, 1, '510815071', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'ec18d8b86d9ad0df02402c7456d51c36', 'student', '0', 'college'),
(2063, 1, '510815020', '', '5f4dcc3b5aa765d61d8327deb882cf99', '8126a15c590778f57ef659e79694d3e2', 'student', '0', 'college'),
(2064, 1, '510815046', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'acb27a09b410500eab9feeff7e737d8a', 'student', '0', 'college'),
(2065, 1, '510815060', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'b16f3935ba1a7ad593e0865d12f6d843', 'student', '0', 'college'),
(2066, 1, '510815044', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'f1368517ff13bdabe7f00c410d89495b', 'student', '0', 'college'),
(2067, 1, '510815058', '', '5f4dcc3b5aa765d61d8327deb882cf99', '8a4d82d97444d07ef844c3c062e8ba9c', 'student', '0', 'college'),
(2068, 1, '510815077', '', '5f4dcc3b5aa765d61d8327deb882cf99', '3176b4e5f809d1440b741981819bc169', 'student', '0', 'college'),
(2069, 1, '510815038', '', '5f4dcc3b5aa765d61d8327deb882cf99', '10d7b6588d045d62a28c644f41943b88', 'student', '0', 'college'),
(2070, 1, '510815075', '', '5f4dcc3b5aa765d61d8327deb882cf99', '627f4794a07561694e41f11962dc6111', 'student', '0', 'college'),
(2071, 1, '510815074', '', '5f4dcc3b5aa765d61d8327deb882cf99', '775ec059d662dd39770a510474fa1770', 'student', '0', 'college'),
(2072, 1, '510815005', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'a1de0ef3cf6d3562d18b4ca2e2f648f7', 'student', '0', 'college'),
(2073, 1, '510815011', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'cda43daf17a18064a1b864f06001b945', 'student', '0', 'college'),
(2074, 1, '510815076', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'f511615ae45e38c1112c3c8914c3e55d', 'student', '0', 'college'),
(2075, 1, '510815073', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'd9043921fcb10e2f43021c9850d772e5', 'student', '0', 'college'),
(2076, 1, '510815034', '', '5f4dcc3b5aa765d61d8327deb882cf99', '2a0c574fabf682b33a7fe69b00c53a34', 'student', '0', 'college'),
(2077, 1, '510815055', '', '5f4dcc3b5aa765d61d8327deb882cf99', '255f3f2518086fd1ebfff140be6ba5d9', 'student', '0', 'college'),
(2078, 1, '510815048', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'e3c90a283bb810461475fa31c4ff1c04', 'student', '0', 'college'),
(2079, 1, '510815056', '', '5f4dcc3b5aa765d61d8327deb882cf99', '00d7cb57aeaf6b1c4dddac00f1b46665', 'student', '0', 'college'),
(2080, 1, '510815068', '', '5f4dcc3b5aa765d61d8327deb882cf99', '9d701801958063ad16a08db79a27076d', 'student', '0', 'college'),
(2081, 1, '510815045', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'c7a3628b2ef9e01d69f35c983f5a6322', 'student', '0', 'college'),
(2082, 1, '510815061', '', '5f4dcc3b5aa765d61d8327deb882cf99', '8813dbd84a8ec4a79ce9e874910bc3eb', 'student', '0', 'college'),
(2083, 1, '510815059', '', '5f4dcc3b5aa765d61d8327deb882cf99', '732e1ec5664af1bb0877bfce9ba6dba7', 'student', '0', 'college'),
(2084, 1, '510815027', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'cc11fae37b993019e789f1f53b993983', 'student', '0', 'college'),
(2085, 1, '510815021', '', '5f4dcc3b5aa765d61d8327deb882cf99', '2f6303d5a5af262fdb82b941e9c00b84', 'student', '0', 'college'),
(2086, 1, '510815033', '', '5f4dcc3b5aa765d61d8327deb882cf99', '196c7c869762537950a707a6c2d31d1c', 'student', '0', 'college'),
(2087, 1, '510815006', '', '5f4dcc3b5aa765d61d8327deb882cf99', '7b2265df4f47403fc63b0d21eb35ff14', 'student', '0', 'college'),
(2088, 1, '510815003', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'b3e356b82acb591146287f6c29178e17', 'student', '0', 'college'),
(2089, 1, '510815062', '', '5f4dcc3b5aa765d61d8327deb882cf99', '323a3bc2a327de07604b6cdd9792c7fc', 'student', '0', 'college'),
(2090, 1, '510815080', '', '5f4dcc3b5aa765d61d8327deb882cf99', '2b665a6fc0368ce39c9fa95fe93de1dd', 'student', '0', 'college'),
(2091, 1, '510815015', '', '5f4dcc3b5aa765d61d8327deb882cf99', '826d629da11c0f9138f6c7062bc6ad29', 'student', '0', 'college'),
(2092, 1, '510815016', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'ef07d447bfc0744be012a3a2dc77cd48', 'student', '0', 'college'),
(2093, 1, '510815067', '', '5f4dcc3b5aa765d61d8327deb882cf99', '9bd9246e3b8cb73a277b79e26d447c89', 'student', '0', 'college'),
(2094, 1, '510815066', '', '5f4dcc3b5aa765d61d8327deb882cf99', '2fdd56b4f0f17b6521881cbc5c10b360', 'student', '0', 'college'),
(2095, 1, '510815009', '', '5f4dcc3b5aa765d61d8327deb882cf99', '0ae54c30742add4f2469857dce791e67', 'student', '0', 'college'),
(2096, 1, '510815002', '', '5f4dcc3b5aa765d61d8327deb882cf99', '7b6182c3e46ca659e211482981b0fc01', 'student', '0', 'college'),
(2097, 1, '510815001', '', '5f4dcc3b5aa765d61d8327deb882cf99', '740d185ee3130407b5a1f94709b9bd65', 'student', '0', 'college'),
(2098, 1, '510815043', '', '5f4dcc3b5aa765d61d8327deb882cf99', '5eecc17125424582d86e24ec7606afb7', 'student', '0', 'college'),
(2099, 1, '510815053', '', '5f4dcc3b5aa765d61d8327deb882cf99', '29e653bdc11a01bd9817338411f3c18c', 'student', '0', 'college'),
(2100, 1, '510815054', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'd517add9de9e4b03b8c367c6b028c041', 'student', '0', 'college'),
(2101, 1, '510815017', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'a3c5bfac63684797cee761ad2b2bc855', 'student', '0', 'college'),
(2102, 1, '510815070', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'e26f6efc497f8f8766266fc3f8ef74c7', 'student', '0', 'college'),
(2103, 1, '510815041', '', '5f4dcc3b5aa765d61d8327deb882cf99', '5196c6184d9f292717b989788e6927ef', 'student', '0', 'college'),
(2104, 1, '510815010', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'c54fd7d2d522d5ba274027d0f9da1db5', 'student', '0', 'college'),
(2105, 1, '510815008', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'e93435e5ba03a859e2c50963d83ac387', 'student', '0', 'college'),
(2106, 1, '510815023', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'ddf2d37cc14222dc14a75cb4aa1f8edf', 'student', '0', 'college'),
(2107, 1, '510815032', '', '5f4dcc3b5aa765d61d8327deb882cf99', '359d557b3ae73deb93207b5f7afef184', 'student', '0', 'college'),
(2108, 1, '510815004', '', '5f4dcc3b5aa765d61d8327deb882cf99', '3e818bca06ef86b12cf08827ded3cef1', 'student', '0', 'college'),
(2109, 1, '510815081', '', '5f4dcc3b5aa765d61d8327deb882cf99', '151e69355be93919a2ace0a1cbf76e3b', 'student', '0', 'college'),
(2110, 1, '510815018', '', '5f4dcc3b5aa765d61d8327deb882cf99', '11dcdb1f3e2c62a4a874551b2bd8cbcf', 'student', '0', 'college'),
(2111, 1, '510815072', '', '5f4dcc3b5aa765d61d8327deb882cf99', '3335863bbc2fd0d89e6914f524cc6960', 'student', '0', 'college'),
(2112, 1, '510815057', '', '5f4dcc3b5aa765d61d8327deb882cf99', '5f6d182637400b418f5d739feaf21b7d', 'student', '0', 'college'),
(2113, 1, '510815022', '', '5f4dcc3b5aa765d61d8327deb882cf99', '70a8803131e23bc4737890a0524bef61', 'student', '0', 'college'),
(2114, 1, '510815082', '', '5f4dcc3b5aa765d61d8327deb882cf99', '713facdd74513d94cb8b729fdf8f6ec4', 'student', '0', 'college'),
(2115, 1, '510815049', '', '5f4dcc3b5aa765d61d8327deb882cf99', '23f126499b021ef36c827b146c96bda9', 'student', '0', 'college'),
(2116, 1, '510814033', '', '5f4dcc3b5aa765d61d8327deb882cf99', '859345c4ef6b5c093fadd3e8bf4b64ca', 'student', '0', 'college'),
(2117, 1, '510815013', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'cbe2ba9779c6dbe1c8ef57f235328b86', 'student', '0', 'college'),
(2118, 1, '510815012', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'a8ef5e22b67db1aed138bcbd871e3303', 'student', '0', 'college'),
(2119, 1, '510815035', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'd87a1b2249bf952a089fb95c3ae2dd55', 'student', '1', 'college'),
(2120, 1, '510815052', '', 'cd73502828457d15655bbd7a63fb0bc8', '27aa683e129e6ed60c9fbdd9eff8df41', 'student', '1', 'college'),
(2121, 1, '510815050', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'bac299844e37cac979a09786805cfbac', 'student', '0', 'college'),
(2122, 1, '510815083', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'ff1eed220f3434e19b8ad0c87fd656a4', 'student', '0', 'college'),
(2123, 1, '510815051', '', '310a87565a48526e9d096f917007dbfe', '68c136103d336a1841d9cb5854839058', 'student', '1', 'college'),
(2124, 1, '510815037', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', '252519a6ef0b02be79291ebab60f7577', 'student', '1', 'college'),
(2125, 1, '510815019', '', '56536b749a7fe62da7f62a04563acf32', '4997982dad185ff8323c1080bc9018e0', 'student', '1', 'college');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_submit`
--
ALTER TABLE `assignment_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_upvote`
--
ALTER TABLE `assignment_upvote`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `faculty_department`
--
ALTER TABLE `faculty_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_subjects`
--
ALTER TABLE `faculty_subjects`
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
-- Indexes for table `subject_discussion`
--
ALTER TABLE `subject_discussion`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `assignment_submit`
--
ALTER TABLE `assignment_submit`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `assignment_upvote`
--
ALTER TABLE `assignment_upvote`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `faculty_department`
--
ALTER TABLE `faculty_department`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `faculty_subjects`
--
ALTER TABLE `faculty_subjects`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1925;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `subject_discussion`
--
ALTER TABLE `subject_discussion`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2126;