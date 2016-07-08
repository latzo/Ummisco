<?php

require_once 'bdd.php';
function ajouterExamen(array $donnees)
{
    $bdd = connexion();

    $requete = "INSERT INTO examen()
                VALUES ()";
     $response = $bdd->prepare($requete);

    $bdd->execute($donnees);
}

function unExamen($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM examen WHERE id = :id";

    $reponse = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $reponse->execute($donnees);

    $resultat = $reponse->fetch(PDO::FETCH_ASSOC);

    return $resultat;
}


function allExamen()
{
    $bdd = connexion();

    $requete = "SELECT * FROM examen ";

    $reponse = $bdd->query($requete);
    
    $resultat = $reponse->fetch(PDO::FETCH_ASSOC);

    return $resultat;
}