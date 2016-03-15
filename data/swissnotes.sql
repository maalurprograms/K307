-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Mrz 2016 um 09:58
-- Server-Version: 10.1.10-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `swissnotes`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notes`
--

CREATE TABLE `notes` (
  `noteID` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `IDuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `notes`
--

INSERT INTO `notes` (`noteID`, `name`, `content`, `IDuser`) VALUES
(1, 'Hällö', '<p>Hallo Jonas</p>', 20),
(2, 'new2', '<p>new notely note</p>\r\n<p>twerks now Yonaas..</p>', 20),
(3, 'Hallo John', '<p>Wie geits?</p>', 20),
(4, 's', '<p>d</p>', 15),
(5, 'qw', '<p>qwe</p>', 15),
(6, 'sad', '<p>sd</p>', 15),
(7, 'asd', '<p>asd</p>', 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `username`, `password`) VALUES
(15, 'jonas', '9c5ddd54107734f7d18335a5245c286b'),
(16, 'test', '098f6bcd4621d373cade4e832627b4f6'),
(17, 'test2', '7694f4a66316e53c8cdd9d9954bd611d'),
(18, 'test3', '0cc175b9c0f1b6a831c399e269772661'),
(19, 'asd', '7815696ecbf1c96e6894b779456d330e'),
(20, 'superkonto', 'c4ca4238a0b923820dcc509a6f75849b'),
(21, 'koro_sensei', 'cd73901eaf625346c17960003e0a216f');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`noteID`),
  ADD KEY `userID` (`IDuser`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `notes`
--
ALTER TABLE `notes`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
