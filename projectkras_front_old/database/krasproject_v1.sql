-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 02 okt 2019 om 11:28
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
(1, 'Sven', 'Smolders', 'sven.smolders@ictmbo.nl', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0);

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
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `login_klanten`
--
ALTER TABLE `login_klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `login_medewerkers`
--
ALTER TABLE `login_medewerkers`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;




CREATE TABLE `news` (
                        `id` int(200) NOT NULL,
                        `datum` varchar(200) NOT NULL,
                        `titel` varchar(200) NOT NULL,
                        `auteur` varchar(200) NOT NULL,
                        `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
    MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
