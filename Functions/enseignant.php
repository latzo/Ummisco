<?php

require_once "database.php";


function unEnseignant($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM enseignant_chercheur WHERE id = :id";

    $reponse = $bdd->prepare($requete);
    $reponse->execute(['id' => $id]);
    $donnees = $reponse->fetch(PDO::FETCH_ASSOC);

    return $donnees;
}

function allEnseignant()
{
    $bdd = connexion();

    $requete = "SELECT * FROM enseignant_chercheur";

    $reponse = $bdd->prepare($requete);
    $reponse->execute();
    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $donnees;
}
