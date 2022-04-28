-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Kwi 2022, 11:35
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Baza danych: `images`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `picsum_id` varchar(30) NOT NULL,
  `imagefile` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `width` varchar(30) NOT NULL,
  `height` varchar(30) NOT NULL,
  `added_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `images`
--


--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;
