-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 13. říj 2019, 21:13
-- Verze serveru: 10.1.25-MariaDB
-- Verze PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pro`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `postal_code` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `logged` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `city`, `street`, `postal_code`, `logged`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2a$06$5rv5YO6s3zxeliO6OS0WXe89rrM6mi4dZAiMY0ngIEIR5X/ITsgCC', 'admin', 'admin', 'admin', 0),
(2, 'Brandon', 'Stark', 'brandon@example.com', '$2y$10$UiLjhutYMbinuo12aUXxP.S0S/NOoodxq1siEsC5qz.HP1w9dfJPO', 'Winterfell', 'Street 1', '1', 0),
(3, 'John', 'Doe', 'doe@example.com', '$2y$10$1nqECPk4z/Lzovl9vnzCqOb1CNKP9FZXW3tMKTv3U/LLISkV2kKve', 'City', 'Street 1', '1', 0);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
