-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 6 月 16 日 02:04
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `contact_form`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pref` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_place` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `team`
--

INSERT INTO `team` (`id`, `team_name`, `pw`, `email`, `team_category`, `pref`, `team_place`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'ナンチェ', 'nanche', 'nanchester2003@outlook.com', '1', '鹿児島県', 'ハートピアかごしま', 0, '2020-06-15', '2020-06-15'),
(2, 'Infinity侍', 'infinity', 'inifinity@example.com', '2', '佐賀県', '勤労体育センター', 0, '2020-06-15', '2020-06-15'),
(3, 'レインボー', 'rainbow', 'rainbow@example.com', '1', '東京都', '多摩体育センター', 0, '2020-06-15', '2020-06-15'),
(4, 'クラッカーズ', 'crackers', 'crackers@example.com', '1', '神奈川県', 'ラポール', 0, '2020-06-16', '2020-06-16'),
(5, 'レッドスピリッツ', 'spirits', 'spirits@example.com', '2', '神奈川県', 'ラポール', 0, '2020-06-16', '2020-06-16'),
(6, 'クラッシャーズ', 'crasher', 'crashers@exmple.com', '1', '長野県', '諏訪市民体育館', 0, '2020-06-16', '2020-06-16'),
(7, 'エルスト', 'erst', 'erst@example.com', '1', '広島県', '折鶴体育館', 0, '2020-06-16', '2020-06-16');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
