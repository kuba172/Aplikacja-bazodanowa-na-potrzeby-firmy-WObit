-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Wrz 2021, 08:30
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `loginy_hasla`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(255) NOT NULL,
  `user` varchar(36) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `Dodawanie` varchar(3) NOT NULL,
  `Modyfikacja` varchar(3) NOT NULL,
  `Odczyt` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `Dodawanie`, `Modyfikacja`, `Odczyt`) VALUES
(1, 'administrator', '$2y$10$iGsZtJ/0tJeazm2pKgEkqeXyk.4v02xUiXqlndjG7aJ92id6i5k6i', 'TAK', 'TAK', 'TAK'),
(48, 'konto3', '$2y$10$al4uVGJ/qaKaeLooRXp0rOLir.vq9MIP2KdLbEqFGigENSeW7eBim', 'TAK', 'TAK', 'TAK'),
(49, 'konto4', '$2y$10$HMjocWY50ck37yfge7sbOORmegf1MiOh9f/yOgf49PHFnHZjLxRXS', 'TAK', 'TAK', 'TAK'),
(50, 'konto5', '$2y$10$mbQJ7hB2vcNvJ8JRBp6ONuP37.nA/56fM.6SFOBz3ET725saWsx8K', 'NIE', 'NIE', 'NIE'),
(51, 'konto1', '$2y$10$buU1XXhsR1MCVicv1EdUEuXrv0g4qewpB21ekWMDSAMwOaZpmKR.W', 'NIE', 'NIE', 'NIE'),
(52, 'konto2', '$2y$10$.JVGSqSSRc/Zwvj8uNSrb.oBRAhDeO0NGkpvzPmlaRCUU8JG61QCe', 'NIE', 'NIE', 'NIE');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
