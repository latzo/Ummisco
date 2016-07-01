<?php

require_once "bdd.php";


function unUmmiscoActor($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM ummisco_actor WHERE id = :id";

    $reponse = $bdd->prepare($requete);
    $reponse->execute(['id' => $id]);
    $donnees = $reponse->fetch(PDO::FETCH_ASSOC);

    return $donnees;
}

function allUmmiscoActor()
{
    $bdd = connexion();

    $requete = "SELECT * FROM ummisco_actor";

    $reponse = $bdd->prepare($requete);
    $reponse->execute();
    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $donnees;
}