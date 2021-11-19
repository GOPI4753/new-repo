-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 09:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phoneno` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `user_name`, `user_email`, `user_phoneno`, `city`, `user_password`, `company_name`, `business_name`) VALUES
(1, 'gopi', 'Gopi@gmail.com', '9876543210', 'hyderabad', '827ccb0eea8a706c4c34a16891f84e7b', 'rompio infotech', 'agriculture'),
(2, 'rakesh', 'rakhi@gmail.com', '9123654987', 'Hyderabad', '28eba420019e40d1378d044aa95e2138', 'rompio infotech', 'trades'),
(3, 'gowri shanker', 'gowri@gmail.com', '9123654987', 'hyderabad', '827ccb0eea8a706c4c34a16891f84e7b', 'rompio infotech', 'trades'),
(4, 'Gopi Pendrepiu', 'Gop@gmail.com', '9123654987', 'hyderabad', '202cb962ac59075b964b07152d234b70', 'shiva infotech', '- -select categories- -');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
