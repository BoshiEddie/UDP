-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 04:19 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hercules`
--

-- --------------------------------------------------------

--
-- Table structure for table `body_part`
--

CREATE TABLE `body_part` (
  `body_part_id` int(50) NOT NULL,
  `body_part_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `body_part`
--

INSERT INTO `body_part` (`body_part_id`, `body_part_name`) VALUES
(1, 'chest'),
(2, 'back'),
(5, 'legs'),
(6, 'shoulder'),
(7, 'arms');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `D.O.B` varchar(12) NOT NULL,
  `medical_issues` text NOT NULL,
  `current_weight` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `firstname`, `lastname`, `address`, `phone_number`, `D.O.B`, `medical_issues`, `current_weight`, `height`, `password`, `email`) VALUES
(1, 'Jay', 'Brady', 'Dundalk', '0870000000', '01/01/1970', 'Back injury', '85kg', '6\'3\"', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', ''),
(2, 'Bob', 'Smith', 'Dublin', '830000000', '01/01/1980', '', '89', '1.50', 'hello', ''),
(3, 'Tom', 'Stall', 'Cork', '0872222222', '03-03-1982', 'NA', '80kg', '5 6', '3Passwor', '');

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `instructor_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`instructor_id`, `client_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_action`
--

CREATE TABLE `exercise_action` (
  `action_id` int(11) NOT NULL,
  `exercise_name` varchar(100) NOT NULL,
  `body_part_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercise_action`
--

INSERT INTO `exercise_action` (`action_id`, `exercise_name`, `body_part_id`) VALUES
(1, 'bench press', 1),
(2, 'dumbbells press', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_connection`
--

CREATE TABLE `exercise_connection` (
  `id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `sheet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercise_connection`
--

INSERT INTO `exercise_connection` (`id`, `action_id`, `sheet_id`) VALUES
(1, 2, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_sheet`
--

CREATE TABLE `exercise_sheet` (
  `sheet_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `sheet_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise_sheet`
--

INSERT INTO `exercise_sheet` (`sheet_id`, `client_id`, `instructor_id`, `sheet_name`) VALUES
(1, 1, 1, 'Chest Practice'),
(3, 1, 1, 'Back Practice');

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `gym_id` int(10) NOT NULL,
  `gym_name` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`gym_id`, `gym_name`, `address`) VALUES
(1, 'Apex Fitness', 'Dundalk');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(10) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `D.O.B` varchar(12) NOT NULL,
  `password` varchar(8) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `firstname`, `lastname`, `address`, `phone_number`, `D.O.B`, `password`, `gym_id`, `email`) VALUES
(1, 'Ken', 'Coleman', 'Dundalk', '086 0000000', '01/01/1971', '1Passwor', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `result_details`
--

CREATE TABLE `result_details` (
  `result_id` int(11) NOT NULL,
  `sheet_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `set_details`
--

CREATE TABLE `set_details` (
  `set_id` int(11) NOT NULL,
  `connection_id` int(11) NOT NULL,
  `repo` int(11) NOT NULL,
  `weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `set_details`
--

INSERT INTO `set_details` (`set_id`, `connection_id`, `repo`, `weight`) VALUES
(1, 1, 4, 70),
(2, 1, 7, 65),
(3, 1, 9, 60),
(4, 1, 9, 55),
(5, 2, 4, 70),
(6, 2, 7, 65),
(7, 2, 9, 60),
(8, 2, 11, 55);

-- --------------------------------------------------------

--
-- Table structure for table `weight_details`
--

CREATE TABLE `weight_details` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `body_part`
--
ALTER TABLE `body_part`
  ADD PRIMARY KEY (`body_part_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`instructor_id`,`client_id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `exercise_action`
--
ALTER TABLE `exercise_action`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `body_part_id` (`body_part_id`);

--
-- Indexes for table `exercise_connection`
--
ALTER TABLE `exercise_connection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `sheet_id` (`sheet_id`);

--
-- Indexes for table `exercise_sheet`
--
ALTER TABLE `exercise_sheet`
  ADD PRIMARY KEY (`sheet_id`),
  ADD KEY `client_id` (`client_id`) USING BTREE,
  ADD KEY `instructor_id` (`instructor_id`) USING BTREE;

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`gym_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `gym_id` (`gym_id`);

--
-- Indexes for table `result_details`
--
ALTER TABLE `result_details`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `sheet_id` (`sheet_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `set_id` (`set_id`);

--
-- Indexes for table `set_details`
--
ALTER TABLE `set_details`
  ADD PRIMARY KEY (`set_id`),
  ADD KEY `sheet_id` (`connection_id`);

--
-- Indexes for table `weight_details`
--
ALTER TABLE `weight_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `body_part`
--
ALTER TABLE `body_part`
  MODIFY `body_part_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exercise_action`
--
ALTER TABLE `exercise_action`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercise_connection`
--
ALTER TABLE `exercise_connection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercise_sheet`
--
ALTER TABLE `exercise_sheet`
  MODIFY `sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `gym_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result_details`
--
ALTER TABLE `result_details`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_details`
--
ALTER TABLE `set_details`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weight_details`
--
ALTER TABLE `weight_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_list`
--
ALTER TABLE `client_list`
  ADD CONSTRAINT `client_list_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `client_list_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);

--
-- Constraints for table `exercise_action`
--
ALTER TABLE `exercise_action`
  ADD CONSTRAINT `exercise_action_ibfk_1` FOREIGN KEY (`body_part_id`) REFERENCES `body_part` (`body_part_id`);

--
-- Constraints for table `exercise_connection`
--
ALTER TABLE `exercise_connection`
  ADD CONSTRAINT `exercise_connection_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `exercise_action` (`action_id`),
  ADD CONSTRAINT `exercise_connection_ibfk_2` FOREIGN KEY (`sheet_id`) REFERENCES `exercise_sheet` (`sheet_id`);

--
-- Constraints for table `exercise_sheet`
--
ALTER TABLE `exercise_sheet`
  ADD CONSTRAINT `exercise_sheet_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `exercise_sheet_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`);

--
-- Constraints for table `result_details`
--
ALTER TABLE `result_details`
  ADD CONSTRAINT `result_details_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `result_details_ibfk_2` FOREIGN KEY (`set_id`) REFERENCES `set_details` (`set_id`),
  ADD CONSTRAINT `result_details_ibfk_3` FOREIGN KEY (`sheet_id`) REFERENCES `exercise_sheet` (`sheet_id`);

--
-- Constraints for table `set_details`
--
ALTER TABLE `set_details`
  ADD CONSTRAINT `set_details_ibfk_1` FOREIGN KEY (`connection_id`) REFERENCES `exercise_connection` (`id`);

--
-- Constraints for table `weight_details`
--
ALTER TABLE `weight_details`
  ADD CONSTRAINT `weight_details_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
