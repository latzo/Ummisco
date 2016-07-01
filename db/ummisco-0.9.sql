-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Juin 2016 à 15:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ummisco`
--

DROP DATABASE IF EXISTS ummisco;
CREATE DATABASE ummisco;
USE ummisco;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rueQuartier` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `adresse`
--

/*INSERT INTO `adresse` (`id`, `ville`, `rueQuartier`) VALUES
(1, 'Pikine Cite Sotiba Villa n 15', NULL),
(2, 'Pikine Cite Sotiba', NULL),
(3, 'Fann Hock Villa n 123', NULL),
(4, 'Sacre Coueur 3 Villa n 123', NULL),
(5, 'Dieuppeul Derkle', NULL),
(6, 'Dieuppeul Derkle Villa n 20', NULL),
(7, 'Dieuppeul Derkle', NULL),
(8, 'Dieuppeul Derkle Villa n 20', NULL),
(9, 'Gueule Tapee Villa n 32', NULL);*/

-- --------------------------------------------------------

--
-- Structure de la table `bourse`
--

CREATE TABLE IF NOT EXISTS `bourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montantBourse` int(11) DEFAULT NULL,
  `natureBourse` enum('Nationale','Etrangere','Etablissement') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tauxExoneration` int(11) DEFAULT NULL,
  `organismeBoursier` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `bourse`
--
/*
INSERT INTO `bourse` (`id`, `montantBourse`, `natureBourse`, `tauxExoneration`, `organismeBoursier`) VALUES
(1, 36000, 'Nationale', 10, NULL),
(2, 18000, 'Nationale', 10, NULL),
(3, 36000, 'Nationale', 10, NULL),
(4, 36000, 'Nationale', 10, NULL);
*/
-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE IF NOT EXISTS `candidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `valide` tinyint(1) DEFAULT '0',
  `id_classe` int(11) DEFAULT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `bourse_id` int(11) DEFAULT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6AB5B4714E67DDD1` (`bourse_id`),
  KEY `IDX_6AB5B471CCF9E01E` (`departement_id`),
  KEY `fk_Can_actor_id_Umm` (`actor_id`),
  KEY `fk_Can_responsable_id_Res` (`responsable_id`),
  KEY `fk_Can_id_classe_Cla` (`id_classe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `candidat`
--
/*
INSERT INTO `candidat` (`id`, `ine`, `cni`, `statut`, `situationFamiliale`, `nbEnfants`, `datSoumission`, `categorieSocioPro`, `anneeEtude`, `cycle`, `nbInscriptAnt`, `redouble`, `aptitude`, `signature`, `statutBourse`, `valide`, `id_classe`, `departement_id`, `bourse_id`, `responsable_id`, `actor_id`) VALUES
(1, '1765199501942', '17651995019942', 'Regime Normal', 'Celibataire', 0, '2016-06-27', 'Chomeur', 'Troisieme annee', 'DIC', 2, 0, 1, 'signature', 'Boursier', 1, NULL, 1, 1, 1, 1),
(2, '17651995019220', '27581995078652', 'Regime Normal', 'Celibataire', 0, '2016-06-29', 'Chomeur', 'Deuxieme annee', 'Master', 0, 0, 1, 'masignaturendsn', 'Boursier', 1, NULL, 1, 2, 1, 3),
(3, '27651995019942', '261919940092', 'Regime Normal', 'Mariee', 0, '2016-06-29', 'Chomeur', 'Deuxieme annee', 'Master', 2, 0, 1, 'signature', 'Boursier', 1, NULL, 1, 3, 2, 4);
*/
-- --------------------------------------------------------

--
-- Structure de la table `chercheur`
--

CREATE TABLE IF NOT EXISTS `chercheur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbPublications` int(11) NOT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Che_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomClasse` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `classe`
--
/*
INSERT INTO `classe` (`id`, `nomClasse`) VALUES
(1, 'Master 2 SYSCOM');*/

-- --------------------------------------------------------

--
-- Structure de la table `classe_matiere`
--

CREATE TABLE IF NOT EXISTS `classe_matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_classe` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clam_id_classe_Cla` (`id_classe`),
  KEY `fk_clam_id_matiere_Mat` (`id_matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `classe_matiere`
--
/*
INSERT INTO `classe_matiere` (`id`, `id_classe`, `id_matiere`) VALUES
(1, 1, 1);
*/
-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heureDebut` time DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `dateCours` date DEFAULT NULL,
  `lieu` varchar(150) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL,
  `id_enseignant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Cou_id_enseignant_Ens` (`id_enseignant`),
  KEY `fk_Cou_id_matiere_Mat` (`id_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Structure de la table `diplome`
--

CREATE TABLE IF NOT EXISTS `diplome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomDiplome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mention` enum('Passable','Assez Bien','Bien','Tres Bien') COLLATE utf8_unicode_ci NOT NULL,
  `dateObtention` year(4) NOT NULL,
  `lieuObtention` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `candidat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Dip_candidat_id_Can` (`candidat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `diplome`
--
/*
INSERT INTO `diplome` (`id`, `nomDiplome`, `mention`, `dateObtention`, `lieuObtention`, `candidat_id`) VALUES
(1, 'Bac S2', 'Passable', 2013, 'Dakar', 1),
(2, 'Bac S2', 'Bien', 2010, 'Dakar', 4);
*/
-- --------------------------------------------------------

--
-- Structure de la table `enseignant_chercheur`
--

CREATE TABLE IF NOT EXISTS `enseignant_chercheur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbPublications` int(11) NOT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Ens_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomMatiere` varchar(150) DEFAULT NULL,
  `id_ue` int(11) DEFAULT NULL,
  `quantum` int(11) DEFAULT NULL,
  `coefficient` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Mat_id_ue_Ue` (`id_ue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `matiere`
--
/*
INSERT INTO `matiere` (`id`, `nomMatiere`, `id_ue`, `quantum`, `coefficient`) VALUES
(1, 'Systemes Complexes', 1, 3, 5);
*/
-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) DEFAULT NULL,
  `appreciation` varchar(255) DEFAULT NULL,
  `id_candidat` int(11) DEFAULT NULL,
  `id_enseignant` int(11) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Not_id_enseignant_Ens` (`id_enseignant`),
  KEY `fk_Not_id_candidat_Can` (`id_candidat`),
  KEY `fk_Not_id_matiere_Mat` (`id_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numTel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boitePostale` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Resp_adresse_id_Adr` (`adresse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `responsable`
--
/*
INSERT INTO `responsable` (`id`, `nom`, `prenom`, `email`, `numTel`, `boitePostale`, `adresse_id`) VALUES
(1, 'Mbodj', 'Coumba', 'mbodjcoumba@gmail.com', '775396407', 'BP 48464 Dakar', 2),
(2, 'Ndiaye', 'Doussouba', 'doussouba.ndiaye@yahoo.fr', '772152124', 'BP Dieuppeul Derkle', 6),
(3, 'Ndiaye', 'Doussouba', 'doussouba.ndiaye@yahoo.fr', '772152124', 'BP Dieuppeul Derkle', 8);
*/
-- --------------------------------------------------------

--
-- Structure de la table `rp`
--

CREATE TABLE IF NOT EXISTS `rp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Rp_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `rp`
--
/*
INSERT INTO `rp` (`id`, `actor_id`) VALUES
(1, 2);
*/
-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

CREATE TABLE IF NOT EXISTS `ue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomUe` varchar(100) DEFAULT NULL,
  `nbMatieres` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `ue`
--
/*
INSERT INTO `ue` (`id`, `nomUe`, `nbMatieres`) VALUES
(1, 'UE1', 3);
*/
-- --------------------------------------------------------

--
-- Structure de la table `ummisco_actor`
--

CREATE TABLE IF NOT EXISTS `ummisco_actor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datNaiss` date DEFAULT NULL,
  `lieuNaiss` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paysNaiss` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regionNaiss` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationalite` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numTel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boitePostale` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_id` int(11) DEFAULT NULL,
  `sexe` enum('Masculin','Feminin') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3DDB6FF44DE7DC5C` (`adresse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `ummisco_actor`
--
/*
INSERT INTO `ummisco_actor` (`id`, `prenom`, `nom`, `datNaiss`, `lieuNaiss`, `paysNaiss`, `regionNaiss`, `nationalite`, `email`, `numTel`, `boitePostale`, `password`, `discr`, `adresse_id`, `sexe`) VALUES
(1, 'Papa Latyr', 'Mbodj', '1995-03-15', 'Pikine', 'Senegal', 'Dakar', 'Senegalaise', 'latyr@esp.sn', '771798853', 'BP 8128 Dakar Fann', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'candidat', 1, 'Masculin'),
(2, 'Alassane', 'Bah', '1975-12-08', 'Dakar', 'Senegal', 'Dakar', 'Senegalaise', 'alassane.bah@gmail.com', '775005050', 'BP 4848 Dakar Fann', 'ff7200d846e54c8d4d633e3a3a17e3b73990fce5', 'rp', 3, 'Masculin'),
(3, 'Ndeye Sokhna', 'Ndiaye', '1995-06-14', 'Dakar', 'Senegal', 'Dakar', 'Senegalaise', 'soxna95@gmail.com', '771750493', 'BP 1503 Dakar Fann', 'passer', 'candidat', 4, 'Feminin'),
(4, 'Mariama', 'Diop', '1994-01-07', 'Thies', 'Senegal', 'Thies', 'Senegalaise', 'mariamadiop@esp.sn', '777666415', 'BP 8128 Dakar Fann', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'candidat', 5, 'Masculin'),
(6, 'Ibrahima', 'Fall', '1975-06-08', 'Louga Lo', 'Senegal', 'Louga', 'Senegalaise', 'ifall@esp.sn', '775004040', 'BP 4587 Louga Lo', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'enseignant', 9, 'Masculin');
*/
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `FK_6AB5B4714E67DDD1` FOREIGN KEY (`bourse_id`) REFERENCES `bourse` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_6AB5B471CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Can_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Can_id_classe_Cla` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Can_responsable_id_Res` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `chercheur`
--
ALTER TABLE `chercheur`
  ADD CONSTRAINT `fk_Che_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`);

--
-- Contraintes pour la table `classe_matiere`
--
ALTER TABLE `classe_matiere`
  ADD CONSTRAINT `fk_clam_id_classe_Cla` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_clam_id_matiere_Mat` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_Cou_id_enseignant_Ens` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant_chercheur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_Cou_id_matiere_Mat` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `enseignant_chercheur`
--
ALTER TABLE `enseignant_chercheur`
  ADD CONSTRAINT `fk_Ens_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `fk_Mat_id_ue_Ue` FOREIGN KEY (`id_ue`) REFERENCES `ue` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_Not_id_candidat_Can` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_Not_id_enseignant_Ens` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant_chercheur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_Not_id_matiere_Mat` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `option_departement`
--
ALTER TABLE `option_departement`
  ADD CONSTRAINT `FK_E74202D7CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`);

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `fk_Resp_adresse_id_Adr` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `rp`
--
ALTER TABLE `rp`
  ADD CONSTRAINT `fk_Rp_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ummisco_actor`
--
ALTER TABLE `ummisco_actor`
  ADD CONSTRAINT `FK_3DDB6FF44DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
