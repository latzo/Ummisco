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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `bourse`
--

CREATE TABLE IF NOT EXISTS `bourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montantBourse` int(11) DEFAULT NULL,
  `natureBourse` enum('Nationale','Etrangere','Etablissement') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tauxExoneration` int(11) DEFAULT NULL,
  `organismeBoursier` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'Etat du Senegal',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Structure de la table `chercheur`
--

CREATE TABLE IF NOT EXISTS `chercheur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbPublications` int(11) NOT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Che_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomClasse` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomDept` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C1765B63FCD8ECC7` (`nomDept`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Structure de la table `enseignant_chercheur`
--

CREATE TABLE IF NOT EXISTS `enseignant_chercheur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbPublications` int(11) NOT NULL,
  `actor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Ens_actor_id_Umm` (`actor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_matiere` int(11) DEFAULT NULL,
  `id_enseignant` int(11) DEFAULT NULL,
  `dateExamen` date DEFAULT NULL,
  `heureDebut` time DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `urlEpreuve` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Exa_id_enseignant_Ens` (`id_enseignant`),
  KEY `fk_Exa_id_matiere_Mat` (`id_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) DEFAULT NULL,
  `id_examen` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `appreciation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Not_id_etudiant_Etu` (`id_etudiant`),
  KEY `fk_Not_id_examen_Exa` (`id_examen`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


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

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

CREATE TABLE IF NOT EXISTS `ue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomUe` varchar(100) DEFAULT NULL,
  `nbMatieres` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `fk_Can_responsable_id_Res` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_6AB5B4714E67DDD1` FOREIGN KEY (`bourse_id`) REFERENCES `bourse` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_6AB5B471CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Can_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Can_id_classe_Cla` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `chercheur`
--
ALTER TABLE `chercheur`
  ADD CONSTRAINT `fk_Che_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `classe_matiere`
--
ALTER TABLE `classe_matiere`
  ADD CONSTRAINT `fk_clam_id_matiere_Mat` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clam_id_classe_Cla` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_Cou_id_enseignant_Ens` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant_chercheur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Cou_id_matiere_Mat` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enseignant_chercheur`
--
ALTER TABLE `enseignant_chercheur`
  ADD CONSTRAINT `fk_Ens_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `fk_Exa_id_matiere_Mat` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Exa_id_enseignant_Ens` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant_chercheur` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `fk_Mat_id_ue_Ue` FOREIGN KEY (`id_ue`) REFERENCES `ue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_Not_id_examen_Exa` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Not_id_etudiant_Etu` FOREIGN KEY (`id_etudiant`) REFERENCES `candidat` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `option_departement`
--
ALTER TABLE `option_departement`
  ADD CONSTRAINT `FK_E74202D7CCF9E01E` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `fk_Resp_adresse_id_Adr` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `rp`
--
ALTER TABLE `rp`
  ADD CONSTRAINT `fk_Rp_actor_id_Umm` FOREIGN KEY (`actor_id`) REFERENCES `ummisco_actor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ummisco_actor`
--
ALTER TABLE `ummisco_actor`
  ADD CONSTRAINT `FK_3DDB6FF44DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

