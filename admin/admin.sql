-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 06:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watersystem`
--

-- --------------------------------------------------------

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `kiosk` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `open_hrs` varchar(255) NOT NULL,
  `close_hrs` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `till_no` int(11) NOT NULL,
  `trn_code` varchar(50) NOT NULL,
  `ref_no` varchar(50) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date_paid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `kiosk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `staff` (`id`, `id_no`, `name`, `phone_no`) VALUES
(1, '35574881', 'James Wesonga', '+25471234567'),
(2, '35672001', 'June Bright', '+25471114567');


INSERT INTO `kiosk` (`id`, `name`, `number`, `location`, `open_hrs`, `close_hrs`, `status`) VALUES
(1, 'Kisumu', '6581', '40201', '08:00', '20:00', 'Operational');

INSERT INTO `payment` (`id`, `number`, `till_no`, `trn_code`, `ref_no`, `amount`, `date_paid`) VALUES
(1, '7652', '936709', 'Q32WPMXNR6', '0357', '50000', '2020-06-26');

INSERT INTO `expenses` (`id`, `code`, `date`, `type`, `amount`, `kiosk_id`) VALUES
(1, 'NDVH', '2020-08-26', 'Repair Expense', '25000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `kiosk`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

  -- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `kiosk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;