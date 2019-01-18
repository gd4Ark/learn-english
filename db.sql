-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-01-18 15:32:10
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
(1, 'admin', '15ff02e8983acf94a2d72a385a4a9dc4');

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
(6, '第一本单词书', '2018-12-28 20:06:41', '2019-01-15 08:53:52'),
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
(16, 6, '白色', 'white', '2018-12-28 20:11:14', '2018-12-28 20:11:14'),
(17, 6, '绿色', 'green', '2018-12-28 20:11:22', '2018-12-28 20:11:22'),
(18, 6, '黄色', 'yellow', '2019-01-09 08:12:35', '2019-01-09 08:12:35'),
(19, 6, '黑色', 'black', '2019-01-09 08:12:44', '2019-01-09 08:12:44'),
(20, 6, '蓝色', 'blue', '2019-01-10 08:38:50', '2019-01-10 08:38:50'),
(21, 7, '苹果', 'apple', '2019-01-11 08:10:33', '2019-01-14 10:29:27'),
(22, 7, '123123123', 'red apple', '2019-01-14 09:52:35', '2019-01-14 10:29:16');

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
(2, 0, '123', '123', '2019-01-18 04:58:09', '2019-01-18 04:58:09'),
(3, 1, '123123', '123123', '2019-01-18 04:58:17', '2019-01-18 04:58:17'),
(4, 0, '有BUG', '123123', '2019-01-18 04:58:25', '2019-01-18 04:58:25'),
(5, 1, '单词添加语音', '', '2019-01-18 04:58:37', '2019-01-18 04:58:37');

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
(1, 7, '单词部分拼写', '123123123', 3, '2019-01-10 00:22:50', '2019-01-10 00:22:50'),
(2, 7, '单词部分拼写', '1231231231', 2, '2019-01-10 00:36:56', '2019-01-10 00:38:05'),
(3, 7, '单词部分拼写', '123123', 3, '2019-01-11 00:40:31', '2019-01-11 00:40:31'),
(4, 7, '单词部分拼写', '测试一', 3, '2019-01-10 00:41:09', '2019-01-11 00:41:09'),
(5, 7, '单词部分拼写', '测试二', 2, '2019-01-11 00:41:54', '2019-01-11 00:41:54'),
(6, 7, '单词部分拼写', '测试三', 3, '2019-01-11 00:42:55', '2019-01-11 00:42:55'),
(7, 6, '单词部分拼写', '蔡红辉', 3, '2019-01-11 01:05:41', '2019-01-17 02:53:20'),
(8, 7, '单词部分拼写', '蔡红辉', 3, '2019-01-11 23:39:44', '2019-01-11 23:39:44'),
(9, 7, '', '13123123', 3, '2019-01-12 22:33:39', '2019-01-12 22:33:39'),
(10, 7, '单词部分拼写', '123', 1, '2019-01-12 22:35:31', '2019-01-12 22:35:31'),
(11, 6, '单词部分拼写', '哈哈哈', 31, '2019-01-14 01:21:55', '2019-01-14 01:21:55'),
(12, 7, '单词部分拼写', '213123123123aa', 2, '2019-01-14 01:26:24', '2019-01-14 01:26:24'),
(13, 7, '单词部分拼写', 'honghui', 17, '2019-01-14 02:31:58', '2019-01-14 02:31:58'),
(14, 7, '单词部分拼写', '蔡红辉2', 4, '2019-01-15 01:13:52', '2019-01-15 01:13:52');

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `score`
--
ALTER TABLE `score`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
