-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 14 Mars 2012 à 14:46
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
-- Structure de la table `monster`
--

CREATE TABLE IF NOT EXISTS `monster` (
  `monster_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `family_id` int(5) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `hair_color` varchar(30) NOT NULL,
  `skin_type` varchar(30) NOT NULL,
  `blood_type` varchar(30) NOT NULL,
  `teeth` int(3) NOT NULL,
  PRIMARY KEY (`monster_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
