-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2025 at 12:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(200) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `phone`, `address`, `note`, `login_id`) VALUES
(1, 'temesgen', 'Wondu', '+251900000000', 'Dilla', 'ascxadzxcda', 1),
(2, 'qqqgen', 'Wondu', '+251900000000', 'Dilla', 'ascxad', 1),
(3, 'temesgen', 'Wondu', '+251900000000', 'sdfsdf', 'wsgewrg', 1),
(4, 'dsfdsf', 'Wondu', 'xcmvk;xck;v', 'sdfsdf', 'ancxzc', 1),
(5, '1111111111111', 'Wondu', 'xcmvk;xck;v', 'Dilla', 'ancxzc', 1),
(6, 'ere', 'wWondu', 'xcmvk;xck;v', 'ireDilla', 'qqqqqqqqqq', 1),
(7, 'rrrrrrrrr1111111', 'Wondu', 'xcmvk;xck;v', 'Dilla', 'wsgewrg', 5),
(8, 'temesgen', 'Wondu', 'xcmvk;xck;v', 'Dilla', 'Our Teacher in DU STEM', 6);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Biruk Afework', 'bkmen2580@gmail.com', 'biruk', '202cb962ac59075b964b07152d234b70'),
(2, 'Biruk Afework', 'bkmen2580@gmail.com', 'biruk', '202cb962ac59075b964b07152d234b70'),
(3, 'qwert', 'xyz@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70'),
(4, 'Biruk Afework', 'bkmen2580@gmail.com', 'biruk', '202cb962ac59075b964b07152d234b70'),
(5, 'Abenezer', 'abeni@gmail.com', 'abeni', '202cb962ac59075b964b07152d234b70'),
(6, 'Temesgen', 'abuesayas10@gmail.com', 'teme', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_1` (`login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
