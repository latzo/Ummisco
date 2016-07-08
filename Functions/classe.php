<?php


require_once 'bdd.php';

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    if ($_POST['id'] == 0 ) {
        array_shift($_POST);
        ajouterClasse($_POST);

        header('location:../Rp/listeClasse.php');

    } else {
        modifierClasse($_POST);
        header('location:../Rp/listeClasse.php');
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'supprimer')
{
    supprimerClasse($_GET['id']);

    header('location:../Rp/listeClasse.php');
}

function ajouterClasse(array $donnees)
{
    $bdd = connexion();

    $requete = "INSERT INTO classe( nomClasse)
                VALUES (:nomClasse)";
    $response = $bdd->prepare($requete);

    $response->execute($donnees);
}

function unClasse($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM classe WHERE id = :id";

    $reponse = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $reponse->execute($donnees);

    $resultat = $reponse->fetch(PDO::FETCH_ASSOC);

    return $resultat;
}


function allClasse()
{
    $bdd = connexion();

    $requete = "SELECT * FROM classe ";

    $reponse = $bdd->query($requete);

    $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}


function modifierClasse(array $donnees)
{
    $bdd = connexion();

    $id = $donnees['id'];
    array_shift($donnees);

    $requete = "UPDATE classe SET nomClasse WHERE  id = :id";

    $response = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $response->execute($donnees);
}

function supprimerClasse($id)
{
    $bdd = connexion();

    $requete = "DELETE FROM classe WHERE id = ?";
    $response = $bdd->prepare($requete);

    $response->execute([$id]);
}