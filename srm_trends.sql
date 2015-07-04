-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2015 at 11:54 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srm_trends`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `Msg_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Sender` varchar(200) NOT NULL,
  `Message` varchar(200) NOT NULL,
  PRIMARY KEY (`Msg_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`Msg_ID`, `Sender`, `Message`) VALUES
(1, 'tavish', 'Need help with compiler?'),
(2, 'rishab', 'what type of help you need?'),
(3, 'tavish', 'with Code generation.'),
(4, 'tavish', 'which phase of compiler is it'),
(5, 'tavish', 'hey\n'),
(6, 'tavish', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123461 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `name`, `password`, `role`) VALUES
(21, 'tavishaggarwal1993@gmail.com', 'tavish', '1234', 'student'),
(22, 'rishab@gmail.com', 'rishab', '1', 'student'),
(23, 't@gmail.com', 'teacher', '1', 'teacher'),
(24, 'aayush@gmail.com', 'aayush', '987', 'student'),
(25, 'xyz@gmail.com', 'xyz', '1', 'teacher'),
(123460, 'aayush_kejriwal@srm.univ.ac.in', 'aayush kejriiwal', '1234', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `user_id`, `filename`, `type`, `size`) VALUES
(44, 1, 'notes_java.txt', 'text/plain', '206'),
(45, 1, 'notes_java.txt', 'text/plain', '206'),
(46, 1, 'notes_java.txt', 'text/plain', '206'),
(47, 1, 'notes_java.txt', 'text/plain', '256'),
(48, 1, 'notes_java.txt', 'text/plain', '256'),
(49, 1, 'notes_java.txt', 'text/plain', '256'),
(50, 1, 'notes_java.txt', 'text/plain', '256'),
(51, 1, 'notes_java.txt', 'text/plain', '256'),
(52, 1, 'file.txt', 'text/plain', '685'),
(53, 1, 'file.txt', 'text/plain', '685');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
