-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2022 at 01:22 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogproject00`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_number` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_number`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '123456789'),
(68, 'self', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '32323'),
(69, 'sam', 'sam@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '555554522'),
(65, 'sam123', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '12323123222'),
(59, 'Update', 'update@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '123456789'),
(61, 'sabbir', 'dabbir@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1112'),
(62, 'sam123', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '12323123222');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `ctg_id` int NOT NULL AUTO_INCREMENT,
  `ctg_name` varchar(255) NOT NULL,
  `ctg_des` varchar(255) NOT NULL,
  `ctg_status` int NOT NULL,
  PRIMARY KEY (`ctg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctg_id`, `ctg_name`, `ctg_des`, `ctg_status`) VALUES
(57, 'Dress', 'this is description for category', 1),
(58, 'Toys', 'this is description for category', 1),
(60, 'Foods', 'this is description for category', 0),
(66, 'Dress', 'this is description for category', 0),
(72, 'Devices', 'this is description for category', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_des` longtext NOT NULL,
  `post_ctg` int NOT NULL,
  `post_status` int NOT NULL DEFAULT '1',
  `post_author` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_img`, `post_des`, `post_ctg`, `post_status`, `post_author`, `post_date`) VALUES
(29, 'Image testing 1', 'about1.webp', 'test 1', 57, 1, 'admin', '16-01-22'),
(30, 'Image testing 2', 'about-img1.webp', 'TEst 2', 58, 1, 'admin', '16-01-22'),
(31, 'Image testing 3', 'menu3.webp', 'test', 72, 1, 'admin', '16-01-22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
