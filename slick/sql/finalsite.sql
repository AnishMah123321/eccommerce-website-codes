-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 12:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(15000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `category` varchar(500) NOT NULL,
  `distance` int(20) NOT NULL,
  `date` date NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `image`, `category`, `distance`, `date`, `price`) VALUES
(1, 'ragheyadav5', 'lambi judai', 'download.jpg', 'cultural', 12, '2018-12-05', 20),
(3, 'ragheyadav12334', 'jakkakakaka', 'download.jpg', 'social', 20, '2018-12-04', 12),
(6, 'ragheyadav', 'mkakakakakakakak', 'download.jpg', 'educational', 7, '2018-09-05', 20),
(7, 'ragheyadav45', 'lalalalaalalaal', 'Capture.PNG', 'social', 70, '2019-01-22', 7);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `id2`) VALUES
(3, 7),
(5, 7),
(4, 7),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `firstname`, `middlename`, `lastname`, `role`, `age`, `status`) VALUES
(2, 'raghu12', 'yadavrampratap10@gmail.com', 'f365b440cfef96bd3163772e4274cd6400a70975', 'sonu12', 'pratap12', 'yadav', 'admin', 16, 'a'),
(3, 'raghu123', 'yadavrampratap101@gmail.com', 'f365b440cfef96bd3163772e4274cd6400a70975', 'laka', 'raka', 'yadav', 'user', 16, 'a'),
(4, 'raghu1235', 'yadavrampratap1012@gmail.com', 'f365b440cfef96bd3163772e4274cd6400a70975', 'sonu12', 'pratap', 'yadav12', 'user', 16, 'a'),
(5, 'raghu1245', 'yadavrampratap10112@gmail.com', 'f365b440cfef96bd3163772e4274cd6400a70975', 'sonu', 'pratap1234', 'yadav12', 'user', 28, 'a'),
(6, 'raghu1267', 'yadavrampratap1025@gmail.com', 'f365b440cfef96bd3163772e4274cd6400a70975', 'sonu', 'pratap122323', 'yadav', 'user', 94, 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
