-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 17 jan 2015 om 20:32
-- Serverversie: 5.5.24-log
-- PHP-versie: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `stamboom`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kinderen`
--

CREATE TABLE IF NOT EXISTS `kinderen` (
  `nummering` int(11) NOT NULL AUTO_INCREMENT,
  `kinderen_id` int(11) NOT NULL,
  `persoon_id` int(11) NOT NULL,
  PRIMARY KEY (`nummering`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `kinderen`
--

INSERT INTO `kinderen` (`nummering`, `kinderen_id`, `persoon_id`) VALUES
(1, 1, 5),
(2, 2, 1),
(3, 1, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `partnerschap`
--

CREATE TABLE IF NOT EXISTS `partnerschap` (
  `partnerschap_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner1_id` int(11) NOT NULL,
  `partner2_id` int(11) NOT NULL,
  PRIMARY KEY (`partnerschap_id`),
  UNIQUE KEY `partnerschap_id` (`partnerschap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `partnerschap`
--

INSERT INTO `partnerschap` (`partnerschap_id`, `partner1_id`, `partner2_id`) VALUES
(1, 1, 2),
(2, 3, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personenregister`
--

CREATE TABLE IF NOT EXISTS `personenregister` (
  `persoon_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` int(11) NOT NULL,
  `partnerschap_id` int(11) NOT NULL,
  `ouder_id` int(11) NOT NULL,
  `geslacht` text NOT NULL,
  `voornaam` text NOT NULL,
  `tweedenaam` text NOT NULL,
  `derdenaam` text NOT NULL,
  `voorvoegsel_achternaam` text NOT NULL,
  `achternaam` text NOT NULL,
  `voorvoegsel_meisjesnaam` text NOT NULL,
  `meisjesnaam` text NOT NULL,
  `geboortedatum` date NOT NULL,
  `doopdatum` date NOT NULL,
  `geboorteplaats` text NOT NULL,
  `doopplaats` text NOT NULL,
  `sterfdatum` date NOT NULL,
  `sterfplaats` text NOT NULL,
  `beroep1` text NOT NULL,
  `beroep2` text NOT NULL,
  `beroep3` text NOT NULL,
  `opmerking1` text NOT NULL,
  `opmerking2` text NOT NULL,
  `documentatie1` text NOT NULL,
  `documentatie2` text NOT NULL,
  `foto1` int(11) NOT NULL,
  `partner1` text NOT NULL,
  `huwlijksdatum1` date NOT NULL,
  `partner2` text NOT NULL,
  `huwlijksdatum2` date NOT NULL,
  `partner3` text NOT NULL,
  `huwlijksdatum3` date NOT NULL,
  `toevoegen` text NOT NULL,
  PRIMARY KEY (`persoon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `personenregister`
--

INSERT INTO `personenregister` (`persoon_id`, `partner_id`, `partnerschap_id`, `ouder_id`, `geslacht`, `voornaam`, `tweedenaam`, `derdenaam`, `voorvoegsel_achternaam`, `achternaam`, `voorvoegsel_meisjesnaam`, `meisjesnaam`, `geboortedatum`, `doopdatum`, `geboorteplaats`, `doopplaats`, `sterfdatum`, `sterfplaats`, `beroep1`, `beroep2`, `beroep3`, `opmerking1`, `opmerking2`, `documentatie1`, `documentatie2`, `foto1`, `partner1`, `huwlijksdatum1`, `partner2`, `huwlijksdatum2`, `partner3`, `huwlijksdatum3`, `toevoegen`) VALUES
(1, 2, 1, 2, 'man', 'Pappa', 'tweedenaam', '', '', 'Lik', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '', 'veltensstamboom', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', ''),
(2, 1, 1, 0, 'vrouw', 'Lotte', 'Kutje', 'Bef', '', '', 'me', 'Pik', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', ''),
(3, 4, 2, 0, 'man', 'Pappas', 'Pappa', '', '', 'Lik', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', ''),
(4, 3, 2, 0, 'vrouw', 'Pappas', 'Mamma', '', '', '', 'maar', 'Raak', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', ''),
(5, 0, 0, 1, 'man', 'Kind', '1', '', '', 'Lik', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', ''),
(6, 0, 0, 1, 'man', 'Kind', '2', '', '', 'Lik', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
