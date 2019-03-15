-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 01:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yavor_ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `ad_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ad_text` text CHARACTER SET utf8 NOT NULL,
  `ad_image` varchar(256) CHARACTER SET utf8 NOT NULL,
  `ad_category` int(11) NOT NULL,
  `ad_town` int(11) NOT NULL,
  `ad_status` varchar(256) CHARACTER SET utf8 NOT NULL,
  `ad_date` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `owner_id`, `ad_title`, `ad_text`, `ad_image`, `ad_category`, `ad_town`, `ad_status`, `ad_date`) VALUES
(4, 3, 'Morbi viverra ipsum at ligula lacinia ullamcorper', '  Phasellus tincidunt lacinia ante quis sollicitudin', '2.png', 2, 2, 'Inactive', '2018-02-20'),
(6, 4, 'HONDA CIVIC 1.4', '   The Honda Civic (Japanese Honda Shibikku) is a line of cars manufactured by Honda. Originally a subcompact, the Civic has gone through several generational changes, becoming both larger and more upmarket and moving into the compact car segment. ', '2.png', 1, 2, 'Rejected', '2018-02-12'),
(10, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '     Cras auctor turpis vestibulum massa faucibus, egestas euismod nunc porta', '1.png', 4, 9, 'Inactive', '2012-02-02'),
(11, 3, 'ÐŸÑ€Ð¾Ð´Ð°Ð²Ð°Ð¼ ÑÐ¸ÑÑ‚ÐµÐ¼Ð° Ð·Ð° Ð¿Ñ€ÐµÑ‡Ð¸ÑÑ‚Ð²Ð°Ð½Ðµ Ð½Ð° Ð²Ð¾Ð´Ð°.', 'ÐŸÑ€ÐµÑ‡Ð¸ÑÑ‚Ð²Ð° Ð²ÑÐ¸Ñ‡ÐºÐ¸ Ð²Ñ€ÐµÐ´Ð½Ð¸ ÑÑŠÑÑ‚Ð°Ð²ÐºÐ¸ Ð² Ð½ÐµÑ Ð¸ Ð¾ÑÑ‚Ð°Ð²Ð° ÑÐ°Ð¼Ð¾ Ð¿Ð¾Ð»ÐµÐ·Ð½Ð¸Ñ‚Ðµ Ð²ÐµÑ‰ÐµÑÑ‚Ð²Ð° Ð²ÑŠÐ² Ð²Ð¾Ð´Ð°Ñ‚Ð°. Ð¡Ð¸ÑÑ‚ÐµÐ¼Ð°Ñ‚Ð° Ð¿Ñ€ÐµÐ´Ð»Ð°Ð³Ð° ÐºÐ°Ñ‚Ð¾ Ð±Ð¾Ð½ÑƒÑ Ð±ÐµÐ·Ð¿Ð»Ð°Ñ‚ÐµÐ½ Ñ„Ð¸Ð»Ñ‚ÑŠÑ€.', '1.png', 12, 6, 'Published', '2019-03-16'),
(12, 3, 'Office Assistant - Kaufland Banishora ', '        Make a successful climb in your career in an international team of IT experts. ', '1.png', 15, 1, 'Published', '2019-12-23'),
(13, 2, ' Audi a8 2012 1.8', '           Price: 13 000 $ For more information \r\n view my profile.', 'audi.jpg', 1, 7, 'Rejected', '2018-03-29'),
(14, 2, 'ÐŸÐµÐ¿Ñ‚Ð¸Ð´Ð¸ Ð’Ð¸Ñ‚Ð°Ð¿ÐµÐ¿Ñ‚', '  ÐŸÐ¾Ð¼Ð°Ð³Ð°Ñ‚ Ð·Ð° Ð¿Ð¾-Ð·Ð´Ñ€Ð°Ð²Ð¸ ÐºÑ€ÑŠÐ²Ð¾Ð½Ð¾ÑÐ½Ð¸ ÑÑŠÐ´Ð¾Ð²Ðµ. ÐŸÐ¾Ð²ÐµÑ‡Ðµ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð½Ð° 088834562311', '1.png', 5, 2, 'Rejected', '2018-12-17'),
(15, 2, 'ÐÐ½Ð°Ð½Ð°Ñ Ð¾Ñ‚ Ð•ÐºÐ²Ð°Ð´Ð¾Ñ€', 'ÐŸÑ€Ð¾Ð´Ð°Ð²Ð°Ð¼ ÑÑƒÑˆÐµÐ½ Ð°Ð½Ð°Ð½Ð°Ñ Ð¾Ñ‚ ÐµÐºÐ²Ð°Ð´Ð¾Ñ€ Ñ Ð³Ð°Ñ€Ð°Ð½Ñ‚Ð¸Ñ€Ð°Ð½Ð¾ ÐºÐ°Ñ‡ÐµÑÑ‚Ð²Ð¾.', 'ananas.jpg', 8, 7, 'Rejected', '08-Dec-2018'),
(16, 2, 'Full Stack Web Developer', '1 year of experience in one or more Back-end languages (C#, Java, C++, Python, Go, PHP, RoR, etc.)\r\nExperience with Front-end technologies\r\n', '1.png', 15, 2, 'Published', '2018-12-31'),
(17, 2, 'FULL STACK PHP WEB DEVELOPER', 'Strong knowledge of PHP web frameworks {{such as Laravel, Yii, etc depending on your technology stack}}', '1.png', 15, 6, 'Published', '09-Dec-2018'),
(18, 2, 'NUTRILITEâ„¢ Vitamin B Plus', 'Just one bi-layer tablet per day delivers 100% NRV* of all eight essential B Vitamins: thiamine (B1), riboflavin (B2), niacin (B3), pantothenic acid (B5), pyridoxine (B6), biotin (B7), folic acid (B9) and cobalamin (B12).\r\n', '2.png', 14, 9, 'Rejected', '09-Dec-2018'),
(19, 2, 'ÐÐ°Ð¹-Ð´Ð¾Ð±Ñ€Ð°Ñ‚Ð° Ð·Ð°Ñ‰Ð¸Ñ‚Ð° ÑÑ€ÐµÑ‰Ñƒ Ð¸Ð·Ð³Ð°Ñ€ÑÐ½Ð¸Ñ', 'ÐŸÑ€Ð¾Ð±Ð²Ð°Ð¹Ñ‚Ðµ Ð½Ð¾Ð²Ð¸Ñ ÐºÑ€ÐµÐ¼ Ð½Ð° ÐÐ¸Ð²ÐµÑ Ð½Ð° Ð¿Ñ€Ð¾Ð¼Ð¾Ñ†Ð¸Ð¾Ð½Ð°Ð»Ð°Ð½Ð°Ñ‚Ð° Ñ†ÐµÐ½Ð° Ð¾Ñ‚ 21 Ð»ÐµÐ²Ð°.', 'nivea.jpg', 5, 5, 'Rejected', '2014-12-13'),
(21, 2, 'British Shorthair is selling', 'Male, 2 years old', 'cat.jpg', 9, 7, 'Published', '2019-02-14'),
(22, 2, 'ÐŸÑ€Ð¾Ð´Ð°Ð²Ð°Ð¼ Ð¥Ð°Ñ€Ð¸ ÐŸÐ¾Ñ‚ÑŠÑ€Ñ€ Ð½Ð° ÑÑ‚Ð°Ñ€Ð¾ Ð²ÑÐ¸Ñ‡ÐºÐ¸ Ñ‡Ð°ÑÑ‚Ð¸.', ' Ð¦ÐµÐ½Ð° 45 Ð»ÐµÐ²Ð°. Ð—Ð° Ð¿Ð¾Ð²ÐµÑ‡Ðµ Ð¸Ð½Ñ„Ð¾ Ð½Ð° ozone.bg', 'potter.jpg', 11, 1, 'Inactive', '19-Dec-2018'),
(24, 3, 'Aliquam a arcu rhoncus, vulputate ex eget, imperdiet tortor.', 'Nam bibendum, felis quis maximus bibendum, enim mauris molestie ante,', '1.png', 9, 8, 'Published', '2012-12-20'),
(26, 2, 'HONDA CIVIC 2004 1.6', 'Ð”Ð¾ÑÑ‚Ð° Ð·Ð°Ð¿Ð°Ð·ÐµÐ½Ð°, Ð·Ð° Ð¿Ð¾Ð²ÐµÑ‡Ðµ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð¿Ð¸ÑˆÐµÑ‚Ðµ Ð½Ð° Ð»Ð¸Ñ‡Ð½Ð¾.', '2.png', 1, 6, 'Inactive', '2018-02-12'),
(30, 4, 'Honda Civic 2019', 'The best model', '1.png', 1, 1, 'Published', '01-Jan-2019'),
(31, 3, 'ÐŸÑ€Ð¾Ð´Ð°Ð²Ð°Ð¼ Ð»ÐµÑ‡ÐµÐ±ÐµÐ½ ÐºÑ€ÐµÐ¼', 'ÐšÑ€ÐµÐ¼ Ð¿Ñ€Ð¾Ñ‚Ð¸Ð² Ð±Ñ€ÑŠÑ‡ÐºÐ¸ Ð¸ Ð·Ð°ÑÑ‚Ð°Ñ€ÑÐ²Ð°Ð½Ðµ Ð½Ð° ÐºÐ¾Ð¶Ð°Ñ‚Ð°.', '1.png', 5, 1, 'Inactive', '2017-12-12'),
(32, 2, 'Edge of sanity - Crimson ', ' Crimson (Original Edition) Import, Original recording', 'crimson.jpg', 13, 6, 'Waiting Approval', '2019-02-20'),
(33, 4, 'ÐŸÑ€Ð¾Ð´Ð°Ð²Ð°Ð¼ Ñ„ÑƒÑ‚Ð±Ð¾Ð»Ð½Ð¸ Ñ‚ÐµÐ½Ð¸ÑÐºÐ¸', ' ÐŸÑ€Ð¾Ð´Ð°Ð²Ð°Ð¼ Ñ„ÑƒÑ‚Ð±Ð¾Ð»Ð½Ð¸ Ñ‚ÐµÐ½Ð¸ÑÐºÐ¸ Ð½Ð° Ð²Ð¾Ð´ÐµÑ‰Ð¸ ÐµÐ²Ñ€Ð¾Ð¿ÐµÐ¹ÑÐºÐ¸ Ð¾Ñ‚Ð±Ð¾Ñ€Ð¸. Ð—Ð° Ð¿Ð¾Ð²ÐµÑ‡Ðµ Ð¸Ð½Ñ„Ð¾ Ð¿Ð¾ÑÐµÑ‚ÐµÑ‚Ðµ ÑÐ°Ð¹Ñ‚Ð° Ð¼Ð¸.', 'arsenal.jpg', 4, 8, 'Rejected', '2019-03-14'),
(34, 4, 'laptop Acer', ' 8 ram', '6.jpg', 2, 1, 'Rejected', '2016-12-02'),
(35, 2, 'Laptop Acer nitro 5', 'Laptop acer nitro 5 - second hand with 2 years warranty.', '6.jpg', 2, 1, 'Published', '01-Mar-2019'),
(36, 2, 'Protect amur tigers and amur leopards', '        Dont kill them and their prey.', 'amur.jpg', 6, 14, 'Published', '01-Mar-2019');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(0, 'All'),
(1, 'Cars'),
(2, 'Electronics'),
(3, 'Properties'),
(4, 'Sports'),
(5, 'Medical'),
(6, 'Education'),
(8, 'Fresh fruits'),
(9, 'Animals'),
(11, 'books'),
(12, 'Water'),
(13, 'music'),
(14, 'Amway'),
(15, 'job');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_username` varchar(20) NOT NULL,
  `member_pass` varchar(256) NOT NULL,
  `member_name` varchar(20) NOT NULL,
  `member_email` varchar(25) NOT NULL,
  `member_phone` varchar(20) NOT NULL,
  `member_town` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_username`, `member_pass`, `member_name`, `member_email`, `member_phone`, `member_town`) VALUES
(1, 'my-admin', 'e10adc3949ba59abbe56e057f20f883e', 'Kiril', 'milan_monster@abv.bg', '188815133383', 'Burgas'),
(2, 'yavor', '2ab3343875e56dc0a15cbb6a98570cf2', 'Yavor_Junior', 'yavor@asd.bg', '0888555333', 'Sandanski'),
(3, 'mirojekov', 'dc4f720ea3a95a4cf55f690a39695da7', 'Kashukeev', 'pop@abv.bg', '08885631468', 'Pleven'),
(4, 'honda', 'dc4f720ea3a95a4cf55f690a39695da7', 'Miro', 'unibit123@abv.bg', '0888563146', 'Varna'),
(6, 'milanusta', 'dc4f720ea3a95a4cf55f690a39695da7', 'Suso', 'milan@suso.bg', '04567778867898', 'Varna');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `town_id` int(11) NOT NULL,
  `town_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`town_id`, `town_name`) VALUES
(0, 'All'),
(1, 'Sofia'),
(2, 'Plovdiv'),
(3, 'Sandanski'),
(4, 'Ruse'),
(5, 'Varna'),
(6, 'Burgas'),
(7, 'Petrich'),
(8, 'Pleven'),
(9, 'Blagoevgrad'),
(10, 'Sozopol '),
(11, 'Zlokuchene'),
(12, 'Bansko'),
(13, 'Vratsa'),
(14, 'Montana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `ad_category` (`ad_category`),
  ADD KEY `ad_town` (`ad_town`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`town_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_ibfk_2` FOREIGN KEY (`ad_category`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_ibfk_3` FOREIGN KEY (`ad_town`) REFERENCES `towns` (`town_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
