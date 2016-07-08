<?php

require_once 'bdd.php';

function unEtudiant($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM candidat WHERE id = :id";

    $reponse = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $reponse->execute($donnees);

    $resultat = $reponse->fetch(PDO::FETCH_ASSOC);

    return $resultat;
}

function etudantClasse($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM candidat WHERE id = :id";

    $reponse = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $reponse->execute($donnees);
    
    $tous =  [];

    while ($resultat = $reponse->fetch(PDO::FETCH_ASSOC))
    {
        $tous [] = $resultat;
    }

    return $tous;
}


function allEtudiant()
{
    $bdd = connexion();

    $requete = "SELECT * FROM candidat ";

    $reponse = $bdd->query($requete);

    $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}