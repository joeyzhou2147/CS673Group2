-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2016 at 09:06 PM
-- Server version: 5.5.40
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `activity_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `activity_name` text NOT NULL,
  `activity_description` text NOT NULL,
  `activity_time` datetime NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `story_id` (`story_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bug`
--

CREATE TABLE IF NOT EXISTS `bug` (
  `project_id` int(11) NOT NULL,
  `bug_title` text NOT NULL,
  `bug_description` text NOT NULL,
  `bug_status` text NOT NULL,
  `bug_priority` text NOT NULL,
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bug`
--

INSERT INTO `bug` (`project_id`, `bug_title`, `bug_description`, `bug_status`, `bug_priority`) VALUES
(4000, 'Menu page home link issue', 'the page link from the project list page  does not load images', 'open', 'medium'),
(4000, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message`, `time`) VALUES
(1, 'dsfsfs', 1459471396);

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `conversation_id` int(11) NOT NULL,
  `conversation_start_time` datetime NOT NULL,
  `conversation_name` text NOT NULL,
  KEY `conversation_id` (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_name`) VALUES
(0, 'bupatriots'),
(7000, 'bupatriots'),
(7001, 'groupA'),
(7002, 'GroupB');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `message_time` datetime NOT NULL,
  `message_text` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `message_id` (`message_id`,`conversation_id`),
  KEY `conversation_id` (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `project_length` int(11) NOT NULL,
  `project_start_date` date NOT NULL,
  `project_end_date` date NOT NULL,
  `project_status` text NOT NULL,
  KEY `group_id` (`group_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `group_id`, `project_name`, `project_length`, `project_start_date`, `project_end_date`, `project_status`) VALUES
(4000, 7000, 'management1', 12, '2016-01-02', '2016-03-31', 'pending'),
(4001, 7000, 'management2', 15, '2015-11-10', '2016-03-31', 'compeleted'),
(0, 0, 'asdsad', 0, '2016-04-05', '0000-00-00', 'Close'),
(0, 0, 'sadasdas', 0, '2016-04-05', '0000-00-00', 'Open'),
(0, 0, 'sadasdas', 0, '2016-04-05', '0000-00-00', 'Open'),
(0, 0, 'sadasdas', 0, '2016-04-05', '0000-00-00', 'Open'),
(0, 0, 'sadasdas', 0, '2016-04-05', '0000-00-00', 'Open'),
(0, 0, '1111', 1, '2016-04-07', '0000-00-00', 'Open'),
(0, 0, 'wer', 111, '2016-04-07', '0000-00-00', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `story_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `story_type` int(11) NOT NULL,
  `story_status` text NOT NULL,
  `story_description` text NOT NULL,
  `story_owner` text NOT NULL,
  `story_create_time` datetime NOT NULL,
  `story_last_update_time` datetime NOT NULL,
  KEY `story_id` (`story_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`story_id`, `project_id`, `story_type`, `story_status`, `story_description`, `story_owner`, `story_create_time`, `story_last_update_time`) VALUES
(3000, 4000, 1, 'open', 'A user should be able to initiate a Project give it a name and basic information', 'Gilberk', '2016-01-13 00:00:00', '2016-03-23 00:00:00'),
(3001, 4000, 1, 'open', 'An Admin user should be able to configure Users and email them their credentials.', 'Gilbert K', '2016-01-12 00:00:00', '2016-03-24 00:00:00'),
(3002, 4000, 1, 'open', 'A user should be able to login with the credentials provided in the email.', 'KJ', '2016-01-11 00:00:00', '2016-03-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(32) NOT NULL AUTO_INCREMENT,
  `username` mediumtext CHARACTER SET utf8 NOT NULL,
  `password` mediumtext CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(16) DEFAULT NULL,
  `last_name` varchar(16) DEFAULT NULL,
  `salt` mediumtext CHARACTER SET utf8 NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `first_name`, `last_name`, `salt`, `register_date`) VALUES
(1, 'joeyzhou@bu.edu', 'joeyzhou', 'Yu', 'Zhou', '', '2016-04-03 19:01:07'),
(4, 'xh314159@bu.edu', 'hanxiao', 'Han', 'Xiao', '', '2016-04-03 19:01:07'),
(5, 'root@email.com', 'root@email.com', 'root', NULL, '41efb116d3d48394', '2016-04-05 06:49:07'),
(7, 'joe@6', 'fee65206418e655cb0c48aeb09c265bb', 'joe', NULL, '4106a5221730a1f8e7f74ee2a1cd833d', '2016-04-05 06:53:49'),
(8, 'joe@3', '493b450e5a6560ac451ef9e260198821', 'joe', NULL, '19ede5e3b6c2a3deeded9e6a4d81b1e5', '2016-04-05 06:58:02'),
(9, '11@11', '7f8abdcf27ed6ebe3c9ff538540c4a53', '11', NULL, 'c7088221448db123574a206fd3384063', '2016-04-08 00:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_conversation`
--

CREATE TABLE IF NOT EXISTS `user_conversation` (
  `user_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `conversation_id` (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_entering_date` date NOT NULL,
  `user_role` text NOT NULL,
  `user_status` text NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`story_id`) REFERENCES `story` (`story_id`);

--
-- Constraints for table `bug`
--
ALTER TABLE `bug`
  ADD CONSTRAINT `bug_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`conversation_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`);

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `user_conversation`
--
ALTER TABLE `user_conversation`
  ADD CONSTRAINT `user_conversation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_conversation_ibfk_2` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`conversation_id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
