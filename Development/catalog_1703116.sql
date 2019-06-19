-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 07:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_yorbax`
--

-- --------------------------------------------------------

--
-- Table structure for table `ceo`
--

CREATE TABLE `ceo` (
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `age` int(22) NOT NULL,
  `sex` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `salary` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ceo`
--

INSERT INTO `ceo` (`fname`, `lname`, `age`, `sex`, `email`, `salary`) VALUES
('Charles', 'Phillips', 42, 'Male', 'Phillips.Charles@gmail.com', 380000);

-- --------------------------------------------------------

--
-- Table structure for table `company_detail`
--

CREATE TABLE `company_detail` (
  `name` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `website` varchar(32) NOT NULL,
  `establishDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_detail`
--

INSERT INTO `company_detail` (`name`, `address`, `contact`, `website`, `establishDate`) VALUES
('Yorbax', 'Kamalpokhari', '01415265', 'www.Yorbax.com.np', '2018-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(22) NOT NULL,
  `name` varchar(32) NOT NULL,
  `floor` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `name`, `floor`) VALUES
(1, 'Research and Development', 3),
(2, 'Marketing', 2),
(3, 'Human Resource Department', 4),
(4, 'Mobile Department', 5),
(5, 'Web Department', 7);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(22) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `age` int(22) NOT NULL,
  `sex` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `salary` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `fname`, `lname`, `age`, `sex`, `email`, `salary`) VALUES
(1, 'sonal', 'bhattarai', 22, 'Female', 'sonalbhattarai@gmail.com', 95000),
(2, 'Diwash', 'Upreti', 24, 'Male', 'diwashupreti@gmail.com', 88000),
(3, 'Lovice ', 'Sunuwar', 26, 'Male', 'oktwenty@gmail.com', 81000),
(4, 'Christina', 'Shrestha', 22, 'Female', 'christistha@gmail.com', 74000),
(5, 'Rohan', 'Maharjan', 24, 'Male', 'masterofhell@gmail.com', 85000),
(6, 'Eurashika', 'Maharjan', 23, 'F', 'eureymhjr@gmail.com', 76000),
(7, 'Preaska', 'Sharma', 22, 'Female', 'preaskasharma@gmail.com', 68000),
(8, 'Slok', 'Shrestha', 25, 'Male', 'slokshrestha@gmail.com', 69000),
(9, 'Prestige ', 'Acharya', 27, 'Male', 'prestigeacharya@gmail.com', 64000),
(10, 'eroj', 'manandar', 26, 'Male', 'erojjmanandar@gmail.com', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE `leader` (
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `age` int(22) NOT NULL,
  `sex` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `salary` int(22) NOT NULL,
  `team_member` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leader`
--

INSERT INTO `leader` (`fname`, `lname`, `age`, `sex`, `email`, `salary`, `team_member`) VALUES
('Rajiv', 'Luitel', 21, 'Male', 'razivluitel@gmail.com', 150000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ID` int(22) NOT NULL,
  `name` varchar(52) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ID`, `name`, `startDate`, `endDate`, `status`) VALUES
(1, 'GPS System', '2019-01-01', '2019-05-06', 'Completed'),
(2, 'Detecting malicious websites url', '2019-04-09', '2019-10-07', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `project_manager`
--

CREATE TABLE `project_manager` (
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `age` int(22) NOT NULL,
  `sex` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `salary` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_manager`
--

INSERT INTO `project_manager` (`fname`, `lname`, `age`, `sex`, `email`, `salary`) VALUES
('Ellen', 'Hills', 38, 'Female', 'ellenhills@gmail.com', 220000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
