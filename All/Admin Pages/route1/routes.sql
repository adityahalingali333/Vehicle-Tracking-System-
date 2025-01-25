-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 03:38 PM
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
-- Database: `routes`
--

-- --------------------------------------------------------

--
-- Table structure for table `busschedule`
--

CREATE TABLE `busschedule` (
  `BusNumber` int(11) NOT NULL,
  `BusName` varchar(100) DEFAULT NULL,
  `StopName` varchar(100) DEFAULT NULL,
  `ArrivalTime` time DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `busschedule`
--

INSERT INTO `busschedule` (`BusNumber`, `BusName`, `StopName`, `ArrivalTime`, `id`) VALUES
(1, 'Varadha', 'Sahyadri College', '07:00:00', 1),
(1, 'Varadha', 'Sandal Colony', '07:00:00', 2),
(1, 'Varadha', 'Shankar Mutt', '07:00:00', 4),
(1, 'Varadha', 'Sheshadripuram', '07:00:00', 5),
(1, 'Varadha', 'Mahaveera Circle', '07:00:00', 6),
(1, 'Varadha', 'Parvathi Nursing Home', '07:00:00', 9),
(1, 'Varadha', 'Sahyadri College', '10:00:00', 10),
(2, 'Krishna', 'Marigaddige', '07:00:00', 11),
(2, 'Krishna', 'Kote Police Station', '07:00:00', 12),
(2, 'Krishna', 'Krishna Cafe', '07:00:00', 13),
(2, 'Krishna', 'DVS Circle', '07:00:00', 14),
(2, 'Krishna', 'Mahaveera Circle', '07:00:00', 15),
(2, 'Krishna', 'Ashwathnagar', '07:00:00', 18),
(2, 'Krishna', 'Navule', '07:45:00', 19),
(3, 'Kaveri', 'LT. Office', '07:00:00', 20),
(3, 'Kaveri', 'Sagar Road Cross', '07:00:00', 21),
(3, 'Kaveri', 'Katte Subbanna Kalyana Mantapa Cross', '07:00:00', 22),
(3, 'Kaveri', 'Damodara Colony Cross', '07:00:00', 23),
(3, 'Kaveri', 'Good Luck Circle', '07:00:00', 24),
(3, 'Kaveri', 'APMC Road', '07:00:00', 25),
(3, 'Kaveri', '50 ft. Road Cross', '07:00:00', 26),
(3, 'Kaveri', 'DVS', '07:00:00', 27),
(3, 'Kaveri', 'I Auto Stand', '07:00:00', 28),
(3, 'Kaveri', 'Laxmi Talkies', '07:00:00', 29),
(3, 'Kaveri', 'Nirmala Nursing Home', '07:00:00', 30),
(3, 'Kaveri', 'Gandhi Nagar', '07:00:00', 31),
(3, 'Kaveri', 'Ashwathnagar', '07:00:00', 33),
(3, 'Kaveri', 'Navule', '07:00:00', 34),
(4, 'Tunga', 'Tempo Stand', '07:00:00', 35),
(4, 'Tunga', 'Bus Stand', '07:00:00', 36),
(4, 'Tunga', 'Mc.Gann Gate', '07:00:00', 37),
(4, 'Tunga', 'Circuit House Circle', '07:00:00', 38),
(4, 'Tunga', 'Sharavathi Nagar', '07:00:00', 39),
(4, 'Tunga', '60ft. Road', '07:00:00', 40),
(4, 'Tunga', 'Vinobanagar Ist Auto Stand', '07:00:00', 41),
(4, 'Tunga', 'Laxmi Theatre', '07:00:00', 42),
(4, 'Tunga', 'Gandhi Nagar', '07:00:00', 43),
(4, 'Tunga', 'Ashwathnagar', '07:00:00', 45),
(4, 'Tunga', 'Navule', '07:00:00', 46),
(5, 'Sharavathi', 'P&T Colony', '07:00:00', 47),
(5, 'Sharavathi', 'Kashi Pura Cross', '07:00:00', 48),
(5, 'Sharavathi', 'Cambridge School', '07:00:00', 49),
(5, 'Sharavathi', 'Professor Park', '07:00:00', 50),
(5, 'Sharavathi', 'Kariyann Building', '07:00:00', 51),
(5, 'Sharavathi', 'Savi Bakery', '07:00:00', 52),
(5, 'Sharavathi', 'Police Chowki', '07:00:00', 53),
(5, 'Sharavathi', 'DVS', '07:00:00', 54),
(5, 'Sharavathi', 'IstAuto Stand', '07:00:00', 55),
(5, 'Sharavathi', 'Laxmi Theatre', '07:00:00', 56),
(5, 'Sharavathi', 'Gandhi Nagar', '07:00:00', 57),
(5, 'Sharavathi', 'Ashwathnagar', '07:00:00', 59),
(5, 'Sharavathi', 'Navule', '07:00:00', 60),
(6, 'Varahi', 'Gopi Shetty Koppa Cross', '07:00:00', 61),
(6, 'Varahi', 'City Bus stop', '07:00:00', 62),
(6, 'Varahi', 'Draupadamma Circle', '07:00:00', 63),
(6, 'Varahi', 'Netaji circle', '07:00:00', 64),
(6, 'Varahi', 'Double Road Cross', '07:00:00', 65),
(6, 'Varahi', 'Vijaya Nagara', '07:00:00', 66),
(6, 'Varahi', 'Circuit House Circle', '07:00:00', 67),
(6, 'Varahi', 'Doctors Quarters', '07:00:00', 68),
(6, 'Varahi', 'Jail Circle', '07:00:00', 69),
(6, 'Varahi', 'Z.P. Office', '07:00:00', 70),
(6, 'Varahi', 'Ashwathnagara', '07:00:00', 73),
(6, 'Varahi', 'Navule', '07:00:00', 74),
(7, 'Netravathi', 'Girls Hostel', '07:00:00', 75),
(7, 'Netravathi', 'Navule', '07:00:00', 76),
(8, 'Bhadra', 'Mahaveer Circle', '07:00:00', 77),
(8, 'Bhadra', 'Shivamurthy Circle', '07:00:00', 78),
(8, 'Bhadra', 'Ashwath Nagara', '07:00:00', 81),
(8, 'Bhadra', 'Navule', '07:00:00', 82),
(8, 'Bhadra', 'Ganapathi Temple', '07:00:00', 83),
(9, 'Bhima', 'Sahyadri Colony', '07:00:00', 84),
(9, 'Bhima', 'Devraj Urs Badavane', '07:00:00', 85),
(9, 'Bhima', 'P&T Colony Cross', '07:00:00', 86),
(9, 'Bhima', 'Police Chowkey', '07:00:00', 87),
(9, 'Bhima', 'DVS', '07:00:00', 88),
(9, 'Bhima', 'IstAuto Stand', '07:00:00', 89),
(9, 'Bhima', 'Laxmi Theater', '07:00:00', 90),
(9, 'Bhima', 'Nirmala Hospital', '07:00:00', 91),
(9, 'Bhima', 'Gandhi Nagara', '07:00:00', 92),
(9, 'Bhima', 'Ashwathnagara', '07:00:00', 94),
(9, 'Bhima', 'Navule', '07:00:00', 95),
(10, 'Kabini', 'Karnataka Sangha', '07:00:00', 96),
(10, 'Kabini', 'S.N. Market', '07:00:00', 97),
(10, 'Kabini', 'Gopicircle', '07:00:00', 98),
(10, 'Kabini', 'J.P.N. Road', '07:00:00', 99),
(10, 'Kabini', 'Ganapathi Temple', '07:00:00', 100),
(10, 'Kabini', 'Jyothi Garden', '07:00:00', 101),
(10, 'Kabini', 'Jail Circle', '07:00:00', 102),
(10, 'Kabini', 'Z.P. Office', '07:00:00', 103),
(10, 'Kabini', 'S.M. Circle', '07:00:00', 104),
(10, 'Kabini', 'Ashwath Nagara', '07:00:00', 107),
(10, 'Kabini', 'Navule', '07:00:00', 108),
(11, 'Kabini', 'New town Bhadravathi', '07:00:00', 109),
(12, 'Godavari', 'Old town Bhadravathi', '07:00:00', 110),
(1, 'Varadha', 'Sahyadri College', '07:45:00', 111),
(1, 'Varadha', 'Sandal Colony', '07:45:00', 112),
(1, 'Varadha', 'Mahadevi Theatre', '07:45:00', 113),
(1, 'Varadha', 'Shankar Mutt', '07:45:00', 114),
(1, 'Varadha', 'Sheshadripuram', '07:45:00', 115),
(1, 'Varadha', 'Mahaveera Circle', '07:45:00', 116),
(1, 'Varadha', 'Ashwathnagar', '07:45:00', 119),
(1, 'Varadha', 'Sahyadri College', '07:45:00', 120),
(2, 'Krishna', 'Marigaddige', '07:45:00', 121),
(2, 'Krishna', 'Kote Police Station', '07:45:00', 122),
(2, 'Krishna', 'Krishna Cafe', '07:45:00', 123),
(2, 'Krishna', 'DVS Circle', '07:45:00', 124),
(2, 'Krishna', 'Mahaveera Circle', '07:45:00', 125),
(2, 'Krishna', 'Ashwathnagar', '07:45:00', 128),
(2, 'Krishna', 'Navule', '07:45:00', 129),
(3, 'Kaveri', 'LT. Office', '07:45:00', 130),
(3, 'Kaveri', 'Sagar Road Cross', '07:45:00', 131),
(3, 'Kaveri', 'Katte Subbanna Kalyana Mantapa Cross', '07:45:00', 132),
(3, 'Kaveri', 'Damodara Colony Cross', '07:45:00', 133),
(3, 'Kaveri', 'Good Luck Circle', '07:45:00', 134),
(3, 'Kaveri', 'APMC Road', '07:45:00', 135),
(3, 'Kaveri', '50 ft. Road Cross', '07:45:00', 136),
(3, 'Kaveri', 'DVS', '07:45:00', 137),
(3, 'Kaveri', 'I Auto Stand', '07:45:00', 138),
(3, 'Kaveri', 'Laxmi Talkies', '07:45:00', 139),
(3, 'Kaveri', 'Nirmala Nursing Home', '07:45:00', 140),
(3, 'Kaveri', 'Gandhi Nagar', '07:45:00', 141),
(3, 'Kaveri', 'Ashwathnagar', '07:45:00', 143),
(3, 'Kaveri', 'Navule', '07:45:00', 144),
(4, 'Tunga', 'Tempo Stand', '07:45:00', 145),
(4, 'Tunga', 'Bus Stand', '07:45:00', 146),
(4, 'Tunga', 'Mc.Gann Gate', '07:45:00', 147),
(4, 'Tunga', 'Circuit House Circle', '07:45:00', 148),
(4, 'Tunga', 'Sharavathi Nagar', '07:45:00', 149),
(4, 'Tunga', '60ft. Road', '07:45:00', 150),
(4, 'Tunga', 'Vinobanagar Ist Auto Stand', '07:45:00', 151),
(4, 'Tunga', 'Laxmi Theatre', '07:45:00', 152),
(4, 'Tunga', 'Gandhi Nagar', '07:45:00', 153),
(4, 'Tunga', 'Ashwathnagar', '07:45:00', 155),
(4, 'Tunga', 'Navule', '07:45:00', 156),
(5, 'Sharavathi', 'P&T Colony', '07:45:00', 157),
(5, 'Sharavathi', 'Kashi Pura Cross', '07:45:00', 158),
(5, 'Sharavathi', 'Cambridge School', '07:45:00', 159),
(5, 'Sharavathi', 'Professor Park', '07:45:00', 160),
(5, 'Sharavathi', 'Kariyann Building', '07:45:00', 161),
(5, 'Sharavathi', 'Savi Bakery', '07:45:00', 162),
(5, 'Sharavathi', 'Police Chowki', '07:45:00', 163),
(5, 'Sharavathi', 'DVS', '07:45:00', 164),
(5, 'Sharavathi', 'IstAuto Stand', '07:45:00', 165),
(5, 'Sharavathi', 'Laxmi Theatre', '07:45:00', 166),
(5, 'Sharavathi', 'Gandhi Nagar', '07:45:00', 167),
(5, 'Sharavathi', 'Ashwathnagar', '07:45:00', 169),
(5, 'Sharavathi', 'Navule', '07:45:00', 170),
(6, 'Varahi', 'Gopi Shetty Koppa Cross', '07:45:00', 171),
(6, 'Varahi', 'City Bus stop', '07:45:00', 172),
(6, 'Varahi', 'Draupadamma Circle', '07:45:00', 173),
(6, 'Varahi', 'Netaji circle', '07:45:00', 174),
(6, 'Varahi', 'Double Road Cross', '07:45:00', 175),
(6, 'Varahi', 'Vijaya Nagara', '07:45:00', 176),
(6, 'Varahi', 'Circuit House Circle', '07:45:00', 177),
(6, 'Varahi', 'Doctors Quarters', '07:45:00', 178),
(6, 'Varahi', 'Jail Circle', '07:45:00', 179),
(6, 'Varahi', 'Z.P. Office', '07:45:00', 180),
(6, 'Varahi', 'Ashwathnagara', '07:45:00', 183),
(6, 'Varahi', 'Navule', '07:45:00', 184),
(7, 'Netravathi', 'Girls Hostel', '07:45:00', 185),
(7, 'Netravathi', 'Navule', '07:45:00', 186),
(8, 'Bhadra', 'Mahaveer Circle', '07:45:00', 187),
(8, 'Bhadra', 'Shivamurthy Circle', '07:45:00', 188),
(8, 'Bhadra', 'Ashwath Nagara', '07:45:00', 191),
(8, 'Bhadra', 'Navule', '07:45:00', 192),
(8, 'Bhadra', 'Ganapathi Temple', '07:45:00', 193),
(9, 'Bhima', 'Sahyadri Colony', '07:45:00', 194),
(9, 'Bhima', 'Devraj Urs Badavane', '07:45:00', 195),
(9, 'Bhima', 'P&T Colony Cross', '07:45:00', 196),
(9, 'Bhima', 'Police Chowkey', '07:45:00', 197),
(9, 'Bhima', 'DVS', '07:45:00', 198),
(9, 'Bhima', 'IstAuto Stand', '07:45:00', 199),
(9, 'Bhima', 'Laxmi Theater', '07:45:00', 200),
(9, 'Bhima', 'Nirmala Hospital', '07:45:00', 201),
(9, 'Bhima', 'Gandhi Nagara', '07:45:00', 202),
(9, 'Bhima', 'Ashwathnagara', '07:45:00', 204),
(9, 'Bhima', 'Navule', '07:45:00', 205),
(10, 'Kabini', 'Karnataka Sangha', '07:45:00', 206),
(10, 'Kabini', 'S.N. Market', '07:45:00', 207),
(10, 'Kabini', 'Gopicircle', '07:45:00', 208),
(10, 'Kabini', 'J.P.N. Road', '07:45:00', 209),
(10, 'Kabini', 'Ganapathi Temple', '07:45:00', 210),
(10, 'Kabini', 'Jyothi Garden', '07:45:00', 211),
(10, 'Kabini', 'Jail Circle', '07:45:00', 212),
(10, 'Kabini', 'Z.P. Office', '07:45:00', 213),
(10, 'Kabini', 'S.M. Circle', '07:45:00', 214),
(10, 'Kabini', 'Ashwath Nagara', '07:45:00', 217),
(10, 'Kabini', 'Navule', '07:45:00', 218),
(11, 'Hemavathi', 'New town Bhadravathi', '07:45:00', 219),
(12, 'Godavari', 'Old town Bhadravathi', '07:45:00', 220),
(1, 'Varadha', 'Sahyadri College', '10:00:00', 221),
(1, 'Varadha', 'Sandal Colony', '10:00:00', 222),
(1, 'Varadha', 'Mahadevi Theatre', '10:00:00', 223),
(1, 'Varadha', 'Shankar Mutt', '10:00:00', 224),
(1, 'Varadha', 'Sheshadripuram', '10:00:00', 225),
(1, 'Varadha', 'Mahaveera Circle', '10:00:00', 226),
(1, 'Varadha', 'Ashwathnagar', '10:00:00', 229),
(1, 'Varadha', 'Sahyadri College', '10:00:00', 230),
(2, 'Krishna', 'Marigaddige', '10:00:00', 231),
(2, 'Krishna', 'Kote Police Station', '10:00:00', 232),
(2, 'Krishna', 'Krishna Cafe', '10:00:00', 233),
(2, 'Krishna', 'DVS Circle', '10:00:00', 234),
(2, 'Krishna', 'Mahaveera Circle', '10:00:00', 235),
(2, 'Krishna', 'Ashwathnagar', '10:00:00', 238),
(2, 'Krishna', 'Navule', '10:00:00', 239),
(3, 'Kaveri', 'LT. Office', '10:00:00', 240),
(3, 'Kaveri', 'Sagar Road Cross', '10:00:00', 241),
(3, 'Kaveri', 'Katte Subbanna Kalyana Mantapa Cross', '10:00:00', 242),
(3, 'Kaveri', 'Damodara Colony Cross', '10:00:00', 243),
(3, 'Kaveri', 'Good Luck Circle', '10:00:00', 244),
(3, 'Kaveri', 'APMC Road', '10:00:00', 245),
(3, 'Kaveri', '50 ft. Road Cross', '10:00:00', 246),
(3, 'Kaveri', 'DVS', '10:00:00', 247),
(3, 'Kaveri', 'I Auto Stand', '10:00:00', 248),
(3, 'Kaveri', 'Laxmi Talkies', '10:00:00', 249),
(3, 'Kaveri', 'Nirmala Nursing Home', '10:00:00', 250),
(3, 'Kaveri', 'Gandhi Nagar', '10:00:00', 251),
(3, 'Kaveri', 'Ashwathnagar', '10:00:00', 253),
(3, 'Kaveri', 'Navule', '10:00:00', 254),
(4, 'Tunga', 'Tempo Stand', '10:00:00', 255),
(4, 'Tunga', 'Bus Stand', '10:00:00', 256),
(4, 'Tunga', 'Mc.Gann Gate', '10:00:00', 257),
(4, 'Tunga', 'Circuit House Circle', '10:00:00', 258),
(4, 'Tunga', 'Sharavathi Nagar', '10:00:00', 259),
(4, 'Tunga', '60ft. Road', '10:00:00', 260),
(4, 'Tunga', 'Vinobanagar Ist Auto Stand', '10:00:00', 261),
(4, 'Tunga', 'Laxmi Theatre', '10:00:00', 262),
(4, 'Tunga', 'Gandhi Nagar', '10:00:00', 263),
(4, 'Tunga', 'Ashwathnagar', '10:00:00', 265),
(4, 'Tunga', 'Navule', '10:00:00', 266),
(5, 'Sharavathi', 'P&T Colony', '10:00:00', 267),
(5, 'Sharavathi', 'Kashi Pura Cross', '10:00:00', 268),
(5, 'Sharavathi', 'Cambridge School', '10:00:00', 269),
(5, 'Sharavathi', 'Professor Park', '10:00:00', 270),
(5, 'Sharavathi', 'Kariyann Building', '10:00:00', 271),
(5, 'Sharavathi', 'Savi Bakery', '10:00:00', 272),
(5, 'Sharavathi', 'Police Chowki', '10:00:00', 273),
(5, 'Sharavathi', 'DVS', '10:00:00', 274),
(5, 'Sharavathi', 'IstAuto Stand', '10:00:00', 275),
(5, 'Sharavathi', 'Laxmi Theatre', '10:00:00', 276),
(5, 'Sharavathi', 'Gandhi Nagar', '10:00:00', 277),
(5, 'Sharavathi', 'Ashwathnagar', '10:00:00', 279),
(5, 'Sharavathi', 'Navule', '10:00:00', 280),
(6, 'Varahi', 'Gopi Shetty Koppa Cross', '10:00:00', 281),
(6, 'Varahi', 'City Bus stop', '10:00:00', 282),
(6, 'Varahi', 'Draupadamma Circle', '10:00:00', 283),
(6, 'Varahi', 'Netaji circle', '10:00:00', 284),
(6, 'Varahi', 'Double Road Cross', '10:00:00', 285),
(6, 'Varahi', 'Vijaya Nagara', '10:00:00', 286),
(6, 'Varahi', 'Circuit House Circle', '10:00:00', 287),
(6, 'Varahi', 'Doctors Quarters', '10:00:00', 288),
(6, 'Varahi', 'Jail Circle', '10:00:00', 289),
(6, 'Varahi', 'Z.P. Office', '10:00:00', 290),
(6, 'Varahi', 'Ashwathnagara', '10:00:00', 293),
(6, 'Varahi', 'Navule', '10:00:00', 294),
(7, 'Netravathi', 'Girls Hostel', '10:00:00', 295),
(7, 'Netravathi', 'Navule', '10:00:00', 296),
(8, 'Bhadra', 'Mahaveer Circle', '10:00:00', 297),
(8, 'Bhadra', 'Shivamurthy Circle', '10:00:00', 298),
(8, 'Bhadra', 'Ashwath Nagara', '10:00:00', 301),
(8, 'Bhadra', 'Navule', '10:00:00', 302),
(8, 'Bhadra', 'Ganapathi Temple', '10:00:00', 303),
(9, 'Bhima', 'Sahyadri Colony', '10:00:00', 304),
(9, 'Bhima', 'Devraj Urs Badavane', '10:00:00', 305),
(9, 'Bhima', 'P&T Colony Cross', '10:00:00', 306),
(9, 'Bhima', 'Police Chowkey', '10:00:00', 307),
(9, 'Bhima', 'DVS', '10:00:00', 308),
(9, 'Bhima', 'IstAuto Stand', '10:00:00', 309),
(9, 'Bhima', 'Laxmi Theater', '10:00:00', 310),
(9, 'Bhima', 'Nirmala Hospital', '10:00:00', 311),
(9, 'Bhima', 'Gandhi Nagara', '10:00:00', 312),
(9, 'Bhima', 'Ashwathnagara', '10:00:00', 314),
(9, 'Bhima', 'Navule', '10:00:00', 315),
(10, 'Kabini', 'Karnataka Sangha', '10:00:00', 316),
(10, 'Kabini', 'S.N. Market', '10:00:00', 317),
(10, 'Kabini', 'Gopicircle', '10:00:00', 318),
(10, 'Kabini', 'J.P.N. Road', '10:00:00', 319),
(10, 'Kabini', 'Ganapathi Temple', '10:00:00', 320),
(10, 'Kabini', 'Jyothi Garden', '10:00:00', 321),
(10, 'Kabini', 'Jail Circle', '10:00:00', 322),
(10, 'Kabini', 'Z.P. Office', '10:00:00', 323),
(10, 'Kabini', 'S.M. Circle', '10:00:00', 324),
(10, 'Kabini', 'Ashwath Nagara', '10:00:00', 327),
(10, 'Kabini', 'Navule', '10:00:00', 328),
(11, 'Hemavathi', 'New town Bhadravathi', '10:00:00', 329),
(12, 'Godavari', 'Old town Bhadravathi', '10:00:00', 330),
(1, 'Varadha', 'Ashwathnagar', '07:00:00', 331),
(1, 'Varadha', 'Jail Circle', '07:00:00', 333),
(1, 'Varadha', 'Kamala Nursing Home', '07:00:00', 337);

-- --------------------------------------------------------

--
-- Table structure for table `editedbusstops`
--

CREATE TABLE `editedbusstops` (
  `ID` int(11) NOT NULL,
  `BusName` varchar(100) DEFAULT NULL,
  `BusNumber` int(11) DEFAULT NULL,
  `Time` varchar(20) DEFAULT NULL,
  `EditedStopOrder` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editedbusstops`
--

INSERT INTO `editedbusstops` (`ID`, `BusName`, `BusNumber`, `Time`, `EditedStopOrder`) VALUES
(24, 'Kaveri', 3, '7:00 AM', 'LT. Office, Sagar Road Cross, Katte Subbanna Kalyana Mantapa Cross, Damodara Colony Cross, Good Luck Circle, APMC Road, 50 ft. Road Cross, DVS, I Auto Stand, Laxmi Talkies, Nirmala Nursing Home, Gandhi Nagar, Ashwathnagar, Navule'),
(25, 'Varadha', 1, '7:00 AM', 'Sahyadri College, Sandal Colony, Shankar Mutt, Sheshadripuram, Mahaveera Circle, Jail Circle, Kamala Nursing Home, Parvathi Nursing Home, Ashwathnagar'),
(26, 'Krishna', 2, '7:00 AM', 'Marigaddige, Kote Police Station, Krishna Cafe, DVS Circle, Mahaveera Circle, Ashwathnagar');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `RouteName` varchar(100) DEFAULT NULL,
  `StartPoint` varchar(100) DEFAULT NULL,
  `EndPoint` varchar(100) DEFAULT NULL,
  `StopName` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`RouteName`, `StartPoint`, `EndPoint`, `StopName`, `Description`, `id`) VALUES
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Sandal Colony', 'ROUTE No. 1 Sahyadri College to JNNCE', 1),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Mahadevi Theatre', 'ROUTE No. 1 Sahyadri College to JNNCE', 2),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Shankar Mutt', 'ROUTE No. 1 Sahyadri College to JNNCE', 3),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Sheshadripuram', 'ROUTE No. 1 Sahyadri College to JNNCE', 4),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Mahaveera Circle', 'ROUTE No. 1 Sahyadri College to JNNCE', 5),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Ashwathnagar', 'ROUTE No. 1 Sahyadri College to JNNCE', 8),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'Kote Police Station', 'ROUTE No. 2: Marigaddige to JNNCE', 9),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'Krishna Cafe', 'ROUTE No. 2: Marigaddige to JNNCE', 10),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'DVS Circle', 'ROUTE No. 2: Marigaddige to JNNCE', 11),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'Mahaveera Circle', 'ROUTE No. 2: Marigaddige to JNNCE', 12),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'Kamala Nursing Home', 'ROUTE No. 2: Marigaddige to JNNCE', 13),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'Parvathi Nursing Home', 'ROUTE No. 2: Marigaddige to JNNCE', 14),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'Ashwathnagar', 'ROUTE No. 2: Marigaddige to JNNCE', 15),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'Navule', 'ROUTE No. 2: Marigaddige to JNNCE', 16),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'LT. Office', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 17),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Sagar Road Cross', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 18),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Katte Subbanna Kalyana Mantapa Cross', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 19),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Damodara Colony Cross', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 20),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Good Luck Circle', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 21),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'APMC Road', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 22),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', '50 ft. Road Cross', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 23),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'DVS', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 24),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'I Auto Stand', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 25),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Laxmi Talkies', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 26),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Nirmala Nursing Home', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 27),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Gandhi Nagar', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 28),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Parvathi Nursing Home', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 29),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Ashwathnagara', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 30),
('Route No. 3: Gopala Gowda Extension to JNNCE', 'Gopala Gowda Extension', 'JNNCE', 'Navule', 'ROUTE No. 3: Gopala Gowda Extension to JNNCE', 31),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Tempo Stand', 'ROUTE No. 4: Tempo Stand to JNNCE', 32),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Bus Stand', 'ROUTE No. 4: Tempo Stand to JNNCE', 33),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Mc.Gann Gate', 'ROUTE No. 4: Tempo Stand to JNNCE', 34),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Circuit House Circle', 'ROUTE No. 4: Tempo Stand to JNNCE', 35),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Sharavathi Nagar', 'ROUTE No. 4: Tempo Stand to JNNCE', 36),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', '60ft. Road', 'ROUTE No. 4: Tempo Stand to JNNCE', 37),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Vinobanagar Ist Auto Stand', 'ROUTE No. 4: Tempo Stand to JNNCE', 38),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Laxmi Theatre', 'ROUTE No. 4: Tempo Stand to JNNCE', 39),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Gandhi Nagar', 'ROUTE No. 4: Tempo Stand to JNNCE', 40),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Parvathi Nursing Home', 'ROUTE No. 4: Tempo Stand to JNNCE', 41),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Ashwathnagara', 'ROUTE No. 4: Tempo Stand to JNNCE', 42),
('Route No. 4: Tempo Stand to JNNCE', 'Tempo Stand', 'JNNCE', 'Navule', 'ROUTE No. 4: Tempo Stand to JNNCE', 43),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'P&T Colony', 'ROUTE No. 5: Vinobanagar to JNNCE', 44),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Kashi Pura Cross', 'ROUTE No. 5: Vinobanagar to JNNCE', 45),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Cambridge School', 'ROUTE No. 5: Vinobanagar to JNNCE', 46),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Professor Park', 'ROUTE No. 5: Vinobanagar to JNNCE', 47),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Kariyann Building', 'ROUTE No. 5: Vinobanagar to JNNCE', 48),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Savi Bakery', 'ROUTE No. 5: Vinobanagar to JNNCE', 49),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Police Chowki', 'ROUTE No. 5: Vinobanagar to JNNCE', 50),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'DVS', 'ROUTE No. 5: Vinobanagar to JNNCE', 51),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'I Auto Stand', 'ROUTE No. 5: Vinobanagar to JNNCE', 52),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Laxmi Talkies', 'ROUTE No. 5: Vinobanagar to JNNCE', 53),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Nirmala Nursing Home', 'ROUTE No. 5: Vinobanagar to JNNCE', 54),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Gandhi Nagar Parvathi Nursing Home', 'ROUTE No. 5: Vinobanagar to JNNCE', 55),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Ashwathnagara', 'ROUTE No. 5: Vinobanagar to JNNCE', 56),
('Route No. 5: Vinobanagar to JNNCE', 'Vinobanagar', 'JNNCE', 'Navule', 'ROUTE No. 5: Vinobanagar to JNNCE', 57),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Gopi Shetty Koppa Cross', 'ROUTE No. 6: Gopala to JNNCE', 58),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'City Bus stop', 'ROUTE No. 6: Gopala to JNNCE', 59),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Draupadamma Circle', 'ROUTE No. 6: Gopala to JNNCE', 60),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Netaji circle', 'ROUTE No. 6: Gopala to JNNCE', 61),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Double Road Cross', 'ROUTE No. 6: Gopala to JNNCE', 62),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Vijaya Nagara', 'ROUTE No. 6: Gopala to JNNCE', 63),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Circuit House Circle', 'ROUTE No. 6: Gopala to JNNCE', 64),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Doctors Quarters', 'ROUTE No. 6: Gopala to JNNCE', 65),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Jail Circle', 'ROUTE No. 6: Gopala to JNNCE', 66),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Z.P. Office', 'ROUTE No. 6: Gopala to JNNCE', 67),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Kamala Nursing Home', 'ROUTE No. 6: Gopala to JNNCE', 68),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Parvathi Nursing Home', 'ROUTE No. 6: Gopala to JNNCE', 69),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Ashwathnagara', 'ROUTE No. 6: Gopala to JNNCE', 70),
('Route No. 6: Gopala to JNNCE', 'Gopala', 'JNNCE', 'Navule', 'ROUTE No. 6: Gopala to JNNCE', 71),
('Route No. 7: Girls Hostel to JNNCE', 'Girls Hostel', 'JNNCE', 'Navule', 'ROUTE No. 7: Girls Hostel to JNNCE', 72),
('Route No. 8: K.E.B. Circle to JNNCE', 'K.E.B. Circle', 'JNNCE', 'Mahaveer Circle', 'ROUTE No. 8: K.E.B. Circle to JNNCE', 73),
('Route No. 8: K.E.B. Circle to JNNCE', 'K.E.B. Circle', 'JNNCE', 'Shivamurthy Circle', 'ROUTE No. 8: K.E.B. Circle to JNNCE', 74),
('Route No. 8: K.E.B. Circle to JNNCE', 'K.E.B. Circle', 'JNNCE', 'Kamala Nursing Home', 'ROUTE No. 8: K.E.B. Circle to JNNCE', 75),
('Route No. 8: K.E.B. Circle to JNNCE', 'K.E.B. Circle', 'JNNCE', 'Parvathi Nursing Home', 'ROUTE No. 8: K.E.B. Circle to JNNCE', 76),
('Route No. 8: K.E.B. Circle to JNNCE', 'K.E.B. Circle', 'JNNCE', 'Ashwath Nagara', 'ROUTE No. 8: K.E.B. Circle to JNNCE', 77),
('Route No. 8: K.E.B. Circle to JNNCE', 'K.E.B. Circle', 'JNNCE', 'Navule', 'ROUTE No. 8: K.E.B. Circle to JNNCE', 78),
('Route No. 8: K.E.B. Circle to JNNCE', 'K.E.B. Circle', 'JNNCE', 'Ganapathi Temple', 'ROUTE No. 8: K.E.B. Circle to JNNCE', 79),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Devraj Urs Badavane', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 80),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'P&T Colony Cross', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 81),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Police Chowkey', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 82),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'DVS', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 83),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'IstAuto Stand', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 84),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Laxmi Theater', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 85),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Nirmala Hospital', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 86),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Gandhi Nagara', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 87),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Parvathi Nursing Home', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 88),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Ashwath Nagara', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 89),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Navule', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 90),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'S.N. Market', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 91),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Gopicircle', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 92),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'J.P.N. Road', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 93),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Ganapathi Temple', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 94),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Jyothi Garden', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 95),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Jail Circle', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 96),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Z.P. Office', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 97),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'S.M. Circle', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 98),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Kamala Nursing Home', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 99),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Parvathi Nursing Home', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 100),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Ashwath Nagara', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 101),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Navule', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 102),
('Route No. 11: New town Bhadravathi to JNNCE', 'New town Bhadravathi', 'JNNCE', 'Navule', 'ROUTE No. 11: New town Bhadravathi to JNNCE', 103),
('Route No. 12: Old town Bhadravathi to JNNCE', 'Old town Bhadravathi', 'JNNCE', 'Navule', 'ROUTE No. 12: Old town Bhadravathi to JNNCE', 104),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Sahyadri College', 'ROUTE No. 1 Sahyadri College to JNNCE', 105),
('Route No. 2: Marigaddige to JNNCE', 'Marigaddige', 'JNNCE', 'Marigaddige', 'ROUTE No. 2: Marigaddige to JNNCE', 106),
('Route No. 7: Girls Hostel to JNNCE', 'Girls Hostel', 'JNNCE', 'Girls Hostel', 'ROUTE No. 7: Girls Hostel to JNNCE', 107),
('Route No. 9: Sahyadri Colony to JNNCE', 'Sahyadri Colony', 'JNNCE', 'Sahyadri Colony', 'ROUTE No. 9: Sahyadri Colony to JNNCE', 108),
('Route No. 10: Karnataka Sangha to JNNCE', 'Karnataka Sangha', 'JNNCE', 'Karnataka Sangha', 'ROUTE No. 10: Karnataka Sangha to JNNCE', 109),
('Route No. 11: New town Bhadravathi to JNNCE', 'New town Bhadravathi', 'JNNCE', 'New town Bhadravathi', 'ROUTE No. 11: New town Bhadravathi to JNNCE', 110),
('Route No. 12: Old town Bhadravathi to JNNCE', 'Old town Bhadravathi', 'JNNCE', 'Old town Bhadravathi', 'ROUTE No. 12: Old town Bhadravathi to JNNCE', 111),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Parvathi Nursing Home', 'ROUTE No. 1 Sahyadri College to JNNCE', 112),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Kamala Nursing Home', 'Route No. 1: Sahyadri College to JNNCE', 113),
('Route No. 1: Sahyadri College to JNNCE', 'Sahyadri College', 'JNNCE', 'Jail CIrcle ', 'Route No. 1: Sahyadri College to JNNCE', 114);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `busschedule_ibfk_1` (`StopName`);

--
-- Indexes for table `editedbusstops`
--
ALTER TABLE `editedbusstops`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_StopName` (`StopName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `busschedule`
--
ALTER TABLE `busschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `editedbusstops`
--
ALTER TABLE `editedbusstops`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD CONSTRAINT `busschedule_ibfk_1` FOREIGN KEY (`StopName`) REFERENCES `routes` (`StopName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
