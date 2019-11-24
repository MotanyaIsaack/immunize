-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 04:12 PM
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
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_child`
--

CREATE TABLE `tbl_child` (
  `child_id` int(255) NOT NULL,
  `child_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood-group` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_child`
--

INSERT INTO `tbl_child` (`child_id`, `child_name`, `dob`, `gender`, `blood-group`, `user_id`) VALUES
(6, 'Kioko Fredah Ndila', '1998-09-09', 'Female', 'A+', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosage`
--

CREATE TABLE `tbl_dosage` (
  `dose_id` int(255) NOT NULL,
  `dose_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosage`
--

INSERT INTO `tbl_dosage` (`dose_id`, `dose_name`) VALUES
(1, 'birth'),
(2, '1st dose'),
(3, '2nd dose'),
(4, '3rd dose');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fatherbiodata`
--

CREATE TABLE `tbl_fatherbiodata` (
  `father_id` int(255) NOT NULL,
  `bloodgroup` varchar(255) DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fatherbiodata`
--

INSERT INTO `tbl_fatherbiodata` (`father_id`, `bloodgroup`, `user_id`) VALUES
(2, 'A+', 15),
(3, 'O', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guardianbiodata`
--

CREATE TABLE `tbl_guardianbiodata` (
  `guardian_id` int(255) NOT NULL,
  `bloodgroup` varchar(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_immunize`
--

CREATE TABLE `tbl_immunize` (
  `dose_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `administered` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_motherbiodata`
--

CREATE TABLE `tbl_motherbiodata` (
  `mother_id` int(255) NOT NULL,
  `bloodgroup` varchar(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_period`
--

CREATE TABLE `tbl_period` (
  `period_id` int(255) NOT NULL,
  `period_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_period`
--

INSERT INTO `tbl_period` (`period_id`, `period_name`) VALUES
(1, 'birth'),
(2, '6 weeks'),
(3, '10 weeks'),
(4, '14 weeks'),
(5, '24 weeks'),
(6, '36 weeks');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(255) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'Father'),
(2, 'Mother'),
(3, 'Guardian'),
(4, 'Nurse'),
(5, 'Supernurse');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `bloodgroup` varchar(255) DEFAULT NULL,
  `role_id` int(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `username`, `email`, `password`, `phonenumber`, `bloodgroup`, `role_id`, `status`) VALUES
(15, 'Isaack Motanya', 'Motanya', 'isaack.motanya@strathmore.edu', '$2y$10$x86UzsmQ38ckjoUhbmult.mlkFApv/d299gGKIUx2DjpXGwPb0LQ2', '0792651712', 'A+', 1, 0),
(16, 'Fredah Kioko', 'Admin', 'admin@gmail.com', '$2y$10$31uuhSydBhO5sVhYt2ldxeOaew4MC/qM344zx15U5bGMEW6P7kquy', '0792651712', 'O', 5, 0),
(20, 'Johny Test', 'JTest', 'jtest@gmail.com', '$2y$10$DlnwXkWNGDHR.M/UAoK92uJuKD0KdX.R8Ekp4BaIehLroH3yznCFC', '0792651712', 'O+', 4, 0),
(22, 'Mark Nyandiba', 'Mark', 'motanyageek@gmail.com', '$2y$10$GCn3It8GuzLLb.a9/sA8Q.U1gC6qPI/up2icTxckdoLp4cSRu.pM.', '0792651712', 'O+', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine`
--

CREATE TABLE `tbl_vaccine` (
  `vaccine_id` int(255) NOT NULL,
  `vaccine_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vaccine`
--

INSERT INTO `tbl_vaccine` (`vaccine_id`, `vaccine_name`) VALUES
(1, 'BCG'),
(2, 'OPV'),
(3, 'DPT'),
(4, 'POLIO'),
(5, 'HeB'),
(6, 'Hib'),
(7, 'Measles'),
(8, 'Yellow Fever');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_child`
--
ALTER TABLE `tbl_child`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_dosage`
--
ALTER TABLE `tbl_dosage`
  ADD PRIMARY KEY (`dose_id`);

--
-- Indexes for table `tbl_fatherbiodata`
--
ALTER TABLE `tbl_fatherbiodata`
  ADD PRIMARY KEY (`father_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_guardianbiodata`
--
ALTER TABLE `tbl_guardianbiodata`
  ADD PRIMARY KEY (`guardian_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_immunize`
--
ALTER TABLE `tbl_immunize`
  ADD KEY `period_id` (`period_id`),
  ADD KEY `dose_id` (`dose_id`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `tbl_motherbiodata`
--
ALTER TABLE `tbl_motherbiodata`
  ADD PRIMARY KEY (`mother_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_period`
--
ALTER TABLE `tbl_period`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_child`
--
ALTER TABLE `tbl_child`
  MODIFY `child_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_dosage`
--
ALTER TABLE `tbl_dosage`
  MODIFY `dose_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_fatherbiodata`
--
ALTER TABLE `tbl_fatherbiodata`
  MODIFY `father_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_guardianbiodata`
--
ALTER TABLE `tbl_guardianbiodata`
  MODIFY `guardian_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_motherbiodata`
--
ALTER TABLE `tbl_motherbiodata`
  MODIFY `mother_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_period`
--
ALTER TABLE `tbl_period`
  MODIFY `period_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  MODIFY `vaccine_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_child`
--
ALTER TABLE `tbl_child`
  ADD CONSTRAINT `tbl_child_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_fatherbiodata`
--
ALTER TABLE `tbl_fatherbiodata`
  ADD CONSTRAINT `tbl_fatherbiodata_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_guardianbiodata`
--
ALTER TABLE `tbl_guardianbiodata`
  ADD CONSTRAINT `tbl_guardianbiodata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tbl_immunize`
--
ALTER TABLE `tbl_immunize`
  ADD CONSTRAINT `tbl_immunize_ibfk_1` FOREIGN KEY (`period_id`) REFERENCES `tbl_period` (`period_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_immunize_ibfk_2` FOREIGN KEY (`dose_id`) REFERENCES `tbl_dosage` (`dose_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_immunize_ibfk_3` FOREIGN KEY (`vaccine_id`) REFERENCES `tbl_vaccine` (`vaccine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_motherbiodata`
--
ALTER TABLE `tbl_motherbiodata`
  ADD CONSTRAINT `tbl_motherbiodata_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
