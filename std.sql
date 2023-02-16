-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2017 at 11:34 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student`
--
CREATE DATABASE `student` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `student`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `C_no` char(5) NOT NULL DEFAULT '0',
  `C_name` char(10) NOT NULL,
  `Credits` int(2) NOT NULL,
  `L_no` int(2) NOT NULL,
  PRIMARY KEY (`C_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`C_no`, `C_name`, `Credits`, `L_no`) VALUES
('CS115', 'C', 4, 55),
('CS200', 'des', 1, 0),
('CS209', 'mmmm', 1, 78),
('CS215', 'C++', 4, 1),
('CS315', 'NET', 4, 1),
('CS319', 'Anlsisy', 4, 2),
('CS331', 'data', 4, 454),
('CS332', 'Data 2', 4, 60);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `U_no` int(11) DEFAULT NULL,
  `I_no` int(9) NOT NULL,
  `Address` char(10) NOT NULL,
  `Email` char(20) NOT NULL,
  `Gender` char(6) NOT NULL,
  `Img_path` blob NOT NULL,
  `Year` int(4) NOT NULL,
  PRIMARY KEY (`I_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`U_no`, `I_no`, `Address`, `Email`, `Gender`, `Img_path`, `Year`) VALUES
(29, 56457654, 'yrtyghf', 'gfhjfk', 'male', '', 2007),
(27, 210777777, 'Tunis', 'Ahmed_S@yahoo.com', 'male', '', 2013),
(26, 213010575, 'Tripole', 'Mohamed_Ali@yahoo.', 'male', '', 2013),
(42, 214030454, 'Tripole', 'Mohamed@yahoo.com', 'male', '', 2010),
(28, 453454353, 'Tripole', 'fdgsdfg@yahop', 'male', '', 2001);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `I_no` int(9) NOT NULL,
  `C_no` char(5) NOT NULL,
  `Grade` int(2) NOT NULL,
  `L_no` int(10) NOT NULL,
  `S_no` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`I_no`, `C_no`, `Grade`, `L_no`, `S_no`) VALUES
(213010575, 'CS115', 90, 55, 1),
(213010575, 'CS211', 45, 29, 1),
(213010575, 'CS319', 45, 2, 1),
(213010575, 'CS215', 45, 1, 2),
(213010575, 'CS331', 80, 30, 2),
(213010575, 'CS315', 45, 1, 2),
(213010575, 'CS331', 66, 30, 3),
(213010575, 'CS332', 0, 60, 3),
(213010575, 'CS200', 45, 55, 1),
(210777777, 'CS331', 80, 29, 3),
(210777777, 'CS332', 0, 29, 3),
(210777777, 'CS315', 70, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `S_no` int(20) NOT NULL AUTO_INCREMENT,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Sem` char(6) NOT NULL,
  PRIMARY KEY (`S_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`S_no`, `Start_date`, `End_date`, `Sem`) VALUES
(1, '2013-03-01', '2013-06-10', 'Spring'),
(2, '2013-09-01', '2014-01-15', 'Autumn'),
(3, '2014-03-01', '2014-06-15', 'Spring');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `U_no` int(11) NOT NULL AUTO_INCREMENT,
  `U_name` char(10) NOT NULL,
  `Password` char(20) NOT NULL,
  `Priv` char(1) NOT NULL,
  `Name` char(20) NOT NULL,
  `Nationality` char(10) NOT NULL,
  `Flag` int(1) NOT NULL,
  PRIMARY KEY (`U_no`),
  UNIQUE KEY `U_no` (`U_no`),
  UNIQUE KEY `U_no_4` (`U_no`),
  KEY `U_no_2` (`U_no`),
  KEY `U_no_3` (`U_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_no`, `U_name`, `Password`, `Priv`, `Name`, `Nationality`, `Flag`) VALUES
(1, 'Hamza_H', '55555', 'A', 'Hamza Hamruni', 'Libya', 0),
(2, 'abdo_mazen', '666666', 'A', 'abdullah', 'Libya', 0),
(26, 'Mohmed_Ali', 'M0000000', 'S', 'Mohamed Ali', 'Libya', 1),
(27, 'Ahmed_Se', 'A123456789', 'S', 'Ahmed Saed', 'Tunis', 1),
(28, 'mjsdd_ddsa', 'sa32442342', 'S', 'mooocgfdg', 'Libya', 1),
(29, 'Ali_Mo', 'm4556346', 'L', 'Ali Mohamed', 'Libya', 1),
(30, 'Osama_M', 'o4534634', 'L', 'Osama Mohamed', 'Libya', 1);
