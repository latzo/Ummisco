--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id`, `ville`, `rueQuartier`) VALUES
(1, 'Pikine Cite Sotiba', NULL),
(2, 'Pikine Cite Sotiba Villa n 15', NULL);

--
-- Contenu de la table `bourse`
--

INSERT INTO `bourse` (`id`, `montantBourse`, `natureBourse`, `tauxExoneration`, `organismeBoursier`) VALUES
(1, 60000, 'Nationale', 10, 'Etat du Senegal');



--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id`, `nomDept`) VALUES
(2, 'Genie Chimique'),
(5, 'Genie Civil'),
(4, 'Genie Electrique'),
(1, 'Genie Informatique'),
(3, 'Genie Mecanique'),
(6, 'Gestion'),
(7, 'Ummisco');

-- --------------------------------------------------------

--
-- Contenu de la table `option_departement`
--

INSERT INTO `option_departement` (`id`, `libelle`, `departement_id`) VALUES
(1, 'Informatique', 1),
(2, 'Telecoms', 1),
(3, 'Analyses Biologiques', 2),
(4, 'Industries Alimentaires', 2),
(5, 'Genie Chimique', 2),
(6, 'Syscom', 7);




-- --------------------------------------------------------
--
-- Contenu de la table `enseignant_chercheur`
--
/*
INSERT INTO `enseignant_chercheur` (`id`, `nbPublications`, `actor_id`) VALUES
(1, 2, 2),



--
-- Contenu de la table `ue`
--

INSERT INTO `ue` (`id`, `nomUe`, `nbMatieres`) VALUES
(1, 'Generale', 5);


--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nomMatiere`, `id_ue`, `quantum`, `coefficient`) VALUES
(1, 'Analyse', 1, 30, 3),
(2, 'Anglais', 1, 20, 2),
(3, 'FranÃ§ais', 1, 20, 2);



--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id`, `heureDebut`, `duree`, `dateCours`, `lieu`, `id_matiere`, `id_enseignant`) VALUES
(3, '10:00:00', 2, '2016-07-08', 'Salle 203', 1, 1);

-- --------------------------------------------------------

*/
--
-- Contenu de la table `responsable`
--

INSERT INTO `responsable` (`id`, `nom`, `prenom`, `email`, `numTel`, `boitePostale`, `adresse_id`) VALUES
(1, 'Mbodj', 'Coumba', 'mbodj.coumba@gmail.com', '775396407', 'BP 8455 Dakar Fann', 2);

--
-- Contenu de la table `ummisco_actor`
--

INSERT INTO `ummisco_actor` (`id`, `prenom`, `nom`, `datNaiss`, `lieuNaiss`, `paysNaiss`, `regionNaiss`, `nationalite`, `email`, `numTel`, `boitePostale`, `password`, `discr`, `adresse_id`, `sexe`) VALUES
/*(2, 'Alassane', 'Bah', '1975-12-08', 'Dakar', 'Senegal', 'Dakar', 'Senegalaise', 'alassane.bah@gmail.com', '775005050', 'BP 4848 Dakar Fann', 'ff7200d846e54c8d4d633e3a3a17e3b73990fce5', 'rp', 4, 'Masculin'),
(5, 'Ibrahima', 'Fall', '1976-07-06', 'Louga', 'Senegal', 'Louga', 'Senegalaise', 'ifall@esp.sn', '775255252', 'BP 6455 Louga Lo', 'dc3001bf457f7c33e0fa3c8b547e3cd029df4b76', 'enseignant', 8, 'Masculin'),*/
(2, 'Papa Latyr', 'Mbodj', '1995-03-15', 'Pikine', 'Senegal', 'Dakar', 'Senegalaise', 'latyr@esp.sn', '771798853', 'BP 8128 Dakar Fann', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'candidat', 1, 'Masculin');


--
-- Contenu de la table `candidat`
--

INSERT INTO `candidat` (`id`, `ine`, `cni`, `statut`, `situationFamiliale`, `nbEnfants`, `datSoumission`, `categorieSocioPro`, `anneeEtude`, `cycle`, `nbInscriptAnt`, `redouble`, `aptitude`, `signature`, `statutBourse`, `valide`, `id_classe`, `departement_id`, `bourse_id`, `responsable_id`, `actor_id`) VALUES
(1, '17651995019942', '17651995019942', 'Regime Normal', 'Celibataire', 0, '2016-07-01', 'Chomeur', 'Deuxieme annee', 'Master', 5, 0, 1, 'signature', 'Boursier', 1, NULL, 7, 1, 1, 2);

-- --------------------------------------------------------

--
-- Contenu de la table `diplome`
--

INSERT INTO `diplome` (`id`, `nomDiplome`, `mention`, `dateObtention`, `lieuObtention`, `candidat_id`) VALUES
(1, 'Bac S2', 'Assez Bien', 2010, 'Dakar', 1);