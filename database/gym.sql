-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2022 at 04:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `GYM`
--

CREATE TABLE `GYM` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `prix` int(10) NOT NULL,
  `tapi` int(10) NOT NULL,
  `datee` varchar(100) NOT NULL,
  `random` int(20) NOT NULL,
  `FD` varchar(100) NOT NULL,
  `NL` int(10) NOT NULL,
  `NLP` int(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `GYM`
--

INSERT INTO `GYM` (`id`, `user`, `prix`, `tapi`, `datee`, `random`, `FD`, `NL`, `NLP`, `note`, `img`) VALUES
(1, 'saoudi anis', 1500, 0, '25/2/2022', 559248068, '22/3/2022', 16, 3, '...', ''),
(4, 'saoudi anis', 1500, 0, '25/3/2022', 559248069, '25/4/2022', 16, 8, '...', '5280-abstract-blue-background-vector-wallpaper-preview.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GYM`
--
ALTER TABLE `GYM`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `GYM`
--
ALTER TABLE `GYM`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
