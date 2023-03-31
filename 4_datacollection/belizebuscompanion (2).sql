-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 04:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belizebuscompanion`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busid` int(11) NOT NULL,
  `busnumber` tinytext NOT NULL,
  `buscompid` int(11) NOT NULL,
  `model` text NOT NULL,
  `year` int(11) NOT NULL,
  `liscenseplate` tinytext NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busid`, `busnumber`, `buscompid`, `model`, `year`, `liscenseplate`, `capacity`) VALUES
(1, '4200', 5, ' Blue Bird All American school bus', 2012, 'D-0569854', 77),
(8, 'B4242', 8, 'Blue Bird ', 2008, 'D-696969', 77);

-- --------------------------------------------------------

--
-- Table structure for table `buscompanies`
--

CREATE TABLE `buscompanies` (
  `buscompid` int(11) NOT NULL,
  `buscompname` varchar(255) NOT NULL,
  `phonenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buscompanies`
--

INSERT INTO `buscompanies` (`buscompid`, `buscompname`, `phonenumber`) VALUES
(1, 'James', 0),
(2, 'McFadzean', 0),
(3, 'Westline', 0),
(4, 'Floralia', 0),
(5, 'Morales', 0),
(6, 'Shaws', 0),
(7, 'Russel', 0),
(8, 'Brads', 0),
(9, 'Speed Busline', 0);

-- --------------------------------------------------------

--
-- Table structure for table `busschedule`
--

CREATE TABLE `busschedule` (
  `busscheid` int(11) NOT NULL,
  `busid` int(11) NOT NULL,
  `begin_locationid` int(11) NOT NULL,
  `end_locationid` int(11) NOT NULL,
  `busdepart` time NOT NULL,
  `busarrival` time NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `busschedule`
--

INSERT INTO `busschedule` (`busscheid`, `busid`, `begin_locationid`, `end_locationid`, `busdepart`, `busarrival`, `cost`) VALUES
(1, 8, 1, 2, '08:00:00', '08:55:00', 20),
(2, 7, 2, 3, '09:00:00', '10:00:00', 0),
(3, 6, 3, 4, '10:00:00', '11:30:00', 0),
(4, 5, 4, 5, '05:00:00', '06:00:00', 0),
(5, 4, 5, 6, '03:00:00', '04:10:00', 0),
(6, 3, 6, 7, '01:00:00', '02:15:00', 0),
(7, 2, 8, 1, '02:00:00', '04:00:00', 0),
(8, 1, 1, 2, '03:30:00', '05:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locationofstop`
--

CREATE TABLE `locationofstop` (
  `stoplocid` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `cordinates` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locationofstop`
--

INSERT INTO `locationofstop` (`stoplocid`, `location`, `cordinates`) VALUES
(1, 'Belize', 0x),
(2, 'Belmopan', 0x),
(3, 'Cayo', 0x),
(4, 'Punta Gorda', 0x),
(5, 'Dangriga', 0x),
(6, 'Stann Creek', 0x),
(7, 'Corozal', 0x),
(8, 'Orange Walk', 0x);

-- --------------------------------------------------------

--
-- Table structure for table `paymentoptions`
--

CREATE TABLE `paymentoptions` (
  `paymentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `cardtype` tinyint(1) NOT NULL COMMENT '1= Debitcard 2= credit card',
  `info` varchar(60) NOT NULL,
  `securitypin` int(11) NOT NULL,
  `expiredate` date NOT NULL,
  `amountpaid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seatid` int(11) NOT NULL,
  `seatname` varchar(255) NOT NULL,
  `seattype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seatid`, `seatname`, `seattype`) VALUES
(1, 'Regular', 'School bus');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `seatid` int(11) NOT NULL,
  `busscheid` int(11) NOT NULL,
  `numticketsavailable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketid`, `userid`, `seatid`, `busscheid`, `numticketsavailable`) VALUES
(1, 1, 1, 2, 60);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `fname`, `lname`, `email`, `address`, `phonenumber`, `password`, `verify_token`, `verify_status`, `created_at`) VALUES
(1, 'victor', 'Adasdssadsfsdasddadasaadad', 'victillettjr@gmail.com', '12sas333add3 Mawdadain St.', 2147483647, '12345', 'c9611e3833ffba4dab3e2fa6cb020384', 1, '2023-03-31 07:35:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busid`),
  ADD KEY `buscompid` (`buscompid`);

--
-- Indexes for table `buscompanies`
--
ALTER TABLE `buscompanies`
  ADD PRIMARY KEY (`buscompid`);

--
-- Indexes for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD PRIMARY KEY (`busscheid`),
  ADD KEY `begin_locationid` (`begin_locationid`),
  ADD KEY `end_locationid` (`end_locationid`),
  ADD KEY `busid` (`busid`);

--
-- Indexes for table `locationofstop`
--
ALTER TABLE `locationofstop`
  ADD PRIMARY KEY (`stoplocid`);

--
-- Indexes for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seatid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketid`),
  ADD KEY `busscheid` (`busscheid`),
  ADD KEY `seatid` (`seatid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `busid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buscompanies`
--
ALTER TABLE `buscompanies`
  MODIFY `buscompid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `busschedule`
--
ALTER TABLE `busschedule`
  MODIFY `busscheid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `locationofstop`
--
ALTER TABLE `locationofstop`
  MODIFY `stoplocid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`buscompid`) REFERENCES `buscompanies` (`buscompid`);

--
-- Constraints for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD CONSTRAINT `busschedule_ibfk_1` FOREIGN KEY (`begin_locationid`) REFERENCES `locationofstop` (`stoplocid`),
  ADD CONSTRAINT `busschedule_ibfk_2` FOREIGN KEY (`end_locationid`) REFERENCES `locationofstop` (`stoplocid`),
  ADD CONSTRAINT `busschedule_ibfk_3` FOREIGN KEY (`busid`) REFERENCES `bus` (`busid`);

--
-- Constraints for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  ADD CONSTRAINT `paymentoptions_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`busscheid`) REFERENCES `busschedule` (`busscheid`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`seatid`) REFERENCES `seat` (`seatid`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
