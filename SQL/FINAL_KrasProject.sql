-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Gegenereerd op: 14 dec 2019 om 19:32
-- Serverversie: 8.0.18
-- PHP-versie: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Tabelstructuur voor tabel `crm_klant_bestellingen`
--

CREATE TABLE `crm_klant_bestellingen` (
  `id` int(11) NOT NULL,
  `id_pakket` int(11) NOT NULL,
  `id_klant` int(11) NOT NULL,
  `einde_looptijd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `factuur_volgende` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `factuur_betaalt` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `crm_klant_bestellingen`
--

INSERT INTO `crm_klant_bestellingen` (`id`, `id_pakket`, `id_klant`, `einde_looptijd`, `factuur_volgende`, `factuur_betaalt`) VALUES
(1, 1, 1, '2019-12-04 21:09:34', '2019-12-04 21:09:34', 0),
(2, 2, 1, '2019-12-04 21:09:34', '2019-12-04 21:09:34', 0),
(3, 3, 1, '2019-12-04 21:09:34', '2019-12-04 21:09:34', 0),
(4, 2, 4, '2019-12-14 19:10:47', '2019-12-14 19:10:47', 0),
(5, 3, 2, '2019-12-14 19:11:06', '2019-12-14 19:11:06', 0),
(6, 3, 2, '2019-12-14 19:11:06', '2019-12-14 19:11:06', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `crm_medewerker_login`
--

CREATE TABLE `crm_medewerker_login` (
  `id` int(4) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `r_lezen` tinyint(1) NOT NULL DEFAULT '0',
  `r_scrijven` tinyint(1) NOT NULL DEFAULT '0',
  `r_verwijderen` tinyint(1) NOT NULL DEFAULT '0',
  `r_bewerken` tinyint(1) NOT NULL DEFAULT '0',
  `r_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `crm_medewerker_login`
--

INSERT INTO `crm_medewerker_login` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `r_lezen`, `r_scrijven`, `r_verwijderen`, `r_bewerken`, `r_admin`) VALUES
(1, 'Bastiaan', 'de Hart', 'bastiaan.dehart@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 1, 1, 1, 1, 1),
(2, 'Sven', 'Smolders', 'sven.smolders@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 1, 1, 1, 1, 1),
(3, 'Skip', 'Hermes', 'skip.hermes@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 1, 1, 1, 1, 1),
(4, 'Rami', 'Alkadi', 'rami.alkadi@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 1, 1, 1, 1, 1),
(5, 'Medewerker', 'Afdeling ICT', 'ict@krashosting.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 1, 1, 1, 1, 1),
(6, 'Medewerker', 'Afdeling Administratie', 'administratie@krashosting.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0, 0, 1, 0);

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
  `woonplaats` varchar(255) NOT NULL,
  `archief` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `login_klanten`
--

INSERT INTO `login_klanten` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `wachtwoord_counter`, `suspended`, `address`, `huisnummer`, `postcode`, `woonplaats`, `archief`) VALUES
(1, 'Peter', 'de Vries', 'peter@devries-bouwbedrijf.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0, 'Naritaweg', '1043BS', '131', 'Amsterdam', 0),
(2, 'Bastiaan', 'de Hart', 'bastiaan@dehart.com', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0, 'Zonnebloemlaan 204', '5151TD', '204', 'Drunen', 0),
(3, 'Lichelle', 'Droste', 'l.droste@yahoo.com', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0, 'Scheepsbouwkade', '6001AD', '95', 'Weert', 0),
(4, 'Mitchell', 'Vermeij', 'bastiaan.dehart@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0, 'mitchell.vermeij@icloud.com', '1971HX', '108', 'Ijmuiden', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_medewerkers`
--

CREATE TABLE `login_medewerkers` (
  `id` int(16) NOT NULL,
  `voornaam` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `achternaam` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `wachtwoord` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `wachtwoord_counter` int(1) DEFAULT '0',
  `suspended` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `login_medewerkers`
--

INSERT INTO `login_medewerkers` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `wachtwoord_counter`, `suspended`) VALUES
(1, 'Sven', 'Smolders', 'sven.smolders@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0),
(2, 'Bastiaan', 'de Hart', 'bastiaan.dehart@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0),
(3, 'Skip', 'Hermes', 'skip.hermes@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0),
(4, 'Rami', 'Alkadi', 'rami.alkadi@ictmbo.nl', '057c8c1b2046375df06e6bda51fb4ce7528d5625', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE `news` (
  `id` int(200) NOT NULL,
  `datum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `titel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auteur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `news`
--

INSERT INTO `news` (`id`, `datum`, `titel`, `auteur`, `content`) VALUES
(1, '26-01-2018', 'Nieuwe servers in ons netwerk', 'Sven Smolders', 'We gaan onze locatie AMS01 (Amsterdam DataCenter 1) uitbreiden met enkele gloednieuwe servers om de snelheid van ons netwerk te kunnen waarborgen'),
(2, '09-07-2018', 'Aanpassing van algemene voorwaarden', 'Bastiaan de Hart', 'Onze algemene voorwaarden zijn aangepast en bieden nu meer overzicht voor onze gebruikers'),
(3, '12-03-2019', 'Storing netwerk', 'Sven Smolders', 'Helaas heeft er vannacht een storing plaatsgevonden op de server \"AMS01-WEB09\". De storing ontstond door een defecte NIC-adapter waardoor zowel IPv4 als IPv6 pakketten niet worden gerouteerd.'),
(4, '22-07-2019', 'Nieuwe website is online', 'Skip Hermes', 'Wij zijn officieel geopend met onze nieuwe website'),
(5, '01-08-2019', 'Het controlepaneel heeft een nieuwe look!', 'Rami Alkadi', 'We willen je graag laten weten dat het KrasHosting-controlepaneel in een modern jasje is gestoken. Naast dat het visueel meer aansluit bij de website, zijn er enkele verfijningen doorgevoerd met betrekking tot de gebruikerservaring. Zo kan je nog sneller en makkelijker de instellingen voor jouw website of applicatie wijzigen.'),
(6, '14-11-2019', 'PHP 7.4 nu beschikbaar voor jouw website!', 'Rami Alkadi', 'De recentste versie van de PHP-software, versie 7.2, is nu beschikbaar voor jouw website en is via het controlepaneel in te stellen. Het is verstandig deze versie zo snel mogelijk te installeren omdat oudere versies binnenkort niet meer worden ondersteund. ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pakketten`
--

CREATE TABLE `pakketten` (
  `id` int(5) NOT NULL,
  `naam` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prijs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `inhoud` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `pakketten`
--

INSERT INTO `pakketten` (`id`, `naam`, `prijs`, `inhoud`) VALUES
(1, 'Starter', '€ 1.50 ', '• 1 Gb webspace\r\n• 1 domeinnaam\r\n• 1 FTP-toegang\r\n• 25 e-mailadressen\r\n• 10 Gb dataverkeer'),
(2, 'Basic', '€ 4.50', '• 4 Gb webspace\r\n• 2 domeinnamen\r\n• 10 FTP-toegangen\r\n• 200 e-mailadressen\r\n• PHP, MySQL (3 databases)\r\n• 50 Gb dataverkeer'),
(3, 'Advanced', '€ 14,99', '• 10 Gb webspace\r\n• 3 domeinnamen\r\n• 30 FTP-toegangen\r\n• 5000 e-mailadressen\r\n• PHP, MySQL (10 databases)\r\n• 100 Gb dataverkeer'),
(4, 'Pro', 'vanaf € 26,90', 'Na doorklikken op het pakket kan de klant zijn gegevens achterlaten, waarna wij als Krashosting\r\ncontact opnemen en onze accountmanager een afspraak zal maken.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `crm_klant_bestellingen`
--
ALTER TABLE `crm_klant_bestellingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `crm_medewerker_login`
--
ALTER TABLE `crm_medewerker_login`
  ADD PRIMARY KEY (`id`);

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
-- Indexen voor tabel `pakketten`
--
ALTER TABLE `pakketten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `crm_klant_bestellingen`
--
ALTER TABLE `crm_klant_bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `crm_medewerker_login`
--
ALTER TABLE `crm_medewerker_login`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `login_klanten`
--
ALTER TABLE `login_klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `login_medewerkers`
--
ALTER TABLE `login_medewerkers`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT voor een tabel `pakketten`
--
ALTER TABLE `pakketten`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
