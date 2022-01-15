-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 10:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_id` int(225) NOT NULL,
  `Title` varchar(125) NOT NULL,
  `Author` varchar(125) NOT NULL,
  `Year` int(4) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_id`, `Title`, `Author`, `Year`, `Price`) VALUES
(1, 'I Feel Bad About My Neck', 'Nora Ephron', 2006, '890.00'),
(2, 'Broken Glass', 'Alain Mabanckou', 2009, '1200.00'),
(3, 'Broken Glass', 'Alain Mabanckou', 2009, '1200.00'),
(4, 'The Girl With the Dragon Tattoo', 'Stieg Larsson', 2007, '600.00'),
(5, 'Harry Potter and the Goblet of Fire', 'JK Rowling ', 2000, '600.00'),
(6, 'A Little Life', 'Hanya Yanagihara', 2007, '550.00'),
(7, 'Chronicles: Volume One', 'Bob Dylan', 2004, '300.00'),
(8, 'The Tipping Point', 'Malcolm Gladwell', 2021, '1300.00'),
(9, 'Darkmans', 'Nicola Barker', 2007, '890.00'),
(10, 'The Siege', 'Helen Dunmore', 2007, '1500.00'),
(11, 'Light', 'M John Harrison', 2002, '970.00'),
(12, 'Visitation', 'Jenny Erpenbeck', 2008, '2000.00'),
(13, 'One Punch Man', 'TZS Siphoro', 2007, '1900.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
