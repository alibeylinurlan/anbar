-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Şub 2022, 20:50:54
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `anbar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mehsullar`
--

CREATE TABLE `mehsullar` (
  `id` int(11) NOT NULL,
  `adi` text NOT NULL,
  `miqdar` decimal(15,2) NOT NULL COMMENT 'onluq kesr de ola biler ',
  `olcu_vahidi` enum('kq','litr','ədəd','metr') NOT NULL,
  `maya_deyeri` decimal(15,2) NOT NULL,
  `satis_qiymeti` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` text DEFAULT NULL COMMENT 'soft delete tarixi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mehsullar`
--

INSERT INTO `mehsullar` (`id`, `adi`, `miqdar`, `olcu_vahidi`, `maya_deyeri`, `satis_qiymeti`, `created_at`, `deleted_at`) VALUES
(1, 'Armud', '130.00', 'kq', '2.00', '2.50', '2022-02-09 10:26:42', NULL),
(2, 'Heyva', '250.00', 'kq', '1.00', '1.50', '2022-02-09 10:48:14', NULL),
(3, 'Nar', '140.00', 'kq', '1.40', '2.10', '2022-02-09 10:50:34', NULL),
(4, 'Kitab', '5.00', 'ədəd', '12.00', '16.00', '2022-02-09 11:03:24', NULL),
(5, 'Gilas', '350.00', 'kq', '0.80', '1.40', '2022-02-09 11:17:20', NULL),
(6, 'Lampa', '243.00', 'ədəd', '0.40', '0.70', '2022-02-09 11:17:56', NULL),
(8, 'Kagiz', '14.00', 'ədəd', '8.00', '12.00', '2022-02-09 16:55:14', NULL),
(9, 'Qelem', '70.00', 'ədəd', '0.20', '0.40', '2022-02-09 17:39:14', NULL),
(10, 'Komputer', '5.00', 'ədəd', '370.00', '510.00', '2022-02-09 20:57:11', NULL),
(11, 'Telefon', '3.00', 'ədəd', '240.00', '300.00', '2022-02-10 09:20:08', NULL),
(12, 'Televizor', '3.00', 'ədəd', '490.00', '710.00', '2022-02-10 12:34:24', NULL),
(13, 'Velosiped', '9.00', 'ədəd', '115.00', '170.00', '2022-02-10 12:34:54', NULL),
(14, 'Ərik', '190.00', 'kq', '0.80', '1.10', '2022-02-10 12:51:59', NULL),
(15, 'Paltaryuyan', '9.00', 'ədəd', '450.00', '620.00', '2022-02-10 12:54:44', NULL),
(16, 'Qab dəsti', '3.00', 'ədəd', '190.00', '275.00', '2022-02-10 13:45:37', '2022-02-10 23:27:37'),
(17, 'Cehizlik dəsti', '2.00', 'ədəd', '1600.00', '2500.00', '2022-02-10 14:21:01', NULL),
(18, 'Soyuducu', '12.00', 'ədəd', '710.00', '1200.00', '2022-02-10 14:21:21', '2022-02-10 23:27:35'),
(21, 'Masa örtüsü', '155.00', 'metr', '1.80', '3.20', '2022-02-10 19:26:16', NULL),
(22, 'Kabel', '920.00', 'metr', '0.30', '0.70', '2022-02-10 19:27:13', NULL),
(23, 'Avtomobil şüşəsi', '9.00', 'ədəd', '62.00', '97.00', '2022-02-10 19:28:04', NULL),
(24, 'qaşıq dəsti', '29.00', 'ədəd', '16.00', '24.00', '2022-02-10 19:33:15', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `ad_soyad` text NOT NULL,
  `password` text NOT NULL,
  `status` enum('moderator','inzibatci') NOT NULL DEFAULT 'moderator',
  `bas_admin` enum('bəli','xeyr') NOT NULL DEFAULT 'xeyr',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `email`, `ad_soyad`, `password`, `status`, `bas_admin`, `created_at`) VALUES
(16, 'moderator@gmail.com', 'Hüseyn Cavid', 'MTIzNDU=', 'moderator', 'xeyr', '2022-02-08 16:45:52'),
(17, 'basadmin@gmail.com', 'Əhməd Cavad', 'MTIzNDU=', 'inzibatci', 'bəli', '2022-02-09 08:20:56'),
(18, 'inzibatci@gmail.com', 'Mikayıl Müşfiq', 'MTIzNDU=', 'inzibatci', 'xeyr', '2022-02-10 10:59:24');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `mehsullar`
--
ALTER TABLE `mehsullar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `mehsullar`
--
ALTER TABLE `mehsullar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
