<?php 
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

	if ($_POST['id'] == 0) {
		array_shift($_POST);
		ajouterUe($_POST);

		header('location:../Rp/listeUe.php');

	} else {
		modifierUe($_POST);
		header('location:../Rp/listeUe.php');
	}
	
}

if (isset($_GET['action']) && $_GET['action'] === 'supprimer')
{
	supprimerUe($_GET['id']);

	header('location:../Rp/listeUe.php');
}

function ajouterUe(array $donnees)
{
	$bdd = connexion();
	$requete = "insert into ue(nomUe, nbMatieres) values(:nomUe, :nbMatieres)";

	$reponse = $bdd->prepare($requete);
	$reponse->execute($donnees);
}

function uneUe($id)
{
	$bdd = connexion();
	$requete = "select * from ue where id = :id";

	$reponse = $bdd->prepare($requete);
	$reponse->execute(array('id' => $id));

	$donnees = $reponse->fetch(PDO::FETCH_ASSOC);

	return $donnees;
}

function allUe(){

	$bdd = connexion();
	$requete = "select * from ue";

	$reponse = $bdd->prepare($requete);
	$reponse->execute();

	$donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

	return $donnees;
}

function modifierUe(array $donnees)
{
	$bdd = connexion();
	$id = $donnees['id'];
	array_shift($donnees);
	$requete = "update ue set nomUe = :nomUe, nbMatieres = :nbMatieres where id = :id";
	$reponse = $bdd->prepare($requete);
	$donnees['id'] = $id;
	$reponse->execute($donnees);	
}

function supprimerUe($id)
{
	$bdd = connexion();
	$requete = "delete from ue where id = :id";

	$reponse = $bdd->prepare($requete);
	$reponse->execute(array('id' => $id));
}


