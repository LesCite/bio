-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 05:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `character_reference_tbl`
--

CREATE TABLE `character_reference_tbl` (
  `character_reference_id` int(11) NOT NULL,
  `personal_data_id` int(11) NOT NULL,
  `c_name_1` varchar(255) NOT NULL,
  `c_company_1` varchar(255) NOT NULL,
  `c_position_1` varchar(255) NOT NULL,
  `c_contact_no_1` varchar(255) NOT NULL,
  `c_name_2` varchar(255) NOT NULL,
  `c_company_2` varchar(255) NOT NULL,
  `c_position_2` varchar(255) NOT NULL,
  `c_contact_no_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educational_background_tbl`
--

CREATE TABLE `educational_background_tbl` (
  `educational_background_id` int(11) NOT NULL,
  `personal_data_id` int(11) NOT NULL,
  `elementary` varchar(255) NOT NULL,
  `elementary_year_graduate` varchar(255) NOT NULL,
  `high_school` varchar(255) NOT NULL,
  `high_school_year_graduate` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `college_year_graduate` varchar(255) NOT NULL,
  `degree_received` varchar(255) NOT NULL,
  `special_skills` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employment_record_tbl`
--

CREATE TABLE `employment_record_tbl` (
  `employment_record_id` int(11) NOT NULL,
  `personal_data_id` int(11) NOT NULL,
  `company_name_1` varchar(255) NOT NULL,
  `position_1` varchar(255) NOT NULL,
  `from_1` varchar(255) NOT NULL,
  `to_1` varchar(255) NOT NULL,
  `company_name_2` varchar(255) NOT NULL,
  `position_2` varchar(255) NOT NULL,
  `from_2` varchar(255) NOT NULL,
  `to_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_data_tbl`
--

CREATE TABLE `personal_data_tbl` (
  `personal_data_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desired_position` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `spouse` varchar(255) NOT NULL,
  `children` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `person_emergency` varchar(255) NOT NULL,
  `person_emergency_details` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(255) NOT NULL,
  `cellphone` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `spouse_occupation` varchar(255) NOT NULL,
  `children_date_of_birth` varchar(255) NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `mother_occupation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `character_reference_tbl`
--
ALTER TABLE `character_reference_tbl`
  ADD PRIMARY KEY (`character_reference_id`);

--
-- Indexes for table `educational_background_tbl`
--
ALTER TABLE `educational_background_tbl`
  ADD PRIMARY KEY (`educational_background_id`);

--
-- Indexes for table `employment_record_tbl`
--
ALTER TABLE `employment_record_tbl`
  ADD PRIMARY KEY (`employment_record_id`);

--
-- Indexes for table `personal_data_tbl`
--
ALTER TABLE `personal_data_tbl`
  ADD PRIMARY KEY (`personal_data_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `character_reference_tbl`
--
ALTER TABLE `character_reference_tbl`
  MODIFY `character_reference_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educational_background_tbl`
--
ALTER TABLE `educational_background_tbl`
  MODIFY `educational_background_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_record_tbl`
--
ALTER TABLE `employment_record_tbl`
  MODIFY `employment_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_data_tbl`
--
ALTER TABLE `personal_data_tbl`
  MODIFY `personal_data_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
