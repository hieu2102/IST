-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 05:13 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `state` enum('open','archived') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `state`) VALUES
(4, 'checkID($user);', 'asdczxczxcxzc', 'open'),
(7, 'kdoqpwekqwpok', 'checkID($user);', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(8) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_topic` int(8) NOT NULL,
  `post_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `content`, `date`, `post_topic`, `post_by`) VALUES
(79, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(80, '<blockquote><p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh\n</strong></i></p><p>@hieu2102</p></blockquote><p>yolo</p>', '2018-06-02 04:20:14', 34, 2),
(82, '<p>iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj\njjjjjjjjjjjjjjjjjjjjj</p>', '2018-06-02 06:14:47', 35, 1601040069),
(83, '<p>&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&g\nt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt\n;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;&lt;/tr&gt;</p>', '2018-06-02 06:17:38', 33, 1601040069),
(84, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(85, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(86, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(87, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(88, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(89, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(90, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(91, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(92, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(93, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(94, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(95, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(96, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(97, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(98, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(99, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(100, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(101, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(102, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(103, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(104, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(105, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(106, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(107, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(108, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(109, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(110, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(111, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069),
(112, '<p><strong>hohohohohohohohohohohohoohohohohohohohohohoh</strong><i><strong>hohohohohohoh</strong></i\r\n></p>', '2018-06-02 03:37:46', 34, 1601040069);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(8) NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(10) NOT NULL,
  `state` enum('open','closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `subject`, `date`, `topic_cat`, `topic_by`, `state`) VALUES
(31, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-01 17:21:11', 7, 1601040069, 'open'),
(33, 'checkID($user);checkID($user);checkID($user);checkID($user);checkID($user);checkID($user);checkID($u', '2018-06-01 18:13:50', 7, 1601040069, 'open'),
(34, 'testSELECT max(id) from topics where topic_by = \'$userID\' and topic_cat = \'$catIDSELECT max(id) from topics where topic_by = \'$userID\' and topic_cat = \'$catID', '2018-06-02 03:37:46', 4, 1601040069, 'open'),
(35, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'closed'),
(36, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'closed'),
(37, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'closed'),
(38, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(39, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(40, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(41, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(42, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(43, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(44, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(45, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'closed'),
(46, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'closed'),
(47, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(48, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(49, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(50, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(51, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(52, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(53, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(54, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(55, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(56, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(57, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(58, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(59, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(60, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(61, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(62, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(63, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(64, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'closed'),
(65, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(66, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(67, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(68, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(69, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(70, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(71, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(72, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(73, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(74, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(75, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(76, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(77, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(78, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open'),
(79, 'iasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-06-02 06:14:47', 7, 1601040069, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level` enum('normal','admin','banned') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `level`) VALUES
(2, 'hi', 'qwe', 'gogo@gmail.com', '2018-05-30 10:37:37', 'banned'),
(123, 'hieu', '$2y$10$93g.IJJAf./6N5MbrsPQTOrpY3dFfqEjcDao5n6juCbYOpTF9IvBi', 'q@gmail.com', '2018-06-02 15:36:42', 'normal'),
(12341, 'hieu nguyen', '$2y$10$a5z3durGFzSx/ioMycYshu.yKKCGP26FQgEIluK0xAav3Npau.i7.', 'q@gmail.come', '2018-06-02 15:52:28', 'normal'),
(1601040069, 'hieu2102', '$2y$10$4bQY9WG/Ed5UIWywK.OxBO2Q/cqI9nAfm3eMgCSEW6IguSGBa8nfK', 'gobanme.pierro@gmail.com', '2018-05-21 11:08:54', 'admin'),
(1901040069, 'qwpoaslkzxn', '$2y$10$3X8e3APZr5DjQUKruCEckeCAQkEd6ap8UdBeOOBzN7XI9Uk41qAlO', 'p@gmail.com', '2018-06-02 16:05:33', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name_unique` (`name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_cat` (`topic_cat`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1901040070;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
