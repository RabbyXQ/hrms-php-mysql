-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2024 at 09:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `attachment_id` int(11) NOT NULL,
  `attachment_link` varchar(255) DEFAULT NULL,
  `tolet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`attachment_id`, `attachment_link`, `tolet`) VALUES
(1, 'https://example.com/image1.jpg', 1),
(2, 'https://example.com/image2.jpg', 2),
(3, 'https://example.com/image3.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `commented_by` int(11) DEFAULT NULL,
  `tolet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `commented_by`, `tolet`) VALUES
(1, 'Nice apartment!', 2, 1),
(2, 'Great location!', 3, 1),
(3, 'Good service!', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `address`, `phone`, `email`, `user_id`) VALUES
(1, 'Emergency Contact 1', '123 Emergency St', '9998887777', 'emergency1@example.com', 1),
(2, 'Emergency Contact 2', '456 Emergency Ave', '1112223333', 'emergency2@example.com', 1),
(3, 'Emergency Contact 3', '789 Emergency Blvd', '4445556666', 'emergency3@example.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_of_signing` date DEFAULT NULL,
  `start_of_contract` date DEFAULT NULL,
  `end_of_contract` date DEFAULT NULL,
  `rent_per_terms` decimal(10,2) DEFAULT NULL,
  `terms` varchar(255) DEFAULT NULL,
  `total_rent` decimal(10,2) DEFAULT NULL,
  `payment_Bank` varchar(255) DEFAULT NULL,
  `payment_mobileBank` varchar(255) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `tenant` int(11) DEFAULT NULL,
  `tolet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `status`, `date_of_signing`, `start_of_contract`, `end_of_contract`, `rent_per_terms`, `terms`, `total_rent`, `payment_Bank`, `payment_mobileBank`, `duration`, `tenant`, `tolet`) VALUES
(1, 'Active', '2023-04-05', '2023-05-01', '2024-04-30', 1200.00, '1 year lease', 14400.00, 'Bank A', 'Mobile Bank X', '12 months', 2, 1),
(2, 'Active', '2023-04-20', '2023-05-15', '2024-05-14', 800.00, '6 months lease', 4800.00, 'Bank B', 'Mobile Bank Y', '6 months', 3, 2),
(3, 'Active', '2023-05-10', '2023-06-01', '2024-05-31', 1500.00, '2 year lease', 36000.00, 'Bank C', 'Mobile Bank Z', '24 months', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `contract` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `reference_number`, `amount`, `status`, `method`, `date`, `contract`) VALUES
(1, 'REF123456', 1200.00, 'Paid', 'Credit Card', '2023-05-01', 1),
(2, 'REF789012', 800.00, 'Paid', 'PayPal', '2023-05-15', 2),
(3, 'REF345678', 1500.00, 'Pending', 'Bank Transfer', '2023-06-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Tenant'),
(3, 'Landlord');

-- --------------------------------------------------------

--
-- Table structure for table `tolet`
--

CREATE TABLE `tolet` (
  `tolet_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `compartment` varchar(255) DEFAULT NULL,
  `rent_per_month` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_of_registration` date DEFAULT NULL,
  `water_units` int(11) DEFAULT NULL,
  `status_toiletDoorLock` varchar(50) DEFAULT NULL,
  `status_DoorLock` varchar(50) DEFAULT NULL,
  `status_washinkSink` varchar(50) DEFAULT NULL,
  `status_toiletSink` varchar(50) DEFAULT NULL,
  `status_windows` varchar(50) DEFAULT NULL,
  `status_paint` varchar(50) DEFAULT NULL,
  `status_electricity` varchar(50) DEFAULT NULL,
  `status_number_of_Bulbs` int(11) DEFAULT NULL,
  `status_keyHolder` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tolet`
--

INSERT INTO `tolet` (`tolet_id`, `location`, `address`, `city`, `compartment`, `rent_per_month`, `status`, `date_of_registration`, `water_units`, `status_toiletDoorLock`, `status_DoorLock`, `status_washinkSink`, `status_toiletSink`, `status_windows`, `status_paint`, `status_electricity`, `status_number_of_Bulbs`, `status_keyHolder`, `created_by`) VALUES
(1, '0.32x, 0.79y', 'Somewhere', 'Khulna', 'Apartment', 1200.00, 'Available', '2023-04-01', 2, 'Functional', 'Functional', 'Functional', 'Functional', 'Functional', 'Good', 'Functional', 5, 'John', 1),
(2, '', '', '', 'Studio', 800.00, 'Occupied', '2023-04-15', 1, 'Functional', 'Functional', 'Functional', 'Functional', 'Functional', 'Good', 'Functional', 3, 'Alice', 2),
(3, '', '', '', 'House', 1500.00, 'Available', '2023-05-01', 3, 'Functional', 'Functional', 'Functional', 'Functional', 'Functional', 'Good', 'Functional', 7, 'Bob', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number1` varchar(20) DEFAULT NULL,
  `phone_number2` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `date_of_registration` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `location_co_ordinate` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `profile_photo`, `email`, `phone_number1`, `phone_number2`, `date_of_birth`, `password`, `nid`, `date_of_registration`, `address`, `city`, `region`, `location_co_ordinate`, `occupation`, `role`) VALUES
(1, 'John', 'Doe', NULL, 'john@example.com', '1234567890', NULL, '1990-05-15', 'password123', '123456789012', '2023-01-05', '123 Main St', 'Anytown', 'Anyregion', NULL, 'Software Engineer', 1),
(2, 'Alice', 'Smith', NULL, 'alice@example.com', '9876543210', NULL, '1992-08-20', 'password456', '987654321098', '2023-02-10', '456 Oak St', 'Sometown', 'Someregion', NULL, 'Teacher', 2),
(3, 'Bob', 'Johnson', NULL, 'bob@example.com', '5551112222', NULL, '1985-03-10', 'password789', '555555555555', '2023-03-20', '789 Elm St', 'Othertown', 'Otherregion', NULL, 'Entrepreneur', 3),
(4, 'Fozle', 'Rabby', NULL, 'rabbyxq@gmail.com', NULL, NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, NULL, NULL, NULL, 'rabbyxq@hotmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(17, NULL, NULL, NULL, 'rabbyxq@gsamail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(44, NULL, NULL, NULL, 'srabbyssssxwq@gwsawssmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(46, NULL, NULL, NULL, 'srabbysssssxwq@gwsawssmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(48, NULL, NULL, NULL, 'rabby123@gmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(49, NULL, NULL, NULL, 'srabbyssssssxswq@gwsawssmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(53, NULL, NULL, NULL, 'rabbyxq2@gmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(55, NULL, NULL, NULL, 'rabbyxq22@gmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(63, NULL, NULL, NULL, 'rabbyxq2222@gmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(64, NULL, NULL, NULL, 'afda@gmail.com', NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `tolet` (`tolet`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commented_by` (`commented_by`),
  ADD KEY `tolet` (`tolet`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `tenant` (`tenant`),
  ADD KEY `tolet` (`tolet`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `contract` (`contract`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tolet`
--
ALTER TABLE `tolet`
  ADD PRIMARY KEY (`tolet_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tolet`
--
ALTER TABLE `tolet`
  MODIFY `tolet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`tolet`) REFERENCES `tolet` (`tolet_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`commented_by`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`tolet`) REFERENCES `tolet` (`tolet_id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`tenant`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`tolet`) REFERENCES `tolet` (`tolet_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`contract`) REFERENCES `contract` (`contract_id`);

--
-- Constraints for table `tolet`
--
ALTER TABLE `tolet`
  ADD CONSTRAINT `tolet_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
