-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 15 Mars 2012 à 06:03
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
  `family_name` varchar(30) NOT NULL,
  `family_max_number` int(255) NOT NULL,
  `family_photo_link` varchar(100) NOT NULL,
  `world_id` int(5) NOT NULL,
  PRIMARY KEY (`family_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `family`
--

INSERT INTO `family` (`family_id`, `family_name`, `family_max_number`, `family_photo_link`, `world_id`) VALUES
(14, 'BrainOver', 31, 'photo_family/default.png', 7),
(16, 'Sanguinaires', 41, 'photo_family/default.png', 7);

-- --------------------------------------------------------

--
-- Structure de la table `monster`
--

CREATE TABLE IF NOT EXISTS `monster` (
  `monster_id` int(255) NOT NULL AUTO_INCREMENT,
  `monster_name` varchar(30) NOT NULL,
  `family_id` int(5) NOT NULL,
  `monster_photo_link` varchar(255) NOT NULL,
  `monster_hair_color` varchar(30) NOT NULL,
  `monster_skin_type` varchar(30) NOT NULL,
  `monster_blood_type` varchar(30) NOT NULL,
  `monster_teeth` int(3) NOT NULL,
  PRIMARY KEY (`monster_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `monster`
--

INSERT INTO `monster` (`monster_id`, `monster_name`, `family_id`, `monster_photo_link`, `monster_hair_color`, `monster_skin_type`, `monster_blood_type`, `monster_teeth`) VALUES
(26, 'Margueritte', 14, 'photo_monstre/default.png', 'Black', 'Green', 'Zombie', 4),
(31, 'Skull', 14, 'photo_monstre/default.png', 'Yellow', 'Black', 'Alien', 2),
(36, 'Viper', 16, 'photo_monstre/default.png', 'Green', 'Green', 'Medusa', 50);

-- --------------------------------------------------------

--
-- Structure de la table `world`
--

CREATE TABLE IF NOT EXISTS `world` (
  `world_id` int(11) NOT NULL AUTO_INCREMENT,
  `world_name` varchar(30) NOT NULL,
  `world_photo_link` varchar(100) NOT NULL,
  PRIMARY KEY (`world_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `world`
--

INSERT INTO `world` (`world_id`, `world_name`, `world_photo_link`) VALUES
(7, 'Pandore', 'photo_world/gare_TGV_Liege-Guillemins_20090806_P1300958_Misson_Didier.jpg'),
(8, 'Andora', 'photo_world/default.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
