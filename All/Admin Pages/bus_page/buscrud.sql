-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 03:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buscrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(100) NOT NULL,
  `bus_no` varchar(100) NOT NULL,
  `bus_reg_no` varchar(100) NOT NULL,
  `engine_no` varchar(100) NOT NULL,
  `chassis_no` varchar(100) NOT NULL,
  `f_c` date NOT NULL,
  `next_f_c` date NOT NULL,
  `service` date NOT NULL,
  `n_service` date NOT NULL,
  `date_start` date NOT NULL,
  `bus_in_stand` varchar(100) NOT NULL,
  `bus_for_service` varchar(100) NOT NULL,
  `rc_img` varchar(255) NOT NULL,
  `insurance_img` varchar(255) NOT NULL,
  `emission_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_no`, `bus_reg_no`, `engine_no`, `chassis_no`, `f_c`, `next_f_c`, `service`, `n_service`, `date_start`, `bus_in_stand`, `bus_for_service`, `rc_img`, `insurance_img`, `emission_img`) VALUES
(11, '10', 'KA14EJ062625', 'XGST5GHS8D11', 'SHYH5HUHEE11', '2023-12-12', '2024-12-12', '2023-12-12', '2024-12-12', '2001-12-12', 'no', 'no', 'uploaded_rc_img/IMG_3437.JPG', 'uploaded_insurance_img/IMG_3436.JPG', 'uploaded_emission_img/Python_ Data Analytics and Visualization Kindle Edition.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
