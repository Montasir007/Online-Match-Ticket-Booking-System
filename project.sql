-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 06:58 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `gameinfo`
--

CREATE TABLE `gameinfo` (
  `gameNo` int(11) NOT NULL,
  `HomeTeam` varchar(55) NOT NULL,
  `AwayTeam` varchar(55) NOT NULL,
  `Venue` varchar(55) NOT NULL,
  `matchdate` date NOT NULL,
  `day` varchar(55) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticketinfo`
--

CREATE TABLE `ticketinfo` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gameNo` int(11) NOT NULL,
  `seatNo` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `FullName` varchar(55) NOT NULL,
  `UserName` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `FullName`, `UserName`, `password`, `email`) VALUES
(28, 'Farhan Israk', 'admin', 'admin', 'admin@gmail.com'),
(31, 'Montasir Hasan', 'Montasir', '123', 'montasir@yahoo.com'),
(32, 'Hasan Chowdhury', 'Hasan', '456', 'hasan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gameinfo`
--
ALTER TABLE `gameinfo`
  ADD PRIMARY KEY (`gameNo`);

--
-- Indexes for table `ticketinfo`
--
ALTER TABLE `ticketinfo`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `gameNo` (`gameNo`,`seatNo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gameinfo`
--
ALTER TABLE `gameinfo`
  MODIFY `gameNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticketinfo`
--
ALTER TABLE `ticketinfo`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
