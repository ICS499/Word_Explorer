-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 06:37 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icsbinco_word_explorer`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `word_id` int(11) NOT NULL,
  `character_index` tinyint(4) NOT NULL,
  `character_value` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic`) VALUES
('Animals'),
('Foods'),
('Household'),
('Machines'),
('Plants'),
('School'),
('Toys'),
('Universe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(100) NOT NULL COMMENT 'email address is the key',
  `username` varchar(50) NOT NULL COMMENT 'if the user doesn''t want to display the user name',
  `user_password` varchar(65) NOT NULL COMMENT 'for storing the password',
  `id_verified` tinyint(1) NOT NULL COMMENT '0 for false, 1 for true',
  `activation_token` varchar(25) NOT NULL COMMENT 'for storing the activation code when the users register or forget password',
  `role` tinyint(1) NOT NULL COMMENT '0 for ADMIN, 1 for registered user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `username`, `user_password`, `id_verified`, `activation_token`, `role`) VALUES
('fm2584uk@metrostate.edu', 'prashant', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, '753951', 0),
('hp6449qy@metrostate.edu', 'tyler', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, '1234', 0),
('test', 'test', 'test', 1, '751', 0),
('user', 'user', 'user', 1, '751433', 1);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `word_id` int(11) NOT NULL,
  `Topic` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Telugu_Word` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `English_Word` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Telugu_in_English` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `English_in_Telugu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image_Name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Audio_Name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Notes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Last_Updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `words`
--

INSERT INTO `words` ( `Topic`, `Telugu_Word`, `English_Word`, `Telugu_in_English`, `English_in_Telugu`, `Image_Name`, `Audio_Name`, `Notes`, `Description`, `Created_Date`, `Last_Updated`) VALUES
( 'Universe', 'చంద్రుడు', 'moon ', 'Candruḍu', 'మూన్', 'moon.jpg', 'moon.mpg', '', 'this is a word related to universe topic', '2017-09-27 05:00:00', '2017-09-28 18:19:12'),
( 'Animals', 'కుక్క', 'dog', 'dog', 'కుక్క', 'dog.jpg', 'dog.mpg', '', 'this is a word related to the animal topic', '2017-09-28 18:31:11', '2017-10-12 02:49:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`word_id`,`character_index`,`character_value`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`word_id`),
  ADD KEY `Topic` (`Topic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `word_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_ibfk_1` FOREIGN KEY (`Topic`) REFERENCES `topics` (`topic`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
