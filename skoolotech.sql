-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 01:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skoolotech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `ad_hint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `admin_name`, `admin_email`, `password`, `role`, `ad_hint`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$aDbztMdhougX461aHP/SKeo/4kw6p5fuxfo6wrQ5NABz8UWce1YTW', 'admin', 'admin2020'),
(2, 'peluwisky', 'pelumi@gmail.com', '$2y$10$op4HPR7dmjhmTnJugpMsue/2ZAue7DiwHvSyM/YBuM/0AI6iT6G2i', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blogsport`
--

CREATE TABLE `blogsport` (
  `mess_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogsport`
--

INSERT INTO `blogsport` (`mess_id`, `user_id`, `title`, `message`, `image`, `time`) VALUES
(2, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 'He was not expecting what he saw, but along the line he was bless with billions dollar, and his name is samuel, who came all the way from ekiti state. thank God thank Jesus was his new song, i know he will be so happy where ever he is right now it wasnt w', 'image/hvjkbk.PNG', '2021-02-12 15:11:00'),
(3, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 'He was not expecting what he saw, but along the line he was bless with billions dollar, and his name is samuel, who came all the way from ekiti state. thank God thank Jesus was his new song, i know he will be so happy where ever he is right now it wasnt w', 'image/IMG-20191110-WA0037.jpg', '2021-02-12 15:11:45'),
(4, 'ajayisamuel46@gmail.com', 'Football pack', 'He was not expecting what he saw, but along the line he was bless with billions dollar, and his name is samuel, who came all the way from ekiti state. thank God thank Jesus was his new song, i know he will be so happy where ever he is right now it wasnt w', 'image/vlcsnap-2019-03-03-10h49m41s811.png', '2021-02-12 15:23:18'),
(5, 'ajayisamuel46@gmail.com', 'Wrestly on my mind check www champions this night', 'He was not expecting what he saw, but along the line he was bless with billions dollar, and his name is samuel, who came all the way from ekiti state. thank God thank Jesus was his new song, i know he will be so happy where ever he is right now it wasnt w', 'image/vlcsnap-2019-03-10-23h02m41s140.png', '2021-02-12 15:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `user_id`, `title`, `email`, `comment`, `time`) VALUES
(1, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 'mostmerit@gmail.com', 'You are the one i really love to be with all the days of my life.', '2021-02-13 09:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'sam2smart', 'ajayisamuel46@gmail.com', '$2y$10$BaFBw.p6zN2jOhkOturLk.Y.EdLzaCZsri5iyMnsvostqrYLAFcRC'),
(2, 'smart', 'smart@gmail.com', '$2y$10$bFMgw5CyjNYUZkXqWXhVkejOX6dzYhMEqpWG8t..M3ccWfsgA/d2W');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`view_id`, `user_id`, `title`, `view`) VALUES
(1, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(2, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(3, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(4, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(5, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(6, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(7, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(8, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(9, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(10, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 1),
(11, 'ajayisamuel46@gmail.com', 'Football pack', 1),
(12, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(13, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 1),
(14, 'ajayisamuel46@gmail.com', 'Football pack', 1),
(15, 'ajayisamuel46@gmail.com', 'Wrestly on my mind check www champions this night', 1),
(16, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(17, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(18, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(19, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(20, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 1),
(21, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(22, 'ajayisamuel46@gmail.com', 'Football pack', 1),
(23, 'ajayisamuel46@gmail.com', 'Wrestly on my mind check www champions this night', 1),
(24, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 1),
(25, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 1),
(26, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(27, 'ajayisamuel46@gmail.com', 'Football pack', 1),
(28, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 1),
(29, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 1),
(30, 'ajayisamuel46@gmail.com', 'JESUS IS COMING', 1),
(31, 'ajayisamuel46@gmail.com', 'JESUS IS THE LEADING CHURCH', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `blogsport`
--
ALTER TABLE `blogsport`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogsport`
--
ALTER TABLE `blogsport`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
