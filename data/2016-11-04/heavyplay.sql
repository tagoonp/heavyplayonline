-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2016 at 10:51 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heavyplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `d4is_category`
--

CREATE TABLE `d4is_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(150) NOT NULL,
  `cat_slug` varchar(100) NOT NULL,
  `cat_description` text NOT NULL,
  `cat_level` enum('1','2') NOT NULL DEFAULT '1',
  `cat_parent_id` int(11) NOT NULL,
  `cat_regdate` date NOT NULL,
  `cat_status` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_category`
--

INSERT INTO `d4is_category` (`cat_id`, `cat_name`, `cat_slug`, `cat_description`, `cat_level`, `cat_parent_id`, `cat_regdate`, `cat_status`) VALUES
(1, 'Labtops', 'labtops', '', '1', 0, '2016-10-31', 'Y'),
(2, 'Desktops', 'desktop', '', '1', 0, '2016-10-31', 'Y'),
(3, 'Gear & Accessories', 'gear-and-accessory', '', '1', 0, '2016-10-31', 'Y'),
(4, 'Alienware New 13', 'alienware-new-13', '', '2', 1, '2016-11-04', 'Y'),
(5, 'Alienware 15', 'alienware-15', '', '2', 1, '2016-11-04', 'Y'),
(6, 'Alienware 17', 'alienware-17', '', '2', 1, '2016-11-04', 'Y'),
(7, 'Aurora', 'aurora', '', '2', 2, '2016-11-04', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `d4is_useraccount`
--

CREATE TABLE `d4is_useraccount` (
  `acc_id` int(10) UNSIGNED NOT NULL,
  `acc_email` varchar(255) NOT NULL,
  `acc_password` text NOT NULL,
  `acc_regdate` date NOT NULL,
  `acc_regby` enum('Normal','Facebook') NOT NULL DEFAULT 'Normal',
  `acc_activestatus` enum('N','Y') NOT NULL DEFAULT 'Y',
  `acc_type` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_useraccount`
--

INSERT INTO `d4is_useraccount` (`acc_id`, `acc_email`, `acc_password`, `acc_regdate`, `acc_regby`, `acc_activestatus`, `acc_type`) VALUES
(4, 'asd@gmail.com', '2e1ed0fb3968e9fa82b249dc052ee9e4', '2016-10-30', 'Normal', 'Y', '2'),
(5, 'asda@gmail.com', '2e1ed0fb3968e9fa82b249dc052ee9e4', '2016-10-30', 'Normal', 'Y', '2'),
(6, 'asdasd!@gmail.com', '2e1ed0fb3968e9fa82b249dc052ee9e4', '2016-10-30', 'Normal', 'Y', '2'),
(7, 'tagoon.p@gmail.com', '12d789f35c40fecebf9d914f95fb2246', '2016-10-30', 'Normal', 'Y', '1');

-- --------------------------------------------------------

--
-- Table structure for table `d4is_userinfo`
--

CREATE TABLE `d4is_userinfo` (
  `info_id` int(10) UNSIGNED NOT NULL,
  `prefix_id` int(11) NOT NULL,
  `fname` varchar(160) NOT NULL,
  `lname` varchar(160) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(14) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d4is_userinfo`
--

INSERT INTO `d4is_userinfo` (`info_id`, `prefix_id`, `fname`, `lname`, `address`, `phone`, `acc_id`) VALUES
(1, 1, 'Tagoon', 'Prappre', '', '', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d4is_category`
--
ALTER TABLE `d4is_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `d4is_useraccount`
--
ALTER TABLE `d4is_useraccount`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `d4is_userinfo`
--
ALTER TABLE `d4is_userinfo`
  ADD PRIMARY KEY (`info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d4is_category`
--
ALTER TABLE `d4is_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `d4is_useraccount`
--
ALTER TABLE `d4is_useraccount`
  MODIFY `acc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `d4is_userinfo`
--
ALTER TABLE `d4is_userinfo`
  MODIFY `info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
