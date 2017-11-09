-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2017 at 02:04 AM
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
-- Database: `metroics_words`
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

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`word_id`, `character_index`, `character_value`) VALUES
(1, 0, 'a'),
(1, 1, 'n'),
(1, 2, 'i'),
(1, 3, 'm'),
(1, 4, 'a'),
(1, 5, 'l'),
(2, 0, 'a'),
(2, 1, 'n'),
(2, 2, 'i'),
(2, 3, 'm'),
(2, 4, 'a'),
(2, 5, 'l'),
(3, 0, 'a'),
(3, 1, 'n'),
(3, 2, 'i'),
(3, 3, 'm'),
(3, 4, 'a'),
(3, 5, 'l'),
(4, 0, 'a'),
(4, 1, 'n'),
(4, 2, 'i'),
(4, 3, 'm'),
(4, 4, 'a'),
(4, 5, 'l'),
(5, 0, 'a'),
(5, 1, 'n'),
(5, 2, 'i'),
(5, 3, 'm'),
(5, 4, 'a'),
(5, 5, 'l'),
(6, 0, 'a'),
(6, 1, 'n'),
(6, 2, 'i'),
(6, 3, 'm'),
(6, 4, 'a'),
(6, 5, 'l'),
(7, 0, 'a'),
(7, 1, 'n'),
(7, 2, 'i'),
(7, 3, 'm'),
(7, 4, 'a'),
(7, 5, 'l'),
(8, 0, 'a'),
(8, 1, 'n'),
(8, 2, 'i'),
(8, 3, 'm'),
(8, 4, 'a'),
(8, 5, 'l'),
(9, 0, 'a'),
(9, 1, 'n'),
(9, 2, 'i'),
(9, 3, 'm'),
(9, 4, 'a'),
(9, 5, 'l'),
(10, 0, 'a'),
(10, 1, 'n'),
(10, 2, 'i'),
(10, 3, 'm'),
(10, 4, 'a'),
(10, 5, 'l'),
(11, 0, 's'),
(11, 1, 'c'),
(11, 2, 'h'),
(11, 3, 'o'),
(11, 4, 'o'),
(11, 5, 'l'),
(12, 0, 's'),
(12, 1, 'c'),
(12, 2, 'h'),
(12, 3, 'o'),
(12, 4, 'o'),
(12, 5, 'l'),
(13, 0, 's'),
(13, 1, 'c'),
(13, 2, 'h'),
(13, 3, 'o'),
(13, 4, 'o'),
(13, 5, 'l'),
(14, 0, 's'),
(14, 1, 'c'),
(14, 2, 'h'),
(14, 3, 'o'),
(14, 4, 'o'),
(14, 5, 'l'),
(15, 0, 's'),
(15, 1, 'c'),
(15, 2, 'h'),
(15, 3, 'o'),
(15, 4, 'o'),
(15, 5, 'l'),
(16, 0, 's'),
(16, 1, 'c'),
(16, 2, 'h'),
(16, 3, 'o'),
(16, 4, 'o'),
(16, 5, 'l'),
(17, 0, 's'),
(17, 1, 'c'),
(17, 2, 'h'),
(17, 3, 'o'),
(17, 4, 'o'),
(17, 5, 'l'),
(18, 0, 's'),
(18, 1, 'c'),
(18, 2, 'h'),
(18, 3, 'o'),
(18, 4, 'o'),
(18, 5, 'l'),
(19, 0, 's'),
(19, 1, 'c'),
(19, 2, 'h'),
(19, 3, 'o'),
(19, 4, 'o'),
(19, 5, 'l'),
(20, 0, 's'),
(20, 1, 'c'),
(20, 2, 'h'),
(20, 3, 'o'),
(20, 4, 'o'),
(20, 5, 'l'),
(21, 0, 'f'),
(21, 1, 'o'),
(21, 2, 'o'),
(21, 3, 'd'),
(22, 0, 'f'),
(22, 1, 'o'),
(22, 2, 'o'),
(22, 3, 'd'),
(23, 0, 'f'),
(23, 1, 'o'),
(23, 2, 'o'),
(23, 3, 'd'),
(24, 0, 'f'),
(24, 1, 'o'),
(24, 2, 'o'),
(24, 3, 'd'),
(25, 0, 'f'),
(25, 1, 'o'),
(25, 2, 'o'),
(25, 3, 'd'),
(26, 0, 'f'),
(26, 1, 'o'),
(26, 2, 'o'),
(26, 3, 'd'),
(27, 0, 'f'),
(27, 1, 'o'),
(27, 2, 'o'),
(27, 3, 'd'),
(28, 0, 'f'),
(28, 1, 'o'),
(28, 2, 'o'),
(28, 3, 'd'),
(29, 0, 'f'),
(29, 1, 'o'),
(29, 2, 'o'),
(29, 3, 'd'),
(30, 0, 'f'),
(30, 1, 'o'),
(30, 2, 'o'),
(30, 3, 'd'),
(31, 0, 'h'),
(31, 1, 'o'),
(31, 2, 'u'),
(31, 3, 's'),
(31, 4, 'e'),
(31, 5, '1'),
(32, 0, 'h'),
(32, 1, 'o'),
(32, 2, 'u'),
(32, 3, 's'),
(32, 4, 'e'),
(32, 5, '1'),
(33, 0, 'h'),
(33, 1, 'o'),
(33, 2, 'u'),
(33, 3, 's'),
(33, 4, 'e'),
(33, 5, '1'),
(34, 0, 'h'),
(34, 1, 'o'),
(34, 2, 'u'),
(34, 3, 's'),
(34, 4, 'e'),
(34, 5, '1'),
(35, 0, 'h'),
(35, 1, 'o'),
(35, 2, 'u'),
(35, 3, 's'),
(35, 4, 'e'),
(35, 5, '1');

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
  `Length` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  `Telugu_Word` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `English_Word` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Telugu_in_English` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `English_in_Telugu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image_Name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Audio_Name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Notes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Created_Date` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP,
  `Last_Updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `words`
--

 INSERT INTO `words` (`word_id`, `Topic`, `Length`, `Level`, `Telugu_Word`, `English_Word`, `Telugu_in_English`, `English_in_Telugu`, `Image_Name`, `Audio_Name`, `Notes`, `Description`, `Created_Date`, `Last_Updated`) VALUES
#  (1, 'animal', 1, 0, 'చీమ', 'ant', 'chiima', 'యాంట్', 'ant.jpg', 'ant.jpg', 'getbetterpicture', 'descexists', '2017-11-03 01:01:08', '2017-11-03 01:01:20');
# (2, 'animal', 1, 0, 'పిల్లి', 'cat', 'pilli', 'క్యాట్', 'cat.jpg', 'cat.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (3, 'animal', 1, 0, 'కుక్క', 'dog', 'kukka', 'డాగ్', 'dog.jpg', 'dog.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (4, 'animal', 1, 0, 'నక్క', 'fox', 'nakka', 'ఫాక్స్', 'fox.jpg', 'fox.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (5, 'animal', 1, 0, 'ఏనుగు', 'elephant', 'ēnugu', 'ఎలిఫెంట్', 'elephant.jpg', 'elephant.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (6, 'animal', 1, 0, 'చేపలు', 'fish', 'cēpalu', 'ఫిష్', 'fish.jpg', 'fish.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (7, 'animal', 1, 0, 'గొర్రె', 'sheep', 'gorre', 'షీప్', 'sheep.jpg', 'sheep.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (8, 'animal', 1, 0, 'తాబేలు', 'turtle', 'tabelu', 'టర్టిల్', 'turtle.jpg', 'turtle.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (9, 'animal', 1, 0, 'గేదె', 'buffalo', 'geda', 'బఫెలో', 'buffalo.jpg', 'buffalo.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (10, 'animal', 1, 0, 'ఆవు', 'cow', 'aavu', 'కౌ', 'fish.jpg', 'fish.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (11, 'school', 1, 0, 'కలము', 'pen', 'kalamu', 'పెన్', 'pen.jpg', 'pen.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (12, 'school', 1, 0, 'పాఠశాల', 'school', 'paathashaala', 'స్కూల్', 'school.jpg', 'school.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (13, 'school', 1, 0, 'పుస్తకము', 'book', 'pustakamu', 'బుక్', 'book.jpg', 'book.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (14, 'school', 1, 0, 'నల్లబల్ల', 'blackboard', 'nallaballa', 'బ్లాక్బోర్డ్', 'black_board.jpg', 'black_board.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (15, 'school', 1, 0, 'గ్రంథాలయము', 'library', 'gramthaalayamu', 'లైబ్రరీ', 'library.jpg', 'library.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (16, 'school', 1, 0, 'పంతులమ్మ', 'teacher', 'pamtulamma', 'టీచర్', 'teacher.jpg', 'teacher.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (17, 'school', 1, 0, 'కుర్చీ', 'chair', 'kurchii', 'చెయిర్', 'chair.jpg', 'chair.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (18, 'school', 1, 0, 'కాగితము', 'paper', 'kaagitamu', 'పేపర్', 'paper.jpg', 'paper.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (19, 'school', 1, 0, 'తరగతిగది', 'classroom', 'taragatigadi', 'క్లాస్రూమ్', 'school.jpg', 'class_room.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (20, 'school', 1, 0, 'ప్రధానోపాధ్యాయుడు', 'headmaster', 'pradhaanopaadhyaayudu', 'హెడ్మాస్టర్', 'head_master.jpg', 'head_master.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (21, 'food', 1, 0, 'కోడిగ్రుడ్డు', 'egg', 'koodigruddu', 'ఎగ్', 'egg.jpg', 'egg.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (22, 'food', 1, 0, 'కూరగాయలు', 'vegetables', 'kooragaayalu', 'వెజిటబుల్స్', 'vegetables.jpg', 'vegetables.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (23, 'food', 1, 0, 'పంచదార', 'sugar', 'pamchadaara', 'సుగర్', 'sugar.jpg', 'sugar.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (24, 'food', 1, 0, 'బియ్యము', 'rice', 'biyyamu', 'రైస్', 'rice.jpg', 'rice.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (25, 'food', 1, 0, 'పెరుగు', 'yogurt', 'perugu', 'యోగర్ట్', 'yogurt.jpg', 'yogurt.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (26, 'food', 1, 0, 'పచ్చడి', 'pickle', 'pachchadi', 'పికిల్', 'pickle.jpg', 'pickle.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (27, 'food', 1, 0, 'పులిహోర', 'yellowrice', 'pulihoora', 'ఎల్లోరైస్', 'yellow_rice.jpg', 'yellow_rice.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (28, 'food', 1, 0, 'బంగాళాదుంపలు', 'potatos', 'bamgaalaadumpalu', 'పొటాటోస్', 'potatos.jpg', 'potatos.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (29, 'food', 1, 0, 'పచ్చిమిరపకాయలు', 'greenchillies', 'pachchimirapakaayalu', 'గ్రీన్చిల్లీస్', 'green_chillies.jpg', 'green_chillies.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (30, 'food', 1, 0, 'బెండకాయలు', 'okra', 'bemdakaayalu', 'ఓక్రా', 'okra.jpg', 'okra.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (31, 'house1', 1, 0, 'ఇల్లు', 'house', '', '', 'house.jpg', 'house.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (32, 'house1', 1, 0, 'మంచము', '', 'mamchamu', '', 'cot.jpg', 'cot.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (33, 'house1', 1, 0, 'కుండ', '', '', 'paat', 'pot.jpg', 'pot.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (34, 'house1', 1, 0, 'చరవాణి', '', '', '', 'cell_phone.png', 'cell_phone.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20'),
# (35, 'house1', 1, 0, 'తలగడ', '', '', '', '', 'pillow.mp3', '', '', '2017-11-03 01:01:08', '2017-11-03 01:01:20');

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
  MODIFY `word_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
