-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 02:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchill_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `idno` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `middlename`, `lastname`, `phone`, `idno`, `username`, `password`) VALUES
('AD0011', 'admin', 'k', 'admin', '07215487552', '', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
('AD1', 'Festus', 'K', 'Mutiso', '0721548788', '31578995', 'fatefestus@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `event_venue` varchar(100) NOT NULL,
  `atendees` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `vip_tickets` int(11) DEFAULT NULL,
  `reg_tickets` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `event_venue`, `atendees`, `date`, `vip_tickets`, `reg_tickets`) VALUES
('1', 'CARNIVORE SHOW', 'Thursday night show. At carnivore grounds. Lets do it.', 'CARNIVORE', 1000, '2021-12-09', 100, 900),
('2', 'KICC SHOW', 'KICC SHOW: Nairobi CBD to celebrate the end of curfew. come all let us lough togather', 'KICC', 1500, '2021-12-02', 200, 1300),
('EV000004', 'CANIVORE SHOW EDITION 2', 'aegsd', 'CANIVORE GROUNDS', 1500, '2021-12-11', 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `event_trans`
--

CREATE TABLE `event_trans` (
  `id` varchar(30) NOT NULL,
  `event` varchar(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ticket_type` varchar(20) DEFAULT NULL,
  `ticket_no` varchar(20) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_trans`
--

INSERT INTO `event_trans` (`id`, `event`, `firstname`, `middlename`, `lastname`, `phone`, `email`, `ticket_type`, `ticket_no`, `amount`) VALUES
('1', 'EV000004', 'marion', 'l', 'syokau', '07215487', 'marion@gmail.com', '5', '5', 5000),
('2', 'EV000004', 'marion', 'l', 'syokau', '07215487', 'marion@gmail.com', '5', '5', 5000),
('3', '1', 'Festus', 'k', 'Mutiso', '0721548788', 'fate02festus@gmail.com', '2', '2', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `sys_master`
--

CREATE TABLE `sys_master` (
  `id` int(11) NOT NULL,
  `item` varchar(20) NOT NULL,
  `length` int(11) NOT NULL,
  `last_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_master`
--

INSERT INTO `sys_master` (`id`, `item`, `length`, `last_no`) VALUES
(1, 'admin', 4, 2),
(2, 'event', 6, 3),
(3, 'tickets', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_trans`
--

CREATE TABLE `ticket_trans` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `capacity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `event` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_trans`
--

INSERT INTO `ticket_trans` (`id`, `name`, `capacity`, `amount`, `event`) VALUES
(1, 'REGULAR', 1300, 1000, '1'),
(2, 'VIP', 198, 5000, '1'),
(3, 'REGULAR', 800, 1000, '2'),
(4, 'VIP', 200, 2500, '2'),
(5, 'REGULAR', 990, 1000, 'EV000004'),
(6, 'VIP', 500, 2500, 'EV000004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_trans`
--
ALTER TABLE `event_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_master`
--
ALTER TABLE `sys_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_trans`
--
ALTER TABLE `ticket_trans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sys_master`
--
ALTER TABLE `sys_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_trans`
--
ALTER TABLE `ticket_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
