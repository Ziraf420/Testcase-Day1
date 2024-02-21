-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 10:47 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer`
--

CREATE TABLE `tbl_dealer` (
  `dealer_id` int(11) NOT NULL,
  `dealer_name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_dealer`
--

INSERT INTO `tbl_dealer` (`dealer_id`, `dealer_name`, `description`) VALUES
(1, 'Yantoo', 'gueeh'),
(2, 'Tyees', 'GGhhee'),
(3, 'Gigax', 'Jual mobil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `id` int(11) NOT NULL,
  `TransactionTime` datetime DEFAULT NULL,
  `Interface` int(11) DEFAULT NULL COMMENT '0:SMS, 1:USSD',
  `Nationality` varchar(20) DEFAULT NULL,
  `IDNumber` varchar(50) DEFAULT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `DateofBirth` date DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL COMMENT '0:female, 1:male',
  `Address` varchar(100) DEFAULT NULL,
  `SIMType` int(11) DEFAULT NULL COMMENT '0:personal, 1:coorporate',
  `MSISDN` varchar(20) DEFAULT NULL COMMENT 'diisi dengan nomor telepon',
  `DealerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`id`, `TransactionTime`, `Interface`, `Nationality`, `IDNumber`, `FullName`, `DateofBirth`, `Gender`, `Address`, `SIMType`, `MSISDN`, `DealerID`) VALUES
(6, '2024-02-14 00:00:00', 0, 'Brazil', '234786424525', 'Juan Gerwas Gueas', '2001-11-27', 1, 'a', 0, '089813145677', 3),
(7, '2024-02-14 00:00:00', 0, 'Brazil', '2347864245', 'Juan Gerwas Gueas', '2024-02-21', 0, 'aaa', 1, '089733607890', 1),
(10, '2024-02-05 17:30:00', 0, 'spanyol', '19122233115900000000000000', 'Yeasst', '2000-02-15', 0, 'a', 0, '6219334444555', 3),
(11, '2024-01-29 02:10:00', 1, 'Indonesia', '23478642452566', 'Saddaaab', '2024-02-22', 0, 'a', 0, '62381631345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dealer`
--
ALTER TABLE `tbl_dealer`
  ADD PRIMARY KEY (`dealer_id`);

--
-- Indexes for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DealerID` (`DealerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dealer`
--
ALTER TABLE `tbl_dealer`
  MODIFY `dealer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD CONSTRAINT `tbl_subscriber_ibfk_1` FOREIGN KEY (`DealerID`) REFERENCES `tbl_dealer` (`dealer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
