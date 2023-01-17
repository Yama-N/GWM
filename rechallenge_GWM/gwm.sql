-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-11-18 10:54:15
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- データベース: `fitsuki_gwm`
--
CREATE DATABASE `fitsuki_gwm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fitsuki_gwm`;

--
-- データベース: `gwm`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `start_hour` int(2) default NULL,
  `start_min` int(2) default NULL,
  `end_hour` int(2) default NULL,
  `end_min` int(2) default NULL,
  `is_bounce` int(2) default NULL,
  `comment` varchar(255) character set utf8 collate utf8_unicode_ci default NULL,
  `updated_at` datetime NOT NULL,
  `login_flag` int(1) NOT NULL default '0',
  KEY `login_flag` (`login_flag`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `data`
--

INSERT INTO `data` (`id`, `name`, `start_hour`, `start_min`, `end_hour`, `end_min`, `is_bounce`, `comment`, `updated_at`, `login_flag`) VALUES
(2, '遠藤 孝彦', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(3, '沖中 宏之', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(4, '澤村 駿', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(5, '土橋 高明', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(7, '佐々木 千鶴', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(6, '鶴岡 裕樹', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(8, '中山 奈都美', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(9, '渡辺 亜美', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(10, '大森 満', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0),
(1, '木下 吉彦', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
