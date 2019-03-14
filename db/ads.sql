-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 12:13 AM
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
  `ad_category` varchar(256) NOT NULL,
  `ad_town` varchar(256) NOT NULL,
  `ad_status` int(11) NOT NULL,
  `ad_date` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `owner_id`, `ad_title`, `ad_text`, `ad_image`, `ad_category`, `ad_town`, `ad_status`, `ad_date`) VALUES
(1, 2, 'HONDA CIVIC', '       Extremely strange!!!', '2.png', '4', '10', 0, '15-Nov-2015'),
(4, 3, 'HONDA CIVIC', 'nqma', '3\'.png', '2', '2', 2, '0000-00-00'),
(6, 4, 'HONDA CIVIC 1.4', 'The Honda Civic (Japanese Honda Shibikku) is a line of cars manufactured by Honda. Originally a subcompact, the Civic has gone through several generational changes, becoming both larger and more upmarket and moving into the compact car segment. EPA guidelines for vehicle size class stipulate a car having combined passenger and cargo room of 110 to 119.9 cubic feet (3,110 to 3,400 L) is considered a mid-size car, and as such the tenth generation Civic sedan is technically a small-end mid-size car, although it still competes in the compact class.[1] The Civic coupe is still considered a compact car. The Civic currently falls between the Honda Fit and Accord.', '2.png', '2', '2', 1, '0000-00-00'),
(7, 2, 'Helooo Vanka', 'Zdravei, prodavam peptidi', '1.png', '8', '8', 2, '2018-11-18'),
(8, 2, 'Helooo Vanka 234', ' woiwoiwoiioweiooieoierr', '1.png', '4', '6', 0, '0000-00-00'),
(9, 2, 'Helooo', '   Peptidi i Peptidi', '1.png', '7', '9', 2, '18-Nov-2018'),
(10, 3, 'New Peptid za dushata', '   Pozvunete na Pepi za dostavka !!!', '1.png', '4', '9', 0, '18-Nov-2018'),
(11, 3, 'ÐŸÑ€Ð¾Ð´Ð°Ð²Ð°Ð¼ Ð´Ð–Ð¸Ð±Ñ€Ð¸', ' Ð‘Ð¸Ð¾ Ð´Ð¶Ð°Ð½ÐºÐ¸ Ð¾Ñ‚ ÐºÐ²Ð°Ñ€Ñ‚Ð°Ð» ÐœÐ»Ð°Ð´Ð¾ÑÑ‚- Ð¡Ð¾Ñ„Ð¸Ñ', '1.png', '4', '6', 0, '19-Nov-2018'),
(12, 3, 'C++ Java Python', '          General Manager: Alex Tosha\r\n\r\nBooking Manager: Boki Novokmet: +38765583577 ;', '1.png', '4', '5', 0, '19-Nov-2018'),
(13, 2, 'Novot0 audi 118o9', '     Honda, audi,Milan i vsichkooo', '1.png', '4', '4', 0, '16-Nov-2018'),
(14, 2, 'New Peptid za dushata i surtceto mi', '  Pepi ste vi kaje Vednaga', '1.png', '4', '0', 0, '17-Nov-2018');

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
(5, 'Sports'),
(6, 'Medical'),
(7, 'Education'),
(8, 'Food'),
(9, 'Fresh fruits 2'),
(10, 'Porn');

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
(4, 'honda', 'f3c8938636c86583fe2978440c0d19d2', 'Miro', 'unibit123@abv.bg', '0888563146', 'Varna');

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
(10, 'Sozopol 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

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
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
