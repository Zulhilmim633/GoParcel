-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 08:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goparcel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminName` varchar(100) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPhoneNo` varchar(15) NOT NULL,
  `adminPassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminName`, `adminEmail`, `adminPhoneNo`, `adminPassword`) VALUES
('liz', 'liz@example.com', '011-12312314', 'qwerty'),
('zulhilmi', 'muhammad.zulhilmizaid@gmail.com', '011-37941929', 'qwerty'),
('tester', 'tester@example.com', '011-87654321', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `parcelID` int(11) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `shippingType` varchar(15) NOT NULL,
  `senderName` varchar(150) NOT NULL,
  `senderAddress` varchar(250) NOT NULL,
  `senderPhoneNo` varchar(14) NOT NULL,
  `receiverName` varchar(150) NOT NULL,
  `receiverAddress` varchar(250) NOT NULL,
  `receiverPhoneNo` varchar(14) NOT NULL,
  `weight` int(2) NOT NULL,
  `value` varchar(9) NOT NULL,
  `payBy` varchar(50) NOT NULL,
  `trackingNumber` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`parcelID`, `detail`, `shippingType`, `senderName`, `senderAddress`, `senderPhoneNo`, `receiverName`, `receiverAddress`, `receiverPhoneNo`, `weight`, `value`, `payBy`, `trackingNumber`) VALUES
(4, 'Electronic', 'regular', 'Ahmad', 'Melaka', '011-32131231', 'Ali', 'Kuala Lumpur', '011-3213123', 3, 'RM24.50', 'receiver', 'GP1'),
(5, '', 'Next Day', 'MUHAMMAD NUR ZULHILMI BIN MOHD ZAID', 'B - 2 -30, Bukit Mahkota, seksyen 4, Bandar bukit Mahkota, Selangor', '011-37941929', 'Abu', 'Pahang', '011-31231231', 18, 'RM15', 'sender', 'EGP1'),
(13, 'a', 'Next Day', 'Tester of the website', 'kajang', '011-37941929', 'aa', 'aa', '011-12345678', 1, 'RM7', 'sender', 'EGP2');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `trackingNo` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pickup',
  `pickupLoc` varchar(250) DEFAULT NULL,
  `inTransitLoc` varchar(250) DEFAULT NULL,
  `deliveryDate` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`trackingNo`, `status`, `pickupLoc`, `inTransitLoc`, `deliveryDate`) VALUES
('EGP1', 'Pickup', 'Bangi', '', ''),
('EGP2', 'Transit', 'Jalan Reko', '', ''),
('GP1', 'Delivered', 'Batu Berendam Melaka', 'Negeri Sembilan', '3/4/2023');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userEmail` varchar(70) NOT NULL,
  `userName` varchar(70) NOT NULL,
  `userPassword` varchar(20) NOT NULL,
  `userPhoneNo` varchar(14) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userEmail`, `userName`, `userPassword`, `userPhoneNo`, `userAddress`, `FullName`) VALUES
('elly@gmail.com', 'Elly', 'qwerty', '011-01748364', 'Subang', 'Elly12'),
('muhammad.zulhilmizaid@gmail.com', 'zulhilmi', 'qwerty', '011-37941929', 'bangi', 'Muhammad Nur Zulhilmi Bin Mohd Zaid'),
('muhammad@gmail.com', 'zulhilmit', 'qwerty', '011-37941929', 'bangi', NULL),
('tes@gmail.com', 'test', 'qwerty', '011-37941929', 'kajang', 'Tester of the website');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminEmail`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`parcelID`),
  ADD KEY `trackingNumber` (`trackingNumber`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`trackingNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `parcelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
