-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 12:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zalon`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `id` int(10) NOT NULL,
  `salon_id` int(10) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `sub_category` int(9) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `addition` float NOT NULL DEFAULT '0',
  `substraction` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `payment_type_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_log`
--

INSERT INTO `transaction_log` (`id`, `salon_id`, `category`, `sub_category`, `description`, `addition`, `substraction`, `total`, `payment_type_id`, `created_at`) VALUES
(3, 14, NULL, 0, '', 0, 0, 500, 107, '2017-01-31 08:53:51'),
(4, 14, NULL, 0, '', 0, 0, 300, 108, '2017-01-31 08:57:28'),
(5, 14, NULL, 0, '', 0, 0, 500, 109, '2017-01-31 09:53:02'),
(6, 14, 'Vendor', 8, 'paid', 0, 200, 300, 107, '2017-02-16 11:40:11'),
(7, 14, 'Staff', 5, 'asfasds', 0, 200, 100, 107, '2017-01-31 14:36:08'),
(18, 14, 'Vendor', 8, 'test', 0, 100, 200, 108, '2017-02-16 11:40:11'),
(19, 14, NULL, 0, '', 0, 0, 1000, 111, '2017-02-08 12:29:57'),
(20, 14, 'Vendor', 8, 'hello', 0, 100, 0, 107, '2017-02-08 13:01:12'),
(21, 14, 'Vendor', 8, 'negative value', 0, 100, -100, 107, '2017-02-16 11:40:11'),
(22, 14, 'Staff', 5, 'test', 0, 100, 100, 108, '2017-02-09 08:56:25'),
(23, 14, 'Vendor', 8, 'hello', 0, 50, 50, 108, '2017-02-16 11:40:11'),
(24, 14, 'Vendor', 8, 'settle', 0, 50, 0, 108, '2017-02-16 11:40:11'),
(25, 14, 'General Expenses', 7, 'settle', 0, 50, -50, 108, '2017-02-09 09:05:37'),
(26, 14, 'Service Tax', NULL, 'mobikwik', 0, 50, 450, 109, '2017-02-09 09:10:17'),
(27, 14, 'Service Tax', NULL, 'tax via mobikwik', 0, 100, 350, 109, '2017-02-09 09:16:51'),
(28, 14, 'Staff', 9, 'test form', 0, 30, 320, 109, '2017-02-09 09:22:33'),
(29, 14, 'Vendor', 8, 'paid test', 0, 200, -300, 107, '2017-02-09 10:57:18'),
(30, 14, 'Service Tax', NULL, 'hdfc check', 0, 100, 900, 111, '2017-02-09 11:02:30'),
(31, 14, 'Staff', 9, 'rececive', 0, 200, 700, 111, '2017-02-09 11:03:26'),
(32, 14, 'Vendor', 8, 'test', 0, 50, 650, 111, '2017-02-09 11:11:59'),
(33, 14, 'Vendor', 8, 'Receive Money From vendor', 200, 0, 850, 111, '2017-02-16 11:39:24'),
(34, 14, 'Vendor', 0, 'rec test', 100, 0, 950, 111, '2017-02-09 11:21:06'),
(35, 14, 'Vat', 8, 'pay test', 0, 350, 600, 111, '2017-02-09 11:21:37'),
(36, 14, 'Staff', 0, 'receive', 100, 0, 700, 111, '2017-02-09 11:22:08'),
(37, 14, 'Vendor', 0, 'get back from vendor', 200, 0, -100, 107, '2017-02-09 11:22:38'),
(38, 14, 'Vendor', 0, 'get fro hdfc', 30, 0, 730, 111, '2017-02-09 11:23:02'),
(39, 14, 'Staff', 0, 'get', 50, 0, 0, 108, '2017-02-09 11:24:34'),
(40, 14, 'Vendor', 0, 'get by cash', 100, 0, 0, 107, '2017-02-09 11:33:12'),
(41, 14, 'Vendor', 7, 'get by paytm', 200, 0, 200, 108, '2017-02-16 11:27:10'),
(42, 14, 'Vat', NULL, 'paid', 0, 100, 630, 111, '2017-02-09 11:34:37'),
(43, 14, 'General Expenses', NULL, 'shampoo', 0, 200, 430, 111, '2017-02-09 11:34:54'),
(46, 14, 'Vendor', 8, 'pat check', 0, 100, 100, 108, '2017-02-10 09:12:13'),
(49, 14, 'Transfer', 111, 'paytm to hdfc', 0, 50, 50, 108, '2017-02-10 09:43:28'),
(50, 14, 'Transfer', 108, 'paytm to hdfc', 50, 0, 480, 111, '2017-02-10 09:43:28'),
(51, 14, 'Vendor', 0, 'get from vendor', 100, 0, 100, 107, '2017-02-10 09:57:56'),
(52, 14, 'Transfer', 109, 'cash to mobikwik', 0, 50, 50, 107, '2017-02-10 09:59:04'),
(53, 14, 'Transfer', 107, 'cash to mobikwik', 50, 0, 370, 109, '2017-02-10 09:59:04'),
(54, 14, 'Transfer', 111, 'paytm to hdfc', 0, 20, 30, 108, '2017-02-10 09:59:59'),
(55, 14, 'Transfer', 108, 'paytm to hdfc', 20, 0, 500, 111, '2017-02-10 09:59:59'),
(56, 14, 'Transfer', 108, 'mob to pay', 0, 10, 360, 109, '2017-02-10 10:01:44'),
(57, 14, 'Transfer', 109, 'mob to pay', 10, 0, 40, 108, '2017-02-10 10:01:45'),
(58, 14, 'Vendor', 8, 'test', 0, 100, 260, 109, '2017-02-15 12:56:09'),
(59, 14, 'Vendor', 0, 'test today', 25, 0, 225, 108, '2017-02-16 11:28:45'),
(60, 14, 'Vendor', 0, 'test', 45, 0, 270, 108, '2017-02-16 11:33:21'),
(61, 14, 'Vendor', 0, 'test today', 25, 0, 75, 107, '2017-02-16 11:37:42'),
(62, 14, 'Vendor', 7, 'cash to vendor shalini', 150, 0, 450, 107, '2017-02-16 11:42:34'),
(63, 14, 'Vendor', 7, 'pat to shalini', 0, 10, 190, 108, '2017-02-16 11:43:47'),
(64, 14, 'Staff', 5, 'pay by hdfc', 0, 100, 750, 111, '2017-02-16 11:48:14'),
(65, 14, 'Staff', 5, 'get', 100, 0, 850, 111, '2017-02-16 11:48:42'),
(66, 14, 'Vendor', 7, 'test', 0, 35, 415, 107, '2017-02-16 11:58:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction_log`
--
ALTER TABLE `transaction_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
