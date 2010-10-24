-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2010 at 08:01 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workoutmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `rep_min` int(11) NOT NULL,
  `rep_max` int(11) NOT NULL,
  `weight_min` int(11) NOT NULL,
  `weight_max` int(11) NOT NULL,
  `name` text NOT NULL,
  `number_of_sets` int(11) NOT NULL,
  KEY `id` (`id`,`workout_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `workout_id`, `rep_min`, `rep_max`, `weight_min`, `weight_max`, `name`, `number_of_sets`) VALUES
(1, 18, 0, 0, 0, 0, 'test', 0),
(0, 18, 0, 0, 0, 0, 'test221', 0),
(9, 17, 0, 0, 0, 0, 'test', 0),
(8, 17, 0, 0, 0, 0, 'test2', 0),
(0, 19, 0, 0, 0, 0, 'test2', 0),
(1, 19, 0, 0, 0, 0, 'test', 0),
(7, 17, 0, 0, 0, 0, 'test', 0),
(6, 17, 0, 0, 0, 0, 'test2', 0),
(5, 17, 0, 0, 0, 0, 'test', 0),
(4, 17, 0, 0, 0, 0, 'test2', 0),
(3, 17, 0, 0, 0, 0, 'test2', 0),
(2, 17, 0, 0, 0, 0, 'test', 0),
(1, 17, 0, 0, 0, 0, 'test2', 0),
(0, 17, 0, 0, 0, 0, 'test', 0),
(10, 17, 0, 0, 0, 0, 'test2', 0),
(11, 17, 0, 0, 0, 0, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'd', '3c363836cf4e16666669a25da280a1865c2d2874'),
(2, 'h', '27d5482eebd075de44389774fce28c69f45c8a75'),
(3, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(4, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(5, 'new', 'c2a6b03f190dfb2b4aa91f8af8d477a9bc3401dc'),
(6, 'new', 'c2a6b03f190dfb2b4aa91f8af8d477a9bc3401dc'),
(7, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE IF NOT EXISTS `workouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `workout_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`id`, `user_id`, `workout_name`) VALUES
(19, 3, ''),
(18, 3, ''),
(17, 3, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
