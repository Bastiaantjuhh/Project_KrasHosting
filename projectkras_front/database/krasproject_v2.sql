-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 09 okt 2019 om 09:35
-- Serverversie: 5.7.25
-- PHP-versie: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krasproject`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_klanten`
--

CREATE TABLE `login_klanten` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `wachtwoord_counter` int(1) NOT NULL DEFAULT '0',
  `suspended` int(1) NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `login_klanten`
--

INSERT INTO `login_klanten` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `wachtwoord_counter`, `suspended`, `address`, `huisnummer`, `postcode`, `woonplaats`) VALUES
(8, 'Skip', 'Hermes', 'me@bastiaandehart.com', '9c2028963dc9f7fbb4cb30140428a210c61dbb2c', 3, 1, 'Kasteeldreef', '122', '5046CV', 'Tilburg'),
(9, 'admin', 'admin', 'admin@admin.com', '9c2028963dc9f7fbb4cb30140428a210c61dbb2c', 0, 1, 'Kasteeldreef', '122', '5046CV', 'Tilburg'),
(10, 'Bastiaan', 'de Hart', 'bastian.dehart@ictmbo.nl', '9c2028963dc9f7fbb4cb30140428a210c61dbb2c', 0, 0, 'Zonnebloemlaan', '204A', '5151TD', 'Drunen'),
(11, 'Bastiaan', 'de Hart', 'bastian.dehart@ictmbo.nl', '9c2028963dc9f7fbb4cb30140428a210c61dbb2c', 0, 0, 'Zonnebloemlaan', '204A', '5151TD', 'Drunen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_medewerkers`
--

CREATE TABLE `login_medewerkers` (
  `id` int(16) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `wachtwoord_counter` int(1) NOT NULL,
  `suspended` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `login_medewerkers`
--

INSERT INTO `login_medewerkers` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `wachtwoord_counter`, `suspended`) VALUES
(1, 'Sven', 'Smolders', 'sven.smolders@ictmbo.nl', '9c2028963dc9f7fbb4cb30140428a210c61dbb2c', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE `news` (
  `id` int(200) NOT NULL,
  `datum` varchar(200) NOT NULL,
  `titel` varchar(200) NOT NULL,
  `auteur` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `news`
--

INSERT INTO `news` (`id`, `datum`, `titel`, `auteur`, `content`) VALUES
(17, '2-10-2019', 'Cras gravida ornare tellus', 'Rami alkadi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida ornare tellus, quis facilisis ante condimentum tristique. Nullam quis justo mauris. Nullam ac enim magna. In vel elit consectetur,'),
(18, '02-10-2019', 'consectetur adipiscing elit', 'Rami', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida ornare tellus, quis facilisis ante condimentum tristique. Nullam quis justo mauris. Nullam ac enim magna. In vel elit consectetu'),
(19, '00/00/00', 'Lorem ipsum dolor sit amet', 'Autuer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida ornare tellus, quis facilisis ante condimentum tristique. Nullam quis justo mauris. Nullam ac enim magna. In vel elit consectetur,');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `login_klanten`
--
ALTER TABLE `login_klanten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `login_medewerkers`
--
ALTER TABLE `login_medewerkers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `login_klanten`
--
ALTER TABLE `login_klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `login_medewerkers`
--
ALTER TABLE `login_medewerkers`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
