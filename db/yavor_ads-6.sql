-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 12:45 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ad_title` varchar(100) NOT NULL,
  `ad_text` text NOT NULL,
  `ad_image` varchar(256) NOT NULL,
  `ad_category` int(11) NOT NULL,
  `ad_town` int(11) NOT NULL,
  `ad_status` varchar(256) NOT NULL,
  `ad_date` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `owner_id`, `ad_title`, `ad_text`, `ad_image`, `ad_category`, `ad_town`, `ad_status`, `ad_date`) VALUES
(4, 3, 'HONDA CIVIC', 'nqma', '3\'.png', 2, 2, 'Inactive', '0000-00-00'),
(6, 4, 'HONDA CIVIC 1.4', '  The Honda Civic (Japanese Honda Shibikku) is a line of cars manufactured by Honda. Originally a subcompact, the Civic has gone through several generational changes, becoming both larger and more upmarket and moving into the compact car segment. EPA guidelines for vehicle size class stipulate a car having combined passenger and cargo room of 110 to 119.9 cubic feet (3,110 to 3,400 L) is considered a mid-size car, and as such the tenth generation Civic sedan is technically a small-end mid-size car, although it still competes in the compact class.[1] The Civic coupe is still considered a compact car. The Civic currently falls between the Honda Fit and Accord.', '2.png', 8, 2, 'Rejected', '2018-02-12'),
(10, 3, 'New Peptid za dushata', '   Pozvunete na Pepi za dostavka !!!', '1.png', 4, 9, 'Inactive', '18-Nov-2018'),
(11, 3, 'ÐŸÑ€Ð¾Ð´Ð°Ð²Ð°Ð¼ Ð´Ð–Ð¸Ð±Ñ€Ð¸', ' Ð‘Ð¸Ð¾ Ð´Ð¶Ð°Ð½ÐºÐ¸ Ð¾Ñ‚ ÐºÐ²Ð°Ñ€Ñ‚Ð°Ð» ÐœÐ»Ð°Ð´Ð¾ÑÑ‚- Ð¡Ð¾Ñ„Ð¸Ñ', '1.png', 4, 6, 'Published', '19-Nov-2018'),
(12, 3, 'C++ Java Python', '          General Manager: Alex Tosha\r\n\r\nBooking Manager: Boki Novokmet: +38765583577 ;', '1.png', 4, 5, 'Published', '19-Nov-2018'),
(13, 2, 'Novot0 audi 118o9', '           Honda, audi,Milan i vsichkooo', '1.png', 2, 7, 'Rejected', '2018-12-29'),
(14, 2, 'New Peptid za dushata i surtceto mi', '  Pepi ste vi kaje Vednaga', '1.png', 4, 2, 'Rejected', '17-Nov-2018'),
(15, 2, 'Kak si', 'Dobre', '1.png', 8, 7, 'Rejected', '08-Dec-2018'),
(16, 2, 'Vilici i kujici', '    Koi sum az', '1.png', 2, 2, 'Published', '2018-12-31'),
(17, 2, 'C++ Java Python i php', 'php i pascal', '1.png', 5, 6, 'Published', '09-Dec-2018'),
(18, 2, 'New Peptid za dushata 234', '2we3e1e3r3r33r', '2.png', 9, 9, 'Rejected', '09-Dec-2018'),
(19, 2, 'Dobe li e', '    Da mnogo', '2.png', 5, 5, 'Rejected', '2014-12-13'),
(21, 2, 'Kotki', 'Kucheta', '1.png', 1, 1, 'Published', '19-Dec-2018'),
(22, 2, 'Baba meca', 'stypkam q s keca', '1.png', 9, 1, 'Waiting Approval', '19-Dec-2018'),
(23, 2, 'Keca', 'sssssss', '2.png', 8, 7, 'Waiting Approval', '19-Dec-2018'),
(24, 3, 'HaPPy Year', 'and new year', '1.png', 9, 8, 'Published', '26-Dec-2018'),
(26, 2, 'Honda e mqota kola', 'da tq e', '2.png', 6, 6, 'Waiting Approval', '26-Dec-2018'),
(30, 4, 'Honda Civic 2019', 'The best model', '1.png', 1, 1, 'Published', '01-Jan-2019'),
(31, 3, 'ZAvalq snqg i grad', 'v sofiq i regiona', '1.png', 5, 1, 'Waiting Approval', '04-Jan-2019'),
(32, 2, 'edge of sanity', 'Crimson The greatest album', '2.png', 4, 6, 'Waiting Approval', '04-Jan-2019'),
(33, 4, 'New Project', 'Hiiiii', '1.png', 4, 8, 'Rejected', '19-Jan-2019'),
(34, 4, 'laptop Acer', '8 ram', '6.jpg', 1, 1, 'Waiting Approval', '19-Jan-2019');

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
(8, 'Fresh fruits 2'),
(9, 'Porn'),
(11, 'dildo'),
(12, 'Water');

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
(2, 'yavor', 'dc4f720ea3a95a4cf55f690a39695da7', 'Yavor_Junior', 'yavor@asd.bg', '0888555333', 'Sandanski'),
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
(10, 'Sozopol 1'),
(11, 'Zlokuchene'),
(12, 'Bansko');

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
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
