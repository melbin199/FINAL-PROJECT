-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 05:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `login_id` int(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `adhar` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `login_id`, `customer_name`, `email`, `phone`, `address`, `state`, `district`, `pincode`, `adhar`) VALUES
(1, 4, 'Melbin Augustine', 'melbinaug08@gmail.com', '9846790179', 'Nirappel, paloorkavu', 'kerala', 'kottayam', '685532', ''),
(4, 12, 'Rahul', 'rahul08@gmail.com', '9846790179', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `host_id` int(11) NOT NULL,
  `event_name` varchar(20) NOT NULL,
  `event_type` varchar(20) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `pic1` varchar(50) NOT NULL,
  `pic2` varchar(50) NOT NULL,
  `pic3` varchar(50) NOT NULL,
  `pic4` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '1',
  `approve` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `host_id`, `event_name`, `event_type`, `title`, `cost`, `pic1`, `pic2`, `pic3`, `pic4`, `status`, `approve`) VALUES
(1255, 7, 'EVENTIneX', 'birthday', 'WE PROVIDE THE BEST EVENTS IN TOWN WITH FULLY SATISFACTION UNDER MIN PRICE PACKAGE', '25000', '1255_1.jpg', '1255_2.jpg', '1255_3.jpg', '1255_4.jpg', '1', ''),
(1256, 9, 'ASWATHY EVENTX', 'birthday', '.Birthdays come around every year, but friends like you only come once in a lifetime.', '35000', '1256_1.jpg', '1256_2.jpg', '1256_3.jpg', '1256_4.jpg', '1', ''),
(1257, 10, 'atreaya photography', 'photography', 'ALBUMS, FOTOGRAPHY,VIDEOS,EDITING,MARRIAGE, PRE WEDDING', '20000', '1257_1.jpg', '1257_2.jpg', '1257_3.jpg', '1257_4.jpg', '1', ''),
(1264, 15, 'decorfully', 'birthday', 'birthday parties and fun', '20000', '1264_1.jpg', '1264_2.jpg', '1264_3.jpg', '1264_4.jpg', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_booking`
--

CREATE TABLE `event_booking` (
  `booking_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `buy` int(1) NOT NULL DEFAULT 0,
  `remark` varchar(100) NOT NULL,
  `datebooked` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_booking`
--

INSERT INTO `event_booking` (`booking_id`, `event_id`, `customer_id`, `venue`, `time`, `date`, `landmark`, `status`, `buy`, `remark`, `datebooked`) VALUES
(36, 1255, 1, 'nirappel, kottayam,mundakayam', '23:33', '2021-04-28', 'near st.george church', 0, 1, 'Order has been Cancelled by User', '3 / 04 / 2021'),
(37, 1257, 1, 'nirappel, kottayam,mundakayam', '03:45', '2021-04-24', 'near st.george church', 0, 1, 'Order has been Cancelled by User', '3 / 04 / 2021'),
(39, 1255, 1, 'ama jyothi', '06:30', '2021-04-30', 'near amal jyoti college', 1, 1, 'Your order is Placed', '12 / 04 / 2021');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `host_id` int(10) NOT NULL,
  `login_id` int(10) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `license_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`host_id`, `login_id`, `owner_name`, `email`, `phone`, `pincode`, `location`, `license_no`) VALUES
(7, 13, 'Melbin', 'melbinaug@gmail.com', '8585692166', '655513', 'kottayam', 'DUPPA4312F00'),
(9, 15, 'jenny', 'jenny08@gmail.com', '9846790179', '656513', 'kottayam', '777777777777'),
(10, 16, 'jobin', 'jobin2@gmail.com', '9846790179', '656513', 'kottayam', 'AHB8585LI222'),
(15, 34, 'jinson devis', 'jinson@2gmail.com', '9846790179', '655513', 'KOCHI', '777777777777');

-- --------------------------------------------------------

--
-- Table structure for table `host_blog`
--

CREATE TABLE `host_blog` (
  `blog_id` int(10) NOT NULL,
  `host_id` int(10) NOT NULL,
  `news` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin'),
(3, 'host', 'host', 'Host'),
(4, 'melbin', 'melbin@08', 'Customer'),
(12, 'rahul', '123', 'Customer'),
(13, 'melbin', '123', 'Host'),
(14, 'aby', '741', 'Host'),
(15, 'jenny', '123', 'Host'),
(16, 'jobin', 'jobin', 'Host'),
(32, 'sabin', '123', 'Customer'),
(34, 'jinson', '123', 'Host');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `spec_id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `spec1` varchar(100) DEFAULT NULL,
  `s1` varchar(100) DEFAULT NULL,
  `spec2` varchar(100) DEFAULT NULL,
  `s2` varchar(100) DEFAULT NULL,
  `spec3` varchar(100) DEFAULT NULL,
  `s3` varchar(100) DEFAULT NULL,
  `spec4` varchar(100) DEFAULT NULL,
  `s4` varchar(100) DEFAULT NULL,
  `spec5` varchar(50) DEFAULT NULL,
  `s5` varchar(10) DEFAULT NULL,
  `spec6` varchar(50) DEFAULT NULL,
  `s6` varchar(20) DEFAULT NULL,
  `spec7` varchar(20) DEFAULT NULL,
  `s7` varchar(10) DEFAULT NULL,
  `spec8` varchar(100) DEFAULT NULL,
  `s8` varchar(20) DEFAULT NULL,
  `spec9` varchar(100) DEFAULT NULL,
  `s9` varchar(10) DEFAULT NULL,
  `spec10` varchar(20) NOT NULL,
  `s10` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`spec_id`, `event_id`, `spec1`, `s1`, `spec2`, `s2`, `spec3`, `s3`, `spec4`, `s4`, `spec5`, `s5`, `spec6`, `s6`, `spec7`, `s7`, `spec8`, `s8`, `spec9`, `s9`, `spec10`, `s10`) VALUES
(1, 1257, 'flowers', '2000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 1264, 'cakes', '2000 per kg', 'stage and decoration', '20000', 'drinks and food', '1500 per plate', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_booking`
--
ALTER TABLE `event_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`host_id`);

--
-- Indexes for table `host_blog`
--
ALTER TABLE `host_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`spec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1265;

--
-- AUTO_INCREMENT for table `event_booking`
--
ALTER TABLE `event_booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `host_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `host_blog`
--
ALTER TABLE `host_blog`
  MODIFY `blog_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
