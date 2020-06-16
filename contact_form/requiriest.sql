-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 6 月 16 日 02:03
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
-- テーブルの構造 `requiriest`
--

CREATE TABLE `requiriest` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `requiriest`
--

INSERT INTO `requiriest` (`id`, `name`, `email`, `subject`, `body`, `state`) VALUES
(1, '織田信長', 'test@example.com', 'その他のお問い合わせ', 'ウグイスが居なくなった\r\n寂しいので、他のウグイスを連れてきてほしい', 0),
(2, 'test test', 'test@example.com', 'お仕事に関するお問い合わせ', '暑くて集中できない', 0),
(3, 'alohaki', 'test@example.com', 'その他のお問い合わせ', '猫が足りない\r\n猫に会える場所、触れる場所を知りたい', 0),
(4, '徳川家康', 'test@example.com', 'その他のお問い合わせ', 'ウグイスが鳴かずに困っている\r\n流石に待ちくたびれた', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `requiriest`
--
ALTER TABLE `requiriest`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `requiriest`
--
ALTER TABLE `requiriest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
