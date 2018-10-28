-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2018-10-27 22:54:48
-- 服务器版本： 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qy_english`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `name` varchar(16) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `day_rank_count` int(3) NOT NULL,
  `total_rank_count` int(3) NOT NULL,
  `part_spell_proportion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`id`, `day_rank_count`, `total_rank_count`, `part_spell_proportion`) VALUES
(1, 30, 30, 0.5);

-- --------------------------------------------------------

--
-- 表的结构 `english`
--

CREATE TABLE `english` (
  `id` int(6) NOT NULL,
  `word_book_id` int(6) NOT NULL,
  `english` varchar(32) NOT NULL,
  `chinese` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `english`
--

INSERT INTO `english` (`id`, `word_book_id`, `english`, `chinese`) VALUES
(100, 92, 'red', '红色'),
(101, 92, 'blue', '蓝色'),
(102, 92, 'green', '绿色'),
(103, 92, 'yellow', '黄色'),
(104, 92, 'black', '黑色'),
(105, 92, 'white', '白色'),
(106, 96, 'apple', '苹果'),
(107, 96, 'banana', '香蕉'),
(108, 96, 'pear', '梨子'),
(109, 96, 'orange', '橙子');

-- --------------------------------------------------------

--
-- 表的结构 `score`
--

CREATE TABLE `score` (
  `id` int(16) NOT NULL,
  `word_book_id` int(16) NOT NULL,
  `name` varchar(16) NOT NULL,
  `time` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `score`
--

INSERT INTO `score` (`id`, `word_book_id`, `name`, `time`, `date`) VALUES
(1, 92, '123', 123, '2018-10-27 03:51:39'),
(2, 92, '123', 123123, '2018-10-26 03:51:47'),
(3, 96, '12313123', 18, '2018-10-27 03:52:11'),
(4, 96, '123123123', 18, '2018-10-27 03:52:31'),
(5, 96, '123123123123123', 21, '2018-10-27 03:59:24'),
(6, 96, '4ark', 1, '2018-10-27 04:11:31'),
(7, 92, '蔡红辉', 21, '2018-10-27 05:50:05'),
(8, 92, 'gd4ark', 72, '2018-10-27 05:56:36'),
(9, 92, '123', 23, '2018-10-27 06:21:36'),
(10, 92, '123123123', 23, '2018-10-27 06:23:09'),
(11, 92, 'ee', 36, '2018-10-27 14:49:32'),
(12, 96, '123123123', 18, '2018-10-27 14:52:01');

-- --------------------------------------------------------

--
-- 表的结构 `word_book`
--

CREATE TABLE `word_book` (
  `id` int(6) NOT NULL,
  `title` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `word_book`
--

INSERT INTO `word_book` (`id`, `title`) VALUES
(92, '单词本-颜色'),
(96, '单词本-水果'),
(97, '单词本-语言');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`name`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `english`
--
ALTER TABLE `english`
  ADD PRIMARY KEY (`id`),
  ADD KEY `word_book_id` (`word_book_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `word_book_id` (`word_book_id`);

--
-- Indexes for table `word_book`
--
ALTER TABLE `word_book`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `english`
--
ALTER TABLE `english`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- 使用表AUTO_INCREMENT `score`
--
ALTER TABLE `score`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `word_book`
--
ALTER TABLE `word_book`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- 限制导出的表
--

--
-- 限制表 `english`
--
ALTER TABLE `english`
  ADD CONSTRAINT `english_ibfk_1` FOREIGN KEY (`word_book_id`) REFERENCES `word_book` (`id`);

--
-- 限制表 `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`word_book_id`) REFERENCES `word_book` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
