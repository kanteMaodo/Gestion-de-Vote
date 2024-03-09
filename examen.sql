-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 09 mars 2024 à 22:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `examen`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

DROP TABLE IF EXISTS `candidats`;
CREATE TABLE IF NOT EXISTS `candidats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `NIN` int(11) NOT NULL,
  `parti` varchar(150) NOT NULL,
  `score` int(11) NOT NULL,
  `Pourcentage` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id`, `nom`, `prenom`, `NIN`, `parti`, `score`, `Pourcentage`) VALUES
(43, 'Sall', 'Khalifa', 123456789, 'takhawou Senegal', 0, 0),
(42, 'Faye', 'Bassirou Diomaye', 123456, 'Diomaye President', 22232222, 100),
(41, 'Fall', 'Pape djibril', 26092004, 'Les serviteurs', 0, 0),
(44, 'Sall', 'Thierno Alassane Sall', 0, 'Republique des Valeurs', 0, 0),
(45, 'Ba', 'Amadou', 111111111, 'Benno Bokk Yakar', 0, 0),
(46, 'Ngom', 'Anta Babacar', 22222222, 'ARC', 22222222, 100);

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

DROP TABLE IF EXISTS `centre`;
CREATE TABLE IF NOT EXISTS `centre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nompr` varchar(100) NOT NULL,
  `prenompr` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `idbr` int(11) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `region` varchar(30) NOT NULL,
  `departements` varchar(40) NOT NULL,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`id`, `nompr`, `prenompr`, `mail`, `idbr`, `mdp`, `region`, `departements`, `ville`) VALUES
(6, 'Maodo', 'kante', 'bassemouhamed420@gmail.com', 1234567, 'asdfghjk', 'Dakar', 'Rufisque', 'Rufisque Ouest'),
(11, 'basse', 'Mouhamed Rassoul', 'bassemouhamed420@gmail.com', 234567, 'famandiaye420', 'Dakar', 'Rufisque', 'Rufisque Ouest');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
