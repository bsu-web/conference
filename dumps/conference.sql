-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2013 at 03:42 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `conference`
--
CREATE DATABASE IF NOT EXISTS `conference` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `conference`;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `title` varchar(128) NOT NULL,
  `creation` datetime NOT NULL,
  `file_h` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `type`, `title`, `creation`, `file_h`) VALUES
(1, 0, 'Document, written by @user', '2013-07-05 10:26:09', 0),
(2, 0, 'Document, written by @foo', '2013-07-05 10:26:36', 0),
(3, 0, 'Document, written by @user and @foo', '2013-07-05 10:27:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doc_authors`
--

CREATE TABLE IF NOT EXISTS `doc_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `doc_authors`
--

INSERT INTO `doc_authors` (`id`, `doc_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE IF NOT EXISTS `journals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `title`) VALUES
(1, 'root journal');

-- --------------------------------------------------------

--
-- Table structure for table `jrn_docs`
--

CREATE TABLE IF NOT EXISTS `jrn_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jrn_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jrn_docs`
--

INSERT INTO `jrn_docs` (`id`, `jrn_id`, `doc_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `pass` char(64) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `nickname`, `email`) VALUES
(1, 'user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'User', 'user@example.com'),
(2, 'foo', 'fcde2b2edba56bf408601fb721fe9b5c338d10ee429ea04fae5511b68fbf8fb9', 'Foo', 'foo@example.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
