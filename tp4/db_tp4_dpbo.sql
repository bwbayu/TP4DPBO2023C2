-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 11:42 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tp4_dpbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `ID_GROUP` int(11) NOT NULL,
  `NAMA_GROUP` varchar(100) NOT NULL,
  `NAMA_AGENSI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`ID_GROUP`, `NAMA_GROUP`, `NAMA_AGENSI`) VALUES
(1, 'red velvet', 'sm ent'),
(2, 'newjeans', 'hybe');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(11) NOT NULL,
  `ID_GROUP` int(11) DEFAULT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE` varchar(100) NOT NULL,
  `JOIN_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `ID_GROUP`, `NAME`, `EMAIL`, `PHONE`, `JOIN_DATE`) VALUES
(5, 1, 'wendy', 'wendy@gmail.com', '9876567891', '2023-05-24'),
(6, 2, 'haerin', 'haerin@gmail.com', '09643456789', '2023-05-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`ID_GROUP`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RELATIONSHIP_1_FK` (`ID_GROUP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `ID_GROUP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_GROUP`) REFERENCES `grup` (`ID_GROUP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
