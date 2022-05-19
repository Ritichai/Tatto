-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 05:21 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tattoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

CREATE TABLE `book_status` (
  `book_tattoo_status_id` int(11) NOT NULL,
  `book_tattoo_status` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`book_tattoo_status_id`, `book_tattoo_status`) VALUES
(1, 'รอการสัก'),
(2, 'ได้รับการสัก');

-- --------------------------------------------------------

--
-- Table structure for table `book_tattoos`
--

CREATE TABLE `book_tattoos` (
  `id_member` int(11) NOT NULL,
  `book_tattoo_date` date NOT NULL,
  `book_tattoo_size` int(11) NOT NULL,
  `book_tattoo_color` int(11) NOT NULL,
  `book_tattoo_status` int(11) NOT NULL,
  `book_admin_set_time` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book_tattoos`
--

INSERT INTO `book_tattoos` (`id_member`, `book_tattoo_date`, `book_tattoo_size`, `book_tattoo_color`, `book_tattoo_status`, `book_admin_set_time`) VALUES
(16, '2018-05-07', 1, 2, 1, '2018-05-06'),
(45, '2018-05-08', 3, 2, 1, '2018-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_username` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_password` varchar(50) COLLATE utf8_bin NOT NULL,
  `ttl_id` int(10) NOT NULL,
  `member_fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_tel` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_status` enum('member','admin','','') COLLATE utf8_bin NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_username`, `member_password`, `ttl_id`, `member_fname`, `member_lname`, `member_email`, `member_tel`, `member_status`) VALUES
(8, 'ritichaij', '123456', 1, 'SSS', 'จตุรภาค', 'kewkew5588@gmail.com', '0864052015', 'admin'),
(16, 'kewkew5588', '123456', 1, 'ฤทธิชัย', 'จตุรภาค', 'kewkew5588@gmail.com', '0864052015', 'member'),
(45, 'herorqj', '123456', 1, 'ฤทธิชัย', 'จตุรภาค', 'kewkew5588@gmail.com', '0864052015', 'member'),
(46, 'folk', 'folk', 1, 'folk', 'klof', 'asdfj@dflg.com', '0930702753', 'member'),
(47, 'Hahaha', '123456', 1, 'A', 'A', 'kewkew5588@gmail.com', '0930702753', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tattoo_color`
--

CREATE TABLE `tattoo_color` (
  `tattoo_color_id` int(10) NOT NULL,
  `tattoo_color_name` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'สีของรอยสัก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tattoo_color`
--

INSERT INTO `tattoo_color` (`tattoo_color_id`, `tattoo_color_name`) VALUES
(1, 'สักสี'),
(2, 'สักขาวดำ');

-- --------------------------------------------------------

--
-- Table structure for table `tattoo_size`
--

CREATE TABLE `tattoo_size` (
  `tattoo_size_id` int(10) NOT NULL,
  `tattoo_size_name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'ขนาดรอยสัก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tattoo_size`
--

INSERT INTO `tattoo_size` (`tattoo_size_id`, `tattoo_size_name`) VALUES
(1, 'ขนาดเล็ก 500 - 5,000 '),
(2, 'ขนาดกลาง 5,000-10,000'),
(3, 'ขนาดใหญ่ 10,000 บาทขึ้นไป');

-- --------------------------------------------------------

--
-- Table structure for table `ttl_anme`
--

CREATE TABLE `ttl_anme` (
  `ttl_id` int(1) NOT NULL,
  `ttl_name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT 'คำนำหน้าชื่อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ttl_anme`
--

INSERT INTO `ttl_anme` (`ttl_id`, `ttl_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'ชื่อผู้ใช้',
  `user_password` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'รหัสผ่าน',
  `ttl_id` int(11) NOT NULL COMMENT 'คำนำหน้าชืื่อ',
  `user_lname` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'ชื่อ',
  `user_fname` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'นามสกุล',
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL COMMENT 'อีเมล',
  `user_tel` varchar(10) COLLATE utf8_bin NOT NULL COMMENT 'เบอร์โทรศัพท์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_status`
--
ALTER TABLE `book_status`
  ADD PRIMARY KEY (`book_tattoo_status_id`);

--
-- Indexes for table `book_tattoos`
--
ALTER TABLE `book_tattoos`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tattoo_color`
--
ALTER TABLE `tattoo_color`
  ADD PRIMARY KEY (`tattoo_color_id`);

--
-- Indexes for table `tattoo_size`
--
ALTER TABLE `tattoo_size`
  ADD PRIMARY KEY (`tattoo_size_id`);

--
-- Indexes for table `ttl_anme`
--
ALTER TABLE `ttl_anme`
  ADD PRIMARY KEY (`ttl_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_status`
--
ALTER TABLE `book_status`
  MODIFY `book_tattoo_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tattoo_color`
--
ALTER TABLE `tattoo_color`
  MODIFY `tattoo_color_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tattoo_size`
--
ALTER TABLE `tattoo_size`
  MODIFY `tattoo_size_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ttl_anme`
--
ALTER TABLE `ttl_anme`
  MODIFY `ttl_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
