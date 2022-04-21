-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 02:33 PM
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
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `sampledata`
--

CREATE TABLE `sampledata` (
  `id` int(11) NOT NULL,
  `form_data` varchar(255) NOT NULL,
  `form_text_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampledata`
--

INSERT INTO `sampledata` (`id`, `form_data`, `form_text_data`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', ''),
(4, 'checkbox2,checkbox3,checkbox4', ''),
(5, 'checkbox1,checkbox2,checkbox5', ''),
(6, 'checkbox1,checkbox2,checkbox7', ''),
(7, 'checkbox2,checkbox5,checkbox10', ''),
(8, 'checkbox2,checkbox3,checkbox5', ''),
(9, 'checkbox1,checkbox4,checkbox6', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sampledata`
--
ALTER TABLE `sampledata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sampledata`
--
ALTER TABLE `sampledata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
