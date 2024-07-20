-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 13, 2024 at 09:36 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazapraktyki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('user','admin') NOT NULL,
  `subskrypcja` enum('basic','extra','gold','admin') NOT NULL,
  `stan_subskrybcji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `login`, `haslo`, `email`, `status`, `subskrypcja`, `stan_subskrybcji`) VALUES
(1, 'login1', '$2y$10$338svDH3gTK2FmiImt18G.X/f2pG0YmheFd1GMcocpwuCpqQz5nuy', 'email1admin@mail.com', 'admin', 'admin', 1000),
(2, 'login2', '$2y$10$ILmW6ALyix4r7vM4FKts4uUR60wIhq3DZAkulfxenJu7b.SfK6aDq', 'email2@mail.com', 'user', 'basic', 44),
(3, 'login3', '$2y$10$7bBsl3ziNmO5AWNqU3axPu5ISRsK6PX6gKrZeKzqwBZ/7T5UfuDWy', 'email3@mail.com', 'user', 'extra', 200),
(4, 'login4', '$2y$10$waBTlPFNO2FYLM2Z6nYP3.4W4lrW7YcKmY2UyLb16ekOhiRiE6zgi', 'email4@mail.com', 'user', 'gold', 450),
(12, 'hash', '$2y$10$eqPa9nCpIcy17hv2bPZ3.ezR2zTbJwuEPehfkpGhIWZfpEvaQq9JO', 'mypassishashed@gmail.com', 'user', 'gold', 500),
(13, 'hashy', '$2y$10$AaWEDSJkHw.2b7gylB4miO83rXwfPBEetzwbS40VL0nSLzI6GhJ9a', 'hashy@gmail.com', 'user', 'extra', 200),
(14, 'test', '$2y$10$S6XU1lJLK/d13N4UAPCOiOdNIyMbfz0Y9F37WTxUVOf2luW/2/EPm', 'testing@gmail.com', 'user', 'basic', 100);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
