<?php

require_once 'bdd.php';

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    if ($_POST['id'] == 0 ) {
        array_shift($_POST);
        ajouterClasseMatiere($_POST);

        header('location:../Rp/listeClasse.php');

    }
}

function ajouterClasseMatiere(array $donnees)
{
    $bdd = connexion();

    $requete = "INSERT INTO classe_matiere(id_classe, id_matiere)
                VALUES (:id_classe, :id_matiere)";
    $response = $bdd->prepare($requete);

    $response->execute($donnees);
}


function unClasseMatiere($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM classe_matiere WHERE id = :id";

    $reponse = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $reponse->execute($donnees);

    $resultat = $reponse->fetch(PDO::FETCH_ASSOC);

    return $resultat;
}


function allClasseMatiere()
{
    $bdd = connexion();

    $requete = "SELECT * FROM classe_matiere ";

    $reponse = $bdd->query($requete);

    $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}
