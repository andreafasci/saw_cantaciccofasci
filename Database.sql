-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 12, 2017 alle 15:25
-- Versione del server: 5.7.14
-- Versione PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyt`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `data` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `reports`
--

INSERT INTO `reports` (`id`, `email`, `lat`, `lng`, `description`, `photo`, `data`) VALUES
(1, 'a@a.a', 40, 50, NULL, NULL, '2017-05-17 05:00:00'),
(2, 'b@b.b', 60, 70, NULL, NULL, '2017-05-03 00:00:00'),
(3, 'a@a.a', 20, 30, NULL, NULL, '2017-05-17 00:00:00'),
(4, 'a@a.a', 35, 67, NULL, NULL, '2017-05-25 00:00:00'),
(44, 'a@a.a', 35, 67, NULL, NULL, '2017-05-25 00:00:00'),
(5, 'a@a.a', 37, 47, NULL, NULL, '2017-05-25 00:00:00'),
(6, 'a@a.a', 15, 117, NULL, NULL, '2017-05-25 00:00:00'),
(7, 'a@a.a', 115, 27, NULL, NULL, '2017-05-25 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `admin`) VALUES
('a', 'a@a.a', 'a', 0),
('b', 'b@b.b', 'b', 0),
('c', 'c@b.c', 'c', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
