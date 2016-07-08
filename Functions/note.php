<?php

require_once 'bdd.php';


if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    if ($_POST['id'] == 0 ) {

        array_shift($_POST);
        ajouterNote($_POST);

        header('location:../Rp/listeNote.php');

    } else {
        modifierNote($_POST);
        header('location:../Rp/listeNote.php');
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'supprimer')
{
    supprimerNote($_GET['id']);

    header('location:../Rp/listeNote.php');
}

function ajouterNote(array $donnees)
{
    $bdd = connexion();

    $requete = "INSERT INTO note( id_etudiant, id_examen, note, appreciation)
                VALUES (:id_etudiant, :id_examen, :note, :appreciation)";

    $response = $bdd->prepare($requete);

    $response->execute($donnees);
}

function unNote($id)
{
    $bdd = connexion();

    $requete = "SELECT * FROM note WHERE id = :id";

    $reponse = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $reponse->execute($donnees);

    $resultat = $reponse->fetch(PDO::FETCH_ASSOC);

    return $resultat;
}


function allNote()
{
    $bdd = connexion();

    $requete = "SELECT * FROM note ";

    $reponse = $bdd->query($requete);

    $resultat = $reponse->fetch(PDO::FETCH_ASSOC);

    return $resultat;
}


function modifierNote(array $donnees)
{
    $bdd = connexion();

    $id = $donnees['id'];
    array_shift($donnees);

    $requete = "UPDATE note SET id_etudiant = :id_etudiant, id_examen = :id_examen, note = :examen, appreciation = :appreciation WHERE  id = :id";

    $response = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $response->execute($donnees);
}

function supprimerNote($id)
{
    $bdd = connexion();

    $requete = "DELETE FROM note WHERE id = ?";
    $response = $bdd->prepare($requete);

    $response->execute([$id]);
}