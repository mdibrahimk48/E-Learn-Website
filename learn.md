-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2019 at 08:28 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `mobile`, `email`, `city`, `zipcode`, `address`) VALUES
(1, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(2, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(3, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(4, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(5, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(6, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(7, 'surojit', '01817579013', 'golam@gmail.com', 'dhaka', 'adasd', 'fdsfsd'),
(8, 'surojit', '01817579013', 'golam@gmail.com', 'dhaka', 'adasd', 'fdsfsd'),
(9, 'rakib', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(10, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(11, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(12, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(13, 'khaledd', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(14, 'khaled', '01817579013', 'mahmud@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(15, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(16, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(17, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(18, 'khaled', '01817579013', 'khaledmahmud44@gmail.com', 'dhaka', '90123', 'test'),
(19, 'khaled', '01817579013', 'admin@gmail.com', 'dhaka', 'adasd', 'hfhgfhfg'),
(20, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'gdfgd dg d');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'upload/user/user.png',
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `code` varchar(100) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile`, `designation`, `subject`, `gender`, `email`, `password`, `address`, `image`, `role`, `code`, `active`) VALUES
(1, 'golam', '01817579012', 'admin', NULL, 'male', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'dsfsdfs', 'upload/user/user.png', 0, '', 0),
(2, 'golam', '01817579015', 'teacher', 'math', 'female', 'mahmud@gmail.com', '202cb962ac59075b964b07152d234b70', 'sfdsfsdfs', 'upload/user/5dde659e5d352-42.jpg', 1, '', 0),
(7, 'khaled', '01817579011', 'admin', NULL, 'male', 'ujjalbhuiyan123@gmail.com', '9741b6cc267f8740d1f51305394087b2', 'gdfg ', 'assets/images/github.png', 0, '', 0),
(8, 'golam', '01761238337', 'teacher', 'chemistry', 'female', 'mahmud1@gmail.com', '202cb962ac59075b964b07152d234b70', 'sfdsfsdfs', 'upload/user/teacher.jpg', 1, '', 0),
(9, 'rakib', '01761238337', 'teacher', 'islam', 'female', 'mahmud2@gmail.com', '202cb962ac59075b964b07152d234b70', 'sfdsfsdfs', 'upload/user/teacher3.jpg', 1, '', 0),
(10, 'golam', '01817579133', 'teacher', NULL, 'male', 'rakibul9200@gmail.com', 'a1dabf4c7fc3c80ef00bee9bfa92baa4', 'fsfsfs ', 'assets/images/github.png', 1, '601-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `ans` longtext NOT NULL,
  `seen` tinyint(4) DEFAULT '0',
  `best_ans` tinyint(4) NOT NULL DEFAULT '0',
  `vote` int(11) NOT NULL DEFAULT '0',
  `dislike` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  KEY `user_id` (`user_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `user_id`, `admin_id`, `question_id`, `ans`, `seen`, `best_ans`, `vote`, `dislike`, `created_at`) VALUES
(6, 11, NULL, 7, ' check tag', 1, 0, 0, 0, '2019-11-28 04:49:36'),
(7, 11, NULL, 8, ' check tag', 1, 0, 0, 0, '2019-11-28 04:49:36'),
(8, 11, NULL, 7, ' check tag', 1, 0, 0, 0, '2019-11-28 04:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `email`, `body`, `status`, `date`) VALUES
(1, 'khaled', 'mahmud', 'ss@c.com', 'bbbbb', 1, '2017-02-13 11:28:07'),
(5, 'mojjamel', 'haque', 'dnight950@gmail.com', 'iiuuuuuuuuuuuuuuuuuu\r\nkkkkkkkkkkkkk', 0, '2017-02-13 18:13:36'),
(4, 'salauddin', 'rahman', 'kh@d.co', 'fdfdsagdfgdfg dfdafgsd dfgadfg', 1, '2017-02-13 17:50:39'),
(6, 'md khaled', '8976867', 'kh@d.co', 'yygbyhhb', 0, '2017-03-03 02:37:18'),
(7, 'khaled', '01817579013', 'rakibul9200@gmail.com', 'ffdgdfgdf', 1, '2019-10-23 14:44:34'),
(8, 'khaled', 'test mail in php', 'admin@gmail.com', 'dgdfgdf', 1, '2019-11-27 14:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `students` int(11) NOT NULL,
  `take_course` int(11) NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `started_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `class`, `title`, `duration`, `period`, `admin_id`, `students`, `take_course`, `price`, `started_at`, `content`, `image`) VALUES
(7, 'six', 'Islam', '20:56-14:02', '4 month', 2, 38, 1, 500, '2019-01-30 18:00:00', 'hfhdfgh gdfg  dfgdf', 'upload/5ddd95fb1b2e2-31.png'),
(8, 'eight', 'physics', '21:59-15:04', '4 month', 8, 50, 0, 1000, '2019-12-23 18:00:00', ' dfgdf g dfgfdgd dfgdfg', 'upload/5ddd97310c680-83.png'),
(9, 'ten', 'chemistry', '11:00-12:00', '4 month', 9, 40, 0, 2000, '2015-12-31 18:00:00', 'fhfghf fhfgh f', 'upload/5ddd9793386b5-88.png'),
(10, 'ten', 'Biology', '11:00-12:00', '4 month', 9, 40, 0, 2000, '2015-12-31 18:00:00', 'fhfghf fhfgh f', 'upload/5ddd9793386b5-88.png'),
(11, 'ten', 'Math', '11:00-12:00', '4 month', 9, 40, 0, 2000, '2015-12-31 18:00:00', 'fhfghf fhfgh f', 'upload/5ddd9793386b5-88.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `district`, `zip`, `phone`, `email`, `password`) VALUES
(1, 'kld', 'address', 'city', 'district', 'zip', 'phone', 'email', '123'),
(2, 'sha', 'sirajgong', 'comilla', 'bangladesh', '22', '016712245656', 'shawon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

DROP TABLE IF EXISTS `cus_order`;
CREATE TABLE IF NOT EXISTS `cus_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `address_id` (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`id`, `user_id`, `address_id`, `amount`, `payment_type`, `transaction_id`, `date`, `status`) VALUES
(1, 11, 18, 600, 'Cash', '24568', '2019-11-27 13:30:11', 0),
(2, 2, 19, 500, 'Cash', '', '2019-11-27 03:59:14', 0),
(3, 11, 19, 500, 'Cash', '', '2018-11-07 18:00:00', 0),
(4, 3, 19, 500, 'Cash', '', '2019-10-26 03:59:14', 0),
(5, 11, 20, 500, 'Cash', '', '2019-11-30 18:16:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `videourl` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `pdfpath` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `complete` tinyint(4) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `course_id`, `videourl`, `duration`, `pdfpath`, `content`, `complete`, `status`, `created_at`) VALUES
(9, 'chapter-1', 9, 'rwXL73AkX20', '27:18', 'upload/pdf/5ddd994fa51df-45.pdf', '<p>eedfsfds sd fds</p>', 0, 0, '2019-11-26 21:29:51'),
(10, 'chapter-1', 8, 'AR3keIGhIeE', '35:56', 'upload/pdf/5ddd998deddbc-50.pdf', '<p>sfdsf sdf</p>', 1, 0, '2019-11-26 21:30:53'),
(11, 'chapter-1', 8, '5bEFEGzPlmU', '1:29:48', 'upload/pdf/5ddd99d16b9d1-65.pdf', '<p>sfdsfdsf&nbsp;</p>', 1, 0, '2019-11-26 21:32:01'),
(12, 'chapter-1', 7, '5bEFEGzPlmU', '1:29:48', 'upload/pdf/5ddd99d16b9d1-65.pdf', '<p>sfdsfdsf&nbsp;</p>', 1, 0, '2019-11-26 21:32:01'),
(13, 'chapter-1', 9, '5bEFEGzPlmU', '1:29:48', 'upload/pdf/5ddd99d16b9d1-65.pdf', '<p>sfdsfdsf&nbsp;</p>', 0, 0, '2019-11-26 21:32:01'),
(14, 'chapter-1', 7, '5bEFEGzPlmU', '1:29:48', 'upload/pdf/5ddd99d16b9d1-65.pdf', '<p>sfdsfdsf&nbsp;</p>', 0, 0, '2019-11-26 21:32:01'),
(15, 'chapter-1', 8, '5bEFEGzPlmU', '1:29:48', 'upload/pdf/5ddd99d16b9d1-65.pdf', '<p>sfdsfdsf&nbsp;</p>', 1, 0, '2019-11-26 21:32:01'),
(16, 'chapter-1', 7, '5bEFEGzPlmU', '1:29:48', 'upload/pdf/5ddd99d16b9d1-65.pdf', '<p>sfdsfdsf&nbsp;</p>', 0, 0, '2019-11-26 21:32:01'),
(17, 'chapter-1', 9, '5bEFEGzPlmU', '1:29:48', 'upload/pdf/5ddd99d16b9d1-65.pdf', '<p>sfdsfdsf&nbsp;</p>', 0, 0, '2019-11-26 21:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `started_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `notice_ibfk_1` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `admin_id`, `title`, `description`, `started_at`, `created_at`) VALUES
(1, 1, 'friday off day', '<p>tomrrow off day</p>', '2019-11-19 18:00:00', '2019-11-18 20:43:45'),
(2, 2, 'holiday', 'fsfsdfdsfds', '2019-10-18 20:26:57', '2019-11-18 20:43:45'),
(3, 2, 'Eid-ul-fitor', 'fsfsdfdsfds', '2019-11-18 20:26:57', '2019-11-18 20:43:45'),
(4, 1, 'foodball sports', '<p><strong>fsdfdsf sdfsdfdsfs</strong></p>', '2019-11-29 18:00:00', '2019-11-27 20:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `course_id`) VALUES
(4, 1, 7),
(5, 4, 8),
(6, 2, 7),
(7, 3, 8),
(8, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `posted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `course_id`, `title`, `details`, `view`, `posted_at`) VALUES
(7, 11, 7, 'div not show', 'div is nit show properly', 5, '2019-11-28 04:48:48'),
(8, 11, 9, 'div not show', 'div is nit show properly', 8, '2019-11-28 04:48:48'),
(9, 9, 9, 'div not show', 'div is nit show properly', 3, '2019-11-28 04:48:48'),
(10, 20, 9, 'retret', 'fgdfgdfg', 13, '2019-11-30 07:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `ans1` varchar(100) NOT NULL,
  `ans2` varchar(255) NOT NULL,
  `ans3` varchar(100) NOT NULL,
  `ans4` varchar(100) NOT NULL,
  `ans` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `course_id`, `ans1`, `ans2`, `ans3`, `ans4`, `ans`, `status`) VALUES
(14, 'What does HTML stand for?', 9, 'hyper text markup language', 'hyper tool markup language', 'hyper text and markup language', 'hyper tied markup language', '1', 1),
(15, 'What does HTML stand for?', 8, 'hyper text markup language', 'hyper tool markup language', 'hyper text and markup language', 'hyper tied markup language', '1', 1),
(16, 'What does HTML stand for?', 7, 'hyper text markup language', 'hyper tool markup language', 'hyper text and markup language', 'hyper tied markup language', '1', 1),
(17, 'What does HTML stand for?', 9, 'hyper text markup language', 'hyper tool markup language', 'hyper text and markup language', 'hyper tied markup language', '1', 1),
(18, 'What does HTML stand for?', 7, 'hyper text markup language', 'hyper tool markup language', 'hyper text and markup language', 'hyper tied markup language', '1', 1),
(19, 'What does HTML stand for?', 7, 'hyper text markup language', 'hyper tool markup language', 'hyper text and markup language', 'hyper tied markup language', '1', 1),
(20, 'What does HTML stand for?', 9, 'hyper text markup language', 'hyper tool markup language', 'hyper text and markup language', 'hyper tied markup language', '1', 1),
(21, 'What does HTML stand for?', 8, 'hyper text markup language', 'hyper tool markup language', 'hyper text and markup language', 'hyper tied markup language', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

DROP TABLE IF EXISTS `quiz_result`;
CREATE TABLE IF NOT EXISTS `quiz_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `user_id`, `course_id`, `result`, `created_at`) VALUES
(3, 11, 8, 2, '2019-11-30 18:31:44'),
(4, 11, 8, 1, '2019-12-01 00:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_time`
--

DROP TABLE IF EXISTS `quiz_time`;
CREATE TABLE IF NOT EXISTS `quiz_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `timer` double NOT NULL,
  `quiz_limit` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_time`
--

INSERT INTO `quiz_time` (`id`, `course_id`, `timer`, `quiz_limit`) VALUES
(1, 7, 60, 3),
(2, 8, 60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `course_id`, `rating`, `review`, `created_at`) VALUES
(1, 11, 7, 4, ' good', '2019-11-30 06:27:48'),
(3, 11, 9, 3, ' better', '2019-11-30 06:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `student_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `school` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `class` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `gender` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'upload/user/user.png',
  `block` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT 'upload/user/user.png',
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `code` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `student_id`, `mobile`, `designation`, `subject`, `school`, `class`, `email`, `password`, `gender`, `address`, `img`, `block`, `image`, `role`, `code`, `active`) VALUES
(1, 'Kawser', NULL, '6475675474', NULL, '', 'dhaka', 'bangladesh', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'bi-baria,dkhaka', 'upload/user/user.png', '1', NULL, 0, NULL, 0),
(2, 'shawon', NULL, '016712245656', NULL, '', 'comilla', 'bangladesh', NULL, '202cb962ac59075b964b07152d234b70', '', 'sirajgong', 'upload/user/user.png', '1', NULL, 0, NULL, 0),
(3, 'khaleddddd', NULL, '', NULL, '', '', '', NULL, '202cb962ac59075b964b07152d234b70', '', 'dasdasd', 'upload/user/user.png', '0', NULL, 0, NULL, 0),
(5, 'staff', '00123', NULL, NULL, '', NULL, NULL, NULL, '202cb962ac59075b964b07152d234b70', '', '&lt;p&gt;b-baria&lt;/p&gt;', 'upload/user/user.png', '0', NULL, 0, NULL, 0),
(9, 'Kawser', NULL, '2343', NULL, '', 'tret', '34534', NULL, '202cb962ac59075b964b07152d234b70', '', 'fdsfsd', 'upload/user/user.png', '0', NULL, 0, NULL, 0),
(10, 'Kawser', 'a123', NULL, NULL, '', NULL, NULL, NULL, '202cb962ac59075b964b07152d234b70', '', NULL, 'upload/user/user.png', '0', NULL, 0, NULL, 0),
(11, 'Kawser', 'two-11', '01817579017', NULL, '', 'daffodil', 'two', '', '202cb962ac59075b964b07152d234b70', 'male', 'gdggd', 'upload/user/5ddfa0bdf3755-17.jpg', '0', NULL, 0, NULL, 0),
(13, 'rakib', 'ten-13', '01817579012', NULL, '', 'daffodil', 'ten', 'ujjalbhuiyan124@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'sfsfsdf sdf sd', 'upload/user/user.png', '0', NULL, 0, NULL, 0),
(14, 'Kawser', 'six-14', '01817579011', NULL, '', 'daffodil', 'six', 'ujjalbhuiyan125@gmail.com', '88449f19452d205f024cc627dac1f53e', 'male', 'sfsdf', 'upload/user/user.png', '0', NULL, 0, NULL, 0),
(18, 'khaled', 'six-15', '01817579010', NULL, '', 'daffodil', 'six', 'ujjalbhuiyan123@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', 'sfds sf s', 'upload/user/user.png', '0', NULL, 0, NULL, 0),
(19, 'Kawser', NULL, '018579014', 'admin', NULL, NULL, NULL, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', 'panthapath', 'upload/user/user.png', '0', 'upload/user/user.png', 0, NULL, 0),
(20, 'mahmud', NULL, '10751238333', 'teacher', 'chemistry', NULL, NULL, 'mahmud@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', 'fsfs ', 'upload/user/user.png', '0', 'upload/user/user.png', 1, NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD CONSTRAINT `cus_order_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cus_order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `cus_order` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD CONSTRAINT `quiz_result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_result_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_time`
--
ALTER TABLE `quiz_time`
  ADD CONSTRAINT `quiz_time_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
