-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-03-13 13:04:36
-- 服务器版本： 5.7.24
-- PHP 版本： 7.2.14

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
-- 表的结构 `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e292f6af4d8995560729cac5b0ffdbf9');

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, '第一本单词书', '2018-12-28 12:06:41', '2019-01-19 01:25:26'),
(7, '水果单词本', '2019-01-10 02:15:14', '2019-01-10 02:15:14');

-- --------------------------------------------------------

--
-- 表的结构 `englishes`
--

DROP TABLE IF EXISTS `englishes`;
CREATE TABLE IF NOT EXISTS `englishes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `book_id` int(6) NOT NULL,
  `chinese` varchar(32) NOT NULL,
  `english` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `englishes`
--

INSERT INTO `englishes` (`id`, `book_id`, `chinese`, `english`, `created_at`, `updated_at`) VALUES
(16, 6, '白色', 'white', '2018-12-28 12:11:14', '2019-01-19 00:22:45'),
(17, 6, '绿色', 'green', '2018-12-28 12:11:22', '2018-12-28 12:11:22'),
(18, 6, '黄色', 'yellow', '2019-01-09 00:12:35', '2019-01-09 00:12:35'),
(19, 6, '黑色', 'black', '2019-01-09 00:12:44', '2019-01-09 00:12:44'),
(20, 6, '蓝色', 'blue', '2019-01-10 00:38:50', '2019-01-10 00:38:50'),
(21, 7, '苹果', 'apple', '2019-01-11 00:10:33', '2019-01-14 02:29:27'),
(22, 7, '红苹果', 'Red Apple', '2019-01-14 01:52:35', '2019-01-19 01:50:34');

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `message` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `feedback`
--

INSERT INTO `feedback` (`id`, `type`, `message`, `contact`, `created_at`, `updated_at`) VALUES
(6, 1, '希望增加几个复习模块，比如全部拼写、英文选意这些。', '', '2019-01-19 01:55:40', '2019-01-19 01:55:40'),
(7, 0, '部分拼写完成时有点卡顿。。。。。。', '', '2019-01-19 01:58:31', '2019-01-19 01:58:31'),
(8, 0, '123123123123123123', '', '2019-01-28 02:23:17', '2019-01-28 02:23:17'),
(9, 0, '213123123123123123123', '', '2019-01-28 02:23:24', '2019-01-28 02:23:24'),
(10, 0, '21312321312312312312123123', '', '2019-01-28 02:23:28', '2019-01-28 02:23:28'),
(11, 0, '1231233333333333333333333', '', '2019-01-28 02:23:34', '2019-01-28 02:23:34'),
(12, 0, '12312312123123123123', '123123123123123', '2019-01-28 02:24:27', '2019-01-28 02:24:27'),
(13, 0, '123123123123123123123', '', '2019-01-28 02:26:34', '2019-01-28 02:26:34'),
(14, 0, '123123123123123123213', '', '2019-01-28 02:27:04', '2019-01-28 02:27:04'),
(15, 0, '123123123123123123213', '', '2019-01-28 02:27:06', '2019-01-28 02:27:06'),
(16, 0, '123123123123123123213', '', '2019-01-28 02:27:07', '2019-01-28 02:27:07'),
(17, 0, '123123123123123123213', '', '2019-01-28 02:27:07', '2019-01-28 02:27:07'),
(18, 0, '123123123123123123213', '', '2019-01-28 02:27:07', '2019-01-28 02:27:07'),
(19, 0, '123123123123123123213', '', '2019-01-28 02:27:07', '2019-01-28 02:27:07'),
(20, 0, '123123123123123123213', '', '2019-01-28 02:27:07', '2019-01-28 02:27:07'),
(21, 0, '123123123123123123213', '', '2019-01-28 02:27:08', '2019-01-28 02:27:08'),
(22, 0, '123123123123123123213', '', '2019-01-28 02:27:08', '2019-01-28 02:27:08'),
(23, 0, '123123123123123123213', '', '2019-01-28 02:30:23', '2019-01-28 02:30:23'),
(24, 0, '123123123123123123123', '', '2019-01-28 02:34:48', '2019-01-28 02:34:48'),
(25, 0, '123123123123123123', '', '2019-03-13 12:06:03', '2019-03-13 12:06:03');

-- --------------------------------------------------------

--
-- 表的结构 `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `version` varchar(20) NOT NULL,
  `feat` text,
  `fix` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `version` (`version`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `logs`
--

INSERT INTO `logs` (`id`, `version`, `feat`, `fix`, `created_at`, `updated_at`) VALUES
(5, '1.0.0', '完成主体功能', '', '2019-01-19 02:00:07', '2019-01-19 02:00:07'),
(6, '1.1.0', '增加复习模块-单词全部拼写', '', '2019-01-21 00:02:20', '2019-01-21 00:02:20'),
(7, '1.1.2', '优化代码', '修复更新日志列表首次访问报错的BUG', '2019-01-28 02:53:54', '2019-01-28 02:54:52'),
(8, '1.1.3', '', '修复运行时报错的BUG', '2019-02-26 03:42:03', '2019-02-26 03:42:03'),
(9, '1.2.0', '1. 服务端采用 Resource 接口\n2. 优化代码', '', '2019-03-13 12:50:58', '2019-03-13 12:54:32');

-- --------------------------------------------------------

--
-- 表的结构 `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `book_id` int(6) NOT NULL,
  `review_module` varchar(32) NOT NULL,
  `username` varchar(16) NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `scores`
--

INSERT INTO `scores` (`id`, `book_id`, `review_module`, `username`, `time`, `created_at`, `updated_at`) VALUES
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
(12, 6, '单词全部拼写', 'test-2', 3, '2019-01-20 23:43:46', '2019-01-20 23:57:27'),
(13, 7, '单词部分拼写', '123', 4, '2019-01-28 02:16:42', '2019-01-28 02:16:42'),
(14, 6, '单词部分拼写', '蔡红辉', 2, '2019-01-28 02:50:00', '2019-01-28 02:50:00'),
(15, 6, '单词部分拼写', '哈哈哈', 1, '2019-03-13 08:39:10', '2019-03-13 08:39:10'),
(16, 6, '单词部分拼写', '123', 3, '2019-03-13 12:07:30', '2019-03-13 12:07:30'),
(17, 7, '单词部分拼写', '111', 8, '2019-03-13 12:27:20', '2019-03-13 12:27:20');

-- --------------------------------------------------------

--
-- 表的结构 `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(6) NOT NULL,
  `rank_limit_quantity` int(11) NOT NULL,
  `partial_spell_proportion` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `settings`
--

INSERT INTO `settings` (`id`, `rank_limit_quantity`, `partial_spell_proportion`, `created_at`, `updated_at`) VALUES
(1, 30, 0.5, '2019-01-18 05:30:03', '2019-03-13 11:42:00');

--
-- 限制导出的表
--

--
-- 限制表 `englishes`
--
ALTER TABLE `englishes`
  ADD CONSTRAINT `englishes_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- 限制表 `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
