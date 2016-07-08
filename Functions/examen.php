<?php


require_once "bdd.php";

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    if ($_POST['id'] == 0 ) {
        array_shift($_POST);
        ajouterExamen($_POST);

        header('location:../Rp/listeExamen.php');

    } else {
        modifierExamen($_POST);
        header('location:../Rp/listeExamen.php');
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'supprimer')
{
    supprimerExamen($_GET['id']);

    header('location:../Rp/listeExamen.php');
}

function ajouterExamen(array $donnees)
{
    $bdd = connexion();

    $requete = "INSERT INTO examen( id_matiere, id_enseignant, dateExamen, heureDebut, duree, urlEpreuve)
                VALUES (:id_matiere, :id_enseignant, :dateExamen, :heureDebut, :duree, :urlEpreuve)";
     $response = $bdd->prepare($requete);

    $response->execute($donnees);
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

    $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}


function modifierExamen(array $donnees)
{
    $bdd = connexion();

    $id = $donnees['id'];
    array_shift($donnees);

    $requete = "UPDATE examen SET id_matiere = :id_matiere, id_enseignant = :id_enseignant, dateExamen = :dateExamen,
                heureDebut = :heureDebut, duree = :duree, urlEpreuve = :urlEpreuve WHERE  id = :id";

    $response = $bdd->prepare($requete);

    $donnees['id'] = $id;

    $response->execute($donnees);
}

function supprimerExamen($id)
{
    $bdd = connexion();

    $requete = "DELETE FROM examen WHERE id = ?";
    $response = $bdd->prepare($requete);

    $response->execute([$id]);
}