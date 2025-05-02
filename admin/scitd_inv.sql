-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 02:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scitd_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `materialmodel`
--

CREATE TABLE `materialmodel` (
  `modelID` int(11) NOT NULL,
  `modelName` varchar(80) NOT NULL,
  `description` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materialmodel`
--

INSERT INTO `materialmodel` (`modelID`, `modelName`, `description`) VALUES
(1, 'model', 'Desc'),
(2, 'new model asd', 'asdasd'),
(3, 'Acer Nitro5', '                    zxczofsoj        ');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `materialID` int(11) NOT NULL,
  `materialName` varchar(80) NOT NULL,
  `typeID` varchar(80) NOT NULL,
  `modelID` int(11) NOT NULL,
  `availability` enum('pending','borrowed','available') NOT NULL DEFAULT 'available',
  `transID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`materialID`, `materialName`, `typeID`, `modelID`, `availability`, `transID`) VALUES
(1, 'hi', '2', 2, 'borrowed', 1),
(2, 'it is 2', '2', 2, 'available', NULL),
(3, 'rcboo', '1', 1, 'available', NULL),
(4, '123', '1', 2, 'available', NULL),
(5, 'MAtname new', '1', 1, 'available', NULL),
(6, 'hi', '2', 2, 'available', NULL),
(7, 'hi', '2', 2, 'available', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materialtype`
--

CREATE TABLE `materialtype` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(80) NOT NULL,
  `description` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materialtype`
--

INSERT INTO `materialtype` (`typeID`, `typeName`, `description`) VALUES
(1, 'naem', 'desc'),
(2, 'tp2', 'type 2 diaetes                            '),
(3, 'Keyboard', 'keyboards lol                            ');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportID` int(11) NOT NULL,
  `description` varchar(80) NOT NULL,
  `hardwareType` varchar(80) DEFAULT NULL,
  `officeName` varchar(80) DEFAULT NULL,
  `ownerName` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactionlist`
--

CREATE TABLE `transactionlist` (
  `listID` int(12) NOT NULL,
  `materialName` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `transID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionlist`
--

INSERT INTO `transactionlist` (`listID`, `materialName`, `qty`, `transID`) VALUES
(1, 'rcboo', 1, 1),
(2, 'hi', 2, 1),
(3, '123', 1, 3),
(4, '123', 1, 4),
(5, '123', 1, 5),
(6, '123', 1, 6),
(7, 'hi', 1, 7),
(8, 'hi', 0, 8),
(9, 'hi', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transID` int(11) NOT NULL,
  `bname` varchar(80) NOT NULL,
  `rname` varchar(80) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `dateReserved` datetime NOT NULL DEFAULT current_timestamp(),
  `dateReturned` datetime DEFAULT NULL,
  `status` enum('borrowed','returned','pending') NOT NULL DEFAULT 'pending',
  `time_start` datetime NOT NULL DEFAULT current_timestamp(),
  `time_end` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transID`, `bname`, `rname`, `userID`, `dateReserved`, `dateReturned`, `status`, `time_start`, `time_end`) VALUES
(1, 'First Last', NULL, 1, '2025-04-09 12:38:18', NULL, 'pending', '2025-04-09 00:00:00', '2025-04-10 00:00:00'),
(2, 'First Last', NULL, 1, '2025-04-07 10:54:54', NULL, 'pending', '2025-04-03 00:00:00', '2025-04-03 00:00:00'),
(3, 'test test', NULL, 1, '2025-04-07 10:55:39', NULL, 'pending', '2025-04-07 00:00:00', '2025-04-07 00:00:00'),
(4, 'test test', NULL, 1, '2025-04-07 10:57:01', NULL, 'pending', '2025-04-07 04:55:00', '2025-04-07 05:55:00'),
(5, 'test test', NULL, 1, '2025-04-07 11:08:29', NULL, 'pending', '2025-04-07 11:08:00', '2025-04-07 12:08:00'),
(6, 'test test', NULL, 1, '2025-04-07 11:19:32', NULL, 'pending', '2025-04-07 11:08:00', '2025-04-07 12:08:00'),
(7, 'test test', NULL, 1, '2025-04-07 13:16:20', NULL, 'pending', '2025-04-07 01:16:00', '2025-04-07 02:16:00'),
(8, 'test test', NULL, 1, '2025-04-08 09:33:29', NULL, 'pending', '2025-04-08 09:33:29', '2025-04-08 09:33:29'),
(9, 'test test', NULL, 1, '2025-04-08 09:59:12', NULL, 'pending', '2025-04-08 09:59:12', '2025-04-08 09:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `age` int(11) NOT NULL,
  `position` varchar(80) NOT NULL DEFAULT 'Supervisor',
  `contactno` varchar(16) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `fname`, `lname`, `age`, `position`, `contactno`, `email`, `password`) VALUES
(1, 'user', 'rene', 'cordura', 0, 'Supervisor', '947779129', 'email', 'dc647eb65e6711e155375218212b3964'),
(2, 'admin', 'ad', 'min', 0, 'administrator', '947779129', 'email@email.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `materialmodel`
--
ALTER TABLE `materialmodel`
  ADD PRIMARY KEY (`modelID`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`materialID`);

--
-- Indexes for table `materialtype`
--
ALTER TABLE `materialtype`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `transactionlist`
--
ALTER TABLE `transactionlist`
  ADD PRIMARY KEY (`listID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materialmodel`
--
ALTER TABLE `materialmodel`
  MODIFY `modelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materialtype`
--
ALTER TABLE `materialtype`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactionlist`
--
ALTER TABLE `transactionlist`
  MODIFY `listID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
