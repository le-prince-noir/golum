-- phpMyAdmin SQL Dump
-- version 3.3.9.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 04 Décembre 2012 à 00:29
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet-503`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_COMMENTAIRE` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date_ajout` datetime DEFAULT NULL,
  `UTILISATEUR_id_UTILISATEUR` int(11) NOT NULL,
  `IMAGES_id_IMAGES` int(11) NOT NULL,
  `VISITEUR_id_VISITEUR` int(11) NOT NULL,
  `UTILISATEUR_id_UTILISATEUR1` int(11) NOT NULL,
  PRIMARY KEY (`id_COMMENTAIRE`,`UTILISATEUR_id_UTILISATEUR`,`VISITEUR_id_VISITEUR`),
  KEY `fk_COMMENTAIRE_IMAGES1_idx` (`IMAGES_id_IMAGES`),
  KEY `fk_COMMENTAIRE_UTILISATEUR1_idx` (`UTILISATEUR_id_UTILISATEUR1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `commentaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id_IMAGES` int(11) NOT NULL AUTO_INCREMENT,
  `date_ajout` datetime DEFAULT NULL,
  `date_modif` datetime DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Description` text,
  `UTILISATEUR_id_UTILISATEUR` int(11) NOT NULL,
  PRIMARY KEY (`id_IMAGES`),
  KEY `fk_IMAGES_UTILISATEUR1_idx` (`UTILISATEUR_id_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `images`
--


-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id_UTILISATEUR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_UTILISATEUR`, `login`, `password`, `email`, `role`, `date_creation`) VALUES
(18, 'azerty', '_ec0b871bb290b7922470fe915c2b9434e2597c3f0b5d89f2100fe05714e378d233162487a8d07485454785a5064f90d90c25484ca6f011e84682c8a38bc497cd_', 'samy-kqqqqantari@cifacom.com', '1', '2012-12-03 23:43:45'),
(19, 'aaaaaaaa', '_a5e4209e841321ae706ee84b94b38088a18acc7643250e4bb0af543c9d7599a0854c8e08c2283ec0ee338806cca171206340a510c5c406beb6ec3b6f18150c4b_', 'santari@cifacom.com', '1', '2012-12-04 00:10:10');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_COMMENTAIRE_IMAGES1` FOREIGN KEY (`IMAGES_id_IMAGES`) REFERENCES `images` (`id_IMAGES`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_COMMENTAIRE_UTILISATEUR1` FOREIGN KEY (`UTILISATEUR_id_UTILISATEUR1`) REFERENCES `utilisateur` (`id_UTILISATEUR`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_IMAGES_UTILISATEUR1` FOREIGN KEY (`UTILISATEUR_id_UTILISATEUR`) REFERENCES `utilisateur` (`id_UTILISATEUR`) ON DELETE NO ACTION ON UPDATE NO ACTION;
