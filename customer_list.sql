-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 07:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer data`
--

CREATE TABLE `customer data` (
  `id` int(3) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer data`
--

INSERT INTO `customer data` (`id`, `Name`, `Email`, `Balance`) VALUES
(1, 'Ashith Hegde', 'hashith@gmail.com', 10000000),
(2, 'Ramesh Jadhav', 'rjadhav@gmail.com', 43000),
(3, 'Rajiv Nair', 'rnair@gmail.com', 60000),
(4, 'Erik Joy', 'jerik@gmail.com', 61000),
(5, 'Shrishti Gupta', 'sgupta@gmail.com', 52000),
(6, 'Manoj Sharma', 'msharma@gmail.com', 15000),
(7, 'Sachin Shetty', 'sshetty@gmail.com', 12000),
(8, 'Ahzaaz Ahmed', 'aahmed@gmail.com', 66000),
(9, 'Aditya Parate', 'aparate@gmail.com', 60000),
(10, 'Shubham Nambiar', 'snambiar@gmail.com', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `sno` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `amount transferred` int(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`sno`, `sender`, `receiver`, `amount transferred`, `datetime`) VALUES
(1, 'Shrishti Gupta', 'Ahzaaz Ahmed', 5000, '2021-09-19 03:26:14'),
(2, 'Rajiv Nair', 'Erik Joy', 6000, '2021-09-19 03:28:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer data`
--
ALTER TABLE `customer data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer data`
--
ALTER TABLE `customer data`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
