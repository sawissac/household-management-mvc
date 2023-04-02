-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 05:26 PM
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
-- Database: `miniapp_household`
--

-- --------------------------------------------------------

--
-- Table structure for table `overall`
--

CREATE TABLE `overall` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `INCOME` int(11) NOT NULL,
  `EXPENSE` int(11) NOT NULL,
  `DATE` date NOT NULL DEFAULT current_timestamp(),
  `DELETE_FLAG` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `overall`
--

INSERT INTO `overall` (`ID`, `USER_ID`, `DESCRIPTION`, `INCOME`, `EXPENSE`, `DATE`, `DELETE_FLAG`) VALUES
(1, 2, 'Loans from bank', 100000, 0, '2023-04-01', 0),
(2, 2, 'Medicine', 0, 50000, '2023-04-01', 0),
(3, 2, 'Kids Birthday', 0, 50000, '2023-04-01', 0),
(4, 2, 'Debt', 0, 100000, '2023-04-01', 0),
(5, 2, 'Part Time', 30000, 0, '2023-04-01', 0),
(6, 2, 'Part Time', 30000, 0, '2023-04-01', 0),
(7, 2, 'Part Time', 30000, 0, '2023-04-01', 0),
(8, 2, 'Part Time', 10000, 0, '2023-04-01', 0),
(9, 2, 'Mini Part Time', 50000, 0, '2023-04-01', 0),
(10, 2, 'Won lottery', 100000, 1000, '2023-04-02', 1),
(11, 3, 'Going out', 10000, 0, '2023-04-05', 0),
(12, 3, 'What on your mind!', 1000, 0, '2023-04-02', 0),
(15, 2, 'What on your mind!', 100000, 0, '2023-04-06', 1),
(16, 2, 'Charity', 0, 10000, '2023-04-01', 0),
(17, 2, 'Another Charity', 0, 10000, '2023-04-01', 0),
(18, 2, 'Another One (Debt)', 0, 200000, '2023-04-01', 0),
(19, 2, 'Debt', 0, 170000, '2023-04-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `DELETE_FLAG` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USER_NAME`, `EMAIL`, `PASSWORD`, `DELETE_FLAG`) VALUES
(2, 'Fox', 'fox@gmail.com', '$2y$10$RRtFWW2tMWOGG7GP4ODGJeBWq.ghADzevJ47S1CCcoLlllApU92JS', 0),
(3, 'Doge', 'doge@gmail.com', '$2y$10$mwJ/P2zoBEBEFS/28uUTT.XwH4PrI3CVtjYaoLgfpsEx/ejwDim3y', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `overall`
--
ALTER TABLE `overall`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `overall`
--
ALTER TABLE `overall`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `overall`
--
ALTER TABLE `overall`
  ADD CONSTRAINT `overall_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
