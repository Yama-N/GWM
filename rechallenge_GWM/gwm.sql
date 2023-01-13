-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-11-18 10:54:15
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `gwm`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_hour` int(2) DEFAULT NULL,
  `start_min` int(2) DEFAULT NULL,
  `end_hour` int(2) DEFAULT NULL,
  `end_min` int(2) DEFAULT NULL,
  `is_bounce` int(2) DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `data`
--

INSERT INTO `data` (`id`, `name`, `start_hour`, `start_min`, `end_hour`, `end_min`, `is_bounce`, `comment`, `updated_at`) VALUES
(1, '木下 吉彦', 2, 30, 2, 30, 0, 'kkkk', '2022-11-16 15:28:40'),
(2, '遠藤 孝彦', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:50:21'),
(3, '沖中 宏之', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:23:48'),
(4, '澤村 駿', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:25:17'),
(5, '土橋 高明', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:25:34'),
(6, '鶴岡 裕樹', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:25:36'),
(7, '佐々木 千鶴', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:25:37'),
(8, '中山 奈都美', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:25:38'),
(9, '渡辺 亜美', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:25:39'),
(10, '大森 満', NULL, NULL, NULL, NULL, 0, '', '2022-11-16 14:25:40');

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
