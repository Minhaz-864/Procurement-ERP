-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 09:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE `requisition` (
  `sl` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estimate` int(11) DEFAULT NULL,
  `po_num` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `req_date` date DEFAULT NULL,
  `req_status` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`sl`, `user_id`, `item_name`, `description`, `estimate`, `po_num`, `quantity`, `req_date`, `req_status`, `files`) VALUES
(1, 15, 'Hand Sanitizer', 'Hand Sanitizer', 1000, 201107, 10, '2021-11-25', 'Pending', '201107.pdf'),
(2, 16, 'Biscuit', 'Choco Chip Cookies', 60, 201108, 1, '2021-11-24', 'Pending', '201108.pdf'),
(3, 16, 'Smartphone', 'Pixel 5A 5G', 42000, 201109, 1, '2021-11-24', 'Submitted', '201109.pdf'),
(4, 17, 'Laptop', 'Macbook Pro ', 120000, 201110, 1, '2021-11-23', 'Declined', '201110.pdf'),
(5, 16, 'asdjbf', 'jsdfbgjksdfg', 200, 201112, 2, '2021-11-23', 'Accepted', '201112.pdf'),
(6, 18, 'Ram', '16gb ram', 8000, 201113, 1, '2021-11-25', 'Accepted', '201113.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(31, 12, '2020-03-12', 'Computer Mouse', '500', '2020-03-18 23:35:45'),
(32, 12, '2020-04-27', 'Milk+Bread', '80', '2020-04-26 12:30:00'),
(33, 12, '2020-04-28', 'Room Rent', '10000', '2020-04-27 23:36:26'),
(38, 12, '2020-04-29', 'Bread', '35', '2020-04-29 08:51:20'),
(39, 12, '2020-04-30', 'Milk', '45', '2020-04-30 03:44:35'),
(40, 14, '2021-11-25', 'Server Space', '15000', '2021-11-24 18:52:50'),
(41, 13, '2021-11-25', '16gb ram', '8000', '2021-11-25 12:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `Role` varchar(20) DEFAULT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Approval` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `Role`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`, `Approval`) VALUES
(8, 'admin', 'Test', 'test@gmail.com', 5656556565, '202cb962ac59075b964b07152d234b70', '2019-05-16 23:34:16', 1),
(10, 'admin', 'Test User demo', 'testuser@gmail.com', 987654321, 'f925916e2754e5e03f75dd58a5733251', '2019-05-17 23:34:53', 1),
(13, 'admin', 'Minhaz', 'minhaz@gmail.com', 12345780214, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-24 18:46:58', 1),
(14, 'admin', 'Ahmed', 'ahmed@gmail.com', 1245789630, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-24 18:47:17', 1),
(15, 'teacher', 'Employee', 'employee@gmail.com', 14789652301, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-24 18:49:44', 1),
(16, 'employee', 'EmployeeOne', 'employee1@gmail.com', 10203040506, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-25 08:02:40', 1),
(17, 'finance', 'EmployeeTwo', 'employee2@gmail.com', 10203405060, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-25 08:03:10', 1),
(18, 'teacher', 'sumon', 'sumon@gmail.com', 12457896302, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-25 12:16:22', 1),
(19, 'student', 'studentOne', 'student1@gmail.com', 45454565651, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-25 19:20:13', 1),
(20, 'student', 'studentTwo', 'student2@gmail.com', 12121232320, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-25 19:21:33', 1),
(21, 'None', 'newEntry', 'new1@gmail.com', 14523678901, 'e10adc3949ba59abbe56e057f20f883e', '2021-11-26 17:22:29', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requisition`
--
ALTER TABLE `requisition`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requisition`
--
ALTER TABLE `requisition`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
