<?php

require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    if ($_POST['id'] == 0 ) {
        array_shift($_POST);
        ajouterCours($_POST);

        header('location:../Rp/listeCours.php');

    } else {
        modifierCours($_POST);
        header('location:../Rp/listeCours.php');
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'supprimer')
{
    supprimerCours($_GET['id']);

    header('location:../Rp/listeCours.php');
}


function ajouterCours(array $donnees)
{
    $bdd = connexion();

    $requete = "INSERT INTO cours( id_matiere, id_enseignant, heureDebut, duree, dateCours, lieu )
                VALUES(:id_matiere, :id_enseignant, :heureDebut, :duree, :dateCours, :lieu ) ";

    $reponse = $bdd->prepare($requete);
    $reponse->execute($donnees);
}

function unCours($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM cours WHERE id = :id";

    $reponse = $bdd->prepare($requete);
    $reponse->execute(['id' => $id]);
    $donnees = $reponse->fetch(PDO::FETCH_ASSOC);

    return $donnees;
}

function allCours()
{
    $bdd = connexion();

    $requete = "SELECT * FROM cours";

    $reponse = $bdd->prepare($requete);
    $reponse->execute();
    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $donnees;
}

function modifierCours(array $donnees)
{
    $bdd = connexion();

    $id = $donnees['id'];
    array_shift($donnees);

    $requete = " UPDATE cours SET  heureDebut = :heureDebut, duree = :duree, dateCours = :dateCours, lieu = :lieu, id_matiere = :id_matiere, id_enseignant = :id_enseignant WHERE id =:id";

    $donnees['id'] = $id;

    $reponse = $bdd->prepare($requete);
    $reponse->execute($donnees);
}

function supprimerCours($id)
{
    $bdd = connexion();

    $requete = "DELETE FROM cours WHERE id = :id";

    $reponse = $bdd->prepare($requete);
    $reponse->execute(['id' => $id]);
}