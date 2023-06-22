-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 01:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnitree`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Kerusi'),
(2, 'Meja'),
(3, 'Rak Buku');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `code`) VALUES
(1, 'Merah', '#FF0000'),
(2, 'Jingga', '#FFA500'),
(3, 'Kuning', '#FFFF00'),
(4, 'Hijau', '#00FF00'),
(5, 'Biru', '#0000FF'),
(6, 'Merah Jambu', '#FFC0CB'),
(7, 'Ungu', '#9400D3'),
(8, 'Hitam', '#000000'),
(9, 'Putih', '#FFFFFF'),
(10, 'Kelabu', '#808080'),
(11, 'Coklat', '#964B00'),
(12, 'Oak', '#806517');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_logo` varchar(50) NOT NULL,
  `company_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_logo`, `company_email`) VALUES
(1, 'Latitude Run', 'latitude-run.png', 'latrun@latrun.com'),
(2, 'Apt2B', 'Apt2B.jpg', 'apt2b@apt2b.com'),
(3, 'Burrow', 'burrow.png', 'burrow@burrow.com');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `color`, `image`, `info`) VALUES
(1, 3, 'Desk Yellow.png', 1),
(2, 9, 'Desk White.png', 1),
(3, 9, 'PASEO-OFFICE-CHAIR.png', 2),
(5, 10, 'PASEO-OFFICE-CHAIR-GRAY.png', 2),
(6, 12, 'index_oak_transparent.png', 3),
(11, 11, 'index_brown_transparent.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nomhp` int(11) NOT NULL,
  `aras` varchar(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `picture` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `name`, `password`, `nomhp`, `aras`, `email`, `picture`) VALUES
(1, 'yeoh', 'yeoh1234', 137779999, '1', 'yeoh1234@gmail.com', 'stickman.png'),
(2, 'admin', 'password', 111111111, '3', 'admin@admin.com', 'admin.png'),
(3, 'apple', 'a', 2147483647, '1', 'apple@apple.com', 'default-icon.webp'),
(5, 'Latitude Run', 'latrun', 135677991, '2', 'latrun@latrun.com', 'latitude-run.png'),
(6, 'Apt2B', 'apt2b', 234547568, '2', 'apt2b@apt2b.com', 'Apt2B.jpg'),
(7, 'Burrow', 'burrow', 1276348963, '2', 'burrow@burrow.com', 'burrow.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info` (`info`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `info` FOREIGN KEY (`info`) REFERENCES `furniture_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
