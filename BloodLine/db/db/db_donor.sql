-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 09:29 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_donor`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor_detail`
--

CREATE TABLE `donor_detail` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` int(12) NOT NULL,
  `rContact` int(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bGroup` varchar(5) NOT NULL,
  `LDD` date NOT NULL,
  `DOB` date NOT NULL,
  `weight` int(5) NOT NULL,
  `DP_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_detail`
--

INSERT INTO `donor_detail` (`id`, `name`, `address`, `contact`, `rContact`, `gender`, `bGroup`, `LDD`, `DOB`, `weight`, `DP_path`) VALUES
(1, 'John Doe', 'Auckland, New Zealand', 456789789, 456780004, 'Male', 'O+', '2018-04-12', '1990-04-12', 0, 'uploads/about-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `images_tbl`
--

CREATE TABLE `images_tbl` (
  `id` int(10) NOT NULL,
  `images_path` varchar(100) NOT NULL,
  `submission_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upass` varchar(20) NOT NULL,
  `umob` int(12) NOT NULL,
  `d_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `upass`, `umob`, `d_id`) VALUES
(1, 'john', 'doe', 456789789, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor_detail`
--
ALTER TABLE `donor_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_tbl`
--
ALTER TABLE `images_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `d_id` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor_detail`
--
ALTER TABLE `donor_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images_tbl`
--
ALTER TABLE `images_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `donor_detail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
