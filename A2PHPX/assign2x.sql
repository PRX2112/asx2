-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 08:22 PM
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
-- Database: `assign2x`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cname`) VALUES
(2, 'Clothing'),
(3, 'Electronics'),
(4, 'HealthCare');

-- --------------------------------------------------------

--
-- Table structure for table `prodx`
--

CREATE TABLE `prodx` (
  `pid` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pdesc` varchar(200) NOT NULL,
  `pprice` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `scname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodx`
--

INSERT INTO `prodx` (`pid`, `photo`, `pname`, `pdesc`, `pprice`, `cname`, `scname`) VALUES
(7, '7a7c1cd67d02559eed1ce6c509b339b0458.jpg', 'Paracitemol 500mg', 'Take it for Illness Like Fever Headache etc.', 100, 'HealthCare', 'Peracitemol Tablets'),
(8, '92113f58ffb9add4edd52465076bf469235.jpg', 'IQQ7 64MP TRIPLE CAM 5G', 'Smartphone Best Camera Great Look Light in Weight', 15999, 'Electronics', 'Smart Phones'),
(9, 'ae9cbac9bf36ca48bf8da762f21c0e7a158.jpg', 'Tshirt Cottom White ', 'Full Sleeve 100% Cotton build', 599, 'Clothing', 'T-Shirt'),
(10, '7a7c1cd67d02559eed1ce6c509b339b0458.jpg', 'Paracitemol 500mg', 'Take it for Illness Like Fever Headache etc.', 100, 'HealthCare', 'Peracitemol Tablets'),
(11, '92113f58ffb9add4edd52465076bf469235.jpg', 'IQQ7 64MP TRIPLE CAM 5G', 'Smartphone Best Camera Great Look Light in Weight', 15999, 'Electronics', 'Smart Phones'),
(12, 'ae9cbac9bf36ca48bf8da762f21c0e7a158.jpg', 'Tshirt Cottom White ', 'Full Sleeve 100% Cotton build', 599, 'Clothing', 'T-Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `scid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `scname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`scid`, `cname`, `scname`) VALUES
(6, 'Electronics', 'Apple iWatch'),
(1, 'Clothing', 'Jeans'),
(4, 'Electronics', 'Laptop'),
(7, 'HealthCare', 'Peracitemol Tablets'),
(8, 'Electronics', 'Smart Phones'),
(2, 'Clothing', 'T-Shirt'),
(5, 'Electronics', 'Transcand Pen-Drive'),
(3, 'Electronics', 'TV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cname`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `prodx`
--
ALTER TABLE `prodx`
  ADD PRIMARY KEY (`pid`) USING BTREE;

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`scname`),
  ADD KEY `scid` (`scid`),
  ADD KEY `fk_cate` (`cname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prodx`
--
ALTER TABLE `prodx`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`cname`) REFERENCES `category` (`cname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
