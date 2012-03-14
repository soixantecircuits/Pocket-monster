-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 14 Mars 2012 à 20:30
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `pocket_monster_schobbent`
--

-- --------------------------------------------------------

--
-- Structure de la table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `family_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `maxi_number` int(255) NOT NULL,
  `photo_link` varchar(100) NOT NULL,
  `world_id` int(5) NOT NULL,
  PRIMARY KEY (`family_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `family`
--

INSERT INTO `family` (`family_id`, `name`, `maxi_number`, `photo_link`, `world_id`) VALUES
(1, 'Pala', 0, '', 0),
(6, 'Second', 50, 'yeay', 1),
(7, 'Second', 50, 'yeay', 1);

-- --------------------------------------------------------

--
-- Structure de la table `monster`
--

CREATE TABLE IF NOT EXISTS `monster` (
  `monster_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `family_id` int(5) NOT NULL,
  `photo_link` varchar(255) NOT NULL,
  `hair_color` varchar(30) NOT NULL,
  `skin_type` varchar(30) NOT NULL,
  `blood_type` varchar(30) NOT NULL,
  `teeth` int(3) NOT NULL,
  PRIMARY KEY (`monster_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `monster`
--

INSERT INTO `monster` (`monster_id`, `name`, `family_id`, `photo_link`, `hair_color`, `skin_type`, `blood_type`, `teeth`) VALUES
(1, 'test', 1, 'zdzddzd', 'bleu', 'poilu', 'vampire', 32),
(13, 'Chouch', 5, 'yeay', 'jaune', 'poilu', 'vampire', 32),
(14, 'Chouch', 5, 'yeay', 'jaune', 'poilu', 'vampire', 32),
(15, 'Padawa', 5, 'yeay', 'jaune', 'poilu', 'vampire', 32),
(19, 'Alawa', 1, 'photo_monstre/default.png', 'Black', 'Green', 'Alien', 2);

-- --------------------------------------------------------

--
-- Structure de la table `world`
--

CREATE TABLE IF NOT EXISTS `world` (
  `world_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `photo_link` varchar(100) NOT NULL,
  PRIMARY KEY (`world_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `world`
--

INSERT INTO `world` (`world_id`, `name`, `photo_link`) VALUES
(1, 'test', 'sdsqdsdds'),
(2, 'hello', ''),
(3, 'Pala', 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
