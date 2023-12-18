-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 09:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `address`, `email`, `phone`, `password`) VALUES
(2, 'Momtaj Hossain Mow', 'mow', 'Mugda, Dhaka', 'momtajhossain2001@gmail.com', '017491XXX68', 'mow'),
(3, 'A.y. Siam', 'aysiam', 'Dhaka, BD', 'aysiamdc@gmail.com', '0556232224', 'aysiam'),
(12, 'Siam Showdagor', 'siam', 'BD', 'thecompilerbro@gmail.com', '98654132', 'absbdslsdf'),
(13, 'Rashedul Alam', 'Rashed', 'Sirajganj', 'rashedulalam711@gmail.com', '45125874', 'rashed'),
(16, 'Naib Uddin', 'naib', 'Sylhet, Bangladesh', 'naibuddin@gmail.com', ' 8801512235', 'naib');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(15) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `accomodationtype` varchar(100) NOT NULL,
  `accomodationname` varchar(100) NOT NULL,
  `accomodationnumber` int(11) NOT NULL,
  `bookingstatus` varchar(110) NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `username`, `email`, `phonenumber`, `checkindate`, `checkoutdate`, `accomodationtype`, `accomodationname`, `accomodationnumber`, `bookingstatus`, `bill`) VALUES
(1, 'Digonta', 'ayiuohskf@yahoo.com', 2147483647, '2022-05-20', '2022-05-21', 'Room', 'Premium King', 1, 'Reserved', 14000),
(2, 'Rashedul Alam', 'rased711@yahoo.com', 432342341, '2022-06-11', '2022-06-12', 'Villa', 'Villa Deluxe Queen', 1, 'Reserved', 19000),
(3, 'Digonta', 'rs711@gmail.com', 2147483647, '2022-06-11', '2022-06-12', 'Villa', 'Villa Deluxe King', 1, 'Reserved', 16000),
(4, 'Digonta', 'digonta@yahoo.com', 2147483647, '2022-06-11', '2022-06-12', 'Room', 'Premium King', 1, 'Reserved', 14000),
(6, 'Digonta', 'hellokitty@gmail.com', 2147483647, '2022-06-11', '2022-06-12', 'Room', 'Superior King/Twin', 1, 'Reserved', 12000),
(8, 'Momtaj Hossain Mow', 'mow@yahoo.com', 765436765, '2022-06-12', '2022-06-13', 'Room', 'Premium King', 1, 'Reserved', 14000),
(9, 'Tamanna Rahman Tanni', 'tanni@gmail.com', 65765765, '2022-06-12', '2022-06-13', 'Meeting', 'Dining Hall', 1, 'Reserved', 60000),
(10, 'Naheed Rayan', 'naheed@gmail.com', 7654678, '2022-06-12', '2022-06-13', 'Room', 'Superior King/Twin', 1, 'Reserved', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `bookingtemp`
--

CREATE TABLE `bookingtemp` (
  `bookingid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(15) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `accomodationtype` varchar(100) NOT NULL,
  `accomodationname` varchar(100) NOT NULL,
  `accomodationnumber` int(11) NOT NULL,
  `bookingstatus` varchar(110) NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingtemp`
--

INSERT INTO `bookingtemp` (`bookingid`, `username`, `email`, `phonenumber`, `checkindate`, `checkoutdate`, `accomodationtype`, `accomodationname`, `accomodationnumber`, `bookingstatus`, `bill`) VALUES
(0, 'Naheed Rayan', 'naheed@gmail.com', 76545676, '2022-06-12', '2022-06-13', 'Villa', 'Villa Deluxe Queen', 1, 'Reserved', 19000);

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `bookingid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(15) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `accomodationtype` varchar(100) NOT NULL,
  `accomodationname` varchar(100) NOT NULL,
  `accomodationnumber` int(11) NOT NULL,
  `bookingstatus` varchar(110) NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`bookingid`, `username`, `email`, `phonenumber`, `checkindate`, `checkoutdate`, `accomodationtype`, `accomodationname`, `accomodationnumber`, `bookingstatus`, `bill`) VALUES
(5, 'Digonta', 'ayiuohskf@yahoo.com', 1234, '2022-06-11', '2022-06-12', 'Room', 'Superior King/Twin', 1, 'CheckedIn', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `bookingid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(15) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `accomodationtype` varchar(100) NOT NULL,
  `accomodationname` varchar(100) NOT NULL,
  `accomodationnumber` int(11) NOT NULL,
  `bookingstatus` varchar(110) NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_review`
--

CREATE TABLE `customer_review` (
  `Review No` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Review` varchar(1000) NOT NULL,
  `Rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_review`
--

INSERT INTO `customer_review` (`Review No`, `Name`, `Email`, `Review`, `Rating`) VALUES
(3, 'Zarin Subah Ridi', 'zarinsubah@gmail.com', 'It was an amazing experience', 4.5),
(7, 'Abu Yousuf Siam', 'helloworld@yahoo.com', 'Not quite good, some changes should be made', 3.5),
(11, 'Rashedul Alam', 'rs711@gmail.com', 'Fabulous Resort. Will come again. ', 5),
(18, 'Monmon Hossain Mona', 'monmonhossain7569@gmail.com', 'Service was quite good.', 4.5),
(19, 'Shipon Ahmed', 'shiponahmed109@gmail.com', 'Your resort is very beautiful... Wish to come here again.', 4),
(30, 'Ashrafuzzaman Abir', 'abircse@gmail.com', 'Well organized resort. Very good hospitality.', 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `employee-pass`
--

CREATE TABLE `employee-pass` (
  `Index` int(11) NOT NULL,
  `e-pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee-pass`
--

INSERT INTO `employee-pass` (`Index`, `e-pass`) VALUES
(1, '4568');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `Name` varchar(100) NOT NULL,
  `Available` varchar(3) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`Name`, `Available`, `Capacity`, `Rate`, `image`, `detail`) VALUES
('Conference Hall', 'Yes', 120, 75000, '620372a368baa5.16511980.jpg', 'A 120 seater main Conference Hall (Theater style seating)'),
('Dining Hall', 'No', 80, 60000, '6203730c46aba8.54704625.jpg', 'A 80 seater Dining Hall'),
('Lounge Room', 'Yes', 20, 42500, '620373e7344e58.28358106.jpg', 'A 20 seater lounge room, suitable for small family- friends gathering or small office parties.'),
('Old Meeting Room', 'Yes', 12, 15422, '620d5e4d68cec1.00308827.jpg', 'This is a small meeting room');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(10) NOT NULL,
  `imageaddress` varchar(32) NOT NULL,
  `offername` varchar(100) NOT NULL,
  `offerdetails` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `imageaddress`, `offername`, `offerdetails`) VALUES
(1, '6203747bf15442.39004347.png', 'New Year Offer 001', 'This offer offers you up to 28% discount on advance booking. Take it. Do not miss the chance.');

-- --------------------------------------------------------

--
-- Table structure for table `resetp`
--

CREATE TABLE `resetp` (
  `id` int(11) NOT NULL,
  `code` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resetp`
--

INSERT INTO `resetp` (`id`, `code`, `email`) VALUES
(8, '162a568800fa0e', 'mow@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Type` varchar(100) NOT NULL,
  `Total_Rooms` int(11) NOT NULL,
  `Available` int(11) NOT NULL,
  `Reserved` int(11) NOT NULL,
  `R_Capacity` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Type`, `Total_Rooms`, `Available`, `Reserved`, `R_Capacity`, `Rate`, `image`, `detail`) VALUES
('Premium King', 12, 9, 3, 2, 14000, '62036f393c43f7.98324902.jpg', 'There are 12 premium rooms on the south(front) side of the main hotel. These rooms have wooden parquet floors, south facing private balconies overlooking the tree-infested main garden.'),
('Superior King/Twin', 18, 15, 3, 2, 12000, '62036e55dbe6e1.14034166.jpg', 'There are 18 superior class rooms on the three floors of the north side of the main hotel building. ');

-- --------------------------------------------------------

--
-- Table structure for table `villas`
--

CREATE TABLE `villas` (
  `Type` varchar(100) NOT NULL,
  `Total_Villas` int(11) NOT NULL,
  `Available` int(11) NOT NULL,
  `Reserved` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `villas`
--

INSERT INTO `villas` (`Type`, `Total_Villas`, `Available`, `Reserved`, `Capacity`, `Rate`, `image`, `detail`) VALUES
('Villa Deluxe King', 5, 4, 1, 6, 16000, '620371aad94f65.06143540.jpg', 'These villas have capacity of 6person (4Adults, 2children). Rooms in these villas have balcony with open air bath tub'),
('Villa Deluxe Queen', 3, 2, 1, 8, 19000, '6203707f9593a3.75988828.jpg', 'The rooms of these villas have queen size beds facing towards the balcony. The balcony features a open air bath-tub over looking the aerpentine lake and the tea garden beyond it.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD UNIQUE KEY `bookingid` (`bookingid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD UNIQUE KEY `bookingid` (`bookingid`);

--
-- Indexes for table `customer_review`
--
ALTER TABLE `customer_review`
  ADD PRIMARY KEY (`Review No`);

--
-- Indexes for table `employee-pass`
--
ALTER TABLE `employee-pass`
  ADD PRIMARY KEY (`Index`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imageaddress` (`imageaddress`);

--
-- Indexes for table `resetp`
--
ALTER TABLE `resetp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD UNIQUE KEY `Type` (`Type`);

--
-- Indexes for table `villas`
--
ALTER TABLE `villas`
  ADD UNIQUE KEY `Type` (`Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_review`
--
ALTER TABLE `customer_review`
  MODIFY `Review No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee-pass`
--
ALTER TABLE `employee-pass`
  MODIFY `Index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resetp`
--
ALTER TABLE `resetp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
