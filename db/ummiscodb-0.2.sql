-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 18 Juin 2016 à 14:57
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
CREATE DATABASE ummiscodb;
USE ummiscodb;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  id int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rueQuartier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `bourse`
--

CREATE TABLE IF NOT EXISTS `bourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montantBourse` int(11) NOT NULL,
  `nature_bourse` enum('Nationale','Etrangere','Etablissement') COLLATE utf8_unicode_ci DEFAULT NULL,
  `statut_bourse` enum('Non Boursier','Boursier','Etranger','Etranger Exonere') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tauxExoneration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE IF NOT EXISTS `candidat` (
  `id` int(11) NOT NULL,
  `ine` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cni` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `statut` enum('Regime Normal','Regime Salarie','Regime Particulier','Mise En Position De Stage') COLLATE utf8_unicode_ci DEFAULT NULL,
  `situation_familiale` enum('Celibataire','Marie','Mariee','Divorcee','Divorcee','Veuf','Veuve') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbEnfants` int(11) DEFAULT NULL,
  `datSoumission` date NOT NULL,
  `categorieSocioPro` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `aptitude` tinyint(1) NOT NULL,
  `signature` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `bourse_id` int(11) DEFAULT NULL, 
  actor_id int(11),
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6AB5B4717EE1FA43` (`ine`),
  UNIQUE KEY `UNIQ_6AB5B4717AC033BE` (`cni`),
  KEY `IDX_6AB5B4714E67DDD1` (`bourse_id`),
  KEY `IDX_6AB5B471CCF9E01E` (`departement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chercheur`
--

CREATE TABLE IF NOT EXISTS `chercheur` (
  `id` int(11) NOT NULL,
  `nbPublications` int(11) NOT NULL,
  actor_id int(11),
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE IF NOT EXISTS `diplome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomDiplome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EB4C4D4E5D0D0C06` (`nomDiplome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `diplome_domaine`
--

CREATE TABLE IF NOT EXISTS `diplome_domaine` (
  `diplome_id` int(11) NOT NULL,
  `domaine_id` int(11) NOT NULL,
  PRIMARY KEY (`diplome_id`,`domaine_id`),
  KEY `IDX_32B2130E26F859E2` (`diplome_id`),
  KEY `IDX_32B2130E4272FC9F` (`domaine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant_chercheur`
--

CREATE TABLE IF NOT EXISTS `enseignant_chercheur` (
  `id` int(11) NOT NULL,
  `nbPublications` int(11) NOT NULL,
  actor_id int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  actor_id int(11),
  PRIMARY KEY (`id`),
  KEY `IDX_717E22E353C59D72` (`responsable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `infos_diplome`
--

CREATE TABLE IF NOT EXISTS `infos_diplome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mention` enum('Passable','Assez Bien','Bien','Tres Bien') COLLATE utf8_unicode_ci DEFAULT NULL,
  `datObtention` date NOT NULL,
  `lieuObtention` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `candidat_id` int(11) DEFAULT NULL,
  `diplome_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ECF4A6EE8D0EB82` (`candidat_id`),
  KEY `IDX_ECF4A6EE26F859E2` (`diplome_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  actor_id int(11),
  PRIMARY KEY (`id`)
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
  ADD CONSTRAINT `FK_6AB5B471CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`);


--
-- Contraintes pour la table `chercheur`
--
ALTER TABLE `chercheur`
  ADD CONSTRAINT `FK_9DD29B50BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE;
  

--
-- Contraintes pour la table `diplome_domaine`
--
ALTER TABLE `diplome_domaine`
  ADD CONSTRAINT `FK_32B2130E26F859E2` FOREIGN KEY (`diplome_id`) REFERENCES `diplome` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_32B2130E4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `enseignant_chercheur`
--
ALTER TABLE `enseignant_chercheur`
  ADD CONSTRAINT `FK_45751903BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE;
  

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E353C59D72` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`),
  ADD CONSTRAINT `FK_717E22E3BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE;
  

--
-- Contraintes pour la table `infos_diplome`
--
ALTER TABLE `infos_diplome`
  ADD CONSTRAINT `FK_ECF4A6EE26F859E2` FOREIGN KEY (`diplome_id`) REFERENCES `diplome` (`id`),
  ADD CONSTRAINT `FK_ECF4A6EE8D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`id`);

--
-- Contraintes pour la table `option_departement`
--
ALTER TABLE `option_departement`
  ADD CONSTRAINT `FK_E74202D7CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`);

--
-- Contraintes pour la table `rp`
--
ALTER TABLE `rp`
  ADD CONSTRAINT `FK_CD578B7BF396750` FOREIGN KEY (`id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ummisco_actor`
--
ALTER TABLE `ummisco_actor`
  ADD CONSTRAINT `FK_3DDB6FF44DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`);

--
-- Contraintes pour heritage
--
ALTER TABLE candidat ADD CONSTRAINT fk_Can_actor_id_Umm FOREIGN KEY(actor_id) REFERENCES ummisco_actor(id);
ALTER TABLE chercheur ADD CONSTRAINT fk_Che_actor_id_Umm FOREIGN KEY(actor_id) REFERENCES ummisco_actor(id);
ALTER TABLE etudiant ADD CONSTRAINT fk_Etu_actor_id_Umm FOREIGN KEY(actor_id) REFERENCES ummisco_actor(id);
ALTER TABLE enseignant_chercheur ADD CONSTRAINT fk_Ens_actor_id_Umm FOREIGN KEY(actor_id) REFERENCES ummisco_actor(id);
ALTER TABLE rp ADD CONSTRAINT fk_Rp_actor_id_Umm FOREIGN KEY(actor_id) REFERENCES ummisco_actor(id);

--
-- Autres Contraintes
--
ALTER TABLE diplome ADD CONSTRAINT fk_Dip_candidat_id_Can FOREIGN KEY(candidat_id) REFERENCES candidat(id);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
