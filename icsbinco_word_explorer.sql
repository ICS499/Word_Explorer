-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 04:03 PM
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
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `word_id` int(11) NOT NULL,
  `Topic` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `words` (`word_id`, `Topic`, `Telugu_Word`, `English_Word`, `Telugu_in_English`, `English_in_Telugu`, `Image_Name`, `Audio_Name`, `Notes`, `Description`, `Created_Date`, `Last_Updated`) VALUES
(2, 'Universe', 'చంద్రుడు', 'moon ', 'Candruḍu', 'మూన్', 'moon.jpg', 'moon.mpg', '', 'this is a word related to universe topic', '2017-09-27 05:00:00', '2017-09-28 18:19:12'),
(3, 'Animal', 'కుక్క', 'dog', 'dog', 'కుక్క', 'dog.jpg', 'dog.mpg', '', 'this is a word related to the animal topic', '2017-09-28 18:31:11', '2017-09-28 18:32:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`word_id`,`character_index`,`character_value`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`word_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `word_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
