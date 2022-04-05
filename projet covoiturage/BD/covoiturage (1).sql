-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 05 Avril 2022 à 23:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_administrateur` int(4) NOT NULL AUTO_INCREMENT,
  `email_administrateur` varchar(100) NOT NULL,
  `prenom_administrateur` varchar(50) NOT NULL,
  `nom_administrateur` varchar(50) NOT NULL,
  `password_administrateur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_administrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `email_administrateur`, `prenom_administrateur`, `nom_administrateur`, `password_administrateur`) VALUES
(1, 'admin.elkhaddar@gmail.com', 'EL KHADDAR', 'othmane', 'othmane2001'),
(2, 'admin@gmail.com', 'Othmane', 'EL KHADDAR', 'othmane2001');

-- --------------------------------------------------------

--
-- Structure de la table `carcteristiquestrajet`
--

CREATE TABLE IF NOT EXISTS `carcteristiquestrajet` (
  `id_trajet` int(10) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(10) NOT NULL,
  `departure` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `places_disponibles` int(2) NOT NULL,
  `date` date NOT NULL,
  `temps` time(6) NOT NULL,
  `commentaires` varchar(255) NOT NULL,
  PRIMARY KEY (`id_trajet`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `carcteristiquestrajet`
--

INSERT INTO `carcteristiquestrajet` (`id_trajet`, `id_utilisateur`, `departure`, `destination`, `prix`, `places_disponibles`, `date`, `temps`, `commentaires`) VALUES
(21, 18, 'ensam', 'haymoulayabdellah', 50, 2, '2022-05-02', '12:15:00.000000', '                  respecter le temps'),
(22, 19, 'derb suktan', 'derbseltan', 20, 1, '2022-05-08', '11:22:00.000000', '                hhh  ');

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id_commentaire` int(10) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(100) NOT NULL,
  `email_utilisateur` varchar(100) NOT NULL,
  `telephone_utilisateur` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `feedback`
--

INSERT INTO `feedback` (`id_commentaire`, `nom_utilisateur`, `email_utilisateur`, `telephone_utilisateur`, `message`) VALUES
(1, 'othmane', 'chaimaa.elkhaddar@gmail.com', 604956676, 'hhh'),
(2, 'othmane', 'chaimaa.elkhaddar@gmail.com', 604956676, 'hhh'),
(3, 'survette', 'hajar.elkhaddar@gmail.com', 604956676, 'ddd'),
(4, 'survette', 'hajar.elkhaddar@gmail.com', 604956676, 'ddd'),
(5, 'hh', 'souka.elkhaddar@gmail.com', 604956676, 'dsds'),
(6, 'hh', 'souka.elkhaddar@gmail.com', 604956676, 'dsds'),
(7, 'iphone', 'souka.elkhaddar@gmail.com', 604956676, 'ds');

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(100) NOT NULL,
  `mail_user` varchar(500) NOT NULL,
  `phone_user` int(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id_report`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `slider`
--

INSERT INTO `slider` (`id`, `image`, `caption`) VALUES
(4, 'img4.jpg', ''),
(5, 'ensam-casa.jpg', ''),
(7, 'img5.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `trajetsreserver`
--

CREATE TABLE IF NOT EXISTS `trajetsreserver` (
  `id_trajetsreserver` int(4) NOT NULL AUTO_INCREMENT,
  `id_trajet` int(4) NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  PRIMARY KEY (`id_trajetsreserver`),
  KEY `id_trajet` (`id_trajet`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `trajetsreserver`
--

INSERT INTO `trajetsreserver` (`id_trajetsreserver`, `id_trajet`, `id_utilisateur`) VALUES
(1, 21, 19),
(2, 22, 18),
(3, 22, 20),
(4, 21, 20);

-- --------------------------------------------------------

--
-- Structure de la table `trajet_deleted`
--

CREATE TABLE IF NOT EXISTS `trajet_deleted` (
  `id_trajet_deleted` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(4) NOT NULL,
  `departure` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `prix` double NOT NULL,
  `date` date NOT NULL,
  `temps` time(6) NOT NULL,
  `places_disponibles` int(2) NOT NULL,
  `commentaires` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id_trajet_deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(4) NOT NULL AUTO_INCREMENT,
  `email_utilisateur` varchar(100) NOT NULL,
  `nom_utilisateur` varchar(30) NOT NULL,
  `prenom_utilisateur` varchar(30) NOT NULL,
  `telephone_utilisateur` int(50) NOT NULL,
  `genre_utilisateur` varchar(15) NOT NULL,
  `passsword_utilisateur` varchar(40) NOT NULL,
  `photo_utilisateur` varchar(255) NOT NULL,
  `activation_compte` int(1) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `email_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `telephone_utilisateur`, `genre_utilisateur`, `passsword_utilisateur`, `photo_utilisateur`, `activation_compte`) VALUES
(18, 'othmane.elkhaddar@gmail.com', 'othmane', 'el khaddar', 604956676, 'Homme', '123', '', 1),
(19, 'hamza.elkhaddar@gmail.com', 'hamza', 'el khaddar', 100101, 'Homme', 'othmane2001', '', 1),
(20, 'souka@gmail.com', 'souka', 'el', 123, 'Homme', '123', '', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `carcteristiquestrajet`
--
ALTER TABLE `carcteristiquestrajet`
  ADD CONSTRAINT `carcteristiquestrajet_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `trajetsreserver`
--
ALTER TABLE `trajetsreserver`
  ADD CONSTRAINT `trajetsreserver_ibfk_1` FOREIGN KEY (`id_trajet`) REFERENCES `carcteristiquestrajet` (`id_trajet`),
  ADD CONSTRAINT `trajetsreserver_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
