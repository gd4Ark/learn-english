-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-01-21 09:07:54
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `learn_english`
--
CREATE DATABASE IF NOT EXISTS `learn_english` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `learn_english`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e292f6af4d8995560729cac5b0ffdbf9');

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE `book` (
  `id` int(6) NOT NULL,
  `name` varchar(16) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, '第一本单词书', '2018-12-28 20:06:41', '2019-01-19 09:25:26'),
(7, '水果单词本', '2019-01-10 10:15:14', '2019-01-10 10:15:14');

-- --------------------------------------------------------

--
-- 表的结构 `english`
--

CREATE TABLE `english` (
  `id` int(6) NOT NULL,
  `book_id` int(6) NOT NULL,
  `chinese` varchar(32) NOT NULL,
  `english` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `english`
--

INSERT INTO `english` (`id`, `book_id`, `chinese`, `english`, `created_at`, `updated_at`) VALUES
(16, 6, '白色', 'white', '2018-12-28 20:11:14', '2019-01-19 08:22:45'),
(17, 6, '绿色', 'green', '2018-12-28 20:11:22', '2018-12-28 20:11:22'),
(18, 6, '黄色', 'yellow', '2019-01-09 08:12:35', '2019-01-09 08:12:35'),
(19, 6, '黑色', 'black', '2019-01-09 08:12:44', '2019-01-09 08:12:44'),
(20, 6, '蓝色', 'blue', '2019-01-10 08:38:50', '2019-01-10 08:38:50'),
(21, 7, '苹果', 'apple', '2019-01-11 08:10:33', '2019-01-14 10:29:27'),
(22, 7, '红苹果', 'Red Apple', '2019-01-14 09:52:35', '2019-01-19 09:50:34');

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

CREATE TABLE `feedback` (
  `id` int(6) NOT NULL,
  `type` int(11) NOT NULL,
  `message` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `feedback`
--

INSERT INTO `feedback` (`id`, `type`, `message`, `contact`, `created_at`, `updated_at`) VALUES
(6, 1, '希望增加几个复习模块，比如全部拼写、英文选意这些。', '', '2019-01-19 01:55:40', '2019-01-19 01:55:40'),
(7, 0, '部分拼写完成时有点卡顿。。。。。。', '', '2019-01-19 01:58:31', '2019-01-19 01:58:31');

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE `log` (
  `id` int(6) NOT NULL,
  `version` varchar(20) NOT NULL,
  `feat` text,
  `fix` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`id`, `version`, `feat`, `fix`, `created_at`, `updated_at`) VALUES
(5, '1.0.0', '完成主体功能', '无', '2019-01-19 02:00:07', '2019-01-19 02:00:07'),
(6, '1.1.0', '增加复习模块-单词全部拼写', '无', '2019-01-21 00:02:20', '2019-01-21 00:02:20');

-- --------------------------------------------------------

--
-- 表的结构 `score`
--

CREATE TABLE `score` (
  `id` int(6) NOT NULL,
  `book_id` int(6) NOT NULL,
  `review_module` varchar(32) NOT NULL,
  `username` varchar(16) NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `score`
--

INSERT INTO `score` (`id`, `book_id`, `review_module`, `username`, `time`, `created_at`, `updated_at`) VALUES
(1, 6, '单词部分拼写', 'test-1', 3, '2019-01-19 01:52:12', '2019-01-19 01:52:12'),
(2, 6, '单词部分拼写', 'test-2', 2, '2019-01-19 01:52:36', '2019-01-19 01:52:36'),
(3, 6, '单词部分拼写', 'test-3', 3, '2019-01-19 01:52:58', '2019-01-19 01:52:58'),
(4, 6, '单词部分拼写', 'test-4', 2, '2019-01-19 01:53:20', '2019-01-19 01:53:20'),
(5, 7, '单词部分拼写', 'test-1', 5, '2019-01-19 01:53:51', '2019-01-19 01:53:51'),
(6, 7, '单词部分拼写', 'test-2', 3, '2019-01-19 01:54:04', '2019-01-19 01:54:04'),
(7, 7, '单词部分拼写', 'test-3', 2, '2019-01-19 01:54:18', '2019-01-19 01:54:18'),
(8, 7, '单词部分拼写', 'test-4', 3, '2019-01-19 01:54:33', '2019-01-19 01:54:33'),
(9, 7, '单词部分拼写', 'test-5', 4, '2019-01-19 01:57:19', '2019-01-19 01:57:19'),
(10, 6, '单词部分拼写', 'test-5', 2, '2019-01-19 01:57:52', '2019-01-19 01:57:52'),
(11, 6, '单词全部拼写', 'test-1', 4, '2019-01-20 23:40:39', '2019-01-20 23:40:39'),
(12, 6, '单词全部拼写', 'test-2', 3, '2019-01-20 23:43:46', '2019-01-20 23:57:27');

-- --------------------------------------------------------

--
-- 表的结构 `setting`
--

CREATE TABLE `setting` (
  `id` int(6) NOT NULL,
  `rank_limit_quantity` int(11) NOT NULL,
  `partial_spell_proportion` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `setting`
--

INSERT INTO `setting` (`id`, `rank_limit_quantity`, `partial_spell_proportion`, `created_at`, `updated_at`) VALUES
(1, 30, 0.5, '2019-01-18 05:30:03', '2019-01-18 00:56:27');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 表的索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `english`
--
ALTER TABLE `english`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- 表的索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `version` (`version`);

--
-- 表的索引 `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- 表的索引 `setting`
--
ALTER TABLE `setting`
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
-- 使用表AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `english`
--
ALTER TABLE `english`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `log`
--
ALTER TABLE `log`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `score`
--
ALTER TABLE `score`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 限制导出的表
--

--
-- 限制表 `english`
--
ALTER TABLE `english`
  ADD CONSTRAINT `english_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- 限制表 `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
