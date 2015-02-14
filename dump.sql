-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2015 at 11:53 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `text`) VALUES
(1, 'John <b>Hacker</b>', 'Text of comment'),
(2, 'Denys Potapov', 'You can use smiles <i class="fa fa-smile-o"></i> <i class="fa fa-heart"></i> <i class="fa fa-venus"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `listeners`
--

CREATE TABLE IF NOT EXISTS `listeners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `listeners`
--

INSERT INTO `listeners` (`id`, `event`, `service`, `priority`) VALUES
(1, 'Model:Wired_Models_Comment:beforeSave', 'smileReplacer', '100');
