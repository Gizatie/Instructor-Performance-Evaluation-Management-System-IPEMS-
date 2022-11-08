-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2021 at 06:04 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `department_idi` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `department_id`, `first_name`, `last_name`, `user`, `pass`) VALUES
(2, 1, 'Getasew', 'Nibretu', 'getasew@gmail.com', '1234'),
(3, 4, 'Juhar ', 'Mehamed', 'juhar@gmail.com', '1234'),
(8, 2, 'Senbeto', 'Kaymo', 'Senbeto@gmailcom', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `message`, `Date`) VALUES
(5, 'dfd', 'sanjeevtech2@gmail.com', 9015501897, 'ddd', '2016-06-29 17:53:28'),
(6, 'dfd', 'sanjeevtech2@gmail.com', 9015501897, 'ddd', '2016-06-29 17:53:43'),
(7, '', '', 0, '', '2020-04-29 17:14:10'),
(8, '', '', 0, '', '2020-04-29 20:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_name` varchar(55) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `department_id` (`department_id`),
  KEY `batch_id` (`batch_id`,`teacher_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `batch_id`, `teacher_id`, `department_id`, `course_name`) VALUES
(6, 1, 14, 1, 'Programming in Java'),
(7, 2, 15, 1, 'Compilerr'),
(8, 1, 16, 1, 'data structure'),
(9, 1, 17, 2, 'VLSI'),
(10, 1, 18, 2, 'Matlab'),
(11, 1, 19, 1, 'Aritificial Intelligence'),
(12, 2, 14, 1, 'Distributed System');

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE IF NOT EXISTS `dean` (
  `dean_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dean_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`dean_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`dean_id`, `first_name`, `last_name`, `dean_name`, `password`) VALUES
(1, 'Abeje', 'Demissie', 'abeje@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Computer Science'),
(2, 'Information Technology'),
(3, 'Civil Engineering'),
(4, 'Electrical Computer Engineering'),
(5, 'Midwifery'),
(6, 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `user_alias` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(75) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `department_id`, `user_alias`, `Name`, `designation`, `semester`, `email`, `password`, `date`, `status`) VALUES
(14, 1, 'Fise', 'Fiseha', 'Instructor', 'i', 'fiseha@gmail.com', 'f14e45', '2020-04-27 03:44:32', 0),
(15, 1, 'Giza', 'Gizatie', 'Instructor', 'i', 'gizatie@gmail.com', '647966', '2020-04-27 05:36:54', 0),
(16, 1, 'Adan', 'Adane', 'Lec.', 'i', 'adane@gmail.com', '35b90b', '2020-04-27 14:08:31', 0),
(17, 2, 'Mulu', 'Mulu', 'Lect.', 'i', 'mulu@gmail.com', '2cc227', '2020-04-27 14:31:12', 0),
(18, 2, 'Yoha', 'Yohannes', 'Lect.', 'i', 'johnn@gmail.com', '', '2020-04-27 16:10:52', 0),
(19, 1, 'Mele', 'Melese', 'Lect', 'i', 'melese@gmail.com', '033ab3', '2020-04-28 05:04:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `Q1` enum('5','4','3','2','1') NOT NULL,
  `Q2` enum('5','4','3','2','1') NOT NULL,
  `Q3` enum('5','4','3','2','1') NOT NULL,
  `Q4` enum('5','4','3','2','1') NOT NULL,
  `Q5` enum('5','4','3','2','1') NOT NULL,
  `Q6` enum('5','4','3','2','1') NOT NULL,
  `Q7` enum('5','4','3','2','1') NOT NULL,
  `Q8` enum('5','4','3','2','1') NOT NULL,
  `Q9` enum('5','4','3','2','1') NOT NULL,
  `Q10` enum('5','4','3','2','1') NOT NULL,
  `Q11` enum('5','4','3','2','1') NOT NULL,
  `Q12` enum('5','4','3','2','1') NOT NULL,
  `Q13` text NOT NULL,
  `Q14` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_id`, `batch`, `department_id`, `faculty_id`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `Q13`, `Q14`, `date`) VALUES
(23, 'temari@gmail.com', '1', '1', '16', '4', '3', '3', '4', '3', '4', '4', '4', '5', '3', '3', '3', 'h\r\n                ', '\r\n                yu', '2020-04-27'),
(24, 'Elias@gmail.com', '1', '2', '17', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'good teacher\r\n                ', 'sometimes class missed.\r\n                ', '2020-04-27'),
(25, 'test@gmail.com', '2', '1', '15', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'dd\r\n                ', '\r\n                xx', '2020-04-28'),
(26, 'temari@gmail.com', '1', '1', '14', '5', '4', '4', '4', '5', '5', '5', '4', '5', '5', '5', '4', '\r\n                ff', '\r\n               dd ', '2020-04-28'),
(28, 'abebe@gmail.com', '1', '1', '16', '4', '5', '4', '4', '3', '4', '4', '5', '4', '4', '4', '5', 'sds\r\n                ', 'dsfs\r\n                ', '2020-04-28'),
(29, 'temari@gmail.com', '1', '1', '19', '5', '5', '5', '4', '4', '5', '5', '4', '4', '5', '4', '5', '\r\n                kk', '\r\n                kk', '2020-04-28'),
(30, 'test@gmail.com', '2', '1', '14', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'f\r\n                ', 'd\r\n        ', '2020-04-28'),
(31, 'abebe@gmail.com', '1', '1', '14', '4', '5', '4', '4', '5', '5', '4', '4', '2', '4', '5', '4', 'I like how the content was organized.\r\n                ', 'Sometimes class finishes off time and starts too late.\r\n                ', '2020-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`notice_id`, `attachment`, `subject`, `Description`, `Date`) VALUES
(8, 'AteekCV_java (1).docx', 'aaaaa', 'dfdfdfd', '2016-07-03 12:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `Batch` varchar(50) NOT NULL,
  `Section` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `image` varchar(50) NOT NULL,
  `regid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `department_id`, `name`, `email`, `pass`, `Batch`, `Section`, `semester`, `gender`, `image`, `regid`) VALUES
(23, 1, 'Temari', 'temari@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', 1, 'i', 'm', 'vlcsnap-2020-04-02-03h31m58s826.png', '2020-04-27 04:23:54'),
(24, 1, 'Test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '2', 1, 'i', 'm', 'vlcsnap-2020-04-02-03h31m58s826.png', '2020-04-27 05:31:14'),
(25, 2, 'Elias', 'Elias@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', 1, 'i', 'm', 'vlcsnap-2020-04-02-03h31m58s826.png', '2020-04-27 21:13:27'),
(26, 1, 'Abebe', 'abebe@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', 1, 'i', 'm', 'addusr.png', '2020-04-28 00:38:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
