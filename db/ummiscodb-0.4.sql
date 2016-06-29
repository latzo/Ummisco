-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 25 Juin 2016 à 17:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ummiscodb`
--

CREATE DATABASE ummisco;
USE ummisco;

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE IF NOT EXISTS `diplome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomDiplome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mention` enum('Passable','Assez Bien','Bien','Tres Bien') COLLATE utf8_unicode_ci NOT NULL,
  `dateObtention` date NOT NULL,
  `lieuObtention` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `candidat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EB4C4D4E5D0D0C06` (`nomDiplome`),
  KEY `fk_Dip_candidat_id_Can` (`candidat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rueQuartier` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `bourse`
--

CREATE TABLE IF NOT EXISTS `bourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montantBourse` int(11) DEFAULT NULL,
  `natureBourse` enum('Nationale','Etrangere','Etablissement') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tauxExoneration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE IF NOT EXISTS `candidat` (
  `id` int(11) NOT NULL,
  `ine` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cni` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statut` enum('Regime Normal','Regime Salarie','Regime Particulier','Mise En Position De Stage') COLLATE utf8_unicode_ci DEFAULT NULL,
  `situationFamiliale` enum('Celibataire','Marie','Mariee','Divorcee','Divorcee','Veuf','Veuve') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbEnfants` int(11) DEFAULT NULL,
  `datSoumission` date DEFAULT NULL,
  `categorieSocioPro` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anneeEtude` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cycle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbInscriptAnt` int(11) DEFAULT NULL,
  `redouble` tinyint(1) DEFAULT NULL,
  `aptitude` tinyint(1) DEFAULT NULL,
  `signature` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statutBourse` enum('Non Boursier','Boursier','Etranger','Etranger Exonere') COLLATE utf8_unicode_ci DEFAULT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `bourse_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6AB5B4717EE1FA43` (`ine`),
  UNIQUE KEY `UNIQ_6AB5B4717AC033BE` (`cni`),
  KEY `IDX_6AB5B4714E67DDD1` (`bourse_id`),
  KEY `IDX_6AB5B471CCF9E01E` (`departement_id`),
  KEY `fk_Can_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chercheur`
--

CREATE TABLE IF NOT EXISTS `chercheur` (
  `id` int(11) NOT NULL,
  `nbPublications` int(11) NOT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Che_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomDept` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C1765B63FCD8ECC7` (`nomDept`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id`, `nomDept`) VALUES
(2, 'Genie Chimique'),
(5, 'Genie Civil'),
(4, 'Genie Electrique'),
(1, 'Genie Informatique'),
(3, 'Genie Mecanique'),
(6, 'Gestion');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant_chercheur`
--

CREATE TABLE IF NOT EXISTS `enseignant_chercheur` (
  `id` int(11) NOT NULL,
  `nbPublications` int(11) NOT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Ens_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_717E22E353C59D72` (`responsable_id`),
  KEY `fk_Etu_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `option_departement`
--

CREATE TABLE IF NOT EXISTS `option_departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departement_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E74202D7CCF9E01E` (`departement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `option_departement`
--

INSERT INTO `option_departement` (`id`, `libelle`, `departement_id`) VALUES
(1, 'Informatique', 1),
(2, 'Telecoms', 1),
(3, 'Analyses Biologiques', 2),
(4, 'Industries Alimentaires', 2),
(5, 'Genie Chimique', 2);

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `boitePostale` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_52520D07E7927C74` (`email`),
  UNIQUE KEY `UNIQ_52520D074C79BB15` (`numTel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rp`
--

CREATE TABLE IF NOT EXISTS `rp` (
  `id` int(11) NOT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Rp_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ummisco_actor`
--

CREATE TABLE IF NOT EXISTS `ummisco_actor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datNaiss` date NOT NULL,
  `lieuNaiss` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paysNaiss` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `regionNaiss` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nationalite` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `boitePostale` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_id` int(11) DEFAULT NULL,
  `sexe` enum('Masculin','Feminin') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3DDB6FF44DE7DC5C` (`adresse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `FK_6AB5B4714E67DDD1` FOREIGN KEY (`bourse_id`) REFERENCES `bourse` (`id`),
  ADD CONSTRAINT `FK_6AB5B471BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6AB5B471CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`),
  ADD CONSTRAINT `fk_Can_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`);
  ADD CONSTRAINT 'fk_Can_responsable_id_Res' FOREIGN KEY ('responsable_id') REFERENCES 'responsable' ('id');

--
-- Contraintes pour la table `chercheur`
--
ALTER TABLE `chercheur`
  ADD CONSTRAINT `FK_9DD29B50BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Che_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`);

--
-- Contraintes pour la table `enseignant_chercheur`
--
ALTER TABLE `enseignant_chercheur`
  ADD CONSTRAINT `FK_45751903BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Ens_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E353C59D72` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`),
  ADD CONSTRAINT `FK_717E22E3BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Etu_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`);

--
-- Contraintes pour la table `option_departement`
--
ALTER TABLE `option_departement`
  ADD CONSTRAINT `FK_E74202D7CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`);

--
-- Contraintes pour la table `rp`
--
ALTER TABLE `rp`
  ADD CONSTRAINT `FK_CD578B7BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Rp_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`);

--
-- Contraintes pour la table `ummisco_actor`
--
ALTER TABLE `ummisco_actor`
  ADD CONSTRAINT `FK_3DDB6FF44DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
